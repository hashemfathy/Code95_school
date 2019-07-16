<?php

namespace App\Http\Controllers;

use App\Level;
use App\Result;
use App\Student;
use App\Subject;
use App\Teacher;
use App\Classroom;
use App\ClassSubjectTeach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ResultResource;

class TeacherController extends Controller
{
    public function getLevels()
    {
        return Level::all();
    }
    public function getClassrooms($id)
    {
        $teacher=Auth::user()->id;
        return   Teacher::where('user_id',$teacher)->with(['classrooms'=>function ($q) use($id){$q->where('level_id',$id);}])->first();
         
    }
    public function getSubjects($level_id,$classroom_id)
    {
        $teacher=Auth::user()->id;
        $teacher = Classroom::where('id',$classroom_id)->with(['teachers'=>function($q) use($teacher,$level_id){$q->where('teacher_id',$teacher)->with(['subjects'=>function($q) use($level_id){$q->where('level_id',$level_id)->distinct();}]);}])->first();
        return $teacher->teachers->first()->subjects;    
    }
    public function getStudents(Classroom $classroom)
    {
        return $classroom->students->load('user');
    }
    public function getResults(Classroom $classroom , Subject $subject)
    {
        try {

            $results = Result::classroomSubjectResult($classroom->id,$subject->id)->with(['student.user'])->get();
            return ResultResource::collection($results);

        } catch (\Exception $e) {
            return $e;
        } 
    }
    public function updateResult(Request $request,Result $result)
    {
        $result->degree = $request->degree;
        $result->update();
        $results = Result::classroomSubjectResult($request->classroom_id,$request->subject_id) ;
        return ResultResource::collection( $results->with('student.user')->get());
    }
    public function updateFullDegree(Request $request)
    {
        $request->validate([
            'classroom_id' => 'required',
            'subject_id' => 'required',
            'full_degree' => 'required'
        ]);
        $results = Result::classroomSubjectResult($request->classroom_id,$request->subject_id) ; 
        tap($results)->update(['full_degree'=>$request->full_degree]);
        return ResultResource::collection( $results->with('student.user')->get());
    }
}

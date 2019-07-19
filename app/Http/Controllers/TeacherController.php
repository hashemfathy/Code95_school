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
        return  $teacher->teachers->first()->subjects;    
    }
    public function getResultStudents($classroom , $subject)
    {
            $students=Student::where('classroom_id',$classroom)->with(['user','results'=>function($q) use($subject){$q->where('subject_id',$subject);}])->get();
            return $students;
        
    }
    public function getResults($level_id ,$classroom_id , $subject)
    {
        $teacher=Auth::user()->id;
        $check=ClassSubjectTeach::where(['classroom_id'=>$classroom_id,'subject_id'=>$subject,'teacher_id'=>$teacher])->first();
        if($check){
            return view('teacher.results',compact('level_id','classroom_id','subject'));
        }
        return redirect()->back()->with('flush_errors','Your are not allowed to access !');
        
    }
    
    public function updateDegree(Request $request,Student $student)
    {
        $studentResult=Result::where(['student_id'=>$student->id,'subject_id'=>$request->subject_id])->first();
        if($studentResult){
            $studentResult->degree=$request->degree;
            $studentResult->update();
            $students=Student::where('classroom_id',$request->classroom_id)->with(['user','results'=>function($q) use($request){$q->where('subject_id',$request->subject_id);}])->get();
            return $students;
        }
        $newStudentResult=new Result;
        $newStudentResult->teacher_id=Auth::user()->id;
        $newStudentResult->student_id=$student->id;
        $newStudentResult->classroom_id=$request->classroom_id;
        $newStudentResult->subject_id=$request->subject_id;
        $newStudentResult->level_id=$student->level_id;
        $newStudentResult->degree=$request->degree;
        $newStudentResult->save();
        $students=Student::where('classroom_id',$request->classroom_id)->with(['user','results'=>function($q) use($request){$q->where('subject_id',$request->subject_id);}])->get();
        return $students;
    }
    public function updateFullDegree(Request $request)
    {
        $request->validate([
            'classroom_id' => 'required',
            'subject_id' => 'required',
            'full_degree' => 'required'
        ]);
        Result::classroomSubjectResult($request->classroom_id,$request->subject_id)->update(['full_degree'=>$request->full_degree]);
        $students=Student::where('classroom_id',$request->classroom_id)->with(['user','results'=>function($q) use($request){$q->where('subject_id',$request->subject_id);}])->get();
        return $students;
    }
}

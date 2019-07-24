<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Level;
use App\Result;
use App\Student;
use App\Subject;
use App\Teacher;
use App\Classroom;
use App\ClassSubjectTeach;
use Illuminate\Http\Request;
use App\Notifications\NewResult;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function getTeacherLevels()
    {
        return response()->json(Level::all());
    }
    public function getClassrooms($level)
    {
        $user=auth('api')->user();
        $teacher=$user->id;
        return  response()->json(Teacher::where('user_id',$teacher)->with(['classrooms'=>function ($q) use($level){$q->where('level_id',$level);}])->first()); 
         
    }
    public function getSubjects($level_id,$classroom_id)
    {
        $user=auth('api')->user();
        $teacher=$user->id;
        $teacher = Classroom::where('id',$classroom_id)->with(['teachers'=>function($q) use($teacher,$level_id){$q->where('teacher_id',$teacher)->with(['subjects'=>function($q) use($level_id){$q->where('level_id',$level_id)->distinct();}]);}])->first();
        return  response()->json($teacher->teachers->first()->subjects);    
    }
    public function getStudentsResults($classroom , $subject)
    {
        $user=auth('api')->user();
        $teacher=$user->id;
        $check=ClassSubjectTeach::where(['classroom_id'=>$classroom,'subject_id'=>$subject,'teacher_id'=>$teacher])->first();
        if($check){
            $students=Student::where('classroom_id',$classroom)->with(['user','results'=>function($q) use($subject){$q->where('subject_id',$subject);}])->get();
            return response()->json($students);  
        }
        return response()->json(['message'=>'your are not allowed to access'],403);
    }
    public function updateFullDegree(Request $request)
    {
        $request->validate([
            'classroom_id' => 'required',
            'subject_id' => 'required',
            'full_degree' => 'required'
        ]);
        $user=auth('api')->user();
        $teacher=$user->id;
        $check=ClassSubjectTeach::where(['classroom_id'=>$request->classroom_id,'subject_id'=>$request->subject_id,'teacher_id'=>$teacher])->first();
        if($check){
            Result::classroomSubjectResult($request->classroom_id,$request->subject_id)->update(['full_degree'=>$request->full_degree]);
            $students=Student::where('classroom_id',$request->classroom_id)->with(['user','results'=>function($q) use($request){$q->where('subject_id',$request->subject_id);}])->get();
            return response()->json($students);  
        }
        return response()->json(['message'=>'your are not allowed to access'],403);
         
    }
    public function updateDegree(Request $request,Student $student)
    {
        $request->validate([
            'classroom_id' => 'required',
            'subject_id' => 'required',
            'degree' => 'required'
        ]);
        $user=auth('api')->user();
        $teacher=$user->id;
        $studentResult=Result::where(['student_id'=>$student->id,'subject_id'=>$request->subject_id])->first();
        $check=ClassSubjectTeach::where(['classroom_id'=>$request->classroom_id,'subject_id'=>$request->subject_id,'teacher_id'=>$teacher])->first();
        if($check){
            if($studentResult){
                $studentResult->degree=$request->degree;
                $studentResult->update();
                // notification----------------
                $user=User::where('id',$student->user_id)->first();
                $subject=Subject::where('id',$request->subject_id)->first();
                $subject=$subject->subject_code;
                $user->notify(new NewResult($subject));
                $students=Student::where('classroom_id',$request->classroom_id)->with(['user','results'=>function($q) use($request){$q->where('subject_id',$request->subject_id);}])->get();
                return response()->json($students); 
            };
            $newStudentResult=new Result;
            $newStudentResult->teacher_id=$teacher;
            $newStudentResult->student_id=$student->id;
            $newStudentResult->classroom_id=$request->classroom_id;
            $newStudentResult->subject_id=$request->subject_id;
            $newStudentResult->level_id=$student->level_id;
            $newStudentResult->degree=$request->degree;
            $newStudentResult->save();
            // notification----------------
            $user=User::where('id',$student->user_id)->first();
            $subject=Subject::where('id',$request->subject_id)->first();
            $subject=$subject->subject_code;
            $user->notify(new NewResult($subject));
    
            $students=Student::where('classroom_id',$request->classroom_id)->with(['user','results'=>function($q) use($request){$q->where('subject_id',$request->subject_id);}])->get();
            return response()->json($students);  
        }
        return response()->json(['message'=>'your are not allowed to access'],403); 
    }
    
}

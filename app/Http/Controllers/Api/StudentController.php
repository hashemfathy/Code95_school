<?php

namespace App\Http\Controllers\Api;

use App\Level;
use App\Result;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function getStudentResults()
    {
        $user=auth('api')->user();
        $student=Student::where('user_id',$user->id)->first();
        $student=$student->id;
        $level=Student::where('id',$student)->first()->level_id;
        $results=Result::with('subject')->where(['student_id'=>$student,'level_id'=>$level])->get();
        return response()->json($results);
    }
    public function getStudentLevels()
    {
        $user=auth('api')->user();
        $student=Student::where('user_id',$user->id)->first();
        $student=$student->id;
        $level=Student::where('id',$student)->first()->level_id;
        return Level::where('id','!=',$level)->get();
    }
    public function getStudentLevelResults($level)
    {
        $user=auth('api')->user();
        $student=Student::where('user_id',$user->id)->first();
        $student=$student->id;
        $results=Result::with('subject')->where(['student_id'=>$student,'level_id'=>$level])->get();
        return response()->json($results);
    }
    
}

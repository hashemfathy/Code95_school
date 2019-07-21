<?php

namespace App\Http\Controllers;

use App\Level;
use App\Result;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function getStudentLevels()
    {
        return Level::all();
    }
    public function getStudentResults($level)
    {
        $student=Student::where('user_id',Auth::user()->id)->first();
        $student=$student->id;
        $results=Result::with('subject')->where(['student_id'=>$student,'level_id'=>$level])->get();
        return response()->json($results);
    }
}

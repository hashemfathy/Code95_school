<?php

namespace App\Http\Controllers;

use App\Result;
use App\Student;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function getStudentResultsPDF()
    {
        $student=Student::where('user_id',Auth::user()->id)->first();
        $student=$student->id;
        $level=Student::where('id',$student)->first()->level_id;
        $results=Result::with('subject')->where(['student_id'=>$student,'level_id'=>$level])->get();
        $pdf=PDF::loadView('student.results_pdf',compact('results'));
        return $pdf->download('Results.pdf');
    }
}

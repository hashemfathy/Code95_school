<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CsvExport implements FromView
{
    /**
    */
    public function view() : View
    {
       
        $students=User::where('is_admin','3')->with(['student' => function($q) { $q->with(['classroom','level']);}])->get();
        return view('admin.student.export_students',compact('students'));
    }
}

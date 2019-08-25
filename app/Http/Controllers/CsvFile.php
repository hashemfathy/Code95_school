<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CsvFile extends Controller
{
    public function index()
    {
        $data=User::latest()->paginate(10);
        return view('csv_file_pagination',compact('data'))->with('i',(request()->input('page',1)-1)*10);
    }
}

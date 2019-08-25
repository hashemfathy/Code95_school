<?php

namespace App\Imports;

use App\User;
use App\Student;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class CsvImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $user= new User([
            'name'     => $row[0],
            'email'    => $row[1],
            'address'  => $row[2],
            'password' => Hash::make($row[3]),
            ]);
            $user->save();
            $student=new Student([
            'parent_phone'   => $row[4],
            'user_id'        => $user->id, 
            'classroom_id'   => $row[5],
            'level_id'       => $row[6],
            ]);
            $student->save();
            
        }   
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function students(){
        return $this->hasMany('App\Student');
    }
    public function classrooms(){
        return $this->hasMany('App\Classroom');
    }
    public function subjects(){
        return $this->hasMany('App\Subject');
    }
    public function results()
    {
        return $this->hasMany('App\Result');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function subjects()
    {
        return $this->belongsToMany('App\Subject', 'teach_class_subject');
    }
    public function classrooms()
    {
        return $this->belongsToMany('App\Classroom', 'teach_class_subject');
    }
    public function ClassSubjectTeach()
    {
        return $this->hasMany('App\ClassSubjectTeach');
    }
    public function results()
    {
        return $this->hasMany('App\Result');
    }
}

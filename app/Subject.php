<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function level(){
        return $this->belongsTo('App\Level');
   }
   public function teachers()
   {
       return $this->belongsToMany('App\Teacher', 'teach_class_subject');
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

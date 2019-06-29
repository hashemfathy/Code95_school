<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public function students(){
        return $this->hasMany('App\Student');
   }
    public function level(){
        return $this->belongsTo('App\Level');
   }
   public function teachers()
   {
       return $this->belongsToMany('App\Teacher','teach_class_subject');
   }
   public function subjects()
   {
       return $this->belongsToMany('App\Subject','teach_class_subject');
   }
}

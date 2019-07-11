<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function teacher()
   {
       return $this->belongsTo('App\Teacher');
   }
   public function classroom()
   {
       return $this->belongsTo('App\Classroom');
   }
   public function subject()
   {
       return $this->belongsTo('App\Subject');
   }
   public function student()
   {
       return $this->belongsTo('App\Student');
   }
   public function level()
   {
       return $this->belongsTo('App\Level');
   }
}

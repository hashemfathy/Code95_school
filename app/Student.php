<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function classroom()
    {
        return $this->belongsTo('App\Classroom');
    }
    public function level()
    {
        return $this->belongsTo('App\Level');
    }
    public function results()
    {
        return $this->hasMany('App\Result');
    }
}

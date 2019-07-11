<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSubjectTeach extends Model
{
    protected $table = 'teach_class_subject';
    protected $appends = ['subject_code','teacher_name','classroom_name'] ;
 


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
   public function getSubjectCodeAttribute()
   {
       return $this->subject->subject_code;
   }
   public function getTeacherNameAttribute()
   {
       return $this->teacher->user->name;
   }
   public function getClassroomNameAttribute()
   {
       return $this->classroom->name;
   }
}

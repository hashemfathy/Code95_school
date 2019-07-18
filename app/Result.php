<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;

class Result extends Model
{
    
    protected $appends = ['status'];

    public function getStatusAttribute(){
        if( $this->full_degree && $this->degree >= 0.5 * $this->full_degree){
            return 'succeed';
        }else if($this->full_degree && $this->degree < 0.5 * $this->full_degree){
            return 'failed';
        }
        
    }
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
   public function scopeClassroomSubjectResult(Builder $q, $classroom_id, $subject_id)
   {
        $q->where(['classroom_id'=>$classroom_id,'subject_id'=>$subject_id]);
   }
}

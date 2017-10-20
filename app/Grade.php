<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function getStudent()
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function getCourse()
    {
        return $this->hasOne('App\Course', 'id', 'course_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function getUser()
    {
        return $this->belongsTo('App\User');
    }

    public function getCourse()
    {
        return $this->hasOne('App\Course', 'id', 'course_id');
    }
}

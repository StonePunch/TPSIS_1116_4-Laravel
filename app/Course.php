<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function getTeacher()
    {
        return $this->hasOne('App\User');
    }

    public function getGrade()
    {
        return $this->hasMany('App\Grade');
    }
}

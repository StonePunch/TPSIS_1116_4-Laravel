<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function getTeacher()
    {
        return $this->hasOne('App\User');
    }
}

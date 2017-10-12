<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function getUser()
    {
        return $this->belongsTo('App\User','id','id');
    }

    public function getCourse()
    {
        return $this->belongsTo('App\Course','id','id');
    }
}

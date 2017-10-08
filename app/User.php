<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','birth_date','schooling','picture','user_type','sex'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getUserType()
    {
        return $this->belongsTo('App\UserType', 'user_type');
    }

    public function getSchooling()
    {
        return $this->belongsTo('App\Schooling', 'schooling');
    }

    public function getCourse()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }
}

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_name','l_name','mobile_number','role','email', 'password','is_superadmin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isSAdmin(){
        return $this->is_superadmin === '1';
    }

    public function isAdmin(){
        return $this->role === 'admin';
    }
    public function isEmployee(){
        return $this->role ===  'employee';
    }
    public function assign_user()
    {
        return $this->hasOne('App\assign_user','user_id');
    }

}

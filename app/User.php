<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Task;
use App\Comment;
use App\Role;
use App\Company;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
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
    
    public function comments(){
        return  $this->hasMany('Comments');
    }
    public function role(){
        return  $this->belongTo('Role');
    }
    public function companies(){
        return  $this->hasMany('Company');
    }
    public function tasks(){
        return  $this->belongToMany('Task');
    }
    public function projects(){
        return  $this->belongToMany('Project');
    }
}

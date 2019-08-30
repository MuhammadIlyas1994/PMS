<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Project;

class Company extends Model
{
    protected $fillable=[ 'user_id'	,'name','description'];
    
    public function user(){
        return  $this->belongTo('User');
    }
    public function projects(){
        return $this->hasMany(Project::class);
    }
}

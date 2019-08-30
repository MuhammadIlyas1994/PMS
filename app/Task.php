<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
use App\User;
use App\Project;

class Task extends Model
{
    protected $fillable=['company_id','project_id' ,'days' ,'hours','name'];
    public function company(){
        return  $this->belongTo('Company');
    }
    public function user(){
        return  $this->belongToMany('User');
    }
    public function project(){
        return  $this->belongTo('Project');
    }
}

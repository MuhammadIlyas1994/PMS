<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
use App\User;

class Project extends Model
{
    protected $fillable=['company_id','days' ,'name' ,'description'];
    public function company(){
        return  $this->belongsTo(Company::class);
    }
    public function user(){
        return  $this->belongsToMany(User::class);
    }
   
}

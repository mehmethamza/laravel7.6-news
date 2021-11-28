<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Kullanici extends Authenticatable
{
    use Notifiable;

    protected $table = "kullanici";
    protected $guarded = [];

    public function favContents(){

        return  $this -> belongsToMany("App\Models\Contents","fav");
    }

    public function comments()
    {
     return  $this->hasMany('App\Models\Comment', 'mail',"email") -> with("content") ;
    }



}

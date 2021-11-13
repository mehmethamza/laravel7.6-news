<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    protected $guarded = [];

    public function child(){
        return $this-> hasMany("App\Models\Category","pid");
    }

    public function contents(){
        return $this -> belongsToMany("App\Models\Contents","caco") ;
    }
}

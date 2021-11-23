<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";
    protected $guarded = [];

    public function child(){
        return $this -> hasMany("App\Models\Comment","pid") -> where("durum","aktif");
    }
}

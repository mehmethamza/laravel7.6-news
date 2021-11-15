<?php

namespace App\Models\panel;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{


    public function category(){
        return $this->belongsToMany('App\Models\Category');
    }
}

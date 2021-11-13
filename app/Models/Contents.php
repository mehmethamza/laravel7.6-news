<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    protected $table = "contents";
    protected $guarded = [];

   public function category(){
       return $this -> belongsToMany(Category::class,"caco");
   }
}

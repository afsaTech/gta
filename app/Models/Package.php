<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

     /*-----------------------------------------------
        PACKAGE BELONGS TO CATEGORY RELATIONSHIP
    -----------------------------------------------*/
    public function category(){
       return $this->belongsTo(Category::class);
    }

    /*-----------------------------------------------
        PACKAGE HAS MANY IMAGES RELATIONSHIP
    -----------------------------------------------*/
    public function images(){
        return $this->hasMany(Image::class,'package_id');
    }
}

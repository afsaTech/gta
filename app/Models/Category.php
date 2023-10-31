<?php

namespace App\Models;

use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    /*-----------------------------------------------
    Category has many package relation
    -----------------------------------------------*/

    public function package(){

       return $this->hasMany(Package::class);
    }
}

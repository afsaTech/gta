<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable=[
        'url',
        'package_id'
    ];

    /*-----------------------------------------------
            IMAGE BELOGS TO PACKAGE RELATIONSHIP
    -------------------------------------------------*/
    public function package(){
        return $this->belongsTo(Package::class,'package_id');
    }
}

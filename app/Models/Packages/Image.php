<?php

namespace App\Models\Packages;

use App\Traits\Auditable;
use App\Traits\CommonMigrationColumns;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use Auditable, CommonMigrationColumns, HasFactory, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
    */
    protected $table = 'package_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'package_id',
        'url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
    */
    protected $hidden = ['rsvd_1', 'rsvd_2', 'rsvd_3', 'rsvd_4', 'rsvd_5'];

    /**
     * A many-to-one relationship.
     * An image belongs to a package.
    */
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

}

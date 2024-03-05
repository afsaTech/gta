<?php

namespace App\Models\Packages;

use App\Traits\Auditable;
use App\Traits\CommonMigrationColumns;
use App\Models\Packages\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use Auditable, CommonMigrationColumns, HasFactory, SoftDeletes;
    
    /**
     * The database table used by the model.
     *
     * @var string
    */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
    */
    protected $hidden = ['rsvd_1', 'rsvd_2', 'rsvd_3', 'rsvd_4', 'rsvd_5'];

    /**
     * Interact with the user's first name.
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value),
        );
    }

    /**
     * Interact with the user's first name.
     */
    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value),
        );
    }

    /**
     * 
     * A one-to-many relationship.
     * A category can have multiple packages.
     * 
    */
    public function packages()
    {
        return $this->hasMany(Package::class, 'category_id');
    }

}

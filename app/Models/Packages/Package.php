<?php

namespace App\Models\Packages;

use App\Traits\Auditable;
use App\Models\Packages\Category;
use App\Traits\CommonMigrationColumns;
use App\Traits\PackageAttributesTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use Auditable, CommonMigrationColumns, HasFactory, PackageAttributesTrait, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
    */
    protected $table = 'packages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'size',
        'days',
        'nights',
        'regular_price',
        'sales_price',
        'discount',
        'region',
        'destination',
        'date',
        'keyword',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['rsvd_1', 'rsvd_2', 'rsvd_3', 'rsvd_4', 'rsvd_5'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime',
        'is_published' => 'boolean',
        'regular_price' => 'decimal:2',
        'sales_price' => 'decimal:2'
    ];

    /**
     * Get and set the package's title attribute, ensuring it is capitalized when retrieved.
     */
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value),
        );
    }

    /**
     * Get and set the package's description attribute, ensuring it is capitalized when retrieved.
     */
    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value),
        );
    }

    /**
     * Get and set the package's destination attribute, ensuring it is capitalized when retrieved.
     */
    protected function destination(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value),
        );
    }

    /**
     * Get and set the package's region attribute, ensuring it is capitalized when retrieved.
     */
    protected function region(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value),
        );
    }

    /**
     * A one-to-one relationship.
     * A package belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * A one-to-many relationship.
     * A package has one or many images.
     */
    public function images()
    {
        return $this->hasMany(Image::class, 'package_id');
    }

}

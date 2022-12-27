<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    public const IMG_FOLDER = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'logo'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s'
    ];

    /**
     * Retrives products for current category
     * 
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    
    public function logo(): Attribute
    {
        return Attribute::make(
            get: fn($value) => self::IMG_FOLDER . '/' . $value
        );
    }
}

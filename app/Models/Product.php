<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name', // The field you want to use for generating the slug
            ],
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productimages()
    {
        return $this->hasMany(Productimage::class);
    }

    public function combinations()
    {
        return $this->hasMany(Productcombination::class);
    }

    public function productreviews()
    {
        return $this->hasMany(Productreview::class);
    }

    public function qrCodes(): HasMany
    {
        return $this->hasMany(ProductQrCode::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}

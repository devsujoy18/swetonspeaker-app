<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory, Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name', // The field you want to use for generating the slug
            ],
        ];
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function productimages(){
        return $this->hasMany(Productimage::class);
    }

    public function combinations(){
        return $this->hasMany(Productcombination::class);
    }

    public function productreviews(){
        return $this->hasMany(Productreview::class);
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}

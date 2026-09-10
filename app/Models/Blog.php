<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, Sluggable;

    protected $attributes = [
        'show_main_image_on_details' => true,
    ];

    protected $casts = [
        'publish_date' => 'date',
        'show_main_image_on_details' => 'boolean',
    ];

    /**
     * Return the sluggable configuration array for this model.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title', // The field you want to use for generating the slug
            ],
        ];
    }

    public function blogimages()
    {
        return $this->hasMany(Blogimage::class);
    }

    public function blogreviews()
    {
        return $this->hasMany(Blogreview::class);
    }
}

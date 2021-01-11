<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;

class Product extends Model
{
    use HasSlug;

    protected $fillable = ['name', 'description', 'body', 'price', 'slug'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function store()
    {
        return $this->belongsTo(\App\Store::class);
    }

    public function categories()
    {
        return $this->belongsToMany(\App\Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}

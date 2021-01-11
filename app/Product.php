<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'body', 'price', 'slug'];

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

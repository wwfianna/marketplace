<?php

namespace App;

use App\Notifications\StoreReceiveNewOrder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;

class Store extends Model
{
    use HasSlug;

    protected $fillable = ['name', 'description', 'phone', 'mobile_phone', 'logo', 'slug'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->belongsToMany(UserOrder::class);
    }

    public function notifyStoreOwners($storesId)
    {
        $stores = $this->whereIn('id', $storesId)->get();

        $stores->map(function ($store) {
            return $store->user;
        })->each->notify(new StoreReceiveNewOrder());
    }
}

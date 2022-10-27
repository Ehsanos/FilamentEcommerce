<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Product extends Model  implements HasMedia
{

    use HasFactory,InteractsWithMedia;

    protected $guarded = [];

    public function category(): BelongsToMany
    {
//        return $this->belongsToMany(Category::class);
        return $this->belongsToMany(Category::class);
    }

    public function coupons(): HasMany
    {
        return $this->hasMany(Coupon::class);
    }

    public function image()
    {
        if ($this->hasMedia('products')) {
            return $this->getFirstMediaUrl('products');
        }
    }
}

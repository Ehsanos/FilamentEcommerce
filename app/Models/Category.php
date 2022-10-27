<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded = [];
    protected $fillable=[

    ];


    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function coupons(): HasMany
    {
        return $this->hasMany(Copuon::class);
    }



    public function image(){
        if($this->hasMedia('categories')){
            return $this->getFirstMediaUrl('categories');
        }

    }


}

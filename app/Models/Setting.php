<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $guarded = [];
    public function getNameAttribute(): string
    {
        return $this->{'name_' . app()->getLocale()};
    }

    public function getAddressAttribute(): string
    {
        return $this->{'address_' . app()->getLocale()};
    }
    public function getImgAttribute(){
        if($this->hasMedia('settings')){
            return $this->getFirstMediaUrl('settings');
        }

    }

    public function getInfoAttribute(): string
    {
        return $this->{"info_".app()->getLocale()};

    }

}

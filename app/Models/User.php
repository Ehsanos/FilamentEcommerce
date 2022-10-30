<?php

namespace App\Models;


use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;
use Lab404\Impersonate\Models\Impersonate;


class User extends Authenticatable implements FilamentUser
{


    use HasApiTokens, HasFactory, Notifiable,HasRoles;


    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    protected $guarded = [];
    protected $hidden = [
        'password',
        'remember_token',

    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);

    }

    public function coupon(): HasMany
    {
        return $this->hasMany(Coupon::class);

    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function image()
    {
        if ($this->hasMedia('users')) {
            return $this->getFirstMediaUrl('users');
        }

    }

//    public function roles(){
//        return 1;
//
//    }

    public function canAccessFilament():bool{
        return str_ends_with($this->email,'.com');

    }

}

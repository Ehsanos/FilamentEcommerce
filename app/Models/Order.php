<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use HasFactory;
    protected $guarded = [];
//    public function check_out(){
//        return $this->belongsTo([Product::class,User::class,Coupon::class,Country::class,Ship::class],'');
//    }

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


//    public  function coupon(): BelongsTo
//    {
//        return $this->belongsTo(Coupon::class);
//    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function cites(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

}

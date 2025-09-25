<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Shop extends Model
{
    protected $fillable = [
        'shop_name',
        'shop_image',
        'description',
    ];
    //
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}

//how it will be used


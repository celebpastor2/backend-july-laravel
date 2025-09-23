<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Tag extends Model
{
    //
    public function products(){
        return $this->belongsTo(Product::class);
    }
}

/**
 * $tag = Tag::find(1);
 * $products = $tag->products();
 */

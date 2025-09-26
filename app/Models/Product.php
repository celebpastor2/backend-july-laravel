<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Gallery;

class Product extends Model
{
     protected $fillable = [
        'name',
        'description',
        'price'
    ];
    //products
    protected $table = "products";
    protected $primaryKey = "id";

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsTo(Tag::class);
    }

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function gallery(){
        return $this->hasMany(Gallery::class);
    }
}

/**
 * $product = Product::find(1);
 * $product->category;
 * 
 */

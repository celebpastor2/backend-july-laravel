<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function create(Request $request){
        $name = $request->post("product_name");
        $price = $request->post("price");
        $description = $request->post("description");
        $user_id = $request->post("user_id");
        $image  = $request->file("image")->store("image", "public");

        $product = Product::create([
            'name' => $name,
            'description' => $description,
            'price' => $price
        ]);//CREATE
        $product->user_id = $user_id;
        $product->image = $image;
        $product->user_id = $user_id;
        $product->user_id = $user_id;
        $product->user_id = $user_id;
        $product->user_id = $user_id;//update method 
        $product->save();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Gallery;

class ProductController extends Controller
{
    //
    public function create(Request $request){
        $name = $request->post("product_name");
        $price = $request->post("price");
        $description = $request->post("description");
        $user_id = $request->post("user_id");
        $image  = $request->file("image")->store("image", "public");
        $images = $request->files("gallery")->store("image", "public");

        $product = Product::create([
            'name' => $name,
            'description' => $description,
            'price' => $price
        ]);//CREATE
        $product->user_id = $user_id;
        $product->image = $image;

        foreach($images as $image){
            Gallery::create([
                'image' => $image,
                'product_id'    => $product->id
            ]);
        }
   //update method 
        $product->save();
    }

    public function product(Request $request){
        return view("create-product");
    }

    public function shop(Request $request){
        $products = Product::all()->skip(15)->limit(15);//impact performs
        $user   = auth()->user();//returns null if the user is logged in and User Object if logged
        return view("shop", [
            'products' => $products,
            'user'      => $user
        ]);
    }

    public function search(Request $request){

    }

    public function single_product(Request $request){

        try {
            $id         = $request->route("id");
            $product    = Product::find($id);//return null if product is not found
            $user       = auth()->user();

            if($product){
                return view("single", [
                    'product'   => $product,
                    'user'      => $user
                ]);
            } else {
                return abort(404, "Product not found");
            }
            
        } catch(Exception $e){
            $message = $e->getMessage();
            return view("error", [
                "message"   => $message
            ]);
        }
        
    }
}

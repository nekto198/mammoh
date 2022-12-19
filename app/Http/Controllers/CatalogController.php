<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class CatalogController extends Controller
{
    public function catalog($slug = ''){

        if(empty($slug)){

            $products = Product::all();
        }
        else {

            $category = Category::where('slug', $slug)->firstOrFail();
            $products = $category->products();
        }

        return view('product' ,compact('products'));
    }


    public function product($slug, $slug_product){

        $product = Product::where('slug', $slug_product)->first();
        if(is_null($product) || is_null($product->category()->slug != $slug ) ) abort(404);

        return view('product' ,compact('product'));
    }
}

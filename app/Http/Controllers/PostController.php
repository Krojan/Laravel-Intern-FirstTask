<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $products=Product::latest()->take(3)->get();
        $users=User::all();
        $categories=Category::all();
        $banners=Banner::all();
//      dd($products[1]->image_name);
        return view('landing', compact('products', 'categories', 'users', 'banners'))
            ->with('user_count', $users->count())
            ->with('product_count', Product::all()->count())
            ->with('categories_count', $categories->count());
    }
}

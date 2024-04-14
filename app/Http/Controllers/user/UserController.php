<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Opinion;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        $categories      = Category::all();
        $latest_products = Product::latest()->take(4)->get(); 
        $products_offer  = Product::where('offer','1')->latest()->take(3)->get(); 
        $opinions        = Opinion::all(); 
        return view('user.home', get_defined_vars());
    }
   ////////////////////////////////////
    public function showProducts($id)
    {
        $products = Product::where('category_id',$id)->get();
        return view("user.showProduct", get_defined_vars());
    }
}

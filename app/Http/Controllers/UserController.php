<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\product;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        $products = product::orderBy('created_at', 'desc')->paginate(8);
        $categories = category::all();
        return view('home', compact('products','categories'));
    }
    public function shop(){
        $products = product::orderBy('created_at', 'desc')->paginate(8);
        $categories = category::all();
        return view('shop', compact('products','categories'));
    }
    public function product_details($id){
        $product = product::find($id);
        return view('product_details',compact('product'));

      
    }
}

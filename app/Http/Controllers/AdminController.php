<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\product;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function fun_categories(){
        $categories = category::all();
        return view('admin.Categories',compact('categories'));
    }
    public function add_categories(Request $request){
        $category = new category;
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->back();

    }
    public function delete_category($id){
        $category = category::find($id);
        $category->delete();

        return redirect()->back();

    }

    public function add_product(){
        $categories = category::all();
        return view('admin.add_product',compact('categories'));

    }

    public function submit_product(Request $request){
        $product = new product;
        $product->title = $request->titlee;
        $product->description = $request->product_description;
        $product->category = $request->product_category;
        $product->price = $request->price;
        $product->reseller_price = $request->reseller_price;
        $product->discount_price = $request->discount_price;
        
        $product->quantity = $request->quantity;
        $product->save();

        return redirect()->back();

    }
}

<?php

namespace App\Http\Controllers;
use App\Models\category;

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
}

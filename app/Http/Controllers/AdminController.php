<?php

namespace App\Http\Controllers;
use App\Models\category;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function fun_categories(){
        return view('admin.Categories');
    }
    public function add_categories(Request $request){
        $category = new category;
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->back();

    }
}

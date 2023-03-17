<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
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

        //img add
        
            $image = $request->image;
            $extension = $image->getClientOriginalExtension();
            $imagename = time().'.'.$extension;
            $image->move('img_product',$imagename);
            $product->image = $imagename;
        
        $product->save();
        return redirect()->back();
    }

    public function view_product(){
        $products = product::all();
        return view('admin.view_products',compact('products'));

    }
    public function delete_product($id){
        $product = product::find($id);

        $img = 'img_product/'.$product->image;
        File::delete($img);
        $product->delete();

        return redirect()->back();

    }
    


    public function edit_product($id){
    $edit_product = product::find($id);
    $categories = category::all();
    return view('admin.edit_product', compact('edit_product','categories'));
    
    }


    public function edit_submit_product(Request $request,$id){
        $product = product::find($id);
        $product->title = $request->titlee;
        $product->description = $request->product_description;
        $product->category = $request->product_category;
        $product->price = $request->price;
        $product->reseller_price = $request->reseller_price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->quantity;

        //img add
        if($request->image){
            $img = 'img_product/'.$product->image;
            File::delete($img);
            $image = $request->image;
            $extension = $image->getClientOriginalExtension();
            $imagename = time().'.'.$extension;
            $image->move('img_product',$imagename);
            $product->image = $imagename;
        }
        $product->save();
        return redirect('/view_product');
    }

     public function approve_product($id){
        $product = product::find($id);
        $product->status = 'approved';
        $product->save();

        return redirect()->back();

    }
     public function unapprove_product($id){
        $product = product::find($id);
        $product->status = 'unapproved';
        $product->save();

        return redirect()->back();

    }


}

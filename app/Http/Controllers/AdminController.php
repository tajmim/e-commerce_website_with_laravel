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
        $product->additional_information = $request->additional_information;
        $product->category = $request->product_category;
        $product->price = $request->price;
        $product->reseller_price = $request->reseller_price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->quantity;

        //img add
        if($request->image){
            $image = $request->image;
            $extension = $image->getClientOriginalExtension();
            $imagename = time().'.'.$extension;
            $image->move('img_product',$imagename);
            $product->image = $imagename;
        }

        if($request->image1){
            $image1 = $request->image1;
            $extension = $image1->getClientOriginalExtension();
            $imagename = time().'1'.'.'.$extension;
            $image1->move('img_product',$imagename);
            $product->image1 = $imagename;
        }

        if($request->image2){
            $image2 = $request->image2;
            $extension = $image2->getClientOriginalExtension();
            $imagename = time().'2'.'.'.$extension;
            $image2->move('img_product',$imagename);
            $product->image2 = $imagename;
        }

        if($request->image3){
            $image3 = $request->image3;
            $extension = $image3->getClientOriginalExtension();
            $imagename = time().'3'.'.'.$extension;
            $image3->move('img_product',$imagename);
            $product->image3 = $imagename;
        }


        $product->save();
        return redirect()->back();
    }

    public function view_product(){
        $products = product::all();
        return view('admin.view_products',compact('products'));

    }
    public function delete_product($id){
        $product = product::find($id);

        if($product->image){
            $img = 'img_product/'.$product->image;
            File::delete($img);
        }
        if($product->image1){
            $img = 'img_product/'.$product->image1;
            File::delete($img);
        }
        if($product->image2){
            $img = 'img_product/'.$product->image2;
            File::delete($img);
        }
        if($product->image3){
            $img = 'img_product/'.$product->image3;
            File::delete($img);
        }
        

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
        $product->additional_information = $request->additional_information;
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

        if($request->image1){
            $img1 = 'img_product/'.$product->image1;
            File::delete($img1);
            $image1 = $request->image1;
            $extension = $image1->getClientOriginalExtension();
            $imagename1 = time().'.'.$extension;
            $image1->move('img_product',$imagename1);
            $product->image1 = $imagename1;
        }

        if($request->image2){
            $img2 = 'img_product/'.$product->image2;
            File::delete($img2);
            $image2 = $request->image2;
            $extension = $image2->getClientOriginalExtension();
            $imagename2 = time().'.'.$extension;
            $image2->move('img_product',$imagename2);
            $product->image2 = $imagename2;
        }

        if($request->image3ss){
            $img3ss = 'img_product/'.$product->image3ss;
            File::delete($img3ss);
            $image3ss = $request->image3ss;
            $extension = $image3ss->getClientOriginalExtension();
            $imagename3ss = time().'.'.$extension;
            $image3ss->move('img_product',$imagename3ss);
            $product->image3ss = $imagename3ss;
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

<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

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
    public function request_for_reseller(){
        $id = Auth::guard('web')->user()->id;
        $user = User::find($id);
        $user->usertype = 'request_for_reseller';
        $user->save();
        return redirect()->back();
    }
    public function add_to_cart(Request $request , $product_id){
        if(auth::guard('web')->user()){
            $cart = new Cart;
            $product = Product::find($product_id);

            $cart->user_id = Auth::guard('web')->user()->id;
            $cart->user_name = Auth::guard('web')->user()->name;

            $cart->product_id = $product->id;
            $cart->product_title = $product->title;
            $cart->product_image = $product->image;
            $cart->quantity = $request->quantity;
            if(Auth::guard('web')->user()->usertype == 'reseller'){
                $cart->price = ($product->reseller_price);
            }
            else{
                $cart->price = ($product->price);
            }
            $cart->save();

            return redirect()->back();


        }else{
            return redirect()->route('login');

        }


    }
    public function view_cart(){
        $user_id = Auth::guard('web')->user()->id;
        $carts = Cart::where('user_id', $user_id)->get();
        return view('cart',compact('carts'));
    }
}

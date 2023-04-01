<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\product;
use App\Models\User;
use App\Models\Cart;
use App\Models\wish;
use App\Models\order;
use App\Models\review;
use App\Models\billing_address;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        $products = product::orderBy('created_at', 'desc')->paginate(8);
        $categories = category::all();

        if( Auth::guard('web')->user() ){
            $carts = cart::where('user_id',Auth::guard('web')->user()->id)->get();
            $wishes = wish::where('user_id',Auth::guard('web')->user()->id)->get();
            return view('home', compact('products','categories','carts','wishes'));
        }
        else{
            return view('home', compact('products','categories'));        
        }
    }
    public function shop(){
        $products = product::orderBy('created_at', 'desc')->paginate(8);
        $categories = category::all();
        if( Auth::guard('web')->user() ){
            $carts = cart::where('user_id',Auth::guard('web')->user()->id)->get();
            $wishes = wish::where('user_id',Auth::guard('web')->user()->id)->get();
            return view('shop', compact('products','categories','carts','wishes'));
        }
        else{
            return view('shop', compact('products','categories'));
        }
        
    }
    public function product_details($id){
        $product = product::find($id);
        $reviews = review::where('product_id' , $id)->get();
        $like_products = product::all();
        if( Auth::guard('web')->user() ){
            $carts = cart::where('user_id',Auth::guard('web')->user()->id)->get();
            $wishes = wish::where('user_id',Auth::guard('web')->user()->id)->get();
            return view('product_details',compact('product','like_products','reviews','carts','wishes'));
        }
        else{
           return view('product_details',compact('product','like_products','reviews'));
        }

      
    }
    public function request_for_reseller(){
        $id = Auth::guard('web')->user()->id;
        $user = User::find($id);
        $user->usertype = 'request_for_reseller';
        $user->save();
        return redirect()->back();
    }
    public function add_to_cart(Request $request , $product_no){
        if(auth::guard('web')->user()){
            $cart = new Cart;
            $product = Product::find($product_no);

            $found_cart = Cart::where('product_id',$product_no)->where('user_id',Auth::guard('web')->user()->id)->first();
            if($found_cart){
                $found_cart->quantity += $request->quantity;
                $found_cart->save();
            }
            else{
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
            }

            return redirect()->back();


        }else{
            return redirect()->route('login');

        }
    }
    public function view_cart(){
        $user_id = Auth::guard('web')->user()->id;
        $carts = Cart::where('user_id', $user_id)->get();
        $wishes = wish::where('user_id',Auth::guard('web')->user()->id)->get();
        return view('cart',compact('carts','wishes'));


    }
    public function add_to_wishlist($product_id){
        $customer_id = Auth::guard('web')->user()->id;
        $productt = product::find($product_id);
        $wish = new wish;

        $wish->user_id = $customer_id;
        $wish->user_name = Auth::guard('web')->user()->name;
        $wish->product_id = $productt->id;
        $wish->product_title = $productt->title;
        $wish->product_image = $productt->image;
        $wish->price = $productt->price;
        if(Auth::guard('web')->user()->usertype=='reseller'){
            $wish->price = $productt->reseller_price;
        }

        $wish->save();
        return redirect()->back();

    }
    public function view_wishlist(){
        $user_no = Auth::guard('web')->user()->id;
        $wishes = wish::where('user_id',$user_no)->get();
        
         if( Auth::guard('web')->user() ){
            $carts = cart::where('user_id',Auth::guard('web')->user()->id)->get();
            return view("view_wish", compact('wishes','carts'));
        }
        else{
          return view("view_wish", compact('wishes'));
        }
    }
    public function delete_cart($id){
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
    public function delete_wish($id){
        $wish = wish::find($id);
        $wish->delete();
        return redirect()->back();
    }

    public function checkout(){
        $user_id = Auth::guard('web')->user()->id;
        $carts = Cart::where('user_id', $user_id)->get();
        $wishes = wish::where('user_id',Auth::guard('web')->user()->id)->get();
        $found_billing = billing_address::where('user_id',Auth::guard('web')->user()->id)->first();
        return view('checkout',compact('carts','wishes','found_billing'));
    }
    public function proceed_to_checkout(Request $request){
        $user_id = Auth::guard('web')->user()->id;
        $carts = Cart::where('user_id', $user_id)->get();
        foreach($carts as $cart){
            $order = new order;
            $order->user_id = $user_id;
            $order->first_name = $request->f_name;
            $order->last_name = $request->l_name;
            $order->company_name = $request->company_name;
            $order->country = $request->country;
            $order->street_address = $request->street_add;
            $order->city = $request->city;
            $order->state = $request->state;
            $order->postcode = $request->postcode;
            $order->phone_no = $request->phone;
            $order->email = $request->email;
            $order->note = $request->note;
            
            $order->product_no = $cart->product_id;
            $order->product_title = $cart->product_title;
            $order->product_image = $cart->product_image;
            $order->product_quantity = $cart->quantity;
            $order->product_price = $cart->price;

            $order->order_status = 'pending';
            $order->save();
            $cart->delete();


             }
            return redirect('/track_order');

    }
    public function track_order(){
        $user_id = Auth::guard('web')->user()->id;
        $orders = order::where('user_id', $user_id)->get();
        $carts = cart::where('user_id',Auth::guard('web')->user()->id)->get();
        $wishes = wish::where('user_id',Auth::guard('web')->user()->id)->get();
        return view('track_order',compact('orders','carts','wishes'));
    }
    public function submit_review(Request $request, $id){
        $order = order::find($id);
        $review = new review;

        $review->product_id = $order->product_no;
        $review->product_title = $order->product_title;
        $review->user_id = $order->user_id;
        $review->first_name = $order->first_name;
        $review->last_name = $order->last_name;
        $review->email = $order->email;
        $review->review = $request->review;
        $review->save();
        $order->order_status = 'reviewed';
        $order->save();
        return redirect()->back();


    }

    public function billing_address(){

        $carts = Cart::where('user_id', Auth::guard('web')->user()->id)->get();
        $wishes = wish::where('user_id',Auth::guard('web')->user()->id)->get();

        $found_billing = billing_address::where('user_id',Auth::guard('web')->user()->id)->first();
        if($found_billing){
            return view('edit_billing_add',compact('carts','wishes','found_billing'));
        }
        else{
            return view('billing_address_save',compact('carts','wishes'));
        }


        
    }
    public function add_address(Request $request){
            $b_add = new billing_address;
            $b_add->user_id = Auth::guard('web')->user()->id;
            $b_add->first_name = $request->f_name;
            $b_add->last_name = $request->l_name;
            
            $b_add->country = $request->country;
            $b_add->street_address = $request->street_add;
            $b_add->city = $request->city;
            $b_add->state = $request->state;
            $b_add->postcode = $request->postcode;
            $b_add->phone_no = $request->phone;
            $b_add->email = $request->email; 
            $b_add->save();
            return redirect()->back();
    }
    public function edit_address(Request $request,$id){
            $b_add = billing_address::find($id);
            $b_add->user_id = Auth::guard('web')->user()->id;
            $b_add->first_name = $request->f_name;
            $b_add->last_name = $request->l_name;
            
            $b_add->country = $request->country;
            $b_add->street_address = $request->street_add;
            $b_add->city = $request->city;
            $b_add->state = $request->state;
            $b_add->postcode = $request->postcode;
            $b_add->phone_no = $request->phone;
            $b_add->email = $request->email; 
            $b_add->save();
            return redirect()->back();
    }

}

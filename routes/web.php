<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/dashboard',[UserController::Class,'home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');


require __DIR__.'/adminauth.php';


// admincontroller

Route::get('/route-categories',[AdminController::Class,'fun_categories']);

Route::post('/add_category',[AdminController::Class,'add_categories']);
Route::get('/delete_cat/{id}',[AdminController::Class,'delete_category']);

Route::get('/add_product',[AdminController::Class,'add_product']);
Route::post('/submit_product',[AdminController::Class,'submit_product']);
Route::get('/view_product',[AdminController::Class,'view_product']);
Route::get('/delete_product/{id}',[AdminController::Class,'delete_product']);
Route::get('/edit_product/{id}',[AdminController::Class,'edit_product']);
Route::post('/edit_submit_product/{id}',[AdminController::Class,'edit_submit_product']);
Route::get('/approve_product/{id}',[AdminController::Class,'approve_product']);
Route::get('/unapprove_product/{id}',[AdminController::Class,'unapprove_product']);
Route::get('/manage_customer',[AdminController::Class,'manage_customer']);
Route::get('/delete_user/{id}',[AdminController::Class,'delete_user']);
Route::get('/approve_user/{id}',[AdminController::Class,'approve_reseller']);
Route::get('/unapprove_user/{id}',[AdminController::Class,'unapprove_reseller']);
Route::get('/manage_editors',[AdminController::Class,'manage_editors']);
Route::get('/delete_editor/{id}',[AdminController::Class,'delete_editor']);
Route::get('/manage_order',[AdminController::Class,'manage_order']);
Route::get('/accept_order/{id}',[AdminController::Class,'accept_order']);
Route::get('/cancel_order/{id}',[AdminController::Class,'cancel_order']);
Route::get('/order_details/{id}',[AdminController::Class,'order_details']);
Route::get('/in_ship/{id}',[AdminController::Class,'in_ship']);
Route::get('/delivered_order/{id}',[AdminController::Class,'delivered_order']);
Route::get('/completed_order',[AdminController::Class,'completed_order']);
// admincontroller end

// usercontroller start
Route::get('/',[UserController::Class,'home']);
Route::get('/shop',[UserController::Class,'shop']);
Route::get('/product_details/{id}',[UserController::Class,'product_details']);
Route::get('/request_for_reseller',[UserController::Class,'request_for_reseller']);
Route::post('/add_to_cart/{product_id}',[UserController::Class,'add_to_cart']);
Route::get('/view_cart',[UserController::Class,'view_cart']);
Route::get('/add_to_wishlist/{product_id}',[UserController::Class,'add_to_wishlist']);
Route::get('/view_wishlist',[UserController::Class,'view_wishlist']);
Route::get('/delete_cart/{id}',[UserController::Class,'delete_cart']);
Route::get('/delete_wish/{id}',[UserController::Class,'delete_wish']);
Route::get('/checkout',[UserController::Class,'checkout']);
Route::post('/proceed_to_checkout',[UserController::Class,'proceed_to_checkout']);
Route::get('/track_order',[UserController::Class,'track_order']);
// usercontroller end
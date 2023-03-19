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
// admincontroller end

// usercontroller start
Route::get('/',[UserController::Class,'home']);
Route::get('/shop',[UserController::Class,'shop']);
Route::get('/product_details/{id}',[UserController::Class,'product_details']);

// usercontroller end
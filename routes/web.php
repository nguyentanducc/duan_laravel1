<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Usercontroller;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Homecontroller::class,'home'])->name('home');
Route::get('/shop', [Homecontroller::class,'shop'])->name('shop');
Route::get('/login', [Usercontroller::class,'login'])->name('login');
Route::post('/login', [Usercontroller::class,'postlogin']);
Route::get('/register', [Usercontroller::class,'register'])->name('register');
Route::post('/register', [Usercontroller::class,'postregister']);
Route::get('/logout', [Usercontroller::class,'logout'])->name('logout');
Route::get('/detail/{slug}', [ProductController::class,'detail'])->name('detail');
// Route::get('/shop', [Homecontroller::class,'shop'])->name('shop');
Route::get('/cart', [CartController::class,'cart'])->name('cart');
Route::get('/thanks', [CartController::class,'thanks'])->name('thanks');

Route::post('/cart', [CartController::class,'checkout']);

Route::prefix('api')->group(function(){
    Route::get('/comments/product/{product_id}',[CommentController::class,'product']);
    Route::resource('/comments', CommentController::class);
    Route::resource('/cart', CartController::class);
});
Route::prefix('admin')->name('admin.')->middleware(AdminMiddleware::class)->group(function(){
    Route::get('/',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/product',[AdminController::class,'product'])->name('product');
    Route::prefix('product')->name('product.')->group(function(){
        Route::get('/add',[AdminController::class,'productAdd'])->name('add'); 
        Route::post('/add',[AdminController::class,'postproductAdd']); 
        Route::get('/edit/{id}',[AdminController::class,'productEdit'])->name('edit'); 
        Route::post('/update/{id}',[AdminController::class,'update'])->name('update'); 
        Route::get('/detail/{id}',[AdminController::class,'productDetail'])->name('detail'); 
        Route::get('/delete/{id}',[AdminController::class,'delete'])->name('delete'); 
    });
    Route::get('/user',[AdminController::class,'user'])->name('user');
    Route::prefix('user')->name('user.')->group(function(){
        Route::get('/edit/{id}',[AdminController::class,'editUser'])->name('edit_U'); 
        Route::post('/update/{id}',[AdminController::class,'updateUser'])->name('update_U'); 
        Route::get('/delete/{id}',[AdminController::class,'deleteUser'])->name('delete_U'); 
    });
    Route::get('/order',[AdminController::class,'order'])->name('order');

});




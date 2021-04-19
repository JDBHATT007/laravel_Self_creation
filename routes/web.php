<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;


Route::get("/",[ProductController::class,'index']);
Route::get('/login', function () {
    return view('login');
});

Route::get('/admindashboard', function () {
    return view('admin/dashboard');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/logout', function () {
    Session()->forget('user');
    return redirect('login');
});

Route::post("/login",[UserController::class,'login']);
Route::post("/register",[UserController::class,'register']);
Route::get("/search",[ProductController::class,'search']);
Route::get("/products",[ProductController::class,'allProducts']);
Route::get("productdetail/{id}",[ProductController::class,'detail']);
Route::post("/add_to_cart",[ProductController::class,'addToCart']);
Route::post("/checkout",[ProductController::class,'checkout']);
Route::post("/ordernow",[ProductController::class,'ordernow']);
Route::get("/cartlist",[ProductController::class,'cartList']);
Route::get("/removecart/{id}",[ProductController::class,'removeCart']);
Route::get("/increaseQuantity/{id}",[ProductController::class,'increaseQuantity']);
Route::get("/decreaseQuantity/{id}",[ProductController::class,'decreaseQuantity']);

Route::get("/me",[UserController::class,'me']);
Route::get("viewOrderDetail/{id}",[ProductController::class,'orderDetail']);
Route::post('/updateProfile',[UserController::class,'updateProfile']);
Route::post('/changePassword',[UserController::class,'changePassword']);
Route::get("/deleteUser/{id}",[UserController::class,'deleteUser']);
Route::post('/addCategory',[ProductController::class,'addCategory']);
Route::get("/deleteCategory/{id}",[ProductController::class,'deleteCategory']);
Route::post('/addBrand',[ProductController::class,'addBrand']);
Route::get("/deleteBrand/{id}",[ProductController::class,'deleteBrand']);
Route::post('/addProduct',[ProductController::class,'addProduct']);
Route::get("/deleteProduct/{id}",[ProductController::class,'deleteProduct']);
Route::get("/category/{id}",[ProductController::class,'categoryProduct']);
Route::get("/brand/{id}",[ProductController::class,'brandProduct']);

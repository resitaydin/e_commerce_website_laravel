<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[AuthController::class, 'checkLogin']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/logout',[AuthController::class, 'logout']);
    Route::controller(UserController::class)->group(function () {
        // User APIs
        Route::get('/userList','listUsers');
        Route::post('/addUser', 'addUser');
        Route::put('/editUser/{id}','editUser');
        Route::delete('/deleteUser/{id}','deleteUser');
    });

    Route::controller(CategoryController::class)->group(function () {
        // Category APIs
           Route::get('/categoryList','listCategories');
           Route::post('/addCategory','addCategory');
           Route::put('/editCategory/{id}','editCategory');
           Route::delete('/deleteCategory/{id}','deleteCategory');
       });
       
    Route::controller(ProductController::class)->group(function () {
        // Product APIs
        Route::get('/productList','listProducts');
        Route::post('/addProduct', 'addProduct');
        Route::put('/editProduct/{id}','editProduct');
        Route::delete('/deleteProduct/{id}','deleteProduct');
    });
});

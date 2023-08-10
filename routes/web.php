<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\userController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\passwordController;


Route::get('/login', [authController::class, 'showLoginPage'])->name('showLoginPage');
Route::post('/login', [authController::class, 'checkLogin'])->name('login');

Route::get('/forgetPassword', [passwordController::class, 'showForgetPasswordPage']) -> name('showForgetPasswordPage');
Route::post('/forgetPassword', [passwordController::class, 'forgetPassword']) -> name('forgetPassword');

Route::get('/resetPassword/{token}', [passwordController::class, 'showResetPasswordPage']) -> name('showResetPasswordPage');
Route::post('/resetPassword/{token}', [passwordController::class, 'resetPassword']) -> name('resetPassword');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () { return redirect('main'); });
    Route::get('/main', function () { return view('main'); })->name('main');

    Route::get('/logout', [authController::class, 'logout'])->name('logout');

    Route::get('/addUser', [userController::class, 'showAddUserPage'])->name('showAddUserPage');
    Route::post('/saveAddUser', [userController::class, 'addUser'])->name('addUser');

    Route::get('/userList',[userController::class, 'listUsers'])->name('showUserListPage');

    Route::get('/editUser/{id}',[userController::class, 'showEditUserPage'])->name('showEditUserPage');
    Route::put('/editUser/{id}',[userController::class, 'editUser']) -> name('editUser');

    Route::post('/deleteUsers',[userController::class, 'deleteUsers'] )->name('deleteUsers');

    Route::get('/deleteUser/{id}', [userController::class, 'deleteUser']) -> name('deleteUser');

    Route::get('/addCategory',[categoryController::class, 'showAddCategoryPage'] )->name('showAddCategoryPage');
    Route::post('/addCategory',[categoryController::class, 'addCategory'] )->name('addCategory');

    Route::get('/categoryList',[categoryController::class, 'listCategories'] )->name('showCategoryListPage');

    Route::get('/editCategory/{id}',[categoryController::class, 'showEditCategoryPage'] )->name('showEditCategoryPage');
    Route::put('/editCategory/{id}',[categoryController::class, 'editCategory']) -> name('editCategory');

    Route::get('/deleteCategory/{id}',[categoryController::class, 'deleteCategory']) -> name('deleteCategory');

    Route::get('/addProduct',[productController::class, 'showAddProductPage'] )->name('showAddProductPage');
    Route::post('/addProduct',[productController::class, 'addProduct'] )->name('addProduct');

    Route::get('/productList',[productController::class, 'listProducts'] )->name('showProductListPage');

    Route::get('/editProduct/{id}',[productController::class, 'showEditProductPage'] )->name('showEditProductPage');
    Route::put('/editProduct/{id}',[productController::class, 'editProduct']) -> name('editProduct');

    Route::get('/deleteProduct/{id}',[productController::class, 'deleteProduct']) -> name('deleteProduct');

});


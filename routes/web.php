<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PasswordController;

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginPage')->name('showLoginPage');
    Route::post('/login', 'checkLogin')->name('login');
});

Route::controller(PasswordController::class)->group(function () {
    // Password Routes
    Route::get('/forgetPassword', 'showForgetPasswordPage') -> name('showForgetPasswordPage');
    Route::post('/forgetPassword', 'forgetPassword') -> name('forgetPassword');

    Route::get('/resetPassword/{token}', 'showResetPasswordPage') -> name('showResetPasswordPage');
    Route::post('/resetPassword/{token}', 'resetPassword') -> name('resetPassword');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () { return redirect('main'); });
    Route::get('/main', function () { return view('main'); })->name('main');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::controller(UserController::class)->group(function () {
        // User Routes
        Route::get('/addUser', 'showAddUserPage')->name('showAddUserPage');
        Route::post('/addUser', 'addUser')->name('addUser');

        Route::get('/userList','listUsers')->name('showUserListPage');

        Route::get('/editUser/{id}','showEditUserPage')->name('showEditUserPage');
        Route::put('/editUser/{id}','editUser') -> name('editUser');

        Route::delete('/deleteUsers','deleteUsers' )->name('deleteUsers');

        Route::get('/deleteUser/{id}', 'deleteUser') -> name('deleteUser');
        Route::get('/userManagement', 'showUserManagementPage') -> name('showUserManagementPage');
    });

    Route::controller(CategoryController::class)->group(function () {
        // Category Routes
        Route::get('/addCategory','showAddCategoryPage')->name('showAddCategoryPage');
        Route::post('/addCategory','addCategory')->name('addCategory');

        Route::get('/categoryList','listCategories')->name('showCategoryListPage');

        Route::get('/editCategory/{id}','showEditCategoryPage')->name('showEditCategoryPage');
        Route::put('/editCategory/{id}','editCategory') -> name('editCategory');

        Route::get('/deleteCategory/{id}','deleteCategory') -> name('deleteCategory');
        Route::get('/categoryManagement', 'showCategoryManagementPage') -> name('showCategoryManagementPage');
    });

    Route::controller(ProductController::class)->group(function () {
        // Product Routes
        Route::get('/addProduct','showAddProductPage')->name('showAddProductPage');
        Route::post('/addProduct', 'addProduct')->name('addProduct');

        Route::get('/productList', 'listProducts')->name('showProductListPage');

        Route::get('/editProduct/{id}', 'showEditProductPage')->name('showEditProductPage');
        Route::put('/editProduct/{id}', 'editProduct') -> name('editProduct');

        Route::get('/deleteProduct/{id}', 'deleteProduct') -> name('deleteProduct');
        Route::get('/productManagement', 'showProductManagementPage') -> name('showProductManagementPage');
    });
    
});


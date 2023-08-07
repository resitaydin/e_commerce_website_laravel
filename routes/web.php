<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\userController;
use App\Http\Controllers\categoryController;

// logout'u get methoduyla yap.

Route::get('/login', function () { return view('user/login'); })->name('login');
Route::post('/login', [authController::class, 'checkLogin'])->name('loginPost');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () { return redirect('main'); });
    Route::get('/main', function () { return view('main'); })->name('main');
    Route::get('/logout', [authController::class, 'logout'])->name('logout');

    Route::get('/addUser', [userController::class, 'showAddUserPage'])->name('showAddUserPage');
    Route::post('/saveAddUser', [userController::class, 'addUser'])->name('addUser');

    Route::get('/userList',[userController::class, 'listUsers'])->name('showUserListPage');

    Route::get('/edit/{id}',[userController::class, 'showEditUserPage'])->name('showEditUserPage');
    Route::put('/edit/{id}',[userController::class, 'editUser']) -> name('editUser');

    Route::post('/deleteUsers',[userController::class, 'deleteUsers'] )->name('deleteUsers');
    Route::get('/deleteUser/{id}',[userController::class, 'showDeleteUserPage'])->name('showDeleteUserPage');
    Route::post('/deleteUser/{id}', [userController::class, 'deleteUser']) -> name('deleteUser');

    Route::get('/addCategory',[categoryController::class, 'showAddCategoryPage'] )->name('showAddCategoryPage');
    Route::post('/addCategory',[categoryController::class, 'addCategory'] )->name('addCategory');
});


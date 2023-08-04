<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\userController;

// login get error.

Route::get('/login', function () { return view('login'); })->name('login');
Route::post('/login', [authController::class, 'checkLogin'])->name('loginPost');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () { return redirect('main'); })->middleware('auth');
    Route::get('/main', function () { return view('main'); })->name('main');
    Route::post('/logout', [authController::class, 'logout'])->name('logout');
    Route::get('/addUser', function() {return view('addUser');})->name('addUser');
    Route::post('/saveAddUser', [userController::class, 'addUser'])->name('saveAddUser');
    Route::get('/userList',[userController::class, 'listUsers'])->name('userList');
    Route::get('/editUser',[userController::class, 'editUser'])->name('editUser');
    Route::get('/deleteUser',[userController::class, 'deleteUser'])->name('deleteUser');
    Route::post('/deleteUsers',[userController::class, 'deleteUsers'] )->name('deleteUsers');
});


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// login get error.

Route::get('/', function () { return view('login'); })->name('login');
Route::post('/login', [UserController::class, 'checkLogin'])->name('loginPost');
Route::get('/main', function () { return view('main'); })->name('main')->middleware('auth');
Route::post('logout', [UserController::class, 'logout'])->name('logout');


<?php

use App\Http\Controllers\AuthContoller;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthContoller::class, 'index']);
Route::post('/login', [AuthContoller::class, 'login'])->name('login');
Route::get('daftar', [AuthContoller::class, 'daftar']);
Route::post('register', [AuthContoller::class, 'register']);
Route::get('lupa-password', [AuthContoller::class, 'lupaPassword']);
Route::get('logout', [AuthContoller::class, 'logout']);

Route::get('/loggedin', [AuthContoller::class, 'loggedin']);

Route::prefix('auth')->name('.auth')->group(function () {
});

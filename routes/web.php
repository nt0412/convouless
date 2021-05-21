<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\newsController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
Auth::routes();

Route::get('/admin', [HomeController::class, 'index'])->name('admin');
Route::resource('/category', CategoryController::class);
Route::resource('/news', newsController::class);

Route::get('/apple', [newsController::class, 'apple']);
Route::get('/form', function () {
    return view('test');
});


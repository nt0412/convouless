<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\newsController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('layout');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/category', CategoryController::class);
Route::resource('/news', newsController::class);


Route::get('posts', function(){
    return view('news.posts');
});

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
// Route::resource('/post', PostController::class);
Route::resource('/news', newsController::class);



Route::post('/news/upload_ckeditor', [newsController::class,'upload_ckeditor']);
Route::get('/news/file_brower', [newsController::class,'file_brower']);
<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\Newshot1Controller;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;

// home page
Route::get('/home', [Newshot1Controller::class, 'showhome']);
Route::get('/', [Newshot1Controller::class, 'showhome']);
// Route::get('/', [Newshot1Controller::class, 'showhome']);

Auth::routes();
// admin page
Route::get('/admin', [HomeController::class, 'index'])->name('admin');
Route::resource('/main-category', MainCategoryController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/news', newsController::class);
Route::resource('/newshot', Newshot1Controller::class);
Route::resource('/footer', FooterController::class);
Route::resource('/author', AuthorController::class);

// trả về kết quả search
Route::get('/search',[SearchController::class,'search'])->name('search');



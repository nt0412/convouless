<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\Newshot1Controller;
use Illuminate\Support\Facades\Auth;

// home page
Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/home', [Newshot1Controller::class, 'index']);
Route::get('/', [Newshot1Controller::class, 'index']);

Auth::routes();
// admin page
Route::get('/admin', [HomeController::class, 'index'])->name('admin');
Route::resource('/main-category', MainCategoryController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/news', newsController::class);

// page read posts with link slug
Route::get('/{slug}', function($slug){
    // $slug = '{slug}';
    // $slug = "ha-noi-them-1-ca-duong-tinh-sars-cov-2-lien-quan-bv-benh-nhiet-doi-tu";
    return view('posts', ['slug' => $slug]);
});

// page show by cate
Route::get('/apple', [newsController::class, 'apple']);
Route::get('/test', function () {
    return view('form_sau_khi_chon_cate');
});


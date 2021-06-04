<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\Newshot1Controller;
use App\Http\Controllers\SearchController;
use App\Models\Newshot1;
use Illuminate\Support\Facades\Auth;

// home page
Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/home', [Newshot1Controller::class, 'showhome']);
Route::get('/', [Newshot1Controller::class, 'showhome']);

Auth::routes();
// admin page
Route::get('/admin', [HomeController::class, 'index'])->name('admin');
Route::resource('/main-category', MainCategoryController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/news', newsController::class);


// page show by cate


Route::get('/post/{slug}', function($slug){
    return view('posts', ['slug' => $slug]);
});


// quản lý các bai viet nổi bật
Route::get('/admin/manager/newshot', [Newshot1Controller::class,'index']);
// quản lý các bai viet nổi bật PREVIEW
Route::get('/admin/manager/newshot/preview', [Newshot1Controller::class,'preview']);
// quản lý các bai viet nổi bật PREVIEW
// Route::get('/admin/manager/newshot/edit', [SearchController::class,'action']);
// Route::post('/admin/manager/newshot/edit', [SearchController::class,'search']);

Route::get('search', [SearchController::class,'getSearch']);
Route::post('search/name', [SearchController::class,'getSearchAjax'])->name('search');




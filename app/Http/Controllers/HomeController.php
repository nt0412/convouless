<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Author;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $count_main_cate = DB::table('tblmain_category')->count();

        $count_news = News::count();
        $count_cate = Category::count();
        $count_author = Author::count();
        $count_user = User::count();
        $hot_news = News::orderBy('news_id', 'DESC')->firstOrFail();
        // $id_author = News::orderBy('author_id','DESC')->firstOrFail();
        $hot_author = Author::where('author_id',1)->firstOrFail();

        // $count_news = News::count();
        // $count_news = News::count();
        // echo $count_news;

        return view('admin')->with(compact('count_news','count_cate','count_author','count_main_cate','count_user','hot_news','hot_author'));
    }
}

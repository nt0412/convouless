<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Newshot1;
use App\Models\News;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class SearchController extends Controller
{
    public function search(){
        $search_name = $_GET['query'];
        $news = News::get();
        $list_cate = Category::where('category_name','LIKE','%'. $search_name.'%')->paginate(5);
        $list_author = Author::where('author_display_name','LIKE','%'. $search_name.'%')->paginate(5);
        $list_news = News::where('news_title','LIKE','%'. $search_name.'%')->paginate(25);
        $authors =Author::get();
        return view('enduser.page_search')->with(compact('list_news','list_cate','list_author','authors','news','search_name'));
    }
}

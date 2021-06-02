<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Newshot1;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;

class Newshot1Controller extends Controller
{
    public function showhome(){

        $newshots = Newshot1::orderBy('id')->get();
        // $newshots = News::has('news_id')->get();

        $newshot1s = $newshots;
        return view('home')->with(compact('newshot1s'));
        // resources\views\home.blade.php
    }

    public function index(){

        $newshots = Newshot1::join('tblnews', 'tblnews.news_id', '=', 'tblnewshot1.news_id' )->get();

        // $newshots = News::has('news_id')->get();

        $newshot1s = $newshots;
        return view('admincp.newshot1.index')->with(compact('newshot1s'));
        // resources\views\home.blade.php
    }

    public function destroy($id)
    {
        Newshot1::find($id)->delete();
        return redirect()->back()->with('status', 'Message: Deleted success');
    }

    public function preview(){
        $newshots = Newshot1::join('tblnews', 'tblnews.news_id', '=', 'tblnewshot1.news_id' )->get();

        // $newshots = News::has('news_id')->get();

        $newshot1s = $newshots;
        return view('admincp.newshot1.preview')->with(compact('newshot1s'));
    }

    public function edit(){
        $list_news = News::orderBy("date_posted","DESC")->get();
        $list_newshot1 = Newshot1::get();
        $list_author = Author::get();
        return view('admincp.newshot1.edit')->with(compact('list_news', "list_newshot1", 'list_author'));
    }


}

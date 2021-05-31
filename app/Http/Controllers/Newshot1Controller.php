<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Newshot1;


class Newshot1Controller extends Controller
{
    public function index(){

        $newshots = Newshot1::orderBy('id')->get();
        // $newshots = News::has('news_id')->get();

        $newshot1s = $newshots;
        return view('home')->with(compact('newshot1s'));
        // resources\views\home.blade.php
    }
}

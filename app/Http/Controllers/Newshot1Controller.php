<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\newsController;
use App\Http\Controllers\CategoryController;
use App\Models\News;
use App\Models\Category;
use App\Models\Author;
use App\Models\Newshot1;

class Newshot1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newshots = Newshot1::join('tblnews', 'tblnews.news_id', '=', 'tblnewshot1.news_id' )->get();
        $newshot1s = $newshots;
        return view('admincp.newshot1.index')->with(compact('newshot1s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list_news = News::orderBy("date_posted","DESC")->get();
        $list_newshot1 = Newshot1::get();
        $list_author = Author::get();
        return view('admincp.newshot1.edit')->with(compact('list_news', "list_newshot1", 'list_author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // thiếu cái lệnh

        return view('admincp.newshot1.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




    public function showhome(){

        $newshots = Newshot1::orderBy('id')->get();
        // $newshots = News::has('news_id')->get();

        $newshot1s = $newshots;
        return view('home')->with(compact('newshot1s'));
        // resources\views\home.blade.php
    }

    public function preview(){
        $newshots = Newshot1::join('tblnews', 'tblnews.news_id', '=', 'tblnewshot1.news_id' )->get();

        // $newshots = News::has('news_id')->get();

        $newshot1s = $newshots;
        return view('admincp.newshot1.preview')->with(compact('newshot1s'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\newsController;
use App\Http\Controllers\CategoryController;
use App\Models\News;
use App\Models\Category;
use App\Models\Author;
use App\Models\Newshot1;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Inline\Element\Newline;
use Illuminate\Support\Facades\Http;

class Newshot1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $covid =  Http::get('https://api.apify.com/v2/key-value-stores/EaCBL1JNntjR3EakU/records/LATEST?disableRedirect=true');
        $covid_world =  Http::get('https://api.apify.com/v2/key-value-stores/SmuuI0oebnTWjRTUh/records/LATEST?disableRedirect=true');
        $news = News::paginate(25);
        $newshots = Newshot1::join('tblnews', 'tblnews.news_id', '=', 'tblnewshot1.news_id' )->get();
        $newshot1s = $newshots;
        return view('admincp.newshot1.index')->with(compact('newshot1s','news','covid','covid_world'));
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list_newshot1 = Newshot1::get();
        $list_news = News::where('news_enable', 1)->orderBy('date_updated','DESC')->paginate(25);
        $news_curen = News::where('news_id', $id)->first();
        $cate = Category::get();
        $author = Author::get();
        return view('admincp.newshot1.edit')->with(compact('list_news','id','cate','author','news_curen'));
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
        // dd($request->news_select,$request->news_curen,$id );
        $id_curen = $request->id_curen;
        $news_select = $request->news_select;
        // $news_curen = Newshot1::where('news_id',$id_curen);
        $newshot = Newshot1::where('news_id', $id_curen)->first();
        $newshot->news_id = $news_select;
        // dd($id_curen,$news_select,$newshot);
        $newshot->update();
        return $this->index()->with('status', 'Message: Updated success');

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

        // $newshots = News::has('news_id')->get();
        $news = News::paginate(25);
        $auth = Author::get();
        $newshot1s = Newshot1::orderBy('id')->get();
        $covid =  Http::get('https://api.apify.com/v2/key-value-stores/EaCBL1JNntjR3EakU/records/LATEST?disableRedirect=true');
        $covid_world =  Http::get('https://api.apify.com/v2/key-value-stores/SmuuI0oebnTWjRTUh/records/LATEST?disableRedirect=true');

        return view('home')->with(compact('newshot1s','news','auth','covid','covid_world'));
        // resources\views\home.blade.php
    }

    public function preview(){
        $newshots = Newshot1::join('tblnews', 'tblnews.news_id', '=', 'tblnewshot1.news_id' )->get();

        // $newshots = News::has('news_id')->get();

        $newshot1s = $newshots;
        return view('admincp.newshot1.preview')->with(compact('newshot1s'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class newsController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_news = news::with('category')->orderBy('news_id', 'DESC')->get();
        return view('admincp.news.index')->with(compact('list_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = Category::orderBy('category_id','DESC')->get();
        // echo print_r($cate);
        // foreach ($cate as $key => $value) {
        //     echo $value -> news_title;
        //     echo "\t\n";
        //     echo $value -> posts_id;
        // }
        return view('admincp.news.create')->with(compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'news_title' => 'required|unique:tblnews|max:255',
                'news_slug' => 'required|unique:tblnews|max:255',
                'news_metatile' => 'required',
                'news_summary' => 'required',
                // 'news_img' => 'required',
                'news_content' => 'required',
                'news_enable' => 'required',
            ],
            [
                'news_title.required' => 'Message: Need to fill the Name of posts',
                'news_slug.required' => 'Message: Need to fill the Slug of posts',
                'news_content.required' => 'Message: Need to fill the news_content of posts',
                'news_metatile.required' => 'Message: Need to fill the news_metatile of posts',
                'news_summary.required' => 'Message: Need to fill the news_summary of posts',
                // 'news_img.required' => 'Message: Need to fill the Description of posts',
                // 'news_enable.required' => 'Message: Need to fill the Description of posts',

                'news_title.unique' => 'Message: Choose another Name of posts',
                'news_slug.unique' => 'Message: Choose another Slug of posts',
            ]
        );

        $new_image = "";
        if($request->hasFile("")) {
            $get_image = $request->news_img;
            $path ='public/upload/news/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
            $new_image = $name_image.$timestamp.'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
        }


        $news = new News();
        // echo $news;
        // echo  $data['news_title'];
        $news->news_title = $data['news_title'];
        $news->news_slug = $data['news_slug'];
        $news->news_content = $data['news_content'];
        $news->news_enable = $data['news_enable'];

        $news->news_img = $new_image;
        $news->save();

        return redirect()->back()->with('status', 'Message: Add success');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}

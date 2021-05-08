<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\news;

class newsController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admincp.news.index');
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
        foreach ($cate as $key => $value) {
            echo $value -> news_title;
            echo "\t\n";
            echo $value -> posts_id;
        }
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
                'news_title' => 'required|unique:tblposts',
                'news_slug' => 'required|unique:tblposts',
                // 'news_metatile' => 'unique:tblposts|max:255',
                // 'news_summary' => 'unique:tblposts|max:255',
                'news_img' => 'required|dimensions:min_width:100,min_height:100',
                'news_content' => 'required',
                'news_enable' => 'required',
            ],
            [
                'news_title.required' => 'Message: Need to fill the Name of posts',
                'news_slug.required' => 'Message: Need to fill the Slug of posts',
                'news_title.unique' => 'Message: Choose another Name of posts',
                'news_slug.unique' => 'Message: Choose another Slug of posts',
                'news_content.required' => 'Message: Need to fill the Description of posts',
            ]
        );
        $posts = new news();
        $posts->news_title = $data['news_title'];
        $posts->news_slug = $data['news_slug'];
        $posts->news_content = $data['news_content'];
        $posts->posts_enable = $data['news_enable'];
        $posts->posts_img = $data['news_img'];
        $posts->save();
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

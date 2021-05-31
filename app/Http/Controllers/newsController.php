<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class newsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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
        // return Auth::id();

        $cate = Category::orderBy('category_name', 'ASC')->get();
        // dd();
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
        // dd($request->file('news_img')->getClientOriginalName());
        // return {{asset('images')}};

        $data = $request->validate(
            [
                'news_title' => 'required|unique:tblnews|max:255',
                'news_slug' => 'required|unique:tblnews|max:255',
                'news_metatile' => 'required',
                'news_summary' => 'required',

                'news_img' => 'required',
                'news_content' => 'required',
                'news_enable' => 'required',
            ],
            [
                'news_title.required' => 'Message: Need to fill the Name of post',
                'news_slug.required' => 'Message: Need to fill the Slug of post',
                'news_content.required' => 'Message: Need to fill the Content of post',
                'news_metatile.required' => 'Message: Need to fill the Metatile of post',
                'news_summary.required' => 'Message: Need to fill the Summary of post',
                // 'news_img.required' => 'Message: Need to fill the Description of posts',
                // 'news_enable.required' => 'Message: Need to fill the Description of posts',

                'news_title.unique' => 'Message: Choose another Name of post',
                'news_slug.unique' => 'Message: Choose another Slug of post',
            ]
        );
        // return $data;


        $news = new News();

        $news->news_title = $data['news_title'];
        $news->news_slug = $data['news_slug'];
        $news->news_content = $data['news_content'];
        $news->news_enable = $data['news_enable'];
        $news->category_id = $request->category_id;
        $news->news_metatile = $data['news_metatile'];
        $news->news_summary = $data['news_summary'];
        $news->date_updated = date(now());


        $news->author_id = Auth::id();
        // $news->author_id = 1;

        $image = $request->file('news_img');
        $image->move(public_path('images'), $image->getClientOriginalName());
        $news->news_img = $image->getClientOriginalName();

        $news->save();

        // return redirect()->back()->with('status', 'Message: Success');
        return $this->index()->with('status', 'Message: Updated success');

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
        $news = News::find($id);
        // $list_cate = news::with('category')->get();
        $cate = Category::orderBy('category_name','ASC')->get();

        // print_r ($list_news);
        return view('admincp.news.edit')->with(compact('news', 'cate'));
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
        $data = $request->validate(
            [
                'news_title' => 'required|max:255',
                'news_slug' => 'required|max:255',
                'news_metatile' => 'required',
                'news_summary' => 'required',

                'news_img' => 'required',
                'news_content' => 'required',
                'news_enable' => 'required',
            ],
            [
                'news_title.required' => 'Message: Need to fill the Name of post',
                'news_slug.required' => 'Message: Need to fill the Slug of post',
                'news_content.required' => 'Message: Need to fill the Content of post',
                'news_metatile.required' => 'Message: Need to fill the Metatile of post',
                'news_summary.required' => 'Message: Need to fill the Summary of post',
                // 'news_img.required' => 'Message: Need to fill the Description of posts',
                // 'news_enable.required' => 'Message: Need to fill the Description of posts',

                'news_title.unique' => 'Message: Choose another Name of post',
                'news_slug.unique' => 'Message: Choose another Slug of post',
            ]
        );
        // return $data;




        $news = new News();

        $news = News::find($id);
        $news->news_title = $data['news_title'];
        $news->news_slug = $data['news_slug'];
        $news->news_content = $data['news_content'];
        $news->news_enable = $data['news_enable'];
        $news->category_id = $request->category_id;
        $news->news_metatile = $data['news_metatile'];
        $news->news_summary = $data['news_summary'];
        $news->date_updated = date(now());

        $news->author_id = Auth::id();


        $getnews_img = '';

        if ($request->hasFile('news_img')) {

            //Lưu file vào thư mục public/upload/news_img
            $news_img = $request->file('news_img');
            $getnews_img = time() . '_' . $news_img->getClientOriginalName();
            $destinationPath = public_path('images');
            $news_img->move($destinationPath, $getnews_img);
        }



        $news->news_img = $getnews_img;
        $news->save();
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
        News::find($id)->delete();
        return redirect()->back()->with('status', 'Message: Deleted success');
    }
    //up load file of edit
    public function upload_ckeditor(Request $request)
    {
        $request->upload->move(public_path('uploads/news'), $request->file('upload')->getClientOriginalName());
        // echo $request;
        echo json_encode(array('file_name' => $request->file('upload')->getClientOriginalName()));
    }

    public function file_brower()
    {
        $paths = glob(public_path('uploads/news/*'));
        $fileNames = array();
        foreach ($paths as $path) {
            array_push($fileNames, basename($path));
        }
        $data = array(
            'fileNames' => $fileNames
        );
        return view('admincp.news.file_brower')->with($data);
    }
    public function apple()
    {
        $apple_news = news::with('category')->orderBy('news_id', 'DESC')->get();
        return view('admincp.news.apple')->with(compact('apple_news'));;
    }
}

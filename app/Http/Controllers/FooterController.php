<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = Footer::orderBy('name')->get();
        return view('admincp.footer.index')->with(compact('footer'));
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
        $footer = footer::find($id);
        return view('admincp.footer.edit')->with(compact('footer'));
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
        // dd($request,$request->hasFile('footer_img'));
        // kiểm tra trong reqest có up file không
        $footer = Footer::find($id);

        if ($request->hasFile('footer_img')) {
            $footer->img = $request->footer_img;
        } else {
            $footer->img =  $footer->img;
        }
        $data = $request->validate(
            [
                'footer_name' => 'required',
                'footer_desitions' => 'required',
            ],
            [
                'footer_name.required' => 'Message: Need to fill the Name of post',
                'footer_desitions.required' => 'Message: Need to fill the Slug of post',
            ]
        );


        $footer->name = strtoupper( $data['footer_name']);
        $footer->desitions = $data['footer_desitions'];
        $getfooter_img = '';
        //nếu có file thì thực hiện đổi tên và di chuyển
        if ($request->hasFile('footer_img')) {
            //Lưu file vào thư mục public/upload/news_img
            $destinationPath = public_path('images');
            $footer_img = $request->file('footer_img');
            $getfooter_img = time() . '_' . $footer_img->getClientOriginalName();
            $footer_img->move($destinationPath, $getfooter_img);
            $footer->img = $getfooter_img;
        } else {
            // nếu không thì lấy lai file cũ
            $footer->img =  $footer->img;
        }
// dd($footer);
        $footer->update();
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
}

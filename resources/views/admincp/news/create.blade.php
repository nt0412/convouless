@extends('layouts.app')
@section('content')
@include('layouts.nav')
<style>
    .box {
        color: white;
        font-family: Sans-serif;
    }

    .box input[type="text"] {
        border: 0;
        background: none;
        display: block;
        border: 2px solid goldenrod;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.3s;
    }

    .box input[type="text"]:focus {
        border-color: #cc165c;
    }

    .box button {
        border: 0;
        background: none;
        display: block;
        margin: 5px auto;
        text-align: center;
        border: 2px solid goldenrod;
        padding: 10px 40px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.3s;
    }

    .box button:hover {
        background-color: goldenrod;
        border-color: black;
    }

    .custom-select {
        border: 2px solid goldenrod;
        border-radius: 24px;
        width: 10rem;
    }

    .textarea {
        /* box-sizing: padding-box; */
        overflow: hidden;
        /* demo only: */
        padding: 10px;
        width: 250px;
        font-size: 14px;
        margin: 50px auto;
        display: block;
        border-radius: 10px;
        overflow: hidden;
        border: 6px solid #556677;
    }
</style>

<body style="background-color: black;">
    <div class="card" style="background-color: black; color: whitesmoke;">
        <div class="container">
            <div class="card-header" style="color: gold; text-align: center; border-bottom: whitesmoke solid 2px;">
                <h2>Add Post</h2>
            </div>
        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form class="box" method="POST" action="{{route('news.store')}}"  enctype="multipart/form-data" style="padding: 0 5%;">
            @csrf
            <div class="form-group">
                <label>Post's Name <span class="attention">*</span></label>
                <input type="text" class="form-control" value="{{old('news_title')}}" onkeyup="ChangeToSlug();" id="slug" name="news_title" placeholder="Posts's name">
            </div>
            <div class="form-group">
                <label>Post's Slug <span class="attention">*</span></label>
                <input type="text" class="form-control" value="{{old('news_slug')}}" id="convert_slug" name="news_slug" placeholder="Posts's slug">
            </div>
            <div class="form-group">
                <label>Post's Metatile <span class="attention">*</span></label>
                <input type="text" class="form-control" value="{{old('news_metatile')}}" name="news_metatile" placeholder="Posts's name">
            </div>
            <div class="form-group">
                <label>Post's Summary <span class="attention">*</span></label>
                <input type="text" class="form-control" value="{{old('news_summary')}}" name="news_summary" placeholder="Posts's name">
            </div>

            <div class="form-group content">
                <label>Post's Content <span class="attention">*</span></label>
                <textarea class=" ckeditor form-control" name="news_content" placeholder="Content" cols="30" rows="10">{{old('news_content')}}</textarea>

            </div>

            <div class="form-group">
                <label>Post's Category</label>
                <select class="custom-select" name="category_id">
                    @foreach($cate as $key => $muc)
                    <option value="{{$muc->category_id}}">{{$muc->category_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Choose spotlight image <span class="attention">*</span></label>
                <input class="form-control-file" type="file" accept="image/*" name="news_img">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select class="custom-select" name="news_enable">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
            </div>

            <button type="submit" class="btn btn-dark btn-outline-warning" name="btn-add">Add</button>
        </form>
</body>

<script>
CKEDITOR.replace('news_content', {
            language: 'vi',
            filebrowserBrowseUrl: '{{ asset('/public/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('/public/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('/public/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flas') }}h'

        });

    function autosize() {
        var el = this;
        setTimeout(function() {
            el.style.cssText = 'height:auto; padding:0';
            // for box-sizing other than "content-box" use:
            // el.style.cssText = '-moz-box-sizing:content-box';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        }, 0);
    }
</script>

@endsection

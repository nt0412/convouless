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


            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Post's Category</label>
                        <select class="custom-select" name="category_id">
                            @foreach ($cate as $key => $muc)
                                <option value="{{ $muc->category_id }}">{{ $muc->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Choose image</label>
                        <input type="file" accept="image/*" name="news_img" onchange="loadFile(event)">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <select class="custom-select" name="news_enable">
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select>
                    </div>
                </div>

                    <div class="col-6 ">
                        <img class="tex" id="output" style="border: 2px #38c172 solid;" height="172px" src="#" alt="">
                        {{-- <p>{{$news->news_img}}</p> --}}
                    </div>
                </div>
                <div class="col-12">

                    <button type="submit" class="btn btn-dark btn-outline-warning" name="btn-add">Add</button>
                </div>
            </div>

        </form>
</body>

<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };

</script>
@endsection

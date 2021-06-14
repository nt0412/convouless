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
        background-color: whitesmoke;
        width: 10rem;
    }
</style>
<body style="background-color: black;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #343a40; color: whitesmoke;">
                    <div class="card-header" style="color: gold; text-align: center; border-bottom: 2px solid white;">
                        <h2>Edit Category</h2>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $errors)
                            <li>{{$errors}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form class="box" method="POST" action="{{route('category.update',[$cate->category_id])}}">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label>Category's name</label>
                                <input type="text" class="form-control" value="{{$cate->category_name}}" onkeyup="ChangeToSlug();" id="slug" name="category_name" placeholder="Category's name">
                            </div>

                            <div class="form-group">
                                <label>Category's Slug</label>
                                <input type="text" class="form-control" value="{{$cate->category_slug}}" id="convert_slug" name="category_slug" placeholder="Slug's name">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" value="{{$cate->category_description}}" id="exampleInputEmail1" name="category_description" placeholder="Description">
                            </div>

                            <div class="form-group">
                                <label>Main Category</label>
                                <select class="custom-select" name="main_cate_id">
                                    @foreach($main_cate as $key => $muc)
                                    <option value="{{$muc->main_cate_id}}">{{$muc->main_cate_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="custom-select" name="category_enable">
                                    @if($cate->category_enable==1)
                                    <option selected value="1">Enable</option>
                                    <option value="0">Disenable</option>
                                    @elseif($cate->category_enable==0)
                                    <option value="1">Enable</option>
                                    <option selected value="0">Disenable</option>
                                    @endif
                                </select>
                            </div>

                            <button type="submit" class="btn btn-dark btn-outline-warning" name="btn-add">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection

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
    }
</style>

<body style="background-color: black;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #343a40; color: whitesmoke;">
                    <div class="card-header" style="color: gold; text-align: center;">
                        <h2>Add Category</h2>
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
                        <form class="box" method="POST" action="{{route('category.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category's name</label>
                                <input type="text" class="form-control" value="{{old('category_name')}}" onkeyup="ChangeToSlug();" id="slug" name="category_name" placeholder="Category's name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Category's Slug</label>
                                <input type="text" class="form-control" value="{{old('category_slug')}}" id="convert_slug" name="category_slug" placeholder="Slug's name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <input type="text" class="form-control" value="{{old('category_description')}}" id="exampleInputEmail1" name="category_description" placeholder="Description">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Enable</label>
                                <select class="custom-select" name="category_enable">
                                    <option value="1" style="color: green;">Enable</option>
                                    <option value="0" style="color: red;">Disenable</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-dark btn-outline-warning" name="btn-add">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection

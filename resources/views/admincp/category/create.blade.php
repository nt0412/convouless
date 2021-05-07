@extends('layouts.app')
@section('content')
@include('layouts.nav')
<body style="background-color: black;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: #343a40; color: whitesmoke;">
                <div class="card-header">Add Category</div>

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
                    <form method="POST" action="{{route('category.store')}}">
                        @csrf
                        <div class="form-group">
                            <label>Category's name</label>
                            <input type="text" class="form-control" value="{{old('category_name')}}" name="category_name" placeholder="Category's name">
                        </div>

                        <div class="form-group">
                            <label>Category's Slug</label>
                            <input type="text" class="form-control" value="{{old('category_slug')}}" name="category_slug" placeholder="Category's slug">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" value="{{old('category_description')}}" name="category_description" placeholder="Description">
                        </div>

                        <div class="form-group">
                            <label>Enable</label>
                            <select class="custom-select" name="category_enable">
                                <option value="1">Enable</option>
                                <option value="0">Disenable</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-dark btn-outline-warning name="btn-add">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

@endsection

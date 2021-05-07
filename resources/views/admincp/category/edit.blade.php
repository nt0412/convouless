@extends('layouts.app')
@section('content')
@include('layouts.nav')

<body style="background-color: black;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #343a40; color: whitesmoke;">
                    <div class="card-header">Edit Category</div>

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

                        <form method="POST" action="{{route('category.update',[$cate->Category_ID])}}">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category's name</label>
                                <input type="text" class="form-control" value="{{$cate->CategoryName}}" id="exampleInputEmail1" aria-describedby="emailHelp" name="CategoryName" placeholder="Category's name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Category's Slug</label>
                                <input type="text" class="form-control" value="{{$cate->CategorySlug}}" id="exampleInputEmail1" aria-describedby="emailHelp" name="CategorySlug" placeholder="Category's name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <input type="text" class="form-control" value="{{$cate->CategoryDescription}}" id="exampleInputEmail1" aria-describedby="emailHelp" name="CategoryDescription" placeholder="Description">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Enable</label>
                                <select class="custom-select" name="CategoryEnable">
                                    @if($cate->CategoryEnable==1)
                                    <option selected value="1">Enable</option>
                                    <option value="0">Disenable</option>
                                    @elseif($cate->CategoryEnable==0)
                                    <option value="1">Enable</option>
                                    <option selected value="0">Disenable</option>
                                    @endif
                                </select>
                            </div>

                            <button type="submit" class="btn btn-dark btn-outline-warning name=" btn-add">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection

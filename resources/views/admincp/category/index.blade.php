@extends('layouts.app')
@section('content')
@include('layouts.nav')

<body style="background-color: black;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #343a40; color: whitesmoke;">
                    <div class="card-header" style="color: gold; text-align: center;">
                        <h2>Category list</h2>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category's name</th>
                                    <th scope="col">Category's Slug</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Enable</th>
                                    <th scope="col">Tools</th>
                                </tr>
                            </thead>
                            <tbody style="color: whitesmoke;">
                                @foreach($category as $key => $cate)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$cate->category_name}}</td>
                                    <td>{{$cate->category_slug}}</td>
                                    <td>{{$cate->category_description}}</td>
                                    <td>
                                        @if($cate->category_enable == 1)
                                        <span class="text text-success">Enable</span>
                                        @elseif($cate->category_enable == 0)
                                        <span class="text text-danger">Disenable</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a style="color: blue;" class="btn btn-primary" href="{{route('category.edit',[$cate->category_id])}}">Edit</a>
                                        <form action="{{route('category.destroy',[$cate->category_id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Are you sure you want to delete ?');" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

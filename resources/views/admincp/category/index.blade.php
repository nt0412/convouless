@extends('layouts.app')
@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listed Category</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category's name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Enable</th>
                                <th scope="col">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $key => $cate)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$cate->CategoryName}}</td>
                                <td>{{$cate->CategoryDescription}}</td>
                                <td>
                                    @if($cate->CategoryEnable == 1)
                                        <span class="text text-success">Enable</span>
                                    @elseif($cate->CategoryEnable == 0)
                                        <span class="text text-danger">Disenable</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('category.destroy',['category' => $cate->CategoryName])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Delete</button>
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
@endsection

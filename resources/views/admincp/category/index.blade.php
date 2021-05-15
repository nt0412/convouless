@extends('layouts.app')
@section('content')
@include('layouts.nav')
<style>
    .table {
        table-layout: auto;
        width: 100%;
        text-align: center;
    }

    @media only screen and (max-width: 424px) {
        .container-fluid{
            overflow-x: scroll;
        }
        /* width */
        ::-webkit-scrollbar {
            width: 3px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 2px goldenrod;
            border-radius: 5px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: goldenrod;
            border-radius: 5px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: gold;
        }
    }

    @media only screen and (max-width: 767px) {
        .table {
            font-size: 9px;
        }
    }

    @media only screen and (min-width: 2560px) {
        .table {
            font-size: xx-large;
        }
    }

    @media only screen and (max-width: 375px) {
        .table {
            font-size: small;
        }
    }
</style>

<div class="container-fluid">
        <div class="row ">
            <div class="col-sm-12">
                <div class="card" style="background-color: transparent; color: whitesmoke;">
                    <div class="card-header" style="color: gold; text-align: center;">
                        <h2>Category list</h2>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <table class="table" style="border-top: goldenrod solid 2px;">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category's name</th>
                                    <th scope="col">Category's Slug</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
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
                                        <a style="color: blue;" class="btn btn-primary" href="{{route('category.edit',[$cate->category_id])}}"><img src="{{url('image\edit_icon.png')}}" alt=""></a>
                                        <form action="{{route('category.destroy',[$cate->category_id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Are you sure you want to delete ?');" class="btn btn-danger"><img src="{{url('image\delete_icon.png')}}" alt=""></button>
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

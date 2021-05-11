@extends('layouts.app')
@section('content')
@include('layouts.nav')
<div class="container bg-dark" style="overflow: scroll;">
    <div class="card-header" style="color: gold; text-align: center;">
        <h2>Category list</h2>
    </div>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">news_enable</th>
                <th scope="col">news's title</th>
                <th scope="col">news's Slug</th>
                <th scope="col">cate</th>
                <th scope="col">news_metatile</th>
                <th scope="col">news_summary</th>
                <th scope="col">news_content</th>
                <th scope="col">news_img</th>
                <th scope="col">author</th>
                <th scope="col">date_posted</th>
                <th scope="col">date_updated</th>
                <th scope="col">Enable</th>
                <th scope="col">Tools</th>
            </tr>
        </thead>
        <tbody style="color: whitesmoke;">
            @foreach($list_news as $key => $item)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$item->news_enable}}</td>
                <td>{{$item->news_title}}</td>
                <td>{{$item->news_slug}}</td>
                <td>{{$item->category->category_name}}</td>
                <td>{{$item->news_metatile}}</td>
                <td>{{$item->news_summary}}</td>
                <td>{{$item->news_content}}</td>
                <td>{{$item->news_img}}</td>
                <td>{{$item->author_id}}</td>
                <td>{{$item->date_posted}}</td>
                <td>{{$item->date_updated}}</td>
                <td>
                    @if($item->news_enable == 1)
                    <span class="text text-success">Enable</span>
                    @elseif($item->news_enable == 0)
                    <span class="text text-danger">Disenable</span>
                    @endif
                </td>
                <td>
                    <a style="color: blue;" class="btn btn-primary" href="{{route('category.edit',[$item->news_id])}}">Edit</a>
                    <form action="{{route('category.destroy',[$item->news_id])}}" method="POST">
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
@endsection

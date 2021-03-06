@extends('layouts.app')
@section('content')
@include('layouts.nav')
@php
use App\Models\Author;
$auth = Author::where('author_id', 1)->first()->author_display_name;
@endphp
<style>
    @media only screen and (max-width: 870px) {
        .container-fluid {
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

    @media only screen and (min-width: 1440px) {

        /* width */
        ::-webkit-scrollbar {
            width: 5px;
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

    table
    {
        text-align: center;
    }

    table tbody tr td p {
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        display: -webkit-box;
    }

    @media (min-width: 768px) {
        #news-list{
            margin-left: 3em;
        }
    }
    @media (max-width: 769px) {
        #news-list{
            padding: 0;
            margin: 0;
        }
        .container-fluid{
            padding: 0;
            margin: 0;
        }
    }
</style>
<div class="container-fluid">
    <div class="card-header" style="color: gold; text-align: center;">
        <h2>News list</h2>
    </div>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <table class="table" id="news-list" style="border-top: goldenrod solid 2px;">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col" style="width: 10%;">News's Title</th>
                <th scope="col" style="width: 10%;">Category</th>
                <th scope="col" style="width: 10%;">Metatile</th>
                <th scope="col" style="width: 10%;">Summary</th>
                <th scope="col" style="width: 10%;">Image</th>
                <th scope="col">Author</th>
                <th scope="col" style="width: 5%;">Date Posted</th>
                <th scope="col" style="width: 10%;">Date Updated</th>
                <th scope="col" style="width: 10%;">Status</th>
                <th scope="col" style="width: 10%;">Tools</th>
            </tr>
        </thead>
        <tbody style="color: whitesmoke;">
            @foreach($list_news as $key => $item)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>
                    <a href="{{$item->news_slug}}">
                        <p>{{$item->news_title}}</p>
                    </a>
                </td>
                <td>{{$item->category->category_name}}</td>
                <td>
                    <p>{{$item->news_metatile}}</p>
                </td>
                <td>
                    <p>{{$item->news_summary}}</p>
                </td>
                <td>
                    <img src="{{asset('public/images/')}}/{{$item->news_img}}" alt="Post image" width="150px" height="150px">
                </td>
                <td>{{ Author::where('author_id', $item->author_id)->first()->author_display_name }}</td>
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
                    <a style="color: blue;" class="btn btn-primary" href="{{route('news.edit',[$item->news_id])}}"><img src="{{url('image\edit_icon.png')}}" alt=""></a>
                    <form action="{{route('news.destroy',[$item->news_id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Are you sure you want to delete ?');" class="btn btn-danger"><img src="{{url('image\delete_icon.png')}}" alt=""></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mx-auto" style="width: 400px;">
        {{ $list_news->links('pagination::bootstrap-4') }}
    </div>

</div>
@endsection

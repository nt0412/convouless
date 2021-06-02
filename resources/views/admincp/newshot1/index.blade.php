@extends('layouts.app')
@section('content')
@include('layouts.nav')
@php
    use App\Models\News;

    $news = News::get();
    // dd($newshot1s);

    // dd($newshot->news_slug);
@endphp

<style>
    @media only screen and (max-width: 1439px) {
        /* .container-fluid {
            overflow-x: scroll;
        } */

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

        #preview{
            position: absolute;top: 200px;
            /* transform: scale(0.7); */
        }

    }

    @media only screen and (min-width: 1440px) {

        /* width */
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
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
        #preview{
            position: absolute;top: -400px;
            transform: scale(0.7);
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
</style>
<div class="container">
    <div class="card-header" style="color: gold; text-align: center;">
        <h2>News Hot's list</h2>
    </div>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="row">
        <div class="col-xl-6 col-md-12" >
            <table class="table" style="border-top: goldenrod solid 2px;">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">News's Title</th>
                        <th scope="col"style="width: 20%;">Image</th>
                        <th scope="col">Tools</th>
                    </tr>
                </thead>
                <tbody style="color: whitesmoke;">
                    @foreach($newshot1s  as $key => $item)
                    <tr>
                        <td>{{(integer)$key+1}}</td>
                        <td>
                            <a href="{{$item->news_slug}}">
                                <p>{{$item->news_title}}</p>
                            </a>
                        </td>
                        <td>
                            {{-- <img class=""  src="{{asset('public/images/')}}/{{$item->news_img}}" alt="{{$item->news_img}}" height="172px"> --}}
                            <img src="{{asset('public/images/')}}/{{$item->news_img}}" alt=""  height="172px">
                        </td>
                        <td>
                            <a style="color: blue;" class="btn btn-primary" href="{{route('news.edit',[$item->news_id])}}"><img src="{{url('image\edit_icon.png')}}" alt=""></a>

                            <input class="popwindow"  type="button" value="edit" onclick="window.open('{{asset('/admin/manager/newshot/edit')}}','preview','fullscreen=yes');">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-xl-6 col-md-12" style="    position: relative;">
            <div class="d-flex justify-content-around">
                <h3 class="text-center  text-white">preview </h3>
                <input type="button" value="Open a Popup Window" onclick="window.open('{{asset('/admin/manager/newshot/preview')}}','preview','fullscreen=yes');">
            </div>
            <div id="preview" style="">
                @include('admincp.newshot1.preview')
            </div>

        </div>
    </div>
</div>
@endsection

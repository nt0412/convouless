@extends('layouts.app')
@section('content')
@include('layouts.nav')
<style>
    @media only screen and (max-width: 1439px) {
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
    }

    .content_td p {
        max-width: 100%;
        max-height: 100px;
        overflow-y: scroll;
        text-overflow: ellipsis;
    }
</style>
<div class="container-fluid">
    <div class="card-header" style="color: gold; text-align: center;">
        <h2>Post list</h2>
    </div>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <table class="table" style="border-top: goldenrod solid 2px;">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">News's Title</th>
                <th scope="col">News's Slug</th>
                <th scope="col">Category</th>
                <th scope="col">Metatile</th>
                <th scope="col">Summary</th>
                <th scope="col" style="width: 30%;">Content</th>
                <th scope="col">Image</th>
                <th scope="col">Author</th>
                <th scope="col">Date Posted</th>
                <th scope="col">Date Updated</th>
                <th scope="col">Status</th>
                <th scope="col">Tools</th>
            </tr>
        </thead>
        <tbody style="color: whitesmoke;">
            @foreach($list_news as $key => $item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item->news_title}}</td>
                <td>{{$item->news_slug}}</td>
                <td>{{$item->category->category_name}}</td>
                <td>{{$item->news_metatile}}</td>
<<<<<<< HEAD
                <td><div>{{$item->news_summary}}</div></td>
                {{-- <td><div>{{$item->news_content}}</div></td> --}}
=======
                <td>{{$item->news_summary}}</td>
                <td class="content_td"><p>{{$item->news_content}}</p></td>
>>>>>>> e3d0cf284110053ab713c920c6d764175ab8fd8d
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

</div>
@endsection

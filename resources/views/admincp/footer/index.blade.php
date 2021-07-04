@extends('layouts.app')
@section('content')
@include('layouts.nav')
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

    .preview-footer a{
        color: white;
    }

    .preview-footer p{
        color: white;
    }
</style>
<div class="container-fluid">
    <div class="card-header" style="color: gold; text-align: center;">
        <h2>FOOTER</h2>
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
                <th scope="col" >Title</th>
                <th scope="col" >Content</th>
                <th scope="col" >icon</th>
                <th scope="col" style="width: 10%;">Status</th>

                <th scope="col" >Tools</th>
            </tr>
        </thead>
        <tbody style="color: whitesmoke;">
            @foreach($footer as $key => $item)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$item->name}}</td>
                <td>
                    <p>{{$item->desitions}}</p>
                </td>
                <td> <img src="{{asset('public/images/')}}/{{$item->img}}" alt="" height="20px"></td>
                <td>
                    @if($item->enable == 1)
                    <span class="text text-success">Enable</span>
                    @elseif($item->enable == 0)
                    <span class="text text-danger">Disenable</span>
                    @endif
                </td>
                <td>
                    <a style="color: blue;" class="btn btn-primary" href="{{route('footer.edit',[$item->id])}}">
                        <img src="{{url('image\edit_icon.png')}}" alt="">
                    </a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="preview-footer">
        <div class="container">
            <div class="d-flex justify-content-center">
                <h2 style="color: goldenrod;">PREVIEW</h2>
            </div>
            @include('footer')
        </div>
    </div>

</div>
@endsection

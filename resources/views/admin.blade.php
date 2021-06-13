@can('isAdmin')
@extends('layouts.app')
@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header" style="background-color: #343a40; color: gold; text-align: center; font-family: sans-serif;">
                <h2>Hello! {{ Auth::user()->name }} What you want to do ?</h2>
            </div>
        </div>
    </div>
</div>
@endsection
@endcan

@can('isClient')
<h1 style="color: red;">Tuổi loz</h1>
@endcan

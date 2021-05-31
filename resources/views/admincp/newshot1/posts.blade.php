{{-- @extends('layouts.app') --}}
@section('content')
@include('header')
{{-- @include('layouts.nav') --}}

<div class="container">
   <div class="header">
      <div class="hader_img"></div>
      <div class="hader_title">
         <div class="header_title_cate"></div>
         <div class="header_title_content"></div>
         <div class="header_title_author"></div>
      </div>
   </div>
   <div class="body_search">
      <div class="facebook"></div>
      <div class="insta"></div>
   </div>
   <div class="body_content"></div>
   <div class="more_from"></div>
 
   
   
</div>
@include('footer')
@endsection
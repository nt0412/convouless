@php

// dd($news->date_posted->format());
@endphp
@include('header')
<style>
    .relate_news .col-sm-4 {
        padding: 1px;
    }

    h4:hover {
        color: #cc165c;
    }

    img {
        max-width: 100%;
        height: auto;
    }
</style>
</style>
<div class="container-fluid" style="background: white; padding: 0; margin: 0;">
    <div class="news-main-image text-center">
        <!-- ĐỂ XUẤT RA MAIN IMAGE CỦA BÀI VIẾT -->
        <img src="{{ asset('images') }}/@php echo $news->news_img; @endphp" class="img-fluid">
    </div>
    <div class="container" style="background-color: white !important; color: black;">
        <div class="title">
            <!-- TIÊU ĐỀ CỦA BÀI VIẾT -->
            <h1>{{ $news->news_title }}</h1>
            <div class="author">
                <!-- TÁC GIÀ, KÈM NGÀY THÁNG NĂM NẾU CÓ -->
                <p>by <a href="#" style="color: #cc165c;">{{ $authors->author_display_name }}</a></p>
            </div>
        </div>
        <div class="content">
            <!-- NỘI DUNG BÀI VIẾT -->
            <p>
                @php
                echo $news->news_content;
                @endphp
            </p>
            <!-- Đây là chữ kết thúc để kết thúc bài viết đừng sửa nhé -->
            <p style="text-align: center; font-family: sans-serif; font-weight: bold;">
                END.
            </p>
        </div>
    </div>

    <!-- {{-- bài viết cùng tác giả --}}
    <div id="news_author">
        <h2>bài viết cùng tác giả </h2>
        <ul class="list-group">
            @foreach ($list_news_by_author as $key => $item)
                <li class="list-group-item">
                    <a href="{{route('news.show',[$item->news_slug])}}">{{$item->news_title}}</a>
                    {{-- <p class="float-right fs-6 m-0">{{$item->date_posted}}</p> --}}
                </li>
                @if ($key == 4 )
                @php
                    break;
                @endphp
                @endif
            @endforeach
        </ul>
    </div> -->


    <!-- CÁC TIN TỨC LIÊN QUAN -->
    <h1 style="font-family: sans-serif; font-weight: bold; text-align: center; color: black;">Relate News</h1>
    <div class="relate_news" id="grad">
        <div class="owl-carousel owl-theme">
            <!-- <div class="item">
                @foreach ($list_news_by_cate as $item)
                <img src="{{ asset('images') }}/{{ $item->news_img }}" class="img-fluid">
                <div class="title" style="padding: 10px; background-color: black;">
                    <a href="#" style="color: white">
                        <h4 style="font-weight: bold;">
                            {{ $item->news_title }}
                        </h4>
                    </a>
                </div>
                @endforeach
            </div> -->
            <div class="item"><h4>1</h4></div>
            <div class="item"><h4>2</h4></div>
            <div class="item"><h4>3</h4></div>
            <div class="item"><h4>4</h4></div>
            <div class="item"><h4>5</h4></div>
            <div class="item"><h4>6</h4></div>
            <div class="item"><h4>7</h4></div>
            <div class="item"><h4>8</h4></div>
            <div class="item"><h4>9</h4></div>
            <div class="item"><h4>10</h4></div>
            <div class="item"><h4>11</h4></div>
            <div class="item"><h4>12</h4></div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            1440: {
                items: 4
            }
        }
    })
</script>
@include('footer')


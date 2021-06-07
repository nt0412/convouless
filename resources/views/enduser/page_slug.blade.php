@php
// dd($news->date_posted->format());
@endphp
@include('header')
<style>
    body::-webkit-scrollbar {
        width: 0.25rem;
    }

    body::-webkit-scrollbar-track {
        background: black;
    }

    body::-webkit-scrollbar-thumb {
        background: goldenrod;
    }

    .relate_news img {
        max-width: 40rem;
        max-height: 40rem;
    }

    .img-title {
        position: absolute;
        bottom: 0;
        background: rgb(0, 0, 0);
        background: rgba(0, 0, 0, 0.75);
        color: #f1f1f1;
        width: 100%;
        text-align: center;
        padding: 0;
    }

    .img-title a {
        color: whitesmoke;
        text-decoration: none;
        font-size: 1.25rem;
    }

    .img-title a:hover {
        color: #cc165c;
    }

    .img-title:hover {
        background: rgb(0, 0, 0);
    }

    @media (max-width: 640px) {
        .img-title a {
            font-size: 0.7rem;
        }

        .relate_news img {
            width: 30rem;
            height: 30rem;
        }
    }

    @media (max-width: 610px) {
        .img-title a {
            font-size: 0.7rem;
        }

        .relate_news img {
            max-width: 20rem;
            max-height: 14rem;
        }
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



    <!-- CÁC TIN TỨC LIÊN QUAN -->
    <h1 style="font-family: sans-serif; font-weight: bold; text-align: center; color: black;">Relate News</h1>
    <div class="relate_news" id="grad">
        <div class="owl-carousel owl-theme">
            @foreach ($list_news_by_cate as $item)
                @if ($item->news_id == $news->news_id)
                    @php
                        continue;
                    @endphp
                @else
                    <div class="item">
                        <img src="{{ asset('images') }}/{{ $item->news_img }}" class="img-fluid">
                        <div class="title" style="padding: 10px; background-color: black;">
                            <a href="#" style="color: white">
                                <h4 style="font-weight: bold;">
                                    {{ $item->news_title }}
                                </h4>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

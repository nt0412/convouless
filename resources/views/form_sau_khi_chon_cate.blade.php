@include('header')
<style>
    h4:hover{
        color: #cc165c;
    }
</style>
<div class="container">
    <h1 style="text-align: center; font-family: sans-serif;">Tên của Category vừa click</h1>
    <!-- Những bài viết cùng danh mục -->
    <div class="row" id="grad">
        <div class="col-sm-6" style="padding: 1px;">
            <img class="img-fluid" src="{{url('/image/4e605c29cd9620b59d7eeacfe40c1fe2.jpg')}}" alt="">
            <div class="title" style="padding: 10px; background-color: black;">
                <a href="#" style="color: white" >
                    <h4 style="font-weight: bold;">Hardware, apps, and much more and much more. From
                        top companies like Google and Apple to tiny startups
                    </h4>
                </a>
            </div>
        </div>
        <div class="col-sm-6" style="padding: 1px;">
            <img class="img-fluid" src="{{url('/image/4e605c29cd9620b59d7eeacfe40c1fe2.jpg')}}" alt="">
            <div class="title" style="padding: 10px; background-color: black;">
                <a href="#" style="color: white" >
                    <h4 style="font-weight: bold;">Hardware, apps, and much more and much more. From
                        top companies like Google and Apple to tiny startups
                    </h4>
                </a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row" style="background-color: white;">
            <div class="col-sm-8">
                <br>
                <div class="news">
                    <div class="news_items_noibat">
                        <div class="row" style="margin: 16px 0; ">
                            <div class="col-sm-7" style="text-align: right;">
                                <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
                                <div class="author">
                                    <a href="#">
                                        <h5>by Mitchel Johnson</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-5 author">
                                <a href="#">
                                    <h4 style="font-weight: bold;">THE DIGITAL PLATFORM SEEMS TO HAVE LOST ACTIVISTS’ POSTS</h4>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="news_items">
                        <div class="row">
                            <div class="col-sm-4">
                                <br>
                                <div class="news_image">
                                    <img src="{{url('/image/4e605c29cd9620b59d7eeacfe40c1fe2.jpg')}}" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <br>
                                <div class="title">
                                    <a href="#">
                                        <h4 style="font-weight: bold;">Hardware, apps, and much more and much more. From
                                            top companies like Google and Apple to tiny startups
                                        </h4>
                                    </a>
                                </div>

                                <div class=" news_static d-flex justify-content-start">
                                    <div class="author">
                                        by <a href="#">John Thomas</a>
                                    </div>

                                    <div style="border-left: 1px solid; margin: 5px;"></div>
                                    <div class="time">
                                        Today at 11:12am
                                    </div>
                                    <div style="border-left: 1px solid; margin: 5px;"></div>

                                    <div class="comment">
                                        <a href="#">
                                            123 comments
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="video">
                    <h4 class="text-center fs-1" style="border-bottom: 2px solid #b973ff; font-family: sans-serif; margin-top: 2%;">News video</h4>
                    <div class="video_items">
                        <ul style="padding-left: 0px;">
                            <li style="position: relative;">
                                <div style="overflow: hidden;">
                                    <img class="img-fluid" src="{{url('/image/4e605c29cd9620b59d7eeacfe40c1fe2.jpg')}}" alt="">
                                </div>
                                <i class="fas fa-play" style="color:whitesmoke; position: absolute;top: 35%;font-size: 80px;right: 39%;"></i>
                            </li>
                            <li class="title">
                                <a href="">
                                    <h5 style="font-weight: bold;">Hardware, apps, and much more and much more. From
                                        top companies like Google and Apple to tiny startups</h5>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@include('footer')

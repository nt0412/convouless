@include('header')
<style>
    .relate_news .col-sm-4 {
        padding: 1px;
    }

    h4:hover {
        color: #cc165c;
    }
</style>
</style>
<div class="container-fluid">
    <div class="news-main-image"><!-- ĐỂ XUẤT RA MAIN IMAGE CỦA BÀI VIẾT -->
        <img src="{{url('/image/4e605c29cd9620b59d7eeacfe40c1fe2.jpg')}}" class="img-fluid">
    </div>
    <div class="container" style="background-color: white !important; color: black;">
        <div class="title"> <!-- TIÊU ĐỀ CỦA BÀI VIẾT -->
            <h1>APPLE’S PHIL SCHILLER GIVES EPIC IPHONE TESTIMONY</h1>
            <div class="author"><!-- TÁC GIÀ, KÈM NGÀY THÁNG NĂM NẾU CÓ -->
                <p>by <a href="#" style="color: #cc165c;">Phillip Connan</a></p>
            </div>
        </div>
        <div class="content"><!-- NỘI DUNG BÀI VIẾT -->
            <p>
                We’ve gotten through the expert witnesses of Epic v. Apple, and as a reward, Phil Schiller — currently an “Apple Fellow,” whatever that is, and previously the senior vice president of worldwide marketing — took the stand like a twinkly App Store St. Nick. To hear him tell it, Apple is a wonderful partner to developers, selflessly improving dev tools and responding to their needs. At times the testimony feels like a prolonged ad for iOS.

                The goal of the testimony is to paint the App Store as a part of the iPhone that can’t be removed or replaced by a competing alternative. To this end, we heard in exhaustive detail about the improvements made to the iPhone that benefit the developers in the App Store. The chips. The Retina display. The accelerometer. The wireless upgrades. It’s practically an Apple event on the stand.

                Among the exhaustive list, Schiller identified Metal, one of the developer tools Apple created. (Metal is a play on “close to the metal,” or writing code that’s close to the computer’s guts.) Apple’s counsel says the lawyer version of “roll tape!” and we’re treated to a 20 second clip of Tim Sweeney on stage at WWDC, praising Metal as a wonderful tool that will allow developers like Epic Games to create the next generation of improvements. Solid burn!
            </p>
            <!-- Đây là chữ kết thúc để kết thúc bài viết đừng sửa nhé -->
            <p style="text-align: center; font-family: sans-serif;">
                END.
            </p>
        </div>
    </div>
    <!-- CÁC TIN TỨC LIÊN QUAN -->
    <h1 style="font-family: sans-serif; font-weight: bold; text-align: center;">Relate news</h1>
    <div class="relate_news row" id="grad">
        <div class="col-sm-4">
            <img src="{{url('/image/4e605c29cd9620b59d7eeacfe40c1fe2.jpg')}}" class="img-fluid">
            <div class="title" style="padding: 10px; background-color: black;">
                <a href="#" st yle="color: white">
                    <h4 style="font-weight: bold;">Hardware, apps, and much more and much more. From
                        top companies like Google and Apple to tiny startups
                    </h4>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <img src="{{url('/image/4e605c29cd9620b59d7eeacfe40c1fe2.jpg')}}" class="img-fluid">
            <div class="title" style="padding: 10px; background-color: black;">
                <a href="#" style="color: white">
                    <h4 style="font-weight: bold;">Hardware, apps, and much more and much more. From
                        top companies like Google and Apple to tiny startups
                    </h4>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <img src="{{url('/image/4e605c29cd9620b59d7eeacfe40c1fe2.jpg')}}" class="img-fluid">
            <div class="title" style="padding: 10px; background-color: black;">
                <a href="#" style="color: white">
                    <h4 style="font-weight: bold;">Hardware, apps, and much more and much more. From
                        top companies like Google and Apple to tiny startups
                    </h4>
                </a>
            </div>
        </div>
    </div>


</div>
@include('footer')

@php
use App\Models\Footer;
    $footer = footer::get();
    // dd($footer[7]->desitions);
@endphp
<footer>
    <hr style="width: 100%; color: purple; background-color: #b973ff;">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3 style="color: white;"><strong>CONTACTS</strong></h3>
                <div class="contact">
                    <p>
                        <a href="#">
                            {{$footer[2]->desitions}}
                        </a>
                    </p>
                    <p style="color: wheat;">PHONE:
                        {{$footer[3]->desitions}}
                    </p>
                    <p>CUSTOMER SUPPORT: {{$footer[4]->desitions}}</p>
                </div>
            </div>
            <div class="col-sm-6" style="text-align: right;">
                <h3 style="font-weight: bold; color: whitesmoke;">MEDIAHELP</h3>
                <div class="contact">
                    <ul style="list-style: none;">
                        <li>
                            Advertise with us: <a href="#">mediahelp@iwontcheck.com</a>
                        </li>
                        <li>
                            <a href="{{$footer[5]->desitions}}">
                                {{$footer[5]->name}}
                                {{-- Youtube --}}
                                <img src="{{asset('public/images/')}}/{{$footer[5]->img}}" alt="">
                                {{-- <img src="{{$footer[5]->img}}" alt=""> --}}
                            </a>
                            <a href="{{$footer[0]->desitions}}">
                                {{$footer[0]->name}}
                                <img src="{{asset('public/images/')}}/{{$footer[0]->img}}" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="{{$footer[1]->desitions}}">
                                {{$footer[1]->name}}
                                {{-- Instagram --}}
                                <img src="{{asset('public/images/')}}/{{$footer[1]->img}}" alt="">
                                {{-- <img src="{{$footer[1]->img}}" alt=""> --}}
                            </a>
                            <a href="{{$footer[6]->desitions}}">
                                {{$footer[6]->name}}
                                {{-- Twitter --}}
                                {{-- <img src="{{$footer[6]->img}}" alt=""> --}}
                                <img src="{{asset('public/images/')}}/{{$footer[6]->img}}" alt="">

                            </a>
                        </li>
                        <li>
                            <p style="color: #b973ff;">&#169; 2021, Convouless.CORP</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>

</html>

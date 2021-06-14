@php
// print_r($covid_world['regionData'][0]['totalCases'])
// echo number_format("160469213");
@endphp
<div class="container" id="api-covid">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="3000" style="background-color: black;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row mx-auto">
                    <div class="col-xl-4 col-md-12">
                        <img class="img-fluid" src="{{asset('public/images/covietnam.png')}}">
                    </div>
                    <div class="col-xl-8 col-md-12">
                        <div>
                            <div class="card-deck">
                                <div class="card text-white  m-3 " style="border-radius: 1rem; border: 2px solid #c9302c">
                                    <div class="card-body text-center" style="color: #c9302c">
                                        <h5 class="card-title text-capitalize">infected</h5>
                                        <p class="card-text fs-3"> {{number_format($covid['infected'])}}</p>
                                    </div>
                                </div>
                                <div class="card text-white  m-3" style="    border-radius: 1rem; border: 2px solid #f0c382">
                                    <div class="card-body text-center " style="color: #f0c382">
                                        <h5 class="card-title text-capitalize">treated</h5>
                                        <p class="card-text fs-3"> {{number_format($covid['treated'])}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-deck">
                                <div class="card text-white  m-3" style="    border-radius: 1rem; border: 2px solid #28a745">
                                    <div class="card-body text-center   " style="color: #28a745">
                                        <h5 class="card-title text-capitalize">recovered</h5>
                                        <p class="card-text fs-3"> {{number_format($covid['recovered'])}}</p>
                                    </div>
                                </div>
                                <div class="card text-white  m-3" style="    border-radius: 1rem; border: 2px solid #666666">
                                    <div class="card-body text-center " style="color: #666666">
                                        <h5 class="card-title text-capitalize">deceased</h5>
                                        <p class="card-text fs-3"> {{number_format($covid['deceased'])}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row mx-auto">
                    <div class="col-xl-4 col-md-12">
                        <img class="img-fluid" src="{{asset('public/images/world.png')}}" style="margin-top: 68px;">
                    </div>
                    <div class="col-xl-8 col-md-12">
                        <div>
                            <div class="card-deck">
                                <div class="card text-white  m-3 " style="border-radius: 1rem; border: 2px solid #c9302c">
                                    <div class="card-body text-center" style="color: #c9302c">
                                        <h5 class="card-title text-capitalize">infected</h5>
                                        <p class="card-text fs-3"> {{number_format($covid_world['regionData'][0]['totalCases'])}}</p>
                                    </div>
                                </div>
                                <div class="card text-white  m-3" style="    border-radius: 1rem; border: 2px solid #f0c382">
                                    <div class="card-body text-center " style="color: #f0c382">
                                        <h5 class="card-title text-capitalize">treated</h5>
                                        <p class="card-text fs-3"> {{number_format($covid_world['regionData'][0]['activeCases'])}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-deck">
                                <div class="card text-white  m-3" style="    border-radius: 1rem; border: 2px solid #28a745">
                                    <div class="card-body text-center   " style="color: #28a745">
                                        <h5 class="card-title text-capitalize">recovered</h5>
                                        <p class="card-text fs-3"> {{number_format($covid_world['regionData'][0]['totalRecovered'])}}</p>
                                    </div>
                                </div>
                                <div class="card text-white  m-3" style="    border-radius: 1rem; border: 2px solid #666666">
                                    <div class="card-body text-center " style="color: #666666">
                                        <h5 class="card-title text-capitalize">deceased</h5>
                                        <p class="card-text fs-3"> {{number_format($covid_world['regionData'][0]['totalDeaths'])}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

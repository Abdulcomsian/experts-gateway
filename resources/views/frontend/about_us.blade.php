@extends('layout.loginlayout')
@section('title')
About Us
@endsection
@section('content') 

<main>
    <div class="mainBanner aboutBanner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bannerLeft aboutUsLeft">
                        <h3>About <span>Us</span></h3>
                        <p style="width:374px;">{{$about_us->title ?? ''}}</p>
                    </div>

                </div>
                <div class="col-lg-6" style="padding: 0px;">
                    <div class="bannerRight">
                        @if (isset($about_us->image))
                        <img src="{{asset('about_us/'.$about_us->image ) }}" style="width: 675pxs; height: 393px;" alt="" class="img-fluid">
                        @else
                        <img src="{{ asset('assets/img/aboutUsBanner.png') }}" style="width: 675pxs; height: 393px;" alt="" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="findExpert">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    {!! $about_us->description ?? '' !!}
                    <div class="multiBtn">
                        <a href="{{ url('/experts') }}" class="findExpertBtn">Find An Expert</a>
                        <a href="{{ route('lawyer-register') }}" class="applyMemberShip">Apply Fot Membership</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="aboutUs">
                        <div class="multiBox">
                            <div class="">
                                <div class="commonBox active">
                                    <h2>10K+</h2>
                                    <p>Active Members</p>
                                </div>
                                <div class="commonBox">
                                    <h2>10</h2>
                                    <p>Years of excellence</p>
                                </div>
                                <div class="commonBox active">
                                    <h2>150</h2>
                                    <p>Key countries</p>
                                </div>
                            </div>
                            <div style="margin-left: 30px;">
                                <div class="commonBox">
                                    <h2>10%</h2>
                                    <p>Trust rating</p>
                                </div>
                                <div class="commonBox">
                                    <h2>200</h2>
                                    <p>Areas of expertise</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ourService">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Our Services</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquam id nibh ut efficitur.
                        Proin congue interdum lacus, sed ornare augue viverra sit amet. In pulvinar augue ac urna
                        tristique viverra. Aliquam eu scelerisque orci.</p>
                </div>
            </div>
            <div class="sliderDiv">
                <div class="serviceSlider">
                    <div class="serviceBox">
                        <div class="boxHeader">
                            <img src="{{ asset('assets/img/finance.png') }}" alt="" class="img-fluid">
                            <h2>Banking & Finance Law</h2>
                            <div class="line"></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adi iscing elit Sed aliquam id nibh ut efficitur.
                        </p>
                        <a href="">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
                        <div class="border"></div>
                    </div>
                    <div class="serviceBox">
                        <div class="boxHeader">
                            <img src="{{ asset('assets/img/civil.png') }}" alt="" class="img-fluid">
                            <h2>Civil Litigation</h2>
                            <div class="line"></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adi iscing elit Sed aliquam id nibh ut efficitur.
                        </p>
                        <a href="">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
                        <div class="border"></div>
                    </div>
                    <div class="serviceBox">
                        <div class="boxHeader">
                            <img src="{{ asset('assets/img/commercial.png') }}" alt="" class="img-fluid">
                            <h2>Commercial Litigation</h2>
                            <div class="line"></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adi iscing elit Sed aliquam id nibh ut efficitur.
                        </p>
                        <a href="">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
                        <div class="border"></div>
                    </div>
                    <div class="serviceBox">
                        <div class="boxHeader">
                            <img src="{{ asset('assets/img/arbitration.png') }}" alt="" class="img-fluid">
                            <h2>Arbitration</h2>
                            <div class="line"></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adi iscing elit Sed aliquam id nibh ut efficitur.
                        </p>
                        <a href="">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
                        <div class="border"></div>
                    </div>
                    <div class="serviceBox">
                        <div class="boxHeader">
                            <img src="{{ asset('assets/img/finance.png') }}" alt="" class="img-fluid">
                            <h2>Banking & Finance Law</h2>
                            <div class="line"></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adi iscing elit Sed aliquam id nibh ut efficitur.
                        </p>
                        <a href="">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
                        <div class="border"></div>
                    </div>
                    <div class="serviceBox">
                        <div class="boxHeader">
                            <img src="{{ asset('assets/img/civil.png') }}" alt="" class="img-fluid">
                            <h2>Civil Litigation</h2>
                            <div class="line"></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adi iscing elit Sed aliquam id nibh ut efficitur.
                        </p>
                        <a href="">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
                        <div class="border"></div>
                    </div>
                    <div class="serviceBox">
                        <div class="boxHeader">
                            <img src="{{ asset('assets/img/commercial.png') }}" alt="" class="img-fluid">
                            <h2>Commercial Litigation</h2>
                            <div class="line"></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adi iscing elit Sed aliquam id nibh ut efficitur.
                        </p>
                        <a href="">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
                        <div class="border"></div>
                    </div>
                    <div class="serviceBox">
                        <div class="boxHeader">
                            <img src="{{ asset('assets/img/arbitration.png') }}" alt="" class="img-fluid">
                            <h2>Arbitration</h2>
                            <div class="line"></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adi iscing elit Sed aliquam id nibh ut efficitur.
                        </p>
                        <a href="">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
                        <div class="border"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="excellence">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Advisory Excellence Profiles<br> The Best Advisers Around The Globe</h2>
                <a href="{{ url('/experts') }}" class="expertBtn">Find An Expert</a>
                <a href="{{ route('lawyer-register') }}">Apply For Membership</a>
            </div>
        </div>
    </div>
    @if(count($fixed_services) > 0)
    <div class="fixedService">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Fixed Price Services</h2>
                </div>
            </div>
            <div class="sliderDiv">
                <div class="priceService">
                    @if($fixed_services)
                    @foreach($fixed_services as $fixed_service)
                    <div class="serviceBox">
                        <img src="{{asset('fixed_service/'.$fixed_service->image)}}" width="auto" height="auto" alt="" class="img-fluid">
                        <h4>{{$fixed_service->title}}</h4>
                        <p>{{$fixed_service->expertise->name}}</p><br>
                        <div class="priceDiv">
                            <p>Fixed Price: <span>${{$fixed_service->price}}</span> &nbsp; &nbsp; &nbsp;/{{$fixed_service->time_limit}}</p>
                        </div>
                        <a href="{{ route('fixed_service_detail', $fixed_service->id) }}">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(count($news) > 0)
    <div class="leatestNews">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5">
                    <div class="leatesNewContent">
                        <h2>Latest News</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquam id nibh utitur Proin
                            congue interdum lacus.</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="sliderDiv">
                        <div class="newsSlider">
                            @foreach($news as $new)
                            <div class="newsCard">
                                <img src="{{asset('news/'.$new->image)}}" width="223px" height="162px" alt="" class="img-fluid">
                                <div class="cardContent">
                                    <div class="date">
                                        <p>{{ date('Y/m/d', strtotime($new->created_at)) }}</p>
                                    </div>
                                    <h4>{{$new->title}}</h4>
                                    {!! $new->description !!}
                                    <!-- <a href="./aboutUs.html">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt=""></a> -->
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="requestInformation">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="informationContent">
                        <h2>Request Information</h2>
                        <div class="formDiv">
                            <form action="">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="inputDiv">
                                            <input type="text" name="first_name" id="first_name"
                                                placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="inputDiv">
                                            <input type="text" name="last_name" id="last_name"
                                                placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="inputDiv">
                                            <input type="text" name="email" id="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="inputDiv">
                                            <input type="text" name="phone" id="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="inputDiv">
                                            <textarea name="message" id="message" placeholder="Message" cols="30"
                                                rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button>Submit Now</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="imgText">
                        <img src="{{ asset('assets/img/information.png') }}" alt="" class="img-fluid">
                        <div class="imgTextMiddle">
                            <p>Legal Advice<br> Across the<br> Globe</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
    
@endsection

@section('js')
@endsection
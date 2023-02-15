@extends('layout.loginlayout')
@section('title')
Expert Gateway
@endsection
@section('styles')
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endsection
@section('content')
{{--    @dd(Auth::user()->hasRole('Lawyer'))--}}
<style>
    main .mainBanner .searchBox div select {
        background: transparent;
    }

    .ourService p,
    .experts p {
        line-height: 120%;
    }

    .aboutUs .aboutUsContent .notes:before {
        height: 88%;
    }

    .clientBox {
        height: 350px;
    }

    .profileSlide {
        height: 100%;
        overflow: hidden;
    }

</style>
<main>
    <div class="mainBanner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bannerLeft">
                        <!-- <h3>Welcome</h3> -->
                        <!-- <p>Advisory Exellence Is The<br> Definitive Guide To Leading<br> Experts Throughout The
                            World</p> -->
                        <p>Find An Expert Lawyer Wherever You Are In The World</p>
                        <span class="d-block">If you need legal advice, we make finding the best lawyer near you easy.
                            We only list top law firms and practitioners, so you can always put your trust in an Experts
                            Gateway vetted lawyer. </span>
                        <span class="d-block">To get started, select your location and the type of legal help you
                            need.</span>
                        <!-- <button>
                            <a style="color: #ef1d31 !important;" href="{{ url('/about-us') }}">Learn More</a>
                        </button> -->
                        <form action="{{route('experts')}}">
                            <div class="searchBox desktopHide">
                                <div class="countryDiv">
                                    <select name="country" id="">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="expertiseDiv">
                                    <select name="search_expert" id="">
                                        <option value="">Select Practice Area</option>
                                        @foreach($PartiseArea as $area)
                                        <option value="{{$area->id}}">{{$area->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="btnDiv">
                                        <button type="submit"><img src="{{ asset('assets/img/searchBtnIcon.svg') }}"
                                                alt="" class="img-fluid">Search</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-lg-6" style="padding: 0px;">
                    <div class="bannerRight">
                        <img src="{{ asset('assets/img/bannerImg.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="clientBox">
            <!-- Swiper -->
            <div class="swiper mySwiper profileSlide">
                <div class="swiper-wrapper">
                    @foreach($featured_lawyers as $featured_lawyer)
                        <div class="swiper-slide">
                            <div class="d-flex align-items-center clientDetailBox">
                                <img src="{{ asset('lawyer_profile/'.$featured_lawyer->image) }}" alt="" class="img-fluid" style="object-fit: contain">
                                <div class="ml-2">
                                    <p class="mb-0">{{$featured_lawyer->user->f_name ." ".$featured_lawyer->user->l_name}}</p>
                                    <small class="text-dark-50">{{$featured_lawyer->partise_area_1->name}}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <form action="{{route('experts')}}">
            <div class="searchBox mobileHide">

                <div class="countryDiv">
                    <select name="country" id="">
                        <option value="">Select Country</option>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="expertiseDiv">
                    <select name="search_expert" id="">
                        <option value="">Select Practice Area</option>
                        @foreach($PartiseArea as $area)
                        <option value="{{$area->id}}">{{$area->name}}</option>
                        @endforeach
                    </select>
                    <div class="btnDiv">
                        <button type="submit"><img src="{{ asset('assets/img/searchBtnIcon.svg') }}" alt=""
                                class="img-fluid">Search</button>
                    </div>
                </div>


            </div>
        </form>
    </div>
    <div class="ourService">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Our Legal Services</h2>
                    <p>Experts Gateway partners cover a wide range of legal specialisms. Because every country has its
                        own laws and regulations, we work with top local lawyers and law firms. Here are some of the
                        main legal services available to you. </p>
                </div>
            </div>
            <div class="sliderDiv">
                <div class="serviceSlider">
                    @foreach($services as $service)
                        <div class="serviceBox">
                            <div class="boxHeader">
                                <img src="{{asset('services/'.$service->image)}}" alt="" class="img-fluid " style="height: 56px" >
                                <h2>{{$service->title}}</h2>
                                <div class="line"></div>
                            </div>
                            @php
                                $desc=str_replace(['<p>', '</p>'], '', $service->description);
                            @endphp
                            <p> {!! \Str::words(str_replace('&nbsp;', ' ', $desc),10) !!}</p>
                            <a href="{{url('/service-details',$service->id)}}">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
                            <div class="border"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="aboutUs">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="multiBox"  id="counters_1">
                        <div class="">
                            <div class="commonBox" >
                                <h2><span class="counter" data-TargetNum="{{$home_numbers->active_members ?? 10}}"></span>K+</h2>
                                <p>Active Members</p>
                            </div>
                            <div class="commonBox" id="counters_2">
                                <h2 class="counter" data-TargetNum="{{$home_numbers->years_of_excellence ?? 10}}"></h2>
                                <p>Years of excellence</p>
                            </div>
                            <div class="commonBox" id="counters_3">
                                <h2 class="counter" data-TargetNum="{{$home_numbers->key_countries ?? 150}}">150</h2>
                                <p>Key countries</p>
                            </div>
                        </div>
                        <div style="margin-left: 30px;">
                            <div class="commonBox" id="counters_4">
                                <h2><span  class="counter" data-TargetNum="{{$home_numbers->trust_rating ?? 10}}">10</span>%</h2>
                                <p>Trust rating</p>
                            </div>
                            <div class="commonBox"  id="counters_5">
                                <h2 class="counter" data-TargetNum="{{$home_numbers->areas_of_expertise ?? 200}}">200</h2>
                                <p>Areas of expertise</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="aboutUsContent">
                        <h5>About Us</h5>
                        <h2>Experts Gateway</h2>
                        <p class="notes">You never know when or where you might need legal advice. But finding a top
                            lawyer when you’re away from home is difficult, time-consuming and potentially risky.</p>
                        <p>Experts Gateway is here to help. We partner with some of the best lawyers from around the
                            world, carefully vetted to ensure they provide top quality advice and representation.
                            Whatever kind of assistance you need, wherever you are, we’ll connect with a top local law
                            expert. </p>
                        <a href="{{ url('/about-us') }}">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}"
                                alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="experts">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Only Top-Rated Experts </h2>
                    <p class="mb-5">We carry out rigorous quality assurance checks on all the lawyers and law firms who
                        apply to work with us. Only the top 1% of applicants make it through our selection process. That
                        means you’ll have the peace of mind that comes from knowing you’re working with a true expert.
                    </p>
                    <a href="{{ url('/experts') }}" class="expertBtn text-white">Find An Expert</a>
                </div>
            </div>

            @if(count($lawyers) > 0)

            <div class="sliderDiv">
                <div class="expertSlider">
                    @foreach($lawyers as $key=>$lawyer)
                    @if(isset($lawyer['lawyer_profile'][0]))
                    <a style="color: black" href="{{ route('expert-detail',$lawyer['lawyer_profile'][0]->id)}}">
                        <div class="sliderbox">
                            <img src="{{asset('lawyer_profile/'.$lawyer['lawyer_profile'][0]->image)}}" width="352px"
                                height="378px">
                            <div class="expertHeader">
                                <h4>{{$lawyer->f_name}} {{$lawyer->l_name}}</h4>
                                {{-- <p>{{$lawyer['lawyer_profile'][0]->title}}</p> --}}
                            </div>
                            <div class="line">
                                .................................................................................</div>
                            <div class="expertAbout">
                                {{--<p><strong>Address:</strong> <span>{{$lawyer['lawyer_profile'][0]->address}}</span></p>
                                <p><strong>Education:</strong> <span>
                                        @php
                                        $lawyer_educations =
                                        App\Models\LawyersHasEducation::where('lawyer_profile_id',$lawyer['lawyer_profile'][0]->id)->get();
                                        @endphp
                                        @foreach($lawyer_educations as $education)
                                        {{$education->education->education_name}}
                                        @if(!($loop->last))
                                        ,
                                        @endif
                                        @endforeach
                                    </span></p>--}}
                                <p><strong>Country:</strong> {{$lawyer['lawyer_profile'][0]->countryList->name ?? ''}} <span></span></p>
                                <p><strong>Area of Expertise:</strong> {{$lawyer['lawyer_profile'][0]->partise_area_1->name ?? ''}} <span></span></p>
                            </div>
                        </div>
                    </a>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="excellence">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <!-- <h2>Advisory Excellence Profiles<br> The Best Advisers Around The Globe</h2> -->
                    <h2>Become An Official Experts Gateway Legal Partner </h2>
                    <!-- <a href="{{ url('/experts') }}" class="expertBtn">Find An Expert</a> -->
                    <a href="{{ route('lawyer-register') }}">Apply For Membership</a>
                </div>
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
                        <img src="{{asset('fixed_service/'.$fixed_service->image)}}" width="auto" height="auto" alt=""
                            class="img-fluid">
                        <h4>{{$fixed_service->title}}</h4>
                        <p>{{$fixed_service->expertise->name}}</p><br>
                        <div class="priceDiv">
                            <p>Fixed Price: <span>${{$fixed_service->price}}</span> &nbsp; &nbsp;
                                &nbsp;/{{$fixed_service->time_limit}}</p>
                        </div>
                        <a href="{{ route('fixed_service_detail', $fixed_service->id) }}">Learn More <img
                                src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
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
                <div class="col-lg-4">
                    <div class="leatesNewContent">
                        <h2>Latest News</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquam id nibh utitur Proin
                            congue interdum lacus.</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="sliderDiv">
                        <div class="newsSlider">
                            @foreach($news as $new)
                            <div class="card mx-3">
                                <img src="{{asset('news/'.$new->image)}}" width="223px !important" height="162px" alt=""
                                    class="img-fluid">
                                <div class="cardContent card-body d-flex flex-column">
                                    <div class="date">
                                        <p>{{ date('Y/m/d', strtotime($new->created_at)) }}</p>
                                    </div>
                                    <h4 class="card-title">{{$new->title}}</h4>
                                    <p class="card-text mb-4">@php
                                            $formatted_text = str_replace(['<p>', '</p>'], '',  $new->description);
                                        @endphp
                                        {!! \Str::words(str_replace('&nbsp;', ' ', $formatted_text),10) !!}</p>

                                </div>
{{--                                <div class="cardContent">--}}
{{--                                    <div class="date">--}}
{{--                                        <p>{{ date('Y/m/d', strtotime($new->created_at)) }}</p>--}}
{{--                                    </div>--}}
{{--                                    <h4>{{$new->title}}</h4>--}}
{{--                                    @php--}}
{{--                                    $formatted_text = str_replace(['<p>', '</p>'], '',  $new->description);--}}
{{--                                    @endphp--}}
{{--                                    {!! \Str::words(str_replace('&nbsp;', ' ', $formatted_text),10) !!}--}}
{{--                                    <!-- <a href="./aboutUs.html">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt=""></a> -->--}}
{{--                                </div>--}}
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
                        <h2>Not sure what kind of legal assistance you need?</h2>
                        <p class="mb-4">Fill in the form below and tell us where you are and your current legal
                            situation. We’ll get back to you with our recommendations for a suitable expert. </p>
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
                                            <input type="text" name="last_name" id="last_name" placeholder="Last Name">
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
                                            <input type="text" name="practice" id="practice"
                                                placeholder="Practice Area">
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
                        <img src="{{ asset('assets/img/information.png')}}" alt="" class="img-fluid">
                        <div class="imgTextMiddle">
                            <p>Legal Advice <br> Wherever You <br> Are</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
{{--
    <script>
        var access_token = Outseta.getAccessToken();
        console.log("get access token", Outseta.getAccessToken());
        var user_s = Outseta.setAccessToken(access_token);
        console.log('user', user_s);
        var user_details = Outseta.getUser();
        user_details.then(function (x) { // Suppose promise returns "abc"
            console.log(x);
            console.log(x.Email);
            login(x.Email);
            return "123";
        })
        /*console.log("user details", user_details.then(
            response => console.log(response)
                .catch(error => console.log(error))
        ));*/
        Outseta.on(access_token.set, function (user) {
            console.log('accessToken.set', user);
        });


        // console.log("get access token", Outseta.getAccessToken());

       function login(data){
           $.ajax({
               url:"{{route('lawyer_login')}}",
               type:'POST',
               "data": {
                   "_token": "{{csrf_token()}}",
                   "email": data,
               },
               success:function(data){
                   --}}
{{--window.location.href = "{{route('landing-page')}}";--}}{{--

               },
               error: function (data) {
                   console.log(data);
               }
           });
       }
    </script>
--}}
<!-- load jquery 3 cdn -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- load local script -->
<script src="{{ asset('assets/js/animated-counter/multi-animated-counter.js') }}"></script>

<script>
    // must be an array, could have only one element
let visibilityIds = ['#counters_1'];

// default counter class
let counterClass = '.counter';

// default animation speed
let defaultSpeed = 2000;
</script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".profileSlide", {
        direction: "vertical",
        slidesPerView: 3,
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },

        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

</script>
@endsection

@extends('layout.loginlayout')
@section('title')
Expert Gateway
@endsection
@section('content') 
<style>
    main .mainBanner .searchBox div select{
        background: transparent;
    }
    .ourService p, .experts p {
        line-height: 120%;
    }
    .aboutUs .aboutUsContent .notes:before {
         height: 88%;
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
                        <span class="d-block">If you need legal advice, we make finding the best lawyer near you easy. We only list top law firms and practitioners, so you can always put your trust in an Experts Gateway vetted lawyer. </span>
                        <span class="d-block">To get started, select your location and the type of legal help you need.</span>
                        <!-- <button>
                            <a style="color: #ef1d31 !important;" href="{{ url('/about-us') }}">Learn More</a>
                        </button> -->
                        <div class="searchBox desktopHide">
                            <div class="countryDiv">
                                <select name="" id="">
                                    <option value="Country">Country</option>
                                </select>
                            </div>
                            <div class="expertiseDiv">
                                <select name="" id="">
                                    <option value="Expertise">Expertise</option>
                                </select>
                                <div class="btnDiv">
                                    <button><img src="{{ asset('assets/img/searchBtnIcon.svg') }}" alt="" class="img-fluid">
                                        <a style="color: #fff;" href="./fixed-free.html">Search</a>
                                    </button>
                                </div>
                            </div>

                        </div>
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
            <ul>
                <li>
                    <div class="clientDetailBox">
                        <img src="{{ asset('assets/img/client1.png') }}" alt="" class="img-fluid">
                    </div>
                </li>
                <li>
                    <div class="clientDetailBox">
                        <img src="{{ asset('assets/img/client2.png') }}" alt="" class="img-fluid">
                    </div>
                </li>
                <li>
                    <div class="clientDetailBox">
                        <img src="{{ asset('assets/img/client3.png') }}" alt="" class="img-fluid">
                    </div>
                </li>
                <li>
                    <div class="clientDetailBox">
                        <img src="{{ asset('assets/img/client1.png') }}" alt="" class="img-fluid">
                    </div>
                </li>
            </ul>
        </div>
        <form action="{{route('experts')}}">
        <div class="searchBox mobileHide">
            
                <div class="countryDiv">
                    <select name="country" id="">
                        <option value="Country">Country</option>
                    </select>
                </div>
                <div class="expertiseDiv">
                    <select name="search_expert" id="">
                        <option value="">Expertise</option>
                         @foreach($educations as $education)
                         <option value="{{$education->id}}">{{$education->education_name}}</option>
                        @endforeach
                    </select>
                    <div class="btnDiv">
                        <button type="submit"><img src="{{ asset('assets/img/searchBtnIcon.svg') }}" alt="" class="img-fluid">Search</button>
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
                    <p>Experts Gateway partners cover a wide range of legal specialisms. Because every country has its own laws and regulations, we work with top local lawyers and law firms. Here are some of the main legal services available to you. </p>
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
                        <a href="./aboutUs.html">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
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
                        <a href="./aboutUs.html">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
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
                        <a href="./aboutUs.html">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
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
                        <a href="./aboutUs.html">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
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
                        <a href="./aboutUs.html">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
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
                        <a href="./aboutUs.html">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
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
                        <a href="./aboutUs.html">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
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
                        <a href="./aboutUs.html">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
                        <div class="border"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="aboutUs">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="multiBox">
                        <div class="">
                            <div class="commonBox">
                                <h2>10K+</h2>
                                <p>Active Members</p>
                            </div>
                            <div class="commonBox">
                                <h2>10</h2>
                                <p>Years of excellence</p>
                            </div>
                            <div class="commonBox">
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
                <div class="col-lg-6">
                    <div class="aboutUsContent">
                        <h5>About Us</h5>
                        <h2Experts Gateway</h2>
                        <p class="notes">You never know when or where you might need legal advice. But finding a top lawyer when you’re away from home is difficult, time-consuming and potentially risky.</p>
                        <p>Experts Gateway is here to help. We partner with some of the best lawyers from around the world, carefully vetted to ensure they provide top quality advice and representation. Whatever kind of assistance you need, wherever you are, we’ll connect with a top local law expert. </p>
                        <a href="{{ url('/about-us') }}">Learn More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt=""></a>
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
                    <p class="mb-5">We carry out rigorous quality assurance checks on all the lawyers and law firms who apply to work with us. Only the top 1% of applicants make it through our selection process. That means you’ll have the peace of mind that comes from knowing you’re working with a true expert.</p>
                    <a href="{{ url('/experts') }}"  class="expertBtn text-white">Find An Expert</a>
                </div>
            </div>
            @if(count($lawyers) > 0)

            <div class="sliderDiv">
                <div class="expertSlider">
                    @foreach($lawyers as $key=>$lawyer)
                     @if(isset($lawyer['lawyer_profile'][0]))
                    <a style="color: black" href="{{ route('expert-detail',$lawyer['lawyer_profile'][0]->id)}}">
                        <div class="sliderBox">
                            <img src="{{asset('lawyer_profile/'.$lawyer['lawyer_profile'][0]->image)}}" width="352px" height="378px">
                            <div class="expertHeader">
                                <h4>{{$lawyer->f_name}} {{$lawyer->l_name}}</h4>
                                {{-- <p>{{$lawyer['lawyer_profile'][0]->title}}</p> --}}
                            </div>
                            <div class="line">
                                .................................................................................</div>
                            <div class="expertAbout">
                                <p><strong>Address:</strong> <span>{{$lawyer['lawyer_profile'][0]->address}}</span></p>
                                <p><strong>Education:</strong> <span>
                                    @php
                                        $lawyer_educations = App\Models\LawyersHasEducation::where('lawyer_profile_id',$lawyer['lawyer_profile'][0]->id)->get();
                                    @endphp
                                    @foreach($lawyer_educations as $education)
                                        {{$education->education->education_name}}
                                        @if(!($loop->last))
                                        ,
                                        @endif
                                    @endforeach
                                </span></p>
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
                        <h2>Not sure what kind of legal assistance you need?</h2>
                        <p>Fill in the form below and tell us where you are and your current legal situation. We’ll get back to you with our recommendations for a suitable expert. </p>
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
@endsection
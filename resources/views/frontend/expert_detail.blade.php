@extends('layout.loginlayout')
@section('title')
Experts
@endsection
@section('content')
    <style>
        .userDetail2{
            position: absolute;
            top: -30px;
            display: flex;
            align-items: center;
            right: 6%;
        }
    </style>
<main>
    <div class="profileDiv expertDetailProfile">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
{{--                    @dd($lawyer)--}}
                    <div class="editProfileBox">
                        <div class="profileImg">
                            <img src="{{asset('lawyer_cover_image/'.$lawyer_profile->b_image)}}" style="width: 100% !important; height: 230px !important;object-fit: cover;" alt="" class="img-fluid">

                        </div>
                        <div class="editProfile">
                            <div class="userDetail">
                                <div class="avatar">
                                    <img src="{{asset('lawyer_profile/'.$lawyer_profile->image)}}" alt="" style="width:160px; height:160px; border-radius:75px;" class="img-fluid">
                                </div>
                                <div class="userProfile">
                                    <h4>{{$lawyer_profile->user->f_name}} {{$lawyer_profile->user->l_name}}</h4>
                                    <h4 class="firm_name">{{$lawyer_profile->firm_name}}</h4>
                                    <a class="social-icon" href="{{$lawyer_profile->linkedin_url}}" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            @if($lawyer_profile->firm_logo)
                                <div class="userDetail2">
                                    <div class="avatar firm_img">
                                        <img src="{{asset('lawyer_profile/'.$lawyer_profile->firm_logo)}}" alt="" style="width:60px; height:60px; border-radius:75px;" class="img-fluid">
                                    </div>
                                </div>
                            @endif

                            
                            <hr>
                            <div class="listDiv">
                                <ul>
                                    <li>
                                        <div class="imgDiv">
                                            <img src="../assets/img/locationIcon.png" alt="" class="img-fluid">
                                        </div>
                                        <span>{{$lawyer_profile->address}}</span>
                                    </li>
                                    <li>
                                        <div class="imgDiv">
                                            <img src="../assets/img/languageIcon.png" alt="" class="img-fluid">
                                        </div>
                                        <span>
                                            @foreach($lawyer_language as $language)
                                                {{$language->language->name}}
                                                @if(!($loop->last))
                                                ,
                                                @endif
                                            @endforeach
                                        </span>
                                    </li>
                                    <li style="width: 70%; margin-bottom: 0;">
                                        <div class="imgDiv">
                                            <img src="../assets/img/consultantIcon.png" alt="" class="img-fluid">
                                        </div>
                                        <span>@foreach($lawyer_educations as $education)
                                                {{$education->education->education_name}}
                                                @if(!($loop->last))
                                                    ,
                                                @endif
                                            @endforeach</span>
                                    </li>
                                </ul>
                                <hr>
                                <ul class='contact-list'>
                                    
                                    <li style="width: 30%; margin-bottom: 0;">
                                    <div class="imgDiv">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </div>
                                        <span>{{$lawyer->phone ?? ''}}</span>
                                    </li>
                                    <li style="width: 70%; margin-top: 4px;">
                                        <div class="imgDiv">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                        <span>{{$lawyer->email ?? ''}}</span>
                                    </li>
                                </ul>
                                <hr>
                            </div>
                            <div class="editProfileContent">
                                <h4>Practice Area</h4>
                                <div class="listDiv">
                                    <ul>
                                        <li style="width: 50%;">
                                            <span><h6 style="text-transform: uppercase;" class="mr-md-3 font-weight-bold">Primary Practice Area:</h6></span>
                                            <span>{{$lawyer_profile->partise_area_1->name ?? ''}}</span>
                                        </li>
                                        <li style="width: 50%;">
                                            <span><h6 style="text-transform: uppercase;" class="mr-md-3 font-weight-bold">Secondary Practice Area:</h6></span>
                                            {{--<span>{{$lawyer_profile->partise_area_2->name ?? ''}}</span>--}}
                                        </li>
                                        <li style="width: 100%; margin-bottom: 0;">
                                            <span><h6 style="text-transform: uppercase;" class="mr-md-3 font-weight-bold">Third Practice Area:</h6></span>
                                            {{--<span>{{$lawyer_profile->partise_area_3->name ?? ''}}</span>--}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="line">
                                <img src="../assets/img/line.png" alt="" class="img-fluid">
                            </div>
                            <div class="editProfileContent">
                                <h4>profile</h4>
                                {!! $lawyer_profile->description !!}
                                <div class="line">
                                    <img src="../assets/img/line.png" alt="" class="img-fluid">
                                </div>
                                <h4>Education</h4>
                                <ul>
                                    @foreach($lawyer_educations as $education)
                                        <li>-{{$education->education->education_name}}</li>
                                    @endforeach
                                </ul>
                                <div class="line">
                                    <img src="../assets/img/line.png" alt="" class="img-fluid">
                                </div>
                                <h4>Associations & Memberships
                                </h4>
                                <ul>
                                    @foreach($lawyer_memberships as $membership)
                                        <li>-{{$membership->membership->membership_name}}</li>
                                    @endforeach
                                </ul>
                                {{--<div class="line">
                                    <img src="../assets/img/line.png" alt="" class="img-fluid">
                                </div>
                                <h4>Firm Details</h4>
                                <ul>
                                    <li>
                                        -{{$lawyer_profile->firm_name ?? ''}}
                                    </li>
                                    <li>
                                        -Firm Logo
                                        @if($lawyer_profile && $lawyer_profile->firm_logo)
                                            <div class="profileAvatar">
                                                <img style="width: 140px !important; height: 140px !important; border-radius: 84px;" src="{{asset('lawyer_profile/' .$lawyer_profile->firm_logo)}}" alt="" class="img-fluid">
                                            </div>
                                        @endif
                                    </li>

                                </ul>--}}
                            </div>
                        </div>
                    </div>
{{--
                    <div class="recentQuestionDiv mt-5">
                        <h4><img src="../assets/img/recentQuestionIcon.png" alt="" class="img-fluid"> RECENT
                            QUESTIONS ANSWERED</h4>
                        <div class="accordiansDiv">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                data-toggle="collapse" data-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                How to know the labor contract details if the employer never gave a
                                                copy?
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            Some placeholder content for the first accordion panel. This panel is
                                            shown by default, thanks to the <code>.show</code> class.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                data-toggle="collapse" data-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                How to know the labor contract details if the employer never gave a
                                                copy?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            Some placeholder content for the second accordion panel. This panel is
                                            hidden by default.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                data-toggle="collapse" data-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                How to renew a tenancy contract while the landlord is abroad?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            And lastly, the placeholder content for the third and final accordion
                                            panel. This panel is hidden by default.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                data-toggle="collapse" data-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                When to leave work after submitting a notice of non-renewal of an
                                                unlimited contract?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="headingFour" class="collapse" aria-labelledby="headingFour"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            And lastly, the placeholder content for the third and final accordion
                                            panel. This panel is hidden by default.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
--}}
                    @if(count($blogs) > 0)
                        <div class="recentBlog">
                            <h4><img src="../assets/img/recentBlogIcon.png" alt="" class="img-fluid"> RECENT BLOG POSTS
                            </h4>
                            <div class="bolgSection">
                                <div class="recentBlogSlider">
                                    @foreach($blogs as $blog)
                                    <div class="blogCard">
                                        <img src="{{asset('blogs/'.$blog->image)}}" style="width: 208px; height: 128px;" alt="" class="img-fluid">
                                        <div class="cardContent">
                                            <div class="date">
                                                <p>{{ date('d M,Y', strtotime($blog->created_at)) }}</p>
                                            </div>
                                            <h4>{{$blog->title}}</h4>
                                            <p>{{Illuminate\Support\Str::limit($blog->short_description,60) }}</p>
                                            <a href="{{ route('all-blog', $blog->id) }}">Read More <img src="../assets/img/sliderArrow.png" alt=""></a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- <div class="col-lg-4">
                    <div class="hireDiv">
                        <ul>
                            <li>
                                <img src="../assets/img/recentQuestionIcon.png" alt="" class="img-fluid">
                                <span>ASK A testing QUESTION</span>
                            </li>
                            <li>
                                <img src="../assets/img/chatIcon.svg" alt="" class="img-fluid">
                                <span>CHAT</span>
                            </li>
                            <li>
                                <img src="../assets/img/request.png" alt="" class="img-fluid">
                                <span>REQUEST CALLBACK</span>
                            </li>
                        </ul>
                        <div class="btnDiv text-center">
                            <button>Hire</button>

                        </div>
                    </div>
                </div> -->
            </div>
            <!-- <div class="fixedFreeService">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="freeServicesSlider">
                                <div class="relatedService">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12 text-center">
                                                <h2 class="commonHeading">Fixed-fee services</h2>
                                            </div>
                                        </div>
                                        <div class="multiRelatedService fixedServiceSliderDiv">
                                            @if(count($fixed_services) > 0)
                                            @foreach($fixed_services as $fixed_service)
                                            <div class="card">
                                                <img src="{{asset('fixed_service/'.$fixed_service->image)}}" style="width: 360px; height: 235px;" alt="" class="img-fluid">
                                                <div class="cardContent">
                                                    <h4>{{$fixed_service->time_limit}} {{$fixed_service->title}}</h4>
                                                    <p class="tag">{{$fixed_service->expertise->name}}</p>
                                                    <p class="line">
                                                        .................................................................................
                                                    </p>
                                                    <p>{{Illuminate\Support\Str::limit($fixed_service->short_des,150) }}
                                                    </p>
                                                    <div class="cardFooter">
                                                        <h4>{{$fixed_service->price}} <span>USD</span></h4>
                                                        <a href="{{route('fixed_service_detail',$fixed_service->id) }}" class="learnMore">Learn More <img
                                                                src="../assets/img/sliderArrow.png" alt=""
                                                                class="img-fluid"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</main>
@endsection

@section('js')
@endsection

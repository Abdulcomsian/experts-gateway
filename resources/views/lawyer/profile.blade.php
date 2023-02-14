@extends('layout.lawyerlayout')
@section('title')
Dashboard
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
        <div class="profileDiv">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="editBar">
                            <h5>My Profile</h5>
                            <a href="{{ route('lawyer.edit-profile',$lawyer_profile->id) }}"><button style="cursor: pointer; margin-left:25px;padding:10px 30px; font-family:MoskauMedium;border: 2px solid rgb(1 1 1 / 15%); font-size:16px;">Edit Profile </button></a>
                        </div>
                        <div class="editProfileBox">
                            <div class="profileImg">
                                <img src="{{asset('lawyer_cover_image/'.$lawyer_profile->b_image)}}" style="height: 300px !important; object-fit: cover;" alt="" class="img-fluid">

                            </div>
                            <div class="editProfile">
                                <div class="userDetail">
                                    <div class="avatar">
                                        <img src="{{asset('lawyer_profile/'.$lawyer_profile->image)}}" alt="" style="width:160px; height:160px; border-radius:75px;" class="img-fluid">
                                    </div>
                                    <div class="userProfile">
                                        <h4>{{$lawyer->f_name ?? ''}} {{$lawyer->l_name ?? ''}}</h4>
                                        <h4 class="firm_name">{{$lawyer_profile->firm_name}}</h4>
                                        <a class="social-icon" href="{{$lawyer_profile->linkedin_url}}" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                                        {{-- <p>{{$lawyer_profile->title}}</p> --}}
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
                                        <li style="width: 50%;">
                                            <div class="imgDiv">
                                                <img src="../assets/img/locationIcon.png" alt="" class="img-fluid">
                                            </div>
                                            <span>{{$lawyer_profile->address ?? ''}} , {{$country->name ?? ''}} , {{$state->name ?? ''}} , {{$city->name ?? ''}}</span>
                                        </li>
                                        <li style="width: 30%;">
                                            <div class="imgDiv">
                                                <img src="../assets/img/languageIcon.png" alt="" class="img-fluid">
                                            </div>
                                            <span>
                                                @foreach($lawyer_language as $language)
                                                    {{$language->language->name}}
                                                    @if(!($loop->last))
                                                    ,
                                                    @endif
                                                @endforeach</span>
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
                                        <li style="width: 70%; margin: 0px;">
                                        <div class="imgDiv">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                            <span>{{$lawyer->email ?? ''}}</span>
                                        </li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="editProfileContent">
                                    <h4>Practice Area</h4>
                                    <div class="listDiv">
                                        <ul>
                                            <li style="width: 50%;">
                                                    <span><h6 style="text-transform: uppercase; font-size: 14px;" class="mr-md-3 font-weight-bold">Primary Practice Area:</h6></span>
                                                <span>{{$lawyer_profile->partise_area_1->name ?? ''}}</span>
                                            </li>
                                            <li style="width: 50%;">
                                                <span><h6 style="text-transform: uppercase; font-size: 14px;" class="mr-md-3 font-weight-bold">Secondary Practice Area:</h6></span>
                                                <span>{{$lawyer_profile->partise_area_2->name ?? ''}}</span>
                                            </li>
                                            <li style="width: 100%; margin-bottom: 0;">
                                                <span><h6 style="text-transform: uppercase; font-size: 14px;" class="mr-md-3 font-weight-bold">Third Practice Area:</h6></span>
                                                <span>{{$lawyer_profile->partise_area_3->name ?? ''}}</span>
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
                                            <li class="op_67">-{{$education->education->education_name}}</li>
                                        @endforeach
                                    </ul>
                                    <div class="line">
                                        <img src="../assets/img/line.png" alt="" class="img-fluid">
                                    </div>
                                    <h4>Associations & Memberships
                                    </h4>
                                    <ul>
                                        @foreach($lawyer_memberships as $membership)
                                            <li class="op_67">-{{$membership->membership->membership_name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="subscribe_plane">
                            <h4>Subscribed Plans</h4>
                            {{-- <div class="price_div">
                                <div class="package_name_image">
                                    <img src="../assets/img/starter.svg" alt="" class="img-fluid">
                                    <div class="name_div">
                                        <p>Starter</p>
                                        <span>Monthly</span>
                                    </div>
                                </div>
                                <p class="price_package">200/mo</p>
                            </div> --}}
                            <div class="price_div">
                                <div class="package_name_image">
                                    <img src="{{asset('assets/img/starter.svg') }}" alt="" class="img-fluid">
                                    <div class="name_div">
                                        <p>{{$lawyer_profile->package_name ?? ''}}</p>
{{--                                        <span>Monthly</span>--}}
                                    </div>
                                </div>
                                {{-- <p class="price_package">200/mo</p> --}}
                            </div>
{{--                            <div class="recommended_plane">--}}
{{--                                <span class="recommended_text"></span>--}}
{{--                                <div class="pay_buy">--}}
{{--                                    <div class="image_package">--}}
{{--                                        <img src="../assets/img/package.png" alt="" class="img-fluid">--}}
{{--                                        <p>Pro</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="select_package">--}}
{{--                                        <ul>--}}
{{--                                            <li>--}}
{{--                                                <p>Pay Monthly</p>--}}
{{--                                                <span>AED 200/mo</span>--}}
{{--                                            </li>--}}
{{--                                            <li class="active">--}}
{{--                                                <p>Pay Annually Upfront</p>--}}
{{--                                                <span>AED 2160/yr <span>SAVE 10%</span></span>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                        <button>Upgrade</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <div class="profile_score">
                            <div class="d-flex justify-content-between">
                                <h4>Profile Score</h4>
                                <h6 class="approve d-none" style=" letter-spacing: 0px;
                                color: #032231;
                                opacity: 0.72;
                                font-size: 17px;
                                font-family: MoskauMedium;">Approved</h6>
                            </div>
                            <div class="progress_div">
                                <p class="percentage_text"><span>100% </span>complete</p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                    aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                    </div>
                                  </div>
                            </div>
                            <div class="profile_list">
                                <ul>
                                    <li>
                                        <p>PROFILE DETAILS <i class="fa fa-check" aria-hidden="true"></i></p>
                                        <span>Full name, linkedIn url and description provided</span>
                                    </li>
                                    <li>
                                        <p>PROFILE PICTURE <i class="fa fa-check" aria-hidden="true"></i></p>
                                        <span>You’ve included a profile picture, which helps you receive up to 21x more profile views</span>
                                    </li>
                                    <li>
                                        <p>COMPANY ADDRESS <i class="fa fa-check" aria-hidden="true"></i></p>
                                        <span>You have increased your chance of being found by users in {{$city->name ?? ''}}, {{$country->name ?? ''}}</span>
                                    </li>
                                    <li>
                                        <p>LANGUAGE <i class="fa fa-check" aria-hidden="true"></i></p>
                                        <span>You have increased your chance of being found by users who speak
                                            @foreach($lawyer_language as $language)
                                                {{$language->language->name}}
                                                @if(!($loop->last))
                                                ,
                                                @endif
                                            @endforeach
                                        </span>
                                    </li>
                                    <li>
                                        <p>EDUCATION <i class="fa fa-check" aria-hidden="true"></i></p>
                                        <span>You specified
                                            <b>
                                                “@foreach($lawyer_educations as $education)
                                                    {{$education->education->education_name}}
                                                    @if(!($loop->last))
                                                    ,
                                                    @endif
                                                @endforeach"
                                            </b> as your primary practice area</span>
                                    </li>
                                    <li>
                                        <p>MEMBERSHIP AND ASSOCIATIONS <i class="fa fa-check" aria-hidden="true"></i></p>
                                        <span>You are associated with <b>“
                                            @foreach($lawyer_memberships as $membership)
                                            {{$membership->membership->membership_name}}
                                            @if(!($loop->last))
                                            ,
                                            @endif
                                        @endforeach
                                        ”</b></span>
                                    </li>
                                    <li>
                                        <p>PRIMARY PRACTICE AREA <i class="fa fa-check" aria-hidden="true"></i></p>
                                        <span>You specified <b>“{{ $lawyer_profile->partise_area_3->name ?? '' }}"</b> as your primary practice area</span>
                                    </li>
                                    @if($lawyer_profile->secondary_partise_area != null)
                                    <li>
                                        <p style="color: #ED2456;">SECONDARY PRACTICE AREA <i class="fa fa-check" aria-hidden="true"></i></p>
                                        <span>"{{ $lawyer_profile->partise_area_1->name ?? '' }}" is  secondary practice area that will increase you changes of getting hired by 3x</span>
                                    </li>
                                    @endif
                                    @if($lawyer_profile->third_partise_area != null)
                                    <li>
                                        <p style="color: #ED2456;">THIRD PRACTICE AREA <i class="fa fa-check" aria-hidden="true"></i></p>
                                        <span>"{{ $lawyer_profile->partise_area_2->name ?? '' }}" is secondary practice area will increase you changes of getting hired by 4x</span>
                                    </li>
                                    @endif
                                </ul>
                                {{-- <button>Complete Profile</button> --}}
                            </div>
                        </div>
                        {{-- <div class="profile_agre">
                            <h3 class="sec_title">PARTNER PROGRAM AGREEMENT</h3>
                            <p class="sec_para">You need to confirm acceptance of the Partner Program Agreement</p>
                            <a href="#" class="btn btn_red_grad">VIEW AGREEMENT</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

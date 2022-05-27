@extends('layout.lawyerlayout')
@section('title')
Dashboard
@endsection
@section('content')
    <main>
        <div class="profileDiv">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="editBar">
                            <h5>My Profile</h5>
                            <a href="{{ route('lawyer.edit-profile',$lawyer_profile->id) }}"><button style="cursor: pointer; margin-left:25px;padding:10px 30px; font-family:MoskauMedium;border:2px solid hsl(0deg 0% 0% / 15%); font-size:16px;">Edit Profile </button></a>
                        </div>
                        <div class="editProfileBox">
                            <div class="profileImg">
                                <img src="{{asset('lawyer_cover_image/'.$lawyer_profile->b_image)}}" style="width: 790px !important; height: 230px !important;" alt="" class="img-fluid">

                            </div>
                            <div class="editProfile">
                                <div class="userDetail">
                                    <div class="avatar">
                                        <img src="{{asset('lawyer_profile/'.$lawyer_profile->image)}}" alt="" style="width:160px; height:160px; border-radius:75px;" class="img-fluid">
                                    </div>
                                    <div class="userProfile">
                                        <h4>{{$lawyer->f_name}} {{$lawyer->l_name}}</h4>
                                        <p>{{$lawyer_profile->title}}</p>
                                    </div>
                                </div>
                                <div class="line">
                                    <img src="../assets/img/line.png" alt="" class="img-fluid">
                                </div>
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
                                                @endforeach</span>
                                        </li>
                                        <li>
                                            <div class="imgDiv">
                                                <img src="../assets/img/consultantIcon.png" alt="" class="img-fluid">
                                            </div>
                                            <span>@foreach($lawyer_expertises as $expertise)
                                                    {{$expertise->expertise->name}}
                                                    @if(!($loop->last))
                                                    ,
                                                    @endif
                                                @endforeach</span>
                                        </li>
                                        <li>
                                            <div class="imgDiv">
                                                <img src="../assets/img/lawIcon.png" alt="" class="img-fluid">
                                            </div>
                                            <span>Corporate Law</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="line">
                                    <img src="../assets/img/line.png" alt="" class="img-fluid">
                                </div>
                                <div class="editProfileContent">
                                    <h4>profile</h4>
                                    {!! $lawyer_profile->profile_detail !!}
                                    <div class="line">
                                        <img src="../assets/img/line.png" alt="" class="img-fluid">
                                    </div>
                                    <h4>Education</h4>
                                    <ul>
                                        @foreach(explode(',', $lawyer_profile->education) as $education) 
                                        <li>-{{$education}}</li>
                                        @endforeach
                                    </ul>
                                    <div class="line">
                                        <img src="../assets/img/line.png" alt="" class="img-fluid">
                                    </div>
                                    <h4>Associations & Memberships
                                    </h4>
                                    <ul>
                                        @foreach(explode(',', $lawyer_profile->membership) as $membership) 
                                        <li>-{{$membership}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

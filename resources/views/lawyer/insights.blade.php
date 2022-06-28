@extends('layout.lawyerlayout')
@section('title')
Insights
@endsection
@section('content')
<main style="background: #F8F9FA;">
    <div class="titleBanner">
        <h4>Insights</h4>
    </div>
    <div class="orderSection yourOrderSection insight_Section">
        <div class="pills_div">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#overview">Overview</a></li>
                <li><a data-toggle="pill" href="#articles">Articles</a></li>
                <li><a data-toggle="pill" href="#reports">Reports</a></li>
                <li><a data-toggle="pill" href="#case_studies">Case Studies</a></li>
                <li><a data-toggle="pill" href="#white_paper">White Papers</a></li>
                <li><a data-toggle="pill" href="#courses">Courses</a></li>
            </ul>
        </div>
        <div class="tab_div">
            <div class="tab-content">
                <div id="overview" class="tab-pane fade in active show">
                    <div class="overview_content">
                        <h3>Featured</h3>
                    <div class="multi_featured">
                        <div class="row">
                            <div class="col-lg-8">
                                @if($latest_blog)
                                <div class="img_div">
                                    <img src="{{asset('blogs/'.$latest_blog->image)}}" style="height: 278px; width:859px;"   alt="" class="img-fluid">
                                    <div class="text_div">
                                        <span>ARTICLE</span>
                                        <p>{{$latest_blog->title}}</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                            @if($blogs)
                            @foreach($blogs as $blog)
                            <div class="col-lg-4">
                                <div class="img_div">
                                    <img src="{{asset('blogs/'.$blog->image)}}" style="height: 278px; width:410px;" alt="" class="img-fluid">
                                    <div class="text_div">
                                        <span>WHITE PAPER</span>
                                        <p>{{$blog->title}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    </div>
                    <div class="popular_topics">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h3>Popular topics</h3>
                                </div>
                            </div>
                            <div class="multi_topics">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="topics_box">
                                            <img src="{{asset('assets/img/banking_finace.png') }}" alt="" class="img-fluid">
                                            <h3>Banking & Finance</h3>
                                            <a href="">View All <img src="{{asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="topics_box">
                                            <img src="../../assets/img/employment_labour.png') }}" alt="" class="img-fluid">
                                            <h3>Employment & Labour</h3>
                                            <a href="">View All <img src="{{asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="topics_box">
                                            <img src="{{asset('assets/img/family_law.png') }}" alt="" class="img-fluid">
                                            <h3>Family Law Advisory & Divorce</h3>
                                            <a href="">View All <img src="{{asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="topics_box">
                                            <img src="{{asset('assets/img/construction.png') }}" alt="" class="img-fluid">
                                            <h3>Engineering & Construction.</h3>
                                            <a href="">View All <img src="{{asset('assets/img/sliderArrow.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="courses" class="tab-pane fade">
                    <div class="multiple_course">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="course_box">
                                    <img src="{{asset('assets/img/course_1.png') }}" alt="" class="img-fluid">
                                    <div class="course_content">
                                        <div class="course_rating">
                                            <p>COURSE <span class="freeBadge">Free</span></p>
                                            <p>
                                                <i class="fa fa-star"></i>
                                                4.1
                                            </p>
                                        </div>
                                        <h3 class="course_title">Intellectual Property Law Specialization</h3>
                                        <p class="course_description">Become fluent in the rules of the new economy. Learn how to use intellectual property law to protect and maximize the value of your innovations</p>
                                        <p class="week_text">Beginner · Course · 1-3 Weeks</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="course_box">
                                    <img src="{{asset('assets/img/course_2.png') }}" alt="" class="img-fluid">
                                    <div class="course_content">
                                        <div class="course_rating">
                                            <p>COURSE <span class="freeBadge">Free</span></p>
                                            <p>
                                                <i class="fa fa-star"></i>
                                                4.1
                                            </p>
                                        </div>
                                        <h3 class="course_title">Intellectual Property Law Specialization</h3>
                                        <p class="course_description">Become fluent in the rules of the new economy. Learn how to use intellectual property law to protect and maximize the value of your innovations</p>
                                        <p class="week_text">Beginner · Course · 1-3 Weeks</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="course_box">
                                    <img src="{{asset('assets/img/course_3.png') }}" alt="" class="img-fluid">
                                    <div class="course_content">
                                        <div class="course_rating">
                                            <p>COURSE <span class="freeBadge">Free</span></p>
                                            <p>
                                                <i class="fa fa-star"></i>
                                                4.1
                                            </p>
                                        </div>
                                        <h3 class="course_title">Intellectual Property Law Specialization</h3>
                                        <p class="course_description">Become fluent in the rules of the new economy. Learn how to use intellectual property law to protect and maximize the value of your innovations</p>
                                        <p class="week_text">Beginner · Course · 1-3 Weeks</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="course_box">
                                    <img src="{{asset('assets/img/course_4.png') }}" alt="" class="img-fluid">
                                    <div class="course_content">
                                        <div class="course_rating">
                                            <p>COURSE <span class="freeBadge">Free</span></p>
                                            <p>
                                                <i class="fa fa-star"></i>
                                                4.1
                                            </p>
                                        </div>
                                        <h3 class="course_title">Intellectual Property Law Specialization</h3>
                                        <p class="course_description">Become fluent in the rules of the new economy. Learn how to use intellectual property law to protect and maximize the value of your innovations</p>
                                        <p class="week_text">Beginner · Course · 1-3 Weeks</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="course_box">
                                    <img src="{{asset('assets/img/course_5.png') }}" alt="" class="img-fluid">
                                    <div class="course_content">
                                        <div class="course_rating">
                                            <p>COURSE <span class="freeBadge">Free</span></p>
                                            <p>
                                                <i class="fa fa-star"></i>
                                                4.1
                                            </p>
                                        </div>
                                        <h3 class="course_title">Intellectual Property Law Specialization</h3>
                                        <p class="course_description">Become fluent in the rules of the new economy. Learn how to use intellectual property law to protect and maximize the value of your innovations</p>
                                        <p class="week_text">Beginner · Course · 1-3 Weeks</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="course_box">
                                    <img src="{{asset('assets/img/course_6.png') }}" alt="" class="img-fluid">
                                    <div class="course_content">
                                        <div class="course_rating">
                                            <p>COURSE <span class="freeBadge">Free</span></p>
                                            <p>
                                                <i class="fa fa-star"></i>
                                                4.1
                                            </p>
                                        </div>
                                        <h3 class="course_title">Intellectual Property Law Specialization</h3>
                                        <p class="course_description">Become fluent in the rules of the new economy. Learn how to use intellectual property law to protect and maximize the value of your innovations</p>
                                        <p class="week_text">Beginner · Course · 1-3 Weeks</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
   
</main>
@endsection

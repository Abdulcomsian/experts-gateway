@extends('layout.loginlayout')
@section('title')
blog
@endsection
@section('content')
    <main>
        <div class="mainBanner commonBanner blogBanner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="bannerLeft">
                            <h2 class="commonHeading">Blog</h2>
                            <p class="commonPara">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed<br> aliquam id nibh ut efficitur. Proin congue interdum lacus, sed<br> ornare augue viverra sit amet.</p>
                        </div>

                    </div>
                    <div class="col-lg-6" style="padding: 0px;">
                        <div class="bannerRight">
                            <img src="{{asset('assets/img/blogBanner.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bolgSection">
            <div class="sortingDiv">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="selectDiv">
                                <p>Sort By</p>
                                <select name="" id="">
                                    <option value="Latest">Latest</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="multiBlog">
                <div class="row">
                    @if(count($blogs) > 0)
                    @foreach($blogs as $blog)
                    <div class="col-lg-4">
                        <div class="blogCard">
                            <a href="{{ route('all-blog',$blog->id) }}">
                                <img src="{{asset('blogs/'.$blog->image)}}" alt="" class="img-fluid">
                            </a>
                                <div class="cardContent" style="color: #212529 !important">
                                    <a class="position-relative" href="{{ route('all-blog',$blog->id) }}">
                                    <div class="date">
                                        <p>{{ date('d M,Y', strtotime($blog->created_at)) }}</p>
                                    </div>
                                    <div style="color: #212529">
                                    <h4>{{$blog->title}}</h4>
                                       {{\Illuminate\Support\Str::limit($blog->short_description,20,'...')}}
                                    </div>
                                    </a><br>
                                    <a href="{{ route('all-blog',$blog->id) }}">Read More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt=""></a>
                                </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                        <strong> No Blogs Created Yet </strong>
                    @endif
                </div>
            </div>
            <div class="paginationDiv" style="display:none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="paginationList">
                                <ul>
                                    <li>
                                        <img src="{{ asset('assets/img/leftIcon.png') }}" alt="">
                                    </li>
                                    <li>
                                        <a href="">1</a>
                                    </li>
                                    <li>
                                        <a href="">2</a>
                                    </li>
                                    <li>
                                        <a href="">3</a>
                                    </li>
                                    <li>
                                        <a href="">4</a>
                                    </li>
                                    <li>
                                        <a href="">5</a>
                                    </li>
                                    <li>
                                        <img src="{{ asset('assets/img/rightIcon.png') }}" alt="">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

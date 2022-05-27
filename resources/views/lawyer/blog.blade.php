@extends('layout.lawyerlayout')
@section('title')
Dashboard
@endsection
@section('content')
    <main>
        <div class="profileDiv fixedDiv commonCard">
            <div class="mainFixedService">
                <h5>Blog</h5>
                <div class="blogDetailCard">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <img src="{{asset('blogs/'.$blog->image)}}" style="height:375px !important;" alt="" class="img-fluid">
                                    <div class="cardContent">
                                        <div class="dateLikeDiv">
                                            <div class="dateLike">
                                                <p class="date">{{ date('d M,Y', strtotime($blog->created_at)) }}</p> <span><i style="color: #ED2456;" class="fa fa-heart" aria-hidden="true"></i> 1,556
                                                    Likes</span>
                                            </div>
                                            <div class="editDiv">
                                                <p>Edit</p>
                                            </div>
                                        </div>
                                        <p class="postedBy">Posted by <b>{{ Auth::user()->name }}</b></p>
                                        <h4>{{$blog->title}}</h4>
                                        {!! $blog->description !!}
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

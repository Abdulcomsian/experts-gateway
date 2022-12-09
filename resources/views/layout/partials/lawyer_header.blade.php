<?php error_reporting(0);?>
<!-- Loader -->
@if(Route::is(['map-grid','map-list']))
<div id="loader">
		<div class="loader">
			<span></span>
			<span></span>
		</div>
	</div>
	@endif
	<!-- /Loader  -->
	<!-- Header -->
	<header class="profileHeader">
        <div class="userDiv">
            <div class="userProfile">
                <img src="{{ asset('assets/img/userIcon.svg') }}" alt="" class="img-fluid">
                <span class="downIcon">
                    <i class="fa fa-sort-desc" aria-hidden="true"></i>
                </span>
                <div class="dropDownMenu">
                    <ul>
                    	<li>
                        	<span>{{ Auth::user()->name }}</span>
                        </li>
                        <div class="line"></div>
                        <li>
                            <img src="{{ asset('assets/img/myOrder.png') }}" alt="" class="img-fluid">
                            <span>
                                <a href="{{ route('lawyer.profile') }}">My Profile</a>
                            </span>
                        </li>
                        {{--@if(Auth::user()->hasRole('Lawyer'))
                        <li>
                            <img src="{{ asset('assets/img/myOrder.png') }}" alt="" class="img-fluid">
                            <span>
                                <a href="{{ route('lawyer.dashboard') }}">My Dashboard</a>
                            </span>
                        </li>
                        @endif--}}
                        <li>
                            <img src="{{ asset('assets/img/loginIcon.png') }}" alt="" class="img-fluid">
                            <span>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="{{url('/lawyer/profile')}}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    @if($lawyer->status == '1')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lawyer.profile') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create.blog') }}">Blog</a>
                    </li>
                   {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('lawyer.earning') }}">Earnings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lawyer.fixed-service') }}">Fixed Services</a>
                    </li>--}}
                    {{--<li class="nav-item">
                        <a class="nav-link" href="{{ route('lawyer.public_question') }}">Public Questions & Call Requests</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lawyer.insights') }}">Insights</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Community</a>
                    </li>--}}
                    @endif
                </ul>
            </div>
        </nav>
        <!-- <div class="subHeader">
            <nav class="navbar navbar-expand-md">


            </nav>
        </div> -->
    </header>
<div class="main-wrapper position-relative">
    <div class="pre_loader">
        <div class="spinner-border text-danger" role="status">
            <span class="sr-only">Loading...</span>
          </div>
    </div>

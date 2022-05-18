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
                                <a href="./order/index.html">My Orders</a>
                            </span>
                        </li>
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
            <a class="navbar-brand" href="#">
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
                    <li class="nav-item">
                        <a class="nav-link" href="./earning.html">Earnings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./fixedService/fixedService.html">Fixed Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./publicQuestion.html">Public Questions & Call Requests</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lawyer.profile') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create.blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./earning.html">Earnings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./fixedService/fixedService.html">Fixed Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./publicQuestion.html">Public Questions & Call Requests</a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
        <!-- <div class="subHeader">
            <nav class="navbar navbar-expand-md">

               
            </nav>
        </div> -->
    </header>
<div class="main-wrapper">

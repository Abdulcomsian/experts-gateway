<?php error_reporting(0);?>
<!-- Header -->
<header style="background-color: transparent;">
        <div class="userDiv">
            <div class="userProfile">
                <img src="{{asset('assets/img/userIcon.svg')}}" alt="" class="img-fluid">
                <span class="downIcon">
                    <i class="fa fa-sort-desc" aria-hidden="true"></i>
                </span>
                <div class="dropDownMenu">
                    <ul>
                        @if(Auth::user()->f_name)
                        <li>
                            <span>{{ Auth::user()->f_name }}</span>
                        </li>
                        <div class="line"></div>
                        <!-- <li>
                            <img src="{{ asset('assets/img/myOrder.png') }}" alt="" class="img-fluid">
                            <span>
                                <a href="./order/index.html">My Orders</a>
                            </span>
                        </li> -->
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
                        @else
                        <li>
                            <img src="{{asset('assets/img/loginIcon.png')}}" alt="" class="img-fluid">
                            <span>
                                <a href="{{ route('login') }}">User Login</a>
                            </span>
                        </li>
                        <div class="line"></div>
                        <li>
                            <img src="{{asset('assets/img/loginIcon.png')}}" alt="" class="img-fluid">
                            <span>
                                <a href="{{ route('lawyer-login') }}">Lawyer Login</a>
                            </span>
                        </li>
                        <div class="line"></div>
                        <!-- <li>
                            <img src="{{asset('assets/img/myOrder.png')}}" alt="" class="img-fluid">
                            <span>
                                <a href="#">My Orders</a>
                            </span>
                        </li> -->
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{asset('assets/img/logo.png')}}" alt="" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about-us') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/experts') }}">Experts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services') }}">Services</a>
                        
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Apply</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{route('lawyer-register') }}">Apply as Lawyer </a>
                          <a class="dropdown-item" href="{{route('register') }}">Apply as Client</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-blogs') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact-us') }}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <img src="{{asset('assets/img/searchIcon.png')}}" alt="" class="img-fluid">
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<!-- /Header -->

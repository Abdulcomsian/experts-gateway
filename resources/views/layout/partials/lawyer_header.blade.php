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
                <img src="../../assets/img/userIcon.svg" alt="" class="img-fluid">
            
                <button type="button" class="btn dropdown-toggle" style="line-height: 0.2px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    
                </button>
                <div class="dropdown-menu">
                    {{ Auth::user()->name }}
                	<div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('login') }}">Orders</a>
                    <a class="dropdown-item" href="">Logout</a>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="#">
                <img src="../assets/img/logo.png" alt="" class="img-fluid">
            </a>
        </nav>
        <div class="subHeader">
            <nav class="navbar navbar-expand-md">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Earnings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Fixed Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Public Questions & Call Requests</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
<div class="main-wrapper">

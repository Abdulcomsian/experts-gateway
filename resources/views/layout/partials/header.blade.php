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
	<header class="header">
				<div class="header-fixed">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="../../" class="navbar-brand logo">
							<!-- <img src="{{asset('assets/img/leftLogo.png') }}" class="img-fluid" style="height: 44px !important;" alt="Logo"> -->
							<i class="fa fa-arrow-left"></i> Back to Home
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="/demo/screens/assessment/public" class="menu-logo">
								<img src="{{asset('assets/img/leftLogo.png') }}" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>		 
					</div>		 
					<ul class="nav header-navbar-rht">
					<!-- @if(Route::is(['pagee','mentor-register','mentee-register'])) -->
						<!-- <li class="nav-item">
							<a class="nav-link" href="login">Login</a>
						</li> -->
						<!-- <li class="nav-item">
							<a class="nav-link header-login" href="register">Register</a>
						</li> -->
						<!-- @endif -->
						<!-- @if(!Route::is(['pagee','mentor-register','mentee-register'])) -->
                        @auth
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="{{asset('assets/img/user/user.jpg')}}" width="31" alt="Darren Elder">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="{{asset('assets/img/user/user.jpg') }}" alt="User Image" class="avatar-img rounded-circle">
									</div>
    								<div class="user-text">

    								    <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        <a class="dropdown-item" href="{{ route('user.dashboard') }}">User Dashboard</a>
    							     </div>

                                 </div>

						</li>
                        @else
                        <li class="nav-item">
                            <a style="background: #fff;border-radius: 11px;" class="nav-link" href="login">Login</a>
                        </li>
                        @endif
						<!-- /User Menu -->
                        @endif
						
					</ul>
					
				</nav>
				</div>
			</header>
			<!-- /Header -->
<div class="main-wrapper">

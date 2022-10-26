	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		<div class="header">

			<!-- Logo -->
			<div class="header-left">
				<a href="/demo/screens/assessment/public" class="logo">
					<img src="http://127.0.0.1:8000/assets/img/leftLogo.png" class="img-fluid" style="height: 44px !important;" alt="Logo">
				</a>
				<a href="/demo/screens/assessment/public" class="logo logo-small">
					<img src="http://127.0.0.1:8000/assets/img/leftLogo.png" class="img-fluid" style="height: 44px !important;" alt="Logo">
				</a>
			</div>
			<!-- /Logo -->

			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fe fe-text-align-left"></i>
			</a>

			<div class="top-nav-search">

			</div>

			<!-- Mobile Menu Toggle -->
			<a class="mobile_btn" id="mobile_btn">
				<i class="fa fa-bars"></i>
			</a>
			<!-- /Mobile Menu Toggle -->

			<!-- Header Right Menu -->
			<ul class="nav user-menu">
				<!-- User Menu -->
				<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img"><img class="rounded-circle" src="{{asset('assets_admin/img/profiles/avatar-12.jpg')}}" width="31" alt="Ryan Taylor"></span>
					</a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm">
								<img src="{{asset('assets_admin/img/profiles/avatar-12.jpg')}}" alt="User Image" class="avatar-img rounded-circle">
							</div>
							<div class="user-text">
								<h6>{{Auth::user()->name}}</h6>
								<p class="text-muted mb-0">Administrator</p>
							</div>
						</div>
						<a href="{{route('edit_profile')}}" class="dropdown-item">My Profile</a>
						<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
					</div>
				</li>
				<!-- /User Menu -->

			</ul>
			<!-- /Header Right Menu -->

		</div>
		<!-- /Header -->

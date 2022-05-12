<!-- Sidebar -->
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							@if(Auth::user()->hasRole('Admin'))
							<li class="menu-title"> 
								<span><i class="fe fe-home"></i> Main</span>
							</li>
							<li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"> 
								<a href="{{ url('admin/dashboard') }}"><span>Dashboard</span></a>
							</li>

							<li class="menu-title"> 
								<span><i class="fe fe-document"></i> Course</span>
							</li>
							<li class="{{ Request::is('admin/course') ? 'active' : '' }}"> 
								<a href="{{ url('admin/course') }}"><span>Manage Course</span></a>
							</li>
							<li class="{{ Request::is('admin/course-category') ? 'active' : '' }}"> 
								<a href="{{ url('admin/course-category') }}"><span>Manage Course Category</span></a>
							</li>
							<li class="{{ Request::is('admin/course-lesson') ? 'active' : '' }}"> 
								<a href="{{ url('admin/course-lesson') }}"><span>Manage Course Lessons</span></a>
							</li>
							
							<li class="menu-title"> 
								<span><i class="fe fe-document"></i> Pages</span>
							</li>
							<li class="submenu"> 
								<a href="#"><span>Users</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{ Request::is('admin/user') ? 'active' : '' }}" href="{{ url('admin/user') }}"> User </a></li>
									<li><a class="{{ Request::is('admin/user/create') ? 'active' : '' }}" href="{{ url('admin/user/create') }}"> Add User </a></li>
								</ul>
							</li>
							<li class="{{ Request::is('admin/user_info') ? 'active' : '' }}"> 
								<a href="{{ url('admin/user_info') }}"><span>User Log</span></a>
							</li>

							<li class="{{ Request::is('admin/category') ? 'active' : '' }}"> 
								<a href="{{ url('admin/category') }}"><span>Category</span></a>
							</li>

							<li class="submenu"> 
								<a href="#"><span>Quiz Questons</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{ Request::is('admin/quiz') ? 'active' : '' }}" href="{{ url('admin/quiz') }}"> Questions </a></li>
									<li><a class="{{ Request::is('admin/quiz/create') ? 'active' : '' }}" href="{{ url('admin/quiz/create') }}"> Add Question </a></li>
								</ul>
							</li>
							<li class="menu-title"> 
								<span><i class="fe fe-document"></i> Result</span>
							</li>
							<li class="{{ Request::is('admin/quiz_result') ? 'active' : '' }}"> 
								<a href="{{ url('admin/quiz_result') }}"><span>Quiz Results</span></a>
							</li>

							@endif
							@if(Auth::user()->hasRole('User'))
							<li class="menu-title"> 
								<span><i class="fe fe-home"></i> Main</span>
							</li>
							<li class="{{ Request::is('user/dashboard') ? 'active' : '' }}"> 
								<a href="{{ url('user/dashboard') }}"><span>Dashboard</span></a>
							</li>
							<li class="menu-title"> 
								<span><i class="fe fe-home"></i> Result</span>
							</li>
							<li class="{{ Request::is('user/q_result') ? 'active' : '' }}"> 
								<a href="{{ url('user/q_result') }}"><span>Quiz Results</span></a>
							</li>
							@endif
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
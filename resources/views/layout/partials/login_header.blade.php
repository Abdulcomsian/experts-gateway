<?php error_reporting(0);?>
<!-- Header -->
<header style="background-color: transparent;">
    <div class="userDiv">
        <div class="userProfile">
            <img src="../../assets/img/userIcon.svg" alt="" class="img-fluid">
            
                <button type="button" class="btn dropdown-toggle" style="line-height: 0.2px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('login') }}">User Login</a>
                    <a class="dropdown-item" href="{{ route('lawyer-login') }}">Lawyer Login</a>
                    <a class="dropdown-item" href="">My orders</a>
                </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="#">
            <img src="../../assets/img/logo.png" alt="" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Experts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Apply</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img src="../../assets/img/searchIcon.png" alt="" class="img-fluid">
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- /Header -->

<?php error_reporting(0);?>
<!-- Header -->
<header style="background-color: transparent;">
        <div class="userDiv">
            <div class="userProfile">
                <img src="../assets/img/userIcon.svg" alt="" class="img-fluid">
                <span class="downIcon">
                    <i class="fa fa-sort-desc" aria-hidden="true"></i>
                </span>
                <div class="dropDownMenu">
                    <ul>
                        <li>
                            <img src="../assets/img/loginIcon.png" alt="" class="img-fluid">
                            <span>
                                <a href="{{ route('login') }}">User Login</a>
                            </span>
                        </li>
                        <div class="line"></div>
                        <li>
                            <img src="../assets/img/loginIcon.png" alt="" class="img-fluid">
                            <span>
                                <a href="{{ route('lawyer-login') }}">Lawyer Login</a>
                            </span>
                        </li>
                        <div class="line"></div>
                        <li>
                            <img src="../assets/img/myOrder.png" alt="" class="img-fluid">
                            <span>
                                <a href="#">My Orders</a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="#">
                <img src="../assets/img/logo.png" alt="" class="img-fluid">
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
                        <a class="nav-link" href="./aboutUs.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./experts.html">Experts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./fixed-free.html">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./apply/index.html">Apply</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-blogs') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contactus.html">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <img src="../assets/img/searchIcon.png" alt="" class="img-fluid">
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<!-- /Header -->

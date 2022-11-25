
@extends('layout.loginlayout')
@section('content')
<style type="text/css">
    header {
    padding: 40px 70px;
     position: relative; 
    width: 100%;
    /* top: 0px; */
    z-index: 99;
   }
   .aboutUs {
    background-position: center;
    background-size: auto;
    padding: 100px 0px;
}
.aboutUs .aboutUsContent {
    width: 100%;
    max-width: 38%;
    margin: auto;
    padding: 70px 0px;
    color: #fff;
    }
</style>
<main>
    <div class="aboutUs">
        <div class="container-fluid">
            <div class="row">
           
                <div class="col-lg-12 text-center">
                    <div class="aboutUsContent">
                        <h2>Great! Now check your inbox.</h2>
                                                <p>We just sent you an email to complete the sign-up process & set your password. Please check your spam folder if you haven’t received it within a few minutes.

Need some help? Shoot us a note at support@expertsgateway.com. We're here to help!</p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@extends('layout.loginlayout')
@section('title')
Service
@endsection
@section('content')
    <main>
        <div class="mainBanner commonBanner blogDetailBanner"></div>
        <div class="blogDetailCard">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <img src="{{asset('services/'.$service->image)}}" style="height: 330px !important;" alt="" class="img-fluid">
                            <div class="cardContent">
                                <div class="dateLikeDiv">
                                    <p class="date">{{ date('d M,Y', strtotime($service->created_at)) }}</p>
                                </div>
                                <p class="postedBy">Posted by <b>{{$service->user->f_name}} {{$service->user->l_name}}</b></p>
                                <h4>{{$service->title}}</h4><br>
                                {!! $service->description !!}<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="relatedService">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="commonHeading">Related Services</h2>
                    </div>
                </div>
                <div class="multiRelatedService">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <img src="../../assets/img/service1.png" alt="" style="width:376px; height:246px;" class="img-fluid">
                                <div class="cardContent">
                                    <h4>20-minute tax advice session on VAT in the UAE</h4>
                                    <p class="tag">Business</p>
                                    <p class="line">.................................................................................</p>
                                    <p>A 20-minute phone call with an attorney to get advice on implementation of Value
                                        Added Tax (VAT) in the UAE. The lawyer you hire will answer your questions and
                                        give you legal advice and practical guidance so you can move forward with
                                        confidence.
                                    </p>
                                    <div class="cardFooter">
                                        <h4>30 <span>USD</span></h4>
                                        <a href="" class="learnMore">Learn More <img src="../../assets/img/sliderArrow.png" alt="" class="img-fluid"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <img src="../../assets/img/service2.png" alt="" class="img-fluid">
                                <div class="cardContent">
                                    <h4>Two-hour Intellectual Property counselling session</h4>
                                    <p class="tag">Intellectual Property</p>
                                    <p class="line">.................................................................................</p>
                                    <p>A 20-minute phone call with an attorney to get advice on implementation of Value
                                        Added Tax (VAT) in the UAE. The lawyer you hire will answer your questions and
                                        give you legal advice and practical guidance so you can move forward with
                                        confidence.
                                    </p>
                                    <div class="cardFooter">
                                        <h4>40 <span>USD</span></h4>
                                        <a href="" class="learnMore">Learn More <img src="../../assets/img/sliderArrow.png" alt="" class="img-fluid"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <img src="../../assets/img/service3.png" alt="" class="img-fluid">
                                <div class="cardContent">
                                    <h4>Drafting and serving a legal notice</h4>
                                    <p class="tag">Litigation</p>
                                    <p class="line">.................................................................................</p>
                                    <p>A 20-minute phone call with an attorney to get advice on implementation of Value
                                        Added Tax (VAT) in the UAE. The lawyer you hire will answer your questions and
                                        give you legal advice and practical guidance so you can move forward with
                                        confidence.
                                    </p>
                                    <div class="cardFooter">
                                        <h4>120 <span>USD</span></h4>
                                        <a href="" class="learnMore">Learn More <img src="../../assets/img/sliderArrow.png" alt="" class="img-fluid"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="requestInformation">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="informationContent">
                            <h2>Request Information</h2>
                            <div class="formDiv">
                                <form action="">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="inputDiv">
                                                <input type="text" name="first_name" id="first_name"
                                                    placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="inputDiv">
                                                <input type="text" name="last_name" id="last_name"
                                                    placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="inputDiv">
                                                <input type="text" name="email" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="inputDiv">
                                                <input type="text" name="phone" id="phone" placeholder="Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="inputDiv">
                                                <textarea name="message" id="message" placeholder="Message" cols="30"
                                                    rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button>Submit Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center">
                        <div class="imgText">
                            <img src="../../assets/img/information.png" alt="" class="img-fluid">
                            <div class="imgTextMiddle">
                                <p>Legal Advice<br> Across the<br> Globe</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

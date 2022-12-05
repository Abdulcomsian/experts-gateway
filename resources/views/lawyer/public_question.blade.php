@extends('layout.lawyerlayout')
@section('title')
Dashboard
@endsection
@section('content')
<main>
    <div class="profileDiv">
        <h5>Public Questions & Call Requests</h5>
        <div class="questionsContactDiv">
            <div class="row">
                <div class="col-lg-12">
                    <div class="unanswerdDiv">
                        <h4>Unanswered Questions</h4>
                        <div class="questionDiv">
                            <span>QUESTION</span>
                            <p>Is it safe to travel to the GCC when you have cheque bounce cases in the UAE?</p>
                            <div class="question">
                                <p>Hi,</p>
                                <p>I have two cheque cases in the UAE worth around 100K and one commercial civil
                                    case worth 55K and I left the UAE without an exit stamp on my passport.</p>
                                <p>Can I travel anywhere in GCC?</p>
                            </div>
                            <span class="commonSpan">
                                <img src="../assets/img/answereIcon.svg" alt="" class="img-fluid">
                                ANSWER
                            </span>
                            <span class="commonSpan">
                                <img src="../assets/img/reportIcon.svg" alt="" class="img-fluid">
                                REPORT
                            </span>
                        </div>
                        <div class="postAnswere">
                            <form action="">
                                <textarea name="" id="" cols="30" rows="10"
                                    placeholder="Post your Answer"></textarea>
                                <button>Post</button>
                            </form>
                        </div>
                        <div class="line" style="margin-top: 150px;">
                            <img src="../assets/img/line.png" alt="" class="img-fluid">
                        </div>
                        <div class="accordiansDiv">
                            <span>QUESTION</span>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                data-toggle="collapse" data-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                Traveling to a GCC country while there are travel ban and cheque bounce case in the UAE
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            Some placeholder content for the first accordion panel. This panel is
                                            shown by default, thanks to the <code>.show</code> class.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="answereDiv">
                        <h4>Answered Questions</h4>
                        <div class="accordiansDiv" style="margin-top: 65px;">
                            <span>QUESTION</span>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                data-toggle="collapse" data-target="#answere"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                Legal way to exit the UAE with a bank loan?
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="answere" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                           <p>How to legally exit the UAE with an unpaid loan?</p>
                                           <div class="answereBox">
                                               <span>ANSWER</span>
                                               <div class="boxHeader">
                                                   <div class="profileAnswereDiv">
                                                       <img src="../assets/img/avatar.png" alt="" class="img-fluid">
                                                       <div class="profileContent">
                                                           <h4>Aaron Bourke</h4>
                                                           <p>King & Wood Mallesons</p>
                                                       </div>

                                                   </div>
                                                   <button>Edit</button>
                                               </div>
                                               <div class="questioner">
                                                   <p>Dear Questioner,</p>
                                                   <p>You will have no other choice than reaching an amicable deal with the bank to try your best to pay part of the loan and the outstanding to be scheduled on several payments either before or after you leave the country. This is the only legal way.</p>
                                                   <p>Regards,</p>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="col-lg-4">
                    <div class="callRequest">
                        <div class="header">
                            <p>CALL REQUESTS</p>
                        </div>
                        <div class="callContent">
                            <div class="requestBox">
                                <div class="profileRequestDiv">
                                    <img src="../assets/img/21b7d48a686f22d4fc64d5f2b93600d0.png" alt="" class="img-fluid">
                                    <div class="detailDiv">
                                        <h4>Amy Doe</h4>
                                        <p>UAE, Dubai</p>
                                    </div>
                                </div>
                                <div class="contactDiv">
                                    <p>
                                        <i class="fa fa-envelope" aria-hidden="true"></i> amy.doe@gmail.com
                                    </p>
                                    <p>
                                        <i class="fa fa-phone" aria-hidden="true"></i> +971 5656 77773
                                    </p>
                                </div>
                                <div class="messageBox">
                                    <p>Hi,</p>
                                    <p>I would like to discuss debt consolidation and settlement</p>
                                </div>
                            </div>
                            <div class="requestBox">
                                <div class="profileRequestDiv">
                                    <img src="../assets/img/21b7d48a686f22d4fc64d5f2b93600d0.png" alt="" class="img-fluid">
                                    <div class="detailDiv">
                                        <h4>Amy Doe</h4>
                                        <p>UAE, Dubai</p>
                                    </div>
                                </div>
                                <div class="contactDiv">
                                    <p>
                                        <i class="fa fa-envelope" aria-hidden="true"></i> amy.doe@gmail.com
                                    </p>
                                    <p>
                                        <i class="fa fa-phone" aria-hidden="true"></i> +971 5656 77773
                                    </p>
                                </div>
                                <div class="messageBox">
                                    <p>Hi,</p>
                                    <p>I would like to discuss debt consolidation and settlement</p>
                                </div>
                            </div>
                            <div class="requestBox">
                                <div class="profileRequestDiv">
                                    <img src="../assets/img/21b7d48a686f22d4fc64d5f2b93600d0.png" alt="" class="img-fluid">
                                    <div class="detailDiv">
                                        <h4>Amy Doe</h4>
                                        <p>UAE, Dubai</p>
                                    </div>
                                </div>
                                <div class="contactDiv">
                                    <p>
                                        <i class="fa fa-envelope" aria-hidden="true"></i> amy.doe@gmail.com
                                    </p>
                                    <p>
                                        <i class="fa fa-phone" aria-hidden="true"></i> +971 5656 77773
                                    </p>
                                </div>
                                <div class="messageBox">
                                    <p>Hi,</p>
                                    <p>I would like to discuss debt consolidation and settlement</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>
</main>
@endsection

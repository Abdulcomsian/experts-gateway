@extends('layout.lawyerlayout')
@section('title')
Profile building
@endsection
@push('styles')
@endpush
@section('content')
<main>
    <div class="profileDiv">
        <div class="applyDiv">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="pillsDiv">
                            <ul class="nav nav-pills">
                                <li><a data-toggle="pill" href="#home" class="active">Upload Photos</a></li>
                                <li><a data-toggle="pill" href="#location">Location, Language</a></li>
                                <li><a data-toggle="pill" href="#profile">Profile</a></li>
                                <li><a data-toggle="pill" href="#education">Education</a></li>
                                <li><a data-toggle="pill" href="#memberShip">Membership & Associations</a></li>
                                <li><a data-toggle="pill" href="#pricing">Membership Pricing</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="contentDiv">
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade show in active">
                                    <div class="profileBox">
                                        <div class="profileBoxHeader">
                                            <div class="uploadCover">
                                                <input type="file" name="" id="">
                                                <p>Upload Cover Image</p>
                                            </div>
                                            <div class="profileAvatar">
                                                <img src="../../assets/img/avatar.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="profileFormDiv">
                                            <form action="">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="inputDiv">
                                                            <input type="text" placeholder="First Name"
                                                                name="first_name" id="first_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="inputDiv">
                                                            <input type="text" placeholder="Last Name"
                                                                name="last_name" id="last_name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="location" class="tab-pane fade">
                                    <div class="formDiv commonTabDiv">
                                        <form action="">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="inputDiv">
                                                        <label for="">Location</label>
                                                        <input type="text" placeholder="Location" name="location"
                                                            id="location">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="multiSelect">
                                                        <label for="">Select Language</label>
                                                        <select class="js-example-basic-multiple" name="states[]"
                                                            multiple="multiple">
                                                            <option value="AL">English</option>
                                                            <option value="WY">Franch</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="multiSelect">
                                                        <label for="">Select Legal consultant</label>
                                                        <select class="js-example-basic-multiple" name="states[]"
                                                            multiple="multiple">
                                                            <option value="AL">English</option>
                                                            <option value="WY">Franch</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="multiSelect">
                                                        <label for="">Select Corporate Law</label>
                                                        <select class="js-example-basic-multiple" name="states[]"
                                                            multiple="multiple">
                                                            <option value="AL">English</option>
                                                            <option value="WY">Franch</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="profile" class="tab-pane fade">
                                    <div class="formDiv commonTabDiv">
                                        <form action="">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="inputDiv">
                                                        <label for="">Profile Description</label>
                                                        <textarea name="" id="" cols="20" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="education" class="tab-pane fade">
                                    <div class="formDiv commonTabDiv">
                                        <form action="">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="inputDiv">
                                                        <label for="">Education</label>
                                                        <input type="text" name="education" id="education"
                                                            placeholder="Enter Education">

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="memberShip" class="tab-pane fade">
                                    <div class="formDiv commonTabDiv">
                                        <form action="">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="multiSelect">
                                                        <label for="">Select Membership & Association Law</label>
                                                        <select class="js-example-basic-multiple" name="states[]"
                                                            multiple="multiple">
                                                            <option value="AL">English</option>
                                                            <option value="WY">Franch</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="pricing" class="tab-pane fade">
                                    <div class="formDiv commonTabDiv">
                                        <form action="">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="pricingDiv">
                                                        <div class="priceDivHeader">
                                                            <h4>Basic</h4>
                                                            <p>$0 <span>/ mon</span></p>
                                                        </div>
                                                        <div class="pricingBody">
                                                            <p>Get the Essentials to Launch a simple site.</p>
                                                            <div class="listDiv">
                                                                <ul>
                                                                    <li>
                                                                        <a href="">Custom Domain</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="">0 CMS Items</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="">50 GB Bandwidth</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="pricingFooter">
                                                            <button>Buy Now</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="pricingDiv">
                                                        <div class="priceDivHeader">
                                                            <h4>Medium</h4>
                                                            <p>$10 <span>/ mon</span></p>
                                                        </div>
                                                        <div class="pricingBody">
                                                            <p>Get the Essentials to Launch a simple site.</p>
                                                            <div class="listDiv">
                                                                <ul>
                                                                    <li>
                                                                        <a href="">Custom Domain</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="">0 CMS Items</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="">50 GB Bandwidth</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="pricingFooter">
                                                            <button>Buy Now</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="pricingDiv">
                                                        <div class="priceDivHeader">
                                                            <h4>Standard</h4>
                                                            <p>$20 <span>/ mon</span></p>
                                                        </div>
                                                        <div class="pricingBody">
                                                            <p>Get the Essentials to Launch a simple site.</p>
                                                            <div class="listDiv">
                                                                <ul>
                                                                    <li>
                                                                        <a href="">Custom Domain</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="">0 CMS Items</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="">50 GB Bandwidth</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="pricingFooter">
                                                            <button>Buy Now</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- <div class="btnDiv">
                                    <button class="tabNextBtn">Next</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });
</script>
@endsection

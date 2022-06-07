@extends('layout.lawyerlayout')
@section('title')
Profile building
@endsection
@push('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@endpush
@section('content')
<main>
    <div class="on-boarding-main profileDiv">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="on-boarding-left-bar">
                        <div class="content-div">
                            <h3>Ready to Start<br> Your Journey?</h3>
                            <div class="progress-div">
                                <p><span class="percentage-text">0%</span> Complete</p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                        aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                        <span class="sr-only">70% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pills-div">
                                <ul class="nav nav-pills">
                                    <li class="active"><a data-toggle="pill" href="#profile">Profile</a></li>
                                    <div class="imageTab">
                                        <img src="../../assets/img/profileTab.svg" alt="" class="img-fluid">
                                    </div>
                                    <li><a data-toggle="pill" href="#lawyer">Lawyer Information</a></li>
                                    <div class="imageTab">
                                        <img src="../../assets/img/lawyerIcon.svg" alt="" class="img-fluid">
                                    </div>
                                    <li><a data-toggle="pill" href="#membership">Membership</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="pills-div-main">
                        <div class="tab-content">
                            <div id="profile" class="tab-pane fade in active show">
                                <div class="profile-div">
                                    <div class="formDiv">
                                        <form action="" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="uploadBanner">
                                                <img src="../../assets/img/uploadIcon.png" alt="" class="img-fluid">
                                                <div class="uploadImgBanner">
                                                    <p>Upload Cover Image</p>
                                                    <input type="file" name="b_image" id="b_image" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="tabContent">
                                                <div class="uplodProfilePhoto">
                                                    <div class="uploadPhoto">
                                                        <p>Upload <br>Profile Image</p>
                                                        <input type="file" name="image" id="image" accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="formDiv">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="inputDiv">
                                                                <label for="">First Name</label>
                                                                <input type="text" name="f_name" id="f_name" value="" placeholder="Enter Your First Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="inputDiv">
                                                                <label for="">Last Name</label>
                                                                <input type="text" name="l_name" id="l_name" value="" placeholder="Enter Your Last Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="inputDiv">
                                                                <label for="">LinkedIn url</label>
                                                                <input type="url" name="linkedin_url" id="linkedin_url" value="" placeholder="Enter Your LinkedIn url">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="inputDiv">
                                                                <label for="">Profile Description</label>
                                                                <textarea name="description" id="description" class="ckeditor" placeholder="Enter Your Profile Description"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 text-center">
                                                            <button class="saveButton">SAVE</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lawyer" class="tab-pane fade">
                                <div class="profile-div">
                                    <div class="tabContent">
                                        <div class="formDiv lawyerForm">
                                            <form action="">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="inputDiv">
                                                            <label for="">Location</label>
                                                            <input type="text" name="address" id="address" value="" placeholder="Enter Your Location">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="multiSelect">
                                                            <label for="">Select Language</label>
                                                            <select class="js-example-basic-multiple" name="language_id[]" multiple="multiple">
                                                                <option disabled> Select Language</option>
                                                                @foreach($languages as $language)
                                                                <option value="{{$language->id}}">{{$language->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="inputDiv">
                                                            <label for="">Primary Practice Area <i class="fa fa-info-circle" aria-hidden="true"></i></label>
                                                            <select disabled name="partise_area" id="partise_area">
                                                                <option value="">Select Primary Practice Area,</option>
                                                                <option value="1">Rawalpindi Kachari</option>
                                                                <option value="2">Rawalpindi Lower Court</option>
                                                                <option value="3">Rawalpindi High Court</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="inputDiv">
                                                            <label for="">Secondary Practice Area <i class="fa fa-info-circle" aria-hidden="true"></i></label>
                                                            <select name="secondary_partise_area" id="secondary_partise_area">
                                                                <option disabled value="">Select Secondary Practice Area,</option>
                                                                <option value="1">Rawalpindi Kachari</option>
                                                                <option value="2">Rawalpindi Lower Court</option>
                                                                <option value="3">Rawalpindi High Court</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="inputDiv">
                                                            <label for="">Third Practice Area <i class="fa fa-info-circle" aria-hidden="true"></i></label>
                                                            <select disabled name="third_partise_area" id="third_partise_area">
                                                                <option value="">Select Third Practice Area,</option>
                                                                <option value="1">Rawalpindi Kachari</option>
                                                                <option value="2">Rawalpindi Lower Court</option>
                                                                <option value="3">Rawalpindi High Court</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="multiSelect">
                                                            <label for="">Education</label>
                                                            <div class="inputButton">
                                                                <select class="js-example-basic-multiple" name="education_id[]" multiple="multiple">
                                                                    <option disabled> Select Education</option>
                                                                    <option value="1"> L.L.M</option>
                                                                    <option value="2"> L.L.B (3 year)</option>
                                                                    <option value="3"> L.L.B (5 year)</option>
                                                                </select>
                                                                {{-- <Button>ADD MORE</Button> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="multiSelect">
                                                            <label for="">Membership & Association</label>
                                                            <div class="inputButton">
                                                                <select class="js-example-basic-multiple" name="membership_id[]" multiple="multiple">
                                                                    <option disabled> Select Membership & Association</option>
                                                                    <option value="1"> lawyer association</option>
                                                                    <option value="2"> Labour</option>
                                                                    <option value="3"> dfdff</option>
                                                                </select>
                                                                {{-- <Button>ADD MORE</Button> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 text-center">
                                                        <button class="submitButton">SUBMIT</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="sendApproval">
                                            <img src="../../assets/img/approval.png" alt="" class="img-fluid">
                                            <p>We need to validate everything here. Please give us some time to respond.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="membership" class="tab-pane fade">
                                <div class="multipleMemberShip">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="commonBox">
                                                <div class="header">
                                                    <img src="../../assets/img/starter.svg" alt="" class="img-fluid">
                                                    <p>Starter</p>
                                                </div>
                                                <div class="priceDiv">
                                                    <span>Starts at</span>
                                                    <p class="actualPrice">AED 200/mo</p>
                                                    <p class="yearPrice">
                                                        <span>AED 2400</span>
                                                        <span>AED 2160/yr</span>
                                                    </p>
                                                </div>
                                                <div class="packageDetail">
                                                    <p>Lorem ipsum dolor sit amet consectetur adi iscing elit Sed c</p>
                                                    <div class="line"></div>
                                                </div>
                                                <div class="list_div">
                                                    <p>Lorem ipsum dolor sit amet consectetur</p>
                                                    <ul>
                                                        <p>LOREM IPSUM DOLOR SIT</p>
                                                        <li>Lorem ipsum dolor sit</li>
                                                        <li>Lorem ipsum dolor sit amet</li>
                                                        <li>iscing elit Sed aliquam</li>
                                                        <li>aliquam id nibh</li>
                                                    </ul>
                                                    <ul>
                                                        <p>LOREM IPSUM DOLOR SIT</p>
                                                        <li>Lorem ipsum dolor sit</li>
                                                        <li>Lorem ipsum dolor sit amet</li>
                                                        <li>iscing elit Sed aliquam</li>
                                                        <li>aliquam id nibh</li>
                                                    </ul>
                                                </div>
                                                <div class="savePrice">
                                                    <ul>
                                                        <li>
                                                            <p>Pay Monthly</p>
                                                            <span>AED 200/mo</span>
                                                        </li>
                                                        <li class="active">
                                                            <p>Pay Annually Upfront</p>
                                                            <span>
                                                                AED 2160/yr
                                                                <span>SAVE 10%</span>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <button>BUY NOW</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="commonBox">
                                                <div class="header">
                                                    <img src="../../assets/img/starter.svg" alt="" class="img-fluid">
                                                    <p>Starter</p>
                                                </div>
                                                <div class="priceDiv">
                                                    <span>Starts at</span>
                                                    <p class="actualPrice">AED 200/mo</p>
                                                    <p class="yearPrice">
                                                        <span>AED 2400</span>
                                                        <span>AED 2160/yr</span>
                                                    </p>
                                                </div>
                                                <div class="packageDetail">
                                                    <p>Lorem ipsum dolor sit amet consectetur adi iscing elit Sed c</p>
                                                    <div class="line"></div>
                                                </div>
                                                <div class="list_div">
                                                    <p>Lorem ipsum dolor sit amet consectetur</p>
                                                    <ul>
                                                        <p>LOREM IPSUM DOLOR SIT</p>
                                                        <li>Lorem ipsum dolor sit</li>
                                                        <li>Lorem ipsum dolor sit amet</li>
                                                        <li>iscing elit Sed aliquam</li>
                                                        <li>aliquam id nibh</li>
                                                    </ul>
                                                    <ul>
                                                        <p>LOREM IPSUM DOLOR SIT</p>
                                                        <li>Lorem ipsum dolor sit</li>
                                                        <li>Lorem ipsum dolor sit amet</li>
                                                        <li>iscing elit Sed aliquam</li>
                                                        <li>aliquam id nibh</li>
                                                    </ul>
                                                </div>
                                                <div class="savePrice">
                                                    <ul>
                                                        <li>
                                                            <p>Pay Monthly</p>
                                                            <span>AED 200/mo</span>
                                                        </li>
                                                        <li class="active">
                                                            <p>Pay Annually Upfront</p>
                                                            <span>
                                                                AED 2160/yr
                                                                <span>SAVE 10%</span>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <button>BUY NOW</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="commonBox">
                                                <div class="header">
                                                    <img src="../../assets/img/starter.svg" alt="" class="img-fluid">
                                                    <p>Starter</p>
                                                </div>
                                                <div class="priceDiv">
                                                    <span>Starts at</span>
                                                    <p class="actualPrice">AED 200/mo</p>
                                                    <p class="yearPrice">
                                                        <span>AED 2400</span>
                                                        <span>AED 2160/yr</span>
                                                    </p>
                                                </div>
                                                <div class="packageDetail">
                                                    <p>Lorem ipsum dolor sit amet consectetur adi iscing elit Sed c</p>
                                                    <div class="line"></div>
                                                </div>
                                                <div class="list_div">
                                                    <p>Lorem ipsum dolor sit amet consectetur</p>
                                                    <ul>
                                                        <p>LOREM IPSUM DOLOR SIT</p>
                                                        <li>Lorem ipsum dolor sit</li>
                                                        <li>Lorem ipsum dolor sit amet</li>
                                                        <li>iscing elit Sed aliquam</li>
                                                        <li>aliquam id nibh</li>
                                                    </ul>
                                                    <ul>
                                                        <p>LOREM IPSUM DOLOR SIT</p>
                                                        <li>Lorem ipsum dolor sit</li>
                                                        <li>Lorem ipsum dolor sit amet</li>
                                                        <li>iscing elit Sed aliquam</li>
                                                        <li>aliquam id nibh</li>
                                                    </ul>
                                                </div>
                                                <div class="savePrice">
                                                    <ul>
                                                        <li>
                                                            <p>Pay Monthly</p>
                                                            <span>AED 200/mo</span>
                                                        </li>
                                                        <li class="active">
                                                            <p>Pay Annually Upfront</p>
                                                            <span>
                                                                AED 2160/yr
                                                                <span>SAVE 10%</span>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <button>BUY NOW</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });

    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });

    
</script>
@endsection

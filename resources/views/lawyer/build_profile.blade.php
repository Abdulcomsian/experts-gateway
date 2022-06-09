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
                            @if($lawyer_profile)
                            @if($lawyer_profile->complete == 2)
                            <div class="progress-div">
                                <p><span class="percentage-text">100%</span> Complete</p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                        aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                        <span class="sr-only">70% Complete</span>
                                    </div>
                                </div>
                            </div>
                            @elseif($lawyer_profile->complete == 1)
                            <div class="progress-div">
                                <p><span class="percentage-text">50%</span> Complete</p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                        aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                        <span class="sr-only">70% Complete</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @else
                            <div class="progress-div">
                                <p><span class="percentage-text">0%</span> Complete</p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                        aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                        <span class="sr-only">70% Complete</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="tab-pills-div">
                                <ul class="nav nav-pills">
                                    <li class="active"><a data-toggle="pill" href="#profile">Profile</a></li>
                                    <div class="imageTab">
                                        <img src="../../assets/img/profileTab.svg" alt="" class="img-fluid">
                                    </div>
                                    <li><a data-toggle="pill" id="lawyer_info" href="#lawyer">Lawyer Information</a></li>
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
                                        <form id="profile-form">
                                            @csrf
                                            <div class="uploadBanner">
                                                <img src="../../assets/img/uploadIcon.png" alt="" class="img-fluid">
                                                <div class="uploadImgBanner first_form">
                                                    <p>Upload Cover Image</p>
                                                    <input type="file" name="b_image" value="{{$lawyer_profile->b_image }}" id="b_image" accept="image/*">
                                                    <span class="text-danger b_image_valid"></span><br>
                                                    @if($lawyer_profile->b_image != '')
                                                    <div class="profileAvatar">
                                                        <img style="width: 140px !important; left:321px; top:72px ;height: 70px !important; " src="{{asset('lawyer_cover_image/' .$lawyer_profile->b_image)}}" alt="" class="img-fluid">
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="tabContent">
                                                <div class="uplodProfilePhoto">
                                                    <div class="uploadPhoto first_form">
                                                        <p>Upload <br>Profile Image</p>
                                                        <input type="file" name="image" value="{{$lawyer_profile->image }}" id="image" accept="image/*">
                                                        <span class="text-danger image_valid"></span>
                                                        @if($lawyer_profile->image != '')
                                                        <div class="profileAvatar">
                                                            <img style="width: 140px !important; height: 140px !important; border-radius: 84px;" src="{{asset('lawyer_profile/' .$lawyer_profile->image)}}" alt="" class="img-fluid">
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="formDiv">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="inputDiv first_form">
                                                                <label for="">First Name</label>
                                                                <input type="text" name="f_name" id="f_name" value="{{$lawyer->f_name }}" placeholder="Enter Your First Name">
                                                                <span class="text-danger f_name_valid"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="inputDiv first_form">
                                                                <label for="">Last Name</label>
                                                                <input type="text" name="l_name" id="l_name" value="{{$lawyer->l_name}}" placeholder="Enter Your Last Name">
                                                                <span class="text-danger l_name_valid"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="inputDiv first_form">
                                                                <label for="">LinkedIn url</label>
                                                                <input type="url" name="linkedin_url" id="linkedin_url" value="{{$lawyer_profile->linkedin_url ?? ''}}" placeholder="Enter Your LinkedIn url">
                                                                <span class="text-danger linkedin_url_valid"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="inputDiv first_form">
                                                                <label for="">Profile Description</label>
                                                                <textarea name="description" id="description" class="ckeditor" placeholder="Enter Your Profile Description">{{$lawyer_profile->description ?? ''}}</textarea>
                                                                <span class="text-danger description_valid"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 text-center">
                                                            <button type="submit" class="saveButton">SAVE</button>
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
                                            <form id="profile-form-1">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="inputDiv second_form">
                                                            <label for="">Location</label>
                                                            <input type="text" name="address" id="address" value="{{$lawyer_profile->address ?? ''}}" placeholder="Enter Your Location">
                                                            <span class="text-danger address_valid"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="multiSelect second_form">
                                                            <label for="">Select Language</label>
                                                            <select class="js-example-basic-multiple" name="language_id[]" id="language_id" multiple="multiple">
                                                                <option disabled> Select Language</option>
                                                                @if($lawyer_language)
                                                                @foreach($languages as $language)
                                                                @foreach($lawyer_language as $l_language)
                                                                @php 
                                                                $selected="";
                                                                if($l_language->language_id == $language->id ){
                                                                    $selected="selected";
                                                                    break;
                                                                }
                                                                @endphp
                                                                @endforeach
                                                                <option value="{{$language->id}}"
                                                                {{$selected}} >{{$language->name}}</option>
                                                                @endforeach
                                                                @else
                                                                @foreach($languages as $language)
                                                                <option value="{{$language->id}}">{{$language->name}}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                            <span class="text-danger language_id_valid"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="inputDiv second_form">
                                                            <label for="">Primary Practice Area <i class="fa fa-info-circle" aria-hidden="true"></i></label>
                                                            <select name="partise_area" id="partise_area">
                                                                <option value="">Select Primary Practice Area,</option>
                                                                <option value="1">Rawalpindi Kachari</option>
                                                                <option value="2">Rawalpindi Lower Court</option>
                                                                <option value="3">Rawalpindi High Court</option>
                                                            </select>
                                                            <span class="text-danger partise_area_valid"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="inputDiv second_form">
                                                            <label for="">Secondary Practice Area <i class="fa fa-info-circle" aria-hidden="true"></i></label>
                                                            <select name="secondary_partise_area" id="secondary_partise_area">
                                                                <option value="">Select Secondary Practice Area,</option>
                                                                <option value="1">Rawalpindi Kachari</option>
                                                                <option value="2">Rawalpindi Lower Court</option>
                                                                <option value="3">Rawalpindi High Court</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="inputDiv second_form">
                                                            <label for="">Third Practice Area <i class="fa fa-info-circle" aria-hidden="true"></i></label>
                                                            <select name="third_partise_area" id="third_partise_area">
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
                                                            <div class="inputButton second_form">
                                                                <select class="js-example-basic-multiple" name="education_id[]" id="education_id" multiple="multiple">
                                                                    <option disabled> Select Education</option>
                                                                    <option value="1"> L.L.M</option>
                                                                    <option value="2"> L.L.B (3 year)</option>
                                                                    <option value="3"> L.L.B (5 year)</option>
                                                                </select>
                                                                <span class="text-danger education_id_valid"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="multiSelect">
                                                            <label for="">Membership & Association</label>
                                                            <div class="inputButton second_form">
                                                                <select class="js-example-basic-multiple" name="membership_id[]" id="membership_id" multiple="multiple">
                                                                    <option disabled> Select Membership & Association</option>
                                                                    <option value="1"> lawyer association</option>
                                                                    <option value="2"> Labour</option>
                                                                    <option value="3"> dfdff</option>
                                                                </select>
                                                                {{-- <Button>ADD MORE</Button> --}}
                                                                <span class="text-danger membership_id_valid"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 text-center">
                                                        <button type="submit" class="submitButton">SUBMIT</button>
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
<script type="text/javascript">
    ClassicEditor.create( document.querySelector( '#description' ) )
    .catch( error => {
        console.error( error );
    });

    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });

    $('#profile-form').submit(function(e){
        e.preventDefault();

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data', 
            url: "{{ route('profile.store_1') }}",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (data) {
                $('.first_form input').val('');
                $('.first_form textarea').val(''); 
                $(".ck-editor__editable_inline").val('').trigger('change');
                if(data.complete == 1){
                    $('.progress-bar').css('width', '50%');
                    $('.percentage-text').text('50%');
                }else if(data.complete == 2){
                    $('.progress-bar').css('width', '100%');
                    $('.percentage-text').text('100%');
                }
                $('#lawyer_info').trigger('click');
                // scrool to top
                $('html, body').animate({
                    scrollTop: $("#lawyer_info").offset().top
                }, 100);
                
                
            },
            error: function (data) {
                // convert json to object
                var errors = JSON.parse(data.responseText);
                // var error_message = JSON.parse(errors.message);
                // loop
                console.log('Error:', typeof data.responseText);
                if($('#f_name').val() == ''){
                    $('.f_name_valid').text(errors.message.f_name);
                }
                else{
                    $('.f_name_valid').text('');
                }
                if($('#l_name').val() == ''){
                    $('.l_name_valid').text(errors.message.l_name);
                }
                else{
                    $('.l_name_valid').text('');
                }
                if($('#b_image').val() == ''){ 

                    $('.b_image_valid').text(errors.message.b_image);
                }
                else{
                    $('.b_image_valid').text('');
                }
                if($('#image').val() == ''){
                    $('.image_valid').text(errors.message.image);
                }
                else
                {
                    $('.image_valid').text('');
                }
                if($('#linkedin_url').val() == ''){
                    $('.linkedin_url_valid').text(errors.message.linkedin_url);
                }
                else{
                    $('.linkedin_url_valid').text('');
                }
                if($('#description').val() == ''){
                    $('.description_valid').text(errors.message.description);
                }
                else{
                    $('.description_valid').text('');
                }
            }
        });
    });

    $('#profile-form-1').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ route('profile.store_2') }}",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                $('.second_form input').val('');
                $('.second_form textarea').val('');
                $('.second_form select').val('');
                $("#language_id").val('').trigger('change');
                $("#education_id").val('').trigger('change');
                $("#membership_id").val('').trigger('change');
                if(data.complete == 1){
                    $('.progress-bar').css('width', '50%');
                    $('.percentage-text').text('50%');
                }else if(data.complete == 2){
                    $('.progress-bar').css('width', '100%');
                    $('.percentage-text').text('100%');
                }
            },
            error: function (data) {
                console.log('Error:', data);
                // convert json to object
                var errors = JSON.parse(data.responseText);
                // var error_message = JSON.parse(errors.message);
                // loop
                console.log('Error:', typeof data.responseText);
                if($('#partise_area').val() == ''){
                    $('.partise_area_valid').text(errors.message.partise_area);
                }
                else{
                    $('.partise_area_valid').text('');
                }
                if($('#address').val() == ''){
                $('.address_valid').text(errors.message.address);
                }
                else{
                    $('.address_valid').text('');
                }
                if($('#language_id').val() == ''){
                    $('.language_id_valid').text(errors.message.language_id);
                }
                else{
                    $('.language_id_valid').text('');
                }
                if($('#membership_id').val() == ''){
                    $('.membership_id_valid').text(errors.message.membership_id);
                }
                else{
                    $('.membership_id_valid').text('');
                }

                if($('#education_id').val() == ''){
                    $('.education_id_valid').text(errors.message.education_id);
                }
                else{
                    $('.education_id_valid').text('');
                }
                
            }
        });
    });

    
</script>
@endsection

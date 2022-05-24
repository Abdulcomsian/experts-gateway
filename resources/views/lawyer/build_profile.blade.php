@extends('layout.lawyerlayout')
@section('title')
Profile building
@endsection
@push('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">s
@endpush
@section('content')
<main>
    <div class="profileDiv">

        <div class="applyDiv">

            <div class="container-fluid">
                <div class="progress">
                    @if($lawyer_profile == null)
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                    @elseif($lawyer_profile->complete == 1)
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                    @elseif($lawyer_profile->complete == 2)
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
                    @elseif($lawyer_profile->complete == 3)
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                    @elseif($lawyer_profile->complete == 4)
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                    @elseif($lawyer_profile->complete == 5)
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                    @elseif($lawyer_profile->complete == 6)
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                    @endif
                </div><br>
                <div class="row">
                    <div class="col-lg-12">
                        @if(isset($lawyer_profile))
                        @if($lawyer_profile->complete == 5)
                        <div class="pricingFooter  text-center" style="float:right;">
                        <form action="{{ route('profile.submit-for-approval') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="complete" value="6">
                            <button type="submit" style="background-color:#ed2354; border-color:#ed2354;color: #fff;box-shadow: none !important; padding: 9px;">Submit For Approval</button>
                        </form>
                        </div>
                        @endif
                        @endif
                    </div>
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
                                        @if($lawyer_profile)
                                        @if($lawyer_profile->image != null)
                                        <form action="{{ route('profile.update_1',$lawyer_profile->id) }}" method="post" enctype="multipart/form-data">
                                        @else
                                        <form action="{{ route('profile.store_1') }}" method="post" enctype="multipart/form-data">
                                        @endif
                                        @else
                                        <form action="{{ route('profile.store_1') }}" method="post" enctype="multipart/form-data">
                                        @endif
                                        @csrf
                                            <div class="progress" style="background-color: transparent;">
                                                @if($lawyer_profile == null)
                                                <input type="hidden" name="complete" value="1">
                                                @elseif($lawyer_profile->complete == 1)
                                                <input type="hidden" name="complete" value="2">
                                                @elseif($lawyer_profile->complete == 2)
                                                <input type="hidden" name="complete" value="3">
                                                @elseif($lawyer_profile->complete == 3)
                                                <input type="hidden" name="complete" value="4">
                                                @elseif($lawyer_profile->complete == 4)
                                                <input type="hidden" name="complete" value="5">
                                                @elseif($lawyer_profile->complete == 5)
                                                <input type="hidden" name="complete" value="5">
                                                @endif
                                            </div>
                                            @if($lawyer_profile)
                                            @if($lawyer_profile->image != null)
                                            <div class="profileBoxHeader">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="uploadCover">
                                                            <input type="file" class="form-control form-control-solid" name="b_image" id="b_image" accept="image/*">
                                                            <p>Upload Cover Image</p>
                                                            <div style="color:red;">{{$errors->first('b_image')}}</div> <br>
                                                        </div>
                                                        <div class="profileAvatar">
                                                            <img style="width: 140px !important; height: 140px !important; border-radius: 84px;" src="{{asset('lawyer_cover_image/' .$lawyer_profile->b_image)}}" alt="" class="img-fluid">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="uploadCover">
                                                            <input type="file" class="form-control form-control-solid" name="image" id="image" accept="image/*">
                                                            <p>Upload profile Image</p>
                                                            <div style="color:red;">{{$errors->first('image')}}</div> <br>
                                                        </div>
                                                        <div class="profileAvatar">
                                                            <img style="width: 140px !important; height: 140px !important; border-radius: 84px;" src="{{asset('lawyer_profile/' .$lawyer_profile->image)}}" alt="" class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profileFormDiv">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="inputDiv">
                                                            <input id="f_name" type="text" name="f_name" value="{{ $lawyer_profile->user->f_name }}" placeholder="First Name">

                                                            <div style="color:red;">{{$errors->first('f_name')}}</div> <br>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="inputDiv">
                                                            <input id="l_name" type="text" name="l_name" value="{{ $lawyer_profile->user->l_name }}" placeholder="Last Name">

                                                            <div style="color:red;">{{$errors->first('l_name')}}</div> <br>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="inputDiv">
                                                            <input id="title" type="text" name="title" value="{{ $lawyer_profile->title }}" placeholder="Lawyer Title">

                                                            <div style="color:red;">{{$errors->first('title')}}</div> <br>
                                                        </div>
                                                    </div>
                                                    <div class="pricingFooter col-lg-8 text-center" >
                                                        <button type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <div class="profileBoxHeader">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="uploadCover">
                                                            <input type="file" class="form-control form-control-solid" name="b_image" id="b_image" accept="image/*">
                                                            <p>Upload Cover Image</p>
                                                            <div style="color:red;">{{$errors->first('b_image')}}</div> <br>
                                                        </div>
                                                        <div class="profileAvatar">
                                                            <img src="../../assets/img/avatar.png" alt="" class="img-fluid">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="uploadCover">
                                                            <input type="file" class="form-control form-control-solid" name="image" id="image" accept="image/*">
                                                            <p>Upload Profile Image</p>
                                                            <div style="color:red;">{{$errors->first('image')}}</div> <br>
                                                        </div>
                                                        <div class="profileAvatar">
                                                            <img src="../../assets/img/avatar.png" alt="" class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profileFormDiv">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="inputDiv">
                                                            <input id="f_name" required type="text" name="f_name" value="{{ old('f_name') }}" placeholder="First Name">

                                                            <div style="color:red;">{{$errors->first('f_name')}}</div> <br>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="inputDiv">
                                                            <input id="l_name" required type="text" name="l_name" value="{{ old('l_name') }}" placeholder="Last Name">

                                                            <div style="color:red;">{{$errors->first('l_name')}}</div> <br>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="inputDiv">
                                                            <input id="title" required type="text" name="title" value="{{ old('title') }}" placeholder="Lawyer Title">

                                                            <div style="color:red;">{{$errors->first('title')}}</div> <br>
                                                        </div>
                                                    </div>
                                                    <!-- @if($lawyer_profile->complete == 4)
                                                    <div class="pricingFooter col-lg-8 text-center" >
                                                        <button type="submit">Submit For Approval</button>
                                                    </div>
                                                    @else -->
                                                    <div class="pricingFooter col-lg-8 text-center" >
                                                        <button type="submit">Save</button>
                                                    </div>
                                                    <!-- @endif -->
                                                </div>
                                            </div>
                                            @endif
                                            @else
                                            <div class="profileBoxHeader">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="uploadCover">
                                                            <input type="file" class="form-control form-control-solid" name="b_image" id="b_image" accept="image/*">
                                                            <p>Upload Cover Image</p>
                                                            <div style="color:red;">{{$errors->first('b_image')}}</div> <br>
                                                        </div>
                                                        <div class="profileAvatar">
                                                            <img src="../../assets/img/avatar.png" alt="" class="img-fluid">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="uploadCover">
                                                            <input type="file" class="form-control form-control-solid" name="image" id="image" accept="image/*">
                                                            <p>Upload Profile Image</p>
                                                            <div style="color:red;">{{$errors->first('image')}}</div> <br>
                                                        </div>
                                                        <div class="profileAvatar">
                                                            <img src="../../assets/img/avatar.png" alt="" class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profileFormDiv">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="inputDiv">
                                                            <input id="f_name" required type="text" name="f_name" value="{{ old('f_name') }}" placeholder="First Name">

                                                            <div style="color:red;">{{$errors->first('f_name')}}</div> <br>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="inputDiv">
                                                            <input id="l_name" required type="text" name="l_name" value="{{ old('l_name') }}" placeholder="Last Name">

                                                            <div style="color:red;">{{$errors->first('l_name')}}</div> <br>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="inputDiv">
                                                            <input id="title" required type="text" name="title" value="{{ old('title') }}" placeholder="Lawyer Title">

                                                            <div style="color:red;">{{$errors->first('title')}}</div> <br>
                                                        </div>
                                                    </div>
                                                    <div class="pricingFooter col-lg-8 text-center" >
                                                        <button type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                                <div id="location" class="tab-pane fade">
                                    @if($lawyer_profile)
                                    @if($lawyer_profile->address != null)
                                    <form action="{{ route('profile.update_2',$lawyer_profile->id) }}" method="post" enctype="multipart/form-data">
                                    @else
                                    <form action="{{ route('profile.store_2') }}" method="post" enctype="multipart/form-data">
                                    @endif
                                    @else
                                    <form action="{{ route('profile.store_2') }}" method="post" enctype="multipart/form-data">
                                    @endif
                                    @csrf
                                        <div class="formDiv commonTabDiv">
                                            <div class="progress" style="background-color: transparent;">
                                                @if($lawyer_profile == null)
                                                <input type="hidden" name="complete" value="1">
                                                @elseif($lawyer_profile->complete == 1)
                                                <input type="hidden" name="complete" value="2">
                                                @elseif($lawyer_profile->complete == 2)
                                                <input type="hidden" name="complete" value="3">
                                                @elseif($lawyer_profile->complete == 3)
                                                <input type="hidden" name="complete" value="4">
                                                @elseif($lawyer_profile->complete == 4)
                                                <input type="hidden" name="complete" value="5">
                                                @elseif($lawyer_profile->complete == 5)
                                                <input type="hidden" name="complete" value="5">
                                                @endif
                                            </div><br>
                                            @if($lawyer_profile)
                                            @if($lawyer_profile->address != null)
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="inputDiv">
                                                        <label for="">Location</label>
                                                        <input id="address" type="text" name="address" value="{{ $lawyer_profile->address}}" placeholder="Location">

                                                        <div style="color:red;">{{$errors->first('address')}}</div> <br>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="multiSelect">
                                                        <label for="">Select Language</label>
                                                        <select class="js-example-basic-multiple" name="language_id[]" multiple="multiple">
                                                        <option disabled> Select Language</option>
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
                                                    </select>
                                                    <div style="color:red;">{{$errors->first('language_id')}}</div> <br>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="multiSelect">
                                                        <label for="">Select Legal Expertises</label>
                                                        <select class="js-example-basic-multiple" name="expertise_id[]" multiple="multiple">
                                                            <option disabled> Select Expertises</option>
                                                            @foreach($expertises as $expertise)
                                                            @foreach($lawyer_expertises as $l_expertise)
                                                            @php 
                                                            $selected="";
                                                            if($l_expertise->expertise_id == $expertise->id ){
                                                                $selected="selected";
                                                                break;
                                                            }
                                                            @endphp
                                                            @endforeach
                                                            <option value="{{$expertise->id}}" {{$selected}}>{{$expertise->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div style="color:red;">{{$errors->first('expertise_id')}}</div> <br>

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
                                                <div class="pricingFooter col-lg-8 text-center" >
                                                    <button type="submit">Update</button>
                                                </div>
                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="inputDiv">
                                                        <label for="">Location</label>
                                                        <input id="address" required type="text" name="address" value="{{ old('address') }}" placeholder="Location">

                                                        <div style="color:red;">{{$errors->first('address')}}</div> <br>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="multiSelect">
                                                        <label for="">Select Language</label>
                                                        <select required class="js-example-basic-multiple" name="language_id[]" multiple="multiple">
                                                        <option disabled> Select Language</option>
                                                        @foreach($languages as $language)
                                                        <option value="{{$language->id}}">{{$language->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div style="color:red;">{{$errors->first('language_id')}}</div> <br>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="multiSelect">
                                                        <label for="">Select Legal Expertises</label>
                                                        <select required class="js-example-basic-multiple" name="expertise_id[]" multiple="multiple">
                                                            <option disabled> Select Expertises</option>
                                                            @foreach($expertises as $expertise)
                                                            <option value="{{$expertise->id}}">{{$expertise->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div style="color:red;">{{$errors->first('expertise_id')}}</div> <br>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="multiSelect">
                                                        <label for="">Select Corporate Law</label>
                                                        <select required class="js-example-basic-multiple" name="states[]"
                                                            multiple="multiple">
                                                            <option value="AL">English</option>
                                                            <option value="WY">Franch</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                
                                                <div class="pricingFooter col-lg-8 text-center" >
                                                    <button type="submit">Save</button>
                                                </div>
                                            </div>
                                            @endif
                                            @else
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="inputDiv">
                                                        <label for="">Location</label>
                                                        <input id="address" required type="text" name="address" value="{{ old('address') }}" placeholder="Location">

                                                        <div style="color:red;">{{$errors->first('address')}}</div> <br>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="multiSelect">
                                                        <label for="">Select Language</label>
                                                        <select required class="js-example-basic-multiple" name="language_id[]" multiple="multiple">
                                                        <option disabled> Select Language</option>
                                                        @foreach($languages as $language)
                                                        <option value="{{$language->id}}">{{$language->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div style="color:red;">{{$errors->first('language_id')}}</div> <br>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="multiSelect">
                                                        <label for="">Select Legal Expertises</label>
                                                        <select required class="js-example-basic-multiple" name="expertise_id[]" multiple="multiple">
                                                            <option disabled> Select Expertises</option>
                                                            @foreach($expertises as $expertise)
                                                            <option value="{{$expertise->id}}">{{$expertise->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div style="color:red;">{{$errors->first('expertise_id')}}</div> <br>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="multiSelect">
                                                        <label for="">Select Corporate Law</label>
                                                        <select required class="js-example-basic-multiple" name="states[]"
                                                            multiple="multiple">
                                                            <option value="AL">English</option>
                                                            <option value="WY">Franch</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="pricingFooter col-lg-8 text-center" >
                                                    <button type="submit">Save</button>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                <div id="profile" class="tab-pane fade">
                                    @if($lawyer_profile)
                                    @if($lawyer_profile->profile_detail != null)
                                    <form action="{{ route('profile.update_3',$lawyer_profile->id) }}" method="post" enctype="multipart/form-data">
                                    @else
                                    <form action="{{ route('profile.store_3') }}" method="post" enctype="multipart/form-data">
                                    @endif
                                    @else
                                    <form action="{{ route('profile.store_3') }}" method="post" enctype="multipart/form-data">
                                    @endif
                                        @csrf
                                        <div class="formDiv commonTabDiv">
                                            <div class="progress" style="background-color: transparent;">
                                                @if($lawyer_profile == null)
                                                <input type="hidden" name="complete" value="1">
                                                @elseif($lawyer_profile->complete == 1)
                                                <input type="hidden" name="complete" value="2">
                                                @elseif($lawyer_profile->complete == 2)
                                                <input type="hidden" name="complete" value="3">
                                                @elseif($lawyer_profile->complete == 3)
                                                <input type="hidden" name="complete" value="4">
                                                @elseif($lawyer_profile->complete == 4)
                                                <input type="hidden" name="complete" value="5">
                                                @elseif($lawyer_profile->complete == 5)
                                                <input type="hidden" name="complete" value="5">
                                                @endif
                                            </div>
                                            <br>
                                            @if($lawyer_profile)
                                            @if($lawyer_profile->profile_detail != null)
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="inputDiv">
                                                        <label for="">Profile Description</label>
                                                        <textarea required class="ckeditor form-control" name="profile_detail">{{$lawyer_profile->profile_detail}}</textarea>
                                                        <div style="color:red;">{{$errors->first('description')}}</div> <br>
                                                    </div>
                                                </div>
                                                <div class="pricingFooter col-lg-8 text-center" >
                                                    <button type="submit">Update</button>
                                                </div>
                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="inputDiv">
                                                        <label for="">Profile Description</label>
                                                        <textarea required class="ckeditor form-control" name="profile_detail"></textarea>
                                                        <div style="color:red;">{{$errors->first('description')}}</div> <br>
                                                    </div>
                                                </div>
                                                <!-- @if($lawyer_profile->complete == 4)
                                                <div class="pricingFooter col-lg-8 text-center" >
                                                    <button type="submit">Submit For Approval</button>
                                                </div>
                                                @else -->
                                                <div class="pricingFooter col-lg-8 text-center" >
                                                    <button type="submit">Save</button>
                                                </div>
                                                <!-- @endif -->
                                            </div>
                                            @endif
                                            @else
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="inputDiv">
                                                        <label for="">Profile Description</label>
                                                        <textarea required class="ckeditor form-control" name="profile_detail"></textarea>
                                                        <div style="color:red;">{{$errors->first('description')}}</div> <br>
                                                    </div>
                                                </div>
                                                <div class="pricingFooter col-lg-8 text-center" >
                                                    <button type="submit">Save</button>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                <div id="education" class="tab-pane fade">
                                    @if($lawyer_profile)
                                    @if(count($lawyer_educations)>0)
                                    <form action="{{ route('profile.update_4',$lawyer_profile->id) }}" method="post" enctype="multipart/form-data">
                                    @else
                                    <form action="{{ route('profile.store_4') }}" method="post" enctype="multipart/form-data">
                                    @endif
                                    @else
                                    <form action="{{ route('profile.store_4') }}" method="post" enctype="multipart/form-data">
                                    @endif
                                        @csrf
                                        <div class="formDiv commonTabDiv">
                                            <div class="progress" style="background-color: transparent;">
                                                @if($lawyer_profile == null)
                                                <input type="hidden" name="complete" value="1">
                                                @elseif($lawyer_profile->complete == 1)
                                                <input type="hidden" name="complete" value="2">
                                                @elseif($lawyer_profile->complete == 2)
                                                <input type="hidden" name="complete" value="3">
                                                @elseif($lawyer_profile->complete == 3)
                                                <input type="hidden" name="complete" value="4">
                                                @elseif($lawyer_profile->complete == 4)
                                                <input type="hidden" name="complete" value="5">
                                                @elseif($lawyer_profile->complete == 5)
                                                <input type="hidden" name="complete" value="5">
                                                @endif
                                            </div><br>
                                        @if($lawyer_profile)
                                        @if(count($lawyer_educations)>0)
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="multiSelect">
                                                    <label for="">Education</label>
                                                    <select required class="js-example-basic-multiple" name="education_id[]" multiple="multiple">
                                                        <option disabled> Select Membership</option>
                                                        @foreach($educations as $education)
                                                        @foreach($lawyer_educations as $lawyer_education)
                                                        @php 
                                                        $selected="";
                                                        if($lawyer_education->education_id == $education->id ){
                                                            $selected="selected";
                                                            break;
                                                        }
                                                        @endphp
                                                        @endforeach
                                                        <option value="{{$education->id}}" {{ $selected }} >{{$education->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div style="color:red;">{{$errors->first('education_id')}}</div> <br>

                                                </div>
                                            </div>
                                            <div class="pricingFooter col-lg-8 text-center" >
                                                <button type="submit">Update</button>
                                            </div>
                                        </div>
                                        @else
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="multiSelect">
                                                    <label for="">Education</label>
                                                    <select required class="js-example-basic-multiple" name="education_id[]" multiple="multiple">
                                                        <option disabled> Select Education</option>
                                                        @foreach($educations as $education)
                                                        <option value="{{$education->id}}">{{$education->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div style="color:red;">{{$errors->first('education_id')}}</div> <br>

                                                </div>
                                            </div>
                                            <div class="pricingFooter col-lg-8 text-center" >
                                                <button type="submit">Save</button>
                                            </div>
                                        </div>
                                        @endif
                                        @else
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="multiSelect">
                                                    <label for="">Education</label>
                                                    <select required class="js-example-basic-multiple" name="education_id[]" multiple="multiple">
                                                        <option disabled> Select Education</option>
                                                        @foreach($educations as $education)
                                                        <option value="{{$education->id}}">{{$education->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div style="color:red;">{{$errors->first('education_id')}}</div> <br>

                                                </div>
                                            </div>
                                            <div class="pricingFooter col-lg-8 text-center" >
                                                <button type="submit">Save</button>
                                            </div>
                                        </div>
                                        @endif
                                        
                                    </div>
                                    </form>
                                </div>
                                <div id="memberShip" class="tab-pane fade">
                                    @if($lawyer_profile)
                                    @if($lawyer_memberships)
                                    <form action="{{ route('profile.update_5',$lawyer_profile->id) }}" method="post" enctype="multipart/form-data">
                                    @else
                                    <form action="{{ route('profile.store_5') }}" method="post" enctype="multipart/form-data">
                                    @endif
                                    @else
                                    <form action="{{ route('profile.store_5') }}" method="post" enctype="multipart/form-data">
                                    @endif
                                    @csrf
                                    <div class="formDiv commonTabDiv">
                                        <div class="progress" style="background-color: transparent;">
                                            @if($lawyer_profile == null)
                                            <input type="hidden" name="complete" value="1">
                                            @elseif($lawyer_profile->complete == 1)
                                            <input type="hidden" name="complete" value="2">
                                            @elseif($lawyer_profile->complete == 2)
                                            <input type="hidden" name="complete" value="3">
                                            @elseif($lawyer_profile->complete == 3)
                                            <input type="hidden" name="complete" value="4">
                                            @elseif($lawyer_profile->complete == 4)
                                            <input type="hidden" name="complete" value="5">
                                            @elseif($lawyer_profile->complete == 5)
                                            <input type="hidden" name="complete" value="5">
                                            @endif
                                        </div><br>
                                        @if($lawyer_profile)
                                        @if($lawyer_memberships != null)
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="multiSelect">
                                                    <label for="">Select Membership & Association Law</label>
                                                    <select required class="form-control form-control-solid" name="membership_id">
                                                        <option disabled> Select Membership</option>
                                                        @foreach($memberships as $membership)
                                                        
                                                        <option value="{{$membership->id}}" {{ $lawyer_memberships->membership_id == $membership->id ? 'selected' : '' }}>{{$membership->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div style="color:red;">{{$errors->first('membership_id')}}</div> <br>

                                                </div>
                                            </div>
                                            <div class="pricingFooter col-lg-8 text-center" >
                                                <button type="submit">Update</button>
                                            </div>
                                        </div>
                                        @else
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="multiSelect">
                                                    <label for="">Select Membership & Association Law</label>
                                                    <select required class="form-control form-control-solid" name="membership_id" >
                                                        <option disabled> Select Membership</option>
                                                        @foreach($memberships as $membership)
                                                        <option value="{{$membership->id}}">{{$membership->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div style="color:red;">{{$errors->first('membership_id')}}</div> <br>

                                                </div>
                                            </div>
                                            <div class="pricingFooter col-lg-8 text-center" >
                                                <button type="submit">Save</button>
                                            </div>
                                        </div>
                                        @endif
                                        @else
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="multiSelect">
                                                    <label for="">Select Membership & Association Law</label>
                                                    <select required class="form-control form-control-solid" name="membership_id">
                                                        <option disabled> Select Membership</option>
                                                        @foreach($memberships as $membership)
                                                        <option value="{{$membership->id}}">{{$membership->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div style="color:red;">{{$errors->first('membership_id')}}</div> <br>

                                                </div>
                                            </div>
                                            <div class="pricingFooter col-lg-8 text-center" >
                                                <button type="submit">Save</button>
                                            </div>
                                        </div>
                                        @endif
                                        
                                    </div>
                                </div>
                                <div id="pricing" class="tab-pane fade">
                                    <div class="formDiv commonTabDiv">
                                        
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

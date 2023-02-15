@extends('layout.admin_panel.master')
@section('title')
Edit Lawyer Profile
@endsection
@push('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endpush
@section('script')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection
@section('content')
   <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid mb-10 mb-lg-0">
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card body-->
                            <div class="card-body p-12">
                                @if(session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <!--begin::Form-->
                                <form action="{{ route('update-lawyer-profile',$lawyer_profile->id) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column align-items-start flex-xxl-row">

                                        <!--begin::Input group-->
                                        <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Enter invoice number">
                                            <span class="fs-2x fw-bolder text-gray-800">Edit Lawyer Profile </span>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Top-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed my-10"></div>
                                    <!--end::Separator-->
                                    <!--begin::Wrapper-->
                                    <div class="mb-0">
                                        <!--begin::Row-->
                                        <div class="row gx-10 mb-5">
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">First Name</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" name="f_name" value="{{ old('f_name', isset($lawyer_profile) ? $lawyer_profile->user->f_name : '') }}" placeholder="Enter First Name" />
                                                    <div style="color:red;">{{$errors->first('f_name')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Last Name</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" name="l_name" value="{{ old('l_name', isset($lawyer_profile) ? $lawyer_profile->user->l_name : '') }}" placeholder="Enter Last Name" />
                                                    <div style="color:red;">{{$errors->first('l_name')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div><br>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Country</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <select name="country" class="form-control" id="country-dropdown">
                                                        <option value="">Select Country</option>

                                                        @foreach ($countries as $country)
                                                            @if ($lawyer_profile && $country->id == $lawyer_profile->country)
                                                                <option value="{{$country->id}}" selected>{{$country->name}}</option>
                                                            @else
                                                                <option value="{{$country->id}}" {{ old('country') == $country->id ? 'selected' : '' }}>
                                                                    {{$country->name}}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    {{--<select name="country" class="form-control" id="country-dropdown">
                                                        <option value="">Select Country</option>

                                                        @foreach ($countries as $country)
                                                        @if($lawyer_profile)
                                                        @if($country->id == $lawyer_profile->country)
                                                        <option value="{{$country->id}}" selected>
                                                        {{$country->name}}
                                                        </option>
                                                        @else
                                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                                        @endif
                                                        @else
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>--}}
                                                    <div style="color:red;">{{$errors->first('country')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">State</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    {{--<select class="form-control" name="state" class="" id="state-dropdown">

                                                        @foreach ($states as $state)
                                                        @if($lawyer_profile)
                                                        @if($state->id == $lawyer_profile->state)
                                                        <option value="{{$state->id}}" selected>
                                                        {{$state->name}}
                                                        </option>
                                                        @else
                                                            <option value="{{$state->id}}">{{$state->name}}</option>
                                                        @endif
                                                        @else
                                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                                        @endif
                                                        @endforeach

                                                    </select>--}}
                                                    <select class="form-control" name="state" id="state-dropdown">
                                                        @foreach ($states as $state)
                                                            <option value="{{$state->id}}" {{ (($lawyer_profile && $lawyer_profile->state == $state->id) || old('state') == $state->id) ? 'selected' : '' }}>
                                                                {{$state->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    <div style="color:red;">{{$errors->first('state')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div><br>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">City</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    {{--<select name="city" class="form-control" id="city-dropdown">
                                                        @if($lawyer_profile)
                                                        @if($lawyer_profile->city != null)
                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                        @endif
                                                        @endif
                                                    </select>--}}
                                                    <select name="city" class="form-control" id="city-dropdown">
                                                        @if($lawyer_profile && $lawyer_profile->city != null)
                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                        @endif
                                                    </select>

                                                    <div style="color:red;">{{$errors->first('city')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div><br>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            {{-- <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Lawyer Title</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" name="title" value="{{$lawyer_profile->title}}" placeholder="Enter Title" />
                                                    <div style="color:red;">{{$errors->first('title')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div> --}}
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Address</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" name="address" value="{{ old('address', isset($lawyer_profile) ? $lawyer_profile->address : '') }}" placeholder="Enter Address" />
                                                    <div style="color:red;">{{$errors->first('address')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div><br>
                                            <!--end::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Phone</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="text" class="form-control" name="phone" value="{{ old('phone', isset($lawyer_profile->user->phone) ? $lawyer_profile->user->phone : '') }}" placeholder="Enter Address" />
                                                    <div style="color:red;">{{$errors->first('phone')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div><br>
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Linkedin Url</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="text" class="form-control" name="linkedin_url" value="{{ old('linkedin_url', isset($lawyer_profile->linkedin_url) ? $lawyer_profile->linkedin_url : '') }}" placeholder="Enter Address" />
                                                    <div style="color:red;">{{$errors->first('linkedin_url')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div><br>
                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Profile Detail</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <textarea required class="ckeditor form-control" name="description">{{ old('description', isset($lawyer_profile) ? $lawyer_profile->description : '') }}</textarea>
                                                    <div style="color:red;">{{$errors->first('description')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div><br>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <div class="multiSelect">
                                                    <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Expertise</label>
                                                    <!--begin::Input group-->
                                                    <div class="mb-5">
{{--
                                                        <select class="select2-multiple form-control" multiple="multiple" id="select2Multiple" name="education_id[]" >
                                                            <option disabled> Select Education</option>
                                                            @foreach($educations as $education)
                                                            @foreach($lawyer_educations as $l_education)
                                                            @php
                                                            $selected="";
                                                            if($l_education->education_id == $education->id ){
                                                                $selected="selected";
                                                                break;
                                                            }
                                                            @endphp
                                                            @endforeach
                                                            <option value="{{$education->id}}" {{$selected ?? ''}}>{{$education->education_name}}</option>
                                                            @endforeach
                                                        </select>
--}}
                                                        <select class="select2-multiple form-control" multiple="multiple" id="select2Multiple" name="education_id[]">
                                                            <option disabled> Select Education</option>
                                                            @foreach($educations as $education)
                                                                <option value="{{$education->id}}" {{ (in_array($education->id, old('education_id', $lawyer_educations->pluck('education_id')->toArray())) ? 'selected' : '') }}>
                                                                    {{$education->education_name}}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        <div style="color:red;">{{$errors->first('education_id')}}</div> <br>
                                                    </div>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Language</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
{{--
                                                    <select class="select2-multiple_ form-control" multiple="multiple" id="select2MultipleE" name="language_id[]">
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
                                                            {{$selected ?? ''}} >{{$language->name}}</option>
                                                        @endforeach
                                                    </select>
--}}
                                                    <select class="select2-multiple_ form-control" multiple="multiple" id="select2MultipleE" name="language_id[]">
                                                        <option disabled> Select Language</option>
                                                        @foreach($languages as $language)
                                                            <option value="{{$language->id}}" {{ (in_array($language->id, old('language_id', $lawyer_language->pluck('language_id')->toArray())) ? 'selected' : '') }}>
                                                                {{$language->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    <div style="color:red;">{{$errors->first('language_id')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->
                                            <div class="col-lg-4">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Primary Practice Area</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
{{--
                                                    <select class="form-control" name="partise_area">
                                                        <option value="" disabled> Select Practice Area</option>
                                                                @foreach($practice_areas as $row)
                                                                    <option value="{{$row->id}}" {{($lawyer_profile AND $lawyer_profile->partise_area == $row->id) ? 'selected' : ''}}>{{$row->name}}</option>
                                                                @endforeach
                                                    </select>
--}}
                                                    <select class="form-control" name="partise_area">
                                                        <option value="" disabled> Select Practice Area</option>
                                                        @foreach($practice_areas as $row)
                                                            <option value="{{$row->id}}" {{ (($lawyer_profile && $lawyer_profile->partise_area == $row->id) || old('partise_area') == $row->id) ? 'selected' : '' }}>
                                                                {{$row->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Secondary Practice Area</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    {{--<select class="form-control" name="secondary_partise_area">
                                                        <option value=""> Select Practice Area</option>
                                                         @foreach($practice_areas as $row)
                                                                    <option value="{{$row->id}}" {{($lawyer_profile AND $lawyer_profile->secondary_partise_area == $row->id) ? 'selected' : ''}}>{{$row->name}}</option>
                                                        @endforeach
                                                    </select>--}}
                                                    <select class="form-control" name="secondary_partise_area">
                                                        <option value=""> Select Practice Area</option>
                                                        @foreach($practice_areas as $row)
                                                            <option value="{{$row->id}}" {{ (($lawyer_profile && $lawyer_profile->secondary_partise_area == $row->id) || old('secondary_partise_area') == $row->id) ? 'selected' : '' }}>
                                                                {{$row->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Third Practice Area</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
{{--
                                                    <select class="form-control" name="third_partise_area">
                                                        <option value=""> Select Practice Area</option>
                                                         @foreach($practice_areas as $row)
                                                                    <option value="{{$row->id}}" {{($lawyer_profile AND $lawyer_profile->third_partise_area == $row->id) ? 'selected' : ''}}>{{$row->name}}</option>
                                                         @endforeach
                                                    </select>
--}}
                                                    <select class="form-control" name="third_partise_area">
                                                        <option value=""> Select Practice Area</option>
                                                        @foreach($practice_areas as $row)
                                                            <option value="{{$row->id}}" {{ (($lawyer_profile && $lawyer_profile->third_partise_area == $row->id) || old('third_partise_area') == $row->id) ? 'selected' : '' }}>{{$row->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!--end::Input group-->
                                            </div>


                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Profile Image</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="file" class="form-control form-control-solid" name="image" value="{{$lawyer_profile->image}}" accept="image/*"/>
                                                    <div class="profileAvatar">
                                                        <img style="width: 140px !important; height: 140px !important; border-radius: 84px;" src="{{asset('lawyer_profile/' .$lawyer_profile->image)}}" alt="" class="img-fluid">
                                                    </div>
                                                    <div style="color:red;">{{$errors->first('image')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Cover Image</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="file" class="form-control form-control-solid" name="b_image" value="{{$lawyer_profile->b_image}}" accept="image/*"/>
                                                    <div class="profileAvatar">
                                                        <img style="width: 140px !important; height: 140px !important; border-radius: 84px;" src="{{asset('lawyer_cover_image/' .$lawyer_profile->b_image)}}" alt="" class="img-fluid">
                                                    </div>
                                                    <div style="color:red;">{{$errors->first('b_image')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div><br>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            {{-- <div class="col-lg-12">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Education</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <div class="multiSelect">
                                                    <table class="table" id="dynamic_field">
                                                        <tr>
                                                            <td style="width:80%"><input type="text" name="education[]" value="{{$lawyer_profile->education}}" placeholder="Enter Education" class="form-control education_list" />
                                                            </td>
                                                            <td style="width:20%;"><button style="padding: 7px !important; margin-top:2px;" type="button" name="add_edu" id="add_edu" class="btn btn-success">Add More</button></td>
                                                            <div style="color:red;">{{$errors->first('education')}}</div> <br>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--end::Input group-->
                                            </div><br> --}}
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Membership</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <select class="select2-multiple_ form-control" multiple="multiple" id="select2MultipleE1" name="membership_id[]" required>
                                                        <option disabled> Select Language</option>
                                                        @foreach($memberships as $membership)
                                                            @foreach($lawyer_memberships as $l_membership)
                                                            @php
                                                            $selected="";
                                                            if($l_membership->membership_id == $membership->id ){
                                                                $selected="selected";
                                                                break;
                                                            }
                                                            @endphp
                                                            @endforeach
                                                        <option value="{{$membership->id}}"
                                                            {{$selected ?? ''}} >{{$membership->membership_name}}</option>
                                                        @endforeach
                                                    </select>
                                                   {{-- <select class="select2-multiple_ form-control" multiple="multiple" id="select2MultipleE1" name="membership_id[]">
                                                        <option disabled> Select Membership</option>
                                                        @foreach($memberships as $membership)
                                                            @foreach($lawyer_memberships as $l_membership)
                                                                @php
                                                                    $selected="";
                                                                    if($l_membership->membership_id == $membership->id ){
                                                                        $selected="selected";
                                                                        break;
                                                                    }
                                                                @endphp
                                                            @endforeach
                                                                <option value="{{$membership->id}}" {{ (in_array($membership->id, old('membership_id', []) ) || ($lawyer_profile && $lawyer_profile->memberships && $lawyer_profile->memberships->contains('id', $membership->id))) ? 'selected' : '' }}>{{$membership->membership_name}}</option>
                                                        @endforeach
                                                    </select>--}}
                                                    <div style="color:red;">{{$errors->first('membership_id')}}</div> <br>
                                                <!--end::Input group-->
                                                </div><br>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Firm Name</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="text" class="form-control" name="firm_name" value="{{$lawyer_profile->firm_name}}">
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Firm Logo</label>
                                                <!--begin::Input group-->
                                                    <div class="mb-5">
                                                        <input type="file" class="form-control form-control-solid" name="firm_logo" value="{{$lawyer_profile->firm_logo}}" accept="image/*"/>
                                                        @if($lawyer_profile->firm_logo)
                                                            <div class="profileAvatar">
                                                                <img style="width: 140px !important; height: 140px !important; border-radius: 84px;" src="{{asset('lawyer_profile/' .$lawyer_profile->firm_logo)}}" alt="" class="img-fluid">
                                                            </div>
                                                        @endif
                                                        <div style="color:red;">{{$errors->first('firm_logo')}}</div> <br>
                                                    </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Home Slider</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="checkbox" {{ $lawyer_profile->is_featured ? 'checked' : '' }} name="is_featured" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                                <!--end::Input group-->
                                            </div>

                                            <!--end::Col-->

                                            <div class="col-lg-4 offset-md-4">
                                                <button type="submit" class="btn btn-primary ">
                                                    Update Lawyer Profile
                                                </button>
                                            </div>
                                            <!--end::Col-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Wrapper-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection

@section('script')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#country-dropdown').on('change', function() {
        var country_id = this.value;
        $("#state-dropdown").html('');
        $.ajax({
        url:"{{url('get-states-by-country')}}",
        type: "POST",
        data: {
        country_id: country_id,
        _token: '{{csrf_token()}}'
        },
        dataType : 'json',
        success: function(result){
        $('#state-dropdown').html('<option value="">Select State</option>');
        $.each(result.states,function(key,value){
        $("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
        });
        $('#city-dropdown').html('<option value="">Select State First</option>');
        }
        });
        });
        $('#state-dropdown').on('change', function() {
        var state_id = this.value;
        $("#city-dropdown").html('');
        $.ajax({
        url:"{{url('get-cities-by-state')}}",
        type: "POST",
        data: {
        state_id: state_id,
        _token: '{{csrf_token()}}'
        },
        dataType : 'json',
        success: function(result){
        $('#city-dropdown').html('<option value="">Select City</option>');
        $.each(result.cities,function(key,value){
        $("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
        });
        }
        });
        });
        });


    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            placeholder: "Select",
            allowClear: true
        });

    });

    $(document).ready(function() {
        // Select2 Multiple
        $('#select2MultipleE').select2({
            placeholder: "Select",
            allowClear: true
        });

        $('#select2MultipleE1').select2({
            placeholder: "Select",
            allowClear: true
        });

    });

    $(document).ready(function(){
      var i=1;

      $('#add').click(function(){
           i++;
           $('#dynamic_field_membership').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="membership[]" placeholder="Enter Membership & Association Law" class="form-control membership_list" /></td><td><button style="padding: 7px !important; margin-top:2px;" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });


      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });

    });

    $(document).ready(function(){
      var j=1;


      $('#add_edu').click(function(){
           j++;
           $('#dynamic_field').append('<tr id="row'+j+'" class="dynamic-added"><td><input type="text" name="education[]" placeholder="Enter Education" class="form-control education_list" /></td><td><button style="padding: 7px !important; margin-top:2px;" type="button" name="remove" id="'+j+'" class="btn btn-danger btn_remove_edu">X</button></td></tr>');
      });


      $(document).on('click', '.btn_remove_edu', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });

    });

</script>
@endsection

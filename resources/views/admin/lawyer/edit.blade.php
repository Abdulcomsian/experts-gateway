@extends('layout.admin_panel.master')
@section('title')
Edit Lawyer Profile
@endsection
@push('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
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
                                                    <input type="text" class="form-control form-control-solid" name="f_name" value="{{$lawyer_profile->user->f_name}}" placeholder="Enter First Name" />
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
                                                    <input type="text" class="form-control form-control-solid" name="l_name" value="{{$lawyer_profile->user->l_name}}" placeholder="Enter Last Name" />
                                                    <div style="color:red;">{{$errors->first('l_name')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div><br>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Lawyer Title</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" name="title" value="{{$lawyer_profile->title}}" placeholder="Enter Title" />
                                                    <div style="color:red;">{{$errors->first('title')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Address</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" name="address" value="{{$lawyer_profile->address}}" placeholder="Enter Address" />
                                                    <div style="color:red;">{{$errors->first('address')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div><br>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Profile Detail</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <textarea required class="ckeditor form-control" name="profile_detail">{{$lawyer_profile->profile_detail }}</textarea>
                                                    <div style="color:red;">{{$errors->first('profile_detail')}}</div> <br>
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
                                                        <select class="select2-multiple form-control" multiple="multiple" id="select2Multiple" name="expertise_id[]" >
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
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Language</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
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
                                                            {{$selected}} >{{$language->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div style="color:red;">{{$errors->first('language_id')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div><br>
                                            <!--end::Col-->

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
                                            <div class="col-lg-12">
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
                                            </div><br>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Membership</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <div class="multiSelect">
                                                    <table class="table" id="dynamic_field_membership">  
                                                        <tr>  
                                                            <td style="width:80%"><input type="text" name="membership[]" value="{{$lawyer_profile->membership}}" placeholder="Enter Membership & Association Law" class="form-control membership_list" />
                                                            </td>  
                                                            <td style="width:20%;"><button style="padding: 7px !important; margin-top:2px;" type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                                            <div style="color:red;">{{$errors->first('membership')}}</div> <br>
                                                        </tr>  
                                                    </table>
                                                </div>
                                                <!--end::Input group-->
                                            </div><br>
                                            <!--end::Col-->

                                            
                                            <div class="col-lg-4 offset-md-4">
                                                <button type="submit" class="btn btn-primary ">
                                                    Update Expertise
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

@extends('layout.admin_panel.master')
@section('title')
Show Lawyer Profile
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
                                
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column align-items-start flex-xxl-row">

                                        <!--begin::Input group-->
                                        <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Enter invoice number">
                                            <span class="fs-2x fw-bolder text-gray-800">Lawyer Profile </span>
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
                                                    <p>{{$lawyer_profile->user->f_name}}</p>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Last Name</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <p>{{$lawyer_profile->user->l_name}}</p>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            {{-- <div class="col-lg-4">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Lawyer Title</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <p>{{$lawyer_profile->title}}</p>
                                                </div><br><br>
                                                <!--end::Input group-->
                                            </div> --}}
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Address</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <p>{{$lawyer_profile->address}}</p>
                                                </div><br><br>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Profile Detail</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <p>{!! $lawyer_profile->description !!}</p>
                                                </div><br><br>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->
                                            
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Language</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <p>
                                                        @foreach($lawyer_language as $language)
                                                            {{$language->language->name}}
                                                            @if(!($loop->last))
                                                            ,
                                                            @endif
                                                        @endforeach
                                                    </p>
                                                </div><br><br>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Country</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <p>
                                                        {{$country->name}}
                                                    </p>
                                                </div><br><br>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">State</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <p>
                                                        {{$state->name}}
                                                    </p>
                                                </div><br><br>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">City</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <p>
                                                        {{$city->name}}
                                                    </p>
                                                </div><br><br>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            {{-- <div class="col-lg-6"> --}}
                                                {{-- <div class="multiSelect">
                                                    <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Area of Expertises</label>
                                                    <!--begin::Input group-->
                                                    <div class="mb-5">
                                                        <p>
                                                            {{$lawyer_profile->partise_area}}
                                                        </p>
                                                    </div>
                                                </div> --}}
                                                <!--end::Input group-->
                                            {{-- </div> --}}
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Profile Image</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <div class="profileAvatar">
                                                        <img style="width: 140px !important; height: 140px !important; border-radius: 84px;" src="{{asset('lawyer_profile/' .$lawyer_profile->image)}}" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Cover Image</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <div class="profileAvatar">
                                                        <img style="width: 140px !important; height: 140px !important; border-radius: 84px;" src="{{asset('lawyer_cover_image/' .$lawyer_profile->b_image)}}" alt="" class="img-fluid">
                                                    </div>
                                                </div><br><br>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Education</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <p>
                                                        @foreach($lawyer_educations as $lawyer_education)
                                                            {{$lawyer_education->education->education_name}}
                                                            @if(!($loop->last))
                                                            ,
                                                            @endif
                                                        @endforeach
                                                    </p> 
                                                        
                                                </div>
                                                <!--end::Input group-->
                                            </div><br>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Membership</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <p>
                                                        @foreach($lawyer_memberships as $lawyer_membership)
                                                            {{$lawyer_membership->membership->membership_name}}
                                                            @if(!($loop->last))
                                                            ,
                                                            @endif
                                                        @endforeach
                                                    </p>
                                                </div>
                                                <!--end::Input group-->
                                            </div><br>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <form action="{{ route('update-lawyer-status', $lawyer_profile->user->id) }}" method="POST">
                                                    @csrf()  
                                                    <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Lawyer Status</label>
                                                    <input type="hidden" name="status" value="{{$lawyer_profile->user->status}}"> 
                                                    <select name="status" id="status" required class="form-control">
                                                        <option value="">Select Status</option>
                                                        <option value="1">Approved</option>
                                                        <option value="0">Reject</option>
                                                    </select><br>
                                                    <input type="text" name="mail_message" placeholder="Reason" class="form-control reason" style="display: none;"><br>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                                
                                                

                                                {{-- @if($lawyer_profile->user->status == 1) 
                                                <form action="{{ route('update-lawyer-status', $lawyer_profile->user->id) }}" method="POST">
                                                    @csrf()                         
                                                    <button type="submit" class="btn btn-success" name="status" value="0">Approved</button>
                                                </form>                    
                                                @elseif($lawyer_profile->user->status == 0)
                                                    <form action="{{ route('update-lawyer-status', $lawyer_profile->user->id) }}" method="POST">
                                                        @csrf() 
                                                        <label class="form-label fs-6 fw-bolder text-gray-900 mb-3"><strong> Reason</strong></label>       
                                                        <input type="text" name="mail_message" required class="form-control" placeholder="Enter Reason of Rejection">   
                                                        <br>                  
                                                        <button type="submit" class="btn btn-danger" name="status" value="1">Pending</button>
                                                    </form>
                                                @endif --}}
                                            </div>
                                            <!--end::Col-->

                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Wrapper-->
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

    $('#status').change(function(){
        if($(this).val() == 0){
            $('.reason').show();
        }else{
            $('.reason').hide();
        }
       
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

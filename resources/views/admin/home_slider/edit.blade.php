@extends('layout.admin_panel.master')
@section('title')
Practice Area
@endsection
@push('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
                                <form action="{{ route('home-slider.update', $home_slider->id) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                 <!--begin::Wrapper-->
                                    <div class="d-flex flex-column align-items-start flex-xxl-row">

                                        <!--begin::Input group-->
                                        <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Enter invoice number">
                                            <span class="fs-2x fw-bolder text-gray-800">Edit Home Slider</span>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Top-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed my-10"></div>
                                    <div class="mb-0">
                                        <!--begin::Row-->
                                        <div class="row gx-10 mb-5">
                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Name</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" name="name" value="{{$home_slider->name}}" placeholder="Enter Name"   />
                                                    <div style="color:red;">{{$errors->first('name')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Type</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid" name="type" value="{{$home_slider->type}}" placeholder="Enter Type"   />
                                                    <div style="color:red;">{{$errors->first('type')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Image</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="file" class="form-control form-control-solid" name="image"  placeholder="Select File"   />
                                                    <div style="color:red;">{{$errors->first('image')}}</div> <br>
                                                    @if($home_slider)
                                                        <img width="100px" src="{{asset('home_slider/'. $home_slider->image)}}" />
                                                    @endif
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <button type="submit" class="btn btn-primary updateBtn">
                                                Save
                                            </button>
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

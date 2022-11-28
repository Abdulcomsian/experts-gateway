@extends('layout.admin_panel.master')
@section('title')
Add Counters
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
                        @include('layout.partials.msg')
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card body-->
                            <div class="card-body p-12">
                                <!--begin::Form-->
                                <form action="{{ route('home-number.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="mb-0">
                                        <!--begin::Row-->
                                        <div class="row gx-10 mb-5">
                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Active Members</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="number" class="form-control form-control-solid" name="active_members" value="{{old('active_members')}}" placeholder="Enter Active Members" required />
                                                    <div style="color:red;">{{$errors->first('active_members')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Years Of Excellence</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="number" class="form-control form-control-solid" name="years_of_excellence" value="{{old('years_of_excellence')}}" placeholder="Enter Years Of Excellence"  required />
                                                    <div style="color:red;">{{$errors->first('years_of_excellence')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Key Countries</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="number" class="form-control form-control-solid" name="key_countries"  placeholder="Enter Key Countries"   required />
                                                    <div style="color:red;">{{$errors->first('key_countries')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">trust Rating</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="number" class="form-control form-control-solid" name="trust_rating"  placeholder="Enter Trust Rating"  required />
                                                    <div style="color:red;">{{$errors->first('trust_rating')}}</div> <br>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Areas of Expertise</label>
                                                <!--begin::Input group-->
                                                <div class="mb-5">
                                                    <input type="number" class="form-control form-control-solid" name="areas_of_expertise"  placeholder="Areas Of Expertise" min="1" max="100"  required />
                                                    <div style="color:red;">{{$errors->first('areas_of_expertise')}}</div> <br>
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


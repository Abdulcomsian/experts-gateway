@extends('layout.admin_panel.master')
@section('css')
@endsection
@section('title')
    Profile Update
@endsection
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        {{--<!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-place="true" data-kt-place-mode="prepend"
                     data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                     class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Account Settings</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="index.html" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Account</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Settings</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->--}}
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                @include('layout.partials.msg')
                <!--begin::Basic info-->
                <div class="card mb-5 mb-xl-10">
{{--                    @include('admin.includes.msg')--}}
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Profile Details</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_profile_details" class="">
                        <!--begin::Form-->
                        <form method="post" action="{{route('profile_update')}}">
                            @csrf
                            <!--begin::Card-->
                            <div class="card">
                                <!--begin::Card body-->
                                <div class="card-body p-12">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column align-items-start flex-xxl-row">

                                            <!--begin::Input group-->
                                            <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4">
                                                <span class="fs-2x fw-bolder text-gray-800">Profile Update</span>
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
                                                        <input type="text" name="f_name" value="{{$user->f_name}}" class="form-control form-control-solid" placeholder="First Name" />
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Last Name</label>
                                                    <!--begin::Input group-->
                                                    <div class="mb-5">
                                                        <input type="text" name="l_name" value="{{$user->l_name}}" class="form-control form-control-solid" placeholder="Last Name" />
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Email</label>
                                                    <!--begin::Input group-->
                                                    <div class="mb-5">
                                                        <input type="text" name="email" value="{{$user->email}}" class="form-control form-control-solid" placeholder="Email" />
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Wrapper-->
                                </div>
                                <!--end::Card body-->
                                <!--begin::Card body-->
                                <div class="card-body p-12">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column align-items-start flex-xxl-row">

                                            <!--begin::Input group-->
                                            <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4">
                                                <span class="fs-2x fw-bolder text-gray-800">Password</span>
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
                                                    <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Password</label>
                                                    <!--begin::Input group-->
                                                    <div class="mb-5">
                                                        <input type="password" name="password" class="form-control form-control-solid" placeholder="Password" />
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Confrim Password</label>
                                                    <!--begin::Input group-->
                                                    <div class="mb-5">
                                                        <input type="password" name="password_confirmation"  class="form-control form-control-solid" placeholder="Confrim Password" />
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Col-->

                                                <button type="submit" class="btn btn-primary updateBtn">
                                                    Update Profile
                                                </button>
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Basic info-->
                <!--end::Modals-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
@section('script')
@endsection

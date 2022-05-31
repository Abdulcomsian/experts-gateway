@extends('layout.admin_panel.master')
@section('title')
Contact Us
@endsection
@section('content')
   <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            @if($contact_us == null)
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <!--end::Filter-->
                                <!--begin::Add user-->
                                <a href="{{route('contact_us.create')}}">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                                    <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                                        <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1" />
                                                    </svg>
                                                </span>
                                    <!--end::Svg Icon-->Add Contact Us Detail</button></a>
                                <!--end::Add user-->
                            </div>
                            @endif
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">Address</th>
                                <th class="min-w-125px">Phone Number</th>
                                @if($contact_us->phone_1 != null)
                                <th class="min-w-125px">Office Number</th>
                                @endif
                                <th class="min-w-125px">Email</th>
                                <!-- <th class="min-w-125px">Facebook Link</th>
                                <th class="min-w-125px">Instagram Link</th>
                                <th class="min-w-125px">Twitter Link</th>
                                <th class="min-w-125px">Linkedin Link</th> -->
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                            <!--begin::Table row-->
                            @if($contact_us != null)
                            <tr>
                                <td>{{$contact_us->address}}</td>
                                <td>{{$contact_us->phone}}</td>
                                @if($contact_us->phone_1 != null)
                                <td>{{$contact_us->phone_1 ?? ''}}</td>
                                @endif
                                <td>{{$contact_us->email}}</td>
                                <!-- <td>{{$contact_us->facebook_link}}</td>
                                <td>{{$contact_us->instagram_link}}</td>
                                <td>{{$contact_us->twitter_link}}</td>
                                <td>{{$contact_us->linkedin_link}}</td> -->
                                <td class="text-end">

                                    <a href="{{route('contact_us.show',$contact_us->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-warning edit-quiz"><i class="fa fa-eye"></i></a>

                                    <a href="{{route('contact_us.edit',$contact_us->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-primary edit-quiz"><i class="fa fa-edit"></i></a>
                                    <form method="POST" action="{{ route('contact_us.destroy', $contact_us->id) }}"  id="form_{{$contact_us->id}}" >
                                    @method('Delete')
                                    @csrf()
                                    <button type="submit" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-danger edit-quiz"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
							@else
							<tr>
		                        <td colspan="3" style="text-align: center;"><strong> No Language Created Yet </strong></td>
		                      </tr>
		                      @endif
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content--> 
@endsection

@extends('layout.admin_panel.master')
@section('title')
Lawyer Applications
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
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">First Name</th>
                                <th class="min-w-125px">Last Name</th>
                                <th class="min-w-125px">Email</th>
                                <th class="min-w-125px">Image</th>
                                <th class="min-w-125px">Address</th>
                                <th class="min-w-125px">Status</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                            <!--begin::Table row-->
                            @if(count($lawyer_profiles) > 0)
                            <tr>
                                @foreach($lawyer_profiles as $lawyer_profile)
                                <td>{{$lawyer_profile->user->f_name}}</td>
                                <td>{{$lawyer_profile->user->l_name}}</td>
                                <td>{{$lawyer_profile->user->email}}</td>
                                <td><img src="{{asset('lawyer_profile/'.$lawyer_profile->image)}}" width="100px" height="100px"></td>
                                <td>{{$lawyer_profile->address}}</td>

                                <td>
                                    @if($lawyer_profile->user->status == 1)
                                        Approved
                                    @elseif($lawyer_profile->user->status == 0)
                                        Pending
                                    @endif


                                </td>
                                <td class="text-end">
                                    <div class="btn-group">

                                        <a href="{{route('LawyerProfile.show',$lawyer_profile->user->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-warning edit-quiz"><i class="fa fa-eye"></i></a><br><br>

                                        <a href="{{route('LawyerProfile.edit',$lawyer_profile->user->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-primary edit-quiz"><i class="fa fa-edit"></i></a>

                                    </div>
                                </td>

                            </tr>
                            @endforeach
							@else
							<tr>
		                        <td colspan="3" style="text-align: center;"><strong> No Lawyer Application Created Yet </strong></td>
		                      </tr>
		                      @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="7">
                                    {{ $lawyer_profiles->links() }}
                                </td>
                            </tr>
                            </tfoot>
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

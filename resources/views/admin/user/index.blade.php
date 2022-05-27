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
                                <th class="min-w-125px">Email </th>
                                <th class="min-w-125px">Country</th>
                                <th class="min-w-125px">Phone</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                            <!--begin::Table row-->
                            @if(count($users) > 0)
                            <tr>
                                @foreach($users as $user)
                                <td>{{$user->f_name}}</td>
                                <td>{{$user->l_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->country}}</td>
                                <td>{{$user->phone}}</td>
                                <td class="text-end">

                                    <a href="{{route('user.show',$user->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-warning edit-quiz"><i class="fa fa-eye"></i></a>

                                    <a href="{{route('user.edit',$user->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-primary edit-quiz"><i class="fa fa-edit"></i></a>
                                    
                                </td>
                                
                            </tr>
                            @endforeach
							@else
							<tr>
		                        <td colspan="3" style="text-align: center;"><strong> No User Created Yet </strong></td>
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

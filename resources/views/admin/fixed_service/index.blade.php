@extends('layout.admin_panel.master')
@section('title')
Fixed Price Service
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
                                <th class="min-w-125px">Title</th>
                                <th class="min-w-125px">Price</th>
                                <th class="min-w-125px">Time</th>
                                <th class="min-w-125px">Image</th>
                                <th class="min-w-125px">Expertises</th>
                                <th class="min-w-125px">Status</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                            <!--begin::Table row-->
                            @if(count($fixed_services) > 0)
                            <tr>
                                @foreach($fixed_services as $fixed_service)
                                <td>{{$fixed_service->title}}</td>
                                <td>{{$fixed_service->price}}</td>
                                <td>{{$fixed_service->time_limit}}</td>
                                <td><img src="{{asset('fixed_service/'.$fixed_service->image)}}" width="100px" height="100px"></td>
                                <td>{{$fixed_service->expertise->name}}</td>

                                <td>
                                        @if($fixed_service->status == 1)
                                            <form action="{{ route('update-service-status', $fixed_service->id) }}" method="POST">
                                            @csrf()
                                            <button type="submit" class="btn btn-success mx-1" name="status" value="0">Approved</button>
                                        </form>
                                        @elseif($fixed_service->status == 0)
                                            <form action="{{ route('update-service-status', $fixed_service->id) }}" method="POST">
                                                @csrf()
                                                <button type="submit" class="btn btn-danger mx-1" name="status" value="1">Pending</button>
                                            </form>
                                        @endif
                                </td>
                                <td class="text-end">
                                    <div class="btn-group">
                                        <a href="{{route('fixed_service.show',$fixed_service->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-warning edit-quiz mx-1"><i class="fa fa-eye"></i></a><br><br>

                                        <a href="{{route('admin.edit-fixed-service',$fixed_service->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-primary edit-quiz mx-1"><i class="fa fa-edit"></i></a>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
							@else
							<tr>
		                        <td colspan="3" style="text-align: center;"><strong> No Service Created By Any Lawyer</strong></td>
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

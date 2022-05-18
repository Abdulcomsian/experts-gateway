@extends('layout.admin_panel.master')
@section('title')
Dashboard
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
                                <th class="min-w-125px">Description</th>
                                <th class="min-w-125px">Image</th>
                                <th class="min-w-125px">Lawyer Name</th>
                                <th class="min-w-125px">Status</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                            <!--begin::Table row-->
                            @if(count($blogs) > 0)
                            <tr>
                                @foreach($blogs as $blog)
                                <td>{{$blog->title}}</td>
                                <td>{{$blog->short_description}}</td>
                                <td><img src="{{asset('blogs/'.$blog->image)}}" width="100px" height="100px"></td>
                                <td>{{$blog->user->name}}</td>
                                <td>
                                    @if($blog->status == 1) 
                                    <form action="{{ route('update-blog-status', $blog->id) }}" method="POST">
                                        @csrf()                         
                                        <button type="submit" class="btn btn-success" name="status" value="0">Active</button>
                                    </form>                    
                                    @else
                                        <form action="{{ route('update-blog-status', $blog->id) }}" method="POST">
                                            @csrf()                             
                                            <button type="submit" class="btn btn-danger" name="status" value="1">Inactive</button>
                                        </form>
                                    @endif


                                </td>
                                <td class="text-end">

                                    <a href="#" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-warning edit-quiz"><i class="fa fa-eye"></i></a>

                                    <a href="{{route('blog.edit',$blog->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-primary edit-quiz"><i class="fa fa-edit"></i></a>
                                    <form method="POST" action="{{ route('blog.destroy', $blog->id) }}"  id="form_{{$blog->id}}" >
                                    @method('Delete')
                                    @csrf()
                                    <button type="submit" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-danger edit-quiz"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
							@else
							<tr>
		                        <td colspan="3" style="text-align: center;"><strong> No Blogs Created Yet </strong></td>
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

@extends('layout.lawyerlayout')
@section('title')
Blog
@endsection
@push('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@endpush
@section('content')
<main>
    <div class="profileDiv fixedDiv">
        <div class="mainFixedService">
            <h5>Blog</h5>
            <div class="createFixedService createBlog">
                <h4>Create a new post</h4>
                <div class="formDiv">
                    <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inputDiv">
                                    <input type="text" name="title" id="title" value="{{old('title')}}"  placeholder="Title" style="border:1px solid #d9d9d9;">
                                    <div style="color:red;">{{$errors->first('title')}}</div> <br>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="inputDiv uploadDiv">
                                    <input type="file" name="image" id="image" accept="image/*">
                                    <p>Upload Blog Image</p>
                                    <div style="color:red;">{{$errors->first('image')}}</div> <br>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group inputDiv">
                                    <select name="expertise_id" id="expertise_id">
                                        <option> Select Category</option>
                                        @foreach($expertises as $expertise)
                                        <option value="{{$expertise->id}}">{{$expertise->name}}</option>
                                        @endforeach
                                    </select>
                                    <div style="color:red;">{{$errors->first('expertise_id')}}</div> <br>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="inputDiv">
                                    <textarea name="short_description" id="short_description" cols="20" rows="5" style="border:1px solid #d9d9d9;" 
                                        placeholder="Short Description"></textarea>
                                        <div style="color:red;">{{$errors->first('short_description')}}</div> <br>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                            <textarea class="ckeditor form-control" name="description"></textarea>
                            <div style="color:red;">{{$errors->first('description')}}</div> <br>
                        </div>
                            </div>
                        </div>
                        <button style="margin: 0px !important;" class="formBtn">Post</button>
                    </form>
                </div>
            </div>
            <div class="bolgSection">
                <div class="multiBlog">
                    <h4 class="commonHeading text-center">My blog posts</h4>
                    <div class="row">
                        @foreach($blogs as $blog)
                        <div class="col-lg-4">
                            <div class="blogCard">
                                <img src="{{asset('blogs/'.$blog->image)}}" alt="" class="img-fluid">
                                <div class="cardContent">
                                    <div class="date">
                                        <p>{{ date('d M,Y', strtotime($blog->created_at)) }}</p>
                                    </div>
                                    <h4>{{$blog->title}}</h4>
                                    <p>{{$blog->short_description}}</p>
                                    <a href="{{ route('lawyer.blog',$blog->id) }}">Read More <img src="{{ asset('assets/img/sliderArrow.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection

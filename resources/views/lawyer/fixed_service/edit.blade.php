@extends('layout.lawyerlayout')
@section('title')
Fix Price Service
@endsection
@push('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@endpush
@section('content')
<main>
    <div class="profileDiv fixedDiv">
        <div class="mainFixedService">
            <h5>Fixed Services</h5>
            <div class="createFixedService">
                <h4>Create a Fixed Price Service</h4>
                <div class="formDiv">
                    <form action="{{ route('lawyer.update-fixed-service',$fixed_service->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <label>Title</label>
                                <div class="inputDiv">
                                    <input type="text" name="title" id="title" placeholder="Title" value="{{ $fixed_service->title }}">
                                    <div style="color:red;">{{$errors->first('title')}}</div> <br>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Price</label>
                                <div class="inputDiv">
                                    <input type="text" name="price" id="price" placeholder="Price" value="{{ $fixed_service->price }}">
                                    <span>USD</span>
                                    <div style="color:red;">{{$errors->first('price')}}</div> <br>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <label>Short Description</label>
                                <div class="inputDiv">
                                    <input type="text" name="short_des" id="short_des" placeholder="Short Description" value="{{ $fixed_service->short_des }}">
                                    <div style="color:red;">{{$errors->first('short_des')}}</div> <br>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <label>Select Category</label>
                                <div class="inputDiv">
                                    <select name="expertise_id" id="expertise_id" class="form-select" aria-label="Default select example">
                                        <option disabled selected> Select Category</option>
                                        @foreach($expertises as $expertise)
                                        <option value="{{$expertise->id}}" {{ $fixed_service->expertise_id == $expertise->id ? 'selected' : '' }} >{{$expertise->name}}</option>
                                        @endforeach
                                    </select>
                                    <div style="color:red;">{{$errors->first('expertise_id')}}</div> <br>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <label>Description</label>
                                <div class="form-group">
                                    <textarea required class="ckeditor form-control" name="description">{!! $fixed_service->description !!}</textarea>
                                    <div style="color:red;">{{$errors->first('description')}}</div> <br>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <label>Service Time Duration</label>
                                <div class="inputDiv">
                                    <select name="time_limit" id="time_limit" class="form-select" aria-label="Default select example">
                                        <option disabled selected>Select Time</option>
                                        <option value="15 min" {{ $fixed_service->time_limit == '15 min' ? 'selected' : '' }}>15 min</option>
                                        <option value="30 min" {{ $fixed_service->time_limit == '30 min' ? 'selected' : '' }}>30 min</option>
                                        <option value="1 hour" {{ $fixed_service->time_limit == '1 hour' ? 'selected' : '' }}>1 hour</option>
                                        <option value="1.3 hour" {{ $fixed_service->time_limit == '1.3 hour' ? 'selected' : '' }}>1.3 hour</option>
                                        <option value="2 hours"{{ $fixed_service->time_limit == '2 hour' ? 'selected' : '' }}>2 hours</option>
                                        <option value="2.3 hours"{{ $fixed_service->time_limit == '2.3 hour' ? 'selected' : '' }}>2.3 hours</option>
                                        <option value="3 hour"{{ $fixed_service->time_limit == '3 hour' ? 'selected' : '' }}>3 hour</option>
                                        <option value="3.3 hour"{{ $fixed_service->time_limit == '3.3 hour' ? 'selected' : '' }}>3.3 hour</option>
                                        <option value="4 hours"{{ $fixed_service->time_limit == '4 hour' ? 'selected' : '' }}>4 hours</option>
                                        <option value="4.3 hours"{{ $fixed_service->time_limit == '4.3 hour' ? 'selected' : '' }}>4.3 hours</option>
                                    </select>
                                    <div style="color:red;">{{$errors->first('time_limit')}}</div> <br>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label style="text-align:center;">Image</label>
                                <div class="inputDiv uploadDiv">
                                    <input type="file" name="image" id="image" accept="image/*">
                                    <p>Upload Image</p>
                                    <div class="profileAvatar">
                                        <img style="width: 140px !important;margin: 10px 59px 0px 0px; height: 140px !important; border-radius: 84px;" src="{{asset('fixed_service/' .$fixed_service->image)}}" alt="" class="img-fluid">
                                    </div>
                                    <div style="color:red;">{{$errors->first('image')}}</div> <br>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label>What's Included</label>
                                <div class="form-group">
                                    <textarea required class="ckeditor form-control" name="included" >{!! $fixed_service->included !!}</textarea>
                                    <div style="color:red;">{{$errors->first('included')}}</div> <br>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label>What's not Included</label>
                                <div class="form-group">
                                    <textarea required class="ckeditor form-control" name="not_included" >{!! $fixed_service->not_included !!}</textarea>
                                    <div style="color:red;">{{$errors->first('not_included')}}</div> <br>
                                </div>
                            </div>
                        </div>
                        <button type="submit" style="margin: 0px !important;" class="formBtn">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
@endsection
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
                    <form action="{{ route('lawyer.post-fixed-service') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <label>Title</label>
                                <div class="inputDiv">
                                    <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
                                    <div style="color:red;">{{$errors->first('title')}}</div> <br>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Price</label>
                                <div class="inputDiv">
                                    <input type="text" name="price" id="price" placeholder="Price" value="{{ old('price') }}">
                                    <span>USD</span>
                                    <div style="color:red;">{{$errors->first('price')}}</div> <br>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label>Short Description</label>
                                <div class="inputDiv">
                                    <input type="text" name="short_des" id="short_des" placeholder="Short Description" value="{{ old('short_des') }}">
                                    <div style="color:red;">{{$errors->first('short_des')}}</div> <br>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <label>Description</label>
                                <div class="form-group">
                                    <textarea required class="ckeditor form-control" name="description"></textarea>
                                    <div style="color:red;">{{$errors->first('description')}}</div> <br>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Select Category</label>
                                <div class="inputDiv">
                                    <select name="expertise_id" id="expertise_id" class="form-select" aria-label="Default select example">
                                        <option disabled selected> Select Category</option>
                                        @foreach($expertises as $expertise)
                                        <option value="{{$expertise->id}}">{{$expertise->name}}</option>
                                        @endforeach
                                    </select>
                                    <div style="color:red;">{{$errors->first('expertise_id')}}</div> <br>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Service Time Duration</label>
                                <div class="inputDiv">
                                    <select name="time_limit" id="time_limit" class="form-select" aria-label="Default select example">
                                        <option disabled selected>Select Time</option>
                                        <option value="15 min">15 min</option>
                                        <option value="30 min">30 min</option>
                                        <option value="1 hour">1 hour</option>
                                        <option value="1.3 hour">1.3 hour</option>
                                        <option value="2 hours">2 hours</option>
                                        <option value="2.3 hours">2.3 hours</option>
                                        <option value="3 hour">3 hour</option>
                                        <option value="3.3 hour">3.3 hour</option>
                                        <option value="4 hours">4 hours</option>
                                        <option value="4.3 hours">4.3 hours</option>
                                    </select>
                                    <div style="color:red;">{{$errors->first('time_limit')}}</div> <br>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label style="text-align:center;">Image</label>
                                <div class="inputDiv uploadDiv">
                                    <input type="file" name="image" id="image" accept="image/*">
                                    <p>Upload Image</p>
                                    <div style="color:red;">{{$errors->first('image')}}</div> <br>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label>What's Included</label>
                                <div class="form-group">
                                    <textarea required class="ckeditor form-control" name="included" ></textarea>
                                    <div style="color:red;">{{$errors->first('included')}}</div> <br>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label>What's not Included</label>
                                <div class="form-group">
                                    <textarea required class="ckeditor form-control" name="not_included" ></textarea>
                                    <div style="color:red;">{{$errors->first('not_included')}}</div> <br>
                                </div>
                            </div>
                        </div>
                        <button type="submit" style="margin: 0px !important;" class="formBtn">Create</button>
                    </form>
                </div>
            </div>
            <div class="relatedService">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="commonHeading">My Fixed Services</h2>
                        </div>
                    </div>
                    <div class="multiRelatedService">
                        <div class="row">
                            @if($fixed_services)
                            @foreach($fixed_services as $fixed_service)
                            <div class="col-lg-4">
                                <div class="card">
                                    <img src="{{asset('fixed_service/'.$fixed_service->image)}}" width="339px" height="222px">
                                    <div class="cardContent">
                                        <h4>{{$fixed_service->title}}</h4>
                                        <p class="tag">{{$fixed_service->expertise->name}}</p>
                                        @if($fixed_service->status == 0)
                                        <p  style="color:#EE2143;opacity: 1;">Pending</p>
                                        @endif
                                        <p class="line">
                                            <img src="../../assets/img/line.png" alt="" class="img-fluid">
                                        </p>
                                        <p>{{$fixed_service->short_des}}
                                        </p>
                                        <div class="cardFooter">
                                            <h4>{{$fixed_service->price}} <span>USD</span></h4>
                                            <a href="{{ route('fixed_service.detail', $fixed_service->id) }}" class="learnMore">Learn More <img src="../../assets/img/sliderArrow.png" alt="" class="img-fluid"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            No Service Created
                            @endif
                        </div>
                    </div>
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
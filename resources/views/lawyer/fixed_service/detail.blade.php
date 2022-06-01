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
        <h5>Fixed Services</h5>
        <div class="fixedServiceDiv">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner">
                        <img src="{{asset('fixed_service/'.$fixed_service->image)}}" alt="" style="width:1106px; height:399px;" class="img-fluid">
                        <div class="tagLine">
                            <div class="textDiv">
                                <p>{{ $fixed_service->title }}</p>
                                <span>{{ $fixed_service->expertise->name }}</span>
                            </div>
                            <div class="priceText">
                                <h4>{{ $fixed_service->price }} <span>USD</span></h4>
                            </div>
                        </div>
                    </div>
                    <div class="operationDiv">
                        <p>30 Fixed Services Sold</p>
                        <div class="multiOption">
                            <span>
                                @if($fixed_service->status == 0)
                                Pending
                                @else
                                Active
                                @endif
                            </span>
                            <a href="{{ route('lawyer.edit-fixed-service',$fixed_service->id) }}"><button style="cursor: pointer;border-color: transparent;">
                                <span>Edit</span>
                            </button></a>
                        </div>
                    </div>
                    <div class="contentDiv"><br>
                        <p>Time: {{$fixed_service->time_limit }}</p>
                        <div class="line">
                            <img src="../../assets/img/line.png" alt="" class="img-fluid">
                        </div>
                        <h4>SERVICE DESCRIPTION</h4>
                        {!! $fixed_service->description !!}
                        <div class="line">
                            <img src="../../assets/img/line.png" alt="" class="img-fluid">
                        </div>
                        <h4>WHAT’S INCLUDED</h4>
                        {!! $fixed_service->included !!}
                        <div class="line">
                            <img src="../../assets/img/line.png" alt="" class="img-fluid">
                        </div>
                        <h4>WHAT’S NOT INCLUDED</h4>
                        {!! $fixed_service->not_included !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')

@endsection
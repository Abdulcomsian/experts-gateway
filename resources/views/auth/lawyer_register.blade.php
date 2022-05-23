@extends('layout.registerlayout')
@push('styles')

@endpush
@section('content') 

<main>
    <div class="readyToStart">
        <h4 class="commonHeading">Ready to Start Your Journey?</h4>
        <div class="formDiv">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="inputDiv">
                                <label for="">Full Name</label>
                                <input id="type" type="hidden" name="type" value="lawyer">
                                <input type="text" name="name" id="name" value="{{ old('name') }}" autofocus placeholder="Enter Your Full Name">
                                <div style="color:red;">{{$errors->first('f_name')}}</div> <br>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="inputDiv">
                                <label for="">Email Address</label>
                                <input type="text" name="email" id="email" value="{{ old('email') }}" autofocus placeholder="Enter Your Email Address">
                                <div style="color:red;">{{$errors->first('email')}}</div> <br>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="inputDiv">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}">
                                <div style="color:red;">{{$errors->first('password')}}</div> <br>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="inputDiv">
                                <label for="">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btnDiv">
                    <button class="formBtn">Sign Up Now</button>
                </div>
            </form>
        </div>
    </div>
</main>
    
@endsection

@section('js')
{{-- scripts for country code in phone input --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.0/js/intlTelInput-jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.0/js/intlTelInput.min.js"></script>

        <script src="{{ URL::asset('assets/layouts/layout/scripts/intlTelInputCustom.js') }}"></script>

        <script src="//geodata.solutions/includes/countrystatecity.js"></script>

@endsection
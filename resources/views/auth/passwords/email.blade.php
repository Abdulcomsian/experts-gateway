@extends('layout.loginlayout')

@section('content') 

<main>
    <div class="mainBanner registerBanner">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="bannerRight registerAuthRightBox">
                        <div class="card" style="margin-top: 160px; margin-bottom: 160px;">
                            <div class="card-header">{{ __('Reset Password') }}</div>

                            <div class="card-body" >
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary" style="background-color:#ed4c82; border-color: #ed4c82;">
                                                {{ __('Send Password Reset Link') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
    
@endsection

@section('js')
@endsection
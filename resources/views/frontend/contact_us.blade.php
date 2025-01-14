@extends('layout.loginlayout')
@section('title')
Contact Us
@endsection
@section('content') 
    <main>
        <div class="mainBanner contactBanner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="bannerLeft">
                            <h2 class="commonHeading">Contact Us</h2>
                            <div class="formDiv">
                                <form action="{{route('notify.admin')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="inputDiv">
                                                <input type="text" name="first_name" id="first_name"
                                                    placeholder="First Name" required>
                                            @error("first_name")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="inputDiv">
                                                <input type="text" name="last_name" id="last_name" placeholder="Last Name" required>
                                                @error("last_name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="inputDiv">
                                                <input type="text" name="email" id="email" placeholder="Email" required>
                                                @error("email")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="inputDiv">
                                                <input type="text" name="phone" id="phone" placeholder="Phone" required>
                                                @error("phone")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="inputDiv">
                                                <input type="text" name="practice" id="practice"
                                                    placeholder="Practice Area" required>
                                                @error("practice")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="inputDiv">
                                                <textarea name="message" id="message" placeholder="Message" cols="30"
                                                    rows="10" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit">Submit Now</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6" style="padding: 0px;">
                        <div class="bannerRight">
                            <img src="{{ asset('assets/img/contactBanner.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contactDetail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contactBox">
                            <img src="{{ asset('assets/img/location.png') }}" alt="" class="img-fluid">
                            <div class="contactContent">
                                <p>{{$contact_us->address ?? ''}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contactBox">
                            <img src="{{ asset('assets/img/phone.png') }}" alt="" class="img-fluid">
                            <div class="contactContent">
                                <p>{{$contact_us->phone ?? ''}} <br>{{$contact_us->phone_1 ?? ''}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contactBox">
                            <img src="{{ asset('assets/img/mail.png') }}" alt="" class="img-fluid">
                            <div class="contactContent">
                                <a href="">{{$contact_us->email ?? ''}}</a>
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
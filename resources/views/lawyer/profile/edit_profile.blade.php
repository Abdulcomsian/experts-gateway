@extends('layout.lawyerlayout')
@section('title')
Edit Profile
@endsection
@push('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@endpush
@section('content')
<main>
        <div class="profileDiv">
            <h5>My Profile</h5>
            <div class="profileBox">
                <form action="{{ route('lawyer.update-lawyer-profile',$lawyer_profile->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="profileBoxHeader" style="padding: 100px 41px 144px 140px;">
                            <div class="uploadCover">
                                <input type="file" name="b_image" id="b_image" accept="image/*">
                                <p>Upload Cover Image</p>
                                <div style="color:red;">{{$errors->first('b_image')}}</div> <br>
                            </div>
                            <div class="profileAvatar" style="bottom:-30px !important;">
                                <img src="{{asset('lawyer_cover_image/'.$lawyer_profile->b_image)}}" alt="" style="width:160px; height:160px; border-radius:75px;" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="profileBoxHeader" style="padding: 100px 41px 144px 140px;">
                            <div class="uploadCover">
                                <input type="file" name="image" id="image" accept="image/*">
                                <p>Upload Profile Image</p>
                                <div style="color:red;">{{$errors->first('image')}}</div> <br>
                            </div>
                            <div class="profileAvatar" style="bottom:-30px !important;">
                                <img src="{{asset('lawyer_profile/'.$lawyer_profile->image)}}" alt="" style="width:160px; height:160px; border-radius:75px;" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profileFormDiv">
                    
                        <div class="row">
                            <div class="col-lg-6">
                                <label>First Name</label>
                                <div class="inputDiv">
                                    <input type="text" placeholder="First Name" name="f_name" value="{{$lawyer_profile->user->f_name}}">
                                    <div style="color:red;">{{$errors->first('f_name')}}</div> <br>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Last Name</label>
                                <div class="inputDiv">
                                    <input type="text" placeholder="Last Name" name="l_name" value="{{$lawyer_profile->user->l_name}}">
                                    <div style="color:red;">{{$errors->first('l_name')}}</div> <br>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Email</label>
                                <div class="inputDiv">
                                    <input type="email" readonly placeholder="Email Address" name="email" value="{{$lawyer_profile->user->email}}">
                                    <div style="color:red;">{{$errors->first('email')}}</div> <br>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Lawyer Title</label>
                                <div class="inputDiv">
                                    <input name="title" type="text" placeholder="Lawyer Title" value="{{$lawyer_profile->title}}" />
                                    <div style="color:red;">{{$errors->first('title')}}</div> <br>
                                </div>
                            </div>
                        </div>
                        <div class="line">
                            <img src="{{asset('assets/img/line.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="row">
                            <!-- <div class="col-lg-6">
                                <div class="inputDiv">
                                    <select name="country" id="country">
                                        <option value="Country">Country</option>
                                        <option value="Pakistan">Pakistan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="inputDiv">
                                    <input type="text" placeholder="City" name="city" id="city">
                                </div>
                            </div> -->
                            <div class="col-lg-12">
                                <label>Address</label>
                                <div class="inputDiv">
                                    <input name="address" type="text" value="{{$lawyer_profile->address}}" placeholder="Address" />
                                    <div style="color:red;">{{$errors->first('address')}}</div> <br>
                                </div>
                            </div>
                        </div>
                        <div class="line">
                            <img src="{{asset('assets/img/line.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="margin-bottom: 3.5rem;">Expertise</label>
                                <div class="inputDiv">
                                    <select class="js-example-basic-multiple" name="expertise_id[]" multiple="multiple">
                                        <option disabled> Select Expertises</option>
                                        @foreach($expertises as $expertise)
                                        @foreach($lawyer_expertises as $l_expertise)
                                        @php 
                                        $selected="";
                                        if($l_expertise->expertise_id == $expertise->id ){
                                            $selected="selected";
                                            break;
                                        }
                                        @endphp
                                        @endforeach
                                        <option value="{{$expertise->id}}" {{$selected}}>{{$expertise->name}}</option>
                                        @endforeach
                                    </select>
                                    <div style="color:red;">{{$errors->first('expertise_id')}}</div> <br>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label style="margin-bottom: 3.5rem;">Langugae</label>
                                <div class="inputDiv">
                                    <select class="js-example-basic-multiple" name="language_id[]" multiple="multiple">
                                    <option disabled> Select Language</option>
                                    @foreach($languages as $language)
                                        @foreach($lawyer_language as $l_language)
                                        @php 
                                        $selected="";
                                        if($l_language->language_id == $language->id ){
                                            $selected="selected";
                                            break;
                                        }
                                        @endphp
                                        @endforeach
                                    <option value="{{$language->id}}"
                                        {{$selected}} >{{$language->name}}</option>
                                    @endforeach
                                </select>
                                <div style="color:red;">{{$errors->first('language_id')}}</div> <br>
                                </div>
                            </div>
                        </div>
                        <div class="line">
                            <img src="{{asset('assets/img/line.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Profile</label>
                                <div class="aboutProfile">
                                    <textarea required class="ckeditor form-control" name="profile_detail">{{$lawyer_profile->profile_detail}}</textarea>
                                    <div style="color:red;">{{$errors->first('profile_detail')}}</div> <br>
                                </div>
                            </div>
                        </div>
                        <div class="line">
                            <img src="{{asset('assets/img/line.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Education</label>
                                <div class="multiSelect">
                                    <table class="table" id="dynamic_field">  
                                        <tr>  
                                            <td style="width:80%"><input type="text" name="education[]" value="{{$lawyer_profile->education}}" placeholder="Enter Education" class="form-control education_list" />
                                            </td>  
                                            <td style="width:20%;"><button style="padding: 7px !important; margin-top:2px;" type="button" name="add_edu" id="add_edu" class="btn btn-success">Add More</button></td>  
                                            <div style="color:red;">{{$errors->first('education')}}</div> <br>
                                        </tr>  
                                    </table> 
                                </div>
                            </div>
                        </div>
                        <div class="line">
                            <img src="{{asset('assets/img/line.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h5>Associations & Memberships</h5>
                                <div class="multiSelect">
                                    <table class="table" id="dynamic_field_membership">  
                                        <tr>  
                                            <td style="width:80%"><input type="text" name="membership[]" placeholder="Enter Membership & Association Law" value="{{$lawyer_profile->membership}}" class="form-control membership_list" />
                                            </td>  
                                            <td style="width:20%;"><button style="padding: 7px !important; margin-top:2px;" type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                            <div style="color:red;">{{$errors->first('membership')}}</div> <br>
                                        </tr>  
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });

    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });

    $(document).ready(function(){      
      var i=1;  

      $('#add').click(function(){  
           i++;  
           $('#dynamic_field_membership').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="membership[]" placeholder="Enter Membership & Association Law" class="form-control membership_list" /></td><td><button style="padding: 7px !important; margin-top:2px;" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  

    });

    $(document).ready(function(){      
      var j=1;  


      $('#add_edu').click(function(){  
           j++;  
           $('#dynamic_field').append('<tr id="row'+j+'" class="dynamic-added"><td><input type="text" name="education[]" placeholder="Enter Education" class="form-control education_list" /></td><td><button style="padding: 7px !important; margin-top:2px;" type="button" name="remove" id="'+j+'" class="btn btn-danger btn_remove_edu">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove_edu', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  

    });
</script>
@endsection
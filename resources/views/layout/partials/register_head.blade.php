<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>@yield('title')</title>

<!-- Favicons -->
<link type="image/x-icon" href="{{asset('assets/media/logos/favicon.ico') }}" rel="icon">
<link rel="stylesheet" href="{{asset('assets/css/style1.css') }}">
<link rel="stylesheet" href="{{asset('assets/dashboard/css/style.css')}}" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400;500;600;700;800;900&display=swap"
rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/slick-theme.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
@toastr_css
@stack('styles')
  
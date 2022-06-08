<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.partials.lawyer_head')
  </head>
  <body class="login-page">
    @include('layout.partials.lawyer_header')
    
    @yield('content')
    
    @include('layout.partials.lawyer_footer')
    
    @include('layout.partials.lawyer_footer-scripts')
  </body>
</html>
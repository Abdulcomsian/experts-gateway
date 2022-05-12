<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.partials.login_head')
  </head>
  <body class="login-page">
    @include('layout.partials.login_header')
    
    @yield('content')
    
    @include('layout.partials.login_footer')
    
    @include('layout.partials.login_footer-scripts')
    @yield('script')
  </body>
</html>
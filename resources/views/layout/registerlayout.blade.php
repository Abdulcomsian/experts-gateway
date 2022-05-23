<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.partials.register_head')
  </head>
  <body class="login-page">
    @include('layout.partials.register_header')
    
    @yield('content')
    
    @include('layout.partials.register_footer')
    
    @include('layout.partials.register_footer-scripts')
    @yield('script')
  </body>
</html>
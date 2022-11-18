<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.partials.login_head')
  <script>
      var o_options = {
          domain: "experts-gateway.outseta.com",
          load: "nocode"
      };
  </script>
  <script src="https://cdn.outseta.com/outseta.min.js"
          data-options="o_options"/>
  </script>
  </head>
  <body class="login-page">
    @include('layout.partials.login_header')

    @yield('content')

    @include('layout.partials.login_footer')

    @include('layout.partials.login_footer-scripts')
    @yield('script')
  </body>
</html>

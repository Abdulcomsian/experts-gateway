<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.partials.lawyer_head')
      <script>
          var o_options = {
              domain: 'experts-gateway.outseta.com'
          };
      </script>
      <script src="https://cdn.outseta.com/outseta.min.js"
              data-options="o_options">
      </script>
  </head>
  <body class="login-page">
    @include('layout.partials.lawyer_header')

    @yield('content')

    @include('layout.partials.lawyer_footer')

    @include('layout.partials.lawyer_footer-scripts')
  </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    @yield('styles')
  </head>
  <body>
    <div class="content">
      @yield('content')
    </div>
    @yield('script')
  </body>
</html>

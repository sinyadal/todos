<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials.head')
</head>

<body>
  @include('partials.navbar')

  <div uk-height-viewport="expand: true">
    @yield('content') 
  </div>

  @include('partials.footer')
</body>

</html>
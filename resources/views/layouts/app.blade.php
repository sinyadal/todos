<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials._head')
</head>

<body class="uk-background-secondary">
  @include('partials._navbar')

  <div uk-height-viewport="expand: true">
    @yield('content') 
  </div>

  @include('partials._footer')
</body>

</html>
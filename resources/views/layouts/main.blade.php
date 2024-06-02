<!DOCTYPE html>
<html>

<head>
@include('includes.head')
 
</head>

<body>

  <!-- header section strats -->
  @include('includes.headerBar')
  <!-- end header section -->

 @yield('contents')

  <!-- footer section -->
  @include('includes.footer')
  <!-- footer section -->
  <!-- jQery -->
 @include('includes.js')
</body>

</html>
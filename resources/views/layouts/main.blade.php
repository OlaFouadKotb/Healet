<!DOCTYPE html>
<html lang="{{LaravelLocalization::getCurrentLocale()}}" dir="{{LaravelLocalization::getCurrentLocaleDirection()}}">

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
 <script>
        function openNav() {
            document.getElementById("myNav").style.width = "100%";
        }
    </script>
</body>

</html>
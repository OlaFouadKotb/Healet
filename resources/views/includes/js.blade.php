
<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
  <!-- bootstrap js -->
  <script src="{{asset('assets/js/bootstrap.js')}}"></script>
  <!-- custom js -->
  <script src="{{asset('assets/js/custom.js')}}"></script>
  <script>
    function openNav() {
        document.getElementById("myNav").style.width = "100%";
    }
    function closeNav() {
        document.getElementById("myNav").style.width = "0%";
    }
    function FindProxyForURL(url, host) {
    // Return 'DIRECT' to indicate that no proxy should be used
    return 'DIRECT';
}
</script>

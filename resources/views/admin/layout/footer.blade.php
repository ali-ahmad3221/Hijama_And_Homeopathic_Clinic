  <!-- Main Footer -->
  <footer class="main-footer text-center">
    <!-- To the right -->
    <!-- <div class="float-right d-none d-sm-inline">
      Anything you want
    </div> -->
    <!-- Default to the left -->
    {{-- <marquee class="marq" direction="left" style="width: 1050px;"> --}}
        <strong> Address: Opposite to Choburgi Quarter Near Mor Saman Abad Multan Road Lahore. </strong>
    {{-- </marquee> --}}

  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('plugins/dropdowncombotree/comboTreePlugin.js')}}"></script>
<script src="{{asset('myassets/js/select2-min.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}


 {{-- <script>
      $(document).ready(function() {
          $('.js-example-placeholder-single').select2();
      });
  </script> --}}

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"> </script>

<script>
      @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";

        switch(type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}", "", {"progressBar": true});
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}", "", {"progressBar": true});
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}", "", {"progressBar": true});
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}", "", {"progressBar": true});
                break;
        }
    @endif
</script>
@stack('banner-scripts')

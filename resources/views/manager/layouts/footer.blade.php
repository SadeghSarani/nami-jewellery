</div>
</div>


<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>


<!-- Bootstrap 4 -->
<script src="{{ asset('manager/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('manager/plugins/morris/morris.min.js') }}"></script>


<!-- Sparkline -->
<script src="{{ asset('manager/plugins/sparkline/jquery.sparkline.min.js') }}"></script>


<!-- jvectormap -->
<script src="{{ asset('manager/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('manager/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>


<!-- jQuery Knob Chart -->
<script src="{{ asset('manager/plugins/knob/jquery.knob.js') }}"></script>


<!-- daterangepicker -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('manager/plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- datepicker -->
<script src="{{ asset('manager/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('manager/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

<!-- Slimscroll -->
<script src="{{ asset('manager/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>

<!-- FastClick -->
<script src="{{ asset('manager/plugins/fastclick/fastclick.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('manager/dist/js/adminlte.js') }}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('manager/dist/js/pages/dashboard.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('manager/dist/js/demo.js') }}"></script>

@yield('script')


<script>

    $(document).ready(function () {

        let isMobile = window.matchMedia("only screen and (max-width: 600px)").matches;

        if (isMobile) {

            $('#body-sidbar').removeClass('sidebar-mini sidebar-open');
            $('#body-sidbar').addClass('sidebar-mini sidebar-collapse');
        }

        setTimeout(function () {
            $('.alert').attr("hidden", true);
        }, 5000)


    })
</script>
</body>
</html>

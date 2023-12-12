            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2023 Emart. All rights reserved. Dashboard by <a href="{{ route('home') }}">Emart</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{ url('Admin/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ url('Admin/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <!-- slimscroll js -->
    <script src="{{ url('Admin/assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- main js -->
    <script src="{{ url('Admin/assets/libs/js/main-js.js')}}"></script>
    <!-- chart chartist js -->
    {{-- <script src="{{ url('Admin/assets/vendor/charts/chartist-bundle/chartist.min.js')}}"></script> --}}
    <!-- sparkline js -->
    <script src="{{ url('Admin/assets/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
    <!-- morris js -->
    <script src="{{ url('Admin/assets/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
    {{-- <script src="{{ url('Admin/assets/vendor/charts/morris-bundle/morris.js')}}"></script> --}}
    <!-- chart c3 js -->
    <script src="{{ url('Admin/assets/vendor/charts/c3charts/c3.min.js')}}"></script>
    <script src="{{ url('Admin/assets/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
    <script src="{{ url('Admin/assets/vendor/charts/c3charts/C3chartjs.js')}}"></script>
    {{-- <script src="{{ url('Admin/assets/libs/js/dashboard-ecommerce.js')}}"></script> --}}
    {{-- DropZone Js lib --}}
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    {{-- Summernote --}}
    <script src="{{ url('Admin/assets/vendor/summernote/summernote.min.js')}}"></script>
    {{-- Select to --}}
    <script src="{{ url('Admin/assets/vendor/select2/js/select2.min.js')}}"></script>
    {{-- Date-Picker --}}
    <script src="{{ url('Admin/assets/libs/js/datetimepicker.js')}}"></script>
    {{-- Added Permanently Csrf Token --}}
    <script type="text/javascript">

    //Csrf-Token.
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Summernote.
    $(document).ready(function() {
        $(".summernote").summernote({
           height:270
        });
    });


    //Date-Picker.
    $('#shipped_date').datetimepicker({
        // options here
        format:'Y-m-d H:i:s',
    });

    </script>


    @yield('customJs')
</body>

</html>

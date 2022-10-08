<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="#">AbdullahShokr</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{URL::asset('dashboardfile/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{URL::asset('dashboardfile/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{URL::asset('dashboardfile/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

{{--<!-- Tempusdominus Bootstrap 4 -->--}}
<script src="{{URL::asset('dashboardfile/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
{{--<!-- Summernote -->--}}
<script src="{{URL::asset('dashboardfile/plugins/summernote/summernote-bs4.min.js')}}"></script>
{{--<!-- overlayScrollbars -->--}}
<script src="{{URL::asset('dashboardfile/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
{{--<!-- AdminLTE App -->--}}
<script src="{{URL::asset('dashboardfile/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('dashboardfile/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{URL::asset('dashboardfile/dist/js/pages/dashboard.js')}}"></script>
@yield('script-b')
<script>
    $(document).on("click", ".browse", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
</script>
</body>
</html>

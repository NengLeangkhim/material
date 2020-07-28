

@include('hrms.recruitment_user.layout.re_header')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div id="modal"></div>
    <div class="wrapper">
        @include('hrms.recruitment_user.main_app_manu.right_navbar')
        @include('hrms.recruitment_user.main_app_manu.left_manu')

        <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
            @yield('content_user')
            <h1>hello user dashboard 2</h1>
        </div><!-- end Content Wrapper. Contains page content -->

        <footer class="main-footer">
            <strong>Copyright &copy;2020-<?php echo date("Y"); ?> <a href="https://turbotech.com">TURBOTECH CO.,LTD</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 2.0.1
            </div>
        </footer>
                <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
    </div>  
@include('hrms.recruitment_user.layout.re_footer') 
</body>

</html>

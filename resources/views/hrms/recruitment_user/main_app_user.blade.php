




    @php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    @endphp
    
    @if(isset($_SESSION['user_id']))
            @php
                $r = $_SESSION['user_id'];
            @endphp
    @else
        <script>window.location = "/hrm_recruitment_login";</script>
        {{ exit() }}
    @endif




@include('hrms.recruitment_user.layout.re_header')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div id="modal"></div>
    <div class="wrapper">
        @include('hrms.recruitment_user.main_app_manu.right_navbar')
        @include('hrms.recruitment_user.main_app_manu.left_manu')
        <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
            @yield('content_user')
            @include('hrms.recruitment_user.homepage_user')
        </div><!-- end Content Wrapper. Contains page content -->

        <footer class="main-footer" style="padding: 5px;">
            <strong>Copyright &copy;<?php echo date("Y"); ?> <a href="https://turbotech.com">TURBOTECH CO.,LTD</a>.</strong>
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

{{-- >>======get value from controller to alert user submit answer success --}}


<script>
    if ( window.history.replaceState ) {
            // window.history.replaceState( null, null, window.location);
            window.history.replaceState( null, null, 'hrm_recruitment_MainApp');
    }
</script>







<?php
    $x = -1;
    if(isset($data_success)){
        $x = $data_success;
    }
    if(isset($data_faile)){
        $x = $data_faile;
    }
?>

<script type="text/javascript">
    var p = {!! json_encode($x) !!};
    if(p == 1){
        $.notify("Answer submit successfully !", "success");
    }
    if(p == 0){
        $.notify("Failed to submit answer !", "error");
    }
</script>

{{-- >>====end alert --}}



@include('layout.header')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @include('menu.right_navbar')
        @include('menu.left_menu')  

        <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
           
            @yield('content')

        </div><!-- end Content Wrapper. Contains page content -->

        @include('layout.footer')
    </div>   <!-- end wrapper -->
</body>
</html>
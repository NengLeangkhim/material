<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Master Layout</title>

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="icon" href="img/icon.png">
  <title>Turbotech System DEV</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
{{-- STOCK --}}
  <link rel="stylesheet" type="text/css" href="css/STOCK.css">
{{-- STOCK --}}
{{-- E-Requests --}}
<link rel="stylesheet" type="text/css" href="css/e_request/style.css">
<link rel="stylesheet" type="text/css" href="css/e_request/styles.css">
{{-- E-Requests --}}
{{--  mainapp custome --}}
<link rel="stylesheet" type="text/css" href="css/custom.css">
{{--  mainapp custome --}}
<!-- Select2 -->
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
{{-- datetime picker --}}
<link href="plugins/DateStyle/bootstrap-datetimepicker.css" rel="stylesheet">
<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap-glyphicons.css">

<!-- hrm style -->
    <link rel="stylesheet" href="css/hrm/hrm.css">
    <link rel="stylesheet" href="recruitment_user_style/css/mystyle_owner.css">

    @stack('css')
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js" ></script>

    <script src="plugins/jquery/jquery.doubleScroll.js" ></script>

    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>$('#sampleTable').DataTable()</script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="dist/js/demo.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Alert Sweetalert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- PAGE SCRIPTS -->

    {{-- STOCK --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <script src="dist/js/pages/dashboard2.js"></script>
    <script src="stJS/js_Expoert_excel_PDF/xlsx.js"></script>
    <script src="stJS/js_Expoert_excel_PDF/FileSaver.js"></script>
    <script src="stJS/js_Expoert_excel_PDF/jhxlsx.js"></script>
    <script src="stJS/ajax.js"></script>
    <script src="stJS/ajaxs.js"></script>
    <script src="stJS/ajaxoldReport.js"></script>
    <script src="stJS/msedge.js"></script>
    {{-- STOCK --}}

    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>

    {{-- datetime picker --}}
    <script src="plugins/DateStyle/analytics.js"></script>
    <script src="plugins/DateStyle/moment-with-locales.js"></script>
    <script src="plugins/DateStyle/bootstrap-datetimepicker.js"></script>
    <!-- My js -->
    <script src="js/myjs.js"></script>
    <script src="js/e_request/addRow.js"></script>
    <script src="js/e_request/getvalues.js"></script>

    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js" ></script>
    <script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>

</head>
<body>

    @include('menu.right_navbar')

    @include('setting.left_menu')

    <div class="content-wrapper">
        @yield('content')
    </div>
</body>

</html>

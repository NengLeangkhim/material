@php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
      // dump($_SESSION['module']);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="icon" href="img/icon.png">
  <title>TURBOTECH</title>

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
  <!-- Icheck Bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  {{-- style chart JS --}}
  <link href="plugins/chart.js/Chart.min.css" rel="stylesheet">

  <link rel="stylesheet" href="css/font_size.css">

{{-- ===========Name Style Of Each Project================== --}}

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
    <link href='fullcalendar-5.3.0/lib/main.min.css' rel='stylesheet' /> <!-- hrm Calendar -->
 {{-- end hrm style --}}

{{-- Style for CRM --}}
    <link rel="stylesheet" href="css/crm/crm.css">
{{-- End style CRM       --}}

{{-- Style for BSC --}}
<link rel="stylesheet" href="css/bsc/bsc.css">
{{-- End style BSC  --}}

  <!-- fullCalendar -->
  <link rel="stylesheet" href="plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar-bootstrap/main.min.css">
</head>


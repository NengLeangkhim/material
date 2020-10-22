



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
<script src="plugins/chart.js/Chart.js"></script>
<script src="plugins/chart.js/Chart.bundle.js"></script>
<script src="plugins/chart.js/Chart.bundle.min.js"></script>


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
{{--Full Calendar--}}
<script src="fullcalendar-5.3.0/lib/main.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- My js -->
<script src="js/myjs.js"></script>
<script src="js/e_request/addRow.js"></script>
<script src="js/e_request/getvalues.js"></script>
<script>
  $(document).ready(
    function(){
      go_to('welcome');
      $('body').overlayScrollbars({
              className: 'os-theme-dark',
              sizeAutoCapable: true,
              scrollbars: {
                autoHide: '3',
                clickScrolling: true,
                // visibility : 'auto',
              }
            });
    }
  );
</script>

<!-- HRMS -->
<script src="js/hrms/hrms.js"></script>
<script src="stJS/hrms/shift_promote_js/shift_promote.js"></script>
<script src="js/hrms/hrmssambo.js"></script>
<script src="js/hrms/hrms.js"></script>
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js" ></script>

{{-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> --}}
{{-- <script src="js/canvasjs.min.js"></script> --}}


<script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>
<script src="js/notify.min.js"></script>


{{--Google Chart--}}
<script type="text/javascript" src="js/google_chart.js"></script>

{{--------------------------CRM---------------------}}
<script type="text/javascript" src="js/crm/crm.js"></script>

{{-- ---------------------bsc-------------- --}}
<script src="js/bsc/bsc.js"></script>




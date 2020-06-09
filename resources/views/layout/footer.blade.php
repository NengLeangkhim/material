
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js" ></script>

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

<!-- PAGE SCRIPTS -->

{{-- STOCK --}}
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
<script src="plugins/jquery/myjs.js"></script>

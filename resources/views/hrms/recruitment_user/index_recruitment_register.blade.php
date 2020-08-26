<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/icon.png">
    <title>Create Account</title>
    {{-- CSS file --}}
    <link rel="stylesheet" href="recruitment_user_style/css/bootstrap.css">
    <link rel="stylesheet" href="recruitment_user_style/css/bootstrap.min.css">
    <link rel="stylesheet" href="recruitment_user_style/css/fontawesome.css">
    <link rel="stylesheet" href="recruitment_user_style/css/fontawesome.min.css">
    <link rel="stylesheet" href="recruitment_user_style/css/form_designer_style.css">
    <link rel="stylesheet" href="recruitment_user_style/css/formCss.css">
    <link rel="stylesheet" href="recruitment_user_style/css/main.css">
    <link rel="stylesheet" href="recruitment_user_style/css/mystyle_owner.css">
    <link rel="stylesheet" href="recruitment_user_style/css/nova.css">
    <link rel="stylesheet" href="recruitment_user_style/css/printForm.css">
    <link rel="stylesheet" href="recruitment_user_style/css/styles1.css">
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <script src="plugins/jquery/jquery.min.js" ></script>
    <script src="plugins/jquery/jquery.doubleScroll.js" ></script>

    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>

    <style>
        h6 {
            color: blue;
          }
        body {   
                background-image: url("{{ asset('recruitment_user_style/img/interview10.png') }}");
                height: 100%; 
                background-position: center; 
                background-repeat: no-repeat;
                background-size: cover;
        }
        
        
    </style>

</head>
<body>

    <div class="container-fluid" style="" >
        <font face="Khmer OS Battambang"​>
        <!-- -----------------Start header-------------- -->
            <div class="row "  style="">
                <div class="col-lg-3 col-md-3 col-sm-3 ">  
                </div>            
            </div>
        <!-- --------------End Header-------------- -->
        <!-- -----------------Start Input Body------------- -->
            <div class="row" style="padding: 10px;">
                
                <div class="col-xl-1 col-md-1 col ">
                    <Input type="hidden" name=""> 
                </div>
                <div class=" col-xl-10 col-md-10 col-sm-12 col-12  register-main">  

                        @include('hrms.recruitment_user.register_form')
                       
                </div>
                <div class="col-xl-1 col-md-1 col " >
                    <Input type="hidden" name="">
                </div>
            </div>
            <!-- ------------------End Input Body-------------- -->
        </font>
    </div>


</body>
</html>

{{-- JS file --}}
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
<script src="plugins/jquery/jquery.min.js" ></script>
<script src="js/hrms/hrms.js"></script>

<script src="stJS/hrms/shift_promote_js/shift_promote.js"></script>
<script src="js/hrms/hrmssambo.js"></script>
<script src="js/hrms/hrms.js"></script>
<script>$('input[type=file]').change(function(e) {
    $in = $(this);
    $in.next().html($in.val());  

    
}); 
</script>



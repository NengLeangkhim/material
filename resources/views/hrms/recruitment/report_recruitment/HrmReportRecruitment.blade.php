<!-- page content -->
<section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-chart-pie"></i> Recruitment Report</strong></h1>
                 <div class="col-md-12 text-right">

                 </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                    <div class="col-md-12" style="padding-top:5px;">
                        <div class="row report_recruitment">
                            <div class="col-12">
                                <div class="row" style="margin-top:1%">
                                    <p class="word-tbody col-1 text-center">From</p>
                                    <input type="date" name="" id="recruitment_from" class="form-control col-3" value="<?php echo date('Y-m-d')?>" onchange="hrm_recruitment_get_report_val(this.value,document.getElementById('recruitment_to').value)">
                                    <p class="word-tbody col-1 text-center">To</p>
                                    <input type="date" name="" id="recruitment_to" class="form-control col-3" value="<?php echo date('Y-m-d')?>" onchange="hrm_recruitment_get_report_val(document.getElementById('recruitment_from').value,this.value)">
                                </div><br>
                            </div>
                            <div class="col-12" style="padding-top:10px;">
                                <div id="hrm-recruitment-chart-area" style="width:700px;height:350px;"></div>
                            </div>
                            <div class="col-12 text-left" style="padding-top:10px">
                                <input type="button" onclick="get_report_cv_detail('all',document.getElementById('recruitment_from').value,document.getElementById('recruitment_to').value)" style="font-family: khmer UI;font-size:15px" id="re_all" class="btn btn-primary btn-lg" >
                                <input type="button" onclick="get_report_cv_detail('new',document.getElementById('recruitment_from').value,document.getElementById('recruitment_to').value)"  style="font-family: khmer UI;font-size:15px" id="re_new" class="btn bg-info btn-lg"/>
                                <input type="button" onclick="get_report_cv_detail('taken',document.getElementById('recruitment_from').value,document.getElementById('recruitment_to').value)"  style="font-family: khmer UI;font-size:15px" id="re_taken" class="btn bg-secondary btn-lg"/>
                                <input type="button" onclick="get_report_recruitment_detail('approve',document.getElementById('recruitment_from').value,document.getElementById('recruitment_to').value)" style="font-family: khmer UI;font-size:15px" id="re_app" class="btn btn-success btn-lg" >
                                <input type="button" onclick="get_report_recruitment_detail('pending',document.getElementById('recruitment_from').value,document.getElementById('recruitment_to').value)" style="font-family: khmer UI;font-size:15px" id="re_pen" class="btn btn-warning btn-lg" >
                                <input type="button" onclick="get_report_recruitment_detail('reject',document.getElementById('recruitment_from').value,document.getElementById('recruitment_to').value)" style="font-family: khmer UI;font-size:15px" id="re_rej" class="btn btn-danger btn-lg" >
                            </div>
                            <div class="col-12" style="padding-top:10px">
                                <div class="table-responsive" id="hrm_recruitment_report_table">
                                </div>
                            </div>
                        </div> <!-- END div report-->
                    </div><!-- END Col-md -->
               </div>
               <!-- /.card-body -->

             <!-- /.card -->
     </div>
 </div>
</section>
    <script>
          var e_from= $('#recruitment_from').val();
          var e_to = $('#recruitment_to').val();
          hrm_recruitment_get_report_val(e_from,e_to);
    </script>
    <div id="modal_report_recruitment">
    </div>
    <div id='ShowModalCandidate'></div>

 <!-- page content -->
 <section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-id-card-alt"></i> Performance Plan and Detail</strong></h1>
                 <div class="col-md-12 text-right">
                     {{-- <button type="button" id="HrmAddPerformPlan" onclick="HrmAddPerformPlan()" class="btn bg-gradient-primary"><i class="fas fa-plus"></i> Add Plan</button> --}}
                     {!!$add_perm!!}
                 </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                    <div class="nav-tab">
                        <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="myTab_plan" role="tablist">
                                <li class="nav-item">
                                <a class="nav-link active" id="active_plan" data-toggle="tab" onclick="view_table_plan()" href="javascript:void(0);">Plan</a>
                                </li>
                                {{-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" onclick="view_table_plan_detail()" href="javascript:void(0);">Plan Detail</a>
                                </li> --}}
                            </ul>
                    </div>
                    <div class="table-responsive" id="table_show_plan" style="padding-top:10px;">
                        
                    </div>
               </div>
               <!-- /.card-body -->
               
             <!-- /.card -->
     </div>
 </div>
    </section>
 <div id='ShowModalPlan'></div>
   <script>
    $(document).ready(function(){
        view_table_plan();
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
    
            localStorage.setItem('activeTab', $('#active_plan').attr('onclick'));
    
        });
    
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#active_plan').tab('show');
        }
    });
    </script>
 <!-- modal -->
 <form id="hrm_perform_plan_form">
 <div class="modal fade show" id="hrm_perform_plan_modal" tabindex="-1" role="dialog" aria-labelledby="hrm_perform_plan_modal" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="card card-default">
           <div class="card-header">
               <h3 class="card-title hrm-title"><strong><i class="fas fa-plus"></i></strong></h3>
               <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">Add Plan</h2>
               <div class="card-tools">
                 <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                 <button type="button" class="btn btn-tool" data-dismiss="modal" aria-label="Close">
                  <i class="fas fa-times"></i>
                </button>
               </div>
           </div><!-- /.card-header -->
           <div class="card-body" style="display: block;">
                <div class="alert alert-danger print-error-msg" style="display:none"> {{-- div for show error --}}
                   <ul></ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="plan_name">Plan Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="plan_name" aria-describedby="plan_name" placeholder="" name="plan_name">
                            <span class="invalid-feedback" role="alert" id="plan_nameError"> {{--span for alert--}}
                              <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="plan_from">Date From<span class="text-danger">*</span></label>
                        <input type="text" name="plan_from" id="plan_from" placeholder="Please Select Date" class="form-control">
                        <span class="invalid-feedback" role="alert" id="plan_fromError"> {{--span for alert--}}
                          <strong></strong>
                        </span>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="plan_to">Date To<span class="text-danger">*</span></label>
                        <input type="text" name="plan_to" id="plan_to" placeholder="Please Select Date" class="form-control">
                        <span class="invalid-feedback" role="alert" id="plan_toError"> {{--span for alert--}}
                          <strong></strong>
                        </span>
                    </div>
                    </div>
                </div>  {{-- END ROW--}}
                <div class="row text-right">
                   <div class="col-md-12 text-right">
                     <input type="hidden" name="plan_id" id="plan_id"/>
                     <button type="submit" onclick='HrmSubmitPerformPlan()' name="action_plan" id="action_plan"  class="btn btn-primary">Create</button>
                   </div>
                </div>
           </div><!-- /.END card-body -->
         </div><!-- /.END card-Default -->
       </div>
     </div>
   </div>
 </form>
   <!-- end modal -->
   <script>
    $(function () {
    $('#plan_from').datetimepicker({
      format: 'YYYY-MM-D HH:mm',
      sideBySide: true,
    });
    $('#plan_to').datetimepicker({
      format: 'YYYY-MM-D HH:mm',
      sideBySide: true,
    });
  });
</script>
 <!-- modal -->
 <form id="hrm_perform_schedule_form">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <div class="modal fade show" id="hrm_perform_schedule_modal" tabindex="-1" role="dialog" aria-labelledby="QuestionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title hrm-title"><strong><i class="far fa-calendar-plus"></i></strong> </h3>
                     <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title_schedule"> Add Schedule</h2>
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
                       <div class="container-fluid">
                           <div class="row">
                               <div class="col-md-12">
                                   <h5>Performance Plan</h5>
                                   <hr style="border: 1px solid">
                               </div>
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label for="plan_name">Plan Name<span class="text-danger">*</span></label>
                                       <select name="plan_schedule" required id="plan_schedule" onchange="get_plan_schedule(this.value)" class="form-control plan_schedule select2">
                                           <option value="0">Please Select Plan</option>
                                           <?php 
                                                   foreach($plan as $row_plan ){ 
                                                   echo "<option   value=".$row_plan->id.">$row_plan->name</option>";
                                                   }
                                           ?>  
                                       </select>
                                       <span class="invalid-feedback" role="alert" id="plan_scheduleError"> {{--span for alert--}}
                                           <strong></strong>
                                       </span>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="plan_from_schedule">Date From<span class="text-danger"></span></label>
                                       <input type="text" disabled id="plan_from_schedule" class="form-control">
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="plan_to_schedule">Date To<span class="text-danger"></span></label>
                                       <input type="text" disabled id="plan_to_schedule" class="form-control">
                                   </div>
                               </div>
                               <div class="col-md-12">
                                <hr>
                               </div>    
                           </div><!-- End Row -->
                           <div class="row" id="schedule_plan_detail">
                              <!-- Get from view_combobox_plan_detail.php -->
                           </div><!-- End schedule_plan_detail -->
                           <div class="row">
                               <div class="col-md-12">
                                   <h5>Performance Schedule</h5>
                                   <hr style="border: 1px solid">
                               </div>
                               <div class="col-md-12">
                                   <label for="staff_schedule">Staff Name<span class="text-danger">*</span></label>
                                   <select name="staff_schedule" required id="staff_schedule" class="form-control select2">
                                       <option value="">Please Select Staff</option>
                                       <?php 
                                               foreach($staff as $row_staff ){ 
                                                   $get_full_en_name = $row_staff->first_name_en." ".$row_staff->last_name_en;  
                                                   echo "<option value='$row_staff->id'>$get_full_en_name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$row_staff->id_number</option>";
                                               }
                                       ?>  
                                   </select>
                                   <span class="invalid-feedback" role="alert" id="staff_scheduleError"> {{--span for alert--}}
                                       <strong></strong>
                                   </span>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="staff_from_schedule">Date From<span class="text-danger">*</span></label>
                                       <input type="text" name="staff_from_schedule" required id="staff_from_schedule" class="form-control">
                                       <span class="invalid-feedback" role="alert" id="staff_from_scheduleError"> {{--span for alert--}}
                                           <strong></strong>
                                       </span>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="staff_to_schedule">Date To<span class="text-danger">*</span></label>
                                       <input type="text" name="staff_to_schedule" required id="staff_to_schedule" class="form-control">
                                       <span class="invalid-feedback" role="alert" id="staff_to_scheduleError"> {{--span for alert--}}
                                           <strong></strong>
                                       </span>
                                   </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label for="staff_comment_schedule">Comment<span class="text-danger"></span></label>
                                       <textarea name="staff_comment_schedule" class="form-control" id="staff_comment_schedule" cols="3"></textarea>
                                   </div>
                               </div>
                           </div><!-- End Row -->
                       </div><!-- End container-fluid -->
                       <div class="row text-right">
                           <div class="col-md-12 text-right">
                           <input type="hidden" name="schedule_plan_id" id="schedule_plan_id"/>
                           <button type="submit" onclick="HrmSubmitPerformSchedule()"name="action_schedule_staff" id="action_schedule_staff" class="btn btn-primary">Create</button>
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
   $(function () {// set select date time
       $('#staff_from_schedule').datetimepicker({
           format: 'YYYY-MM-D HH:mm',
           sideBySide: true,
       });
       $('#staff_to_schedule').datetimepicker({
           format: 'YYYY-MM-D HH:mm',
           sideBySide: true,
       });
       
   });
       </script>
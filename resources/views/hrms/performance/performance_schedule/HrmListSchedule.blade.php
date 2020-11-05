@php
 use App\Http\Controllers\perms;  
 if (session_status() == PHP_SESSION_NONE) {
            session_start();
}  
@endphp
<style>
    .hrm_plan_tree {
      list-style-type: none;
      counter-reset: item;
      margin: 0;
      padding: 0;
    }
    
    .hrm_li_plan_tree {
      display: table;
      counter-increment: item;
      margin-bottom: 0.6em;
    }
    
    .hrm_li_plan_tree:before {
        content: counters(item, ".") ". ";
        display: table-cell;
        padding-right: 0.6em;    
    }
    
    .hrm_li_plan_tree .hrm_li_plan_tree {
        margin: 0;
    }
    
    .hrm_li_plan_tree .hrm_li_plan_tree:before {
        content: counters(item, ".") " ";
    }
    .hrm_plan_borderless td,.hrm_plan_borderless th{
        border: none;
    }
    </style>
@php
     foreach($perform_plan as $row){ 
                                $plan_name = $row->name;
                                $plan_from = $row->date_from;
                                $plan_to = $row->date_to;
                            }
@endphp
<!-- page content -->
<section class="content">
    <div style="padding:10px 10px 10px 10px">
        <div class="row">
            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title hrm-title"><strong><i class="fas fa-book-open"></i></strong></h3>
                  <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">List Schedule</h2>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <a  href="javascript:void(0);" onclick="go_to('hrm_performance_staff_schedule')" class="text-info"><i class="fa fa-arrow-left"></i> Back</a> 
                  </div>
              </div><!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                        <h5 class="font-weight-bold">Performance Plan</h5>
                        <hr style="border: 1px solid">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="plan_name">Plan Name<span class="text-danger"></span></label>
                                <input type="text" disabled class="form-control" aria-describedby="plan_name" value="<?=$plan_name?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plan_from">Date From<span class="text-danger"></span></label>
                                <input type="text" disabled value="<?=$plan_from?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plan_to">Date To<span class="text-danger"></span></label>
                                <input type="text" disabled value="<?=$plan_to?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                             <hr style="border: 1px solid">
                        </div>
                        <div class="col-md-12">
                          <h5 class="font-weight-bold">Performance Schedule Plan Detail</h5>
                          <hr>
                        </div>
                        <div class="col-md-12">
                        <?php 
                                $sch = $schedule;
                                $output = array();
                                foreach($perform_plan_detail as $row){ 
                                $output[$row->id] = array('id' => $row->id,'parent_id' => $row->parent_id, 'name' => $row->name,'date_from'=>$row->date_from,'date_to'=>$row->date_to,'plan_id'=>$row->hr_performance_plan_id);
                                }
                                // Function Set Plan to List ordered like tree
                                function createTreeView($array, $currentParent,$schedule_list, $currLevel = 0, $prevLevel = -1) {

                                    foreach ($array as $planId => $plan) {

                                    if ($currentParent == $plan['parent_id']) {                       
                                        if ($currLevel > $prevLevel) echo " <ol class='hrm_plan_tree'> "; 

                                        if ($currLevel == $prevLevel) echo " </li> ";

                                        echo '<li class="hrm_li_plan_tree">
                                                <table class="table hrm_plan_borderless">
                                                    <tr>
                                                        <td class="align-text-bottom text-uppercase font-weight-bold">
                                                            '.$plan['name'].'
                                                        </td>

                                                        <td class="align-text-bottom">
                                                            '.$plan['date_from'].' to '.$plan['date_to'].'
                                                        </td>
                                                    </tr>';
                                                foreach($schedule_list as $key => $value) {
                                                    if($value->hr_performance_plan_detail_id==$plan['id']){
                                                        echo '<tr>
                                                                <td class="align-text-bottom text-right font-weight-bold">
                                                                    Assign To:
                                                                </td>
                                                                <td class="align-text-bottom text-left">
                                                                    '.$value->staff_name.'&nbsp&nbsp&nbsp <b> Date: </b> '.$value->date_from.' To '.$value->date_to.'
                                                                </td>
                                                                <td class="align-text-bottom">
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Action
                                                                        </button>
                                                                        <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">';
                                                                            if(perms::check_perm_module('HRM_09070103')){// Permission View
                                                                            echo '<button type="button" id="'.$value->id.'" class="dropdown-item hrm_item hrm_view_perform_schedule">View</button>';
                                                                            }
                                                                            if(perms::check_perm_module('HRM_09070102')){// Permission Update
                                                                                echo '<button type="button" id="'.$value->id.'" onclick=\'hrm_update_perform_schedule('.$value->id.','.$value->hr_performance_plan_id.')\' class="dropdown-item hrm_item hrm_update_perform_schedule">Update</button>';
                                                                            }
                                                                            if(perms::check_perm_module('HRM_09070201')){// Permission Add Staff Follow Up
                                                                                if($value->ma_user_id == $_SESSION['userid']){ //can add follow up only by ur schedule
                                                                                    if(is_null($value->deleted) || $value->deleted=='t'){// check condition if the schedule already manager follow up so the users can't follow up anymore
                                                                                    echo '<button type="button" id="'.$value->id.'" onclick=\'go_to("/hrm_performance_follow_up/modal/action?add='.$value->id.'")\' class="dropdown-item hrm_item hrm_add_perform_follow_up">Add Follow Up</button>';
                                                                                    }
                                                                                }
                                                                            }
                                                                 echo  '</div>
                                                                    </div>
                                                                </td>
                                                            </tr>';
                                                    }
                                                }
                                                    
                                        echo     '</table>';

                                        if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }

                                        $currLevel++; 

                                        createTreeView ($array, $planId,$schedule_list,$currLevel, $prevLevel);

                                        $currLevel--;               
                                        }   

                                    }
                                    if ($currLevel == $prevLevel) echo " </li>  </ol> ";

                                }   
                                createTreeView($output, 0,$sch); // Run Function Show                     
                                ?>
                        </div>
                    </div><!-- End Row -->
                </div><!-- End container-fluid -->
              </div><!-- /.END card-body -->
            </div><!-- /.END card-Default -->
          </div>
        </div>
</section>
<div id="modal_for_view_schedule"></div>
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
                                           <option value="">Please Select Plan</option>
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
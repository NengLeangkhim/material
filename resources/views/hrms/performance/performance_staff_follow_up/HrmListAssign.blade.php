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
                    <a  href="javascript:void(0);" onclick="go_to('hrm_performance_follow_up')" class="text-info"><i class="fa fa-arrow-left"></i> Back</a> 
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
                                                                    <a href="javascript:void(0);" id="'.$value->id.'" title="Detail Follow Up" onclick=\'go_to("/hrm_performance_follow_up/list?id='.$value->id.'")\' class="btn btn-info"><i class="fas fa-list"></i></a>';
                                                                          
                                                            echo  '
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
        <div id='ShowModalPlan'></div>
</section>
<div id="modal_for_view_schedule"></div>
@php
    foreach($policy_user as $row){
            $id_user = $row->id_number;
            $name_user = $row->name;
            $name_policy = $row->name_policy;
            $start_time = $row->start_time;
            $end_time = $row->end_time;
            $position = $row->position_name;
        }
        $ts1 = new DateTime($start_time);
        $ts2 = new DateTime($end_time);  
        $interval = $ts1->diff($ts2);
@endphp
<!-- modal -->
    <div class="modal fade show" id="hrm_view_policy_user_modal" tabindex="-1" role="dialog" aria-labelledby="Policy_View" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title hrm-title"><strong><i class="fas fa-book-open"></i></strong></h3>
                  <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">Read Policy</h2>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
                  </div>
              </div><!-- /.card-header -->
              <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-6" style="text-align:center">
                            <span class="text-center" style="font-size:15px;color:#d42931;font-weight:bold;">ID:</span>
                            <p style="display:inline;color:black;" id="id_condidate"><?=$id_user?></p>
                        </div>
                        <div class="col-6"  style="text-align:center">
                            <span class="text-center" style="font-size:15px;color:#d42931;font-weight:bold;">Time:</span>
                            <p style="display:inline;color:black" id="register_date"><?=$interval->format('%H h %i mn %s sec')?></p>
                        </div>
                        <div class="col-12">
                            <hr style="border:1px solid">
                        </div>
                    </div><!-- End Row -->
                    <div class="row" style="height:70px">
                        <div class="col-6" style="text-align:center">
                            <span class="text-center" style="font-size:15px;color:#d42931;float:left">Name:</span>
                            <p style="display:inline;color:black;" id="fname"><?=$name_user?></p>
                        </div>
                        <div class="col-6"  style="text-align:center">
                            <span class="text-center" style="font-size:15px;color:#d42931;float:left">Name Policy:</span>
                            <p style="display:inline;color:black;" id="lname"><?=$name_policy?></p>
                        </div>
                        </div><!-- End Row -->
                    <div class="row" style="height:70px">
                        <div class="col-6" style="text-align:center;width:50px;">
                            <span class="text-center" style="font-size:15px;color:#d42931;float:left">Position:</span>
                            <p style="display:inline;color:black;font-family: Khmer UI;width:50px;" id="name_kh"><?=$position?></p>
                        </div>
                        <div class="col-6"  style="text-align:center">
                            <span class="text-center" style="font-size:15px;color:#d42931;float:left">Create Date:</span>
                            <p style="display:inline;color:black;" id="position"><?=$ts2->format('Y-m-d H:i:s')?></p>
                        </div>
                    </div><!-- End Row -->
                    <div class="row text-right">
                      <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </div>
              </div><!-- /.END card-body -->
            </div><!-- /.END card-Default -->
          </div>
        </div>
      </div>
      <!-- end modal -->
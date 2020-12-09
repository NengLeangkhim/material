<div class="modal fade show" id="modal_missionoutside" style="display: block; padding-right: 17px;" aria-modal="true" data-backdrop="static">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong><i class="fas fa-calendar-plus"></i> Add Mission</strong></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            <form id="fm_missionoutside" onsubmit="return false">
              @csrf
              <div class="row">
                <input type="hidden" name="id" value="@php if(isset($data[1])){echo $data[1]['id'];} @endphp">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Type <span class="text-danger">*</span></label>
                    <select name="type" id="" class="form-control">
                      @php
                        if(isset($data[1])){
                          if($data[1]['type']=='Outside'){
                            echo '<option value="Outside">Outside</option>
                                <option value="Mission">Mission</option>
                                <option value="Missed Scan">Missed Scan</option>
                                <option value="Other">Other</option>
                              ';
                          }elseif ($data[1]['type']=='Mission') {
                            echo '
                                <option value="Mission">Mission</option>
                                
                                <option value="Missed Scan">Missed Scan</option>
                                <option value="Other">Other</option>
                              ';
                          }elseif ($data[1]['type']=='Missed Scan') {
                            echo '
                                <option value="Missed Scan">Missed Scan</option>
                                <option value="Mission">Mission</option>
                                
                                <option value="Other">Other</option>
                              ';
                          }else {
                            echo '
                                <option value="Other">Other</option>
                                <option value="Missed Scan">Missed Scan</option>
                                <option value="Mission">Mission</option>
                                
                                
                              ';
                          }

                        }else {
                          echo '
                                <option value="Mission">Mission</option>
                                <option value="Missed Scan">Missed Scan</option>
                                <option value="Other">Other</option>
                              ';
                        }
                      @endphp
                      
                    </select>
                    <label id="type" class="text-danger d-none">type is required *</label>
                  </div>
                  <div class="form-group">
                    <label>Staff <span class="text-danger">*</span></label>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-bordered table-striped mb-0" id="tbl_mission">
                      <thead>
                        <tr>
                          <th>ID Number</th>
                          <th>Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody required>
                        @php 
                          $i=0;
                          foreach ($data[0] as $em) {
                            if(isset($data[1])){
                              $check=0;
                              foreach ($data[1]['employee_mission'] as $emmission) {
                                if($emmission->ma_user_id==$em->id){
                                  $check++;
                                }
                              }
                              if($check>0){
                                $ch="checked";
                              }else {
                                $ch="";
                              }
                              echo '<tr>
                                  <th>'.$em->id_number.'</th>
                                  <td>'.$em->firstName.' '.$em->lastName.'</td>
                                  <th class="text-right"><input type="checkbox" name="missioncheck['.$i++.']" id="" value="'.$em->id.'" '.$ch.'></th>
                                </tr>';
                            }else {
                              echo '<tr>
                                  <th>'.$em->id_number.'</th>
                                  <td>'.$em->firstName.' '.$em->lastName.'</td>
                                  <th class="text-right"><input type="checkbox" name="missioncheck['.$i++.']" id="" value="'.$em->id.'"></th>
                                </tr>';
                            }
                            
                          }
                        @endphp
                        
                      </tbody>
                    </table>
                    </div>
                    <label id="missioncheck" class="text-danger d-none">employee must be select *</label>
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Street</label>
                    <input type="text" class="form-control" name="street" value="{{$data[1]['street'] ?? ''}}">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Home Number</label>
                    <input type="text" class="form-control" name="home_number" value="{{$data[1]['home_number'] ?? ''}}">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Late Long <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="latelong" value="{{$data[1]['latlg'] ?? ''}}">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Gazetteers Code</label>
                    <input type="text" class="form-control" name="gazetteers_code" value="{{$data[1]['gazetteers_code'] ?? ''}}">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>From Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="from_date" value="{{date('m/d/Y', strtotime($data[1]['date_from'] ?? date('m/d/Y')))}}" required>
                    <label id="from_date" class="text-danger d-none">from date is required *</label>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>To Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="to_date" value="{{date('m/d/Y', strtotime($data[1]['date_to'] ?? date('m/d/Y')))}}" required>
                    <label id="to_date" class="text-danger d-none">to date is required *</label>
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Shift <span class="text-danger">*</span></label>
                    <select name="shift" id="" class="form-control">
                      @php 
                        if(isset($data[1])){
                            if($data[1]['shift']=='am'){
                              echo '
                                <option value="am">AM</option>
                                <option value="pm">PM</option>
                                <option value="full">Full</option>
                              ';
                            }elseif ($data[1]['shift']=='pm') {
                              echo '
                                <option value="pm">PM</option>
                                <option value="am">AM</option>
                                <option value="full">Full</option>
                              ';
                            }elseif ($data[1]['shift']=='full') {
                              echo '
                                <option value="full">Full</option>
                                <option value="pm">PM</option>
                                <option value="am">AM</option>
                              ';
                            }
                        }else {
                          echo '
                                <option value="am">AM</option>
                                <option value="pm">PM</option>
                                <option value="full">Full</option>
                              ';
                        }
                      @endphp
                      
                    </select>
                    <label id="shift" class="text-danger d-none">shift is required</label>
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="" rows="5" class="form-control">{{$data[1]['description'] ?? ''}}</textarea>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-12 text-right">
                  <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  <button class="btn bg-turbo-color" onclick="hrms_insert_update_mission()">Save</button>
                </div>
              </div>
            </form>
            <!-- /.row --> 
          </div>
          
          <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>

<script>
    
  </script>
<div class="modal fade show" id="modal_missionoutside" style="display: block; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong><i class="fas fa-calendar-plus"></i> Add Mission or Outside</strong></h3>

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
                <input type="hidden" name="id" value="@php if(isset($data[1])){echo $data[1][0]->id;} @endphp">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Type <span class="text-danger">*</span></label>
                    <select name="type" id="" class="form-control">
                      @php
                        if(isset($data[1])){
                          if($data[1][0]->type=='Outside'){
                            echo '<option value="Outside">Outside</option>
                                <option value="Mission">Mission</option>
                                <option value="Missed Scan">Missed Scan</option>
                                <option value="Other">Other</option>
                              ';
                          }elseif ($data[1][0]->type=='Mission') {
                            echo '
                                <option value="Mission">Mission</option>
                                <option value="Outside">Outside</option>
                                <option value="Missed Scan">Missed Scan</option>
                                <option value="Other">Other</option>
                              ';
                          }elseif ($data[1][0]->type=='Missed Scan') {
                            echo '
                                <option value="Missed Scan">Missed Scan</option>
                                <option value="Mission">Mission</option>
                                <option value="Outside">Outside</option>
                                <option value="Other">Other</option>
                              ';
                          }else {
                            echo '
                                <option value="Other">Other</option>
                                <option value="Missed Scan">Missed Scan</option>
                                <option value="Mission">Mission</option>
                                <option value="Outside">Outside</option>
                                
                              ';
                          }

                        }else {
                          echo '<option value="Outside">Outside</option>
                                <option value="Mission">Mission</option>
                                <option value="Missed Scan">Missed Scan</option>
                                <option value="Other">Other</option>
                              ';
                        }
                      @endphp
                      
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Staff <span class="text-danger">*</span></label>
                    <select name="staff" id="" class="form-control">
                      @php
                        $f1='';
                        $f2='';
                        foreach ($data[0] as $em) {
                          if(isset($data[1])){
                            if($data[1][0]->id_number==$em->id_number){
                              $f1=$f1.'<option value="'.$em->id_number.'">'.$em->name.'</option>';
                            }else {
                              $f2=$f2.'<option value="'.$em->id_number.'">'.$em->name.'</option>';
                            }
                          }else {
                            $f1=$f1.'<option value="'.$em->id_number.'">'.$em->name.'</option>';
                          }
                        }
                        echo $f1.$f2;
                      @endphp
                      // @foreach ($data[0] as $em)
                          
                      //     <option value="{{$em->id_number}}">{{$em->name}}</option>
                      // @endforeach
                    </select>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Location <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="location" value="@php if(isset($data[1])){echo $data[1][0]->location;} @endphp">
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>From Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="from_date" value="@php if(isset($data[1])){echo $data[1][0]->date_from;} @endphp">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>To Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="to_date" value="@php if(isset($data[1])){echo $data[1][0]->date_to;} @endphp">
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Shift <span class="text-danger">*</span></label>
                    <select name="shift" id="" class="form-control">
                      @php 
                        if(isset($data[1])){
                            if($data[1][0]->shift=='am'){
                              echo '
                                <option value="am">AM</option>
                                <option value="pm">PM</option>
                                <option value="full">Full</option>
                              ';
                            }elseif ($data[1][0]->shift=='pm') {
                              echo '
                                <option value="pm">PM</option>
                                <option value="am">AM</option>
                                <option value="full">Full</option>
                              ';
                            }elseif ($data[1][0]->shift=='full') {
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
                                <option value="other">Other</option>
                              ';
                        }
                      @endphp
                      
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="" rows="5" class="form-control">@php if(isset($data[1])){echo $data[1][0]->description;} @endphp</textarea>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-12 text-right">
                  <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  <button class="btn bg-turbo-color" data-dismiss="modal" onclick="submit_form ('hrm_insertmissionoutside','fm_missionoutside','hrm_mission_outside')">Save</button>
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
    var type=@php if(isset($data[1])){echo $data[1][0]->type;} @endphp;
    console.log(type);
  </script>
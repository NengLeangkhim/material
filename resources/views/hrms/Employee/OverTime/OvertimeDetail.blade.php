<div class="col-md-12"> 
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">Overtime Employee</span></span>
                          <span class="info-box-number">@php
                              print_r($ot[1][0]->count);
                        
                          @endphp</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>

                      <div class="col-md-6 col-sm-6 col-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-info"><i class="fas fa-user-clock"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">Overtime Hours</span>
                            <span class="info-box-number">@php
                                print_r($ot[2]);
                            @endphp</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>



                    </div>

                </div>


                


                <table class="table table-bordered" id="tbl_overtime" style="width: 100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>OT Date</th>
                      <th>Start Time</th>
                      <th>End Time</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($ot[0] as $item)
                      <tr>
                      <th>{{++$i}}</th>
                        <td>{{$item->full_en_name}}</td>
                        <td>{{$item->overtime_date}}</td>
                        <td>{{$item->start_time}}</td>
                        <td>{{$item->end_time}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                          <div class="row">
                            <div class="col-md-4"><a href="javascript:;" onclick="hrms_modal_overtime({{$item->id}})"><i class="far fa-edit"></i></a></div>
                            {{-- <div class="col-md-4"><a href="javascrip:;"><i class="fas fa-info"></i></a></div> --}}
                            <div class="col-md-4"><a href="javascript:;" onclick="hrm_delete({{$item->id}},'hrm_delete_overtime','hrm_overtime','Overtime Delete Successfully')"><i class="far fa-trash-alt"></i></a></div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
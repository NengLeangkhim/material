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
                      <th>OT Hours</th>
                      <th>Description</th>
                      <th>Approve By</th>
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
                        <td>{{$item->otname}}</td>
                        <td>{{$item->overtime_date}}</td>
                        <td>{{$item->hour}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->approve}}</td>
                        <td>
                          <div class="row">
                            <div class="col-md-4"><a href="javascrip:;" onclick="HRM_ShowDetail('hrm_modal_add_edit','modal_overtime',{{$item->id}})"><i class="far fa-edit"></i></a></div>
                            {{-- <div class="col-md-4"><a href="javascrip:;"><i class="fas fa-info"></i></a></div> --}}
                            <div class="col-md-4"><a href="javascrip:;" onclick="hrm_delete({{$item->id}},'hrm_delete_overtime','hrm_overtime','Overtime Delete Successfully')"><i class="far fa-trash-alt"></i></a></div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
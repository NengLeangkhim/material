<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong> Warning and Punishment</strong></h1>
                <div class="col-md-12 text-right">
                    
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-12">
                  <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#all" role="tab" aria-controls="home" aria-selected="false">Warning & Punishment</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#trained" role="tab" aria-controls="profile" aria-selected="true">Warning & Punishment Type</a>
                      </li>
                   </ul>
                   <div class="tab-content" id="myTabContent">    
                        <div class="tab-pane fade active show" id="all" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-body"> 
                              <div class="col-md-12">
                                
                                <div class="row">
                                  <div class="col-md-12 text-right" style="margin-bottom: 10px">
                                    <a href="javascript:;" class="btn bg-gradient-primary" onclick="hrsm_modal_add_edit_warning_and_punishment()"><i class="fas fa-plus"></i> Add</a>

                                  </div>
                                  <div class="col-md-12" style="overflow: auto;white-space: nowrap">
                                    <table class="table table-bordered hrm_table" id="tbl_holiday" style="width: 100% ;margin-top:10px">
                                      <thead>                  
                                        <tr>
                                          <th style="width: 10px">#</th>
                                          <th>Type of Warning</th>
                                          <th>Reason of Warning</th>
                                          <th>Staff</th>
                                          <th>Date</th>
                                          <th>Warning by</th>
                                          <th>Approved By</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @php
                                            $i=0;
                                        @endphp
                                        @foreach ($warning as $warn)
                                          <tr>
                                            <th>{{ ++$i ?? '' }}</th>
                                            <td>{{ $warn->name_en ?? ''}}</td>
                                            <td>{{ $warn->warning_reason ?? ''}}</td>
                                            <td>{{$warn->staff_last_name ?? ''}} {{$warn->staff_first_name ?? ''}}</td>
                                            <td>{{ $warn->verbal_warning_date ?? ''}}</td>
                                            <td>{{ $warn->first_warning_by ?? ''}}{{$warn->last_warning_by ?? ''}}</td>
                                            <td>{{$warn->first_approve_by ?? ''}}{{$warn->last_approve_by ?? ''}}</td>
                                            <td class="text-center">
                                              <div class="row">
                                                <div class="col-md-6"><a href="javascript:;" onclick="hrsm_modal_add_edit_warning_and_punishment({{$warn->id ?? 0}})"><i class="far fa-edit"></i></a></div>
                                                <div class="col-md-6"><a href="javascript:;" onclick="hrm_delete_data({{$warn->id ?? 0}},'hrm_delete_warning_and_punishment','hrm_warning_and_punishment','Warning is deleted !!','HRM_09011002')"><i class="far fa-trash-alt"></i></a></div>
                                              </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                      </tbody>
                                    </table>
                                  </div>
                                </div>




                              </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="trained" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-body">
                               <div class="col-md-12">   
                                  


                                  <div class="row">
                                    <div class="col-md-12 text-right" style="margin-bottom: 10px">
                                      <a href="javascript:;" class="btn bg-gradient-primary" onclick="hrms_modal_add_edit_warning_and_punishment_type()"><i class="fas fa-plus"></i> Add</a>

                                    </div>
                                    <div class="col-md-12">
                                      <table class="table table-bordered hrm_table" id="tbl_warning_type" style="width: 100% ;margin-top:10px">
                                        <thead>                  
                                          <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Warning Type (en)</th>
                                            <th>Warning Type (kh)</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @php
                                              $i=0;
                                          @endphp
                                          @foreach ($warning_type as $warn_type)
                                            <tr>
                                            <th>{{ ++$i }}</th>
                                            <td>{{ $warn_type->name_en }}</td>
                                              <td>{{ $warn_type->name_kh }}</td>
                                              <td class="text-center">
                                                <div class="row">
                                                  <div class="col-md-6"><a href="javascript:;" onclick="hrms_modal_add_edit_warning_and_punishment_type({{$warn_type->id}})"><i class="far fa-edit"></i></a></div>
                                                  <div class="col-md-6"><a href="javascript:;" onclick="hrm_delete_data({{$warn_type->id}},'hrm_delete_warning_and_punishment_type','hrm_warning_and_punishment','Warning Type is Deleted ','HRM_09011004')"><i class="far fa-trash-alt"></i></a></div>
                                                </div>
                                              </td>
                                          </tr>
                                          @endforeach
                                          
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>





                                </div>
                            </div>
                        </div>
                   </div>
                </div>





                <div class="col-md-12 text-right" style="width:100%;margin-bottom:10px">
                </div>
                
                
              </div>
              <!-- /.card-body -->
              
            <!-- /.card -->
    </div>
</div>
<script>
  $(document).ready(function() {
    
    $('#tbl_holiday').DataTable({
      responsive: true
    });
    $('#tbl_warning_type').DataTable({
      responsive: true
    });
} );
</script>
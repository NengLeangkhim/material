<div style="padding:10px 10px 10px 10px">
    <div class="row">
      <div id="testt"></div>
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Training Schedule</strong></h1>
                <div class="col-md-12 text-right">
                    <a href="javascript:;" class="btn bg-turbo-color" onclick="hrms_modal_training()"><i class="fas fa-plus"></i> Add</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-12">
                  <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#all" role="tab" aria-controls="home" aria-selected="false">All</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#trained" role="tab" aria-controls="profile" aria-selected="true">Trained</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#still_not_trained" role="tab" aria-controls="profile" aria-selected="false">Not trained</a>
                      </li>
                   </ul>
                   <div class="tab-content" id="myTabContent">    
                        <div class="tab-pane fade active show" id="all" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-body"> 

                              <div class="col-md-12">
                                <table class="table table-bordered" id="tbl_training_all" style="width:100%">
                                  <thead>                  
                                    <tr>
                                      <th>#</th>
                                      <th>Traning Course</th>
                                      <th>Trainer</th>
                                      <th>Duration</th>
                                      <th>Document</th>
                                      <th>Description</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($data as $tl)
                                      <tr>
                                      <th>{{++$i}}</th>
                                      <td>{{$tl->type}}</td>
                                      <td>{{$tl->trainer}}</td>
                                      @if (Str::length($tl->actual_f_date)>0)
                                          <td>{{$tl->actual_f_date}}/{{$tl->actual_t_date}}</td>
                                      @else
                                          <td>{{$tl->schet_f_date}}/{{$tl->schet_t_date}}</td>
                                      @endif
                                      
                                        <td><a href="{{$tl->file}}" target="blank">document</a></td>
                                        <td>{{$tl->schet_description}}</td>
                                        <td>
                                          <div class="row">
                                            <div class="col-md-4"><a href="javascript:;" onclick="hrms_modal_training({{$tl->id}})"><i class="far fa-edit"></i></a></div>
                                            <div class="col-md-4"><a href="javascript:;" onclick="HRM_ShowDetail('hrm_traininglist_detail','modal_traininglist_detail',{{$tl->id}})"><i class="fas fa-info"></i></a></div>
                                            <div class="col-md-4"><a href="javascript:;" onclick="hrm_delete_data({{$tl->id}},'hrm_delete_traininglist','hrm_traininglist','Training List is Delete !','HRM_09050101')"><i class="far fa-trash-alt"></i></a></div>
                                          </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                      
                                  </tbody>
                                </table>
                            </div>





                            </div>
                        </div>
                        <div class="tab-pane fade" id="trained" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-body">
                              

                               <div class="col-md-12">
                                  <table class="table table-bordered" id="tbl_training_trained" style="width:100%">
                                    <thead>                  
                                      <tr>
                                        <th>#</th>
                                        <th>Traning Course</th>
                                        <th>Trainer</th>
                                        <th>Duration</th>
                                        <th>Document</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @php
                                          $i=0;
                                      @endphp
                                      @foreach ($data as $tl)
                                      @if (Str::length($tl->hrid)>0)
                                          <tr>
                                          <th>{{++$i}}</th>
                                          <td>{{$tl->type}}</td>
                                          <td>{{$tl->trainer}}</td>
                                          <td>{{$tl->actual_f_date}}/{{$tl->actual_t_date}}</td>
                                            <td><a href="{{$tl->file}}" target="blank">document</a></td>
                                            <td>{{$tl->schet_description}}</td>
                                            <td>
                                              <div class="row">
                                                <div class="col-md-4"><a href="javascript:;" onclick="HRM_ShowDetail('hrm_modal_traininglist','modal_traininglist',{{$tl->id}})"><i class="far fa-edit"></i></a></div>
                                                <div class="col-md-4"><a href="javascript:;" onclick="HRM_ShowDetail('hrm_traininglist_detail','modal_traininglist_detail',{{$tl->id}})"><i class="fas fa-info"></i></a></div>
                                                <div class="col-md-4"><a href="javascript:;" onclick="hrm_delete_data({{$tl->id}},'hrm_delete_traininglist','hrm_traininglist','Training List is Delete !','HRM_09050101')"><i class="far fa-trash-alt"></i></a></div>
                                              </div>
                                            </td>
                                        </tr>
                                      @endif
                                      @endforeach
                                        
                                    </tbody>
                                  </table>
                              </div>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="still_not_trained" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-body">
                                  


                             <div class="col-md-12">
                                  <table class="table table-bordered" id="tbl_training_still_not_training" style="width:100%">
                                    <thead>                  
                                      <tr>
                                        <th>#</th>
                                        <th>Traning Course</th>
                                        <th>Trainer</th>
                                        <th>Duration</th>
                                        <th>Document</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @php
                                          $i=0;
                                      @endphp
                                      @foreach ($data as $tl)
                                      @if (Str::length($tl->hrid)<=0)
                                          <tr>
                                          <th>{{++$i}}</th>
                                          <td>{{$tl->type}}</td>
                                          <td>{{$tl->trainer}}</td>
                                          <td>{{$tl->schet_f_date}}/{{$tl->schet_t_date}}</td>
                                            <td><a href="{{$tl->file}}" target="blank">document</a></td>
                                            <td>{{$tl->schet_description}}</td>
                                            <td>
                                              <div class="row">
                                                <div class="col-md-4"><a href="javascript:;" onclick="HRM_ShowDetail('hrm_modal_traininglist','modal_traininglist',{{$tl->id}})"><i class="far fa-edit"></i></a></div>
                                                <div class="col-md-4"><a href="javascript:;" onclick="HRM_ShowDetail('hrm_traininglist_detail','modal_traininglist_detail',{{$tl->id}})"><i class="fas fa-info"></i></a></div>
                                                <div class="col-md-4"><a href="javascript:;" onclick="hrm_delete_data({{$tl->id}},'hrm_delete_traininglist','hrm_traininglist','Training List is Delete !','HRM_09050101')"><i class="far fa-trash-alt"></i></a></div>
                                              </div>
                                            </td>
                                        </tr>
                                      @endif
                                      @endforeach
                                        
                                    </tbody>
                                  </table>
                              </div>

                                        



                            </div>
                        </div>
                   </div>
                </div>
              </div>
              <!-- /.card-body -->
              
            <!-- /.card -->
    </div>
</div>
<script>
  $(document).ready(function() {
    $( "table" ).each(function( index,item ) {
       $(this).DataTable();
    });
  

    $(document).ajaxStop(function(){
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
  });
} );




</script>
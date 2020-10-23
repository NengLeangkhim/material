<div style="padding:10px 10px 10px 10px">
    <div class="row">
      <div id="testt"></div>
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i>My Training</strong></h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="tbl_employee" style="width:100%">
                  <thead>                  
                    <tr>
                      <th>#</th>
                      <th>Traning Course</th>
                      <th>Trainer</th>
                      <th>Duration</th>
                      <th>Is Trained</th>
                      <th>Document</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($training as $tl)
                      <tr>
                      <th>{{++$i}}</th>
                      <td>{{$tl->type}}</td>
                      <td>{{$tl->trainer}}</td>
                      @if (Str::length($tl->actual_f_date)>0)
                          <td>{{date('d-m-Y', strtotime($tl->actual_f_date))}}/{{date('d-m-Y', strtotime($tl->actual_t_date))}}</td>
                      @else
                          <td>{{date('d-m-Y', strtotime($tl->schet_f_date))}}/{{date('d-m-Y', strtotime($tl->schet_t_date))}}</td>
                      @endif
                      <td>@php
                          if(Str::length($tl->hrid)>0){
                            echo "Yes";
                          }else {
                            echo "No";
                          }
                      @endphp</td>
                        <td><a href="{{$tl->file}}" target="blank">document</a></td>
                        <td>{{$tl->schet_description}}</td>
                        <td class="text-center">
                            <div class="col-md-4"><a href="javascript:;" class="btn" onclick="HRM_ShowDetail('hrm_traininglist_detail','modal_traininglist_detail',{{$tl->id}})"><i class="fas fa-info"></i></a></div>
                          </div>
                        </td>
                    </tr>
                    @endforeach
                      
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            <!-- /.card -->
    </div>
</div>
<script>
  $(document).ready(function() {
    $('#tbl_employee').DataTable({
      responsive: true
    });

  
} );
</script>
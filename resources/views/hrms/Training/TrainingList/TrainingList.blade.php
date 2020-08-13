<div style="padding:10px 10px 10px 10px">
    <div class="row">
      <div id="testt"></div>
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Training List</strong></h1>
                <div class="col-md-12 text-right">
                    <a href="javascript:;" class="btn bg-turbo-color" onclick="HRM_ShowDetail('hrm_modal_traininglist','modal_traininglist')"><i class="fas fa-plus"></i> Add</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @php
                    print_r($data);
                @endphp
                <table class="table table-bordered" id="tbl_employee" style="width:100%">
                  <thead>                  
                    <tr>
                      <th>#</th>
                      <th>Traning Type</th>
                      <th>Trainer</th>
                      <th>Duration</th>
                      <th>Status</th>
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
                      <td>{{$tl->schet_f_date}}</td>
                      <td>@php
                          if(Str::length($tl->hrid)>0){
                            echo "Trainted";
                          }else {
                            echo "Not Trained";
                          }
                      @endphp</td>
                        <td><a href="{{$tl->file}}" target="blank">document</a></td>
                        <td>{{$tl->schet_description}}</td>
                        <td>
                          <div class="row">
                            <div class="col-md-4"><a href="javascrip:;" onclick="HRM_ShowDetail('hrm_modal_traininglist','modal_traininglist',{{$tl->id}})"><i class="far fa-edit"></i></a></div>
                            <div class="col-md-4"><a href="javascrip:;" onclick="HRM_ShowDetail('hrm_traininglist_detail','modal_traininglist_detail',{{$tl->id}})"><i class="fas fa-info"></i></a></div>
                            <div class="col-md-4"><a href="javascrip:;" onclick="hrm_delete({{$tl->id}},'hrm_delete_traininglist','hrm_traininglist','Training List is Delete !')"><i class="far fa-trash-alt"></i></a></div>
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
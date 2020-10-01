<div style="padding:10px 10px 10px 10px">
    <div class="row">
      <div id="testt"></div>
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Trainer</strong></h1>
                <div class="col-md-12 text-right">
                    <a href="javascript:;" class="btn bg-turbo-color" onclick="HRM_ShowDetail('hrm_modal_add_edit_trainer','modal_trainer')"><i class="fas fa-plus"></i> Add</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="tbl_employee" style="width:100%">
                  <thead>              
                    <tr>
                      <th style="">#</th>
                      <th style="">Trainer</th></th>
                      <th>Telephone</th>
                      <th>Type</th>
                      <th>Decsription</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                      @php
                          $i=0;
                      @endphp
                      @foreach ($data as $trainer)
                        <tr>
                            <td>{{++$i}}</td>
                        <td>{{$trainer->name}}</td>
                        <td>{{$trainer->telephone}}</td>
                        <td>@php
                            if($trainer->type=='t'){
                                echo "Staff";
                            }else {
                                echo "Other";
                            }
                        @endphp</td>
                        <td>{{$trainer->description}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6"><a href="javascrip:;" onclick="HRM_ShowDetail('hrm_modal_add_edit_trainer','modal_trainer',{{$trainer->id}})"><i class="far fa-edit"></i></a></div>
                                    <div class="col-md-6"><a href="javascrip:;" onclick="hrm_delete_data({{$trainer->id}},'hrm_delete_trainer','hrm_trainer','Trainer Delete Successfully','HRM_090510')"><i class="far fa-trash-alt" onclick=""></i></a></div>
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
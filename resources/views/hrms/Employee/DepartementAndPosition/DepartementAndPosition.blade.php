<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="far fa-building"></i> Department</strong></h1>
                <div class="col-md-12 text-right">
                    <button type="button" class="btn bg-gradient-primary" onclick="hrms_modal_department()"><i class="fas fa-plus"></i> Add Department</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="tbl_department" style="width: 100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Khmer Name</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=0;
                        $j=0;
                    @endphp
                    @foreach ($de_po[0] as $depart)
                      <tr>
                      <th>{{++$i}}</th>
                      <td>{{$depart->name}}</td>
                        <td>{{$depart->name_kh}}</td>
                        <td>
                          <div class="row">
                            <div class="col-md-6 text-center"><a href="javascript:;" onclick="HRM_ShowDetail('hrm_modal_add_edit_department','modal_department',{{$depart->id}})"><i class="far fa-edit"></i></a></div>
                            <div class="col-md-6 text-center"><a href="javascript:;" onclick="hrm_delete_data({{$depart->id}},'hrm_delete_department','hrm_department','Department is deleted !','HRM_09010602')"><i class="far fa-trash-alt"></i></a></div>
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





          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-map-pin"></i> Position</strong></h1>
                <div class="col-md-12 text-right">
                    <button type="button" class="btn bg-gradient-primary" onclick="HRM_ShowDetail('hrm_add_modal_position','modal_position')"><i class="fas fa-plus"></i> Add Position</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id='tbl_position' style="width: 100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Khmer Name</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($de_po[1] as $position)
                      <tr>
                        <th>{{++$j}}</th>
                        <td>{{$position->name}}</td>
                        <td>{{$position->name_kh}}</td>
                        <td>
                          <div class="row">
                            <div class="col-md-6"><a href="javascript:;" onclick="HRM_ShowDetail('hrm_add_modal_position','modal_position',{{$position->id}})"><i class="far fa-edit"></i></a></div>
                            <div class="col-md-6"><a href="javascript:;" onclick="hrm_delete_data({{$position->id}},'hrm_delete_position','hrm_department','Position is deleted !','HRM_09010604')"><i class="far fa-trash-alt"></i></a></div>
                          </div></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            <!-- /.card -->
            </div>
          </div>





      </div>
</div>
<script>
  $(document).ready(function() {
    $('#tbl_department').DataTable({
      responsive: true,
      "lengthChange": false,
      "bInfo": false
    });
     $('#tbl_position').DataTable({
      responsive: true,
      "lengthChange": false,
      "bInfo": false
    });
} );
</script>
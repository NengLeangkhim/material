<div style="padding:10px 10px 10px 10px">
    <div class="row">
      <div id="testt"></div>
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Training Type</strong></h1>
                <div class="col-md-12 text-right">
                    <a href="javascript:;" class="btn bg-turbo-color" onclick="HRM_ShowDetail('hrm_modal_trainingtype','modal_trainingType')"><i class="fas fa-plus"></i> Add</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="tbl_employee" style="width:100%">
                  <thead>                  
                    <tr>
                      <th style="">#</th>
                      <th style="">Training Type</th>
                      <th>Description</th>
                      <th>Action</>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=0;
                    @endphp
                      @foreach ($data as $t)
                        <tr>
                        <td>{{++$i}}</td>
                        <td>{{$t->name}}</td>
                        <td>{{$t->description}}</td>
                            <td>
                              <div class="row text-center">
                                <div class="col-md-6"><a href="javascrip:;" onclick="HRM_ShowDetail('hrm_modal_trainingtype','modal_trainingType',{{$t->id}})"><i class="far fa-edit"></i></a></div>
                                <div class="col-md-6"><a href="javascrip:;" onclick="hrm_delete({{$t->id}},'hrm_delete_trainingtype','hrm_trainingtype','Training Type Delete Successfully')"><i class="far fa-trash-alt" onclick=""></i></a></div>
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
<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-route"></i> Mission</strong></h1>
                <div class="col-md-12 text-right">
                    <button type="button" class="btn bg-gradient-primary" onclick="HRM_ShowDetail('hrm_modal_add_edit_missionoutside','modal_missionoutside')"><i class="fas fa-plus"></i> Add</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="tbl_missionAndOutSide" style="width: 100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>From Date</th>
                      <th>To Date</th>
                      <th>Type</th>
                      <th>Shift</th>
                      <th>Location</th>
                      <th>Description</>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($mission as $item)
                      <tr>
                      <th>{{++$i}}</th>
                      <td>{{ $item->date_from }}</td>
                      <td>{{ $item->date_to}}</td>
                      <td>{{ $item->type}}</td>
                      <td>{{ $item->shift}}</td>
                      <td># {{ $item->home_number}}, St {{$item->street}}</td>
                      <td>{{$item->description}}</td>
                        <td>
                          <div class="row">
                            <div class="col-md-4"><a href="javascrip:;" onclick="HRM_ShowDetail('hrm_modal_add_edit_missionoutside','modal_missionoutside',{{$item->id}})"><i class="far fa-edit"></i></a></div>
                            <div class="col-md-4"><a href="javascrip:;" onclick="HRM_ShowDetail('hrm_modal_mission_detail','modal_mission_detail',{{$item->id}})"><i class="fas fa-info"></i></a></div>
                            <div class="col-md-4"><a href="javascrip:;" onclick="hrm_delete({{$item->id}},'hrm_delete_missionoutside','hrm_mission_outside','Delete Successfully !')"><i class="far fa-trash-alt"></i></a></div>
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
    $('#tbl_missionAndOutSide').DataTable({
      responsive: true
    });
} );
</script>
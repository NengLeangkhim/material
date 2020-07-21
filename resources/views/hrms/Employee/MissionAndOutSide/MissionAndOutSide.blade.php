<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-route"></i> Mission and Outside</strong></h1>
                <div class="col-md-12 text-right">
                    <button type="button" class="btn bg-gradient-primary"><i class="fas fa-user-plus"></i> Add</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="tbl_missionAndOutSide">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Location</th>
                      <th>Member</th>
                      <th>From Date</th>
                      <th>To Date</th>
                      <th>Type</th>
                      <th>Description</>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($mis_out as $item)
                      <tr>
                      <th>{{++$i}}</th>
                      <td>{{ $item->location }}</td>
                      <td>{{$item->name}}</td>
                      <td>{{ $item->date_from }}</td>
                      <td>{{ $item->date_to}}</td>
                      <td>{{ $item->type}}</td>
                      <td>{{ $item->description }}</td>
                        <td>
                          <div class="row">
                            <div class="col-md-4"><a href="javascrip:;"><i class="far fa-edit"></i></a></div>
                            <div class="col-md-4"><a href="javascrip:;"><i class="fas fa-info"></i></a></div>
                            <div class="col-md-4"><a href="javascrip:;"><i class="far fa-trash-alt"></i></a></div>
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
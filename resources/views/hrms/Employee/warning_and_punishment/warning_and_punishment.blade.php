<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong> Warning and Punishment</strong></h1>
                <div class="col-md-12 text-right">
                    <a href="javascript:;" class="btn bg-gradient-primary" onclick="hrsm_modal_add_edit_warning_and_punishment()"><i class="fas fa-plus"></i> Add</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-12 text-right" style="width:100%;margin-bottom:10px">
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-bordered hrm_table" id="tbl_holiday" style="width: 100% ;margin-top:10px">
                      <thead>                  
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Type of Warning</th>
                          <th>Reason of Warning</th>
                          <th>Edit By</th>
                          <th>Date</th>
                          <th>Warning by</th>
                          <th>Approved By</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $i=0;
                        @endphp
                        {{-- @foreach ($holiday as $item)
                          <tr>
                          <th>{{ ++$i }}</th>
                          <td>{{ $item->title }}</td>
                            <td>{{ $item->title_kh }}</td>
                          <td>{{ $item->from_date }} to {{$item->to_date}}</td>
                            <td>{{ $item->days }}</td>
                            <td>{{ $item->description }}</td>
                            <td class="text-center">
                              <div class="row">
                                <div class="col-md-6"><a href="javascript:;" onclick="HRM_AddAndEditHoliday({{$item->id}})"><i class="far fa-edit"></i></a></div>
                                <div class="col-md-6"><a href="javascript:;" onclick="hrm_delete_data({{$item->id}},'hrm_delete_holiday','hrm_holiday','Holiday is Deleted ','HRM_09010202')"><i class="far fa-trash-alt"></i></a></div>
                              </div>
                            </td>
                        </tr>
                        @endforeach --}}
                        
                      </tbody>
                    </table>
                  </div>
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
} );
</script>
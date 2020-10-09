
@extends('setting.layout.master')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div id="modal"></div>
    <div style="padding:10px 10px 10px 10px">
    <div class="row">
      <div id="testt"></div>
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong> Leave Type</strong></h1>
                <div class="col-md-12 text-right">
                    <a href="javascript:;" id="btn_add_employee" class="btn bg-turbo-color" onclick="HRM_ShowDetail('hrm_modal_leave_type','modal_leave_type')"><i class="fas fa-plus"></i> Add Leave Type</a>
                    {{-- <a href="javascript:;" id="btn_add_employee" class="btn bg-turbo-color"><i class="fas fa-plus"></i> Add Employee</a> --}}
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="tbl_employee" style="white-space:nowrap">
                  <thead>                  
                    <tr>
                      <th>#</th>
                      <th>Leave Type</th>
                      <th>Khmer</th>
                      <th>Leave Days</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($leave_type as $leaveType)
                      <tr>
                      <td>{{++$i}}</td>
                      <td> {{$leaveType->name}} </td>
                      <td >{{ $leaveType->name_kh}}</td>
                      <td >{{ $leaveType->annual_count}}</td>
                      <td>{{$leaveType->status}}</td>
                        <td >
                          <div class="row text-center">
                            <div class="col-md-6"><a href="javascript:;" onclick="HRM_ShowDetail('hrm_modal_leave_type','modal_leave_type',{{$leaveType->id}})"><i class="far fa-edit"></i></a></div>
                            <div class="col-md-6"><a href="javascript:;"><i class="far fa-trash-alt" onclick="Delete_Leave_Type({{$leaveType->id}})"></i></a></div>
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
  function HRM_ShowDetail(rout,modalName,id=-1){
        $.ajax({
            type: 'GET',
            url: rout,
            data: {
                _token: '<?php echo csrf_token() ?>',
                id: id
            },
            success: function (data) {
                document.getElementById('modal').innerHTML = data;
                $('#'+modalName).modal('show');
                if(modal.length>0){
                    $('#'+modal).DataTable({
                    });
                }
            }
        });
    }

    setTimeout(function(){
        $('.alert').hide();
    }, 2000);


    function Delete_Leave_Type(ids){
        var r = confirm("Are you sure ?");
        if (r == true) {
            window.location.href = '/hrm_delete_leave_type?id='+ids;
        }
        
    }
</script>
@endsection



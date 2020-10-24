<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong>Payroll List</strong></h1>
                <div class="col-md-12 text-right">
                  <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                      <select class="form-control" id="select_year" id="payroll_list_year" onchange="SearchPayrollByMonthYear()">
                          @php
                             
                              for($y=2013;$y<=date('Y');$y++){
                                echo '<option value="'.$y.'">'.$y.'</option>';
                              }
                          @endphp
                      </select>
                    </div>
                    <div class="col-md-4">
                       <select class="form-control" id="select_month" id="payroll_list_month" onchange="SearchPayrollByMonthYear()">
                          <option value="1">January</option>
                          <option value="2">February</option>
                          <option value="3">March</option>
                          <option value="4">Appril</option>
                          <option value="5">May</option>
                          <option value="6">June</option>
                          <option value="7">July</option>
                          <option value="8">August</option>
                          <option value="9">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="paroll_by_month">
                <table class="table table-bordered" id="tbl_payroll" style="width: 100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Employee</th>
                      {{-- <th>Employee ID</th> --}}
                      <th>Role</th>
                      <th>Base Salary</th>
                      <th>Overtime</th>
                      <th>Commission</th>
                      <th>Bonus</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=0;
                      @endphp
                    @foreach ($data[0] as $empayroll)
                        <tr>
                        <th>{{++$i}}</th>
                        <td>{{$empayroll[1]}}</td>
                        <td>{{$empayroll[2]}}</td>
                        <td>{{$empayroll[3]}}</td>
                        <td>{{$empayroll[4]}}</td>
                        <td>{{$empayroll[5]}}</td>
                        <td>{{$empayroll[6]}}</td>
                        <td class="text-center">
                          
                          @php
                              if($empayroll[11]==1){
                                $bg="bg-danger disabled";
                                $disable="disabled";
                              }else {
                                $bg="bg-info";
                                $disable="";
                                echo '';
                              }
                          @endphp
                            <button id="btn_{{$empayroll[0]}}" {{$disable}} style="margin-right:15px;border:none;background-color:none;color:#007bff;" href="javascrip:;" class="btn" onclick="DeleteComponent({{$empayroll[0]}},'{{$empayroll[7]}}','{{$empayroll[8]}}',{{$empayroll[9]}},'HRM_09040401')"><i class="far fa-trash-alt" ></i></button>
                            <a style="margin-right:15px" href="javascript:;" onclick="hrms_Payroll_List_Detail('hrm_paroll_list_detail','modal_payrolldetail',{{$empayroll[0]}},'{{$empayroll[7]}}','{{$empayroll[8]}}',{{$empayroll[9]}},{{$empayroll[10]}})"><i class="fas fa-info"></i></a>
                            <button id="btn_approve_{{$empayroll[0]}}" {{$disable}} class="btn {{$bg}} btn-sm" onclick="HR_Approve_Payroll({{$empayroll[0]}},'{{$empayroll[7]}}','{{$empayroll[8]}}',{{$empayroll[9]}},'btn_approve_{{$empayroll[0]}}','btn_{{$empayroll[0]}}','HRM_09040403')">Approve</button>
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
    $('#tbl_payroll').DataTable({
      responsive: true
    });
} );

var d = new Date();
var month = d.getMonth();
var year=d.getFullYear();
$("#select_month").val(month+1);
$("#select_year").val(year);
</script>
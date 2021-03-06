<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong>Payroll List Report</strong></h1>
                <div class="col-md-12 text-right">
                  <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <select name="" id="custom_select_payroll_list_report" class="form-control" onchange="custom_payroll_list_report()">
                            <option value="t">All</option>
                            <option value="f">Select Month and Year</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                      <select name="" id="select_year_payroll" class="form-control" onchange="custom_payroll_list_report()" disabled>
                        @php
                              for($y=2013;$y<=date('Y');$y++){
                                echo '<option value="'.$y.'">'.$y.'</option>';
                              }
                        @endphp
                      </select>
                    </div>
                    <div class="col-md-3">
                      <select name="" id="select_month_payroll" class="form-control" onchange="custom_payroll_list_report()" disabled>
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
                  @php
                     
                  @endphp
                <table class="table table-bordered" id="tbl_payroll_list_report" style="width: 100%">
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
                      <th>Is Approved</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=0;
                          $over
                      @endphp
                    @foreach ($data as $empayroll)
                        @php
                            if(!$empayroll->overtime==null){
                              $overtime=$empayroll->overtime;
                            }else {
                              $overtime=0;
                            }

                            if(!$empayroll->commission==null){
                              $commission=$empayroll->commission;
                            }else {
                              $commission=0;
                            }
                            $bonus=0;

                        @endphp
                        <tr>
                        <th>{{++$i}}</th>
                        <td>{{$empayroll->employee}}</td>
                        <td>{{$empayroll->role}}</td>
                        <td>{{$empayroll->base_salary}}</td>
                        <td>{{$overtime}}</td>
                        <td>{{$commission}}</td>
                        <td>{{$bonus}}</td>
                        <td class="text-center">
                          
                          @php
                              if($empayroll->approve==1){
                               $btn='<label class="">Yes</label>';
                              }else {
                                $btn='<label class="">No</label>';
                              }
                              echo $btn;
                          @endphp
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
    $('#tbl_payroll_list_report').DataTable({
      responsive: true
    });
} );

var d = new Date();
var month = d.getMonth();
var year=d.getFullYear();
$("#select_month_payroll").val(month+1);
$("#select_year_payroll").val(year);
</script>
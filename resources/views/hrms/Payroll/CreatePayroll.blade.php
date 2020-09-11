<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong>Create Payroll</strong></h1>
                <div class="col-md-12 text-right">
                    {{-- <a href="javascrip:;" class="btn bg-gradient-primary" onclick="">Export Excel</a> --}}
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @php
                    // print_r($data);
                @endphp
                <form id="fm-createpayroll" onsubmit="return false">
                   @csrf
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-2">
                        <label for="">Employee</label>
                        <select name="employeeid" id="" class="form-control">
                        <option value="-1">All Employee</option>
                          @foreach ($data[0] as $em)
                        <option value="{{$em->id}}">{{$em->first_name_en.' '.$em->last_name_en}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-3">
                        <label for="">From</label>
                        <input type="date" name="from" id="" class="form-control">
                      </div>
                      <div class="col-md-3">
                        <label for="">To</label>
                        <input type="date" name="to" id="" class="form-control">
                      </div>
                      <div class="col-md-2">
                        <label for="">Month</label>
                        <select name="month" id="" class="form-control">
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
                      <div class="col-md-2">
                        <label for="">​</label>
                        <button type="submit" class="btn btn-default form-control" onclick="submit_form ('hrm_save_create_payroll','fm-createpayroll','hrm_employee_salary')">Create</button>
                      </div>
                    </div>
                  </div>
                </form>
                  
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
</script>
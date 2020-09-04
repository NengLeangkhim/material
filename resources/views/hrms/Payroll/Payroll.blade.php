<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong>Payroll</strong></h1>
                <div class="col-md-12 text-right">
                    <a href="javascrip:;" class="btn bg-gradient-primary" onclick="">Export Excel</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  @php
                    //   print_r($data);
                  @endphp
                <table class="table table-bordered" id="tbl_payroll" style="width: 100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Employee</th>
                      <th>Employee ID</th>
                      <th>Role</th>
                      <th>Salary</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>1</td>
                        <td>Seng Kimsros</td>
                        <td>TT-0082</td>
                        <td>Programmer</td>
                        <td class="text-center">130$</td>
                        <td class="text-center text-primary">Paid</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Seng Kimsros</td>
                        <td>TT-0082</td>
                        <td>Programmer</td>
                        <td class="text-center">130$</td>
                        <td class="text-center text-danger">Not Paid</td>
                      </tr>
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
</script>
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
                      // print_r($data);
                  @endphp
                <table class="table table-bordered" id="tbl_payroll" style="width: 100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Employee</th>
                      <th>Employee ID</th>
                      <th>Role</th>
                      <th>Salary</th>
                      <th>Tax</th>
                      <th>Net Salary</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($data[0] as $em)
                        <tr>
                        <td>{{++$i}}</td>
                        <td>{{$em->name}}</td>
                        <td>{{$em->id_number}}</td>
                        <td>{{$em->position}}</td>
                          <td class="text-center">{{$em->bonus_value}}</td>
                          <td class="text-center">{{$em->tax}}</td>
                          <td class="text-center">{{$em->bonus_value-$em->tax}}</td>
                          <td class="text-center text-primary">
                            <button class="btn bg-info btn-sm">Detail</button>
                            <button class="btn bg-info btn-sm">Approve</button>
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
</script>
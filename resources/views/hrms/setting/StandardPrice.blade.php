<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong>Standard Price</strong></h1>
                <div class="col-md-12 text-right">
                    <a href="javascrip:;" class="btn bg-gradient-primary" onclick="HRM_ShowDetail('hrm_modalstandardprice','modal_standardprice')">Add</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  @php
                      print_r($data);
                  @endphp
                <table class="table table-bordered" id="tbl_payroll" style="width: 100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Date</th>
                      <th>Type</th>
                      <th>Price</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=0;
                          $salary="100 $";
                      @endphp
                    @foreach ($data[0] as $sp)
                        <tr>
                        <th>{{++$i}}</th>
                        <td>{{$sp->date}}</td>
                        <td>{{$sp->type}}</td>
                        <td>{{$sp->price}}</td>
                        <td class="text-center">
                          <div class="row">
                            <div class="col-md-6"><a href="javascrip:;" onclick="HRM_ShowDetail('hrm_modalstandardprice','modal_standardprice',{{$sp->id}})"><i class="far fa-edit"></i></a></div>
                            <div class="col-md-6"><a href="javascrip:;"><i class="far fa-trash-alt" onclick="hrm_delete({{$sp->id}},'hrm_delete_standardprice','hrm_standard_price','Standard Price Deleted Succseefully !')"></i></a></div>
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
    $('#tbl_payroll').DataTable({
      responsive: true
    });
} );
</script>
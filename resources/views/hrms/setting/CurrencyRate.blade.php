<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-calendar-times"></i>Currency Rate</strong></h1>
                <div class="col-md-12 text-right">
                    <a href="javascrip:;" class="btn bg-gradient-primary" onclick="HRM_ShowDetail('hrm_modal_currencyrate','modal_currencyrate')">Add</a>
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
                      <th>Type</th>
                      <th>To Type</th>
                      <th>Date</th>
                      <th>Rate</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=0;
                          
                      @endphp
                    @foreach ($data[0] as $cu)
                        <tr>
                        <th>{{++$i}}</th>
                        <td>{{$cu->namefrom}}</td>
                        <td>{{$cu->nameto}}</td>
                        <td>{{$cu->create_date}}</td>
                        <td>{{$cu->rate}}</td>
                        <td class="text-center">
                          <div class="row">
                            <div class="col-md-6"><a href="javascrip:;" onclick="HRM_ShowDetail('hrm_modal_currencyrate','modal_currencyrate',{{$cu->id}})"><i class="far fa-edit"></i></a></div>
                            <div class="col-md-6"><a href="javascrip:;"><i class="far fa-trash-alt" onclick="hrm_delete({{$cu->id}},'hrm_delete-currencyrate','hrm_currency','Currency Rate Deleted Succseefully !')"></i></a></div>
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
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="fas fa-chart-pie"></i></span>Detail Contact Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('/crmreport')">Report</a></li>
                <li class="breadcrumb-item active">Detail Contact Report</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- section Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <div class="col-12 text-right">
                                <button class="btn btn-success"><span><i class="far fa-file-excel"></i></span> Excel</button>
                                <button class="btn btn-danger"><span><i class="far fa-file-pdf"></i></span> Pdf</button>
                      </div>
                  </div>
                  <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">Date From <b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Select Date" id="DetailContactFrom"  name='DetailContactFrom'  required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Select Date" id="DetailContactTo" name='DetailContactTo'  required>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="col-md-12" style="height: 45%">

                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary align-middle" style="width:70%;" id="btn-generate-report">Generate Report</button>
                                    </div>
                                </div>
                            </div>
                        </div><!--End Form Group-->
                        <div class="table-responsive" style="padding-top: 10px;">
                            <table id="OrganizationTbl" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>National ID</th>
                                        <th>Name In English</th>
                                        <th>Name In Khmer</th>
                                        <th>Position</th>
                                        <th>Email</th>
                                        <th>Facebook</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody id="lead-detail-body">
                                </tbody>
                            </table>
                        </div>
                  </div><!--End Card Body-->
              </div><!--End Card-->
          </div><!--Col-12-->
      </div><!--End Row-->
    </div><!--End Container-Fluid-->
</section><!-- end section Main content -->
<script>
    $('#DetailContactFrom').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });
      $('#DetailContactTo').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });

    $(document).ready(function(){
        var url = '/api/crm/report/contactReportDetail'

        $('#btn-generate-report').click(function(){
            var from = $('#DetailContactFrom').val() == '' ? '' : (new Date($('#DetailContactFrom').val())).toISOString().substring(0, 10)
            var to = new Date($('#DetailContactTo').val());
            to = $('#DetailContactTo').val() == '' ? '' : (new Date(to.getUTCFullYear(), to.getMonth() + 1, 1)).toISOString().substring(0,10)
            $('#OrganizationTbl').dataTable().fnClearTable();
            $('#OrganizationTbl').dataTable().fnDraw();
            $('#OrganizationTbl').dataTable().fnDestroy();
            $.ajax({
                url : url,
                type : 'GET',
                data : {
                    'from_date' : from == '' ? null : from,
                    'to_date' : to == '' ? null : to
                },
                success : function(response){
                    if(response.success) {
                        $.each(response.data, function(index, data){
                            $('#lead-detail-body').append(`
                            <tr>
                                <td>${data.national_id}</td>
                                <td>${data.name_en}</td>
                                <td>${data.name_kh}</td>
                                <td>${data.position}</td>
                                <td>${data.email}</td>
                                <td>${data.facebook}</td>
                                <td>${data.phone}</td>
                            </tr>
                            `)
                        })
                        $('#OrganizationTbl').DataTable();
                    }
                },
                fail : function(){
                    console.log("ERROR");
                },
                dataType : 'JSON'
            })

        })

    })
</script>

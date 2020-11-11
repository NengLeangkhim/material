<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="fas fa-chart-pie"></i></span>Detail Organization Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('/crmreport')">Report</a></li>
                <li class="breadcrumb-item active">Detail Organization Report</li>
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
                                    <label for="exampleInputEmail1">Lead Source</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-tty"></i></span>
                                        </div>
                                        <select class="form-control" name="select_source" id="select_source">
                                            <option value="0">Please Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">Assign To</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                        </div>
                                        <select class="form-control" name="select_source" id="select_assign_to">
                                            <option value="0">Please Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!--End Form Group-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">Date From <b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Select Date" id="DetailOrganizationFrom"  name='DetailOrganizationFrom'  required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Select Date" id="DetailOrganizationTo" name='DetailOrganizationTo'  required>
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
                        {{-- <div class="form-group">
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Assign To <b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <select class="form-control" name="select_source" id="select_source">
                                            <option value="0">Please Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!--End Form Group--> --}}
                        <div class="table-responsive" style="padding-top: 10px;">
                            <table id="OrganizationTbl" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Lead Number</th>
                                        <th>Company Name</th>
                                        <th>Customer Name</th>
                                        <th>Branch Email</th>
                                        <th>VAT Number</th>
                                        <th>Website</th>
                                        <th>Priority</th>
                                        <th>Facebook</th>
                                        <th>Email</th>
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
    $('#DetailOrganizationFrom').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });
      $('#DetailOrganizationTo').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });

    var setSelectOptionData = (url, elementId) => {
        $.ajax({
            url : url,
            type : 'GET',
            data : {
            },
            success : function(response){
                $.each(response, function(index, res){
                    $.each(res, function(i, r){
                        $(elementId).append(`<option value="${r.id}">${r.name}</option>`);
                    })
                })
            },
            fail : function(){
                console.log("ERROR");
            },
            dataType : 'JSON'
        })
    }

    $(document).ready(function(){
        setSelectOptionData('/api/leadsource','#select_source')
        setSelectOptionData('/api/leadassig','#select_assign_to')

        var url = '/api/crm/report/organizationReportDetail'

        $('#btn-generate-report').click(function(){
            var sourceId = $('#select_source').val();
            var assignTo = $('#select_assign_to').val();
            var status = $('#select_status').val();
            var from = $('#DetailOrganizationFrom').val() == '' ? '' : (new Date($('#DetailOrganizationFrom').val())).toISOString().substring(0, 10)
            var to = new Date($('#DetailOrganizationTo').val());
            to = $('#DetailOrganizationTo').val() == '' ? '' : (new Date(to.getUTCFullYear(), to.getMonth() + 1, 1)).toISOString().substring(0,10)
            $('#OrganizationTbl').dataTable().fnClearTable();
            $('#OrganizationTbl').dataTable().fnDraw();
            $('#OrganizationTbl').dataTable().fnDestroy();
            $.ajax({
                url : url,
                type : 'GET',
                data : {
                    'from_date' : from == '' ? null : from,
                    'to_date' : to == '' ? null : to,
                    'source_id' : sourceId == 0 ? null : sourceId,
                    'assign_to' : assignTo == 0 ? null : assignTo,
                    'status_id' : status == 0 ? null : status
                },
                success : function(response){
                    if(response.success) {
                        $.each(response.data, function(index, data){
                            $('#lead-detail-body').append(`
                            <tr>
                                <td>${data.lead_number}</td>
                                <td>${data.name_en}</td>
                                <td>${data.customer_name_en}</td>
                                <td>${data.clb_email}</td>
                                <td>${data.vat_number}</td>
                                <td>${data.website}</td>
                                <td>${data.priority}</td>
                                <td>${data.facebook}</td>
                                <td>${data.email}</td>
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

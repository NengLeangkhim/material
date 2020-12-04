<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="fas fa-chart-pie"></i></span> Customer Service</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('/crmreport')">Report</a></li>
                <li class="breadcrumb-item active">Customer Service</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- section Main content -->
<section class="content">
    <div class="container-fluid" id="cus-ser">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-9"></div>
                                <div class="col-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-success form-control" id="btnExportExcelLeadReport"><span><i class="far fa-file-excel"></i></span> Excel</button>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn btn-danger form-control" id="btnExportPdfLeadReport"><span><i class="far fa-file-pdf"></i></span> Pdf</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1">Service</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
                                            </div>
                                            <select class="form-control" name="select_source" id="select_source">
                                                <option value=''>All Service</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <label for="exampleInputEmail1">Assign To</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                            </div>
                                            <select class="form-control" name="select_assign_to" id="select_assign_to">
                                                <option value="0">All Staff</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1">Status</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                                            </div>
                                            <select class="form-control" name="select_status" id="select_status">
                                                <option value="0">All Status</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="exampleInputEmail1">Date From <b style="color:red"></b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Select Date" id="CustomerServiceFrom" value="<?php echo date('Y-m')?>" name='DetailLeadFrom'  required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleInputEmail1">Date to <b style="color:red"></b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Select Date" id="CustomerServiceTo" name='DetailLeadTo' value="<?php echo date('Y-m')?>"  required>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-4 text-center">
                                                    <div class="col-md-12" style="height: 45%">

                                                    </div>
                                                    <div class="col-md-12">
                                                        <button class="btn btn-primary align-middle" style="width:70%;" id="btn-generate-report">Generate Report</button>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div><!--End Form Group-->
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
                                </div> --}}
                            {{-- </div><!--End Form Group--> --}}
                            <div class="table-responsive" style="padding-top: 10px;">
                                <table id="OrganizationTbl" class="table table-bordered table-striped" style="white-space: nowrap;">
                                    <thead>
                                        <tr>
                                            <th style="display:none;"></th>
                                            <th>No</th>
                                            <th>Barcode</th>
                                            <th>Service Name</th>
                                            <th>Total</th>
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
    $('#CustomerServiceFrom').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
    });
    $('#CustomerServiceTo').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
    });
    $('#select_source').ready(function(){
        $('#select_source').find('option').not(':first').remove();
        $.ajax({
            url:'api/stock/service',
            type:'get',
            dataType:'json',
            success:function(response){
                $.each(response['data'], function(i,item){
                    console.log('i: ' + i + 'Item: ' + item);
                    var id = response['data'][i].id;
                    var name = response['data'][i].name;
                    // alert(name);
                    var option = "<option value='"+id+"'>"+name+"</option>";
                    $("#select_source").append(option);
                })
            }
        })
    })
    $(document).ready(function(){
        setSelectOptionData('/api/leadsource','#select_source')
        setSelectOptionData('/api/leadassig','#select_assign_to')
        setSelectOptionData('/api/leadstatus','#select_status')

        var url = '/api/crm/report/leadReportDetail'

        $('#btn-generate-report').click(function(){
            var sourceId = $('#select_source').val();
            var assignTo = $('#select_assign_to').val();
            var status = $('#select_status').val();
            var from = $('#DetailLeadFrom').val() == '' ? '' : (new Date($('#DetailLeadFrom').val())).toISOString().substring(0, 10)
            var to = new Date($('#DetailLeadTo').val());
            to = $('#DetailLeadTo').val() == '' ? '' : (new Date(to.getUTCFullYear(), to.getMonth() + 1, 1)).toISOString().substring(0,10)
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
                                    <td style="display:none;"></td>
                                    <td>${index+1}</td>
                                    <td>${data.lead_number}</td>
                                    <td>${data.branch_name_en}</td>
                                    <td>${data.department_name_en}</td>
                                    <td>${data.customer_name_en}</td>
                                    <td>${data.priority}</td>
                                    <td>${data.source_name_en}</td>
                                    <td>${data.status_en}</td>
                                </tr>
                            `)
                        })
                        $('#OrganizationTbl').DataTable({
                            'ordering': false,
                        });
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

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="fas fa-chart-pie"></i></span>Detail Quote Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('/crmreport')">Report</a></li>
                <li class="breadcrumb-item active">Detail Quote Report</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- section Main content -->

<section class="content">

    <style type="text/css">
       th {
            font-size: 16px;
        }

        td {
            font-size: 14px;
        }
        /* table
        {
            border: 1px solid #ccc;
            border-collapse: collapse;
        }
        table th
        { */
            /* background-color: #F7F7F7; */
            /* color: #333;
            font-weight: bold;
        }
        table th, table td
        {
            padding: 5px;
            border: 1px solid #ccc;
        } */
    </style>

    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <div class="col-12 text-right">
                        <div class="row">
                            <div class="col-9"></div>
                            <div class="col-3">
                                <div class="row">
                                    <div class="col-6">
                                            <button type="button" class="btn btn-success form-control" id="btnReportQuoteExcel" ><span><i class="far fa-file-excel"></i></span> Excel</button>
                                    </div>
                                    <div class="col-6">
                                            <button class="btn btn-danger form-control" id="btnReportQuotePDF" ><span><i class="far fa-file-pdf"></i></span> Pdf</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="card-body">
                        <div class="form-group">
                            <div class="row">


                                <div class="col-md-3">
                                    <label for="exampleInputEmail1">Date From <b style="color:red"></b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Select Date" id="DetailQuoteFrom"  name='DetailQuoteFrom' value="<?php echo date('Y-m')?>"  required>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="exampleInputEmail1">Date to <b style="color:red"></b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Select Date" id="DetailQuoteTo" name='DetailQuoteTo' value="<?php echo date('Y-m')?>"  required>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="exampleInputEmail1">Quote Stage <b style="color:red"></b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-tty"></i></span>
                                        </div>
                                        <select class="form-control" name="select_status" id="select_status">
                                            <option value="0">Please Select</option>
                                            @forelse ($statusList as $item)
                                                <option value="{{$item->id}}">{{$item->name_en}}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                @if($assign_perm)
                                    <div class="col-md-3">
                                        <label for="exampleInputEmail1">Assign To <b style="color:red"></b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                            </div>
                                            <select class="form-control" name="select_assign_to" id="select_assign_to">
                                                <option value="0">Please Select</option>
                                                @forelse ($assignToList as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @empty

                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                @else
                                    <input type="hidden" name="select_assign_to" id="select_assign_to" value="{{ $userId }}">
                                @endif



                            </div>
                        </div><!--End Form Group-->
                        {{-- <div class="form-group">
                            <div class="row">

                            </div>
                        </div><!--End Form Group--> --}}
                        <div class="text-right">
                            <button class="btn btn-primary" id="btn-generate-report">Generate Report</button>
                        </div>
                        <div class="table-responsive" style="padding-top: 10px;">
                            <table id="QuoteDetailTbl" class="table table-bordered table-striped" style="border-collapse:collapse; white-space: nowrap; " cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr style="background-color: #1fa8e0;">
                                        <th style="display:none;"></th>
                                        <th style="color: #FFFFFF">No</th>
                                        <th style="color: #FFFFFF">Quote Number</th>
                                        <th style="color: #FFFFFF">Lead Number</th>
                                        <th style="color: #FFFFFF">Customer Name</th>
                                        <th style="color: #FFFFFF">Create Date</th>
                                        <th style="color: #FFFFFF">Due Date</th>
                                        <th style="color: #FFFFFF">Email</th>
                                        <th style="color: #FFFFFF">Website</th>
                                        <th style="color: #FFFFFF">Status</th>
                                    </tr>
                                </thead>
                                <tbody id="quote-detail-body">
                                </tbody>
                            </table>
                        </div>
                  </div><!--End Card Body-->
              </div><!--End Card-->
          </div><!--Col-12-->
      </div><!--End Row-->
    </div><!--End Container-Fluid-->
</section><!-- end section Main content -->

<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script>

    $(document).ready(function() {
        $('.select2').select2();
    });

    $('#DetailQuoteFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        sideBySide: true,
    });
    $('#DetailQuoteTo').datetimepicker({
        format: 'YYYY-MM-DD',
        sideBySide: true,
    });

    // var setSelectOptionData = (url, elementId) => {
    //     $.ajax({
    //         url : url,
    //         type : 'GET',
    //         headers: {
    //             Authorization: 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYwNzEzNjc5MCwiZXhwIjoxNjA4MzQ2MzkwLCJuYmYiOjE2MDcxMzY3OTAsImp0aSI6ImRjVWZOMEFxaW84U1pJeDMiLCJzdWIiOjIzMCwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.VhQsWJBCsFVvGBOflUZl23ygOKOCX_s84pnGPmrf-qE'
    //         },
    //         data : {
    //         },
    //         success : function(response){
    //             $.each(response, function(i, r){
    //                 $(elementId).append(`<option value="${r.id}">${r.name_en}</option>`);
    //             })
    //         },
    //         fail : function(){
    //             console.log("ERROR");
    //         },
    //         dataType : 'JSON'
    //     })
    // }

    $(window).off("resize")
    $(document).ready(function(){
        // setSelectOptionData('/quote/add/listAssignTo','#select_assign_to')
        // setSelectOptionData('/api/quote/status','#select_status')

        var url = '/api/crm/report/quoteReportDetail'

        $('#btn-generate-report').click(function(){
            var assignTo = $('#select_assign_to').val();
            var status = $('#select_status').val();
            var from = $('#DetailQuoteFrom').val() == '' ? '' :  (new Date($('#DetailQuoteFrom').val())).toISOString().substring(0, 10)
            var to = new Date($('#DetailQuoteTo').val());
            to = $('#DetailQuoteTo').val() == '' ? '' : (new Date(to.getUTCFullYear(), to.getMonth() + 1, 1)).toISOString().substring(0,10)
            $('#QuoteDetailTbl').dataTable().fnClearTable();
            $('#QuoteDetailTbl').dataTable().fnDraw();
            $('#QuoteDetailTbl').dataTable().fnDestroy();

            $.ajax({
                url : url,
                type : 'GET',
                data : {
                    'from_date' : from == '' ? null : from,
                    'to_date' : to == '' ? null : to,
                    'assign_to' : assignTo == 0 ? null : assignTo,
                    'status_id' : status == 0 ? null : status
                },
                success : function(response){
                    $('#quote-detail-body').empty();
                    if(response.success) {
                        $.each(response.data, function(index, data){
                            var getDate = moment(data.crm_quote_status_create_date);
                            //  HH:m:s a
                            var create_date = getDate.format("YYYY-MM-DD");
                            $('#quote-detail-body').append(`
                                <tr>
                                    <td style="display:none;"></td>
                                    <td>${index+1}</td>
                                    <td>${data.quote_number}</td>
                                    <td>${data.lead_number}</td>
                                    <td>${data.customer_name_en}</td>
                                    <td>${create_date}</td>
                                    <td>${moment(data.due_date).format("YYYY-MM-DD")}</td>
                                    <td>${data.email}</td>
                                    <td>${data.website}</td>
                                    <td>${data.quote_status_name_en}</td>
                                </tr>
                            `)
                        })
                    }
                    $('#QuoteDetailTbl').DataTable({
                        'ordering': false,
                        "scrollX":true,
                        "autoWidth": false,
                        "serverSide": false,
                        "scrollY": "400px",
                        "scrollCollapse": false,
                        "paging": true
                    });

                },
                fail : function(){
                    console.log("ERROR");
                },
                dataType : 'JSON'
            })

        })

    })
</script>

{{-- <script type="text/javascript">

    function exportReportToExcel(){
        console.log('in func export excel');
        let table = document.getElementsByTagName("table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
        TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
            name: `export.xlsx`, // fileName you could use any name
            sheet: {
                name: 'Sheet 1' // sheetName
            }
        });
    }
</script> --}}

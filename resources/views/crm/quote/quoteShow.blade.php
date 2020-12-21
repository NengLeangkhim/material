<!-- Content Header (Page header) -->
<section class="content-header">
    <style>
        th {
            font-size: 16px;
        }

        td {
            font-size: 14px;
        }

    </style>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="fas fa-file-invoice-dollar"></i></span> Quotes</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">View Organization</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- section Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box card-header">
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <a href="javascript:void(0);" class="btn btn-success CrmAddQuote" onclick="go_to('/quote/add')"
                            id="CrmAddQuote"><i class="fas fa-plus"></i> Add New
                            Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"
                                            onclick="changeStatus('all')" data-toggle="tab">All</a></li>
                                    @foreach ($status->data ?? [] as $item)
                                        <li class="nav-item"><a class="nav-link" href="javascript:void(0);"
                                                onclick="changeStatus('{{ $item->name_en }}')"
                                                data-toggle="tab">{{ $item->name_en }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row" id='QuoteStatusChildTab'>
                            {{-- This will use the LeadStatusChildTabs.blade
                            --}}
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="margin-top: 10px">
                                <div class="table-responsive">
                                    <table id="tblQuoteList" class="table table-bordered table-hover"
                                        style="white-space:nowrap;">
                                        <thead>
                                            <tr style="background: #1fa8e0">
                                                <th style="color: #FFFFFF">Quote Number</th>
                                                <th style="color: #FFFFFF">Subject</th>
                                                <th style="color: #FFFFFF">Organization Name</th>
                                                <th style="color: #FFFFFF">VAT Number</th>
                                                <th style="color: #FFFFFF">Quote Status</th>
                                                <th style="color: #FFFFFF">Assigned To </th>
                                                <th style="color: #FFFFFF">Has Invoice</th>
                                                <th style="color: #FFFFFF">Create By</th>
                                                <th style="color: #FFFFFF">Due Date</th>
                                                <th style="color: #FFFFFF">Create Date</th>
                                                <th style="color: #FFFFFF;">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script type="text/javascript">
    var QupteStatusType = 'all';
    var t = null;

    function initDataTableQuote() {
        if (t !== null) {
            t.destroy();
        }
        t = $("#tblQuoteList").DataTable({
            scrollX: true,
            // "responsive": true,
            "autoWidth": false,
            "serverSide": true,
            "scrollY": "400px",
            "scrollCollapse": false,
            "paging": true,
            "ajax": "/quote/datatable/" + QupteStatusType,
            "columnDefs": [{
                    // The `data` parameter refers to the data for the cell (defined by the
                    // `data` option, which defaults to the column being worked with, in
                    // this case `data: 0`.
                    "searchable": false,
                    "render": function(data, type, row) {
                        return '<div class="container-fluid datatable-action-col"><div class="row form-inline">' +
                            '<div class="col-md-4">' +
                            '<a href="#"  class="qouteViewDetail btn btn-info btn-sm" onclick="goto_Action(\'/quote/detail\', \'' +
                            data + '\')"  >' +
                            '<i class="far fa-eye"></i>' +
                            '</a>' +
                            '</div>' +
                            '<div class="col-md-4">' +
                            '<a href="#" class="btn btn-success btn-sm" id="btnEditQuote" onclick="goto_Action(\'/quote/leadBranch\', \'' +
                            data + '\')">' +
                            '<i class="fas fa-wrench"></i>' +
                            '</a>' +
                            '</div>' +
                            '<div class="col-md-4 ">' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm " onclick="getDeleteQuoteLead(\'/quote/deleteLeadQuote\', \'' +
                            data + '\')"> <i style="color:white;" class="fa fa-trash"></i>  </a>' +
                            '</div>' +
                            '</div></div>';
                    },
                    "width": "100px",
                    "targets": 10,
                },
                {
                    "searchable": false,
                    "targets": [8, 9],
                },
            ],
            "initComplete": function() {
                $(".dataTables_filter input")
                    .unbind() // Unbind previous default bindings
                    .bind("keyup", function(e) { // Bind our desired behavior
                        // If the length is 3 or more characters, or the user pressed ENTER, search
                        if (this.value.length >= 3 || e.keyCode == 13) {
                            // Call the API search function
                            t.search(this.value).draw();
                            notify_alert('.dataTables_filter input', 'success', 'top center',
                                'search success')
                        } else {
                            notify_alert('.dataTables_filter input', 'warn', 'top center',
                                'please input 3 characters or more')
                        }
                        // Ensure we clear the search if they backspace far enough
                        if (this.value == "") {
                            t.search("").draw();
                        }
                        return;
                    });
            }
        });
    }

    function QuoteStatusChild() {
        $.ajax({
            url: '/quote/status/child/' + QupteStatusType, //get URL to route
            type: "get",
            data: {},
            success: function(data) {
                $("#QuoteStatusChildTab").html(data);
                QupteStatusType = $('input[type="hidden"][name="StatusFirstChild"]').val();
                initDataTableQuote();
            },
        });
    }

    function changeStatus(status) {
        QupteStatusType = status;
        QuoteStatusChild();
    }
    initDataTableQuote();

</script>

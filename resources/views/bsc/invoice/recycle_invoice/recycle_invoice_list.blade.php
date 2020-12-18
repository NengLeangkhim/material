
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-eye"></i>Recycle Invoice</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Recycle Invoice</li>
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
                    <div class="card-body">
                        <div class="form-group row" style="padding-top: 20px">
                            <div class="col-md-7">
                                <div class="form-group row form-group-marginless">
                                    <label class="col-lg-4 col-form-label">Select Date from :</label>
                                    <div class="col-lg-8">
                                        <div class="input-daterange input-group" id="k_datepicker_5">
                                            <input type="date" class="form-control" name="start" id="effective_date_from">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><strong>To</strong></span>
                                            </div>
                                            <input type="date" class="form-control" name="end" id="effective_date_to">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5" style="text-align: right">
                                <input class="btn btn-info" type="button" value="Search" name="search" id="search">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped" style="white-space: nowrap">
                            <thead>
                                <tr class="background_color_tr">
                                    <th class="background_color_td">No</th>
                                    <th class="background_color_td">CIF</th>
                                    <th class="background_color_td">CID</th>
                                    <th class="background_color_td">ACCID</th>
                                    <th class="background_color_td">Customer</th>
                                    <th class="background_color_td">Connection Name</th>
                                    <th class="background_color_td">Contact</th>
                                    <th class="background_color_td">Effective Date</th>
                                    <th class="background_color_td">End Date</th>
                                    <th class="background_color_td">Total Amount</th>
                                    <th class="background_color_td">VAT Total</th>
                                    <th class="background_color_td">Grand Total</th>
                                    <th class="background_color_td">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="master" data-id="1">
                                    <td>1</td>
                                    <td>000044</td>
                                    <td>001-001-00044-01</td>
                                    <td>INV-20001344</td>
                                    <td>Touch Rith</td>
                                    <td>Touch Rith</td>
                                    <td>0967890987</td>
                                    <td>18-12-2020</td>
                                    <td>20-12-2020</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>110</td>
                                    <td style="text-align-last: center">
                                        <a title="View Detail" href="javascript:void(0);"​ onclick="go_to('bsc_invoice_recycle_view_detail')"><i class="far fa-eye"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- end section Main content -->


<script type="text/javascript">
    $(function () {
        $("#example1").DataTable({
            "scrollX":true,
            "autoWidth": false,
            "scrollY": "400px",
            "scrollCollapse": false
        });
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
        });
    });
$('.lead').click(function(e)
{
    var ld = $(this).attr("​value");
    go_to(ld);
})
$('.edit').click(function(e)
{
    var id = $(this).attr("​value");
    go_to(id);
});
$('.detail').click(function(e)
{
    var id = $(this).attr("​value");
    go_to(id);
});
</script>

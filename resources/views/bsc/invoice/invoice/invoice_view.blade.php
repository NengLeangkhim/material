
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user"></i> View Invoice</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">View Invoice</li>
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
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4 text_right">
                                <a href="#" class="btn btn-success purchase_form"  value="" id="">Print</a>
                                <a href="#" class="btn btn-secondary purchase_form"  value="bsc_purchase_purchase_purchase_edit" id="purchase_edit" onclick="go_to('bsc_invoice_invoice_edit/{{ $invoices->id }}')">Edit</a>
                                {{-- <a href="#" class="btn btn-danger purchase_form"  value="" id="">Delete</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <p for="">Account Name : &nbsp;{{ $invoices->chart_account_name }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">Customer Name : &nbsp;{{ $invoices->customer_name }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">Deposit : &nbsp;{{ $invoices->deposit_on_payment }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">Balance : &nbsp;{{ $invoices->customer_balance }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">Invoice Balance : &nbsp;{{ $invoices->customer_invoice_balance }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">Billing Date : &nbsp;{{ date('d-m-Y', strtotime($invoices->billing_date)) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p for="">Invoice : &nbsp;{{ $invoices->invoice_number }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">Reference : &nbsp;{{ $invoices->reference }}</p>
                                            </div>

                                            <div class="col-sm-5">
                                                <p for="">Due Date : &nbsp;{{ date('d-m-Y', strtotime($invoices->due_date)) }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">Effective Date : &nbsp;{{ date('d-m-Y', strtotime($invoices->effective_date)) }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">End Period Date : &nbsp;{{ date('d-m-Y', strtotime($invoices->end_period_date)) }}</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <p for="">Address : &nbsp;{{ $invoices->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Customer Branch Name</th>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Account</th>
                                    <th>Tax Rate</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoice_details as $invoice_detail)
                                    <tr>
                                        <td>{{ $invoice_detail->customer_branch_name }}</td>
                                        <td>{{ $invoice_detail->product_name }}</td>
                                        <td>{{ $invoice_detail->description }}</td>
                                        <td>{{ $invoice_detail->qty }}</td>
                                        <td>{{ $invoice_detail->chart_account_name }}</td>
                                        <td>{{ $invoice_detail->tax }}</td>
                                        <td>{{ $invoice_detail->amount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table><br/>
                        <div class="form-group">
                            <div class="col-md-12" style="padding-right: 20px;">
                                <div class="row">
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-6 text_right">
                                                <label for="">Total : </label>
                                            </div>
                                            <div class="col-sm-6 text_right">
                                                <label for="">{{ $invoices->total }}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 text_right">
                                                <label for="">Vat Total : </label>
                                            </div>
                                            <div class="col-sm-6 text_right">
                                                <label for="">{{ $invoices->vat_total }}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 text_right">
                                                <label for="">Grand Total : </label>
                                            </div>
                                            <div class="col-sm-6 text_right">
                                                <label for="">{{ $invoices->grand_total }}</label>
                                            </div>
                                        </div>
                                        <hr class="line_in_tag_hr">
                                        <div class="row">
                                            <div class="col-sm-6 text_right">
                                                <label for="">Payment : </label>
                                            </div>
                                            <div class="col-sm-6 text_right">
                                                <label for="">1000$</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 text_right">
                                                <label for="">Date : </label>
                                            </div>
                                            <div class="col-sm-6 text_right">
                                                <label for="">02-10-2020</label>
                                            </div>
                                        </div>
                                        <hr class="line_in_tag_hr2">
                                        <div class="row">
                                            <div class="col-sm-6 text_right">
                                                <label for="">Amount Due : </label>
                                            </div>
                                            <div class="col-sm-6 text_right">
                                                <label for="">1000$</label>
                                            </div>
                                        </div>
                                        <hr class="line_in_tag_hr2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <form action="">
                                @csrf
                                <div class="card-body">
                                    <label for="">Receive a Payment</label><br/>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="exampleInputEmail1">Amount Paid <b class="color_label">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                                    </div>
                                                    <input required type="text" class="form-control"  name="amount_paid" id="exampleInputEmail1" placeholder="Amount Paid">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="exampleInputEmail1">Date paid<b class="color_label">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                                    </div>
                                                    <input required type="date" class="form-control"  name="date_paid" id="exampleInputEmail1" placeholder="Date Paid">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="exampleInputEmail1">Paid To<b class="color_label">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <select required class="form-control select2" name="paid_to">
                                                        <option value="" selected hidden disabled>select item</option>
                                                        <option>Exclusive</option>
                                                        <option>Inclusive</option>
                                                        <option>Oppa</option>
                                                        <option>Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="exampleInputEmail1">Reference<b class="color_label">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input required type="text" class="form-control"  name="reference" id="exampleInputEmail1" placeholder="Reference">
                                                </div>
                                            </div>
                                        </div><br/>

                                    </div>
                                    <div class="col-md-12">
                                        <button id="add_payment" type="button" class="btn btn-success save" id="frm_btn_sub_add_chart_account">Add Payment</button>&nbsp;&nbsp;&nbsp;
                                        <button id="add_payment" onclick="go_to('bsc_invoice_invoice_list')" type="button" class="btn btn-danger save" id="frm_btn_sub_add_chart_account">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- end section Main content -->


<script type="text/javascript">

$(function () {
    $("#example1").DataTable({
    "responsive": true,
    "autoWidth": false,
    });
    $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
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
<script>
    $('.select2').select2();
</script>
<script>
    $(document).ready(function(){

    });
</script>

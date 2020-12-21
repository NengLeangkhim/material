
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><strong style="font-size: 25px; margin-top:5px;"><i class="fas fa-list"></i> Purchase List </strong></h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-12">
                            <div class="row">
                                {!! $button_add !!}&nbsp;
                            </div>
                            <!------------------------------------ Start Tab Menu ------------------------->
                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top: 10px;">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#all" role="tab" aria-controls="home" aria-selected="true">All</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#awaiting" role="tab" aria-controls="profile" aria-selected="false">Unpaid</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#paid" role="tab" aria-controls="profile" aria-selected="false">Paid</a>
                                </li>

                            </ul><br/>
                            <!------------------------------------ End Tab Menu ---------------------------------->

                                <div class="tab-content" id="myTabContent">
                                    <!------------------------------------ Start Tab All ------------------------->
                                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr class="background_color_tr">
                                                        <th class="background_color_td">Purchase #</th>
                                                        <th class="background_color_td">Supplier</th>
                                                        <th class="background_color_td">Date</th>
                                                        <th class="background_color_td">Due Date</th>
                                                        <th class="background_color_td">Paid</th>
                                                        <th class="background_color_td">Due</th>
                                                        <th class="background_color_td">Status</th>
                                                        <th class="background_color_td">Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (count($purchases) > 0)
                                                        @foreach($purchases as $purchase)
                                                            @php
                                                                $amount_paid = 0;
                                                                $due_amount = 0;
                                                                $status = '';

                                                                if($purchase->amount_paid == null && $purchase->due_amount == null){
                                                                    $amount_paid = 0;
                                                                    $due_amount = $purchase->grand_total;
                                                                    $status = 'Unpaid';
                                                                }else if ($purchase->due_amount == 0) {
                                                                    $amount_paid = $purchase->amount_paid;
                                                                    $due_amount = $purchase->due_amount;
                                                                    $status = 'Paid';
                                                                }else{
                                                                    $amount_paid = $purchase->amount_paid;
                                                                    $due_amount = $purchase->due_amount;
                                                                    $status = 'Unpaid';
                                                                }

                                                                $paid = number_format($amount_paid, 4, '.', '');
                                                                $due = number_format($due_amount, 4, '.', '');

                                                                $remove_btn = "";
                                                                if ($due == 0) {
                                                                    $remove_btn = "display:none;";
                                                                }
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $purchase->invoice_number }}</td>
                                                                <td>{{ $purchase->supplier_name }}</td>
                                                                <td>{{ date('d-m-Y', strtotime($purchase->billing_date)) }}</td>
                                                                <td>{{ date('d-m-Y', strtotime($purchase->due_date)) }}</td>
                                                                <td>{{ $paid }}</td>
                                                                <td>{{ $due }}</td>
                                                                <td>{{ $status }}</td>
                                                                <td style="text-align: center;">
                                                                    @if ($button_view_purchase == '1')
                                                                        <a href="javascript:;" onclick="go_to('bsc_purchase_purchase_view/{{ $purchase->id}}')"><i class="far fa-eye"></i></a>
                                                                    @endif
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    @if ($button_edit_purchase == '1')
                                                                        <a href="javascript:" style="{{$remove_btn}}" onclick="go_to('bsc_purchase_purchase_edit_data/{{ $purchase->id}}')"><i class="far fa-edit"></i></a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!------------------------------------ End Tab All -------------------------------->

                                    <!------------------------------------ Start Tab Awaiting ------------------------->
                                    <div class="tab-pane fade" id="awaiting" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="card-body">
                                                        <table id="example2" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr class="background_color_tr">
                                                                    <th class="background_color_td">Purchase #</th>
                                                                    <th class="background_color_td">Supplier</th>
                                                                    <th class="background_color_td">Date</th>
                                                                    <th class="background_color_td">Due Date</th>
                                                                    <th class="background_color_td">Paid</th>
                                                                    <th class="background_color_td">Due</th>
                                                                    <th class="background_color_td">Detail</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (count($purchases) > 0)
                                                                    @foreach($purchases as $purchase)
                                                                        @if($purchase->due_amount == null || $purchase->due_amount != 0)
                                                                            @php
                                                                                $amount_paid = 0;
                                                                                $due_amount = 0;

                                                                                if($purchase->due_amount == null){
                                                                                    $amount_paid = 0;
                                                                                    $due_amount = $purchase->grand_total;
                                                                                }else{
                                                                                    $amount_paid = $purchase->amount_paid;
                                                                                    $due_amount = $purchase->due_amount;
                                                                                }

                                                                                $paid = number_format($amount_paid, 4, '.', '');
                                                                                $due = number_format($due_amount, 4, '.', '');
                                                                            @endphp
                                                                            <tr>
                                                                                <td>{{ $purchase->invoice_number }}</td>
                                                                                <td>{{ $purchase->supplier_name }}</td>
                                                                                <td>{{ date('d-m-Y', strtotime($purchase->billing_date)) }}</td>
                                                                                <td>{{ date('d-m-Y', strtotime($purchase->due_date)) }}</td>
                                                                                <td>{{ $paid }}</td>
                                                                                <td>{{ $due }}</td>
                                                                                <td style="text-align: center;">
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <a href="javascript:;" onclick="go_to('bsc_purchase_purchase_view/{{ $purchase->id}}')"><i class="far fa-eye"></i></a>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <a href="javascript:" onclick="go_to('bsc_purchase_purchase_edit_data/{{ $purchase->id}}')"><i class="far fa-edit"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!------------------------------------ End Tab Awaiting ------------------------->

                                    <!------------------------------------ Start Tab paid --------------------------->
                                    <div class="tab-pane fade" id="paid" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="card-body">
                                                        <table id="example3" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr class="background_color_tr">
                                                                    <th class="background_color_td">Purchase #</th>
                                                                    <th class="background_color_td">Supplier</th>
                                                                    <th class="background_color_td">Date</th>
                                                                    <th class="background_color_td">Due Date</th>
                                                                    <th class="background_color_td">Paid</th>
                                                                    <th class="background_color_td">Due</th>
                                                                    <th class="background_color_td">Detail</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (count($purchases) > 0)
                                                                    @foreach($purchases as $purchase)
                                                                        @if($purchase->due_amount == 0 && $purchase->due_amount != null)

                                                                            @php
                                                                                $paid = $purchase->amount_paid;
                                                                                $amount_paid = number_format($paid, 4, '.', '');

                                                                                $due = $purchase->due_amount;
                                                                                $due_amount = number_format($due, 4, '.', '');

                                                                                $remove_btn = "";
                                                                                if ($due == 0) {
                                                                                    $remove_btn = "display:none;";
                                                                                }
                                                                            @endphp
                                                                            <tr>
                                                                                <td>{{ $purchase->invoice_number }}</td>
                                                                                <td>{{ $purchase->supplier_name }}</td>
                                                                                <td>{{ date('d-m-Y', strtotime($purchase->billing_date)) }}</td>
                                                                                <td>{{ date('d-m-Y', strtotime($purchase->due_date)) }}</td>
                                                                                <td>{{ $amount_paid }}</td>
                                                                                <td>{{ $due_amount }}</td>
                                                                                <td style="text-align: center;">
                                                                                    <a href="javascript:void(0);" onclick="go_to('bsc_purchase_purchase_view/{{ $purchase->id}}')"><i class="far fa-eye"></i></a>
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                    <a href="javascript:" style="{{$remove_btn}}" onclick="go_to('bsc_purchase_purchase_edit_data/{{ $purchase->id}}')"><i class="far fa-edit" value="{{$remove_btn}}"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!------------------------------------ End Tab Paid ------------------------->
                            </div>
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
        $("#example2").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#example3").DataTable({
         "responsive": true,
            "autoWidth": false,
        });
    });

    $('.purchase_form').click(function(e)
    {
        var ld = $(this).attr("value");
        go_to(ld);
    })
    $('.edit').click(function(e)
    {
        var id = $(this).attr("value");
        go_to(id);
    });
    $('.purchase_view').click(function(e)
    {
        var id = $(this).attr("value");
        go_to(id);
    });

</script>

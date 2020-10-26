 
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><strong style="font-size: 25px; margin-top:5px;"><i class="fas fa-list"></i>  List </strong></h1>
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
                                <a  href="#" class="btn btn-success purchase_form"  value="bsc_purchase_purchase_form" id="purchase_form"><i class="fas fa-plus"></i> Add New</a>&nbsp;
                            </div>
                            <!------------------------------------ Start Tab Menu ------------------------->
                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top: 10px;">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#all" role="tab" aria-controls="home" aria-selected="true">All</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#awaiting" role="tab" aria-controls="profile" aria-selected="false">Awaiting Payment</a>
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
                                                    <tr>
                                                        <th>Purchase #</th>
                                                        <th>Supplier</th>
                                                        <th>Date</th>
                                                        <th>Due Date</th>
                                                        <th>Paid</th>
                                                        <th>Due</th>
                                                        <th>Status</th>
                                                        <th>Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($purchases as $purchase)
                                                        @php 
                                                            $amount_paid = 0;
                                                            $due_amount = 0;
                                                            $status = '';
                                                    
                                                            if($purchase->amount_paid == null && $purchase->due_amount == null){
                                                                $amount_paid = 0;
                                                                $due_amount = $purchase->grand_total;
                                                                $status = 'Awaiting Payment';
                                                            }else{
                                                                $amount_paid = $purchase->amount_paid;
                                                                $due_amount = $purchase->due_amount;
                                                                $status = 'Paid'; 
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $purchase->invoice_number }}</td>
                                                            <td>{{ $purchase->supplier_name }}</td>
                                                            <td>{{ $purchase->billing_date }}</td>
                                                            <td>{{ $purchase->due_date }}</td>
                                                            <td>{{ $amount_paid }}</td>
                                                            <td>{{ $due_amount}}</td>
                                                            <td>{{ $status }}</td>
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
                                                    @endforeach
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
                                                                <tr>
                                                                    <th>Purchase #</th>
                                                                    <th>Supplier</th>
                                                                    <th>Date</th>
                                                                    <th>Due Date</th>
                                                                    <th>Paid</th>
                                                                    <th>Due</th>
                                                                    <th>Detail</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
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
                                                                        @endphp
                                                                        <tr>
                                                                            <td>{{ $purchase->invoice_number }}</td>
                                                                            <td>{{ $purchase->supplier_name }}</td>
                                                                            <td>{{ $purchase->billing_date }}</td>
                                                                            <td>{{ $purchase->due_date }}</td>
                                                                            <td>{{ $amount_paid }}</td>
                                                                            <td>{{ $due_amount }}</td>
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
                                                                <tr>
                                                                    <th>Purchase #</th>
                                                                    <th>Supplier</th>
                                                                    <th>Date</th>
                                                                    <th>Due Date</th>
                                                                    <th>Paid</th>
                                                                    <th>Due</th>
                                                                    <th>Detail</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($purchases as $purchase)
                                                                    @if($purchase->due_amount == 0 && $purchase->due_amount != null)
                                                                        <tr>
                                                                            <td>{{ $purchase->invoice_number }}</td>
                                                                            <td>{{ $purchase->supplier_name }}</td>
                                                                            <td>{{ $purchase->billing_date }}</td>
                                                                            <td>{{ $purchase->due_date }}</td>
                                                                            <td>{{ $purchase->amount_paid }}</td>
                                                                            <td>{{ $purchase->due_amount }}</td>
                                                                            <td style="text-align: center;">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <a href="javascript:void(0);" onclick="go_to('bsc_purchase_purchase_view/{{ $purchase->id}}')"><i class="far fa-eye"></i></a>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <a href="javascript:" onclick="go_to('bsc_purchase_purchase_edit_data/{{ $purchase->id}}')"><i class="far fa-edit"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
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
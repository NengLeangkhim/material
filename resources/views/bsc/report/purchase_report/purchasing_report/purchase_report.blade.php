<!-- page content -->
<section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header" style="margin-bottom: 20px;">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-shopping-cart"></i> Purchase Report</strong></h1>
               </div><br/>
               <!-- /.card-header -->
               <div class="tab-content" id="myTabContent">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Billing Date</label><br/>
                                <div class="form-group row form-group-marginless">
                                    <label class="col-lg-2 col-form-label">From</label>
                                    <div class="col-lg-10">
                                        <div class="input-daterange input-group" id="k_datepicker_5">
                                            <input type="date" class="form-control" name="start" id="billing_date_from">
                                            <div class="input-group-append">
                                                <span class="input-group-text">To</span>
                                            </div>
                                            <input type="date" class="form-control" name="end" id="billing_date_to">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Due Date</label><br/>
                                <div class="form-group row form-group-marginless">
                                    <label class="col-lg-2 col-form-label">From</label>
                                    <div class="col-lg-10">
                                        <div class="input-daterange input-group" id="k_datepicker_5">
                                            <input type="date" class="form-control" name="start" id="due_date_from">
                                            <div class="input-group-append">
                                                <span class="input-group-text">To</span>
                                            </div>
                                            <input type="date" class="form-control" name="end" id="due_date_to">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Payment Status <b style="color:red">*</b> </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                    </div>
                                    <select class="form-control input_required" name="payment_status" id="payment_status">
                                        <option value="1" selected>All</option>
                                        <option value="2">Waiting Payment</option>
                                        <option value="3">Paid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" style="text-align: right">
                                <button type="button" class="btn btn-primary save" style="margin-top:31px;" onclick="ReportPurchase()">Search</button>
                            </div>
                        </div>   
                        <div class="row" style="margin-top: 5%;">
                            <div class="col-md-12">
                                <table id="example1" class="table table-bordered table-striped2">
                                    <thead>
                                        <tr>
                                            <th>Purchase#</th>
                                            <th>Supplier</th>
                                            <th>Date</th>
                                            <th>Due Date</th>
                                            <th>Paid</th>
                                            <th>Due</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($purchases) > 0)    
                                            @foreach ($purchases as $purchase)
                                                @php 
                                                    $amount_paid = 0;
                                                    $due_amount = 0;
                                                    $status = '';
                                            
                                                    if($purchase->amount_paid == null && $purchase->due_amount == null){
                                                        $amount_paid = 0;
                                                        $due_amount = $purchase->grand_total;
                                                        $status = 'Waiting Payment';
                                                    }else if ($purchase->due_amount == 0) {
                                                        $amount_paid = $purchase->amount_paid;
                                                        $due_amount = $purchase->due_amount;
                                                        $status = 'Paid'; 
                                                    }else{
                                                        $amount_paid = $purchase->amount_paid;
                                                        $due_amount = $purchase->due_amount;
                                                        $status = 'Waiting Payment'; 
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
                                                    <td>{{ $status }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
               </div>    
            </div>
        </div>
    </section>
    <div id="modal_report_performance">
    </div>

<script>
    $(document).ready(function(){
        // datatable
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });

    function ReportPurchase(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        let billing_date_from = $('#billing_date_from').val();
        let billing_date_to = $('#billing_date_to').val();
        
        let due_date_from = $('#due_date_from').val();
        let due_date_to = $('#due_date_to').val();
        let payment_status = $('#payment_status').val();

        $.ajax({
            type:"POST",
            url:'/bsc_purchase_purchase_report',
            data:{
                _token: CSRF_TOKEN,
                billing_date_from : billing_date_from,
                billing_date_to   : billing_date_to,
                due_date_from     : due_date_from,
                due_date_to       : due_date_to,
                payment_status    : payment_status
            },
            dataType:"JSON",
            success:function(data){

                $("#example1").DataTable().destroy();
                $("#example1 tbody").empty();
                let tr = "";
                if(data.length > 0){
                    $.each(data, function(i, value) {
                        let amount_paid = 0;
                        let due_amount = 0;
                        let status = '';
    
                        if(value.amount_paid == null && value.due_amount == null){
                            amount_paid = 0;
                            due_amount = value.grand_total;
                            status = 'Waiting Payment';
                        }else if(value.due_amount == 0){
                            amount_paid = value.amount_paid;
                            due_amount =  value.due_amount;
                            status = 'Paid'; 
                        }else{
                            amount_paid = value.amount_paid;
                            due_amount =  value.due_amount;
                            status = 'Waiting Payment'; 
                        }
                        if(payment_status == '2'){
                            if(value.due_amount == null || value.due_amount != 0){
                                
                                tr += "<tr><td>"+value.invoice_number+"</td><td>"+value.supplier_name+"</td><td>"+moment(value.billing_date).format('DD-MM-YYYY')+"</td><td>"+moment(value.due_date).format('DD-MM-YYYY')+"</td><td>"+parseFloat(amount_paid).toFixed(4)+"</td><td>"+parseFloat(due_amount).toFixed(4)+"</td><td>"+status+"</td></tr>";
                            }
                        }else if(payment_status == '3'){
                            if(value.due_amount == 0 && value.due_amount != null){
                                
                                tr += "<tr><td>"+value.invoice_number+"</td><td>"+value.supplier_name+"</td><td>"+moment(value.billing_date).format('DD-MM-YYYY')+"</td><td>"+moment(value.due_date).format('DD-MM-YYYY')+"</td><td>"+parseFloat(amount_paid).toFixed(4)+"</td><td>"+parseFloat(due_amount).toFixed(4)+"</td><td>"+status+"</td></tr>";
                            }
                        }else{
                            tr += "<tr><td>"+value.invoice_number+"</td><td>"+value.supplier_name+"</td><td>"+moment(value.billing_date).format('DD-MM-YYYY')+"</td><td>"+moment(value.due_date).format('DD-MM-YYYY')+"</td><td>"+parseFloat(amount_paid).toFixed(4)+"</td><td>"+parseFloat(due_amount).toFixed(4)+"</td><td>"+status+"</td></tr>";
                        }
                    });
                }
                $("#example1").append(tr);
                $('#example1').DataTable();
            }
        });
    }
</script>

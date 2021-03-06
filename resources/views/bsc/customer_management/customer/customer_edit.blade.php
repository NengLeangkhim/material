<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="fas fa-user-plus"></i></span> Create Customer</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="" class="lead" ​value="lead">Customers</a></li>
                    <li class="breadcrumb-item active">New Customer</li>
                </ol>
            </div>
        </div>
     </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <form id="frm_customer_service_detail" method="POST">
                    @csrf
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header" style="background:#1fa8e0">
                            <h3 class="card-title">Customer</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Lead Name<b class="color_label"> *</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                            </div>
                                            <select class="form-control select2" name="lead_name" id="lead_name" required onchange="myCustomer(this)">
                                                <option selected hidden disabled>select item</option>
                                                @if (count($customers) >0)
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->customer_name_en }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Customer Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                            </div>
                                            <input class="form-control" type="text" id="customer_name" name="customer_name" placeholder="Customer Name" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Deposit</label>
                                        <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-building"></i></span>
                                           </div>
                                           <input type="text" class="form-control" name="deposit" id="deposit" placeholder="Deposit" readonly>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <label for="exampleInputEmail1">Balance</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-building"></i></span>
                                          </div>
                                          <input type="text" class="form-control" name="balance" id="balance" placeholder="Balance" readonly>
                                      </div>
                                   </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Invoice Balance</label>
                                        <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-building"></i></span>
                                           </div>
                                           <input type="text" class="form-control" name="invoice_balance" id="invoice_balance" placeholder="Invoice Balance" readonly>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <label for="exampleInputEmail1">Vat Type</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-building"></i></span>
                                          </div>
                                          <input type="text" class="form-control" name="vat_type" id="vat_type" placeholder="Vat Type" readonly>
                                      </div>
                                   </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Vat Number</label>
                                        <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-building"></i></span>
                                           </div>
                                           <input type="text" class="form-control" name="vat_number" id="vat_number" placeholder="Vat Number" readonly>
                                       </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Lead Branch<b class="color_label"> *</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                            </div>
                                            <select class="form-control select2" name="lead_branch" id="lead_branch" required onchange="myCustomer(this)">
                                                <option selected hidden disabled>select item</option>
                                                {{-- @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->customer_name_en }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        {{-- <label for="status">Status</label>
                                        <div class="custom-control custom-switch">
                                            <input
                                            @if ($ch_account_by_ids->status==true)
                                                checked
                                            @endif
                                                type="checkbox" class="custom-control-input" id="status" name="status" value="1">
                                            <label class="custom-control-label" for="status"></label>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Branch Name</label>
                                        <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-building"></i></span>
                                           </div>
                                           <input type="text" class="form-control" name="branch_name" id="branch_name" placeholder="Branch Name" readonly>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <label for="exampleInputEmail1">Address</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-building"></i></span>
                                          </div>
                                          <input type="text" class="form-control" name="address" id="address" placeholder="Address" readonly>
                                      </div>
                                   </div>
                                </div>
                            </div>

                            <br>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary save" id="frm_btn_sub_add_cus_service_detail">Update</button>
                                <button type="button" class="btn btn-danger" onclick="go_to('bsc_customer')">Cencel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });

    // submit on form
    $("#frm_btn_sub_add_cus_service_detail").click(function(){
        submit_form ('/bsc_customer_service_detail_insert','frm_customer_service_detail','bsc_customer_service_detail');
    });

    // onclick on lead name
    function myCustomer(id)
    {
        let lead_id=id.value;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:"POST",
                url:'/bsc_customer_onchange',
                data:{
                    _token: CSRF_TOKEN,
                    lead_id     : lead_id
                },
                dataType: "JSON",
                success:function(data){
                    if(data.length >0){

                    }
                }
            });
    }
</script>


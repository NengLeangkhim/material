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
                <form id="frm_customer" method="POST">
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
                                                <option selected hidden readonly>select item</option>
                                                {{-- @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->customer_name_en }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Lead Branch<b class="color_label"> *</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                            </div>
                                            <select class="form-control select2" name="lead_branch" id="lead_branch" required onchange="myCustomer(this)">
                                                <option selected hidden readonly>select item</option>
                                                {{-- @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->customer_name_en }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
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
                                <button type="button" class="btn btn-primary save" id="frm_btn_sub_add_customer">Save</button>
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
    $("#frm_btn_sub_add_customer").click(function(){
        submit_form ('/bsc_customer_insert','frm_customer','bsc_customer');
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
                    console.log(data);
                    $('#customer_name').val(data.customer_name_en);
                    $('#deposit').val(data.deposit);
                    $('#balance').val(data.balance);
                    $('#invoice_balance').val(data.invoice_balance);
                    $('#vat_type').val(data.vat_type);
                    $('#vat_number').val(data.vat_number);
                }
            });
    }
</script>


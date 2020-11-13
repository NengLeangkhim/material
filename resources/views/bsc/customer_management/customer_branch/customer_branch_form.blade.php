<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="fas fa-user-plus"></i></span> Create Customer Branch</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="" class="lead" ​value="lead">Customer Branch</a></li>
                    <li class="breadcrumb-item active">New Customer Branch</li>
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
                <form id="frm_customer_branch" method="POST">
                    @csrf
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header" style="background:#1fa8e0">
                            <h3 class="card-title">Customer Branch</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Customer Name<b class="color_label"> *</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                            </div>
                                            <select class="form-control select2" name="customer_name" id="customer_name" required onchange="myCustomer(this)">
                                                <option selected hidden disabled>select item</option>
                                                @if (count($customers) >0)
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}" data-lead_id="{{ $customer->crm_lead_id }}">{{ $customer->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Lead Branch<b class="color_label"> *</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                            </div>
                                            <select class="form-control select2" name="lead_branch"  id="lead_branch" onchange="myBranch(this)" required>

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
                                          <input type="hidden" id="crm_lead_address_id" name="crm_lead_address_id">
                                        </div>
                                   </div>
                                </div>
                            </div>

                            <br>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary save" id="frm_btn_sub_add_customer_branch">Save</button>
                                <button type="button" class="btn btn-danger" onclick="go_to('bsc_customer_branch')">Cencel</button>
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
    $("#frm_btn_sub_add_customer_branch").click(function(){
        submit_form ('/bsc_customer_branch_insert','frm_customer_branch','bsc_customer_branch');
    });

    // onchange get lead branch by id
    function myCustomer(id)
    {
        let lead_id = $('select option:selected').attr('data-lead_id');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:"POST",
                url:'/bsc_customer_branch_onchange',
                data:{
                    _token: CSRF_TOKEN,
                    lead_id     : lead_id
                },
                dataType: "JSON",
                success:function(data){
                    let item='';
                    if(data.length >0){
                        $.each(data, function(i, value) {
                            item+='<option value="'+value.id+'">'+value.name_en+'</option>';
                        });
                        let items='<option selected hidden disabled>select item</option>'+item;
                        document.getElementById('lead_branch').innerHTML=items;
                    }
                }
            });
    }

    // onchange on lead branch
    function myBranch(id)
    {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:"POST",
                url:'/bsc_customer_lead_branch_onchange',
                data:{
                    _token: CSRF_TOKEN,
                    lead_branch_id     : id.value
                },
                dataType: "JSON",
                success:function(data){
                    $('#address').val(data.gazetteer_code);
                    $('#branch_name').val(data.name_en);
                    $('#crm_lead_address_id').val(data.crm_lead_address_id);
                }
            });
    }
</script>


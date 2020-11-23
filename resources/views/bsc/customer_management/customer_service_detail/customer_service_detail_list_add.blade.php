<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4><span><i class="fas fa-user-plus"></i></span> Create New Customer Service</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="" class="lead" ​value="lead">Customer Service</a></li>
                    <li class="breadcrumb-item active">New Customer Service</li>
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
                            <h3 class="card-title">Customer Service Detail</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Customer Service<b class="color_label"> *</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                            </div>
                                            <select class="form-control select2" name="customer_service" id="customer_service" required>
                                                <option selected hidden disabled>select item</option>
                                                @if (count($customer_services) >0)
                                                    @foreach ($customer_services as $customer_service)
                                                        <option value="{{ $customer_service->id }}">{{ $customer_service->customer_name." / ".$customer_service->customer_branch." / ".$customer_service->service_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Service Detail Status<b class="color_label"> *</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                            </div>
                                            <select class="form-control select2" name="service_status_detail" id="service_status_detail" required>
                                                <option selected hidden disabled>select item</option>
                                                <option value="new">New</option>
                                                <option value="extended">Extended</option>
                                                <option value="suspended">Suspended</option>
                                                <option value="block">Block</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Effectvice Date<b class="color_label"> *</b></label>
                                        <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-building"></i></span>
                                           </div>
                                           <input type="date" class="form-control" name="effective_date" id="effective_date" required>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <label for="exampleInputEmail1">End Period Date<b class="color_label"> *</b></label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-building"></i></span>
                                          </div>
                                          <input type="date" class="form-control" name="end_period_date" id="end_period_date" required>
                                      </div>
                                   </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary save" id="frm_btn_sub_add_cus_service_detail">Save</button>
                                <button type="button" class="btn btn-danger" onclick="go_to('bsc_customer_service_detail')">Cancel</button>
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
</script>


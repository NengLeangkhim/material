<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="fas fa-user-edit"></i></span>Update Customer Service</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="" class="lead" ​value="lead">Customer Service</a></li>
                    <li class="breadcrumb-item active">Update Customer Service</li>
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
                <form id="frm_customer_service_detail" method="POST" action="">
                    @csrf
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header" style="background:#1fa8e0">
                            <h3 class="card-title">Customer Service Detail</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <input type="hidden" value="{{ $customer_service_details->id }}" name="customer_service_detail_id" id="customer_service_detail_id">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Customer Service<b class="color_label"> *</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                            </div>
                                            <select class="form-control select2" name="customer_service" required>
                                                <option selected hidden disabled>select item</option>
                                                @if (count($customer_services) >0)
                                                    @foreach ($customer_services as $customer_service)
                                                        <option
                                                            @if ($customer_service_details->ma_customer_service_id==$customer_service->id)
                                                                selected
                                                            @endif
                                                            value="{{ $customer_service->id }}">{{ $customer_service->customer_name." / ".$customer_service->customer_branch." / ".$customer_service->service_name }}
                                                        </option>
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
                                                <option value="new" @if ($customer_service_details->service_status=='new')
                                                    selected
                                                @endif>New</option>
                                                <option value="extended" @if ($customer_service_details->service_status=='extended')
                                                    selected
                                                @endif>Extended</option>
                                                <option value="suspended" @if ($customer_service_details->service_status=='suspended')
                                                    selected
                                                @endif>Suspended</option>
                                                <option value="block" @if ($customer_service_details->service_status=='block')
                                                    selected
                                                @endif>Block</option>
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
                                           <input required type="date" class="form-control" value="{{ $edate=explode(" ",$customer_service_details->effective_date)[0] }}" name="effective_date" id="effective_date">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <label for="exampleInputEmail1">End Period Date<b class="color_label"> *</b></label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-building"></i></span>
                                          </div>
                                          <input required type="date" class="form-control" value="{{ $edate=explode(" ",$customer_service_details->end_period_date)[0] }}" name="end_period_date" id="end_period_date">
                                      </div>
                                   </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="status">Status</label>
                                        <div class="custom-control custom-switch">
                                            <input
                                            @if ($customer_service_details->status==true)
                                                checked
                                            @endif
                                                type="checkbox" class="custom-control-input" id="status" name="status" value="1">
                                            <label class="custom-control-label" for="status"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary save" id="frm_btn_sub_add_customer_service_detail">Update</button>
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
    $("#frm_btn_sub_add_customer_service_detail").click(function(){
        submit_form ('/bsc_customer_service_detail_update','frm_customer_service_detail','bsc_customer_service_detail');
    });
</script>

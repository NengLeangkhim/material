<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="fas fa-user-plus"></i></span> Create New Customer Service</h1>
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
                <form id="frm_chart_account" action="">
                    @csrf
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header" style="background:#1fa8e0">
                            <h3 class="card-title">Customer Service Detail</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1">Customer Service<b class="color_label"> *</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                            </div>
                                            <select class="form-control select2" name="customer_service" >
                                                <option selected hidden disabled>select item</option>
                                                <option>Exclusive</option>
                                                <option>Inclusive</option>
                                                <option>Oppa</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                         <label for="exampleInputEmail1">Effectvice Date<b class="color_label"> *</b></label>
                                         <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <input type="date" class="form-control" name="effective_date" id="exampleInputEmail1" placeholder="Code" >
                                        </div>
                                     </div>
                                     <div class="col-md-4">
                                        <label for="exampleInputEmail1">End Period Date<b class="color_label"> *</b></label>
                                        <div class="input-group">
                                           <div class="input-group-prepend">
                                               <span class="input-group-text"><i class="fas fa-building"></i></span>
                                           </div>
                                           <input type="date" class="form-control" name="end_period_date" id="exampleInputEmail1" placeholder="Code" >
                                       </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary save" id="frm_btn_sub_add_chart_account">Save</button>
                                <button type="button" class="btn btn-danger" onclick="go_to('customer_service_detail')">Cencel</button>
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
</script>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user"></i> Customer Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">View Customers</li>
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
                <div class="row​ margin_left">
                    {{-- {!! $button_add !!}&nbsp; --}}
                </div><br/>
                <div class="card">
                    {{-- ======================= Start Tab menu =================== --}}
                    <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#new_cus" role="tab" aria-controls="home" aria-selected="true">New Customer</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#closed_cus" role="tab" aria-controls="profile" aria-selected="false">Customer Closed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#active_cus" role="tab" aria-controls="profile" aria-selected="false">Customer Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#suspend_cus" role="tab" aria-controls="profile" aria-selected="false">Customer Suspend</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#locked_cus" role="tab" aria-controls="profile" aria-selected="false">Customer Locked</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#unpaid_cus" role="tab" aria-controls="profile" aria-selected="false">Unpaid Customer</a>
                        </li>
                    </ul><br/>
                    {{-- ======================= End Tab menu =================== --}}
                    <div class="tab-content" id="myTabContent">
                        {{-- ================ start tap new customer ============ --}}
                        <div class="tab-pane fade show active" id="new_cus" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Customers(EN):</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="new_customer_en" id="new_customer_en">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-lg-5 col-form-label">Connection:</label>
                                                <div class="col-md-7" style="padding-left: 0px">
                                                    <select class="form-control select2 input_required" name="new_connection" id="new_connection">
                                                        <option value="" selected hidden disabled>select item</option>
                                                        <option value="">TT-001</option>
                                                        <option value="">TT-002</option>
                                                        <option value="">TT-003</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">&nbsp;
                                            <a title="Show More" href="#"   value="" id="new_show_">show</a>
                                            <a style="display: none" title="Hide" href="#"   value="" id="new_hide_">Hide</a>
                                            &nbsp;&nbsp;
                                            <button type="button" class="btn btn-info" id="new_search" onclick="newSearch()">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group new_hide_show" style="display: none">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Province:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control select2 input_required" name="new_province" id="new_province">
                                                        <option value="" selected hidden disabled>select item</option>
                                                        <option value="">TT-001</option>
                                                        <option value="">TT-002</option>
                                                        <option value="">TT-003</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row form-group-marginless">
                                                <label class="col-lg-3 col-form-label">Start Bill:</label>
                                                <div class="col-lg-9">
                                                    <div class="input-daterange input-group" id="k_datepicker_5">
                                                        <input type="date" class="form-control" name="new_start_bill" id="new_start_bill">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><strong>To</strong></span>
                                                        </div>
                                                        <input type="date" class="form-control" name="new_end_bill" id="new_end_bill">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group new_hide_show" style="display: none">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Commune:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control select2 input_required" name="new_commune" id="new_commune">
                                                        <option value="" selected hidden disabled>select item</option>
                                                        <option value="">TT-001</option>
                                                        <option value="">TT-002</option>
                                                        <option value="">TT-003</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row form-group-marginless">
                                                <label class="col-lg-3 col-form-label">Register:</label>
                                                <div class="col-lg-9">
                                                    <div class="input-daterange input-group" id="k_datepicker_5">
                                                        <input type="date" class="form-control" name="new_start_register" id="new_start_register">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><strong>To</strong></span>
                                                        </div>
                                                        <input type="date" class="form-control" name="new_end_register" id="new_end_register">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group new_hide_show" style="display: none">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">District:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control select2 input_required" name="new_district" id="new_district">
                                                        <option value="" selected hidden disabled>select item</option>
                                                        <option value="">TT-001</option>
                                                        <option value="">TT-002</option>
                                                        <option value="">TT-003</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Seller:</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2 input_required" name="new_seller" id="new_seller">
                                                        <option value="" selected hidden disabled>select item</option>
                                                        <option value="">TT-001</option>
                                                        <option value="">TT-002</option>
                                                        <option value="">TT-003</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group new_hide_show" style="display: none">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Village:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control select2 input_required" name="new_village" id="new_village">
                                                        <option value="" selected hidden disabled>select item</option>
                                                        <option value="">TT-001</option>
                                                        <option value="">TT-002</option>
                                                        <option value="">TT-003</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Branch:</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2 input_required" name="new_branch" id="new_branch">
                                                        <option value="" selected hidden disabled>select item</option>
                                                        <option value="">TT-001</option>
                                                        <option value="">TT-002</option>
                                                        <option value="">TT-003</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row new_hide_show"  style="display: none">
                                                <label class="col-lg-4 col-form-label">Status:</label>
                                                <div class="col-md-8">
                                                    <select class="form-control select2 input_required" name="new_status" id="new_status">
                                                        <option value="" selected hidden disabled>select item</option>
                                                        <option value="">TT-001</option>
                                                        <option value="">TT-002</option>
                                                        <option value="">TT-003</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped" style="white-space: nowrap">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">CIF</th>
                                                <th class="background_color_td">CID</th>
                                                <th class="background_color_td">Customer</th>
                                                <th class="background_color_td">Customer KH</th>
                                                <th class="background_color_td">Account Name</th>
                                                <th class="background_color_td">Create Date</th>
                                                <th class="background_color_td">Finishdate</th>
                                                <th class="background_color_td">Bill Date</th>
                                                <th class="background_color_td">VAT Type</th>
                                                <th class="background_color_td">VAT Number</th>
                                                <th class="background_color_td">Branch</th>
                                                <th class="background_color_td">Mobile Phone</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Startbilling Date</th>
                                                <th class="background_color_td">Service Package</th>
                                                <th class="background_color_td">Pay</th>
                                                <th class="background_color_td">Free</th>
                                                <th class="background_color_td">Monthly</th>
                                                <th class="background_color_td">Discount</th>
                                                <th class="background_color_td">Type</th>
                                                <th class="background_color_td">Speed</th>
                                                <th class="background_color_td">Seller</th>
                                                <th class="background_color_td">Status</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- ================ end tap new customer ============ --}}

                        {{-- ================ start tap closed customer ======= --}}
                        <div class="tab-pane fade" id="closed_cus" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-content" id="myTabContent">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Customers(EN):</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="closed_customer_en" id="closed_customer_en">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-lg-5 col-form-label">Connection:</label>
                                                    <div class="col-md-7" style="padding-left: 0px">
                                                        <select class="form-control select2 input_required" name="closed_connection" id="closed_connection">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">&nbsp;
                                                <a title="Show More" href="#"   value="" id="closed_show_">show</a>
                                                <a style="display: none" title="Hide" href="#"   value="" id="closed_hide_">Hide</a>
                                                &nbsp;&nbsp;
                                                <button type="button" class="btn btn-info" id="closed_search" onclick="closedSearch()">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group closed_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Province:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="closed_province" id="closed_province">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row form-group-marginless">
                                                    <label class="col-lg-3 col-form-label">Start Bill:</label>
                                                    <div class="col-lg-9">
                                                        <div class="input-daterange input-group" id="k_datepicker_5">
                                                            <input type="date" class="form-control" name="closed_start_bill" id="closed_start_bill">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><strong>To</strong></span>
                                                            </div>
                                                            <input type="date" class="form-control" name="closed_end_bill" id="closed_end_bill">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group closed_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Commune:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="closed_commune" id="closed_commune">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row form-group-marginless">
                                                    <label class="col-lg-3 col-form-label">Register:</label>
                                                    <div class="col-lg-9">
                                                        <div class="input-daterange input-group" id="k_datepicker_5">
                                                            <input type="date" class="form-control" name="closed_start_register" id="closed_start_register">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><strong>To</strong></span>
                                                            </div>
                                                            <input type="date" class="form-control" name="closed_end_register" id="closed_end_register">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group closed_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">District:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="closed_district" id="closed_district">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Seller:</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control select2 input_required" name="closed_seller" id="closed_seller">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group closed_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Village:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="closed_village" id="closed_village">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Branch:</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control select2 input_required" name="closed_branch" id="closed_branch">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row closed_hide_show"  style="display: none">
                                                    <label class="col-lg-4 col-form-label">Status:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="closed_status" id="closed_status">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <div class="table-responsive" style="padding-top: 20px">
                                    <table id="example2" class="table table-bordered table-striped" style="white-space: nowrap">
                                        <thead>
                                            <tr class="background_color_tr">
                                                <th class="background_color_td">CIF</th>
                                                <th class="background_color_td">CID</th>
                                                <th class="background_color_td">Customer</th>
                                                <th class="background_color_td">Customer KH</th>
                                                <th class="background_color_td">Account Name</th>
                                                <th class="background_color_td">Create Date</th>
                                                <th class="background_color_td">Finishdate</th>
                                                <th class="background_color_td">Bill Date</th>
                                                <th class="background_color_td">VAT Type</th>
                                                <th class="background_color_td">VAT Number</th>
                                                <th class="background_color_td">Branch</th>
                                                <th class="background_color_td">Mobile Phone</th>
                                                <th class="background_color_td">Email</th>
                                                <th class="background_color_td">Startbilling Date</th>
                                                <th class="background_color_td">Service Package</th>
                                                <th class="background_color_td">Pay</th>
                                                <th class="background_color_td">Free</th>
                                                <th class="background_color_td">Monthly</th>
                                                <th class="background_color_td">Discount</th>
                                                <th class="background_color_td">Type</th>
                                                <th class="background_color_td">Speed</th>
                                                <th class="background_color_td">Seller</th>
                                                <th class="background_color_td">Status</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        {{-- ================ end tap closed customer ========= --}}
                        {{-- ================ start tap active customer ======= --}}
                        <div class="tab-pane fade" id="active_cus" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-content" id="myTabContent">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Customers(EN):</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="active_customer_en" id="active_customer_en">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-lg-5 col-form-label">Connection:</label>
                                                    <div class="col-md-7" style="padding-left: 0px">
                                                        <select class="form-control select2 input_required" name="active_connection" id="active_connection">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">&nbsp;
                                                <a title="Show More" href="#"   value="" id="active_show_">show</a>
                                                <a style="display: none" title="Hide" href="#"   value="" id="active_hide_">Hide</a>
                                                &nbsp;&nbsp;
                                                <button type="button" class="btn btn-info" id="active_search" onclick="activeSearch()">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group active_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Province:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="active_province" id="active_province">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row form-group-marginless">
                                                    <label class="col-lg-3 col-form-label">Start Bill:</label>
                                                    <div class="col-lg-9">
                                                        <div class="input-daterange input-group" id="k_datepicker_5">
                                                            <input type="date" class="form-control" name="active_start_bill" id="active_start_bill">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><strong>To</strong></span>
                                                            </div>
                                                            <input type="date" class="form-control" name="active_end_bill" id="active_end_bill">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group active_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Commune:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="active_commune" id="active_commune">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row form-group-marginless">
                                                    <label class="col-lg-3 col-form-label">Register:</label>
                                                    <div class="col-lg-9">
                                                        <div class="input-daterange input-group" id="k_datepicker_5">
                                                            <input type="date" class="form-control" name="active_start_register" id="active_start_register">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><strong>To</strong></span>
                                                            </div>
                                                            <input type="date" class="form-control" name="active_end_register" id="active_end_register">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group active_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">District:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="active_district" id="active_district">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Seller:</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control select2 input_required" name="active_seller" id="active_seller">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group active_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Village:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="active_village" id="active_village">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Branch:</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control select2 input_required" name="active_branch" id="active_branch">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row active_hide_show"  style="display: none">
                                                    <label class="col-lg-4 col-form-label">Status:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="active_status" id="active_status">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive" style="padding-top: 20px">
                                        <table id="example3" class="table table-bordered table-striped" style="white-space: nowrap">
                                            <thead>
                                                <tr class="background_color_tr">
                                                    <th class="background_color_td">CIF</th>
                                                    <th class="background_color_td">CID</th>
                                                    <th class="background_color_td">Customer</th>
                                                    <th class="background_color_td">Customer KH</th>
                                                    <th class="background_color_td">Account Name</th>
                                                    <th class="background_color_td">Create Date</th>
                                                    <th class="background_color_td">Finishdate</th>
                                                    <th class="background_color_td">Bill Date</th>
                                                    <th class="background_color_td">VAT Type</th>
                                                    <th class="background_color_td">VAT Number</th>
                                                    <th class="background_color_td">Branch</th>
                                                    <th class="background_color_td">Mobile Phone</th>
                                                    <th class="background_color_td">Email</th>
                                                    <th class="background_color_td">Startbilling Date</th>
                                                    <th class="background_color_td">Service Package</th>
                                                    <th class="background_color_td">Pay</th>
                                                    <th class="background_color_td">Free</th>
                                                    <th class="background_color_td">Monthly</th>
                                                    <th class="background_color_td">Discount</th>
                                                    <th class="background_color_td">Type</th>
                                                    <th class="background_color_td">Speed</th>
                                                    <th class="background_color_td">Seller</th>
                                                    <th class="background_color_td">Status</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- ================ end tap active customer ========= --}}
                        {{-- ================ start tap suspend customer ======= --}}
                        <div class="tab-pane fade" id="suspend_cus" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-content" id="myTabContent">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Customers(EN):</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="suspend_customer_en" id="suspend_customer_en">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-lg-5 col-form-label">Connection:</label>
                                                    <div class="col-md-7" style="padding-left: 0px">
                                                        <select class="form-control select2 input_required" name="suspend_connection" id="suspend_connection">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">&nbsp;
                                                <a title="Show More" href="#"   value="" id="suspend_show_">show</a>
                                                <a style="display: none" title="Hide" href="#"   value="" id="suspend_hide_">Hide</a>
                                                &nbsp;&nbsp;
                                                <button type="button" class="btn btn-info" id="suspend_search" onclick="suspendSearch()">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group suspend_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Province:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="suspend_province" id="suspend_province">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row form-group-marginless">
                                                    <label class="col-lg-3 col-form-label">Start Bill:</label>
                                                    <div class="col-lg-9">
                                                        <div class="input-daterange input-group" id="k_datepicker_5">
                                                            <input type="date" class="form-control" name="suspend_start_bill" id="suspend_start_bill">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><strong>To</strong></span>
                                                            </div>
                                                            <input type="date" class="form-control" name="suspend_end_bill" id="suspend_end_bill">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group suspend_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Commune:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="suspend_commune" id="suspend_commune">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row form-group-marginless">
                                                    <label class="col-lg-3 col-form-label">Register:</label>
                                                    <div class="col-lg-9">
                                                        <div class="input-daterange input-group" id="k_datepicker_5">
                                                            <input type="date" class="form-control" name="suspend_start_register" id="suspend_start_register">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><strong>To</strong></span>
                                                            </div>
                                                            <input type="date" class="form-control" name="suspend_end_register" id="suspend_end_register">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group suspend_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">District:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="suspend_district" id="suspend_district">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Seller:</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control select2 input_required" name="suspend_seller" id="suspend_seller">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group suspend_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Village:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="suspend_village" id="suspend_village">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Branch:</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control select2 input_required" name="suspend_branch" id="suspend_branch">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row suspend_hide_show"  style="display: none">
                                                    <label class="col-lg-4 col-form-label">Status:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="suspend_status" id="suspend_status">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive" style="padding-top: 20px">
                                        <table id="example4" class="table table-bordered table-striped" style="white-space: nowrap">
                                            <thead>
                                                <tr class="background_color_tr">
                                                    <th class="background_color_td">CIF</th>
                                                    <th class="background_color_td">CID</th>
                                                    <th class="background_color_td">Customer</th>
                                                    <th class="background_color_td">Customer KH</th>
                                                    <th class="background_color_td">Account Name</th>
                                                    <th class="background_color_td">Create Date</th>
                                                    <th class="background_color_td">Finishdate</th>
                                                    <th class="background_color_td">Bill Date</th>
                                                    <th class="background_color_td">VAT Type</th>
                                                    <th class="background_color_td">VAT Number</th>
                                                    <th class="background_color_td">Branch</th>
                                                    <th class="background_color_td">Mobile Phone</th>
                                                    <th class="background_color_td">Email</th>
                                                    <th class="background_color_td">Startbilling Date</th>
                                                    <th class="background_color_td">Service Package</th>
                                                    <th class="background_color_td">Pay</th>
                                                    <th class="background_color_td">Free</th>
                                                    <th class="background_color_td">Monthly</th>
                                                    <th class="background_color_td">Discount</th>
                                                    <th class="background_color_td">Type</th>
                                                    <th class="background_color_td">Speed</th>
                                                    <th class="background_color_td">Seller</th>
                                                    <th class="background_color_td">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- ================ end tap suspend customer ========= --}}
                        {{-- ================ start tap locked customer ======= --}}
                        <div class="tab-pane fade" id="locked_cus" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-content" id="myTabContent">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Customers(EN):</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="locked_customer_en" id="locked_customer_en">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-lg-5 col-form-label">Connection:</label>
                                                    <div class="col-md-7" style="padding-left: 0px">
                                                        <select class="form-control select2 input_required" name="locked_connection" id="locked_connection">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">&nbsp;
                                                <a title="Show More" href="#"   value="" id="locked_show_">show</a>
                                                <a style="display: none" title="Hide" href="#"   value="" id="locked_hide_">Hide</a>
                                                &nbsp;&nbsp;
                                                <button type="button" class="btn btn-info" id="locked_search" onclick="lockedSearch()">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group locked_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Province:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="locked_province" id="locked_province">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row form-group-marginless">
                                                    <label class="col-lg-3 col-form-label">Start Bill:</label>
                                                    <div class="col-lg-9">
                                                        <div class="input-daterange input-group" id="k_datepicker_5">
                                                            <input type="date" class="form-control" name="locked_start_bill" id="locked_start_bill">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><strong>To</strong></span>
                                                            </div>
                                                            <input type="date" class="form-control" name="locked_end_bill" id="locked_end_bill">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group locked_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Commune:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="locked_commune" id="locked_commune">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row form-group-marginless">
                                                    <label class="col-lg-3 col-form-label">Register:</label>
                                                    <div class="col-lg-9">
                                                        <div class="input-daterange input-group" id="k_datepicker_5">
                                                            <input type="date" class="form-control" name="locked_start_register" id="locked_start_register">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><strong>To</strong></span>
                                                            </div>
                                                            <input type="date" class="form-control" name="locked_end_register" id="locked_end_register">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group locked_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">District:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="locked_district" id="locked_district">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Seller:</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control select2 input_required" name="locked_seller" id="locked_seller">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group locked_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Village:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="locked_village" id="locked_village">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Branch:</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control select2 input_required" name="locked_branch" id="locked_branch">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row locked_hide_show"  style="display: none">
                                                    <label class="col-lg-4 col-form-label">Status:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="locked_status" id="locked_status">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive" style="padding-top: 20px">
                                        <table id="example5" class="table table-bordered table-striped" style="white-space: nowrap">
                                            <thead>
                                                <tr class="background_color_tr">
                                                    <th class="background_color_td">CIF</th>
                                                    <th class="background_color_td">CID</th>
                                                    <th class="background_color_td">Customer</th>
                                                    <th class="background_color_td">Customer KH</th>
                                                    <th class="background_color_td">Account Name</th>
                                                    <th class="background_color_td">Create Date</th>
                                                    <th class="background_color_td">Finishdate</th>
                                                    <th class="background_color_td">Bill Date</th>
                                                    <th class="background_color_td">VAT Type</th>
                                                    <th class="background_color_td">VAT Number</th>
                                                    <th class="background_color_td">Branch</th>
                                                    <th class="background_color_td">Mobile Phone</th>
                                                    <th class="background_color_td">Email</th>
                                                    <th class="background_color_td">Startbilling Date</th>
                                                    <th class="background_color_td">Service Package</th>
                                                    <th class="background_color_td">Pay</th>
                                                    <th class="background_color_td">Free</th>
                                                    <th class="background_color_td">Monthly</th>
                                                    <th class="background_color_td">Discount</th>
                                                    <th class="background_color_td">Type</th>
                                                    <th class="background_color_td">Speed</th>
                                                    <th class="background_color_td">Seller</th>
                                                    <th class="background_color_td">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- ================ end tap locked customer ========= --}}
                        {{-- ================ start tap unpaid customer ======= --}}
                        <div class="tab-pane fade" id="unpaid_cus" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-content" id="myTabContent">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Customers(EN):</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="unpaid_customer_en" id="unpaid_customer_en">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-lg-5 col-form-label">Connection:</label>
                                                    <div class="col-md-7" style="padding-left: 0px">
                                                        <select class="form-control select2 input_required" name="unpaid_connection" id="unpaid_connection">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">&nbsp;
                                                <a title="Show More" href="#"   value="" id="unpaid_show_">show</a>
                                                <a style="display: none" title="Hide" href="#"   value="" id="unpaid_hide_">Hide</a>
                                                &nbsp;&nbsp;
                                                <button type="button" class="btn btn-info" id="unpaid_search" onclick="unpaidSearch()">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group unpaid_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Province:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="unpaid_province" id="unpaid_province">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row form-group-marginless">
                                                    <label class="col-lg-3 col-form-label">Start Bill:</label>
                                                    <div class="col-lg-9">
                                                        <div class="input-daterange input-group" id="k_datepicker_5">
                                                            <input type="date" class="form-control" name="unpaid_start_bill" id="unpaid_start_bill">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><strong>To</strong></span>
                                                            </div>
                                                            <input type="date" class="form-control" name="unpaid_end_bill" id="unpaid_end_bill">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group unpaid_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Commune:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="unpaid_commune" id="unpaid_commune">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row form-group-marginless">
                                                    <label class="col-lg-3 col-form-label">Register:</label>
                                                    <div class="col-lg-9">
                                                        <div class="input-daterange input-group" id="k_datepicker_5">
                                                            <input type="date" class="form-control" name="unpaid_start_register" id="unpaid_start_register">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><strong>To</strong></span>
                                                            </div>
                                                            <input type="date" class="form-control" name="unpaid_end_register" id="unpaid_end_register">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group unpaid_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">District:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="unpaid_district" id="unpaid_district">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Seller:</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control select2 input_required" name="unpaid_seller" id="unpaid_seller">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group unpaid_hide_show" style="display: none">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Village:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="unpaid_village" id="unpaid_village">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Branch:</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control select2 input_required" name="unpaid_branch" id="unpaid_branch">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row unpaid_hide_show"  style="display: none">
                                                    <label class="col-lg-4 col-form-label">Status:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control select2 input_required" name="unpaid_status" id="unpaid_status">
                                                            <option value="" selected hidden disabled>select item</option>
                                                            <option value="">TT-001</option>
                                                            <option value="">TT-002</option>
                                                            <option value="">TT-003</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive" style="padding-top: 20px">
                                        <table id="example6" class="table table-bordered table-striped" style="white-space: nowrap">
                                            <thead>
                                                <tr class="background_color_tr">
                                                    <th class="background_color_td">CIF</th>
                                                    <th class="background_color_td">CID</th>
                                                    <th class="background_color_td">Customer</th>
                                                    <th class="background_color_td">Customer KH</th>
                                                    <th class="background_color_td">Account Name</th>
                                                    <th class="background_color_td">Create Date</th>
                                                    <th class="background_color_td">Finishdate</th>
                                                    <th class="background_color_td">Bill Date</th>
                                                    <th class="background_color_td">VAT Type</th>
                                                    <th class="background_color_td">VAT Number</th>
                                                    <th class="background_color_td">Branch</th>
                                                    <th class="background_color_td">Mobile Phone</th>
                                                    <th class="background_color_td">Email</th>
                                                    <th class="background_color_td">Startbilling Date</th>
                                                    <th class="background_color_td">Service Package</th>
                                                    <th class="background_color_td">Pay</th>
                                                    <th class="background_color_td">Free</th>
                                                    <th class="background_color_td">Monthly</th>
                                                    <th class="background_color_td">Discount</th>
                                                    <th class="background_color_td">Type</th>
                                                    <th class="background_color_td">Speed</th>
                                                    <th class="background_color_td">Seller</th>
                                                    <th class="background_color_td">Status</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- ================ end tap unpaid customer ========= --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- end section Main content -->


<script type="text/javascript">
$('.select2').select2();
$(function () {
    $(document).ready(function(){
        // new customer
        $('#new_show_').click(function(){
            $(this).hide();
            $('#new_hide_').show();
            $('.new_hide_show').show();

        });
        $('#new_hide_').click(function(){
            $(this).hide();
            $('#new_show_').show();
            $('.new_hide_show').hide();

        });

        // closed customer
        $('#closed_show_').click(function(){
            $(this).hide();
            $('#closed_hide_').show();
            $('.closed_hide_show').show();

        });
        $('#closed_hide_').click(function(){
            $(this).hide();
            $('#closed_show_').show();
            $('.closed_hide_show').hide();

        });
        //active customer
        $('#active_show_').click(function(){
            $(this).hide();
            $('#active_hide_').show();
            $('.active_hide_show').show();

        });
        $('#active_hide_').click(function(){
            $(this).hide();
            $('#active_show_').show();
            $('.active_hide_show').hide();

        });
        //suspend customer
        $('#suspend_show_').click(function(){
            $(this).hide();
            $('#suspend_hide_').show();
            $('.suspend_hide_show').show();

        });
        $('#suspend_hide_').click(function(){
            $(this).hide();
            $('#suspend_show_').show();
            $('.suspend_hide_show').hide();

        });
        //locked customer
        $('#locked_show_').click(function(){
            $(this).hide();
            $('#locked_hide_').show();
            $('.locked_hide_show').show();

        });
        $('#locked_hide_').click(function(){
            $(this).hide();
            $('#locked_show_').show();
            $('.locked_hide_show').hide();

        });
        //unpaid customer
        $('#unpaid_show_').click(function(){
            $(this).hide();
            $('#unpaid_hide_').show();
            $('.unpaid_hide_show').show();

        });
        $('#unpaid_hide_').click(function(){
            $(this).hide();
            $('#unpaid_show_').show();
            $('.unpaid_hide_show').hide();

        });
    });

    $("#example1").DataTable({
    // "responsive": true,
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
    $("#example4").DataTable({
    "responsive": true,
    "autoWidth": false,
    });
    $("#example5").DataTable({
    "responsive": true,
    "autoWidth": false,
    });
    $("#example6").DataTable({
    "responsive": true,
    "autoWidth": false,
    });
    $('#example').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    });
});
$('.customer').click(function(e)
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

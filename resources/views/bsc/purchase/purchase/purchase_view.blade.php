
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user"></i> View Purchase</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" onclick="go_to('bsc_purchase_purchase_list')">View Purchase</li>
                </ol>
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
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4 text_right">
                                <a href="#" class="btn btn-success purchase_form"  value="" id="">Print</a>
                                <a href="#" class="btn btn-secondary purchase_form"  value="" id="">Edit</a>
                                <a href="#" class="btn btn-danger purchase_form"  value="" id="">Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4"> 
                                <label for="" class="account_name">Account Name :</label><br/>
                                <label for="">Date :</label><br/>
                                <label for="">Address :</label><br/>
                            </div>
                                <div class="col-md-4"> 
                                <label for="">Supplier Name :</label><br/>
                                <label for="">Due Date :</label><br/>
                            </div>
                                <div class="col-md-4"> 
                                <label for="">Reference :</label><br/>
                                <label for="">Purchase# :</label><br/>
                            </div>
                        </div>                               
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Account</th>
                                    <th>Tax Rate</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Iphone</td>
                                    <td>Iphone 11 Pro</td>
                                    <td>10</td>
                                    <td>001215699</td>
                                    <td>0.10</td>
                                    <td>10000$</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12" style="padding-right: 20px;">
                            <div class="row">
                                <div class="col-md-8">
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-sm-6 text_right">
                                            <label for="">Total</label>
                                        </div>
                                        <div class="col-sm-6 text_right">
                                            <label for="">1000</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 text_right">
                                            <label for="">VAT Total</label>
                                        </div>
                                        <div class="col-sm-6 text_right">
                                            <label for="">1000</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 text_right">
                                            <label for="">Grand Total</label>
                                        </div>
                                        <div class="col-sm-6 text_right">
                                            <label for="">1000</label>
                                        </div>
                                    </div>
                                    <hr class="line_in_tag_hr">
                                    <div class="row">
                                        <div class="col-sm-6 text_right">
                                            <label for="">Payment</label>
                                        </div>
                                        <div class="col-sm-6 text_right">
                                            <label for="">1000</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 text_right">
                                            <label for="">Date</label>
                                        </div>
                                        <div class="col-sm-6 text_right">
                                            <label for="">1000</label>
                                        </div>
                                    </div>
                                    <hr class="line_in_tag_hr2">
                                    <div class="row">
                                        <div class="col-sm-6 text_right">
                                            <h4>
                                                <label for="">Amount Due</label>
                                            </h4>
                                        </div>
                                        <div class="col-sm-6 text_right">
                                            <h4>
                                                <label for="">1000</label>
                                            </h4>
                                        </div>
                                    </div>
                                    <hr class="line_in_tag_hr2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <h2><b>Make Payment</b></h2>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                <label for="exampleInputEmail1">Amount Paid<b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="code" id="exampleInputEmail1" placeholder="Amount Paid" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Date Paid<b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="code" id="exampleInputEmail1" placeholder="Date Paid" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Paid From</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                        </div>
                                        <select class="form-control select2" name="account_type" >
                                            <option selected hidden disabled>select item</option>
                                            <option>Exclusive</option>
                                            <option>Inclusive</option>
                                            <option>Oppa</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Reference</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="code" id="exampleInputEmail1" placeholder="Reference" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <a href="#" class="btn btn-success purchase_form"  value="bsc_purchase_purchase_form" id="purchase_form"><i class="fas fa-plus"></i> Add Payment</a>&nbsp;
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- end section Main content -->
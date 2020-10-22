<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user"></i> Customer Branch Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('bsc_customer_branch')"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Back</a></li>
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">View Customer Branch Detail</li>
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
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                @foreach ($customer_branchs as $customer_branch)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Customer Name : </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label for="">{{ $customer_branch->customer_name}}</label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="">Branch Name : </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label for="">{{ $customer_branch->branch}}</label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="">Email : </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label for="">{{ $customer_branch->email}}</label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="">Phone : </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label for="">{{ $customer_branch->phone}}</label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="">Deposit : </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label for="">{{ $customer_branch->deposit}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Balance : </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label for="">{{ $customer_branch->balance}}</label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="">Invoice Balance : </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label for="">{{ $customer_branch->invoice_balance}}</label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="">VAT Type : </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label for="">{{ $customer_branch->vat_type}}</label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="">VAT Number : </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label for="">{{ $customer_branch->vat_number}}</label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="">Branch Address : </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <label for="">{{ $customer_branch->lead_address}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- end section Main content -->

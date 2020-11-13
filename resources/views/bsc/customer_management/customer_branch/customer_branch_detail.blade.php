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
                                @if (count($customer_branchs) >0)
                                    @foreach ($customer_branchs as $customer_branch)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <p for="">Customer Name : &nbsp;{{ $customer_branch->ma_customer_name}}</p>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <p for="">Branch Name : &nbsp;{{ $customer_branch->branch}}</p>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <p for="">Email : &nbsp;{{ $customer_branch->lead_branch_email}}</p>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <p for="">Phone : &nbsp;{{ $customer_branch->contact_phone}}</p>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <p for="">Deposit : &nbsp;{{ $customer_branch->deposit}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <p for="">Balance : &nbsp;{{ $customer_branch->balance}}</p>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <p for="">Invoice Balance : &nbsp;{{ $customer_branch->invoice_balance}}</p>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <p for="">VAT Type : &nbsp;{{ $customer_branch->vat_type}}</p>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <p for="">VAT Number : &nbsp;{{ $customer_branch->vat_number}}</p>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <p for="">Branch Address : &nbsp;{{ $customer_branch->lead_address}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- end section Main content -->

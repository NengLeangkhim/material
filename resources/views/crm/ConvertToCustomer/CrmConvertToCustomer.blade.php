 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Convert To Customer</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">View Convert To Customer</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <style type="text/css">
        th {
            font-size: 16px;
        }

        td {
            font-size: 14px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);" onclick="CrmConvertToCustomerView('/crm_convert_to_customer/before_convert','Before_Convert_Tbl')" data-toggle="tab">Before Convert</a></li>
                                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);" onclick="CrmConvertToCustomerView('/crm_convert_to_customer/after_convert','After_Convert_Tbl')" data-toggle="tab">After Convert</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-Setting">
                                        <div class="row" id="CrmTabManageConvert">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    CrmConvertToCustomerView('/crm_convert_to_customer/before_convert','Before_Convert_Tbl');
</script>

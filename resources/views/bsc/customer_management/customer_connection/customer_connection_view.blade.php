<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><span><i class="fas fa-file"></i></span> Customer Detail</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="" class="lead" ​value="lead">Home</a></li>
                    <li class="breadcrumb-item active">New Invoice</li>
                </ol>
            </div>
        </div>
     </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary"​>
                    <div class="card-body" style="padding-bottom: 0px">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <label>Customer ID</label>
                                        <div style="padding-left: 10px">
                                            <label for="">: 001</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <label>Customer Name</label>
                                        <div style="padding-left: 10px">
                                            <label for="">: Touch Rith</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <label>ឈ្មោះអតិថិជន</label>
                                        <div style="padding-left: 40px">
                                            <label for="">: ទូច រិទ្ធ</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <label>Deposit</label>
                                        <div style="padding-left: 45px">
                                            <label for="">: 1000</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <label>Balance</label>
                                        <div style="padding-left: 70px">
                                            <label for="">: 1000</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <label>Invoice Balance</label>
                                        <div style="padding-left: 10px">
                                            <label for="">: 1000</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-primary"​>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- <div class="card"> --}}
                                        <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#new_cus" role="tab" aria-controls="home" aria-selected="true">Customer Info</a>
                                            </li>
                                            <li class="nav-item" id="customer_account">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#closed_cus" role="tab" aria-controls="profile" aria-selected="false">Customer Acc</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#suspend_cus" role="tab" aria-controls="profile" aria-selected="false" onclick="go_to('bsc_invoice_invoice_form')">Customer Invoices</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#locked_cus" role="tab" aria-controls="profile" aria-selected="false">Products</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#ass" role="tab" aria-controls="profile" aria-selected="false">Customer Log</a>
                                            </li>
                                        </ul><br/>
                                    {{-- </div> --}}
                                        {{-- ======================= End Tab menu =================== --}}
                                        <div class="tab-content" id="myTabContent">
                                            {{-- ================ start tap customer information ============ --}}
                                            <div class="tab-pane fade  show active" id="new_cus" role="tabpanel" aria-labelledby="home-tab">
                                                {{-- <div class="card-body"> --}}
                                                    {{-- <div class="table-responsive"> --}}

                                                        <h4 style="color: #1fa8e1;text-align: center;"> <strong>Customer Information</strong> </h4>
                                                        <table class="table table-border" style="border: 2px solid #1fa8e1">
                                                            <tbody>
                                                                <tr style="font-size: 14px;">
                                                                    <td width="10%"> Customer Name</td>
                                                                    <td> :</td>
                                                                    <td width="40%"> Turbo tech</td>
                                                                    <td width="10%"> ឈ្មោះក្រុមហ៊ុន</td>
                                                                    <td> :</td>
                                                                    <td width="40%"> Turbo Tech CO.,LTD</td>
                                                                </tr>
                                                                <tr style="font-size: 14px;">
                                                                    <td width="10%"> Sex</td>
                                                                    <td> :</td>
                                                                    <td width="40%"> Male</td>
                                                                    <td width="10%"> Date of Birth</td>
                                                                    <td> :</td>
                                                                    <td width="40%"> 18/12/2020</td>
                                                                </tr>
                                                                <tr style="font-size: 14px;">
                                                                    <td width="10%"> Email</td>
                                                                    <td> :</td>
                                                                    <td width="40%"> turbotech@gmail.com</td>
                                                                    <td width="10%"> Mobile Phone</td>
                                                                    <td> :</td>
                                                                    <td width="40%"> 023999910</td>
                                                                </tr>
                                                                <tr style="font-size: 14px;">
                                                                    <td width="10%"> Branch</td>
                                                                    <td> :</td>
                                                                    <td width="40%"> Turbo Tech Branch</td>
                                                                    <td width="10%"> Address</td>
                                                                    <td> :</td>
                                                                    <td width="40%">  St 598 (St. Chea Sophara,) Sangkat Chrang Chamresh 2, Khan Reussey Keo. Phnom Penh, Kingdom of Cambodia.</td>
                                                                </tr>
                                                                <tr style="font-size: 14px;">
                                                                    <td width="10%"> អសយដ្ឋាន</td>
                                                                    <td> :</td>
                                                                    <td width="40%"> ផ្លូវ ៥៩៨(ផ្លូវ ​ជា សុផារ៉ា) សង្កាត់​ច្រាំងចំរេះ២ ខណ្ឌ​ឫស្សីកែវ​ រាជធានីភ្នំពេញ ព្រះរាជាណាចក្រកម្ពុជា</td>
                                                                    <td width="10%"> VAT Type</td>
                                                                    <td> :</td>
                                                                    <td width="40%"> 000503</td>
                                                                </tr>
                                                                <tr style="font-size: 14px;">
                                                                    <td width="10%"> VAT Number</td>
                                                                    <td> :</td>
                                                                    <td width="40%"> TT-0001</td>
                                                                    <td width="10%"> Nationality</td>
                                                                    <td> :</td>
                                                                    <td width="40%"> Cambodia</td>
                                                                </tr>
                                                                <tr style="font-size: 14px;">
                                                                    <td width="10%"> Passport ID</td>
                                                                    <td> :</td>
                                                                    <td width="40%"> 000503</td>
                                                                    <td width="10%"> National ID</td>
                                                                    <td> :</td>
                                                                    <td width="40%"> Cambodia</td>
                                                                </tr>
                                                                <tr style="font-size: 14px;">
                                                                    <td width="10%"> Register Date</td>
                                                                    <td> :</td>
                                                                    <td width="40%"> 10/10/2020</td>
                                                                    <td width="10%"> Agency / Seller</td>
                                                                    <td> :</td>
                                                                    <td width="40%"> Sell turbo tech</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    {{-- </div> --}}
                                                {{-- </div> --}}
                                            </div>
                                            {{-- ================ end tap customer information ============ --}}

                                            {{-- ================ start tap customer account ============== --}}
                                            <div class="tab-pane fade" id="closed_cus" role="tabpanel" aria-labelledby="profile-tab">
                                                <div class="tab-content" id="myTabContent">
                                                        {{-- <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist" style="float: right">
                                                            <h6 style="margin-top: 12px;"> <strong>View Mode:</strong></h6>
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#" role="tab" aria-controls="home" aria-selected="true">Inactive</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#closed_cus" role="tab" aria-controls="profile" aria-selected="false">Active</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#closed_cus" role="tab" aria-controls="profile" aria-selected="false">Locked</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#closed_cus" role="tab" aria-controls="profile" aria-selected="false">Closed</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#closed_cus" role="tab" aria-controls="profile" aria-selected="false">All Status</a>
                                                            </li>
                                                        </ul><br> --}}
                                                        <div class="card-body">
                                                            <div id="customer_detail">
                                                                <table id="customer_acc" class="table table-bordered table-striped" style="white-space: nowrap">
                                                                    <thead>
                                                                        <tr class="background_color_tr">
                                                                            <th class="background_color_td">ACCID</th>
                                                                            <th class="background_color_td">Account</th>
                                                                            <th class="background_color_td">Tariff</th>
                                                                            <th class="background_color_td">Payment</th>
                                                                            <th class="background_color_td">Status</th>
                                                                            {{-- <th class="background_color_td">Username</th>
                                                                            <th class="background_color_td">Password</th> --}}
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>001-090-000503-02</td>
                                                                            {{-- <td> <a href="javascript:void(0);"  onclick="go_to('bsc_customer_account_view')">Chroy Changva Branch</a> </td> --}}
                                                                            <td> <a href="javascript:void(0);"  onclick="detailCustomer()">Chroy Changva Branch</a> </td>
                                                                            <td>DPLC Connection</td>
                                                                            <td rowspan="2" style="vertical-align : middle;text-align:center;">1 Months</td>
                                                                            <td rowspan="2" class="text-center bg-blue" style="vertical-align : middle;text-align:center;">Active</td>
                                                                            {{-- <td>TT2020101702</td>
                                                                            <td>TT20202101702@turbo</td> --}}
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Start Bill: 18/12/2020</td>
                                                                            <td>Next Bill: 18/01/2021</td>
                                                                            {{-- <td></td>
                                                                            <td></td>
                                                                        </tr> --}}
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            {{-- ================ end tap customer account ========= --}}
                                            {{-- ================ start tap customer invoices ======= --}}
                                            <div class="tab-pane fade" id="suspend_cus" role="tabpanel" aria-labelledby="profile-tab">
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="table-responsive" style="padding-left: 20px;padding-top: 20px">
                                                        <a href="" ></a>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- ================ end tap customer invoices ========= --}}
                                            {{-- ================ start tap customer products ======= --}}
                                            <div class="tab-pane fade" id="locked_cus" role="tabpanel" aria-labelledby="profile-tab">
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="table-responsive" style="padding-left: 20px;padding-top: 20px">
                                                        <table id="customer_product" class="table table-home table-bordered table-condensed table-striped" style="white-space: nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="7" style="background: #ccc">
                                                                        {{-- <a href="#" onclick="go_to('bsc_customer_account_view')">Sok San</a> --}}
                                                                        <a href="#">Sok San</a>
                                                                    </th>
                                                                </tr>
                                                                <tr class="background_color_tr">
                                                                    <th class="background_color_td" width="50">Branch</th>
                                                                    <th class="background_color_td">Name</th>
                                                                    <th class="background_color_td">Unit Price</th>
                                                                    <th class="background_color_td">Quantity</th>
                                                                    <th class="background_color_td">Price</th>
                                                                    <th class="background_color_td">Type</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>P0024</td>
                                                                    <td>Huwei HG8310 GPON ONU Bridged, 1 GE</td>
                                                                    <td>Pcs</td>
                                                                    <td>4</td>
                                                                    <td>$ 20</td>
                                                                    <td>borrow</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- ================ end tap customer products ========= --}}
                                            {{-- ================ start tap customer log ======= --}}
                                            <div class="tab-pane fade" id="ass" role="tabpanel" aria-labelledby="profile-tab">
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="card-body">
                                                        <table id="customer_log" class="table table-bordered table-striped" style="white-space: nowrap">
                                                            <thead>
                                                                <tr class="background_color_tr">
                                                                    <th class="background_color_td">No</th>
                                                                    <th class="background_color_td">Date</th>
                                                                    <th class="background_color_td">Type</th>
                                                                    <th class="background_color_td">Description</th>
                                                                    <th class="background_color_td">Operator</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- ================ end tap customer log ========= --}}
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
<script>

    function detailCustomer(){
        let tr ='<div class="card-body">'+
                    '<h4 style="color: #1fa8e1;text-align: center;"> <strong>Account Information</strong> </h4>'+
                    '<table class="table table-border" style="border: 2px solid #1fa8e1">'+
                        '<tbody>'+
                            '<tr style="font-size: 14px;">'+
                                '<td width="10%"> Account ID</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> 001-090-000503-02</td>'+
                                '<td width="10%"> Account Name</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> Chroy Changva Branch</td>'+
                            '</tr>'+
                            '<tr style="font-size: 14px;">'+
                                '<td width="10%"> Current Status</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> <i class="btn btn-sm btn-info">Active</i></td>'+
                                '<td width="10%"> Address</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> #97E2,St274, Sangkat Chakto Mukh, Khan Doun Penh, Phnom Penh</td>'+
                            '</tr>'+
                            '<tr style="font-size: 14px;">'+
                                '<td width="10%"> KH Address</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> ផ្តះលេខ​ ៩៧អុឺដឺ ផ្លូវលេខ ២៧៤ សង្កាត់ ចតុមុខ ខណ្ឌ ដូនពេញ</td>'+
                                '<td width="10%"> Install Address</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> #97E2,St274, Phum 1 Village Sangkat Chakto Mukh, Khan Doun Penh, Phnom Penh</td>'+
                            '</tr>'+
                            '<tr style="font-size: 14px;">'+
                                '<td width="10%"> Map</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> 11.565841, 104.88853</td>'+
                                '<td width="10%"> Product Type</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> DPLC Connection</td>'+
                            '</tr>'+
                            '<tr style="font-size: 14px;">'+
                                '<td width="10%" class="alert-success"> Monthly Fee</td>'+
                                '<td class="alert-success"> :</td>'+
                                '<td width="40%" class="alert-success"> $ 120.0000</td>'+
                                '<td width="10%"> Payment</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> 1 (Months) | Free 0 (Months)</td>'+
                            '</tr>'+
                            '<tr style="font-size: 14px;">'+
                                '<td width="10%"> Start Billing Date</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> 18/12/2020</td>'+
                                '<td width="10%"> Next Billing Date</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> 18/01/2020</td>'+
                            '</tr>'+
                            '<tr style="font-size: 14px;">'+
                                '<td width="10%"> IP Address</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> 0.0.0.0</td>'+
                                '<td width="10%"> Router / BRAS</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> 1_Default | Vlan 3314</td>'+
                            '</tr>'+
                            '<tr style="font-size: 14px;">'+
                                '<td width="10%"> Switch</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> default | Switch port</td>'+
                                '<td width="10%"> Username/Password</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> TT2020101702 | TT2020101702@turbo</td>'+
                            '</tr>'+
                            '<tr style="font-size: 14px;">'+
                                '<td width="10%"> Speed</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> 10 Mbps/ 10Mbps</td>'+
                                '<td width="10%"> YouTube Speed Type</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> 0 Mbps | x1</td>'+
                            '</tr>'+
                            '<tr style="font-size: 14px;">'+
                                '<td width="10%"> Remark</td>'+
                                '<td> :</td>'+
                                '<td width="40%"> </td>'+
                                '<td width="10%"> </td>'+
                                '<td> </td>'+
                                '<td width="40%"> </td>'+
                            '</tr>'+
                        '</tbody>'+
                    '</table>'+
                '</div>';
        $("#customer_detail").html(tr);
    }
    $(function () {
        // $("#customer_log").DataTable({
        //     "scrollX":true,
        //     "autoWidth": false,
        //     "scrollY": "400px",
        //     "scrollCollapse": false
        // });
        $("#customer_acc").DataTable({
            "scrollX":true,
            "autoWidth": false,
            "scrollY": "400px",
            "scrollCollapse": false
        });


        // $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        //     $($.fn.dataTable.tables(true)).DataTable()
        //         .columns.adjust()
        //         .responsive.recalc();
        // });

    });
</script>

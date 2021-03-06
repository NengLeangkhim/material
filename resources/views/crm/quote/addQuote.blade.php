




    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create New Quote</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" class="" onclick="go_to('/quote')">Quote List</a></li>
                        <li class="breadcrumb-item active">Create Quote</li>
                    </ol>
                </div>
            </div>
         </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <head>
            <style>
                .table td, .table th {
                    padding: 0.3rem !important;
                    border-top: none !important;
                }
                .dataTables_wrapper .dataTables_paginate .paginate_button{
                    padding: none ;
                }
            </style>
        </head>

        <div id="modal-list-quote">

        </div>
        <div class="container-fluid" id="createNewQuote">
        <div class="container-fluid" >
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <form id="frm_addQuote" action="POST">
                        @csrf
                        <!-- general form elements -->
                        {{-- <input type="hidden" name="create_by" value="247"> --}}
                        <?php
                                if (session_status() == PHP_SESSION_NONE) {
                                    session_start();
                                }
                                // $userid = $_SESSION['userid'];
                                // echo '<input type="hidden" name="create_by" value="'.$userid.'"> ';
                        ?>
                        <div class="card card-primary">
                                <div class="card-header" style="background:#1fa8e0">
                                    <h3 class="card-title">Basic Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Subject<b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="subject"  name="subject"   placeholder="" required >
                                                    <span id="subjectError" ><strong></strong></span>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Customer Name<b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="lead_name"  name="lead_name"   placeholder="Select Lead" required  readonly>
                                                    <div class="input-group-prepend" align="right">
                                                        <a href="javascript:void(0);" class="btn btn-info" id="btnOrganization" onclick="getShowPopup('/quote/add/listQuoteLead',1,'modal-list-quote','listQuoteLead','tblQuuteLead','getSelectRow','leadEnName','lead_id','lead_name');" ><i class="glyphicon glyphicon-plus"></i></a>
                                                    </div>
                                                    <input type="hidden" id="lead_id" name="lead_id" >
                                                    <span id="lead_nameError" ><strong></strong></span>
                                                    <input type="hidden" id="crm_address_id" name="crm_address_id">

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Validation<b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control"  name="due_date" id="due_date" placeholder="Selete Date">
                                                    <span id="due_dateError" ><strong></strong></span>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Assign To <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class='fas fa-pen-square'></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"  name="assign_toName" id="assign_toName" value="{{ $userName ?? ""}}" placeholder="Assign To" readonly>
                                                    <input type="text" class="form-control"  value="4" name="crm_quote_status_type_id" id="crm_quote_status_type_id" placeholder="Assign To" hidden>
                                                    <div class="input-group-prepend" align="right">
                                                        <a href="javascript:void(0);" class="btn btn-info" id="" onclick="getShowPopup('/quote/add/listAssignTo',1,'modal-list-quote','listAssignTo','tblAssignTo','getSelectRow','em_name_en','assign_to','assign_toName');" ><i class="glyphicon glyphicon-plus"></i></a>
                                                    </div>
                                                    <input type="hidden" id="assign_to" name="assign_to" value="{{ $_SESSION['userid'] ?? "" }}">
                                                    <span id="assign_toNameError" ><strong></strong></span>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Billing Address </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="fas fa-map-marked"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="billing_address"  placeholder="Billing Address" readonly>
                                                    {{-- <span id="commentError" ><strong></strong></span> --}}
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Main Address </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="main_address" placeholder="Main Address" readonly>
                                                    {{-- <span id="commentError" ><strong></strong></span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="exampleInputEmail1">Comment </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-comment-alt"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="comment" id="comment" placeholder="Comment here..." required>
                                                    {{-- <span id="commentError" ><strong></strong></span> --}}

                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                        </div>


                        {{-- <div class="card card-primary">
                                <div class="card-header" style="background:#1fa8e0">
                                    <h3 class="card-title">Address Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1"> Home(EN)<b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                    </div>
                                                    <input type="hidden" name="crm_lead_address_id" value="1" >
                                                    <input type="text" class="form-control"  name='homeEN' id="homeEN" placeholder="Number of home"  disabled  >
                                                    <span id="crm_lead_address_idError" ><strong></strong></span>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">City/Province <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="address_city" name="address_city"  disabled required>
                                                    <span id="addressDetailIdError" ><strong></strong></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="exampleInputEmail1"> Street(EN) <b style="color:red">*</b></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-road"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control"  name='streetEN' id="streetEN" placeholder="Number of street"  disabled >
                                                            <span id="addressDetailIdError" ><strong></strong></span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Khan/District <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="district" name="district"  disabled required>
                                                    <span id="addressDetailIdError" ><strong></strong></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1"> Home(KH)<b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"  name='homeKH' id="homeKH" placeholder="Number of home"  disabled>
                                                    <span id="addressDetailIdError" ><strong></strong></span>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Sengkat/Commune <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-street-view"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="commune" name="commune"  disabled required>
                                                    <span id="addressDetailIdError" ><strong></strong></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1"> Street(KH) <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-road"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"  name='streetKH' id="streetKH" placeholder="Number of street"  disabled >
                                                    <span id="addressDetailIdError" ><strong></strong></span>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Village <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="village" name="village"  disabled required>
                                                    <span id="addressDetailIdError" ><strong></strong></span>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div> --}}

                        <div class="card card-primary" >
                            <div class="card-header" style="background:#1fa8e0">
                                <h3 class="card-title">Items</h3>
                            </div>
                            <div class="card-body ">
                                <div class="table-responsive">

                                        <!-- Add Product Lead Content -->
                                        <div class="row-12">
                                            <div class="col-12">
                                                <div class="row-12 pb-3">
                                                        <div class="input-group-prepend">
                                                            <a href="javascript:void(0);" class="btn btn-primary font-weight-bold" id="clickGetBranch" ><i class="fas fa-plus"></i> Select Customer Branch</a>
                                                        </div>
                                                </div>

                                                <div class="row-12 form-group max-min-table" id="content-quote-product" style="margin-right:4px;">

                                                        {{-- <div class="form-group border border-success rounded  p-3">
                                                                <div class="col-12" align="right">
                                                                    <button type="button" class="close" style="color:blue;" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="form-group col-8">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="font-weight-bold input-group-text">Branch:</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" id="branch"  name="branch"   placeholder="" required readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-8">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="font-weight-bold input-group-text">Address:</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" id="branchAddress"  name="branchAddress"   placeholder="" required readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                        <table class="table table-bordered ">
                                                                            <thead class="thead-item-list">
                                                                                <tr>
                                                                                    <th class="td-item-quote-name"><b style="color:red">*</b> Item Name</th>
                                                                                    <th class="td-item-quote">Type</th>
                                                                                    <th style="width: 120px">Quantity</th>
                                                                                    <th class="td-item-quote">List Price($)</th>
                                                                                    <th class="td-item-quote">Total($)</th>
                                                                                    <th style="width: 50px;" >
                                                                                        <button type="button" class="btn btn-info" id="btnAddRowQuoteItem" ><span><i class="fa fa-plus"></i></span></button>
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="add_row_tablequoteItem">
                                                                                <!-- field to add new row to table -->
                                                                            </tbody>
                                                                        </table>
                                                                </div>
                                                        </div> --}}

                                                </div>

                                            </div>
                                        </div>


                                        <!-- Grand Total Content -->
                                        <div class="row-12 max-min-table-total" >
                                                <table class="table">
                                                    <tbody id="grandTotalBody">

                                                        <tr class="fieldGrandTotal">
                                                            <td style="width: 50%"><input type="hidden"></td>
                                                            <td >

                                                                <table class="table table-bordered tr-quote-row">
                                                                    <tbody>
                                                                        <tr style="text-align: right">
                                                                            <td  ><span style="padding-right: 12px;">Sum Total </span></td>
                                                                            <td  ><div id="sumTotal"> 0.0 </div></td>
                                                                        </tr>

                                                                        <!-- <tr style="text-align: right">
                                                                            <td >
                                                                                <select class="allItemDiscount btn-list-item mdb-select md-form" name="allDiscount" id="allItemDiscount" >
                                                                                    <option value="1"><span>+Discount (%)</span> </option>
                                                                                    <option value="2"><span>+Discount ($)</span> </option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="rowGrandDiscount">
                                                                                <div id="allDiscount">
                                                                                    <input type="text" style="width:40%;" class="txtbox-quote valid-numeric-float" name="itemDiscountPercent[]" id="itemDiscountPercent" value="0" placeholder="0.0%" required>
                                                                                </div>
                                                                                <div  id="totalDiscount">
                                                                                    0
                                                                                </div>
                                                                            </td>
                                                                        </tr> -->
                                                                        <tr style="text-align: right">
                                                                            <td >
                                                                                <span style="padding-right: 12px;" >Value Add Tax(VAT)</span>
                                                                            </td>
                                                                            <td >
                                                                                <div id="valueAddTax"> None </div>
                                                                            </td>
                                                                        </tr>

                                                                        <tr style="text-align: right">
                                                                            <td >
                                                                                <span style="padding-right: 12px;" id="labelTaxQuote">+ Tax (0%)</span>
                                                                            </td>
                                                                            <td >
                                                                                <div id="getTaxation">0.0</div>
                                                                            </td>
                                                                        </tr>


                                                                        <tr class="td-total-quote grandTotal" >
                                                                            <td  ><span style="padding-right: 12px;">Grand Total</span></td>
                                                                            <td  ><div id="grandTotal"> 0.0 </div></td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>


                                                            </td>
                                                        </tr>

                                                    </tbody>

                                                </table>

                                        </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <a href="#" class="btn btn-primary save"  id="btnQuoteSave">Save</a>
                            <button type="button" class="btn btn-danger" onclick="go_to('/quote')">Cencel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>




    <script type="text/javascript">

            $(document).ready(function() {
                $(".select2").select2({
                    placeholder: "Select a State"
                });
            });


            $('.lead').click(function(e)
            {
                var ld = $(this).attr("​value");
                e.preventDefault();
                // alert(ld);
                    $.ajax({
                        type: 'GET',
                        url:ld,
                        success:function(data){

                            $(".content-wrapper").show();
                            $(".content-wrapper").html(data);
                    }
                });
            })
            $(function(){
                 //Initialize Select2 Elements
                     $('.select2').select2()
            })

            $('.to').change(function(e){
                var to = $(this). children("option:selected"). val();
                alert(to);
            })
            // $('.save').click(function(){
            //     submit_form ('/addlead','frm_lead','lead');
            // })








    </script>




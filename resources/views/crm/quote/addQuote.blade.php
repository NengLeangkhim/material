


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
            </style>
        </head>

        <div id="modal-list-quote">

        </div>
        <div class="container-fluid" id="createNewQuote">
        <div class="container-fluid" >
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <form id="frm_lead" action="">
                        @csrf
                        <!-- general form elements -->
                        <div class="card card-primary">
                                <div class="card-header" style="background:#1fa8e0">
                                    <h3 class="card-title">Quote Detail</h3>
                                </div>                            
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Organization Name<b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="English Name"  name='organiz_name'  required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Status <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                    </div>
                                                    {{-- Select active & Inactive Organization --}}
                                                    <select  class="form-control" name="qutStatus">
                                                        <option>Active</option>
                                                        <option>Inactive</option>
                                                    </select>
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
                                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control"  name="qutValidate" id="qutValidate" placeholder="Selete Date">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Comment <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="phone"id="exampleInputEmail1" placeholder="Comment" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Website</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="website" id="exampleInputEmail1" placeholder="Website">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Facebook</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="facebook" id="exampleInputEmail1" placeholder="Facebook">
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                --}}
                                </div>  
                        </div>
                        <div class="card card-primary">
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
                                                    <input type="text" class="form-control"  name='homeEN' id="exampleInputEmail1" placeholder="Number of home"  >    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">City/Province <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                                                    </div>
                                                    <select class="form-control select2 city"  id="icity" name="city" onchange="getbranch(this,'idistrict','s','/district')" >
                                                        <option></option>
                                                        @foreach($province as $row )
                                                            <option value="{{$row->code}}">{{$row->name_latin}}/{{$row->name_kh}}</option> 
                                                        @endforeach
                                                    </select>     
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
                                                            <input type="text" class="form-control"  name='streetEN' id="exampleInputEmail1" placeholder="Number of street"  >    
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
                                                    <select class="form-control dynamic" name="district" id="idistrict" onchange="getbranch(this,'icommune','s','/commune')" >
                                                        <option> </option> 
                                                    </select>
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
                                                    <input type="text" class="form-control"  name='homeKH' id="exampleInputEmail1" placeholder="Number of home" >    
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Sengkat/Commune <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-street-view"></i></span>
                                                    </div>
                                                    <select class="form-control dynamic" name="commune" id="icommune" onchange="getbranch(this,'ivillage','s','/village')" >
                                                        <option> </option>
                                                    </select>        
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
                                                    <input type="text" class="form-control"  name='streetKH' id="exampleInputEmail1" placeholder="Number of street"  >    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Village <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                                    </div>
                                                    <select class="form-control " name="village" id="ivillage" dats-dependent="village" >
                                                        <option>select Village</option>                                                        
                                                    </select>     
                                                </div> 
                                                
                                            </div>
                                        </div>
                                    </div> 
                                </div>              
                        </div>

                        <div class="card card-primary" >
                            <div class="card-header" style="background:#1fa8e0">
                                <h3 class="card-title">Item Detail</h3>
                            </div>                            
                            <div class="card-body table-responsive">
                                <div class="row-12 max-min-table" style="margin-right:4px;">
                                    <table class="table table-bordered ">
                                        <thead class="thead-item-list">
                                            <tr>
                                                <th class="td-item-quote-name">Item Name</th>
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
                                            {{-- field to add new row to table --}}
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row-12 max-min-table-total">
                                    <table class="table">
                                        <tbody>
                                            <tr class="fieldGrandTotal">
                                                <td style="width: 50%"><input type="hidden"></td>
                                                <td  >
                                                    <table class="table table-bordered tr-quote-row">
                                                        <tbody>
                                                            <tr style="text-align: right">
                                                                <td  ><span style="padding-right: 12px;">Sum Total </span></td>
                                                                <td  ><div id="sumTotal"> 0.0 </div></td>
                                                            </tr>
                                                            <tr style="text-align: right">
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
                        
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary save" id="frm_btn_sub_addlead">Save</button>
                            <button type="button" class="btn btn-danger" onclick="go_to('/organization')">Cencel</button>
                        </div>       
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- =================Modal lead source========================= --}}
    <div class="modal fade" id="modal-info">
        <form id="ifrm_source" action="/addleadsource" method="POST">
            @csrf
            <div class="modal-dialog">
            <div class="modal-content bg-info">
                <div class="modal-header">
                <h4 class="modal-title">Create Lead Source</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tty"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="lead_source" name="source" id="exampleInputEmail1" placeholder="Website" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-light save_source" onclick="SubForm('/addleadsource','ifrm_source','ileadsource')">Save </button>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
        </form>
        <!-- /.modal-dialog -->
      </div>
       {{-- =================Modal lead industry========================= --}}
    <div class="modal fade" id="modal-info-industry">
        <form id="ifrm_industry" >
            @csrf
            <div class="modal-dialog">
            <div class="modal-content bg-info">
                <div class="modal-header">
                <h4 class="modal-title">Create Lead industry</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-industry"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="lead_source" name="industry"  placeholder="Website" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-light save_source" onclick="SubForm('/addleadindustry','ifrm_industry','iindustry')">Save </button>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
        </form>
        <!-- /.modal-dialog -->
      </div>

    <script type="text/javascript" src="js/crm/crmAddRowQuote.js"></script>
    <script type="text/javascript">
            

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

    <script type="text/javascript">



    </script>



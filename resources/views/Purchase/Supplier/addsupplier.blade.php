<section class="content">
 <!-- page content -->
 <div class="right_col" role="main">
    <div class="contain-fluid">
        <section class="content-header">
            <h2>
                <a href="javascript:void(0);"><img src="img/customerProduct.png" height="30" class="img-circle img-bordered-sm" alt="User Image">Add Supplier</a> 
                                    
                        </h2>
        </section>
        <div>
            <div style="width:100%;height:8px;background-color:#3c8dbc;margin-bottom:10px"></div>
            <div>
            <form name="frm-supplier" action="" method="post" enctype="multipart/form-data">
            <div class="box-info">
                <div class="box-body">
                    <div class="form-group col-md-6">
                        <label>Supplier Name *</label>
                        <input type="text" name="name" class="form-control" required="">
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="form-control phone">
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                        <label>Fax</label>
                        <input type="text" name="fax" class="form-control">
                        
                    </div>
                    <div class="form-group col-md-4 col-lg-3">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control email">
                    </div>

                    <div class="form-group col-md-4 col-lg-3">
                        <label>Website</label>
                        <input type="text" name="website" class="form-control">
                    </div>
                    <div class="form-group col-md-6 col-lg-6">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control">
                    </div>
                    <div class="form-group col-md-3 col-lg-3">
                        <label>Location Map</label>
                        <div class="input-group">
                            <input type="text" name="latlng" class="form-control" value="11.620788,104.892048" readonly="">
                            <a href="javascript:void(0);" class="input-group-addon" data-toggle="modal" data-target="#latlng_modal">
                                <i class="fa fa-map-marker"></i>
                            </a>
                        </div>
                    </div>
                    <div class="form-group col-md-3 col-lg-3">
                        <label>Business Type</label>
                        <select class="form-control" name="comtype" required="">
                         <option value="Company">Company</option><option value="Depo">Depo</option><option value="Ministry">Ministry</option><option value="Retail">Retail</option><option value="Station">Station</option><option value="Wholesale">Wholesale</option>                        </select>
                    </div>
                    <div class="form-group col-md-3 col-lg-3">
                        <label>Tage</label>
                        <input type="text" name="tag" class="form-control">
                    </div>
                    <div class="form-group col-md-3 col-lg-3">
                        <label>Logo</label>
                        <input type="file" name="image" class="filestyle" id="filestyle-0" tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);"><div class="bootstrap-filestyle input-group"><input type="text" class="form-control " placeholder="" disabled=""> <span class="group-span-filestyle input-group-btn" tabindex="0"><label for="filestyle-0" class="btn btn-default "><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span> <span class="buttonText">Choose file</span></label></span></div>
                    </div>
                    <div class="form-group col-md-3 col-lg-2">
                      <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="defaultInline1">
                        <label class="custom-control-label" for="defaultInline1">Status</label>
                      </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-group col-md-12 text-right">
                        <button class="btn btn-primary" type="submit" name="save">
                            <i class="fa fa-plus"></i> Create
                        </button>
                        <a href="javascript:history.back()" class="btn btn-danger m-l-5">
                            <i class="fa fa-close"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </form>
            </div>
                   
        </div>  
    </div>     
</div>
<!-- /page content -->
</section>
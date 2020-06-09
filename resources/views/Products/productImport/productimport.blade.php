
@include('../userview/header')
 <!-- page content -->
 <div class="right_col" role="main">
    <div class="contain-fluid">
        <section class="content-header">
            <h2>
                <a  href="javascript:void(0);"><img src="img/customerProduct.png" height="30" class="img-circle img-bordered-sm" alt="User Image">Product Import</a>
                                    / <a href="/addProductImport" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create New</a>
                        </h2>
        </section>
        <div>
            <div style="width:100%;height:8px;background-color:#3c8dbc;margin-bottom:10px"></div>
            <div class="row">
                <div class="col-md-9">
                    <a  href="javascript:void(0);" class="btn btn-light" onclick="ExporttoPDFFile('tb_productImport')">PDF</a>
                    <a  href="javascript:void(0);" class="btn btn-light" onclick="GetDataFromTableExcel('tb_productImport','Product Import')">Excel</a>
                </div>
                <div class="col-md-3 right">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Search</span>
                        </div>
                        <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" onkeyup="getTable_search('productImport','id',this)">
                    </div>
                </div>
            </div>
            <div class="table-responsive" id="tablediv">
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@include('../userview/footer')
<script type='text/javascript'>
    $(document).ready(
        function(){
            getTable('productImport','id');
        }
    );
  </script>
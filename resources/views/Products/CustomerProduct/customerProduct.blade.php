@php
    if($customerProduct[0]=='out'){
        $title='Customer\'s Request Products';
        $route="customerproductrequest";
    }else{
        $title='Customer\'s Return Products';
        $route="customerproductreturn";
    }
@endphp
@include('../userview/header')
 <!-- page content -->
 <div class="right_col" role="main">
    <div class="contain-fluid">
        <section class="content-header">
            <h2>
            <a  href="javascript:void(0);"><img src="img/customerProduct.png" height="30" class="img-circle img-bordered-sm" alt="User Image">{{$title}}</a>
            / <a href="/addCustomerProduct?action={{$customerProduct[0]}}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create New</a>
                        </h2>
                    <input type="hidden" name="action_type" value="{{$customerProduct[0]}}">
        </section>
        <div>
            <div style="width:100%;height:8px;background-color:#3c8dbc;margin-bottom:10px"></div>
            <div class="row">
                <div class="col-md-9">  
                    <a href="" class="btn btn-light" onclick="ExporttoPDFFile('tb_customerproductrequest')">PDF</a>
                    <a href="" class="btn btn-light" onclick="GetDataFromTableExcel('tb_customerproductrequest','Customer Request Product')">Excel</a>
                </div>
                <div class="col-md-3 right">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Search</span>
                        </div>
                    <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" onkeyup="getTable_search('{{$route}}','id',this)">
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
            if($('input[name ="action_type"]').val()=="out"){
                getTable('customerproductrequest','id');
            }else if($('input[name ="action_type"]').val()=="return"){
                getTable('customerproductreturn','id');
            }
        }
    );
</script>
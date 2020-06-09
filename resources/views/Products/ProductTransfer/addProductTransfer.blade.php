@include('../userview/header')
 <!-- page content -->
 <div class="right_col" role="main">
    <div class="container-fluid">
        <section class="content-header">
            <h2>
                <a href="javascript:void(0);"><img src="img/customerProduct.png" height="30" class="img-circle img-bordered-sm" alt="User Image">Add Product Transfer</a> 
            </h2>
        </section>
        <div>
            <div style="width:100%;height:8px;background-color:#3c8dbc;margin-bottom:10px"></div>
            


            <form name="frm-supplier" action="" method="post" enctype="multipart/form-data">
            <div class="box-info">
                <div class="box-body">
                    <div class="form-group col-md-3">
                        <label>ពីឃ្លាំង *</label>
                        <select class="form-control" name="source" required="">
                            <option value="1">Stock Room / មជ្ឈមណ្ឌលគ្រប់គ្របទិន្ន័យ</option>                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>ទៅកាន់ឃ្លាំង *</label>
                        <select class="form-control" name="destination" required="">
                            <option value=""></option>
                            <option value="1">Stock Room / មជ្ឈមណ្ឌលគ្រប់គ្របទិន្ន័យ</option>                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>កាលបរិច្ឆេទ *</label>
                        <input type="text" name="date" class="form-control nopre-date hasDatepicker" value="2020-03-06" id="dp1583485618041">
                    </div>
                    <div class="form-group col-md-3 col-lg-3">
                        <label>បរិយាយ</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                <table id="tab-cart" class="table tab-cart table-noborder">
                        <thead style="border-bottom:1px solid #54c0eb;">
                        <tr>
                            <th style="width: 150px;">កូដទំនិញ</th>
                            <th style="width: 300px">ឈ្មោះទំនិញ</th>
                            <th style="width: 130px; text-align: center;">ឯកតា</th>
                            <th style="width: 130px; text-align: center;">បរិមាណ</th>
                            <th style="width: 130px; text-align: center;">តំលៃ</th>
                            <th style="width: 130px; text-align: center;">សរុបតំលៃ</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="display:">
                            <td colspan="7"><input class="form-control text-center" value="No Products" disabled=""></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">
                                <div style="position: relative"> 
                                    <input type="text" id="product" name="procode" class="form-control custom-picker" picker-tab="getPurchasProducts" picker-filter="" placeholder="ជ្រើសរើសទំនិញ">
                                </div>
                            </td>
                            <th></th>
                            <th><input type="text" id="totalqty" name="totalqty" class="form-control number must-center" disabled=""></th>
                            <th></th>
                            <th><input type="text" id="totalamount" name="totalamount" class="form-control number" scale="4" disabled=""></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
                </div>
                
                <div class="box-footer">
                    <div class="form-group col-md-12 text-right">
                        <button class="btn btn-primary" type="submit" name="save">
                            <i class="fa fa-plus"></i> បង្កើតការបង្វិលស្តុក
                        </button>
                        <a href="javascript:history.back()" class="btn btn-danger m-l-5">
                            <i class="fa fa-close"></i> ត្រឡប់ក្រោយ
                        </a>
                    </div>
                </div>
            </div>
        </form>





        </div>
    </div>
</div>
<!-- /page content -->
@include('../userview/footer')
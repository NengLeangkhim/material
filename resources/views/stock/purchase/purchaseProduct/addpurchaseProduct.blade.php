<section class="content">
 <!-- page content -->
 <div class="right_col" role="main">
    <div class="contain-fluid">
        <section class="content-header">
            <h2>
                <a href="javascript:void(0);"><img src="img/customerProduct.png" height="30" class="img-circle img-bordered-sm" alt="User Image">Add Purchase Products</a>

                        </h2>
        </section>
        <div>
            <div style="width:100%;height:8px;background-color:#3c8dbc;margin-bottom:10px"></div>
            <form name="frm-supplier" action="" method="post" enctype="multipart/form-data">
            <div class="box-info">
                <div class="box-body">
                    <div class="form-group col-md-4">
                        <label>Supplier *</label>
                        <select class="form-control" name="supcode" required="">
                            <option value="1">Default Supplier</option><option value="2">International Communication Instrument Co., Ltd.</option><option value="3">Nova Technology</option><option value="4">Alantic Import Export</option><option value="5">Network Supplier (NS)</option><option value="6">ICI Network</option><option value="7">GZ PGST</option><option value="8">ICE Electronics</option><option value="9">Ikit Computer</option><option value="10">SKTECH FIBRE SOLUTION</option><option value="11">Heng Dalen Telecom</option><option value="12">ICSC (Cambodia) Co., Ltd</option><option value="13">TP លក់គ្រឿងអគ្គសនី (Whole Sales and Retail Electricity</option><option value="14">Tritech Solutions</option><option value="15">UK SEYLA</option><option value="16">Pacific Services Trade Co., Ltd</option><option value="17">WE SOLUTIONS</option><option value="18">ស្រី សរ</option><option value="19">ឱសថស្ថាន ប៉េង វួចងី</option><option value="20">GFST Global</option><option value="21">K &amp; D</option><option value="22">Extra Technology</option><option value="23">VCAM TELECOM SOLUTIONS</option><option value="24">T.O Group Co., Ltd</option><option value="25">TAING LYMUY</option>                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Wharehouse *</label>
                        <select class="form-control" name="whcode">
                            <option value="1">Stock Room</option>                        </select>
                    </div>
                    <div class="form-group col-md-3 col-lg-4">
                        <label>Purchaser *</label>
                        <select class="form-control" name="purchaser">
                            <option value="1">Billing Admin</option><option value="5">Chhun Sophearak</option><option value="23">Suon Sroeurn</option><option value="40">vluck ourn</option><option value="57">Loeung Vidol</option><option value="6">Victor Hugo Servellon Ayala</option><option value="71">Khoeurng Thavry</option><option value="56">Labb Rachakna</option><option value="79">Mab Vin</option><option value="70">Roeurn Sopha</option><option value="54">Ros Cheanich</option><option value="9">Touch Seyha</option><option value="10">Touch Sokun</option><option value="27">Vit KimSeng</option><option value="73">Vorn Sovan</option><option value="88">Chork Niroth</option><option value="86">Heng Seakkim</option><option value="62">Keong Thon</option><option value="93">Leat Sophat</option><option value="90">Nam Kopy</option><option value="65">Pok Proem</option><option value="89" selected="">Seng Kimsors</option><option value="91">Sok Seng</option><option value="87">Sov Sothea</option><option value="92">Touch Rith</option><option value="36">Makara Sale</option><option value="85">Roeurng Vuthy</option><option value="84">saleadmin</option><option value="42">Sobon Mann</option><option value="44">Brach Oun</option><option value="77">Kheng Ly</option><option value="43">Saovra Chon</option><option value="72">Chhim Piseth</option><option value="59">Chhin Piset</option><option value="74">Chhit Longdy</option><option value="83">Em Nareth</option><option value="78">May Khemarak</option><option value="35">Oun Vicheth</option><option value="54">Ros Cheanich</option><option value="52">Sem Piseth</option><option value="10">Touch Sokun</option><option value="18">San Makara</option><option value="50">On Sam Oun</option><option value="82">Vit Nang</option><option value="22">Soy Dara</option><option value="7">Yich Chanthon</option><option value="48">Kou Sambarth</option><option value="25">Chorn Phy</option><option value="67">Hing Voeun</option><option value="15">Kan Kon</option><option value="21">Kan Sokea</option><option value="49">Khon Puthiya</option><option value="51">Khy Brospov</option><option value="24">Kun Chantha</option><option value="33">Lim Tini</option><option value="81">May Kongkea</option><option value="61">Monj Cheatra</option><option value="68">Morn Bora</option><option value="60">Nop Phoeurn</option><option value="32">Phan Loeng</option><option value="69">Touch Sokhorn</option><option value="19">Ung Sokna</option><option value="46">Eam Lychheng</option><option value="34">Stock Manager</option><option value="45">Khan Sovanrath</option><option value="41">Ryna Rith</option><option value="30">Yin Hong Fha</option><option value="46">Eam Lychheng</option><option value="28">Heng Dany</option><option value="47">Tepy Norin</option><option value="64">Than Sokha</option><option value="29">Kim Kunthea</option><option value="16">On Bunthet</option><option value="63">Phal Samorn</option><option value="66">Sen Saruos</option><option value="31">Yen Chheanglay</option>                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Purchase Date *</label>
                        <input type="text" name="date" class="form-control date hasDatepicker" value="2020-03-09" id="dp1583722271741">
                    </div>

                    <div class="form-group col-md-6 col-lg-8">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="clearfix" style="padding-bottom: 20px;"></div>
                    <table id="tab-cart" class="table tab-cart table-noborder">
                        <thead style="border-bottom:1px solid #54c0eb;">
                        <tr>
                            <th style="width: 100px;">Barcode</th>
                            <th>Product Name</th>
                            <th style="width: 130px; text-align: center;">Unit</th>
                            <th style="width: 100px; text-align: center;">QTY</th>
                            <th style="width: 130px; text-align: center;">Cost</th>
                            <th style="width: 130px; text-align: center;">Total</th>
                            <th style="width: 30px;"></th>
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
                                <button type="button" class="btn btn-flat btn-primary" data-toggle="modal" data-target="#loadproduct"><i class="fa fa-plus-circle"></i> Add Product</button>
                            </td>
                            <th></th>
                            <th><input type="text" id="totalqty" name="totalqty" class="form-control number must-center" disabled="" value="0"></th>
                            <th></th>
                            <th><input type="text" id="totalamount" name="totalamount" class="form-control number" scale="4" disabled="" value="0.0000"></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
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
<!-- /page content -->
</section>
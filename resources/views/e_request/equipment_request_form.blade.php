<?php
    use App\Http\Controllers\util;
    extract($val, EXTR_PREFIX_SAME, "wddx");
?>
<section class="content">
@include('e_request.header')
<form id="frm_ere_insert_equipment_request">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-12" style="text-align: center;margin-top: 10px">
                <h5 class="title_khleave"><u>ទម្រង់ស្នើសុំបើកសម្ភារៈ</u></h5>
                <h4 class="title_engleave">EQUIPMENT REQUEST FORM</h4>
            </div>
        </div>
        {{-- <br> --}}
        <div class="row">
            <div class="col-sm-1">
                <p class="during">No.</p>
            </div>
            <div class="col-sm-3">
                <input type="text" name="" class="form-control">
            </div>
            <div class="col-sm-5">
    
            </div>
            <div class="col-sm-3">
                <input type="text" name="" class="form-control">
            </div>
        </div>
        {{-- <br> --}}
        <div class="row">
            <div class="col-md-12">
                <p class="during"><b>១.ព័ត៌មានរបស់អ្នកបច្ចេកទេស / TECHNICIAN INFORMATION</b></p>
            </div>
        </div>
        {{-- <br> --}}
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="during">ឈ្មោះអ្នកបច្ចេកទេស​/​Technician Name :</p>
                    </div>
                    <div class="col-sm-6">
                        <input id="technician" name="technician_name" type="text" value="<?php echo (isset($v0))?$v0['technician_name']:'';?>" <?php echo $d1;?> class ="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="during">កាលបរិច្ឆេទ​/​Date :</p>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input id="date_top" type="date" value="<?php echo (isset($v0))?explode(" ",$v0['create_date'])[0]:date("Y-m-d")?>" disabled class ="form-control">
                            <div class="input-group-append">
                              <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <br> --}}
        <div class="row">
            <div class="col-sm-12">
                <p class="during"><b>២.ព័ត៌មានរបស់អតិថិជន/ CUSTOMER INFORMATION</b></p>
            </div>
        </div>
        {{-- <br> --}}
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-4">
                        <p class="during">អតិថិជន/Customer:</p>
                    </div>
                    <div class="col-sm-8">
                        <input id="customer" type="text"  name="customer_name" value="<?php echo (isset($v0))?$v0['customer_name']:'';?>" <?php echo $d1;?> class="form-control">
                    </div>
                </div>
            </div>
        </div>
        {{-- <br> --}}
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-4">
                        <p class="during">គណនី/Account Name:</p>
                    </div>
                    <div class="col-sm-8">
                        <input id="account" type="text" name="customer_account_name" value="<?php echo (isset($v0))?$v0['customer_account_name']:'';?>" <?php echo $d1;?> class="form-control">
                    </div>
                </div>
            </div>
        </div>
        {{-- <br> --}}
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-4">
                        <p class="during">អាស័យដ្ឋានដំឡើង:</p>
                    </div>
                    <div class="col-sm-8">
                        <textarea id="address" name="customer_address" class="form-control" <?php echo $d1;?>><?php echo (isset($v0))?$v0['customer_address']:'';?></textarea>
                    </div>
                </div>
            </div>
        </div>
        {{-- <br> --}}
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-4">
                        <p class="during">លេខទូរសព្ទការិយាល័យ (Office Phone No.):</p>
                    </div>
                    <div class="col-sm-8">
                        <input id="phone_number" type="text" name="customer_phone" value="<?php echo (isset($v0))?$v0['customer_phone']:'';?>" <?php echo $d1;?> class   ="form-control">
                    </div>
                </div>
            </div>
        </div>
        {{-- <br> --}}
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-4">
                        <p class="during">អ៊ីម៉ែល(Email):</p>
                    </div>
                    <div class="col-sm-8">
                        <input id="email" type="email" name="customer_email" value="<?php echo (isset($v0))?$v0['customer_email']:'';?>" <?php echo $d1;?> class="form-control">
                    </div>
                </div>
            </div>
        </div>
        {{-- <br> --}}
        <div class="row">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="during">ប្រភេទបណ្តាញ/Connection:</p>
                    </div>
                    <div class="col-sm-6">
                        <input id="connection" type="text" name="connection"value="<?php echo (isset($v0))?$v0['connection']:'';?>" <?php echo $d1;?> class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-sm-4">
                        <p class="during">ល្បឿន/Speed:</p>
                    </div>
                    <div class="col-sm-8">
                        <input id="speed" type="text" name="speed" value="<?php echo (isset($v0))?$v0['speed']:'';?>" <?php echo $d1;?> class="form-control">
                    </div>
                </div>
            </div>
        </div>
        {{-- <br> --}}
    
        {{-- ================================ Scroll Table =================================== --}}
        <div class="row">
            <div style="overflow-x: auto">
                <table class="table" border=1 style=" width:1300px; border-color: black">
                    <tr style="">
                        <td colspan="6" class="style_td" style="background:#dfe6e9;">
                            <p class="during"><b>៣.ឈ្មោះសម្ភារៈ/ITEM'S NAME</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="style_td" style=" text-align: center;">
                            <p class="during bold">ឈ្មោះសម្ភារៈ/ITEM'S NAME</p>
                        </td>
                        <td class="style_td" style=" text-align: center;">
                            <p class="during bold">MODAL/SN</p>
                        </td>
                        <td class="style_td" style=" text-align: center;">
                            <p class="during bold">ចំនួន/QUANTITY</p>
                        </td>
                        <td class="style_td" style=" text-align: center;">
                            <p class="during bold">ប្រភេទ/TYPE</p>
                        </td>
                        <td class="style_td" style=" text-align: center;">
                            <p class="during bold">តម្លៃ/PRICE</p>
                        </td>
                        <?php echo $add;?>
                    </tr>
                    <tbody id="dynamic_fields_request">
                         <?php if(isset($v1)){
                        foreach($v1 as $rr){?>
                    <tr>
                        <td><input id="technician" type="text" class="form-control" name="product_name[]" value="<?php echo (isset($rr))?$rr['product_name']:'';?>" <?php echo $d;?>></td>
                        <td><input id="modal" type="text" name="modal[]" class="form-control" value="<?php echo (isset($rr))?$rr['model_sn']:'';?>" <?php echo $d;?>></td>
                        <td><input id="quantity" type="text" name="qty[]" class="form-control" value="<?php echo (isset($rr))?$rr['qty']:'';?>" <?php echo $d;?>></td>
                        <td><input id="type" type="text" name="type[]" class="form-control" value="<?php echo (isset($rr))?$rr['type']:'';?>" <?php echo $d;?>></td>
                        <td><input id="price" type="text" name="price[]" class="form-control" value="<?php echo (isset($rr))?$rr['price']:'';?>" <?php echo $d;?>></td>
                    </tr>
                    <?php }}?>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <br> --}}
        {{-- =========== End ============== --}}

        {{-- ======================= POP ======================== --}}
        <br>
        <div class="row">
            <div class="col-sm-12">
                <input style="text-align: center;" type="text" name="pop" class="form-control">
            </div>
        </div>
        <br>
    
    
        <div class="row">
            <div class="col-md-3" align="center">
                <div class="row">
                    <div class="col-md-12">
                        <p class="during bold">អតិថិជន/CUSTOMER</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="during">----------------------------------</p>
                        <p class="during">----------/------------/----------</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" align="center">
                <div class="row">
                    <div class="col-md-12">
                        <p class="during bold">អ្នកប្រគល់/PROVIDER</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="during">----------------------------------</p>
                        <p class="during">----------/------------/----------</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" align="center">
                <div class="row">
                    <div class="col-md-12">
                        <p class="during bold">អ្នកបច្ចេកទេស(TECHNICIAN)</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="during">----------------------------------</p>
                        <p class="during">----------/------------/----------</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" align="center">
                <div class="row">
                    <div class="col-md-12">
                        <p class="during bold">អ្នកស្នើឧបករណ៍(REQUEST BY)</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="during">----------------------------------</p>
                        <p class="during">----------/------------/----------</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="during">ថ្ងៃបញ្ចប់ការងារដំឡើងជូនអតិថិជន: </p>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input id="install_done" type="date" name="finish_date" value="<?php echo (isset($v0))?explode(" ",$v0['finish_date'])[0]:'';?>" <?php echo $d1;?> class="form-control">
                            <div class="input-group-append">
                              <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
                        </div>
                  </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="during">ម៉ោង: </p>
                    </div>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input id="time" type="time" name="finish_time" value="<?php echo (isset($v0))?explode(" ",$v0['finish_date'])[1]:'';?>" <?php echo $d1;?> class="form-control">
                            <div class="input-group-append">
                              <span class="input-group-text fa fa-clock" id="basic-addon2"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="during"><b>កំណត់ចំណាំ / NOTE:</b></p>
                    </div>
                    <div class="col-sm-9">
                        <input id="time" type="text" name="note" value="<?php echo (isset($v0))?$v0['note']:'';?>" <?php echo $d1;?> class='form-control'>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-2">
                <p class="during">លក្ខខ័ណ្ឌ:</p>
            </div>
            <div class="col-sm-10">
                <p class="during"> ហត្ថលេខានៅលើទម្រង់នេះមានសេចក្តីបញ្ជាក់ថា​បាន​ទទួលឧបករណ៍​​ដែលមាន​រាយឈ្មោះខាងលើ ត្រូវបានដំឡើងដោយជោកជ័យជាស្ថាពរនៅកន្លែង​អតិថិ​ជន ហើយអតិថិជនត្រូវទទួលខុសត្រូវរាល់ការខូចខាត ឬក៏​បាត់បង់ឧបករណ៍ទាំងអស់នេះ ។</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <p class="during">Condition:</p>
            </div>
            <div class="col-sm-10">
                <p class="during">Customer's signatureon this term can fully express that equipment has been successfully install at customer place and Customer will be responsible for any dameges losses of equipment.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php echo $comment;?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" align="center">
                <?php echo $approve;?>
                <?php echo $pending;?>
                <?php echo $reject;?>
                <?php echo $btn_sub;?>
            </div>
        </div>
    <br>
    </div>
</form>
@include('e_request.footer');
</section>

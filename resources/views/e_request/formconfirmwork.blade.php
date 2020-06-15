<?php
    use App\Http\Controllers\util;
    extract($val, EXTR_PREFIX_SAME, "wddx");
?>
<section class="content">
    @include('e_request.header')
<div class="row" style="margin-top: 10px">
    <div class="col-12" style="text-align: center">
        <h5 class="title_khleave"><u>ទម្រង់ស្មើសុំលិខិតបញ្ជាក់ការងារ</u></h5>
    </div>
</div>
 <form id="frm_ere_insert_formconfirmwork">
    @csrf
 <input type="hidden" name="erid" value="<?php echo (isset($_GET['erid']))?$_GET['erid']:'';?>">
    <div class="row" style="margin-top:10px;">
        <div class="col-12">
            <div class="row">
                <!-- <div class="col-1"></div> -->
                <div class="col-3">
                    <p class="during">ខ្ញុំបាទ/នាងខ្ញុំឈ្មោះ</p>
                </div>
                <div class="col-3">
                    <input type="text" name="name" value="<?php echo $pos['name'];?>" class="form-control" disabled>
                </div>
                <div class="col-1">
                    <p class="during"> ភេទ </p>
                </div>
                <div class="col-1">
                    <input type="text" name="sex" value="<?php echo util::conv_sex($pos['sex']);?>" class="form-control" disabled>
                </div>
                <div class="col-2">
                    <p class="during">មានមុខងារជា</p>
                </div>
                <div class="col-2">
                    <input type="text" name="pos" value="<?php echo $pos['position'];?>" class="form-control" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:10px">
        <div class="col-12" >
            <div class="row">
                <div class="col-3">
                    <p class="during">ប័ណ្ណសម្គាល់ការងារលេខ</p>
                </div>
                <div class="col-3">
                    <input type="text" name="id_number" value="<?php echo $pos['id_number'];?>" class="form-control" disabled>
                </div>
                <div class="col-3">
                <p class="during">បម្រើការងារនៅនាយកដ្ឋាន</p>
                </div>
                <div class="col-3">
                    <input type="text" name="dept" value="<?php echo $pos['dept'];?>" class="form-control" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:10px">
        <div class="col-12" >
           <p class="during">នៃក្រុមហ៊ុន ធើបូថេក ឯ.ក ។</p>
        </div>
    </div>
    <div class="row"​​style="margin-top:25px">
        <div class="col-12" style="text-align: center">
            <h5 class="title_khleave">សូមគោរពចូលមក</h5>
            <h5 class="title_khleave">លោកអគ្គនាយក ក្រុមហ៊ុន​ ធើបូថេក ឯ.ក </h5>
        </div>
    </div>
    <div class="row" style="margin-top:15px">
        <div class="col-12">
            <div class="row">
                <div class="col-2">
                    <h6 class="title_khleave">តាមរយៈ</h6>
                </div>
                <div class="col-10">
                    <input type="text" name="via"  class="form-control" value="<?php echo (isset($via))?$via:'';?>" <?php echo $d?>>
                </div>
            </div>
            <div class="row"​ style="margin-top:10px">​​
                <div class="col-2">
                    <h6 class="title_khleave">កម្មវត្ថុ</h6>
                </div>
                <div class="col-10">
                    <input type="text" name="object" class="form-control" value="<?php echo (isset($object))?$object:'';?>" <?php echo $d?>>
                </div>
            </div>
            <div class="row"​ style="margin-top:10px">​​
                <div class="col-2">
                    <h6 class="title_khleave">មូលហេតុ</h6>
                </div>
                <div class="col-9">
                    <input type="text" name="reason" class="form-control" value="<?php echo (isset($reason))?$reason:'';?>" <?php echo $d?>>
                </div>
                <div class="col-1"​ style="margin-top:10px">
                    <h6 class="title_khleave"​​>។</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p class="during">
            <blockquote class="during" style="margin-left: 28px;">អាស្រ័យដូចបានជម្រាបជូនខាងលើ សូម​ លោកអគ្គនាយក  មេត្តាអនុញ្ញាតផ្តល់ខ្ញុំបាទនូវលិខិត បញ្ជាក់ការងារ ដើម្បីយកទៅប្រើប្រាស់ក្នុងគោលបំណងខាងលើ ដោយក្តីអនុគ្រោះ ។ </blockquote>
            <blockquote class="during" style="margin-left: 28px;"> សូមលោកប្រធាន ទទួលនូវការគោរព និង សេចក្តីរាប់អានអំពី​ ខ្ញូំបាទ/នាងខ្ញុំ ។</blockquote>

            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-8" align="center">
                    <h6 class="inputinfokh">ថ្ងៃ.......ខែ.......ឆ្នាំ........ឯកស័ក ព.ស២៥៦....</h6>
                    <h6 class="inputinfokh" style="margin-top:10px">រាជធានីភ្នំពេញ,ថ្ងៃទី <?php echo (isset($create_date))?util::conv_kh(date_format(date_create($create_date),"d")):'.......'; ?> ខែ <?php echo (isset($create_date))?' '.util::conv_month(date_format(date_create($create_date),"m")).' ':'.......'; ?> ឆ្នាំ <?php echo (isset($create_date))?' '.util::conv_kh(date_format(date_create($create_date),"Y")).' ':'.......'; ?> </h6>
                    <h6 class="inputinfokh" style="margin-top:10px">ហត្ថលេខា </h6>
                    <h6 class="inputinfokh" style="margin-top:10px"><?php echo(isset($create_date))?'<b>'.$pos['name'].'</b>':'';?></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:100px">
        <div class="col-12"​​>

        </div>
    </div>
    <div class="row" style="margin-top:10px">
        <div class="col-12" align="center">
            <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> -->
            <?php echo $comment;?>
        </div>
    </div>
    <div class="row" style="margin-top:10px">
       <div class="col-12" align="center">
            <?php echo $approve;?>
            <?php echo $pending;?>
            <?php echo $reject;?>
            <?php echo $btn_sub;?>
        </div>
    </div>
<br>
</form>
@include('e_request.footer')
</section>
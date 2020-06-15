@include('e_request.header');
@php
    use App\Http\Controllers\util;
    extract($val, EXTR_PREFIX_SAME, "wddx");
@endphp
<section class="content">
<div class="row">
    <div class="col-12" style="text-align: center;margin-top: 10px">
        <h5 class="title_khleave"><u>ពាក្យសុំអនុញ្ញាតច្បាប់ឈប់សម្រាក</u></h5>

        <h4 class="title_engleave">Leave Application Form</h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form id="{{ $frm_id }}" action="ere_insert_formleave" method="post">
            @csrf
        <input type="hidden" name="erid" value="<?php echo (isset($_GET['erid']))?$_GET['erid']:'';?>">
            <div class="row" style="margin-top:10px">
                <div class="col-2">
                    <p class="inputinfokh">ឈ្មោះ :</p>
                    <p class="inputinfoen">Name :</p>
                </div>
                <div class="col-4" >
                <input type="text" class="form-control" value="<?php echo $name; ?>" disabled>
                </div>
                <div class="col-2">
                    <p class="inputinfokh">លេខប័ណ្ណការងារ :</p>
                    <p class="inputinfoen">ID :</p>
                </div>
                <div class="col-4">
                    <input type="text" name="id_number" value="<?php echo $id_number; ?>" class="form-control" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <p class="inputinfokh">មុខតំណែង :</p>
                    <p class="inputinfoen">Position :</p>
                </div>
                <div class="col-4" >
                    <input type="text" name="position" id="position" value="<?php echo $pos; ?>" class="form-control" disabled>
                </div>
                <div class="col-2">
                    <p class="inputinfokh">ផ្នែក :</p>
                    <p class="inputinfoen">Unit :</p>
                </div>
                <div class="col-4">
                    <input type="text" name="unit" id="unit" value="<?php echo $dept; ?>" class="form-control" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h5 class="title_khleave">ពាក្យសុំអនុញ្ញាតច្បាប់ឈប់សម្រាក</h5>
                </div>
            </div>
            <div class="row" style="margin-top:10px">
                <div class="col-12">
                    <div class="row">
                    <div class="col-1"></div>
                        <?php
                            $i=0;
                            foreach ($kindof as $rr){
                                $i++;
                                $ikh=util::conv_kh($i);
                                $sel="";
                                if($rr['id']==$leave_kind){
                                    $sel='checked';
                                }
                                echo '<div class="col-2">
                                <div style="float: left;">
                                    <label>
                                        <input type="radio" name="kindof" id="kindof" value='.$rr['id'].' '.$sel.' '.$d.'>
                                        <div style="float:right;">
                                            <h6 class="inputinfokh" > '.$ikh.' . '.$rr['name_kh'].'</h6>
                                            <h6 style="margin-top: -10px; "> '.$i.' . '.$rr['name'].'</h6>
                                        </div>
                                    </label>
                                </div>
                             </div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:10px">
                <div class="col-12" >
                    <div class="row">
                        <div class="col-1">
                            <p class="inputinfokh">សម្រាកចាប់ពីថ្ងៃ​</p>
                            <p class="inputinfoen">Date From</p>
                        </div>
                        <div class="col-2 ">
                            <div class="input-group">
                                <input type="date" id="datepicker"  name="start_date" value="<?php echo (isset($date_from))?$date_from:'';?>" class="form-control " <?php echo $d;?> >
                                <div class="input-group-append">
                                    <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                                <h6 class="inputinfokh">ម៉ោង </h6>
                                <h6 style="margin-top: -10px;"> Hour</h6>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <input type="time"  name="start_hour" value="<?php echo (isset($time_from))?$time_from:'';?>" class="form-control" id="default-picker" <?php echo $d;?>>
                                <div class="input-group-append">
                                        <span class="input-group-text fa fa-clock-o" id="basic-addon2"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <p class="inputinfokh">ដល់ថ្ងៃទី</p>
                            <p class="inputinfoen">​To</p>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <input type="date" id="iend_date" name="end_date" value="<?php echo (isset($date_to))?$date_to:'';?>" class="form-control" <?php echo $d;?>>
                                <div class="input-group-append">
                                    <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <h6 class="inputinfokh">ម៉ោង </h6>
                            <h6 style="margin-top: -10px;"> Hour</h6>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                 <input type="time" name="end_hour" class="form-control" value="<?php echo (isset($time_to))?$time_to:'';?>" <?php echo $d;?>>
                                 <div class="input-group-append">
                                        <span class="input-group-text fa fa-clock-o" id="basic-addon2"></span>
                                </div>
                            </div>
                           

                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:10px">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3">
                            <p class="inputinfokh">ចូលមកធ្វើការវិញ</p>
                            <p class="inputinfoen">​Date Resume</p>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <input type="date" id="idate_resume" name="date_resume" value="<?php echo (isset($date_resume))?$date_resume:'';?>" class="form-control" <?php echo $d;?>  >
                                <div class="input-group-append">
                                    <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <p class="inputinfokh">ចំនួនឈប់សម្រាក</p>
                            <p class="inputinfoen">​Number of Date Leave</p>
                        </div>
                        <div class="col-3">
                            <input type="number" min="0.5" step="0.5" value="<?php echo (isset($leave_number))?$leave_number:'';?>" name="number_of_leave" class="form-control" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:10px">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3">
                            <p class="inputinfokh">មូលហេតុ</p>
                            <p class="inputinfoen">​Reason</p>
                        </div>
                        <div class="col-9">
                            <input type="text" name="reason" value="<?php echo (isset($reason))?$reason:'';?>" class="form-control" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:10px">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="during">ក្នុងរយៈពេលដែលខ្ញុំសម្រាកពីការងារ ខ្ញុំសុំផ្ទេរការទទួលខុសត្រូវ និងតួនាទីរបស់ខ្ញុំទៅឲ្យលោក/កញ្ញា/លោកស្រី</h6>
                            <p>During my take leave, I transfer my job and duties to Mr/Miss/Ms who is officially in charged.</p>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                 <div class="col-3">
                                    <select name="transfer_to" class="form-control" <?php echo $d1;?>>
                                    <?php
                                        foreach($transfer_to as $key=>$rr){
                                            $sel='';
                                            if($rr['id']==$trans_to){
                                                $sel='selected';
                                            }
                                            if($key==0){
                                            echo "<option hidden disabled selected value='-1'></option>";
                                            }
                                            echo '<option value="'.$rr['id'].'" '.$sel.'>'.$rr['name'].'</option>';
                                        }
                                    ?>
                                    </select>
                                 </div>
                                 <div class="col-9">
                                    <h6 class="during">ជាអ្នកទទួលជំនួស ៕</h6>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:10px">
                <div class="col-12">
                    <div class="row">
                        <div class="col-4" align="center">
                            <h6​ class="during"><b><u>អនុញ្ញាតដោយ/Approved By</u></b></h6>
                        </div>
                        <div class="col-4" align="center">
                            <h6​ class="during"><b><u>បញ្ជាក់ដោយ/Certified By</u></b></h6>
                        </div>
                        <div class="col-4" align="center">
                            <h6​ class="during"><b><u>អ្នកស្នើសុំ/Request By</u></b></h6>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row" style="height:70px;">

                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-4" >
                            <p class="inputinfokh">ឈ្មោះ/Name  : <?php echo(isset($approve_by))?'<b>'.$approve_by.'</b>':'...............';?></p>
                            <p class="inputinfokh">​កាលបរិច្ឆេទ  : <?php echo (isset($approve_date))?util::conv_datetime($approve_date):'..................'; ?></p>
                        </div>
                        <div class="col-4" >
                            <p class="inputinfokh">ឈ្មោះ/Name  : <?php echo(isset($pending_by))?'<b>'.$pending_by.'</b>':'...............';?></p>
                            <p class="inputinfokh">​កាលបរិច្ឆេទ  : <?php echo (isset($pending_date))?util::conv_datetime($pending_date):'..................'; ?></p>
                        </div>
                        <div class="col-4" >
                            <p class="inputinfokh">ឈ្មោះ/Name  : <?php echo(isset($req_by))?'<b>'.$name.'</b>':'...............';?></p>
                            <p class="inputinfokh">​កាលបរិច្ឆេទ  : <?php echo (isset($create_date))?util::conv_datetime($create_date):'..................'; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="during"><u>កំណត់ចំណំា/Note :</u></p>
                </div>
                <div class="col-12">
                    <p class="during">
                        ១ . គ្រប់និយោជិកត្រូវដាក់ពាក្យសុំអនុញ្ញាតច្បាប់ឈប់សម្រាកនេះជូនទៅអ្នកគ្រប់គ្រងផ្ទាល់ យ៉ាងតិចបំផុត០២ (ពីរ)​ ថ្ងៃ​ មុនថ្ងៃចាប់ផ្តើមឈប់សម្រាកលើកលែងតែករណីបន្ទាន់ចាំបាច់
                       ជាក់ស្តែង ឬ ពេលមានជំងឺ ។
                    </p>
                    <p class="during">
                        1 . Every employee has to request leave to immediate manager at least 2 days before the date of take leave, in case agent or sick.
                    </p>
                    <p class="during">
                        ២​​ .​ សម្រាក មុននិងក្រោយពេលលំហែមាតុភាព  មានចំនួនកៅសិបថ្ងៃរាប់ទាំងថ្ងៃសៅរ៍-អាទិត្យផងដែរ ។
                    </p>
                    <p class="during">
                        2​​ . Leave before and after maternity have 90 days include Saturday day and Sunday.
                    </p>
                    <p class="during">
                        ៣ .​ គ្រប់និយោជិកដែលឈប់សម្រាកដោយសារជំងឺមានរយៈពេលឈប់សម្រាកបន្តបន្ទាប់គ្នាចាប់ពី ០២(ពីរ)ថ្ងៃ ​ឡើងទៅតម្រូវឲ្យមានលិខិតបញ្ជាក់ពីគ្រូពេទ្យផ្លូវការ ។
                    </p>
                    <p class="during">
                        3 . Every employee taken leave by sick over 2 days must be enclosed doctor’s certificate as officially.
                    </p>
                    <p class="during">
                        ៤ . ក្នុងករណីដែលបុគ្គលិកប្រើប្រាស់អស់ថ្ងៃសម្រាក់ប្រចាំឆ្នាំ និងសម្រាកពិសេស ក្រុមហ៊ុន នឹងផ្តល់ឲ្យបន្ថែមនូវការ​ សម្រាកដោយមិនយកប្រាក់បៀវត្សរ៍ ការសម្រាក
                        នេះចាំបាច់ត្រូវតែមានការយល់ព្រមជាមុនពីថ្នាក់ដឹកនាំក្រុមហ៊ុនដែរ ។
                    </p>
                    <p class="during">
                        4 . In case, staff use annual and special leave all, company will be extra provide leave without salary. This leave must be approved by employer.
                    </p>
                    <p class="during">
                        <i><img src="storage/img/hand.png" class="hand"></i>
                        (ក្រោយពេលទទួលបានការអនុញ្ញាតពីអ្នកគ្រប់គ្រងផ្ទាល់/អគ្គនាយក ហើយចាំបាច់ត្រូវតម្កល់ពាក្យសុំនេះនៅផ្នែកធនធានមនុស្ស និងរដ្ឋបាល បើពុំនោះទេនឺងត្រូវចាត់ទុកថាអវត្តមាន)
                    </p>
                    <p class="during">
                        <i><img src="storage/img/hand.png" class="hand"></i>
                        (After leave approved from manager/employer, leave paper must be kept in human resource and administration unit. If not will be
                        considered as absent).
                    </p>
                </div>
            </div>
            <div class="row" style="margin-top:10px">
                <div class="col-12" align="center">
                    <?php echo $comment;?>
                </div>
            </div>
            <div class="row">
                <div class="col-12" align="center">
                    <?php echo $approve;?>
                    <?php echo $pending;?>
                    <?php echo $reject;?>
                    <?php echo $btn_sub;?>
                </div>
            </div>
            <br>
        </form>
    </div>
</div>
@include('e_request.footer')
</section>


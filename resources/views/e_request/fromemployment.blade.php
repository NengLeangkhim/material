<?php
    use App\Http\Controllers\util;
    extract($val, EXTR_PREFIX_SAME, "wddx");
?>
<section class="content">
    @include('e_request.header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" style="text-align: center">
                <h5 class="title_khleave">ប្រវត្តិរូបសង្ខេបនិយោជិក</h5>
                <h6 class="english">EMPLOYMENT BIOGRAPHY</h6>
            </div>
        </div>
        <br>
        <form id="{{ $frm_id }}">
            @csrf
            <input type="hidden" name="erid" value="<?php echo (isset($_GET['erid']))?$_GET['erid']:'';?>">

            <div class="row">
                <div class="col-md-1"><p class="bold">1 - </p></div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">នាមត្រកូល និងនាមខ្លួន :</p>
                            <p class="inputemploymenten" style="margin-top: -15px;">Full Name :</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="name_kh" class="form-control" value="<?php echo (isset($v0))?$v0['name_kh']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">អក្សរឡាតាំង :</p>
                            <p class="inputemploymenten" style="margin-top: -15px;">Name in Latin :</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control" value="<?php echo (isset($v0))?$v0['name']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="file" name="image" id="filetag" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ថ្ងៃ ខែឆ្នាំកំណើត:</p>
                            <p class="inputemploymenten">Date of Birtd :</p>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="date" name="birth_date" class="form-control" value="<?php echo (isset($v0))?explode(" ",$v0['birth_date'])[0]:'';?>" <?php echo $d;?>>
                                 <div class="input-group-append">
                                        <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">កម្ពស់  :</p>
                            <p class="inputemploymenten">Height :</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="number" min="0" step="0.01" name="height" value="0" class="form-control" value="<?php echo (isset($v0))?$v0['height']:'';?>" <?php echo $d1;?> >
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ជនជាតិ  :</p>
                            <p class="inputemploymenten">Nation :</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="nation" class="form-control" value="<?php echo (isset($v0))?$v0['nation']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">សញ្ញាតិ  :</p>
                            <p class="inputemploymenten">Nationality</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="nationality" class="form-control" value="<?php echo (isset($v0))?$v0['nationality']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">សាសនា  :</p>
                            <p class="inputemploymenten">Religion :</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="religion" class="form-control" value="<?php echo (isset($v0))?$v0['religion']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="inputemploymentkh">ស្ថានភាពគ្រួសារ :</p>
                            <p class="inputemploymenten" style=" margin-top:-15px">Marital Satatus :</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-sm-4">
                            <label >
                                <input type="radio"  name="marital" id="marital" value="single" <?php echo (isset($v0))?(($v0['marital_status']=='single')?'checked':''):'';?> <?php echo $d;?>>
                                    <div style="float:right;">
                                    <p class="inputinfokh"> នៅលីវ</p>
                                    <p style="margin-top: -20px;font-size: 14px">Single</p>
                                </div>
                           </label>
                        </div>
                        <div class="col-sm-4">
                            <label >
                                <input type="radio"  name="marital" id="marital" value="married" <?php echo (isset($v0))?(($v0['marital_status']=='married')?'checked':''):'';?> <?php echo $d;?>>
                                    <div style="float:right;">
                                    <p class="inputinfokh"> រៀបការ</p>
                                    <p style="margin-top: -20px;font-size: 14px">Married</p>
                                </div>
                           </label>
                        </div>
                        <div class="col-sm-4">
                            <label >
                                <input type="radio"  name="marital" id="marital" value="divorced" <?php echo (isset($v0))?(($v0['marital_status']=='divorced')?'checked':''):'';?> <?php echo $d;?>>
                                    <div style="float:right;">
                                    <p class="inputinfokh"> មេម៉ាយ / ពោះម៉ាយ </p>
                                    <p style="margin-top: -20px;font-size: 14px">Widow / er</p>
                                </div>
                           </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"><p class="bold"> 2 - </p></div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ទីកន្លែងកំណើត: ភូមិ</p>
                            <p class="inputemploymenten">Homeland Address :</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="birth_village" class="form-control" value="<?php echo (isset($v0))?$v0['nationality']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ឃុំ/សង្កាត់ :</p>
                            <p class="inputemploymenten">Commune: </p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="birth_commune" class="form-control" value="<?php echo (isset($v0))?$v0['birth_commune']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ស្រុក/ខណ្ខ/ក្រុង :</p>
                            <p class="inputemploymenten">District/Khan/City: </p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="birth_district" class="form-control" value="<?php echo (isset($v0))?$v0['birth_district']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ខេត្ត/រាជធានី :</p>
                            <p class="inputemploymenten">Province: </p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="birth_province" class="form-control" value="<?php echo (isset($v0))?$v0['birth_province']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <p class="bold"> 3 - </p>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="inputemploymentkh">អាស័យដ្ឋានអចិន្រ្តៃយ៍:ផ្ទះលេខ</p>
                            <p class="inputemploymenten">Permanent Address :</p>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="home_number" class="form-control" value="<?php echo (isset($v1))?$v1['home_number']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ផ្លូវលេខ :</p>
                            <p class="inputemploymenten">Street: </p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="street" class="form-control" value="<?php echo (isset($v1))?$v1['street']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ក្រុមទី :</p>
                            <p class="inputemploymenten">Group: </p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="group" class="form-control" value="<?php echo (isset($v1))?$v1['group']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ភូមិ:</p>
                            <p class="inputemploymenten">Village: </p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="village" class="form-control" value="<?php echo (isset($v1))?$v1['village']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ឃុំ/សង្កាត់ :</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="commune" class="form-control" value="<?php echo (isset($v1))?$v1['commune']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ស្រុក/ខណ្ខ/ក្រុង :</p>
                            <p class="inputemploymenten">District/Khan/City: </p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="district" class="form-control" value="<?php echo (isset($v1))?$v1['district']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ខេត្ត/រាជធានី :</p>
                            <p class="inputemploymenten">Province: </p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="province" class="form-control" value="<?php echo (isset($v1))?$v1['province']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">លេខទូរសព្ទផ្ទាល់ខ្លួន:</p>
                            <p class="inputemploymenten">Personal Telephone:</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="phone" class="form-control" value="<?php echo (isset($v0))?$v0['phone']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <p class="bold"> 4 - </p>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">កម្រិតវប្បធម៌: </p>
                            <p class="inputemploymenten">Education: </p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="education" class="form-control" value="<?php echo (isset($v0))?$v0['education']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ជំនាញ :</p>
                            <p class="inputemploymenten">Major :</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="major" class="form-control" value="<?php echo (isset($v0))?$v0['major']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ឈ្មោះគ្រឺះស្ថានសិក្សា:</p>
                            <p class="inputemploymenten">Name of School or University:</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="school" class="form-control" value="<?php echo (isset($v0))?$v0['school']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ពីឆ្នាំ :</p>
                            <p class="inputemploymenten">From: </p>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="date" name="school_start_date" class="form-control" value="<?php echo (isset($v0))?explode(" ",$v0['shool_start_date'])[0]:'';?>" <?php echo $d1;?>>
                                <div class="input-group-append">
                                    <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ដល់ឆ្នាំ:</p>
                            <p class="inputemploymenten">To: </p>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="date" name="school_end_date" class="form-control" value="<?php echo (isset($v0))?explode(" ",$v0['school_end_date'])[0]:'';?>" <?php echo $d1;?>>
                                <div class="input-group-append">
                                    <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-8">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <p class="bold"> 5 -</p>
                </div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="inputemploymentkh">ចំណេះដឺងភាសាបរទេស</p>
                            <p class="inputemploymenten">Language Skill </p>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="language_skill" class="form-control" value="<?php echo (isset($v0))?$v0['language_skill']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <p class="bold"> 6 - </p>
                </div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="inputemploymentkh">មុខរបរ ឬ មុខងារ និង ទីកន្លែងរស់នៅបន្តបន្ទាប់ចាប់ពីឆ្នាំ១៩៧៩ដល់បច្ចុប្បន្ន / Carrer & Address from 1979 to present: </p>
                            <p class="inputemploymenten"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-sm-12">
                            <textarea class="form-control" name="carrer" id="exampleFormControlTextarea1" rows="5" <?php echo $d;?>><?php echo (isset($v2))?$v2['carrer']:'';?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-1">
                    <p class="bold"> 7 - </p>
                </div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="inputemploymentkh">មុខងារបច្ចុប្បន្ននៅក្នុងក្រុមហ៊ុនធើបូថេ ឯ.ក :</p>
                            <p class="inputemploymenten">Positon in TURBOTRCH Co., Ltd: </p>
                        </div>
                        <div class="col-sm-7">
                            <select name="position" class="form-control" <?php echo $d;?>>
                                <?php
                                    foreach($pos as $key=>$rr){
                                        $sel='';
                                        if(isset($v2)){
                                            if($v2['ma_position_id']==$rr['id']){
                                                $sel='selected';
                                            }
                                        }else{
                                            if($key==0){
                                                echo '<option value="-1" selected hidden disabled></option>';
                                            }
                                        }
                                        echo '<option value="'.$rr['id'].'" '.$sel.'>'.$rr['name'].'</option>';
                                    }
                                ?>
                             </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="inputemploymentkh">បម្រើការនៅនាយកដ្ឋាន :</p>
                            <p class="inputemploymenten">Department : </p>
                        </div>
                        <div class="col-sm-7">
                            <select name="dept" class="form-control" <?php echo $d;?>>
                                <?php
                                    foreach($dept as $key=>$rr){
                                        $sel='';
                                        if(isset($v2)){
                                            if($v2['ma_company_dept_id']==$rr['id']){
                                                $sel='selected';
                                            }
                                        }else{
                                            if($key==0){
                                                echo '<option value="-1" selected hidden disabled></option>';
                                            }
                                        }
                                        echo '<option value="'.$rr['id'].'" '.$sel.'>'.$rr['name'].'</option>';
                                    }
                                ?>
                             </select>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row"​>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="inputemploymentkh">អត្តលេខប័ណ្ណសម្គាល់ការងារលេខ:</p>
                            <p class="inputemploymenten">ID No : </p>
                        </div>
                        <div class="col-sm-6">
                             <input type="text" name="id_number" class="form-control" value="<?php echo (isset($v2))?$v2['id_number']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="inputemploymentkh">ការបរិច្ចេទចូលបម្រើការងារ:</p>
                            <p class="inputemploymenten">Wrok Start Date : </p>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="date" name="start_work_date" class="form-control" value="<?php echo (isset($v2))?explode(" ",$v2['start_work_date'])[0]:'';?>" <?php echo $d;?>>
                                <div class="input-group-append">
                                    <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row"​>
                <div class="col-md-1">
                    <p class="bold"> 8 - </p>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="inputemploymentkh"> អត្តសញ្ញាណប័ណ្ណ ឬ លិខិតឆ្លងដែនលេខ:</p>
                            <p class="inputemploymenten">Identity card or Passport No : </p>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="id_card_r_passport" class="form-control" value="<?php echo (isset($v2))?$v2['id_card_r_passport']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="inputemploymentkh">ធ្វើនៅថ្ងៃ :</p>
                            <p class="inputemploymenten">Date of identity card or Passport : </p>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="date" name="id_card_r_passport_date" class="form-control" value="<?php echo (isset($v2))?explode(" ",$v2['id_card_r_passport_date'])[0]:'';?>" <?php echo $d;?>>
                                <div class="input-group-append">
                                    <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"​>
                <div class="col-md-1">
                    <p class="bold"> 9 - </p>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="inputemploymentkh">សៀវភៅស្នាក់នៅ ឬ សៀវភៅគ្រួសារលេខ :</p>
                            <p class="inputemploymenten">Living Book or Familty Book No : </p>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="family_book_number" class="form-control" value="<?php echo (isset($v2))?$v2['family_book_number']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="inputemploymentkh">ធ្វើនៅថ្ងៃ  :</p>
                            <p class="inputemploymenten">Date of Living Book or Familty Book : </p>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="date" name="family_book_number_date" class="form-control" value="<?php echo (isset($v2))?explode(" ",$v2['family_book_date'])[0]:'';?>" <?php echo $d;?>>
                                <div class="input-group-append">
                                    <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        {{-- =========================================== Table ================================================ --}}

            <div class="row" >
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-1">
                            <p class="bold"> 10 -</p>
                        </div>
                        <div class="col-md-8">
                            <p class="inputemploymentkh">សាច់ញាតិផ្ទាល់ (កូនបង្កើត, កូនសុំ, បងប្អូនជីដូនមួយ, ឪពុក-ម្តាយបង្កើត) កុំពុងបម្រលការងារនៅ ក្រុមហ៊ុន​ ធើបូថេ ឯ.ក</p>
                            <p class="inputemploymenten">Direct Relative (Childrens, Cousins, Fatder Or Motder) during working  in TURBOTECH Co., Ltd </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-1">
                            <p class="inputemploymentkh"></p>
                        </div>
                        <div class="col-md-10" >
                            <table class="table display" border=1 style="text-aling:center">
                                <tr>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <p class="inputemploymentkh">ឈ្មោះ</p>
                                        <p class="inputemploymenten">Name : </p>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <p class="inputemploymentkh">លេខប័ណ្ណការងារ</p>
                                        <p class="inputemploymenten">ID No : </p>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <p class="inputemploymentkh">មុខងារ</p>
                                        <p class="inputemploymenten">Position : </p>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <p class="inputemploymentkh">នៅនាយកដ្ឋាន</p>
                                        <p class="inputemploymenten">In department : </p>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <p class="inputemploymentkh">ត្រូវជា</p>
                                        <p class="inputemploymenten">Relationship to be: </p>
                                    </td>
                                </tr>
                                <?php for($i=0;$i<3;$i++){?>
                                <tr>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <input type="text" name="relate_name[]" class="form-control" value="<?php echo (isset($v3[$i]))?$v3[$i]['relative_name']:'';?>" <?php echo $d1;?>>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <input type="text" name="relate_id_number[]" class="form-control" value="<?php echo (isset($v3[$i]))?$v3[$i]['relative_id_number']:'';?>" <?php echo $d1;?>>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <select name="relate_position[]" id="" class="form-control" <?php echo $d1;?>>
                                        <?php
                                            foreach($pos as $key=>$rr){
                                                $sel='';
                                                if(isset($v3[$i])){
                                                    if($v3[$i]['relative_positionid']==$rr['id']){
                                                        $sel='selected';
                                                    }
                                                }else{
                                                    if($key==0){
                                                        echo '<option value="-1" selected hidden disabled></option>';
                                                    }
                                                }
                                                echo '<option value="'.$rr['id'].'" '.$sel.'>'.$rr['name'].'</option>';
                                            }
                                        ?>
                                        </select>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <select name="relate_dept[]" id="" class="form-control" <?php echo $d1;?>>
                                        <?php
                                             foreach($dept as $key=>$rr){
                                                $sel='';
                                                if(isset($v3[$i])){
                                                    if($v3[$i]['relative_company_dept_id']==$rr['id']){
                                                        $sel='selected';
                                                    }
                                                }else{
                                                    if($key==0){
                                                        echo '<option value="-1" selected hidden disabled></option>';
                                                    }
                                                }
                                                echo '<option value="'.$rr['id'].'" '.$sel.'>'.$rr['name'].'</option>';
                                            }
                                        ?>
                                        </select>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <input type="text" name="relation[]" class="form-control" value="<?php echo (isset($v3[$i]))?$v3[$i]['relative_relation']:'';?>" <?php echo $d1;?>>
                                    </td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                        <div class="col-md-1">
                            <p class="inputemploymentkh"></p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        {{-- ============================================== End ================================================== --}}


            <div class="row">
                <div class="col-md-1">
                    <p class="bold"> 11 - </p>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh"> ប្តី​​ ឬ ប្រពន្ធឈ្មោះ</p>
                            <p class="inputemploymenten">Spouse's Name :</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="spouse_name" class="form-control" value="<?php echo (isset($v4))?$v4['spouse_name']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ថ្ងៃ ខែឆ្នាំកំណើត:</p>
                            <p class="inputemploymenten">Date of Birtd :</p>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="date" name="spouse_birth_date" class="form-control" value="<?php echo (isset($v4))?explode(" ",$v4['birth_date'])[0]:'';?>" <?php echo $d1;?>>
                                 <div class="input-group-append">
                                     <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
                                 </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ជនជាតិ :</p>
                            <p class="inputemploymenten">Nation :</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="spouse_nation" class="form-control" value="<?php echo (isset($v4))?$v4['spouse_nation']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">សញ្ញាតិ  :</p>
                            <p class="inputemploymenten">Nationality</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="spouse_nationality" class="form-control" value="<?php echo (isset($v4))?$v4['spouse_nationality']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">សាសនា  :</p>
                            <p class="inputemploymenten">Religion :</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="spouse_religion" class="form-control" value="<?php echo (isset($v4))?$v4['spouse_religion']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh"> ទីកន្លែងកំណើត :</p>
                            <p class="inputemploymenten">Place of birth :</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="spouse_birth_place" class="form-control" value="<?php echo (isset($v4))?$v4['spouse_birth_place']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh"> ទីលោនៅបច្ចុប្បន្ន :</p>
                            <p class="inputemploymenten">Current Address :</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="spouse_current_address" class="form-control" value="<?php echo (isset($v4))?$v4['spouse_name']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh"> លេខទូរសព្ទ :</p>
                            <p class="inputemploymenten">His/Her Telephone :</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="spouse_phone" class="form-control" value="<?php echo (isset($v4))?$v4['spouse_phone']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">មុខរបរ​ ឬ មុខងារបច្ចុប្បន្ន :</p>
                            <p class="inputemploymenten">His/Her Positon  </p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="spouse_postion" class="form-control" value="<?php echo (isset($v4))?$v4['spouse_position']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">លេខប័ណ្ណសម្គាល់ :</p>
                            <p class="inputemploymenten">ID No : </p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="spouse_id_number" class="form-control" value="<?php echo (isset($v4))?$v4['spouse_id_number']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">ទីកន្លែង :</p>
                            <p class="inputemploymenten">His/Her work place: </p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="spouse_work_place" class="form-control" value="<?php echo (isset($v4))?$v4['spouse_work_place']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">មានកូន :</p>
                            <p class="inputemploymenten">No. of childen </p>
                        </div>
                        <div class="col-sm-8">
                            <input type="number" min="0" step="1" name="children_count" class="form-control" value="<?php echo (isset($v4))?$v4['spouse_children_count']:'';?>" <?php echo $d1;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <p class="inputemploymentkh">នាក់ "បញ្ចាក់ពីឈ្មោះ ,ភេទ, ថ្ងៃ ខៃ ឆ្នាំ កំណើត និង មុខរបរសព្វថ្ងៃ " ៖</p>
                    <p class="inputemploymenten">Please descrip name,sex,date of birth & job  :</p>
                </div>
            </div>

        {{-- ======================================== Table  ========================================= --}}
            <div class="row" >
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-1">
                            <p class="inputemploymentkh"></p>
                        </div>
                        <div class="col-md-10" >
                            <table class="table display" border=1 style="text-aling:center">
                                <tr>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <p class="inputemploymentkh">ឈ្មោះ</p>
                                        <p class="inputemploymenten">Name : </p>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <p class="inputemploymentkh">ភេទ</p>
                                        <p class="inputemploymenten">Sex : </p>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <p class="inputemploymentkh">ថ្ងៃ ខៃ ឆ្នាំ កំណើត</p>
                                        <p class="inputemploymenten">Date of birth : </p>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <p class="inputemploymentkh">លីវ </p>
                                        <p class="inputemploymenten">Single: </p>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <p class="inputemploymentkh">រៀបការ</p>
                                        <p class="inputemploymenten">Married: </p>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <p class="inputemploymentkh">មុខរបរសព្វថ្ងៃ</p>
                                        <p class="inputemploymenten">job: </p>
                                    </td>
                                </tr>
                                <?php for($i=0;$i<5;$i++){?>
                                <tr>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <input type="text" name="child_name[]" class="form-control" value="<?php echo (isset($v5[$i]))?$v5[$i]['child_name']:'';?>" <?php echo $d1;?>>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <select name="child_sex[]" id="" class="form-control" <?php echo $d1;?>>
                                            <option value="male" <?php echo (isset($v5[$i]))?(($v5[$i]['child_gener']=="male")?'checked':''):'';?>>Male</option>
                                            <option value="female" <?php echo (isset($v5[$i]))?(($v5[$i]['child_gener']=="female")?'checked':''):'';?>>Famale</option>
                                        </select>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">

                                         <div class="input-group">
                                            <input type="date" name="child_birth_date[]" class="form-control" value="<?php echo (isset($v5[$i]))?explode(" ",$v5[$i]['child_birth_date'])[0]:'';?>" <?php echo $d1;?>>
                                            <div class="input-group-append">
                                                <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
                                        </div>
                                    </div>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <input type="radio" name="child_marital<?php echo $i;?>" id="child_marital<?php echo $i;?>" value="single" <?php echo (isset($v5[$i]))?(($v5[$i]['child_marital_status']=="single")?'checked':''):'';?> <?php echo $d1;?>>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <input type="radio" name="child_marital<?php echo $i;?>" id="child_marital<?php echo $i;?>" value="married" <?php echo (isset($v5[$i]))?(($v5[$i]['child_marital_status']=="married")?'checked':''):'';?> <?php echo $d1;?>>
                                    </td>
                                    <td style="text-align:center;border-color: #00a8ff">
                                        <input type="text" name="child_job[]" class="form-control" value="<?php echo (isset($v5[$i]))?$v5[$i]['child_job']:'';?>" <?php echo $d1;?>>
                                    </td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                        <div class="col-md-1">
                            <p class="inputemploymentkh"></p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        {{-- ====================================== End ======================================= --}}


            <div class="row">
                <div class="col-md-1">
                    <p class="bold"> 12 - </p>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="inputemploymentkh">ឪពុក </p>
                            <p class="inputemploymenten">Father's name: </p>
                        </div>
                        <div class="col-sm-7">
                            <input type="text" name="father_name" class="form-control" value="<?php echo (isset($father))?$father['parent_name']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="inputemploymentkh">អាយុ </p>
                            <p class="inputemploymenten">Age: </p>
                        </div>
                        <div class="col-sm-7">
                            <input type="number" min="0" step="1" name="father_age" class="form-control" value="<?php echo (isset($father))?$father['parent_age']:'';?>" <?php echo $d;?>>
                        </div>
                        <div class="col-sm-2">
                            <p class="inputemploymentkh">ឆ្មាំ </p>
                            <p class="inputemploymenten">Years </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-6" align="center">
                            <label >
                                <input type="radio"  name="father_stat" id="father_stat" value="live" <?php echo (isset($father))?(($father['parent_dead_live']=='live')?'checked':''):'';?> <?php echo $d;?>>
                                    <div style="float:right;">
                                    <p class="inputinfokh"> រស់/<span style="margin-top: -20px;">Living</span></p>
                                    </div>
                           </label>
                        </div>
                        <div class="col-sm-6" align="center">
                            <label >
                                <input type="radio"  name="father_stat" id="father_stat" value="dead" <?php echo (isset($father))?(($father['parent_dead_live']=='dead')?'checked':''):'';?> <?php echo $d;?>>
                                    <div style="float:right;">
                                    <p class="inputinfokh"> ស្លាប់/<span style="margin-top: -20px;">Death</span></p>

                                    </div>
                           </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">មុខរបរបច្ចុប្បន្ន​</p>
                            <p class="inputemploymenten"> His job</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="father_job" class="form-control" value="<?php echo (isset($father))?$father['parent_job']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="inputemploymentkh">អាស័យដ្ឋានអចិន្រ្តៃយ៏ :</p>
                            <p class="inputemploymenten">Current Address :</p>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="father_current_address" class="form-control" value="<?php echo (isset($father))?$father['parent_current_address']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="inputemploymentkh">លេខទូរសព្ទ :</p>
                            <p class="inputemploymenten">Phone Number :</p>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="father_phone" class="form-control" value="<?php echo (isset($father))?$father['parent_phone']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <p class="bold"> 13 - </p>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="inputemploymentkh">ម្តាយ </p>
                            <p class="inputemploymenten">Mother's name: </p>
                        </div>
                        <div class="col-sm-7">
                            <input type="text" name="mother_name" class="form-control" value="<?php echo (isset($mother))?$mother['parent_name']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="inputemploymentkh">អាយុ </p>
                            <p class="inputemploymenten">Age: </p>
                        </div>
                        <div class="col-sm-7">
                            <input type="number" min="0" step="1" name="mother_age" class="form-control" value="<?php echo (isset($mother))?$mother['parent_age']:'';?>" <?php echo $d;?>>
                        </div>
                        <div class="col-sm-2">
                            <p class="inputemploymentkh">ឆ្មាំ </p>
                            <p class="inputemploymenten">Years </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-6" align="center">
                            <label >
                                <input type="radio"  name="mother_stat" id="mother_stat" value="live" <?php echo (isset($mother))?(($mother['parent_dead_live']=='live')?'checked':''):'';?> <?php echo $d;?>>
                                    <div style="float:right;">
                                    <p class="inputinfokh"> រស់/<span style="margin-top: -20px;">Living</span></p>
                                    </div>
                           </label>
                        </div>
                        <div class="col-sm-6" align="center">
                            <label >
                                <input type="radio"  name="mother_stat" id="mother_stat" value="dead" <?php echo (isset($mother))?(($mother['parent_dead_live']=='dead')?'checked':''):'';?> <?php echo $d;?>>
                                    <div style="float:right;">
                                    <p class="inputinfokh"> ស្លាប់/<span style="margin-top: -20px;">Death</span></p>

                                    </div>
                           </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="inputemploymentkh">មុខរបរបច្ចុប្បន្ន​</p>
                            <p class="inputemploymenten"> His job</p>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="mother_job" class="form-control" value="<?php echo (isset($mother))?$mother['parent_job']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="inputemploymentkh">អាស័យដ្ឋានអចិន្រ្តៃយ៏ :</p>
                            <p class="inputemploymenten">Current Address :</p>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="mother_current_address" class="form-control" value="<?php echo (isset($mother))?$mother['parent_current_address']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="inputemploymentkh">លេខទូរសព្ទ :</p>
                            <p class="inputemploymenten">Phone Number :</p>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="mother_phone" class="form-control" value="<?php echo (isset($mother))?$mother['parent_phone']:'';?>" <?php echo $d;?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <p class="inputemploymentkh">ខ្ញុំបាទ/នាងខ្ញុំ សូមសន្យាថា សេចក្តីរាយណ៍ក្នុងប្រវត្តិរូបសង្ខេបខាងលើនេះ សុទ្ធតែជាការពិតទាំងអស់ ។</p>
                    <p class="inputemploymenten">I certify thay all information I have provided above is true all .</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-8" align="center">
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="inputinfokh">ធ្វើនៅ...................ថ្ងៃទី <?php echo (isset($create_date))?' '.util::conv_kh(date_format(date_create($create_date),"d")).' ':'.........';?> ខែ <?php echo (isset($create_date))?' '.util::conv_month(date_format(date_create($create_date),"m")).' ':'.........';?> ឆ្នាំ <?php echo (isset($create_date))?' '.util::conv_kh(date_format(date_create($create_date),"Y")).' ':'.........';?> </h6>
                            <h6 class="inputinfokh" style="margin-top:10px">Date : <?php echo (isset($create_date))?date_format(date_create($create_date),"d"):'        ';?> Month: <?php echo (isset($create_date))?date_format(date_create($create_date),"M"):'        ';?> Year: <?php echo (isset($create_date))?date_format(date_create($create_date),"Y"):'        ';?></h6>
                            <h6 class="inputinfokh" style="margin-top:10px">ហត្ថលេខា/Signature </h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="inputinfokh">ឈ្មោះ/Name <?php echo (isset($req_by))?"<b>".$req_by."</b>":'.......................................';?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
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
                <br>
            </div>
    </div>
<form>
    @include('e_request.footer');
</section>

<style>
/* body{
    font-size: 16px;
    color: #6f6f6f;
    font-weight: 400;
    line-height: 28px;
    letter-spacing: 0.8px;
    margin-top:20px;
} */
.font-size38 {
    font-size: 38px;
}
.team-single-text .section-heading h4,
.section-heading h5 {
    font-size: 36px
}

.team-single-text .section-heading.half {
    margin-bottom: 20px
}

@media screen and (max-width: 1199px) {
    .team-single-text .section-heading h4,
    .section-heading h5 {
        font-size: 32px
    }
    .team-single-text .section-heading.half {
        margin-bottom: 15px
    }
}

@media screen and (max-width: 991px) {
    .team-single-text .section-heading h4,
    .section-heading h5 {
        font-size: 28px
    }
    .team-single-text .section-heading.half {
        margin-bottom: 10px
    }
}

@media screen and (max-width: 767px) {
    .team-single-text .section-heading h4,
    .section-heading h5 {
        font-size: 24px
    }
}


.team-single-icons ul li {
    display: inline-block;
    border: 1px solid #02c2c7;
    border-radius: 50%;
    color: #86bc42;
    margin-right: 8px;
    margin-bottom: 5px;
    -webkit-transition-duration: .3s;
    transition-duration: .3s
}

.team-single-icons ul li a {color: #02c2c7;display: block;font-size: 14px;height: 25px;line-height: 26px;text-align: center;width: 25px}
.team-single-icons ul li:hover {background: #02c2c7;border-color: #02c2c7}
.team-single-icons ul li:hover a {color: #fff}
.team-social-icon li {display: inline-block;margin-right: 5px}
.team-social-icon li:last-child {margin-right: 0}
.team-social-icon i {width: 30px;height: 30px;line-height: 30px;text-align: center;font-size: 15px;border-radius: 50px}
.padding-30px-all {padding: 30px;}
.bg-light-gray {background-color: #f7f7f7;}
.text-center {text-align: center!important;}
img {max-width: 100%;height: auto;}
.list-style9 {list-style: none;padding: 0}
.list-style9 li {position: relative;padding: 0 0 15px 0;margin: 0 0 15px 0;border-bottom: 1px dashed rgba(0, 0, 0, 0.1)}
.list-style9 li:last-child {border-bottom: none;padding-bottom: 0;margin-bottom: 0}
.text-sky {color: #02c2c7}
.text-orange {color: black;}
.text-green {color: #5bbd2a}
.text-yellow {color: #f0d001}
.text-pink {color: #ff48a4}
.text-purple {color: #9d60ff}
.text-lightred {color: #ff5722}
a.text-sky:hover {opacity: 0.8;color: #02c2c7}
a.text-orange:hover {opacity: 0.8;color: #e95601}
a.text-green:hover {opacity: 0.8;color: #5bbd2a}
a.text-yellow:hover {opacity: 0.8;color: #f0d001}
a.text-pink:hover {opacity: 0.8;color: #ff48a4}
a.text-purple:hover {opacity: 0.8;color: #9d60ff}
a.text-lightred:hover {opacity: 0.8;color: #ff5722}
.custom-progress {height: 10px;border-radius: 50px;box-shadow: none;margin-bottom: 25px;}
.progress {
    display: -ms-flexbox;
    display: flex;
    height: 1rem;
    overflow: hidden;
    font-size: .75rem;
    background-color: #e9ecef;
    border-radius: .25rem;
}


.bg-sky {
    background-color: #02c2c7
}

.bg-orange {
    background-color: #e95601
}

.bg-green {
    background-color: #5bbd2a
}

.bg-yellow {
    background-color: #f0d001
}

.bg-pink {
    background-color: #ff48a4
}

.bg-purple {
    background-color: #9d60ff
}

.bg-lightred {
    background-color: #ff5722
}
input{
    font-family: khmer OS Content,cursive !important;
}
body {
  background-color: #efefef;
}

.profile-pic {
    max-width: 200px;
    max-height: 200px;
    display: block;
}

.file-upload {
    display: none;
}
.MyPfFrame {
    margin: auto;
    width: 200px;
    height: 200px;
    border:8px solid #f4f6f9;
    margin-top: 50px

}

.penframe {
    transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    width: 186px;
    height: 181px;
    padding-top: 140px;
    margin: auto;
    text-align: center;
    margin-top: -191px;

}
.p-image:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}

.upload-button {
  font-size: 1.2em;
  color: #00000000;
  background: #00000000;
}

.upload-button:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
  color: #595959;
  background-color: #00000010;
  cursor: pointer;
}

</style>
<section class="content">

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-4" align="center">

            <form method="post"  enctype="multipart/form-data" id='form_img' >
                @csrf                
                <div class="row">
                    <div class="col-md-12">
                        <div class="MyPfFrame">
                            <img class="profile-pic" src="<?php echo (isset($pro)&&!empty($pro['image']))?$pro['image']:"https://bootdey.com/img/Content/avatar/avatar7.png";?>" width="186px" id='image_'>
                        </div>
            
                        <div class="penframe" align="center">
                            <i class="penframe fas fa-pencil-alt upload-button"></i>
                            <input class="file-upload" type="file" id='img' name="_img" accept="image/*"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10" style="margin-top: 40px" align="center">

                            <input class="btn btn-default" type="button"  onclick="up_img('img','form_img')" value="Change">

                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12" style="margin-top: 40px" align="center">
                        <h4 class="title_En"> <?php echo (isset($pro))?$pro['name']:"";?></h4>
                    </div>
                </div>
            </form>
            </div>


            <div class="col-md-8">

                <div class="row">
                    <div class="col-md-12">
                        <div class="team-single-text padding-50px-left sm-no-padding-left">
                            <h4 class="font-size38 sm-font-size32 xs-font-size30 bold"><?php echo (isset($pro))?$pro['name']:"";?></h4>
                            <p class="no-margin-bottom"></p>
                            <div class="contact-info-section margin-40px-tb">
                                <ul class="list-style9 no-margin">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="fa fa-address-book"></i>
                                                <strong class="margin-10px-left text-orange">KHMER NAME :</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p class="title_khleave"><?php echo (isset($pro))?$pro['name_kh']:"";?></p>
                                            </div>
                                        </div>
        
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="far fa-id-badge"></i>
                                                <strong class="margin-10px-left text-orange">ID NUMBER :</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p><?php echo (isset($pro))?$pro['id_number']:"";?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="far fa-building"></i>
                                                <strong class="margin-10px-left text-orange">COMPANY :</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p><?php echo (isset($pro))?$pro['company']:"";?></p>
                                            </div>
                                        </div>
        
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="fas fa-code-branch"></i>
                                                <strong class="margin-10px-left text-orange">BRANCH:</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p><?php echo (isset($pro))?$pro['branch']:"";?></p>
                                            </div>
                                        </div>
        
                                    </li>
        
                                    <li>
                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="fas fa-address-card"></i>
                                                <strong class="margin-10px-left text-orange">POSITION :</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p><?php echo (isset($pro))?$pro['position']:"";?></p>
                                            </div>
                                        </div>
        
                                    </li>
        
                                    <li>
        
                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="fas fa-venus-mars"></i>
                                                <strong class="margin-10px-left text-orange">GENDER :</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p><?php echo (isset($pro))?($pro['sex']=='male')?'Male':'Female':"";?></p>
                                            </div>
                                        </div>
        
                                    </li>
        
                                    <li>
        
                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <strong class="margin-10px-left text-orange">ADDRESS:</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p><?php echo (isset($pro))?$pro['address']:"";?></p>
                                            </div>
                                        </div>
        
                                    </li>
                                    <li>
        
                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="fas fa-mobile-alt"></i>
                                                <strong class="margin-10px-left xs-margin-four-left text-orange">CONTACT :</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p><?php echo (isset($pro))?$pro['contact']:"";?></p>
                                            </div>
                                        </div>
        
                                    </li>
                                    <li>
        
                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="fas fa-phone"></i>
                                                <strong class="margin-10px-left text-orange">OFFICE PHONE :</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p><?php echo (isset($pro))?$pro['office_phone']:"";?></p>
                                            </div>
                                        </div>
        
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="fas fa-at"></i>
                                                <strong class="margin-10px-left xs-margin-four-left text-orange">EMAIL :</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p><a href="javascript:void(0)"><?php echo (isset($pro))?$pro['email']:"";?></a></p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <hr>                    
                <form method="post" id='form1' name='form1' onsubmit="return change_password(document.form1.old_pass,document.form1.new_pass,document.form1.con_pass)">
                    @csrf
                <div class="row"> 
                    <div class="col-md-12" align="center">
                        <p class="during">អ្នកអាចផ្លាស់ប្តូរលេខសំងាត់ដោយបញ្ចូល​លេខសំងាត់នៅខាងក្រោម</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="during">
                            <i class="fas fa-unlock"></i><strong> លេខសំងាត់ចាស់ :</strong>
                        </p>
                    </div>
                    <div class="col-md-8">
                        <input type="password" name="old_pass" id="" class="form-control" required style="font-family:Arial, Helvetica, sans-serif">
                        <small id="opasswordHelpBlock" class="form-text" style="color:red">
                        </small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="during">
                            <i class="fas fa-key"></i><strong> លេខសំងាត់ថ្មី :</strong>
                        </p>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="password" name="new_pass" id="" class="form-control" aria-describedby="passwordHelpBlock" pattern="(?=.*[a-z]).{8,}" title="លេខសំងាត់ត្រូវមានចំនួន៨តួរយ៉ាងតិចរួមមានតួអក្សរនិងលេខ" required style="font-family: khmer OS Content,cursive !important; font-size:17px;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <small id="passwordHelpBlock" style="font-family: 'Khmer', cursive; font-size:15px;" >លេខសំងាត់ត្រូវមានចំនួន៨តួរយ៉ាងតិច​រួមមានតួអក្សរនិងលេខ</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="during">
                            <i class="fas fa-lock"></i><strong> បញ្ចាក់លេខសំងាត់ថ្មី :</strong>
                        </p>
                    </div>
                    <div class="col-md-8">
                        <input type="password" name="con_pass" id="" class="form-control" required>
                        <small id="cpasswordHelpBlock" class="form-text" style="color:red">
                        </small>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" id="btn-sub" name='change_pass' value="ប្តូរលេខសំងាត់"​ class="btn btn-primary col-3 offset-4" style="font-family: 'Khmer', cursive; font-size:18px;" >
                    </div>
                </div>
                <br> 
                <br> 
                </form>
            </div>
        </div>



        {{-- <div class="container-fluid" style="margin-top:30px">
        <div class="team-single">
        <div class="row">
            <div class="col-lg-4" align="center">
                <div class="row">
                    {{-- <div class="team-single-img">
                    <label for="img"​ style="font-family: 'Khmer'; cursor:pointer;" title="Change">
                        <img id='image_' class="pfImg" style="width: 352px; height: 352px;" src="<?php //echo (isset($pro)&&!empty($pro['image']))?$pro['image']:"https://bootdey.com/img/Content/avatar/avatar7.png";?>" alt=""></label>
                    <form method="post"  enctype="multipart/form-data" id='form_img' >
                        @csrf
                        <label for="sub" style="margin-top:2%; font-family:'Chenla',cursive;" class="btn btn-primary">ប្តូររូបភាព</label>
                        <input type="file"  accept="image/*" name="_img" id="img" style="display:none;" onchange="readURL(this,'image_')">
                        <input type="button" onclick="up_img('img','form_img')" value="" id="sub" style="display:none;">
                    </form>
                </div> --}}


                {{-- <div class="team-single-img"> --}}
                    {{--  --}}
                        {{-- <img alt=""> --}}
                    
                        {{-- <label for="sub" style="margin-top:2%; font-family:'Chenla',cursive;" class="btn btn-primary">ប្តូររូបភាព</label>
                        <input type="file"  accept="image/*" name="_img" id="img" style="display:none;" onchange="readURL(this,'image_')">
                        <input type="button" onclick="up_img('img','form_img')" value="" id="sub" style="display:none;"> --}}
                    
                {{-- </div> --}}



                {{--<div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                    <h4 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600"></h4>
                    <p class="sm-width-95 sm-margin-auto"></p>
                     <div class="margin-20px-top team-single-icons">
                        <ul class="no-margin">
                            <li><a href="javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div> 
                </div>
                </div>
             </div> --}}

           {{-- <div class="col-lg-8 col-md-7">
                <div class="team-single-text padding-50px-left sm-no-padding-left">
                    <h4 class="font-size38 sm-font-size32 xs-font-size30"><?php //echo (isset($pro))?$pro['name']:"";?></h4>
                    <p class="no-margin-bottom"></p>
                    <div class="contact-info-section margin-40px-tb">
                        <ul class="list-style9 no-margin">
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fa fa-address-book"></i>
                                        <strong class="margin-10px-left text-orange">KHMER NAME :</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php// echo (isset($pro))?$pro['name_kh']:"";?></p>
                                    </div>
                                </div>

                            </li>
                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="far fa-id-badge"></i>
                                        <strong class="margin-10px-left text-orange">ID NUMBER :</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php //echo (isset($pro))?$pro['id_number']:"";?></p>
                                    </div>
                                </div>

                            </li>
                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="far fa-building"></i>
                                        <strong class="margin-10px-left text-orange">COMPANY :</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php //echo (isset($pro))?$pro['company']:"";?></p>
                                    </div>
                                </div>

                            </li>

                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-code-branch"></i>
                                        <strong class="margin-10px-left text-orange">BRANCH:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php// echo (isset($pro))?$pro['branch']:"";?></p>
                                    </div>
                                </div>

                            </li>

                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-address-card"></i>
                                        <strong class="margin-10px-left text-orange">POSITION :</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php //echo (isset($pro))?$pro['position']:"";?></p>
                                    </div>
                                </div>

                            </li>

                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-venus-mars"></i>
                                        <strong class="margin-10px-left text-orange">GENDER :</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php //echo (isset($pro))?($pro['sex']=='male')?'Male':'Female':"";?></p>
                                    </div>
                                </div>

                            </li>

                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <strong class="margin-10px-left text-orange">ADDRESS:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php //echo (isset($pro))?$pro['address']:"";?></p>
                                    </div>
                                </div>

                            </li>
                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-mobile-alt"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-orange">CONTACT :</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php //echo (isset($pro))?$pro['contact']:"";?></p>
                                    </div>
                                </div>

                            </li>
                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-phone"></i>
                                        <strong class="margin-10px-left text-orange">OFFICE PHONE :</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php //echo (isset($pro))?$pro['office_phone']:"";?></p>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-at"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-orange">EMAIL :</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><a href="javascript:void(0)"><?php //echo (isset($pro))?$pro['email']:"";?></a></p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-md-8 offset-4">
                    <form method="post" id='form1' name='form1' onsubmit="return change_password(document.form1.old_pass,document.form1.new_pass,document.form1.con_pass)">
                        @csrf
                        <hr>
                        <div class="form-group">
                            <h5 for="" style="font-family: 'Khmer', cursive; font-size:19px;" align="center">អ្នកអាចផ្លាស់ប្តូរលេខសំងាត់ដោយបញ្ចូលលេខសំងាត់នៅខាងក្រោម</h5>
                            <div class="container-fluid"> <hr>
                                <div class="row">
                                    <label for="" class="col-md-4" style="font-family: 'Khmer', cursive; font-size:18px;" ><i class="fas fa-unlock"></i>លេខសំងាត់ចាស់ :</label>
                                    <input type="password" name="old_pass" id="" class="form-control col-md-7" required style="font-family:Arial, Helvetica, sans-serif">
                                    <small id="opasswordHelpBlock" class="form-text offset-4" style="color:red">
                                    </small>
                                </div><br>
                                <div class="row">
                                    <label for="" class="col-md-4" style="font-family: 'Khmer', cursive; font-size:18px;" ><i class="fas fa-key"></i>លេខសំងាត់ថ្មី :</label>
                                    <input type="password" name="new_pass" id="" class="form-control col-md-7" aria-describedby="passwordHelpBlock" pattern="(?=.*[a-z]).{8,}" title="លេខសំងាត់ត្រូវមានចំនួន៨តួរយ៉ាងតិចរួមមានតួអក្សរនិងលេខ" required style="font-family: khmer OS Content,cursive !important; font-size:17px;">
                                    <small id="passwordHelpBlock" class="form-text text-muted offset-4" style="font-family: 'Khmer', cursive; font-size:15px;" >
                                        លេខសំងាត់ត្រូវមានចំនួន៨តួរយ៉ាងតិចរួមមានតួអក្សរនិងលេខ
                                    </small>
                                </div><br>
                                <div class="row">
                                    <label for="" class="col-md-4" style="font-family: 'Khmer', cursive; font-size:18px;" ><i class="fas fa-lock"></i>បញ្ចាក់លេខសំងាត់ថ្មី :</label>
                                    <input type="password" name="con_pass" id="" class="form-control col-md-7" required>
                                    <small id="cpasswordHelpBlock" class="form-text offset-4" style="color:red">
                                    </small>
                                </div><br>
                                <div class="row">
                                    <input type="submit" id="btn-sub" name='change_pass' value="ប្តូរលេខសំងាត់"​ class="btn btn-primary col-3 offset-4" style="font-family: 'Khmer', cursive; font-size:18px;" >
                                </div>
                            </div>
                        </div>
                    </form> --}}

                    {{-- <form action="controller/logout.php">
                        <div class="form-group" style="float:right">
                            <input type="submit" value="Logout" class="btn btn-danger">
                        </div>
                    </form> --}}
            </div>
        </div>
    </div>
</div> 

<div class="modal fade" id="prmsg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle" style="font-family: 'Khmer', cursive; font-size:17px;" >លេខសំងាត់បានប្តូររួចរាល់!</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <!-- <div class="modal-body">
        លេខសំងាត់ចាស់របស់អ្នកមិនត្រឹមត្រូវទេ!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
      </div> -->
    </div>
  </div>
</div>

<div class="modal fade" id="prload" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="example" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="example"><center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center></h5>
      </div>
    </div>
  </div>
</div>
</section>
<script>
    $(document).ready(function() {

    
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profile-pic').attr('src', e.target.result)
            .width(186)
            ;
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(".file-upload").on('change', function(){
    readURL(this);
    // readURL(this,'image_')
});

$(".upload-button").on('click', function() {
   $(".file-upload").click();
});
});
</script>
<script>

img_exist();
</script>
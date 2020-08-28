<?php 

use Illuminate\Support\Facades\DB;
// sql select position to show in select box
$sql = "SELECT id, name FROM ma_position ORDER BY name ASC";
$r = DB::select($sql);

?>

        <form role="form" action="hrm_recruitment_user_register" method="POST" accept-charset="utf-8" enctype="multipart/form-data" >
        
        @csrf  
            

            <div class="row">
            <div class= "col-lg-4 col-md-4 col-sm-4" style="background-color: rgba(37, 1, 1, 0.322); padding: 5px; border-right: 2px solid red;">
                <!-- ---------------Logo Image------------------- -->
                <div class="row row-style-1-2 ">
                <img class="img-fluid" src="storage/img/turbotech.png" style="border-radius:0%; padding: 5px;  width: 180px; height: 100px;">
                </div>
                <!-- ---------------------Contact Header----------------- -->
                <div class="row  row-style-1-2 kh-font-batt phone" style="color: lightskyblue; font-size: 14px;">
                    <label style=""> <b>ទំនាក់ទំនង</b></label>
                    <label>ទូរស័ព្វ  : (+855)23 999 998</label>
                    <b>Email : info@turbotech.com</b>
                </div>
                <!-- --------------------------Profile AnD login--------------------- -->
                <div class="row  row-style-1-2 profile" style="text-align:center; padding-left: 48%;padding-right: 0%;">
                    <img src="recruitment_user_style/img/user_login.png" alt="" width="35px" height="35px">
                </div>
                <div class="row" style="text-align:center; padding-left: 0%; padding-right: 0%; font-szie: 18px; ">
                        {{-- <a class="login-Quiz " style="" href="/hrm_recruitment_login" ><b>Login</b></a> --}}
                
                        <div class="container">
                            <a class="btn btn-primary " style="" href="/hrm_recruitment_login" ><b>Login</b></a>
                          </div>
                </div>
                
                
            </div>
            <div class= "col-lg-8 col-md-8 col-sm-8">
            <!-- <center> -->
            <ul class="">
                <li id="" class="line-form" data-type="control_head">
                <div class="form-header-group  header-default">
                    <div class="header-text httal htvam">
                    <h2 style="color: blue;">Create Account</h2>
                    <div id="subHeader_1" class="form-subHeader kh-font-batt " style="color: black;">
                        សូមធ្វើរការចុះឈ្មោះ​និងបំពេញនៅលក្ខខណ្ឌខាងក្រោម៖
                    </div>
                    </div>
                </div>
                </li>
                <li class="line-form " data-type="control_textbox" id="">
                <label class="form-label form-label-left " style="color: black;">
                    ឈ្មោះខ្មែរ
                    <span class="form-required">
                    *
                    </span>
                </label>
                <div id="cid_0" class="form-input ">
                    <input type="text" id="kh-name" name="khname" data-type="input-textbox" class="style_text form-control kh-font-batt validate[required, Email]" size="20" value="" data-component="first" aria-labelledby="label_1 sublabel_1_first" placeholder="Khmer Name" required="" />
                </div>
                </li>
                <li class="line-form " data-type="control_fullname" id="">
                <label class="form-label kh-font-batt form-label-left  " style="color: black;">
                    ឈ្មោះអង់គ្លេស
                    <span class="form-required">
                    *
                    </span>
                </label>
                <div id="cid_1" class="form-input">
                    <div data-wrapper-react="true">
                    <span class="form-sub-label-container " style="vertical-align:top" data-input-type="first">
                        <input type="text" id="first_1" name="firstname" class="form-control validate[required] kh-font-batt firstname input-name"  value="" data-component="first" aria-labelledby="label_1 sublabel_1_first" placeholder="Firstname" required="">
                    </span>
                    <span class="form-sub-label-container " style="vertical-align:top" data-input-type="last">
                        <input type="text" id="last_1" name="lastname" class="form-control kh-font-batt lastname ​​validate[required] input-name"  value="" data-component="last" aria-labelledby="label_1 sublabel_1_last"​ placeholder="Lastname" required="">
                    </span>
                    </div>
                </div>
                </li>
                <li class="line-form " data-type="control_textbox" id="">
                    <label class="form-label form-label-left " style="color: black;">
                        Email
                        <span class="form-required">
                        *
                        </span>
                    </label>
                    <div id="cid_5" class="form-input ">
                        <input type="email" id="email" name="emailaddress" data-type="input-textbox" class="style_text form-control kh-font-batt validate[required, Email]" size="20" value="" data-component="textbox" aria-labelledby="label_5" placeholder="Email" required="" />
                        <h6 id="error_email" style="font-weight:bold; color:#d42931; display: none;">Your email is already taken !</h6>
                    </div>
                    
                </li>
                <li class="line-form " data-type="control_textbox" id="id_11">
                <label class="form-label form-label-left " style="color: black;"> 
                    Password
                    <span class="form-required">
                    *
                    </span>
                </label>
                <div id="cid_11" class="form-input">
                    <input type="password" id="pass" name="password" data-type="input-textbox" class="form-control style_text"  value="" data-component="textbox" aria-labelledby="label_11" placeholder="Password" required=""/>
                </div>
                </li>
                <li class="line-form " data-type="control_textbox" id="id_9">
                <label class="form-label kh-font-batt form-label-left "style="color: black;"> មុខដំណែងការងារ 
                <span class="form-required">
                    *
                    </span>
                </label>
                <div id="cid_9" class="form-input"  required="">
                    <select style="color: black; " name="position" id="position" class="input100 form-control style_text validate[required]">
                        <?php
                                foreach($r as $key=>$rr){
                                    echo ($key<=1)?'<option value="-1" selected disabled hidden>Select position</option>':'';
                                    echo '<option value="'.$rr->id.'">'.$rr->name.'</option>';
                                }
                        ?>
                    </select>
                </div>
                </li>
                <li class="line-form " data-type="control_fileupload" id="id_7">
                <label class="form-label form-label-left " style="color: black;">
                    Upload CV
                    <span class="form-required">
                    *
                    </span>
                </label>
                <div class="uploadcv ">
                    <input type="button" class="uploadButton" value="Browse"​ ​​  ​autofocus  required/>
                    <input type="file"  class=" validate[required]" name="uploadcv"  data-imagevalidate="yes" data-file-accept="pdf, doc, docx, csv, zip, gif"  id="fileUpload" autofocus required />
                    <span class="fileName">Select CV..</span>
                </div>
        
                <!-- <div id="cid_7" class="form-input ">
                    <input type="file" id="uploadcv" name="uploadcv" style="color: white;" class="form-upload validate[required]" data-imagevalidate="yes" data-file-accept="pdf, doc, docx, csv, txt, html, zip, gif"  data-file-maxsize="10240" data-file-minsize="0" data-file-limit="0" data-component="fileupload" required="" />
                </div> -->
                </li>
                <li class="line-form " data-type="control_fileupload" id="id_10">
                <label class="form-label form-label-left " style="color: black;"> Upload Cover Letter 
                <span class="form-required">
                    *
                    </span>
                </label>
                <div class="uploadcover ">
                    <input type="button" class="uploadButton" value="Browse" autofocus  required />
                    <input type="file"  class=" validate[required]" name="uploadcover"  data-imagevalidate="yes" data-file-accept="pdf, doc, docx, csv, zip, gif"  id="fileUpload"  autofocus required/>
                    <span class="fileName">Select Cover..</span>
                </div>
        
                <!-- <div id="cid_10" class="form-input">
                    <input type="file" id="uploadcover" name="uploadcover" style="color:white" class="form-upload validate[required]" data-imagevalidate="yes" data-file-accept="pdf, doc, docx, csv, txt, html, zip, gif" data-file-maxsize="10240" data-file-minsize="0" data-file-limit="0" data-component="fileupload" required="" />
                </div> -->
                </li>
                <li class="" data-type="" id="id_2">
                <div id="cid_2" class="btn-form-create">
                    <button id="input_2" type="submit" name="btnSubmit" class="form-btn" data-component="button" data-content="">
                        Create
                    </button>

                </div>
                </li>
            </ul>
            <!-- </center> -->
            </div>
            <!-- <div class= "col-lg-2"></div> -->
            </div>
        </form>

<?php 
        $x = '';
        if(isset($em_error)){
            $x =  $em_error;
        }  
        $xx = '';
        if(isset($success)){
            $xx = $success;
        }

?>

<script>

    var p = {!! json_encode($x) !!};
    if(p == 1){
        document.getElementById('error_email').style.display = 'block';
        setTimeout(function(){ 
            document.getElementById('error_email').style.display = 'none';
         }, 5000);
    }

    var j = {!! json_encode($xx) !!};
    if(j == 1){
        Swal.fire({
        title: 'Account create successfully !',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
        })
    }

</script>





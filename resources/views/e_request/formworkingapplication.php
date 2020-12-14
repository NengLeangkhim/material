<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("../../connection/DB-connection.php");
include_once("../../controller/util.php");
include_once("../../controller/get_row.php");
$db = new Database();
$con = $db->dbConnection();
$user_id = 1;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['userid'])) {
    $user_id = $_SESSION['userid'];
} else {
    return;
}
$_SESSION['form_id'] = $_GET['id'];

$q = $con->prepare("select id,name from position where id>3 and status='t'");
$q->execute();
$r = $q->fetchAll(PDO::FETCH_ASSOC);
$pos = $r;

$q = $con->prepare("SELECT id, branch FROM public.ma_company_branch where ma_company_id=8;");
$q->execute();
$r = $q->fetchAll(PDO::FETCH_ASSOC);
$branch = $r;

$q = $con->prepare("SELECT id, name FROM public.e_request_working_application_address_type where status='t' and parent_id is null;");
$q->execute();
$r = $q->fetchAll(PDO::FETCH_ASSOC);
$address_type = $r;

$q = $con->prepare("SELECT id, name FROM public.e_request_working_application_org_type where status='t' and parent_id is null;");
$q->execute();
$r = $q->fetchAll(PDO::FETCH_ASSOC);
$org_type = $r;

$q = $con->prepare("SELECT id, name FROM public.e_request_working_application_work_type where status='t';");
$q->execute();
$r = $q->fetchAll(PDO::FETCH_ASSOC);
$work_type = $r;

$q = $con->prepare("SELECT id, name FROM public.e_request_working_application_job_news where status='t' and parent_id is null;");
$q->execute();
$r = $q->fetchAll(PDO::FETCH_ASSOC);
$job_news = $r;

$q = $con->prepare("SELECT id, name FROM public.e_request_working_application_education_degree where status='t';");
$q->execute();
$r = $q->fetchAll(PDO::FETCH_ASSOC);
$degree = $r;

$run = new run();
$r = $run->get_row($_GET['id'], 3);
print_r($r);
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>E-Request</title>
<link rel="stylesheet" href="../../storage/css/bootstrap4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="../../storage/css/style.css">

<script src="../../storage/css/bootstrap4.1.3/js/bootstrap.min.js"></script>
<script src="../../storage/css/bootstrap4.1.3/js/jquery-3.3.1.slim.min.js"></script>
<script src="../../storage/css/bootstrap4.1.3/js/popper.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVuUbQYEtqQVmdjtQn_wCQIdkf9WUOnZY" type="text/javascript"></script>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-3">
                <!-- <div class="row"> -->
                <img src="storage/img/turbotech.png" class="logo">
                <!-- </div> -->
            </div>
            <div class="col-4" style="text-align: left">
                <h6 class="font_khcom1">ក្រុមហ៊ុន ធើបូថេក​ ឯ.ក </h6>
                <h6 class="inputemploymentkh1">ផ្លូវលេខ២៩៨ សង្កាត់ច្រាំងចំរះទី២ </h6>
                <h6 class="inputemploymentkh1">ខណ្ខឬស្សីកែវ រាជធានីភ្នំពេញ </h6>
                <h6 class="inputemploymentkh1"> ទូរសព្ទលេខ <span>:</span> (៨៥៥) ២៣​ ៩៩៩ ៩៩៨</h6>
                <h6 class="inputemploymentkh1">អ៊ីមែល ​ <span style="margin-left:19px">:</span> <u style="color:blue">info@turbotech.com </u> </h6>
                <h6 class="inputemploymentkh1">វិបសាយ <span style="margin-left:15px">:</span> <u style="color:blue">www.turbotech.com </u></h6>
            </div>
            <!-- <div class="col-1" style="text-align: center">
            </div>     -->
            <div class="col-5" style="text-align: right">
                <input type="file" name="image" id="filetag">
                <img src="" alt="" id="preview" class="img-tdumbnail" style="width:120px;height:150px;margin-top:10px;text-align:right">
            </div>

        </div>

    </div>
    <form action="controller/insert_formworkingapplication.php" method="post">
        @csrf
        <div class="col-12" style="margin-top: 10px">
            <table class="table  " border=1 style="text-aling:center;border-color: black">
                <tr>
                    <td class="style_td" style="background:#dfe6e9 ;">
                        <p class="font_khcom1">ពាក្យសំុបម្រើការងារ</p>
                        <p class="inputemploymenten1">សូមបំពេញគ្រប់ព័ត៏មានឲ្យបានពេញលេញ និងច្បាស់លាស់មុននឺងបញ្ចុលត្រលប់មក្រុមហ៊ុនវិញ ។ </p>
                        <p class="inputemploymenten1"><span><b><u>ចំណាំ:</u></b></span> រាលសំណួរដែលមានសញ្ញា(*) ត្រូវតែឆ្លើយ ​និងបំពេញឲ្យបានច្បាស់លាស់​ ។ </p>
                    </td>
                    <td class="style_td " style="background:#dfe6e9;">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <p class="font_khcom1">Application ID:EAF-00</p>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="app_id" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <p class="font_khcom1">Date of submit:</p>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="" class="form-control">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-12" style="margin-top: 10px">
            <table class="table  " border=1 style="text-aling:center;border-color: black">
                <tr>
                    <td class="style_td" style="width:200px; text-align: right;background:#dfe6e9;">
                        <p class="word">*មុខតំណែង</p>
                    </td>
                    <td class="style_td" style="width:400px;">
                        <select type="text" name="position" class="form-control" required>
                            <option value="-1" selected hidden disabled></option>
                            <?php
                            foreach ($pos as $rr) {
                                echo '<option value="' . $rr['id'] . '">' . $rr['name'] . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td class="style_td" style="width:200px; text-align: right;background:#dfe6e9">
                        <p​ class="word">ទីកន្លែងធ្វើការ/ សាខា</p>
                    </td>
                    <td class="style_td" style="width:400px;">
                        <select type="text" name="branch" class="form-control" required>
                            <option value="-1" selected hidden disabled></option>
                            <?php
                            foreach ($branch as $rr) {
                                echo '<option value="' . $rr['id'] . '">' . $rr['branch'] . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9;">
                        <p class="word">ប្រាក់បៀរត្សរ៏បច្ចុប្បន្ន</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="number" min="0" step="1" name="salary" class="form-control" required>
                    </td>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9">
                        <p​ class="word">ប្រាក់បៀរត្សរ៏រំពឹងទុក($)/ខែ</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="number" min="0" step="1" name="expected_salary" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9;">
                        <p class="word">លេខទូរសព្ទផ្ទាល់ខ្លួន</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="phone" class="form-control" required>
                    </td>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9">
                        <p​ class="word">អ៊ីមែល</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="email" class="form-control">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-12" style="margin-top:10px">
            <p class="font_khcom2">១ > ព័ត៏មានផ្ទាល់ខ្លូន</p>
        </div>
        <div class="col-12" style="margin-top:10px">
            <table class="table  " border=1 style="text-aling:center;border-color: black">
                <tr>
                    <td class="style_td" style="width:200px; text-align: right;background:#dfe6e9;">
                        <p class="word">*គោត្តនាម-នាម</p>
                    </td>
                    <td class="style_td" style="width:400px;">
                        <input type="text" name="name_kh" class="form-control" required>
                    </td>
                    <td class="style_td" style="width:200px; text-align: right;background:#dfe6e9">
                        <p​ class="word">*ឈ្នោះជាភាសាឡាតាំង</p>
                    </td>
                    <td class="style_td" style="width:400px;">
                        <input type="text" name="name" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9;">
                        <p class="word">ឈ្មោះហៅក្រៅ</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="nick_name" class="form-control">
                    </td>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9">
                        <p​ class="word">*ស្ថានភាពគ្រួសារ</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <label>
                                        <input type="radio" name="marital" id="marital" value="single" required>
                                        <div style="float:right;">
                                            <p class="word"> - នៅលីវ</p>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input type="radio" name="marital" id="marital" value="married" required>
                                        <div style="float:right;">
                                            <p class="word"> - រៀបការ</p>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input type="radio" name="marital" id="marital" value="divorced" required>
                                        <div style="float:right;">
                                            <p class="word"> - មេ/ពោះម៉ាយ</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9;">
                        <p class="word">ថ្ថៃខែ/ឆ្នាំកំណើត</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="date" name="birth_date" class="form-control" required>
                    </td>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9">
                        <p​ class="word">ភេទ</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <label>
                                        <input type="radio" name="sex" id="sex" value="male" required>
                                        <div style="float:right;">
                                            <p class="word"> - ប្រុស</p>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-6">
                                    <label>
                                        <input type="radio" name="sex" id="sex" value="famale" required>
                                        <div style="float:right;">
                                            <p class="word"> - ស្រី</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:150px; text-align: center; margin-top:40px;background:#dfe6e9;" rowspan="4">
                        <p​ class="word" ​>*អាស័យដ្ឋានស្នាក់នៅអចិន្រៃ្តយ៏ (យកតាមសៀវភៅគ្រួសារឬស្នាក់នៅ)</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">
                                    <p​ class="word" ​>ផ្ទះលេខ</p>
                                </div>
                                <div class="col-4">
                                    <input type="text" name="home_number" class="form-control" required>
                                </div>
                                <div class="col-2">
                                    <p​ class="word" ​>ផ្លូវលេខ</p>
                                </div>
                                <div class="col-4">
                                    <input type="text" name="street" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9">
                        <p​ class="word" ​>ភូមិ</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="village" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:300px;">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">
                                    <p​ class="word" ​>ឃុំ</p>
                                </div>
                                <div class="col-10">
                                    <input type="text" name="commune" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9">
                        <p​ class="word" ​>ស្រុក</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="district" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:300px;">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">
                                    <p​ class="word" ​>ខេត្ត</p>
                                </div>
                                <div class="col-10">
                                    <input type="text" name="provice" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9">
                        <p​ class="word" ​>ប្រទេស</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="country" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:300px;" colspan="3">
                        <div class="col-12" style="">
                            <div class="row">
                                <?php
                                foreach ($address_type as $rr) {
                                    $o = "";
                                    if ($rr['name'] == 'ផ្សេងៗទៀត') {
                                        $o = '<input type="text" class="form-control" name="other_address">';
                                    }
                                    echo '<div class="col-3">
                                                    <label >
                                                        <input type="radio"  name="address_type" id="address_type" value="' . $rr['id'] . '" required>
                                                            <div style="float:right;">
                                                            <p class="word"> - ' . $rr['name'] . '</p>' . $o . '
                                                        </div>
                                                    </label>
                                                </div>';
                                }
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" colspan="4" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">តើលោក-អ្នកធ្លាប់ដាក់ពាក្យសុំបម្រើការងារនៅ​ក្រុមហ៊ុន ធើបូថេក ដែរឬទេ?<span><input type="radio" name="work_here" value="no" required></span>មិនធ្លាប់<span><input type="radio" name="work_here" value="yes" required></span>ធ្លាប់​ (បើមាន,​សូមបញ្ចាក់ពីមុខងារ និងកាលបរិច្ឆេទដាក់ពាក្យ)</p>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:150px; text-align: center;background:#dfe6e9;">
                        <p class="word">១ - មុខតំណែង</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <select name="work_here_position[]" class="form-control">
                            <option value="-1" selected hidden disabled></option>
                            <?php
                            foreach ($pos as $rr) {
                                echo '<option value="' . $rr['id'] . '">' . $rr['name'] . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td class="style_td" style="width:150px; text-align: center;background:#dfe6e9">
                        <p​ class="word">កាលបរិច្ឆេទ</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="date" name="work_here_date[]" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:150px; text-align: center;background:#dfe6e9;">
                        <p class="word">២ - មុខតំណែង</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <select name="work_here_position[]" class="form-control">
                            <option value="-1" selected hidden disabled></option>
                            <?php
                            foreach ($pos as $rr) {
                                echo '<option value="' . $rr['id'] . '">' . $rr['name'] . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td class="style_td" style="width:150px; text-align: center;background:#dfe6e9">
                        <p​ class="word">កាលបរិច្ឆេទ</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="work_here_date[]" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td class="style_td" colspan="4" style="text-align:center; background:#dfe6e9;">
                        <p​ class="word">តើលោក-អ្នកមានបងប្អូន​ ឬសាច់ញ្ញាត្តិកំពុងធ្វើការងារនៅ​ក្រុមហ៊ុន ធើបូថេក ដែរឬទេ?<span><input type="radio" name="relative" id="relative" value="no" required></span>មិនមាន<span><input type="radio" name="relative" id="relative" value="yes" required></span>មាន​ (បើមាន,​សូមរៀបរាប់)</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="style_td" style="marin:0px; padding:0px">
                        <table class="table" border=1 style="text-align:​ center;border-color: black;padding:0px">
                            <tr>
                                <td class="style_td" style="width:110px;​​ ​text-align:​center !important; background:#dfe6e9;">
                                    <center>
                                        <p​ class="word">១ -​ ឈ្មោះ</p>
                                    </center>
                                </td>
                                <td class="style_td" style="width:140px;">
                                    <input type="text" name="relative_name[]" class="form-control">
                                </td>
                                <td class="style_td" style="width:80px;​text-align:​ center; background:#dfe6e9;">
                                    <center>
                                        <p​ class="word">ត្រូវជា</p>
                                    </center>
                                </td>
                                <td class="style_td" style="width:110px;"><input type="text" name="relation[]" class="form-control"> </td>
                                <td class="style_td" style="width:80px;text-align:​ center; background:#dfe6e9;">
                                    <center>
                                        <p​ class="word">មុខតំណែង</p>
                                    </center>
                                </td>
                                <td class="style_td" style="width:140px;">
                                    <select name="relative_position[]" class="form-control">
                                        <option value="-1" selected hidden disabled></option>
                                        <?php
                                        foreach ($pos as $rr) {
                                            echo '<option value="' . $rr['id'] . '">' . $rr['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="style_td" style="width:110px;​​ ​text-align:​ center!important; background:#dfe6e9;">
                                    <center>
                                        <p​ class="word">២ -​ ឈ្មោះ</p>
                                    </center>
                                </td>
                                <td class="style_td" style="width:140px;">
                                    <input type="text" name="relative_name[]" class="form-control">
                                </td>
                                <td class="style_td" style="width:80px;​text-align:​ center; background:#dfe6e9;">
                                    <center>
                                        <p​ class="word">ត្រូវជា</p>
                                    </center>
                                </td>
                                <td class="style_td" style="width:110px;"><input type="text" name="relation[]" class="form-control"> </td>
                                <td class="style_td" style="width:80px;text-align:​ center; background:#dfe6e9;">
                                    <center>
                                        <p​ class="word">មុខតំណែង</p>
                                    </center>
                                </td>
                                <td class="style_td" style="width:140px;">
                                    <select name="relative_position[]" class="form-control">
                                        <option value="-1" selected hidden disabled></option>
                                        <?php
                                        foreach ($pos as $rr) {
                                            echo '<option value="' . $rr['id'] . '">' . $rr['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="style_td" style="width:110px;​​ ​text-align:​ center!important; background:#dfe6e9;">
                                    <center>
                                        <p​ class="word">៣ -​ ឈ្មោះ</p>
                                    </center>
                                </td>
                                <td class="style_td" style="width:140px;">
                                    <input type="text" name="relative_name[]" class="form-control">
                                </td>
                                <td class="style_td" style="width:80px;​text-align:​ center; background:#dfe6e9;">
                                    <center>
                                        <p​ class="word">ត្រូវជា</p>
                                    </center>
                                </td>
                                <td class="style_td" style="width:110px;"><input type="text" name="relation[]" class="form-control"> </td>
                                <td class="style_td" style="width:80px;text-align:​ center; background:#dfe6e9;">
                                    <center>
                                        <p​ class="word">មុខតំណែង</p>
                                    </center>
                                </td>
                                <td class="style_td" style="width:140px;">
                                    <select name="relative_position[]" class="form-control">
                                        <option value="-1" selected hidden disabled></option>
                                        <?php
                                        foreach ($pos as $rr) {
                                            echo '<option value="' . $rr['id'] . '">' . $rr['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9;">
                        <p class="word">*ឪពុកឈ្មោះ</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="relative_father_name" class="form-control">
                    </td>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9">
                        <p​ class="word">មុខរបរ</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="relative_father_job" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9;">
                        <p class="word">ម្តាយឈ្នោះ</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="relative_mother_name" class="form-control">
                    </td>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9">
                        <p​ class="word">មុខរបរ</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="relative_mother_job" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9;">
                        <p class="word">ចំនួនបង-ប្អូនបង្កើត</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="relative_sibling_count" class="form-control">
                    </td>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9">
                        <p​ class="word">សៀវភៅគ្រួសារលេខ</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="relative_family_book_number" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:150px; text-align: center; margin-top:40px;background:#dfe6e9;" rowspan="3">
                        <p​ class="word" ​>*អាស័យដ្ឋានស្នាក់នៅអចិន្រៃ្តយ៏ </p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">
                                    <p​ class="word" ​>ផ្ទះលេខ</p>
                                </div>
                                <div class="col-4">
                                    <input type="text" name="relative_home_number" class="form-control">
                                </div>
                                <div class="col-2">
                                    <p​ class="word" ​>ផ្លូវលេខ</p>
                                </div>
                                <div class="col-4">
                                    <input type="text" name="relative_street" class="form-control">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9">
                        <p​ class="word" ​>ភូមិ</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="relative_village" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:300px;">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">
                                    <p​ class="word" ​>ឃុំ</p>
                                </div>
                                <div class="col-10">
                                    <input type="text" name="relative_commune" class="form-control">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9">
                        <p​ class="word" ​>ស្រុក</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="relative_district" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:300px;">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">
                                    <p​ class="word" ​>ខេត្ត</p>
                                </div>
                                <div class="col-10">
                                    <input type="text" name="relative_province" class="form-control">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9">
                        <p​ class="word" ​>ប្រទេស</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="relative_country" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9;">
                        <p class="word">ប្តី/ប្រពន្ឋឈ្មោះ</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="relative_partner_name" class="form-control">
                    </td>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9">
                        <p​ class="word">មុខរបរ</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="text" name="relative_partner_job" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9;">
                        <p class="word">ចំនួនកូន</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="number" min="0" step="1" name="relative_child_count" class="form-control">
                    </td>
                    <td class="style_td" style="width:150px; text-align: right;background:#dfe6e9">
                        <p​ class="word">ប្រុស</p>
                    </td>
                    <td class="style_td" style="width:300px;">
                        <input type="number" min="0" step="1" name="relative_boy" class="form-control">
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-12" style="margin-top:10px">
            <p class="font_khcom2">២ > ប្រវត្តិនៃការសិក្សា</p>
        </div>
        <div class="col-12">
            <table class="table " border=1 style="border-color: black;">
                <tr>
                    <td class="style_td" colspan="5" style=" width:500px;text-align:center; background:#dfe6e9;">
                        <p​ class="word">លោក-អ្នកត្រូវបំពេញនូវព័ត៏មានស្តីពីការសិក្សា ចាប់ពីបឋមសិក្សា រហូតដល់កម្រិតខ្ពស់បំផុត ៕</p>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:400px;text-align:center;background:#dfe6e9;" rowspan="2">
                        <p​ class="word">ឈ្មោះសាលា /​ សាកលវិទ្យាល័យ</p>
                    </td>
                    <td class="style_td" colspan="2" style=" width:200px;text-align:center;background:#dfe6e9;">
                        <p​ class="word">កាលបរិច្ឆេទ</p>
                    </td>

                    <td class="style_td" style=" width:150px;text-align:center;background:#dfe6e9;" rowspan="2">
                        <p​ class="word">កម្រិតសញ្ញាបត្រ</p>

                    </td>
                    <td class="style_td" style=" width:300px;text-align:center;background:#dfe6e9;" rowspan="2">
                        <p​ class="word">ជំនាញ​ / ឯកទេស</p>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" ​ style=" width:100px;text-align:center;background:#dfe6e9;">
                        <p​ class="word">ពីឆ្នាំ</p>
                    </td>
                    <td class="style_td" style=" width:100px;text-align:center;background:#dfe6e9;">
                        <p​ class="word">ដល់ឆ្នាំ</p>
                    </td>
                </tr>
                <?php
                for ($i = 0; $i < 3; $i++) {
                    echo '<tr>
                                        <td  class="style_td"> <input type="text" name="edu_school[]" class="form-control" >  ​​</td>
                                        <td  class="style_td"> <input type="text" name="edu_start_date[]" class="form-control" >  ​​</td>
                                        <td  class="style_td"> <input type="text" name="edu_end_date[]" class="form-control" >  ​​</td>
                                        <td  class="style_td"> <input type="text" name="edu_degree[]" class="form-control" >  ​​</td>
                                        <td  class="style_td"> <input type="text" name="edu_profession[]" class="form-control" >  ​​</td>
                                    </tr>';
                }
                ?>
                <tr>
                    <td class="style_td" colspan="5">
                        <p​ class="word">- កម្រិតនែការសិក្សាថ្នាក់ខ្ពស់បំផុតដែលលោក-អ្នកបានទទួល:
                            <?php
                            foreach ($degree as $rr) {
                                echo '<label >
                                                    <input type="radio"  name="edu_highest_degree" id="edu_highest_degree" value="' . $rr['id'] . '" required>
                                                        <div style="float:right;">
                                                        <p class="word"> - ' . $rr['name'] . '</p>
                                                    </div>
                                            </label>';
                            }
                            ?>
                            </p>
                            <p​ class="word">- សុំភ្ជាប់ុកជាមូយនូវច្បាប់ចម្លង សញ្ញាបត្របណ្តោះអាសន្ន ឬលិខិតបញ្ចាក់បានបញ្ជាក់ជោគជ័យ ដោយបានបញ្ជាក់ពីសាលាក្រុង/ខេត្ត</p>
                                ​​
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-12" style="margin-top:10px">
            <p class="font_khcom2">៣ > ប្រវត្តិការងារ</p>
            <p class="word"><b>ស្ថាប័ន ក្រុមហ៊ុនចុងក្រោយ​ </b>(សូមភ្ជាប់មកជាមួយនូវលិខិតបញ្ជាក់អំពីការងារ បើមាន)</p>
        </div>
        <div class="col-12">
            <table class="table" border=1 style="border-color: black;">
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ឈ្មោះក្រុមហ៊ុន</p>
                    </td>
                    <td class="style_td" colspan="2" ​​style=" width:300px;"> <input type="text" name="exp_company_name[]" class="form-control"></td>
                    <td class="style_td" ​ ​style=" width:100px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ចំនួនបុគ្កលិក</p>
                    </td>
                    <td class="style_td" ​​ style="width:200px"> <input type="number" min="0" step="1" name="exp_staff_count[]" class="form-control"></td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">អាស័យដ្ឋាន / លេខទូរសព្ទ</p>
                    </td>
                    <td class="style_td" colspan="4"> <input type="text" name="exp_phone[]" class="form-control"></td>

                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ប្រភេទអាជីវកម្ម</p>
                    </td>
                    <td class="style_td" colspan="4"> <input type="text" name="exp_business_type[]" class="form-control"></td>

                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ប្រភេទស្ថាប័ន</p>
                    </td>
                    <td class="style_td" colspan="4">
                        <div class="col-12">
                            <div class="row">
                                <?php
                                foreach ($org_type as $rr) {
                                    $o = "";
                                    if ($rr['id'] == 4) {
                                        $o = '<input type="text" name="org_type_other[]" class="" >';
                                    }
                                    echo '<div class="col-3"><label >
                                                            <input type="radio"  name="exp_org_type0" id="exp_org_type" value="' . $rr['id'] . '" >
                                                                <div style="float:right;">
                                                                    <p class="word">' . $rr['name'] . '</p>' . $o . '
                                                                </div>
                                                        </label></div>';
                                }
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">មុខតំណែង</p>
                    </td>
                    <td class="style_td" colspan="2"> <input type="text" name="exp_position[]" class="form-control"></td>
                    <td class="style_td" colspan="2">
                        <div class="col-12">
                            <div class="row">
                                <?php
                                foreach ($work_type as $rr) {
                                    echo '<div class="col-4">
                                                        <label >
                                                            <input type="radio"  name="exp_work_type0" id="exp_work_type" value="' . $rr['id'] . '" >
                                                                <div style="float:right;">
                                                                    <p class="word">- ' . $rr['name'] . '</p>
                                                                </div>
                                                        </label>
                                                    </div>';
                                }
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">កាលបរិច្ឆេទចាប់ផ្តើម</p>
                    </td>
                    <td class="style_td" style=" width:350px;"><input type="date" name="exp_start_date[]" class="form-control"></td>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">កាលបរិច្ឆេទចាកចាញ</p>
                    </td>
                    <td class="style_td" colspan="2" style=" width:350px;"><input type="date" name="exp_end_date[]" class="form-control"></td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ប្រាក់បៀរត្សរ៏ចាប់ផ្តើម</p>
                    </td>
                    <td class="style_td" style=" width:300px;"><input type="text" name="exp_start_salary[]" class="form-control"></td>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ប្រាក់បៀរត្សរ៏ចុងក្រោយ</p>
                    </td>
                    <td class="style_td" colspan="2"><input type="text" name="exp_end_salary[]" class="form-control"></td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ឈ្មោះអ្នកគ្រប់គ្រងផ្ទាល់</p>
                    </td>
                    <td class="style_td" style=" width:300px;"><input type="text" name="exp_leader[]" class="form-control"></td>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">មុនតំណែងអ្នកគ្រប់គ្រងផ្ទាល់</p>
                    </td>
                    <td class="style_td" colspan="2"><input type="text" name="exp_leader_position[]" class="form-control"></td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word"><b>មូលហេតុនៃការចាកចេញ</b></p>
                    </td>
                    <td class="style_td" colspan="4"><input type="text" name="exp_leave_reason[]" class="form-control"></td>
                </tr>
                <tr>
                    <td class="style_td" ​ colspan="5" style=" width:200px;text-align:center;background:#dfe6e9;">
                        <p​ class="word"><b>រៀបរាប់ពីតួនាទី ភារកិច្ច និងការទទួលខុសត្រូវ</p>
                                </p>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" colspan="5" style=" width:550px;">
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="exp_job_responsibility[]" rows="3"></textarea>
                    </td>
                    <!-- <td class="style_td" colspan="3" style=" width:550px;">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </td> -->

                </tr>
            </table>
        </div>
        <div class="col-12" style="margin-top:10px">
            <p class="word"><b>ស្ថាប័ន/ក្រុមហ៊ុនបន្ទាប់ទី១ </b>(សូមភ្ជាប់មកជាមួយនូវលិខិតបញ្ជាក់អំពីការងារ បើមាន)</p>
        </div>
        <div class="col-12">
            <table class="table " border=1 style="border-color: black;">
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ឈ្មោះក្រុមហ៊ុន</p>
                    </td>
                    <td class="style_td" colspan="2" ​​style=" width:300px;"> <input type="text" name="exp_company_name[]" class="form-control"></td>
                    <td class="style_td" ​ ​style=" width:100px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ចំនួនបុគ្កលិក</p>
                    </td>
                    <td class="style_td" ​​ style="width:200px"> <input type="number" min="0" step="1" name="exp_staff_count[]" class="form-control"></td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">អាស័យដ្ឋាន / លេខទូរសព្ទ</p>
                    </td>
                    <td class="style_td" colspan="4"> <input type="text" name="exp_phone[]" class="form-control"></td>

                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ប្រភេទអាជីវកម្ម</p>
                    </td>
                    <td class="style_td" colspan="4"> <input type="text" name="exp_business_type[]" class="form-control"></td>

                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ប្រភេទស្ថាប័ន</p>
                    </td>
                    <td class="style_td" colspan="4">
                        <div class="col-12">
                            <div class="row">
                                <?php
                                foreach ($org_type as $rr) {
                                    $o = "";
                                    if ($rr['id'] == 4) {
                                        $o = '<input type="text" name="org_type_other[]" class="" >';
                                    }
                                    echo '<div class="col-3"><label >
                                                            <input type="radio"  name="exp_org_type1" id="exp_org_type" value="' . $rr['id'] . '" >
                                                                <div style="float:right;">
                                                                    <p class="word">' . $rr['name'] . '</p>' . $o . '
                                                                </div>
                                                        </label></div>';
                                }
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">មុខតំណែង</p>
                    </td>
                    <td class="style_td" colspan="2"> <input type="text" name="exp_position[]" class="form-control"></td>
                    <td class="style_td" colspan="2">
                        <div class="col-12">
                            <div class="row">
                                <?php
                                foreach ($work_type as $rr) {
                                    echo '<div class="col-4">
                                                        <label >
                                                            <input type="radio"  name="exp_work_type1" id="exp_work_type1" value="' . $rr['id'] . '" >
                                                                <div style="float:right;">
                                                                    <p class="word">- ' . $rr['name'] . '</p>
                                                                </div>
                                                        </label>
                                                    </div>';
                                }
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">កាលបរិច្ឆេទចាប់ផ្តើម</p>
                    </td>
                    <td class="style_td" style=" width:350px;"><input type="date" name="exp_start_date[]" class="form-control"></td>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">កាលបរិច្ឆេទចាកចាញ</p>
                    </td>
                    <td class="style_td" colspan="2" style=" width:350px;"><input type="date" name="exp_end_date[]" class="form-control"></td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ប្រាក់បៀរត្សរ៏ចាប់ផ្តើម</p>
                    </td>
                    <td class="style_td" style=" width:300px;"><input type="text" name="exp_start_salary[]" class="form-control"></td>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ប្រាក់បៀរត្សរ៏ចុងក្រោយ</p>
                    </td>
                    <td class="style_td" colspan="2"><input type="text" name="exp_end_salary[]" class="form-control"></td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ឈ្មោះអ្នកគ្រប់គ្រងផ្ទាល់</p>
                    </td>
                    <td class="style_td" style=" width:300px;"><input type="text" name="exp_leader[]" class="form-control"></td>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">មុនតំណែងអ្នកគ្រប់គ្រងផ្ទាល់</p>
                    </td>
                    <td class="style_td" colspan="2"><input type="text" name="exp_leader_position[]" class="form-control"></td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word"><b>មូលហេតុនៃការចាកចេញ</b></p>
                    </td>
                    <td class="style_td" colspan="4"><input type="text" name="exp_leave_reason[]" class="form-control"></td>
                </tr>
                <tr>
                    <td class="style_td" ​ colspan="5" style=" width:200px;text-align:center;background:#dfe6e9;">
                        <p​ class="word"><b>រៀបរាប់ពីតួនាទី ភារកិច្ច និងការទទួលខុសត្រូវ</p>
                                </p>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" colspan="5" style=" width:550px;">
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="exp_job_responsibility[]" rows="3"></textarea>
                    </td>
                    <!-- <td class="style_td" colspan="3" style=" width:550px;">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </td> -->

                </tr>
            </table>
        </div>
        <div class="col-12" style="margin-top:10px">
            <p class="word"><b>ស្ថាប័ន/ក្រុមហ៊ុនបន្ទាប់ទី២ </b>(សូមភ្ជាប់មកជាមួយនូវលិខិតបញ្ជាក់អំពីការងារ បើមាន)</p>
        </div>
        <div class="col-12">
            <table class="table " border=1 style="border-color: black;">
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ឈ្មោះក្រុមហ៊ុន</p>
                    </td>
                    <td class="style_td" colspan="2" ​​style=" width:300px;"> <input type="text" name="exp_company_name[]" class="form-control"></td>
                    <td class="style_td" ​ ​style=" width:100px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ចំនួនបុគ្កលិក</p>
                    </td>
                    <td class="style_td" ​​ style="width:200px"> <input type="number" min="0" step="1" name="exp_staff_count[]" class="form-control"></td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">អាស័យដ្ឋាន / លេខទូរសព្ទ</p>
                    </td>
                    <td class="style_td" colspan="4"> <input type="text" name="exp_phone[]" class="form-control"></td>

                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ប្រភេទអាជីវកម្ម</p>
                    </td>
                    <td class="style_td" colspan="4"> <input type="text" name="exp_business_type[]" class="form-control"></td>

                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ប្រភេទស្ថាប័ន</p>
                    </td>
                    <td class="style_td" colspan="4">
                        <div class="col-12">
                            <div class="row">
                                <?php
                                foreach ($org_type as $rr) {
                                    $o = "";
                                    if ($rr['id'] == 4) {
                                        $o = '<input type="text" name="org_type_other[]" class="" >';
                                    }
                                    echo '<div class="col-3"><label >
                                                            <input type="radio"  name="exp_org_type2" id="exp_org_type" value="' . $rr['id'] . '" >
                                                                <div style="float:right;">
                                                                    <p class="word">' . $rr['name'] . '</p>' . $o . '
                                                                </div>
                                                        </label></div>';
                                }
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">មុខតំណែង</p>
                    </td>
                    <td class="style_td" colspan="2"> <input type="text" name="exp_position[]" class="form-control"></td>
                    <td class="style_td" colspan="2">
                        <div class="col-12">
                            <div class="row">
                                <?php
                                foreach ($work_type as $rr) {
                                    echo '<div class="col-4">
                                                        <label >
                                                            <input type="radio"  name="exp_work_type2" id="exp_work_type" value="' . $rr['id'] . '" >
                                                                <div style="float:right;">
                                                                    <p class="word">- ' . $rr['name'] . '</p>
                                                                </div>
                                                        </label>
                                                    </div>';
                                }
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">កាលបរិច្ឆេទចាប់ផ្តើម</p>
                    </td>
                    <td class="style_td" style=" width:350px;"><input type="date" name="exp_start_date[]" class="form-control"></td>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">កាលបរិច្ឆេទចាកចាញ</p>
                    </td>
                    <td class="style_td" colspan="2" style=" width:350px;"><input type="date" name="exp_end_date[]" class="form-control"></td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ប្រាក់បៀរត្សរ៏ចាប់ផ្តើម</p>
                    </td>
                    <td class="style_td" style=" width:300px;"><input type="text" name="exp_start_salary[]" class="form-control"></td>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ប្រាក់បៀរត្សរ៏ចុងក្រោយ</p>
                    </td>
                    <td class="style_td" colspan="2"><input type="text" name="exp_end_salary[]" class="form-control"></td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">ឈ្មោះអ្នកគ្រប់គ្រងផ្ទាល់</p>
                    </td>
                    <td class="style_td" style=" width:300px;"><input type="text" name="exp_leader[]" class="form-control"></td>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word">មុនតំណែងអ្នកគ្រប់គ្រងផ្ទាល់</p>
                    </td>
                    <td class="style_td" colspan="2"><input type="text" name="exp_leader_position[]" class="form-control"></td>
                </tr>
                <tr>
                    <td class="style_td" style=" width:200px;text-align:right;background:#dfe6e9;">
                        <p​ class="word"><b>មូលហេតុនៃការចាកចេញ</b></p>
                    </td>
                    <td class="style_td" colspan="4"><input type="text" name="exp_leave_reason[]" class="form-control"></td>
                </tr>
                <tr>
                    <td class="style_td" ​ colspan="5" style=" width:200px;text-align:center;background:#dfe6e9;">
                        <p​ class="word"><b>រៀបរាប់ពីតួនាទី ភារកិច្ច និងការទទួលខុសត្រូវ</p>
                                </p>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" colspan="5" style=" width:550px;">
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="exp_job_responsibility[]" rows="3"></textarea>
                    </td>
                    <!-- <td class="style_td" colspan="3" style=" width:550px;">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </td> -->

                </tr>
            </table>
        </div>
        <div class="col-12" style="margin-top:10px">
            <p class="font_khcom2">៤> ភាសាបរទេស</p>
        </div>
        <div class="col-12" style="margin-top:10px">
            <table class="table " border=1 style="border-color: black;">
                <tr>
                    <td class="style_td" colspan="17" style="background:#dfe6e9; ">
                        <p​ class="word">ចំណេះដឹងផ្នែកភាសាបរទេស, ល្អណាស់(EX), ល្អ(G), មធ្យម(F), ខ្សោយ(P)</p>
                    </td>

                </tr>
                <tr>
                    <td class="style_td" rowspan="2" style=" width:230px;text-align:center;background:#dfe6e9;">
                        <p​ class="word">ភាសាបរទេស</p>
                    </td>
                    <td class="style_td" colspan="4" style="​text-align:center;background:#dfe6e9;">
                        <p​ class="word">ការសរសេ</p>
                    </td>
                    <td class="style_td" colspan="4" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">ការនិយាយ</p>
                    </td>
                    <td class="style_td" colspan="4" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">ការអាន</p>
                    </td>
                    <td class="style_td" colspan="4" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">ការស្តាប់</p>
                    </td>



                </tr>
                <tr>
                    <td class="style_td" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">Ex</p>
                    </td>
                    <td class="style_td" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">G</p>
                    </td>
                    <td class="style_td" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">F</p>
                    </td>
                    <td class="style_td" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">P</p>
                    </td>

                    <td class="style_td" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">Ex</p>
                    </td>
                    <td class="style_td" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">G</p>
                    </td>
                    <td class="style_td" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">F</p>
                    </td>
                    <td class="style_td" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">P</p>
                    </td>

                    <td class="style_td" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">Ex</p>
                    </td>
                    <td class="style_td" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">G</p>
                    </td>
                    <td class="style_td" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">F</p>
                    </td>
                    <td class="style_td" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">P</p>
                    </td>

                    <td class="style_td" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">Ex</p>
                    </td>
                    <td class="style_td" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">G</p>
                    </td>
                    <td class="style_td" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">F</p>
                    </td>
                    <td class="style_td" style="text-align:center;background:#dfe6e9;">
                        <p​ class="word">P</p>
                    </td>


                </tr>
                <tr>
                    <td class="style_td" style="width:230px;">
                        <input type="text" name="language[]" id="" class="form-control">
                    </td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="w0" id="w0" value="Excellent"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="w0" id="w0" value="Good"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="w0" id="w0" value="Fair"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="w0" id="w0" value="poor"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="s0" id="s0" value="Excellent"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="s0" id="s0" value="Good"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="s0" id="s0" value="Fair"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="s0" id="s0" value="poor"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="r0" id="r0" value="Excellent"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="r0" id="r0" value="Good"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="r0" id="r0" value="Fair"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="r0" id="r0" value="poor"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="l0" id="l0" value="Excellent"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="l0" id="l0" value="Good"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="l0" id="l0" value="Fair"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="l0" id="l0" value="poor"></td>


                </tr>
                <tr>
                    <td class="style_td" style="width:230px;">
                        <input type="language[]" name="" id="" class="form-control">
                    </td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="w1" id="w1" value="Excellent"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="w1" id="w1" value="Good"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="w1" id="w1" value="Fair"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="w1" id="w1" value="poor"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="s1" id="s1" value="Excellent"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="s1" id="s1" value="Good"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="s1" id="s1" value="Fair"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="s1" id="s1" value="poor"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="r1" id="r1" value="Excellent"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="r1" id="r1" value="Good"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="r1" id="r1" value="Fair"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="r1" id="r1" value="poor"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="l1" id="l1" value="Excellent"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="l1" id="l1" value="Good"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="l1" id="l1" value="Fair"></td>
                    <td class="style_td" style="width:55px; text-align:center"><input type="radio" name="l1" id="l1" value="poor"></td>

                </tr>
            </table>
        </div>
        <div class="col-12" style="margin-top:10px">
            <p class="font_khcom2">៥> ព័ត៏មានផ្សេងៗ </p>
        </div>
        <div class="col-12" style="margin-top:10px">
            <table class="table " border=1 style="border-color: black;">
                <tr>
                    <td class="style_td" style="background:#dfe6e9; ">
                        <p​ class="word">ចូលរៀបរាប់អំពីលក្ខណៈសម្បត្តិ ជំនាញ ចំណេះដឺង បទពិសោធន៏ ការបណ្តុះបណ្តាលផ្សេងៗរបស់អ្នក ដែលបង្ហាញថាលោក-អ្នកពិតជាសក្តិសមទៅនឺងមុចតំណែងនេះ​ ។</p>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="">
                        <textarea class="form-control" name="personal_skill" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </td>
                </tr>
            </table>
            <table class="table " border=1 style="border-color: black;margin-top:10px">
                <tr>
                    <td class="style_td" style="background:#dfe6e9; ">
                        <p​ class="word">ចូលពន្យល់ខ្លីៗអំពីមូលហេតុដែលនាំឲ្យលោក-អ្នកចង់បម្រើការងារជាមួយក្រុមហ៊ុន ធើបូ ថេក ឯ.ក </p>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="">
                        <textarea class="form-control" name="join_reason" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-12" style="margin-top:10px">
            <p class="font_khcom2">៦> ព័ត៏មានអំពីការដាក់ពាក្យ </p>
        </div>
        <div class="col-12" style="margin-top:10px">
            <table class="table " border=1 style="border-color: black;">
                <tr>
                    <td class="style_td" style="background:#dfe6e9; ">
                        <p​ class="word">តើអ្នកដឺងព័ត៏មានពីការជ្រើសរើសនេះតាមរយៈអ្វី ?</p>
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="">
                        <div class="col-12">
                            <div class="row">
                                <?php
                                foreach ($job_news as $rr) {
                                    echo '<div class="col-3">
                                                <label for="">
                                                    <p class="word"> <span><input type="radio" name="job_news" value="' . $rr['id'] . '"></span>- ' . $rr['name'] . '</p>
                                                </label>
                                            </div>';
                                }
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-12" style="margin-top:10px">
            <p class="font_khcom2">៧> ព័ត៏មានអំពីការដាក់ពាក្យ </p>
            <p class="word"><b>*</b>ខ្ញុំបាទ/នាងខ្ញុំសូមបញ្ចាក់អះអាងថា ព័ត៏មានដែលបានសរសេជូនក្នុងជីវប្រវត្តិរូបខាងលើ ប្រាកដជាត្រឺមត្រូវ និងឥតក្លែងបន្លំឡើយ​​ ។ ក្នុងករណីប្រាសចាកខុសពីការពិត
                ខ្ញុំបាទ/នាងខ្ញសូមទទួលខុសត្រូវចំពោះមុខច្បាបជាធរមាន ៕
            </p>
        </div>
        <div class="col-12" style="margin-top:10px">
            <table class="table " border=1 style="border-color: black;">
                <tr>
                    <td class="style_td" style="background:#dfe6e9; ">
                        <p class="word"> ហត្ថលេខា</p>
                    </td>
                    <td class="style_td" ​ colspan="3">
                        <input type="text" name="" id="" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td class="style_td" style="background:#dfe6e9; ">
                        <p class="word"> ឈ្មោះ</p>
                    </td>
                    <td class="style_td" style=""><input type="text" name="" id="" class="form-control"></td>
                    <td class="style_td" style="background:#dfe6e9; ">
                        <p class="word"> កាលបរិច្ឆេទ</p>
                    </td>
                    <td class="style_td" style=""><input type="date" name="" id="" class="form-control"></td>
                </tr>
            </table>
        </div>
        <div class="col-12" style="margin-top:10px">
            <p class="font_khcom2">៨> ផែនទីបង្ហាញផ្លូវទៅកាន់លំនៅអចិន្រ្តៃយ៌ </p>
            </p>
        </div>
        <div class="col-12" style="margin-top:10px">
            <table class="table " border=1 style="border-color: black;">
                <tr>
                    <td class="style_td" style=" text-align:center">
                        <p class="word">
                            សូមគូសផែនទីផ្លូវ ដើម្បីដាយស្រួលរកលំនៅឋានអចិន្រ្តៃយ៌របស់លោកអ្នក (សូមគូសតាមអសយដ្ឋានមាននៅក្នុងសៀវភៅគ្រួសារ​ ឬស្នាក់នៅ)
                        </p>
                        <input type="text" class="form-control" name="latlng" value="11.572532,104.898974" readonly="" />
                        <div id="gmap_canvas" style="height:320px;width:100%;"></div>
                        <div id="map"></div>


                    </td>
                </tr>
            </table>
        </div>
        <div class="col-12" style="margin-top:10px">
            <p class="font_khcom2">៩> បញ្ចាក់ : <span class="word">ពាក្យសំុបម្រើការងារ និង​ឯកសារផ្សេងៗដែលបានភ្ជាប់យកជាមួយ មិនអាចសុំដកវិញបានទេ ៕</span> </p>

        </div>
        <div class="col-12" style="margin-top:0px">
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>

    </form>

    <?php
    include  'footer.php';
    ?>
    <script type="text/javascript">
        function map() {
            var pointLatLng = new google.maps.LatLng(11.5812192, 104.8893527),
                marker, map;
            var mapOptions = {
                zoom: 15,
                center: pointLatLng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(document.getElementById('gmap_canvas'), mapOptions);
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: pointLatLng
            });
            google.maps.event.addListener(map, 'click', function(evt) {
                $(":input[name='latlng']").val(evt.latLng.toUrlValue(6));
                marker.setPosition(evt.latLng);
            });
            google.maps.event.addListener(marker, 'dragend', function(evt) {
                $(":input[name='latlng']").val(evt.latLng.toUrlValue(6));
                marker.setPosition(evt.latLng);
            });
            infoWindow = new google.maps.InfoWindow;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    $(":input[name='latlng']").val(pos.lat + ',' + pos.lat);
                    marker.setPosition(pos);
                    infoWindow.open(map);
                    map.setCenter(pos);
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
        //    function getLocation() {
        //        
        //        if (navigator.geolocation) {
        //            navigator.geolocation.getCurrentPosition(showPosition);
        //        } else { 
        //            alert("Geolocation is not supported by this browser.");
        //        }
        //    }
        //
        //    function showPosition(position) {
        //        alert(position.coords.latitude+','+position.coords.longitude);
        //        $(":input[name='latlng']").val(position.coords.latitude+','+position.coords.longitude);
        //    }
        $(document).ready(function() {
            map();
        });
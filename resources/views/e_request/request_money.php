<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>request_money</title>

<link rel="stylesheet" href="../../storage/css/bootstrap4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="../../storage/css/style.css">
<script src="../../storage/css/bootstrap4.1.3/js/bootstrap.min.js"></script>
<script src="../../storage/css/bootstrap4.1.3/js/jquery-3.3.1.slim.min.js"></script>
<script src="../../storage/css/bootstrap4.1.3/js/popper.min.js"></script>

</head>

<body>
<div class="row">
    <div class="container-fluid">
        <div class="container">
            <div class="col-12" style="text-align: center">
                <h5 class="title_khleave">សូមគោរពជូន</h5>
                <h5 class="title_khleave">លោកអគ្គនាយក</h5>
            </div>
            <div class="row" style="margin-top:15px">
                <div class="col-2">
                    <h6 class="title_khleave">កម្មវត្ថុ :</h6>
                </div>
                <div class="col-10">
                    <h6 class="title_khleave">សំណើសុំបុរេប្រទានថវិកាចំនួន ១២៤.០០ ដុល្លារអាមេរិក (មួយរយម្ភៃបួនដុល្លារអាមេរិកគត់) ដើម្បីសុំចុះឈ្មោះ (Google និង Apple) ដើម្បីបង្កើតគណនី App Store និង Play Store របស់ក្រុមហ៊ុន ធើបូថេក ឯ.ក</h6>
                </div>
            </div>
        </div>
    </div>

    
    <div class="container-fluid" style="margin-top:15px">
        <div class="col-12">
            <form action="controller/insert_formuseElectronic.php" method="post">
                <div class="row">
                    <div class="col-1">
                        <h6 class="title_khleave">បុគ្គលិក:</h6>
                    </div>
                    <div class="col-2">
                        <input type="text" name="name" class="form-control" value="<?php echo $name?>" disabled>
                    </div>
                    <div class="col-2.5">
                        <h6 class="title_khleave">លេខប័ណ្ណការងារ</h6>
                    </div>
                    <div class="col-2">
                        <input type="text" name="name" class="form-control" value="<?php echo $id_number?>" disabled>
                    </div>
                    <div class="col-1.5">
                        <h6 class="title_khleave">មុនតំណែង</h6>
                    </div>
                    <div class="col-2">
                        <input type="text" name="name" class="form-control" value="<?php echo $pos?>" disabled>
                    </div>
                    
                    <!-- <div class="col-2"​​ style="margin-top:20px;margin-left:95px">
                        <input type="text" name="name" class="form-control"  >
                    </div>
                    <div class="col-2"​​ style="margin-top:20px">
                    <h5 class="title_khleave">។</h5>
                    </div> -->
                </div>
                <div class="row" style="margin-top:20px">
                    <div class="col-2"​​>
                        <h6 class="title_khleave">នាយកដ្ឋាន</h6>
                    </div>
                    <div class="col-2"​>
                        <input type="text" name="name" class="form-control" value="<?php echo $dept?>" disabled>
                    </div>
                </div>
                <div class="row" style="margin-top:20px">
                    <div class="col-12" >
                        <?php
                            $i=0;
                            foreach($useof as $rr){
                                $i++;
                                $t='';
                                if ($rr['name']=='Others (Pls.specify)') {
                                    $t='<input type="text" name="useof_other" class="form-control col-7" id="">';
                                }
                                echo '<div class="row" style="margin-top:10px">
                                        <div class="col-3 offset-1">
                                            <label>
                                                <input type="radio"  name="use" id="use" value="'.$rr['id'].'" required>
                                                <div style="float:right;">
                                                    <h6 class="inputinfokh"> '.conv_kh($i).' .'.$rr['name_kh'].'</h6>
                                                    <h6 style="margin-top: -10px;"> '.$i.' . '.$rr['name'].'</h6>
                                                </div>
                                            </label>
                                        </div>
                                        '.$t.'
                                    </div>';
                            }
                        ?>
                        <div class="row" style="margin-top:10px">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-11" >
                                        <P class="during">អាស្រ័យដូចបានជម្រាប់ជូនខាងលើសូម <span><b class="title_khleave">លោកអគ្គនាយក </b></span>មេត្តាពិនិត្យ និងសម្រេចដោយក្តីអនុគ្រោះ ។</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-11" >
                                        <P class="during">សូម <span><b class="title_khleave">លោកអគ្គនាយក </b></span>មេត្តាទទួលនូវសេចក្តីគោរពដ៏ខ្ពង់ខ្ពស់អំពីខ្ញុំបាន ។</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px">
                            <div class="col-1"></div>
                            <div class="col-10" >
                                <div class="row">
                                    <div class="col-6">
                                    </div>
                                    <div class="col-6" align="center">
                                        <h6 class="inputinfokh">ថ្ងៃ.........ខែ.......ឆ្នាំ........ឯកស័ក ព.ស២៥៦....</h6>
                                        <h6 class="inputinfokh" style="margin-top:10px">រាជធានីភ្នំពេញ,ថ្ងៃទី.......ខែ......ឆ្នាំ20.... </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px">
                            <div class="col-4" align="center">
                                <h6​ class="title_khleave"><b>អនុម័តដោយ</b></h6>
                            </div>
                            <div class="col-4" align="center" >
                                <h6​ class="title_khleave"><b>បញ្ជាក់ដោយ</b></h6>
                            </div>
                            <div class="col-4" align="center">
                                <h6​ class="title_khleave"><b>ស្នើសុំដោយ</b></h6>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px">
                            <div class="col-12" style="height:70px;">
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px">
                            <div class="col-4" align="center">
                                <h6​ class="title_khleave">.................................</h6> <br>
                                <h6​ class="inputinfokh">ថ្ងៃ.........ខែ.......ឆ្នាំ........</h6>
                            </div>
                            <div class="col-4" align="center" >
                                <h6​ class="title_khleave">.................................</h6> <br>
                                <h6​ class="inputinfokh">ថ្ងៃ.........ខែ.......ឆ្នាំ........</h6>
                            </div>
                            <div class="col-4" align="center">
                                <h6​ class="title_khleave">.................................</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:10px">
                    <div class="col-12" align="center">
                        <button type="button" class="btn btn-primary">Approve</button>
                        <button type="button" class="btn btn-danger">Reject</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
                <div class="row" style="margin-top:10px">
                    <div class="col-12" align="center">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div >
</div>
</body>
</html>

<?php
include 'footer.php';
?>
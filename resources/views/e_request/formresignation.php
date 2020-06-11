    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Resignation</title>
    <link rel="stylesheet" href="../../storage/css/bootstrap4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../storage/css/style.css">

    <script src="../../storage/css/bootstrap4.1.3/js/bootstrap.min.js"></script>
    <script src="../../storage/css/bootstrap4.1.3/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../storage/css/bootstrap4.1.3/js/popper.min.js"></script>
    
<!-- <div class="row"> -->
    <!-- <div class="container-fluid"> -->
        <div class="container">
            <div class="row" style="margin-top:20px">
                <div class="col-12" style="text-align: center">
                    <h5 class="title_khleave"><u>លិខិតសំលាឈប់ពីការងារ</u></h5>
                    <h5 class="title_engleave">Letter of Resignation</h5>
                </div>
            </div>
            <form action=" " method="post">
                <div class="row" style="margin-top:15px;">
                    <div class="col-12">
                        <label class="during">ខ្ញុំបាទ/នាងខ្ញុំឈ្មោះ/I am:</label>
                        <textarea class="form-control" id="txtStaffName" rows="1"></textarea>
                        <label class="during">អត្តលេខបុគ្គលិក/EMP ID:</label>
                        <textarea class="form-control" id="txtEmpId" rows="1"></textarea>
                        <label class="during">មានមុខងារជា/Position:</label>
                        <textarea class="form-control" id="txtStaffPosition" rows="1"></textarea>
                        <label class="during">បម្រើការងារក្នុងនាយកដ្ឋាន/ផ្នែក/Dept./Unit:</label>
                        <textarea class="form-control" id="txtStaffDepartment" rows="1"></textarea>
                    </div>
                </div>

                <div class="row" style="margin-top:15px">
                    <div class="col-12" style="text-align: center">
                        <h5 class="title_khleave">សូមគោរពជូន</h5>
                        <h5 class="title_khleave">លោកអគ្គនាយកនៃក្រុមហ៊ុន "ធើបូថេក ឯ.ក"</h5>
                        <h5 class="title_engleave">To</h5>
                        <h5 class="title_engleave">CEO of Turbo Tech Solutions Co., Ltd.</h5>
                    </div>
                </div>

                <div class="row" style="margin-top:15px;">
                    <div class="col-3">
                        <h6 class="title_khleave">តាមរយៈ/By :</h6>
                    </div>
                    <div class="col-9">
                        <label class="during">នាយកដ្ឋាន/ផ្នែក/Dept.Head:</label>
                        <textarea class="form-control" id="txt1StaffDepartment" rows="2"></textarea>
                    </div>
                </div>

                <div class="row" style="margin-top:15px;">
                    <div class="col-3">
                        <h6 class="title_khleave">កម្មវត្ថុ/Subject :</h6>
                    </div>
                    <div class="col-9">
                        <label class="during">សំណើសំុលាឈប់ពីការងារ/Request of Resignation, ចាប់ពីថ្ងៃទី/From Date:</label>
                        <input type="text" id="dateResignation" name="dateResignation">&nbsp;&nbsp;
                        <label class="during">ខែ/Month:</label>
                        <input type="text" id="monthResignation" name="monthResignation">&nbsp;&nbsp;
                        <label class="during">ឆ្នាំ/Year:</label>
                        <input type="text" id="yearResignation" name="yearResignation">
                    </div>
                </div>

                <div class="row" style="margin-top:15px;">
                    <div class="col-3">
                        <h6 class="title_khleave">មូលហេតុ/Reason :</h6>
                    </div>
                    <div class="col-9">
                        <textarea class="form-control" id="txtReasonResignation" rows="4"></textarea>
                    </div>
                </div>

                <div class="row" style="margin-top:25px">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-9">
                                <p class="during">សេចក្ដីដូចបានជម្រាបជូនក្នុងកម្មវត្ថុ និងមូលហេតុខាងលើ សូមលោកអគ្គនាយក មេត្តាពិចារណា និងសម្រចឲ្យខ្ញុំបាទ/នាងខ្ញុំ បានលាឈប់ពីការងារដោយក្ដីអនុគ្រោះ ។
                                As Stated in the above subject and reason, please CEO accept and approve my resignation from current job with the highest consideration and personal esteem.</p>
                                <p class="during">សូមលោកអគ្គនាយក មេត្តាទទួលនូវការគោរពរាប់អានដ៏ខ្ពង់ខ្ពស់អំពី ខ្ញុំបាទ/នាងខ្ញុំ ។ Please CEO accept the highest respect from me.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" >
                    <div class="col-12">
                        <div class="row" style="margin-top:20px">
                            <div class="col-12">
                            <div class="row">
                            <div class="col-4"></div>
                            <div class="col-8" align="center">
                                <h6 class="inputinfokh" style="margin-top:10px">រាជធានីភ្នំពេញ/Phnom Penh, ថ្ងៃទី/Date.......ខែ/Month........ឆ្នាំ20.....</h6>
                            </div>
                            </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top:20px">
                            <div class="col-4"></div>
                            <div class="col-8" align="center">
                                <h6​ class="during">ហត្ថលេខា និងឈ្មោះសមីខ្លួន/Staff's Singature & Name</h6>
                            </div>
                        </div>
                        <div class="row" style="margin-top:30px"> 
                            <div class="col-4"></div>
                            <div class="col-8" align="center">
                                <h6​ class="title_khleave">........................</h6>
                            </div>
                        </div>

                        <div class="row" style="margin-top:15px; padding-bottom: 15px;">
                            <div class="col-6"></div>
                            <div class="col-6" align="right">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>         
            </form>
        </div>
    <!-- </div> -->
<!-- </div> -->

    <?php
    include 'footer.php';
    ?>
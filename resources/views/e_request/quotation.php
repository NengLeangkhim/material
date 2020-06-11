    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>តារាងសម្រង់តម្លៃ</title>
    <link rel="stylesheet" href="/E-Request/storage/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/E-Request/storage/css/styles.css">
    <link rel="stylesheet" href="/E-Request/storage/css/style.css"> -->
    
    <?php
    include 'header.php';
    ?>
<!-- <div class="container-fluid">     -->
    <div class="row" style="margin-top: 20px">
        <div class="col-12" style="text-align: center">
            <h5 class="title_khleave"><u>តារាងសម្រង់តម្លៃ</u></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="">
                <table class="table " border=1 style="text-align:​ center; border-color: black; padding: 0px" id="tblRequestForm">
                    <thead>
                        <tr>
                            <td rowspan="3" class="text-center-td">ល.រ</td>
                            <td rowspan="3" class="text-center-td">បរិយាយ</td>
                            <td rowspan="3" class="text-center-td">ចំនួនសរុប</td>
                            <td rowspan="3" class="text-center-td">កន្លែងប្រើប្រាស់</td>
                            <td colspan="2" class="text-center-td">ឈ្មោះអ្នកផ្គត់ផ្គង់ដែលបានធ្វើសម្រង់តម្លៃ</td>
                            <td rowspan="3" class="text-center-td">ផ្សេងៗ</td>
                            <td rowspan="3" class="text-center-td" style="width: 125px"><button type="button" name="add" id="add" class="btn btn-success" onclick="addrow_quotation()">Add More</button></td>
                        </tr>

                        <tr>
                            <td colspan="2" class="text-center-td"><span><input type="checkbox" name="ftsGlobal"></span> - FST Global</td>
                        </tr>

                        <tr>
                            <td class="text-center-td">តម្លៃ / ឯកតា</td>
                            <td class="text-center-td">តម្លៃសរុប</td>
                        </tr>
                    </thead>
                    
                    <tbody id="addrow_quo">
                        
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="3"class="style_td" style="border-bottom: hidden; border-left: hidden"></td>
                            <td class="text-center-td"><h6​ class="title_khleave">ចំនួនទឹកប្រាក់សរុប</h6></td>
                            <td class="text-center-td"></td>
                            <td class="text-center-td" id="subtotal"></td>
                            <td class="text-center-td"></td>
                            <td class="text-center-td"></td>
                        </tr>
                    </tfoot>
                </table>

                <div class="row" style="margin-top: 20px">
                    <div class="col-12" align="left">
                        <p class="during">យោបល់អ្នកសម្រង់តម្លៃ:</p>
                        <textarea class="form-control" id="txtExp002" rows="2"></textarea>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-5" align="center">
                                <h6 class="title_khleave">ត្រួតពិនិត្យដោយ</h6>
                            </div>
                            <div class="col-5" align="center">
                                <h6 class="title_khleave">រៀបចំដោយ</h6>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px">
                            <div class="col-2"></div>
                            <div class="col-5" align="center">
                                <p class="title_khleave">ឈ្មោះ....................</p>
                                <p class="title_khleave">ថ្ងៃទី.........ខែ..........ឆ្នាំ.........</p>
                            </div>
                            <div class="col-5" align="center">
                                <p class="title_khleave">ឈ្មោះ....................</p>
                                <p class="title_khleave">ថ្ងៃទី.........ខែ..........ឆ្នាំ.........</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 25px">
                    <div class="col-6" align="left">
                        <h6 class="title_khleave"><u>ជូនភ្ជាប់មកជាមួយ</u></h6>
                        <p class="during">១- ឯកសារសម្រង់តម្លៃចំនួន ០១ ច្បាប់</p>
                        <p class="during">២- ឯកសារ-កាលប្បវត្តិ</p>
                    </div>
                    <div class="col-6"></div>
                </div>

                <div class="row" style="margin-top:15px; padding-bottom: 15px">
                    <div class="col-6"></div>
                    <div class="col-6" align="right">
                        <h6 class="title_khleave">FDF-EXP-002</h6>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form> 
        </div>
    </div>
<!-- </div> -->
<?php
include 'footer.php';
?>

<!-- <script src="/E-Request/storage/bootstrap-4.4.1/jquery-3.5.0.min.js"></script>
<script src="/E-Request/storage/bootstrap-4.4.1/js/bootstrap.min.js" ></script>
<script src="/E-Request/storage/js/addRow.js"></script>
<script src="/E-Request/storage/js/getvalues.js"></script> -->
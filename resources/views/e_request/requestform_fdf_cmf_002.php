    
    <?php
    include 'header.php';
    ?>
<!-- <div class="row"> -->
    <!-- <div class="container-fluid"> -->
        <!-- <div class="container"> -->
            <div class="row" style="margin-top:20px">
                <div class="col-12" style="text-align: center">
                    <h5 class="title_khleave">សូមគោរពជូន</h5>
                    <h5 class="title_khleave">លោកអគ្គនាយក</h5>
                </div>
            </div>
            <form action=" " method="post">
                <div class="row" style="margin-top:15px;">
                    <div class="col-2">
                        <h6 class="title_khleave">កម្មវត្ថុ :</h6>
                    </div>
                    <div class="col-10">
                        <label class="title_khleave">សំណើសុំដាក់ប្រាក់/មូលប្បទានប័ត្រចូលគណនីធនាគារចំនួន:</label>
                        <textarea class="form-control" id="txtCmf002" rows="1"></textarea>
                    </div>
                </div>

                <div class="row" style="margin-top:15px;">
                    <div class="col-2">
                        <h6 class="title_khleave">យោង :</h6>
                    </div>
                    <div class="col-10">
                        <p class="during"> - សេចក្ដីសម្រេចលេខ: ធថ០០២/១៨សរ ចុះថ្ងៃទី១៨ ខែមេសា ឆ្នាំ២០១៨ ស្ដីពីការដាក់ឲ្យប្រើប្រាស់ជាផ្លូវការនូវគោលការណ៏ប្រតិបត្តិ និងនីតិវិធីគ្រប់គ្រងសាច់ប្រាក់ ។</p>
                        <p class="during"> - សុវត្ថិភាពក្នុងការគ្រប់គ្រងសាច់ប្រាក់របស់ក្រុមហ៊ុន ។</p>
                    </div>
                </div>

                <div class="row" style="margin-top:10px;">
                    <div class="col-2"></div>
                    <div class="col-10">
                        <label class="during">តបតាមកម្មវត្ថុ និងយោងខាងលើ ខ្ញុំបាទសុំស្នើការអនុញ្ញាតពី<span><b class="title_khleave"> លោក អគ្គនាយក </b></span>ដើម្បីដាក់ប្រាក់/មូលប្បទានប័ត្រ</label>
                        <input type="text" id="check" name="check">
                        <label class="during">លេខ:</label>
                        <input type="text" id="checkNumber" name="checkNumber">
                        <label class="during">បានមកពី:</label>
                        <textarea class="form-control" id="txt1Cmf002" rows="1"></textarea>
                        <label class="during">ដាក់ចូលគណនីធនាគារ ABA ឈ្មោះ TURBOTECH CO.,LTD តាមចំនួនដូចខាងក្រោម៖</label><br>
                        <label class="during">-ប្រាក់ដុល្លារអាមេរិកចំនួន:</label>
                        <input type="text" id="totalCash" name="totalCash"><br>
                        <label class="during">-ដាក់ចូលគណនីប្រាក់ដុល្លារអាមេរិកលេខ 000488896 ។</label>                         
                    </div>
                </div>

                <div class="row" style="margin-top:20px">
                    <div class="col-3"></div>
                    <div class="col-9">
                        <label class="during">ទូទាត់តាមរយៈ </label>
                        <input type="radio" id="cash" name="payment" value="cash">
                        <label for="cash">-សាច់ប្រាក់</label>
                        <input type="radio" id="check" name="payment" value="check">
                        <label for="check">-មូលលប្បទានប័ត្រ</label>
                        <input type="radio" id="other" name="payment" value="other">
                        <label for="other">-ផ្សេងៗ</label>
                        <input type="text" id="other1" name="other1">
                    </div>
                </div>

                <div class="row" >
                    <div class="col-12">
                        <div class="row" style="margin-top:10px">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-9">
                                        <p class="during">អាស្រ័យដូចបានជម្រាបជូនខាងលើសូម<span><b class="title_khleave"> លោក អគ្គនាយក </b></span>មេត្តាពិនិត្យ និងអនុម័តតាមសំណើសុំដោយក្តីអនុគ្រោះ ។</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-9" >
                                        <p class="during">សូម<span><b class="title_khleave"> លោក អគ្គនាយក </b></span>មេត្តាទទួលនូវសេចក្តីគោរពដ៏ខ្ពង់ខ្ពស់អំពីខ្ញុំបាទ ។</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top:20px">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6"></div>
                                    <div class="col-6" align="center">
                                        <h6 class="inputinfokh">ថ្ងៃ......ខែ.....ឆ្នាំ.....ឯកស័ក ព.ស២៥៦....</h6>
                                        <h6 class="inputinfokh" style="margin-top:10px">រាជធានីភ្នំពេញ, ថ្ងៃទី.......ខែ......ឆ្នាំ20...... </h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top:20px">
                            <div class="col-6"></div>
                            <div class="col-6" align="center">
                                <h6​ class="title_khleave"><b>រៀបចំដោយ</b></h6>
                            </div>
                        </div>

                        <div class="row" style="margin-top:30px"> 
                            <div class="col-6"></div>
                            <div class="col-6" align="center">
                                <h6​ class="title_khleave">......................................</h6>
                            </div>
                        </div>

                        <div class="row" style="margin-top:15px; padding-bottom: 15px;">
                            <div class="col-6"></div>
                            <div class="col-6" align="right">
                                <h6 class="title_khleave">FDF-CMF-002</h6>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>         
            </form>
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->

    <?php
    include 'footer.php';
    ?>
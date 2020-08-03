

<div class="row" style="padding: 10px;"> </div>
<div class="row" style="">
        <div class="col-lg-1 col-md-1 col-sm-1 col ">
        <!-- <h3>Column 1</h3> -->
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-12" style="">
            <div class="form-review" style="">
                <div class="row close-icon">
                    <a href="#" onclick="close_frmInfo();"><i class="mdi mdi-close" style="font-size:20px"></i></a>
                </div>
                <div class="row">
                    <table style="width: 100%; ">
                        <tr>
                            <th> <h5 style="padding-left: 10px; font-family: Khmer OS Koulen; font-size: 20px;"><b>ប្រវត្តិរូបសង្ខេប</b></h5></th>
                        </tr>
                        <tr style="border-top: 2px solid gray; width: 100%;">
                            <td colspan="2"><input type="hidden" ></td>
                        </tr>
                        <tr class="tr-review">
                            <td class="td-label kh-font-batt">ឈ្មោះ</td>
                            <td class="td-txtbox kh-font-batt"> <div class="output-field"> <?php echo $userdata[0]->name_kh; ?> </div></td>
                        </tr>
                        <tr class="tr-review">
                            <td class="td-label">Email</td>
                            <td class="td-txtbox"> <div class="output-field"> <?php echo $userdata[0]->email; ?></div></td>
                        </tr class="tr-review">
                        <tr class="tr-review">
                            <td class="td-label kh-font-batt">មុខដំណែងការងារបានដាក់</td>
                            <td class="td-txtbox"><div class="output-field"> <?php echo $userdata[0]->position; ?> </div></td>
                        </tr>
                        <tr class="tr-review">
                            <td class="td-label kh-font-batt">ថ្ងៃចុះឈ្មោះ</td>
                            <td class="td-txtbox"><div class="output-field"> <?php echo $userdata[0]->register_date; ?> </div></td>
                        </tr>
                    </table>
                </div>
            </div> 
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col  ">
        <!-- <h3>Column 3</h3>         -->
        </div>
</div>
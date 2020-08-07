<section class="content">
    <div class="header">
        <div class="row">
            <div class="col-sm-12">
                <p class="title_khleave"​​​ style="margin-top: 10px;margin-left: 20px;font-size: 23px">របាយការណ៍:</p>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-12 row"​ style="margin-left: 15px;">
        <!-- <p class="word-tbody col-1 text-center">ចាប់ពី</p> -->
        <div class="input-group col-md-4">
            <label for="" class="word-tbody" style="margin-top:1%">ចាប់ពី</label>&nbsp&nbsp
            <input type="date" name="" id="from" class="form-control" value="<?php echo date('Y-m-d')?>" oninput="get_report_val('report-div',this.value,document.getElementById('to').value)">
            <div class="input-group-append">
                <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
            </div>
        </div>
        <!-- <p class="word-tbody col-1 text-center">ដល់</p> -->
        <div class="input-group col-md-4">
        <label for="" class="word-tbody" style="margin-top:1%">ដល់</label>&nbsp&nbsp
        <input type="date" name="" id="to" class="form-control" value="<?php echo date('Y-m-d')?>" oninput="get_report_val('report-div',document.getElementById('from').value,this.value)">
            <div class="input-group-append">
                <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
            </div>
        </div>
        <span class="input-group-text" style="cursor:pointer;" onclick="get_report_val('report-div',document.getElementById('from').value,document.getElementById('to').value)"><img src="/img/search.png" alt="" width="18px" height="18px"></span>
    </div>
</div><br>
<?php
    if($c&&($c['type']=='normal'||$c['type']=='top'||($c['type']=='mid'&&$c['ma_company_dept_id']==4))){
        echo '<div class="col-8 offset-2"><canvas id="bar-chart" width="400" height="120"></canvas></div>';
    }
?>
<div id='report-div'>
</div><br>
<div id="report-table">
</div>
<div class="modal fade bd-example-modal-xl" id='more_detail' tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-family:khmer,cursive">ព័ត៌មានបន្ថែម</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id='modal_content_detail'></div>
            ...
        </div>
    </div>
</div>
</section>
<script>
datetime();
</script>
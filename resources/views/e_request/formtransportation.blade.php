<?php
    use App\Http\Controllers\util;
    extract($val, EXTR_PREFIX_SAME, "wddx");
?>
<section class="content">
    @include('e_request.header')
    <div class="container">
        <div class="row">
            <div class="col-12" style="text-align: center">
                <h5 class="title_khleave"><u>សំណើសុំប្រើប្រាស់មធ្យោបាយធ្វើដំណើរ</u></h5>
            </div>
        </div>
        <form id="{{ $frm_id }}">
            @csrf
        <input type="hidden" name="erid" value="<?php echo (isset($_GET['erid']))?$_GET['erid']:'';?>">
            <div style="overflow-x: auto; width:100%">
                <table class="table-bordered display">
                    <thead align="center">
                        <th class="bpd" style="vertical-align: middle;padding:20px; width: 150px"><h6 class="during style_td bold">កាលបរិច្ឆេទ</h6></th>
                        <th class="bpd" style="vertical-align: middle;padding:20px; width: 150px"><h6 class="during bold">ម៉ោងចេញដំណើរ</h6></th>
                        <th class="bpd" style="vertical-align: middle;padding:20px; width: 150px"><h6 class="during bold">ម៉ោងត្រលប់មកវិញ</h6></th>
                        <th class="bpd" style="vertical-align: middle;padding:20px; width: 175px"><h6 class="during bold">គោលដៅធ្វើដំណើរ (សូមរៀបរាប់)</h6></th>
                        <th class="bpd" style="vertical-align: middle;padding:20px; width: 200px"><h6 class="during bold">គោលបំណងនៃការប្រើប្រាស់</h6></th>
                        <th class="bpd" style="vertical-align: middle;padding:20px; width: 200px"><h6 class="during bold">ផ្សេងៗ (ចំនួនមនុស្ស ឈ្មោះ និងឧបករណ៏យកទៅជាមួយ...)</h6></th>
                        <?php echo $add;?> 
                    </thead>
                    <tbody id="dynamic_field">
                        <?php
                            if(!empty($row)){
                                foreach($row as $r){
                                    echo '<tr>
                                        <td class="bpd">'.util::conv_date($r['date']).'</td>
                                        <td class="bpd">'.util::conv_time($r['departure_time']).'</td>
                                        <td class="bpd">'.util::conv_time($r['return_time']).'</td>
                                        <td class="bpd">'.$r['destination'].'</td>
                                        <td class="bpd">'.$r['objective'].'</td>
                                        <td class="bpd">'.$r['other'].'</td>
                                    <tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="row" style="margin-top:10px">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6" align="center">
                            <h6 class="inputinfokh">ថ្ងៃ.........ខែ.......ឆ្នាំ........ឯកស័ក ព.ស២៥៦....</h6>
                            <h6 class="inputinfokh" style="margin-top:10px">រាជធានីភ្នំពេញ,ថ្ងៃទី <?php echo (isset($create_date))?util::conv_kh(date_format(date_create($create_date),"d")):'.......';?> ខែ <?php echo (isset($create_date))?util::conv_month(date_format(date_create($create_date),"m")):'.......';?> ឆ្នាំ <?php echo (isset($create_date))?util::conv_kh(date_format(date_create($create_date),"Y")):'.......';?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:20px">
                <div class="col-6" align="center">
                    <h6​ class="title_khleave"><b>យល់ព្រមដោយ</b></h6><br>
                    <h6​ class="title_khleave"><b><?php echo ((isset($approve_by)&&!empty($approve_by)))?$approve_by:((isset($pending_by))?$pending_by:'')?></b></h6>
                </div>
                <div class="col-6" align="center">
                    <h6​ class="title_khleave"><b>ស្នើសុំដោយ</b></h6><br>
                    <h6​ class="title_khleave"><b><?php echo(isset($req_by))?$req_by['name']:''?></b></h6>
                </div>
            </div>
            <div class="row" style="margin-top:50px">
                <div class="col-6" align="center">
                    <h6​ class="title_khleave"><b><?php echo ((isset($approve_by)&&!empty($approve_by)))?util::conv_datetime($approve_date):((isset($pending_by))?util::conv_datetime($pending_date):'..................................')?></b></h6>
                </div>
                <div class="col-6" align="center">
                    <!-- <h6​ class="title_khleave"><b><?php //echo (isset($create_date))?conv_date($create_date):'..................................';?></b></h6> -->
                </div>
            </div>
            <div class="row" style="margin-top:10px">
                <div class="col-12" align="center">
                    <?php echo $comment;?>
                </div>
            </div>
            <div class="row" style="margin-top:10px">
                <div class="col-12" align="center">
                    <?php echo $approve;?>
                    <?php echo $pending;?>
                    <?php echo $reject;?>
                    <?php echo $btn_sub;?>
                </div>
            </div>
            <br>
    </div>
</form>

@include('e_request.footer')
</section>

<div class="modal fade" id="mvalid_row" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">បំរាម</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        សូមបញ្ចូលទិន្នន័យជាមុនសិន!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>

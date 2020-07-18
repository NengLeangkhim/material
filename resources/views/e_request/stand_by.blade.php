<?php
    use App\Http\Controllers\util;
    use Illuminate\Support\Facades\DB;
    use App\Http\Controllers\e_request\ere_get_assoc;
    extract($val, EXTR_PREFIX_SAME, "wddx");
    // dump($v);
    echo $h??'';
?>
<section class="content">
    @include('e_request.header')
    <div class="container">
        <div class="row">
            <div class="col-12" style="text-align: center">
                <h5 class="title_khleave">តារាងរាយនាមបុគ្គលិកប្រចាំការ</h5>
            </div>

        </div>
        <br>
        <form id="{{ $frm_id }}">
            @csrf
            <input type="hidden" name="erid" value="<?php echo (isset($_GET['erid']))?$_GET['erid']:'';?>">
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="title_khleave">សម្រាប់ខែ :</h6>
                        </div>
                        <div class="col-sm-8">
                            <input type="hidden" name="foryear" id=foryear>
                            <select name="formonth" id='formonth' class="form-control select2">
                                <option value="-1" disabled hidden selected></option>
                                @php
                                    for ($i = 0; $i < 12; $i++)
                                    {
                                        echo '<option value="'.($i+1).'">'.util::conv_month($i+1).'</option>';
                                    }
                                @endphp
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: 2%">
                    <table class="table table-bordered">
                        <thead class="title_khleave">
                            <tr>
                                <th style="width: 26%">Date</th>
                                <th style="width: 13%">Start time</th>
                                <th style="width: 13%">End time</th>
                                <th>Staff</th>
                            </tr>
                        </thead>
                        <tbody id='dynamic_field'>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" align="center" >
                    <?php echo $approve;?>
                    <?php echo $pending;?>
                    <?php echo $reject;?>
                    <?php echo $btn_sub;?>
                </div>
            </div>
        </form>
</div>
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
        សូមជ្រើរើសខែជាមុនសិន!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="madd_staff" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">បន្ថែមបុគ្គលិក</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-10">
                    <input type="hidden" id='madd_staff_id'>
                    <select name="madd_staff" id="sel_madd_staff" class="form-control select2">
                        <option value="-1" disabled hidden selected></option>
                        @foreach ($staff as $rr)
                            <option value="{{ $rr['id'] }}">{{ $rr['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="button" class="btn btn-default" onclick="mstand_by_add()">ADD</button>
            </div>
            <table class="table table-bordered" style="margin-top: 2%">
                <thead>
                    <tr>
                        <th>Selected Staff</th><th></th>
                    </tr>
                </thead>
                <tbody id='mselected_staff'>

                </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick='mstand_by_add_to()'>Ok</button>
        </div>
      </div>
    </div>
  </div>
<script>
    $(".select2").select2();
    $('#formonth').change(function(){
        $('#dynamic_field').html('');
        $('#foryear').attr('value',moment().year());
        console.log($(this).val());
        var num_date=new Date(moment().year(), $(this).val(), 0).getDate()
        console.log(num_date);
        for(i=1;i<=num_date;i++){
            d_val=moment().year()+'-'+$(this).val()+'-'+i;
            $('#dynamic_field').append(
                '<tr ><td>'+moment([moment().year(),($(this).val()-1),i]).format("dddd, MMMM Do YYYY")+
                '<input hidden name="date[]" value="'+d_val+'" id="hid'+d_val+'"></td>'+
                    '<td><input type="time" class="form-control" name="start_t_'+d_val+'"></td>'+
                    '<td><input type="time" class="form-control" name="end_t_'+d_val+'"></td>'+
                    '<td id="td_'+d_val+'"><button class="btn btn-default" style="border-radius: 50%;" type="button" onclick="stand_by_add(\'#hid'+d_val+'\')"><i class="fas fa-plus"></i></button></td>'+
                '</tr>'
                );
        }
    // time();
    });
    function stand_by_add(id){// plus button on table
        // console.log($(id).val());
        $('#mselected_staff').html('');
        $('#madd_staff_id').attr('value',$(id).val());
        $('#madd_staff').modal('show');


    }
    function mstand_by_add(){ // add to table on modal
        id=$('#madd_staff_id').val();
        $('#mselected_staff').append('<tr><td><input hidden name="stid_'+id+'[]" value="'+$('#sel_madd_staff').val()+'"><p style="float:left">'+$('#sel_madd_staff option:selected').text()+'&nbsp&nbsp</p></td><td><i onclick="delete_row_maddstaff(this)" class="fa fa-trash" style="cursor:pointer;"></i></td></tr>');
        // $('#madd_staff').modal('hide');
    }
    function mstand_by_add_to(){ //add to table from modal
        id=$('#madd_staff_id').val();
        $('#mselected_staff tr').each(function (i, row) {
            var $row = $(row),
            $hid_st = $row.find('input')[0].outerHTML,
            $hid_name=$row.find('p')[0].outerHTML;
            madd=$('#madd_staff_id').val();
            before=$('#td_'+madd).html();
            $('#td_'+madd).html($hid_name+$hid_st+before);
            $('#mselected_staff').html('');
            $('#madd_staff').modal('hide');
        });
    }
    function delete_row_maddstaff(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("mselected_staff").deleteRow(i-1);
  }
</script>
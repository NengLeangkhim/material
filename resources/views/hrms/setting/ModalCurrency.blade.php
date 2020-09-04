<div class="modal fade show" id="modal_currencyrate" style="display: block; padding-right: 17px;" aria-modal="true" data-backdrop="static">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong> Add Currency Rate</strong></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            @php
                // print_r($data[1]);
            @endphp
            <form id="fm_currencyrate" onsubmit="return false">
               @csrf
              <div class="row">
                <input type="hidden" name="id" id="" value="@php if(isset($data[1])){echo $data[1][0]->id;} @endphp">
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Type <span class="text-danger">*</span></label>
                    <select name="type" id="" class="form-control">
                        @php
                            $f1='';
                            $f2='';
                            foreach ($data[0] as $ct) {
                                if(isset($data[1])){
                                    if($ct->id==$data[1][0]->typeid){
                                        $f1=$f1.'<option value="'.$ct->id.'">'.$ct->name.'</option>';
                                    }else {
                                        $f2=$f2.'<option value="'.$ct->id.'">'.$ct->name.'</option>';
                                    }
                                }else {
                                    $f1=$f1.'<option value="'.$ct->id.'">'.$ct->name.'</option>';
                                }
                                
                            }
                            echo $f1.$f2;
                        @endphp
                        
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>To Type <span class="text-danger">*</span></label>
                    <select name="totype" id="" class="form-control">
                        @php
                            $f1='';
                            $f2='';
                            foreach ($data[0] as $ct) {
                                if(isset($data[1])){
                                    if($ct->id==$data[1][0]->totypeid){
                                        $f1=$f1.'<option value="'.$ct->id.'">'.$ct->name.'</option>';
                                    }else {
                                        $f2=$f2.'<option value="'.$ct->id.'">'.$ct->name.'</option>';
                                    }
                                }else {
                                    $f1=$f1.'<option value="'.$ct->id.'">'.$ct->name.'</option>';
                                }
                                
                            }
                            echo $f1.$f2;
                        @endphp  
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Unit <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="unit" value="@php if(isset($data[1])){echo $data[1][0]->unit;} @endphp">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Rate <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="rate" value="@php if(isset($data[1])){echo $data[1][0]->rate;} @endphp">
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-12 text-right">
                  <a href="javascrip;:" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                  <a href="javascrip;:" class="btn bg-turbo-color" data-dismiss="modal" onclick="submit_form ('hrm_insert_update_currencyrate','fm_currencyrate','hrm_currency')">Save</a>
                </div>
              </div>
            </form>
            <!-- /.row -->
          </div>
          
          <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>
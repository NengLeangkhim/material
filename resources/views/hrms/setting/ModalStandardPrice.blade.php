<div class="modal fade show" id="modal_standardprice" style="display: block; padding-right: 17px;" aria-modal="true" data-backdrop="static">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong>Standard Price</strong></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            @php
                // print_r($data[0]);
            @endphp
            <form id="fm_standardprice" onsubmit="return false">
               @csrf
              <div class="row">
                <input type="hidden" name="id" id="" value="@php if(isset($data[0])){echo $data[0][0]->id;} @endphp">
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Type <span class="text-danger">*</span></label>
                    <select name="type" id="" class="form-control">
                        @php
                            if(isset($data[0])){
                                if($data[0][0]->type=='Holiday'){
                                    echo '<option value="Holiday">Holiday</option>
                                    <option value="Hour">Hour</option>';
                                }else {
                                    echo '<option value="Hour">Hour</option>
                                        <option value="Holiday">Holiday</option>
                                        ';
                                }
                            }else {
                                echo '<option value="Hour">Hour</option>
                                        <option value="Holiday">Holiday</option>
                                        ';
                            }
                        @endphp
                            
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Price($) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="price" value="@php if(isset($data[0])){echo $data[0][0]->price;} @endphp">
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-12 text-right">
                  <a href="javascrip;:" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                  <a href="javascrip;:" class="btn bg-turbo-color" data-dismiss="modal" onclick="submit_form ('hrm_insert_update_standardprice','fm_standardprice','hrm_standard_price')">Save</a>
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
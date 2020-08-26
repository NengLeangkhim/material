<div class="modal fade show" id="modal_trainer" style="display: block; padding-right: 17px;" aria-modal="true" data-backdrop="static">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Add Trainer</strong></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            @php
                // print_r($data);
            @endphp
            <form id="fm_trainer">
              @csrf
            <div class="row">
              <input type="hidden" name="id" id="" value="@php if(isset($data[0])){echo $data[0][0]->id;} @endphp">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Trainer <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="trainer" value="@php if(isset($data[0])){echo $data[0][0]->name;} @endphp">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Telephone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="telephone" value="@php if(isset($data[0])){echo $data[0][0]->telephone;} @endphp">
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                  <label>Type <span class="text-danger">*</span></label>
                  <select name="type" id="" class="form-control">
                    @php
                        if(isset($data[0])){
                            if($data[0][0]->type=='t'){
                                echo '<option value="t">Staff</option>
                                      <option value="f">Other</option>';
                            }else {
                                echo '<option value="f">Other</option>
                                      <option value="t">Staff</option>';
                            }
                        }else {
                            echo '<option value="t">Staff</option>
                                  <option value="f">Other</option>';
                        }
                    @endphp
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                  <label>Description <span class="text-danger">*</span></label>
                  <textarea name="description" id="" rows="5" class="form-control">@php if(isset($data[0])){echo $data[0][0]->description;} @endphp</textarea>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="col-md-12 text-right">
                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button class="btn bg-turbo-color" data-dismiss="modal" onclick="submit_form ('hrm_add_edit_trainer','fm_trainer','hrm_trainer')">Save</button>
            </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>
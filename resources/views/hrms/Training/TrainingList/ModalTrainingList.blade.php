<div class="modal fade show" id="modal_traininglist" style="display: block; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Add Training List</strong></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            <form id="fm_trainingType">
              @csrf
            <div class="row">
              <input type="hidden" name="id" id="" value="@php if(isset($data[0])){echo $data[0][0]->id;} @endphp">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Training Type <span class="text-danger">*</span></label>
                  <select name="trainingtype" id="" class="form-control">
                    <option value="">1</option>  
                  </select>
                </div>
                <!-- /.form-group -->
                
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                  <label>Trainer<span class="text-danger">*</span></label>
                  <select name="trainer" id="" class="form-control">
                    <option value="">1</option>
                  </select>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                  <label>Start Date<span class="text-danger">*</span></label>
                  <input type="date" name="start_date" id="" class="form-control">
                  <div class="form-group">
                  <label>Trainer<span class="text-danger">*</span></label>
                  <input type="date" name="end_date" id="" class="form-control">
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label>Trainer<span class="text-danger">*</span></label>
                  <input type="date" name="end_date" id="" class="form-control">
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
                <button class="btn bg-turbo-color" data-dismiss="modal" onclick="submit_form ('hrm_add_edit_trainingtype','fm_trainingType','hrm_trainingtype')">Save</button>
            </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>
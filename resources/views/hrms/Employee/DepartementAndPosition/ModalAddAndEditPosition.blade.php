<div class="modal fade show" id="modal_position" style="display: block; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong><i class="fas fa-calendar-plus"></i> Add Position</strong></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            <form id="fm_position" onsubmit="return false">
              @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Group <span class="text-danger">*</span></label>
                    <select id="g" class="form-control" name="g">
                      <option value="" hidden></option>
                      @php
                        foreach ($data[0] as $g) {
                          if(isset($data[1])){
                            if($g->id==$data[1][0]->ma_group_id){
                              echo '<option selected value="'.$g->id.'">'.$g->name.'</option>';
                            }else {
                              echo '<option value="'.$g->id.'">'.$g->name.'</option>';
                            }

                          }else {
                            echo '<option value="'.$g->id.'">'.$g->name.'</option>';
                          }
                        }
                      @endphp
                    </select>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Position Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="position_position" name="position_position" value="@php if(isset($data[1])){echo $data[1][0]->name;} @endphp" required>
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Khmer Name</label>
                    <input type="text" class="form-control" name="khPosition" value="@php if(isset($data[1])){echo $data[1][0]->name_kh;} @endphp">
                  </div>
                </div>
                <!-- /.col -->
                <input type="hidden" name="id" value="@php if(isset($data[1])){echo $data[1][0]->id;} @endphp ">
                <div class="col-md-12 text-right">
                  <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  <button class="btn bg-turbo-color" onClick="hrms_insert_update_position()">Save</button>
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
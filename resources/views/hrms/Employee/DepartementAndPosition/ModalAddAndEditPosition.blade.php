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
            @php
                // print_r($data);
            @endphp
            <form id="fm_position" onsubmit="return false">
              @csrf
              <div class="row">
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Groupe <span class="text-danger">*</span></label>
                    <select id="" class="form-control" name="g">
                      @php
                        $f1='';
                        $f2='';
                        foreach ($data[0] as $g) {
                          if(isset($data[1])){
                            if($g->id==$data[1][0]->group_id){
                              $f1=$f1.'<option value="'.$g->id.'">'.$g->name.'</option>';
                            }else {
                              $f2=$f2.'<option value="'.$g->id.'">'.$g->name.'</option>';
                            }

                          }else {
                            $f1=$f1.'<option value="'.$g->id.'">'.$g->name.'</option>';
                          }
                        }
                        echo $f1.$f2;
                      @endphp
                    </select>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Position Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="position" value="@php if(isset($data[1])){echo $data[1][0]->name;} @endphp">
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Khmer Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="khPosition" value="@php if(isset($data[1])){echo $data[1][0]->name_kh;} @endphp">
                  </div>
                </div>
                <!-- /.col -->
                <input type="hidden" name="id" value="@php if(isset($data[1])){echo $data[1][0]->id;} @endphp ">
                <div class="col-md-12 text-right">
                  <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  <button class="btn bg-turbo-color" data-dismiss="modal" onClick="submit_form ('hrm_add_edit_position','fm_position','hrm_department')">Save</button>
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
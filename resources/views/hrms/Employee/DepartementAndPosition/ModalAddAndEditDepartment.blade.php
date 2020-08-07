<div class="modal fade show" id="modal_department" style="display: block; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong><i class="fas fa-calendar-plus"></i> Add Department</strong></h3>

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
            <form id="fm_department" onsubmit="return false">
              @csrf
              <div class="row">
                <input type="hidden" name="id" value="@php if(isset($data[1])){echo $data[1][0]->id;} @endphp">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Company Name <span class="text-danger">*</span></label>
                    <select id="" class="form-control" name="company_id">
                      @php
                          $f1='';
                            $f2='';
                      @endphp
                      @foreach ($data[0] as $c)
                        @php
                            
                            if(isset($data[1])){
                                if($data[1][0]->ma_company_id==$c->id){
                                $f1=$f1.'<option value="'.$c->id.'">'.$c->name.'</option>';
                              }else {
                                $f2=$f2.'<option value="'.$c->id.'">'.$c->name.'</option>';
                              }
                            }else {
                              $f1=$f1.'<option value="'.$c->id.'">'.$c->name.'</option>';
                            }
                            
                        @endphp
                        
                      @endforeach
                      @php
                          echo $f1.$f2;
                      @endphp
                      
                    </select>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Department Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="department" value="@php if(isset($data[1])){echo $data[1][0]->name;} @endphp">
                  </div>
                  <div class="form-group">
                    <label>Khmer Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="khName" value="@php if(isset($data[1])){echo $data[1][0]->name;} @endphp">
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-12 text-right">
                  <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  <button class="btn bg-turbo-color" data-dismiss="modal" onclick="submit_form ('hrm_add_edit_department','fm_department','hrm_department')">Save</button>
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
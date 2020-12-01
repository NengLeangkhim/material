
<div class="modal fade show" id="modal_warning_and_punishment_type" style="display: block; padding-right: 17px;" aria-modal="true" data-backdrop="static">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong> Warning and Punishment Type</strong></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            <form id="fm_warning_and_punishment_type" onsubmit="return false">
              @csrf
            <div class="row">
              <input type="hidden" name="id" id="" value="@php if(isset($warning_type)){echo $warning_type[0]->id;} @endphp">
              <div class="col-md-12">
                  <div class="form-group">
                  <label>Warning Type Name (en) <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="warning_type_name_en" name="warning_type_name_en" value="@php if(isset($warning_type)){echo $warning_type[0]->name_en;} @endphp">
                </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                  <label>Warning Tyep Name (kh)</label>
                  <input type="text" class="form-control" id="warning_type_name_kh" name="warning_type_name_kh" value="@php if(isset($warning_type)){echo $warning_type[0]->name_kh;} @endphp">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="col-md-12 text-right">
                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button class="btn bg-turbo-color" onclick="hrms_insert_update_warning_and_punishment_type()">Save</button>
            </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>
<div class="modal fade show" id="modal_traininglist" style="display: block; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong><i class="fas fa-calendar-plus"></i> Add Training List</strong></h3>

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
            <form id="fm_training_list" onsubmit="return false" enctype="multipart/form-data">
               @csrf
              <div class="row">
                <input type="text" name="id" id="" value="@php if(isset($data[10])){echo $data[1][0]->id;} @endphp">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Training Type <span class="text-danger">*</span></label>
                    <select name="trainingtype" id="" class="form-control">
                      @foreach ($data[0] as $trainType)
                        <option value="{{$trainType->id}}">{{$trainType->name}}</option>
                      @endforeach
                     
                    </select>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Trainer <span class="text-danger">*</span></label>
                    <select name="trainer" id="" class="form-control">
                      @foreach ($data[1] as $trainer)
                          <option value="{{$trainer->id}}">{{$trainer->name}}</option>
                      @endforeach
                        
                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Start Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="startdate" value="@php if(isset($data[10])){echo $data[1][0]->start_time;} @endphp">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>End Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="enddate" value="@php if(isset($data[10])){echo $data[1][0]->end_time;} @endphp">
                  </div>
                </div>
                
                <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="document" id="document" onchange="hrm_get_name_file('document','documentFile')">
                        <label class="custom-file-label" for="exampleInputFile" id="documentFile">Choose file</label>
                      </div>
                 
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="" rows="5" class="form-control">@php if(isset($data[10])){echo $data[1][0]->description;} @endphp</textarea>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-12 text-right">
                  <a href="javascrip;:" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                  <a href="javascrip;:" class="btn bg-turbo-color" data-dismiss="modal" onclick="submit_form ('hrm_insert_update_traininglist','fm_training_list','hrm_traininglist')">Save</a>
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
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
@php
    foreach ($policy_get as $row) {
        # code...
        $path = $row->file_path;
        $id= $row->id;
    }
    $path_public = "/media/hrms/file/"; //path for show
@endphp
<!-- modal -->
<form id="hrm_policy_view_form">
    <div class="modal fade show" id="hrm_view_policy_modal" tabindex="-1" role="dialog" aria-labelledby="Policy_View" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title hrm-title"><strong><i class="fas fa-book-open"></i></strong></h3> 
                  <h2 class="card-title hrm-title" id="card_title"> Read Policy</h2>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
                  </div>
              </div><!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <input type="hidden" id="start_time" name="start_time" > <!-- Start time for detect user reading-->
                <input type="hidden" id="id_policy" name="id_policy" value="{{$id}}" ><!-- Policy-->
                <div class="row">
                    <div class="col-12 loadingInProgress" id="body-pdf" tabindex="1" style="height:1000px;"> 
                        <iframe src="{{asset($path_public.$path)}}" frameborder="0" name="iframe_policy" id="iframe_policy" width="100%" height="100%"></iframe>
                    </div> <!--End PDF Viewer -->
                    <div class="col-12" style="margin-top:30px;height:70px;">
                        <input required type="checkbox" name="verify_policy" value="check" id="verify_policy"> <label for="verify_policy">please comfirm verify if you already read all of policy!!!</label>
                        <span class="invalid-feedback" role="alert" id="verify_policyError"> {{--span for alert--}}
                            <strong></strong>
                        </span>
                    </div>
                    <div class="col-12 text-center">
                    {{-- <input type="hidden" name="test" id="test"> --}}
                    <button type="button" class="btn btn-primary" id="submit_policy" onclick="sumbit_policy()" name="submit_policy">Submit</button> 
                    </div>
                </div> {{-- END ROW--}}
                    <div class="row text-right">
                      <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </div>
              </div><!-- /.END card-body -->
            </div><!-- /.END card-Default -->
          </div>
        </div>
      </div>
    </form>
      <!-- end modal -->
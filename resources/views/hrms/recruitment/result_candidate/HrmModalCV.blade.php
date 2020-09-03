@php
    foreach($candidate as $row){
            $email = $row->email;
            $zip_file = $row->zip_file;
            $coverletter = $row->cover_letter;
        }
        
@endphp
<div class="modal fade show" id="HrmModalViewCv" tabindex="-1" role="dialog" aria-labelledby="HrmModalViewCv" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title hrm-title"><strong><i class="far fa-file"></i></i></strong></h3>
                <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">Resume Detail</h2>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
            </div><!-- /.card-header -->
            <div class="card-body" style="display: block;">
                <div class="container-fluid">
                    <div class="row" style="height:1200px;text-align:center;">
                    <div class="col-12" style="height:50px">
                        <span style="font-size:22px;color:#d42931;font-weight:bold;">Resume</span>
                    </div>
                    <div class="col-12" style="height:1150px">
                    <iframe id="iframepdf" src="media/file_candidate_recruitment/{{$email}}/{{$zip_file}}" width="100%" height="100%"></iframe>
                    </div>
                    </div><!-- End Row -->
                    <div class="row" style="height:1200px">
                    <div class="col-12" style="text-align:center;height:50px">
                        <span class="text-center" style="font-size:22px;color:#d42931;font-weight:bold;">Cover Letter</span>
                    </div>
                    <div class="col-12" style="height:1150px">
                    <iframe id="iframepdf" src="media/file_candidate_recruitment/{{$email}}/{{$coverletter}}" width="100%" height="100%"></iframe>
                    </div>
                    </div><!-- End Row -->
                 </div><!-- End container-fluid -->
                 
                  <div class="row text-right">
                    <div class="col-md-12 text-right" style="margin-top: 5px;">
                        <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    
                  </div>
            </div><!-- /.END card-body -->
          </div><!-- /.END card-Default -->
      </div>
  </div>
</div>
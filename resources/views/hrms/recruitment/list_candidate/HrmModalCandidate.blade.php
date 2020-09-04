@php
    foreach($candidate as $row){
            $name_kh = $row->name_kh;
            $fname = $row->fname;
            $lname = $row->lname;
            $email = $row->email;
            $position = $row->name;
            $interest = $row->interest;
            $id_candidate = $row->id_condidate;
            $create = $row->register_date;
            $ts1 = new DateTime($create);// convert datetime
            $create = $row->register_date;
            $zip_file = $row->zip_file;
            $coverletter = $row->cover_letter;
        }
        
@endphp
<!-- modal -->
    <div class="modal fade show" id="hrm_view_candidate_modal" tabindex="-1" role="dialog" aria-labelledby="hrm_view_candidate_modal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title hrm-title"><strong><i class="fas fa-book-open"></i></strong></h3>
                  <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">Candidate Detail</h2>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
                  </div>
              </div><!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <div class="container-fluid">
                    <div class="row" style="height:100px">
                    <div class="col-6" style="text-align:center">
                        <span class="text-center" style="font-size:15px;color:#d42931;font-weight:bold;">ID:</span>
                        <p style="display:inline;color:black;" id="id_condidate">{{$id_candidate}}</p>
                    </div>
                    <div class="col-6"  style="text-align:center">
                        <span class="text-center" style="font-size:15px;color:#d42931;font-weight:bold;">Date:</span>
                        <p style="display:inline;color:black" id="register_date">{{$ts1->format('Y-M-d H:i:s')}}</p>
                    </div>
                    <div class="col-12">
                     <hr style="border:1px solid">
                    </div>
                    </div><!-- End Row -->
                    <div class="row" style="height:70px">
                    <div class="col-6" style="text-align:center">
                        <span class="text-center" style="font-size:15px;color:#d42931;float:left">FirstName:</span>
                        <p style="display:inline;color:black;" id="fname">{{$fname}}</p>
                    </div>
                    <div class="col-6"  style="text-align:center">
                        <span class="text-center" style="font-size:15px;color:#d42931;float:left">LastName:</span>
                        <p style="display:inline;color:black;" id="lname">{{$lname}}</p>
                    </div>
                    </div><!-- End Row -->
                    <div class="row" style="height:70px">
                    <div class="col-6" style="text-align:center;width:50px;">
                        <span class="text-center" style="font-size:15px;color:#d42931;float:left">KhmerName:</span>
                        <p style="display:inline;color:black;font-family: Khmer UI;width:50px;" id="name_kh">{{$name_kh}}</p>
                    </div>
                    <div class="col-6"  style="text-align:center">
                        <span class="text-center" style="font-size:15px;color:#d42931;float:left">Position:</span>
                        <p style="display:inline;color:black;" id="position">{{$position}}</p>
                    </div>
                    </div><!-- End Row -->
                    <div class="row" style="height:150px">
                    <div class="col-6" style="text-align:center">
                        <span class="text-center" style="font-size:15px;color:#d42931;float:left">Email:</span>
                        <p style="display:inline;color:black;font-family: Khmer UI" id="email">{{$email}}</p>
                    </div>
                    <div class="col-6" >
                        <span class="text-center" style="font-size:15px;color:#d42931;float:left">Interest:</span>
                        <!-- <p style="display:inline;color:black;" id="interest"></p> -->
                        <textarea disabled style="display:inline;color:black;border:none;background-color:white;" name="" id="interest" cols="29" rows="4">{{$interest}}</textarea>
                    </div>
                    </div><!-- End Row -->
                    <div class="row" style="height:1200px">
                    <div class="col-12" style="text-align:center;height:50px">
                        <span class="text-center" style="font-size:17px;color:#d42931;font-weight:bold;">Resume</span>
                    </div>
                    <div class="col-12" style="height:1150px">
                    <iframe id="iframepdf" src="media/file_candidate_recruitment/{{$email}}/{{$zip_file}}" width="100%" height="100%"></iframe>
                    </div>
                    </div><!-- End Row -->
                    <div class="row" style="height:1200px">
                    <div class="col-12" style="text-align:center;height:50px">
                        <span class="text-center" style="font-size:17px;color:#d42931;font-weight:bold;">Cover Letter</span>
                    </div>
                    <div class="col-12" style="height:1150px">
                    <iframe id="iframepdf" src="media/file_candidate_recruitment/{{$email}}/{{$coverletter}}" width="100%" height="100%"></iframe> 
                    </div>
                    </div><!-- End Row -->
                </div><!-- End container-fluid -->
                    <div class="row text-right" style="margin-top: 5px">
                      <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </div>
              </div><!-- /.END card-body -->
            </div><!-- /.END card-Default -->
          </div>
        </div>
      </div>
      <!-- end modal -->
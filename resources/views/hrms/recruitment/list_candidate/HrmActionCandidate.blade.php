@php
use App\Http\Controllers\en_de;
    if($action == 'create') // Set action for create
    {
                                // Header Form
                                $header = "Add Candidate";
                                //Action go to
                                $go_to = "hrm_list_condidate";
                                 //// plan detail
                                $name_kh = '';
                                $fname = '';
                                $lname = '';
                                $email= '';
                                $pw = '';
                                $require='*';
                                $pos = '';
                                $cv = '';
                                $candidate = '';
                                $cover = '';
                                $button = "Create";
                                $candidate_id = '';
                                $education_level='';
                                $major='';
    }else{
        foreach($candidate as $row){           
                                // Header Form
                                $header = "Update Candidate";
                                //Action go to
                                $go_to = "hrm_list_condidate";
                                //// plan detail
                                $name_kh = $row->name_kh;
                                $fname = $row->fname;
                                $lname = $row->lname;
                                $email= $row->email;
                                $pw = $row->password;
                                $require='';
                                $pos = $row->ma_position_id;
                                $cv = $row->zip_file;
                                $cover = $row->cover_letter;
                                $candidate = $row->id_condidate;
                                $button = "Update";
                                $candidate_id = $row->id;
                                $education_level=$row->ma_user_education_level_id;
                                $major=$row->major;
        }
    }
    
 @endphp
 <script>
     $('#position').val('<?php echo $pos ?>'); // set value for select position id
     $('#cv_file_name').text('<?php echo $cv ?>'); // set label for update
     $('#cover_file_name').text('<?php echo $cover ?>'); // set label for update
     $('#cv').val('<?php echo $cv ?>'); // set value for cv
     $('#cover_letter').val('<?php echo $cover ?>'); // set value for cover
 </script>
<!-- page content -->
<section class="content">
<form id="hrm_candidate_form">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
              <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title hrm-title"><strong><i class="fas fa-plus"></i></strong></h3>
                     <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title"> {{$header}}</h2>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <a  href="javascript:void(0);" onclick="go_to('{{$go_to}}')" class="text-info"><i class="fa fa-arrow-left"></i> Back</a> 
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <div class="alert alert-danger print-error-msg" style="display:none"> {{-- div for show error --}}
                        <ul></ul>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="plan_detail_schedule">First Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="fname" id="fname" value="<?=$fname?>">
                                    <span class="invalid-feedback" role="alert" id="fnameError"> {{--span for alert--}}
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="schedule_detail_task">Last Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="lname" id="lname" value="<?=$lname?>">
                                    <span class="invalid-feedback" role="alert" id="lnameError"> {{--span for alert--}}
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="plan_detail_schedule">Khmer Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name_kh" id="name_kh" value="<?=$name_kh?>">
                                    <span class="invalid-feedback" role="alert" id="name_khError"> {{--span for alert--}}
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="plan_detail_schedule">Education Level<span class="text-danger">*</span></label>
                                    <select name="education_level" id="education_level" class="form-control">
                                        <option value="" hidden></option>
                                        @foreach ($education as $educat)
                                            @if ($education_level==$educat->id)
                                                <option selected value="{{$educat->id}}">{{$educat->name_en}}/{{$educat->name_kh}}</option>
                                            @else
                                                <option value="{{$educat->id}}">{{$educat->name_en}}/{{$educat->name_kh}}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>
                                    <span class="invalid-feedback" role="alert" id="education_levelError"> {{--span for alert--}}
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="plan_detail_schedule">Major<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="major" id="major" value="<?=$major?>">
                                    <span class="invalid-feedback" role="alert" id="majorError"> {{--span for alert--}}
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="plan_detail_schedule">Email<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?=$email?>">
                                    <span class="invalid-feedback" role="alert" id="emailError"> {{--span for alert--}}
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="schedule_detail_task">Password<span class="text-danger">{{$require}}</span></label>
                                    <input type="password" class="form-control" name="pw" id="pw">
                                    <input type="hidden" name="pw_update" value="{{$pw}}">
                                    <span class="invalid-feedback" role="alert" id="pwError"> {{--span for alert--}}
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="plan_detail_schedule">Position<span class="text-danger">*</span></label>
                                    <select class="form-control" name="position" id="position">
                                        <option value="">Please Position</option>
                                        @foreach ($position as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>  
                                        @endforeach
                                    </select>
                                    <span class="invalid-feedback" role="alert" id="positionError"> {{--span for alert--}}
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cv">Upload CV<span class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        {{-- <label for="policy_file">File PDF only<span class="text-danger">*</span></label> --}}
                                        <input type="file" class="custom-file-input" onchange="hrm_get_name_file('cv','cv_file_name'),HrmFileValidationSize('cv',10240)" name="cv" id="cv" accept="application/pdf">
                                        <label class="custom-file-label" id="cv_file_name" for="cv">Choose file</label>
                                        <input type="hidden" name="cv_hidden" value="{{$cv}}">  {{--for update--}}
                                        <span class="invalid-feedback" role="alert" id="cvError"> {{--span for alert--}}
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cover_letter">Upload Cover Letter<span class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" onchange="hrm_get_name_file('cover_letter','cover_file_name'),HrmFileValidationSize('cover_letter',10240)" name="cover_letter" id="cover_letter" accept="application/pdf">
                                        <label class="custom-file-label" id="cover_file_name" for="cover_letter">Choose file</label>
                                        <input type="hidden" name="cover_hidden" value="{{$cover}}">
                                        <span class="invalid-feedback" role="alert" id="cover_letterError"> {{--span for alert--}}
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </div><!-- End schedule_plan_detail -->
                    </div><!-- End container-fluid -->   
                       <div class="row text-right">
                           <div class="col-md-12 text-right">
                            <input type="hidden" name="candidate" value="{{$candidate}}">
                            <input type="hidden" name="candidate_id" id="candidate_id" value="{{$candidate_id}}"/>
                            <input type="submit" name="action_hrm_candidate" onclick="HrmSubmitCandidate()" id="action_hrm_candidate" class="btn btn-primary" value="{{$button}}"/>
                           </div>
                       </div>
                </div><!-- /.END card-body -->
              </div><!-- /.END card-Default -->
      
</form>
</section> 
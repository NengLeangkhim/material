<section class="content">
    <!-- modal -->
    <form id="question_answer_sugg_form">
        <div class="modal fade show" id="modal_update_queston_answer_sugg" tabindex="-1" role="dialog" aria-labelledby="QuestionLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="card card-default">
                  <div class="card-header">
                      <h3 class="card-title hrm-title"><strong><i class="fas fa-info-circle"></i> Detail Question And Answer</strong></h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      </div>
                  </div><!-- /.card-header -->
                  <div class="card-body" style="display: block;">
                    <div class="container-fluid">
                        <div class="row"> 
                            <div class="col-md-12 alert alert-danger print-error-msg" style="display:none"> {{-- div for show error --}}
                                <ul></ul>
                              </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="question">Question Name<span class="text-danger">*</span></label>
                                    @foreach ($question_sugg_view as $item)
                                <input type="hidden" name="question_id1" id="question_id1" value="{{$item->id}}"/>
                                    <textarea class="form-control" id="question_name1" name="question_name1" cols="5" rows="5">{{$item->question}}</textarea>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="question_type1">Question Type <span class="text-danger">*</span></label>
                                    <select disabled name="question_type1" id="question_type1" class="form-control">
                                    @foreach ($question_sugg_view as $item)
                                    <option value="">{{$item->name}}</option>   
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Status">Status</label>
                                    <select name="statusType1" id="statusType1" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>  
                                    </select>
                                </div>
                            </div>
                            @php
                                $i=1;
                                $k=0;
                            @endphp
                            @foreach ($answer_sugg as $row)
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="question">Answer {{$i++}}<span class="text-danger">*</span></label>
                                    <input type="hidden" name="answer_id[]" id="answer_id" value="{{$row->id}}">
                                    <!-- <input type="text" class="form-control" id="answer_name" aria-describedby="answer" placeholder="" name="answer_name"> -->
                                    <textarea required class="form-control" id="answer_name.{{$k++}}" aria-describedby="answer" placeholder="" name="answer_name[]" cols="2" rows="4">{{$row->answer}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Status">Status</label>
                                    @if ($row->status=='t')
                                        <select name="status_answer[]" id="statusType_answer" class="form-control">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select> 
                                    @else
                                        <select name="status_answer[]" id="statusType_answer" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0" selected>Inactive</option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div><!-- End Row -->
                        <div class="row text-right">
                            <div class="col-md-12 text-right">
                              <button class="btn btn-danger" data-dismiss="modal">Close</button>
                              <button type="submit" onclick="HrmUpdateQuestionAnswerSugg()" class="btn btn-primary" name="action_question_answer_sugg" id="action_question_answer_sugg">Update</button>
                            </div>
                        </div>
                    </div>
                  </div><!-- /.END card-body -->
                </div><!-- /.END card-Default -->
              </div>
          </div>
        </div>
          <!-- end modal -->
    </form>
    </section>
        <!-- end modal -->
    
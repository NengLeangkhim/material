<section class="content">
<!-- modal -->
<form id="answer_sugggestion_form">
    <div class="modal fade show" id="answer_add_sugg_modal" tabindex="-1" role="dialog" aria-labelledby="QuestionLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title hrm-title"><strong><i class="fas fa-plus-square"></i> Add Answer</strong></h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-dismiss="modal" aria-label="Close">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
              </div><!-- /.card-header -->
              <div class="card-body" style="display: block;">
                    <div class="alert alert-danger print-error-msg" style="display:none"> {{-- div for show error --}}
                      <ul></ul>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="question_name_sugg">Question<span class="text-danger"></span></label>
                              @foreach ($question_sugg_get as $row)
                                <input type="hidden" name="question_sugg_id" id="question_sugg_id" value="{{$row->id}}"/>
                                <textarea disabled type="text" class="form-control" placeholder=""  cols="4">{{$row->question}}</textarea>  
                              @endforeach   
                          </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                            <label for="answer_name_sugg">Answer<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="answer_name_sugg" aria-describedby="answer" name="answer_name_sugg">
                        <span class="invalid-feedback" role="alert" id="answer_name_suggError"> {{--span for alert--}}
                          <strong></strong>
                        </span>
                        </div>
                      </div>
                    </div> 
                    <div class="row text-right">
                      <div class="col-md-12 text-right">
                        <input type="hidden" name="answer_sugg_id" id="answer_sugg_id"/>
                        <button type="submit" onclick="HrmSubmitAnswerSugg()" name="action_anwer_sugg" id="action_anwer_sugg" class="btn btn-primary">Create</button>
                      </div>
                      
                    </div>
              </div><!-- /.END card-body -->
            </div><!-- /.END card-Default -->
          </div>
      </div>
    </div>
</form>
      <!-- end modal -->
</section>
    <!-- end modal -->

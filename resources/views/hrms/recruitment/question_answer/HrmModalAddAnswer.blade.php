<!-- modal -->
<form id="answer_recruitment_form">
    <div class="modal fade show" id="answer_recruitment_modal" tabindex="-1" role="dialog" aria-labelledby="answer_recruitment_modal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title hrm-title"><strong><i class="fas fa-plus"></i></strong></h3>
                  <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">Add Answer</h2>
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
                                <label for="question">Question Name<span class="text-danger">*</span></label>
                                @foreach ($question_get as $item)
                                <input type="hidden" name="id_question" id="id_question" value="{{$item->id}}">
                                <textarea disabled class="form-control" cols="2">{{$item->question}}</textarea>
                                @endforeach
                                <span class="invalid-feedback" role="alert" id="question_nameError"> {{--span for alert--}}
                                <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="question">Answer:01<span class="text-danger">*</span></label>
                                <!-- <input type="text" class="form-control" id="answer_name" aria-describedby="answer" placeholder="" name="answer_name"> -->
                                <textarea class="form-control" id="answer_name" aria-describedby="answer" placeholder="" name="answer_name[]" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wrong_right">True/False</label>
                                <select name="wrong_right[]" id="wrong_right" class="form-control">
                                    <option value="0">False</option>
                                    <option value="1">True</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="question">Answer:02<span class="text-danger">*</span></label>
                                <!-- <input type="text" class="form-control" id="answer_name" aria-describedby="answer" placeholder="" name="answer_name"> -->
                                <textarea class="form-control" id="answer_name" aria-describedby="answer" placeholder="" name="answer_name[]" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wrong_right">True/False</label>
                                <select name="wrong_right[]" id="wrong_right" class="form-control">
                                    <option value="0">False</option>
                                    <option value="1">True</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="question">Answer:03<span class="text-danger">*</span></label>
                                <!-- <input type="text" class="form-control" id="answer_name" aria-describedby="answer" placeholder="" name="answer_name"> -->
                                <textarea class="form-control" id="answer_name" aria-describedby="answer" placeholder="" name="answer_name[]" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wrong_right">True/False</label>
                                <select name="wrong_right[]" id="wrong_right" class="form-control">
                                    <option value="0">False</option>
                                    <option value="1">True</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="question">Answer:04<span class="text-danger">*</span></label>
                                <!-- <input type="text" class="form-control" id="answer_name" aria-describedby="answer" placeholder="" name="answer_name"> -->
                                <textarea class="form-control" id="answer_name" aria-describedby="answer" placeholder="" name="answer_name[]" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wrong_right">True/False</label>
                                <select name="wrong_right[]" id="wrong_right" class="form-control">
                                    <option value="0">False</option>
                                    <option value="1">True</option>
                                </select>
                            </div>
                        </div>
                   </div> {{--END ROW--}}                 
                   <div class="row text-right">
                     <div class="col-md-12 text-right">
                        <input type="hidden" name="question_id" id="question_id"/>
                        <button type="submit" onclick="HrmSubmitAnswer()" name="action_answer" id="action_answer" class="btn btn-primary">Create</button>
                     </div>  
                   </div>
              </div><!-- /.END card-body -->
            </div><!-- /.END card-Default -->
          </div>
        </div>
      </div>
    </form>
      <!-- end modal -->
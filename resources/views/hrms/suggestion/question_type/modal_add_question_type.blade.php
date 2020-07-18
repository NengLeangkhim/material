<!-- modal -->
<div class="modal fade" id="q_type_sugg_modal" tabindex="-1" role="dialog" aria-labelledby="QuestionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center" style="background-color:#1fa8e0;">
            <h5 class="modal-title" id="model_title">Add New </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form  id="question_type_sugg">
            @csrf
          <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="question_type_sugg">Question Type<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="question_type_sugg" aria-describedby="question_type" placeholder="" name="question_type_sugg">
                        </div>
                    </div>
                </div> 
          </div>
          <div class="modal-footer">
              <input type="hidden" name="action_q_t_sugg_id" id="action_q_t_sugg_id"/>
              <input type="submit" name="action_q_t_sugg" id="action_q_t_sugg" class="btn btn-outline-primary" />
              </div>
            </form>
          </div>
      </div>
    </div>
    
    <!-- end modal -->
<section class="content">
<!-- modal -->
<form id="question_type_sugg_form">
    {{-- @csrf --}}
<input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">
<div class="modal fade" id="q_type_sugg_modal" tabindex="-1" role="dialog" aria-labelledby="QuestionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center" style="background-color:#1fa8e0;">
            <h5 class="modal-title" id="model_title">Add New </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div class="row">
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="question_type_sugg">Question Type<span class="text-danger">*</span></label>
                            <input type="text" required class="form-control" id="question_type_sugg" aria-describedby="question_type" placeholder="" name="question_type_sugg">
                        </div>
                    </div>
                </div> 
          </div>
          <div class="modal-footer">
              <input type="hidden" name="action_q_t_sugg_id" id="action_q_t_sugg_id"/>
              <input type="submit" onclick="HrmAddQuestionTypeSugg()" name="action_q_t_sugg" id="action_q_t_sugg" class="btn btn-outline-primary" />
              </div>
            
          </div>
      </div>
    </div>
</form>
</section>
    <!-- end modal -->
@section('scripts')
@parent
@if($errors->has('question_type_sugg'))
    <script>
    $(function() {
        $('#question_type_sugg_form').modal({
            show: true
        });
    });
    </script>
@endif
@endsection
 <!-- page content -->
 <section class="content">
   <div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-question-circle"></i> Question & Answer</strong></h1>
                <div class="col-md-12 text-right">
                    {{-- <button type="button" id="AddQuestionSugg" onclick="AddNewQuestionSugg()" class="btn bg-gradient-primary"><i class="fas fa-plus"></i> Add Question</button> --}}
                    {!!$add_perm!!}
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered display nowrap" style="width: 100%" id="question_sugg">
                  <thead>                  
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Question</th>
                        <th scope="col">Question Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                  </thead>
                  {!!$table_perm!!}
                  @php
                  //  $i=1;//for ID Table increase 
                  //  $j=1;//for ID checkbox increase
                  //  $k=1;//for label increase
                  @endphp
                  {{-- <tbody>
                    @foreach ($question_sugg as $row)
                    <tr>
                        <th>{{$i++}}</th>
                        <td>{{$row->question}}</td>
                        <td class="text-center">{{$row->question_type}}</td>
                        <td class="text-center">
                          <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                          @if ($row->status=='t')
                              <input type="checkbox" value="{{$row->id}}" id="checkbox_sugg_q_a{{$j++}}" class="custom-control-input HrmCheckBoxSuggQA" checked> <label class="custom-control-label" for="checkbox_sugg_q_a{{$k++}}" style="color:green;"> Active</label>
                          @else
                              <input type="checkbox" value="{{$row->id}}" id="checkbox_sugg_q_a{{$j++}}" class="custom-control-input HrmCheckBoxSuggQA"> <label class="custom-control-label" for="checkbox_sugg_q_a{{$k++}}" style="color:red;"> Inactive</label>
                          @endif
                          </div>
                        </td>
                      @if ($row->hr_suggestion_question_type_id==1) Permission check for option type
                        <td class="text-center">
                          <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu hrm_dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_view_detail_question_answer">View Detail</button>
                            <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_question_answer">Update Detail</button>
                            <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_delete_question_answer">Delete</button>
                            <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item add_answer_sugg">Add Choice</button>
                            <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item view_result_sugg">Result</button>
                            </div>
                            </div>
                        </td>
                      @else
                        <td class="text-center">
                          <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu hrm_dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item update_q_sugg">Update</button>
                            <button type="button" id="{{$row->id}}" onclick="hrm_delete('{{$row->id}}','hrm_question_answer_sugg/delete','/hrm_question_answer_sugg','Question Has Been Deleted')"  class="dropdown-item hrm_item delete_q_sugg">Delete</button>
                            <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item view_result_sugg">Result</button>
                            </div>
                            </div>
                        </td>
                      @endif
                       
                    </tr>
                    @endforeach --}}
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            <!-- /.card -->
    </div>
</div>
   </section>
<div id='ShowModalSuggestion'></div>
   <script type='text/javascript'>
    $(document).ready(
        function(){
           // getTable('productlist','id');
            $('#question_sugg').DataTable({
              scrollX: true
            });
        }
    );
  </script>
<!-- modal -->
<form id="question_sugggestion_form">
<div class="modal fade show" id="q_sugg_modal" tabindex="-1" role="dialog" aria-labelledby="QuestionLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="card card-default">
          <div class="card-header">
              <h3 class="card-title hrm-title"><strong><i class="fas fa-question-circle"></i></strong></h3>
              <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">Add Question</h2>
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
                          <label for="question_name_sugg">Question Name<span class="text-danger">*</span></label>
                          <textarea class="form-control" id="question_name_sugg" aria-describedby="question" placeholder="" name="question_name_sugg" cols="20" rows="6"></textarea>
                          <span class="invalid-feedback" role="alert" id="question_name_suggError"> {{--span for alert--}}
                            <strong></strong>
                          </span>
                      </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="question_type_id_sugg">Question Type <span class="text-danger">*</span></label>
                        <select name="question_type_id_sugg" id="question_type_id_sugg" class="form-control">
                        <option value="">Please Select Option</option>
                        @foreach ($question_type as $item)
                        <option value='{{$item->id}}'>{{$item->name}}</option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback" role="alert" id="question_type_id_suggError"> {{--span for alert--}}
                      <strong></strong>
                    </span>
                    </div>
                  </div>
                </div> 
                <div class="row text-right">
                  <div class="col-md-12 text-right">
                    <input type="hidden" name="q_sugg_id" id="q_sugg_id"/>
                    <button type="submit" onclick="HrmSubmitQuestionSugg()" name="action_q_sugg" id="action_q_sugg" class="btn btn-primary">Create</button>
                  </div>
                  
                </div>
          </div><!-- /.END card-body -->
        </div><!-- /.END card-Default -->
      </div>
    </div>
  </div>
</form>
  <!-- end modal -->
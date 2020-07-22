 <!-- page content -->
 <section class="content">
   <div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-question-circle"></i>Question & Answer</strong></h1>
                <div class="col-md-12 text-right">
                    <button type="button" id="AddQuestionSugg" onclick="AddNewQuestionSugg()" class="btn bg-gradient-primary"><i class="fas fa-plus"></i> Add Question Type</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="question_sugg">
                  <thead>                  
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Question</th>
                        <th scope="col">Question Type</th>
                        <th scope="col">Action</th>
                    </tr>
                  </thead>
                  @php
                   $i=1;   
                  @endphp
                  <tbody>
                    @foreach ($question_sugg as $row)
                    <tr>
                        <th>{{$i++}}</th>
                        <td>{{$row->question}}</td>
                        <td>{{$row->question_type}}</td>
                        <td class="text-center">
                          <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">
                            <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item">View Detail</button>
                            <button type="button" id="{{$row->id}}" onclick="add_plan_follow_up({{$row->id}})" class="dropdown-item hrm_item add_plan_follow_up">Add Choice</button>
                            <button type="button" id="{{$row->id}}" onclick="add_plan_follow_up({{$row->id}})" class="dropdown-item hrm_item add_plan_follow_up">Update</button>
                            </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            <!-- /.card -->
    </div>
</div>
   </section>
   <script type='text/javascript'>
    $(document).ready(
        function(){
           // getTable('productlist','id');
            $('#question_sugg').DataTable();
        }
    );
  </script>
<!-- modal -->
<form id="question_sugggestion">
<div class="modal fade" id="q_sugg_modal" tabindex="-1" role="dialog" aria-labelledby="QuestionLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center" style="background-color:#1fa8e0;">
          <h5 class="modal-title" id="model_title">Add New</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="question">Question Name<span class="text-danger">*</span></label>
                          <textarea class="form-control" id="question_name" aria-describedby="question" placeholder="" name="question_name" cols="20" rows="6"></textarea>
                      </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="question_type">Question Type <span class="text-danger">*</span></label>
                        <select name="question_type" id="question_type" class="form-control">
                        <option value="">Please Select Option</option>
                        @foreach ($question_type as $item)
                        <option value='{{$item->id}}'>{{$item->name}}</option>
                        @endforeach
                    </select>
                    </div>
                  </div>
              </div> 
        </div>
        <div class="modal-footer">
          <input type="hidden" name="q_sugg_id" id="q_sugg_id"/>
          <input type="submit" name="action_q_sugg" id="action_q_sugg" class="btn btn-outline-primary" />
        </div>
      </div>
    </div>
  </div>
</form>
  <!-- end modal -->
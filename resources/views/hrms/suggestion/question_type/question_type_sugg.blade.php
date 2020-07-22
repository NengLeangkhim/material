 <!-- page content -->
 <section class="content">
   <div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-question-circle"></i>Question Type</strong></h1>
                <div class="col-md-12 text-right">
                    <button type="button" id="Add_Q_Type_Sugg" onclick="AddNewQ_type_sugg()" class="btn bg-gradient-primary"><i class="fas fa-plus"></i></i> Add Question Type</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="tbl_type_sugg">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th scope="col">Question Type</th>
                      <th scope="col">Create_By</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i=1;
                    $check='';?>
                    @foreach($question_type_sugg as $row)
                        <tr>
                            <td style="color:black;" scope="row">{{$i++}}</td>
                            <td style="color:black;">{{$row->name}}</td>
                            <td style="color:black;">{{$row->username}} </td>
                            <td style="color:black;" class="text-center">
                              <a href="#" id="{{$row->id}}" class="btn btn-info update_q_t_sugg"><i class="far fa-edit"></i></a>
                              <a href="#" id="{{$row->id}}" onclick="detele_q_t_sugg({{$row->id}})" class="btn btn-info detele_q_t_sugg"><i style="color:red" class="fas fa-trash"></i></a>
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
   @yield('scripts')
   <!-- /page content -->
   <script type='text/javascript'>
     $(document).ready(
         function(){
            // getTable('productlist','id');
             $('#tbl_type_sugg').DataTable();
             $(".table-overflow").doubleScroll();

         }
     );
   </script>
<!-- modal -->
   <form id="question_type_sugg_form">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
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
            <div class="alert alert-danger print-error-msg" style="display:none"> {{-- div for show error --}}
              <ul></ul>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="question_type_sugg">Question Type<span class="text-danger">*</span></label>
                            <input type="text" required class="form-control" id="question_type_sugg" placeholder="" name="question_type_sugg">
                        </div>
                    </div>
                </div> 
        </div>
        <div class="modal-footer">
            <input type="hidden" name="action_q_t_sugg_id" id="action_q_t_sugg_id"/>
            <button type="submit" onclick="HrmAddQuestionTypeSugg()" name="action_q_t_sugg" id="action_q_t_sugg" class="btn btn-outline-primary">Create</button>
            </div>
        </div>
    </div>
    </div>
</form>
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
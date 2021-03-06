 <!-- page content -->
 <section class="content">
   <div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-question-circle"></i> Question Type</strong></h1>
                <div class="col-md-12 text-right">
                    {!!$add_perm!!}
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered display nowrap" style="width: 100%" id="tbl_type_sugg">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th scope="col">Question Type</th>
                      <th scope="col">Create By</th>
                      <th width="15%" scope="col">Action</th>
                    </tr>
                  </thead>
                  {{-- <tbody>
                    <?php 
                    // $i=1;
                    // $check='';?>
                    @foreach($question_type_sugg as $row)
                        <tr>
                            <td style="color:black;" scope="row">{{$i++}}</td>
                            <td style="color:black;">{{$row->name}}</td>
                            <td style="color:black;">{{$row->username}} </td>
                            <td style="color:black;" class="text-center">
                              <a href="#" id="{{$row->id}}" title="Update" class="update_q_t_sugg"><i class="far fa-edit"></i></a>
                              <a href="#" id="{{$row->id}}" title="Delete" onclick="detele_q_t_sugg({{$row->id}})" class="detele_q_t_sugg"><i style="color:red;margin-left:10px;" class="fas fa-trash"></i></a>
                            </td>
                        </tr>     
                    @endforeach
                  </tbody> --}}
                  {!!$table_perm!!}
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
             $('#tbl_type_sugg').DataTable({
               scrollX: true
             });
         }
     );
   </script>
<!-- modal -->
<form id="question_type_sugg_form">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <div class="modal fade show" id="q_type_sugg_modal" tabindex="-1" role="dialog" aria-labelledby="QuestionLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title hrm-title"><strong><i class="fas fa-question-circle"></i></strong></h3>
                    <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">Add Question Type</h2>
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
                                  <label for="question_type_sugg">Question Type<span class="text-danger">*</span></label>
                                  <input type="text" required class="form-control" id="question_type_sugg" placeholder="" name="question_type_sugg">
                              </div>
                          </div>
                      </div> 
                      <div class="row text-right">
                        <div class="col-md-12 text-right">
                          <input type="hidden" name="action_q_t_sugg_id" id="action_q_t_sugg_id"/>
                          <button type="submit" onclick="HrmAddQuestionTypeSugg()" name="action_q_t_sugg" id="action_q_t_sugg" class="btn btn-primary">Create</button>
                        </div>
                        
                      </div>
                </div><!-- /.END card-body -->
              </div><!-- /.END card-Default -->
          </div>
      </div>
    </div>
</form>
        <!-- end modal -->

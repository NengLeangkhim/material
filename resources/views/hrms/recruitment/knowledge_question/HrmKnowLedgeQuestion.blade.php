 <!-- page content -->
 <section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-question-circle"></i> Question Knowledge</strong></h1>
                 <div class="col-md-12 text-right">
                     {{-- <button type="button" id="AddNewQuestionKnowledge" onclick="AddNewQuestionKnowledge()" class="btn bg-gradient-primary"><i class="fas fa-plus"></i></i> Add Question Knowledge</button> --}}
                     {!!$add_perm!!}
                 </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="hrm_tbl_knowledge">
                            <thead>                  
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Question</th>
                                <th scope="col">Department</th>
                                <th scope="col">Create Date</th>
                                <th scope="col">Create By</th>
                                <th width="10%" scope="col">Action</th>
                              </tr>
                            </thead>
                            {!!$table_perm!!}
                            {{-- <tbody>
                              <?php 
                              // $i=1;
                              ?>
                              @foreach($question_knowledge as $row)
                                @php
                                $create = $row->create_date;
                                $ts1 = new DateTime($create); //convert string to date format 
                                @endphp
                                  <tr>
                                      <td style="color:black;" scope="row">{{$i++}}</td>
                                      <td style="color:black;">{{$row->question}}</td>
                                      <td style="color:black;">{{$row->name}}</td>
                                      <td style="color:black;">{{$ts1->format('d-M-Y H:i:s')}}</td>
                                      <td style="color:black;">{{$row->username}} </td>
                                      <td style="color:black;" class="text-center">
                                        <a href="#" id="{{$row->id}}" title="Update" class="update_qestion_knowledge"><i class="far fa-edit"></i></a>
                                        <a href="#" id="{{$row->id}}" title="Delete" onclick="hrm_delete({{$row->id}},'hrm_list_knowledge_question/delete','hrm_list_knowledge_question','Question has been deleted')" class="delete_qestion_knowledge"><i style="color:red;margin-left:10px;" class="fas fa-trash"></i></a>
                                      </td>
                                  </tr>     
                              @endforeach
                            </tbody> --}}
                          </table>

                    </div>
               </div>
               <!-- /.card-body -->
               
             <!-- /.card -->
     </div>
 </div>
    </section>
    <!-- /page content -->
    <script type='text/javascript'>
      $(document).ready(
          function(){
             // getTable('productlist','id');
              $('#hrm_tbl_knowledge').DataTable();
 
          }
      );
    </script>
 <!-- modal -->
 <form id="question_knowledge_form">
     <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
     <div class="modal fade show" id="question_knowledge_modal" tabindex="-1" role="dialog" aria-labelledby="question_knowledge_modal" aria-hidden="true">
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
                                   <label for="question_knowledge">Question<span class="text-danger">*</span></label>
                                   <textarea class="form-control" id="question_knowledge" placeholder="" name="question_knowledge" cols="7" rows="7"></textarea>
                                   <span class="invalid-feedback" role="alert" id="question_knowledgeError"> {{--span for alert--}}
                                    <strong></strong>
                                  </span>
                                </div>
                           </div>
                           <div class="col-md-12">
                                <div class="form-group">
                                    <label for="departement_knowledge">Department<span class="text-danger">*</span></label>
                                    <select name="departement_knowledge" id="departement_knowledge" class="form-control">
                                    <option value="">Please Select Option</option>
                                    <?php
                                        foreach($dept as $row ){ 
                                        echo "<option value='$row->id'>$row->name</option>";
                                        }
                                    ?>
                                    </select>
                                    <span class="invalid-feedback" role="alert" id="departement_knowledgeError"> {{--span for alert--}}
                                        <strong></strong>
                                    </span>
                                </div>
                           </div>
                       </div> 

                       <div class="row text-right">
                         <div class="col-md-12 text-right">
                            <input type="hidden" name="question_knowledge_id" id="question_knowledge_id"/>
                            <button type="submit" onclick="HrmAddQuestionKnowledge()" name="action_knowledge" id="action_knowledge" class="btn btn-primary">Create</button>
                         </div>
                         
                       </div>
                 </div><!-- /.END card-body -->
               </div><!-- /.END card-Default -->
           </div>
       </div>
     </div>
 </form>
         <!-- end modal -->
 
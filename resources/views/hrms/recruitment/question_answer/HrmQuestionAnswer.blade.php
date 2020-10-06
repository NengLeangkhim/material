 <!-- page content -->
 <section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-question-circle"></i> Question & Answer</strong></h1>
                 <div class="col-md-12 text-right">
                     {{-- <button type="button" id="AddNewQuestionRe" onclick="AddNewQuestionRe()" class="btn bg-gradient-primary"><i class="fas fa-plus"></i> Add Question</button> --}}
                     {!!$add_perm!!}
                 </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                 <table class="table table-bordered" id="question_recruitment">
                   <thead>                  
                     <tr>
                         <th scope="col">#</th>
                         <th scope="col">Question</th>
                         <th scope="col">Question Type</th>
                         <th scope="col">Position</th>
                         <th scope="col">Create Date</th>
                         <th scope="col">Create By</th>
                         <th scope="col">Action</th>
                     </tr>
                   </thead>
                   {!!$table_perm!!}
                   @php
                    // $i=1;   
                   @endphp
                   {{-- <tbody>
                     @foreach ($question as $row)
                     @php
                     $create = $row->create_date;
                     $ts1 = new DateTime($create); //convert string to date format 
                     @endphp
                     <tr>
                         <th>{{$i++}}</th>
                         <td>{{$row->question}}</td>
                         <td class="text-center">{{$row->question_type}}</td>
                         <td class="text-center">{{$row->name}}</td>
                         <td class="text-center">{{$ts1->format('d-M-Y H:i:s')}}</td>
                         <td class="text-center">{{$row->username}}</td>
                       @if ($row->hr_recruitment_question_type_id==1) Permission check for option type
                         <td class="text-center">
                           <div class="dropdown">
                             <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Action
                             </button>
                             <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">
                             <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_re_detail_question_answer">View Detail</button>
                             <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_question_answer_re">Update Detail</button>
                             <button type="button" id="{{$row->id}}" onclick="hrm_delete('{{$row->id}}','hrm_question/deletedetail','/hrm_question','Question And Answer Has Been Deleted')" class="dropdown-item hrm_item hrm_delete_question_answer_re">Delete</button>
                             @if (is_null($row->delete)||$row->delete == 1) Check answer create already or not 
                             <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item add_answer_re">Add Choice</button>
                             @endif
                             </div>
                             </div>
                         </td>
                       @else
                         <td class="text-center">
                           <div class="dropdown">
                             <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Action
                             </button>
                             <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">
                             <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item update_question">Update</button>
                             <button type="button" id="{{$row->id}}" onclick="hrm_delete('{{$row->id}}','hrm_question/delete','/hrm_question','Question Has Been Deleted')"  class="dropdown-item hrm_item delete_question">Delete</button>
                             </div>
                             </div>
                         </td>
                       @endif 
                     </tr>
                     @endforeach
                   </tbody> --}}
                 </table>
               </div>
               <!-- /.card-body -->
               
             <!-- /.card -->
     </div>
 </div>
    </section>
 <div id='ShowModalQuestionAnswer'></div>
    <script type='text/javascript'>
     $(document).ready(
         function(){
            // getTable('productlist','id');
             $('#question_recruitment').DataTable();
         }
     );
   </script>
 <!-- modal -->
 <form id="question_recruitment_form">
 <div class="modal fade show" id="q_recruitment_modal" tabindex="-1" role="dialog" aria-labelledby="q_recruitment_modal" aria-hidden="true">
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
                          <label for="question">Question Name<span class="text-danger">*</span></label>
                          <textarea class="form-control" id="question_name" name="question_name" cols="3"></textarea>
                          <span class="invalid-feedback" role="alert" id="question_nameError"> {{--span for alert--}}
                            <strong></strong>
                          </span>
                      </div>
                  </div>
                  <div class="col-md-12">
                  <div class="form-group">
                      <label for="question_type">Question Type <span class="text-danger">*</span></label>
                      <select name="question_type" id="question_type" class="form-control">
                        <option value="">Please Select Option</option>
                        <?php
                        foreach($question_type as $row ){ 
                        echo "<option value='$row->id'>$row->name</option>";
                        }
                        ?>
                      </select>
                      <span class="invalid-feedback" role="alert" id="question_typeError"> {{--span for alert--}}
                        <strong></strong>
                      </span>
                  </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="departement">Department<span class="text-danger">*</span></label>
                          <select name="departement" id="departement" class="form-control">
                            <option value="">Please Select Option</option>
                            <?php
                                foreach($dept as $row ){ 
                                echo "<option value='$row->id'>$row->name</option>";
                                }
                            ?>
                          </select>
                          <span class="invalid-feedback" role="alert" id="departementError"> {{--span for alert--}}
                            <strong></strong>
                          </span>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="position">Position<span class="text-danger">*</span></label>
                          <select name="position" id="position" class="form-control">
                            <option value="">Please Select Option</option>
                            <?php
                            foreach($position as $row ){ 
                            echo "<option value='$row->id'>$row->name</option>";
                            }
                            ?>
                          </select>
                          <span class="invalid-feedback" role="alert" id="positionError"> {{--span for alert--}}
                            <strong></strong>
                          </span>
                      </div>
                  </div>
                </div>  
                <div class="row text-right">
                  <div class="col-md-12 text-right">
                     <input type="hidden" name="hr_recruitment_question_id" id="hr_recruitment_question_id"/>
                     <button type="submit" onclick="HrmSubmitQuestion()" name="action_question" id="action_question" class="btn btn-primary">Create</button>
                  </div>  
                </div>
           </div><!-- /.END card-body -->
         </div><!-- /.END card-Default -->
       </div>
     </div>
   </div>
 </form>
   <!-- end modal -->
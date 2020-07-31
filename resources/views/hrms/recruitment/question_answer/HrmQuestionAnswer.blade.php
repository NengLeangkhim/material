 <!-- page content -->
 <section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-question-circle"></i>Question & Answer</strong></h1>
                 <div class="col-md-12 text-right">
                     <button type="button" id="AddNewQuestionRe" onclick="AddNewQuestionRe()" class="btn bg-gradient-primary"><i class="fas fa-plus"></i> Add Question</button>
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
                   @php
                    $i=1;   
                   @endphp
                   <tbody>
                     @foreach ($question as $row)
                     <tr>
                         <th>{{$i++}}</th>
                         <td>{{$row->question}}</td>
                         <td class="text-center">{{$row->question_type}}</td>
                         <td class="text-center">{{$row->name}}</td>
                         <td class="text-center">{{$row->create_date}}</td>
                         <td class="text-center">{{$row->username}}</td>
                       @if ($row->question_type_id==1) {{-- Permission check for option type --}}
                         <td class="text-center">
                           <div class="dropdown">
                             <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Action
                             </button>
                             <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">
                             <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_view_detail_question_answer">View Detail</button>
                             <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item add_answer_sugg">Add Choice</button>
                             <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_question_answer">Update Detail</button>
                             <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_delete_question_answer">Delete</button>
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
                             <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item update_q_sugg">Update</button>
                             <button type="button" id="{{$row->id}}" onclick="hrm_detele('{{$row->id}}','hrm_question_answer_sugg/delete','/hrm_question_answer_sugg','Question Has Been Deleted')"  class="dropdown-item hrm_item delete_q_sugg">Delete</button>
                             </div>
                             </div>
                         </td>
                       @endif
                        
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
 <div id='ShowModalSuggestion'></div>
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
                 <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
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
                     <input type="hidden" name="question_id" id="question_id"/>
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
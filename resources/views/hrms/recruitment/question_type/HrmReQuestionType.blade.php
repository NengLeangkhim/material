 <!-- page content -->
 <section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-question-circle"></i> Question Type</strong></h1>
                 <div class="col-md-12 text-right">
                     <button type="button" id="AddNewQuestionType" onclick="AddNewQuestionType()" class="btn bg-gradient-primary"><i class="fas fa-plus"></i></i> Add Question Type</button>
                 </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="hrm_tbl_type">
                            <thead>                  
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Question Type</th>
                                <th scope="col">Create_Date</th>
                                <th scope="col">Create_By</th>
                                <th width="15%" scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $i=1;
                              $check='';?>
                              @foreach($question_type as $row)
                                @php
                                $create = $row->create_date;
                                $ts1 = new DateTime($create); //convert string to date format 
                                @endphp
                                  <tr>
                                      <td style="color:black;" scope="row">{{$i++}}</td>
                                      <td style="color:black;">{{$row->name}}</td>
                                      <td style="color:black;">{{$ts1->format('d-M-Y H:i:s')}}</td>
                                      <td style="color:black;">{{$row->username}} </td>
                                      <td style="color:black;" class="text-center">
                                        <a href="#" id="{{$row->id}}" title="Update" class="update_qestion_type"><i class="far fa-edit"></i></a>
                                        <a href="#" id="{{$row->id}}" title="Delete" onclick="delete_q_t_recruitment({{$row->id}})" class="delete_qestion_type"><i style="color:red;margin-left:10px;" class="fas fa-trash"></i></a>
                                      </td>
                                  </tr>     
                              @endforeach
                            </tbody>
                          </table>

                    </div>
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
              $('#hrm_tbl_type').DataTable();
 
          }
      );
    </script>
 <!-- modal -->
 <form id="question_type_re_form">
     <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
     <div class="modal fade show" id="q_type_re_modal" tabindex="-1" role="dialog" aria-labelledby="QuestionLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="card card-default">
                 <div class="card-header">
                     <h3 class="card-title hrm-title"><strong><i class="fas fa-question-circle"></i></strong></h3>
                     <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">Add Question Type</h2>
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
                                   <label for="question_type">Question Type<span class="text-danger">*</span></label>
                                   <input type="text" required class="form-control" id="question_type" placeholder="" name="question_type">
                                   <span class="invalid-feedback" role="alert" id="question_typeError"> {{--span for alert--}}
                                    <strong></strong>
                                  </span>
                                </div>
                           </div>
                       </div> 
                       <div class="row text-right">
                         <div class="col-md-12 text-right">
                           <input type="hidden" name="question_type_id" id="question_type_id"/>
                           <button type="submit" onclick="HrmAddQuestionTypeRe()" name="action_question_type" id="action_question_type" class="btn btn-primary">Create</button>
                         </div>
                         
                       </div>
                 </div><!-- /.END card-body -->
               </div><!-- /.END card-Default -->
           </div>
       </div>
     </div>
 </form>
         <!-- end modal -->
 
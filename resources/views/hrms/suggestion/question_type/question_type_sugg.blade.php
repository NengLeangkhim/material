 <!-- page content -->
 <section class="content">
    {{-- <div class="right_col" role="main">
       <div class="contain-fluid">
           <section class="content-header">
               <h2>
                   <a  href="javascript:void(0);"><span><i class="fas fa-question-circle"></i></span> Question Type</a>
                                       / <a href="javascript:void(0);" onclick="AddNewQ_type_sugg()" value="/AddQuestionType" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create New</a>
                           </h2>
           </section>
           <div>
               <div style="width:100%;height:8px;background-color:#3c8dbc;margin-bottom:10px"></div>
                   <div class="table-overflow"> 
                       <div class="table-question_type_sugg" id='tablediv'>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="tbl_type_sugg">
                                    <thead>
                                        <tr>
                                        <th scope="col">No</th>
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
                                                        <td style="color:black;" class="text-center"><a href="#" class="btn btn-info" onClick="EditQuestionType('{{$row->id}}')">Edit</a></td>
                                                        </tr>     
                                    @endforeach
                                    </tbody>
                                </table> 
                                            
                            </div>
                        </div>
                    </div>
           </div>
       </div>
   </div> --}}
   <div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-question-circle"></i>Question Type</strong></h1>
                <div class="col-md-12 text-right">
                    <button type="button" id="Add_Q_Type_Sugg" onclick="AddNewQ_type_sugg()" class="btn bg-gradient-primary"><i class="fas fa-user-plus"></i> Add Question Type</button>
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
                            <td style="color:black;" class="text-center"><a href="#" class="btn btn-info" onClick="EditQuestionType('{{$row->id}}')">Edit</a></td>
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
   <div id="modal_question_type_sugg"></div>
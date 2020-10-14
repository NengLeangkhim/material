@php
    //  foreach($permission as $item){// get group id for permission
    //     $level=$item->ma_group_id;
    //  }
@endphp

 <!-- page content -->
 <section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-book-open"></i> Policies</strong></h1>
                 <div class="col-md-12 text-right">
                     {{-- @if ($level==1 || $level==4 || $level==5)
                     @endif --}}
                     {!!$add_perm!!}
                 </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display nowrap" style="width: 100%" id="hrm_policy_list">
                        <thead>                  
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Policy Name</th>
                                <th scope="col">Create By</th>
                                <th scope="col">Create Date</th>
                                {{-- <th scope="col">Status</th> --}}
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        {{-- @php
                            $i=1;   
                        @endphp
                        
                            @foreach ($policy as $row)
                            @php
                                $create = $row->create_date;
                                $ts1 = new DateTime($create); //convert string to date format
                            @endphp --}}
                            
                                  
                                      {!!$table_perm!!}
                                   
                                {{-- <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">
                                        <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_view_policy">View</button>
                                        @if ($level==1 || $level==4 || $level==5) Permission check for manager
                                        <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_update_policy_list">Update</button>
                                        <button type="button" id="{{$row->id}}" onclick="hrm_delete_data('{{$row->id}}','hrm_list_policy/delete','hrm_list_policy','The Policy has been deleted','HRM_09060103')" class="dropdown-item hrm_item">Delete</button>
                                        @endif
                                    </div>
                                    </div> --}}
                              
                        </table>
                    </div>
               </div>
               <!-- /.card-body -->
               
             <!-- /.card -->
     </div>
 </div>
    </section>
 <div id='ShowModalPolicy'></div>
    <script type='text/javascript'>
     $(document).ready(
         function(){
            // getTable('productlist','id');
             $('#hrm_policy_list').DataTable({
               scrollX: true
             });
         }
     );
   </script>
 <!-- modal -->
 <form id="hrm_policy_form" enctype="multipart/form-data">
 <div class="modal fade show" id="hrm_policy_modal" tabindex="-1" role="dialog" aria-labelledby="QuestionLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="card card-default">
           <div class="card-header">
               <h3 class="card-title hrm-title"><strong><i class="fas fa-book-open"></i></strong></h3>
               <h2 class="card-title hrm-title" id="card_title">Add Policy</h2>
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
                            <label for="policy_name">Name Policy<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="policy_name" aria-describedby="policy_name" placeholder="" name="policy_name">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="custom-file">
                                {{-- <label for="policy_file">File PDF only<span class="text-danger">*</span></label> --}}
                                <input type="file" class="custom-file-input" onchange="hrm_get_name_file('policy_file','policy_file_name')" name="policy_file" id="policy_file" accept="application/pdf">
                                <label class="custom-file-label" id="policy_file_name" for="policy_file">Choose file</label>
                                <input type="hidden" id="hidden_pdf" name="hidden_pdf" value="" />  {{--for update--}}
                            </div>
                        </div>
                    </div>
                 </div> {{-- END ROW--}}
                 <div class="row text-right">
                   <div class="col-md-12 text-right">
                     <input type="hidden" name="policy_id" id="policy_id"/>
                     <input type="hidden" name="operation" id="operation" value="Create"/>
                     <button type="submit" onclick='HrmSubmitPolicy()' name="action_policy" id="action_policy" class="btn btn-primary">Create</button>
                   </div>
                 </div>
           </div><!-- /.END card-body -->
         </div><!-- /.END card-Default -->
       </div>
     </div>
   </div>
 </form>
   <!-- end modal -->
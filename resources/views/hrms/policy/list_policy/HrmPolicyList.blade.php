@php
     foreach($permission as $item){// get group id for permission
        $level=$item->group_id;
     }
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
                     @if ($level==1 || $level==4 || $level==5)
                     <button type="button" id="HrmAddPolicy" onclick="HrmAddPolicy()" class="btn bg-gradient-primary"><i class="fas fa-plus"></i> Add Policy</button>
                     @endif
                 </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="hrm_policy_list">
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
                        @php
                            $i=1;   
                        @endphp
                        <tbody>
                            @foreach ($policy as $row)
                            @php
                                $create = $row->create_date;
                                $ts1 = new DateTime($create); //convert string to date format
                            @endphp
                            <tr>
                                <th>{{$i++}}</th>
                                <td>{{$row->name}}</td>
                                <td>{{$row->username}}</td>
                                <td>{{$ts1->format('d-M-Y H:i:s A')}}</td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">
                                        <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_view_policy">View</button>
                                        @if ($level==1 || $level==4 || $level==5) {{-- Permission check for manager --}}
                                        <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_update_policy_list">Update</button>
                                        <button type="button" id="{{$row->id}}" onclick="hrm_delete('{{$row->id}}','hrm_list_policy/delete','hrm_list_policy','The Policy has been deleted')" class="dropdown-item hrm_item">Delete</button>
                                        @endif
                                    </div>
                                    </div>
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
 <div id='ShowModalPolicy'></div>
    <script type='text/javascript'>
     $(document).ready(
         function(){
            // getTable('productlist','id');
             $('#hrm_policy_list').DataTable();
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
               <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">Add Policy</h2>
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
                            <label for="policy_name">Name Policy<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="policy_name" aria-describedby="policy_name" placeholder="" name="policy_name">
                            <span class="invalid-feedback" role="alert" id="policy_nameError"> {{--span for alert--}}
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{-- <label for="policy_file">File PDF only<span class="text-danger">*</span></label>
                            <input type="file" class="form-control"  name="policy_file" id="policy_file" accept="application/pdf"> --}}
                            <div class="custom-file">
                                <label for="policy_file">File PDF only<span class="text-danger">*</span></label>
                                <input type="file" class="form-control-file"  name="policy_file" id="policy_file" accept="application/pdf">
                                <span class="invalid-feedback" role="alert" id="policy_fileError"> {{--span for alert--}}
                                    <strong></strong>
                                </span>
                            </div>
                            <span id="upload_pdf">
                                <input type="hidden" id="hidden_pdf" name="hidden_pdf" value="" />  {{--for update--}}
                            </span>
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
 <!-- page content -->
 <section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-star-half-alt"></i> Performance Score</strong></h1>
                 <div class="col-md-12 text-right">
                     <button type="button" id="HrmAddPerformScore" onclick="HrmAddPerformScore()" class="btn bg-gradient-primary"><i class="fas fa-plus"></i> Add Score</button>
                 </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                    <div class="table-responsive" id="table_show_plan" style="padding-top:10px;">
                        <table class="table table-bordered" id="tbl_performance_score">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Value</th>
                                    <th scope="col">Create_Date</th>
                                    <th scope="col">Create_By</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                                @php
                                $i=1;   
                                @endphp
                            <tbody>
                                @foreach ($perform_score as $row)
                                @php
                                $create = $row->create_date;
                                $ts1 = new DateTime($create); //convert string to date format
                                @endphp
                                <tr>
                                    <th>{{$i++}}</th>
                                    <td>{{$row->name}}</td>
                                    <td>{{intval($row->value).'%'}}</td>
                                    <td>{{$ts1->format('d-M-Y H:i:s')}}</td>
                                    <td>{{$row->username}}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">              
                                                <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_update_perform_score">Update</button>
                                                <button type="button" id="{{$row->id}}" onclick="hrm_delete({{$row->id}},'hrm_performance_score/delete','hrm_performance_score','The Score has been deleted')" class="dropdown-item hrm_item hrm_delete_perform_score">Delete</button>
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
 <script>
    $(document).ready(function(){
           $('#tbl_performance_score').DataTable();
       }); 
   </script>
 <!-- modal -->
 <form id="hrm_perform_score_form">
 <div class="modal fade show" id="hrm_perform_score_modal" tabindex="-1" role="dialog" aria-labelledby="hrm_perform_score_modal" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="card card-default">
           <div class="card-header">
               <h3 class="card-title hrm-title"><strong><i class="fas fa-plus"></i></strong></h3>
               <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">Add Score</h2>
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
                            <label for="score_name">Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="score_name" aria-describedby="score_name" placeholder="" name="score_name">
                            <span class="invalid-feedback" role="alert" id="score_nameError"> {{--span for alert--}}
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="score_value">Value<span class="text-danger">*</span></label>
                            <input type="number" min="0" step="1" class="form-control" id="score_value" aria-describedby="score_value" name="score_value">
                            <span class="invalid-feedback" role="alert" id="score_valueError"> {{--span for alert--}}
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                </div> 
                <div class="row text-right">
                   <div class="col-md-12 text-right">
                        <input type="hidden" name="performance_score_id" id="performance_score_id"/>
                        <button type="submit" onclick='HrmSubmitPerformScore()' name="action_performance_score" id="action_performance_score"  class="btn btn-primary">Create</button>
                   </div>
                </div>
           </div><!-- /.END card-body -->
         </div><!-- /.END card-Default -->
       </div>
     </div>
   </div>
 </form>
   <!-- end modal -->
 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-code-branch"></i> Leads Branch</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">View Leads Branch</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- section Main content -->
<section class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);" onclick="CrmLeadBranchView('/crm/leadbranch/all','Lead_Branch_Tbl')" data-toggle="tab">All</a></li>
                                    @foreach ($status->data as $item)
                                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);" onclick="CrmLeadBranchView('/crm/leadbranch/{{$item->name_en}}','Lead_Branch_Tbl')" data-toggle="tab">{{$item->name_en}}</a></li>
                                    @endforeach
                                    {{-- <li class="nav-item"><a class="nav-link active" href="javascript:void(0);" onclick="CrmSettingView('/crm/leadbranch/all','All_type_Tbl')" data-toggle="tab">All</a></li>
                                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);" onclick="CrmSettingView('/crm/leadbranch/new','New_status_Tbl')" data-toggle="tab">New</a></li>
                                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);" onclick="CrmSettingView('/crm/leadbranch/surveying','Surveying_status_Tbl')" data-toggle="tab">Surveying</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#javascript:void(0);" onclick="CrmSettingView('/crm/leadbranch/surveyed','Surveyed_status_Tbl')" data-toggle="tab">Surveyed</a></li>
                                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);" onclick="CrmSettingView('/crm/leadbranch/proposition','Proposition_status_Tbl')" data-toggle="tab">Proposition</a></li>
                                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);" onclick="CrmSettingView('/crm/leadbranch/qualified','Qualified_status_Tbl')" data-toggle="tab">Qualified</a></li>
                                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);" onclick="CrmSettingView('/crm/leadbranch/junk','Junk_Status_Tbl')" data-toggle="tab">Junk</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <!--show contact like table -->
                            <div class="tab-Setting">
                                <div class="row" id="CrmTabManageSetting">

                                </div>
                            </div>
                            <!-- /.tab-pane -->
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     {{-- detail schedule --}}
     <div id="view_schedule"></div>  
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Schedule Of Branch</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="frm_Crmbranchschdeule" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="text"  id="branchID" name="branch_id" hidden>
                             <div class="form-group">
                                 <div class="row">
                                     <div class="col-md-6">
                                         <label for="exampleInputEmail1">Subject Name ENG</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                             </div>
                                             <input type="text" class="form-control" id="name_en"  name="name_en"   placeholder=""  >
                                             <span class="invalid-feedback" role="alert" id="name_enError"> 
                                                <strong></strong>
                                            </span>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <label for="exampleInputEmail1">Subject Name KH</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                             </div>
                                             <input type="text" class="form-control" id="name_kh"  name="name_kh"   placeholder=""  >
                                             <span class="invalid-feedback" role="alert" id="name_khError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                         </div>
                                     </div>                                                
                                 </div>
                             </div>
                             <div class="form-group">
                                 <div class="row">
                                     <div class="col-md-6">
                                         <label for="exampleInputEmail1">To Do Date</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                             </div>
                                             <input type="date" class="form-control" id="to_do_date"  name="to_do_date"   placeholder=""  >
                                             <span class="invalid-feedback" role="alert" id="to_do_dateError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                            
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <label for="exampleInputEmail1">Priority</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fas fa-tachometer-alt"></i></span>
                                             </div>
                                             <select class="form-control " name="priority" id="priority" >
                                                 <option value=''>-- Select  Prioroty --</option>  
                                                 <option value="urgent">Urgent</option>
                                                 <option value="high">Hight</option>
                                                 <option value="medium">Medium</option>
                                                 <option value="low">Low</option>
                                               
                                             </select>
                                             <span class="invalid-feedback" role="alert" id="priorityError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                         </div>
                                     </div>                                                
                                 </div>
                             </div>
                             <div class="form-group">
                                 <div class="row">
                                     <div class="col-md-6">
                                         <label for="exampleInputEmail1">Schedule Type</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                             </div>
                                             <select class="form-control" name="schedule_type_id" id="schedule_type_id" >
                                                 <?php 
                                                 for($i =0;$i<sizeof($schedule_type);$i++){
                                                     ?>
                                                        <option value="{{$schedule_type[$i]["id"]}}" > {{$schedule_type[$i]["name_en"]}} /  {{$schedule_type[$i]["name_kh"]}} </option> 
                                                     <?php
                                                 }
                                                 ?>
                                                
                                             </select>
                                             <span class="invalid-feedback" role="alert" id="schedule_type_idError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <label for="exampleInputEmail1">Comment</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="far fa-comments"></i></span>
                                             </div>
                                             <input type="text" class="form-control" id="comment"  name="comment"   placeholder="" required >                                                         
                                             <span class="invalid-feedback" role="alert" id="commentError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                         </div>
                                     </div>                                                
                                 </div>
                             </div>
                         
                 </div>
                     <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     {{-- <button type="button" class="btn btn-primary" onclick="CrmSubmitFormFull('frm_Crmbranchschdeule','/insertschedule','/lead','Insert  Schedule Successfully')">Create</button> --}}
                     <button type="button" class="btn btn-primary" id="save" onclick="CrmSubmitModalAction('frm_Crmbranchschdeule','save','/insertschedule','POST','modal-default','Insert  Schedule Successfully','/leadbranch')">Create</button>
                 </div>
                </form>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</section><!-- end section Main content -->

<script type="text/javascript">
    CrmLeadBranchView('/crm/leadbranch/all','Lead_Branch_Tbl');
    // get modal add schedule 
    function lead_branch_schedule(id){
        $("#modal-default").modal('show'); //Set modal show
        $('#branchID').val(id);
    }
    function branch_schedule_detail(id){
        $.ajax({
                url:"detailschedule",   //Request send to "action.php page"
                type:"GET",    //Using of Post method for send data
                data:{id:id},//Send data to server
                success:function(data){
                    // alert(data);
                    $('#view_schedule').html(data);
                    $('#crm_view_perform_schedule').modal('show');//It will display modal on webpage   
                }
        });
    }
</script>

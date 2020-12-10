
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><i class="fas fa-code-branch"></i> Branchs </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('/lead')">Lead</a></li>
                            <li class="breadcrumb-item active">View Branch By Lead</li>
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
                                {{-- <div class="card-header">
                                    <div class="col-12">
                                        <div class="row"> --}}
                                            <!-- <a  href="#" class="btn btn-block btn-success lead" value="addlead" onclick="addlead()"><i class="fas fa-wrench"></i> Add Lead</a>  -->
                                            {{-- <a  href="#" class="btn btn-success lead" ​value="addlead" id="lead"><i class="fas fa-plus"></i> Add Lead</a>  --}}
                                        {{-- </div>
                                    </div>
                                </div> --}}
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="background: #1fa8e0">
                                                {{-- <th>Lead Number</th> --}}
                                                <th style="color:#FFFFFF">Company Name EN</th>
                                                <th  style="color:#FFFFFF">Company Name KH</th>
                                                {{-- <th  style="color:#FFFFFF">Email</th>
                                                <th  style="color:#FFFFFF">Website </th> --}}
                                                {{-- <th  style="color:#FFFFFF">Facebook </th> --}}
                                                <th  style="color:#FFFFFF">Schedule</th>
                                                <th  style="color:#FFFFFF">Lead status</th>
                                                <th  style="color:#FFFFFF">Assigned To</th>
                                                <th  style="color:#FFFFFF">Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for($i =0;$i<sizeof($branch);$i++){
                                                if($branch[$i]["survey_comment"]!=null){
                                                    ?>
                                                        <tr style="">
                                                            <td style="color: #d42931 ; font-weight:bold">
                                                                {{$branch[$i]["company_en"]}}
                                                            </td>
                                                            <td style="color: #d42931 ; font-weight:bold">{{$branch[$i]["company_kh"]}}</td>
                                                            {{-- <td style="color: #d42931 ; font-weight:bold">{{$branch[$i]["primary_email"]}}</td>
                                                            <td style="color: #d42931 ; font-weight:bold">{{$branch[$i]["primary_website"]}}</td> --}}
                                                            {{-- <td style="color: #d42931 ; font-weight:bold">{{$branch[$i]["facebook"]}}</td> --}}
                                                            <td style="color: #d42931 ; font-weight:bold;text-align: center">
                                                                <?php
                                                                if($branch[$i]["schedule_id"]!=null){
                                                                    ?>
                                                                    <label for="">Yes</label>
                                                                    <?php
                                                                }
                                                                else {
                                                                    ?>
                                                                       <label for="">No</label>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td style="color: #d42931 ; font-weight:bold">{{$branch[$i]["lead_status"]}}</td>
                                                            <td style="color: #d42931 ; font-weight:bold">{{$branch[$i]['assig']}}</td>
                                                            <td style="color: #d42931 ; font-weight:bold">
                                                                <div class="row-12 form-inline">
                                                                    <div class="col-md-6">
                                                                        <a href="#" class="btn btn-block btn-info btn-sm branchdetail" ​value="detailbranch/{{$branch[$i]["branch_id"]}}"  onclick="go_to('detailbranch/{{$branch[$i]['branch_id']}}')" title="Detail Branch">
                                                                            <i class="far fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-md-6 ">
                                                                        <?php
                                                                           if($branch[$i]["schedule_id"]!=null){
                                                                                ?>
                                                                                    <button href="javascript:void(0);" class="btn btn-block btn-danger btn-sm detailschedule"  id="detailschedule{{$branch[$i]["schedule_id"]}}" value="{{$branch[$i]["schedule_id"]}}"  title="Detail Schedule Of Branch">
                                                                                        <i class="fas fa-calendar-day"> </i>
                                                                                    </button>
                                                                                <?php
                                                                           }else {
                                                                              ?>
                                                                                <button href="javascript:void(0);" class="btn btn-block btn-danger btn-sm schedule"  id="schedule{{$branch[$i]["branch_id"]}}" data-toggle="modal" data-target="#modal-default" value="{{$branch[$i]["branch_id"]}}"  title="Set Schedule Of Branch">
                                                                                    <i class="fas fa-calendar-day"> </i>
                                                                                </button>
                                                                              <?php
                                                                           }
                                                                        ?>
                                                                    </div>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                    <?php
                                                }else {
                                                    ?>
                                                        <tr>
                                                            <td>{{$branch[$i]["company_en"]}}
                                                            </td>
                                                            <td>{{$branch[$i]["company_kh"]}}</td>
                                                            {{-- <td>{{$branch[$i]["primary_email"]}}</td>
                                                            <td>{{$branch[$i]["primary_website"]}}</td> --}}
                                                            {{-- <td>{{$branch[$i]["facebook"]}}</td> --}}
                                                            <td style="text-align: center">
                                                                <?php
                                                                if($branch[$i]["schedule_id"]!=null){
                                                                    ?>
                                                                        <label for="">Yes</label>
                                                                    <?php
                                                                }
                                                                else {
                                                                    ?>
                                                                        <label for="">No</label>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>{{$branch[$i]["lead_status"]}}</td>
                                                            <td>{{$branch[$i]['assig']}}</td>
                                                            <td>
                                                                <div class="row-12 form-inline">
                                                                    <div class="col-md-6">
                                                                        <a href="#" class="btn btn-block btn-info btn-sm branchdetail" ​value="detailbranch/{{$branch[$i]["branch_id"]}}"  onclick="go_to('detailbranch/{{$branch[$i]['branch_id']}}')" title="Detail Branch">
                                                                            <i class="far fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-md-6 ">
                                                                        <?php
                                                                           if($branch[$i]["schedule_id"]!=null){
                                                                                ?>
                                                                                    <button href="javascript:void(0);" class="btn btn-block btn-danger btn-sm detailschedule"  id="detailschedule{{$branch[$i]["schedule_id"]}}"  value="{{$branch[$i]["schedule_id"]}}"  title="Detail Schedule Of Branch">
                                                                                        <i class="fas fa-calendar-day"> </i>
                                                                                    </button>
                                                                                <?php
                                                                           }else {
                                                                              ?>
                                                                                <button href="javascript:void(0);" class="btn btn-block btn-danger btn-sm schedule"  id="schedule{{$branch[$i]["branch_id"]}}" data-toggle="modal" data-target="#modal-default" value="{{$branch[$i]["branch_id"]}}"  title="Set Schedule Of Branch">
                                                                                    <i class="fas fa-calendar-day"> </i>
                                                                                </button>
                                                                              <?php
                                                                           }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- detail schedule --}}
                <div id="view_schedule"></div>
                {{-- Model alert --}}
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
                                 <button type="button" class="btn btn-primary" id="save" onclick="CrmSubmitModalAction('frm_Crmbranchschdeule','save','/insertschedule','POST','modal-default','Insert  Schedule Successfully','/schedule')">Create</button>
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

            $(function () {
                $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                });
                $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                });
            });
            // get modal add schedule
            $('.schedule').each(function(){
                  var id =  $(this).attr("value");

                $('#schedule'+id).click(function(){
                    var id =  $(this).attr("value");
                        // alert(id);
                        $('#branchID').val(id);
                })
            })
            // Detail modal add schedule
            $('.detailschedule').each(function(){
                  var id =  $(this).attr("value");

                $('#detailschedule'+id).click(function(){
                    var id =  $(this).attr("value");
                        $.ajax({
                            url:"detailschedule",   //Request send to "action.php page"
                            type:"GET",    //Using of Post method for send data
                            data:{id:id},//Send data to server
                            success:function(data){
                            // alert(data);
                                $('#view_schedule').html(data);
                                $('#crm_view_perform_schedule').modal('show');   //It will display modal on webpage
                            }
                        });
                                    // $('#branchID').val(id);
                    })
            })
            </script>

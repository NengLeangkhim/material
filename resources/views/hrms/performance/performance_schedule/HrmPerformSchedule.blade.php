<style>
    .fc-prev-button:hover,.fc-next-button:hover,.fc-today-button:hover,.fc-month-button:hover,.fc-agendaWeek-button:hover,.fc-agendaDay-button:hover,.fc-listWeek-button:hover{
    background-color: #1fa8e0;
    background-image: none;
    }
    .fc-day-header{
        background-color:#d42931;
    }
    .fc td{
        background-color:#e6ffff;
    }
    .fc-content{
        background-color: #1fa8e0;
    }

</style>
 <!-- page content -->
 <section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="far fa-calendar-alt"></i> Performance Schedule</strong></h1>
                 <div class="col-md-12 text-right">  
                    {{-- <button type="button" id="HrmAddSchedule" onclick="HrmAddSchedule()" class="btn bg-gradient-primary"><i class="fas fa-plus"></i></i> Add Schedule</button> --}}
                    {!!$add_perm!!}
                 </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                    <div id='hrm_calendar_schedule'>

                    </div>
                    <div class="table-responsive" style="margin-top: 15px">
                        <table class="table table-bordered" id="tbl_schedule_staff">
                            <thead>                  
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Staff Name</th>
                                <th scope="col">Plan Name</th>
                                <th scope="col">Date From-To</th>
                                <th scope="col">Create Date</th>
                                <th scope="col">Create By</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            {!!$table_perm!!}
                            {{-- <tbody>
                              <?php 
                             // $i=1;
                              ?>
                              @foreach($schedule as $row)
                                @php
                                    $create = $row->create_date;
                                    $ts1 = new DateTime($create);
                                @endphp 
                                  <tr>
                                      <td style="color:black;" scope="row">{{$i++}}</td>
                                      <td style="color:black;">{{$row->name_staff}}</td>
                                      <td style="color:black;">{{$row->name_plan}} </td>
                                      <td style="color:black;">{{$row->date_from.' '.'to'.' '.$row->date_to}}</td>
                                      <td style="color:black;">{{$ts1->format('Y-m-d H:i:s')}} </td>
                                      <td style="color:black;">{{$row->username}}</td>
                                      <td style="color:black;" class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">
                                                <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_view_perform_schedule">View</button>   
                                                @if ($level==4 || $level==5 || $level==1)check permission manager
                                                    <button type="button" id="{{$row->id}}" onclick="hrm_update_perform_schedule({{$row->id}},{{$row->hr_performance_plan_id}})" class="dropdown-item hrm_item hrm_update_perform_schedule">Update</button>  
                                                @endif           
                                                @if ($row->ma_user_id == $id_user) can add follow up only by ur schedule
                                                    @if (is_null($row->deleted) || $row->deleted=='t')check condition if the schedule already manager follow up so the users can't follow up anymore
                                                    <button type="button" id="{{$row->id}}" onclick="go_to('/hrm_performance_follow_up/modal/action?add={{$row->id}}')" class="dropdown-item hrm_item hrm_add_perform_follow_up">Add Follow Up</button>
                                                    @endif
                                                @endif  
                                            </div>
                                        </div>
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
    <div id="modal_for_view_schedule"></div>
    <!-- /page content -->
    <script type='text/javascript'>
      $(document).ready(function(){
        $('#tbl_schedule_staff').DataTable();
        //function get full calendar
        $('#hrm_calendar_schedule').fullCalendar({
                header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            defaultDate: moment().format("YYYY-MM-DD"),
            navLinks: true,
            eventLimit: true,
            themeSystem: 'bootstrap',
            hour12:false,
            color:'red',
            events: 'hrm_performance_staff_schedule/calendar',// get json data from controller
            eventClick: function(events) {
                var id = events.id;
                $.ajax({
                url:"hrm_performance_staff_schedule/modal",   //Request send to "action.php page"
                type:"GET",    //Using of Post method for send data
                data:{id:id},//Send data to server
                success:function(data){
                    $('#modal_for_view_schedule').html(data);
                    $('#hrm_view_perform_schedule_modal').modal('show');   //It will display modal on webpage   
                }
                });
            },  
            selectable:true,
            selectHelper:true,
        });
      });
    </script>
    
 <!-- modal -->
 <form id="hrm_perform_schedule_form">
     <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
     <div class="modal fade show" id="hrm_perform_schedule_modal" tabindex="-1" role="dialog" aria-labelledby="QuestionLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
               <div class="card card-default">
                 <div class="card-header">
                     <h3 class="card-title hrm-title"><strong><i class="far fa-calendar-plus"></i></strong></h3>
                      <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title"> Add Schedule</h2>
                     <div class="card-tools">
                       <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                       <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
                     </div>
                 </div><!-- /.card-header -->
                 <div class="card-body" style="display: block;">
                        <div class="alert alert-danger print-error-msg" style="display:none"> {{-- div for show error --}}
                            <ul></ul>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Performance Plan</h5>
                                    <hr style="border: 1px solid">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="plan_name">Plan Name<span class="text-danger">*</span></label>
                                        <select name="plan_schedule" required id="plan_schedule" class="form-control plan_schedule">
                                            <option value="">Please Select Plan</option>
                                            <?php 
                                                    foreach($plan as $row_plan ){ 
                                                    echo "<option  onclick='get_plan_schedule(".$row_plan->id.")' value=".$row_plan->id.">$row_plan->name</option>";
                                                    }
                                            ?>  
                                        </select>
                                        <span class="invalid-feedback" role="alert" id="plan_scheduleError"> {{--span for alert--}}
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="plan_from_schedule">Date From<span class="text-danger"></span></label>
                                        <input type="text" disabled id="plan_from_schedule" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="plan_to_schedule">Date To<span class="text-danger"></span></label>
                                        <input type="text" disabled id="plan_to_schedule" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                 <hr>
                                </div>    
                            </div><!-- End Row -->
                            <div class="row" id="schedule_plan_detail">
                               <!-- Get from view_combobox_plan_detail.php -->
                            </div><!-- End schedule_plan_detail -->
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Performance Schedule</h5>
                                    <hr style="border: 1px solid">
                                </div>
                                <div class="col-md-12">
                                    <label for="staff_schedule">Staff Name<span class="text-danger">*</span></label>
                                    <select name="staff_schedule" required id="staff_schedule" class="form-control">
                                        <option value="">Please Select Staff</option>
                                        <?php 
                                                foreach($staff as $row_staff ){ 
                                                    $get_full_en_name = $row_staff->first_name_en." ".$row_staff->last_name_en;  
                                                    echo "<option value='$row_staff->id'>$get_full_en_name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$row_staff->id_number</option>";
                                                }
                                        ?>  
                                    </select>
                                    <span class="invalid-feedback" role="alert" id="staff_scheduleError"> {{--span for alert--}}
                                        <strong></strong>
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="staff_from_schedule">Date From<span class="text-danger">*</span></label>
                                        <input type="text" name="staff_from_schedule" required id="staff_from_schedule" class="form-control">
                                        <span class="invalid-feedback" role="alert" id="staff_from_scheduleError"> {{--span for alert--}}
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="staff_to_schedule">Date To<span class="text-danger">*</span></label>
                                        <input type="text" name="staff_to_schedule" required id="staff_to_schedule" class="form-control">
                                        <span class="invalid-feedback" role="alert" id="staff_to_scheduleError"> {{--span for alert--}}
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="staff_comment_schedule">Comment<span class="text-danger"></span></label>
                                        <textarea name="staff_comment_schedule" class="form-control" id="staff_comment_schedule" cols="3"></textarea>
                                    </div>
                                </div>
                            </div><!-- End Row -->
                        </div><!-- End container-fluid -->
                        <div class="row text-right">
                            <div class="col-md-12 text-right">
                            <input type="hidden" name="schedule_plan_id" id="schedule_plan_id"/>
                            <button type="submit" onclick="HrmSubmitPerformSchedule()"name="action_schedule_staff" id="action_schedule_staff" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                 </div><!-- /.END card-body -->
               </div><!-- /.END card-Default -->
           </div>
       </div>
     </div>
 </form>
         <!-- end modal -->
<script>
    $(function () {// set select date time
        $('#staff_from_schedule').datetimepicker({
            format: 'YYYY-MM-D HH:mm',
            sideBySide: true,
        });
        $('#staff_to_schedule').datetimepicker({
            format: 'YYYY-MM-D HH:mm',
            sideBySide: true,
        });
    });
        </script>
 
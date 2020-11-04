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
                    {{-- <div id='hrm_calendar_schedule'>

                    </div> --}}
                    <div class="table-responsive" style="/* margin-top: 15px */">
                        <table class="table table-bordered display nowrap" style="width: 100%" id="tbl_schedule_staff">
                            <thead>                  
                              <tr>
                                {{-- <th scope="col">#</th>
                                <th scope="col">Staff Name</th>
                                <th scope="col">Plan Name</th>
                                <th scope="col">Date From-To</th>
                                <th scope="col">Create Date</th>
                                <th scope="col">Create By</th>
                                <th scope="col">Action</th> --}}
                                <th scope="col">#</th>
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
        $('#tbl_schedule_staff').DataTable({
            // "scrollX": true
            responsive:true,
        });
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
 
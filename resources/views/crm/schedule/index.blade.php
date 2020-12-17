


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calendar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Calendar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                  <!-- the events -->
                  <div id="external-events">

                  </div>
                  <input type="text" hidden value="{{$_SESSION['token']}}" id="gettoken">
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-lg-12">
                <div class="pt-3 pb-3" style="width: 17%; height: auto;">
                    <button href="javascript:void(0);" class="btn btn-block btn-success btn-sm newschedule"  id="newSchedule" data-toggle="modal" data-target="#modal-default" value="createNewSchedule">
                        <i class="fas fa-plus"></i> Create New Schedule
                    </button>
                </div>
          </div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <div id="view_schedule"></div>
    {{-- Model alert --}}
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New Schedule</h4>
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Select Lead</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                            </div>
                                            <select name="lead" id="sl-lead" class="form-control">
                                                <option value="0">Please Select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
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
                                            <option value="0">Please Select</option>
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
                </div>
                <!-- /.modal-body -->
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    // var d    = 4,
    //     m    = 11,
    //     y    = 2020,
    //     text= 'Meeting call'

    // var f=


    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        console.log(eventEl);
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    GetData();
    function GenerateCalander(events) {
    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      'themeSystem': 'bootstrap',
      events: events ,
      editable  : false,
      eventClick: function (data) {
          // alert(data.event.id);
          var id = data.event.id;
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




      },
    });

    calendar.render();
  }

    function GetData() {
      var myvar= $( "#gettoken" ).val();
    // alert(myvar);
        var events = [];
        $.ajax({
            url: 'api/getschedule',
            type: "GET",
            dataType: "JSON",
            headers: {
                    'Authorization': `Bearer ${myvar}`,
                },
            success: function (result) {
                $.each(result, function (i, data) {
                  for(var i=0;i<data.length;i++){
                    if(data[i].priority=='urgent'){
                        color='#c23616';
                    }
                    else if(data[i].priority=='high'){
                      color='#fa8231'
                    }
                    else if(data[i].priority=='medium'){
                      color='#1e3799';

                    }
                    else
                    {
                      color="#fff200";
                    }
                    //  branch that schedule result
                    if(data[i].schedule_result_id!=null){
                      color='#4cd137';
                    }
                    events.push(
                   {
                       title: data[i].name_branch_en,
                       description: data[i].name_en,
                       start: moment(data[i].to_do_date).format('YYYY-MM-DD HH:mm:ss'),
                      //  end: moment(data.End_Date).format('YYYY-MM-DD HH:mm:ss'),
                       backgroundColor: color, //Success (green)
                       borderColor: color, //Success (green)
                       id:data[i].schedule_id,
                      //  url: "/lead",
                       allDay: false,
                   });
                  }

                });
                GenerateCalander(events);
            }
        })

    }
})

$('#newSchedule').click(function() {
    var ld = $(this).attr("​value");
    go_to(ld);
})
</script>


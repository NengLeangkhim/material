


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
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
             
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary">
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
    var calendar = new Calendar(calendarEl, {
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
        var events = [];  
        $.ajax({  
            url: 'api/getschedule',  
            type: "GET",  
            dataType: "JSON",  
            success: function (result) {               
                $.each(result, function (i, data) { 
                  for(var i=0;i<data.length;i++){     
                    if(data[i].priority=='urgent'){
                        color='#e84118';
                    }    
                    else if(data[i].priority=='high'){
                      color='#b71540';
                    }    
                    else if(data[i].priority=='medium'){
                      color='#4cd137';
                    } 
                    else
                    {
                      color="#e1b12c";
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
</script>


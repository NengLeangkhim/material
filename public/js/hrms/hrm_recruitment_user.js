



//================================= SOK KIM part===============================

//-----------hr recruitment user------





// function onclick user start quiz

function go_to(route){
    $.ajax({
        type: 'GET',
        url:route,
        success:function(data){

            $(".content-wrapper").show();
            $(".content-wrapper").html(data);

        },
        error:function(){
          $(".content-wrapper").html(jerror());
        }
    });

}



// function show form in modal id
function modal_action(){
    var url = 'hrm_recruitment_user_profile';
    var x=new XMLHttpRequest();
    x.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById('modal').innerHTML=this.responseText;
            $('#user_profile').modal('show');
        }
    }
    x.open("GET", url, true);
    x.send();

}




// function for alert by sweetalert2
function show_alert(){
  Swal.fire({
    title: '<strong>Your Profile</strong>',
    // icon: 'info',
    html:
      'You can use <b>bold text</b>, ' +
      '<a href="//sweetalert2.github.io">links</a> ' +
      'and other HTML tags',
    showCloseButton: true,
    showCancelButton: true,
    focusConfirm: false,
    confirmButtonText:
      '<i class="fa fa-thumbs-up"></i> Great!',
    confirmButtonAriaLabel: 'Thumbs up, great!',
    cancelButtonText:
      '<i class="fa fa-thumbs-down"></i>',
    cancelButtonAriaLabel: 'Thumbs down'
  })

}











// function auto submit for user quiz

function autoSubmit() {

    // var auto = setTimeout(function(){ autoRefresh(); }, 100);
    function alert15min(){
        $.notify(
            "Your answer will be auto submit in 15 minutes more !",
            { position:"top center" }
        );
    }
    function alert10min(){
        $.notify(
            "Your answer will be auto submit in 10 minutes more !",
            { position:"top center" }
        );
    }
    function alert5min(){
        $.notify(
            "Your answer will be auto submit in 5 minutes more !",
            { position:"top center" }
        );
    }

    setTimeout(function(){ alert15min(); }, (1000 * 60 * 45));
    setTimeout(function(){ alert10min(); }, (1000 * 60 * 50));
    setTimeout(function(){ alert5min(); }, (1000 * 60 * 55));

    function submitform(){
        document.getElementById("myFormQuestion").submit();
    }

    // set time out 1 hour to submit form
    setTimeout(function(){ submitform(); }, (1000 * 60 * 60));


}






  // function user click start quiz & auto submit answer
  var num_click = 0;
  function user_start_quiz(route){

    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var today = new Date();
    var dd = today.getDate();
    var mm = months[today.getMonth()];
    var yyyy = today.getFullYear();
    var n = today.toLocaleString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    var myTime = dd + '-' + mm +'-'+ yyyy + '/' + n;

        $.ajax({
            type: 'GET',
            url:route,
            success:function(data){
                var myobj = document.getElementById("countdown");
                if(myobj != null){
                    myobj.remove();
                    console.log(myobj);
                }


                clearTimer(num_click);
                num_click+=1;
                countDownTime(60,'showTimer'+num_click+'');
                setTimeout(function(){  autoSubmit(); }, (15000));

                if(data == 'user_expire'){
                    Swal.fire('This user has already taken the quiz!!');
                }else{
                    $(".content-wrapper").show();
                    $(".content-wrapper").html(data);
                    document.getElementById("starttime_quiz").innerHTML = myTime;
                }

            },
            error:function(){
                Swal.fire('មិនទាន់មានសំនួរ សម្រាប់មុខដំណែងការងារនេះ !')
            },
        });

  }

    function clearTimer(i){
        $(document).ready(function(){
            $("h6 #showTimer"+i+"").remove();
            $("div .countdown").append("<h6 id='showTimer"+(i+1)+"'></h6>");
        });
    }


    function countDownTime(numberCount,showId){
            // console.log('id_coudnto=='+showId);
            var d = new Date();
            // var f = new Date(d.getTime());
            d.setMinutes(d.getMinutes() + numberCount); //as minutes
            // Set the date we're counting down to
            var countDownDate = new Date(d).getTime();
            // Update the count down every 1 second
            var x = setInterval(function() {
                // Get today's date and time
                var now = new Date().getTime();
                // Find the distance between now and the count down date
                var distance = countDownDate - now;
                // Time calculations for days, hours, minutes and seconds
                // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (86400000)) / (3600000));
                var minutes = Math.floor((distance % (3600000)) / (60000));
                var seconds = Math.floor((distance % (60000)) / 1000);
                // Output the result in an element with id="demo"
                var time  = hours + "h " + minutes + "m " + seconds + "s ";
                console.log(time);
                document.getElementById(showId).innerHTML = time;
                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById(showId).innerHTML = "EXPIRED";
                }
            }, 1000);
    }





  //declear global variable
  var back = 0;
  var next=1;
  // back = next;
  var i = 1;

  function NextQuestion(){
      switch(next){
          case next = 1:
                document.getElementById("btn_back_ques").disabled = false;
                for(var x=1; x<=40; x++){
                    if(x <= 20){
                      var id = "#q_option_id" + x;
                      $(id).hide();
                    }else{
                      var id = "#q_option_id" + x;
                      $(id).show();
                    }
                }
                back = next;
                next += 1;
                break;
          case next = 2:
                for(var x=1; x<=40; x++){
                    $('#title_q_option').hide();
                    $('#sub_title_q_option').hide();
                    document.getElementById('btn_next_ques').disabled = true;
                    if(x > 20){
                      var id = "#q_option_id" + x;
                      $(id).hide();
                    }

                    $('#sub_title_q_writing').show();
                    $('#title_q_writing').show();
                    $('#submitbutton').show();
                    if(x < 21){
                      var id_q_writing = "#q_writing_id" + x;
                      $(id_q_writing).show();
                    }

                }
                back = next;
                next += 1;
                break;
      }
  }


  function BackQuestion(){
      switch (back) {
        case back = 1:
                document.getElementById('btn_back_ques').disabled = true;
                for(var x=1; x<=40; x++){
                    if(x <= 20){
                      var id = "#q_option_id" + x;
                      $(id).show();
                    }else{
                      var id = "#q_option_id" + x;
                      $(id).hide();
                    }
                }
                next = back;
                back -= 1;
                break;


        case back = 2:

              for(var x=1; x<=40; x++){
                $('#title_q_option').show();
                $('#sub_title_q_option').show();
                document.getElementById('btn_next_ques').disabled = false;
                if(x > 20){
                  var id = "#q_option_id" + x;
                  $(id).show();
                }

                $('#sub_title_q_writing').hide();
                $('#title_q_writing').hide();
                $('#submitbutton').hide();
                if(x < 21){
                  var id_q_writing = "#q_writing_id" + x;
                  $(id_q_writing).hide();
                }

              }
              next = back;
              back -= 1;
              break;

      case back = 0:
            break;

      }
  }







  // function to get candidate quiz result
  function get_quiz_result(){
    var url= "/hrm_get_quiz_result";
    var x=new XMLHttpRequest();
    x.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById('show_result').innerHTML=this.responseText;
        }
    }
    x.open("GET", url , true);
    x.send();

  }





  //function candidate logout main page
  function candidate_logout(){
      $.ajax({
        type: 'GET',
        url: "/hrm_recruitment_candidate_logout",
        success:function(data){
            window.location = "/hrm_recruitment_login";
        },

    });
  }














//--------------end hr recruitment user-------


// ==================================END SOK KIM =======================================

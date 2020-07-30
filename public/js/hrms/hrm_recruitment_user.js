



//================================= SOK KIM part===============================

//-----------hr recruitment user------



// function auto submit for user quiz

function autoSubmit() {
  var auto = setTimeout(function(){ autoRefresh(); }, 100);
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
      var formElement = document.getElementById("myFormQuestion");
      var formData = new FormData(formElement);
      var request = new XMLHttpRequest();
      request.open("POST", "controller/recruitment_user/insert_user_answer.php" ,true);
      request.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
                  window.reload();
                  // console.responText();
              };
      }
      request.send(formData);
  }
  function autoRefresh(){
     clearTimeout(auto);
     auto = setTimeout(function(){ submitform(); }, (1000 * 60 * 60));
  }
}






  // function btn submit user answer quiz
  var xxx = 1;
  function go_to(route){
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var today = new Date();
    var dd = today.getDate();
    var mm = months[today.getMonth()]; 
    var yyyy = today.getFullYear();
    var n = today.toLocaleString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    var myTime = dd + '-' + mm +'-'+ yyyy + '/' + n; 

    if(xxx == 1){
    
      $.ajax({
          type: 'GET',
          url:route,
          success:function(data){
            
              $(".content-wrapper").show();
              $(".content-wrapper").html(data);
              document.getElementById("starttime_quiz").innerHTML = myTime;
 
          },
          error:function(){
            $(".content-wrapper").html(jerror());
          }
      });

          var d = new Date();
                // var f = new Date(d.getTime());
                d.setMinutes(d.getMinutes() + 60);
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
                    document.getElementById("countdown").innerHTML = hours + "h "
                    + minutes + "m " + seconds + "s ";
                    // If the count down is over, write some text 
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("countdown").innerHTML = "EXPIRED";
                    }
            }, 1000); 
    }
    
    

  }














  //declear global variable
  var back = 0;
  var next=1;
  // back = next;
  var i = 1;

  function NextQuestion(){
      switch(next){

          case next = 1:
                document.getElementById('btn_back_ques').style.backgroundColor = '';
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
                    document.getElementById('btn_next_ques').style.backgroundColor = 'gray';
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
              
                
                document.getElementById('btn_back_ques').style.backgroundColor = 'gray';
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
                document.getElementById('btn_next_ques').style.backgroundColor = '';
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

















//--------------end hr recruitment user-------


// ==================================END SOK KIM =======================================
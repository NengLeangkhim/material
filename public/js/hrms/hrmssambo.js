//====== Fuction Alert ======//
function sweetalert(type,title){
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000
  });
  Toast.fire({
    icon: type,
    title: title
  })
}
//======= Funtion delete=======//
function hrm_delete(id,route,goto,alert) {
  event.preventDefault();
  Swal.fire({ //get from sweetalert function
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url:route,   //Request send to "action.php page"
        data:{id:id},
        type:"GET",    //Using of Post method for send data
        success:function(data){
         console.log(data);
         //sweetalert('success',alert);
         setTimeout(function(){ go_to(goto); }, 300);// Set timeout for refresh content
        Swal.fire(
          'Deleted!',
            alert,
          'success'
        )
        }
       });
      
    }
  })
 
};
/////////////=================================EMPLOYEE SUGGESTION =============================///////////////

////==========Question Type Suggestion============//// 

//======View Modal for Question Type Suggestion =====//
function AddNewQ_type_sugg(){
      $('#q_type_sugg_modal').modal('show');//Modal show
      $('.print-error-msg').hide(); // hide div show error
      $("#question_type_sugg_form input").removeClass("is-invalid");
      $('#question_type_sugg').val('');
      $('#action_q_t_sugg').text('Create'); // Give value to button action of question type submit
} 
//======= ADD and update Question Type ========//
function HrmAddQuestionTypeSugg(){
    event.preventDefault();
    $("#question_type_sugg_form input").removeClass("is-invalid");
    /// Insert question type 
    if($('#action_q_t_sugg').text()=='Create') //check condition for create question type 
    {
     
      $.ajax({
        url:'hrm_question_type_sugg/add',
        type:'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
         data: //_token: $('#token').val(),
        $('#question_type_sugg_form').serialize(), 
        
        success:function(data)
        {
          if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
            console.log(data);
            $('#q_type_sugg_modal').modal('hide');
            sweetalert('success','The Question Type has been Insert Successfully !!');
            setTimeout(function(){ go_to('hrm_question_type_sugg'); }, 300);// Set timeout for refresh content 
        }else{
          // $(".print-error-msg").find("ul").html(''); 

          // $(".print-error-msg").css('display','block');

          $.each( data.errors, function( key, value ) {//foreach show error
              $("#" + key).addClass("is-invalid"); //give read border to input field
              // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
              sweetalert('warning',value);

          });
        }
        }
      });
    }
    /// Update action Question Type
    if($('#action_q_t_sugg').text()=='Update') // Check Condition for update question type
    {
      $.ajax({
        url:'hrm_question_type_sugg/update',
        type:'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: //_token:  $('#token').val(),
                $('#question_type_sugg_form').serialize(),    
        success:function(data)
        {
          if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
            console.log(data);
            $('#q_type_sugg_modal').modal('hide');
            sweetalert('success','The Question Type has been Update Successfully !!');
            setTimeout(function(){ go_to('hrm_question_type_sugg'); }, 300);// Set timeout for refresh content 
        }else{
          // $(".print-error-msg").find("ul").html('');

          // $(".print-error-msg").css('display','block');

          $.each( data.errors, function( key, value ) {
            $("#" + key).addClass("is-invalid"); //give read border to input field
              // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
              sweetalert('warning',value);
          });
        }
        }
      });
    }
 
   };
//======= END ADD and update Question Type ========//

//======= Funtion get value from database to show on modal update =======//
    $(document).on('click', '.update_q_t_sugg', function(){
        var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
        $.ajax({
         url:"hrm_question_type_sugg/edit",   //Request send to "action.php page"
         type:"GET",    //Using of Post method for send data
         data:{id:id},//Send data to server
         dataType:"json",   //Here we have define json data type, so server will send data in json format.
         success:function(data){
            $('#q_type_sugg_modal').modal('show');   //It will display modal on webpage
            $('#action_q_t_sugg').text("Update"); //This code will change Button value to Update
            $('#card_title').text("Update Question Type");
            $('.print-error-msg').hide();
            $("#question_type_sugg_form input").removeClass("is-invalid");
            $('#action_q_t_sugg_id').val(id);     //It will define value of id variable for update 
            $.each(data, function(i, e){ //read array json for show to textbox
              $('#question_type_sugg').val(data[i].name);     
              });     
         }
        });
       });
//======= END Funtion get value from database to show on modal update =======//

//======= Funtion delete question type suggestion =======//
function detele_q_t_sugg(id) {
  event.preventDefault();
  Swal.fire({ //get from sweetalert function
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url:"hrm_question_type_sugg/delete",   //Request send to "action.php page"
        data:{id:id},
        type:"GET",    //Using of Post method for send data
        success:function(data){
         console.log(data);
       //  sweetalert('success','The Question Type has been Update Successfully !!');
         setTimeout(function(){ go_to('hrm_question_type_sugg'); }, 300);// Set timeout for refresh content
        Swal.fire(
          'Deleted!',
          'Your Question Type has been deleted.',
          'success'
        )
        }
       });
      
    }
  })
 
};
////========== END Question Type Suggestion============//// 

////==========Question Suggestion============//// 
//========= function popup modal for add =======//
function AddNewQuestionSugg(){
    $('#q_sugg_modal').modal('show');
    $('#question_name_sugg').val('');
    $('#question_type_id_sugg').val('');
    $("#question_sugggestion_form textarea").removeClass("is-invalid");
    $("#question_sugggestion_form #question_type_id_sugg").removeClass("is-invalid");
    $(".invalid-feedback").children("strong").text("");
    $('#card_title').text("Create Questions");
    $('#statusType').val('1');
    $('#action_q_sugg').text('Create');
} 

function HrmSubmitQuestionSugg(){
  event.preventDefault();
  $("#question_sugggestion_form textarea").removeClass("is-invalid");
  $("#question_sugggestion_form #question_type_id_sugg").removeClass("is-invalid");
  $(".invalid-feedback").children("strong").text("");
  /// Insert question type 
  if($('#action_q_sugg').text()=='Create') //check condition for create question type 
  {
   
    $.ajax({
      url:'hrm_question_answer_sugg/store',
      type:'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
       data: //_token: $('#token').val(),
      $('#question_sugggestion_form').serialize(), 
      
      success:function(data)
      {
        if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
          console.log(data);
          $('#q_sugg_modal').modal('hide');
          sweetalert('success','The Question has been Insert Successfully !!');
          setTimeout(function(){ go_to('hrm_question_answer_sugg'); }, 300);// Set timeout for refresh content 
      }else{
        // $(".print-error-msg").find("ul").html(''); 

        // $(".print-error-msg").css('display','block');

        $.each( data.errors, function( key, value ) {//foreach show error
            $("#" + key).addClass("is-invalid"); //give read border to input field
            // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
            // sweetalert('warning',value);

        });
      }
      }
    });
  }
  /// Update action Question Type
  if($('#action_q_sugg').text()=='Update') // Check Condition for update question type
  {
    $.ajax({
      url:'hrm_question_answer_sugg/update',
      type:'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: //_token:  $('#token').val(),
              $('#question_sugggestion_form').serialize(),    
      success:function(data)
      {
        if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
          console.log(data);
          $('#q_sugg_modal').modal('hide');
          sweetalert('success','The Question has been Update Successfully !!');
          setTimeout(function(){ go_to('hrm_question_answer_sugg'); }, 300);// Set timeout for refresh content 
      }else{
        // $(".print-error-msg").find("ul").html('');

        // $(".print-error-msg").css('display','block');

        $.each( data.errors, function( key, value ) {
            $("#" + key).addClass("is-invalid"); //give read border to input field
            // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
            //sweetalert('warning',value);
        });
      }
      }
    });
  }
 
   };
//======= Funtion get value from database Question to show on modal update =======//
$(document).on('click', '.update_q_sugg', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  $.ajax({
   url:"hrm_question_answer_sugg/edit",   //Request send to "action.php page"
   type:"GET",    //Using of Post method for send data
   data:{id:id},//Send data to server
   dataType:"json",   //Here we have define json data type, so server will send data in json format.
   success:function(data){
      $('#q_sugg_modal').modal('show');   //It will display modal on webpage
      $('#action_q_sugg').text("Update"); //This code will change Button value to Update
      $('#card_title').text("Update Questions");
      $('.print-error-msg').hide();
      $("#question_sugggestion_form textarea").removeClass("is-invalid");//remove all error message
      $("#question_sugggestion_form #question_type_id_sugg").removeClass("is-invalid");
      $(".invalid-feedback").children("strong").text("");
      $('#q_sugg_id').val(id);     //It will define value of id variable for update 
      $.each(data, function(i, e){ //read array json for show to textbox
        $('#question_name_sugg').val(data[i].question);  
        $('#question_type_id_sugg').val(data[i].id_type)   
        });     
   }
  });
 });
//======= END Funtion get value from database to show on modal update =======//
////========== END Question Suggestion============//// 
////========== Answer Suggestion============////
///Get modal show for add answer //
$(document).on('click', '.add_answer_sugg', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  $.ajax({
   url:"hrm_question_answer_sugg/answer/modal",   //Request send to "action.php page"
   type:"GET",    //Using of Post method for send data
   data:{id:id},//Send data to server
   success:function(data){
      $('#ShowModalSuggestion').html(data);
      $('#answer_add_sugg_modal').modal('show');   //It will display modal on webpage
      $("#answer_sugggestion_form input").removeClass("is-invalid");//remove all error message
      $(".invalid-feedback").children("strong").text("");
   }
  });
});
/// Function Add Answer Suggestion ///
function HrmSubmitAnswerSugg(){
  event.preventDefault();
  $.ajax({
    url:'hrm_question_answer_sugg/answer/store',
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
     data: //_token: $('#token').val(),
    $('#answer_sugggestion_form').serialize(), 
    
    success:function(data)
    {
      if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
        console.log(data);
        $('#answer_add_sugg_modal').modal('hide');
        sweetalert('success','The Answer has been Insert Successfully !!');
        setTimeout(function(){ go_to('hrm_question_answer_sugg'); }, 300);// Set timeout for refresh content 
    }else{
      // $(".print-error-msg").find("ul").html(''); 

      // $(".print-error-msg").css('display','block');

      $.each( data.errors, function( key, value ) {//foreach show error
          $("#" + key).addClass("is-invalid"); //give read border to input field
          // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
          $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
          // sweetalert('warning',value);

      });
    }
    }
  });
}
///Get modal show Detail question and answer //
$(document).on('click', '.hrm_view_detail_question_answer', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  $.ajax({
   url:"hrm_question_answer_sugg/answer/view",   //Request send to "action.php page"
   type:"GET",    //Using of Post method for send data
   data:{id:id},//Send data to server
   success:function(data){
      $('#ShowModalSuggestion').html(data);
      $('#modal_detail_queston_answer_sugg').modal('show');   //It will display modal on webpage
   }
  });
});
///Get modal show question and answer for update detail//
$(document).on('click', '.hrm_question_answer', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  $.ajax({
   url:"hrm_question_answer_sugg/updatedetail",   //Request send to "action.php page"
   type:"GET",    //Using of Post method for send data
   data:{id:id},//Send data to server
   success:function(data){
      $('#ShowModalSuggestion').html(data);
      $('#modal_update_queston_answer_sugg').modal('show');   //It will display modal on webpage
      $("#question_answer_sugg_form textarea").removeClass("is-invalid");//remove all error message
      $("#question_answer_sugg_form select").removeClass("is-invalid");
   }
  });
});
/// Function Update Suggestion Detail ///
function HrmUpdateQuestionAnswerSugg(){
  event.preventDefault();
  $.ajax({
    url:'hrm_question_answer_sugg/editdetail',
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
     data: //_token: $('#token').val(),
    $('#question_answer_sugg_form').serialize(), 
    
    success:function(data)
    {
      if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
        console.log(data);
        $('#modal_update_queston_answer_sugg').modal('hide');
        sweetalert('success','The Answer And Question has been Update Successfully !!');
        setTimeout(function(){ go_to('hrm_question_answer_sugg'); }, 300);// Set timeout for refresh content 
    }else{
      $(".print-error-msg").find("ul").html(''); 

      $(".print-error-msg").css('display','block');

      $.each( data.errors, function( key, value ) {//foreach show error
          $("#" + key).addClass("is-invalid"); //give read border to input field
        //  $("#answer_name.0").addClass("is-invalid");
          var name = $("textarea[name='"+key+"']");
          if(key.indexOf(".") != -1){
            var arr = key.split(".");
            name = $("textarea[name='"+arr[0]+"[]']:eq("+arr[1]+")");
          }
          name.addClass("is-invalid");
          $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
      });
    }
    }
  });
}
// Function Delete Detail Question And Answer //
$(document).on('click', '.hrm_delete_question_answer', function(){
  event.preventDefault();
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  Swal.fire({ //get from sweetalert function
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url:"hrm_question_answer_sugg/deletedetail",   //Request send to "action.php page"
        data:{id:id},
        type:"GET",    //Using of Post method for send data
        success:function(data){
         console.log(data);
      //   sweetalert('success','The Question Type has been Update Successfully !!');
         setTimeout(function(){ go_to('hrm_question_answer_sugg'); }, 300);// Set timeout for refresh content
        Swal.fire(
          'Deleted!',
          'Your Question has been deleted.',
          'success'
        )
        }
       });
      
    }
  })
})
///////============== End Answer Suggestion ==============///////////
/////////////================================= END EMPLOYEE SUGGESTION =============================///////////////
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
          // if(data =='error'){
          //      //sweetalert('success',alert);
          //    //  setTimeout(function(){ go_to(goto); }, 300);// Set timeout for refresh content
          //      Swal.fire(
          //        'Deleted!',
          //          'Delete Error',
          //        'error'
          //      )
          // }else{
              //sweetalert('success',alert);
            setTimeout(function(){ go_to(goto); }, 300);// Set timeout for refresh content
            Swal.fire(
              'Deleted!',
                alert,
              'success'
            )
          // }
        }
        
       });
      
    }
  })
 
};
/// Function Get Name For Input Type 'FIle'//
function hrm_get_name_file(name_input,id_label){
  var filename = $('input[type=file][name='+name_input+']').val().split('\\').pop();
    if(filename !=''){
      $('#'+id_label).text(filename);
    }else{
      $('#'+id_label).text('Choose File'); 
    }
                
}
/////////////=================================EMPLOYEE SUGGESTION =============================///////////////

////==========Question Type Suggestion============//// 

//======View Modal for Question Type Suggestion =====//
function AddNewQ_type_sugg(){
      $('#q_type_sugg_modal').modal('show');//Modal show
      $('.print-error-msg').hide(); // hide div show error
      $("#question_type_sugg_form input").removeClass("is-invalid");
      $('#card_title').text('Add Question Type');
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
  /// Insert question 
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
  /// Update action Question 
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
        $('#question_type_id_sugg').val(data[i].hr_suggestion_question_type_id)   
        });     
   }
  });
 });
//======= END Funtion get value from database to show on modal update =======//

//======= Function checkbox update status
$(document).on('click', '.checkbox_sugg_q_a', function(){
  var checked = $(this).is(":checked");                 
                    if(checked)
                    {
                      var id = $(this).val();
                      var statusType = 't';
                      $.ajax({
                      url:"hrm_question_answer_sugg/checkbox",
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      type:'GET',
                      data:{
                        id:id,
                        statusType:statusType
                      },
                      success:function(data)
                      {
                        setTimeout(function(){ go_to('hrm_question_answer_sugg'); }, 100);// Set timeout for refresh content
                        sweetalert('success','The Question has been Update Status Successfully !!');  
                      }
                     });
                    }
                    if(!checked)
                    {
                      var id = $(this).val();
                      var statusType = 'f';
                      $.ajax({
                      url:"hrm_question_answer_sugg/checkbox",
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      type:'GET',
                      data:{
                        id:id,
                        statusType:statusType
                      },
                      success:function(data)
                      {
                        setTimeout(function(){ go_to('hrm_question_answer_sugg'); }, 100);// Set timeout for refresh content
                        sweetalert('warning','The Question has been Update Status Successfully !!');  
                      }
                    });
                    }

});
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
          $(".print-error-msg").find("ul").append('<li>'+'The Answer Field is Required'+'</li>');
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
///Get modal show Result Suggestion //
$(document).on('click', '.view_result_sugg', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  $.ajax({
   url:"hrm_question_answer_sugg/modal/result",   //Request send to "action.php page"
   type:"GET",    //Using of Post method for send data
   data:{id:id},//Send data to server
   success:function(data){
      $('#ShowModalSuggestion').html(data);
      $('#hrm_view_result_sugg').modal('show');   //It will display modal on webpage
   }
  });
});
///////============== End Answer Suggestion ==============///////////

///////============== Suggestion Comment ==============/////////////
/// Function Submit Suggestion Employee ///
function HrmSubmitSuggestion(){
  event.preventDefault();
  $("#suggestion_comment_form textarea").removeClass("is-invalid");//remove all error message
  $.ajax({
    url:'hrm_employee_sugg/store',
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
     data: //_token: $('#token').val(),
    $('#suggestion_comment_form').serialize(), 
    
    success:function(data)
    {
      if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
        console.log(data);
        sweetalert('success','The Submit has been Submit Successfully !!');
        go_to('/welcome');// refresh content 
    }else{ 
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

///////============== END Suggestion Comment ==============///////////
///////============== Suggestion Survey ==============/////////////
/// Function Submit Suggestion Employee ///
function HrmSubmitSurvey(){
  event.preventDefault();
  $("#suggestion_survey_form textarea").removeClass("is-invalid");//remove all error message
  $("#suggestion_survey_form input").removeClass("is-invalid");//remove all error message
  $.ajax({
    url:'hrm_survey_sugg/store',
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
     data: //_token: $('#token').val(),
    $('#suggestion_survey_form').serialize(), 
    
    success:function(data)
    {
      if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
        console.log(data);
        sweetalert('success','The Submit has been Submit Successfully !!');
        go_to('/welcome');// refresh content  
    }else{ 
       $(".print-error-msg").find("ul").html(''); 

       $(".print-error-msg").css('display','block');
      $.each( data.errors, function( key, value ) {//foreach show error
          //$("#radio_ans").addClass("was-validated"); //give read border to input field
          $(".print-error-msg").find("ul").append('<li>'+'Please Fill All The Fields'+'</li>');
          // $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
          // sweetalert('warning',value);
          var name = $("textarea[name='"+key+"']");
          if(key.indexOf(".") != -1){
            var arr = key.split(".");
            name = $("textarea[name='"+arr[0]+"[]']:eq("+arr[1]+")");
          }
          name.addClass("is-invalid");
      });
    }
    }
  });
}

///////============== END Suggestion Survey ==============///////////
/////////////================================= END EMPLOYEE SUGGESTION =============================///////////////

/////////////================================= Policy =============================//////////////////
/////==== List Policy ====//////

//function show modal add //
function HrmAddPolicy(){
  $('#hrm_policy_modal').modal('show');
  $('#policy_name').val('');
  $('#policy_file').val(''); 
  $('#policy_name').removeClass("is-invalid");
  $('#policy_file').removeClass("is-invalid");
  $(".invalid-feedback").children("strong").text("");
  $('#card_title').text('Add Policy');
  $('#action_policy').text('Create');
} 
//function insert policy //
function HrmSubmitPolicy(){
  event.preventDefault();
  var formElement = document.getElementById('hrm_policy_form');
  var formData = new FormData(formElement);
  $('#policy_name').removeClass("is-invalid");
  $('#policy_file').removeClass("is-invalid");
  /// Insert function 
  if($('#action_policy').text()=='Create') //check condition for create question type 
  {
   
    $.ajax({
      url:'hrm_list_policy/store',
      type:'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
       data: //_token: $('#token').val(),
       formData,
       processData: false,
       contentType: false,
      success:function(data)
      {
        if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
          console.log(data);
          $('#hrm_policy_modal').modal('hide');
          sweetalert('success','The Policy has been Insert Successfully !!');
          setTimeout(function(){ go_to('hrm_list_policy'); }, 300);// Set timeout for refresh content 
      }else{
        // $(".print-error-msg").find("ul").html(''); 

        // $(".print-error-msg").css('display','block');

        $.each( data.errors, function( key, value ) {//foreach show error
            $("#" + key).addClass("is-invalid"); //give read border to input field
            // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            //  sweetalert('warning',value);
            $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

        });
      }
      }
    });
  }
  /// Update action
  if($('#action_policy').text()=='Update') // Check Condition for update question type
  {
    $.ajax({
      url:'hrm_list_policy/update',
      type:'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: //_token:  $('#token').val(),
      formData,
      processData: false,
      contentType: false,
      success:function(data)
      {
        if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
          console.log(data);
          $('#hrm_policy_modal').modal('hide');
          sweetalert('success','The Policy has been Update Successfully !!');
          setTimeout(function(){ go_to('hrm_list_policy'); }, 300);// Set timeout for refresh content 
      }else{
        // $(".print-error-msg").find("ul").html('');

        // $(".print-error-msg").css('display','block');

        $.each( data.errors, function( key, value ) {
          $("#" + key).addClass("is-invalid"); //give read border to input field
            // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            //sweetalert('warning',value);
            $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
        });
      }
      }
    });
  }

 };
 //Function Update
 $(document).on('click', '.hrm_update_policy_list', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  $.ajax({
   url:"hrm_list_policy/getedit",   //Request send to "action.php page"
   type:"POST",    //Using of Post method for send data
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
   data:{id:id},//Send data to server
   dataType:"json",   //Here we have define json data type, so server will send data in json format.
   success:function(data){
      $('#hrm_policy_modal').modal('show');   //It will display modal on webpage
      $('#action_policy').text("Update"); 
      $('#card_title').text("Update Policy")     //This code will change Button value to Update
      $('#policy_id').val(id);     //It will define value of id variable to this customer id hidden field
      $('#operation').val('Update');
      $('#policy_name').removeClass("is-invalid");
      $('#policy_file').removeClass("is-invalid");
      $.each(data, function(i, e){ //read array json for show to textbox
        $('#hidden_pdf').val(data[i].file_path);// Set to span and get hidden for value 
        $('#policy_name').val(data[i].name);
        $('#policy_file_name').text(data[i].file_path);    
        });     
     
   }
  });
 });
 //Function View Modal Policy
 $(document).on('click', '.hrm_view_policy', function(){
  var currentdate = new Date();
  var start_time =currentdate.getFullYear() + "-"
  + (currentdate.getMonth()+1)  + "-" 
  + currentdate.getDate() + "   "  
  + currentdate.getHours() + ":"  
  + currentdate.getMinutes() + ":" 
  + currentdate.getSeconds();
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  $.ajax({
   url:"hrm_list_policy/modal",   //Request send to "action.php page"
   type:"GET",    //Using of Post method for send data
   data:{id:id},//Send data to server
   success:function(data){
      $('#ShowModalPolicy').html(data);
      $('#hrm_view_policy_modal').modal('show');   //It will display modal on webpage
      $('#start_time').val(start_time);
      $("#verify_policy").removeClass("is-invalid");//remove all error message
      $(".invalid-feedback").children("strong").text("");
   }
  });
});
/// Function Submit User Reading Policy ///
function sumbit_policy(){
  event.preventDefault();
  $.ajax({
    url:'hrm_list_policy/storeuser',
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
     data: //_token: $('#token').val(),
    $('#hrm_policy_view_form').serialize(), 
    
    success:function(data)
    {
      if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
        console.log(data);
        $('#hrm_view_policy_modal').modal('hide');
        sweetalert('success','Thanks for reading policy !!');
        setTimeout(function(){ go_to('hrm_list_policy'); }, 300);// Set timeout for refresh content 
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
/////==== END List Policy ====//////
/////==== Policy User ====//////
///Get modal show question and answer for update detail//
$(document).on('click', '.hrm_view_policy_user', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  $.ajax({
   url:"hrm_list_policy_user/modal",   //Request send to "action.php page"
   type:"GET",    //Using of Post method for send data
   data:{id:id},//Send data to server
   success:function(data){
      $('#ShowModalPolicyUser').html(data);
      $('#hrm_view_policy_user_modal').modal('show');   //It will display modal on webpage
   }
  });
});
/////==== END Policy User ====//////
/////////////================================= END Policy =============================///////////////

/////////////================================= Performance =============================///////////////

/////==== Performance Plan ====//////
  //function show modal add
  function HrmAddPerformPlan(){
    $('#hrm_perform_plan_modal').modal('show');
    $('#plan_name').val('');
    $('#plan_from').val('');
    $('#plan_to').val('');
    $('#hrm_perform_plan_form input').removeClass("is-invalid");//remove valid all input field
    $(".invalid-feedback").children("strong").text("");
    $("#card_title").text('Add Plan');
    $('#action_plan').text('Create');
  }
 ////view Table plan///////
  function view_table_plan(){
    $.ajax({  
        url:"hrm_list_plan_performance/plan",  
        type:"get",  
        data:{},  
        success:function(data){  
          $('#table_show_plan').html(data);  
  }  
  });  
  }
  ////view Table plan detail///////
  function view_table_plan_detail(){
  $.ajax({  
      url:"hrm_list_plan_performance/plandetail",  
      type:"get",  
      data:{},  
      success:function(data){  
        $('#table_show_plan').html(data);  
  }  
  });  
  }
  ///// Function insert plan ///////
  function HrmSubmitPerformPlan(){
    event.preventDefault();
  $('#hrm_perform_plan_form input').removeClass("is-invalid");//remove valid all input field
  /// Insert function
  if($('#action_plan').text()=='Create') //check condition for create question type 
  {
   
    $.ajax({
      url:'hrm_list_plan_performance/addplan',
      type:'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
       data: //_token: $('#token').val(),
       $('#hrm_perform_plan_form').serialize(),
      success:function(data)
      {
        if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
          console.log(data);
          $('#hrm_perform_plan_modal').modal('hide');
          sweetalert('success','The Plan has been Insert Successfully !!');
          setTimeout(function(){ go_to('hrm_list_plan_performance'); }, 300);// Set timeout for refresh content 
      }else{
        // $(".print-error-msg").find("ul").html(''); 

        // $(".print-error-msg").css('display','block');

        $.each( data.errors, function( key, value ) {//foreach show error
            $("#" + key).addClass("is-invalid"); //give read border to input field
            // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            //  sweetalert('warning',value);
            $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

        });
      }
      }
    });
  }
  /// Update action 
  if($('#action_plan').text()=='Update') // Check Condition for update question type
  {
    $.ajax({
      url:'hrm_list_plan_performance/updateplan',
      type:'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: //_token:  $('#token').val(),
      $('#hrm_perform_plan_form').serialize(),
      success:function(data)
      {
        if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
          console.log(data);
          $('#hrm_perform_plan_modal').modal('hide');
          sweetalert('success','The Plan has been Update Successfully !!');
          setTimeout(function(){ go_to('hrm_list_plan_performance'); }, 300);// Set timeout for refresh content 
      }else{
        // $(".print-error-msg").find("ul").html(''); 

        // $(".print-error-msg").css('display','block');

        $.each( data.errors, function( key, value ) {//foreach show error
            $("#" + key).addClass("is-invalid"); //give read border to input field
            // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            //  sweetalert('warning',value);
            $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

        });
      }
      }
    });
    }
  }

  //// Get Data Performance Plan for modal update///
  $(document).on('click', '.hrm_update_perform_plan', function(){
    var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
    $.ajax({
    url:"hrm_list_plan_performance/editplan",   //Request send to "action.php page"
    type:"GET",    //Using of Post method for send data
    data:{id:id},//Send data to server
    dataType:"json",   //Here we have define json data type, so server will send data in json format.
    success:function(data){
        $('#hrm_perform_plan_modal').modal('show');   //It will display modal on webpage
        $('#action_plan').text("Update"); //This code will change Button value to Update
        $('#card_title').text("Update Plan");
        $('.print-error-msg').hide();
        $('#hrm_perform_plan_form input').removeClass("is-invalid");//remove valid all input field
        $(".invalid-feedback").children("strong").text("");
        $('#plan_id').val(id);     //It will define value of id variable for update 
        $.each(data, function(i, e){ //read array json for show to textbox
          $('#plan_name').val(data[i].name);
          $('#plan_from').val(data[i].date_from);
          $('#plan_to').val(data[i].date_to);
          });     
    }
    });
  });
  //// View modal Plan and Plan Detail///
  $(document).on('click', '.hrm_view_plan_detail', function(){
    var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
    $.ajax({
    url:"hrm_list_plan_performance/plan/modal",   //Request send to "action.php page"
    type:"GET",    //Using of Post method for send data
    data:{id:id},//Send data to server
    success:function(data){
        $('#ShowModalPlan').html(data);
        $('#hrm_view_plan_modal').modal('show');   //It will display modal on webpage   
    }
    });
  });
/////==== END Performance Plan ====//////
////===== Performance plan Detail====/////////
///// Show Modal Add Plan detail /////
$(document).on('click','.hrm_add_plan_detail', function(){
  var id = $(this).attr("id"); 
  $.ajax({
    url:"hrm_list_plan_performance/modalplandetail",
    type:"GET",
    data:{id:id},
    success:function(data){
      $('#ShowModalPlan').html(data);
      $('#hrm_perform_plan_detail_modal').modal('show');
      $('#plan_detail_name').val(''); //clear fields
      $('#plan_detail_task').val(''); 
      $('#plan_detail_from').val(''); 
      $('#plan_detail_to').val(''); 
      $('#plan_detail_parent').val(''); 
      $('#plan_detail_name').removeClass("is-invalid"); //remove border red for error
      $('#plan_detail_task').removeClass("is-invalid");
      $('#plan_detail_from').removeClass("is-invalid");
      $('#plan_detail_to').removeClass("is-invalid");
      $('#plan_detail_to').removeClass("is-invalid");
      $(".invalid-feedback").children("strong").text("");
      $('#card_title').text('Add Plan Detail');
      $('#action_plan_detail').text('Create');
    }
  })
})
///// Function insert plan detail //////
function HrmAddPlanDetail(){
  event.preventDefault();
  $('#hrm_perform_plan_detail_form input').removeClass("is-invalid");//remove valid all input field
  $('#plan_detail_task').removeClass("is-invalid");
  /// Insert function
  if($('#action_plan_detail').text()=='Create') //check condition for create 
  {
   
    $.ajax({
      url:'hrm_list_plan_performance/addplandetail',
      type:'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
       data: //_token: $('#token').val(),
       $('#hrm_perform_plan_detail_form').serialize(),
      success:function(data)
      {
        if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
          console.log(data);
          $('#hrm_perform_plan_detail_modal').modal('hide');
          sweetalert('success','The Plan Detail has been Insert Successfully !!');
          setTimeout(function(){ go_to('hrm_list_plan_performance'); }, 300);// Set timeout for refresh content 
      }else{
        // $(".print-error-msg").find("ul").html(''); 

        // $(".print-error-msg").css('display','block');

        $.each( data.errors, function( key, value ) {//foreach show error
            $("#" + key).addClass("is-invalid"); //give read border to input field
            // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            //  sweetalert('warning',value);
            $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

        });
      }
      }
    });
  }
  /// Update action 
  if($('#action_plan_detail').text()=='Update') // Check Condition for update 
  {
    $.ajax({
      url:'hrm_list_plan_performance/updateplandetail',
      type:'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: //_token:  $('#token').val(),
      $('#hrm_perform_plan_detail_form').serialize(),
      success:function(data)
      {
        if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
          console.log(data);
          $('#hrm_perform_plan_detail_modal').modal('hide');
          sweetalert('success','The Plan Detail has been Update Successfully !!');
          setTimeout(function(){ go_to('hrm_list_plan_performance'); }, 300);// Set timeout for refresh content 
      }else{
        // $(".print-error-msg").find("ul").html(''); 

        // $(".print-error-msg").css('display','block');

        $.each( data.errors, function( key, value ) {//foreach show error
            $("#" + key).addClass("is-invalid"); //give read border to input field
            // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            //  sweetalert('warning',value);
            $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

        });
      }
      }
    });
    }
}
////// Update plan detail ////////
function hrm_update_perform_plan_detail(id,id_plan){
  $.ajax({
    url:"hrm_list_plan_performance/editplandetail",   //Request send to "action.php page"
    type:"GET",    //Using of Post method for send data
    data:{id:id},//Send data to server
    dataType:"json",   //Here we have define json data type, so server will send data in json format.
    success:function(data){
         data1= data;
         $.ajax({
          url:"hrm_list_plan_performance/modalplandetail",
          type:"GET",
          data:{id:id_plan},
          success:function(data){
            $('#ShowModalPlan').html(data);
            setTimeout(function(){$('#hrm_perform_plan_detail_modal').modal("show");},200);
            // $('#hrm_perform_plan_detail_modal').modal('show');
            $('#card_title').text('Update Plan Detail');
            $('#action_plan_detail').text('Update');
            $('#plan_datail_id').val(id);
            var show = data1;
            $.each(show, function(i, e){ //read array json for show to textbox
              $('#plan_detail_name').val(show[i].name);
              $('#plan_detail_task').val(show[i].task); 
              $('#plan_detail_from').val(show[i].date_from); 
              $('#plan_detail_to').val(show[i].date_to); 
              $('#plan_detail_parent').val(show[i].parent_id);
              });    
            $('#plan_detail_name').removeClass("is-invalid"); //remove border red for error
            $('#plan_detail_task').removeClass("is-invalid");
            $('#plan_detail_from').removeClass("is-invalid");
            $('#plan_detail_to').removeClass("is-invalid");
            $('#plan_detail_to').removeClass("is-invalid");
            $(".invalid-feedback").children("strong").text("");
          }
        })
    }
  })  
};

//// View modal Plan Detail///
$(document).on('click', '.hrm_view_perform_plan_detail', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  $.ajax({
  url:"hrm_list_plan_performance/plandetail/view",   //Request send to "action.php page"
  type:"GET",    //Using of Post method for send data
  data:{id:id},//Send data to server
  success:function(data){
      $('#ShowModalPlan').html(data);
      $('#hrm_view_plan_detail_modal').modal('show');   //It will display modal on webpage   
  }
  });
});
////===== End Performance Plan Detail =====////////

////===== Performance Schedule =====////////
 //function show modal add
 function HrmAddSchedule(){
  $('#hrm_perform_schedule_modal').modal('show');
  //performance plan
  $('#plan_schedule').val('');
  $('#plan_from_schedule').val('');
  $('#plan_to_schedule').val('');
  //performance plan detail
  $('#plan_detail_schedule').val('');
  $('#schedule_detail_task').val('');
  $('#schedule_detail_from').val('');
  $('#schedule_detail_to').val('');
  // schedule plan
  $('#staff_schedule').val('');
  $('#staff_from_schedule').val('');
  $('#staff_to_schedule').val('');
  $('#staff_comment_schedule').val('');
  $('#hrm_perform_schedule_form input').removeClass("is-invalid");//remove valid all input field
  $('#hrm_perform_schedule_form textarea').removeClass("is-invalid");//remove valid all input field
  $('#hrm_perform_schedule_form select').removeClass("is-invalid");//remove valid all input field
  $(".invalid-feedback").children("strong").text("");
  $('#card_title').text('Add Schedule');
  $('#action_schedule_staff').text('Create');
}
///// Function query combobox plan detail 
////// Fuction get_plan_schedule//////
function get_plan_schedule(id){
  $.ajax({
    url:"hrm_performance_staff_schedule/plandetail/select",   //Request send to "action.php page"
    type:"GET",    //Using of Post method for send data
    data:{id:id},//Send data to server
    success:function(data){
      data1 = data;
      $.ajax({
        url:"hrm_performance_staff_schedule/plan",   //Request send to "action.php page"
        type:"GET",    //Using of Post method for send data
        data:{id:id},//Send data to server
        dataType:"json",   //Here we have define json data type, so server will send data in json format.
        success:function(data){
              // console.log(data);  combobox_plan_detail
              $.each(data, function(i, e){ //read array json for show to textbox
                $('#plan_from_schedule').val(data[i].date_from); 
                $('#plan_to_schedule').val(data[i].date_to); 
                });    
               $('#schedule_plan_detail').html(data1);  
        }
       });
    }
  });
}
////// function get_plan_detail_schedule//////
function get_plan_detail_schedule(id){
  var action = "Select_Plan_Detail";
  $.ajax({
    url:"hrm_performance_staff_schedule/plandetail",   //Request send to "action.php page"
    type:"GET",    //Using of Post method for send data
    data:{id:id},//Send data to server
    dataType:"json",   //Here we have define json data type, so server will send data in json format.
    success:function(data){
          // console.log(data);  combobox_plan_detail
          $.each(data, function(i, e){ //read array json for show to textbox
           $('#schedule_detail_task').text(data[i].task); 
           $('#schedule_detail_from').val(data[i].date_from);   
           $('#schedule_detail_to').val(data[i].date_to);   
        })
    }
   });
}
///// Function insert and Update Schedule Performance ///////
function HrmSubmitPerformSchedule(){
  event.preventDefault();
/// Insert function
if($('#action_schedule_staff').text()=='Create') //check condition for create question type 
{
 
  $.ajax({
    url:'hrm_performance_staff_schedule/store',
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
     data: //_token: $('#token').val(),
     $('#hrm_perform_schedule_form').serialize(),
    success:function(data)
    {
      if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
        console.log(data);
        $('#hrm_perform_schedule_modal').modal('hide');
        sweetalert('success','The Schedule has been Insert Successfully !!');
        setTimeout(function(){ go_to('hrm_performance_staff_schedule'); }, 300);// Set timeout for refresh content 
    }else{
      // $(".print-error-msg").find("ul").html(''); 

      // $(".print-error-msg").css('display','block');

      $.each( data.errors, function( key, value ) {//foreach show error
          $("#" + key).addClass("is-invalid"); //give read border to input field
          // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
          //  sweetalert('warning',value);
          $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

      });
    }
    }
  });
}
/// Update action 
if($('#action_schedule_staff').text()=='Update') // Check Condition for update question type
{
  $.ajax({
    url:'hrm_performance_staff_schedule/update',
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
     data: //_token: $('#token').val(),
     $('#hrm_perform_schedule_form').serialize(),
    success:function(data)
    {
      if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
        console.log(data);
        $('#hrm_perform_schedule_modal').modal('hide');
        sweetalert('success','The Schedule has been Update Successfully !!');
        setTimeout(function(){ go_to('hrm_performance_staff_schedule'); }, 300);// Set timeout for refresh content 
    }else{
      // $(".print-error-msg").find("ul").html(''); 

      // $(".print-error-msg").css('display','block');

      $.each( data.errors, function( key, value ) {//foreach show error
          $("#" + key).addClass("is-invalid"); //give read border to input field
          // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
          //  sweetalert('warning',value);
          $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

      });
    }
    }
  });
  }
}
////Function get value for update
//// Get Data Performance Schedule for modal update///
function hrm_update_perform_schedule(id,id_plan){
  get_plan_schedule(id_plan);
  setTimeout(function(){ //set time out for show run functino get_plan_schedule first
  $.ajax({
  url:"hrm_performance_staff_schedule/getdata",   //Request send to "action.php page"
  type:"GET",    //Using of Post method for send data
  data:{id:id},//Send data to server
  dataType:"json",   //Here we have define json data type, so server will send data in json format.
  success:function(data){
      $('#hrm_perform_schedule_modal').modal('show');   //It will display modal on webpage
      $('#action_schedule_staff').text("Update"); //This code will change Button value to Update
      $('#card_title').text("Update Schedule");
      $('.print-error-msg').hide();
      $('#hrm_perform_schedule_form input').removeClass("is-invalid");//remove valid all input field
      $('#hrm_perform_schedule_form textarea').removeClass("is-invalid");//remove valid all input field
      $('#hrm_perform_schedule_form select').removeClass("is-invalid");//remove valid all input field
      $('#schedule_plan_id').val(id);     //It will define value of id variable for update 
      $.each(data, function(i, e){ //read array json for show to textbox
        $('#plan_schedule').val(data[i].plan_id);
        $('#plan_from_schedule').val(data[i].plan_from);
        $('#plan_to_schedule').val(data[i].plan_to);
        $('#plan_detail_schedule').val(data[i].pd_id);
        // $('#plan_detail_schedule option').text(data.pd_name);
        $('#schedule_detail_task').text(data[i].pd_task);
        $('#schedule_detail_from').val(data[i].pd_from);
        $('#schedule_detail_to').val(data[i].pd_to);
        $('#staff_schedule').val(data[i].ma_user_id);
        $('#staff_from_schedule').val(data[i].date_from);
        $('#staff_to_schedule').val(data[i].date_to);
        $('#staff_comment_schedule').text(data[i].comment);  
        });     
  }
  });
},300);
};
//// View modal Plan Detail///
$(document).on('click', '.hrm_view_perform_schedule', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  $.ajax({
  url:"hrm_performance_staff_schedule/modal",   //Request send to "action.php page"
  type:"GET",    //Using of Post method for send data
  data:{id:id},//Send data to server
  success:function(data){
      $('#modal_for_view_schedule').html(data);
      $('#hrm_view_perform_schedule_modal').modal('show');   //It will display modal on webpage   
  }
  });
});
////===== END Performance Schedule =====//////

////===== Performance Follow Up Staff ====//////
// //// Modal For add follow up schedule
// $(document).on('click', '.hrm_add_perform_follow_up', function(){
//   var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
//   $.ajax({
//   url:"hrm_performance_follow_up/modal/add",   //Request send to "action.php page"
//   type:"GET",    //Using of Post method for send data
//   data:{id:id},//Send data to server
//   success:function(data){
//       $('#modal_for_view_schedule').html(data);
//       $('#hrm_perform_follow_modal').modal('show');   //It will display modal on webpage  
//       $('#action_follow_up').text("Create"); //This code will change Button value to Update
//       $('#card_title').text("Add Follow Up");
//       $('.print-error-msg').hide();
//       $('#hrm_perform_schedule_form input').removeClass("is-invalid");//remove valid all input field
//       $('#hrm_perform_schedule_form textarea').removeClass("is-invalid");//remove valid all input field
//       $('#follow_up_percentage').text('');
//       $('#follow_up_reason').text('');
//       $('#follow_up_challenge').text('');
//       $('#follow_up_comment').text('');  

//   }
//   });
// });
///// Function insert and Update Staff Follow Performance ///////
function HrmSubmitStaffFollowUp(){
  event.preventDefault();
/// Insert function
if($('#action_follow_up').val()=='Create') //check condition for create question type 
{
 
  $.ajax({
    url:'/hrm_performance_follow_up/store',
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
     data: //_token: $('#token').val(),
     $('#hrm_perform_follow_form').serialize(),
    success:function(data)
    {
      if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
        console.log(data);
        sweetalert('success','The Staff Follow Up has been Insert Successfully !!');
        setTimeout(function(){ go_to('/hrm_performance_follow_up'); }, 300);// Set timeout for refresh content 
    }else{
      // $(".print-error-msg").find("ul").html(''); 

      // $(".print-error-msg").css('display','block');

      $.each( data.errors, function( key, value ) {//foreach show error
          $("#" + key).addClass("is-invalid"); //give read border to input field
          // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
          //  sweetalert('warning',value);
          $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

      });
    }
    }
  });
}
/// Update action 
if($('#action_follow_up').val()=='Update') // Check Condition for update question type
{
  $.ajax({
    url:'/hrm_performance_follow_up/update',
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
     data: //_token: $('#token').val(),
     $('#hrm_perform_follow_form').serialize(),
    success:function(data)
    {
      if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
        console.log(data);
        sweetalert('success','The Staff Follow Up has been Updated Successfully !!');
        setTimeout(function(){ go_to('/hrm_performance_follow_up'); }, 300);// Set timeout for refresh content 
    }else{
      // $(".print-error-msg").find("ul").html(''); 

      // $(".print-error-msg").css('display','block');

      $.each( data.errors, function( key, value ) {//foreach show error
          $("#" + key).addClass("is-invalid"); //give read border to input field
          // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
          //  sweetalert('warning',value);
          $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

      });
    }
    }
  });
  }
}
//// View modal Staff Follow Up Detail///
$(document).on('click', '.hrm_view_perform_staff_follow_up', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  $.ajax({
  url:"hrm_performance_follow_up/modal/view",   //Request send to "action.php page"
  type:"GET",    //Using of Post method for send data
  data:{id:id},//Send data to server
  success:function(data){
      $('#modal_for_view_follow_up').html(data);
      $('#hrm_view_staff_follow_up_modal').modal('show');   //It will display modal on webpage   
  }
  });
});
////===== END Performance Follow Up Staff ====//////

////===== Performance Manager Follow Up  ====///////
///// Function insert and Update Manager Follow Performance ///////
function HrmSubmitManagerFollowUp(){
  event.preventDefault();
/// Insert function
if($('#action_manage_follow_up').val()=='Create') //check condition for create question type 
{
 
  $.ajax({
    url:'/hrm_performance_follow_up_manager/store',
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
     data: //_token: $('#token').val(),
     $('#hrm_manager_follow_form').serialize(),
    success:function(data)
    {
      if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
        console.log(data);
        sweetalert('success','The Manager Follow Up has been Insert Successfully !!');
        setTimeout(function(){ go_to('/hrm_performance_follow_up_manager'); }, 300);// Set timeout for refresh content 
    }else{
      // $(".print-error-msg").find("ul").html(''); 

      // $(".print-error-msg").css('display','block');

      $.each( data.errors, function( key, value ) {//foreach show error
          $("#" + key).addClass("is-invalid"); //give read border to input field
          // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
          //  sweetalert('warning',value);
          $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

      });
    }
    }
  });
}
/// Update action 
if($('#action_manage_follow_up').val()=='Update') // Check Condition for update question type
{
  $.ajax({
    url:'/hrm_performance_follow_up_manager/update',
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
     data: //_token: $('#token').val(),
     $('#hrm_manager_follow_form').serialize(),
    success:function(data)
    {
      if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
        console.log(data);
        sweetalert('success','The Manager Follow Up has been Update Successfully !!');
        setTimeout(function(){ go_to('/hrm_performance_follow_up_manager'); }, 300);// Set timeout for refresh content 
    }else{
      // $(".print-error-msg").find("ul").html(''); 

      // $(".print-error-msg").css('display','block');

      $.each( data.errors, function( key, value ) {//foreach show error
          $("#" + key).addClass("is-invalid"); //give read border to input field
          // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
          //  sweetalert('warning',value);
          $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

      });
    }
    }
  });
  }
}
//// View modal Manager Follow Up Detail///
$(document).on('click', '.hrm_view_manager_follow_up', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  $.ajax({
  url:"hrm_performance_follow_up_manager/modal/view",   //Request send to "action.php page"
  type:"GET",    //Using of Post method for send data
  data:{id:id},//Send data to server
  success:function(data){
      $('#modal_view_manager_follow_up').html(data);
      $('#hrm_view_manager_follow_up_modal').modal('show');   //It will display modal on webpage   
  }
  });
});
////===== END Performance Manager Follow Up  ====//////

////=================== Performance Score =============//////
//function show modal add
function HrmAddPerformScore(){
  $('#hrm_perform_score_modal').modal('show');
  $('#score_name').val('');
  $('#score_value').val('');
  $('#hrm_perform_score_form input').removeClass("is-invalid");//remove valid all input field
  $(".invalid-feedback").children("strong").text("");
  $("#card_title").text('Add Score');
  $('#action_performance_score').text('Create');
}
///// Function insert plan ///////
function HrmSubmitPerformScore(){
  event.preventDefault();
  $('#hrm_perform_score_form input').removeClass("is-invalid");//remove valid all input field
/// Insert function
if($('#action_performance_score').text()=='Create') //check condition for create  
{
 
  $.ajax({
    url:'hrm_performance_score/store',
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
     data: //_token: $('#token').val(),
     $('#hrm_perform_score_form').serialize(),
    success:function(data)
    {
      if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
        console.log(data);
        $('#hrm_perform_score_modal').modal('hide');
        sweetalert('success','The Score has been Insert Successfully !!');
        setTimeout(function(){ go_to('hrm_performance_score'); }, 300);// Set timeout for refresh content 
    }else{
      // $(".print-error-msg").find("ul").html(''); 

      // $(".print-error-msg").css('display','block');

      $.each( data.errors, function( key, value ) {//foreach show error
          $("#" + key).addClass("is-invalid"); //give read border to input field
          // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
          //  sweetalert('warning',value);
          $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

      });
    }
    }
  });
}
/// Update action 
if($('#action_performance_score').text()=='Update') // Check Condition for update 
{
  $.ajax({
    url:'hrm_performance_score/update',
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
     data: //_token: $('#token').val(),
     $('#hrm_perform_score_form').serialize(),
    success:function(data)
    {
      if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
        console.log(data);
        $('#hrm_perform_score_modal').modal('hide');
        sweetalert('success','The Score has been Updated Successfully !!');
        setTimeout(function(){ go_to('hrm_performance_score'); }, 300);// Set timeout for refresh content 
    }else{
      // $(".print-error-msg").find("ul").html(''); 

      // $(".print-error-msg").css('display','block');

      $.each( data.errors, function( key, value ) {//foreach show error
          $("#" + key).addClass("is-invalid"); //give read border to input field
          // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
          //  sweetalert('warning',value);
          $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

      });
    }
    }
  });
  }
}
//Function Update
$(document).on('click', '.hrm_update_perform_score', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  $.ajax({
   url:"hrm_performance_score/get",   //Request send to "action.php page"
   type:"GET",    //Using of Post method for send data
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
   data:{id:id},//Send data to server
   dataType:"json",   //Here we have define json data type, so server will send data in json format.
   success:function(data){
      $('#hrm_perform_score_modal').modal('show');   //It will display modal on webpage
      $('#action_performance_score').text('Update');
      $("#card_title").text('Update Score');     //This code will change Button value to Update
      $('#performance_score_id').val(id);     //It will define value of id variable to this customer id hidden field
      $('#hrm_perform_score_form input').removeClass("is-invalid");//remove valid all input field
      $(".invalid-feedback").children("strong").text("");
      $.each(data, function(i, e){ //read array json for show to textbox
        $('#score_name').val(data[i].name)// Set to span and get hidden for value 
        value_score = parseInt(data[i].value);
        $('#score_value').val(value_score);    
        });     
     
   }
  });
 });
////================== END Performance Score ============/////

////================ Performance Report ============//////
//// Function Report Performance //////
function ReportPerformance(){
  event.preventDefault();
  $.ajax({
    url:'hrm_report_performance_manage/action',
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
     data: //_token: $('#token').val(),
     $('#performance_report_form').serialize(),
    success:function(data)
    {
      if(typeof(data.errors) != "undefined" && data.errors !== null) { //condition for check success
         // $(".print-error-msg").find("ul").html(''); 

      // $(".print-error-msg").css('display','block');

      $.each( data.errors, function( key, value ) {//foreach show error
        $("#" + key).addClass("is-invalid"); //give read border to input field
        // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
          sweetalert('warning',value);
        //$("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
    });
      
    }else{
      console.log(data);
      $('#report_table_performance').html(data);
      $('#report_tbl_performance').DataTable({
      });
      $('[data-toggle="tooltip"]').tooltip(); 
    }
    }
   }); 
}
 //// View Detail Report //////
 function view_detail_report(id){
  $.ajax({  
      url:"hrm_performance_follow_up_manager/modal/view",  
      method:"GET",  
      data:{id:id},  
      success:function(data){  
       $('#modal_report_performance').html(data);  
       setTimeout(function(){$('#hrm_view_manager_follow_up_modal').modal("show");},200);
  }  
  }); 
   
 }
////================ END Performance Report ============//////
/////////////================================= END Performance =============================///////////////
/////////////================================= Recruitment =============================///////////////
////====== Question Type Recruitment ====/////
    //======View Modal for Question Type Recruitment =====//
    function AddNewQuestionType(){
      $('#q_type_re_modal').modal('show');//Modal show
      $('.print-error-msg').hide(); // hide div show error
      $("#question_type_re_form input").removeClass("is-invalid");
      $(".invalid-feedback").children("strong").text("");/// remove errror massage
      $('#card_title').text('Add Question Type');
      $('#question_type').val('');
      $('#action_question_type').text('Create'); // Give value to button action of question type submit
    } 

    ///// Function insert and Update Question type ///////
    function HrmAddQuestionTypeRe(){
      event.preventDefault();
      $('#question_type_re_form input').removeClass("is-invalid");//remove valid all input field
    /// Insert function
    if($('#action_question_type').text()=='Create') //check condition for create  
    {
    
      $.ajax({
        url:'hrm_questiontype/store',
        type:'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
        data: //_token: $('#token').val(),
        $('#question_type_re_form').serialize(),
        success:function(data)
        {
          if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
            console.log(data);
            $('#q_type_re_modal').modal('hide');
            sweetalert('success','The Question Type has been Insert Successfully !!');
            setTimeout(function(){ go_to('hrm_questiontype'); }, 300);// Set timeout for refresh content 
        }else{
          // $(".print-error-msg").find("ul").html(''); 

          // $(".print-error-msg").css('display','block');

          $.each( data.errors, function( key, value ) {//foreach show error
              $("#" + key).addClass("is-invalid"); //give read border to input field
              // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
              //  sweetalert('warning',value);
              $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

          });
        }
        }
      });
    }
    /// Update action 
    if($('#action_question_type').text()=='Update') // Check Condition for update 
    {
      $.ajax({
        url:'hrm_questiontype/update',
        type:'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
        data: //_token: $('#token').val(),
        $('#question_type_re_form').serialize(),
        success:function(data)
        {
          if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
            console.log(data);
            $('#q_type_re_modal').modal('hide');
            sweetalert('success','The Question Type has been Updated Successfully !!');
            setTimeout(function(){ go_to('hrm_questiontype'); }, 300);// Set timeout for refresh content 
        }else{
          // $(".print-error-msg").find("ul").html(''); 

          // $(".print-error-msg").css('display','block');

          $.each( data.errors, function( key, value ) {//foreach show error
              $("#" + key).addClass("is-invalid"); //give read border to input field
              // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
              //  sweetalert('warning',value);
              $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

          });
        }
        }
      });
      }
    }
    //======= Funtion get value from database to show on modal update =======//
    $(document).on('click', '.update_qestion_type', function(){
      var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
      $.ajax({
       url:"hrm_questiontype/modal",   //Request send to "action.php page"
       type:"GET",    //Using of Post method for send data
       data:{id:id},//Send data to server
       dataType:"json",   //Here we have define json data type, so server will send data in json format.
       success:function(data){
          $('#q_type_re_modal').modal('show');   //It will display modal on webpage
          $('#action_question_type').text("Update"); //This code will change Button value to Update
          $('#card_title').text("Update Question Type");
          $('.print-error-msg').hide();
          $('#question_type_re_form input').removeClass("is-invalid");//remove valid all input field
          $('#question_type_id').val(id);     //It will define value of id variable for update 
          $.each(data, function(i, e){ //read array json for show to textbox
            $('#question_type').val(data[i].name);     
            });     
       }
      });
    });
    //======= END Funtion get value from database to show on modal update =======//
////====== END Question Type Recruitment ====///

////====== Question Recruitment ====///
    /////Function show modal for add
    function AddNewQuestionRe(){
      $('#q_recruitment_modal').modal('show');//Modal show
      $('.print-error-msg').hide(); // hide div show error
      $("#question_recruitment_form textarea").removeClass("is-invalid");
      $("#question_recruitment_form select").removeClass("is-invalid");
      $(".invalid-feedback").children("strong").text("");/// remove errror massage
      $('#card_title').text('Add Question');
      $('#question_name').val('');
      $('#question_type').val('');
      $('#departement').val('');
      $('#position').val('');
      $('#action_question').text('Create'); // Give value to button action of question type submit
    }
    ///// Function insert and Update Question ///////
    function HrmSubmitQuestion(){
      event.preventDefault();
      /// Insert function
      if($('#action_question').text()=='Create') //check condition for create  
      {
      
        $.ajax({
          url:'hrm_question/store',
          type:'POST',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: //_token: $('#token').val(),
          $('#question_recruitment_form').serialize(),
          success:function(data)
          {
            if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
              console.log(data);
              $('#q_recruitment_modal').modal('hide');
              sweetalert('success','The Question has been Insert Successfully !!');
              setTimeout(function(){ go_to('hrm_question'); }, 300);// Set timeout for refresh content 
          }else{
            // $(".print-error-msg").find("ul").html(''); 

            // $(".print-error-msg").css('display','block');

            $.each( data.errors, function( key, value ) {//foreach show error
                $("#" + key).addClass("is-invalid"); //give read border to input field
                // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                //  sweetalert('warning',value);
                $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

            });
          }
          }
        });
      }
      /// Update action 
      if($('#action_question').text()=='Update') // Check Condition for update 
      {
        $.ajax({
          url:'hrm_question/update',
          type:'POST',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: //_token: $('#token').val(),
          $('#question_recruitment_form').serialize(),
          success:function(data)
          {
            if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
              console.log(data);
              $('#q_recruitment_modal').modal('hide');
              sweetalert('success','The Question has been Updated Successfully !!');
              setTimeout(function(){ go_to('hrm_question'); }, 300);// Set timeout for refresh content 
          }else{
            // $(".print-error-msg").find("ul").html(''); 

            // $(".print-error-msg").css('display','block');

            $.each( data.errors, function( key, value ) {//foreach show error
                $("#" + key).addClass("is-invalid"); //give read border to input field
                // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                //  sweetalert('warning',value);
                $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

            });
          }
          }
        });
      }
    }
    //======= Funtion get value from database to show on modal update =======//
    $(document).on('click', '.update_question', function(){
      var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
      $.ajax({
       url:"hrm_question/edit",   //Request send to "action.php page"
       type:"GET",    //Using of Post method for send data
       data:{id:id},//Send data to server
       dataType:"json",   //Here we have define json data type, so server will send data in json format.
       success:function(data){
          $('#q_recruitment_modal').modal('show'); //It will display modal on webpage
          $('#action_question').text("Update"); //This code will change Button value to Update
          $('#card_title').text("Update Question");
          $('.print-error-msg').hide();
          $("#question_recruitment_form textarea").removeClass("is-invalid");
          $("#question_recruitment_form select").removeClass("is-invalid");
          $(".invalid-feedback").children("strong").text("");/// remove errror massage
          $('#hr_recruitment_question_id').val(id);     //It will define value of id variable for update 
          $.each(data, function(i, e){ //read array json for show to textbox 
            $('#question_name').val(data[i].question);
            $('#question_type').val(data[i].hr_recruitment_question_type_id);
            $('#departement').val(data[i].ma_company_dept_id);
            $('#position').val(data[i].ma_position_id);   
            });  
       }
      });
    });
    ///Get modal show for add answer //
    $(document).on('click', '.add_answer_re', function(){
      var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
      $.ajax({
      url:"hrm_question/answer",   //Request send to "action.php page"
      type:"GET",    //Using of Post method for send data
      data:{id:id},//Send data to server
      success:function(data){
          $('#ShowModalQuestionAnswer').html(data);
          $('#answer_recruitment_modal').modal('show');   //It will display modal on webpage
          $("#answer_sugggestion_form textarea").removeClass("is-invalid");//remove all error message
          $("#answer_sugggestion_form select").removeClass("is-invalid");//remove all error message
          $(".invalid-feedback").children("strong").text("");
          $('#answer_name').val('');
      }
      });
    });
    /// Function Add Answer Recruitment ///
function HrmSubmitAnswer(){
  event.preventDefault();
  $.ajax({
    url:'hrm_question/answer/store',
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
     data: //_token: $('#token').val(),
    $('#answer_recruitment_form').serialize(), 
    
    success:function(data)
    {
      if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
        console.log(data);
        $('#answer_recruitment_modal').modal('hide');
        sweetalert('success','The Answer has been Insert Successfully !!');
        setTimeout(function(){ go_to('hrm_question'); }, 300);// Set timeout for refresh content 
    }else{
      $(".print-error-msg").find("ul").html(''); 

      $(".print-error-msg").css('display','block');

      $.each( data.errors, function( key, value ) {//foreach show error
          // $("#" + key).addClass("is-invalid"); //give read border to input field
          $(".print-error-msg").find("ul").append('<li>'+'Field Answer is Required Or Answer the same'+'</li>');
          // $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
          // sweetalert('warning',value);
          var name = $("textarea[name='"+key+"']");
          if(key.indexOf(".") != -1){
            var arr = key.split(".");
            name = $("textarea[name='"+arr[0]+"[]']:eq("+arr[1]+")");
          }
          name.addClass("is-invalid");
          

      });
    }
    }
  });
}
///Get modal show Detail question and answer //
$(document).on('click', '.hrm_re_detail_question_answer', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  $.ajax({
   url:"hrm_question/modal/detail",   //Request send to "action.php page"
   type:"GET",    //Using of Post method for send data
   data:{id:id},//Send data to server
   success:function(data){
      $('#ShowModalQuestionAnswer').html(data);
      $('#modal_detail_queston_answer').modal('show');   //It will display modal on webpage
   }
  });
});
//======= Funtion get value from database to show on modal update =======//
$(document).on('click', '.hrm_question_answer_re', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  $.ajax({
   url:"hrm_question/edit",   //Request send to "action.php page"
   type:"GET",    //Using of Post method for send data
   data:{id:id},//Send data to server
   dataType:"json",   //Here we have define json data type, so server will send data in json format.
   success:function(data){
     var data1 = data; // pass json data to data1 for show in another ajax XD
      $.ajax({
        url:"hrm_question/modal/update",   //Request send to "action.php page"
        type:"GET",    //Using of Post method for send data
        data:{id:id},//Send data to server
        success:function(data){
          $('#ShowModalQuestionAnswer').html(data);
          $('#q_a_recruitment_modal').modal('show'); //It will display modal on webpage
          $('.print-error-msg').hide();
          $("#update_QA_recruitment_form textarea").removeClass("is-invalid");
          $("#update_QA_recruitment_form select").removeClass("is-invalid");
          $(".invalid-feedback").children("strong").text("");/// remove errror massage
          $('#question_id_edit').val(id);     //It will define value of id variable for update 
          $.each(data1, function(i, e){ //read array json for show to textbox 
            $('#question_name_edit').val(data1[i].question);
            $('#question_type_edit').val(data1[i].hr_recruitment_question_type_id);
            $('#departement_edit').val(data1[i].ma_company_dept_id);
            $('#position_edit').val(data1[i].ma_position_id);   
            });
            }
          });
        
   }
  });
});
   /// Function Update Question And Answer Recruitment ///
   function HrmUpdateQuestionAnswer(){
    event.preventDefault();
    $.ajax({
      url:'hrm_question/update/detail',
      type:'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
       data: //_token: $('#token').val(),
      $('#update_QA_recruitment_form').serialize(), 
      
      success:function(data)
      {
        if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
          console.log(data);
          $('#q_a_recruitment_modal').modal('hide');
          sweetalert('success','The Question And Answer has been Update Successfully !!');
          setTimeout(function(){ go_to('hrm_question'); }, 300);// Set timeout for refresh content 
      }else{
        $(".print-error-msg").find("ul").html(''); 
        $(".print-error-msg").css('display','block');
        $.each( data.errors, function( key, value ) {//foreach show error
            // $("#" + key).addClass("is-invalid"); //give read border to input field
             $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
            // sweetalert('warning',value);
            var name = $("textarea[name='"+key+"']");
            if(key.indexOf(".") != -1){
              var arr = key.split(".");
              name = $("textarea[name='"+arr[0]+"[]']:eq("+arr[1]+")");
            }
            name.addClass("is-invalid");
        });
      }
      }
    });
  }
////====== END Question Recruitment ====///
////====== Question Knowledge ====/////

//======View Modal for Add Question Knowledge =====//
function AddNewQuestionKnowledge(){
  $('#question_knowledge_modal').modal('show');//Modal show
  $('.print-error-msg').hide(); // hide div show error
  $("#question_knowledge_form textarea").removeClass("is-invalid");
  $("#question_knowledge_form select").removeClass("is-invalid");
  $('#card_title').text('Add Question');
  $('#question_knowledge').val('');// set empty field
  $('#departement_knowledge').val('');
  $('#action_knowledge').text('Create'); // Give value to button action of question type submit
} 
///// Function insert and Update Question type ///////
function HrmAddQuestionKnowledge(){
  event.preventDefault();
  $("#question_knowledge_form textarea").removeClass("is-invalid");
  $("#question_knowledge_form select").removeClass("is-invalid");//remove valid all input field
/// Insert function
if($('#action_knowledge').text()=='Create') //check condition for create  
{

  $.ajax({
    url:'hrm_list_knowledge_question/store',
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
    data: //_token: $('#token').val(),
    $('#question_knowledge_form').serialize(),
    success:function(data)
    {
      if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
        console.log(data);
        $('#question_knowledge_modal').modal('hide');
        sweetalert('success','The Question has been Insert Successfully !!');
        setTimeout(function(){ go_to('hrm_list_knowledge_question'); }, 300);// Set timeout for refresh content 
    }else{
      // $(".print-error-msg").find("ul").html(''); 

      // $(".print-error-msg").css('display','block');

      $.each( data.errors, function( key, value ) {//foreach show error
          $("#" + key).addClass("is-invalid"); //give read border to input field
          // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
          //  sweetalert('warning',value);
          $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

      });
    }
    }
  });
}
/// Update action 
if($('#action_knowledge').text()=='Update') // Check Condition for update 
{
  $.ajax({
    url:'hrm_list_knowledge_question/update',
    type:'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
    data: //_token: $('#token').val(),
    $('#question_knowledge_form').serialize(),
    success:function(data)
    {
      if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
        console.log(data);
        $('#question_knowledge_modal').modal('hide');
        sweetalert('success','The Question has been Updated Successfully !!');
        setTimeout(function(){ go_to('hrm_list_knowledge_question'); }, 300);// Set timeout for refresh content 
    }else{
      // $(".print-error-msg").find("ul").html(''); 

      // $(".print-error-msg").css('display','block');

      $.each( data.errors, function( key, value ) {//foreach show error
          $("#" + key).addClass("is-invalid"); //give read border to input field
          // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
          //  sweetalert('warning',value);
          $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

      });
    }
    }
  });
  }
}
//======= Funtion get value from database to show on modal update =======//
$(document).on('click', '.update_qestion_knowledge', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  $.ajax({
   url:"hrm_list_knowledge_question/modal",   //Request send to "action.php page"
   type:"GET",    //Using of Post method for send data
   data:{id:id},//Send data to server
   dataType:"json",   //Here we have define json data type, so server will send data in json format.
   success:function(data){
          $('#question_knowledge_modal').modal('show'); //It will display modal on webpage
          $('#action_knowledge').text('Update'); //This code will change Button value to Update
          $('#card_title').text("Update Question");
          $('.print-error-msg').hide();
          $("#question_knowledge_form textarea").removeClass("is-invalid");
          $("#question_knowledge_form select").removeClass("is-invalid");
          $(".invalid-feedback").children("strong").text("");/// remove errror massage
          $('#question_knowledge_id').val(id);     //It will define value of id variable for update 
          $.each(data, function(i, e){ //read array json for show to textbox 
            $('#question_knowledge').val(data[i].question);
            $('#departement_knowledge').val(data[i].ma_company_dept_id); 
            });  
   }
  });
});
////===== END Question Knowledge ====/////

////===== List Candidate ==== ///////

///Get modal show detail candidate//
$(document).on('click', '.hrm_view_list_candidate', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  $.ajax({
   url:"hrm_list_condidate/modal",   //Request send to "action.php page"
   type:"GET",    //Using of Post method for send data
   data:{id:id},//Send data to server
   success:function(data){
      $('#ShowModalCandidate').html(data);
      $('#hrm_view_candidate_modal').modal('show');   //It will display modal on webpage
   }
  });
});
////===== END List Candidate======/////

////===== Result Candidate =====//////
///Function View CV
function hrm_view_cv_detail(id){
  $.ajax({  
    url:"hrm_list_result_condidate/modal/cv",  
    type:"get",  
    data:{id:id},  
    success:function(data){  
        // get id of div in admincheck.php for show modal 
         $('#ModalShowResult').html(data);  
         // set time out for modal view
         $('#HrmModalViewCv').modal('show');
}
});     
}  
///Function View Knowledge Question
function hrm_view_all_normal_q(){
  $.ajax({  
    url:"hrm_list_result_condidate/modal/knowledge",  
    type:"get",  
    data:{},  
    success:function(data){  
        // get id of div in admincheck.php for show modal 
         $('#ModalShowResult').html(data);  
         // set time out for modal view
         $('#HrmModalKnowledgeQuestion').modal('show');  
}
});     
}
function hrm_recruitment_approve(userid,type){
  comment=$('textarea#recruitment_approve_comment').val();
  $.ajax({
      type:'POST',
      url: "hrm_list_result_condidate/submit",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data:{
        user_id:userid,
          type:type,
          comment:comment,
      },
      success: function(data){
        sweetalert('success','The Approval has been Submit Successfully !!');
        go_to('hrm_list_result_condidate');//refresh content  
       }
  });
}
////===== END Result Candidate =====//////
////===== Report Recruitment =====//////

  ///// Get Report Value for Button and Chart
  function hrm_recruitment_get_report_val(from,to){
    $.ajax({
      type:'POST',
      url: "hrm_report_recruitment/report",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data:{
          _from:from,
          _to:to,
          _report:'hi'
      },
      dataType:"json",
      success: function(data){
        $('#re_all').val('អ្នកដាក់ពាក្យ'+' '+'( '+data.all+' )');
        $('#re_app').val('អ្នកជាប់'+' '+'( '+data.app+' )');
        $('#re_pen').val('អ្នករង់ចាំ'+' '+'( '+data.pen+' )');
        $('#re_rej').val('អ្នកបដិសេដ'+' '+'( '+data.rej+' )');
        var data1 = [data.all,data.app,data.pen,data.rej];
        new Chart(document.getElementById("chart-area"), {
          type: 'pie',
          data: {
            labels:["Applies", "Approve", "Pending", "Reject"], //["Africa", "Asia", "Europe", "Latin America", "North America"],
            datasets: [
              {
                label: "Request",
                backgroundColor: ["#007bff", "#28a745","#ffc107","#dc3545"],
                data: data1,//[2478,5267,734,784,433]
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: 'Total Condidate'
            },
          responsive: true,
          }
        });
      }
    });
  }
  ///// Get Report Table Detail Pass Pending and Reject
  function get_report_recruitment_detail(type,from,to){
    //   if(check_session()){
    //   return;
    // }
    $.ajax({
      type:'POST',
      url: "hrm_report_recruitment/report",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data:{
          _from:from,
          _to:to,
          _reportdetail:'hello',
          _type:type,
      },
      success: function(data){
          document.getElementById("hrm_recruitment_report_table").innerHTML = data;
          $('#recruitment_report_tbl').DataTable({
          });
          $('[data-toggle="tooltip"]').tooltip();
      }
    });
  }
  //// Function Modal Get Result Candidate
  function view_result_condidate_report(id){
    $.ajax({  
      url:'hrm_report_recruitment/report/modal/result',  
      type:"GET",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data:{id:id},  
      success:function(data){  
        // get id of div in admincheck.php for show modal  
        document.getElementById("modal_report_recruitment").innerHTML = data;
         // set time out for modal view
         setTimeout(function(){$('#view_result_candidate_modal').modal("show");},200);
      }  
    });  
  }
  ///// Function Show table candidate applied
  function get_report_cv_detail(from,to){
    //   if(check_session()){
    //   return;
    // }
    $.ajax({
      type:'POST',
      url: "hrm_report_recruitment/report",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data:{
          _from:from,
          _to:to,
          _report_cv_detail:'hello'
      },
      success: function(data){
          document.getElementById("hrm_recruitment_report_table").innerHTML = data
          $('#recruitment_candidate_tbl').DataTable({
          });
      }
    });
    }


////===== END Report Recruitment =====//////


/////////////================================= END Recruitment =============================///////////////
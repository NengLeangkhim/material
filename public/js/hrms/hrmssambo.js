//====== Fuction Alert ======//
function sweetalert(type,title){
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  Toast.fire({
    icon: type,
    title: title
  })
}
//==== Function refresh content hrm_question_type_sugg ==//
function goto_hrm_q_type(){
  go_to('hrm_question_type_sugg')
}
////==========Question Type Suggestion============//// 

//======View Modal for Question Type Suggestion =====//
function AddNewQ_type_sugg(){
      $('#q_type_sugg_modal').modal('show');//Modal show
      $('.print-error-msg').hide(); // hide div show error
      $('#model_title').text('Add New');
      $('#question_type_sugg').val('');
      $('#action_q_t_sugg').text('Create'); // Give value to button action of question type submit
} 
//======= ADD and update Question Type ========//
function HrmAddQuestionTypeSugg(){
    event.preventDefault();
    /// Insert question type 
    if($('#action_q_t_sugg').text()=='Create') //check condition for create question type 
    {
      var question_name = $('#question_type_sugg').val(); // get value from textbox
      if(question_name!= '')
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
            setTimeout(goto_hrm_q_type,300); // Set timeout for refresh content 
        }else{
          $(".print-error-msg").find("ul").html(''); 

          $(".print-error-msg").css('display','block');

          $.each( data.errors, function( key, value ) {//foreach show error

              $(".print-error-msg").find("ul").append('<li>'+value+'</li>');

          });
        }
        }
      });
      
      }
      else
      {
        sweetalert('warning','Question Type Fields are Required !!');
      }
    }
    /// Update action Question Type
    if($('#action_q_t_sugg').text()=='Update') // Check Condition for update question type
    {
      var question_name = $('#question_type_sugg').val();
      var id = $('#action_q_t_sugg_id').val();
      if(question_name!= '')
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
            setTimeout(goto_hrm_q_type,300); // Set timeout for refresh content 
        }else{
          $(".print-error-msg").find("ul").html('');

          $(".print-error-msg").css('display','block');

          $.each( data.errors, function( key, value ) {

              $(".print-error-msg").find("ul").append('<li>'+value+'</li>');

          });
        }
        }
      });
      
      }
      else
      {
        sweetalert('warning','Question Type Fields are Required !!');
      }

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
            $('#model_title').text("Update")  
            $('.print-error-msg').hide();
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
         sweetalert('success','The Question Type has been Update Successfully !!');
         setTimeout(goto_hrm_q_type,300);
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
    $('#question_name').val('');
    $('#question_type').val('');
    $('#statusType').val('1');
    $('#action_q_sugg').val('Create');
} 

$('#action_q_sugg').click(function(){
    event.preventDefault();
    var question_name = $('#question_name').val();
    var question_type = $('#question_type').val();
    var statusType = $('#statusType').val();
    var id = $('#q_sugg_id').val();
    var action = $('#action_q_sugg').val();
    if(question_name  != '')
    {
     $.ajax({
      url:"../controller/suggestion/insert_question.php",
      method:'POST',
      data:{
        question_name:question_name, 
        question_type:question_type,
        action:action,
        id:id,
        statusType:statusType
      },
      success:function(data)
      {
         console.log(data);
         //location.reload();
        setTimeout(Reload_recruitment,1000);
        notify_recruitment('The Question has been Successfully !!','success');  
      }
     });
     
    }
    else
    {
        notify_recruitment('Question Fields are Required !!','warn');  
    }
 
   });
   //Function checkbox update status
   $(".checkbox_sugg_q_a").click(function(){
    var checked = $(this).is(":checked");                 
                      if(checked)
                      {
                          var id = $(this).val();
                          var action = "Check";
                          var statusType = 't';
                        $.ajax({
                        url:"../controller/suggestion/insert_question.php",
                        method:'POST',
                        data:{
                          action:action,
                          id:id,
                          statusType:statusType
                        },
                        success:function(data)
                        {
                           console.log(data);
                           // location.reload();
                           setTimeout(Reload_recruitment,1000);
                           notify_recruitment('The Question has been Active !!','success');  
                        }
                       });
                      }
                      if(!checked)
                      {
                          var id = $(this).val();
                          var action = "Check";
                          var statusType = 'f';
                          $.ajax({
                        url:"../controller/suggestion/insert_question.php",
                        method:'POST',
                        data:{
                          action:action,
                          id:id,
                          statusType:statusType
                        },
                        success:function(data)
                        {
                          console.log(data);
                          // location.reload();
                          setTimeout(Reload_recruitment,1000);
                          notify_recruitment('The Question has been Disactive !!','error');  
                        }
                      });
                      }
  
  });
   //Function Update normal Question
   $(document).on('click', '.update_q_sugg', function(){
    var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
    var action = "Select";//We have define action variable value is equal to select
    $.ajax({
     url:"../controller/suggestion/insert_question.php",   //Request send to "action.php page"
     method:"POST",    //Using of Post method for send data
     data:{id:id, action:action},//Send data to server
     dataType:"json",   //Here we have define json data type, so server will send data in json format.
     success:function(data){
        $('#q_sugg_modal').modal('show');   //It will display modal on webpage
        $('#action_q_sugg').val("Update"); 
        $('#model_title').text("Update")     //This code will change Button value to Update
        $('#q_sugg_id').val(id);     //It will define value of id variable to this customer id hidden field
        $('#question_name').val(data.question_name);
        $('#question_type').val(data.question_type);
        $('#statusType').val(data.statusType); //It will assign value of modal last name textbox
       
     }
    });
   });
   function add_answer_sugg(){
    event.preventDefault();
    var question_type = $('#q_sugg_id').val();
    var answer_name = $('#answer_name').val();
    var statusType = $('#statusType').val();
    var id = $('#answer_sugg_id').val();
    var action = $('#action_anwer_sugg').val();
    if(answer_name  != '')
    {
     $.ajax({
      url:"../controller/suggestion/insert_answer.php",
      method:'POST',
      data:{
        answer_name:answer_name, 
        question_type:question_type,
        action:action,
        id:id,
        statusType:statusType
      },
      success:function(data)
      {
         console.log(data);
    
        //   location.reload();
        setTimeout(Reload_recruitment,1000);
        notify_recruitment('The Answer has been Successfully !!','success');  
      }
     });
     
    }
    else
    {
      notify_recruitment('The Answer Fields are Required !!','warn'); 
    }
  
   }
   // Insert Answer
   //select question to show on add answer
   $(document).on('click', '.answer_q_suggestion', function(){
    var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
    var action = "Select_question";//We have define action variable value is equal to select
    $.ajax({
     url:"../controller/suggestion/insert_answer.php",   //Request send to "action.php page"
     method:"POST",    //Using of Post method for send data
     data:{id:id, action:action},//Send data to server
     dataType:"json",   //Here we have define json data type, so server will send data in json format.
     success:function(data){
        $('#answer_suggestion_modal').modal('show');   //It will display modal on webpage
        $('#action_anwer_sugg').val("Add");     //This code will change Button value to Update
        $('#q_sugg_id').val(id); 
        $('#answer_name').val('');    //It will define value of id variable to this customer id hidden field
        $('textarea#question_name').val(data.question);
        //It will assign value of modal last name textbox
     }
    });
   });

   //View Question and Answer
   function view_q_sugg_detail(id){
    $.ajax({  
         url:"../controller/suggestion/modal_view_q_suggestion.php",  
         method:"post",  
         data:{id:id},  
         success:function(data){  
          $('#view_question').html(data);  
          // set time out for modal view
          setTimeout(function(){$('#view_question_answer').modal("show");},200);
  }  
});  
}
function update_q_sugg_detail(id){
    $.ajax({  
      url:"../controller/suggestion/update_q_a_suggestion.php",  
      method:"post",  
      data:{id:id},  
      success:function(data){  
          // get id of div in admincheck.php for show modal 
           $('#update_question').html(data);  
           // set time out for modal view
           setTimeout(function(){$('#questionmodal_answer').modal("show");},200);
          //  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
           var action = "Select";//We have define action variable value is equal to select
           $.ajax({
            url:"../controller/suggestion/insert_question.php",   //Request send to "action.php page"
            method:"POST",    //Using of Post method for send data
            data:{id:id, action:action},//Send data to server
            dataType:"json",   //Here we have define json data type, so server will send data in json format.
            success:function(data){
               //This code will change Button value to Update
               $('#question_id1').val(id);     //It will define value of id variable to this customer id hidden field
               $('#question_name1').val(data.question_name);
               $('#question_type1').val(data.question_type);
               $('#statusType1').val(data.statusType);           
          }  
     });  
}
});     
}  
// $('#action_question_answer').click(function(){
    function update_q_a_suggestion(id){
        var question_name1 = $('textarea#question_name1').val();
        var question_type1 = $('#question_type1').val();
        var statusType1 = $('#statusType1').val();
        // var id = $('#question_answer_id').val();
        var action = $('#action_question_answer_sugg').val(); 
        var question_type_answer = $('#question_id1').val();
        var answer_id = $('input[name="answer_id[]"]').map(function(){return $(this).val();}).get();
        var answer_name = $('textarea[name="answer_name[]"]').map(function(){return $(this).val();}).get();
        var status_answer = $('select[name="status_answer[]"]').map(function(){return $(this).val();}).get();
        if(question_name1 != ''&&question_type1 != '')
        {
         $.ajax({
          url:"../controller/suggestion/insert_answer.php",
          method:'POST',
          data:{
            question_name1:question_name1,
            question_type1:question_type1,
            statusType1:statusType1,
            question_type_answer:question_type_answer,
            answer_name:answer_name,
            answer_id:answer_id, 
            action:action,
            id:id,
            status_answer:status_answer
          },
          success:function(data)
          {
             console.log(data);
            // location.reload();
            setTimeout(Reload_recruitment,1000);
            notify_recruitment('The Question And Answer has been Update Successfully !!','success');  
          }
         });
        //  alert(id);
        }
        else
        {
         alert("Please in put All requirement");
        }
      
    // });
    }
//////// END Question And Answer ///////
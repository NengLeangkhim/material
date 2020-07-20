// // function notification
// function notify_recruitment(st_alert,type){
//   $.notify(st_alert,type);
// }

// // reload function
// function Reload_recruitment(){
//   location.reload();
// }

// // Question Type/////////////////////////////

// function modal_question_type(a=-1){
//     if(a>0){
//         fn='InsertQuestionType('+a+')';
//     }else{
//         fn='InsertQuestionType()';
//     }
//     var modal_question_type='<div class="modal-dialog" role="document">'+
//     '<div class="modal-content">'+
//       '<div class="modal-header text-center" style="background-color:#1fa8e0;">'+
//         '<h5 class="modal-title" id="exampleModalLabel">Add New </h5>'+
//         '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
//           '<span aria-hidden="true">&times;</span>'+
//         '</button>'+
//       '</div>'+
//       '<div class="modal-body">'+
//         '<form action="" method="POST">'+
//             '<div class="row">'+
//                 '<div class="col-md-12">'+
//                     '<div class="form-group">'+
//                         '<label for="question_name">Question Type <span class="text-danger">*</span></label>'+
//                         '<input type="text" class="form-control" id="question_type_name" aria-describedby="question_name" placeholder="" name="question_type_name">'+ 
//                     '</div>'+
//                 '</div>'+
//             '</div>'+
//         '</form>'+
//     '</div>'+
//       '<div class="modal-footer">'+
//         '<button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="'+fn+'">Save</button>'+
//       '</div>'+
//     '</div>'+
//   '</div>';
//   document.getElementById('questiontypemodal').innerHTML=modal_question_type;
// }

// // $(document).ready(function(){
// //     $('#tbl_type').DataTable();
// // });
// function AddNewQuestionType(){
//     modal_question_type();
//     $('#questiontypemodal').modal('show');
//     $('#question_type_name').val('');
//     $('#statusType').val('');
// }
// function InsertQuestionType(a=-1){
//     var qType=document.getElementById('question_type_name').value;
//     var x=new XMLHttpRequest();
//     x.onreadystatechange=function(){
//         if(this.readyState==4 && this.status==200){
//            // location.reload();
//               // location.reload();
//               setTimeout(Reload_recruitment,1000);
//               notify_recruitment('The Question Type has been Success !!','success');
//               //  alert();
//         }
//     }
//     x.open("GET","../controller/recruitment/insert_question_type.php?question_type_name="+encodeURIComponent(qType)+"&qtypeID="+a,true);
//     x.send();
// }

// function EditQuestionType(a) { 
//     $("#tbl_type").on('click','.btn-info',function(){
//         modal_question_type(a);
//         // get the current row
//         var currentRow=$(this).closest("tr");
//         var col1=currentRow.find("td:eq(1)").text(); // get current row 1st TD value
//         /* var col3=currentRow.find("td:eq(2)").text(); // get current row 3rd TD */
//         // var col4=currentRow.find("td:eq(3)").text(); // get current row 4rd TD
//         document.getElementById('question_type_name').value=col1;
//         /* document.getElementById('descriptiontype').value=col2; */
//         $('#questiontypemodal').modal('show');
//    });
//   } 
// // Function checkbox update status
// $(".checkbox_type").click(function(){
//   var checked = $(this).is(":checked");                 
//                     if(checked)
//                     {
//                         var id = $(this).val();
//                         var action = "Check";
//                         var statusType = 't';
//                       $.ajax({
//                       url:"../controller/recruitment/insert_question_type.php",
//                       method:'GET',
//                       data:{
//                         action:action,
//                         id:id,
//                         statusType:statusType
//                       },
//                       success:function(data)
//                       {
//                          console.log(data);
//                          // location.reload();   
//                           //  $('#checkbox_type').html("Active");
//                           //  $('#checkbox_type').css("color,green");
//                           setTimeout(Reload_recruitment,1000);
//                           notify_recruitment('The Question Type has been Active !!','success');
//                       }
//                      });
//                     }
//                     if(!checked)
//                     {
//                         var id = $(this).val();
//                         var action = "Check";
//                         var statusType = 'f';
//                         $.ajax({
//                       url:"../controller/recruitment/insert_question_type.php",
//                       method:'GET',
//                       data:{
//                         action:action,
//                         id:id,
//                         statusType:statusType
//                       },
//                       success:function(data)
//                       {
//                         console.log(data);
//                         // location.reload();
//                         setTimeout(Reload_recruitment,1000);
//                         notify_recruitment('The Question Type has been Disactive !!','error');
//                           //  $('#checkbox_type').html("Inactive");
//                           //  $('#checkbox_type').css("color,red");
//                       }
//                     });
//                     }

// });
// //End Question Type////////////////////

// // Question///////////////////////////

//  function AddNewQuestion(){
//     $('#questionmodal').modal('show');
//     $('#question_name').val('');
//     $('#departement').val('');
//     $('#position').val('');
//     $('#question_type').val('');
//     $('#action').val('Create');
// } 

// $('#action').click(function(){
//     event.preventDefault();
//     var question_name = $('#question_name').val();
//     var question_type = $('#question_type').val();
//     var departement = $('#departement').val();
//     var position = $('#position').val();
//     var id = $('#question_id').val();
//     var action = $('#action').val();
//     if(question_name  != '')
//     {
//      $.ajax({
//       url:"../controller/recruitment/insert_question.php",
//       method:'POST',
//       data:{
//         question_name:question_name, 
//         question_type:question_type,
//         departement:departement,
//         position:position,
//         action:action,
//         id:id
//       },
//     //    contentType:false, 
//     //    processData:false,
//       success:function(data)
//       {
//          console.log(data);
//     //    $('#question')[0].reset();
//     //    $('#questionmodal').modal('hide');
//            //location.reload();
//            setTimeout(Reload_recruitment,1000);
//            notify_recruitment('The Question has been Successfully !!','success');
//       }
//      });
     
//     }
//     else
//     {
//       notify_recruitment('Please Input all Field !!','warn');
//     }
 
//    });
//    //Function checkbox update status
//    $(".checkbox_q_a").click(function(){
//     var checked = $(this).is(":checked");                 
//                       if(checked)
//                       {
//                           var id = $(this).val();
//                           var action = "Check";
//                           var statusType = 't';
//                         $.ajax({
//                         url:"../controller/recruitment/insert_question.php",
//                         method:'POST',
//                         data:{
//                           action:action,
//                           id:id,
//                           statusType:statusType
//                         },
//                         success:function(data)
//                         {
//                            console.log(data);
//                            // location.reload();
//                            setTimeout(Reload_recruitment,1000);
//                            notify_recruitment('The Question has been Active !!','success');
//                             //  $('#checkbox_type').html("Active");
//                             //  $('#checkbox_type').css("color,green");
//                         }
//                        });
//                       }
//                       if(!checked)
//                       {
//                           var id = $(this).val();
//                           var action = "Check";
//                           var statusType = 'f';
//                           $.ajax({
//                         url:"../controller/recruitment/insert_question.php",
//                         method:'POST',
//                         data:{
//                           action:action,
//                           id:id,
//                           statusType:statusType
//                         },
//                         success:function(data)
//                         {
//                           console.log(data);
//                            //location.reload();
//                            setTimeout(Reload_recruitment,1000);
//                            notify_recruitment('The Question has been Disactive !!','error');
//                             //  $('#checkbox_type').html("Inactive");
//                             //  $('#checkbox_type').css("color,red");
//                         }
//                       });
//                       }
  
//   });
//    //Function Update
//    $(document).on('click', '.update_question', function(){
//     var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
//     var action = "Select";//We have define action variable value is equal to select
//     $.ajax({
//      url:"../controller/recruitment/insert_question.php",   //Request send to "action.php page"
//      method:"POST",    //Using of Post method for send data
//      data:{id:id, action:action},//Send data to server
//      dataType:"json",   //Here we have define json data type, so server will send data in json format.
//      success:function(data){
//         $('#questionmodal').modal('show');   //It will display modal on webpage
//         $('#action').val("Update"); 
//         $('#model_title').text("Update")     //This code will change Button value to Update
//         $('#question_id').val(id);     //It will define value of id variable to this customer id hidden field
//         $('#question_name').val(data.question_name);
//         $('#question_type').val(data.question_type);
//         $('#departement').val(data.departement);
//         $('#position').val(data.position);
//         //It will assign value of modal last name textbox
       
//      }
//     });
//    });
//    function add_answer(){
//     event.preventDefault();
//     var question_type = $('#question_id').val();
//     // var answer_name = $('#answer_name').val();
//     // var wrong_right = $('#wrong_right').val();
//     // var statusType = $('#statusType').val();
//     var answer_name = $('textarea[name="answer_name[]"]').map(function(){return $(this).val();}).get();
//     var wrong_right = $('select[name="wrong_right[]"]').map(function(){return $(this).val();}).get();
//     var statusType = $('select[name="status_answer[]"]').map(function(){return $(this).val();}).get();
//     var id = $('#answer_id').val();
//     var action = $('#action_answer').val();
//     if(answer_name  != ',,,')
//     {
//       $.ajax({
//         url:"../controller/recruitment/insert_answer_option.php",
//         method:'POST',
//         data:{
//           answer_name:answer_name, 
//           question_type:question_type,
//           wrong_right:wrong_right,
//           action:action,
//           id:id,
//           statusType:statusType
//         },
//       //    contentType:false, 
//       //    processData:false,
//         success:function(data)
//         {
//           console.log(data);
//       //    $('#question')[0].reset();
//       //    $('#questionmodal').modal('hide');
//           //location.reload();
//           setTimeout(Reload_recruitment,1000);
//           notify_recruitment('The Answer has been Successfully !!','success');
//         }
//       });
//     }
//     else
//     {
//       notify_recruitment('please Input all field !!','warn');
//     }
    
//    }
//    // Insert Answer
//    //select question to show on add answer
//    $(document).on('click', '.answer_question', function(){
//     var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
//     var action = "Select_question";//We have define action variable value is equal to select
//     $.ajax({
//      url:"../controller/recruitment/insert_answer_option.php",   //Request send to "action.php page"
//      method:"POST",    //Using of Post method for send data
//      data:{id:id, action:action},//Send data to server
//      dataType:"json",   //Here we have define json data type, so server will send data in json format.
//      success:function(data){
//         $('#answer_option_modal').modal('show');   //It will display modal on webpage
//         $('#action_answer').val("Add");     //This code will change Button value to Update
//         $('#question_id').val(id);     //It will define value of id variable to this customer id hidden field
//         $('textarea#question_name').val(data.question);
//         $('#answer_name').val('');
//         //It will assign value of modal last name textbox
//      }
//     });
//    });

//    //View Question and Answer
//    function view_question_detail(id){
//     $.ajax({  
//          url:"../controller/recruitment/modal_view_question.php",  
//          method:"post",  
//          data:{id:id},  
//          success:function(data){  
//           $('#view_question').html(data);  
//           // set time out for modal view
//           setTimeout(function(){$('#view_question_answer').modal("show");},200);
//   }  
// });  
// }
// function update_question_detail(id){
//     $.ajax({  
//       url:"../controller/recruitment/update_answer_question.php",  
//       method:"post",  
//       data:{id:id},  
//       success:function(data){  
//           // get id of div in admincheck.php for show modal 
//            $('#update_question').html(data);  
//            // set time out for modal view
//            setTimeout(function(){$('#questionmodal_answer').modal("show");},200);
//           //  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
//            var action = "Select";//We have define action variable value is equal to select
//            $.ajax({
//             url:"../controller/recruitment/insert_question.php",   //Request send to "action.php page"
//             method:"POST",    //Using of Post method for send data
//             data:{id:id, action:action},//Send data to server
//             dataType:"json",   //Here we have define json data type, so server will send data in json format.
//             success:function(data){
//             //  var answername = [data.answer_name];
//                //This code will change Button value to Update
//                $('#question_id1').val(id);     //It will define value of id variable to this customer id hidden field
//                $('#question_name1').val(data.question_name);
//                $('#question_type1').val(data.question_type);
//                $('#departement1').val(data.departement);
//                $('#position1').val(data.position);
//                $('#statusType1').val(data.statusType); 
//               //  $('textarea#answer_name').val(answername);
//               //  $('#wrong_right').val(data.is_right_choice);
//               //  $('#statusType_answer').val(data.answer_status);//It will assign value of modal last name textbox
               
             
//           }  
//      });  
// }
// });     
// }  


// //End Question/////////////////////


// // Answer Choice///////////////////

// // function AddNewAnswer_Option(){
// //     $('#answer_option_modal').modal('show');
// //     $('#answer_name').val('');
// //     $('#question_type').val('');
// //     $('#wrong_right').val('1');
// //     $('#statusType').val('1');
// //     $('#action_answer').val('Create');
// // } 

// // $('#action_question_answer').click(function(){
//   function update_question_answer(id){
//     var question_name1 = $('textarea#question_name1').val();
//     var question_type1 = $('#question_type1').val();
//     var departement1 = $('#departement1').val();
//     var position1 = $('#position1').val();
//     var statusType1 = $('#statusType1').val();
//     // var id = $('#question_answer_id').val();
//     var action = $('#action_question_answer').val(); 
//     var question_type_answer = $('#question_id1').val();
//     var answer_id1= $('input[name="answer_id1[]"]').map(function(){return $(this).val();}).get();
//     var answer_name1 = $('textarea[name="answer_name1[]"]').map(function(){return $(this).val();}).get();
//     var wrong_right1 = $('select[name="wrong_right1[]"]').map(function(){return $(this).val();}).get();
//     var status_answer1 = $('select[name="status_answer1[]"]').map(function(){return $(this).val();}).get();
//     if(question_name1 != ''&&question_type1 != '')
//     {
//      $.ajax({
//       url:"../controller/recruitment/insert_answer_option.php",
//       method:'POST',
//       data:{
//         question_name1:question_name1,
//         question_type1:question_type1,
//         departement1:departement1,
//         position1:position1,
//         statusType1:statusType1,
//         question_type_answer:question_type_answer,
//         answer_name1:answer_name1, 
//         wrong_right1:wrong_right1,
//         action:action,
//         id:id,
//         answer_id1:answer_id1,
//         status_answer1:status_answer1
//       },
//       success:function(data)
//       {
//          console.log(data);
//         // location.reload();
//         setTimeout(Reload_recruitment,1000);
//         notify_recruitment('The Question And Answer has been Update Successfully !!','success');
//       }
//      });
//     //  alert(id);
//     }
//     else
//     {
//       notify_recruitment('Please input all field !!','warn');
//     }
// // });
// }
// //End Answer Choice//////////////////

// //Condidate View//////////
// $(document).on('click', '.view_condidate', function(){
//   var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
//   var action = "view";//We have define action variable value is equal to select
//   $.ajax({
//    url:"../controller/recruitment/view_condidate.php",   //Request send to "action.php page"
//    method:"POST",    //Using of Post method for send data
//    data:{id:id, action:action},//Send data to server
//    dataType:"json",   //Here we have define json data type, so server will send data in json format.
//    success:function(data){
//       $('#condidate_modal').modal('show');   //It will display modal on webpage    //This code will change Button value to Update
//       $('#id_condidate').text(data.id_condidate); 
//       $('#register_date').text(data.register_date);
//       $('#fname').text(data.fname);
//       $('#lname').text(data.lname);
//       $('#name_kh').text(data.name_kh);
//       $('#position').text(data.position);
//       $('#email').text(data.email);
//       $('textarea#interest').val(data.interest);
//       $('#statusType').val(data.statusType);//It will assign value of modal last name textbox
//    }
//   });
//  });
// //////// Question Knowledge
// function AddNewQuestion_knowledge(){
//   $('#question_knowledge_modal').modal('show');
//   $('#question_name').val('');
//   $('#departement').val('');
//   $('#statusType').val('1');
//   $('#action_knowledge').val('Create');
// }
// /// Create question_knowledge
// $('#action_knowledge').click(function(){
//   event.preventDefault();
//   var question_name = $('#question_name').val();
//   var departement = $('#departement').val();
//   var statusType = $('#statusType').val();
//   var id = $('#question_knowledge_id').val();
//   var action = $('#action_knowledge').val();
//   if(question_name  != '')
//   {
//    $.ajax({
//     url:"../controller/recruitment/knowledge_question.php",
//     method:'POST',
//     data:{
//       question_name:question_name, 
//       departement:departement,
//       action:action,
//       id:id,
//       statusType:statusType
//     },
//     success:function(data)
//     {
//        console.log(data);
//         // location.reload();
//         setTimeout(Reload_recruitment,1000);
//         notify_recruitment('The Question has been Successfully !!','success');
//     }
//    });
   
//   }
//   else
//   {
//     notify_recruitment('Please Input all field !!','warn');
//   }
//  });
// ////// Update Question Knowledge
// $(document).on('click', '.update_question_knowledge', function(){
//   var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
//   var action = "Select";//We have define action variable value is equal to select
//   $.ajax({
//    url:"../controller/recruitment/knowledge_question.php",   //Request send to "action.php page"
//    method:"POST",    //Using of Post method for send data
//    data:{id:id, action:action},//Send data to server
//    dataType:"json",   //Here we have define json data type, so server will send data in json format.
//    success:function(data){
//       $('#question_knowledge_modal').modal('show');   //It will display modal on webpage
//       $('#action_knowledge').val("Update"); 
//       $('#model_title').text("Update")     //This code will change Button value to Update
//       $('#question_knowledge_id').val(id);     //It will define value of id variable to this customer id hidden field
//       $('#question_name').val(data.question_name);
//       $('#departement').val(data.departement);
//       $('#statusType').val(data.statusType); //It will assign value of modal last name textbox
     
//    }
//   });
//  });
// //Function checkbox update status
// $(".checkbox_q_k").click(function(){
//   var checked = $(this).is(":checked");                 
//                     if(checked)
//                     {
//                         var id = $(this).val();
//                         var action = "Check";
//                         var statusType = 't';
//                       $.ajax({
//                       url:"../controller/recruitment/knowledge_question.php",
//                       method:'POST',
//                       data:{
//                         action:action,
//                         id:id,
//                         statusType:statusType
//                       },
//                       success:function(data)
//                       {
//                          console.log(data);
//                         // location.reload();
//                         setTimeout(Reload_recruitment,1000);
//                         notify_recruitment('The Question has been Active !!','success');  
//                           //  $('#checkbox_type').html("Active");
//                           //  $('#checkbox_type').css("color,green");
//                       }
//                      });
//                     }
//                     if(!checked)
//                     {
//                         var id = $(this).val();
//                         var action = "Check";
//                         var statusType = 'f';
//                         $.ajax({
//                       url:"../controller/recruitment/knowledge_question.php",
//                       method:'POST',
//                       data:{
//                         action:action,
//                         id:id,
//                         statusType:statusType
//                       },
//                       success:function(data)
//                       {
//                         console.log(data);
//                         // location.reload();
//                         setTimeout(Reload_recruitment,1000);
//                         notify_recruitment('The Question has been Disactice !!','error');
//                           //  $('#checkbox_type').html("Inactive");
//                           //  $('#checkbox_type').css("color,red");
//                       }
//                     });
//                     }

// });
// function view_all_knowledge(id){
//   $.ajax({  
//     url:"../controller/recruitment/modal_view_knowledge.php",  
//     method:"post",  
//     data:{id:id},  
//     success:function(data){  
//       document.getElementById("knowledge_question").innerHTML = data;
//     }  
// });  
// }
// ////////End Question Knowledge///////////////////

// //////// Result Condidate////////
// ////// View result//////
// function view_result_condidate(id,staff_id){
//   $.ajax({  
//     url:"../controller/recruitment/view_result_condidate.php",  
//     method:"post",  
//     data:{id:id,
//       staff_id:staff_id},  
//     success:function(data){  
//       document.getElementById("result_condidate").innerHTML = data;
//     }  
// });  
// }
// function view_cv_detail(id){
//   $.ajax({  
//     url:"../controller/recruitment/modal_view_cv.php",  
//     method:"post",  
//     data:{id:id},  
//     success:function(data){  
//         // get id of div in admincheck.php for show modal 
//          $('#view_cv_condidate').html(data);  
//          // set time out for modal view
//          setTimeout(function(){$('#view_cv_modal').modal("show");},200);
//         //  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
// }
// });     
// }  
// function view_all_normal_q(id){
//   $.ajax({  
//     url:"../controller/recruitment/modal_view_normal_q.php",  
//     method:"post",  
//     data:{id:id},  
//     success:function(data){  
//      // get id of div in admincheck.php for show modal 
//      $('#view_normal_all_question').html(data);  
//      // set time out for modal view
//      setTimeout(function(){$('#view_normal_question').modal("show");},200);
//     //  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
      
//     }  
// });  
// }
// // function approve(userid,type){
// //   // if(check_session()){
// //   //     return;
// //   // }
// //   comment=$('textarea#comment').val();
// //   $.ajax({
// //       type:'POST',
// //       url: "../controller/recruitment/approval.php",
// //       data:{
// //         userid:userid,
// //           type:type,
// //           comment:comment,
// //       },
// //       success: function(data){
// //       //     if(data.length>0){
// //       //         get_approve_view(tar,tt);
// //       //     }
// //            console.log(data);
// //            //location.reload();
// //            setTimeout(Reload_recruitment,1000);
// //            notify_recruitment('Successfully !!','success');
// //        }
// //   });
// // }
// function view_result_condidate_top(id,top){// View result function Top manager
  
//   $.ajax({  
//     url:"../controller/recruitment/view_result_condidate_top.php",  
//     method:"post",  
//     data:{id:id,
//           top:top
//     },  
//     success:function(data){  
//       document.getElementById("result_condidate").innerHTML = data;
//     }  
// });  
// }
// ////////////Report Recruitment//////////////////
// // function reportShow(){
// // //   if(check_session()){
// // //   return;
// // // }
// // // spin('big-guy');
// // var today = new Date();
// // var dd=""+ today.getFullYear();
// // dd+="-"+(today.getMonth()+1);
// // dd += "-"+today.getDate();
// // var xmlhttp = new XMLHttpRequest();
// // xmlhttp.onreadystatechange = function() {
// //   if (this.readyState == 4 && this.status == 200) {
// //       // document.getElementById("big-guy").innerHTML = this.responseText;
// //       if(this.responseText.length>0){
// //           get_report_val(dd,''+dd);
// //       }
// //   }
// // }
// // xmlhttp.open("GET","views/report_recruitment.php" , true);
// // xmlhttp.send();
// // }
// function chart(r){
//   if(check_session()){
//   return;
// }
// var labels = r.map(function(e) {
//   return e.hr_approval_status;
// });
// var data = r.map(function(e) {
//   return e.count;
// });
// new Chart(document.getElementById("chart-area"), {
//   type: 'pie',
//   data: {
//     labels:labels, //["Africa", "Asia", "Europe", "Latin America", "North America"],
//     datasets: [
//       {
//         label: "Request",
//         backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
//         data: data,//[2478,5267,734,784,433]
//       }
//     ]
//   },
//   options: {
//     legend: { display: false },
//     title: {
//       display: true,
//       text: 'Total Condidate'
//     },
//   responsive: true,
//   }
// });
// }
// ///function get report
// function get_report_val(from,to){
// $.ajax({
//   type:'POST',
//   url: "../controller/recruitment/report_value.php",
//   data:{
//       _from:from,
//       _to:to,
//       _report:'hi'
//   },
//   dataType:"json",
//   success: function(data){
//     $('#all').val('អ្នកដាក់ពាក្យ'+' '+'( '+data.all+' )');
//     $('#app').val('អ្នកជាប់'+' '+'( '+data.app+' )');
//     $('#pen').val('អ្នករង់ចាំ'+' '+'( '+data.pen+' )');
//     $('#rej').val('អ្នកបដិសេដ'+' '+'( '+data.rej+' )');
//     // var all = jQuery.parseJSON(data.all);
//     // var app = jQuery.parseJSON(data.app);
//     // var pen = jQuery.parseJSON(data.pen);
//     // var rej = jQuery.parseJSON(data.rej);
//     // $.each(all, function(key,value) {
//     //   alert(value.all);
//     // }); 
//     var data1 = [data.all,data.app,data.pen,data.rej];
//     new Chart(document.getElementById("chart-area"), {
//       type: 'pie',
//       data: {
//         labels:["Applies", "Approve", "Pending", "Reject"], //["Africa", "Asia", "Europe", "Latin America", "North America"],
//         datasets: [
//           {
//             label: "Request",
//             backgroundColor: ["#007bff", "#28a745","#ffc107","#dc3545"],
//             data: data1,//[2478,5267,734,784,433]
//           }
//         ]
//       },
//       options: {
//         legend: { display: false },
//         title: {
//           display: true,
//           text: 'Total Condidate'
//         },
//       responsive: true,
//       }
//     });
//   }
// });
// }
// function get_report_recruitment_detail(type,from,to){
// //   if(check_session()){
// //   return;
// // }
// $.ajax({
//   type:'POST',
//   url: "../controller/recruitment/report_value.php",
//   data:{
//       _from:from,
//       _to:to,
//       _reportdetail:'hello',
//       _type:type,
//   },
//   success: function(data){
//       document.getElementById("report_table").innerHTML = data
//       $('#report_tbl').DataTable({
//       });
//       $('[data-toggle="tooltip"]').tooltip();
//   }
// });
// }
// function view_result_condidate_report(id){// View result function Top manager

//   $.ajax({  
//     url:"../controller/recruitment/modal_view_report_app.php",  
//     method:"post",  
//     data:{id:id
//     },  
//     success:function(data){  
//       // get id of div in admincheck.php for show modal  
//       document.getElementById("modal_report_form").innerHTML = data;
//        // set time out for modal view
//        setTimeout(function(){$('#view_report_appr').modal("show");},200);
//     }  
// });  
// }
// function get_report_cv_detail(from,to){
//   //   if(check_session()){
//   //   return;
//   // }
//   $.ajax({
//     type:'POST',
//     url: "../controller/recruitment/report_value.php",
//     data:{
//         _from:from,
//         _to:to,
//         _report_cv_detail:'hello'
//     },
//     success: function(data){
//         document.getElementById("report_table").innerHTML = data
//         $('#tbl_report_condidate').DataTable({
//         });
//         $('[data-toggle="tooltip"]').tooltip();
//     }
//   });
//   }
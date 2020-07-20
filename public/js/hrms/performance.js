/////// Performance Plan//////// 
function add_perform_plan(){
    $('#modal_perform_plan').modal('show');
    $('#plan_name').val('');
    $('#plan_from').val('');
    $('#plan_to').val('');
    $('#action_plan').val('Create');
} 
/// ADD Performance Plan /////
$('#action_plan').click(function(){
    event.preventDefault();
    var plan_name = $('#plan_name').val();
    var plan_from = $('#plan_from').val();
    var plan_to = $('#plan_to').val();
    var id = $('#plan_id').val();
    var action = $('#action_plan').val();
    if(plan_name  != '')
    {
     $.ajax({
      url:"../controller/performance/insert_perform_plan.php",
      method:'POST',
      data:{
        plan_name:plan_name, 
        plan_from:plan_from,
        plan_to:plan_to,
        action:action,
        id:id,
      },
      success:function(data)
      {
         console.log(data);
        // location.reload();
         setTimeout(Reload_recruitment,1000);
         notify_recruitment('The Performance Plan has been Successfully !!','success');  
      }
     });
     
    }
    else
    {
     notify_recruitment('Please in put all field !!','warn');
    }
   });
   /// Update Plan/////
   function update_plan_perform(id){
    var action = "Select";//We have define action variable value is equal to select
    $.ajax({
     url:"../controller/performance/insert_perform_plan.php",   //Request send to "action.php page"
     method:"POST",    //Using of Post method for send data
     data:{id:id, action:action},//Send data to server
     dataType:"json",   //Here we have define json data type, so server will send data in json format.
     success:function(data){
        $('#modal_perform_plan').modal('show');   //It will display modal on webpage
        $('#action_plan').val("Update"); 
        $('#model_title').text("Update")     //This code will change Button value to Update
        $('#plan_id').val(id);     //It will define value of id variable to this customer id hidden field
        $('#plan_name').val(data.plan_name);
        $('#plan_from').val(data.plan_from);
        $('#plan_to').val(data.plan_to);
       
     }
    });
   };
   //////function plan detail //////////
   $(document).on('click', '.add_plan_detail_view', function(){
    var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
    var action = "Select_Plan";//We have define action variable value is equal to select
    var id_plan = id;
    $.ajax({
     url:"../controller/performance/insert_perform_plan_detail.php",   //Request send to "action.php page"
     method:"POST",    //Using of Post method for send data
     data:{id:id, action:action},//Send data to server
     dataType:"json",   //Here we have define json data type, so server will send data in json format.
     success:function(data){
         data1 = data;
         $.ajax({
          url:"../controller/performance/Modal_perform_plan_detail.php",
          method:"POST",
          data:{id_plan:id_plan},
          success:function(data){
           // console.log(data);
            $('#view_perform_plan_detail').html(data); 
            setTimeout(function(){$('#modal_perform_plan_detail').modal("show");},200);
            $('#action_plan_detail').val("Add");     //This code will change Button value to Update
            $('#plan_datail_id').val(id); 
            $('#plan_name1').val(data1.plan_name);  
            $('#plan_from1').val(data1.plan_from); 
            $('#plan_to1').val(data1.plan_to); 
            // $('#status').val(data1.status); 
            // $('#create_date').val(data1.create_date); 
          }
         });    
     }
    });
   });
   function add_plan_detail(){
    event.preventDefault();
    var plan_id = $('#plan_id1').val();
    var id = $('#plan_datail_id').val();
    var plan_detail_name = $('#plan_detail_name').val();
    var plan_detail_task = $('#plan_detail_task').val();
    var plan_detail_from = $('#plan_detail_from').val();
    var plan_detail_to = $('#plan_detail_to').val();
    var plan_detail_parent = $('#plan_detail_parent').val();
    // var id = $('#answer_sugg_id').val();
    var action = $('#action_plan_detail').val();
    if(plan_detail_name  != '')
    {
     $.ajax({
      url:"../controller/performance/insert_perform_plan_detail.php",
      method:'POST',
      data:{
        plan_id:plan_id,
        plan_detail_name:plan_detail_name, 
        plan_detail_task:plan_detail_task,
        plan_detail_from:plan_detail_from,
        plan_detail_to:plan_detail_to,
        plan_detail_parent:plan_detail_parent,
        action:action,
        id:id
      },
      success:function(data)
      {
         console.log(data);
    
        //   location.reload();
        setTimeout(Reload_recruitment,1000);
        notify_recruitment('The Performane Plan Detail has been Successfully !!','success');  
      }
     });
     
    }
    else
    {
      notify_recruitment('All Fields are Required !!','warn'); 
    }
   }
////view Table plan///////
function view_table_plan(){
    $.ajax({  
         url:"../controller/performance/view_table_plan.php",  
         method:"post",  
         data:{},  
         success:function(data){  
          $('#table_show_plan').html(data);  
  }  
});  
}
////view Table plan detail///////
function view_table_plan_detail(){
  $.ajax({  
       url:"../controller/performance/view_table_plan_detail.php",  
       method:"post",  
       data:{},  
       success:function(data){  
        $('#table_show_plan').html(data);  
}  
});  
}
/// function update plan detail/////
function update_plan_detail(id,id_plan){
  var action = "Select_Plan_id";//We have define action variable value is equal to select
  $.ajax({
   url:"../controller/performance/insert_perform_plan_detail.php",   //Request send to "action.php page"
   method:"POST",    //Using of Post method for send data
   data:{id:id, action:action},//Send data to server
   dataType:"json",   //Here we have define json data type, so server will send data in json format.
   success:function(data){
       data1 = data;
       $.ajax({
        url:"../controller/performance/Modal_perform_plan_detail.php",
        method:"POST",
        data:{id_plan:id_plan},
        success:function(data){
         // console.log(data);
          $('#view_perform_plan_detail').html(data); 
          setTimeout(function(){$('#modal_perform_plan_detail').modal("show");},200);
          $('#action_plan_detail').val("Update");     //This code will change Button value to Update
          $('#plan_datail_id').val(id); 
          $('#plan_id1').val(id_plan);
          $('#plan_name1').val(data1.plan_name);  
          $('#plan_from1').val(data1.plan_from); 
          $('#plan_to1').val(data1.plan_to); 
          $('#plan_detail_name').val(data1.pd_name); 
          $('#plan_detail_task').val(data1.pd_task); 
          $('#plan_detail_from').val(data1.pd_from); 
          $('#plan_detail_to').val(data1.pd_to); 
          $('#plan_detail_parent').val(data1.pd_parent);
          // $('#status').val(data1.status); 
          // $('#create_date').val(data1.create_date); 
        }
       });    
   }
  });
}
/// function view plan detail
function view_plan_detail(id){
  $.ajax({  
    url:"../controller/performance/modal_view_plan_detail.php",  
    method:"post",  
    data:{id:id},  
    success:function(data){  
     $('#view_perform_plan_detail').html(data);  
     setTimeout(function(){$('#modal_plan_detail').modal("show");},200);
}  
}); 
}
//// Function view plan all detail /////
function view_plan_all_detail(id){
  $.ajax({  
    url:"../controller/performance/modal_view_all_plan_detail.php",  
    method:"post",  
    data:{id:id},  
    success:function(data){  
     $('#view_perform_plan_detail').html(data);  
     setTimeout(function(){$('#modal_all_plan_detail').modal("show");},200);
}  
}); 
}
/////// Fuction add schedule staff/////
function add_schedule_staff(){
  $('#modal_schedule_staff').modal('show');
  $('#plan_schedule').val('');
  $('#plan_from_schedule').val('');
  $('#plan_to_schedule').val('');
  $('#plan_detail_schedule').val('');
  $('#schedule_detail_task').text('');
  $('#schedule_detail_from').val('');
  $('#schedule_detail_to').val('');
  $('#staff_schedule').val('');
  $('#staff_from_schedule').val('');
  $('#staff_to_schedule').val('');
  $('#staff_comment_schedule').text('');
  $('#action_schedule_staff').val('Submit');
}
////// Fuction get_plan_schedule()//////
function get_plan_schedule(id){
    var action = 'Select_Plan';
    $.ajax({
      url:"../controller/performance/view_combobox_plan_detail.php",   //Request send to "action.php page"
      method:"POST",    //Using of Post method for send data
      data:{id:id},//Send data to server
      success:function(data){
        data1 = data;
        $.ajax({
          url:"../controller/performance/get_plan_and_detail.php",   //Request send to "action.php page"
          method:"POST",    //Using of Post method for send data
          data:{id:id, action:action},//Send data to server
          dataType:"json",   //Here we have define json data type, so server will send data in json format.
          success:function(data){
                // console.log(data);  combobox_plan_detail
                 $('#plan_from_schedule').val(data.plan_from); 
                 $('#plan_to_schedule').val(data.plan_to); 
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
    url:"../controller/performance/get_plan_and_detail.php",   //Request send to "action.php page"
    method:"POST",    //Using of Post method for send data
    data:{id:id, action:action},//Send data to server
    dataType:"json",   //Here we have define json data type, so server will send data in json format.
    success:function(data){
          // console.log(data);  combobox_plan_detail
           $('#schedule_detail_task').text(data.plan_detail_task); 
           $('#schedule_detail_from').val(data.plan_detail_from);   
           $('#schedule_detail_to').val(data.plan_detail_to);   
    }
   });
}
/// ADD Performance Plan Schedule /////
$('#action_schedule_staff').click(function(){
  event.preventDefault();
  var plan_detail_id =$('#plan_detail_schedule').val();
  var staff_id = $('#staff_schedule').val();
  var schedule_from = $('#staff_from_schedule').val();
  var schedule_to = $('#staff_to_schedule').val();
  var schedule_cmt = $('#staff_comment_schedule').val();
  var id = $('#schedule_plan_id').val();
  var action = $('#action_schedule_staff').val();
  if(plan_detail_id  != '' && staff_id  != '' && schedule_from  != '' && schedule_to  != '')
  {
   $.ajax({
    url:"../controller/performance/insert_perform_plan_schedule.php",
    method:'POST',
    data:{
      plan_detail_id:plan_detail_id, 
      staff_id:staff_id,
      schedule_from:schedule_from,
      schedule_to:schedule_to,
      schedule_cmt:schedule_cmt,
      action:action,
      id:id,
    },
    success:function(data)
    {
       console.log(data);
      // location.reload();
       setTimeout(Reload_recruitment,1000);
       notify_recruitment('The Performance Plan Schedule has been Successfully !!','success');  
    }
   });
   
  }
  else
  {
   notify_recruitment('Please insert all field !!','warn');
  }
 });
 //// Function view Schedule Detail /////
function view_schedule_all_detail(id){
  $.ajax({  
    url:"../controller/performance/modal_view_detail_schedule.php",  
    method:"post",  
    data:{id:id},  
    success:function(data){  
     $('#modal_for_view_schedule').html(data);  
     setTimeout(function(){$('#modal_view_schedule_staff').modal("show");},200);
}  
}); 
}
//// Get Plan detail when select update /////
function get_data_plan_detail(id_plan){
  get_plan_schedule(id_plan);
}
/// Update Schedule Detail/////
function update_schedule_all_detail(id){
  var action = "Select";//We have define action variable value is equal to select
  $.ajax({
   url:"../controller/performance/insert_perform_plan_schedule.php",   //Request send to "action.php page"
   method:"POST",    //Using of Post method for send data
   data:{id:id, action:action},//Send data to server
   dataType:"json",   //Here we have define json data type, so server will send data in json format.
   success:function(data){
      $('#modal_schedule_staff').modal('show');   //It will display modal on webpage
      $('#action_schedule_staff').val("Update"); 
      $('#model_title').text("Update");     //This code will change Button value to Update
      $('#schedule_plan_id').val(id);     //It will define value of id variable to this customer id hidden field
      $('#plan_schedule').val(data.plan_id);
      $('#plan_from_schedule').val(data.plan_from);
      $('#plan_to_schedule').val(data.plan_to);
      $('#plan_detail_schedule').val(data.pd_id);
      // $('#plan_detail_schedule option').text(data.pd_name);
      $('#schedule_detail_task').text(data.pd_task);
      $('#schedule_detail_from').val(data.pd_from);
      $('#schedule_detail_to').val(data.pd_to);
      $('#staff_schedule').val(data.staff_id);
      $('#staff_from_schedule').val(data.sc_from);
      $('#staff_to_schedule').val(data.sc_to);
      $('#staff_comment_schedule').text(data.sc_cmt);  
   }
  });
 };
 ///// Add Function Follow Up Performance /////
 function add_plan_follow_up(id){
  $.ajax({  
    url:"../controller/performance/modal_add_follow_up.php",  
    method:"post",  
    data:{id:id},  
    success:function(data){  
     $('#modal_for_view_follow-up').html(data);  
     setTimeout(function(){$('#modal_add_follow_up').modal("show");},200);
     $('#follow_up_percentage').val('');
     $('#follow_up_reason').val('');
     $('#follow_up_challenge').val('');
     $('#follow_up_comment').val('');
     $('#action_follow_up').val('Submit');
}  
}); 
}
function action_follow_up(){
  event.preventDefault();
  var sc_detail_id =$('#schedule_id').val();
  var fu_percentage = $('#follow_up_percentage').val();
  var fu_reason = $('#follow_up_reason').val();
  var fu_challenge = $('#follow_up_challenge').val();
  var fu_comment = $('#follow_up_comment').val();
  var id = $('#follow_up_id').val();
  var action = $('#action_follow_up').val();
  if(fu_percentage  != '')
  {
   $.ajax({
    url:"../controller/performance/insert_perform_follow_up.php",
    method:'POST',
    data:{
      sc_detail_id:sc_detail_id, 
      fu_percentage:fu_percentage,
      fu_reason:fu_reason,
      fu_challenge:fu_challenge,
      fu_comment:fu_comment,
      action:action,
      id:id,
    },
    success:function(data)
    {
       console.log(data);
      // location.reload();
       setTimeout(Reload_recruitment,1000);
       notify_recruitment('The Performance Follow Up has been Successfully !!','success');  
    }
   });
   
  }
  else
  {
   notify_recruitment('Please insert percentage !!','warn');
  }
 };
 ///// function view modal follow up ////
 function view_follow_up_all_detail(id){
  $.ajax({  
    url:"../controller/performance/modal_view_follow_up.php",  
    method:"post",  
    data:{id:id},  
    success:function(data){  
     $('#div_for_view_follow').html(data);  
     setTimeout(function(){$('#modal_view_follow_up_detail').modal("show");},200);
}  
}); 
}
/// Update Follow Up Detail/////
function update_follow_up_detail(id,id_sc){
  var action = "Select";//We have define action variable value is equal to select
  $.ajax({
  url: "../controller/performance/modal_add_follow_up.php",
  method:"POST",
  data:{id:id_sc},
  success:function(data){
    data1 = data;
    $('#div_for_view_follow').html(data1);
    $.ajax({
      url:"../controller/performance/insert_perform_follow_up.php",   //Request send to "action.php page"
      method:"POST",    //Using of Post method for send data
      data:{id:id, action:action},//Send data to server
      dataType:"json",   //Here we have define json data type, so server will send data in json format.
      success:function(data){
         $('#modal_add_follow_up').modal('show');   //It will display modal on webpage
         $('#action_follow_up').val("Update"); 
         $('#modal_title').text("Update");     //This code will change Button value to Update
         $('#follow_up_id').val(id);     //It will define value of id variable to this customer id hidden field
         var percentage = parseFloat(data.percentage).toFixed(2);
         $('#follow_up_percentage').val(percentage);
         $('#follow_up_reason').text(data.reason);
         $('#follow_up_challenge').text(data.challenge);
         $('#follow_up_comment').text(data.comment);  
      }
     });
  }
  });
 };
 ///// Performance score ///////
 function add_new_performance_score(){
   $('#modal_performance_score').modal('show');
   $('#score_name').val('');
   $('#score_value').val('');
   $('#action_performance_score').val('Create');
 }
 ///// Function Add Performance Score /////
 $('#action_performance_score').click(function(){
  event.preventDefault();
  var pscore_name = $('#score_name').val();
  var pscore_value = $('#score_value').val();
  var id = $('#performance_score_id').val();
  var action = $('#action_performance_score').val();
  if(pscore_name != '' && pscore_value != '')
  {
   $.ajax({
    url:"../controller/performance/insert_performance_score.php",
    method:'POST',
    data:{
      pscore_name:pscore_name,
      pscore_value:pscore_value,
      action:action,
      id:id,
    },
    success:function(data)
    {
       console.log(data);
      // location.reload();
      //  setTimeout(Reload_recruitment,1000);
      //  notify_recruitment('The Performance Score has been Successfully !!','success');  
    }
   });
   
 }
  else
  {
   notify_recruitment('Please insert all field !!','warn');
  }
 });
 //// Update Performance Score /////////
  function update_performance_score(id){
    var action = "Select";//We have define action variable value is equal to select
    $.ajax({
     url:"../controller/performance/insert_performance_score.php",   //Request send to "action.php page"
     method:"POST",    //Using of Post method for send data
     data:{id:id, action:action},//Send data to server
     dataType:"json",   //Here we have define json data type, so server will send data in json format.
     success:function(data){
        $('#modal_performance_score').modal('show');   //It will display modal on webpage
        $('#action_performance_score').val("Update"); 
        $('#model_title').text("Update")     //This code will change Button value to Update
        $('#performance_score_id').val(id);     //It will define value of id variable to this customer id hidden field
        $('#score_name').val(data.pscore_name);
        value_score = parseInt(data.pscore_value);
        $('#score_value').val(value_score);
     }
    });
   };
 ///// Add Function Follow Up Manager Performance /////
 function add_follow_up_manager(id){
  $.ajax({  
    url:"../controller/performance/modal_add_manage_follow_up.php",  
    method:"post",  
    data:{id:id},  
    success:function(data){  
     $('#div_for_view_follow').html(data);  
     setTimeout(function(){$('#modal_add_manage_follow_up').modal("show");},200);
     $('#follow_manage_up_percentage').val('');
     $('#follow_manage_up_score').val('');
     $('#follow_manage_up_comment').val('');
     $('#action_manage_follow_up').val('Submit');
}  
}); 
}
function action_manage_follow_up(){
  event.preventDefault();
  var pf_hidden_id =$('#follow_hidden_up_id').val();
  var fu_manage_percentage = $('#follow_manage_up_percentage').val();
  var fu_manage_score = $('#follow_manage_up_score').val();
  var fu_manage_comment = $('#follow_manage_up_comment').val();
  var id = $('#follow_manage_up_id').val();
  var action = $('#action_manage_follow_up').val();
  if(fu_manage_percentage  != '' && fu_manage_score!='')
  {
   $.ajax({
    url:"../controller/performance/insert_performance_follow_up_manager.php",
    method:'POST',
    data:{
      pf_hidden_id:pf_hidden_id, 
      fu_manage_percentage:fu_manage_percentage,
      fu_manage_score:fu_manage_score,
      fu_manage_comment:fu_manage_comment,
      action:action,
      id:id,
    },
    success:function(data)
    {
       console.log(data);
      // location.reload();
       setTimeout(Reload_recruitment,1000);
       notify_recruitment('The Performance Follow Up has been Successfully !!','success');  
    }
   });
   
  }
  else
  {
   notify_recruitment('Please insert percentage and select Score !!','warn');
  }
 };
 /////Function View Follow up Manager Detail
 function view_follow_up_manager(id){
  $.ajax({  
    url:"../controller/performance/modal_view_follow_up_manager.php",  
    method:"post",  
    data:{id:id},  
    success:function(data){  
     $('#div_for_view_modal_manager').html(data);  
     setTimeout(function(){$('#modal_view_follow_up_manager_detail').modal("show");},200);
}  
}); 
 }
 //// Function Report Performance //////
 function search_report_performance(){
  var from_performance = $('#from_performance').val();
  var to_performance = $('#to_performance').val();
  var dept_performance = $('#dept_performance').val();
  var action = '_perform_detail';
  if(from_performance  != '' && to_performance!='' && dept_performance!='')
  {
  $.ajax({
    url:"../controller/performance/modal_report_table_performance.php",
    method:'POST',
    data:{
      from_performance:from_performance, 
      to_performance:to_performance,
      dept_performance:dept_performance,
      action:action
    },
    success:function(data)
    {
       $('#report_table_performance').html(data);
       $('#report_tbl_performance').DataTable({
        });
        $('[data-toggle="tooltip"]').tooltip();
    }
   }); 
  }else{
    notify_recruitment('Please Select Date and Department !!','warn');
  }
 }
 //// View Detail Report //////
 function view_detail_report(id){
  $.ajax({  
      url:"../controller/performance/modal_view_follow_up_manager.php",  
      method:"post",  
      data:{id:id},  
      success:function(data){  
       $('#modal_report_performance').html(data);  
       setTimeout(function(){$('#modal_view_follow_up_manager_detail').modal("show");},200);
  }  
  }); 
   
 }
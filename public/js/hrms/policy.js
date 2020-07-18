/////// Add Policy//////// 
function AddNew_policy(){
    $('#policy_modal').modal('show');
    $('#policy_name').val('');
    $('#policy_file').val('');
    $('#action_policy').val('Create');
} 
/// ADD Question Type /////
$('.policy_list').submit(function(event){
    event.preventDefault();
    var policy_name = $('#policy_name').val();    
    if(policy_name  != '')
    {
     $.ajax({
      url:"../controller/policy/insert_policy.php",
      method:'POST',
      data:new FormData(this),
      contentType:false,
      processData:false,
      success:function(data)
      {
         console.log(data);
        //  alert(data);
         //location.reload();
         setTimeout(Reload_recruitment,1000);
         notify_recruitment('The Data has been Successfully !!','success'); 
      }
     });
     
    }
    else
    {
     notify_recruitment('All Fields are Required !!','warn'); 
    }
 
   });
    //Function Update
    $(document).on('click', '.update_policy_list', function(){
        var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
        var operation = "Select";//We have define action variable value is equal to select
        $.ajax({
         url:"../controller/policy/insert_policy.php",   //Request send to "action.php page"
         method:"POST",    //Using of Post method for send data
         data:{id:id, operation:operation},//Send data to server
         dataType:"json",   //Here we have define json data type, so server will send data in json format.
         success:function(data){
            $('#policy_modal').modal('show');   //It will display modal on webpage
            $('#action_policy').val("Update"); 
            $('#model_title').text("Update")     //This code will change Button value to Update
            $('#policy_id').val(id);     //It will define value of id variable to this customer id hidden field
            $('#operation').val('Update');
            $('#upload_pdf').html(data.policy_file)// Set to span and get hidden for value 
            $('#policy_name').val(data.policy_name);
            // $('#policy_file').val(data.policy_file);
         }
        });
       });
//Function checkbox update status
$(".checkbox_policy").click(function(){
  var checked = $(this).is(":checked");                 
                    if(checked)
                    {
                        var id = $(this).val();
                        var operation = "Check";
                        var statusType = 't';
                      $.ajax({
                      url:"../controller/policy/insert_policy.php",
                      method:'POST',
                      data:{
                        operation:operation,
                        id:id,
                        statusType:statusType
                      },
                      success:function(data)
                      {
                         console.log(data);
                          location.reload();
                          
                          //  $('#checkbox_type').html("Active");
                          //  $('#checkbox_type').css("color,green");
                      }
                     });
                    }
                    if(!checked)
                    {
                        var id = $(this).val();
                        var operation = "Check";
                        var statusType = 'f';
                        $.ajax({
                      url:"../controller/policy/insert_policy.php",
                      method:'POST',
                      data:{
                        operation:operation,
                        id:id,
                        statusType:statusType
                      },
                      success:function(data)
                      {
                        console.log(data);
                         location.reload();
                        
                          //  $('#checkbox_type').html("Inactive");
                          //  $('#checkbox_type').css("color,red");
                      }
                    });
                    }

});
function view_policy(id,userid){
  var currentdate = new Date();
  var start_time =currentdate.getFullYear() + "-"
  + (currentdate.getMonth()+1)  + "-" 
  + currentdate.getDate() + "   "  
  + currentdate.getHours() + ":"  
  + currentdate.getMinutes() + ":" 
  + currentdate.getSeconds();
  //var operation = 'Select';
  // var id_staff = id;
  // $.ajax({
  //   url:"../view/pdfjs-dist/web/viewer2.php",
  //   method:"post",
  //   data:{id:id},
  //   success:function(data){
  //    // console.log(data);
  //   $("#id_staff").val(data.policy_file);
  //    var test= data;
      // new ajax 
       $.ajax({  
        url:"../controller/policy/view_policy.php",  
        method:"post",  
        data:{id:id},  
        success:function(data){  
          document.getElementById("div_for_view").innerHTML = data; 
         // document.getElementById("body-pdf").innerHTML = test;
          setTimeout(function(){$('#modal_view_pdf').modal("show");},200);
          $('#start_time').val(start_time);
          $('#userid').val(userid);
      //     window.addEventListener('load', function(){
      //     console.log('there');
      //     PDFViewerApplicationOptions.set('defaultUrl',file_pdf);
      // }); 
        //  document.getElementById("body-pdf").innerHTML = test;  
        // $("#iframe_policy").attr('src',test);
        //  var url = "../controller/policy/view_policy.php";
        //  window.open(url);
       // $("#iframe_policy").contents().find("#id_staff").val('5');  
        }    
    });  
  //   }
  // })
}
function sumbit_policy(id){// id policy
    var action = 'Create';
    var checked = $('#verify_policy').is(":checked");
    var max_page = $("#iframe_policy").contents().find("#pageNumber").attr('max');
    var current = $("#iframe_policy").contents().find("#pageNumber").val();
    var current_page = current+'/'+max_page;
    var userid = $('#userid').val();
    var start_time = $('#start_time').val();
    if(checked){
      $.ajax({
        url:"../controller/policy/insert_policy_user.php",
        method:'POST',
        data:{
          action:action, 
          current_page:current_page,
          userid:userid,
          id:id,
          start_time:start_time
        },
        success:function(data)
        {
           console.log(data);
            setTimeout(Reload_recruitment,1000);
            notify_recruitment('Successfully !!','success');
        }
       });
    }else{
      notify_recruitment('Please Agree The Policy !!!','error');
    }
    // $('#pageNumber').attr('max');
}

/////// END List Policy///////
////// List Policy User ///////
function view_policy_detail(id){
  $.ajax({  
    url:"../controller/policy/modal_view_user_policy.php",  
    method:"post",  
    data:{id:id},  
    success:function(data){  
      document.getElementById("policy_user_detail").innerHTML = data;
      setTimeout(function(){$('#view_policy_user').modal("show");},200);
    }    
});  
}
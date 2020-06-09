function getTableReportold(route) {
    document.getElementById("tablediv").innerHTML='<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
    $.ajax({
        type:'GET',
        url:'/gettableold',
       data:{
           _token:'<?php echo csrf_token() ?>',
           table:route,
        },
        success:function(data) {
            document.getElementById('tablediv').innerHTML=data;
       }
    });
 }
 function getTableReport_pagiold(route,page) {
    document.getElementById("tablediv").innerHTML='<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
    $.ajax({
        type:'GET',
        url:'/gettableold',
       data:{
           _token:'<?php echo csrf_token() ?>',
           table:route,
           page:page
        },
        success:function(data) {
            document.getElementById('tablediv').innerHTML=data;
       }
    });
 }
 function getTableReport_searchold(route,search) {
    document.getElementById("tablediv").innerHTML='<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
    $.ajax({
        type:'GET',
        url:'/gettableold',
       data:{
           _token:'<?php echo csrf_token() ?>',
           table:route,
          search:search.value
        },
        success:function(data) {
            document.getElementById('tablediv').innerHTML=data;
       }
    });
 }
 function getTableReport_ftold(route,f,t) {
    document.getElementById("tablediv").innerHTML='<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
    $.ajax({
        type:'GET',
        url:'/gettableold',
       data:{
           _token:'<?php echo csrf_token() ?>',
           table:route,
          from:f,
          to:t,
        },
        success:function(data) {
            document.getElementById('tablediv').innerHTML=data;
       }
    });
 }
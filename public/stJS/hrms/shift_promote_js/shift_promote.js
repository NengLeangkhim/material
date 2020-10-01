


// Function click to promote staff 
function Edit_Promote_Staff(id=-1,pos_id){

    if(id>0){
        v="id="+id;
        j="pos_id="+pos_id;
        var url= '/hrm_management_edit_promote';
    }else{
        v="";
        j="";
    }

    var x=new XMLHttpRequest();
    x.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById('prmote_modal_id').innerHTML=this.responseText;
            $('#edit_promote_staff').modal('show');
        }
    }
    x.open("GET", url + "?" + v + "&" + j, true);
    x.send();

}
// End promote







function submit_staff_promote(id){

    var txtsalary = document.getElementsByName('txtsalary')[0].value;
    var txtposition = document.getElementsByName('sel_position')[0].value;
    var txtcomment = document.getElementsByName('txtcomment')[0].value;

    if(txtsalary == ''){ // if salary emptry field show meessage box alert
        $('#up_salary').show();
        
    }else{ 

        $.ajax({
            type:'GET',
            url:'/hrm_submit_staff_promote',
            data:{
                
                _token:'<?php echo csrf_token() ?>',
                s_id:id,
                txt_position:txtposition,
                txt_salary:txtsalary,
                txt_comment:txtcomment,
            },
            
            success:function(data) { 

                var link = '/hrm_management_shift_promote';
                if(data > 0){
                    var icon = 'success';
                    var message = 'Promote successfully !';
                    alert_show(icon,message);

                }else{
                    var icon = 'error';
                    var message = 'Faile to promote!';
                    alert_show(icon,message);
                }

                $('#edit_promote_staff').modal('hide');
                setTimeout(function(){ go_to(link); }, 1000);
                
                
                
            }
        
        });
    }
  
   

}



// function alert message with bootstrap
function alert_show(icon_,message){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        
        Toast.fire({
            icon: icon_,
            title: message
        })
}










// function to click see thier promote detail
function staff_view_promote_detail(id){

    if(id>0){
        v="id="+id;
        var url= '/hrm_staff_view_promote_detail';
    }else{
        v="";
    }
    var x=new XMLHttpRequest();
    x.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById('prmote_modal_id').innerHTML=this.responseText;
            $('#modal_staff_view_promote').modal('show');
        }
    }
    x.open("GET", url + "?" + v , true);
    x.send();

}





// function to click list row chaid of table promote history
function list_staff_promote_hisotry(st_id,ii){
        s="staffid="+st_id;
        var url= "/hrm_staff_promote_history_list";
        var x=new XMLHttpRequest();
        x.onreadystatechange=function(){
            if(this.readyState==4 && this.status==200){    
                document.getElementById('list_promote_view_'+ ii +'').innerHTML=this.responseText;
                document.getElementById('list_promote_view_'+ ii +'').style.display = "block";
            }
        }
        x.open("GET", url + "?"+ s , true);
        x.send();

}
// end view shift promote history





// function to exit row list
function exit_list_history(ii){
    document.getElementById('list_promote_view_'+ ii +'').style.display = "none";
}
// end







// function to click view detail in shift promote history detail
function staff_promote_history_detail(id,i){

        s="staffid="+id;
        m="number="+i;
        var url= "/hrm_shift_history_listDetail";
        var x=new XMLHttpRequest();
        x.onreadystatechange=function(){
            if(this.readyState==4 && this.status==200){
                document.getElementById('prmote_modal_id').innerHTML=this.responseText;
                $('#shift_view_history_detail').modal('show');
            }
        }
        x.open("GET", url + "?"+ s + "&" + m, true);
        x.send();
  
}
// end function









// Function to search shift report by period of date time

function get_shift_report(from,to){

    $.ajax({
        type:'get',
        url: "/hrm_shift_promote_report_search_view",
        data:{
                 _token:'<?php echo csrf_token() ?>',
                 _from:from,
                 _to:to,
             },
     success: function(data){
        
             document.getElementById("report_promote").innerHTML = data; 
              
     }
     });


 }

//end 







// function to click view detail shift promote report
function staff_promote_report_detail(id,date){
    // alert(id);
    // alert(date);
    s="staffid="+id;
    d="date="+date;
    var url= "/hrm_shift_promote_report_search_view_detail";
    var x=new XMLHttpRequest();
    x.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){

            document.getElementById('prmote_modal_id').innerHTML=this.responseText;
            $('#shift_view_report_detail').modal('show');
        }
    }
    x.open("GET", url + "?"+ s + "&" + d, true);
    x.send();

}
// end function
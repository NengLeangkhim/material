


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

    if(txtcomment == ''){
        $.notify(
            "Do you have any comment ?", 
            { position:"top center" }
        );
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
                $.notify("Promote Successful !", "success");
                document.getElementById("content").innerHTML = data; 
            }
        
        });
    }
  
   

}




// function to click see thier promote detail
function staff_view_promote_detail(id){

    if(id>0){
        v="id="+id;
        // j="pos_id="+pos_id;
        var url= '/hrm_staff_view_promote_detail';
    }else{
        v="";
        // j="";
    }

    var x=new XMLHttpRequest();
    x.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            alert("hiiii");
            document.getElementById('prmote_modal_id').innerHTML=this.responseText;
            $('#edit_promote_staff').modal('show');
        }
    }
    x.open("GET", url + "?" + v , true);
    x.send();

}






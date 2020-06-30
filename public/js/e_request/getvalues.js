function getval(st,target,id){
        if(check_session()){
        return;
    }
    $.ajax({
        type:'GET',
        url: "controller/get_values.php",
        data:{
            _sql:st,
            _id:id.value,
        },
        success: function(data){
            obj = JSON.parse(data);
            document.getElementById(target).value="";
            if(obj[0]){
                document.getElementById(target).value=""+obj[0].name;
            }
      }
    });
}
function getval_sel(st,target){
        if(check_session()){
        return;
    }
    $.ajax({
        type:'GET',
        url: "/ere_get_values",
        data:{
            _sql:st,
        },
        success: function(data){
            obj = JSON.parse(data);
            var tar=document.getElementById(target);
            tar.options.length=0;
            var re =obj;
            var option = document.createElement("option");
                option.text="";
                option.value="-1";
                option.setAttribute('disabled','true');
                option.setAttribute('hidden','true');
                option.setAttribute('selected','true');
                tar.add(option);
            for (var i = 0; i < re.length; i++) {
                var option = document.createElement("option");
                option.text=""+re[i].name;
                option.value=re[i].id;
                tar.add(option);
           }
      }
    });
}
function valid_row(tar){
            var tbody = document.getElementById(tar);
            if(tbody.rows.length<1){
                $('#mvalid_row').modal('show');
                return false;
            }
            return true;
    }
function valid_check(tar){
    if($("input[name='"+tar+"[]']").length){//check if there is a checked check box >=1
        var cntt = $("input[name='"+tar+"[]']:checked").length;
        if(cntt<1){
            // show_msg_box("សូមជ្រើរើសប្រភេទមួយយាងតិច!","បំរាម");
            $("#mvalid_row").modal("show");
            return false;
        }
    }
    return true;
}
function get_list(target,tar){
        if(check_session()){
        return;
    }
    document.getElementById('title').innerHTML="សូមជ្រើសរើសសំណើជាមុនសិន";
    document.getElementById('big-guy').innerHTML="";
    spin(target);
    document.getElementById(tar).innerHTML ="";
    $.ajax({
        type:'POST',
        url: "controller/util.php",
        data:{
            _list:'list',
        },
        success: function(data){
            document.getElementById(target).innerHTML=data;
      }
    });
}


function get_list_view(target,tar){
        if(check_session()){
        return;
    }
    // document.getElementById('title').innerHTML="សូមជ្រើសរើសសំណើជាមុនសិន";
    document.getElementById('big-guy').innerHTML="";
    document.getElementById(tar).innerHTML ="";
    spin(target);
    $.ajax({
        type:'POST',
        url: "controller/util.php",
        data:{
            _list:'view',
        },
        success: function(data){
            document.getElementById(target).innerHTML=data;
      }
    });
}
function spin(tar){
    if( document.getElementById(tar)){
        document.getElementById(tar).innerHTML='<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
    }
}
function get_approve_view(tar){//top management
        if(check_session()){
        return;
    }
    $('[data-toggle="tooltip"]').tooltip('dispose');
    $(tar).html(spinner());
    $.ajax({
        type:'GET',
        url: "ere_apr_view",
        data:{
            _tar:tar,
        },
        success: function(data){
            $(tar).html(data);
            $('.display').DataTable().destroy();
            $('.display').DataTable({
                responsive: true
            });
            $('[data-toggle="tooltip"]').tooltip();
      }
    });
}
function get_view(tar,tt){//normal view
    if(check_session()){
        return;
    }
    $('[data-toggle="tooltip"]').tooltip('dispose');
    $(tar).html(spinner());
    $.ajax({
        type:'GET',
        url: "ere_ownreq",
        data:{
            _type:tt,
            _tar:tar,
        },
        success: function(data){
            $(tar).html(data);
            $('#dttable').DataTable({
                responsive: true
            });
            $('[data-toggle="tooltip"]').tooltip();
      }
    });
}
function get_view_hr(tar,tt){//normal view hr
        if(check_session()){
        return;
    }
    $('[data-toggle="tooltip"]').tooltip('dispose');
    document.getElementById('submenuchange').innerHTML="";
    // document.getElementById('left_list').innerHTML="";
    // document.getElementById('title').innerHTML="";
    spin(tar);
    $.ajax({
        type:'POST',
        url: "controller/get_datatable_value.php",
        data:{
            _typehr:tt,
            _tar:tar,
        },
        success: function(data){
            document.getElementById(tar).innerHTML=data;
            $('#dttable').DataTable({
                responsive: true
            });
            $('[data-toggle="tooltip"]').tooltip();
      }
    });
}
function get_view_val(tar,tt,id){//normal view by staff (big-guy,v,staff_id)
        if(check_session()){
        return;
    }
    $('[data-toggle="tooltip"]').tooltip('dispose');
    document.getElementById('submenuchange').innerHTML="";
    // document.getElementById('left_list').innerHTML="";
    // document.getElementById('title').innerHTML="";
    spin(tar);
    $.ajax({
        type:'POST',
        url: "controller/get_datatable_value.php",
        data:{
            _typev:tt,
            _tar:tar,
            _tar_id:id
        },
        success: function(data){
            document.getElementById(tar).innerHTML=data;
            $('#dttable').DataTable({
                responsive: true
            });
            $('[data-toggle="tooltip"]').tooltip();
      }
    });
}
function approve(tar,erid,comment,type,tt){
    if(check_session()){
        return;
    }
    comment=document.getElementById(comment).value;
    $.ajax({
        type:'POST',
        url: "/ere_approve",
        data:{
            erid:erid,
            type:type,
            comment:comment,
            _token : $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(data){
            if(data.length>0){
                get_approve_view(tar,tt);
            }
        }
    });
}
function get_report_val(tar,from,to){
        if(check_session()){
        return;
    }
    spin(tar);
    $.ajax({
        type:'GET',
        url: "/ere_report",
        data:{
            _from:from,
            _to:to,
            _report:'hi',
        },
        success: function(data){
            if(''+data=='index.php'){
                location.replace(data);
            }else{
                if(data.length>0){
                    // data=JSON.parse(data);
                    try {
                        data=JSON.parse(data);
                        document.getElementById(tar).innerHTML=data[1];
                        // console.log(JSON.parse(data));
                        chart(data[0]);
                    } catch (e) {
                        document.getElementById(tar).innerHTML=data;
                    }
                    $('.display').DataTable().destroy();
                    $('.display').DataTable({
                        responsive: true
                    });
                    $('[data-toggle="tooltip"]').tooltip();
                }else{
                    document.getElementById(tar).innerHTML='No Result Found!';
                }
            }
        }
    });
}
function get_report_val_detail(tar,type,from,to,id){
        if(check_session()){
        return;
    }
    spin(tar);
    $.ajax({
        type:'GET',
        url: "/ere_report",
        data:{
            _from:from,
            _to:to,
            _dept:id,
            _reportdetail:'hello',
            _tar:tar,
            _type:type,
        },
        success: function(data){
            document.getElementById(tar).innerHTML=data;
            // return JSON.parse(data);
            // chart(JSON.parse(data));
            $('.display').DataTable({
                responsive: true
            });
            $('[data-toggle="tooltip"]').tooltip();
        }
    });
}
function get_profile_menu(tar){
        if(check_session()){
        return;
    }
    document.getElementById('submenuchange').innerHTML="";
    spin(tar);
    $.ajax({
        type:'GET',
        url: "views/layouts/profile.php",
        success: function(data){
            document.getElementById(tar).innerHTML=data;
            img_exist();
            // return JSON.parse(data);
            // chart(JSON.parse(data));
            // $('#dttable').DataTable({
            //     responsive: true
            // });
            // $('[data-toggle="tooltip"]').tooltip();
        }
    });
}

function change_password(old,n,f){//,n,confirm,message
    // debugger;
    if(check_session()){
        return;
    }
    t=false;
    // setTimeout(function(){
        $('#prload').modal('show');
    // },100);
    $.ajax({
        type:'POST',
        url: "change_pass",
        async: false,
        data:{
            _oldpass:old.value,
            _token : $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(data){
            setTimeout(function(){$('#prload').hide();},100);
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
           try{
               data=JSON.parse(data);
            }catch(e){

            }
            if(data){
                if(n.value==f.value){
                    $.ajax({
                        type:'POST',
                        url: "change_pass",
                        async: false,
                        data:{
                            _newpass:n.value,
                            _token : $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: function(data){
                            setTimeout(function(){
                                document.getElementById('exampleModalCenterTitle').innerHTML='លេខសំងាត់បានប្តូររួចរាល់!';
                                $('#prmsg').modal('show');
                            },200);
                            setTimeout(function(){
                                $('#prmsg').hide();
                                $('body').removeClass('modal-open');
                                $('.modal-backdrop').remove();
                                go_to('profile');
                            },3000);
                            $t=true;
                        }
                    });
                    // t=true;
                }else{
                    document.getElementById('opasswordHelpBlock').innerHTML='';
                    document.getElementById('cpasswordHelpBlock').innerHTML='លេខសំងាត់ថ្មីនិងបញ្ចាក់លេខសំងាត់មិនត្រូវគ្នា';
                    t= false;
                }
            }else{
                document.getElementById('opasswordHelpBlock').innerHTML='លេខសំងាត់ចាស់របស់អ្នកមិនត្រឹមត្រូវទេ!'
                document.getElementById('cpasswordHelpBlock').innerHTML='';
                t= false;
            }
        },
        error:function(){
            setTimeout(function(){$('#prload').hide();},100);
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            alert('មានបញ្ហាកើតឡើងនៅពេលប្តូរលេខសំងាត់');
        }
    });
    return t;
}
function login(a,b){
    a=document.getElementById(a).value;
    b=document.getElementById(b).value;
    $.ajax({
        type:'POST',
        data:{
            username:a,
            pass:b,
        },
        url: "controller/login.php",
        success: function(data){
            console.log(data);
            if(''+data=='block'){
                document.getElementById('HelpBlockMessage').innerHTML='គណនីរបស់លោកអ្នកត្រូវបានបិទ!';
            }else if(''+data=='no have'){
                document.getElementById('HelpBlockMessage').innerHTML='លេខសំងាត់មិនត្រឹមត្រូវ!';
            }else if(''+data=='null'){
                document.getElementById('HelpBlockMessage').innerHTML='សូមព្យាយាមម្តងទៀត!';
            }else{
                location.replace(data)
            }
        }
    });
}

// function check_session(){
//     $.ajax({
//         type:'GET',
//         url: "controller/check_session.php",
//         async:false,
//         data:{
//             _session:'check',
//         },
//         success: function(data){
//             if(parseInt(data)==0){
//                 location.replace('../main-app/index.php');
//                 return true;
//             }else{
//                 return false;
//             }
//       }
//     });
// }
function img_upload (form){
    var formElement = document.getElementById(form);
    var formData = new FormData(formElement);
    var request = new XMLHttpRequest();
    request.open("POST", "upload_img_profile");
    // formData.append("serialnumber", 111);
    request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            data=this.responseText;
            if(data=='error'){
                alert('មានបញ្ហាកើតឡើងនៅពេលប្តូររូបភាព');
            }else{
                alert('រូបភាពបានប្តូររួចរាល់');
                go_to('profile');
            }
        }else  if (this.readyState == 4 &&this.status == 500){
            alert('មានបញ្ហាកើតឡើងនៅពេលប្តូររូបភាព');
        }else  if (this.readyState == 4 &&this.status == 419){
            alert('មានបញ្ហាកើតឡើងនៅពេលប្តូររូបភាពសូមព្យាយាមម្តងទៀត!');
        }
    };
    request.send(formData);
 }
 function readURL(input,tar) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+tar)
                .attr('src', e.target.result)
                .width(350)
                .height(350);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
function valid_img(img){
    var img = document.getElementById(img);
    var imgg=img.files[0];
    var extention=["jpeg","jpg","png","jfif","exif","bmp"];
    if(imgg){
        if(!(extention.includes(""+(imgg.name.split('.').pop()).toLowerCase()))){
            img.focus();
            alert('សូមជ្រើសរើសរូបភាព!');
            return false;
        }
    }else{
        alert('សូមជ្រើសរើសរូបភាពជាមុនសិន!');
        return false;
    }
    return true;
}
// function OnSubmitCofirm(st){
//     return confirm(st);
//   }
  //use on profile
  function up_img(img,form){
    if(OnSubmitCofirm('បញ្ចាក់អ្នកនឺងប្តូររូបភាពរបស់អ្នក!')){
        if(valid_img(img)){
            img_upload (form);
        }
    }
    return false;
}
// function img_exist(){
//     $( "img" ).each(function( index,item ) {
//         console.log(item);
//         $.ajax({
//             type:'GET',
//             url: $(item).attr('src'),
//             error: function(data){
//                 $(item).attr('src','/media/file/e_request/img/not-found-image-15383864787lu.jpg') ;
//             },
//         });
//       });

// }
function calulate_date_next(s){
    s=$("#"+s).val();

}
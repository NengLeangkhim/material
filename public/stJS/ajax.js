//get summary table for views

function getTable(route,mode) {
    // document.getElementById("tablediv").innerHTML='<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
    $.ajax({
        type:'GET',
        url:'/gettable',
       data:{
           _token:'<?php echo csrf_token() ?>',
           table:route,
           mode:mode,
        },
        success:function(data) {
            document.getElementById('tablediv').innerHTML=data;
       }
    });
 }
 function getTableReport(route) {
    // document.getElementById("tablediv").innerHTML='<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
    $.ajax({
        type:'GET',
        url:'/gettables',
       data:{
           _token:'<?php echo csrf_token() ?>',
           table:route,
        },
        success:function(data) {
            document.getElementById('tablediv').innerHTML=data;
       }
    });
 }
 function getTable_pagi(route,mode,page) {
    // document.getElementById("tablediv").innerHTML='<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
    $.ajax({
        type:'GET',
        url:'/gettable',
       data:{
           _token:'<?php echo csrf_token() ?>',
           table:route,
           mode:mode,
           page:page
        },
        success:function(data) {
            document.getElementById('tablediv').innerHTML=data;
       }
    });
 }
 function getTableReport_pagi(route,page) {
    // document.getElementById("tablediv").innerHTML='<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
    $.ajax({
        type:'GET',
        url:'/gettables',
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
 function getTable_search(route,mode,search) {
    // document.getElementById("tablediv").innerHTML='<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
    $.ajax({
        type:'GET',
        url:'/gettable',
       data:{
           _token:'<?php echo csrf_token() ?>',
           table:route,
           mode:mode,
          search:search.value
        },
        success:function(data) {
            document.getElementById('tablediv').innerHTML=data;
       }
    });
 }
 function getTableReport_search(route,search) {
    // document.getElementById("tablediv").innerHTML='<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
    $.ajax({
        type:'GET',
        url:'/gettables',
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
 function getTableReport_ft(route,f,t) {
    // document.getElementById("tablediv").innerHTML='<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
    $.ajax({
        type:'GET',
        url:'/gettables',
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
 function getTable_limit(route,mode,limit) {
    // document.getElementById("tablediv").innerHTML='<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
    $.ajax({
        type:'GET',
        url:'/gettable',
       data:{
           _token:'<?php echo csrf_token() ?>',
           table:route,
           mode:mode,
          limit:limit.value
        },
        success:function(data) {
            document.getElementById('tablediv').innerHTML=data;
       }
    });
 }
 function getTable_sort(route,mode,sort,o,h) {
    // document.getElementById("tablediv").innerHTML='<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
    $.ajax({
        type:'GET',
        url:'/gettable',
       data:{
            _token:'<?php echo csrf_token() ?>',
            table:route,
            mode:mode,
            sort:sort,
            order:o
        },
        success:function(data) {
            document.getElementById('tablediv').innerHTML=data;
       }
    });
 }
 function getTableReport_sort(route,sort,o,h) {
    // document.getElementById("tablediv").innerHTML='<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
    $.ajax({
        type:'GET',
        url:'/gettables',
       data:{
            _token:'<?php echo csrf_token() ?>',
            table:route,
            sort:sort,
            order:o
        },
        success:function(data) {
            document.getElementById('tablediv').innerHTML=data;

       }
    });
 }
 //end get table
//modal
 function yesno_dialog(vroute,vmessage,vtitle){
    $.ajax({
        type:'GET',
        url:'/modalyesno?',
        data:{
            _token : '<?php echo csrf_token() ?>',
            route:vroute,
            message:vmessage,
            title:vtitle
            },
        success:function(data) {
            document.getElementById('modaldiv').innerHTML=data;
       }
    });
 }
 function ok_dialog(vmessage,vtitle){
    $.ajax({
        type:'GET',
        url:'/modalok?',
        data:{
            _token : '<?php echo csrf_token() ?>',
            message:vmessage,
            title:vtitle
            },
        success:function(data) {
            document.getElementById('modaldiv').innerHTML=data;
       }
    });
 }
 function add_dialog(route){
    $.ajax({
        type:'GET',
        url:route,
        data:{
            _token : '<?php echo csrf_token() ?>',
            },
        success:function(data) {
            $('.modal').hide();
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            document.getElementById('modaldiv').innerHTML=data;
       }
    });
 }
//end modal
 //this fucntion below for select only!
//s=this,target=target select id ,select means id of hidden that store selected value,
 function getbranch(s,target,select,route) {
    $.ajax({
       type:'GET',
       url:route,
       async:false,
       data:{
                _token : '<?php echo csrf_token() ?>',
                _id:s.value,
            },
       success:function(data) {
            var tar=document.getElementById(target);
            var sel=document.getElementById(select);
            tar.options.length=0;
            var re =data.response;
           var option = document.createElement("option");
           option.text = "";
           option.value = "";
           option.setAttribute("selected", "true");
           option.setAttribute("disabled", "true");
           option.setAttribute("hidden", "true");
           tar.add(option);
            for (var i = 0; i < re.length; i++) {
                option = document.createElement("option");
                option.text=""+re[i]['name'];
                option.value=re[i]['id'];
                if(sel){
                    if(re[i]['id']==sel.value){
                        option.setAttribute("selected","true");
                    }
                }
                tar.add(option);
           }
       }
    });
 }
 function getpcode(t,target,route) {
    $.ajax({
       type:'GET',
       url:route,
       data:{
                _token : '<?php echo csrf_token() ?>',
                // _id:s.value,
                _tid:t.value,
            },
       success:function(data) {
            var tar=document.getElementById(target);
            // console.log(data);
           tar.value=data.response[0]['name'];
       }
    });
 }
 function getcustomer_con(s,ss,target,route) {
    $.ajax({
       type:'GET',
       url:route,
       data:{
                _token : '<?php echo csrf_token() ?>',
                customer_id:s.value,
                branch_id:ss.value,
            },
       success:function(data) {
            var tar=document.getElementById(target);
            tar.value="";
            var re =data.response;
             tar.value=re[0]['name'];
       }
    });
 }
 //end for select only!
 //get product for view which has add product
function get_product(s,target,p){
    if (document.readyState === "complete")
    {
        $as="";
        if(document.getElementById('iassign_to')){
            $as="&assign="+document.getElementById('icompany').value
        }
        var comp='';
        if(document.getElementById('icompany')&&document.getElementById('company_branch')){
            comp="&comp_id="+document.getElementById('icompany').value;
            comp+="&branch="+document.getElementById('company_branch').value;
            // alert(document.getElementById('company_branch').value);
        }else if(document.getElementById('company_branch')){
            comp+="?branch="+document.getElementById('company_branch').value;
        }else if(document.getElementById('icompany')){
            comp="&comp_id="+document.getElementById('icompany').value;
        }
        if(s.length<=0)
            s="";
        $.ajax({
            type:'GET',
            url:'/get_product?'+$as+comp,
            data:{
                    _token : '<?php echo csrf_token() ?>',
                    search:s,
                    page:p,
                },
            success:function(data) {
                // console.log(data.response);
                var tar=document.getElementById(target);
                var tara=document.getElementById(target+"_pagi");
                tar.innerHTML=data.response[0];
                tara.innerHTML=data.response[1];
            }
        });
    }else{
        get_product(s,target,p);
    }
 }
 function add_row(id){
    var comp="";
    if(document.getElementById('iassign_to')){
        add_row_assign(id);
        return;
    }
    if(document.getElementById('icompany')&&document.getElementById('company_branch')){
        comp="?comp_id="+document.getElementById('icompany').value;
        comp+="&branch="+document.getElementById('company_branch').value;
    }else if(document.getElementById('company_branch')){
        comp+="?branch="+document.getElementById('company_branch').value;
    }
    var action_type="";
    if(document.getElementById("action_type")){
        action_type=document.getElementById("action_type").value;
        if(action_type=='in'){
            if(comp==""){
                comp+="?act=s";
            }else{
                comp+="&act=s";
            }
        }
    }
    $.ajax({
        type:'GET',
        url:'/add_product'+comp,
        data:{
                 _token : '<?php echo csrf_token() ?>',
                 _id:id,
             },
        success:function(data) {
            val=data.response[0][0];
            if(check_row(val['id'])){
                var row="<tr onchange=calculate_amount(this)>";
                var pid='<input type="hidden" name="pid[]" value="'+val['id']+'">';
                var qty='<input type="number" class="form-control input-sm text-center number" min="1" step="1" name="qty[]" onkeypress="valid_number(event)" value="1" style="margin:0" required>';
                var price='<input type="number" name="price[]" class="form-control input-sm text-center number" min="0.0001" step="0.0001" onkeypress="valid_float(event)" value="'+val['price']+'" style="margin:0">'+
                             '<input type="hidden" name="currency[]" value="'+val['currency_id']+'">';
                var all_qty='<input type="text" class="form-control input-sm text-center" name="a_qty[]" value="'+val['qty']+'" disabled >'+
                            '<input type="hidden" name="all_qty[]" value="'+val['qty']+'">';
                var sc="";
                if(val['storage']+""=='null')
                    {s='Not available';}else{s=val['storage'];}
                if(val['location']+""=='null')
                    {l='Not available';}else{l=val['location'];}
                if(action_type=='in'){
                    s=data.response[1];
                    var storage='<input type="hidden" id="s_loc'+val['id']+'" value="'+val['location_id']+'">';
                    storage+='<select name="storage[]" id="storage'+val['id']+'" class="form-control input-sm text-center" onchange="getbranch(this,\'storage_location'+val['id']+'\',\'s_loc'+val['id']+'\',\'/get_s_location\')" required>';
                    for(i=0;i<s.length;i++){
                        if(s[i]['id']==val['storage_id']){
                            sc="checked";
                        }
                        storage+='<option value="'+s[i]['id']+'"'+sc+'>'+s[i]['name']+'</option>';
                    }
                    if(sc==""){
                        storage+="<option hidden disabled selected value='-1'></option>"
                    }
                    storage+='</select>'

                    var location='<select name="storage_location[]" id="storage_location'+val['id']+'" class="form-control input-sm text-center" required><select>';
                }else{
                    var storage='<input type="hidden" name="storage[]" value="'+val['storage_id']+'">'+s;
                    var location='<input type="hidden" name="storage_location[]" value="'+val['location_id']+'">'+l;
                }
                // for(i=0;i<storage_location.length;i++){
                //     location+='<option value="'+storage_location[i]['id']+'">'+storage_location[i]['name']+'</option>';
                // }
                // location+='</select>';
                if(!val['product_code'])
                    val['product_code']='';
                var tbody = document.getElementById("tbody_b");
                row+='<td>'+(tbody.rows.length+1)+'</td>';
                row+='<td>'+val['product_code']+'</td>';
                row+='<td>'+pid+val['name']+'</td>';
                row+='<td>'+val['barcode']+'</td>';
                row+='<td>'+val['part_number']+'</td>';
                row+='<td>'+storage+'</td>';
                row+='<td>'+location+'</td>';
                row+='<td>'+all_qty+'</td>';
                row+='<td>'+qty+'</td>';
                row+='<td>'+price+'</td>';
                row+='<td></td>';
                row+='<td><i onclick="delete_row(this)" class="fa fa-trash" style="cursor:pointer;"></i></td>';
                row+='</tr>';
                $('#tbody_b').append(row);
                tbody = document.getElementById("tbody_b");
                calculate_amount(tbody.rows[ tbody.rows.length - 1 ]);
                if(document.getElementById("storage"+val['id']))
                getbranch(document.getElementById("storage"+val['id']),"storage_location"+val['id'],"s_loc"+val['id'],"/get_s_location");
            }
        }
     });
 }
 function add_row_assign(id){
    $.ajax({
        type:'GET',
        url:'/add_product',
        data:{
                 _token : '<?php echo csrf_token() ?>',
                 _id:id,
             },
        success:function(data) {
            val=data.response[0][0];
            if(check_row(val['id'])){
                var row="<tr onchange=calculate_amount(this)>";
                var pid='<input type="hidden" name="pid[]" value="'+val['id']+'">';
                if(!val['product_code'])
                    val['product_code']='';
                var tbody = document.getElementById("tbody_b");
                row+='<td>'+(tbody.rows.length+1)+'</td>';
                row+='<td>'+val['product_code']+'</td>';
                row+='<td>'+pid+val['name']+'</td>';
                row+='<td>'+val['barcode']+'</td>';
                row+='<td>'+val['part_number']+'</td>';
                // row+='<td>'+storage+'</td>';
                // row+='<td>'+location+'</td>';
                // row+='<td>'+all_qty+'</td>';
                // row+='<td>'+qty+'</td>';
                // row+='<td>'+price+'</td>';
                // row+='<td></td>';
                row+='<td><i onclick="delete_row(this)" class="fa fa-trash" style="cursor:pointer;"></i></td>';
                row+='</tr>';
                $('#tbody_b').append(row);
                tbody = document.getElementById("tbody_b");
            }
        }
     });
 }

 function delete_row(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("table-cart").deleteRow(i);
    calculate_total_amount();
  }

  function clear_row(){
    document.getElementById("tbody_b").innerHTML="";
    get_product('','tbody_a',1);
  }

  function calculate_amount(r){
        var i = r.rowIndex;
            if(typeof i=='undefined'){
                i=r.index()+1;
            }
        table=document.getElementById("table-cart");
        if(document.getElementById("action_type")){
            action=document.getElementById("action_type");
        }
        all_qty=parseInt(table.rows[i].cells[7].children[1].value);
        qty=parseInt(table.rows[i].cells[8].children[0].value);
        price=parseFloat(table.rows[i].cells[9].children[0].value);
        if(!isNaN(all_qty)){
            if(document.getElementById("action_type")&&(action.value=='out'||action.value=='cout')){
                available=all_qty-qty;
                if(available<0){
                    qty=qty+available;
                    table.rows[i].cells[8].children[0].value=qty;
                    available=all_qty-qty;
                }
            }
            else{
                available=all_qty+qty;
                if(available<0){
                    qty=qty+available;
                    table.rows[i].cells[8].children[0].value=qty;
                    available=all_qty-qty;
                }
            }
        }else{
            if(document.getElementById("action_type")){
                action=document.getElementById("action_type");
                if(action.value=='in'){
                    all_qty=0;
                    available=all_qty+qty;
                    if(available<0){
                        qty=qty+available;
                        table.rows[i].cells[8].children[0].value=qty;
                        available=all_qty-qty;
                    }
                }else{
                    qty=0;
                    amount=0;
                    table.rows[i].cells[8].children[0].value=0;
                    available=0;
                }
            }else{
                qty=0;
                amount=0;
                table.rows[i].cells[8].children[0].value=0;
                available=0;
            }
        }
        amount=price*qty;
        table.rows[i].cells[7].children[0].value=available;
        table.rows[i].cells[10].innerHTML=amount.toFixed(4);
        calculate_total_amount();
    }
  function calculate_total_amount(){
    var tbody = document.getElementById("tbody_b");

    var total=0;
    for(i=0;i<tbody.rows.length;i++){
        total+=parseFloat(tbody.rows[i].cells[10].innerHTML);
    }
    var table=document.getElementById("table-cart");
    var r=table.rows.length-1;
    table.rows[r].cells[1].innerHTML=total.toFixed(4);
  }
  function check_row(id){
      var e=true;
      var p='';
    $('input[name="pid[]"]').each(function (index) {
        if ($(this).val()==id) {
                $(this).parents('tr').find('input[name="qty[]"]').val(parseInt($(this).parents('tr').find('input[name="qty[]"]').val()) + 1);
                p=$(this).parent().parent();
                calculate_amount(p);
                e=false;
        }
    })
    return e;
  }
//get product
//normal validate on html input
  function valid_float(evt) {
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
    // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }
  function valid_number(evt) {
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
    // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]/;
    if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }
  //end normal validation
  function showCompanyDetai(companyID){

  }

  function SubForm (route,form,target){
    if(check_session()){
        return;
    }
   if(SubformValid(form)){
        $.ajax({
            url:route,
            type:'post',
            data:$('#'+form).serialize(),
            success:function(){
                refresh_sel(target,'/refreshSel');
                $('.modal').hide();
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            }
        });
   }
}
function SubformValid(form){
    var t=true;
   $("form#"+form+" :input[required],select[required]").each(function(){
    var input = $(this); // This is the jquery object of the input, do what you will
    if(input.val()==''||input.val()==null){
        this.reportValidity();
        t=false;
        return false;
    }
   });
   return t;
}
function refresh_sel(target,route) {
    var b=[];
    b['customer_branch']='/getcustomer';
    b['storage_location']='/get_s_location';
    b['company_branch']='/getcompany';
    var t=[];
    t['icompany']='company_branch';
    t['istorage']='storage_location';
    t['icustomer']='customer_branch';
    t['iptype']='ptype';
    if(typeof(b[target])=='undefined'){
        $.ajax({
        type:'GET',
        url:route,
        data:{
                    _token : '<?php echo csrf_token() ?>',
                    _id:target,
                },
        success:function(data) {
                var tar=document.getElementById(target);
                tar.options.length=0;
                var re =data.response;
                for (var i = 0; i < re.length; i++) {
                    var option = document.createElement("option");
                    option.text=""+re[i]['name'];
                    option.value=re[i]['id'];
                    tar.add(option);
            }
            if(typeof(t[target])!='undefined'){
                    getbranch(document.getElementById(target),t[target],'s',b[t[target]]);
            }
        }
        });
    }else{
        var tt=[];
            tt['company_branch']='icompany';
            tt['storage_location']='istorage';
            tt['customer_branch']='icustomer';
            getbranch(document.getElementById(tt[target]),t[tt[target]],'s',b[target]);
    }
 }
//  $(document).ready(
//      function(){
//         $('#product_search').keyup(
//             function(){
//                 get_product(this.value,'tbody_a',1);
//             }
//         );
//      });


function go_to(route){
    if(check_session()){
        return;
    }
    if (typeof route !== typeof undefined && route !== false) {
        if(route.length<=0){
            $(".content-wrapper").html(jnot_found());
            return;
        }
        if(route=='/'){
            $(".content-wrapper").html(jnot_found());
            return;
        }
        showloading();
        $.ajax({
            type: 'GET',
            url:route,
            success:function(data){
                $(".content-wrapper").html(data);
                hideloading();
            },
            error:function(jqXHR){
            hideloading();
            $(".content-wrapper").html(jerror());
            if(jqXHR.status==404){
                Swal.fire({ //get from sweetalert function
                    title: 'ERROR Occur',
                    text: "404 Link reuqested not found",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            }
            }
        });
    }
}




function submit_form (route,form,goto,idmodal=''){
    if(check_session()){
        return;
      }
    if(SubformValid(form))
    {
        Swal.fire({ //get from sweetalert function
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.value) {
                if(idmodal.length>0){
                    $("#"+idmodal).modal("hide");
                }
                form_submit(form,route,goto);
            }
          });
    }
 }
function form_submit(form,route,goto){
    var formElement = document.getElementById(form);
    var formData = new FormData(formElement);
    var request = new XMLHttpRequest();
    request.open("POST", route);
    request.onreadystatechange = function () {
        if (this.readyState == 4 ) {
            switch (this.status){
                case 200:
                    data=this.responseText;
                    if(data=='error'){
                        sweetalert('error', 'Data has Problem');
                    }else{
                        // sweetalert('success',this.responseText);
                        // alert(this.responseText);
                        go_to(goto);
                        Swal.fire(
                            'Success',
                            alert,
                            'success'
                        )
                    }
                break;
                case 404:
                    hideloading();
                    errorMessage("404 link requested not found");
                break;
            }
        }
    };
    request.send(formData);
}

 function img_exist(){
    $( "img" ).each(function( index,item ) {
        $.ajax({
            type:'GET',
            url: $(item).attr('src'),
            error: function(data){
                $(item).attr('src','/media/file/img/placeholder-image.png') ;
            },
        });
      });

}


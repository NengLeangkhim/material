function add_row_qty(id,qtya,pricea){//get value to view of company
    var comp="";
    if(document.getElementById('icompany')&&document.getElementById('company_branch')){
        comp="?comp_id="+document.getElementById('icompany').value;
        comp+="&branch="+document.getElementById('company_branch').value;
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
    var approve=document.getElementById("approve").value;
    var apr='';
    // alert(approve+"");
    if(approve+""=="TRUE"){
        apr='disabled';
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
                var qty='<input type="number" class="form-control input-sm text-center number" min="1" step="1" name="qty[]" onkeypress="valid_number(event)" value="'+qtya+'" style="margin:0" disabled>'+
                            '<input type="hidden" name="qty[]" value="'+qtya+'">';
                var price='<input type="number" class="form-control input-sm text-center number" min="0.0001" step="0.0001" onkeypress="valid_float(event)" value="'+pricea+'" style="margin:0" disabled>'+
                            '<input type="hidden" name="price[]" value="'+pricea+'">'+
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
                    var storage='<input type="hidden" id="s_loc'+val['id']+'" value="'+val['location_id']+'"'+apr+'>';
                    storage+='<select name="storage[]" id="storage'+val['id']+'" class="form-control input-sm text-center" onchange="getbranch(this,\'storage_location'+val['id']+'\',\'s_loc'+val['id']+'\',\'/get_s_location\')" required '+apr+'>';
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

                    var location='<select name="storage_location[]" id="storage_location'+val['id']+'" class="form-control input-sm text-center" required '+apr+'><select>';
                }else{
                    var storage='<input type="hidden" name="storage[]" value="'+val['storage_id']+'">'+s;
                    var location='<input type="hidden" name="storage_location[]" value="'+val['location_id']+'">'+l;
                }
                // for(i=0;i<storage_location.length;i++){
                //     location+='<option value="'+storage_location[i]['id']+'">'+storage_location[i]['name']+'</option>';
                // }
                // location+='</select>';
                var tbody = document.getElementById("tbody_b");
                row+='<td>'+(tbody.rows.length+1)+'</td>';
                row+='<td>'+pid+val['name']+'</td>';
                row+='<td>'+val['barcode']+'</td>';
                row+='<td>'+val['part_number']+'</td>';
                row+='<td>'+storage+'</td>';
                row+='<td>'+location+'</td>';
                row+='<td>'+all_qty+'</td>';
                row+='<td>'+qty+'</td>';
                row+='<td>'+price+'</td>';
                row+='<td></td>';
                if(apr==""){
                    row+='<td><i onclick="delete_row(this)" class="fa fa-trash" style="cursor:pointer;"></i></td>';
                }else{
                    row+='<td></td>';
                }
                row+='</tr>';
                $('#tbody_b').append(row);
                tbody = document.getElementById("tbody_b");
                calculate_amount_qty(tbody.rows[ tbody.rows.length - 1 ]);
                if(document.getElementById("storage"+val['id']))
                getbranch(document.getElementById("storage"+val['id']),"storage_location"+val['id'],"s_loc"+val['id'],"/get_s_location");
            }
        }
     });
 }
 function calculate_amount_qty(r){
    var i = r.rowIndex;
        if(typeof i=='undefined'){
            i=r.index()+1;
        }
    table=document.getElementById("table-cart");
    if(document.getElementById("action_type")){
        action=document.getElementById("action_type");
    }
    all_qty=parseInt(table.rows[i].cells[6].children[1].value);
    qty=parseInt(table.rows[i].cells[7].children[0].value);
    price=parseFloat(table.rows[i].cells[8].children[0].value);
    if(!isNaN(all_qty)){
        if(document.getElementById("action_type")&&(action.value=='out'||action.value=='cout')){
            available=all_qty-qty;
            if(available<0){
                qty=qty+available;
                table.rows[i].cells[6].children[0].value=qty;
                available=all_qty-qty;
            }
        }
        else{
            available=all_qty+qty;
            if(available<0){
                qty=qty+available;
                table.rows[i].cells[6].children[0].value=qty;
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
                    table.rows[i].cells[6].children[0].value=qty;
                    available=all_qty-qty;
                }
            }else{
                qty=0;
                amount=0;
                table.rows[i].cells[6].children[0].value=0;
                available=0;
            }
        }else{
            qty=0;
            amount=0;
            table.rows[i].cells[7].children[0].value=0;
            available=0;
        }
    }
    amount=price*qty;
    table.rows[i].cells[6].children[0].value=available;
    table.rows[i].cells[9].innerHTML=amount.toFixed(4);
    calculate_total_amount_qty();
}
function calculate_total_amount_qty(){
    var tbody = document.getElementById("tbody_b");

    var total=0;
    for(i=0;i<tbody.rows.length;i++){
        total+=parseFloat(tbody.rows[i].cells[9].innerHTML);
    }
    var table=document.getElementById("table-cart");
    var r=table.rows.length-1;
    table.rows[r].cells[1].innerHTML=total.toFixed(4);
  }
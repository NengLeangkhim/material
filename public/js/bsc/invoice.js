$(document).ready(function(){
    var count = 1;
    $('.select2').select2();
    // Loop to Display 4 Table
    for(count=0;count<4;count++){
        inSertTable(count);
    }
    // Insert Table
    $('#invoice_form').click(function(){
            inSertTable(count);
            count = count + 1;
    });

    // Remove Table
    $(document).on('click', '.remove', function(){
        var delete_row = $(this).data("row");
        if($(this).closest('tbody').find('tr').length >1){
            $('#' + delete_row).remove();
            showTotal();
        }
    });

    $("#invoice_table tbody").delegate('.item_qty','keyup',function(){
        var qty=$(this).text();


    });
    $("#invoice_table tbody").delegate('.item_unit_price','keyup',function(){
        tr=$(this).closest('tr');
        var price=$(this).text();
        var amount = price * tr.find('.item_qty').text();
        tr.find('.item_amount').text(amount);
        showTotal();
    });

});

function showTotal(){
    let total_amount = 0;
    $('.item_amount').each(function(e){
        if(!isNaN(parseInt($(this).text()))){
            total_amount += parseInt($(this).text());
        }
    });
    document.getElementById('txtTotal').innerHTML=total_amount;
}

function inSertTable(count){
    var tr = '';
    tr +='<tr id="row'+count+'">'+
            '<td contenteditable="true" id="txt_name" class="item_name" data-id="'+count+'"></td>'+
            '<td contenteditable="true" class="item_des"></td>'+
            '<td contenteditable="true" class="item_qty"></td>'+
            '<td contenteditable="true" class="item_unit_price"></td>'+
            '<td contenteditable="true" class="item_account"></td>'+
            '<td contenteditable="true" class="item_tax"></td>'+
            '<td class="tax_rate" id="tax_rate"></td>'+
            '<td class="item_amount" id="item_amount"></td>'+
            '<td style="text-align: center;"><button type="button" name="remove" data-row="row'+count+'" class="btn btn-danger btn-xs remove">x</button></td>'+
        '</tr>';
    $('#invoice_table tbody').append(tr);
}

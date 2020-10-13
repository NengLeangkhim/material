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
            // add class into class select2
            $('.item_select').select2({
                containerCssClass: "add_class_select2"
            });
            $(".select2 .selection .add_class_select2").css('border','0px');
    });

    // Remove Table
    $(document).on('click', '.remove', function(){
        var delete_row = $(this).data("row");
        if($(this).closest('tbody').find('tr').length >1){
            $('#' + delete_row).remove();
            showTotal();
            showGrandTotal();
        }
    });

    $("#invoice_table tbody").delegate('.item_qty','keyup',function(){
        var qty=$(this).text();
    });
    //input in tag tr td
    $("#invoice_table tbody").delegate('.item_unit_price','keyup',function(){
        tr=$(this).closest('tr');
        var price=$(this).text();
        var amount = price * tr.find('.item_qty').text();
        tr.find('.item_amount').text(amount.toFixed(2));
        showTotal();
        showGrandTotal();
    });

    // add class into class select2
    $('.item_select').select2({
        containerCssClass: "add_class_select2"
    });
    $(".select2 .selection .add_class_select2").css('border','0px');

    // input only number
    $('.item_qty').keypress(function(e){
        if (isNaN(String.fromCharCode(e.which))) e.preventDefault();
    });
    // input only number & .
    $('.item_unit_price').keypress(function(e){
        var x = event.charCode || event.keyCode;
        if (isNaN(String.fromCharCode(e.which)) && x!=46 || x===32 || x===13 || (x===46 && event.currentTarget.innerText.includes('.'))) e.preventDefault();
    });

});

// Calculate Grand Total
function showGrandTotal(){
    let total = parseFloat($('#txtTotal').text());
    let totalvat = parseFloat($('#txtVatTotal').text());
    let grandTotal = total + totalvat;
    document.getElementById('txtGrandTotal').innerHTML=grandTotal.toFixed(2);
}
// End Calculate Grand Total
function showTotal(){
    let total_amount = 0;
    $('.item_amount').each(function(e){
        if(!isNaN(parseFloat($(this).text()))){
            total_amount += parseFloat($(this).text());
        }
    });
    document.getElementById('txtTotal').innerHTML=total_amount.toFixed(2);
}
// function insert row
function inSertTable(count){
    var tr = '';
    tr +='<tr id="row'+count+'">'+
            '<td class="item_name" style="padding: 0;"><select style="width: 100%;height: 51px;" class="item_select"><option value="1">item1</option><option value="2">item2</option></select></td>'+
            '<td contenteditable="true" class="item_des"></td>'+
            '<td contenteditable="true" class="item_qty"></td>'+
            '<td contenteditable="true" class="item_unit_price"></td>'+
            '<td contenteditable="true" class="item_account"></td>'+
            '<td contenteditable="true" class="item_tax"></td>'+
            '<td style="padding:0 0;" class="item_tax"><select style="border: 0px; outline: 0px;" class="tax form-control custom-select"><option value=""></option><option value="1">Tax</option><option value="0">No Tax</option></select></td>'+
            '<td class="item_amount" id="item_amount"></td>'+
            '<td style="text-align: center;"><button type="button" name="remove" data-row="row'+count+'" class="btn btn-danger btn-xs remove">x</button></td>'+
        '</tr>';
    $('#invoice_table tbody').append(tr);
}

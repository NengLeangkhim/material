
$(document).ready(function(){

    var count = 1;
    $('.select2').select2();
    // Loop to Display 4 Table
    // for(count=0;count<4;count++){
    //     inSertTable(count);
    // }

    // add class into class select2
    $('.item_select').select2({
        containerCssClass: "add_class_select2"
    });
    $(".select2 .selection .add_class_select2").css('border','0px');

    // Insert new record in Table
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
    // input in tag tr td qty
    $("#invoice_table tbody").delegate('.item_qty','keyup',function(){
        var tr=$(this).closest('tr');
        let discount = tr.find('.item_discount').text() == "" ? 0 : parseInt(tr.find('.item_discount').text());
        let price = tr.find('.item_unit_price').text() == "" ? 0 : parseFloat(tr.find('.item_unit_price').text());
        let qty = $(this).text() == "" ? 0 : parseInt($(this).text());

        let total_amount = show_amount(qty, price, discount);
        tr.find('.item_amount').text(total_amount.toFixed(2));
        showTotal();
        showGrandTotal();
    });
    //input in tag tr td
    $("#invoice_table tbody").delegate('.item_unit_price','keyup',function(){
        var tr=$(this).closest('tr');
        let qty = tr.find('.item_qty').text() == "" ? 0 : parseInt(tr.find('.item_qty').text());
        let discount = tr.find('.item_discount').text() == "" ? 0 : parseInt(tr.find('.item_discount').text());
        let price = $(this).text() == "" ? 0 : parseFloat($(this).text());

        let total_amount = show_amount(qty, price, discount);
        tr.find('.item_amount').text(total_amount.toFixed(2));
        showTotal();
        showGrandTotal();
    });
    // input in tag discount
    $("#invoice_table tbody").delegate('.item_discount','keyup',function(){
        var tr=$(this).closest('tr');
        let qty = tr.find('.item_qty').text() == "" ? 0 : parseInt(tr.find('.item_qty').text());
        let price = tr.find('.item_unit_price').text() == "" ? 0 : parseFloat(tr.find('.item_unit_price').text());
        let discount = $(this).text() == "" ? 0 : parseInt($(this).text());

        let total_amount = show_amount(qty, price, discount);
        tr.find('.item_amount').text(total_amount.toFixed(2));
        showTotal();
        showGrandTotal();

    });

    // input only number
    $('.item_qty').keypress(function(e){
        if (isNaN(String.fromCharCode(e.which))) e.preventDefault();
    });

    // input only number
    $('.item_discount').keypress(function(e){
        if (isNaN(String.fromCharCode(e.which))) e.preventDefault();
    });

    // input only number & .
    $('.item_unit_price').keypress(function(e){
        var x = event.charCode || event.keyCode;
        if (isNaN(String.fromCharCode(e.which)) && x!=46 || x===32 || x===13 || (x===46 && event.currentTarget.innerText.includes('.'))) e.preventDefault();
    });

});
// show new unit price
function unit_prices(price){
    if(!isNaN(parseFloat(price))){
        let unit_prices = (parseFloat(price) * 10)/100 + parseFloat(price);
        return unit_prices;
    }
}
//Total amount after discount
function show_amount(qty,price,discount){
    let discount_price = (qty * price) * discount/100;
    let amount = (qty * price) - discount_price;
    return amount;
}
 //Show amount with tax
 function show_amount_with_tax(discount_type,qty,unit_price,discount){
    if(discount_type == 'percent'){
        let discount_price= (qty * unit_price) * discount/100;
        let amount = (qty * unit_price) - discount_price;
        return amount;
    }else{
        let amount = (unit_price - discount) * qty;
        return amount;
    }
 }
// Calculate Grand Total
function showGrandTotal(){
    let total = parseFloat($('#old_total').val());
    let totalvat = parseFloat($('#txtVatTotal').text());
    let grandTotal = total + totalvat;
    document.getElementById('txtGrandTotal').innerHTML=grandTotal.toFixed(4);
}

// End Calculate Grand Total
function showTotal(){
    let total_amount = 0;
    let old_total_amount = 0;
    $('.item_amount').each(function(e){
        if(!isNaN(parseFloat($(this).text()))){
            total_amount += parseFloat($(this).text());
            old_total_amount += parseFloat($(this).attr("data-amount"));
        }
    });
    document.getElementById('txtTotal').innerHTML=total_amount.toFixed(4);
    $('#old_total').val(parseFloat(old_total_amount).toFixed(4));
}
//Calculate Vat Total
function vatTotal()
{
    let total = parseFloat($('#old_total').val());
    let vat_total= (total * 10)/100;
    document.getElementById('txtVatTotal').innerHTML=vat_total.toFixed(4);
}
// function insert row
function inSertTable(count){
    var tr = '';
    tr +='<tr id="row'+count+'">'+
            '<td class="item_name" style="padding: 0;"><select style="width: 100%;height: 51px;" class="item_select customer_branch_id"><option value="">'+$('#customer_branch_item').val()+'</option></select></td>'+
            '<td class="item_name" style="padding: 0;"><select style="width: 100%;height: 51px;" class="item_select stock_product_id"><option value="1">item1</option><option value="2">item2</option></select></td>'+
            '<td contenteditable="true" class="item_des"></td>'+
            '<td contenteditable="true" class="item_qty"></td>'+
            '<td contenteditable="true" class="item_unit_price"></td>'+
            '<td contenteditable="true" class="item_discount"></td>'+
            '<td contenteditable="false" class="item_account"></td>'+
            '<td style="padding: 0;" class="item_tax"><select style="width: 100%;height: 51px;border:none"><option value=""></option><option value="1">Tax</option><option value="0">No Tax</option></select></td>'+
            '<td class="item_amount" id="item_amount"></td>'+
            // '<td style="text-align: center;"><button type="button" name="remove" data-row="row'+count+'" class="btn btn-danger btn-xs remove">x</button></td>'+
        '</tr>';
    $('#invoice_table tbody').append(tr);
}

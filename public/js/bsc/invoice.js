// Add and remove new record in invoice list
$(document).ready(function(){
    var count = 1;
    $('#add').click(function(){
    count = count + 1;
    var html_code = "<tr id='row"+count+"'>";
    html_code += "<td><input type='text'​ name='item' class='form-control border_table'></td>";
    html_code += "<td><input type='text'​ name='descript' class='form-control border_table'></td>";
    html_code += "<td><input type='text'​ name='quantity' class='form-control border_table'></td>";
    html_code += "<td><input type='text'​ name='unit_price' class='form-control border_table'></td>";
    html_code += "<td><input type='text'​ name='discount' class='form-control border_table'></td>";
    html_code += "<td><input type='text'​ name='account' class='form-control border_table'></td>";
    html_code += "<td><input type='text'​ name='tax_rate' class='form-control border_table'></td>";
    html_code += "<td><input type='text'​ name='amount' class='form-control border_table'></td>";
    html_code += "<td id='remove_center'><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'><i class='fa fa-times'></i></button></td>";
    html_code += "</tr>";
    $('#crud_table').append(html_code);
    });
});

$(document).on('click', '.remove', function(){
    var delete_row = $(this).data("row");
    $('#' + delete_row).remove();
});
//End add and remove new record in invoice list

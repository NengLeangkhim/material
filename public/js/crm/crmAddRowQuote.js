 
 
 
 
    //function to add row table to add quote item
    $(document).ready(function(){
        var i = 0;
        $("#btnAddRowQuoteItem").click(function(){
            var tblRow =
                '<tr id="row'+i+'">' +
                    '<td class="td-item-quote-name">' +
                        '<div class=" form-group">' +
                            '<div class="row form-inline2">' +
                                '<div class="col-md-8 col-sm-6"><input type="text" class="form-control2" name="product_name[]"  required placeholder="Product Name"> </div>' +
                                '<div class="col-md-4 col-sm-6">' +
                                    '<div class="row">'+
                                        '<button type="button" class="btn-list-item btn" name="listItem" > <span>+ Add Service </span></button>'+
                                    '</div>' +
                                    '<div class="row">'+
                                        '<button type="button" class="btn-list-item btn" name="listItem" > <span>+ Add Product </span></button>'+
                                    '</div>'+
                                '</div>' +
                            '</div>' +
                            '<div class="form-inline"><textarea class="form-control" rows="2" style="margin-top:10px; padding:10px; width: 100%!important;" placeholder="Description"></textarea> </div>' +
                        '</div></td>' +
                    '<td class="td-item-quote">' +
                        '<input type="number" class="itemQty form-control" name="quantity[]" id="itemQty" value="1" required placeholder="Qty">' +
                    '</td>' +
                    '<td class="td-item-quote">' +
                        '<input type="text" class="itemPrice form-control" name="listPrice[]" id="itemPrice" required placeholder="0.0$">' +
                    '</td>' +
                    '<td class="td-item-quote">' +
                        '<input type="text" class="form-control" name="subTotal[]" id="itemTotal" readonly required placeholder="0.0$">' +
                    '</td>' +
                    '<td style="width:auto;">' +
                        '<input type="button" style="wdith: 100%;" class="btnRemoveRow btn btn-danger " id="'+i+'" value="Delete" >' +
                    '</td>' +
                '</tr>';
                i++;
            console.log(tblRow);
            $('#add_row_tablequoteItem').append(tblRow);
        });

        $(document).on('click', '.btnRemoveRow', function() {
            var btn_id = $(this).attr("id");
            $('#row' + btn_id + '').remove();
        });

        $(document).keypress(function(e){
            $(".itemQty").keypress(function(e){
                var keyCode = e.which;
                if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) { 
                    return false;
                }
            });

            $(".itemPrice").keypress(function(e){
                var keyCode = e.which;
                if ((e.which != 46 || $(this).val().indexOf('.') != -1) && (keyCode < 48 || keyCode > 57)) { 
                    return false;
                }
            });
        });

        
        
          


    });

   
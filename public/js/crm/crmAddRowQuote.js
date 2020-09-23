 
 
 
 
    //function to add row table to add quote item
    $(document).ready(function(){
        var i = 0;
        $("#btnAddRowQuoteItem").click(function(){
            var tblRow =
                '<tr id="row'+i+'" class="tr-quote-row">' +
                    '<td class="td-item-quote-name">' +
                        '<div class=" form-group">' +
                            '<div class="row form-inline2">' +
                                '<div class="col-md-8 col-sm-6"><input type="text" class="form-control2" name="product_name[]"  required placeholder="Product Name"> </div>' +
                                '<div class="col-md-4 col-sm-6">' +
                                    '<div class="row">'+
                                        '<button type="button" class="btn-list-item btn" name="itemAddService" > <span>+ Add Service </span></button>'+
                                    '</div>' +
                                    '<div class="row">'+
                                        '<button type="button" class="btn-list-item btn" name="itemAddProduct" > <span>+ Add Product </span></button>'+
                                    '</div>'+
                                '</div>' +
                            '</div>' +
                            '<div class="form-inline"><textarea class="form-control" rows="2" style="margin-top:10px; padding:10px; width: 100%!important;" placeholder="Description"></textarea> </div>' +
                        '</div></td>' +
                    '<td class="td-item-quote">' +
                        '<input type="number" class="itemQty form-control" name="quantity[]" id="itemQty" value="1" required placeholder="Qty">' +
                    '</td>' +
                    '<td class="td-item-quote">' +
                        '<div class="">' +
                            '<input type="text" class="itemPrice form-control" name="listPrice[]" id="itemPrice" required placeholder="0.0$">' +
                        '</div>'+
                        '<div class="">' +
                            '<button type="button" class="btn-list-item btn" name="itemDiscount" > <span>(-) Discount </span></button>'+
                        '</div>' +
                        '<div class="btn-list-item" style="margin-left: 15px; margin-top:10px;">' +
                            '<span>Total After Discount: </span>'+
                        '</div>' +
                    '</td>' +
                    '<td class="td-item-quote ">' +
                        '<div class="td-quote-total"><span>0.0</span></div>' +
                        '<div class="td-quote-total"><span>0.0</span></div>' +
                        '<div class="td-quote-total"><span>0.0</span></div>' +
                    '</td>' +
                    '<td style="width:auto;">' +
                        '<input type="button" style="width: 100%;" class="btnRemoveRow btn btn-danger " id="'+i+'" value="Delete" >' +
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

   
 
 
 
 
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
                                        '<button type="button" class="btn-list-item btn itemAddProduct" id="'+i+'" > <span>+ Add Product </span></button>'+
                                    '</div>' +
                                    '<div class="row">'+
                                        '<button type="button" class="btn-list-item btn itemAddService" id="'+i+'"  > <span>+ Add Service </span></button>'+
                                    '</div>'+
                                '</div>' +
                            '</div>' +
                            '<div class="form-inline"><textarea class="form-control" rows="2" style="margin-top:10px; padding:10px; width: 100%!important;" placeholder="Description"></textarea> </div>' +
                        '</div></td>' +
                    '<td style="width: 120px;">' +
                        '<input type="number"  class="valid-numeric form-control" name="quantity[]" id="itemQty" value="1" required placeholder="Qty">' +
                    '</td>' +
                    '<td class="td-item-quote">' +
                        '<div class="">' +
                            '<input type="text" class="valid-numeric-float form-control" name="listPrice[]" id="itemPrice" required placeholder="0.0$">' +
                        '</div>'+
                        '<div class="row pt-1 form-inline">' +
                            '<div class="col-md-6 col-sm-6 col-6">' +
                                '<select class="btn-list-item mdb-select md-form" id="'+i+'" > ' +
                                    '<option value=""><span>+Discount (%)</span> </option>'+
                                    '<option value=""><span>+Discount ($)</span> </option>'+
                                '</select>'+
                            '</div>'+
                            '<div class="col-md-6 col-sm-6 col-6">' +
                                '<input type="text"  class="txtbox-quote valid-numeric-float " name="itemDiscount[]" id="itemDiscount"  placeholder="0.0%">' +
                            '</div>'+
                        '</div>' +
                        '<div class="btn-list-item" style="color:black; margin-left: 7px; margin-top:15px;">' +
                            '<span>Total After Discount: </span>'+
                        '</div>' +
                        '<div class="btn-list-item" style="color:red; margin-left: 7px; margin-top:15px;">' +
                            '<span>Net Price: </span>'+
                        '</div>' +
                    '</td>' +
                    '<td class="td-item-quote ">' +
                        '<div class="td-quote-total"><span>1000</span></div>' +
                        '<div class="td-quote-total"><span>100</span></div>' +
                        '<div class="td-quote-total"><span>900</span></div>' +
                        '<div style="color:red;"class="td-quote-total"><span>900</span></div>' +
                    '</td>' +
                    '<td style="width:auto;">' +
                        '<button style="width: auto;" class="btnRemoveRow btn btn-denger" id="'+i+'" ><span><i style="color:#d42931;" class="fa fa-trash"></i></span></button>' +
                    '</td>' +
                '</tr>';
                i++;
            console.log(tblRow);
            $('#add_row_tablequoteItem').append(tblRow);
        });

        //function button remove row table
        $(document).on('click', '.btnRemoveRow', function() {
            var btn_id = $(this).attr("id");
            $('#row' + btn_id + '').remove();
            $i--;
        });


        //function to prvent use select string to numeric field 
        $(document).keypress(function(e){
            $(".valid-numeric").keypress(function(e){
                var keyCode = e.which;
                if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) { 
                    return false;
                }
            });

            $(".valid-numeric-float").keypress(function(e){
                var keyCode = e.which;
                if ((e.which != 46 || $(this).val().indexOf('.') != -1) && (keyCode < 48 || keyCode > 57)) { 
                    return false;
                }
            });

            


        });



        //function for user click add item product
        $(document).on('click', '.itemAddProduct', function() {
            var btn_id = $(this).attr("id");
            alert(btn_id);
        });



        //function for user click add service product 
        $(document).on('click', '.itemAddService', function() {
            var btn_id = $(this).attr("id");
            alert(btn_id);
        });


     

        
        
          


    });

   
        // '<input type="button" class="btn-list-item btn " id="'+i+'" > <span>(-) Discount </span></button>'+

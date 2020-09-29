 
 
 
 
    //function to add row table to add quote item
    $(document).ready(function(){
        var i = 0;

        $("#btnAddRowQuoteItem").click(function(){
            var tblRow =
                '<tr id="row'+i+'" class="tr-quote-row">' +
                    '<td class="td-item-quote-name">' +
                        '<div class=" form-group">' +
                            '<div class="row form-inline2">' +
                                '<div class="col-md-8 col-sm-8 col-8"><input type="text" class="form-control2" name="product_name[]"  required placeholder="Product Name"> </div>' +
                                '<div class="col-md-4 col-sm-4 col-4">' +
                                    '<div class="row-12">'+
                                        '<button type="button" style="color:white; width: 100%;" class="btn-list-item txtbox-quote  btn-info addItemProduct_'+i+'"   name="addItemProduct"  id="'+i+'" > <span>+ Add Product </span></button>'+
                                    '</div>' +
                                    '<div class="row-12 pt-1">'+
                                        '<button type="button" style="color:white; width: 100%;" class="btn-list-item txtbox-quote  btn-info addItemService_'+i+'"  name="addItemService"  id="'+i+'"  > <span>+ Add Service </span></button>'+
                                    '</div>'+
                                '</div>' +
                            '</div>' +
                            '<div class="form-inline"><textarea class="form-control" rows="2" style="margin-top:10px; padding:10px; width: 100%!important;" placeholder="Description"></textarea> </div>' +
                        '</div>' +
                    '</td>' +
                    '<td>' +
                        '<span><p>Product</p></span>'+
                    '</td>'+
                    '<td style="width: 120px;">' +
                        '<input type="text"  class="valid-numeric form-control itemQty_'+i+'" name="quantity[]" id="'+i+'"  demo="itemQty"  value="1"  required placeholder="Qty">' +
                    '</td>' +
                    '<td class="td-item-quote">' +
                        '<div class="">' +
                            '<input type="text" class="valid-numeric-float form-control itemPrice_'+i+'" name="listPrice[]" id="'+i+'"  demo="itemPrice" required placeholder="0.0$">' +
                        '</div>'+
                        '<div class="row pt-1 form-inline">' +
                            '<div class="col-md-6 col-sm-6 col-6">' +
                                '<select  class="select-itemDiscount btn-list-item mdb-select md-form" name="select-itemDiscount_'+i+'" id="'+i+'" > ' +
                                    '<option value="1"><span>+Discount (%)</span> </option>'+
                                    '<option value="2"><span>+Discount ($)</span> </option>'+
                                '</select>'+
                            '</div>'+
                            '<div class="col-md-6 col-sm-6 col-6 field-input-discount" data-id="'+i+'" id="fieldItemDiscount_'+i+'">' +
                                '<input type="text"  class="itemDisPercent_'+i+' txtbox-quote valid-numeric-float" name="itemDiscountPercent[]" id="txtDiscount_'+i+'" demo="itemDisPercent" data-id="'+i+'" placeholder="0.0%">' +
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
                        '<div id="quote-sub-total_'+i+'" class="td-quote-total">0</div>' +
                        '<div id="quote-sub-discount_'+i+'" class="td-quote-total">0</div>' +
                        '<div id="quote-after-sub-disc_'+i+'" class="td-quote-total">0</div>' +
                        '<div id="quote-netPrice_'+i+'" style="color:red;"class="td-quote-total">0</div>' +
                    '</td>' +
                    '<td style="width:auto;">' +
                        '<button style="width: auto;" class="btnRemoveRow btn btn-denger" id="'+i+'" ><span><i style="color:#d42931;" class="fa fa-trash"></i></span></button>' +
                    '</td>' +
                '</tr>';
                i++;
            $('#add_row_tablequoteItem').append(tblRow);
        });

        //function button remove row table
        $(document).on('click', '.btnRemoveRow', function() {
            var btn_id = $(this).attr("id");
            $('#row' + btn_id + '').remove();
            i--;
        });



        //function get textbox as percent or price for select item discount type
        $(document).on('change','.select-itemDiscount', function() {
            var row_id = $(this).attr("id");
            var textBoxType = "";
            var select_val = $( "select[name='select-itemDiscount_"+row_id+"']" ).val();
            if(select_val == 1){
                $('#txtDiscount_' + row_id + '').remove();
                textBoxType = '<input type="text"  class="itemDisPercent_'+row_id+' txtbox-quote valid-numeric-float" name="itemDiscountPercent[]" id="txtDiscount_'+row_id+'" demo="itemDisPercent" data-id="'+i+'" placeholder="0.0%">' ;
                $('#fieldItemDiscount_'+row_id+'').append(textBoxType);
            }
            if(select_val == 2){
                $('#txtDiscount_' + row_id + '').remove();
                textBoxType = '<input type="text"  class="itemDisPrice_'+row_id+' txtbox-quote valid-numeric-float" name="itemDiscountPrice[]" id="txtDiscount_'+row_id+'" demo="itemDisPrice" data-id="'+i+'"  placeholder="0.0$">' ;
                $('#fieldItemDiscount_'+ row_id +'').append(textBoxType);
            }
        });
        








        //function keypress area (use to prvent use select string to numeric field) 
        $(document).keypress(function(e){

                //function to get input only numeric number
                $(".valid-numeric").keypress(function(e){
                    var keyCode = e.which;
                    if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) { 
                        return false;
                    }
                });

                //function to get input numberic number & float
                $(".valid-numeric-float").keypress(function(e){
                    var keyCode = e.which;
                    if ((e.which != 46 || $(this).val().indexOf('.') != -1) && (keyCode < 48 || keyCode > 57)) { 
                        return false;
                    }
                });


                



        });




        //function keyup area
        $(document).keyup(function(e){
            //function to calculate multiply qty & price to unit row product
            
            $("[demo='itemQty']").keyup(function(e){
                var row_id = $(this).attr("id");
                var itemQty = $(".itemQty_"+row_id+"").val();
                var itemPrice =  $(".itemPrice_"+row_id+"").val(); 
                subTotal = itemQty * itemPrice;
                $("#quote-sub-total_"+row_id+"").text(subTotal);
            });
            
            $("[demo='itemPrice']").keyup(function(e){
                var row_id = $(this).attr("id");
                var itemPrice =  $(".itemPrice_"+row_id+"").val(); 
                var itemQty = $(".itemQty_"+row_id+"").val();
                subTotal = itemQty * itemPrice;
                $("#quote-sub-total_"+row_id+"").text(subTotal);
            });
            

            // get value to show in sub-total of each product
            $(".field-input-discount").keyup(function(e){
                var row_id = $(this).attr("data-id");
                var itemQty = $(".itemQty_"+row_id+"").val();
                var itemPrice =  $(".itemPrice_"+row_id+"").val(); 
                subTotal = itemQty * itemPrice;
                
                if( $(".itemDisPercent_"+row_id+"").val()){
                    var DisPercent =  $(".itemDisPercent_"+row_id+"").val();
                    var get_val = (subTotal * DisPercent) / 100;
                    $("#quote-sub-discount_"+row_id+"").text(get_val);
                }
                
                if($(".itemDisPrice_"+row_id+"").val()){
                    var DisPrice =  $(".itemDisPrice_"+row_id+"").val();
                    var get_val = subTotal - DisPrice;
                    $("#quote-sub-discount_"+row_id+"").text(get_val);
                }
                
            });






        });



        


        //function onclick to show product item to add quote 
        $(document).on('click', '[name=addItemProduct]', function() {
            var row_id = $(this).attr("id");
            var id = "id="+row_id;
            var url = '/quote/add/listProduct';
            var x=new XMLHttpRequest();
            x.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200){
                    document.getElementById('modal-list-quote').innerHTML=this.responseText;
                    $('#listQuoteProduct').modal('show');
                }
            }
            x.open("GET", url + "?" + id, true);
            x.send();
        
        });





        //function for user click add service product 
        $(document).on('click', '[name=addItemService]', function() {
            var row_id = $(this).attr("id");
            alert(row_id);
        });

        





        


      

        










    });

 


  
 
 
 
 
    //function to add row table to add quote item
    $(document).ready(function(){

        var i = 0; //use for count all row was created 
        var j = 0; //use for count current row remainder 
        var getSumTotal = 0;
        $("#btnAddRowQuoteItem").click(function(){
            var tblRow =
                '<tr id="row'+i+'" class="tr-quote-row row-quote-item" data-id="'+i+'" >' +
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
                                '<select  class="select-itemDiscount btn-list-item mdb-select md-form" name="select-itemDiscount_'+i+'" id="'+i+'" required > ' +
                                    '<option value="1"><span>+Discount (%)</span> </option>'+
                                    '<option value="2"><span>+Discount ($)</span> </option>'+
                                '</select>'+
                            '</div>'+
                            '<div class="col-md-6 col-sm-6 col-6 field-input-discount" data-id="'+i+'" id="fieldItemDiscount_'+i+'">' +
                                '<input type="text"  class="itemDisPercent_'+i+' txtbox-quote valid-numeric-float" name="itemDiscountPercent[]" id="txtDiscount_'+i+'" demo="itemDisPercent" data-id="'+i+'" value="0" placeholder="0.0%">' +
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
                j++;
            $('#add_row_tablequoteItem').append(tblRow);
        });

        //function button remove row table
        $(document).on('click', '.btnRemoveRow', function() {
            var btn_id = $(this).attr("id");
            $('#row' + btn_id + '').remove();
            j--;

            //for loop use when user delete row but grand total will refresh
            var sumTotal = 0;
            for(var x=0; x<=i; x++){
                var value = $("#quote-netPrice_"+x+"").text();
                if(value != ""){
                    var getNetPrice = parseInt(value);
                    sumTotal += getNetPrice;
                    console.log(sumTotal);
                }   
            }
            getSumTotal = sumTotal;
            $("#sumTotal").text(sumTotal);

        });



        //function get textbox as percent or price for select item discount type
        $(document).on('change','.select-itemDiscount', function() {
            var row_id = $(this).attr("id");
            var textBoxType = "";
            var select_val = $( "select[name='select-itemDiscount_"+row_id+"']" ).val();
            if(select_val == 1){
                $('#txtDiscount_' + row_id + '').remove();
                textBoxType = '<input type="text"  class="itemDisPercent_'+row_id+' txtbox-quote valid-numeric-float" name="itemDiscountPercent[]" id="txtDiscount_'+row_id+'" demo="itemDisPercent" data-id="'+i+'" value="" required placeholder="0.0%">' ;
                $('#fieldItemDiscount_'+row_id+'').append(textBoxType);
                $("#quote-sub-discount_"+row_id+"").text(0);
            }
            if(select_val == 2){
                $('#txtDiscount_' + row_id + '').remove();
                textBoxType = '<input type="text"  class="itemDisPrice_'+row_id+' txtbox-quote valid-numeric-float" name="itemDiscountPrice[]" id="txtDiscount_'+row_id+'" demo="itemDisPrice" data-id="'+i+'" value="" required placeholder="0.0$">' ;
                $('#fieldItemDiscount_'+ row_id +'').append(textBoxType);
                $("#quote-sub-discount_"+row_id+"").text(0);
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
        // var sumTotal = 0;
        $(document).keyup(function(e){
            var sumTotal = 0;
            var discountAllInOne = 0;
            var granTotal = 0;
            $(".row-quote-item").keyup(function(e){
                var row_id = $(this).attr("data-id");
                var subTotal = 0;
                var get_val = 0;
                var val_after_dis = 0;
                var netPrice = 0;
                
                var itemQty = $(".itemQty_"+row_id+"").val();
                var itemPrice = $(".itemPrice_"+row_id+"").val();
                subTotal = itemQty * itemPrice;
                $("#quote-sub-total_"+row_id+"").text(subTotal);
                
                //get discount percent for unit row 
                if( $(".itemDisPercent_"+row_id+"").val()){
                    var DisPercent =  $(".itemDisPercent_"+row_id+"").val();
                    get_val = (subTotal * DisPercent) / 100;
                }

                 //get discount price for unit row 
                if($(".itemDisPrice_"+row_id+"").val()){
                    var DisPrice =  $(".itemDisPrice_"+row_id+"").val();
                    get_val =  DisPrice;
                }

    
                
                val_after_dis = subTotal - get_val;
                netPrice = val_after_dis;

                //show element value by id
                $("#quote-sub-discount_"+row_id+"").text(get_val);
                $("#quote-after-sub-disc_"+row_id+"").text(val_after_dis);
                $("#quote-netPrice_"+row_id+"").text(netPrice);

                //for loop to get sumtotal all rows
                for(var x=0; x<=i; x++){
                    var value = $("#quote-netPrice_"+x+"").text();
                    if(value != ""){
                        var getNetPrie = parseInt(value);
                        sumTotal += getNetPrie;
                    }   
                }
                $("#sumTotal").text(sumTotal);
                getSumTotal = sumTotal;
                granTotal = getSumTotal;
                $("#grandTotal").text(granTotal);
                

            });


            //get discount percent of total grand
            var valDisPercent = $("#itemDiscountPercent").val();
            if(valDisPercent){
                discountAllInOne = (getSumTotal  * valDisPercent) / 100;
                $("#totalDiscount").text(discountAllInOne);
            }
            
            //get discount price of total grand
            var valDisPrice = $("#itemDiscountPrice").val();
            if(valDisPrice){
                discountAllInOne = getSumTotal - valDisPrice;
                $("#totalDiscount").text(discountAllInOne);
            }
            granTotal = getSumTotal - discountAllInOne;
            $("#grandTotal").text(granTotal);


            





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
                    
                    let table = $('#tblItemProduct').DataTable({sDom: 'lrtip'});     
                    $(document).keyup(function(){
                        $('#mySearchQuote').on( 'keyup', function () {
                            table.search($(this).val()).draw();
                        });
                    });



             

                    
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

        



        //function get textbox as percent or price for select item discount type
        $('.allItemDiscount').on('change', function(e) {
            var textBoxType = "";
            var select_val= $("#allItemDiscount").val();
            if(select_val == 1){
                $('#itemDiscountPrice').remove();
                textBoxType = '<input type="text"  style="width:40%;" class="txtbox-quote valid-numeric-float" name="itemDiscountPercent[]" id="itemDiscountPercent" value="" placeholder="0.0%" required>' ;
                $('#allDiscount').append(textBoxType);

            }
            if(select_val == 2){
                $('#itemDiscountPercent').remove();
                textBoxType = '<input type="text"  style="width:40%;" class="txtbox-quote valid-numeric-float" name="itemDiscountPrice[]" id="itemDiscountPrice" value="" placeholder="0.0$" required>' ;
                $('#allDiscount').append(textBoxType);

            }
        });


      

        










    });

 


  
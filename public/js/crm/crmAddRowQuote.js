


    //function to add row table to add quote item
    $(document).ready(function(){

        var i = 0; //use for count all row was created
        var j = 0; //use for count current row remainder
        var getSumTotal = 0;


        $(document).on('click','#btnAddRowQuoteItem', function(event, issetBranId){

            var branId = $(this).attr("data-id");
            // console.log('this is add btn'+branId);
            if(branId == 'quoteBranchEdit'){
                branId = '_new';
                var numRow = $('#add_row_tablequoteItem').attr("data-id");
                if(i == 0){   // check if i = 0 assign i = count row of quote branch item to get update new row add item
                    i = parseInt(i + numRow);
                        // console.log('place assign row num');
                }
            }

            // check to assign new value to branId
            if(typeof(issetBranId) != 'undefined'){
                branId = issetBranId;
            }

            var tblRow =
                '<tr id="'+i+'" class="tr-quote-row row-quote-item" data-id="row_'+i+'">'  +
                    '<td class="td-item-quote-name">' +
                        '<div class=" form-group">' +
                            '<div class="row form-inline2">' +
                                '<div class="col-md-8 col-sm-8 col-8">' +
                                    '<input type="text" class="form-control txtPrdName_'+i+'"   name="product_name[]" id="product_name'+i+'"  value="" required placeholder="Product Name" readonly>'+
                                    '<input type="hidden" name="product'+branId+'[]" id="txtPrdId_'+i+'"  readonly>'+
                                    '<span id="product_name'+i+'Error" ><strong></strong></span>'+
                                '</div>' +
                                '<div class="col-md-4 col-sm-4 col-4">' +
                                    '<div class="row-12">'+
                                        '<button type="button" style="color:white; width: 100%;" class="btn-list-item txtbox-quote  btn-info addItemProduct_'+i+'"   name="addItemProduct"  id="'+i+'"  data-id="'+branId+'" > <span>+ Add Product </span></button>'+
                                    '</div>' +
                                    '<div class="row-12 pt-1">'+
                                        '<button type="button" style="color:white; width: 100%;" class="btn-list-item txtbox-quote  btn-info addItemService_'+i+'"  name="addItemService"  id="'+i+'" data-id="'+branId+'" > <span>+ Add Service </span></button>'+
                                    '</div>'+
                                '</div>' +
                            '</div>' +
                            '<div class="form-inline"><textarea class="form-control txtDescription_'+i+'" id="txtDescription_'+i+'"  rows="2" style="margin-top:10px; padding:10px; width: 100%!important;" placeholder="Description" disabled></textarea> </div>' +
                        '</div>' +
                    '</td>' +
                    '<td>' +
                        '<div id="itemType_'+i+'" class="btn-list-item text-center">----</div>'+
                    '</td>'+
                    '<td style="width: 120px;">' +
                        '<input type="text"  class="valid-numeric form-control itemQty_'+i+' qty'+i+' " name="qty'+branId+'[]" id="'+i+'" data-id="qty'+i+'" demo="itemQty"  value="1"  required placeholder="Qty">' +
                        '<input type="hidden" id="numItemInStock_'+i+'" readonly> '+
                        '<p id="prdNotEnough_'+i+'" class="font-size-14" style="color:red;"></p>'+
                        '<span id="'+i+'Error" ><strong></strong></span>'+

                    '</td>' +
                    '<td class="td-item-quote">' +
                        '<div class="">' +
                            '<input type="text" class="valid-numeric-float form-control itemPrice_'+i+' price'+i+'" name="price'+branId+'[]"  id="itemPrice_'+i+'"     data-id="price'+i+'"  demo="itemPrice" value="0" required placeholder="0.0$">' +
                            '<span id="'+i+'Error" ><strong></strong></span>'+
                        '</div>'+
                        '<div class="row pt-1 form-inline">' +
                            '<div class="col-md-6 col-sm-6 col-6">' +
                                '<select  class="select-itemDiscount btn-list-item mdb-select md-form" name="select-itemDiscount_'+i+'" id="'+i+'"  data-id="'+branId+'" required > ' +
                                    '<option value="1"><span>+Discount (%)</span> </option>'+
                                    '<option value="2"><span>+Discount ($)</span> </option>'+
                                '</select>'+
                            '</div>'+

                            '<div class="col-md-6 col-sm-6 col-6 field-input-discount" data-id="'+i+'" id="fieldItemDiscount_'+i+'">' +
                                '<input type="text"  class="itemDisPercent_'+i+' txtbox-quote valid-numeric-float" name="discount'+branId+'[]" id="discount'+i+'" demo="itemDisPercent" data-id="'+i+'" value="0" placeholder="0.0%">' +
                                '<input type="hidden" id="discount_type'+i+'" value="percent" name="discount_type'+branId+'[]"> '+
                                '<span id="discountError" ><strong></strong></span>'+
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

            if(branId == '_new'){
                $('#add_row_tablequoteItem').append(tblRow);
            }else{
                $('#add_row_tablequoteItem'+branId+'').append(tblRow);
            }
        });



        // function button remove row table
        $(document).on('click', '.btnRemoveRow', function() {
            var btn_id = $(this).attr("id");

            var numRow = $(this).attr("data-id"); // this value can be undefined
            if(typeof(numRow) != 'undefined'){
                if(i == 0){   // check if i = 0 assign i = count row of quote branch item to get update new row add item
                    i = parseInt(i + numRow);
                    j = parseInt(j + numRow);
                    // console.log('number row='+numRow+'--i='+i);
                }
                $( "tbody tr" ).remove('.row-quote-item_'+btn_id+'');
            }


            $('tbody tr[data-id="row_'+btn_id+'"]').remove();
            j--;
            // console.log('j value='+j+'--rowId='+btn_id+'removeVal=');
            //for loop use when user delete row but grand total will refresh
            var sumTotal = 0;
            for(var x=0; x<=i; x++){
                var value = $("#quote-netPrice_"+x+"").text();
                if(value != ""){
                    var getNetPrice = parseFloat(value);
                    sumTotal += getNetPrice;
                    // console.log(sumTotal);
                }
            }
            // getSumTotal = sumTotal;
            var getTaxation =  (sumTotal * 0.1);  // add tax 10% of total product
            getSumTotal = (sumTotal + getTaxation);
            $("#getTaxation").text(getTaxation);
            $("#sumTotal").text(sumTotal);
            $("#grandTotal").text(getSumTotal);
        });



        // $(document).on('click', '.btnRemoveRow', function() {
        //     alert('hellodsfd');
        // });





        //function get textbox as percent or price for select item discount type
        $(document).on('change keyup','.select-itemDiscount', function() {

            var row_id = $(this).attr("id");
            var branId = $(this).attr("data-id");

            var textBoxType = "";
            var select_val = $("select[name='select-itemDiscount_"+row_id+"']").val();  //old use

            // console.log('rowid_discount='+row_id+'--SelectVal='+select_val);
            if(select_val == 1){
                // console.log('select val=1');
                $('#discount'+row_id+'').remove();
                textBoxType = '<input type="text"  class="itemDisPercent_'+row_id+' txtbox-quote valid-numeric-float" name="discount'+branId+'[]" id="discount'+row_id+'" demo="itemDisPercent" data-id="'+i+'" value="0" required placeholder="0.0%">' ;
                $('#fieldItemDiscount_'+row_id+'').append(textBoxType);
                // $('#fieldItemDiscount_'+row_id+'').append('<input type="hidden" value="percent" name="discount_type[]">');
                $('#discount_type'+row_id+'').val('percent'); //discount as price
                $("#quote-sub-discount_"+row_id+"").text(0);
                $(".row-quote-item").keyup();

            }
            if(select_val == 2){
                // console.log('select val=2');
                $('#discount'+row_id+'').remove();
                textBoxType = '<input type="text"  class="itemDisPrice_'+row_id+' txtbox-quote valid-numeric-float" name="discount'+branId+'[]" id="discount'+row_id+'" demo="itemDisPrice" data-id="'+i+'" value="0" required placeholder="0.0$">' ;
                $('#fieldItemDiscount_'+ row_id +'').append(textBoxType);
                // $('#fieldItemDiscount_'+row_id+'').append('<input type="hidden" value="number" name="discount_type[]">');
                $('#discount_type'+row_id+'').val('number'); //discount as percent
                $("#quote-sub-discount_"+row_id+"").text(0);
                $(".row-quote-item").keyup();

            }
        });









        //function keypress area (use to prevent use select string to numeric field)
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
            var granTotal = 0;
            $(".row-quote-item").keyup(function(e){
                var row_id = $(this).attr("id");
                var subTotal = 0;
                var get_val = 0;
                var val_after_dis = 0;
                var netPrice = 0;

                var itemQty = parseFloat($.trim($(".itemQty_"+row_id+"").val()));

                // var itemPrice = parseFloat($.trim($("[data-id=price"+row_id+"]").val()));   //old use

                itemPrice = parseFloat($.trim($('#itemPrice_'+row_id+'').val()));


                subTotal = (itemQty * itemPrice);
                $("div #quote-sub-total_"+row_id+"").text(subTotal);

                // console.log('rowId='+ row_id +'-itemQty='+itemQty+'-itemPrice='+itemPrice+'-subTotal='+subTotal);

                    //get discount percent for unit row
                if( $(".itemDisPercent_"+row_id+"").val()){
                    var DisPercent =  parseFloat($(".itemDisPercent_"+row_id+"").val());
                    get_val = (parseFloat(subTotal) * DisPercent) / 100;
                }

                 //get discount price for unit row
                if($(".itemDisPrice_"+row_id+"").val()){
                    var DisPrice =  $(".itemDisPrice_"+row_id+"").val();
                    get_val =  parseFloat(DisPrice);
                }



                val_after_dis = subTotal - get_val;
                netPrice = val_after_dis;

                //show element value by id
                $("div #quote-sub-discount_"+row_id+"").text(get_val);
                $("div #quote-after-sub-disc_"+row_id+"").text(val_after_dis);
                $("div #quote-netPrice_"+row_id+"").text(netPrice);

                // console.log('subDisc='+get_val+'--netPrice='+netPrice);
                //for loop to get sumtotal all rows
                for(var x=0; x<=i; x++){

                    var value = $("#quote-netPrice_"+x+"").text();
                    if(value != ''){
                        var getNetPrice = parseFloat(value);
                        sumTotal += getNetPrice;
                    }

                    //Compare item in stock with item entry in quotes
                    var numPrdInQuote = parseFloat($(".itemQty_"+x+"").val());
                    var numPrdInStock = parseFloat($("#numItemInStock_"+x+"").val());
                    // console.log(numPrdInStock);

                    var stockMessage = "Stock not enough, the available item is ";
                    if(typeof(numPrdInQuote)  != 'undefined'){
                        // console.log('number prd in stock check available='+numPrdInStock);
                        if( numPrdInQuote > numPrdInStock){
                            $("#prdNotEnough_"+x+"").text(stockMessage+" "+ numPrdInStock);
                            $("#prdNotEnough_"+x+"").show();
                        }else{
                            $("#prdNotEnough_"+x+"").hide();
                        }
                    }

                }

                var getTaxation =  (sumTotal * 0.1);  // add tax 10% of total product
                granTotal = (sumTotal + getTaxation);

                $("#getTaxation").text(getTaxation);
                $("#sumTotal").text(sumTotal);
                $("#grandTotal").text(granTotal);


            });

            generateGrandTotal();

        });







        //function onclick to show product item to add quote
        var clicktime = 0;
        $(document).on('click','[name=addItemProduct]', function() {

                        setTimeout(function(){
                            clicktime = clicktime * 0;
                        }, 4000);

                        if(clicktime == 1){
                            return false;
                        }

                        var branId_ = $(this).attr("data-id");
                        var branId = "branId="+branId_;
                        // console.log('add prd branId='+branId);

                        var row_id = $(this).attr("id");
                        var id = "id="+row_id;

                        var url= '/quote/add/listProduct';
                        var x=new XMLHttpRequest();
                        x.onreadystatechange=function(){
                            if(this.readyState==4 && this.status==200){
                                document.getElementById('modal-list-quote').innerHTML=this.responseText;
                                $('#listQuoteItem').modal('show');

                                let table = $('#tblItemProduct').DataTable({
                                    sDom: 'lrtip',
                                    targets:'no-sort',
                                    bSort: false,
                                    select: true,
                                });
                                $(document).keyup(function(){
                                    $('#mySearchQuote').on( 'keyup', function () {
                                        table.search($(this).val()).draw();
                                    });
                                });
                            }
                        }
                        x.open("GET", url + "?" + id + "&" + branId, true);
                        x.send();
                        clicktime +=1;
        });




        //function for user click add item service
        $(document).on('click', '[name=addItemService]', function() {

            setTimeout(function(){
                clicktime = clicktime * 0;
            }, 4000);

            if(clicktime == 1){
                return false;
            }

            var branId_ = $(this).attr("data-id");
            var branId = "branId="+branId_;

            var row_id = $(this).attr("id");
            var id = "id="+row_id;

            var url= '/quote/add/listService';
            var x=new XMLHttpRequest();
            x.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200){

                    document.getElementById('modal-list-quote').innerHTML=this.responseText;
                    $('#listQuoteItem').modal('show');

                    let table = $('#tblItemService').DataTable({
                        sDom: 'lrtip',
                        targets:'no-sort',
                        bSort: false,
                        select: true,
                    });

                    $(document).keyup(function(){
                        $('#mySearchQuote').on( 'keyup', function () {
                            table.search($(this).val()).draw();
                        });
                    });
                }
            }
            x.open("GET", url + "?" + id + "&" + branId, true);
            x.send();
            clicktime +=1;

        });





        //function click to get item to add quote
        $(document).on('click keyup','.getStockItem',function(){

                    var branId = $(this).attr("data-id");
                    var btnId = $(this).attr("id");
                    var selectval = new Array;
                    var num = 0;


                    //function for check seletion of checkbox
                    $("input[name=seleteItem]:checked").each(function(i){
                            selectval[i]  = $(this).val();
                            i += 1;
                    });

                    if(selectval.length > 0){ //if length >= 1
                        var stockMessage = '';
                        var prdInStock = '';
                        selectval.forEach(prdVal => {
                            // var prdId = prdVal; // get id of product
                            var itemType = $.trim($("#showItemType_"+btnId+"").val());
                            var prdName = $.trim($(".itemName_"+prdVal+"").text());
                            var prdPrice = parseFloat($.trim($(".itemPrice_"+prdVal+"").val()));
                            var prdAviableStock = parseFloat($.trim($(".stockItem_"+prdVal+"").text()));

                            prdInStock = prdAviableStock;
                            var prdDescription = $.trim($(".itemDescription_"+prdVal+"").text());

                                stockMessage = "Stock not enough, the available item is ";
                                numPrdInStock = prdInStock;

                                if(num == 0){
                                    //show item in row quote item  with one select
                                    $("#txtPrdId_"+btnId+"").val(prdVal);
                                    $("#product_name"+btnId+"").val(prdName);
                                    $("#txtDescription_"+btnId+"").val(prdDescription);
                                    $(".itemPrice_"+btnId+"").val(prdPrice);
                                    $("#itemType_"+btnId+"").text(itemType);
                                    $("#numItemInStock_"+btnId+"").val(numPrdInStock);
                                    $(".itemPrice_"+btnId+"").keyup(); //call function key press to generate data
                                    var numPrdInQuote = parseFloat($(".itemQty_"+btnId+"").val());
                                    if(numPrdInQuote > numPrdInStock){
                                        $("#prdNotEnough_"+btnId+"").text('');
                                        $("#prdNotEnough_"+btnId+"").text(stockMessage+" "+prdInStock);
                                    }
                                }else{
                                    //show item in row quote item with multi select
                                    $( "#btnAddRowQuoteItem" ).trigger( "click", branId);

                                    $("#txtPrdId_"+(i-1)+"").val(prdVal);
                                    $("#product_name"+(i-1)+"").val(prdName);
                                    $("#txtDescription_"+(i-1)+"").val(prdDescription);
                                    $(".itemPrice_"+(i-1)+"").val(parseFloat(prdPrice));
                                    $("#itemType_"+(i-1)+"").text(itemType);
                                    $("#numItemInStock_"+(i-1)+"").val(numPrdInStock);
                                    $(".itemPrice_"+(i-1)+"").keyup(); //call function key press to generate data
                                    var numPrdInQuote = parseFloat($(".itemQty_"+(i-1)+"").val());
                                    if(numPrdInQuote > numPrdInStock){
                                        $("#prdNotEnough_"+(i-1)+"").text('');
                                        $("#prdNotEnough_"+(i-1)+"").text(stockMessage+" "+prdInStock);
                                    }
                                }
                                num += 1;
                                $(".row-quote-item").keyup();

                        });
                        // $(".row-quote-item").keyup();
                    }else{
                        console.log("No items chosen!");
                    }
                    // $(".row-quote-item").keyup();
                    //hide modal when click button select item
                    $('#listQuoteItem').modal('hide');

        });



        //function click main checkbox to get check all sub checkbox
        $(document).on('click','.checkAllItem',function(){
                    $('input:checkbox').not(this).prop('checked', this.checked);
        });













        //function get textbox as percent or price for select item discount type
        $('.allItemDiscount').on('change ', function(e) {
            var textBoxType = "";
            var select_val = $("#allItemDiscount").val();

                if(select_val == 1){
                    $('#itemDiscountPrice').remove();
                    textBoxType = '<input type="text"  style="width:40%;" class="txtbox-quote valid-numeric-float" name="itemDiscountPercent[]" id="itemDiscountPercent" value="0" placeholder="0.0%" required>' ;
                    $('#allDiscount').append(textBoxType);
                }
                if(select_val == 2){
                    $('#itemDiscountPercent').remove();
                    textBoxType = '<input type="text"  style="width:40%;" class="txtbox-quote valid-numeric-float" name="itemDiscountPrice[]" id="itemDiscountPrice" value="0" placeholder="0.0$" required>' ;
                    $('#allDiscount').append(textBoxType);
                }
                generateGrandTotal();


        });





        //function getnerate grand total after user click manu discount
        function generateGrandTotal(){

            var totalAfterDis2 = 0;
            var grandTotal2 = 0;
            var sumTotal2 = parseFloat($("#sumTotal").text());
            if($("#itemDiscountPercent").val()){
                var allDisPercent2 = parseFloat($("#itemDiscountPercent").val());
                totalAfterDis2 =  (sumTotal2  * allDisPercent2) / 100;

            }
            if($("#itemDiscountPrice").val() ){
                var allDisPrice2 = parseFloat($("#itemDiscountPrice").val());
                totalAfterDis2 =  allDisPrice2;
            }

            $("#totalDiscount").text(totalAfterDis2);
            grandTotal2 = sumTotal2 - totalAfterDis2;

            var getTaxation =  (sumTotal2 * 0.1);  // add tax 10% of total product
            grandTotal2 += getTaxation;
            granTotal = (sumTotal + getTaxation);
            $("#getTaxation").text(getTaxation);
            $("#grandTotal").text(grandTotal2);

        }










    });




//////////////////////////========================== MET KEOSAMBO ====================///////////////////////////////
// ----------Contact---------- //
    //Fuction Click Update Contact
    // function CrmDetailContact(id){
    //     $.ajax({
    //         url:"/contact/detail",   //Request send to "action.php page"
    //         type:"GET",    //Using of Post method for send data
    //         data:{id:id},//Send data to server
    //         success:function(data){
    //             $('#ShowModalContact').html(data);
    //             $('#CrmDetailContactModal').modal('show');   //It will display modal on webpage
    //         }
    //     });
    // }
    function CrmSelectChange(url,div,id){
      $.ajax({
          url:url,  //get URL to route
          type:"get",
          data:{id:id},
          success:function(data){
            $('#'+div+'').html(data);
      }
      });
      }
    // Function Insert And Update CRM is amazing
    function CrmSubmitFormFull(form,url,goto,alert){

        $("#"+form+" input").removeClass("is-invalid");//remove all error message
        $("#"+form+" select").removeClass("is-invalid");//remove all error message
        $("#"+form+" textarea").removeClass("is-invalid");//remove all error message
        $("#"+form+" radio").removeClass("is-invalid");//remove all error message
        $.ajax({
          url: url,//get link route
          type:'POST',//type post or put
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           data: //_token: $('#token').val(),
          $('#'+form+'').serialize(),

          success:function(data)
          {
            if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
             // console.log(data);
              sweetalert('success',alert);
              go_to(goto);// refresh content
          }else{
            $.each( data.errors, function( key, value ) {//foreach show error
                $("#" + key).addClass("is-invalid"); //give read border to input field
                // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
                sweetalert('warning',value);
            });
          }
          }
        });
    }
    //======= Funtion delete=======//
function Crm_delete(id,route,goto,alert) {
  event.preventDefault();
  Swal.fire({ //get from sweetalert function
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url:route,   //Request send to "action.php page"
        data:{id:id},
        type:"GET",    //Using of Post method for send data
        success:function(data){
          console.log(data);
          // if(data =='error'){
          //      //sweetalert('success',alert);
          //    //  setTimeout(function(){ go_to(goto); }, 300);// Set timeout for refresh content
          //      Swal.fire(
          //        'Deleted!',
          //          'Delete Error',
          //        'error'
          //      )
          // }else{
              //sweetalert('success',alert);
            setTimeout(function(){ go_to(goto); }, 300);// Set timeout for refresh content
            Swal.fire(
              'Deleted!',
                alert,
              'success'
            )
          // }
        }

       });

    }
  })

};
// // ---------- END Contact---------- //
// -----------Setting CRM ---------- //
 ////view Manage Setting///////
 function CrmSettingView(url,table){
  $.ajax({
      url:url,  //get URL to route
      type:"get",
      data:{},
      success:function(data){
        $('#CrmTabManageSetting').html(data);
        $('#'+table+'').dataTable({
            'responsive': true,
            scrollX:true,
        }); //Set table to datatable

  }
  });
  }
  ////Funtion Modal Action Add///////
  function CrmModalAction(form,modal,button,title){
    $("#"+form+"").find('input:text, input:password, input:file,textarea').val(''); //remove text when show
    $("#"+form+"").find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');//remove text when show
    $("#"+form+"").find('input:text, input:password, input:file, select, textarea').removeClass("is-invalid");//remove valid all input field
    $("#"+form+"").attr("method","post");//Set Form method
    $("#"+modal+"").modal('show'); //Set modal show
    $("#card_title").text(title); // Set title modal
    $("#"+button+"").text('Create'); // Set button Create
  }
  function CrmSubmitModalAction(form,button,url,type,modal,alert,goto){
  $("#"+form+"").find('input:text, input:password, input:file, select, textarea').removeClass("is-invalid");//remove valid all input field
  /// Insert function
  if($("#"+button+"").text()=='Create') //check condition for create question type
  {
    $.ajax({
      url:url,
      type:type,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
       data: //_token: $('#token').val(),
       $("#"+form+"").serialize(),
      success:function(data)
      {
        if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
          $("#"+modal+"").modal('hide');
          sweetalert('success',alert);
          setTimeout(function(){ go_to(goto); }, 300);// Set timeout for refresh content
      }else{
        // $(".print-error-msg").find("ul").html('');

        // $(".print-error-msg").css('display','block');

        $.each( data.errors, function( key, value ) {//foreach show error
            $("#" + key).addClass("is-invalid"); //give read border to input field
            // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            sweetalert('warning',value);
            $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

        });
      }
      }
    });
  }
  /// Update action
  if($("#"+button+"").text()=='Update') // Check Condition for update question type
  {
    $.ajax({
      url:url,
      type:type,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: //_token:  $('#token').val(),
      $("#"+form+"").serialize(),
      success:function(data)
      {
        if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
          $("#"+modal+"").modal('hide');
          sweetalert('success',alert);
          setTimeout(function(){ go_to(goto); }, 300);// Set timeout for refresh content
      }else{
        // $(".print-error-msg").find("ul").html('');

        // $(".print-error-msg").css('display','block');

        $.each( data.errors, function( key, value ) {//foreach show error
            $("#" + key).addClass("is-invalid"); //give read border to input field
            // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');

            sweetalert('warning',value);
            $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);

        });
      }
      }
    });
    }
  }
  // ----- Lead Status
    //Update lead Status
    $(document).on('click', '.CrmEditLeadStatus', function(){
      var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
      $.ajax({
      url:"/crm/setting/leadstatus/get",   //Request send to "action.php page"
      type:"GET",    //Using of Post method for send data
      data:{id:id},//Send data to server
      dataType:"json",   //Here we have define json data type, so server will send data in json format.
      success:function(response){
              $('#crm_lead_status').modal('show'); //It will display modal on webpage
              $('#ActionLeadStatus').text('Update'); //This code will change Button value to Update
              $('#card_title').text("Update Lead Status");
              $('.print-error-msg').hide();
              $("#crm_lead_status_form").find('input:text, input:password, input:file, select, textarea').removeClass("is-invalid");//remove valid all input field
              $(".invalid-feedback").children("strong").text("");/// remove errror massage
              $('#lead_status_id').val(id);     //It will define value of id variable for update
              $.each(response.data, function(i, e){ //read array json for show to textbox
                $('#name_kh').val(response.data.name_kh);
                $('#name_en').val(response.data.name_en);
                $('#sequence').val(response.data.sequence);
                $('#color').val(response.data.color)
                if(response.data.status==true){
                  $('#status').val(1);
                }else{
                  $('#status').val(0);
                }
              });
      }
      });
    });
  // ----- Lead Industry
    //Update lead industry
    $(document).on('click', '.CrmEditLeadIndustry', function(){
      var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
      $.ajax({
      url:"/crm/setting/leadindustry/get",   //Request send to "action.php page"
      type:"GET",    //Using of Post method for send data
      data:{id:id},//Send data to server
      dataType:"json",   //Here we have define json data type, so server will send data in json format.
      success:function(response){
              $('#crm_lead_industry_insert').modal('show'); //It will display modal on webpage
              $('#ActionLeadIndustry').text('Update'); //This code will change Button value to Update
              $('#card_title').text("Update Lead Industry");
              $('.print-error-msg').hide();
              $("#crm_lead_industry_form").find('input:text, input:password, input:file, select, textarea').removeClass("is-invalid");//remove valid all input field
              $(".invalid-feedback").children("strong").text("");/// remove errror massage
              $('#lead_industry_id').val(id);     //It will define value of id variable for update
              $.each(response.data, function(i, e){ //read array json for show to textbox
                $('#name_kh').val(response.data.name_kh);
                $('#name_en').val(response.data.name_en);
                if(response.data.status==true){
                  $('#status').val(1);
                }else{
                  $('#status').val(0);
                }
              });
      }
      });
    });
   // ----- Lead Source
    //Update lead Source
    $(document).on('click', '.CrmEditLeadSource', function(){
      var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
      $.ajax({
      url:"/crm/setting/leadsource/get",   //Request send to "action.php page"
      type:"GET",    //Using of Post method for send data
      data:{id:id},//Send data to server
      dataType:"json",   //Here we have define json data type, so server will send data in json format.
      success:function(response){
              $('#crm_lead_source_modal').modal('show'); //It will display modal on webpage
              $('#ActionLeadSource').text('Update'); //This code will change Button value to Update
              $('#card_title').text("Update Lead Source");
              $('.print-error-msg').hide();
              $("#crm_lead_source_form").find('input:text, input:password, input:file, select, textarea').removeClass("is-invalid");//remove valid all input field
              $(".invalid-feedback").children("strong").text("");/// remove errror massage
              $('#lead_source_id').val(id);     //It will define value of id variable for update
              $.each(response.data, function(i, e){ //read array json for show to textbox
                $('#name_kh').val(response.data.name_kh);
                $('#name_en').val(response.data.name_en);
                if(response.data.status==true){
                  $('#status').val(1);
                }else{
                  $('#status').val(0);
                }
              });
      }
      });
    });
    // ----- Lead ISP
    //Update lead ISP
    $(document).on('click', '.CrmEditLeadISP', function(){
      var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
      $.ajax({
      url:"/crm/setting/leadisp/get",   //Request send to "action.php page"
      type:"GET",    //Using of Post method for send data
      data:{id:id},//Send data to server
      dataType:"json",   //Here we have define json data type, so server will send data in json format.
      success:function(response){
              $('#crm_lead_isp_modal').modal('show'); //It will display modal on webpage
              $('#ActionLeadISP').text('Update'); //This code will change Button value to Update
              $('#card_title').text("Update Lead Current ISP");
              $('.print-error-msg').hide();
              $("#crm_lead_isp_form").find('input:text, input:password, input:file, select, textarea').removeClass("is-invalid");//remove valid all input field
              $(".invalid-feedback").children("strong").text("");/// remove errror massage
              $('#lead_isp_id').val(id);     //It will define value of id variable for update
              $.each(response.data, function(i, e){ //read array json for show to textbox
                $('#name_kh').val(response.data.name_kh);
                $('#name_en').val(response.data.name_en);
                if(response.data.status==true){
                  $('#status').val(1);
                }else{
                  $('#status').val(0);
                }
              });
      }
      });
    });
    // update Schedule Type
    $(document).on('click', '.CrmEditScheduleType', function(){
      // alert();
      var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
      $.ajax({
      url:"/crm/setting/scheduletype/get",   //Request send to "action.php page"
      type:"GET",    //Using of Post method for send data
      data:{id:id},//Send data to server
      dataType:"json",   //Here we have define json data type, so server will send data in json format.
      success:function(response){
              $('#crm_schedule_type').modal('show'); //It will display modal on webpage
              $('#ActionScheduleType').text('Update'); //This code will change Button value to Update
              $('#card_title').text("Update Lead Schedule Type");
              $('.print-error-msg').hide();
              $("#crm_schedule_type_form").find('input:text, input:password, input:file, select, textarea').removeClass("is-invalid");//remove valid all input field
              $(".invalid-feedback").children("strong").text("");/// remove errror massage
              $('#schedule_type_id').val(id);     //It will define value of id variable for update
              $.each(response.data, function(i, e){ //read array json for show to textbox
                $('#name_kh').val(response.data.name_kh);
                $('#name_en').val(response.data.name_en);
                if(response.data.status==true){
                  $('#status').val(1);
                }else{
                  $('#status').val(0);
                }
                if(response.data.is_result_type==true){
                  $('#is_result_type').val("t");
                }else{
                  $('#is_result_type').val("f");
                }
              });
      }
      });
    });
    // update Quote Status
    $(document).on('click', '.CrmEditQuoteStatus', function(){
        // alert();
        var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
        $.ajax({
        url:"/crm/setting/quotestatus/get",   //Request send to "action.php page"
        type:"GET",    //Using of Post method for send data
        data:{id:id},//Send data to server
        dataType:"json",   //Here we have define json data type, so server will send data in json format.
        success:function(response){
                $('#crm_quote_status_modal').modal('show'); //It will display modal on webpage
                $('#ActionQuoteStatus').text('Update'); //This code will change Button value to Update
                $('#card_title').text("Update Quote Status");
                $('.print-error-msg').hide();
                $("#crm_quote_status_form").find('input:text, input:password, input:file, select, textarea').removeClass("is-invalid");//remove valid all input field
                $(".invalid-feedback").children("strong").text("");/// remove errror massage
                $('#quote_status_id').val(id);     //It will define value of id variable for update
                $.each(response.data, function(i, e){ //read array json for show to textbox
                  $('#name_kh').val(response.data.name_kh);
                  $('#name_en').val(response.data.name_en);
                  if(response.data.status==true){
                    $('#status').val(1);
                  }else{
                    $('#status').val(0);
                  }
                  $('#sequence').val(response.data.sequence);
                  $('#color').val(response.data.color);
                  if(response.data.is_result_type==true){
                    $('#is_result_type').val("t");
                  }else{
                    $('#is_result_type').val("f");
                  }
                });
        }
        });
      });
// -----------Setting CRM ---------- //
//--------------Lead Branch -------------//
function CrmLeadBranchView(url,table){
  $status = /[^/]*$/.exec(url)[0];
  $.ajax({
      url:url,  //get URL to route
      type:"get",
      data:{},
      success:function(data){
        $('#CrmTabManageSetting').html(data);
        $('#'+table+'').dataTable({
            scrollX:true,
            "serverSide": true,
            "autoWidth": false,
            "ajax": "/crm/leadbranch/datatable/"+$status,
            "ordering": false,
            "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                if(aData.DT_RowData!=null){ //check comment survey
                  $(nRow).css({'color':'#d42931','font-weight':'bold'});
                }else{
                  $(nRow).css({'color':'black'});
                }
            },
            "columnDefs": [
              {
                  "searchable": false,
                  "targets": 4
                  },
              {
                  // The `data` parameter refers to the data for the cell (defined by the
                  // `data` option, which defaults to the column being worked with, in
                  // this case `data: 0`.
                  "render": function ( data, type, row ) {
                    if(data!=null){
                      return '<label for="">Yes</label>';
                    }else{
                      return '<label for="">No</label>';
                    }
                  },
                  "targets": 4
              },
            {
                // The `data` parameter refers to the data for the cell (defined by the
                // `data` option, which defaults to the column being worked with, in
                // this case `data: 0`.
                "searchable": false,
                "width": "100px",
                "render": function ( data, type, row ) {
                    var st='<div class="container-fluid datatable-action-col">';
                    st+='<div class="row form-inline">'+
                    '<div class="col-md-6">'+
                        '<a href="#" class="btn btn-block btn-info btn-sm branchdetail" ​value="/crm/leadbranch/detail/'+data+'"  onclick="go_to(\'/crm/leadbranch/detail/'+data+'\')" title="Detail Branch">'+
                            '<i class="far fa-eye"></i>'+
                        '</a>'+
                    '</div>';
                    if(row[4]!=null){
                    st+='<div class="col-md-6 ">'+
                                '<button href="javascript:void(0);" class="btn btn-block btn-danger btn-sm detailschedule" onclick="branch_schedule_detail(\''+row[4]+'\')"  id="detailschedule'+row[4]+'" value="'+row[4]+'"  title="Detail Of Branch">'+
                                    '<i class="fas fa-calendar-day"> </i>'+
                                '</a>'+
                            '</div>'+
                        '</div>';
                    }else{
                    st+='<div class="col-md-6 ">'+
                                '<button href="javascript:void(0);" class="btn btn-block btn-danger btn-sm schedule" onclick="lead_branch_schedule(\''+data+'\')"  id="schedule'+data+'" value="'+data+'">'+
                                    '<i class="fas fa-calendar-day"> </i>'+
                                '</a>'+
                            '</div>'+
                        '</div>';
                    }
                    return st+'</div>';
                },
                "targets": 7
            },
            ],
            // "columnDefs": [

            // ]
        }); //Set table to datatable

  }
  });
  }
//--------------End Lead Branch---------//
//////////////////////////==========================END MET KEOSAMBO ====================///////////////////////////////
    // $(document).ready(function(){
    //     var a = 0;
    //     var i = 0;
    //     $("").click(function(){

        // var tblRow =
        //     a++;
        //     '<tr id="row' + i + '"  >' +
        //         '<td class="style_td">' +
        //         '<input type="text" class="form-control" name="product_name[]"  required>' +
        //         '</td>' +
        //         '<td class="style_td ">' +
        //         '<input type="text" class="form-control" name="quantity[]" id="item_qty" required>' +
        //         '</td>' +
        //         '<td class="style_td ">' +
        //         '<input type="number" step="1" min="1" class="form-control" name="unit_price" required>' +
        //         '</td>' +
        //         '<td class="style_td ">' +
        //         '<input type="text" class="form-control total" name="sub_total[]" id="total"  class="total" required >' +
        //         '</td>' +
        //     '</tr>';
        //     i++;
        // console.log(tblRow);
        // $('#add_row_table_quoteItem').append(tblRow);
    //     });
    // });



            //click back to home
        $('.lead').click(function(e){
            e.preventDefault();
            alert(ld);
                $.ajax({
                    type: 'GET',
                    url:ld,
                    success:function(data){
                        $(".content-wrapper").show();
                        $(".content-wrapper").html(data);
                }
            });
        })

        $(function(){
             //Initialize Select2 Elements
                 $('.select2').select2()

                 $('.select2bs4').select2({
                    theme: 'bootstrap4'
                  })
        })


        $('.to').change(function(e){
            var to = $(this). children("option:selected"). val();
            alert(to);
        })
        $('.save').click(function(){
            submit_form ('/addlead','frm_lead','lead');
        })
        // select option lead in add lead, if have value go to list field add branch
        $("#lead_id").change(function () {
            var lead_id = $(this).val();
            //goto_Action('/addleadtype',lead_id);
            CrmSelectChange('/typeaddlead','CrmChangeSelectLead',lead_id)
        })



        // // radio button change option select lead status
        // $('input[name="checksurvey"]').change(function(){ // bind a function to the change event
        //     if($(this).is(":checked")){ // check if the radio is checked
        //         var val = $(this).val();
        //         // console.log('radio val='+val);
        //         if(val == 1){
        //             $('#lead_status').val(3).addClass('seleted');
        //         }else{
        //             $('#lead_status').val('').addClass('seleted');
        //         }
        //     }
        // });


        // // check the radio survey button when status lead change value
        // $('#lead_status').change(function(){

        // });


//========================>> Start-Quote-CRM JS <<=========================================================

        // function template to get route & id to show data
        function goto_Action(route,id,id2,id3){
          $(".content-wrapper").html();
          if(check_session()){
              return;
          }
          if(route.length<=0){
              $(".content-wrapper").html();
              return;
          }
          if(route=='/'){
              $(".content-wrapper").html();
              return;
          }
          $.ajax({
                type: 'GET',
                url:route,
                data:{
                    id_:id,
                    id_2:id2,
                    id_3:id3,
                    },
                success:function(data){
                    $(".content-wrapper").show();
                    $(".content-wrapper").html(data);
                },
                error:function(){
                    $(".content-wrapper").html(jerror());
                }
          });
        }



        // function to get delete quote lead
        function getDeleteQuoteLead(route,id) {

            Swal.fire({
              title: 'Do you want to delete this?',
              icon: 'warning',
              showCancelButton: true,
              width: '35%',
              padding: '10px',
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Delete'
            }).then((result) => {
              if (result.value) {
                $.ajax({
                  url:route,
                  type: 'POST',
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  data:{id_:id},
                  success:function(data){
                        // console.log(data);
                        if(data.success){
                            sweetalert('success','Delete sucesssed!');
                            setTimeout(function(){ go_to('/quote'); }, 1300);// Set timeout for refresh content
                        }else{
                            sweetalert('error','Delete failed!');
                        }
                  }

                 });

              }
            })

          };



        // function to ajax with http respon
        function getHttpRespon(route,id){
            var id_ = "id="+id;
            var url= route;
            var x=new XMLHttpRequest();
            x.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200){
                    // console.log(this.responseText);
                    data = (this.responseText);
                    data = JSON.parse(this.responseText);
                }
            }
            x.open("GET", url + "?" + id_ , true);
            x.send();
        }






        //function to get show modal
        function getShowPopup(route,id,modal_mainform,modal_form,tblId,btnId,getName,fieldID,fieldName){
            var id_ = "id="+id;
            var url= route;
            $('#'+modal_form+'').modal('hide');  // hide popup before show again
            var x=new XMLHttpRequest();
            x.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200){
                    if(this.responseText.length > 0){
                          document.getElementById(modal_mainform).innerHTML=this.responseText;
                          $('#'+modal_form+'').modal('show');
                          getDataTableSelectRow(tblId,btnId,getName,fieldID,fieldName,modal_form);
                          // setTimeout(function(){ i = 0; }, 5000);
                    }

                }
            }
            x.open("GET", url + "?" + id_ , true);
            x.send();
        }


        //function to get data table
        function getDataTable(tblId){
            let table = $('#'+tblId+'').DataTable({
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
            return table;
        }
        function getDataTableServerSide(tblId,route){ //this method is for list lead on add quote view
          let table = $('#'+tblId+'').DataTable({
              sDom: 'lrtip',
              targets:'no-sort',
              bSort: false,
              select: true,
              serverSide: true,
              ajax: route,
              createdRow: function( row, data, dataIndex ) {
                $(row).attr('id', data[5]);
                $( row ).find('td:eq(0)').attr('id', 'leadKhName_'+data[5]);
                $( row ).find('td:eq(1)').attr('id', 'leadEnName_'+data[5]);
              },
              columnDefs:
                [
                  {
                    searchable : false,
                    visible:false,
                    targets:5,
                  }
                ],
          });
          $(document).keyup(function(){
              $('#mySearchQuote').on( 'keyup', function () {
                  table.search($(this).val()).draw();
              });
          });
          return table;
      }


        //function to get datatable with select row
        function getDataTableSelectRow(tblId,btnId,getName,fieldID,fieldName,modal_form){

            var table ;
            if(tblId=="tblQuuteLead"){//
              table = getDataTableServerSide(tblId,"/quote/add/listQuoteLead/datatable");
            }else{
              table = getDataTable(tblId);
            }
            $('#'+tblId+' tbody').on( 'click', 'tr', function () {
                if ($(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            } );
            btnActionAfterClickRowTbl(table,btnId,getName,fieldID,fieldName,modal_form);
        }



      //function action when user click row on table then click this select button

      function btnActionAfterClickRowTbl(tbl,btnId,getName,fieldID,fieldName,modal_form){
          $('#'+btnId+'').click( function () {
              if($('tbody tr').hasClass('selected') == true){
                    var lead_id = $('.selected').attr("id");
                    var lead_name = $.trim($('#'+getName+'_'+lead_id+'').text());
                    $('#'+fieldID+'').val(lead_id);
                    $('#'+fieldName+'').val(lead_name);
                    var leadAddressId = $('#leadAddressId'+lead_id+'').val();
                    if(typeof leadAddressId != 'undefined'){
                        $('#crm_address_id').val(leadAddressId);
                    }
                    // console.log('when selected tr table addrssid='+leadAddressId);
                  $('#'+modal_form+'').modal('hide');
              }else{
                    $("#"+btnId+"").notify(
                        "No record seleted !",
                        "info",
                        {
                            position:"right",
                        }
                    );
              }
          });

      }


      //functin alert text use sweetalert2 for show info
      function alertText(title_,icon_){
              Swal.fire({
              title: title_,
              icon: icon_,
              // showCancelButton: true,
              width: '30%',
              padding: '10px',
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'OK'
            });

      }


    // function myfun111(){
    //     alert('thiso is alert test');
    // }


    //function for notify alert
    function notify_alert(id,type,locat,message){

        $(id).notify(
          ""+message+"", // show notify message
          {
            position: locat, // top, left, right...
            className: type, // type error or success
            autoHideDelay: 20000,

          }
        );
    }



    //function to get content of add product by branch lead
    function row_content(i,branId){
        // var i = 0;
        $row_content =

        '<div id="row_content'+i+'" class="form-group border border-secondary rounded pt-3 p-1  row_content">'+
                '<div class="col-12" align="right">' +
                    '<button type="button" id="'+i+'" class="close btnCloseRowContent" style="color:blue;" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                ' </div>'+
                '<div class="form-group col-11">'+
                        '<div class="input-group">'+
                            '<div class="input-group-prepend">'+
                                '<span class="font-weight-bold input-group-text">Branch:</span>'+
                            '</div>'+
                            '<input type="text" class="form-control" id="branch'+branId+'"  name="branch"   placeholder="" required readonly>'+
                            '<input type="hidden" id="lead_branch'+branId+'"  name="lead_branch[]"  required readonly>'+
                        ' </div>'+
                        // '<div id="showVatInfo_'+branId+'" style="color:blue;" class="pl-2 pt-1 font-weight-bold font-size-14"></div>'+
                        '<input type="hidden" id="vatNumber'+branId+'" readonly>'+
                '</div>'+

                '<div class="form-group col-11">'+
                    '<div class="input-group">'+
                        '<div class="input-group-prepend">'+
                            '<span class="font-weight-bold input-group-text">Address:</span>'+
                        '</div>'+
                        '<input type="text" class="form-control" id="branchAddress'+branId+'"  name="branchAddress"   placeholder="" required readonly>'+
                        '<input type="hidden" id="'+branId+'"  name=""  required readonly>'+
                    '</div>'+
                '</div>'+


                '<div class="col-12">'+
                        '<table class="table table-bordered ">'+
                            '<thead class="thead-item-list">'+
                                '<tr>'+
                                    '<th class="td-item-quote-name" style="width:30%;"><b style="color:red">*</b> Item Name</th>'+
                                    '<th class="td-item-quote">Type</th>'+
                                    '<th style="width: 100px">Quantity</th>'+
                                    '<th style="width: 120px">Measurement</th>'+
                                    '<th class="td-item-quote">List Price($)</th>'+
                                    '<th class="td-item-quote">Total($)</th>'+
                                    '<th style="width: 50px;" >'+
                                        '<button type="button" class="btn btn-info" id="btnAddRowQuoteItem" data-id="'+branId+'"><span><i class="fa fa-plus"></i></span></button>'+ //data-id tbody use for get branch id
                                    '</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody id="add_row_tablequoteItem'+branId+'" class="add_row_tablequoteItem" >'+
                                //content of add table product
                            '</tbody>'+
                    ' </table>'+
                '</div>'+
        '</div>';
        $('#content-quote-product').append($row_content);

    }



    //function for btn close row content
    $(document).on('click','.btnCloseRowContent',function(){
        var btnId = $(this).attr("id");
        $('#row_content'+btnId+'').remove();
    });


    //function to get lead branch by lead id
    var i = 0;
    $(document).on('click','#clickGetBranch', function(){
            var lead_id = $('#lead_id').val();
            if(lead_id != ""){
            var id_ = "id="+lead_id;
            var url= '/quote/add/listQuoteBranch';
            $('#listQuoteBranch').modal('hide');  // hide popup before show again
            var x=new XMLHttpRequest();
            x.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200){

                    document.getElementById('modal-list-quote').innerHTML=this.responseText;
                    $('#listQuoteBranch').modal('show');

                    var datatable = getDataTable('tblQuoteBranch');
                    // console.log(table);
                    $('#tblQuoteBranch tbody').on( 'click', 'tr', function () {
                        if ($(this).hasClass('selected') ) {
                            $(this).removeClass('selected');
                        }
                        else {
                            datatable.$('tr.selected').removeClass('selected');
                            $(this).addClass('selected');
                        }
                    });

                    $('#getSelectRow').click( function (){
                        if($('tbody tr').hasClass('selected') == true){
                            var branch_id = $('.selected').attr("id");

                            // console.log('branchid='+branch_id);
                            if(typeof(branch_id) == 'undefined'){
                                $("#getSelectRow").notify(
                                    "No data available in table!",
                                    "info",
                                    {
                                    position:"right",
                                    }
                                );
                                return 0;
                            }
                            //check if row content of branch already add
                            if(typeof($('#lead_branch'+branch_id+'').val()) != 'undefined'){
                                    $("#getSelectRow").notify(
                                        "This record was choosen !",
                                        "info",
                                        {
                                        position:"right",
                                        }
                                    );
                                    return 0;
                            }

                            if(branch_id != ''){
                                    $('#crm_lead_branch_id').val(branch_id);
                                    //get value from textbox
                                    var branchNameEn = $.trim($('#brdcompanyEn_'+branch_id+'').val());
                                    var addressName = $.trim($('#brdAddressNameEn_'+branch_id+'').val());
                                    var vatNumber = $.trim($('#branVatNumber_'+branch_id+'').val());

                                    //function to add row content for add product branch
                                    row_content(i,branch_id);
                                    i++;

                                    //send value to textbox in branch product

                                    $('#branch'+branch_id+'').val(branchNameEn);
                                    $('#lead_branch'+branch_id+'').val(branch_id);
                                    $('#branchAddress'+branch_id+'').val(addressName);
                                    // console.log('vat num from select row='+vatNumber);
                                    if(vatNumber == ''){
                                        $('#valueAddTax').text('No');
                                        // console.log('Vat no');
                                    }else{
                                        $('#valueAddTax').text('Yes');
                                        // console.log('Vat yes');
                                    }
                                    // console.log('vat_number='+vatNumber);
                                    $('#vatNumber'+branch_id+'').val(vatNumber);

                                    //close modal
                                    $('#listQuoteBranch').modal('hide');
                            }
                        }else{
                            $("#getSelectRow").notify(
                                "No record seleted !",
                                "info",
                                {
                                position:"right",
                                }
                            );
                        }
                    });


                }
            }
            x.open("GET", url + "?" + id_ , true);
            x.send();
        }else{
          notify_alert("#lead_name","error","bottom","Requirement this field !");
        }
    });



    // function addGrandTotalQuote(){

    //     var content =   '<tr class="fieldGrandTotal">'+
    //                         '<td style="width: 50%"><input type="hidden"></td>'+
    //                         '<td>'+
    //                             '<table class="table table-bordered tr-quote-row">'+
    //                                 '<tbody>'+
    //                                     '<tr style="text-align: right">'+
    //                                         '<td  ><span style="padding-right: 12px;">Sum Total </span></td>'+
    //                                         '<td  ><div id="sumTotal"> 0.0 </div></td>'+
    //                                     '</tr>'+
    //                                     '<tr style="text-align: right">'+
    //                                         '<td>'+
    //                                             '<span style="padding-right: 12px;">(+) Tax (10%) </span>'+
    //                                         '</td>'+
    //                                         '<td>'+
    //                                             '<div id="getTaxation"> 0.0 </div>'+
    //                                         '</td>'+
    //                                     '</tr>'+
    //                                     '<tr class="td-total-quote grandTotal" >'+
    //                                         '<td  ><span style="padding-right: 12px;">Grand Total</span></td>'+
    //                                         '<td  ><div id="grandTotal"> 0.0 </div></td>'+
    //                                     '</tr>'+
    //                                 '</tbody>'+
    //                             '</table>'+
    //                         '</td>'+
    //                     '</tr> ';
    //     $('#grandTotalBody').append(content);
    // }






    $(document).on('click','#btnOrganization', function(){
                // clear textfieild lead branch
                $('.btnCloseRowContent').click();
                $('.btnCloseRowContent').click();

                // clear data in grandTotal
                $('#sumTotal').text('0.0');
                $('#getTaxation').text('0.0');
                $('#grandTotal').text('0.0');
    });







    //function to add qoute data to database
    $(document).on('click','#btnQuoteSave',function(){


          $("#frm_addQuote input").removeClass("is-invalid");//remove all error message
          $("#frm_addQuote select").removeClass("is-invalid");//remove all error message
          $("#frm_addQuote textarea").removeClass("is-invalid");//remove all error message
          $("#frm_addQuote radio").removeClass("is-invalid");//remove all error message
          $.ajax({
              type: 'POST',
              url: '/quote/save',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data:
                $('#frm_addQuote').serialize(),

              success:function(data)
              {
                    // if(!hrms_validation('frm_addQuote')){return;}
                  if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
                        sweetalert('success','Data has been saved !');
                        setTimeout(function(){
                            go_to('/quote/detail?id_='+data.quoteId);
                        },1300);

                    // use go ot view quote detail
                  }else{
                    var num1 = 0;
                    $.each(data.errors, function(key, value ) {//foreach show error
                        if(num1 == 0){
                          sweetalert('warning', value);
                        }
                        num1 += 1;
                        $("#" + key).addClass("is-invalid"); //give read border to input field
                        $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
                        $("#" + key + "Error").addClass("invalid-feedback");
                        // console.log('key='+key+'--value='+value);


                        // check if validate give empty product field
                        if(key.slice(0, -2) == 'product_name'){
                            //   console.log('require key--'+key);
                              $.each($("input[name='product_name[]'"),function(index,value){
                                  var prd_id=  $(this).attr("id");
                                  if( $(this).val() ==  "" ){
                                      $(this).addClass("is-invalid");
                                      notify_alert("#"+prd_id+"","error","bottom","This field required !");
                                  }
                              });
                        }

                    });

                  }
              },
              error: function(data) {
                  console.log(data);
                  // console.log('data error when send to http !');
                  sweetalert('warning','Data not accessing to server!');
              }
          });
    });




    //function click to edit quote lead
    function editQouteLead(qouteId){
        $.ajax({
            type: 'GET',
            url: '/quote/edit/lead',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                qouteId:qouteId,
            },
            success:function(data)
            {
                console.log(data);
                $(".content-wrapper").html(data);
                // hideloading();

            }
        });
    }








    //function click to update quote lead
    $(document).on('click', '#btnUpdateQuoteLead', function (){
            $("#frmEditQuoteLead input").removeClass("is-invalid");//remove all error message
            $("#frmEditQuoteLead select").removeClass("is-invalid");//remove all error message
            $("#frmEditQuoteLead textarea").removeClass("is-invalid");//remove all error message
            $("#frmEditQuoteLead radio").removeClass("is-invalid");//remove all error message
            var quoteId = $('#quote_id').val();
            $.ajax({
                method: 'PUT',
                url: '/quote/edit/lead/update',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:
                    $('#frmEditQuoteLead').serialize(),
                success:function(data)
                {

                    if(data.success){ //condition for check success
                        sweetalert('success','Update successed!');
                        setTimeout(function(){
                            goto_Action('/quote/detail', quoteId);
                        },1500);

                    }else{
                        var num1 = 0;
                        $.each(data.errors, function(key, value) {//foreach show error
                            if(num1 == 0){
                                sweetalert('warning', value);
                            }
                            console.log('key='+key+'--value='+value);
                            num1 += 1;
                            $("#" + key).addClass("is-invalid"); //give read border to input field
                            $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
                            $("#" + key + "Error").addClass("invalid-feedback");

                        });
                    }

                },
                error: function(data) {
                    console.log(data);
                    sweetalert('warning','Data not accessing to server!');
                }
            });
    });




    //function click to submit update quote branch
    $(document).on('click','#btnUpdateQuoteBranch',function(){
            var branId = $(this).attr("data-id");
            $("#frmEditQuoteBranch"+branId+" input").removeClass("is-invalid");//remove all error message
            $("#frmEditQuoteBranch"+branId+" select").removeClass("is-invalid");//remove all error message
            $("#frmEditQuoteBranch"+branId+" textarea").removeClass("is-invalid");//remove all error message
            $("#frmEditQuoteBranch"+branId+" radio").removeClass("is-invalid");//remove all error message
            var quoteId = $('#quote_id').val();
            $.ajax({
                method: 'PUT',
                url: '/quote/edit/branch/update',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:
                    $('#frmEditQuoteBranch'+branId+'').serialize(),
                success:function(data)
                {

                    if(data.success){ //condition for check success
                        sweetalert('success','Update successed!');
                        setTimeout(function(){
                            goto_Action('/quote/detail', quoteId);
                        },2000);

                    }else{
                        // sweetalert('error','Update failed!');
                        var num1 = 0;
                        $.each(data.errors, function(key, value) {//foreach show error
                            if(num1 == 0){
                                sweetalert('warning', value);
                            }
                            // console.log('key='+key+'--value='+value);
                            num1 += 1;
                            $("#" + key).addClass("is-invalid"); //give read border to input field
                            $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
                            $("#" + key + "Error").addClass("invalid-feedback");

                            if(key.slice(0, -2) == 'product_name'){
                                //   console.log('require key--'+key);
                                    $.each($("input[name='product_name[]'"),function(index,value){
                                        var prd_id=  $(this).attr("id");
                                        if( $(this).val() ==  "" ){
                                            $(this).addClass("is-invalid");
                                            notify_alert("#"+prd_id+"","error","bottom","This field required !");
                                        }
                                    });
                            }

                        });


                    }

                    // if(data.success){

                    // }else{
                    // }

                },
                error: function(data) {
                    console.log(data);
                    sweetalert('warning','Data not accessing to server!');
                }
            });
    });









//===========================>> End-Quote-CRM JS <<========================================================

// =========================  set schedule of branch ================================

// });


// ========================= End set schedule of branch ================================


// qoute stage

// end quote stage

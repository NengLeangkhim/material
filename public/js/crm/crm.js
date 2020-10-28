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
                // sweetalert('warning',value);
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
// // ----------- Report ------------- //
//     //Report Lead
//       // Lead Chart
//         function ReportLeadChart(){
//           $("#FrmChartReport input").removeClass("is-invalid");//remove all error message
//           $.ajax({
//             url: '/crmreport/lead/chart',//get link route
//             type:'GET',
//             headers: {
//               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//           },
//              data://{LeadChartFrom:from,LeadChartTo:to}, //_token: $('#token').val(),
//             $('#FrmChartReport').serialize(),
//             success:function(data)
//             {
//             //   if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
//             //     google.charts.load('current', {packages: ['corechart']});
//             //     google.charts.setOnLoadCallback(CrmLeadDrawChart);
//             //     function CrmLeadDrawChart() {
//             //         $.each( data.success.data, function( key, value ) {//foreach show error
//             //         var data_chart = google.visualization.arrayToDataTable([
//             //            ["Lead","",{role:'style'}],
//             //           [value.name_en,value.total_lead,'color:#007bff']
//             //           // ["Junk Lead", 11,'color:#28a745'],
//             //           // ["Qualified", 66,'color:#ffc107'],
//             //           // ["Inquiry", 30,'color:#dc3545'],
//             //           // ["Surveyed", 20,'color:black']

//             //         ]);
//             //         var view = new google.visualization.DataView(data_chart);
//             //         view.setColumns([0, 1,
//             //                         { calc: "stringify",
//             //                           sourceColumn: 1,
//             //                           type: "string",
//             //                           role: "annotation" },
//             //                         2]);
//             //         var options = {
//             //             title: 'Lead Performance',
//             //         };

//             //         var chart = new google.visualization.BarChart(document.getElementById('LeadChart'));

//             //         chart.draw(view, options);
//             //       })
//             //     }
//             //  }else{
//             //    $.each( data.errors, function( key, value ) {//foreach show error
//             //        $("#" + key).addClass("is-invalid"); //give read border to input field
//             //        // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
//             //        $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
//             //        // sweetalert('warning',value);
//             //    });
//             //  }

//             }
//           });
//         }
//     //Report Contact
//       // Contact Chart
//         function ReportContactChart(){
//           $("#FrmChartContactReport input").removeClass("is-invalid");//remove all error message
//           $.ajax({
//             url: '/crmreport/contact/chart',//get link route
//             type:'GET',
//             headers: {
//               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//           },
//              data://{LeadChartFrom:from,LeadChartTo:to}, //_token: $('#token').val(),
//             $('#FrmChartContactReport').serialize(),
//             success:function(data)
//             {
//               if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
//                 // Lead Contact
//                 google.charts.load("current", {packages:["corechart"]});
//                 google.charts.setOnLoadCallback(CrmContactDrawChart);
//                 function CrmContactDrawChart() {
//                   var data = google.visualization.arrayToDataTable([
//                     ['Task', 'Hours per Day'],
//                     ['Work',     11],
//                     ['Eat',      2],
//                   ]);

//                   var options = {
//                     title: 'My Daily Activities',
//                     is3D: true,
//                   };

//                   var chartLead = new google.visualization.PieChart(document.getElementById('ContactChart'));
//                   chartLead.draw(data, options);
//                 }

//              }else{
//                $.each( data.errors, function( key, value ) {//foreach show error
//                    $("#" + key).addClass("is-invalid"); //give read border to input field
//                    // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
//                    $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
//                    // sweetalert('warning',value);
//                });
//              }

//             }
//           });
//         }
//     //Report Organization
//       // Organization Chart
//       function ReportOrganizationChart(){
//         $("#FrmChartOrganizationReport input").removeClass("is-invalid");//remove all error message
//         $.ajax({
//           url: '/crmreport/organization/chart',//get link route
//           type:'GET',
//           headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//            data://{LeadChartFrom:from,LeadChartTo:to}, //_token: $('#token').val(),
//           $('#FrmChartOrganizationReport').serialize(),
//           success:function(data)
//           {
//             if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
//             // Organization
//               google.charts.load("current", {packages:["corechart"]});
//               google.charts.setOnLoadCallback(CrmOrganizationDrawChart);
//               function CrmOrganizationDrawChart() {
//                 var data = google.visualization.arrayToDataTable([
//                   ['Language', 'Speakers (in millions)'],
//                   ['Assamese', 13], ['Bengali', 83], ['Bodo', 1.4],
//                   ['Dogri', 2.3], ['Gujarati', 46], ['Hindi', 300],
//                   ['Kannada', 38], ['Kashmiri', 5.5], ['Konkani', 5],
//                   ['Maithili', 20], ['Malayalam', 33], ['Manipuri', 1.5],
//                   ['Marathi', 72], ['Nepali', 2.9], ['Oriya', 33],
//                   ['Punjabi', 29], ['Sanskrit', 0.01], ['Santhali', 6.5],
//                   ['Sindhi', 2.5], ['Tamil', 61], ['Telugu', 74], ['Urdu', 52]
//                 ]);

//                 var options = {
//                   title: 'Indian Language Use',
//                   legend: 'none',
//                   pieSliceText: 'label',
//                   slices: {  4: {offset: 0.2},
//                             12: {offset: 0.3},
//                             14: {offset: 0.4},
//                             15: {offset: 0.5},
//                   },
//                 };

//                 var chart_organization = new google.visualization.PieChart(document.getElementById('OrganizationChart'));
//                 chart_organization.draw(data, options);
//               }


//            }else{
//              $.each( data.errors, function( key, value ) {//foreach show error
//                  $("#" + key).addClass("is-invalid"); //give read border to input field
//                  // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
//                  $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
//                  // sweetalert('warning',value);
//              });
//            }

//           }
//         });
//       }
//     //Report Quote
//       // Quote Chart
//       function ReportQuoteChart(){
//         $("#FrmChartQuoteReport input").removeClass("is-invalid");//remove all error message
//         $.ajax({
//           url: '/crmreport/quote/chart',//get link route
//           type:'GET',
//           headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//            data://{LeadChartFrom:from,LeadChartTo:to}, //_token: $('#token').val(),
//           $('#FrmChartQuoteReport').serialize(),
//           success:function(data)
//           {
//             if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
//             // Quote Chart
//             google.charts.load('current', {'packages':['corechart']});
//             google.charts.setOnLoadCallback(CrmQuoteDrawChart);

//             function CrmQuoteDrawChart() {
//               // Some raw data (not necessarily accurate)
//               var data = google.visualization.arrayToDataTable([
//                 ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
//                 ['2004/05',  165,      938,         522,             998,           450,      614.6],
//                 ['2005/06',  135,      1120,        599,             1268,          288,      682],
//                 ['2006/07',  157,      1167,        587,             807,           397,      623],
//                 ['2007/08',  139,      1110,        615,             968,           215,      609.4],
//                 ['2008/09',  136,      691,         629,             1026,          366,      569.6]
//               ]);

//               var options = {
//                 title : 'Monthly Coffee Production by Country',
//                 vAxis: {title: 'Cups'},
//                 hAxis: {title: 'Month'},
//                 seriesType: 'bars',
//                 series: {5: {type: 'line'}}
//               };

//               var chart_quote = new google.visualization.ComboChart(document.getElementById('QuoteChart'));
//               chart_quote.draw(data, options);
//             }



//            }else{
//              $.each( data.errors, function( key, value ) {//foreach show error
//                  $("#" + key).addClass("is-invalid"); //give read border to input field
//                  // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
//                  $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
//                  // sweetalert('warning',value);
//              });
//            }

//           }
//         });
//       }

// -----------END Report ---------- //
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
          scrollX:true
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
            //  sweetalert('warning',value);
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
            //  sweetalert('warning',value);
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
                $('#name_kh').val(response.data.name_en);
                $('#name_en').val(response.data.name_kh);
                $('#sequence').val(response.data.sequence);
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
                $('#name_kh').val(response.data.name_en);
                $('#name_en').val(response.data.name_kh);
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
                $('#name_kh').val(response.data.name_en);
                $('#name_en').val(response.data.name_kh);
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
                $('#name_kh').val(response.data.name_en);
                $('#name_en').val(response.data.name_kh);
                if(response.data.status==true){
                  $('#status').val(1);
                }else{
                  $('#status').val(0);
                }
              });
      }
      });
    });   
    // ----- Lead Status
    //Update lead Status
    $(document).on('click', '.CrmEditScheduleType', function(){
      var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
      $.ajax({
      url:"/crm/setting/scheduletype/get",   //Request send to "action.php page"
      type:"GET",    //Using of Post method for send data
      data:{id:id},//Send data to server
      dataType:"json",   //Here we have define json data type, so server will send data in json format.
      success:function(response){
              $('#crm_schedule_type').modal('show'); //It will display modal on webpage
              $('#ActionScheduleType').text('Update'); //This code will change Button value to Update
              $('#card_title').text("Update Schedule Type");
              $('.print-error-msg').hide();
              $("#crm_schedule_type_form").find('input:text, input:password, input:file, select, textarea').removeClass("is-invalid");//remove valid all input field
              $(".invalid-feedback").children("strong").text("");/// remove errror massage
              $('#schedule_type_id').val(id);     //It will define value of id variable for update
              $.each(response.data, function(i, e){ //read array json for show to textbox
                $('#name_kh').val(response.data.name_en);
                $('#name_en').val(response.data.name_kh);
                if(response.data.status==true){
                  $('#is_result_type').val(1);
                }else{
                  $('#is_result_type').val(0);
                }
                if(response.data.status==true){
                  $('#status').val(1);
                }else{
                  $('#status').val(0);
                }
              });
      }
      });
    });  
    // ----- Quote Status
    //Update Quote Status
    $(document).on('click', '.CrmEditQuoteStatus', function(){
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
                $('#name_kh').val(response.data.name_en);
                $('#name_en').val(response.data.name_kh);
                if(response.data.status==true){
                  $('#status').val(1);
                }else{
                  $('#status').val(0);
                }
              });
      }
      });
    });  
// -----------Setting CRM ---------- //
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

    // get data into combobox branch
    $('#branch').ready(function(){
        // $('#branch').find('option').not(':first').remove();
            $.ajax({
                // url:'http://127.0.0.1:8000/api/branch',
                url:'api/branch',
                type:'get',
                dataType:'json',
                success:function(response){
                        for(var i=0; i<response['data'].length ;i++){
                            var id = response['data'][i].ma_company_branch_id;
                            var name = response['data'][i].name;
                            var company = response['data'][i].company;
                            // alert(name);
                            var option = "<option value='"+id+"'>"+name+" / "+company+"</option>";

                            $("#branch").append(option);
                        }
                //     }
                }
            })

        })
     // get  current_speed_isp in  selection
        $('#current_speed_isp').ready(function(){
          $('#current_speed_isp').find('option').not(':first').remove();
              $.ajax({
                  url:'api/currentsppedisp',
                  type:'get',
                  dataType:'json',
                  success:function(response){

                          for(var i=0; i<response['data'].length ;i++){
                              var id = response['data'][i].id;
                              var name = response['data'][i].name_en;
                              // alert(name);
                              var option = "<option value='"+id+"'>"+name+"</option>";

                              $("#current_speed_isp").append(option);
                          }
                  //     }
                  }
              })

          })

      // get  service in  selection
        $('#service').ready(function(){
          $('#service').find('option').not(':first').remove();
              $.ajax({
                  url:'api/stock/service',
                  type:'get',
                  dataType:'json',
                  success:function(response){

                          for(var i=0; i<response['data'].length ;i++){
                              var id = response['data'][i].id;
                              var name = response['data'][i].name;
                              // alert(name);
                              var option = "<option value='"+id+"'>"+name+"</option>";

                              $("#service").append(option);
                          }
                  //     }
                  }
              })

          })
        // get  lead in  selection
        $('#lead_id #getlead').ready(function(){
          // $('#lead_id').find('option').not(':first').remove();
          // $token = $_SESSION['token'];
          var myvar= $( "#getlead" ).val();
          // alert(myvar);

              $.ajax({
                  url:'api/getlead',
                  type:'get',
                  dataType:'json',
                  headers: {
                    'Authorization': `Bearer ${myvar}`,
                },
                  success:function(response){
                          for(var i=0; i<response['data'].length ;i++){
                              var id = response['data'][i].lead_id;
                              var name = response['data'][i].customer_name_en;
                              // alert(name);
                              var option = "<option value='"+id+"'>"+name+"</option>";

                              $("#lead_id").append(option);
                          }

                  }
              })
          })
          // get contact in add lead
          $('#contact_id  #getcontact').ready(function(){
            // $('#lead_id').find('option').not(':first').remove();
            var myvar= $( "#getcontact" ).val();
                $.ajax({
                    url:'api/contacts',
                    type:'get',
                    dataType:'json',
                    headers: {
                      'Authorization': `Bearer ${myvar}`,
                  },
                    success:function(response){

                            for(var i=0; i<response['data'].length ;i++){
                                var id = response['data'][i].id;
                                var name = response['data'][i].name_en;
                                // alert(name);
                                var option = "<option value='"+id+"'>"+name+"</option>";

                                $("#contact_id").append(option);
                            }

                    }
                })
            })

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

        // get value in search contact from selection and show in each field
        $( "#contact_id" ).change(function() {
          var to = $(this). children("option:selected"). val();
          var myvar= $( "#getcontact" ).val();
          // alert(to);
          $.ajax({
            url:'/api/contact/'+to,
            type:'get',
            dataType:'json',
            headers: {
              'Authorization': `Bearer ${myvar}`,
          },
            success:function(response){

                        var name_en = response['data'].name_en;
                        var name_kh = response['data'].name_kh;
                        var email = response['data'].email;
                        var phone = response['data'].phone;
                        var national_id = response['data'].national_id;
                        var position = response['data'].position;
                        var honorifics = response['data'].honorifics.name_en;
                        var honorifics_id = response['data'].honorifics.id;
                        // alert(honorifics);
                        $("#name_en").val(name_en);
                        $("#name_kh").val(name_kh);
                        $("#email").val(email);
                        $("#phone").val(phone);
                        $("#national_id").val(national_id);
                        $("#position").val(position);
                        // $("#ma_honorifics_id").val(honorifics);
                        var option = "<option value='"+honorifics_id+" 'selected>"+honorifics+"</option>";

                       $("#ma_honorifics_id").append(option);

                        $('#name_en').prop('readonly', true);
                        $('#name_kh').prop('readonly', true);
                        $('#email').prop('readonly', true);
                        $('#phone').prop('readonly', true);
                        $('#national_id').prop('readonly', true);
                        $('#position').prop('readonly', true);
                        $('#ma_honorifics_id').attr('disabled', true);


            }
        })
        });




//========================>> Start-Quote-CRM JS <<=========================================================

        // function template to get route & id to show data
        function goto_Action(route,id){
          $(".content-wrapper").html(spinner());
          if(check_session()){
              return;
          }
          if(route.length<=0){
              $(".content-wrapper").html(jnot_found());
              return;
          }
          if(route=='/'){
              $(".content-wrapper").html(jnot_found());
              return;
          }
          $.ajax({
              type: 'GET',
              url:route,
              data:{id_:id},
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
                  data:{id:id},
                  type:"GET",
                  success:function(data){

                    //   setTimeout(function(){ go_to(goto); }, 300);// Set timeout for refresh content
                    $.notify("Delete successed !", "success");
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
          var x=new XMLHttpRequest();
          x.onreadystatechange=function(){
              if(this.readyState==4 && this.status==200){
                  console.log(this.responseText);
                  document.getElementById(modal_mainform).innerHTML=this.responseText;
                  $('#'+modal_form+'').modal('show');
                  getDataTableSelectRow(tblId,btnId,getName,fieldID,fieldName,modal_form);
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



        //function to get datatable with select row
        function getDataTableSelectRow(tblId,btnId,getName,fieldID,fieldName,modal_form){
            var table = getDataTable(tblId);
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

        '<div id="row_content'+i+'" class="form-group border border-secondary rounded p-3  row_content">'+
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
                '</div>'+

                '<div class="form-group col-11">'+
                    '<div class="input-group">'+
                        '<div class="input-group-prepend">'+
                            '<span class="font-weight-bold input-group-text">Address:</span>'+
                        '</div>'+
                        '<input type="text" class="form-control" id="branchAddress'+branId+'"  name="branchAddress"   placeholder="" required readonly>'+
                        '<input type="hidden" id="branchAddress_id'+branId+'"  name="branchAddress_id[]"  required readonly>'+
                    '</div>'+
                '</div>'+

                '<div class="col-12">'+
                        '<table class="table table-bordered ">'+
                            '<thead class="thead-item-list">'+
                                '<tr>'+
                                    '<th class="td-item-quote-name"><b style="color:red">*</b> Item Name</th>'+
                                    '<th class="td-item-quote">Type</th>'+
                                    '<th style="width: 120px">Quantity</th>'+
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
        // console.log('row content added');
        $('#content-quote-product').append($row_content);

    }



    //function for btn close row content
    $(document).on('click','.btnCloseRowContent',function(){
        var btnId = $(this).attr("id");
        $('#row_content'+btnId+'').remove();
        console.log('this btn remove content row branch');
    });


    //function to get lead branch by lead id
    var i = 0;
    $(document).on('click','#clickGetBranch', function(){
        var lead_id = $('#lead_id').val();

        if(lead_id != ""){
            // getShowPopup('/quote/add/listQuoteBranch',lead_id,'modal-list-quote','listQuoteBranch','tblQuuteBranch','getSelectRow','branchKhName','getLeadBranchId','getLeadBranch');
            var id_ = "id="+lead_id;
            var url= '/quote/add/listQuoteBranch';
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

                    $('#getSelectRow').click( function () {
                        if($('tbody tr').hasClass('selected') == true){
                            var branch_id = $('.selected').attr("id");

                            //check if row content of branch already add
                            if(typeof($('#lead_branch'+branch_id+'').val()) != 'undefined'){
                                    $("#getSelectRow").notify(
                                        "This record was seleted!",
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
                                    var addressId = $.trim($('#branAddressId_'+branch_id+'').val());

                                    //function to add row content for add product branch
                                    row_content(i,branch_id);
                                    i++;

                                    //send value to textbox in branch product

                                    $('#branch'+branch_id+'').val(branchNameEn);
                                    $('#lead_branch'+branch_id+'').val(branch_id);
                                    $('#branchAddress'+branch_id+'').val(addressName);
                                    $('#branchAddress_id'+branch_id+'').val(addressId);


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
          notify_alert("#organiz_name","error","bottom","Requirement this field !");
        }
    });






    $(document).on('click','#btnOrganization', function(){
                // clear textfieild lead branch
              $('input[name="getLeadBranch"]').val("");
              ('input[name="crm_lead_branch_id"]').val("");
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

                  if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
                    // sweetalert('success','Data has been saved !');
                    go_to('/quote/detail');// refresh content

                    // use go ot view quote detail
                  }else{
                    var num1 = 0;
                    $.each(data.errors, function( key, value ) {//foreach show error
                        if(num1 == 0){
                          sweetalert('warning', value);
                        }
                        num1 += 1;
                        $("#" + key).addClass("is-invalid"); //give read border to input field
                        $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
                        $("#" + key + "Error").addClass("invalid-feedback");
                        console.log('key='+key+'--value='+value);


                        // check if validate give empty product field
                        if(key.slice(0, -2) == 'product_name'){
                              // console.log('require key--'+key);
                              $.each($("input[name='product_name[]'"),function(index,value){
                                  var prd_id=  $(this).attr("id");
                                  if( $(this).val() ==  "" ){
                                      $(this).addClass("is-invalid");
                                      notify_alert("#"+prd_id+"","error","bottom","This field required !");
                                  }
                              });
                        }


                        // check if validate give empty qty field
                        // if(key.slice(0, -2) == 'qty'){
                        //     $.each($("input[name='qty[]'"),function(index,value){
                        //         if($(this).val().length <= 0 ){
                        //             $(this).addClass("is-invalid");
                        //         }
                        //     });
                        // }

                        // // check if validate give empty price field
                        // if(key.slice(0, -2) == 'price'){
                        //   $.each($("input[name='price[]'"),function(index,value){
                        //       if($(this).val().length <= 0 ){
                        //           $(this).addClass("is-invalid");
                        //       }
                        //   });
                        // }

                        // // check if validate give empty discount field
                        // if(key.slice(0, -2) == 'discount'){
                        //   $.each($("input[name='discount[]'"),function(index,value){
                        //       if($(this).val().length <= 0 ){
                        //           $(this).addClass("is-invalid");
                        //       }
                        //   });
                        // }



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









//===========================>> End-Quote-CRM JS <<========================================================

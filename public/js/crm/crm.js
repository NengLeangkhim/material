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
// ---------- END Contact---------- //
// ----------- Report ------------- //
    //Report Lead
      // Lead Chart
        function ReportLeadChart(){
          $("#FrmChartReport input").removeClass("is-invalid");//remove all error message
          $.ajax({
            url: '/crmreport/lead/chart',//get link route
            type:'GET',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
             data://{LeadChartFrom:from,LeadChartTo:to}, //_token: $('#token').val(),
            $('#FrmChartReport').serialize(),  
            success:function(data)
            {  
              if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
                // console.log(data);
                google.charts.load('current', {packages: ['corechart']});
                google.charts.setOnLoadCallback(CrmLeadDrawChart);
                function CrmLeadDrawChart() {
                  var data = google.visualization.arrayToDataTable([
                    ["Lead","",{role:'style'}],
                    ["Cold", 10,'color:#007bff'],
                    ["Junk Lead", 11,'color:#28a745'],
                    ["Qualified", 66,'color:#ffc107'],
                    ["Inquiry", 30,'color:#dc3545'],
                    ["Surveyed", 20,'color:black']
                  ]);
                  var view = new google.visualization.DataView(data);
                  view.setColumns([0, 1,
                                  { calc: "stringify",
                                    sourceColumn: 1,
                                    type: "string",
                                    role: "annotation" },
                                  2]);
                  var options = {
                      title: 'Lead Performance',
                  };
      
                  var chart = new google.visualization.BarChart(document.getElementById('LeadChart'));
      
                  chart.draw(view, options);
                } 
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
    //Report Contact
      // Contact Chart
        function ReportContactChart(){
          $("#FrmChartContactReport input").removeClass("is-invalid");//remove all error message
          $.ajax({
            url: '/crmreport/contact/chart',//get link route
            type:'GET',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
             data://{LeadChartFrom:from,LeadChartTo:to}, //_token: $('#token').val(),
            $('#FrmChartContactReport').serialize(),  
            success:function(data)
            {  
              if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
                // Lead Contact
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(CrmContactDrawChart);
                function CrmContactDrawChart() {
                  var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Work',     11],
                    ['Eat',      2],
                  ]);

                  var options = {
                    title: 'My Daily Activities',
                    is3D: true,
                  };

                  var chartLead = new google.visualization.PieChart(document.getElementById('ContactChart'));
                  chartLead.draw(data, options);
                }

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
    //Report Organization
      // Organization Chart
      function ReportOrganizationChart(){
        $("#FrmChartOrganizationReport input").removeClass("is-invalid");//remove all error message
        $.ajax({
          url: '/crmreport/organization/chart',//get link route
          type:'GET',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           data://{LeadChartFrom:from,LeadChartTo:to}, //_token: $('#token').val(),
          $('#FrmChartOrganizationReport').serialize(),  
          success:function(data)
          {  
            if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
            // Organization
              google.charts.load("current", {packages:["corechart"]});
              google.charts.setOnLoadCallback(CrmOrganizationDrawChart);
              function CrmOrganizationDrawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Language', 'Speakers (in millions)'],
                  ['Assamese', 13], ['Bengali', 83], ['Bodo', 1.4],
                  ['Dogri', 2.3], ['Gujarati', 46], ['Hindi', 300],
                  ['Kannada', 38], ['Kashmiri', 5.5], ['Konkani', 5],
                  ['Maithili', 20], ['Malayalam', 33], ['Manipuri', 1.5],
                  ['Marathi', 72], ['Nepali', 2.9], ['Oriya', 33],
                  ['Punjabi', 29], ['Sanskrit', 0.01], ['Santhali', 6.5],
                  ['Sindhi', 2.5], ['Tamil', 61], ['Telugu', 74], ['Urdu', 52]
                ]);

                var options = {
                  title: 'Indian Language Use',
                  legend: 'none',
                  pieSliceText: 'label',
                  slices: {  4: {offset: 0.2},
                            12: {offset: 0.3},
                            14: {offset: 0.4},
                            15: {offset: 0.5},
                  },
                };

                var chart_organization = new google.visualization.PieChart(document.getElementById('OrganizationChart'));
                chart_organization.draw(data, options);
              }
              

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
    //Report Quote
      // Quote Chart
      function ReportQuoteChart(){
        $("#FrmChartQuoteReport input").removeClass("is-invalid");//remove all error message
        $.ajax({
          url: '/crmreport/quote/chart',//get link route
          type:'GET',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           data://{LeadChartFrom:from,LeadChartTo:to}, //_token: $('#token').val(),
          $('#FrmChartQuoteReport').serialize(),  
          success:function(data)
          {  
            if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
            // Quote Chart  
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(CrmQuoteDrawChart);

            function CrmQuoteDrawChart() {
              // Some raw data (not necessarily accurate)
              var data = google.visualization.arrayToDataTable([
                ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
                ['2004/05',  165,      938,         522,             998,           450,      614.6],
                ['2005/06',  135,      1120,        599,             1268,          288,      682],
                ['2006/07',  157,      1167,        587,             807,           397,      623],
                ['2007/08',  139,      1110,        615,             968,           215,      609.4],
                ['2008/09',  136,      691,         629,             1026,          366,      569.6]
              ]);

              var options = {
                title : 'Monthly Coffee Production by Country',
                vAxis: {title: 'Cups'},
                hAxis: {title: 'Month'},
                seriesType: 'bars',
                series: {5: {type: 'line'}}
              };

              var chart_quote = new google.visualization.ComboChart(document.getElementById('QuoteChart'));
              chart_quote.draw(data, options);
            }

              

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
    
// -----------END Report ---------- //
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
        $('#branch').find('option').not(':first').remove();
            $.ajax({
                // url:'http://127.0.0.1:8000/api/branch',
                url:'api/branch',
                type:'get',
                dataType:'json',
                success:function(response){
                 
                //     var len=0;
                //     if(response['data']!= null){
                //         len=response['data'].length;
                //         alert(len);
                //     }
                //     if(len>0){
                //         //read data and create <option>
                        for(var i=0; i<response['data'].length ;i++){
                            var id = response['data'][i].id;
                            var name = response['data'][i].name;
                            // alert(name);
                            var option = "<option value='"+id+"'>"+name+"</option>"; 

                            $("#branch").append(option); 
                        }
                //     }
                }
            })

        })

        $('.lead').click(function(e)        {
            var ld = $(this).attr("​value");
            e.preventDefault();  
            // alert(ld);
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

        



//========================>> Quote-CRM JS <<========================================================= 

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
                      if(data == 1){
                        alert(data);
                      }
                    //   setTimeout(function(){ go_to(goto); }, 300);// Set timeout for refresh content
                    //   Swal.fire(
                    //     'Deleted!',
                    //       alert,
                    //     'success'
                    //   )
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
                  // console.log(this.responseText);
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
        $('#'+id+'').notify(
            message, 
            type,
            { 
            position:locat,
            }
        );
    }



    //function to get lead branch by lead id 
    $(document).on('click','#clickGetBranch', function(){
        var lead_id = $('#organiz_id').val();
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
                            var lead_id = $('.selected').attr("id");
                            $('#getLeadBranchId').val(lead_id);


                            //get value from textbox
                            
                            var branchNameEn = $.trim($('#brdcompanyEn_'+lead_id+'').val());
                            var home_en = $.trim($('#brdnameEn_'+lead_id+'').val());
                            var home_kh = $.trim($('#brdnameKh_'+lead_id+'').val());
                            var street_en = $.trim($('#brdstreetEn_'+lead_id+'').val());
                            var street_kh = $.trim($('#brdstreetKh_'+lead_id+'').val());
                            var province = $.trim($('#brdprvince_'+lead_id+'').val());
                            var district = $.trim($('#brddistrict_'+lead_id+'').val());
                            var commune = $.trim($('#brdcommue_'+lead_id+'').val());
                            var village = $.trim($('#brdvillage_'+lead_id+'').val());

                            //send value to textbox
                            $('#getLeadBranch').val(branchNameEn);
                            $("#homeEN").val(home_en);
                            $("#homeKH").val(home_kh);
                            $("#streetEN").val(street_en);
                            $("#streetKH").val(street_kh);
                            $("#address_city").val(province);
                            $("#district").val(district);
                            $("#commune").val(commune);
                            $("#village").val(village);

                            //close modal
                            $('#listQuoteBranch').modal('hide');
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
          notify_alert('organiz_name','error','bottom','Requirement this field !');
        }
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

                   console.log(data);

                  if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
                    sweetalert('success',alert);
                    // go_to(goto);// refresh content 
                  }else{ 
                    $.each( data.errors, function( key, value ) {//foreach show error
                        $("#" + key).addClass("is-invalid"); //give read border to input field
                        $("#" + key + "_Error").children("strong").text("").text(data.errors[key][0]);
                        $("#" + key + "_Error").addClass("invalid-feedback");

                    });
                  }
              },
              error: function(data) {
                  // console.log(data);
              }
          });
    });




//===========================>> End-Quote-CRM JS <<========================================================
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
                google.charts.load('current', {'packages':['bar']});
                google.charts.setOnLoadCallback(CrmLeadDrawChart);
                function CrmLeadDrawChart() {
                  var data = google.visualization.arrayToDataTable([
                    ['Month', 'Lead'],
                    ['Jan', 1000],
                    ['Feb', 1170],
                    ['March', 660],
                    ['April', 1030]
                  ]);
      
                  var options = {
                    chart: {
                      title: 'Lead Performance',
                    }
                  };
      
                  var chart = new google.charts.Bar(document.getElementById('LeadChart'));
      
                  chart.draw(data, google.charts.Bar.convertOptions(options));
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

        



//========================>> Quote-CRM JS <<================================= 

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
    
    

        // function t get delete quote lead 
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
    




        function getShowPopup(route,id,modal_mainform,modal_form){
          
          var id_ = "id="+id;
          var url= route;
          var x=new XMLHttpRequest();
          x.onreadystatechange=function(){
              if(this.readyState==4 && this.status==200){    
                  document.getElementById(modal_mainform).innerHTML=this.responseText;
                  $('#'+modal_form+'').modal('show');
              }
          }
          x.open("GET", url + "?" + id_ , true);
          x.send();
        }

//===========================>> End-Quote-CRM JS <<==========================================
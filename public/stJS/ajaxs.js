function dashboardDateChange(){
  var date_start=document.getElementById('turbo_date_start').value;
  var date_end=document.getElementById('turbo_date_end').value;
  var location=document.getElementById('locationStorage').value;
  $.ajax({
    type:'GET',
    url:'/dashboardDateChange?',
    data:{
      _token:'<?php echo csrf_token() ?>',
      start_date:date_start,
      end_date:date_end
    },
    success:function(data){
      document.getElementById('dashboarhProduct').innerHTML=data;
      // console.log(data);
      d=data.response;
      charts(d);
    }
  });
}
function PaginationAllCompany(pages){
  $.ajax({
    type:'GET',
    url:'/PaginationAllCompany',
    data:{
      page:pages
    },
    success:function(data){
      document.getElementById('AllCompanyChange').innerHTML=data;
    }
  });
}
function locationChange(){
  var location=document.getElementById('locationStorage').value;
  var search=document.getElementById('searchNameProduct').value;
  $.ajax({
    type:'GET',
    url:'/dashboarhProduct?',
    data:{
        _token : '<?php echo csrf_token() ?>',
        location:location,
        search:search
        },
    success:function(data) {
      document.getElementById('dashboarhProduct').innerHTML=data;
   }
});
}
function pagination(pages){
  var date_start=document.getElementById('date_start').value;
  var date_end=document.getElementById('date_end').value;
  var search=document.getElementById('search').value;
  var branch=document.getElementById('branch').value;
  $.ajax({
      type:'GET',
      url:'/getChartofProduct?',
      data:{
          _token : '<?php echo csrf_token() ?>',
          page:pages
          },
      success:function(data) {
          // var d=[];
          d=data.response;
          charts(d);
     }
  });
}



function showCompanyDetail(companyID){
    // copanyProductChange
    $.ajax({
        type:'GET',
        url:'/modalCompany?',
        data:{
            _token : '<?php echo csrf_token() ?>',
            cID:companyID,
            },
        success:function(data) {
           console.log(data);
            document.getElementById('copanyProductChange').innerHTML=data;
       }
    });
    $('#ModalCompany').modal('show');

}

function BranchChange(page){
    var date_start=document.getElementById('date_start').value;
    var date_end=document.getElementById('date_end').value;
    var search=document.getElementById('search').value;
    var branch=document.getElementById('branch').value;
    $.ajax({
        type:'GET',
        url:'/branchChange?',
        data:{
            // _token : '<?php echo csrf_token() ?>',
            branchs:branch,
            searchs:search,
            date_starts:date_start,
            date_ends:date_end,
            pages:page
            },
        success:function(data) {
           console.log(data);
            document.getElementById('table_data').innerHTML=data;
       }
    });
}
$(document).ready(function() {
  // if(document.getElementById("tbl")){
  //   getDataofProduct(document.getElementById("tbl").rows[1].cells[6].innerHTML);
  // }
    $('#dashboarhProduct tr').click(function() {
     
        var i = this.rowIndex;
            if(typeof i=='undefined'){
                i=this.index()+1;
            }
        table=document.getElementById("tbl");
        r=table.rows[i].cells[6].innerHTML;
        getDataofProduct(r);
    });

});
function getDataofProduct(pid){
    $.ajax({
        type:'GET',
        url:'/getChartofProduct?',
        data:{
            _token : '<?php echo csrf_token() ?>',
            pids:pid,
            },
        success:function(data) {
            // var d=[];
            d=data.response;
            charts(d);
       }
    });
}

// chart of product
function charts(produdt){
    var date=[];
    var stAvailable=[];
    var stPurchase=[];
    var request=[];
    var Return =[];
    for(var i=0;i<produdt.length;i++){
        date[i]=produdt[i]["create_date"];
        stAvailable[i]=produdt[i]["total"];
        stPurchase[i]=produdt[i]["import"];
        request[i]=parseInt(produdt[i]["request"]*(-1));
        Return[i]=produdt[i]["return"];
    }
    new Chart(document.getElementById("bar-chart-grouped"), {
      type: 'bar',
      data: {
        labels: date,
        datasets: [
          {
            label: "Stock Available",
            backgroundColor: "#3e95cd",
            data: stAvailable
          }, {
            label: "Purchase",
            backgroundColor: "#8e5ea2",
            data: stPurchase
          },{
            label: "Request",
            backgroundColor: "red",
            data: request
          },{
            label: "Return",
            backgroundColor: "blue",
            data: Return
          }
        ]
      },
      options: {
        title: {
          display: true,
          // text: produdt[1]['name']
        }
      }
  });

}



// export excel
function GetDataFromTableExcel(tableID, filename = ''){
  var downloadLink;
  var dataType = 'application/vnd.ms-excel';
  var tableSelect = document.getElementById(tableID);
  var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
  
  // Specify file name
  filename = filename?filename+'.xls':'excel_data.xls';
  
  // Create download link element
  downloadLink = document.createElement("a");
  
  document.body.appendChild(downloadLink);
  
  if(navigator.msSaveOrOpenBlob){
      var blob = new Blob(['\ufeff', tableHTML], {
          type: dataType
      });
      navigator.msSaveOrOpenBlob( blob, filename);
  }else{
      // Create a link to the file
      downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
  
      // Setting the file name
      downloadLink.download = filename;
      
      //triggering the function
      downloadLink.click();
  }
}

// Export to Excel File
function ExporttoExcelFile(data,tblName){
  var options = {
    fileName: tblName
  };
  Jhxlsx.export(data, options);
}


// Export to PDF File
function ExporttoPDFFile(tableid) {
  var pdfname=tableid+".pdf";
  html2canvas(document.getElementById(tableid), {
      onrendered: function (canvas) {
          var data = canvas.toDataURL();
          var docDefinition = {
              content: [{
                  image: data,
                  width: 500
              }]
          };
          pdfMake.createPdf(docDefinition).download(pdfname);
      }
  });
}


// function PDF(){
//   var a=OnSubmitCofirm('Product');
//   alert(a);
// }

function OnSubmitCofirm(st){
  return confirm(st);
}
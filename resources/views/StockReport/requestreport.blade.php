
@include('../userview/header')
 <!-- page content -->
 <div class="right_col" role="main">
    <div class="contain-fluid">
        <div>
        <div class="box box-info">
        <form class="form-inline" >
            <div class="box-header with-border">
              <div class="form-group">
                  <label>Date From:</label>
                  <input type="date" id="date_from" name="date_from" class="form-control date" required>
                  <label>To:</label>
                  <input type="date" id="to_date" name="to_date" class="form-control date" required>
                  &nbsp
                  <input class="form-control" type="text" name="searchvalue" placeholder="search..." value="" onkeyup="getTableReport_search('requestreport',this)">
                  &nbsp
                  <button type="button" id="ft" class="btn btn-primary" style="margin: 0"><i class="fa fa-search"></i></button>
                  &nbsp
                  <button type="button" name="export" id="btnExport" class="btn btn-default" onclick="GetDataFromTableExcel('tb_requestreport','Request Report')"><i class="fa fa-file-excel-o"></i> Export</button>
              </div>
            </div>
            </form>
                <!-- table -->
                <div class="table-responsive reporttable" id="tablediv">
                    </div>
                <!-- end table -->
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@include('../userview/footer')
<script type='text/javascript'>
  $(document).ready(
      function(){
          getTableReport('requestreport');
      }
  );
  document.getElementById("ft").onclick=function(){
    f=document.getElementById('date_from');
    t=document.getElementById('to_date');
    if(f.value!=""){
      if(t.value!=""){
        getTableReport_ft('requestreport',f.value,t.value)
      }else{
        t.reportValidity();
      }
    }else{
      f.reportValidity();
    }
  }
</script>
 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-cogs"></i> Crm Setting</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">View Setting</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
      <div class="row">                  
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <div class="row">
                <div class="col-12">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);" onclick="CrmSettingView('/crm/setting/leadstatus','Lead_Status_Tbl')" data-toggle="tab">Lead Status</a></li>
                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);" onclick="CrmSettingView('/crm/setting/leadindustry','Lead_industry_Tbl')" data-toggle="tab">Lead Industry</a></li>
                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);" onclick="CrmSettingView('/crm/setting/leadsource','Lead_Source_Tbl')" data-toggle="tab">Lead Source</a></li>
                    <li class="nav-item"><a class="nav-link" href="#javascript:void(0);" onclick="CrmSettingView('/crm/setting/leadisp','Lead_ISP_Tbl')" data-toggle="tab">Current Lead Isp</a></li>
                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);" onclick="CrmSettingView('/crm/setting/scheduletype','Schedule_Type_Tbl')" data-toggle="tab">Schedule Type</a></li>
                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);" onclick="CrmSettingView('/crm/setting/quotestatus','Quote_Status_Tbl')" data-toggle="tab">Quote Status</a></li>
                  </ul>
                </div>
              </div>
            </div><!-- /.card-header -->
            <div class="card-body" >
              <div class="tab-content">
                    <!--show contact like table -->
                    <div class="tab-Setting">
                        <div class="row" id="CrmTabManageSetting">
                            
                        </div>
                    </div>
                    <!-- /.tab-pane -->        
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <script>
    CrmSettingView('/crm/setting/leadstatus','Lead_Status_Tbl');
  </script>
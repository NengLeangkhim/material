 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="fas fa-chart-pie"></i></span> Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('/welcome')">Home</a></li>
                <li class="breadcrumb-item active">View Report</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- section Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- AREA CHART -->
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Lead Chart</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                          <form id="FrmChartReport">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Date From <b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="hidden" name="fromDate">
                                        <input type="text" class="form-control" placeholder="Select Date" value="<?php echo date('Y')?>" id="LeadChartFrom" name='LeadChartFrom'  required>
                                        <span class="invalid-feedback" role="alert" id="LeadChartFromError"> {{--span for alert--}}
                                          <strong></strong>
                                        </span>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                    <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="hidden" name="toDate">
                                        <input type="text" class="form-control" placeholder="Select Date" id="LeadChartTo" value="<?php echo date('Y')?>" name='LeadChartTo'  required>
                                        <span class="invalid-feedback" role="alert" id="LeadChartToError"> {{--span for alert--}}
                                          <strong></strong>
                                        </span>
                                    </div>
                                  </div>
                            </div>
                          </form>
                        </div>
                        <div class="chart">
                            <div id="LeadChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                        </div>
                        <div class="col-md-12 text-right">
                          <button class="btn btn-info" onclick="go_to('/crmreport/detaillead')"><span><i class="fas fa-info"></i></span> Detail</button>
                        </div>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- End Col -->
            <div class="col-md-6">
                <!-- DONUT CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                    <h3 class="card-title">Contact Chart</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <form id="FrmChartContactReport">
                          @csrf
                          <div class="row">
                                <div class="col-md-6">
                                  <label for="exampleInputEmail1">Date From <b style="color:red">*</b></label>
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                      </div>
                                      <input type="hidden" name="fromDate">
                                      <input type="text" class="form-control" placeholder="Select Date" value="<?php echo date('Y-m')?>" id="ReportContactFrom" name='ReportContactFrom'  required>
                                      <span class="invalid-feedback" role="alert" id="ReportContactFromError"> {{--span for alert--}}
                                        <strong></strong>
                                      </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                      </div>
                                      <input type="hidden" name="toDate">
                                      <input type="text" class="form-control" placeholder="Select Date" id="ReportContactTo" value="<?php echo date('Y-m')?>" name='ReportContactTo'  required>
                                      <span class="invalid-feedback" role="alert" id="ReportContactToError"> {{--span for alert--}}
                                        <strong></strong>
                                      </span>
                                  </div>
                                </div>
                          </div>
                        </form>
                      </div>
                      <div class="chart-contact">
                        <div id="ContactChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                      </div>
                      <div class="col-md-12 text-right">
                        <button class="btn btn-info" onclick="go_to('/crmreport/detailcontact')"><span><i class="fas fa-info"></i></span> Detail</button>
                      </div>
                    </div><!-- /.card-body -->
                </div> <!-- /.card -->
            </div><!-- End Col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <!-- LINE CHART -->
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">Organization Chart</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <form id="FrmChartOrganizationReport">
                          @csrf
                          <div class="row">
                                <div class="col-md-6">
                                  <label for="exampleInputEmail1">Date From <b style="color:red">*</b></label>
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                      </div>
                                      <input type="hidden" name="fromDate">
                                      <input type="text" class="form-control" placeholder="Select Date" value="<?php echo date('Y-m')?>" id="ReportOrganizationFrom" name='ReportOrganizationFrom'  required>
                                      <span class="invalid-feedback" role="alert" id="ReportOrganizationFromError"> {{--span for alert--}}
                                        <strong></strong>
                                      </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                      </div>
                                      <input type="hidden" name="toDate">
                                      <input type="text" class="form-control" placeholder="Select Date" id="ReportOrganizationTo" value="<?php echo date('Y-m')?>" name='ReportOrganizationTo'  required>
                                      <span class="invalid-feedback" role="alert" id="ReportOrganizationToError"> {{--span for alert--}}
                                        <strong></strong>
                                      </span>
                                  </div>
                                </div>
                          </div>
                        </form>
                      </div>
                      <div class="chart">
                          <div id="OrganizationChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                      </div>
                      <div class="col-md-12 text-right">
                        <button class="btn btn-info" onclick="go_to('/crmreport/detailorganization')"><span><i class="fas fa-info"></i></span> Detail</button>
                      </div>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- End Col -->
            <div class="col-md-6">
                <!-- BAR CHART -->
                <div class="card card-success">
                    <div class="card-header">
                    <h3 class="card-title">Quote Chart</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <form id="FrmChartQuoteReport">
                          @csrf
                          <div class="row">
                                <div class="col-md-6">
                                  <label for="exampleInputEmail1">Date From <b style="color:red">*</b></label>
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                      </div>
                                      <input type="hidden" name="fromDate">
                                      <input type="text" class="form-control" placeholder="Select Date" value="<?php echo date('Y-m')?>" id="ReportQuoteFrom" name='ReportQuoteFrom'  required>
                                      <span class="invalid-feedback" role="alert" id="ReportQuoteFromError"> {{--span for alert--}}
                                        <strong></strong>
                                      </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                      </div>
                                      <input type="hidden" name="toDate">
                                      <input type="text" class="form-control" placeholder="Select Date" id="ReportQuoteTo" value="<?php echo date('Y-m')?>" name='ReportQuoteTo'  required>
                                      <span class="invalid-feedback" role="alert" id="ReportQuoteToError"> {{--span for alert--}}
                                        <strong></strong>
                                      </span>
                                  </div>
                                </div>
                          </div>
                        </form>
                      </div>
                      <div class="chart">
                          <div id="QuoteChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                      </div>
                      <div class="col-md-12 text-right">
                        <button class="btn btn-info" onclick="go_to('/crmreport/detailquote')"><span><i class="fas fa-info"></i></span> Detail</button>
                      </div>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- End Col -->
        </div>
    </div><!-- /.container-fluid -->
</section><!-- end section Main content -->
<script src="js/crm/crm_report.js"></script>
<script>
    $(document).ready(function() {
    //   ReportLeadChart();
    //   ReportContactChart();
    //   ReportOrganizationChart();
    //   ReportQuoteChart();
    });
    $(window).resize(function(){
    //   CrmLeadDrawChart();
    //   CrmContactDrawChart();
    //   CrmOrganizationDrawChart();
    //   CrmQuoteDrawChart();
    });
    $(function () {
      // Date Lead
      $('#LeadChartFrom').datetimepicker({
        format: 'YYYY',
        sideBySide: true,
      });
      $("#LeadChartFrom").on("dp.change", function (e) {
        reportLeadByStatus();
      })
      $('#LeadChartTo').datetimepicker({
        format: 'YYYY',
        sideBySide: true,
      });
      $("#LeadChartTo").on("dp.change", function (e) {
        reportLeadByStatus();
      })
      // Date Contact
      $('#ReportContactFrom').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });
      $("#ReportContactFrom").on("dp.change", function (e) {
        ReportContactChart();
      })
      $('#ReportContactTo').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });
      $("#ReportContactTo").on("dp.change", function (e) {
        ReportContactChart();
      })
      // Date Organization
      $('#ReportOrganizationFrom').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });
      $("#ReportOrganizationFrom").on("dp.change", function (e) {
        ReportOrganizationChart();
      })
      $('#ReportOrganizationTo').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });
      $("#ReportOrganizationFrom").on("dp.change", function (e) {
        ReportOrganizationChart();
      })
      // Date Quote
      $('#ReportQuoteFrom').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });
      $("#ReportQuoteFrom").on("dp.change", function (e) {
        reportQuoteByStatus();
      })
      $('#ReportQuoteTo').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });
      $("#ReportQuoteFrom").on("dp.change", function (e) {
        reportQuoteByStatus();
      })
    });
  </script>

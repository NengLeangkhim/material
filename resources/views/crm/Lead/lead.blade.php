<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user-plus"></i> Add Lead </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">View Survey</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- section Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" >
                <div class="card" >
                    <div class="card-header p-2">
                        <ul class="nav nav-pills" id="custom-tabs-one-tab" role="tablist">

                            <li class="nav-item">
                                <button class="btn nav-link active"  id="btnAddLeadHome" name="btnGroupAddLead[]" value="/addlead/home" onclick="addLeadOption('/addlead/home','btnAddLeadHome');" data-toggle="tab">Home</button>
                            </li>
                            <li class="nav-item">
                                <button class="btn nav-link"  id="btnAddLeadBusiness" name="btnGroupAddLead[]" value="/addlead/business" onclick="addLeadOption('/addlead/business','btnAddLeadBusiness')" data-toggle="tab">Business</button>
                            </li>
                            <li class="nav-item">
                                <button class="btn nav-link"  id="btnAddLeadEnterprise" name="btnGroupAddLead[]" value="/addlead/enterprise" onclick="addLeadOption('/addlead/enterprise','btnAddLeadEnterprise')" data-toggle="tab">Enterprise</button>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="row pb-4">
                            <div class="col-12">
                                <div class="input-group pt-4 pl-4" style="margin-left:3px;">
                                    <div class="input-group-prepend pr-4">
                                        <span class="label label-success font-weight-bold">Type</span>
                                    </div>
                                    <div class="custom-control custom-radio ml-2">
                                        <input  type="radio" id="customRadio1" value="1" name="optionAddLead" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="customRadio1">Short</label>
                                    </div>
                                    <div class="custom-control custom-radio ml-4">
                                        <input  type="radio" id="customRadio2" value="2" name="optionAddLead" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio2">Full</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-Setting">
                                <div id="contentShowAddLeadType">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                    </div>
                </div>
            </div>
    </div>
</section><!-- end section Main content -->


<script type="text/javascript">
    CrmSurveyView('/crm/survey/list','surveyListTbl');


    $('.edit').click(function(e) {
        var id = $(this).attr("​value");
        go_to(id);
    });
    $('.branchdetail').click(function(e) {
        var id = $(this).attr("​value");
        go_to(id);
        // alert(id);
    });

    $(document).ready(function (){
        addLeadOption('/addlead/home');
    })
</script>

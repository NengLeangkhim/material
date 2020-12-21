 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-code-branch"></i> Opportunities</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">View Leads Branch</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- section Main content -->
<section class="content">
    <style>
        th {
            font-size: 16px;
        }

        td {
            font-size: 14px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);" onclick="CrmLeadBrancStatusChild('/crm/leadbranch/status/child/all','#StatusChildTab')" data-toggle="tab">All</a></li>
                                    @foreach ($status->data as $item)
                                        <li class="nav-item"><a class="nav-link" href="javascript:void(0);" onclick="CrmLeadBrancStatusChild('/crm/leadbranch/status/child/{{$item->name_en}}','#StatusChildTab')" data-toggle="tab">{{$item->name_en}}</a></li>
                                    @endforeach
                                </ul>
                                {{-- <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);" onclick="CrmLeadBranchView('/crm/leadbranch/all','Lead_Branch_Tbl')" data-toggle="tab">All</a></li>
                                    @foreach ($status->data as $item)
                                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);" onclick="CrmLeadBranchView('/crm/leadbranch/status/{{$item->name_en}}','Lead_Branch_Tbl')" data-toggle="tab">{{$item->name_en}}</a></li>
                                    @endforeach
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row" id='StatusChildTab'>
                            {{-- This will use the LeadStatusChildTabs.blade --}}
                        </div>
                        <div class="tab-content">
                            <!--show contact like table -->
                            <div class="tab-Setting">
                                <div class="row" id="CrmTabManageSetting">

                                </div>
                            </div>
                            <!-- /.tab-pane -->
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     {{-- detail schedule --}}
     <div id="view_schedule"></div>
</section><!-- end section Main content -->

<script type="text/javascript">
    CrmLeadBrancStatusChild('/crm/leadbranch/status/child/all','#StatusChildTab')
    // CrmLeadBranchView('/crm/leadbranch/status/all','Lead_Branch_Tbl');
</script>

 <!-- Content Header (Page header) -->
 <section class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1> Convert To Customer</h1>
             </div>
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item active">View Convert To Customer</li>
                 </ol>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </section>

 <section class="content">
     <style type="text/css">
         th {
             font-size: 16px;
         }

         td {
             font-size: 14px;
         }

     </style>
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <div class="card">
                     <div class="card-header">
                         <div class="row">
                             <div class="col-12">
                                 <ul class="nav nav-pills">
                                     @foreach ($status->data ?? [] as $key => $item)
                                         @if ($key == 0)
                                             <li class="nav-item"><a class="nav-link active "
                                                     href="javascript:void(0);"
                                                     onclick="CrmLeadBrancStatusChild('/crm_convert_to_customer/status/child/{{ $item->name_en ?? 'Unknown' }}','#StatusChildTab')"
                                                     data-toggle="tab">{{ $item->name_en ?? 'Unknown' }}</a> <input type="hidden" name="init-data" value="/crm_convert_to_customer/status/child/{{ $item->name_en ?? 'Unknown' }}"></li>
                                         @else
                                             <li class="nav-item"><a class="nav-link" href="javascript:void(0);"
                                                     onclick="CrmLeadBrancStatusChild('/crm_convert_to_customer/status/child/{{ $item->name_en ?? 'Unknown' }}','#StatusChildTab')"
                                                     data-toggle="tab">{{ $item->name_en ?? 'Unknown' }}</a></li>
                                         @endif
                                     @endforeach
                                     {{-- <li class="nav-item"><a class="nav-link active"
                                             href="javascript:void(0);"
                                             onclick="CrmConvertToCustomerView('/crm_convert_to_customer/before_convert','Before_Convert_Tbl')"
                                             data-toggle="tab">Before Convert</a></li>
                                     <li class="nav-item"><a class="nav-link" href="javascript:void(0);"
                                             onclick="CrmConvertToCustomerView('/crm_convert_to_customer/after_convert','After_Convert_Tbl')"
                                             data-toggle="tab">After Convert</a></li> --}}
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="card-body">
                         <div class="row" id='StatusChildTab'>
                             {{-- This will use the LeadStatusChildTabs.blade
                             --}}
                         </div>
                         <div class="row">
                             <div class="col-12">
                                 <div class="tab-content" id="custom-tabs-one-tabContent">
                                     <div class="tab-Setting">
                                         <div class="row" id="CrmTabManageSetting">
                                             <div class="col-12" style="margin-top: 10px">
                                                 <div class="table-responsive">
                                                     <table id="Lead_Branch_Tbl"
                                                         class="table table-bordered table-striped nowrap">
                                                         <thead>
                                                             <tr style="background: #1fa8e0">
                                                                 <th style="color: #FFFFFF">Lead No</th>
                                                                 <th style="color: #FFFFFF">Customer Name</th>
                                                                 {{-- <th
                                                                     style="color: #FFFFFF">Lead Branch Number</th>
                                                                 --}}
                                                                 <th style="color: #FFFFFF">Customer Branch Name</th>
                                                                 <th style="color: #FFFFFF">Email</th>
                                                                 <th style="color: #FFFFFF">Phone</th>
                                                                 <th style="color: #FFFFFF">Customer Type</th>
                                                                 <th style="color: #FFFFFF">Lead Status</th>
                                                                 <th style="color: #FFFFFF">Assign To</th>
                                                                 <th style="color: #FFFFFF">Create By</th>
                                                                 <th style="color: #FFFFFF">Action</th>
                                                                 {{-- <th>Detail</th>
                                                                 --}}
                                                             </tr>
                                                         </thead>
                                                         <tbody>
                                                             {{-- @php
                                                             $i=1;
                                                             @endphp
                                                             @foreach ($tbl->data as $row)
                                                                 <tr>
                                                                     <td>{{ $i++ }}</td>
                                                                     <td>{{ $row->name_en }}</td>
                                                                     <td>{{ $row->name_kh }}</td>
                                                                     <td>{{ $row->sequence }}</td>
                                                                     <td>{{ date('Y-m-d H:i:s', strtotime($row->create_date)) }}
                                                                     </td>
                                                                     <td class="text-center">
                                                                         <a href="#" id="{{ $row->id }}"
                                                                             class="btn btn-info btn-block CrmEditLeadStatus"><i
                                                                                 class="fas fa-wrench"></i></a>
                                                                     </td>
                                                                 </tr>
                                                             @endforeach
                                                             --}}
                                                         </tbody>
                                                     </table>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>

 <script type="text/javascript">
     CrmLeadBrancStatusChild($("input[name='init-data']").val(), '#StatusChildTab');
    //  console.log($(".init-data").attr('onClick').split('(')[1].split(")")[0].replace("'", "").split(',')[0].replace("'",
    //      ""))

 </script>

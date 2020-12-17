


            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><span><i class="fas fa-sitemap"></i></span> Select Branch Edit </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="javascript:void(0);" class="" onclick="go_to('/quote')">Quote List</a></li>
                            <li class="breadcrumb-item active">Quote Branch</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section Main content -->
            <section class="content">
              <div class="container-fluid" >
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-head">
                                <div class="row-12 pt-4 pl-4 pb-2" style="border-bottom: 2px solid whitesmoke;">
                                        <button type="button" class="btn btn-success" onclick="editQouteLead('<?php if(isset($dataQuoteLead)){ echo $dataQuoteLead[0]['quote_id']; } ?>');">Edit Quote Lead</button>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-responsive">
                                        <table id="tblQuoteList"  class=" table table-bordered table-hover" style="white-space:nowrap;">
                                            <thead>
                                                <tr style="background: #1fa8e0">
                                                    <th style="color: #FFFFFF">#</th>
                                                    <th style="color: #FFFFFF">Branch Name</th>
                                                    <th style="color: #FFFFFF">Lead Name</th>
                                                    <th style="color: #FFFFFF">Qoute Number</th>
                                                    <th style="color: #FFFFFF">Create By</th>
                                                    {{-- <th style="color: #FFFFFF">Quote Stage</th> --}}
                                                    <th style="color: #FFFFFF">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if(isset($dataQuoteLead))
                                                    @foreach ($dataQuoteLead as $key=>$val)
                                                                <tr>
                                                                    <td>{{ $key+1 }}</td>
                                                                    <td>{{ $val['branch_name'] ?? ""}}</td>
                                                                    <td>{{ $val['lead_name'] ?? ""}}</td>
                                                                    <td>{{ $val['quote_number'] ?? ""}}</td>
                                                                    <td>{{ $val['quote_create_by'] ?? ""}}</td>
                                                                    {{-- <td>{{ $val['quote_stage']->name_en }}</td> --}}
                                                                    <td style="text-align: center">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <button type="button" class="btn  btn-block btn-sm btn-success btnClickEditBranch"  onclick="goto_Action('/quote/edit/branch','{{ $val['quote_id'] ?? ''}}', '{{ $val['quote_branch_id'] ?? ''}}');">
                                                                                    <i class="fas fa-wrench"></i>
                                                                                </button>
                                                                            </div>

                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                    @endforeach
                                                @endif


                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </section>


            <script type="text/javascript">
                    $(function () {
                        $("#tblQuoteList").DataTable({
                            "responsive": true,
                            "autoWidth": false,
                        });


                    });
            </script>

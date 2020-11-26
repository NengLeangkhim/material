
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><span><i class="fas fa-file-invoice-dollar"></i></span> Quotes</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">View Organization</li>
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
                            <div class="card-header">
                                <div class="col-6">
                                    <div class="row">
                                        <a href="javascript:void(0);" class="btn btn-success CrmAddQuote" onclick="go_to('/quote/add')" id="CrmAddQuote"><i class="fas fa-plus"></i> Add New Quote</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-responsive">
                                        <table id="tblQuoteList"  class=" table table-bordered table-hover" style="white-space:nowrap;">
                                            <thead>
                                                <tr style="background: #1fa8e0">
                                                    <th style="color: #FFFFFF">Quote Number</th>
                                                    <th style="color: #FFFFFF">Subject</th>
                                                    <th style="color: #FFFFFF">Lead Name</th>
                                                    <th style="color: #FFFFFF">VAT Type</th>
                                                    <th style="color: #FFFFFF">Quote Stage</th>
                                                    <th style="color: #FFFFFF">Assigned To </th>
                                                    <th style="color: #FFFFFF">Convert To BSC</th>
                                                    <th style="color: #FFFFFF">Modified Time</th>
                                                    <th style="color: #FFFFFF">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($listQuote))
                                                    @foreach ($listQuote as $val)
                                                        @foreach ($val as $key => $val2)
                                                                <tr>
                                                                    <td>{{$val2->quote_number}}</td>
                                                                    <td>{{$val2->subject}}</td>
                                                                    <td>{{$val2->crm_lead->customer_name_en}}</td>
                                                                    <td>
                                                                        @if($val2->crm_lead->vat_number != '')
                                                                            <span>Exclude</span>
                                                                        @else
                                                                            <span>Include</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <?php $num = count($val2->quote_stage); ?>
                                                                        @if( $num > 0)
                                                                            {{
                                                                                $val2->quote_stage[$num-1]->name_en
                                                                            }}
                                                                        @endif
                                                                    </td>
                                                                    <td>{{$val2->assign_to->first_name_en}}</td>
                                                                    <td>

                                                                        <?php
                                                                                $num = count($val2->quote_stage);
                                                                                if($num > 0){
                                                                                    if($val2->quote_stage[$num-1]->id == 2){
                                                                                            echo 'Yes';
                                                                                    }else {
                                                                                            echo 'No';
                                                                                    }
                                                                                }
                                                                        ?>
                                                                    </td>
                                                                    <td>{{$val2->due_date}}</td>
                                                                    <td>
                                                                        <?php $num = count($val2->quote_stage); ?>
                                                                        @if( $num > 0)
                                                                            @if(($val2->quote_stage[$num-1]->id)==2)
                                                                                <div class="row-12 form-inline">
                                                                                    <div class="col-md-4">
                                                                                        <a href="#"  class="qouteViewDetail btn btn-info btn-sm" onclick="goto_Action('/quote/detail', '{{ $val2->id }}')"  >
                                                                                            <i class="far fa-eye"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                    {{-- <div class="col-md-4">
                                                                                        <a href="#" class="btn btn-success btn-sm" onclick="goto_Action('/quote/leadBranch', '{{ $val2->id }}')">
                                                                                            <i class="fas fa-wrench"></i>
                                                                                        </a>
                                                                                    </div> --}}
                                                                                    <div class="col-md-4 ">
                                                                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm " onclick="getDeleteQuoteLead('/quote/deleteLeadQuote', '{{ $val2->id }}')"> <span class="glyphicon glyphicon-trash"></span>  </a>
                                                                                    </div>
                                                                                </div>

                                                                            @endif
                                                                            @if(($val2->quote_stage[$num-1]->id)!=2)
                                                                                <div class="row-12 form-inline">
                                                                                    <div class="col-md-4">
                                                                                        <a href="#"  class="qouteViewDetail btn btn-info btn-sm" onclick="goto_Action('/quote/detail', '{{ $val2->id }}')"  >
                                                                                            <i class="far fa-eye"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <a href="#" class="btn btn-success btn-sm" onclick="goto_Action('/quote/leadBranch', '{{ $val2->id }}')">
                                                                                            <i class="fas fa-wrench"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-4 ">
                                                                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm " onclick="getDeleteQuoteLead('/quote/deleteLeadQuote', '{{ $val2->id }}')"> <span class="glyphicon glyphicon-remove"></span>  </a>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                        @endforeach
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

                    // $(document).ready(function() {
                    //         $("#tblQuoteList").dataTable({
                    //             "responsive": true,
                    //             "autoWidth": false,
                    //         });
                    //         $(".dataTable").on("draw.dt", function (e) {
                    //             console.log("drawing");
                    //             setCustomPagingSigns.call($(this));
                    //         }).each(function () {
                    //             setCustomPagingSigns.call($(this)); // initialize
                    //         });

                    //         function setCustomPagingSigns() {
                    //             var wrapper = this.parent();
                    //             wrapper.find("a.previous").text("<");
                    //             wrapper.find("a.next").text(">");
                    //         }
                    // });






            </script>

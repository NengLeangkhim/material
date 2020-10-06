
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><span><i class="fas fa-sitemap"></i></span> Quote List</h1>
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
                                        <a href="javascript:void(0);" class="btn btn-success CrmAddOrganization" onclick="go_to('/quote/add')" id="CrmAddOrganization"><i class="fas fa-plus"></i> Add Quote</a> 
                                    </div>
                                </div>                               
                            </div>
                            <div class="card-body ">
                                <table id="tblQuoteList" class="table table-bordered table-hover" style="white-space:nowrap;">
                                    <thead>
                                        <tr>
                                            <th>Quote Number</th>
                                            <th>Subject</th>
                                            <th>Organization Name</th>
                                            <th>Contact Name</th>
                                            <th>Total</th>
                                            <th>Quote Stage</th>
                                            <th>Assigned To </th>
                                            <th>Convert To BSC</th>
                                            <th>Modified Time</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                            
                                            @for($i=0; $i<=10; $i++)
                                                    <tr>
                                                        <td>AAAAAA</td>
                                                        <td>BBBBBBBBBB</td>
                                                        <td>CCCCCCCCCCCCCC</td>
                                                        <td>DDDDDDDDDDDDD</td>
                                                        <td>EEEEEEEEEEEEE</td>
                                                        <td>FFFFFFFFFFFFF</td>
                                                        <td>GGGGGGGGGGGGGG</td>
                                                        <td>HHHHHHHHHHHH</td>
                                                        <td>IIIIIIIIIIII</td>
                                                        <td>
                                                            <div class="row-12 form-inline">
                                                                <div class="col-md-4">
                                                                    <a href="#"  class="qouteViewDetail btn btn-info btn-sm" onclick="goto_Action('/quote/detail', '{{ $i }}')"  >
                                                                        {{-- <i class="fas fa-info"> </i>  --}}
                                                                        View
                                                                    </a>
                                                                </div> 
                                                                <div class="col-md-4">`
                                                                    <a href="#" class="btn btn-success btn-sm" onclick="goto_Action('/quote/editQuote', '{{ $i }}')">
                                                                        Edit
                                                                    </a>
                                                                </div>  
                                                                <div class="col-md-4 ">
                                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm " onclick="getDeleteQuoteLead('/quote/deleteLeadQuote', '{{ $i }}')"> <span class="glyphicon glyphicon-remove"></span>  </a>
                                                                </div>  
                                                            </div>
                                                        </td>
                                                    </tr>
                                            @endfor

                                                                    
                                    </tbody>  
                                </table>
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
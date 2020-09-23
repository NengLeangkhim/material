<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="fas fa-chart-pie"></i></span>Detail Organization Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('/crmreport')">Report</a></li>
                <li class="breadcrumb-item active">Detail Organization Report</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- section Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <div class="col-12 text-right">
                                <button class="btn btn-success"><span><i class="far fa-file-excel"></i></span> Excel</button>
                                <button class="btn btn-danger"><span><i class="far fa-file-pdf"></i></span> Pdf</button>
                      </div>                               
                  </div>
                  <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">Lead Source</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-tty"></i></span>
                                        </div>
                                        <select class="form-control" name="select_source" id="select_source">
                                            <option value="0">Please Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">Assign To</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                        </div>
                                        <select class="form-control" name="select_source" id="select_source">
                                            <option value="0">Please Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">Status</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                                        </div>
                                        <select class="form-control" name="select_source" id="select_source">
                                            <option value="0">Please Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!--End Form Group-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">Date From <b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Select Date" id="DetailOrganizationFrom"  name='DetailOrganizationFrom'  required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Select Date" id="DetailOrganizationTo" name='DetailOrganizationTo'  required>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="col-md-12" style="height: 45%">

                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary align-middle" style="width:70%;">Generate Report</button>
                                    </div>
                                </div>
                            </div>
                        </div><!--End Form Group-->
                        {{-- <div class="form-group">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Assign To <b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <select class="form-control" name="select_source" id="select_source">
                                            <option value="0">Please Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!--End Form Group--> --}}
                        <div class="table-responsive" style="padding-top: 10px;">
                            <table id="OrganizationTbl" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Organization Number</th>
                                        <th>CID</th>
                                        <th>Organization Name</th>
                                        <th>Customer Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Assigned To </th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                {{-- @foreach($lead as $row) --}}
                                    <tr>
                                        <td>{{'TT-ACC0001'}}</td>
                                        <td>{{'N00004'}}</td>
                                        <td>{{'Bo Entertainment'}}</td>
                                        <td>{{'Leader Bo'}}</td>
                                        <td>{{'Oppa@gmail.com'}}</td>
                                        <td>{{'09999999'}}</td>
                                        <td>{{'XD'}}</td>
                                        <td>
                                        {{-- <a href="#" class="btn btn-block btn-info btn-sm edit" ​value="editlead/{{$row->id}}" ><i class="fas fa-wrench"></i></a>detaillead --}}
                                        <a href="#" class="btn btn-block btn-info btn-sm organization_detail" ​value="/organizations/detail" ><i class="fas fa-info-circle"></i></a>
                                        </td>
                                    </tr>                                       
                                {{-- @endforeach --}}
                                </tbody>  
                            </table>
                        </div>
                  </div><!--End Card Body-->
              </div><!--End Card-->
          </div><!--Col-12-->
      </div><!--End Row-->
    </div><!--End Container-Fluid-->
</section><!-- end section Main content -->
<script>
    $('#DetailOrganizationFrom').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });
      $('#DetailOrganizationTo').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });
</script>
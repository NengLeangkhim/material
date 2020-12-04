{{-- @php
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
@endphp --}}
<div class="col-12 text-right">
    <a  href="javascript:void(0);" class="btn btn-success crm_contact" onclick="CrmModalAction('crm_lead_status_form','crm_lead_status','ActionLeadStatus','Add Lead Status')" ​><i class="fas fa-plus"></i> Add Lead Branch</a>
</div>
<div class="col-12" style="margin-top: 10px">
    <div class="table-responsive">
        <table id="All_type_Tbl" class="table table-bordered table-striped" style="width: 100%;">
            <thead>
                <tr style="background: #1fa8e0">
                    {{-- <th style="color: #FFFFFF">No</th> --}}
                    <th style="color: #FFFFFF">Company Name</th>
                    <th style="color: #FFFFFF">Lead Branch Number</th>
                    <th style="color: #FFFFFF">Company Branch Name</th>
                    <th style="color: #FFFFFF">Email</th>
                    <th style="color: #FFFFFF">Phone </th>
                    {{-- <th style="color: #FFFFFF">Facebook </th> --}}
                    <th style="color: #FFFFFF">Action</th>
                    {{-- <th>Detail</th> --}}
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Turbotech Col.TD</td>
                    <td>TT-01-LEA-000104</td>
                    <td>Nam Kopy</td>
                    <td>kopy@gmail.com</td>
                    <td>010345238</td>
                    <td>
                        <div class="row-12 form-inline">
                            <div class="col-md-6">
                                <a href="javascript:void(0);" class="btn btn-block btn-danger  btn-sm branch" value="detaillead/'+data+'" onclick="go_to(\'detaillead/'+data+'\')" title="Edit Lead">
                                    <i class="fas fa-edit">  </i>
                                </a>
                            </div>
                            <div class="col-md-6 ">
                                <a href="javascript:void(0);" class="btn btn-block btn-info btn-sm branch" value="branch/'+data+'" onclick="go_to(\'branch/'+data+'\')" title="Show Branch Of Lead">
                                    <i class="fas fa-code-branch">  </i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Turbotech Col.TD</td>
                    <td>TT-01-LEA-000104</td>
                    <td>Nam Kopy</td>
                    <td>kopy@gmail.com</td>
                    <td>010345238</td>
                    <td>
                        <div class="row-12 form-inline">
                            <div class="col-md-6">
                                <a href="javascript:void(0);" class="btn btn-block btn-danger  btn-sm branch" value="detaillead/'+data+'" onclick="go_to(\'detaillead/'+data+'\')" title="Edit Lead">
                                    <i class="fas fa-edit">  </i>
                                </a>
                            </div>
                            <div class="col-md-6 ">
                                <a href="javascript:void(0);" class="btn btn-block btn-info btn-sm branch" value="branch/'+data+'" onclick="go_to(\'branch/'+data+'\')" title="Show Branch Of Lead">
                                    <i class="fas fa-code-branch">  </i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Turbotech Col.TD</td>
                    <td>TT-01-LEA-000104</td>
                    <td>Nam Kopy</td>
                    <td>kopy@gmail.com</td>
                    <td>010345238</td>
                    <td>
                        <div class="row-12 form-inline">
                            <div class="col-md-6">
                                <a href="javascript:void(0);" class="btn btn-block btn-danger  btn-sm branch" value="detaillead/'+data+'" onclick="go_to(\'detaillead/'+data+'\')" title="Edit Lead">
                                    <i class="fas fa-edit">  </i>
                                </a>
                            </div>
                            <div class="col-md-6 ">
                                <a href="javascript:void(0);" class="btn btn-block btn-info btn-sm branch" value="branch/'+data+'" onclick="go_to(\'branch/'+data+'\')" title="Show Branch Of Lead">
                                    <i class="fas fa-code-branch">  </i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            {{-- @php
                $i=1;
            @endphp
             @foreach($tbl->data as $row)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$row->name_en}}</td>
                    <td>{{$row->name_kh}}</td>
                    <td>{{$row->sequence}}</td>
                    <td>{{date('Y-m-d H:i:s',strtotime($row->create_date))}}</td>
                    <td class="text-center">
                        <a href="#" id="{{$row->id}}" class="btn btn-info btn-block CrmEditLeadStatus"><i class="fas fa-wrench"></i></a>
                    </td>
                </tr>
             @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
<!-- modal -->
{{-- <form id="crm_lead_status_form" method="">
    <div class="modal fade show" id="crm_lead_status" tabindex="-1" role="dialog" aria-labelledby="crm_lead_status" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title hrm-title"><strong><i class="fas fa-plus"></i></strong></h3>
                  <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">Add Lead Status</h2>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-dismiss="modal" aria-label="Close">
                     <i class="fas fa-times"></i>
                   </button>
                  </div>
              </div>
              <div class="card-body" style="display: block;">
                   <div class="alert alert-danger print-error-msg" style="display:none">
                      <ul></ul>
                   </div>
                   <div class="row">
                        <input type="hidden" name="user_id" value="{{$_SESSION['userid']}}">
                       <div class="col-md-12">
                           <div class="form-group">
                               <label for="name_en">Name English<span class="text-danger">*</span></label>
                               <input type="text" class="form-control" id="name_en" aria-describedby="name_en" placeholder="Name English" name="name_en">
                               <span class="invalid-feedback" role="alert" id="name_enError">
                                 <strong></strong>
                               </span>
                           </div>
                       </div>
                       <div class="col-md-12">
                            <div class="form-group">
                                <label for="name_kh">Name Khmer<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name_kh" aria-describedby="name_kh" placeholder="Name Khmer" name="name_kh">
                                <span class="invalid-feedback" role="alert" id="name_khError">
                                <strong></strong>
                                </span>
                            </div>
                        </div>
                       <div class="col-md-6">
                       <div class="form-group">
                           <label for="plan_from">Sequence<span class="text-danger"></span></label>
                           <input type="number" name="sequence" id="sequence" placeholder="Sequence" class="form-control">
                           <span class="invalid-feedback" role="alert" id="sequenceError">
                             <strong></strong>
                           </span>
                       </div>
                       </div>
                       <div class="col-md-6">
                        <div class="form-group">
                            <label for="name_kh">Status<span class="text-danger"></span></label>
                            <select name="status" class="form-control" id="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <span class="invalid-feedback" role="alert" id="name_khError">
                            <strong></strong>
                            </span>
                        </div>
                       </div>
                   </div>
                   <div class="row text-right">
                      <div class="col-md-12 text-right">
                        <input type="hidden" name="id" id="lead_status_id"/>
                        <button type="button" onclick='CrmSubmitModalAction("crm_lead_status_form","ActionLeadStatus","/crm/setting/leadstatus/store","POST","crm_lead_status","Successfully","/crm/setting")' name="ActionLeadStatus" id="ActionLeadStatus"  class="btn btn-primary">Create</button>
                      </div>
                   </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</form> --}}


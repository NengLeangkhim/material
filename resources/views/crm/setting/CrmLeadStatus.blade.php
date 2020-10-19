<div class="col-12 text-right">
    <a  href="javascript:void(0);" class="btn btn-success crm_contact" onclick="CrmModalAction('crm_lead_status_form','crm_lead_status','ActionLeadStatus','Add Lead Status')" ​><i class="fas fa-plus"></i> Add Lead Status</a> 
</div>
<div class="col-12" style="margin-top: 10px">
    <div>
        <table class="table table-bordered display nowrap" style="width: 100%" id="Lead_Status_Tbl">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Create Date</th>
                    <th>Create By</th>
                    <th>Status</th>
                    <th>Sequence</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            {{-- @foreach($contact_table->data as $row) --}}
                <tr>
                    <td>TT-CON0000002</td>
                    <td>{{'$row->name_en'}}</td>
                    <td>{{'$row->name_kh'}}</td>
                    <td>{{'$row->phone'}}</td>
                    <td>{{'$row->facebook'}}</td>
                    <td>{{'$row->email'}}</td>
                    <td class="text-center">
                        <a href="#" class="btn"><i class="fas fa-wrench"></i></a>
                        <a href="#" class="btn"><i class="far fa-edit"></i></a>
                        <a href="#" class="btn"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>                                           
            {{-- @endforeach --}}
            </tbody>  
        </table>
    </div>
</div>
<!-- modal -->
<form id="crm_lead_status_form" method="">
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
              </div><!-- /.card-header -->
              <div class="card-body" style="display: block;">
                   <div class="alert alert-danger print-error-msg" style="display:none"> {{-- div for show error --}}
                      <ul></ul>
                   </div>
                   <div class="row">
                       <div class="col-md-12">
                           <div class="form-group">
                               <label for="name_en">Name English<span class="text-danger">*</span></label>
                               <input type="text" class="form-control" id="name_en" aria-describedby="name_en" placeholder="Name English" name="name_en">
                               <span class="invalid-feedback" role="alert" id="name_enError"> {{--span for alert--}}
                                 <strong></strong>
                               </span>
                           </div>
                       </div>
                       <div class="col-md-12">
                            <div class="form-group">
                                <label for="name_kh">Name Khmer<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name_kh" aria-describedby="name_kh" placeholder="Name Khmer" name="name_kh">
                                <span class="invalid-feedback" role="alert" id="name_khError"> {{--span for alert--}}
                                <strong></strong>
                                </span>
                            </div>
                        </div>
                       <div class="col-md-12">
                       <div class="form-group">
                           <label for="plan_from">Sequence<span class="text-danger"></span></label>
                           <input type="number" name="sequence" id="sequence" placeholder="Sequence" class="form-control">
                           <span class="invalid-feedback" role="alert" id="sequenceError"> {{--span for alert--}}
                             <strong></strong>
                           </span>
                       </div>
                       </div>
                   </div>  {{-- END ROW--}}
                   <div class="row text-right">
                      <div class="col-md-12 text-right">
                        <input type="hidden" name="plan_id" id="plan_id"/>
                        <button type="button" onclick='CrmSubmitModalAction("crm_lead_status_form","ActionLeadStatus","/crm/setting/leadstatus/store","POST","crm_lead_status","Successfully","/crm/setting")' name="ActionLeadStatus" id="ActionLeadStatus"  class="btn btn-primary">Create</button>
                      </div>
                   </div>
              </div><!-- /.END card-body -->
            </div><!-- /.END card-Default -->
          </div>
        </div>
    </div>
</form>
<!-- end modal -->

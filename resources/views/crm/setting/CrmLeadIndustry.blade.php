<div class="col-12 text-right">
    <a  href="javascript:void(0);" class="btn btn-success crm_contact" ​><i class="fas fa-plus"></i> Add Contact</a> 
</div>
<div class="col-12" style="margin-top: 10px">
    <div>
        <table class="table table-bordered display nowrap" style="width: 100%" id="Lead_industry_Tbl">
            <thead>
                <tr>
                    <th>Contact Number</th>
                    <th>Name eng</th>
                    <th>Name Kh</th>
                    <th>phone</th>
                    <th>facebook</th>
                    <th>Email </th>
                    <th>Detail</th>
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
                    <td>
                        <a href="#" class="btn btn-block btn-info btn-sm CrmEditContact"><i class="fas fa-wrench"></i></a>
                    </td>
                </tr>       
                <tr>
                    <td>TT-CON0000002</td>
                    <td>{{'$row->name_en'}}</td>
                    <td>{{'$row->name_kh'}}</td>
                    <td>{{'$row->phone'}}</td>
                    <td>{{'$row->facebook'}}</td>
                    <td>{{'$row->email'}}</td>
                    <td>
                        <a href="#" class="btn btn-block btn-info btn-sm CrmEditContact"><i class="fas fa-wrench"></i></a>
                    </td>
                </tr>                                       
            {{-- @endforeach --}}
            </tbody>  
        </table>
    </div>
</div>
<!-- modal -->
<form id="crm_lead_industry_form">
    <div class="modal fade show" id="crm_lead_industry" tabindex="-1" role="dialog" aria-labelledby="crm_lead_industry" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title hrm-title"><strong><i class="fas fa-plus"></i></strong></h3>
                  <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">Add Plan</h2>
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
                               <label for="plan_name">Plan Name<span class="text-danger">*</span></label>
                               <input type="text" class="form-control" id="plan_name" aria-describedby="plan_name" placeholder="" name="plan_name">
                               <span class="invalid-feedback" role="alert" id="plan_nameError"> {{--span for alert--}}
                                 <strong></strong>
                               </span>
                           </div>
                       </div>
                       <div class="col-md-6">
                       <div class="form-group">
                           <label for="plan_from">Date From<span class="text-danger">*</span></label>
                           <input type="text" name="plan_from" id="plan_from" placeholder="Please Select Date" class="form-control">
                           <span class="invalid-feedback" role="alert" id="plan_fromError"> {{--span for alert--}}
                             <strong></strong>
                           </span>
                       </div>
                       </div>
                       <div class="col-md-6">
                       <div class="form-group">
                           <label for="plan_to">Date To<span class="text-danger">*</span></label>
                           <input type="text" name="plan_to" id="plan_to" placeholder="Please Select Date" class="form-control">
                           <span class="invalid-feedback" role="alert" id="plan_toError"> {{--span for alert--}}
                             <strong></strong>
                           </span>
                       </div>
                       </div>
                   </div>  {{-- END ROW--}}
                   <div class="row text-right">
                      <div class="col-md-12 text-right">
                        <input type="hidden" name="plan_id" id="plan_id"/>
                        <button type="submit" onclick='HrmSubmitPerformPlan()' name="action_plan" id="action_plan"  class="btn btn-primary">Create</button>
                      </div>
                   </div>
              </div><!-- /.END card-body -->
            </div><!-- /.END card-Default -->
          </div>
        </div>
    </div>
</form>
<!-- end modal -->

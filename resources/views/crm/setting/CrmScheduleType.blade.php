@php
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
@endphp
<div class="col-12 text-right">
    <a  href="javascript:void(0);" class="btn btn-success" onclick="CrmModalAction('crm_schedule_type_form','crm_schedule_type','ActionScheduleType','Add Schedule Type')" ​><i class="fas fa-plus"></i> Add Schedule Type</a>
</div>
<div class="col-12" style="margin-top: 10px">
    <div>
        <table class="table table-bordered nowrap" style="width: 100%;" id="Schedule_type_Tbl">
            <thead>
                <tr style="background: #1fa8e0">
                    <th style="color: #FFFFFF">#</th>
                    <th style="color: #FFFFFF">Name English</th>
                    <th style="color: #FFFFFF">Name Khmer</th>
                    <th style="color: #FFFFFF">Type</th>
                    <th style="color: #FFFFFF">Create Date</th>
                    <th style="color: #FFFFFF">Action</th>
                </tr>
            </thead>
            <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach($tbl->data as $row)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->name_en}}</td>
                            <td>{{$row->name_kh}}</td>
                            <td>@php
                                    if($row->is_result_type=='true'){
                                    echo 'Result Type';
                                    }else{
                                    echo 'Schedule Type' ;
                                    }
                                @endphp
                            </td>
                            <td>{{date('Y-m-d H:i:s',strtotime($row->create_date))}}</td>
                            <td class="text-center">
                                <a href="#" id="{{$row->id}}" class="btn btn-info btn-block CrmEditScheduleType"><i class="fas fa-wrench"></i></a>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- modal -->
<form id="crm_schedule_type_form" method="">
    <div class="modal fade show" id="crm_schedule_type" tabindex="-1" role="dialog" aria-labelledby="crm_schedule_type" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title hrm-title"><strong><i class="fas fa-plus"></i></strong></h3>
                  <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">Add Schedule Type</h2>
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
                        <input type="hidden" name="user_id" value="{{$_SESSION['userid']}}">
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
                       <div class="col-md-6">
                       <div class="form-group">
                           <label for="plan_from">Type<span class="text-danger">*</span></label>
                           <select name="is_result_type" class="form-control" id="is_result_type" name="is_result_type">
                                <option value="t">Result</option>
                                <option value="f">Schedule</option>
                            </select>
                           <span class="invalid-feedback" role="alert" id="is_result_typeError"> {{--span for alert--}}
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
                            <span class="invalid-feedback" role="alert" id="name_khError"> {{--span for alert--}}
                            <strong></strong>
                            </span>
                        </div>
                       </div>
                   </div>  {{-- END ROW--}}
                   <div class="row text-right">
                      <div class="col-md-12 text-right">
                        <input type="hidden" name="id" id="schedule_type_id"/>
                        <button type="button" onclick='CrmSubmitModalAction("crm_schedule_type_form","ActionScheduleType","/crm/setting/scheduletype/store","POST","crm_schedule_type","Successfully","/crm/setting")' name="ActionScheduleType" id="ActionScheduleType"  class="btn btn-primary">Create</button>
                      </div>
                   </div>
              </div><!-- /.END card-body -->
            </div><!-- /.END card-Default -->
          </div>
        </div>
    </div>
</form>
<!-- end modal -->

<section>
  {{-- modal add Exit employee --}}
  <div class="modal fade" id="modal_exit_employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong> Exit Information </strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="fm_exit_information" onsubmit="return false;">
          @csrf
          <input type="hidden" name="id" value="" id="exit_infomation_id">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Request Exit Date <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                          <input type="date" class="form-control" id="request_exit_date" name="request_exit_date" value="" required>
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Type of Exit <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                          <select name="type_of_exit" id="type_of_exit" class="form-control">
                            <option value="" hidden></option>
                            <option value="1">Resigned / លាឈប់ពីការងារ</option>
                          </select>
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">HR Received Date <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                          <input type="date" class="form-control" id="hr_received_date" name="hr_received_date" value="" required>
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Effective Exit Date <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                          <input type="date" class="form-control" id="effective_exit_date" name="effective_exit_date" value="" required>
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Training & Development</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="training_and_development" name="training_and_development" value="" >
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Opportunity to Promote</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="opportunity_to_promote" name="opportunity_to_promote" value="" >
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Work Presure</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="work_presure" name="work_presure" value="" >
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Working on Holiday</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="working_on_holiday" name="working_on_holiday" value="" >
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Motivation</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="motivation" name="motivation" value="" >
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Overall Opion</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="overall_opion" name="overall_opion" value="">
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Submit Date <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                          <input type="date" class="form-control" id="submit_date" name="submit_date" value="" required>
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Manager Approved Date <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                          <input type="date" class="form-control" id="manager_approved_date" name="manager_approved_date" value="" required>
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Reason of Exit <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="reason_of_exit" name="reason_of_exit" value="" required>
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Duties & Responsibility</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="duties_and_responsibility" name="duties_and_responsibility" value="">
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Given Salary</label>
                      <div class="col-sm-8">
                          <input type="number" class="form-control" id="given_salary" name="given_salary" value="" >
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Working Environment</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="working_environment" name="working_environment" value="" >
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Team Work</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="team_work" name="team_work" value="">
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Management Issue </label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="management_issue" name="management_issue" value="">
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Comment</label>
                      <div class="col-sm-8">
                          <textarea name="comment" id="comment" rows="4" class="form-control"></textarea>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-turbo-color" onclick="hrms_insert_exit_employee()">Save & Delete</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>







<div style="padding:10px 10px 10px 10px" id="add_edit_employee">
    <div class="row">
      <div id="testt"></div>
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Employees</strong></h1>
                <div class="col-md-12 text-right">
                    <a href="javascript:;" id="btn_add_employee" class="btn bg-turbo-color" onclick="hrms_modal_add_edit_employee()"><i class="fas fa-plus"></i> Add Employee</a>
                    {{-- <a href="javascript:;" id="btn_add_employee" class="btn bg-turbo-color"><i class="fas fa-plus"></i> Add Employee</a> --}}
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="tbl_employee" style="white-space:nowrap">
                  <thead>
                    <tr>
                      <th>Employee ID</th>
                      <th>Name</th>
                      <th>Khmer Name</th>
                      <th>Mobile</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($employee as $e)
                      <tr>
                      <td style="padding-top:37px ">{{ $e->id_number }}</td>
                      <td>
                          <div class="text-center">
                              <img src="{{$e->image}}" alt="" width="50px" height="50px" style="border-radius:50px;margin-right:10px">
                          </div>
                          <div class="text-center">
                              {{ $e->firstName." ".$e->lastName }}
                          </div>
                      </td>
                      <td style="padding-top:37px "> {{$e->firstNameKh." ".$e->lastNameKh }} </td>
                      <td style="padding-top:37px ">{{ $e->contact}}</td>
                      <td style="padding-top:37px ">{{ $e->position }}</td>
                        <td style="padding-top:37px ">
                          <div class="row">
                            <div class="col-md-4"><a href="javascript:;" onclick="hrms_modal_add_edit_employee({{$e->id}})"><i class="far fa-edit"></i></a></div>
                            <div class="col-md-4"><a href="javascript:;" onclick="hrms_employee_detail({{$e->id}})"><i class="fas fa-info"></i></a></div>
                            <div class="col-md-4"><a href="javascript:;"><i class="far fa-trash-alt" onclick="hrm_delete_employee({{$e->id}})"></i></a></div>

                          </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

            <!-- /.card -->
    </div>
</div>
<script>
  $(document).ready(function() {
    $('#tbl_employee').DataTable({
      responsive: true
    });
    $(document).ajaxStop(function(){
      $("#department").select2();
      $("#position").select2();
    });
    hrms_date();
} );
</script>
</section>

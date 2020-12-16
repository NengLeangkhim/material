{{-- detail schedule --}}
<div id="view_schedule"></div>
{{-- Model alert --}}
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New Schedule</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_Crmbranchschdeule" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="text"  id="branchID" name="branch_id" hidden>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Select Lead</label>
                                        <select name="lead" id="sl-lead">
                                            <option value="0">Please Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Subject Name ENG</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="name_en"  name="name_en"   placeholder=""  >
                                        <span class="invalid-feedback" role="alert" id="name_enError">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Subject Name KH</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="name_kh"  name="name_kh"   placeholder=""  >
                                        <span class="invalid-feedback" role="alert" id="name_khError"> {{--span for alert--}}
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">To Do Date</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" id="to_do_date"  name="to_do_date"   placeholder=""  >
                                        <span class="invalid-feedback" role="alert" id="to_do_dateError"> {{--span for alert--}}
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Priority</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-tachometer-alt"></i></span>
                                        </div>
                                        <select class="form-control " name="priority" id="priority" >
                                            <option value=''>-- Select  Prioroty --</option>
                                            <option value="urgent">Urgent</option>
                                            <option value="high">Hight</option>
                                            <option value="medium">Medium</option>
                                            <option value="low">Low</option>
                                        </select>
                                        <span class="invalid-feedback" role="alert" id="priorityError"> {{--span for alert--}}
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Schedule Type</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                        </div>
                                        <select class="form-control" name="schedule_type_id" id="schedule_type_id" >
                                            <option value="0">Please Select</option>
                                        </select>
                                        <span class="invalid-feedback" role="alert" id="schedule_type_idError"> {{--span for alert--}}
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Comment</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-comments"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="comment"  name="comment"   placeholder="" required >
                                        <span class="invalid-feedback" role="alert" id="commentError"> {{--span for alert--}}
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {{-- <button type="button" class="btn btn-primary" onclick="CrmSubmitFormFull('frm_Crmbranchschdeule','/insertschedule','/lead','Insert  Schedule Successfully')">Create</button> --}}
                        <button type="button" class="btn btn-primary" id="save" onclick="CrmSubmitModalAction('frm_Crmbranchschdeule','save','/insertschedule','POST','modal-default','Insert  Schedule Successfully','/schedule')">Create</button>
                    </div>
                </div>
                <!-- /.modal-body -->
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- page content -->
<section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header" style="margin-bottom: 20px;">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-book-open"></i> Policy Report</strong></h1>
               </div><br/>
               {{-- ======================= Start Tab menu =================== --}}
               <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#policy" role="tab" aria-controls="home" aria-selected="true">Policy</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#read_policy" role="tab" aria-controls="profile" aria-selected="false">Read Policy</a>
                </li>

            </ul><br/>
               <!-- /.card-header -->
               <div class="tab-content" id="myTabContent">
                    {{-- ============================ Start Tab policy ======================= --}}
                    <div class="tab-pane fade show active" id="policy" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="col-md-12" style="padding-top:5px;">
                                    <div class="row report_performance_detail">
                                        <div class="col-12">

                                            <form id="performance_report_form">
                                                @csrf
                                                <div class="row" style="margin-top:1%">
                                                    <div class="col-md-5">
                                                        <label for="exampleInputEmail1">From <b class="color_label"> *</b></label>
                                                        <div class="input-group">
                                                            <input type="date" name="policy_data_to" id="policy_data_from" class="form-control input_required">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-5">
                                                        <label for="exampleInputEmail1">To <b class="color_label"> *</b></label>
                                                        <div class="input-group">
                                                            <input type="date" name="policy_data_to" id="policy_data_to" class="form-control input_required">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2" style="margin-top: 30px;">
                                                        <div class="input-group">
                                                            <input type="button" value="Search" class="btn btn-info" onclick="ReportPolicy()" id="search_report_policy">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div><br/><br/> <!-- END div report-->
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Policy Name</th>
                                                <th>Create By</th>
                                                <th>Create Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- END Col-md -->
                           </div>
                        </div>
                    </div>
                    {{-- ============================ End Tab policy ======================= --}}

                    {{-- ============================ Start Tabl read policy ======================= --}}
                    <div class="tab-pane fade" id="read_policy" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="policy" role="tabpanel" aria-labelledby="home-tab">
                                <div class="tab-pane fade show active" id="policy" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="col-md-12" style="padding-top:5px;">
                                                <div class="row report_performance_detail">
                                                    <div class="col-12">

                                                        <form id="performance_report_form">
                                                            @csrf
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputEmail1">From <b class="color_label"> *</b></label>
                                                                        <div class="input-group">
                                                                            <input type="date" name="read_policy_data_from" id="read_policy_data_from" class="form-control required">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputEmail1">From <b class="color_label"> *</b></label>
                                                                        <div class="input-group">
                                                                            <input type="date" name="read_policy_data_to" id="read_policy_data_to" class="form-control required">
                                                                        </div>
                                                                    </div>
                                                                </div><br/>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputEmail1">Read Policy</label>
                                                                        <div class="input-group">
                                                                            <select name="mypolicy" id="mypolicy" class="form-control select2" style="width: 100%">
                                                                                <option value="null">select policy</option>
                                                                                @foreach ($read_policys as $read_policy)
                                                                                    <option value="{{ $read_policy->id }}">{{ $read_policy->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputEmail1">User</label>
                                                                        <div class="input-group">
                                                                            <select name="user" id="user" class="form-control select2" style="width: 100%">
                                                                                <option value="null">select user</option>
                                                                                @foreach ($users as $user)
                                                                                    <option value="{{ $user->id }}">{{ $user->user_name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <br>
                                                            <div class="col-12 text-center">
                                                                <input type="button" value="Search" class="btn btn-info" onclick="ReportReadPolicy()" id="search_report_policy">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div><br/> <!-- END div report-->
                                                {{--================== datatable =================--}}
                                                <table id="example2" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Position</th>
                                                            <th>Policy Name</th>
                                                            <th>Create Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                                {{--================== datatable =================--}}
                                            </div>
                                            <!-- END Col-md -->
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ============================ End Tabl read policy ======================= --}}
               </div>

               <!-- /.card-body -->

             <!-- /.card -->
     </div>
 </div>
    </section>
    <div id="modal_report_performance">
    </div>
<script src="js/hrms/policy_report.js"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();

        // datatable
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#example2").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>

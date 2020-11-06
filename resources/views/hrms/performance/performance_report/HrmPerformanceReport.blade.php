<!-- page content -->
<section class="content">
    <div style="padding:10px 10px 10px 10px">
        <div class="row">

            <!-- Performance Report By Search By Date & Department -->
            <div class="col-md-12">
                    <div class="card  collapsed-card">
                        <div class="card-header back-color-blue" style="color: white;">
                            <h1 class="card-title "><strong><i class="fas fa-book-open"></i> Performance Report</strong></h1>
                            {{-- <div class="col-md-12 text-right"> --}}
                                {{-- @if ($level==4 || $level==5 || $level==1)
                                <button type="button" id="HrmAddSchedule" onclick="HrmAddSchedule()" class="btn bg-gradient-primary"><i class="fas fa-plus"></i></i> Add Schedule</button>
                                @endif --}}
                            {{-- </div> --}}
                            <div class="card-tools">
                                <button type="button" style="color: white;" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                                <div class="col-md-12" style="padding-top:5px;">
                                    <div class="row report_performance_detail">
                                        <div class="col-12">
                                            <form id="performance_report_form">
                                                @csrf
                                                <div class="row" style="margin-top:1%">
                                                    <p class="word-tbody col-1 text-center">From</p>
                                                    <input type="date" name="from_performance" id="from_performance" class="form-control col-2" value="<?php echo date('Y-m-d')?>">
                                                    <span class="invalid-feedback" role="alert" id="from_performanceError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                    <p class="word-tbody col-1 text-center">To</p>
                                                    <input type="date" name="to_performance" id="to_performance" class="form-control col-2" value="<?php echo date('Y-m-d')?>">
                                                    <span class="invalid-feedback" role="alert" id="to_performanceError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                    <p class="word-tbody col-2 text-center">Department</p>
                                                    <select name="dept_performance" id="dept_performance" class="form-control col-4">
                                                    <option value="">Please Select Department</option>
                                                        @foreach ($dept as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="invalid-feedback" role="alert" id="dept_performanceError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div><br>
                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn btn-info" onclick="ReportPerformance()" id="search_report_performance">Submit</button>
                                            </div>
                                            </form>
                                        </div><br>
                                        <div class="col-12">
                                            <hr style="border: 1px black">
                                        </div>
                                        <div class="col-12">
                                            <div class="table-responsive" id="report_table_performance">
                                            </div>
                                        </div>
                                    </div> <!-- END div report-->
                                </div><!-- END Col-md -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
            </div>


            <!-- Search Plan & Plan Detail Report -->
            <div class="col-md-12 pt-3">
                <div class="card collapsed-card">
                    <div class="card-header back-color-blue" style="color: white;">
                        <h1 class="card-title "><strong><i class="fas fa-book-open"></i> Plan and Plan Detail Report</strong></h1>
                        <div class="card-tools">
                            <button type="button" style="color: white;" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            <div class="col-md-12" style="padding-top:5px;">
                                <div class="row report_performance_detail">
                                    <div class="col-12">
                                                <form id="performance_report_form">
                                                    @csrf
                                                    <div class="row" style="margin-top:1%">

                                                        <div class="col-lg-8 col-md-8">
                                                            <div class="row">
                                                                <div class="col-md-5 col-sm-5 form-inline p-2">
                                                                    <label class=""><span class="pr-2">From</span>
                                                                        <input type="date" name="" id="getDateFrom" class="form-control " value="<?php echo date('Y-m-d')?>">
                                                                        <span class="invalid-feedback" role="alert" id="from_performanceError">
                                                                            <strong></strong>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-5 col-sm-5 form-inline p-2">
                                                                    <label class="">
                                                                        <span class="pr-2">To</span>
                                                                        <input type="date" name="" id="getDateTo" class="form-control " value="<?php echo date('Y-m-d')?>">
                                                                        <span class="invalid-feedback" role="alert" id="to_performanceError">
                                                                            <strong></strong>
                                                                        </span>
                                                                    </label>

                                                                </div>
                                                                <div class="col-md-2 col-sm-2 p-2">
                                                                    <button type="button" class="ml-3 btn btn-info" onclick="searchPlanReport()" >Search</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4">

                                                        </div>

                                                    </div>

                                                </form>

                                    </div><br>

                                    <div class="col-12">
                                        <div class="table-responsive pt-3" id="tblShowTableSearch">

                                        </div>
                                    </div>
                                </div> <!-- END div report-->
                            </div><!-- END Col-md -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>



            <!-- Performance Report Search By Date & Option -->
            {{-- <div class="col-md-12 pt-3">
                <div class="card collapsed-card">
                    <div class="card-header back-color-blue" style="color: white;">
                        <h1 class="card-title "><strong><i class="fas fa-book-open"></i> Search Plan</strong></h1>
                        <div class="card-tools">
                            <button type="button" style="color: white;" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            <div class="col-md-12" style="padding-top:5px;">
                                <div class="row report_performance_detail">
                                    <div class="col-12">
                                                <form id="performance_report_form">
                                                    @csrf
                                                    <div class="row" style="margin-top:1%">


                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6 form-inline p-2">
                                                                    <label class=""><span class="pr-2">From</span>
                                                                        <input type="date" name="from_performance" id="date_fromPlan" class="form-control " value="<?php echo date('Y-m-d')?>">
                                                                        <span class="invalid-feedback" role="alert" id="from_performanceError">
                                                                            <strong></strong>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 form-inline p-2">
                                                                    <label class=""><span class="pr-2">To</span>
                                                                        <input type="date" name="to_performance" id="date_toPlan" class="form-control " value="<?php echo date('Y-m-d')?>">
                                                                        <span class="invalid-feedback" role="alert" id="to_performanceError">
                                                                            <strong></strong>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="row">

                                                                <div class="p-2 col-md-12 col-sm-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text font-weight-bold">Performance Status</span>
                                                                        </div>
                                                                        <select name="" id="optionPlan" class="form-control">
                                                                            <option value="">Select Option</option>
                                                                            <option value="op1">Plan Created</option>
                                                                            <option value="op2">Plan In Process</option>
                                                                            <option value="op3">Plan Completed</option>
                                                                        </select>
                                                                        <span class="invalid-feedback" role="alert" id="optionPlanError">
                                                                            <strong></strong>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 pt-3" align="center">
                                                            <button type="button" class="btn btn-info" onclick="searchPlanStatus()" >Submit</button>
                                                        </div>

                                                    </div>

                                                </form>

                                    </div><br>
                                    <div class="col-12">
                                        <hr style="border: 1px black">
                                    </div>
                                    <div class="col-12">
                                        <div class="table-responsive" id="tblShowTableSearch">

                                        </div>
                                    </div>
                                </div> <!-- END div report-->
                            </div><!-- END Col-md -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div> --}}




        </div>
    </div>
</section>
    <div id="modal_report_performance">
    </div>

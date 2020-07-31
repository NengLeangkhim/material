<!-- page content -->
 <section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-book-open"></i> Performance Report</strong></h1>
                 <div class="col-md-12 text-right">
                    {{-- @if ($level==4 || $level==5 || $level==1)
                    <button type="button" id="HrmAddSchedule" onclick="HrmAddSchedule()" class="btn bg-gradient-primary"><i class="fas fa-plus"></i></i> Add Schedule</button>
                    @endif --}}
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
                                        <p class="word-tbody col-2 text-center">Departement</p>
                                        <select name="dept_performance" id="dept_performance" class="form-control col-4">
                                        <option value="">Please Select Departement</option>
                                            @foreach ($dept as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="invalid-feedback" role="alert" id="dept_performanceError"> {{--span for alert--}}
                                            <strong></strong>
                                        </span>
                                    </div><br>
                            <div class="col-12 text-center">
                                <button type="submit" class="form-control col-1 btn btn-info" onclick="ReportPerformance()" id="search_report_performance">Submit</button>
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
               
             <!-- /.card -->
     </div>
 </div>
    </section>
    <div id="modal_report_performance">
    </div>
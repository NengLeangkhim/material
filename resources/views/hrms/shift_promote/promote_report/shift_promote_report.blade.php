



<section class="content">
    <div id="prmote_modal_id">
    </div>
    <div style="padding:10px 10px 10px 10px">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                            <div>
                                <h1 class="card-title hrm-title"><strong><i class="fa fa-search"></i> Search Promote Report </strong></h1>
                            </div>
                            {{-- <p>Select date to search the report.</p> --}}

                    </div>
                    <div class="card-body">
                            <div class="row" style="margin-top:1%">

                                <div class="col-lg-6 col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 form-inline p-2">
                                            <label class="">From
                                                <input type="date" name="" id="date_from" class="ml-2 form-control " value="<?php echo $f = date('Y-m-d'); ?>" >
                                            </label>
                                        </div>
                                        <div class="col-md-6 col-sm-6 form-inline p-2">
                                            <label class="">To
                                                <input type="date" name="" id="date_to" class="ml-2 form-control" value="<?php echo date('Y-m-d'); ?>" >
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="row">
                                        <div class="p-2 col-md-6  col-sm-6">
                                            <select id="department_id" class="form-control">
                                                <option value="">All Department</option>
                                                @if(isset($dept))
                                                    @foreach($dept as $key=>$val)
                                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="p-2 col-md-6 col-sm-6">
                                            <div class="btn-cover">
                                                <a class="btn btn-info" href='javascript:void(0);' onclick= "get_shift_report(document.getElementById('date_from').value, document.getElementById('date_to').value);"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>

                            <div id="report_promote">
                            </div><br>
                            
                            <div id="report-table">
                            </div>
                    </div>

                </div>

            </div >
        </div>
    </div>
</section>
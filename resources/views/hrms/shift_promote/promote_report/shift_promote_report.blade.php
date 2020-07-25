



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
                                <p class="word-tbody col-1 text-center">From</p>
                                <input type="date" name="" id="date_from" class="form-control col-3" value="<?php echo $f = date('Y-m-d'); ?>" >
                                <p class="word-tbody col-1 text-center">To</p>
                                <input type="date" name="" id="date_to" class="form-control col-3" value="<?php echo date('Y-m-d'); ?>" >
                                <div class="btn-cover">
                                        <a class="btn btn_search_report" href='javascript:void(0);' onclick= "get_shift_report(document.getElementById('date_from').value, document.getElementById('date_to').value );"><i class="fa fa-search"></i> Search</a>
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
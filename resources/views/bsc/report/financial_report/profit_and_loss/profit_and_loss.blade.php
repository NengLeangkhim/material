<section class="content-header">
</section>

<style>
    .is-container{
        background-color: #ffffff;
        padding: 10px;
    }
    .is-report {
        padding: 16px;
        margin: 0 auto;
    }
    .income-list, .is-report-list {
        padding: 0px 0px 0px 32px;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><strong style="font-size: 25px;">Profit and Loss</strong></h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="is-menu row justify-content-between">
                                <div class="is-menu-left col-9 row justify-content-start">
                                    <div class="input-group col-10">
                                        <input type="date" id="from-date" class="form-control" value="{{ date('Y-m-01') }}" aria-label="Text input with dropdown button">
                                        <input type="date" id="to-date" class="form-control" value="{{ date('Y-m-t') }}" aria-label="Text input with dropdown button">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-tty"></i></span>
                                        </div>
                                        <select class="form-control" name="select_source" id="is-report-type">
                                            <option value="" disabled>Report Type</option>
                                            <option value="0" hidden disabled>Custom</option>
                                            <option value="1">Monthly</option>
                                            <option value="2">Quarterly</option>
                                            <option value="3">Yearly</option>
                                        </select>
                                    </div>
                                    <div class="input-group col-2">
                                        <select class="form-control" name="select_source" id="is-comparison-number">
                                            <option value="0">None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>
                    
                                <div class="is-menu-right col-3 row justify-content-end">
                                    <button type="button" class="btn btn-primary" id="btn-get-report">Generate</button>
                                </div>
                    
                            </div>
                            
                        </div>
                        <div class="is-report">
                            <div class="is-report-header">
                                <h1><strong style="font-size: 25px;">Profit and Loss</strong></h1>
                                <p class="card-text">Turbotech</p>
                                {{-- <p class="card-text">For the year ended (DATE)</p> --}}
                            </div>
                            <hr>
                            <div id="is-report-sub-header" class="row"></div>
                            <hr>
                            <div id="is-report-body">
                            </div>
                            <div class="is-report-footer">
                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        // change from date to date
        $("#from-date, #to-date").on("change",function(){
            $('#is-report-type option[value="0"]').attr('selected','selected');
        });
        // change report type
        $("#is-report-type").on("change",function(){
            let today = new Date();
            let this_day = today.getDate();
            let this_month = today.getMonth()+1;
            let this_year = today.getFullYear();
            let last_date = new Date(this_year, this_month, 0);
            let last_day = last_date.getDate();
            let from_date = "";
            let to_date = "";
            if($(this).val() == '1'){
                from_date = this_year+'-'+this_month+'-'+'01';
                to_date = this_year+'-'+this_month+'-'+last_day;
            }
            else if($(this).val() == '2'){
                let yearQuarter = Math.ceil(this_month/3);
                switch(yearQuarter){
                case 1:
                    // Jan Mar
                    from_date = this_year+'-'+'01'+'-'+'01';
                    to_date = this_year+'-'+'03'+'-'+'31';
                break;
                case 2:
                    // Apr Jun
                    from_date = this_year+'-'+'04'+'-'+'01';
                    to_date = this_year+'-'+'06'+'-'+'30';
                break;
                case 3:
                    // Jul Sep
                    from_date = this_year+'-'+'07'+'-'+'01';
                    to_date = this_year+'-'+'09'+'-'+'30';
                break;
                case 4:
                    // Oct Dec
                    from_date = this_year+'-'+'10'+'-'+'01';
                    to_date = this_year+'-'+'12'+'-'+'31';
                break;
            }
            }else if($(this).val() == '3'){
                // Jan Dec
                from_date = this_year+'-'+'01'+'-'+'01';
                to_date = this_year+'-'+'12'+'-'+'31';
            }
            
            $("#from-date").val(from_date);
            $("#to-date").val(to_date);
        });
        
        $('#btn-get-report').click(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/bsc_show_data_profit_and_loss",
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    type : $('#is-report-type').val() == 0 ? 1 : $('#is-report-type').val(),
                    comparison : $('#is-comparison-number').val(),
                    from_date : $('#from-date').val(),
                    to_date : $('#to-date').val()
                },
                success: function(response){
                    if(response.success){
                        var data = response.data;
                        var col = 12 - ((data.header).length);

                        var headerId = '#is-report-sub-header';
                        var bodyId = '#is-report-body';
                        $(headerId).empty();
                        $(bodyId).empty();
                        setReportHeader(headerId,data.header, col);
                        setDataList(bodyId, 'Income', data.body.income_list, col, data.header);
                        setDataList(bodyId, 'COGS', data.body.cogs_list, col, data.header);
                        setDataList(bodyId, 'Gross Profit', data.body.gross_profit, col, data.header);
                        setDataList(bodyId, 'Expense', data.body.expense_list, col, data.header);
                        setDataList(bodyId, 'Net Income', data.body.net_income, col, data.header);
                    }
                },
                fail : function(){
                    alert("ERROR");
                },
                dataType: "JSON"
            });
        });
    });

    
    function setReportHeader (id, data, col){
        $(id).append(`
            <div class="col-${col}" style="padding: 0;"></div>
        `);

        $.each(data, function(index, header){
            $(id).append(`
            <div class="col-1 text-right" style="padding-left: 0; padding-right: 4px;">${header.fromDate}</div>
        `);
        });
    }

    function setDataList (id, name, list, col, date_header){
        let data_content = list.data_content;
        let get_total_account = list.get_total_account;

        let row_account_type = "";
        if(data_content != ""){
            $.each(data_content, function(index, acc_type){
                let get_chart_accounts = acc_type.get_chart_accounts;
                let get_total_account_type = acc_type.get_total_account_type;
                let row_total_account_type = "";
                if(get_total_account_type != ""){
                    $.each(get_total_account_type, function(ii, total_account_type){
                        let total_account_type_date = total_account_type.total_account_type == 0 ? '-' : parseFloat(total_account_type.total_account_type).toFixed(4);
                        row_total_account_type += '<div class="col-1 text-right" style="padding-left: 0; padding-right: 4px;">'+total_account_type_date +'</div>';
                    });
                }else{
                    $.each(date_header, function(index, d_header){
                        row_total_account_type += '<div class="col-1 text-right" style="padding-left: 0; padding-right: 4px;"> - </div>';
                    });
                }
                let row_account_chart = "";
                if(get_chart_accounts != ""){
                    $.each(get_chart_accounts, function(i, acc_chart){
                        let get_amount_chart = acc_chart.get_amount_chart;
                        let row_amount_chart = "";
                        if(get_amount_chart != ""){
                            $.each(get_amount_chart, function(ii, amount_chart){
                                let total_amount_chart_date = amount_chart.total_amount == 0 ? '-' : parseFloat(amount_chart.total_amount).toFixed(4);
                                row_amount_chart += '<div class="col-1 text-right" style="padding-left: 0; padding-right: 4px;">'+total_amount_chart_date+'</div>';
                            });
                        }
                        row_account_chart += '<div class="row" style="margin-left: 30px;">'+
                                                '<div class="col-'+col+'" style="padding: 5px 0 5px 10px;">'+acc_chart.name_en+'</div>'+
                                                row_amount_chart+
                                            '</div>';
                    });
                }
                row_account_type += '<div class="row" style="font-weight: 600; padding: 5px 0 5px 10px;">'+
                                        '<div class="col-'+col+'" style="padding: 5px 0 5px 10px;">'+acc_type.bsc_account_type_name+'</div>'+
                                    '</div>'+
                                    row_account_chart+
                                    '<div class="row" style="font-weight: 600; padding: 5px 0 5px 10px;">'+
                                        '<div class="col-'+col+'" style="padding: 5px 0 5px 10px;">Total '+acc_type.bsc_account_type_name+'</div>'+
                                        row_total_account_type+
                                    '</div>';
            });
        }
        let row_account = "";
        let row_total_account = "";
        if(get_total_account != ""){
            $.each(get_total_account, function(index, total_account){
                let total_account_date = total_account.total_account == 0 ? '-' : parseFloat(total_account.total_account).toFixed(4);
                row_total_account += '<div class="col-1 text-right" style="padding-left: 0; padding-right: 4px;">'+total_account_date+'</div>';
            });
        }else{
            $.each(date_header, function(index, d_header){
                row_total_account += '<div class="col-1 text-right" style="padding-left: 0; padding-right: 4px;"> - </div>';
            });
        }
        row_account = '<div class="row" style="font-weight: bold;">'+
                            '<div class="col-'+col+'">Total '+name+'</div>'+
                            row_total_account+
                        '</div>';
        $(id).append(`
            <div id="${name}-section">
                <h4>${name} Section</h4>
                <hr>
                ${row_account_type}
                ${row_account}
                <br>
            </div>
        `);
    }

</script>

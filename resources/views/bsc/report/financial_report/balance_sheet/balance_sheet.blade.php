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

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="row"> --}}
                            {{-- <div class="col-12"> --}}
                                <div class="card-body">
                                    <h2 id="something">Balance Sheet</h2>
                                    <div class="is-menu row justify-content-between">
                                        <div class="is-menu-left col-9 row justify-content-start">
                                            <div class="input-group col-6">
                                                <input type="date" id="end-date" class="form-control" aria-label="Text input with dropdown button">
                                            </div>
                                            <div class="input-group col-6">
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
                            {{-- </div> --}}
                        {{-- </div> --}}
                        <div class="is-report">
                            <div class="is-report-header">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="Balance Sheet">
                                  </div>
                                  <p class="card-text">Turbotech</p>
                                  <p class="card-text">For the year ended (DATE)</p>
                            </div>
                            <hr>
                            <div id="is-report-sub-header" class="row"></div>
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
        $('#btn-get-report').click(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/bsc_show_data_balancesheet",
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    date : $('#end-date').val(),
                    comparison : $('#is-comparison-number').val()
                },
                success: function(response){
                    console.log(response);
                    if(response.success){
                        var data = response.data;
                        var col = 12 - ((data.header).length);

                        var headerId = '#is-report-sub-header';
                        var bodyId = '#is-report-body';
                        $(headerId).empty();
                        $(bodyId).empty();
                        setReportHeader(headerId,data.header, col);
                        setDataList(bodyId, 'Asset', data.body.asset_list, col, data.header);
                        
                        setDataList(bodyId, 'Liability', data.body.liability_list, col, data.header);
                        setDataList(bodyId, 'Equity', data.body.equity_list, col, data.header);
                    }
                    
                    // if(response.success){
                    //     var data = response.data.body;
                    //     var headerId = '#is-report-sub-header'
                    //     var bodyId = '#is-report-body'
                    //     $(headerId).empty()
                    //     $(bodyId).empty()
                    //     if(data.is_error){
                    //         $(bodyId).append(`<h5 class="bold">${response.message}</h5>`)
                    //         return
                    //     }
                    //     renderSection(bodyId, 'is-asset-id', 'Asset', data.asset_list)
                    //     renderSection(bodyId, 'is-liability-id', 'Liability', data.liability_list)
                    //     renderSection(bodyId, 'is-equity-id', 'Equity', data.equity_list)

                    //     // if(response.success){
                    //     //     var data = response.data;
                    //     //     var col = 12 - ((data.header).length);

                    //     //     var headerId = '#is-report-sub-header';
                    //     //     var bodyId = '#is-report-body';
                    //     //     $(headerId).empty();
                    //     //     $(bodyId).empty();
                    //     //     setReportHeader(headerId,data.header, col);
                    //     //     setDataList(bodyId, 'Income', data.body.income_list, col);
                    //     //     setDataList(bodyId, 'COGS', data.body.cogs_list, col);
                    //     //     setCalculateDataList(bodyId, 'Gross Profit', data.body.gross_profit, col);
                    //     //     setDataList(bodyId, 'Expense', data.body.expense_list, col   );
                    //     //     setCalculateDataList(bodyId, 'Net Income', data.body.net_income , col);
                    //     // }
                    // }
                },
                fail : function(){
                    alert("ERROR")
                },
                dataType: "JSON"
            });
        });

        const USD_FOMMATER = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
            minimumFractionDigits: 2
        });

        var renderSection = (bodyId, id, title, data) => {
            $(bodyId).append(
            `
                <hr>
                <div id="${id}">
                    <h5>${title}</h5>
                    <hr>
                    ${data.data.map(e=>`<div class="row ml-2"> <div class="col-8">${e.name_en}</div><div class="col-4">${USD_FOMMATER.format(e.value)}</div> </div>`).join('')}
                    <div class="row bold">
                        <div class="col-8">Total ${title}</div>
                        <div class="col-4">${USD_FOMMATER.format(data.total)}</div>
                    </div>
                </div>
            `
            )
        }
    });

    function setReportHeader (id, data, col){
        $(id).append(`
            <div class="col-${col}" style="padding: 0;"></div>
        `);

        $.each(data, function(index, header){
            $(id).append(`
            <div class="col-1 text-right" style="padding-left: 0; padding-right: 4px;">${header.toDate}</div>
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
                        let total_account_type_date = total_account_type.total_account_type == 0 ? '-' : total_account_type.total_account_type;
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
                                let total_amount_chart_date = amount_chart.total_amount == 0 ? '-' : amount_chart.total_amount;
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
                let total_account_date = total_account.total_account == 0 ? '-' : total_account.total_account;
                row_total_account += '<div class="col-1 text-right" style="padding-left: 0; padding-right: 4px;">'+total_account_date+'</div>';
            });
        }else{
            $.each(date_header, function(index, d_header){
                row_total_account += '<div class="col-1 text-right" style="padding-left: 0; padding-right: 4px;"> - </div>';
            });
        }
        row_account = '<div class="row" style="font-weight: bold;">'+
                            '<div class="col-'+col+'" style="padding: 0;">Total '+name+'</div>'+
                            row_total_account+
                        '</div>';
        $(id).append(`
            <div id="${name}-section">
                <h4>${name} Section</h4>
                <hr>
                ${row_account_type}
                ${row_account}
                <hr>
            </div>
        `);
        // console.log(data_content);
    }

</script>

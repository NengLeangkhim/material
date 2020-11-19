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
    <div class="is-container container">
        <h2 id="something">Something</h2>
        <div class="is-menu row justify-content-between">
            <div class="is-menu-left col-9 row justify-content-start">
                <div class="input-group col-8">
                    <input type="date" id="from-date" class="form-control" aria-label="Text input with dropdown button">
                    <input type="date" id="to-date" class="form-control" aria-label="Text input with dropdown button">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-tty"></i></span>
                    </div>
                    <select class="form-control" name="select_source" id="is-report-type">
                        <option value="0" disabled>Report Type</option>
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

                <div class="input-group col-2">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                      </div>
                    </div>
                </div>
            </div>

            <div class="is-menu-right col-3 row justify-content-end">
                <button type="button" class="btn btn-primary" id="btn-get-report">Primary</button>
            </div>

        </div>
        <div class="is-report">
            <div class="is-report-header">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="Profit and Loss">
                  </div>
                  <p class="card-text">company name</p>
                  <p class="card-text">For the year ended (DATE)</p>
            </div>
            <hr>
            <div id="is-report-sub-header" class="row"></div>
            <hr>
            <div id="is-report-body">
            </div>
            <hr>
            <div class="is-report-footer">

            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $('#btn-get-report').click(function(){
            console.log()
            $.ajax({
                url: "/api/bsc/report/pl",
                type: 'GET',
                data: {
                    type : $('#is-report-type').val() == 0 ? 1 : $('#is-report-type').val(),
                    comparison : $('#is-comparison-number').val(),
                    from_date : $('#from-date').val(),
                    to_date : $('#to-date').val()
                },
                success: function(response){
                    console.log(response)
                    if(response.success){
                        var data = response.data
                        var col = 12 - ((data.header).length)
                        var headerId = '#is-report-sub-header'
                        var bodyId = '#is-report-body'
                        $(headerId).empty()
                        $(bodyId).empty()
                        setReportHeader(headerId,data.header, col)
                        setDataList(bodyId, 'Income', data.body.income_list, col)
                        setDataList(bodyId, 'COGS', data.body.cogs_list, col)
                        setCalculateDataList(bodyId, 'Gross Profit', data.body.gross_profit, col)
                        setDataList(bodyId, 'Expense', data.body.expense_list, col   )
                        setCalculateDataList(bodyId, 'Net Income', data.body.net_income , col)
                    }
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
        })

        const KHR_FOMMATER = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'KHR',
            minimumFractionDigits: 0
        })

        var setReportHeader = (id, data, col)=>{
            $(id).append(`
                <div class="col-${col}"></div>
            `)

            $.each(data, function(index, header){
                $(id).append(`
                <div class="col-1">${header.fromDate}</div>
            `)
            })
        }


        var setDataList = (id, name, list, col)=>{
            $(id).append(`
                <div id="${name}-section">
                    <h4>${name} Section</h4>
                    <hr>
                    ${list.data.map(e=>`
                        <div class="row">
                            <div class="col-${col}">${e.name_en}</div>
                            ${e.value_list.map(ef=>`
                                <!-- <div class="col-1 text-right">${ef.total_debit == 0 ? '-' : ((e.currency_name_en == 'USD') ? USD_FOMMATER.format(ef.total_debit) : KHR_FOMMATER.format(ef.total_debit))}</div> -->
                                <div class="col-1 text-right">${ef.total_debit == 0 ? '-' : ef.total_debit}</div>
                            `).join('')}
                        </div>
                    `).join('')}
                    ${list.total_list.map(e=>`
                        <div class="row bold">
                            <div class="col-${col}">${name} in ${e.currency_name_en}</div>
                            ${e.value_list.map(ef=>`
                                <!-- <div class="col-1 text-right">${ef.total_debit == 0 ? '-' : ((e.currency_name_en == 'USD') ? USD_FOMMATER.format(ef.total_debit) : KHR_FOMMATER.format(ef.total_debit))}</div> -->
                                <div class="col-1 text-right">${ef.total_debit == 0 ? '-' : ef.total_debit}</div>
                            `).join('')}
                        </div>
                    `).join('')}
                </div>
                <hr>
            `)
        }

        var setCalculateDataList = (id, name, list, col)=>{
            $(id).append(`
                <div id="${name}-section">
                    <h4>${name} Section</h4>
                    <hr>
                    ${list.map(e=>`
                        <div class="row bold">
                            <div class="col-${col}">${name} in ${e.currency_name_en}</div>
                            ${e.value_list.map(ef=>`
                                <!-- <div class="col-1 text-right">${ef.total_debit == 0 ? '-' : ((e.currency_name_en == 'USD') ? USD_FOMMATER.format(ef.total_debit) : KHR_FOMMATER.format(ef.total_debit))}</div> -->
                                <div class="col-1 text-right">${ef.total_debit == 0 ? '-' : ef.total_debit}</div>
                            `).join('')}
                        </div>
                    `).join('')}
                </div>
                <hr>
            `)
        }
    });

</script>

<section class="content-header">
</section>

<style>
    .is-container{
        background-color: #ffffff;
        padding: 10px;
    }
    .is-report {
        padding: 16px;
        width: 80%;
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
                    <input type="date" class="form-control" aria-label="Text input with dropdown button">
                    <input type="date" class="form-control" aria-label="Text input with dropdown button">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                      </div>
                    </div>
                </div>
                <div class="input-group col-2">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">NONE</button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                      </div>
                    </div>
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
            <div class="is-report-body">
                <div id="income-section"></div>
                <hr>
                <div id="cogs-section"></div>
                <hr>
                <div id="gross-profit-section"></div>
                <hr>
                <div id="expense-section"></div>
                <hr>
                <div id="net-income-section"></div>

            </div>
            <div class="is-report-footer">

            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $('#btn-get-report').click(function(){
            $.ajax({
                url: "/api/bsc/report/pl",
                type: 'GET',
                data: {
                    type : 1,
                    comparison : 5,
                    fromDate : '2020-11-02',
                    toDate : '2020-11-15'
                },
                success: function(data){
                    var n = data.data.header.comparison;
                    for(var i=0; i<=n; i++) {
                        var d = data.data.body[i].body
                        switch(i) {
                            case 0 :
                                setReportSection('Income Section', 'income', d.income_list, d.total_income, i);
                                setReportSection('SOGS Section', 'cogs', d.cogs_list, d.total_cogs, i);
                                setReportSection('Gross Profit Section', 'gross-profit', [], d.gross_profit, i);
                                setReportSection('Expense Section', 'expense', d.expense_list, d.total_expense, i);
                                setReportSection('Net Income Section', 'net-income', [], d.net_income, i);
                            break;
                            default :
                                setSecondReportSection('income', d.income_list, d.total_income, i);
                                setSecondReportSection('cogs', d.cogs_list, d.total_cogs, i);
                                setSecondReportSection('gross-profit', [], d.gross_profit, i);
                                setSecondReportSection('expense', d.expense_list, d.total_expense, i);
                                setSecondReportSection('net-income', [], d.net_income, i);
                        }

                    }
                },
                fail : function(){
                    alert("ERROR")
                },
                dataType: "JSON"
            });
        });



        var setReportSection = (name, tagName, listValue = null, totalValue, forReportIndex)=> {
            $(`#${tagName}-section`).replaceWith(`
                <h4>${name}</h4>
                <div class="${tagName}-body">
                    ${listValue.map(e=>
                    `
                        <div class="${tagName}-list row is-report-list" id="${tagName}-name-${e.id}">
                            <div class="${tagName}-name-${e.id} col-6">${e.name_en}</div>
                            <div class="${tagName}-value col-1 text-right" id="${tagName}-report-num-${forReportIndex}">${e.total_debit}</div>
                        </div>
                    `).join("")}
                    ${totalValue.map(e=>
                    `
                        <div class="${tagName}-list row is-report-list" id="${tagName}-total-${e.currency}">
                            <div class="${tagName}-total-${e.currency} col-6 bold">Total ${name} ${e.currency}</div>
                            <div class="${tagName}-total-value col-1 bold text-right" id="${tagName}-total-report-num-${forReportIndex}">${e.value}</div>
                        </div>
                    `).join('')}
                </div>
            `);
        }

        var setSecondReportSection = (tagName, listValue, totalValue, forReportIndex) => {
            $.each(listValue, function(index, value){
                if($(`#${tagName}-name-${value.id}`)[0] == undefined) {
                    $(`.${tagName}-body`).append(`
                        <div class="${tagName}-list row is-report-list" id="${tagName}-name-${value.id}">
                            <div class="${tagName}-name-${value.id} col-6">${value.name_en}</div>
                            <div class="${tagName}-value col-1 text-right" id="${tagName}-report-num-0">-</div>
                            <div class="${tagName}-value col-1 text-right" id="${tagName}-report-num-${forReportIndex}">${value.total_debit}</div>
                        </div>
                    `);
                } else {
                    $(`#${tagName}-name-${value.id}`).append(`
                        <div class="${tagName}-value col-1 text-right" id="${tagName}-report-num-${forReportIndex}">${value.total_debit}</div>
                    `);
                }
            })
            $.each(totalValue, function(index, value){
                if($(`#${tagName}-total-${value.id}`)[0] == undefined) {
                    $(`.${tagName}-body`).append(
                    `
                        <div class="${tagName}-list row is-report-list" id="${tagName}-total-${value.currency}">
                            <div class="${tagName}-total-${value.currency} col-6 bold">Total ${name} ${value.currency}</div>
                            <div class="${tagName}-total-value col-1 bold text-right" id="${tagName}-total-report-num-0">-</div>
                            <div class="${tagName}-total-value col-1 bold text-right" id="${tagName}-total-report-num-${forReportIndex}">${value.value}</div>
                        </div>
                    `)
                }
            })
        }

    });

</script>

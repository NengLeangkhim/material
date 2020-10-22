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
    .income-list {
        padding: 0px 0px 0px 32px;
    }
</style>

<section class="content">
    <div class="is-container container">
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
                <div id="income-section">
                    {{-- <h4>Income Section</h4>
                    <div class="income-body">
                        <div class="income-list">
                            <div class="row justify-content-between">
                                <div class="income-name col-6">First Income</div>
                                <div class="income-value col-2">100</div>
                                <div class="income-value col-2">200</div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <hr>
                <div id="cogs-section"></div>
                <hr>
                <div id="gross-profit-section"></div>
                <hr>
                <div id="expense-section"></div>
                <hr>
                <div id="net-section"></div>

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
                    comparison : 3,
                    fromDate : '2020-09-01',
                    toDate : '2020-09-31'
                },
                success: function(data){
                    // console.log(data)
                    /*
                    |12-num|1|1|1|1|
                    */
                    // for(i=0; i<data.header.comparison + 1, i++) {

                    // }
                    var data_1 = data.data.body[0]
                    console.log(data_1)

                    $('#income-section').append(''+
                    '<h4>Income Section</h4>' +
                    '<div class="income-body">' +
                        '<div class="income-list">' +
                            '<div class="row justify-content-between">' +
                                '<div class="income-name col-6">First Income</div>' +
                                '<div class="income-value col-2">100</div>' +
                                '<div class="income-value col-2">200</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>'
                    +'');
                    /*
                        data [
                            {
                                header {
                                    type
                                    comparison
                                }
                                body [
                                    {
                                        header {
                                        from_date
                                        to_date
                                        }
                                        body {
                                            income_list [dynamic]
                                            total_income [base_on_currency]
                                            cogs_list [dynamic]
                                            total_cogs [base_on_currency]
                                            gross_profit [base_on_currency]
                                            expense_list [dynamic]
                                            total_expense [base_on_currency]
                                            net_income [base_on_currency]
                                        }
                                    },
                                    {
                                        header {
                                        from_date
                                        to_date
                                        }
                                        body {
                                            income_list [dynamic]
                                            total_income [base_on_currency]
                                            cogs_list [dynamic]
                                            total_cogs [base_on_currency]
                                            gross_profit [base_on_currency]
                                            expense_list [dynamic]
                                            total_expense [base_on_currency]
                                            net_income [base_on_currency]
                                        }
                                    }
                                ]
                            }
                        ]
                    */
                },
                dataType: "JSON"
            });
        });
    });

</script>

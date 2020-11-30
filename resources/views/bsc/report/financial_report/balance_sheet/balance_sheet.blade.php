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
                                            <div class="input-group col-8">
                                                <input type="date" id="end-date" class="form-control" aria-label="Text input with dropdown button">
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
            console.log()
            $.ajax({
                url: "/api/v1/balancesheet",
                type: 'GET',
                data: {
                    date : $('#end-date').val()
                },
                success: function(response){
                    console.log(response);
                    if(response.success){
                        var data = response.data
                        var headerId = '#is-report-sub-header'
                        var bodyId = '#is-report-body'
                        $(headerId).empty()
                        $(bodyId).empty()
                        if(data.is_error){
                            $(bodyId).append(`<h5 class="bold">${response.message}</h5>`)
                            return
                        }
                        renderSection(bodyId, 'is-asset-id', 'Asset', data.asset_list)
                        renderSection(bodyId, 'is-liability-id', 'Liability', data.liability_list)
                        renderSection(bodyId, 'is-equity-id', 'Equity', data.equity_list)
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

</script>

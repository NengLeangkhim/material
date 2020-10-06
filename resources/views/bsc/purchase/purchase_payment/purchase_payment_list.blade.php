<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-eye"></i> View Purchase Payment</strong></h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="account_name">Payment Date :</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Reference :</label><br/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Supplier</th>
                                                    <th>Purchase</th>
                                                    <th>Date</th>
                                                    <th>Due Date</th>
                                                    <th>Total</th>
                                                    <th>Payment Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>TT-001</td>
                                                    <td>Touch Rith</td>
                                                    <td>2020-10-01</td>
                                                    <td>2020-10-01</td>
                                                    <td>1000$</td>
                                                    <td>1000$</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <label for="">Total :</label>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- end section Main content -->

<script type="text/javascript">

    $(function () {
        
        $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        });
       

    });
    $('.purchase_form').click(function(e)
    {
        var ld = $(this).attr("value");
        go_to(ld);
    })
    $('.edit').click(function(e)
    {
        var id = $(this).attr("value");
        go_to(id);
    });
    $('.purchase_view').click(function(e)
    {
        var id = $(this).attr("value");
        go_to(id);
    });
</script>

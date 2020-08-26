<div class="modal fade show" id="modal_payslip" style="display: block; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;" id="payslipPrint">
            <div class="col-md-12">
                <div class="receipt-header">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="receipt-left">
                                <img class="img-responsive" alt="iamgurdeeposahan" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" style="width: 71px; border-radius: 43px;">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <div class="receipt-right">
                                <h5>TURBOTECH CO.,LTD</h5>
                                <p> (855) 23 999 998 <i class="fa fa-phone"></i></p>
                                <p>info@turbotech.com <i class="fa fa-envelope-o"></i></p>
                                <p>Cambodia <i class="fa fa-location-arrow"></i></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="receipt-header receipt-header-mid">
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                <div class="receipt-right">
                                    <h5>Seng Kimsros <small>&nbsp; | &nbsp; ID Number : TT0082</small></h5>
                                    <p><b>Mobile :</b> 011206889</p>
                                    <p><b>Email :</b> sengkimsros2016@gmail.com</p>
                                    <p><b>Address :</b> Cambodia</p>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="receipt-left">
                                    <h1>Payslip</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-md-9">Base Salary</td>
                                            <td class="col-md-3"><i class="fa fa-inr"></i>$ 200</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-9">Overtime</td>
                                            <td class="col-md-3"><i class="fa fa-inr"></i>$ 20</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-9">Commission</td>
                                            <td class="col-md-3"><i class="fa fa-inr"></i>$ 20</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-9">Bonus</td>
                                            <td class="col-md-3"><i class="fa fa-inr"></i>$ 10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">
                                            <p>
                                                <strong>Total Amount: </strong>
                                            </p>
                                            <p>
                                                <strong>Late Fees: </strong>
                                            </p>
                                            <p>
                                                <strong>Payable Amount: </strong>
                                            </p>
                                            <p>
                                                <strong>Balance Due: </strong>
                                            </p>
                                            </td>
                                            <td>
                                            <p>
                                                <strong><i class="fa fa-inr"></i>$ 65,500</strong>
                                            </p>
                                            <p>
                                                <strong><i class="fa fa-inr"></i>$ 500</strong>
                                            </p>
                                            <p>
                                                <strong><i class="fa fa-inr"></i>$ 1300</strong>
                                            </p>
                                            <p>
                                                <strong><i class="fa fa-inr"></i>$ 9500</strong>
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                        
                                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                                            <td class="text-left text-danger"><h2><strong> 31.566</strong></h2></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            
                            <div class="receipt-header receipt-header-mid receipt-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                        <div class="receipt-right">
                                            <p><b>Date :</b> 15 Aug 2016</p>
                                            <h5 style="color: rgb(140, 140, 140);">Thank you for your business!</h5>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        {{-- <div class="receipt-left">
                                            <h1>Signature</h1>
                                        </div>
                                        <div class="receipt-left">
                                            <h1>.................</h1>
                                        </div>
                                        <div class="receipt-left">
                                            <h1>Seng Kimsros</h1>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
            <div class="col-md-12 text-right" style="margin-top: 20px">
                <button class="btn btn-default bg-turbo-color" onclick="PrintDiv('payslipPrint')">Print</button>
                <button class="btn btn-danger">Cancel</button>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>
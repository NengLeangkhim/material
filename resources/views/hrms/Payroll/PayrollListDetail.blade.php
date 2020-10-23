<div class="modal fade show" id="modal_payrolldetail" style="display: block; padding-right: 17px;" aria-modal="true" data-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong>Payroll List Detail</strong></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;" id="payslipPrint">
            @php
                // print_r($data);
            @endphp
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Payslip</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Overtime</a>
						<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Commission</a>
						<a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Bonus</a>
					</div>
				</nav>
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<div class="col-md-12">
                            <div class="receipt-header">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="receipt-left">
                                        <img class="img-responsive" alt="iamgurdeeposahan" src="http://172.17.168.27:82{{$data[0]['image']}}" style="width:100px; height:100px; border-radius: 50px;">
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
                                            <h5>{{$data[0]['firstName']}} {{$data[0]['lastName']}} <small>&nbsp; | &nbsp; ID Number : {{$data[0]['id_number']}}</small></h5>
                                                <p><b>Mobile :</b> {{$data[0]['contact']}}</p>
                                                <p><b>Email :</b> {{$data[0]['email']}}</p>
                                                {{-- <p><b>Address :</b> {{$data[0]['address']}}</p> --}}
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
					</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						<table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Hours</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>Seng Kimsros</td>
                                    <td>27/08/2020</td>
                                    <td>5:30</td>
                                    <td>7:00</td>
                                    <td>1.5</td>
                                    <td>@php
                                        echo 1.5*5;
                                    @endphp</td>
                                </tr>
                                <tr>
                                    <th>1</th>
                                    <td>Seng Kimsros</td>
                                    <td>27/08/2020</td>
                                    <td>5:30</td>
                                    <td>7:00</td>
                                    <td>1.5</td>
                                    <td>@php
                                        echo 1.5*5;
                                    @endphp</td>
                                </tr>
                                <tr>
                                    <th>1</th>
                                    <td>Seng Kimsros</td>
                                    <td>27/08/2020</td>
                                    <td>5:30</td>
                                    <td>7:00</td>
                                    <td>1.5</td>
                                    <td>@php
                                        echo 1.5*5;
                                    @endphp</td>
                                </tr>
                            </tbody>
                        </table>
					</div>
					<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
						<h1>Commission ?</h1>
					</div>
					<div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
						<h1>Bonus ?</h1>
					</div>
				</div>
          </div>
          <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>
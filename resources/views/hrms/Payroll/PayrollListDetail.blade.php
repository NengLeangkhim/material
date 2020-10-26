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
                // dump($data[3]);
            @endphp
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Payslip</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Overtime</a>
						{{-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Commission</a>
						<a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Bonus</a> --}}
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
                                                        <th style="width:200px">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="col-md-9">Base Salary</td>
                                                        <td class="col-md-3"><i class="fa fa-inr"></i>$ {{$data[1][3]}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-9">Overtime</td>
                                                    <td class="col-md-3"><i class="fa fa-inr"></i>$ {{$data[1][4]}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-9">Commission</td>
                                                    <td class="col-md-3"><i class="fa fa-inr"></i>$ {{$data[1][5]}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-9">Bonus</td>
                                                    <td class="col-md-3"><i class="fa fa-inr"></i>$ {{$data[1][6]}}</td>
                                                    </tr>
                                                    <tr>
                                                    
                                                        <td class="text-right"><h2><strong>Total: </strong></h2></td>
                                                    <td class="text-left text-danger" style="width:200px"><h2><strong> ${{$data[1][3]+$data[1][4]+$data[1][5]+$data[1][6]}}</strong></h2></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> 
                                        <div class="receipt-header receipt-header-mid receipt-footer">
                                            <div class="row">
                                                <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                                    <div class="receipt-right">
                                                    <p><b>Date :</b> {{$data[1][7]}} to {{$data[1][8]}}</p>
                                                        {{-- <h5 style="color: rgb(140, 140, 140);">Thank you for your business!</h5> --}}
                                                    </div>
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
                                    <th>Date</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Hours</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;
                                @endphp
                                @foreach ($data[2] as $overtime)
                                    <tr>
                                        <th>{{++$i}}</th>
                                    <td>{{$overtime->overtime_date}}</td>
                                    <td>{{$overtime->start_time}}</td>
                                        <td>{{$overtime->end_time}}</td>
                                    <td>{{((strtotime($overtime->end_time)-strtotime($overtime->start_time))/60)/60}}</td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
					</div>
					<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
						<table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Commission</th>
                                    <th>$ 0</th>
                                </tr>
                            </thead>
                        </table>
					</div>
					<div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
						<table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Bonus</th>
                                    <th>$ 0</th>
                                </tr>
                            </thead>
                        </table>
					</div>
				</div>
          </div>
          <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>
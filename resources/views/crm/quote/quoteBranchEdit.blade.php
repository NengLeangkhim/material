





<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="far fa-clipboard"></i></span> Quote Branch Edit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);" class="" onclick="go_to('/quote')">Quote List</a></li>
                    <li class="breadcrumb-item active">Branch Edit</li>
                </ol>
            </div>
        </div>
     </div>
</section>
<section class="content">

    <div class="container-fluid">
      <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box card-header">
            <div class="col-12" >
              <div class="row">
                <div class="col-6">
                    <div class="row">
                            <h3 class="card-title"​>
                                <i class="fas fa-hotel" style="padding-right:15px; font-size:35px"></i>
                                    AAAAAAA
                            </h3>
                    </div>
                </div>

              </div>
            </div>
        </div>
    </div>
      <!-- /.card -->
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">

                {{-- card use for Quote detail --}}
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bold">
                            Select Edit
                        </h1>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 dt" >Subject</dt>
                                <dd class="col-sm-8 dd" >AAAAA</dd>
                            <dt class="col-sm-4 dt">Contact Name</dt>
                                <dd class="col-sm-8 dd" >BBBBBB</dd>
                            <dt class="col-sm-4 dt">Assign To</dt>
                                <dd class="col-sm-8 dd">CCCCC</dd>
                            <dt class="col-sm-4 dt">Quote Number</dt>
                                <dd class="col-sm-8 dd">DDDDDD</dd>
                        </dl>
                    </div>
                    <!-- /.card-body -->
                </div>


                {{-- card use for Acknowledgement --}}
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bold">
                            Acknowledgement
                        </h1>
                    </div>
                    <!-- /.card-header -->
                     <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 dt" >Create by</dt>
                                <dd class="col-sm-8 dd" >DDDDDD</dd>
                            <dt class="col-sm-4 dt">Finance Manager</dt>
                                <dd class="col-sm-8 dd" >Name BBBB</dd>
                            <dt class="col-sm-4 dt">Sale Manager</dt>
                                <dd class="col-sm-8 dd">Name CCCC</dd>
                        </dl>
                    </div>

                </div>



                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bold">
                            Edit Item
                        </h1>
                    </div>
                     <div class="card-body">

                        {{-- table row for show item unit --}}
                        <dl class="row table-responsive">
                            <table class="table table-bordered " style="min-width: 600px;">
                                <thead class="font-weight-bold font-size-14">
                                    <tr>
                                        <td class="">Item Name</td>
                                        <td style="">Quantity</td>
                                        <td class="">Price</td>
                                        <td class="">Total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                            <tr id="row'+i+'" data-id="'+i+'" class="tr-quote-row row-quote-item">
                                                <td class="td-item-quote-name">
                                                    <div class=" form-group">
                                                        <div class="row font-size-14">
                                                            <div class="col-md-12 col-sm-12 col-12">
                                                                Product AAAAA
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td style="">
                                                    <div class="font-size-14">
                                                        <span>10</span>
                                                    </div>
                                                </td>
                                                <td class="">
                                                    <div class="row-12 font-size-14">
                                                        <span>1000.00}</span>
                                                    </div>
                                                    <div class="row-12 pt-1 btn-list-item font-size-14">

                                                        <div class="font-weight-normal">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        (-) Discount(%):
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        0.0%
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="row-12 pt-1 btn-list-item font-size-14">
                                                        <div class="font-weight-normal">
                                                            <div>
                                                                Total After Discount:
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div style="color:red;" class="row-12 pt-1 btn-list-item font-size-14">
                                                        <div class="font-weight-normal">
                                                            <span>Net Price: </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="">

                                                    <div id="quote-sub-total_'+i+'" class="font-size-14 ">1000</div>
                                                    <div id="quote-sub-discount_'+i+'" class="font-size-14 pt-1">100</div>
                                                    <div id="quote-after-sub-disc_'+i+'" class="font-size-14 pt-1">900</div>
                                                    <div id="quote-netPrice_'+i+'" style="color:red;" class="font-size-14 pt-1 ">900.00</div>
                                                </td>

                                            </tr>
                                    @endforeach


                                </tbody>

                            </table>

                        </dl>

                        {{-- table row to show grand total item --}}
                        <dl class="row table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="83%">
                                            <div class="pull-right">
                                                <b>Grand Total</b>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="pull-right">
                                                <b>900.00 ($)</b>
                                            </span>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </dl>
                    </div>

                </div>



            </div>

            <div class="col-md-3">
                <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">More</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <a href="#" >Quote Detail</a>
                            </dl>
                            <dl class="row">
                                <a href="#" >Update</a>
                            </dl>
                            <dl class="row">
                                <a href="#" >Activities</a>
                            </dl>
                            <dl class="row">
                                <a href="#" >Documents</a>
                            </dl>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./col -->
</section>


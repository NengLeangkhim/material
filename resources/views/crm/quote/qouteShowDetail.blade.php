
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="far fa-clipboard" style=""></i></span> <b>Quote Detail</b></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);" class="" onclick="go_to('/quote')">Quote List</a></li>
                    <li class="breadcrumb-item active">Quote Detail</li>
                </ol>
            </div>
        </div>
     </div>
</section>
<section class="content">
    @if(!isset($listQuoteDetail))
        <div class="row-12">
            <div class="col-12 text-center font-weight-bold"><h3> No Data Detail !</h3></div>
        </div>
        @php exit; @endphp
    @endif
    <div class="container-fluid">
      <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box card-header">
            <div class="col-12" >
              <div class="row">
                <div class="col-sm-6 col-xs-8 col-12">
                    <div class="row">
                            {{-- <div class="> --}}
                            <h3 class="card-title"​>
                                {{-- <i class="fas fa-hotel" style=" padding-right:15px; font-size:30px"></i> --}}
                                    {{-- {{$listQuoteDetail->data->subject}} --}}
                            </h3>
                        {{-- </div> --}}
                    </div>
                </div>
                <div class="col-sm-6 col-xs-4 col-12 pt-2">
                   <div class="row">
                        <div class="col-md-3 pl-2 pr-3">
                            <div class="row">
                                <button type="button" id="btnGoToEditQuoteFromViewDetail" class="btn-block back-color-blue btn-sm btn font-weight-bold" onclick="goto_Action('/quote/leadBranch', '{{$listQuoteDetail->data->id ??''}}');">Edit Customer Info</button>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <?php $num = count($listQuoteDetail->data->quote_stage??''); ?>
                                @if( $num > 0)
                                        {{-- when qoute have qoute stage  new --}}
                                        @if($listQuoteDetail->data->quote_stage[$num-1]->id == 4)
                                            <div class="col-sm-3 col-3">
                                                <button type="button" id="sale"  value="9" class="btn-block btn-primary btn-sm btn font-weight-bold">Accept</button>
                                            </div>
                                            <div class="col-sm-3 col-3">
                                                <button type="button" id="sale"  value="1" class="btn-block btn-danger  btn-sm btn font-weight-bold">Pending</button>
                                            </div>
                                            <div class="col-sm-3 col-3">
                                                <button onclick='PreviewQuote({{$listQuoteDetail->data->id ??""}})' type="button" class="btn-block btn-success btn-sm btn font-weight-bold" >
                                                    Preview</button>

                                            </div>
                                            <div class="col-sm-3 col-3">
                                                <button onclick='DownloadQuote({{$listQuoteDetail->data->id ??""}})' type="button" class="btn-block btn-info btn-sm btn font-weight-bold" >
                                                    PDF</button>
                                            </div>
                                        @endif
                                        {{-- when qoute have qoute stage  pending --}} {{-- when qoute have qoute stage Lost meaning suctomer not accept --}}
                                        @if(($listQuoteDetail->data->quote_stage[$num-1]->id == 1) || $listQuoteDetail->data->quote_stage[$num-1]->id == 17)
                                            <div class="col-sm-4 col-4">
                                                <button type="button" id="sale" value="4" class="btn-block btn-primary btn-sm btn font-weight-bold">New</button>
                                            </div>
                                            <div class="col-sm-4 col-4">
                                                <button onclick='PreviewQuote({{$listQuoteDetail->data->id ??""}})' type="button" class="btn-block btn-success btn-sm btn font-weight-bold" >
                                                    Preview</button>

                                            </div>
                                            <div class="col-sm-4 col-4">
                                                <button onclick='DownloadQuote({{$listQuoteDetail->data->id ??""}})' type="button" class="btn-block btn-info btn-sm btn font-weight-bold" >
                                                    PDF</button>
                                            </div>
                                        @endif
                                        {{-- when qoute have qoute stage  accepted --}}
                                        @if($listQuoteDetail->data->quote_stage[$num-1]->id == 9)
                                            <div class="col-sm-3 col-3">
                                                <button type="button" id="sale" value="2"  class="btn-block btn-primary btn-sm btn font-weight-bold">Approved</button>
                                            </div>
                                            <div class="col-sm-3 col-3">
                                                <button type="button" id="sale"  value="12"class="btn-block btn-danger  btn-sm btn font-weight-bold">Disapproved</button>
                                            </div>
                                            <div class="col-sm-3 col-3">
                                                <button onclick='PreviewQuote({{$listQuoteDetail->data->id ??""}})' type="button" class="btn-block btn-success btn-sm btn font-weight-bold" >
                                                    Preview</button>

                                            </div>
                                            <div class="col-sm-3 col-3">
                                                <button onclick='DownloadQuote({{$listQuoteDetail->data->id ??""}})' type="button" class="btn-block btn-info btn-sm btn font-weight-bold" >
                                                    PDF</button>
                                            </div>
                                        @endif
                                        {{-- when qoute have qoute stage  disapproved --}}
                                        @if($listQuoteDetail->data->quote_stage[$num-1]->id == 12)
                                            <div class="col-sm-4 col-4">
                                                <button type="button" id="sale" value="2" class="btn-block btn-primary btn-sm btn font-weight-bold">Approved</button>
                                            </div>
                                            <div class="col-sm-4 col-4">
                                                <button onclick='PreviewQuote({{$listQuoteDetail->data->id ??""}})' type="button" class="btn-block btn-success btn-sm btn font-weight-bold" >
                                                    Preview</button>
                                            </div>
                                            <div class="col-sm-4 col-4">
                                                <button onclick='DownloadQuote({{$listQuoteDetail->data->id ??""}})' type="button" class="btn-block btn-info btn-sm btn font-weight-bold" >
                                                    PDF</button>
                                            </div>
                                        @endif
                                        {{-- when qoute have qoute stage  approved --}}
                                        @if($listQuoteDetail->data->quote_stage[$num-1]->id == 2)
                                            <div class="col-sm-4 col-4">
                                                <button type="button" id="sale" value="3" class="btn-block btn-primary btn-sm btn font-weight-bold">Negogiate</button>
                                            </div>
                                            <div class="col-sm-4 col-4">
                                                <button onclick='PreviewQuote({{$listQuoteDetail->data->id ??""}})' type="button" class="btn-block btn-success btn-sm btn font-weight-bold" >
                                                    Preview</button>
                                            </div>
                                            <div class="col-sm-4 col-4">
                                                <button onclick='DownloadQuote({{$listQuoteDetail->data->id ??""}})' type="button" class="btn-block btn-info btn-sm btn font-weight-bold" >
                                                    PDF</button>
                                            </div>
                                        @endif
                                        {{-- when qoute have qoute stage  negogiate --}}
                                        @if($listQuoteDetail->data->quote_stage[$num-1]->id == 3)
                                            <div class="col-sm-3 col-3">
                                                <button type="button" id="sale" value="16" class="btn-block btn-primary btn-sm btn font-weight-bold">Win</button>
                                            </div>
                                            <div class="col-sm-3 col-3">
                                                <button type="button" id="sale" value="17" class="btn-block btn-danger btn-sm btn font-weight-bold">Lost</button>
                                            </div>
                                            <div class="col-sm-3 col-3">
                                                <button onclick='PreviewQuote({{$listQuoteDetail->data->id ??""}})' type="button" class="btn-block btn-success btn-sm btn font-weight-bold" >
                                                    Preview</button>

                                            </div>
                                            <div class="col-sm-3 col-3">
                                                <button onclick='DownloadQuote({{$listQuoteDetail->data->id ??""}})' type="button" class="btn-block btn-info btn-sm btn font-weight-bold" >
                                                    PDF</button>
                                            </div>
                                        @endif
                                        @if($listQuoteDetail->data->quote_stage[$num-1]->id == 16)
                                            <div class="col-sm-3 col-3">
                                                {{-- <button type="button" id="sale" value="16" class="btn-block btn-primary btn-sm btn font-weight-bold">Win</button> --}}
                                            </div>
                                            <div class="col-sm-3 col-3">
                                                {{-- <button type="button" id="sale" value="17" class="btn-block btn-danger btn-sm btn font-weight-bold">Lost</button> --}}
                                            </div>
                                            <div class="col-sm-3 col-3">
                                                <button onclick='PreviewQuote({{$listQuoteDetail->data->id ??""}})' type="button" class="btn-block btn-success btn-sm btn font-weight-bold" >
                                                    Preview</button>

                                            </div>
                                            <div class="col-sm-3 col-3">
                                                <button onclick='DownloadQuote({{$listQuoteDetail->data->id ??""}})' type="button" class="btn-block btn-info btn-sm btn font-weight-bold" >
                                                    PDF</button>
                                            </div>
                                        @endif

                                @endif
                            </div>
                        </div>
                   </div>


                </div>
              </div>
            </div>
        </div>
    </div>
      <!-- /.card -->
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">

                {{-- card use for Quote detail --}}
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bold">
                            {{-- <i class="fas fa-text-width"></i> --}}
                            Quote Detail
                        </h1>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(isset($listQuoteDetail))
                        <dl class="row">
                            <dt class="col-sm-4 dt" >Subject</dt>
                                <dd class="col-sm-8 dd" >{{$listQuoteDetail->data->subject ??""}}</dd>
                                <input type="hidden" name="quote_id"  id="quote_id" value="{{ $listQuoteDetail->data->id ??""}}" readonly>
                                <input type="hidden" name="crm_lead_id" id="crm_lead_id" value="{{ $listQuoteDetail->data->crm_lead->id ??"" }}" readonly>
                                <input type="text" hidden value="{{$_SESSION['token']}}" id="token">
                            <dt class="col-sm-4 dt">Organization Name</dt>
                                <dd class="col-sm-8 dd" >{{$listQuoteDetail->data->crm_lead->customer_name_en ??""}} </dd>
                            <dt class="col-sm-4 dt">Assign To</dt>
                                <dd class="col-sm-8 dd">{{$listQuoteDetail->data->assign_to->first_name_en.' '.$listQuoteDetail->data->assign_to->last_name_en ??""}} </dd>
                            <dt class="col-sm-4 dt">Quote Number</dt>
                                <dd class="col-sm-8 dd">{{$listQuoteDetail->data->quote_number ??""}}</dd>
                            {{-- <dt class="col-sm-4 dt">Valid Until </dt> --}}
                                {{-- <dd class="col-sm-8 dd">{{$listQuoteDetail->data->subject}}</dd> --}}
                            {{-- <dt class="col-sm-4 dt">Convert To BSC </dt> --}}
                                {{-- <dd class="col-sm-8 dd">{{$listQuoteDetail->data->subject}}</dd> --}}
                            <dt class="col-sm-4 dt">Quote Stage </dt>
                                <dd class="col-sm-8 dd">
                                    <?php $num = count($listQuoteDetail->data->quote_stage ??""); ?>
                                    @if( $num > 0)
                                        {{
                                            ucfirst($listQuoteDetail->data->quote_stage[$num-1]->name_en ??"")
                                        }}
                                    @endif
                                </dd>
                            <dt class="col-sm-4 dt">Create Date</dt>
                                        <?php
                                            $date = date_create($listQuoteDetail->data->create_date ??"");
                                            $create_date = date_format($date, 'Y-m-d H:i:s A');
                                        ?>
                                <dd class="col-sm-8 dd">{{$create_date}}</dd>
                            {{-- <dt class="col-sm-4 dt">Modified Time </dt> --}}
                                {{-- <dd class="col-sm-8 dd">{{$listQuoteDetail->data->subject}}</dd> --}}
                            <dt class="col-sm-4 dt">Create By</dt>
                                <dd class="col-sm-8 dd" >
                                    <?php $num = count($listQuoteDetail->data->acknowlegde_by ??""); ?>
                                    @if( $num > 0)
                                        {{
                                            $listQuoteDetail->data->acknowlegde_by[$num-1]->first_name_en.' '.$listQuoteDetail->data->acknowlegde_by[$num-1]->last_name_en ??""
                                        }}
                                    @endif
                                </dd>
                            <dt class="col-sm-4 dt">Comment </dt>
                                <dd class="col-sm-8 dd">
                                    <?php $num = count($listQuoteDetail->data->status_quote ??""); ?>
                                    @if( $num > 0)
                                    <input type="text" hidden value="{{ $listQuoteDetail->data->status_quote[$num-1]->comment}}" id="comment" >
                                    <input type="text" hidden value="{{ $listQuoteDetail->data->status_quote[$num-1]->id}}" id="status_quote_id" >
                                    <input type="text" hidden value="{{ $listQuoteDetail->data->status_quote[$num-1]->crm_quote_id}}" id="crm_quote_id" >
                                        {{
                                            $listQuoteDetail->data->status_quote[$num-1]->comment
                                        }}
                                    @endif
                                </dd>
                        </dl>
                        @else
                            <div class="row text-center">No Data Detail !</div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>



                {{-- card use for Item Details--}}
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bold">
                            Item Details
                        </h1>
                    </div>
                     <div class="card-body">

                        {{-- table row for show item unit --}}
                        <dl class="row table-responsive">

                                    @if(isset($getQuoteBranch))
                                        @php $granTotal = 0 @endphp
                                        @foreach ($getQuoteBranch as $k=>$val)
                                                @php $sumTotal = 0 @endphp
                                                    <div class="bordered">
                                                        {{-- <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Branch Name</span>
                                                            </div>
                                                            <input type="text" class="form-control" value="{{ $val['branch_info']->name }}"  readonly>
                                                        </div> --}}
                                                        <div class="">
                                                            {{-- <div class="input-group-prepend">
                                                                <span class="input-group-text">Branch Name</span>
                                                            </div> --}}
                                                            <div class="form-inline border rounded back-color-blue">
                                                                <label class="border-right p-2">Lead Branch ({{ $k+1 }})</label>
                                                                <div class="pl-2 ">{{ $val['branch_info']->name }}</div>
                                                            </div>
                                                            {{-- <input type="text" class="form-control" value="{{ $val['branch_info']->name }}"  readonly> --}}
                                                        </div>

                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" style="min-width: 900px;">
                                                                <thead class="font-weight-bold font-size-14">
                                                                    <tr>
                                                                        <td class="">Item Name</td>
                                                                        <td style="width: 0px;">Type</td>
                                                                        <td style="width: 0px;">Quantity</td>
                                                                        <td style="width: 0px;">Measurement</td>
                                                                        <td class="">Price</td>
                                                                        <td class="">Total</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                        @if(is_array($val['branch_stock']))
                                                                            @foreach ($val['branch_stock'] as $k2=>$val2)
                                                                                    <tr id="row'+i+'" data-id="'+i+'" class="tr-quote-row row-quote-item">
                                                                                        <td class="" style="width: 33%;">
                                                                                            <div class=" form-group">
                                                                                                <div class="row font-size-14">
                                                                                                    <div class="col-12 font-size-17">
                                                                                                            @if(!empty($val2->stock_product) > 0)
                                                                                                                {{ $val2->stock_product->name ??""}}
                                                                                                            @endif

                                                                                                    </div>
                                                                                                    <div class="col-12 font-size-13">
                                                                                                        <p>
                                                                                                            @if(!empty($val2->stock_product))
                                                                                                                {{ $val2->stock_product->description ??""}}
                                                                                                            @endif

                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td style="">
                                                                                            <div class="font-size-14">
                                                                                                @if(!empty($val2->stock_product))
                                                                                                    {{ ucfirst($val2->stock_product->group_type) }}
                                                                                                @endif
                                                                                                {{-- @if($product[$k][0]->id == $val->stock_product_id)
                                                                                                    {{ ucfirst($product[$k][0]->group_type) }}
                                                                                                @endif --}}
                                                                                            </div>
                                                                                        </td>
                                                                                        <td style="">
                                                                                            <div class="font-size-14">

                                                                                                <span>{{number_format($val2->qty, 2, '.', '')}}</span>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td style="">
                                                                                            <div class="font-size-14">
                                                                                                @if(!empty($val2->stock_product))
                                                                                                    @if($val2->stock_product->measure == '')
                                                                                                        @php $measurement = 'Not Value'  @endphp
                                                                                                    @else
                                                                                                        @php $measurement = $val2->stock_product->measure  @endphp
                                                                                                    @endif
                                                                                                    <span>{{ $measurement }}</span>
                                                                                                @endif
                                                                                            </div>
                                                                                        </td>

                                                                                        <td class="">
                                                                                            <div class="row-12 font-size-14">
                                                                                                <span>{{$val2->price ??""}}</span>
                                                                                            </div>
                                                                                            <div class="row-12 pt-1 btn-list-item font-size-14">

                                                                                                    <?php
                                                                                                        if($val2->discount_type == 'number' )
                                                                                                            {$dis = '$';}
                                                                                                        else
                                                                                                            {$dis = '%';}
                                                                                                    ?>
                                                                                                    <div class="font-weight-normal">
                                                                                                            <div class="row">
                                                                                                                <div class="col-6">
                                                                                                                    <span>(-)Discount({{ $dis }}):</span>
                                                                                                                </div>
                                                                                                                <div class="col-6 text-right">
                                                                                                                    {{number_format($val2->discount, 2, '.', '')}}
                                                                                                                </div>
                                                                                                            </div>
                                                                                                    </div>
                                                                                            </div>
                                                                                            <div class="row-12 pt-1 btn-list-item font-size-14">
                                                                                                <?php
                                                                                                    // function to calculate price discount
                                                                                                    $unitTotal = ($val2->qty * $val2->price);
                                                                                                    if($dis == "%"){
                                                                                                        $val =  ($unitTotal * $val2->discount) / 100;
                                                                                                        $afterDis = ($unitTotal - $val);
                                                                                                        // $sumTotal += $afterDis;
                                                                                                    }else{
                                                                                                        $afterDis =  $unitTotal - $val2->discount;
                                                                                                        $val = $val2->discount;
                                                                                                        // $sumTotal += $afterDis;
                                                                                                    }

                                                                                                    // $sumTotal;
                                                                                                ?>
                                                                                                <div class="font-weight-normal">
                                                                                                    <div>
                                                                                                        Total After Discount:
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="row-12 pt-1 btn-list-item font-size-14">
                                                                                                @if(isset($getQuoteBranch[0]['branch_info']))
                                                                                                    @if($getQuoteBranch[0]['branch_info']->vat_number == '')
                                                                                                        @php
                                                                                                            $vatDis = '10%';
                                                                                                            $vatIncl = ($afterDis * 0.1);
                                                                                                            $sumTotal = ($afterDis * 1.1);
                                                                                                        @endphp
                                                                                                    @else
                                                                                                        @php
                                                                                                            $vatDis = '0%';
                                                                                                            $vatIncl = 0;
                                                                                                            $sumTotal = $afterDis;
                                                                                                        @endphp
                                                                                                    @endif
                                                                                                @endif
                                                                                                <div class="font-weight-normal">
                                                                                                    <span>VAT Include ({{ $vatDis }})</span>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div style="color:red;" class="row-12 pt-1 btn-list-item font-size-14">
                                                                                                <div class="font-weight-normal">
                                                                                                    <span>Net Price: </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td class="">

                                                                                            <div id="quote-sub-total_'+i+'" class="font-size-14 ">{{number_format($unitTotal, 4, '.', '')}}</div>
                                                                                            <div id="quote-sub-discount_'+i+'" class="font-size-14 pt-1">{{number_format($val, 4, '.', '')}}</div>
                                                                                            <div id="quote-after-sub-disc_'+i+'" class="font-size-14 pt-1">{{number_format($afterDis, 4, '.', '')}}</div>
                                                                                            <div id="" class="font-size-14 pt-1">{{number_format($vatIncl, 4, '.', '')}}</div>
                                                                                            <div id="quote-netPrice_'+i+'" style="color:red;" class="font-size-14 pt-1 ">{{number_format($sumTotal, 4, '.', '')}}</div>
                                                                                        </td>

                                                                                    </tr>


                                                                                    @php $granTotal += $sumTotal;   @endphp
                                                                            @endforeach
                                                                        @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                        @endforeach
                                    @endif

                                </tbody>

                            </table>

                        </dl>

                        {{-- table row to show grand total item --}}
                        <dl class="row table-responsive">
                            <table class="table table-bordered font-size-14">
                                <tbody>
                                    @php
                                        $vat = 'No';
                                        $tax = '0%';
                                        $Taxation = 0;
                                        $granTotal2 = $granTotal;
                                    @endphp
                                    @if(isset($getQuoteBranch[0]['branch_info']))
                                        @if($getQuoteBranch[0]['branch_info']->vat_number != '')
                                            @php
                                                $vat = 'Yes';
                                                $tax = '10%';
                                                $Taxation = ($granTotal * 0.1);
                                                $granTotal2 = ($granTotal * 1.1);
                                            @endphp
                                        @endif
                                    @endif
                                    <tr>
                                        <td width="83%">
                                            <div class="pull-right">
                                                Sum Total
                                            </div>
                                        </td>
                                        <td>
                                            <span class="pull-right">
                                                {{number_format($granTotal, 4, '.', '')  }} ($)
                                            </span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td width="83%">
                                            <div class="pull-right">
                                                Value Added Tax
                                            </div>
                                        </td>
                                        <td>
                                            <span class="pull-right">
                                               {{ $vat }}
                                            </span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td width="83%">
                                            <div class="pull-right">
                                                VAT Exclude ({{ $tax }})
                                            </div>
                                        </td>
                                        <td>
                                            <span class="pull-right">
                                                <div >{{number_format($Taxation, 4, '.', '')  }} ($)</div>
                                            </span>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td width="83%">
                                            <div class="pull-right">
                                                <b>Grand Total</b>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="pull-right">
                                                <b>{{number_format($granTotal2, 4, '.', '')  }} ($)</b>
                                            </span>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </dl>
                    </div>

                </div>



            </div>

        </div>
    </div>
    <!-- ./col -->
    <script>
        function PreviewQuote(recordId) {
            var url = "/api/preview-quote/I/" + recordId;
            var windowName = "Preview Quote";
            var windowSize = "width=650,height=750,scrollbars=yes";
            window.open(url, windowName, windowSize);
        }
        function DownloadQuote(recordId) {
            var url = "/api/preview-quote/D/" + recordId;
            window.open(url);
        }

        // sale accept
        $("button#sale").click(function(){
            var comment_quote=$("#comment").val(),
             status_quote_id=$("#status_quote_id").val(),
             crm_quote_id=$("#crm_quote_id").val(),
             status_id = $(this).val();
             var token=$("#token").val();
             if(status_id==16){
                var lead_id=$("#crm_lead_id").val();
                var quote_id=$("#quote_id").val();
                var token=$("#token").val();
                // alert(lead_id+" "+quote_id+" "+token);
                    Swal.fire({ //get from sweetalert function
                    title: 'Update',
                    text: "Are you sure this qoute to customer? ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if(result.value) {
                        $.ajax({
                            url:'api/convertqoute',
                            type:'post',
                            data:{lead_id:lead_id,quote_id:quote_id},
                            headers: {
                                'Authorization': `Bearer ${token}`,
                                },
                            success:function(data){
                                $.ajax({
                                    url:'api/updatequotestage',
                                    type:'post',
                                    data:{status:status_id,qoutestatusid:status_quote_id,comment:comment_quote,quoteid:crm_quote_id},
                                    headers: {
                                        'Authorization': `Bearer ${token}`,
                                        },
                                    success:function(data){
                                        sweetalert('success','Update quote success');
                                        goto_Action('/quote/detail',crm_quote_id )
                                    },
                                    error: function(data) {

                                        sweetalert('warning','Data not accessing to server!');
                                    }
                                })
                            },
                            error: function(data) {
                                console.log(data);
                                sweetalert('warning','Data not accessing to server!');
                            }
                        })
                    }
                });
             }
             else
             {

                Swal.fire({ //get from sweetalert function
                title: 'Update',
                text: "Are you Sure? ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            }).then((result) => {
                if(result.value) {
                    $.ajax({
                        url:'api/updatequotestage',
                        type:'post',
                        data:{status:status_id,qoutestatusid:status_quote_id,comment:comment_quote,quoteid:crm_quote_id},
                        headers: {
                            'Authorization': `Bearer ${token}`,
                            },
                        success:function(data){
                            sweetalert('success','Convert Quote successed!');
                            goto_Action('/quote/detail',crm_quote_id )
                        },
                        error: function(data){
                            sweetalert('warning','Data not accessing to server!');
                        }
                    })
                }
            });

            }


        })
    </script>

</section>


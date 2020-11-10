




<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            {{-- <div class="col-sm-6">
                <h1><span><i class="far fa-clipboard"></i></span> Quote Lead Edit</h1>
            </div> --}}
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);" class="" onclick="goto_Action('/quote/leadBranch', '{{ $quoteDetail->data->id }}')">Edit Branch</a></li>
                    <li class="breadcrumb-item active">Lead Edit</li>
                </ol>
            </div>
        </div>
     </div>
</section>
<section class="content">

    <style>
        .dd {
            padding: 10px;
        }
    </style>

    <form action="" method="PUT" id="frmEditQuoteLead">
        @csrf
        <div class="container-fluid">
        <!-- COLOR PALETTE -->
            <div class="card card-default color-palette-box card-header">
                <div class="col-12" >
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                                <h1 class="card-title"​>
                                    <i class="fas fa-hotel" style="padding-right:15px; font-size:30px;"></i>
                                    <b>Quote Lead Edit</b>
                                </h1>
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4 dt" >Subject</dt>
                                    <dd class="col-sm-8 dd" >
                                        <input type="text" class="form-control" name="subject" value="{{ $quoteDetail->data->subject }}" placeholder="subject">
                                        <input type="hidden" name="quote_id"  id="quote_id" value="{{ $quoteDetail->data->id }}" readonly>
                                        <input type="hidden" name="crm_lead_id" value="{{ $quoteDetail->data->crm_lead->id }}" readonly>

                                    </dd>
                                <dt class="col-sm-4 dt">Assign To</dt>
                                    <dd class="col-sm-8 dd">
                                        <select class="form-control select2"  name="assign_to" >
                                            <option value="{{ $quoteDetail->data->assign_to->id }}">
                                                {{ $quoteDetail->data->assign_to->first_name_en.' '.$quoteDetail->data->assign_to->last_name_en }}
                                            </option>
                                            @foreach ($employee as $key=>$val )
                                                <option value="{{ $val->id }}">
                                                    {{ $val->first_name_en.' '.$val->last_name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </dd>
                                <dt class="col-sm-4 dt">Quote Status</dt>
                                    <dd class="col-sm-8 dd">
                                        <select class="form-control select2" name="crm_quote_status_type_id">
                                            <?php
                                                $num = count($quoteDetail->data->quote_stage);
                                                // echo $quoteDetail->data->quote_stage[($num-1)]->name_en;
                                            ?>
                                            <option value="{{ $quoteDetail->data->quote_stage[($num-1)]->id }}">
                                                {{ $quoteDetail->data->quote_stage[($num-1)]->name_en }}
                                            </option>
                                            @foreach ($quoteStatus as $key=>$val )
                                                <option value="{{ $val->id }}">
                                                    {{ $val->name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </dd>
                                <dt class="col-sm-4 dt">Due Date</dt>
                                    <dd class="col-sm-8 dd">
                                        <input type="text" name="due_date" class="form-control" value="{{ $quoteDetail->data->due_date }}" >
                                    </dd>
                                <dt class="col-sm-4 dt">Comment</dt>
                                    <dd class="col-sm-8 dd">
                                        <?php
                                            $num2 = count($quoteDetail->data->status_quote);
                                        ?>
                                        <input type="text" name="comment" class="form-control" value="{{ $quoteDetail->data->status_quote[$num2-1]->comment }}" placeholder="comment">
                                    </dd>

                                <dt class="col-sm-12 ">
                                    <div class="text-right" >
                                            <button type="button" class="mr-2 font-weight-bold btn btn-sm btn-primary"  id="btnUpdateQuoteLead" >Update</button>
                                            <button type="button" class=" font-weight-bold  btn btn-sm btn-danger" >Cancel</button>
                                    </div>
                                </dt>

                            </dl>
                        </div>
                        <!-- /.card-body -->
                    </div>


                    {{-- card use for Acknowledgement --}}
                    {{-- <div class="card">
                        <div class="card-header">
                            <h1 class="card-title" style="font-weight: bold">
                                Acknowledgement
                            </h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4 dt" >Create by</dt>
                                    <dd class="col-sm-8 dd" >
                                        <input type="text" class="form-control" value="" placeholder="subject">
                                    </dd>
                                <dt class="col-sm-4 dt">Finance Manager</dt>
                                    <dd class="col-sm-8 dd" >
                                        <input type="text" class="form-control" value="" placeholder="subject">
                                    </dd>
                                <dt class="col-sm-4 dt">Sale Manager</dt>
                                    <dd class="col-sm-8 dd">
                                        <input type="text" class="form-control" value="" placeholder="subject">
                                    </dd>
                            </dl>
                        </div>

                    </div> --}}



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

    </form>
        <!-- ./col -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('select').select2();
        });
    </script>

</section>


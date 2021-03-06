




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
                <div class="col-md-12">

                    {{-- card use for Quote detail --}}
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4 dt" >Subject</dt>
                                    <dd class="col-sm-8 dd" >
                                        <input type="text" class="form-control" name="subject" id="subject" value="{{ $quoteDetail->data->subject ??""}}" placeholder="subject">
                                        <span id="subjectError" ><strong></strong></span>
                                        <input type="hidden" name="quote_id"  id="quote_id" value="{{ $quoteDetail->data->id ??""}}" readonly>
                                        <input type="hidden" name="crm_lead_id" id="crm_lead_id" value="{{ $quoteDetail->data->crm_lead->id ??""}}" readonly>
                                        <input type="text" hidden value="{{$_SESSION['token']}}" id="token">
                                    </dd>
                                <dt class="col-sm-4 dt">Assign To</dt>
                                    <dd class="col-sm-8 dd">
                                        <select class="form-control select2"  name="assign_to" id="assign_to" >
                                            <option value="{{ $quoteDetail->data->assign_to->id }}">
                                                {{ $quoteDetail->data->assign_to->first_name_en.' '.$quoteDetail->data->assign_to->last_name_en ??""}}
                                            </option>
                                            @if(isset($employee))
                                                @foreach ($employee as $key=>$val )
                                                    <option value="{{ $val->id ??"" }}">
                                                        {{ $val->first_name_en.' '.$val->last_name_en ??""}}
                                                    </option>
                                                @endforeach
                                            @endif

                                        </select>
                                        <span id="assign_toError" ><strong></strong></span>
                                    </dd>
                                <dt class="col-sm-4 dt">Quote Status</dt>
                                    <dd class="col-sm-8 dd">
                                        <select class="form-control select2" name="crm_quote_status_type_id" id="crm_quote_status_type_id">
                                            <?php
                                                $num = count($quoteDetail->data->quote_stage ??"");
                                                // echo $quoteDetail->data->quote_stage[($num-1)]->name_en;
                                            ?>
                                            @foreach ($quoteStatus as $key=>$val )
                                                    <option value="{{$val->id }}" {{$val->id==$quoteDetail->data->quote_stage[($num-1)]->id ? 'selected="selected"':''}}> {{$val->name_en}}</option>

                                            @endforeach
                                        </select>
                                    </dd>
                                <dt class="col-sm-4 dt">Due Date</dt>
                                    <dd class="col-sm-8 dd">
                                        <input type="text" name="due_date" id="due_date" class="form-control" value="{{ $quoteDetail->data->due_date ??""}}" placeholder="Due Date" >
                                        <span id="due_dateError" ><strong></strong></span>
                                    </dd>
                                <dt class="col-sm-4 dt">Comment</dt>
                                <dd class="col-sm-8 dd">
                                    <?php
                                        $num2 = count($quoteDetail->data->status_quote ??"");
                                    ?>
                                    <input type="text" name="comment" id="comment" class="form-control" value="{{ $quoteDetail->data->status_quote[$num2-1]->comment ??""}}" placeholder="comment">
                                    <span id="commentError" ><strong></strong></span>
                                </dd>
                                <dt class="col-sm-12 ">
                                    <div class="text-right" >
                                        <button type="button" class="mr-2 font-weight-bold btn btn-sm btn-primary"  id="btnUpdateQuoteLead" >Update</button>
                                        <button type="button" class=" font-weight-bold  btn btn-sm btn-danger" onclick='cancelEditLead();' >Cancel</button>
                                    </div>
                                </dt>
                            </dl>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>

                {{-- <div class="col-md-3">
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
                </div> --}}


            </div>
        </div>

    </form>
        <!-- ./col -->

    <?php
        // $quoteId = json_encode($quoteDetail->data->id);
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('select').select2();
        });



        function cancelEditLead(){
            var qId = <?php echo json_encode($quoteDetail->data->id); ?>;
            Swal.fire({ //get from sweetalert function
                title: 'Cancel',
                text: "Do you want to cancel ? ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            }).then((result) => {
                if(result.value) {
                    goto_Action('/quote/leadBranch', qId);
                }
            });
        }


    </script>

</section>


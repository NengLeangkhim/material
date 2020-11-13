<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4><span><i class="fas fa-user-edit"></i></span>Edit Chart Account</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="" class="lead" ​value="lead">Chart Account</a></li>
                    <li class="breadcrumb-item active">Edit Chart Accounts</li>
                </ol>
            </div>
        </div>
     </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <form id="frm_chart_account" method="PUT" action="">
                    @csrf
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header" style="background:#1fa8e0">
                            <h3 class="card-title">Account Detail</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" value="{{ $ch_account_by_ids->id }}" name="id" id="id">
                                        <label for="exampleInputEmail1">Account Type<b class="color_label"> *</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                            </div>
                                            <select class="form-control select2" name="bsc_account_type_id" id="bsc_account_type_id" required="">
                                                <option value="" selected hidden disabled>select item</option>
                                                @foreach ($ch_account_types as $ch_account_type)
                                                    <option value="" disabled>{{ $ch_account_type->bsc_account_name }}</option>
                                                    @php
                                                        $account_types = $ch_account_type->account_types;
                                                    @endphp
                                                    @if ($account_types != "")
                                                        @foreach ($account_types as $acc_type)
                                                            <option
                                                                @if ($acc_type->id == $ch_account_by_ids->bsc_account_type_id)
                                                                    selected
                                                                @endif
                                                                value="{{ $acc_type->id }}">&nbsp;&nbsp;&nbsp;{{ $acc_type->name_en }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         <label for="exampleInputEmail1">Code <b class="color_label"> *</b></label>
                                         <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <input type="number" class="form-control" value="{{ $ch_account_by_ids->code }}" name="code" id="code" placeholder="Code" readonly>
                                        </div>
                                     </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Name English<b class="color_label"> *</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{ $ch_account_by_ids->name_en }}" data-old_name_en="{{ $ch_account_by_ids->name_en }}" onfocusout="myName()" name="name_en" id="name_en" placeholder="Name English" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Name Khmer</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{ $ch_account_by_ids->name_kh }}"  name="name_kh" id="name_kh" placeholder="Name Khmer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Company Name<b class="color_label"> *</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                            </div>
                                            <select class="form-control select2" name="ma_company_id" id="ma_company_id" required="">
                                                @foreach ($companys as $company)
                                                    <option
                                                        @if ($company->id == $ch_account_by_ids->ma_company_id)
                                                            selected
                                                        @endif
                                                        value="{{ $company->id }}">{{ $company->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Parent</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <select class="form-control select2" name="parent_id" id="parent_id">
                                                <option value="null">select item</option>
                                                @foreach ($ch_accounts as $ch_account)
                                                    <option
                                                        @if ($ch_account->id == $ch_account_by_ids->parent_id)
                                                            selected
                                                        @endif
                                                        value="{{ $ch_account->id }}">{{ $ch_account->name_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Currency</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <select class="form-control" name="currency" id="currency" onchange="myCurrency()">
                                                <option value="null">select item</option>
                                                @foreach ($currencys as $currency)
                                                    <option
                                                        @if ($ch_account_by_ids->ma_currency_id == $currency->id)
                                                            selected
                                                        @endif
                                                        value="{{ $currency->id }}" data-currency_name="{{ $currency->name }}">{{ $currency->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" id="currency_name" name="currency_name" value="{{ $currency->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status">Status</label>
                                        <div class="custom-control custom-switch">
                                            <input
                                            @if ($ch_account_by_ids->status==true)
                                                checked
                                            @endif
                                                type="checkbox" class="custom-control-input" id="status" name="status" value="1">
                                            <label class="custom-control-label" for="status"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary save" id="frm_btn_sub_update_chart_account">Update</button>
                                <button type="button" class="btn btn-danger" onclick="go_to('bsc_chart_account_list')">Cencel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });

    // submit on form
    $("#frm_btn_sub_update_chart_account").click(function(){
        let name_en=$('#name_en').val();
        let old_name_en = $('#name_en').attr('data-old_name_en');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:"POST",
                url:'/bsc_ch_account_duplicate',
                data:{
                    _token: CSRF_TOKEN,
                    name_en     : name_en
                },
                dataType: "JSON",
                success:function(data){
                    if(data !=0){
                        if(name_en != old_name_en){
                            sweetalert('error', 'Input name english is duplicated!');
                        }else{
                            submit_form ('/bsc_chart_account_form_edit','frm_chart_account','bsc_chart_account_list');
                        }
                    }else{
                        submit_form ('/bsc_chart_account_form_edit','frm_chart_account','bsc_chart_account_list');
                    }
                }
            });
    });

    //onchange on currency
    function myCurrency()
    {
        let currency_name = $('#currency option:selected').attr('data-currency_name');
        $('#currency_name').val(currency_name);
    }

    //onfocusout duplicate
    function myName()
    {
        let old_name_en = $('#name_en').attr('data-old_name_en');
        let name_en=$('#name_en').val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:"POST",
                url:'/bsc_ch_account_duplicate',
                data:{
                    _token: CSRF_TOKEN,
                    name_en     : name_en
                },
                dataType: "JSON",
                success:function(data){
                    if(data !=0){
                        if(name_en != old_name_en){
                            sweetalert('error', 'Input name english is duplicated!');
                        }
                    }
                }
            });
    }
</script>

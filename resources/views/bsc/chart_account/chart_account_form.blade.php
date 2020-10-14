<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="fas fa-user-plus"></i></span> Create New Chart Account</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="" class="lead" ​value="lead">Chart Account</a></li>
                    <li class="breadcrumb-item active">New Chart Accounts</li>
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
                <form id="frm_chart_account" action="post">
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
                                        <label for="exampleInputEmail1">Account Type<b class="color_label"> *</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                            </div>
                                            <select class="form-control select2" name="bsc_account_type_id" id="bsc_account_type_id" required="">
                                                <option selected hidden disabled>select item</option>
                                                @foreach ($ch_account_types as $ch_account_type)
                                                    <option value="{{ $ch_account_type->id }}">{{ $ch_account_type->name_en }}</option>
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
                                            <input type="text" class="form-control" name="code" id="code" placeholder="Code" required="">
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
                                            <input type="text" class="form-control"  name="name_en" id="name_en" placeholder="Name English" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Name Khmer<b class="color_label"> *</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control"  name="name_kh" id="name_kh" placeholder="Name Khmer" required="">
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
                                                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                                            </div>
                                            <select class="form-control select2" name="ma_company_id" id="ma_company_id" required="">
                                                <option value="" selected hidden disabled>select item</option>
                                                @foreach ($companys as $company)
                                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
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
                                                <option value="null" selected>select item</option>
                                                @foreach ($ch_accounts as $ch_account)
                                                    <option value="{{ $ch_account->id }}">{{ $ch_account->name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                     {{-- <div class="col-md-6">
                                        <label for="exampleInputEmail1">Description</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Tax<b class="color_label"> *</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                                            </div>
                                            <select class="form-control select2" name="tax" >
                                                <option selected hidden disabled>select item</option>
                                                <option>Exclusive</option>
                                                <option>Inclusive</option>
                                                <option>Oppa</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <br>
                            <div class="col-md-12">
                                <!-- <input type="hidden" name="create_by" value="11"> -->
                                <button type="button" class="btn btn-primary save" id="frm_btn_sub_add_chart_account">Save</button>
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
    $("#frm_btn_sub_add_chart_account").click(function(){
        submit_form ('/bsc_chart_account_form_add','frm_chart_account','bsc_chart_account_list');
    });
</script>

{{-- ========== submit chart account =========== --}}
{{-- <script type="text/javascript">
    $('#frm_btn_sub_add_chart_account').on('click',function(e){
        var account_type=$('#account_type').val();
        var code=$('#code').val();
        var name_en=$('#name_en').val();
        var name_kh=$('#name_kh').val();
        var description=$('#description').val();
        var parent=$('#parent').val();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '/bsc_chart_account_form_add',
        type: 'POST',
        data: {_token: CSRF_TOKEN, account_type:account_type,code:code,name_en:name_en,name_kh:name_kh,description:description,parent:parent},
        dataType: 'JSON',
        success: function (data) {
                console.log(data);
                // $.notify({
                //     title: "Save Completed : ",
                //     message: "Driver save is successful!",
                //     icon: 'fa fa-check'
                // },{
                //     type: "info"
                // });
                // location.reload();
            },
            error: function (error) {
                // $.notify({
                //     title: "Save error : ",
                //     message: "Driver save is not success!",
                //     icon: 'fa fa-times'
                // },{
                //     type: "danger"
                // });
            }
    });
})
</script> --}}
{{-- ========== submit chart account =========== --}}

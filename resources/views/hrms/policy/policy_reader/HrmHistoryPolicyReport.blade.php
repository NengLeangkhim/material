<!-- page content -->
<section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header" style="margin-bottom: 20px;">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-book-open"></i> Policy Report</strong></h1>
               </div><br/>
               {{-- ======================= Start Tab menu =================== --}}
               <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#policy" role="tab" aria-controls="home" aria-selected="true">Policy</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#read_policy" role="tab" aria-controls="profile" aria-selected="false">Read Policy</a>
                </li>

            </ul><br/>
               <!-- /.card-header -->
               <div class="tab-content" id="myTabContent">
                    {{-- ============================ Start Tab policy ======================= --}}
                    <div class="tab-pane fade show active" id="policy" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="col-md-12" style="padding-top:5px;">
                                    <div class="row report_performance_detail">
                                        <div class="col-12">

                                            <form id="performance_report_form">
                                                @csrf
                                                <div class="row" style="margin-top:1%">
                                                    <div class="col-md-5">
                                                        <label for="exampleInputEmail1">From <b class="color_label"> *</b></label>
                                                        <div class="input-group">
                                                            <input type="date" name="policy_data_to" id="policy_data_from" class="form-control input_required">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-5">
                                                        <label for="exampleInputEmail1">To <b class="color_label"> *</b></label>
                                                        <div class="input-group">
                                                            <input type="date" name="policy_data_to" id="policy_data_to" class="form-control input_required">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2" style="margin-top: 30px;">
                                                        <div class="input-group">
                                                            <input type="button" value="Search" class="btn btn-info" onclick="ReportPolicy()" id="search_report_policy">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div><br/><br/> <!-- END div report-->
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Policy Name</th>
                                                <th>Create By</th>
                                                <th>Create Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- END Col-md -->
                           </div>
                        </div>
                    </div>
                    {{-- ============================ End Tab policy ======================= --}}

                    {{-- ============================ Start Tabl read policy ======================= --}}
                    <div class="tab-pane fade" id="read_policy" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="policy" role="tabpanel" aria-labelledby="home-tab">
                                <div class="tab-pane fade show active" id="policy" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="col-md-12" style="padding-top:5px;">
                                                <div class="row report_performance_detail">
                                                    <div class="col-12">

                                                        <form id="performance_report_form">
                                                            @csrf
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputEmail1">From <b class="color_label"> *</b></label>
                                                                        <div class="input-group">
                                                                            <input type="date" name="read_policy_data_from" id="read_policy_data_from" class="form-control required">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputEmail1">From <b class="color_label"> *</b></label>
                                                                        <div class="input-group">
                                                                            <input type="date" name="read_policy_data_to" id="read_policy_data_to" class="form-control required">
                                                                        </div>
                                                                    </div>
                                                                </div><br/>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputEmail1">Read Policy</label>
                                                                        <div class="input-group">
                                                                            <select name="mypolicy" id="mypolicy" class="form-control select2" style="width: 100%">
                                                                                <option value="null">select policy</option>
                                                                                @foreach ($read_policys as $read_policy)
                                                                                    <option value="{{ $read_policy->id }}">{{ $read_policy->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputEmail1">User</label>
                                                                        <div class="input-group">
                                                                            <select name="user" id="user" class="form-control select2" style="width: 100%">
                                                                                <option value="null">select user</option>
                                                                                @foreach ($users as $user)
                                                                                    <option value="{{ $user->id }}">{{ $user->user_name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <br>
                                                            <div class="col-12 text-center">
                                                                <input type="button" value="Search" class="btn btn-info" onclick="ReportReadPolicy()" id="search_report_policy">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div><br/> <!-- END div report-->
                                                {{--================== datatable =================--}}
                                                <table id="example2" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Position</th>
                                                            <th>Policy Name</th>
                                                            <th>Create Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                                {{--================== datatable =================--}}
                                            </div>
                                            <!-- END Col-md -->
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ============================ End Tabl read policy ======================= --}}
               </div>

               <!-- /.card-body -->

             <!-- /.card -->
     </div>
 </div>
    </section>
    <div id="modal_report_performance">
    </div>
<script>
    $(document).ready(function(){
        $('.select2').select2();

        // datatable
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#example2").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });

    // submit policy report
    function ReportPolicy()
    {
        let num_miss = 0;
        $(".input_required").each(function(){
            if($(this).val()=="" || $(this).val()==null){ num_miss++;}
        });
        if(num_miss>0){
            $(".input_required").each(function(){
                if($(this).val()=="" || $(this).val()==null){ $(this).css("border-color","red"); }
            });
            sweetalert('error', 'Please input or select field *');
        }else{
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let from=$('#policy_data_from').val();
            let to=$('#policy_data_to').val();

            if(new Date(from)>new Date(to))
            {
                sweetalert('error', 'From date is bigger than To date');
                return;
            }

            $.ajax({
                type:"POST",
                url:'/hrm_policy_report',
                data:{
                    _token: CSRF_TOKEN,
                    from   : from,
                    to     : to
                },
                dataType: "JSON",
                success:function(data){
                    $("#example1").DataTable().destroy();
                    $("#example1 tbody").empty();
                    $.each(data, function(i, value) {
                        create_date=moment(value.create_date).format('DD-MM-YYYY LTS');
                        let tr="<tr><td>"+value.name+"</td><td>"+value.user_name+"</td><td>"+create_date+"</td></tr>";
                        $("#example1").append(tr);
                    });
                    $('#example1').DataTable();
                }
            });
        }
    }

    // submit read policy report
    function ReportReadPolicy()
    {
        let num_miss = 0;
        $(".required").each(function(){
            if($(this).val()=="" || $(this).val()==null){ num_miss++;}
        });
        if(num_miss>0){
            $(".required").each(function(){
                if($(this).val()=="" || $(this).val()==null){ $(this).css("border-color","red"); }
            });
            sweetalert('error', 'Please input or select field *');
        }else{
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let from=$('#read_policy_data_from').val();
            let to=$('#read_policy_data_to').val();
            let read_policy=$('#mypolicy').val();
            let user=$('#user').val();
            if(new Date(from)>new Date(to))
            {
                sweetalert('error', 'From date is bigger than To date');
                return;
            }

            $.ajax({
                type:"POST",
                url:'/hrm_read_policy_report',
                data:{
                    _token: CSRF_TOKEN,
                    from   : from,
                    to     : to,
                    user   : user,
                    read_policy : read_policy
                },
                dataType: "JSON",
                success:function(data){
                    $("#example2").DataTable().destroy();
                    $("#example2 tbody").empty();
                    $.each(data, function(i, value) {
                        create_date=moment(value.create_date).format('DD-MM-YYYY LTS');
                        let tr="<tr><td>"+value.name+"</td><td>"+value.position_name+"</td><td>"+value.policy_name+"</td><td>"+create_date+"</td></tr>";
                        $("#example2").append(tr);
                    });
                    $('#example2').DataTable();
                }
            });
        }
    }
</script>

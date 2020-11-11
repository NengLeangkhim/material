


<section class="content">
    <style>
        .table td, .table th {
            padding: 12px !important;
        }
    </style>
    <div id="prmote_modal_id">
    </div>
    <div style="padding:10px 10px 10px 10px">
        <div class="row">

            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title hrm-title"><strong><i class="fas fa-user-edit"></i> Promote History</strong></h1>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tbl_shift_history" class="table table-bordered " style="white-space: nowrap;" >
                                <thead>
                                    <tr>
                                        <th scope=" ">#</th>
                                        <th scope=" ">Name</th>
                                        <th scope=" ">Staff ID</th>
                                        <th scope=" ">Position</th>
                                        <th scope=" ">Current Salary</th>
                                        <th scope=" ">Approved Date</th>
                                        <th scope=" ">Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                        @if(is_array($allstaffpromote))
                                            @foreach($allstaffpromote as $key=>$val)
                                                    <?php
                                                        $date = date_create($val->create_date);
                                                        $approve_date = date_format($date,"Y/M/d H:i:s A");
                                                    ?>
                                                    <tr>
                                                        <td >{{$key+1}}</td>
                                                        <td>{{$val->first_name_en." ".$val->last_name_en }}</td>
                                                        <td>{{$val->ma_user_id}}</td>
                                                        <td>{{$val->position}}</td>
                                                        <td>{{$val->salary}}</td>
                                                        <td>{{$approve_date}}</td>
                                                        <td>
                                                            <div style="text-align: center;">
                                                                <a  href="javascript:void(0);" onclick="list_staff_promote_hisotry({{$val->ma_user_id}},{{$key+1}})">
                                                                    <span ><img src="/img/icons/plus_icon1.png" style="width: 22px; hight: 22px;"></span>
                                                                </a>

                                                                <a  href="javascript:void(0);" onclick="exit_list_history({{$key+1}})">
                                                                    <span ><img src="/img/icons/subtract_icon1.png" style="width: 25px; hight: 25px;"></span>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr id="">
                                                        <td colspan="7" style="background-color: #F5F5F5" >
                                                            <div style="color: #F5F5F5 ;font-size: 0.1px;">{{$key+1}}</div>
                                                            <div style="display: none;">{{$val->ma_user_id}}</div>
                                                            <div style="display: none;">{{$val->position}}</div>
                                                            <div style="display: none;">{{$val->salary}}</div>
                                                            <div style="display: none;">{{$approve_date}}</div>
                                                            <div style="display: none;">{{$val->first_name_en." ".$val->last_name_en}}</div>
                                                            <div id="list_promote_view_{{$key+1}}"> </div>
                                                        </td>
                                                        <td style="display: none"></td>
                                                        <td style="display: none"></td>
                                                        <td style="display: none"></td>
                                                        <td style="display: none"></td>
                                                        <td style="display: none"></td>
                                                        <td style="display: none"></td>
                                                    </tr>

                                            @endforeach

                                        @endif




                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    {{-- <td colspan=2 style="background-color: #F5F5F5">
        <div id="list_promote_view_'.$i.'"> </div>
    </td> --}}

    <script>
        $(document).ready(function() {
            $('#tbl_shift_history').DataTable({
                "bSort" : false
            });
        });
    </script>


</section>

{{-- @php
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
@endphp --}}
<style>
    th {
        font-size: 16px;
    }

    td {
        font-size: 14px;
    }
</style>
<div class="col-md-12">
    {{-- <h1>Hello</h1> --}}
    <div>
        <div class="tab-pane fade show" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
            {{-- <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body"> --}}
                            <table id="surveyResultTbl" class="table table-bordered table-striped" style="width:100%; white-space: nowrap;">
                                <thead>
                                    <tr style="background: #1fa8e0">
                                        <th style="color:#FFFFFF">No</th>
                                        <th style="color:#FFFFFF">Create Date</th>
                                        <th style="color:#FFFFFF">Customer Name EN</th>
                                        <th style="color:#FFFFFF">Customer Name KH</th>
                                        <th style="color:#FFFFFF">Address Type</th>
                                        <th style="color:#FFFFFF">Survey</th>
                                        <th style="color:#FFFFFF">Comment </th>
                                        <th style="color:#FFFFFF">Create By</th>
                                        {{-- <th style="color:#FFFFFF">Detail</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                    for($i =0;$i<sizeof($survey_result);$i++){
                                            ?>
                                            <tr>
                                                <td >{{$i+1}}</td>
                                                <td >{{$survey_result[$i]["create_date"]}}</td>
                                                <td >{{$survey_result[$i]["name_en"]}}</td>
                                                <td >{{$survey_result[$i]["name_kh"]}}</td>
                                                <td >{{$survey_result[$i]["address_type"]}}</td>
                                                <td >{{$survey_result[$i]["possible"]==true? "Yes":"No"}}</td>
                                                <td >{{$survey_result[$i]["comment"]}}</td>
                                                <td >{{$survey_result[$i]["survey_create_by"]['last_name_en']}} {{$survey_result[$i]["survey_create_by"]['first_name_en']}}</td>

                                                {{-- <td>
                                                    <a href="#" class="btn btn-block btn-info btn-sm branchdetail" value=""  onclick="go_to('detailsurvey/{{$survey_result[$i]['branch_id']}}')"><i class="fas fa-info-circle"></i></a>
                                                </td> --}}
                                            </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        {{-- </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>

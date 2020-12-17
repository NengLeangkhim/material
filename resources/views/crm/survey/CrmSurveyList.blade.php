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
    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
        <div>
            {{-- <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body"> --}}
                            <table id="surveyListTbl" class="table table-bordered table-striped" style="width:100%; white-space: nowrap;">
                                <thead>
                                    <tr style="background: #1fa8e0">
                                        <th style="color:#FFFFFF">No</th>
                                        <th style="color:#FFFFFF">Create Date</th>
                                        <th style="color:#FFFFFF">Customer Name EN</th>
                                        <th style="color:#FFFFFF">Customer Name KH</th>
                                        <th style="color:#FFFFFF">Address Type</th>
                                        <th style="color:#FFFFFF">Home Number </th>
                                        <th style="color:#FFFFFF">Street Number </th>
                                        <th style="color:#FFFFFF">Latlong</th>
                                        <th style="color:#FFFFFF">Create By</th>
                                        <th style="color:#FFFFFF">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                    for($i =0;$i<sizeof($survey);$i++){
                                        if( $survey[$i]["create_date"]==date('d-m-yy')){
                                            ?>
                                            <tr style="background: #d42931">
                                                <td style="color:#FFFFFF">{{$i+1}}</td>
                                                <td style="color:#FFFFFF">{{$survey[$i]["create_date"]}}</td>
                                                <td style="color:#FFFFFF">{{$survey[$i]["name_en"]}}</td>
                                                <td style="color:#FFFFFF">{{$survey[$i]["name_kh"]}}</td>
                                                <td style="color:#FFFFFF">{{$survey[$i]["address_type"]}}</td>
                                                <td style="color:#FFFFFF"># {{$survey[$i]["home_en"]}}</td>
                                                <td style="color:#FFFFFF">St {{$survey[$i]["street_en"]}}</td>
                                                <td style="color:#FFFFFF">{{$survey[$i]["latlg"]}}</td>
                                                <td style="color:#FFFFFF">{{$survey[$i]["user_create"]['last_name_en']}} {{$survey[$i]["user_create"]['first_name_en']}}</td>
                                                <td>
                                                    <a href="#" class="btn btn-block btn-info btn-sm branchdetail" value=""  onclick="go_to('detailsurvey/{{$survey[$i]['branch_id']}}')"><i class="fas fa-info-circle"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        else {
                                            ?>
                                            <tr >
                                                <td>{{$i+1}}</td>
                                                <td>{{$survey[$i]["create_date"]}}</td>
                                                <td>{{$survey[$i]["name_en"]}}</td>
                                                <td>{{$survey[$i]["name_kh"]}}</td>
                                                <td>{{$survey[$i]["address_type"]}}</td>
                                                <td># {{$survey[$i]["home_en"]}}</td>
                                                <td>St {{$survey[$i]["street_en"]}}</td>
                                                <td>{{$survey[$i]["latlg"]}}</td>
                                                <td>{{$survey[$i]["user_create"]['last_name_en']}} {{$survey[$i]["user_create"]['first_name_en']}}</td>
                                                <td>
                                                    <a href="#" class="btn btn-block btn-info btn-sm branchdetail" value=""  onclick="go_to('detailsurvey/{{$survey[$i]['branch_id']}}')"><i class="fas fa-info-circle"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }

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

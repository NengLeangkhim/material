
<style>

</style>





<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="viewPlanReportDetail">
    <div class="modal-dialog modal-xl" id="confirm_box1">
        <div class="modal-content">
                <div class=" modal-header text-center">
                    <h4 class="modal-title" id="exampleModalLabel">
                        <label style="color:#1fa8e0">Plan:</label> <span><label>{{ $parentPlan[0]->parentPlanName }}</label></span>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">x</button>

                </div>
                <div class=" modal-body ">

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Plan Name</label>
                                <div class="form-control pt-2">{{ $parentPlan[0]->parentPlanName }}</div>
                            </div>
                            <div class="form-group">
                                <label>Start Date</label>
                                <div class="form-control pt-2">{{ $parentPlan[0]->parentdatefrom }}</div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-12 ">
                            <div class="form-group ">
                                <label>Create By</label>
                                <div class="form-control pt-2">{{ $parentPlan[0]->parentcreatebyname }}</div>
                            </div>
                            <div class="form-group ">
                                <label>Dateline</label>
                                <div class="form-control pt-2">{{ $parentPlan[0]->parentdateto }}</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <?php
                                    $date = date_create($parentPlan[0]->parentcreatedate);
                                    $create_byParentName = date_format($date, 'Y-F-d H:i:s A');
                                ?>
                                <label>Create Date</label>
                                <div class="form-control pt-2">{{ $create_byParentName }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row-12 mt-3 pt-2 pb-2" style="border-top: 2px solid rgba(66, 59, 64, 0.39)">
                        <h4 class="rounded-sm p-1" style="background-color: #1fa8e0">
                            <label style="color: white;">Plan Child</label>
                        </h4>
                    </div>
                    <div class="row-12 pt-2 table-responsive">
                        <table id="tblShowPlanDetailReport" class="table table-bordered table-hover" style="width:100%; min-width: 50px; white-space:nowrap;">
                            <thead>
                                <tr >
                                    <th style="display: none"></th>
                                    <th>#</th>
                                    <th>Task Name</th>
                                    <th>Start Date</th>
                                    <th>Dateline</th>
                                    <th>Create Date</th>
                                    <th>Create By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($getSubPlan as $key=>$val)
                                    <?php
                                        $date = date_create($val->create_date);
                                        $create_date = date_format($date, 'Y-M-d H:i:s A');

                                    ?>
                                    <tr id="{{$key+1}}">
                                        <td style="display: none"></td>
                                        <td>
                                            <div style="text-align: center;">
                                                <div class="col-12">
                                                    <a  href="javascript:void(0);" id="listSubofSubPlan{{ $key+1 }}"  data-id="{{ $val->id }}">
                                                        <span id="btnAddListSubPlan{{ $key+1 }}" class="btnAddListSubPlan" data-id="{{ $key+1 }}" ><i class="fa fa-plus-circle" style="font-size:18px" aria-hidden="true"></i></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $val->name }}</td>
                                        <td>{{ $val->date_from }}</td>
                                        <td>{{ $val->date_to }}</td>
                                        <td>{{ $create_date }}</td>
                                        <td>{{ $val->subcreatebyname }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary" onclick="viewDetailSubPlanReport('{{ $val->id }}');" >Detail</button>
                                        </td>
                                    </tr>

                                    <tr id="{{$key+1}}">
                                        <td style="display: none"></td>
                                        <td colspan="7" id="{{$key+1}}" style="background-color: #F5F5F5">
                                            <div id="contentTblSubPlan{{ $key+1 }}" style="background-color: white;">

                                            </div>
                                        </td>
                                        <td style="display: none">{{ $val->name }}</td>
                                        <td style="display: none">{{ $val->date_from }}</td>
                                        <td style="display: none">{{ $val->date_to }}</td>
                                        <td style="display: none">{{ $create_date }}</td>
                                        <td style="display: none">{{ $val->subcreatebyname }}</td>
                                        <td style="display: none"></td>
                                    </tr>


                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

</div>
<div id="showModalSubPlanDetail">

</div>
<script type="text/javascript">
    // $(document).ready(function(){
    //     var table = $('#tblItemProduct').DataTable();
    // });


</script>


{{-- <div style="text-align: center;">
    <div class="col-12">
        <a  href="javascript:void(0);" onclick="listSubofSubPlan(''{{ $val->id }}'')">
        <span ><img src="/img/icons/plus_icon1.png" style="width: 20px; hight: 20px;"></span>
        </a>
    </div>
</div> --}}

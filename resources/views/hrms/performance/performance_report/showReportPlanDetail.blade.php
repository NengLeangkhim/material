
<style>

</style>





<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="viewPlanReportDetail">
    <div class="modal-dialog modal-xl" id="confirm_box1">
        <div class="modal-content">
                <div class=" modal-header text-center">
                    <h4 class="modal-title" id="exampleModalLabel">
                        <label style="color:#1fa8e0">Parent Name:</label> <span><label>{{ $dataController[0]->parentPlanName }}</label></span>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">x</button>

                </div>
                <div class=" modal-body ">

                    {{-- <div class="row pb-3">
                        <div class="col-md-5 col-sm-5 col-4"></div>
                        <div class="col-md-5 col-sm-5 col-4">
                            <input type="search" id="mySearchQuote" class="form-control" placeholder="Search">
                        </div>
                    </div> --}}
                    <div class="row-12 pt-2 table-responsive">
                        <table id="tblShowPlanDetailReport" class="table table-bordered table-hover" style="width: 100%; white-space:nowrap;">
                            <thead>
                                <tr >
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

                                @foreach ($dataController as $key=>$val)
                                    <?php
                                        $date = date_create($val->create_date);
                                        $create_date = date_format($date, 'Y-M-d H:i:s A');
                                    ?>

                                    <tr>
                                        <td>
                                            <div style="text-align: center;">
                                                <div class="col-12">
                                                    <a  href="javascript:void(0);" onclick="listSubofSubPlan(''{{ $val->id }}'')">
                                                        <span ><img src="/img/icons/plus_icon1.png" style="width: 20px; hight: 20px;"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $val->name }}</td>
                                        <td>{{ $val->date_from }}</td>
                                        <td>{{ $val->date_to }}</td>
                                        <td>{{ $create_date }}</td>
                                        <td>{{ $val->first_name_en.' '.$val->last_name_en }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary" onclick="viewDetailSubPlanReport('{{ $val->id }}');" >Detail</button>
                                        </td>
                                    </tr>

                                    <tr id="{{$key+1}}">
                                        <td colspan="7" style="background-color: #F5F5F5" >
                                            <div style="color: black ;font-size: 10px;">{{$val->id}}</div>
                                            {{-- <div style="display: none;">{{$val->name}}</div>
                                            <div style="display: none;">{{$val->date_from}}</div>
                                            <div style="display: none;">{{$val->date_to}}</div>
                                            <div style="display: none;">{{$create_date}}</div>
                                            <div style="display: none;">{{$val->first_name_en." ".$val->last_name_en}}</div>
                                            <div id="list_promote_view_{{$key+1}}"> </div> --}}
                                        </td>
                                        <td style="display: none">{{ $val->name }}</td>
                                        <td style="display: none">{{ $val->date_from }}</td>
                                        <td style="display: none">{{ $val->date_to }}</td>
                                        <td style="display: none">{{ $create_date }}</td>
                                        <td style="display: none">{{ $val->date_from }}</td>
                                        <td style="display: none">{{ $val->first_name_en.' '.$val->last_name_en  }}</td>
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


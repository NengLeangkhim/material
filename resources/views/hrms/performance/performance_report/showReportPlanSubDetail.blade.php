




<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="viewSubPlanDetail">
    <div class="modal-dialog modal-lg" id="confirm_box1">
        <div class="modal-content">
                <div class=" modal-header text-center">
                    <h4 class="modal-title" id="exampleModalLabel"><b> Sub Plan Detail</b></h4>
                    <button type="button" class="close" data-dismiss="modal">x</button>

                </div>
                <div class=" modal-body ">

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Task Name</label>
                                    <div class="form-control pt-2">{{ $subPlanDetail[0]->name }}</div>
                                </div>
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div class="form-control pt-2">{{ $subPlanDetail[0]->date_from }}</div>
                                </div>
                                <div class="form-group">
                                    <label>Create Date</label>
                                    <?php
                                        $date = date_create($subPlanDetail[0]->create_date);
                                        $create_date = date_format($date, 'Y-M-d H:i:s A');
                                    ?>
                                    <div class="form-control pt-2">{{ $create_date }}</div>
                                </div>
                            </div>


                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <div class="form-control pt-2">{{ $subPlanDetail[0]->task }}</div>
                                </div>
                                <div class="form-group">
                                    <label>End Date</label>
                                    <div class="form-control pt-2">{{ $subPlanDetail[0]->date_to }}</div>
                                </div>
                                <div class="form-group">
                                    <label>Create By</label>
                                    <div class="form-control pt-2">{{ $subPlanDetail[0]->subcreatebyname }}</div>
                                </div>
                            </div>


                        </div>

                </div>
        </div>
    </div>

</div>



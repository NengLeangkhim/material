<div class="modal fade show" id="modal_mission_detail" style="display: block; padding-right: 17px;" aria-modal="true" data-backdrop="static">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong><i class="fas fa-calendar-plus"></i> Mission Detail</strong></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            <div class="col-md-12" style="width: 100%">
                <div class="row">
                    <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>Location</th>
                            <td>:</td>
                            <td>#{{$mission_detail['home_number']}} st{{$mission_detail['street']}}</td>
                        </tr>
                        <tr>
                            <th>Date From</th>
                            <td>:</td>
                            <td>{{$mission_detail['date_from']}}</td>
                        </tr>
                        <tr>
                            <th>Date To</th>
                            <td>:</td>
                            <td>{{$mission_detail['date_to']}}</td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>:</td>
                            <td>{{$mission_detail['type']}}</td>
                        </tr>
                        <tr>
                            <th>Employee</th>
                            <td>:</td>
                            @php
                                foreach ($mission_detail['employee'] as $em) {
                                    echo '<tr>
                                            <th></th>
                                            <td></td>
                                            <td>'.$em->name.'</td>
                                        </tr>';
                                }
                            @endphp
                        </tr>
                        
                        <tr>
                            <th>Description</th>
                            <td>:</td>
                            <td>{{$mission_detail['description']}}</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
            
          </div>
          <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>
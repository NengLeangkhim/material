<table class="table table-bordered hrm_table" id="tbl_missionAndOutSide" style="width: 100%">
    <thead>                  
        <tr>
            <th style="width: 10px">#</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Type</th>
            <th>Shift</th>
            <th>Location</th>
            <th>Description</th>
            @php
                if(!isset($mission[0]->ma_user_id)){
                    echo '<th>Action</th>';
                }
            @endphp
            
        </tr>
    </thead>
    <tbody>
        @php
            $i=0;
        @endphp
        @foreach ($mission as $item)
            <tr>
                <th>{{++$i}}</th>
                <td>{{ $item->date_from }}</td>
                <td>{{ $item->date_to}}</td>
                <td>{{ $item->type}}</td>
                <td>{{ $item->shift}}</td>
                <td># {{ $item->home_number}}, St {{$item->street}}</td>
                <td>{{$item->description}}</td>
                 @php
                    if(!isset($mission[0]->ma_user_id)){
                        echo '<td>
                                <div class="row">
                                    <div class="col-md-4"><a href="javascript:;" onclick="HRM_ShowDetail(\'hrm_modal_add_edit_missionoutside\',\'modal_missionoutside\','.$item->id.')"><i class="far fa-edit"></i></a></div>
                                    <div class="col-md-4"><a href="javascript:;" onclick="HRM_ShowDetail(\'hrm_modal_mission_detail\',\'modal_mission_detail\','.$item->id.')"><i class="fas fa-info"></i></a></div>
                                    <div class="col-md-4"><a href="javascript:;" onclick="hrm_delete_data('.$item->id.',\'hrm_delete_missionoutside\',\'hrm_mission_outside\',\'Delete Successfully !\',\'HRM_09010403\')"><i class="far fa-trash-alt"></i></a></div>
                                </div>
                            </td>';
                    }
                @endphp
            </tr>
        @endforeach
                      
    </tbody>
</table>
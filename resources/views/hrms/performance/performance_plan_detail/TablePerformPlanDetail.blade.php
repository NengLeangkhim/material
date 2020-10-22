<table class="table table-bordered display nowrap" style="width: 100%" id="hrm_perform_plan">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Plan</th>
            <th scope="col">Parent Plan Detail</th>
            <th scope="col">Plan Detail</th>
            <th scope="col">Date From-To</th>
            <th scope="col">Create Date</th>
            <th scope="col">Create By</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
        {!!$table_perm_detail!!}
        @php
        //$i=1;   
        @endphp
    {{-- <tbody>
        @foreach ($perform_plan_detail as $row)
        @php
        $create = $row->create_date;
        $ts1 = new DateTime($create); //convert string to date format
        @endphp
        <tr>
            <th>{{$i++}}</th>
            <td>{{$row->name_plan}}</td>
            <td>{{$row->name_parent}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->date_from.' '.'to'.' '.$row->date_to}}</td>
            <td>{{$ts1->format('d-M-Y H:i:s')}}</td>
            <td>{{$row->username}}</td>
            <td class="text-center">
                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">
                        <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_view_perform_plan_detail">View</button>              
                        <button type="button" id="{{$row->id}}" onclick="hrm_update_perform_plan_detail('{{$row->id}}','{{$row->hr_performance_plan_id}}')" class="dropdown-item hrm_item hrm_update_perform_plan_detail">Update</button>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody> --}}
</table>
<script>
 $(document).ready(function(){
        $('#hrm_perform_plan').DataTable({
            // "scrollX": true
            responsive:true,
        });
    }); 
</script>



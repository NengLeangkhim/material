<table class="table table-bordered" id="hrm_perform_plan">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Plan Name</th>
        <th scope="col">Date From-To</th>
        <th scope="col">Create Date</th>
        <th scope="col">Create By</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
        {!!$table_perm!!}
        @php
      //  $i=1;   
        @endphp
    {{-- <tbody>
        @foreach ($perform_plan as $row)
        @php
        $create = $row->create_date;
        $ts1 = new DateTime($create); //convert string to date format
        @endphp
        <tr>
            <th>{{$i++}}</th>
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
                        <button type="button" id="{{$row->id}}" onclick="go_to('/hrm_list_plan_performance/plan/modal?id={{$row->id}}')" class="dropdown-item hrm_item hrm_view_plan_detail">View</button>              
                        <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_update_perform_plan">Update</button>
                        <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_add_plan_detail">Add Plan Detail</button>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody> --}}
</table>
<script>
 $(document).ready(function(){
        $('#hrm_perform_plan').DataTable();
    }); 
</script>



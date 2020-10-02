<table style="margin-top:2%;" class="table display responsive nowrap" width="100%" id="recruitment_candidate_tbl">
    <thead class='word-thead'>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Position</th>
        <th scope="col">Create_Date</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
    </thead>
    <tbody class='word-tbody'>
    <?php
        $i=1;
        foreach($candidate as $row){
            $create = $row->register_date;
            $ts1 = new DateTime($create);
        ?>
            <tr>
                <th>{{$i++}}</th>
                <td>{{$row->fname.' '.$row->lname}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->name}}</td>
                <td>{{$ts1->format('Y-M-d H:i:s')}}</td>
                <td>
                    @if ($row->hr_approval_status=='approve')
                        <i class="fas fa-circle" style="color:green;"></i> <span style="margin-left:10px;">{{'Pass'}}</span>
                    @elseif($row->hr_approval_status=='pending')
                        <i class="fas fa-circle" style="color:darkorange;"></i> <span style="margin-left:10px;">{{'Wit'}}</span>
                    @elseif($row->hr_approval_status=='reject')
                        <i class="fas fa-circle" style="color:red;"></i> <span style="margin-left:10px;">{{'Fail'}}</span>
                    @elseif(is_null($row->check_quiz) && is_null($row->hr_approval_status))
                        <i class="fas fa-circle" style="color:rgb(224, 224, 32);"></i> <span style="margin-left:10px;">{{'New'}}</span>
                    @elseif(is_null($row->hr_approval_status) && $row->check_quiz==0) 
                        <i class="fas fa-circle" style="color:orange;"></i> <span style="margin-left:10px;">{{'Taken'}}</span>
                    @endif
                </td>
            <td><button type="button" id="{{$row->id}}" class="btn btn-info hrm_view_list_candidate">Detail</button></td>
            </tr>
      <?php 
        }
        ?>
    </tbody>
</table>
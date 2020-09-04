<table style="margin-top:2%;" class="table display responsive nowrap" width="100%" id="recruitment_report_tbl">
    <thead class='word-thead'><th>No</th><th>Name</th><th>Position</th><th>Create_date</th><th>Create_by</th><th>Status</th><th>Action</th></thead>
    <tbody class='word-tbody'>
    <?php
        $i=1;
        foreach($result as $row_tbl){
            $create = $row_tbl->create_date;
            $ts = new DateTime($create);
        ?>
            <!-- $cmt=(empty($r['comment']))?'':'មតិរបស់អ្នកអនុញ្ញាត : '.$row_tbl['comment']; -->
            <tr title="Reason: <?=$row_tbl->comment?>" data-toggle="tooltip" data-placement="top">
            <td><?=$i++?></td>
            <td><?=$row_tbl->name_kh?></td>
            <td><?=$row_tbl->name?></td>
            <td><?=$ts->format('y-m-d H:i:s')?></td>
            <td><?=$row_tbl->staff?></td>
            <td>
                @if($row_tbl->status_appr=='approve') 
                    <i class="fas fa-circle" style="color: green;"></i> <span style="margin-left:10px;">{{ucfirst($row_tbl->status_appr)}}</span>
                @elseif($row_tbl->status_appr=='pending') 
                    <i class="fas fa-circle" style="color:darkorange;"></i> <span style="margin-left:10px;">{{ucfirst($row_tbl->status_appr)}}</span>
                @elseif($row_tbl->status_appr=='reject') 
                    <i class="fas fa-circle" style="color:red;"></i> <span style="margin-left:10px;">{{ucfirst($row_tbl->status_appr)}}</span>
                @endif
            </td>
            <td><a href="javascript:void(0);" class="btn btn-info" onclick="view_result_condidate_report(<?=$row_tbl->id?>,'{{$row_tbl->start_time}}')">Action</a></td>
            </tr>
      <?php 
        }
        ?>
    </tbody>
</table>
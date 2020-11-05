<table style="margin-top:2%;" class="table display responsive nowrap" width="100%" id="report_tbl_performance">
    <thead class='word-thead'><th>#</th><th>Name</th><th>Plan Detail</th><th>Percentage</th><th>Score</th><th>Create Date</th><th>Create By</th><th>Action</th></thead>
    <tbody class='word-tbody'>
    <?php
        $i=1;
        foreach($report as $row_tbl){
            $value = intval($row_tbl->percentage);
            $ts1 = new DateTime($row_tbl->create_date);

        ?>
            <tr title="Comment: <?=$row_tbl->comment?>" data-toggle="tooltip" data-placement="top">
            <td><?=$i++?></td>
            <td><?=$row_tbl->name_staff?></td>
            <td><?=$row_tbl->name_plan?></td>
            <td><?=$value.'%'?></td>
            <td><?=$row_tbl->pfm_score?></td>
            <td><?= $ts1->format('Y-m-d H:i:s')?></td>
            <td><?=$row_tbl->username?></td>
            <td><a href="javascript:void(0);" class="btn btn-info" onclick="view_detail_report(<?=$row_tbl->id?>)">Action</a></td>
            </tr>
      <?php
      }
        ?>

       </tbody></table>

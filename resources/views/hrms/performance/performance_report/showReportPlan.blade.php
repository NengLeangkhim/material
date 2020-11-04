
    <table style="margin-top:2%;" class=" table table-bordered display responsive nowrap" width="100%" id="tbl_reportPlanPerformance">
            <thead class=' word-thead'>
                <th>#</th>
                <th>Plan Name</th>
                <th>Plan Start</th>
                <th>Plan Dateline</th>
                <th>Create Date</th>
                <th>Create By</th>
                <th>Action</th>

            </thead>
            <tbody class='word-tbody'>
                @foreach ($planReport as $key=>$val)
                    <?php
                        $date = date_create($val->create_date);
                        $create_date = date_format($date, 'Y-M-d H:i:s A');
                    ?>
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $val->name }}</td>
                        <td>{{ $val->date_from }}</td>
                        <td>{{ $val->date_to }}</td>
                        <td>{{ $create_date }}</td>
                        <td> {{ $val->first_name_en.' '.$val->last_name_en }}</td>
                        <td>
                            <button type="button" class="btn-sm btn btn-success" onclick="planReportDetail('{{ $val->id }}');" >Detail</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </table>





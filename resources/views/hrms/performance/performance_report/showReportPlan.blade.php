

    <hr style="border-top: 1px solid gray;">
    <table style="margin-top:2%;" class=" table table-bordered display responsive nowrap" width="100%" id="tbl_reportPlanPerformance">
            <thead class=' word-thead'>
                <th>#</th>
                <th>Plan Name</th>
                <th>Plan Start</th>
                <th>Plan Dateline</th>
                <th>Create Date</th>
                <th>Create By</th>
            </thead>
            <tbody class='word-tbody'>
                @foreach ($planReport as $key=>$val)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $val->name }}</td>
                        <td>{{ $val->date_from }}</td>
                        <td>{{ $val->date_to }}</td>
                        <td>{{ $val->create_date }}</td>
                        <td> {{ $val->first_name_en }}</td>
                    </tr>
                @endforeach
            </tbody>
    </table>





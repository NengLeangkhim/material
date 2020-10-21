<table class="table table-bordered" id="tbl_report_training_search">
    <thead>
        <tr>
            <th>No</th>
            <th>Training Course</th>
            <th>Trainer</th>
            <th>Employee</th>
            <th>Duration</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i=0;
        @endphp
        @foreach ($report_training_schedule as $item)
            <tr>
            <th>{{++$i}}</th>
                <td>{{$item->type}}</td>
            <td>{{$item->trainer}}</td>
                <td>Kimsros,Kopy,Proem</td>
            @if (Str::length($item->actual_f_date)>0)
                <td>{{date('d-m-Y', strtotime($item->actual_f_date))}}/{{date('d-m-Y', strtotime($item->actual_t_date))}}</td>
            @else
                <td>{{date('d-m-Y', strtotime($item->schet_f_date))}}/{{date('d-m-Y', strtotime($item->schet_t_date))}}</td>
            @endif
            <td>{{$item->schet_description}}</td>
            </tr>
        @endforeach
        
    </tbody>
</table>

<script>
    $('#tbl_report_training_search').DataTable();
</script>
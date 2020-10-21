<style>
    .team-members a.followers-add {
	background-color: #fff;
	border: 1px solid #ccc;
	border-radius: 50%;
	color: #ccc;
	display: inline-block;
	font-size: 20px;
	height: 30px;
	line-height: 30px;
	text-align: center;
	width: 30px;
}
.pro-teams .pro-team-members {
    margin-left: 15px;
    display: flex;
    align-items: center;
}
.team-members {
    display: inline-flex;
    flex-wrap: wrap;
    list-style: none;
    margin-bottom: 0;
    padding: 0;
}
.team-members > li:first-child a {
	margin-left: 0;
}
.team-members > li > a {
	border: 2px solid #fff;
	border-radius: 100%;
	display: block;
	height: 30px;
	overflow: hidden;
	width: 30px;
}
.team-members .all-users {
	line-height: 28px;
	opacity: 0.8;
}
.team-members img {
	width: 100%;
}
.table .team-members {
	flex-wrap: nowrap;
}
.table .team-members > li > a {
	width: 32px;
	height: 32px;
}
.table .team-members .all-users {
	line-height: 30px;
}
.attach-files > ul {
	list-style: none;
	margin: 0;
	padding: 0;
}
    .team-members{flex-wrap:nowrap};
</style>
@php
    dump($report_training_schedule);
@endphp
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
            <td>{{$item['training_course']}}</td>
            <td>{{$item['trainer']}}</td>
                <td>
                    <ul class="team-members">
                        @if (count($item['employee'])>0)
                            @php
                                $employee=0;
                            @endphp
                            @foreach ($item['employee'] as $em)
                                @if ($employee<4)
                                    <li>
                                        <a href="#" title="{{$em->name}}" data-toggle="tooltip" data-original-title="{{$em->name}}"><img alt="" src="https://system.turbotech.com{{$em->image}}"></a>
                                    </li>
                                    @php
                                        $employee++;
                                    @endphp
                                @endif
                                
                            @endforeach
                        @endif
                        @if (count($item['employee'])>4)
                            <li>
                                <a href="#" class="all-users">{{(count($item['employee'])-4)}}+</a>
						    </li>
                        @endif
						
					</ul>
                </td>
            @if (Str::length($item['actual_f_date'])>0)
                <td>{{date('d-m-Y', strtotime($item['actual_f_date']))}}/{{date('d-m-Y', strtotime($item['actual_t_date']))}}</td>
            @else
                <td>{{date('d-m-Y', strtotime($item['schet_f_date']))}}/{{date('d-m-Y', strtotime($item['schet_t_date']))}}</td>
            @endif
            <td>{{$item['schet_description']}}</td>
            </tr>
        @endforeach
        
    </tbody>
</table>

<script>
    $('#tbl_report_training_search').DataTable();
</script>
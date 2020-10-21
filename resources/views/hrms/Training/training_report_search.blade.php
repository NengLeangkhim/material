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
</style>
<div class="col-md-12">
    <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#all" role="tab" aria-controls="home" aria-selected="false">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#trained" role="tab" aria-controls="profile" aria-selected="true">Trained</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#still_not_trained" role="tab" aria-controls="profile" aria-selected="false">Still not trained</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">    
        <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="home-tab">
            <div class="card-body"> 
                <div class="col-md-12">
                    <table class="table table-bordered" id="tbl_training_all" style="width:100%">
                        <thead>                  
                            <tr>
                                <th>#</th>
                                <th>Traning Course</th>
                                <th>Trainer</th>
                                <th>Duration</th>
                                <th>Document</th>
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
                </div>
            </div>
        </div>
        <div class="tab-pane fade active show" id="trained" role="tabpanel" aria-labelledby="home-tab">
            <div class="card-body">
                <div class="col-md-12">
                    <table class="table table-bordered" id="tbl_training_trained" style="width:100%">
                        <thead>                  
                            <tr>
                                <th>#</th>
                                <th>Traning Course</th>
                                <th>Trainer</th>
                                <th>Duration</th>
                                <th>Document</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($report_training_schedule as $item)
                            @if(count($item['employee'])>0)
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
                            @endif
                            @endforeach
                                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="still_not_trained" role="tabpanel" aria-labelledby="home-tab">
            <div class="card-body">
                <div class="col-md-12">
                    <table class="table table-bordered" id="tbl_training_still_not_training" style="width:100%">
                        <thead>                  
                            <tr>
                                <th>#</th>
                                <th>Traning Course</th>
                                <th>Trainer</th>
                                <th>Duration</th>
                                <th>Document</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach ($report_training_schedule as $item)
                        @if (count($item['employee'])<=0)
                            
                       
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
                        @endif
                        @endforeach
                                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
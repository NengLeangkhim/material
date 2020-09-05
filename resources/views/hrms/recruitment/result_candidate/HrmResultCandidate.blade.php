<!-- page content -->
<section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Result Candidate</strong></h1>
                 <div class="col-md-12 text-right">

                 </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="hrm_result_candidate">
                        <thead>                  
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Create Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @php
                            $i=1;   
                        @endphp
                        <tbody>
                            @foreach ($result as $row)
                            @php
                                if(is_null($row->appr_date)){ //condition set create date if not yet action approve,peding,reject,it will set create date follow date do quiz
                                    $create = $row->start_time;
                                }else{
                                    $create = $row->appr_date;
                                }
                                $ts1 = new DateTime($create); //convert string to date format
                            @endphp
                            <tr>
                                <th>{{$i++}}</th>
                                <td>{{$row->fname.' '.$row->lname}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$ts1->format('Y-M-d H:i:s')}}</td>
                                <td>@if ($row->status_appr==Null)
                                        <i class="fas fa-circle" style="color:orangered;"></i> <span style="margin-left:10px;">{{'Not Yet!!'}}</span> 
                                    @elseif($row->status_appr=='approve') 
                                        <i class="fas fa-circle" style="color: green;"></i> <span style="margin-left:10px;">{{ucfirst($row->status_appr)}}</span>
                                    @elseif($row->status_appr=='pending') 
                                        <i class="fas fa-circle" style="color:darkorange;"></i> <span style="margin-left:10px;">{{ucfirst($row->status_appr)}}</span>
                                    @elseif($row->status_appr=='reject') 
                                        <i class="fas fa-circle" style="color:red;"></i> <span style="margin-left:10px;">{{ucfirst($row->status_appr)}}</span>
                                    @endif</td>
                                
                                <td class="text-center">
                                    <button type="button" id="{{$row->id}}" onclick="go_to('/hrm_list_result_condidate/action?id={{$row->id}}&date={{$row->start_time}}')" class="btn btn-info hrm_view_candidate_result">Action</button> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
               </div>
               <!-- /.card-body -->
               
             <!-- /.card -->
     </div>
 </div>
    </section>
 <div id='ShowModalResultCandidate'></div>
    <script type='text/javascript'>
     $(document).ready(
         function(){
             $('#hrm_result_candidate').DataTable();
         }
     );
   </script>
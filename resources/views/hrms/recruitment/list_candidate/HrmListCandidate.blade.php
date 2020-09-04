<!-- page content -->
<section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i> List Candidate</strong></h1>
                 <div class="col-md-12 text-right">

                 </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="hrm_list_candidate">
                        <thead>                  
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
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
                            @foreach ($candidate as $row)
                            @php
                                $create = $row->register_date;
                                $ts1 = new DateTime($create); //convert string to date format
                            @endphp
                            <tr>
                                <th>{{$i++}}</th>
                                <td>{{$row->fname.' '.$row->lname}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$ts1->format('Y-M-d H:i:s')}}</td>
                                <td>@if ($row->hr_approval_status=='approve')
                                    <i class="fas fa-circle" style="color:green;"></i> <span style="margin-left:10px;">{{'Pass'}}</span>
                                @elseif($row->hr_approval_status=='pending')
                                    <i class="fas fa-circle" style="color:darkorange;"></i> <span style="margin-left:10px;">{{'Result On Hold'}}</span>
                                @elseif($row->hr_approval_status=='reject')
                                    <i class="fas fa-circle" style="color:red;"></i> <span style="margin-left:10px;">{{'Fail'}}</span>
                                @elseif(is_null($row->check_quiz) && is_null($row->hr_approval_status))
                                    <i class="fas fa-circle" style="color:rgb(224, 224, 32);"></i> <span style="margin-left:10px;">{{'Not Yet Quiz'}}</span>
                                @elseif(is_null($row->hr_approval_status) && $row->check_quiz==0) 
                                    <i class="fas fa-circle" style="color:orange;"></i> <span style="margin-left:10px;">{{'Not Yet Interview'}}</span>
                                @endif</td>
                                
                                <td class="text-center">
                                    <button type="button" id="{{$row->id}}" class="btn btn-info hrm_view_list_candidate">Detail</button> 
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
 <div id='ShowModalCandidate'></div>
    <script type='text/javascript'>
     $(document).ready(
         function(){
            // getTable('productlist','id');
             $('#hrm_list_candidate').DataTable();
         }
     );
   </script>
<!-- page content -->
<section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-book-open"></i> List Users Read Policy</strong></h1>
                 <div class="col-md-12 text-right">

                 </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display nowrap" style="width: 100%" id="hrm_policy_list_user">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Time</th>
                                <th scope="col">Policy Name</th>
                                <th scope="col">Create Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @php
                            $i=1;
                        @endphp
                        <tbody>
                            @foreach ($history as $row)
                            @php
                                $start = $row->start_time;
                                $end = $row->end_time;
                                $ts1 = new DateTime($start); //convert string to date format
                                $ts2 = new DateTime($end);
                                $interval = $ts1->diff($ts2);
                            @endphp
                            <tr>
                                <th>{{$i++}}</th>
                                <td>{{$row->name}}</td>
                                <td>{{$row->position_name}}</td>
                                <td>{{$interval->format('%H h %i mn %s sec')}}</td>
                                <td>{{$row->policy_name}}</td>
                                <td>{{$ts2->format('Y-M-d H:i:s')}}</td>
                                <td class="text-center">
                                    <button type="button" id="{{$row->id}}" class="btn btn-info hrm_view_policy_user">Detail</button>
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
 <div id='ShowModalPolicyUser'></div>
    <script type='text/javascript'>
     $(document).ready(
         function(){
            // getTable('productlist','id');
             $('#hrm_policy_list_user').DataTable({
                 scrollX: true
             });
         }
     );
   </script>

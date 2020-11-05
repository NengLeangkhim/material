@php
 use App\Http\Controllers\perms;  
 if (session_status() == PHP_SESSION_NONE) {
            session_start();
}  
foreach($permission as $row){
  $level = $row->ma_group_id;
  $id_user = $row->id;  
}
@endphp
 <!-- page content -->
 <section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="far fa-clipboard"></i> Performance Staff Follow Up</strong></h1>
                 <div class="col-md-12 text-right">
                    {{-- @if ($level==4 || $level==5 || $level==1)
                    <button type="button" id="HrmAddSchedule" onclick="HrmAddSchedule()" class="btn bg-gradient-primary"><i class="fas fa-plus"></i></i> Add Schedule</button>
                    @endif --}}
                 </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display nowrap" style="width: 100%" id="tbl_staff_follow_up">
                            <thead>                  
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Plan Name</th>
                                <th scope="col">Date From-To</th>
                                <th scope="col">Create Date</th>
                                <th scope="col">Create By</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            {{-- <tbody> --}}
                              {!!$table_perm!!}
                              {{-- <?php 
                             // $i=1;
                              ?>
                              @foreach($follow_up as $row)
                                @php
                                    $create = $row->create_date;
                                    $ts1 = new DateTime($create);
                                @endphp 
                                  <tr>
                                      <td style="color:black;" scope="row">{{$i++}}</td>
                                      <td style="color:black;">{{$row->name_staff}}</td>
                                      <td style="color:black;">{{$row->name_plan}} </td>
                                      <td style="color:black;">{{intval($row->percentage).'%'}}</td>
                                      <td style="color:black;">{{$row->action_date_from.' '.'to'.' '.$row->action_date_to}}</td>
                                      <td style="color:black;">{{$ts1->format('Y-m-d H:i:s')}} </td>
                                      <td style="color:black;" class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">
                                                <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_view_perform_staff_follow_up">View</button>           
                                                @if ($row->ma_user_id == $id_user || $level==5 || $level==1) can add follow up only by ur schedule
                                                    <button type="button" id="{{$row->id}}" onclick="go_to('/hrm_performance_follow_up/modal/action?edit={{$row->id}}')" class="dropdown-item hrm_item hrm_update_perform_staff_follow_up">Update</button>
                                                @endif 
                                                @if ($level==4 || $level==5 || $level==1)check permission manager
                                                  @if (is_null($row->delete) || $row->delete=='t')check can follow up one time only
                                                    <button type="button" id="{{$row->id}}" onclick="go_to('/hrm_performance_follow_up_manager/action?add={{$row->id}}')" class="dropdown-item hrm_item hrm_add_manager_follow_up">Follow Up Staff</button>   
                                                  @endif
                                                @endif    
                                            </div>
                                        </div>
                                      </td>
                                  </tr>     
                              @endforeach
                            </tbody> --}}
                        </table>
                    </div>
               </div>
               <!-- /.card-body -->
               
             <!-- /.card -->
     </div>
 </div>
    </section>
    <div id="modal_for_view_follow_up"></div>
    <!-- /page content -->
    <script type='text/javascript'>
      $(document).ready(
          function(){
             // getTable('productlist','id');
              $('#tbl_staff_follow_up').DataTable({
                // scrollX: true
                responsive:true,
              });
          }
      );
    </script>
 <!-- page content -->
 <section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="far fa-clipboard"></i> Performance Manager Follow Up</strong></h1>
                 <div class="col-md-12 text-right">
    
                 </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tbl_manager_follow_up">
                            <thead>                  
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Plan Name</th>
                                <th scope="col">Percentage</th>
                                <th scope="col">Score</th>
                                <th scope="col">Create Date</th>
                                <th scope="col">Create By</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            {!!$table_perm!!}
                            {{-- <tbody>
                              <?php 
                              //$i=1;
                              ?>
                              @foreach($manager_follow_up as $row)
                                @php
                                    $create = $row->create_date;
                                    $ts1 = new DateTime($create);
                                @endphp 
                                  <tr>
                                      <td style="color:black;" scope="row">{{$i++}}</td>
                                      <td style="color:black;">{{$row->staff_name}}</td>
                                      <td style="color:black;">{{$row->name_plan}} </td>
                                      <td style="color:black;">{{intval($row->percentage).'%'}}</td>
                                      <td style="color:black;">{{$row->score}} </td>
                                      <td style="color:black;">{{$ts1->format('Y-m-d H:i:s')}} </td>
                                      <td style="color:black;">{{$row->username}}</td>
                                      <td style="color:black;" class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">
                                                <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item hrm_view_manager_follow_up">View</button>           
                                                @if ($level==4 || $level==5 || $level==1)check permission manager
                                                    <button type="button" id="{{$row->id}}" onclick="go_to('/hrm_performance_follow_up_manager/action?edit={{$row->id}}')" class="dropdown-item hrm_item hrm_update_manager_follow_up">Update</button>
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
    <div id="modal_view_manager_follow_up"></div>
    <!-- /page content -->
    <script type='text/javascript'>
      $(document).ready(
          function(){
             // getTable('productlist','id');
              $('#tbl_manager_follow_up').DataTable();
          }
      );
    </script>
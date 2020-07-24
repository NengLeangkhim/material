


<section class="content">

    <div id="prmote_modal_id">
    </div>
    <div style="padding:10px 10px 10px 10px">
        <div class="row">
            
            <div class="col-md-12">
    
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title hrm-title"><strong><i class="fas fa-user-edit"></i> View Promote History</strong></h1>
                        {{-- <div class="col-md-12 text-right">
                            <a href="javascript:;" class="btn bg-turbo-color" onclick="HRM_AddEditEmployee()"><i class="fas fa-user-plus"></i> Add Employee</a>
                        </div> --}}
                    </div>
    
                    <div class="card-body">
                        <div class="table-responsive"> 
                        <table id="example" class="table table-bordered" id="tbl_employee">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Staff ID</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Current Salary</th>
                                    <th scope="col">Approved Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @php
                                    
                                    $i = 0;
                                    // $val = "hello";
                                    
                                    if(is_array($allstaffpromote))
                                    {
                                        foreach($allstaffpromote as $key=>$val)
                                        {   
                                            echo '
                                                <tr>
                                                    <th scope="row">'.($i+1).'</th>
                                                    <td>'.$val->name.'</td>
                                                    <td>'.$val->staff_id.'</td>
                                                    <td>'.$val->position.'</td>
                                                    <td>'.$val->salary.'</td>
                                                    <td>'.$val->create_date.'</td>
                                                    <td>
                                                        <div style="text-align: center;">
                                                            <a class="btn-plus" href="javascript:void(0);" onclick="list_staff_promote_hisotry('.$val->staff_id.','.$i.')">
                                                                <span ><i class="fa fa-plus" style="font-size:20px; color: white;"></i></span>
                                                            </a>
                                                      
                                                            <a class="btn-minus" href="javascript:void(0);" onclick="exit_list_history('.$i.')">
                                                                <span ><i class="fa fa-minus" style="font-size:20px; color: white;"></i></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr >
                                                    <td colspan="7" style="background-color: #F5F5F5">
                                                        <div id="list_promote_view_'.$i.'"> </div>
                                                    </td>
                                                </tr>
                                            ';
                                         $i++;
                                        }
                                    } 
                    
                                @endphp
    
    
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
            
    {{-- <a class="btn btn-outline-primary" href="#" onclick="staff_view_promote_detail('.$val->staff_id.')"><i class="fas fa-user-edit"></i>Detail</a> --}}

    
  



    
    <script>
        $(document).ready(function() {
            var table=$('#tbl_employee').DataTable();
        } );
    </script>
        
    
</section>
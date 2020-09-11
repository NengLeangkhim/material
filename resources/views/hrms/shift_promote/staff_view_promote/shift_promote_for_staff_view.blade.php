
<section class="content">

    <div id="prmote_modal_id">
    </div>
    <div style="padding:10px 10px 10px 10px">
        <div class="row">
            
            <div class="col-md-12">
    
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title hrm-title"><strong><i class="fas fa-user-edit"></i> Your Promote</strong></h1>
                        {{-- <div class="col-md-12 text-right">
                            <a href="javascript:;" class="btn bg-turbo-color" onclick="HRM_AddEditEmployee()"><i class="fas fa-user-plus"></i> Add Employee</a>
                        </div> --}}
                    </div>
    
                    <div class="card-body">
                        <div class="table-responsive"> 
                        <table class="table table-bordered" id="tbl_employee">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Salary</th>
                                <th scope="col">Approved Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
    
                                
                                
                                @php
                                  
                                    $i = 0;
 
                                    if(is_array($shift_promoteByID))
                                    {
                                        foreach($shift_promoteByID as $key=>$val)
                                        {   
                                            echo '
                                                <tr>
                                                    <th scope="row">'.($i+1).'</th>
                                                    <td>'.$val->first_name_en.' '.$val->last_name_en.'</td>
                                                    <td>'.$val->position.'</td>
                                                    <td>'.$val->salary.'</td>
                                                    <td>'.$val->create_date.'</td>
                                                    <td >
                                                        <a class="btn btn-outline-primary" href="#" onclick="staff_view_promote_detail('.$val->id.')"><i class="fas fa-user-edit"></i>Detail</a>
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
            
    
    
    <script>
        $(document).ready(function() {
            var table=$('#tbl_employee').DataTable();
        } );
    </script>
        
    
    </section>
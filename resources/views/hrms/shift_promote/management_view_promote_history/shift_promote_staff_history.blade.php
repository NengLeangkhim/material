


<section class="content">

    <div id="prmote_modal_id">
    </div>
    <div style="padding:10px 10px 10px 10px">
        <div class="row">
            
            <div class="col-md-12">
    
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title hrm-title"><strong><i class="fas fa-user-edit"></i> View Promote History</strong></h1>

                    </div>
    
                    <div class="card-body">
                        <div class="table-responsive"> 
                        <table id="tbl_employee" class="table table-bordered" >
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
                                    
                                    if(is_array($allstaffpromote))
                                    {
                                        foreach($allstaffpromote as $key=>$val)
                                        {   
                                            echo '
                                                <tr>
                                                    <th scope="row">'.($i+1).'</th>
                                                    <td>'.$val->first_name_en.' '.$val->last_name_en.'</td>
                                                    <td>'.$val->ma_user_id.'</td>
                                                    <td>'.$val->position.'</td>
                                                    <td>'.$val->salary.'</td>
                                                    <td>'.$val->create_date.'</td>
                                                    <td>
                                                        <div style="text-align: center;">
                                                            <a  href="javascript:void(0);" onclick="list_staff_promote_hisotry('.$val->ma_user_id.','.$i.')">
                                                                <span ><img src="/img/icons/plus_icon1.png" style="width: 22px; hight: 22px;"></span>
                                                            </a>
                                                      
                                                            <a  href="javascript:void(0);" onclick="exit_list_history('.$i.')">
                                                                <span ><img src="/img/icons/subtract_icon1.png" style="width: 25px; hight: 25px;"></span>
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
            


    
    <script>
        // $(document).ready(function() {
        //     var table=$('#tbl_employee').DataTable();
        // } );
    </script>
        
    
</section>
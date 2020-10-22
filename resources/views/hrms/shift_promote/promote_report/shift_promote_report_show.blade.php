 
 

            <div class="table-responsive">
                <table  id="tbl_showreport" style="width:100%; white-space: nowrap;" class="table table-bordered table-hover " >
                    <thead>
                        <tr>
                            <th >#</th>
                            <th >Name</th>
                            <th >Old Position</th>
                            <th >New Position</th>
                            <th >Old Salary</th>
                            <th >New Salary</th>
                            <th >Approved Date</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $val = $promote_report;
                            if(count($val) > 0){
                                for($i=0; $i<count($val); $i++){
                                    $date = date_create($val[$i]->create_date);
                                    $approve_date = date_format($date,"Y/M/d H:i:s A");
                                        echo'<tr style="text-align: center;">
                                                    <td >'.($i+1).'</td>
                                                    <td> '. $val[$i]->first_name_en.' '.$val[$i]->last_name_en.'</td>
                                                    <td> Old pos</td>
                                                    <td> '. $val[$i]->position.'</td>
                                                    <td> Old salary</td>  
                                                    <td> '. $val[$i]->salary.'</td>           
                                                    <td> '. $approve_date.'</td>
                                                    <td> 
                                                        <a class="btn-sm btn btn-outline-primary" href="javascript:void(0);"   onclick="staff_promote_report_detail('.$val[$i]->ma_user_id.', \''.$val[$i]->create_date.'\');">Detail</a>
                                                    </td>
                                                    
                                            </tr> ';
                                }
                            }
                            // else 
                            //     { 
                            //         echo '
                            //             <tr> 
                            //                 <td colspan="6"><h6 style="text-align: center;">No data available in table!</h6></td>
                            //             </tr>
                            //         ';
                            //     }
                        ?>
                    </tbody>
                </table>
            </div>

            {{-- <script type="text/javascript">

                $(document).ready(function(){
                    
                    $('#tbl_showreport').DataTable({
                        "responsive": true                        
                    });   
                });

            </script> --}}

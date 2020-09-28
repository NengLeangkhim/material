 
 
 

            <div class="table-responsive">
                <table class="table" id="tbl_employee">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Get Position</th>
                        <th scope="col">Get Salary</th>
                        <th scope="col">Approved Date</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $val = $promote_report;
                            if(count($val) > 0){
                                for($i=0;$i<count($val);$i++){
                                    // $x = '111Tdkfmaskdf';
                                        echo '<tr style="text-align: center;">
                                        <th scope="row">'.($i+1).'</th>
                                        <td> '. $val[$i]->first_name_en.' '.$val[$i]->last_name_en.'</td>
                                        <td> '. $val[$i]->position.'</td>
                                        <td> '. $val[$i]->salary.'</td>           
                                        <td> '. $val[$i]->create_date.'</td>
                                        <td> 
                                            <a class="btn btn-outline-primary" href="javascript:void(0);"   onclick="staff_promote_report_detail('.$val[$i]->ma_user_id.', \''.$val[$i]->create_date.'\');">Detail</a>
                                        </td>
                                        
                                         </tr> ';
                        
                                }
                            }
                            else 
                                { 
                                    echo '
                                        <tr> 
                                            <td colspan="6"><h6 style="text-align: center;">No data available in table!</h6></td>
                                        </tr>
                                    ';
                                }
                        ?>
                    </tbody>
                </table>
            </div>

            <script>
                $(document).ready(function() {
                    var table=$('#tbl_employee').DataTable();
                } );
            </script>
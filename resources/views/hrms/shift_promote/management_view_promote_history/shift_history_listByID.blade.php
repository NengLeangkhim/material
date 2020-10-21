


    <div class="table-reponsive">
        <table class="table table-bordered table-hover row_tb_style" style="background-color:white; width: 95%;">
            <thead>
                <tr style="color: blue;">
                    <th scope="">#</th>
                    <th scope="">Name</th>
                    <th scope="">Position</th>
                    <th scope="">Salary</th>
                    <th scope="">Approved Date</th>
                    <th scope="">Action</th>
                </tr>
            </thead>
            <tbody class="row_tb_style">
                <?php 
                
                    if($allshiftByID > 0){
                        $i = 0;
                        foreach ($allshiftByID as $key => $val) {

                            if(($i+1) == count($allshiftByID)){
                                exit;
                            }
                            
                            $date = date_create($val->create_date);
                            $approve_date = date_format($date,"Y/M/d H:i:s A");
                                echo '<tr class="row_tb_style">
                                <td scope="row">'.($i+1).'</td>
                                <td class="row_tb_style">'.$val->first_name_en.' '.$val->last_name_en.'</td>
                                <td class="row_tb_style">'.$val->position.'</td>
                                <td class="row_tb_style">'.$val->salary.'</td>
                                <td class="row_tb_style">'.$approve_date.'</td>
                                <td>
                                    <a class="btn-sm btn btn-primary font-weight-bold" href="javascript:void(0);" onclick="staff_promote_history_detail('.$val->ma_user_id.', '.$i.');">Detail</a>
                                </td>
                            </tr>';
                            $i++;
                        }
                    
                    }else {
                        echo '
                            <tr><td colspan="5" style="text-align: center;">Data no available in table</td></tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
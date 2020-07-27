

    <div class="table-reponsive">
        <table class="row_tb_style" style="background-color:white; width: 85%;">
            <thead>
                <tr style="color: blue;">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Approved Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="row_tb_style">
                <?php 
                
                    if($allshiftByID > 0){
                        $i = 0;
                        foreach ($allshiftByID as $key => $val) {
                                echo '<tr class="row_tb_style">
                                <th scope="row">'.($i+1).'</th>
                                <td class="row_tb_style">'.$val->name.'</td>
                                <td class="row_tb_style">'.$val->position.'</td>
                                <td class="row_tb_style">'.$val->salary.'</td>
                                <td class="row_tb_style">'.$val->create_date.'</td>
                                <td>
                                    <a class="btn" style="color: blue;"href="javascript:void(0);" onclick="staff_promote_history_detail('.$val->staff_id.', '.$i.');">Detail</a>
                                </td>
                            </tr>';
                            $i++;
                        }
                    
                    }else {
                        echo '
                            <tr><td colspan="5" style="text-align: center;">Data not avilable in table</td></tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
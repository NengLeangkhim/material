
{{-- quiz_result --}}

    <div style="padding: 20px 10px 10px 10px; ">
        <div class="table-responsive" >
           
                <div class="">
                    <table style="width: auto;">
                    <?php
                        $i = 1;  
                        $j = 1;  
                        $arr[] = '';  
                        $get_q_writing = '';                  
                        foreach ($true_question as $key1=> $val2) {
                                
                                if($quiz_result[$key1]->q_type_id == 1){
                                    if($quiz_result[$key1]->is_right === false){
                                        // var_dump($quiz_result[$key1]);
                                        foreach ($val2 as $key2 => $val3) {
                                            if($quiz_result[$key1]->q_id == $val3->question_id){
                                                $arr[$val3->question_id] = $val3->choice_name;
                                            }
                                            
                                        }
                                        
                                    }
                                }
                                
                        }
                        // var_dump($arr);
                        // echo '<br><br>';

                        foreach ($quiz_result as $key => $val1) {
                            if($i == 1){
                                    echo '
                                        <tr>​
                                            <th class="title_q_part" colspan=3>I.​​​ ផ្នែកសំនួរជ្រើសរើស </th>
                                        </tr>
                                    ';
                            }
                            if($val1->q_type_id == 1){
                                
                                if($quiz_result[$key]->is_right == false){
                                    // echo $val1->q_id;
                                    // echo '<br><br>';
                                    echo '<tr>
                                                <th  class="kh-font-batt​​" colspan=3><label class="kh_word_question">សំនួរ.</label>'.$i.': <span>'.$val1->question.'</span></th>
                                        </tr>';

                                    echo '<tr class=" kh-font-batt">
                                                <td class="kh_word_answer">ចម្លើយ</td>
                                                <td class="td-view_quiz_style" style="width: 55%;">'.$val1->choice_name.'<span style="padding-left: 10px;"><i class="fa fa-close" style="font-size:24px; color:red"></i> មិនត្រឹមត្រូវ</span> </td>
                                                <td class="td-view_quiz_style" style="width: 50%">'.$arr[$val1->q_id].'<span style="padding-left: 10px;"><i class="fa fa-check-square-o" style="font-size:24px; color:blue;"></i> ត្រឹមត្រូវ</span> </td>
                                        </tr>';
                                }
                                if($val1->is_right == true){
                                    echo '<tr>
                                                <th   class="kh-font-batt" colspan=3><label class="kh_word_question">សំនួរ.</label>'.$i.': <span>'.$val1->question.'</span></th>
                                        </tr>';

                                    echo '<tr class="kh-font-batt">
                                                <td class="kh_word_answer">ចម្លើយ</td>
                                                <td class="td-view_quiz_style" colspan=3>'.$val1->choice_name.'<span style="padding-left: 10px;"><i class="fa fa-check-square-o" style="font-size:24px; color:blue;"></i> ត្រឹមត្រូវ</span> </td>
                                        </tr>';
                                }

                            }
                            if($i == (count($quiz_result)-10)){
                                    echo '
                                        <tr>
                                            <th class="title_q_part" colspan=3> II.​​​ផ្នែកសំនួរសរសេរ </th>
                                        </tr>
                                    ';
                            }
                            if($val1->q_type_id == 2){
                                    
                                    echo '<tr>
                                                <th  class="kh-font-batt" colspan=3 ><label class="kh_word_question">សំនួរ.</label>'.$i.': <span>'.$val1->question.'</span></th>
                                        </tr>';
                                    if(empty($val1->user_answer)){
                                        $get_q_writing = 'អ្នកមិនបានបំពេញចម្លើយ';
                                    }else{
                                        $get_q_writing = $val1->user_answer ;
                                    }
                                    echo '<tr class="kh-font-batt">
                                                <td class="kh_word_answer">ចម្លើយ</td>
                                                <td class="td-view_quiz_style" colspan=3>'.$get_q_writing.' </td>
                                        </tr>';
                            }
                            $i++;
                        }
                    ?>
                    </table>
                </div>
        </div>

    </div>
    
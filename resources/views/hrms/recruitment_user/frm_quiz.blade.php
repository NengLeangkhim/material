
@php

    if(!empty($user_question)){
        $question_option = $user_question['question_option'];
        $question_option_choice = $user_question['question_option_choice'];
        $question_writing = $user_question['question_writing'];
    }



    if (session_status() == PHP_SESSION_NONE) {
            session_start();
    }
    date_default_timezone_set("Asia/Phnom_Penh");
    $_SESSION['start_time'] = date("Y-m-d h:i:s ");


@endphp




<section class="content">
    <div id="prmote_modal_id">
    </div>
    <div style="padding:10px 10px 10px 10px">
        <div class="row">

            <div class="col-md-12">

                <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4">
                                    <h1 class="card-title hrm-title"><strong>Testing Form</strong></h1>
                                </div>
                                <div class="col-md-4">
                                    <div style="padding: 0px 10px 0px 40%;">
                                        <label>Expire: </label>
                                        <div id="countdown" class="countdown h6 font-size" style="color:blue;">
                                            {{-- <h6 id="showTimer0">hello world</h6> --}}
                                        </div>
                                    </div>
                                    <marquee behavior="scroll" direction="left" scrollamount='3'  style='color: orange;'>Answer will be auto submit when time expired​ !</marquee>

                                </div>
                                <div class="col-md-4">
                                    <div style="padding: 0px 10px 0px 40%;">
                                        <label> Started: </label><h6 id="starttime_quiz" class="font-size" style=""></h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">

                            <form  name="myFormQuestion" id="myFormQuestion"  action="/hrm_recruitment_user_submit_answer" method="POST">
                                @csrf

                                <div class="table-responsive">

                                    {{-- <table class="table table-bordered" id="tbl_employee"> --}}
                                    <table class="table " id="tbl_employee">

                                        <thead>

                                                @php
                                                        echo '
                                                            <tr id="title_q_option">
                                                                <th colspan="4">
                                                                    <h3><b>I. Question Option</b></h3>
                                                                </th>
                                                            </tr>
                                                            <tr id="sub_title_q_option" ><td colspan="4">   <h5 class="kh-font-batt" >*សូមជ្រើសរើសយកចម្លើយដែលត្រឹមត្រូវនៃសំនួរខាងក្រោម៖</h5></td></tr>

                                                        ';

                                                @endphp

                                        </thead>
                                        <tbody>


                                                @php
                                                            // loop for echo question option
                                                            $x = 1;
                                                            $j = 0;
                                                            for ($i=0; $i < count($question_option) ; $i++){
                                                                        echo '
                                                                                <tr id="q_option_id'.$x.'" >
                                                                                    <th class="main_question kh-font-batt" colspan="4">
                                                                                        '.($i+1).'. '.$question_option[$i]->question.'
                                                                                    </th>
                                                                                </tr>
                                                                                <tr id="q_option_id'.($x+1).'" >
                                                                            ';

                                                                            $x +=2;
                                                                            // echo question option answer choice

                                                                            foreach ($question_option_choice[$i] as $key => $value)
                                                                            {
                                                                                // echo '
                                                                                //     <td>
                                                                                //         <label style="font-weight: 500;"  class="label-radio"><span class="radio"></span>
                                                                                //             <input type="radio" class="" id="radio-id-'.$i.'" name="id_question['.$question_option[$i]->id.']"  value="'.$value->id.'">
                                                                                //             <span class="kh-font-batt">'.$value->choice.'</span>
                                                                                //         </label>
                                                                                //     </td>
                                                                                // ';


                                                                                // Radio button old style
                                                                                // echo '
                                                                                //     <td>
                                                                                //         <div class="input-group" >
                                                                                //             <div class="text-group-field label-radio">
                                                                                //                 <div class="inner-block">
                                                                                //                 <input type="radio" id="radio-id-'.$j.'" class="radio-custom input-group-field" name="id_question['.$question_option[$i]->id.']"  value="'.$value->id.'">
                                                                                //                 <label style="font-weight: inherit;" class="label-radio kh-font-batt" for="radio-id-'.$j.'" >'.$value->choice.'</label>
                                                                                //                 </div>
                                                                                //             </div>
                                                                                //         </div>
                                                                                //     </td>
                                                                                // ';




                                                                                // Radio button design new style
                                                                                echo '
                                                                                    <td>
                                                                                        <div class="input-group" >
                                                                                            <div class="text-group-field label-radio">
                                                                                                <div class="inner-block" >
                                                                                                    <label style="font-weight: inherit;" class="container-radio label-radio kh-font-batt" for="radio-id-'.$j.'">'.$value->choice.'
                                                                                                            <input type="radio" id="radio-id-'.$j.'"  class="radio-custom input-group-field" name="id_question['.$question_option[$i]->id.']"  value="'.$value->id.'">
                                                                                                            <span class="checkmark"></span>
                                                                                                    </label>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                ';

                                                                                // echo '
                                                                                //     <tb>
                                                                                //     <label class="container-radio">One
                                                                                //         <input type="radio" checked="checked" name="radio">
                                                                                //         <span class="checkmark"></span>
                                                                                //     </label>

                                                                                //     <label class="container-radio">Two
                                                                                //         <input type="radio" name="radio">
                                                                                //         <span class="checkmark"></span>
                                                                                //     </label>
                                                                                //     </tb>
                                                                                // ';
                                                                                $j++;

                                                                            }
                                                                        echo    '</tr>

                                                                            ';

                                                            }



                                                            // loop for echo question writing
                                                            echo '

                                                                            <tr id="title_q_writing">
                                                                                <th colspan="4">
                                                                                    <h3 style="text-align:center;"><b>II. Question Writing</b></h3>
                                                                                </th>

                                                                            </tr>
                                                                            <tr id="sub_title_q_writing" ><td colspan="4">   <h5 class="kh-font-batt" >*សូមបំពេញចម្លើយនូវសំនួរខាងក្រោម៖</h5></td></tr>


                                                                ';


                                                            $xx = 1;
                                                            for ($i=0; $i < count($question_writing) ; $i++){
                                                                    echo '
                                                                            <tr id="q_writing_id'.$xx.'">
                                                                                <th class="main_question kh-font-batt" colspan="4">
                                                                                    '.($i+1).'. '.$question_writing[$i]->question.'
                                                                                </th>
                                                                            </tr>
                                                                            <tr id="q_writing_id'.($xx+1).'">
                                                                                <td colspan="4">
                                                                                    <textarea name="txtarea-name['.$question_writing[$i]->id.']" rows="5" class="form-control kh-font-batt"​​    placeholder ="Answer here..." ></textarea>
                                                                                </td>
                                                                            </tr>

                                                                        ';
                                                                    $xx += 2;

                                                            }


                                                @endphp

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4" style="padding-left: 5%;">

                                        <div class="form-inline">
                                            <div  style="padding: 5px;">
                                                {{-- <a class="btn-next" id="btn_back_ques" href="#" onclick='BackQuestion()'>
                                                    <span class="span"><i class="fa fa-angle-double-left" style="font-size:24px; color:blue; margin-right: 5px;"></i></span><label>Back</label>
                                                </a> --}}
                                                <a href="#">
                                                    <button  type="button" class="btn btn-success" id="btn_back_ques" onclick='BackQuestion()'  style="padding: 1px; width: 80px;"><span class="span"><i class="fa fa-angle-double-left" style=" font-size:20px; margin-right: 5px;"></i> Back</button>
                                                </a>


                                            </div>
                                            <div  style="padding: 5px;">
                                                {{-- <a class="btn-next" id="btn_next_ques" href='#' onclick='NextQuestion()'><label>Next</label>
                                                    <span ><i class="fa fa-angle-double-right" style="font-size:24px;color:blue; margin-left: 5px;"></i></span>
                                                </a> --}}

                                                <a href="#">
                                                    <button  type="button" class="btn btn-success" id="btn_next_ques" href="#" onclick='NextQuestion()'  style="padding: 1px; width: 80px;">Next
                                                        <span ><i class="fa fa-angle-double-right" style="font-size:20px; margin-left: 5px;"></i></span></button>
                                                </a>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-4" style="padding-left: 10%;">

                                        <button type="submit" id="submitbutton" class="btn btn-info btn-lg" name="btnSubmitAnswer" style="padding: 1px; width: 120px;">
                                            <span class="glyphicon glyphicon-send"></span> Submit
                                        </button>

                                    </div>
                                </div>
                            </form>

                        </div>
                </div>

            </div>
        </div>
    </div>



    <script type="text/javascript">



        for(var x=1; x<=40; x++){
            if( x > 20){
                var id_q_option = "#q_option_id" + x;
                $(id_q_option).hide();
            }else{
                var id_q_writing = "#q_writing_id" + x;
                $(id_q_writing).hide();
            }
        }
        $('#sub_title_q_writing').hide();
        $('#title_q_writing').hide();
        $('#submitbutton').hide();
        document.getElementById("btn_back_ques").disabled = true;

    </script>


</section>

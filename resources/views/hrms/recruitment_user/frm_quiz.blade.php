
@php
    $question_option = $user_question['question_option'];


    // echo count($question_option);
    
    
    $question_option_choice = $user_question['question_option_choice'];

    // print_r($question_option_choice['3']);
    foreach ($question_option_choice['1'] as $key => $value) {
        // var_dump($value);
        // print_r($value->{'choice'});
        
        // echo $value->choice."<br>";
        // echo count($value->choice);

    }
@endphp



<section class="content">

    <div id="prmote_modal_id">
    </div>
    <div style="padding:10px 10px 10px 10px">
        <div class="row">
            
            <div class="col-md-12">

                <div class="card">
                        <div class="card-header">
                            <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i> User Do Quiz</strong></h1>
                        </div>

                        <div class="card-body">
                                <div class="table-responsive"> 

                                    <table class="table table-bordered" id="tbl_employee">
                                        <thead>

                                            @php
                                                    echo '
                                                        <tr>
                                                            <th colspan="4">
                                                                <h3><b>I. Question Part</b></h3>
                                                            </th>
                                                        </tr>
                                                        <tr><td colspan="4">   <h5 class="kh-font-batt" >*សូមជ្រើសរើសយកចម្លើយដែលត្រឹមត្រូវនៃសំនួរខាងក្រោម៖</h5></td></tr>

                                                    ';
                                                        
                                            @endphp


                                        </thead>
                                        <tbody>


                                            @php
                                                        
                                                        for ($i=0; $i < count($question_option) ; $i++){

                                                                echo '
                                                                            <tr>
                                                                                <th class="main_question" colspan="4">
                                                                                    '.$question_option[$i]->question.'
                                                                                </th>                                
                                                                            </tr>

                                                                            </tr>

                                                                    '; 


                                                                    foreach ($question_option_choice[$i] as $key => $value) 
                                                                    {

                                                                        echo '       
                                                                                        <td>
                                                                                            <label style="font-weight: 500;"  class="label-radio"><span class="radio"></span> <input type="radio" class="show-box" id="radio-id-001" name="radio'.$question_option[$i]->id.'" value="Question1"> <span >'.$value->choice.'</span></label>
                                                                                        </td>
                                                                                        
                                                                        ';
                                                                    }
                                                                    echo '</tr>';
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
                                                <a class="btn-next" href='#' onclick='BackQuestion()'>
                                                    <span class="span"><i class="fa fa-angle-double-left" style="font-size:24px; color:blue; margin-right: 5px;"></i></span><label>Back</label> 
                                                </a>
                                            </div>
                                            <div  style="padding: 5px;">
                                                <a class="btn-next"  href='#' onclick='NextQuestion()'><label>Next</label>
                                                    <span ><i class="fa fa-angle-double-right" style="font-size:24px;color:blue; margin-left: 5px;"></i></span>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-4" style="padding-left: 10%;">
                                        <button type="submit" id="submitbutton" class="btn-submit-answer" name="btnSubmitAnswer" style="display: block;"> 
                                            Submit
                                        </button>
                                    </div>
                                </div>
                                
                        </div>
                </div>
    
            </div>
        </div>
    </div>
            
    
    
    {{-- <script>
        $(document).ready(function() {
            var table=$('#tbl_employee').DataTable();
        } );
    </script> --}}
        
    
</section>
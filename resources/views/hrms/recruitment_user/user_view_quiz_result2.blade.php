

<section class="content" style="padding: 20px;">
    <div class="card" style="background-color: white;">
        <div class="card-header">
            <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i>Quiz Result</strong></h1>
        </div>

        <div class="card-body">
            <div class="row" >
                <div class="col-md-4 col-sm-4 col-xs-4">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="" style="text-align: center; padding-right:40px; ">

                        <?php
                            $done_q = 00;
                            $spent_time = 00;
                            // $percent = 00;
                            $q_num = 00;
                            if(isset($ResumsResult)){
                                $done_q = $ResumsResult['done_question'];
                                $spent_time = $ResumsResult['spent_time'];
                                // $percent = $ResumsResult['percent'];
                                $q_num = 30;
                            }
                        ?>
                       
                        <ul style="list-style-type: none;">
                            <li><b>Your Answer Result</b></li>
                            <li>{{$done_q}} of {{$q_num}}</li>
                            {{-- <li><b>Percent Get</b></li>
                            <li>{{ $percent}} %</li> --}}
                            <li><b>Time Spent</b></li>
                            <li>{{ $spent_time}} </li>

                        </ul>
                        
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                </div>

            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    {{-- <button type="button" class="btn btn-success">Success</button> --}}
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <button type="button" class="btn btn-success" style="width: 100%;" onclick="get_quiz_result();">Check you answer</button>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    {{-- <button type="button" class="btn btn-success">Success</button> --}}
                </div>
            </div>  

            <div class="row-12">
                <div class="col-md-12 col-sm-12">
                    <div id="show_result">
                    </div>
                </div>

            </div>




        </div>

    </div>
   
</section>
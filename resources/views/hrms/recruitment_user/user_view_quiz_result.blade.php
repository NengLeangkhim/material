   
@php
    // define call controller in view
    use \App\Http\Controllers\hrms\recruitment_user\recruitment_userController; 
    
@endphp
 

<section class="content">

    <div id="prmote_modal_id">
    </div>
    <div style="padding:10px 10px 10px 10px;  " >
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i>Quiz Result</strong></h1>
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
                                <th scope="col">Question</th>
                                <th scope="col">Question Type</th>
                                <th scope="col">Your Answer</th>
                                <th scope="col">Correct Answer</th>
                                <th scope="col">Take Time</th>
                                <th scope="col">Quiz Date</th>
                            </tr>
                            </thead>
                            <tbody>
    
                                
                                @php

                                    
                                    if(isset($quiz_result)){
                                        
                                        if($quiz_result > 0){
                                            
                                            $i = 1;
                                            foreach ($quiz_result as $key => $val) {
                                                $take_time = recruitment_userController::check_duration($val->start_time, $val->end_time);
                                                if($val->is_right == 1){
                                                    $ans = 'True';
                                                }else{
                                                    $ans = 'False';
                                                }
                                                if($val->q_type_id == 2){
                                                    $ans = '';
                                                }
                                                echo '
                                                    <tr>
                                                        <th scope="row">'.$i.'</th>
                                                        <td>'.$val->question.'</td>
                                                        <td>'.$val->question_type.'</td>
                                                        <td>'.$val->user_answer.'</td>
                                                        <td>'.$ans .'</td>
                                                        <td>'. $take_time.'</td>
                                                        <td >'.$val->start_time.'</td>
                                                     
                                                    </tr>
                                                ';
                                                $i++;
                                            }

                                        }else{

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
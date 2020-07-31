   
   


<section class="content">

    <div id="prmote_modal_id">
    </div>
    <div style="padding:10px 10px 10px 10px">
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
                                    // $i = 0;
                                    // if(is_array($allEmployee))
                                    // {
                                    //     foreach($allEmployee as $key=>$var)
                                    //     {   
                                            $var = "hello1";
                                            echo '
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>'.$var.'</td>
                                                    <td>'.$var.'</td>
                                                    <td>'.$var.'</td>
                                                    <td>'.$var.'</td>
                                                    <td>'.$var.'</td>
                                                    <td >'.$var.'</td>
                                                    <td >'.$var.'</td>
                                                    
                                                </tr>
                                            ';
                                    //         $i++;
                                    //     }
                                    // }
                    
                                    
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
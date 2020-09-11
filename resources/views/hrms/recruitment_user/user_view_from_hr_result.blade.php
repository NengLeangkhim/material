
<section class="content">

    <div id="prmote_modal_id">
    </div>
    <div style="padding:10px 10px 10px 10px">
        <div class="row">
            
            <div class="col-md-12">
    
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i>HR Result</strong></h1>
                        
                    </div>
    
                    <div class="card-body">
                    <div class="table-responsive"> 
                        <table class="table" id="tbl_employee">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th style="color:white; background-color: #0a7ef1;" scope="col">Approve</th>
                                <th style="color:white; background-color: #F4A460" scope="col">Pending</th>
                                <th style="color:white; background-color: #B22222" scope="col">Reject</th>
                                <th scope="col">Comment</th>
                            </tr>
                            </thead>
                            <tbody>

                                @php

                                        if(count($hr_result) > 0){
                                            foreach ($hr_result as $key => $val) {
                                                echo '
                                                    <tr style="text-align: center; font-weight: bold;">
                                                        <th class="td-view_quiz_style" scope="row">'.($key+1).'</th>
                                                        <td class="td-view_quiz_style kh-font-batt">'.$val->name_kh.'</td>
                                                        <td class="td-view_quiz_style">Your status is</td>
                                                        <td class="td-view_quiz_style" style="color: blue;">'.$approve.'</td>
                                                        <td class="td-view_quiz_style" style="color: blue;">'.$pending.'</td>
                                                        <td class="td-view_quiz_style" style="color: blue;">'.$reject.'</td>
                                                        <td class="td-view_quiz_style" >'.$val->comment.'</td>
                                                     
                                                    </tr>
                                                ';
                                            }
                                        }else{
                                            echo '<tr> <td style="text-align:center;" colspan="7"> Data not avilable in table.</td></tr> ';
                                        }
              
                    
                                    
                                @endphp
    
    
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>*Remark:</th>
                            </tr>
                            <tr>
                                <td>1. Approved -> You was passed to this test !</td>
                            </tr>
                            <tr>
                                <td> 2. Pending -> The internal processing !</td>
                            </tr>
                            <tr>
                                <td> 3. Reject -> You can not pass to this test !</td>
                            </tr>
                        </table>
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
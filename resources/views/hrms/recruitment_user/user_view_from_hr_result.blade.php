
<section class="content">

    <div id="prmote_modal_id">
    </div>
    <div style="padding:10px 10px 10px 10px">
        <div class="row">
            
            <div class="col-md-12">
    
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i>HR Respone</strong></h1>
                        
                    </div>
    
                    <div class="card-body">
                    <div class="table-responsive"> 
                        <table class="table table-bordered" id="tbl_employee">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Approve</th>
                                <th scope="col">Pending</th>
                                <th scope="col">Reject</th>
                                <th scope="col">Comment</th>
                            </tr>
                            </thead>
                            <tbody>
    
                                   
                                @php

                                        $val = "hell123";
                                                echo '
                                                    <tr>
                                                        <th scope="row">'.$val.'</th>
                                                        <td>'.$val.'</td>
                                                        <td>'.$val.'</td>
                                                        <td>'.$val.'</td>
                                                        <td>'.$val .'</td>
                                                        <td>'. $val.'</td>
                                                        <td >'.$val.'</td>
                                                     
                                                    </tr>
                                                ';
              
                    
                                    
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
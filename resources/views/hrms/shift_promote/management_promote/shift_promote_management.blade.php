
{{-- @php
    // dump($allEmployee);
    // echo count($allEmployee);
@endphp --}}

{{-- @php
        foreach($allEmployee as $var)
        {
            echo $var->name;
        }
@endphp --}}



    
<section class="content">

    <div id="prmote_modal_id">
    </div>
    <div class="container-fluid">
        
        <div class="row-12" style="padding-bottom: 10px; margin-bottom: 10px; border-bottom: 2px solid gray;">
            <div class="col-6" >
                <h1 class=""><strong>  Management Promter  </strong></h1>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table" id="tbl_employee">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Staff ID</th>
                    <th scope="col">Position</th>
                    <th scope="col">Current Salary</th>
                    <th scope="col">Last Update</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                    
                    
                    @php
                        $i = 0;
                        if(is_array($allEmployee))
                        {
                            foreach($allEmployee as $key=>$var)
                            {   
                                echo '
                                    <tr>
                                        <th scope="row">'.($i+1).'</th>
                                        <td>'.$var->name.'</td>
                                        <td>'.$var->id_number.'</td>
                                        <td>'.$var->position.'</td>
                                        <td>'.$var->base_salary.'</td>
                                        <td>'.$var->create_date.'</td>
                                        <td >
                                            <a class="btn btn-outline-primary" href="#" onclick="Edit_Promote_Staff('.$var->id.', '.$var->position_id.')"><i class="fas fa-user-edit"></i>Promote</a>
                                        </td>
                                    </tr>
                                ';
                                $i++;
                            }
                        }
        
                        
                    @endphp


                </tbody>
            </table>
        </div>
    </div>
    


    <script>
        $(document).ready(function() {
            var table=$('#tbl_employee').DataTable();
        } );
    </script>
    

</section>
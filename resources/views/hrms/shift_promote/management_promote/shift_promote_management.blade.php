
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

    <div id="prmote_modal">
    </div>
    <div class="container-fluid">
        
        <div class="row-12" style="padding-bottom: 10px; margin-bottom: 10px; border-bottom: 2px solid gray;">
            <div class="col-6" >
                <h2 class="title">Management Promter</h2>
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

                                    </tr>
                                ';
                                $i++;
                            }
                        }
                        // for($i=0; $i <count($allEmployee); $i++) { 
                        //     if (is_array($allEmployee[$i])) {
                        //         $allEmployee->name;
                            //     echo '<tr>
                            //     <th scope="row">'.($i+1).'</th>
                            //     <td>'.$allEmployee[$i]->name.'</td>
                            //     <td>'.$allEmployee[$i]->id_number.'</td>
                            //     <td>'.$allEmployee[$i]->position.'</td>           
                            //     <td>'.$allEmployee[$i]->base_salary.'</td>
                            //     <td>'.$allEmployee[$i]->create_date.'</td>
                            //     <td >
                            //         <a class="btn btn-outline-primary" href="#" onclick="Edit_Promote('.$allEmployee[$i]->id.', '.$allEmployee[$i]->position_id.')"><i class="mdi mdi-pencil-box-outline"></i>Promote</a>
                            //     </td>
                            // </tr>';

                        //     }
                        // }
                        
                    @endphp


                </tbody>
            </table>
        </div>
    </div>
    


    {{-- <script>
        $(document).ready(function() {
            var table=$('#tbl_employee').DataTable();
        } );
    </script> --}}
    

</section>
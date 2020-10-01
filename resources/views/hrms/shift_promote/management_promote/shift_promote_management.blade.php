
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
<div style="padding:10px 10px 10px 10px">
    <div class="row">
        
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Management Promoter</strong></h1>
                    {{-- <div class="col-md-12 text-right">
                        <a href="javascript:;" class="btn bg-turbo-color" onclick="HRM_AddEditEmployee()"><i class="fas fa-user-plus"></i> Add Employee</a>
                    </div> --}}
                </div>

                <div class="card-body">
                    @php
                        // print_r($allEmployee);
                    @endphp
                <div class="table-responsive"> 
                    <table class="table table-bordered" id="tbl_employee">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Staff ID</th>
                            <th scope="col">Position</th>
                            <th scope="col">Current Salary</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            
                            
                            @php
                                $i = 0;
                                // if(is_array($allEmployee))
                                // {
                                //     foreach($allEmployee as $key=>$var)
                                //     {   
                                //         echo '
                                //             <tr>
                                //                 <th scope="row">'.($i+1).'</th>
                                //                 <td>'.$var->first_name_en.' '.$var->last_name_en.'</td>
                                //                 <td>'.$var->id_number.'</td>
                                //                 <td>'.$var->ma_position.'</td>
                                //                 <td>'.$var->base_salary.'</td>
                                //                 <td>'.$var->create_date.'</td>
                                //                 <td >
                                //                     <a class="btn btn-outline-primary" href="#" onclick="Edit_Promote_Staff('.$var->id.', '.$var->ma_position_id.')"><i class="fas fa-user-edit"></i>Promote</a>
                                //                 </td>
                                //             </tr>
                                //         ';
                                //         $i++;
                                //     }
                                // }
                
                                
                            @endphp
                            @foreach ($allEmployee as $employee)
                                <tr>
                                <th>{{++$i}}</th>
                                <td>{{$employee->firstName}} {{$employee->lastName}}</td>
                                <td>{{$employee->id_number}}</td>
                                <td>{{$employee->position}}</td>
                                <td>{{$employee->rate_month}}</td>
                                <td >
                                    <a class="btn btn-outline-primary" href="#" onclick="Edit_Promote_Staff({{$employee->id}}, {{$employee->ma_position_id}})"><i class="fas fa-user-edit"></i>Promote</a>
                               </td>
                                </tr>

                            @endforeach


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
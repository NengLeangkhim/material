
                <table class="table table-bordered" id="tbl_payroll" style="width: 100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Employee</th>
                      {{-- <th>Employee ID</th> --}}
                      <th>Role</th>
                      <th>Base Salary</th>
                      <th>Overtime</th>
                      <th>Commission</th>
                      <th>Bonus</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=0;
                      @endphp
                    @foreach ($data[0] as $empayroll)
                        <tr>
                        <th>{{++$i}}</th>
                        <td>{{$empayroll[1]}}</td>
                        <td>{{$empayroll[2]}}</td>
                        <td>{{$empayroll[3]}}</td>
                        <td>{{$empayroll[4]}}</td>
                        <td>{{$empayroll[5]}}</td>
                        <td>{{$empayroll[6]}}</td>
                        <td class="text-center">
                          
                          @php
                              if($empayroll[10]==1){
                                $bg="bg-danger disabled";
                                $disable="disabled";
                              }else {
                                $bg="bg-info";
                                $disable="";
                                echo '';
                              }
                          @endphp
                          <button id="btn_{{$empayroll[0]}}" {{$disable}} style="margin-right:15px;border:none;background-color:none;color:#007bff;" href="javascrip:;" class="btn" onclick="DeleteComponent({{$empayroll[0]}},'{{$empayroll[7]}}','{{$empayroll[8]}}',{{$empayroll[9]}},'HRM_09040401')"><i class="far fa-trash-alt" ></i></button>
                          <a style="margin-right:15px" href="javascript:;" onclick="hrms_Payroll_List_Detail('hrm_paroll_list_detail','modal_payrolldetail',{{$empayroll[0]}},'{{$empayroll[7]}}','{{$empayroll[8]}}',{{$empayroll[9]}},{{$empayroll[10]}})"><i class="fas fa-info"></i></a>
                          <button id="btn_approve_{{$empayroll[0]}}" {{$disable}} class="btn {{$bg}} btn-sm" onclick="HR_Approve_Payroll({{$empayroll[0]}},'{{$empayroll[7]}}','{{$empayroll[8]}}',{{$empayroll[9]}},'btn_approve_{{$empayroll[0]}}','btn_{{$empayroll[0]}}','HRM_09040403')">Approved</button>
                        </td>
                    </tr>
                    @endforeach
                      
                    
                    
                  </tbody>
                </table>
              

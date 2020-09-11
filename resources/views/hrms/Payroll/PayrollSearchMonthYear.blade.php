
                <table class="table table-bordered" id="tbl_payroll" style="width: 100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Employee</th>
                      <th>Employee ID</th>
                      <th>Role</th>
                      <th>Salary</th>
                      <th>Tax</th>
                      <th>Net Salary</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($data[0] as $em)
                      @php
                          if($em->approve==1){
                            $btn="btn-danger";
                            $disable="disabled";
                          }else {
                            $btn="bg-info";
                            $disable="";
                          }
                      @endphp
                        <tr>
                        <td>{{++$i}}</td>
                        <td>{{$em->name}}</td>
                        <td>{{$em->id_number}}</td>
                        <td>{{$em->position}}</td>
                          <td class="text-center">{{$em->bonus_value}}</td>
                          <td class="text-center">{{$em->tax}}</td>
                          <td class="text-center">{{$em->bonus_value-$em->tax}}</td>
                          <td class="text-center text-primary">
                            <button class="btn bg-info btn-sm" onclick="HRM_ShowDetail('hrm_payroll_detail','modal_payrolldetails')">Detail</button>
                            <button {{$disable}} class="btn {{$btn}} btn-sm" onclick="HRM_Finance_Approve_Payroll(this,{{$em->id}})">Approve</button>
                          </td>
                      </tr>
                    @endforeach
                      
                  </tbody>
                </table>
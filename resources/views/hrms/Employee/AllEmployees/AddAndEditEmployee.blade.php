
<div class="modal fade show" id="modal_employee" style="display: block; padding-right: 17px;" aria-modal="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Add Employee</strong></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          
          <div class="card-body" style="display: block;">
            <form id="fm-employee" method="POST" onsubmit="return false">
              @csrf
            <div class="row">
              @php
                  if(isset($data[1])){
                    $date=new DateTime($data[1][0]->join_date);
                    $join_date=$date->format('Y-m-d');
                  }else {
                    $join_date="";
                  }
              @endphp
              <input type="text" class="d-none" value="@php echo $_GET['id']; @endphp" name="id">
              <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-6">
                      <label>First Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="emName" value="@php if(isset($data[1])){ echo $data[1][0]->name; } @endphp"  required>
                    </div>
                    <div class="col-md-6">
                      <label>Last Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="emName" value="@php if(isset($data[1])){ echo $data[1][0]->name; } @endphp"  required>  
                    </div>
                    <div class="col-md-6">
                      <label>នាមត្រកូល <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="emName" value="@php if(isset($data[1])){ echo $data[1][0]->name; } @endphp"  required>
                    </div>
                    <div class="col-md-6">
                      <label>នាមខ្លួន <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="emName" value="@php if(isset($data[1])){ echo $data[1][0]->name; } @endphp"  required>  
                    </div>
                    <div class="col-md-6">
                      <label>ID Number <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="emIdNumber" value="@php if(isset($data[1])){ echo $data[1][0]->id_number; } @endphp" required>
                    </div>
                    <div class="col-md-6">  
                      <label>Sex <span class="text-danger">*</span></label>
                      <select id="" class="form-control" name="emGender" required>
                        @php
                          if(isset($data[1])){
                            if($data[1][0]->sex=='male'){
                              echo ' <option value="male">Male</option>
                                      <option value="female">Female</option>';
                            }else {
                              echo ' <option value="female">Female</option>
                                      <option value="male">Male</option>';
                            }
                          }else {
                            echo ' <option value="male">Male</option>
                                      <option value="female">Female</option>';
                          }
                        @endphp
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label>Date of Birth <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="emJoinDate" value="@php echo $join_date; @endphp" required>
                    </div>
                    <div class="col-md-6">
                      <label>Joint Date <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="emJoinDate" value="@php echo $join_date; @endphp" required>
                    </div>
                    <div class="col-md-6">
                      <label>Telephone<span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="emJoinDate" value="@php echo $join_date; @endphp" required>
                    </div>
                    <div class="col-md-6">
                      <label>Position <span class="text-danger">*</span></label>
                      <select name="emPosition" id="" class="form-control" required>
                        @php
                          $f1='';
                          $f2='';
                          if(isset($data[1])){
                            $id=$data[1][0]->ma_position_id;
                          }else {
                              $id=-1;
                          }
                        @endphp
                        @foreach ($data[0] as $p)
                          @php 
                            if($id===$p->id){
                              $f1=$f1.'<option value="'.$p->id.'">'.$p->name.'</option>';
                            }else {
                              $f2=$f2.'<option value="'.$p->id.'">'.$p->name.'</option>';
                            }
                          @endphp
                          
                        @endforeach
                        @php
                            echo $f1.$f2;
                        @endphp
                      </select>
                    </div>
                  </div>
              </div>
              <div class="col-md-4">
                <div id="image-preview" style="margin-top: 30px" class="">
                  <label for="image-upload" id="image-label">Choose Image</label>
                  <input type="file" accept="image/*" onchange="preview_image(event)">
                  <img id="output_image" class="" height="320px" width="100%" src="https://simpleicon.com/wp-content/uploads/user-5.png"/>
                </div>
              </div>
              <div class="col-md-3">
                  <label>Office Phone</label>
                  <input type="tel" class="form-control" name="emOfficePhone" value="@php if(isset($data[1])){ echo $data[1][0]->office_phone; } @endphp" >
              </div>
              <div class="col-md-3">
                  <label>Salary <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" name="emSalary" @php if(!isset($data[0])){ echo 'required'; } @endphp>
                </div>
              <div class="col-md-6">
                  <label>Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" name="emEmail" value="@php if(isset($data[1])){ echo $data[1][0]->email; } @endphp" required>
              </div>
              <div class="col-md-6">
                  <label>Spous <span class="text-danger">*</span></label>
                  <select name="" id="" class="form-control">
                    <option value="f">No</option>
                    <option value="t">Yes</option>
                  </select>
              </div>
              <div class="col-md-6">
                  <label>Children <span class="text-danger">*</span></label>
                  <input type="number" class="form-control">
              </div>
              <div class="col-md-6">
                  <label>City / Province <span class="text-danger">*</span></label>
                   <select class="form-control select2 city"  id="icity" name="city" onchange="getbranch(this,'idistrict','s','/district')" >
                     <option disabled=true selected=true hidden=true></option>
                       @foreach($data[2] as $row )
                          <option value="{{$row->code}}">{{$row->name_latin}}/{{$row->name_kh}}</option> 
                       @endforeach
                  </select>  
              </div>
              <div class="col-md-6">
                <label>Khan/District<span class="text-danger">*</span></label>
                <select class="form-control dynamic" name="district" id="idistrict" onchange="getbranch(this,'icommune','s','/commune')" >
                  <option> </option> 
                </select>
              </div>
              <div class="col-md-6">
                <label>Sengkat/Commune<span class="text-danger">*</span></label>
                <select class="form-control dynamic" name="commune" id="icommune" onchange="getbranch(this,'ivillage','s','/village')" >
                  <option> </option>
                </select> 
              </div>
              <div class="col-md-6">
                <label>Village<span class="text-danger">*</span></label>
                <select class="form-control " name="village" id="ivillage" dats-dependent="village" >
                  <option>select Village</option>                                                        
                </select> 
              </div>
              <div class="col-md-12">
                <label>Description</label>
                <textarea name="emDescription" id="" rows="5" class="form-control">@php if(isset($data1)){echo $data[1][0]->description;} @endphp</textarea>
              </div>

              </div>
              <div class="row text-right">
                <div class="col-md-12 text-right" style="margin-top: 20px">
                  <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  <button class="btn bg-turbo-color" data-dismiss="modal" onclick="submit_form ('hrm_insert_update_employee','fm-employee','hrm_allemployee')">Save</button>
              </div>
            </div>
            </form>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          
        </div>
        </div>
    </div>
</div>

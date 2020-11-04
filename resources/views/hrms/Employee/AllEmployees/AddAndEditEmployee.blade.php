
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
            <form id="fm-employee" onsubmit="return false" enctype="multipart/form-data">
              @csrf
            <div class="row">
              @php
                  if(isset($data[1])){
                    $date=new DateTime($data[1]['joint_date']);
                    $dateBirth=new DateTime($data[1]['dateOfBirth']);
                    $dateofbirth=$dateBirth->format('m-d-Y');
                    $join_date=$date->format('m-d_Y');
                  }else {
                    $join_date="";
                    $dateofbirth="";
                  }
              @endphp
              <input type="hidden" class="d-none" value="@php echo $_GET['id']; @endphp" name="emid">
              <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-6">
                      <label>First Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="emFirstName" name="emFirstName" value="@php if(isset($data[1])){ echo $data[1]['firstName']; } @endphp"  required>
                    </div>
                    <div class="col-md-6">
                      <label>Last Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="emLastName" name="emLastName" value="@php if(isset($data[1])){ echo $data[1]['lastName']; } @endphp"  required>  
                    </div>
                    <div class="col-md-6">
                      <label>នាមត្រកូល <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="emFirstNameKh" name="emFirstNameKh" value="@php if(isset($data[1])){ echo $data[1]['firstNameKh']; } @endphp"  required>
                    </div>
                    <div class="col-md-6">
                      <label>នាមខ្លួន <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="emLastNameKh" name="emLastNameKh" value="@php if(isset($data[1])){ echo $data[1]['lastNameKh']; } @endphp"  required>  
                    </div>
                    <div class="col-md-6">
                      <label>ID Number <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="emIdNumber" name="emIdNumber" value="@php if(isset($data[1])){ echo $data[1]['id_number']; }@endphp" required>
                    </div>
                    <div class="col-md-6">  
                      <label>Sex <span class="text-danger">*</span></label>
                      <select id="emGender" class="form-control" name="emGender">
                        @php
                          if(isset($data[1])){
                            if($data[1]['sex']=='male'){
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
                      <input type="date" class="form-control" id="emDateOfBirth" name="emDateOfBirth" value="@php echo $dateofbirth; @endphp" required>
                    </div>
                    <div class="col-md-6">
                      <label>Join Date <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" id="emJoinDate" name="emJoinDate" value="@php echo $join_date; @endphp" required>
                    </div>
                    <div class="col-md-6">
                      <label>Department <span class="text-danger">*</span></label>
                      
                      <select name="emDepartment" id="emDepartment" class="form-control" required >
                        <option value="" hidden></option>
                        @php
                          foreach ($data[3] as $department) {
                           if(isset($data[1])){
                              if($department->id==$data[1]['department_id']){
                                echo '<option selected value="'.$department->id.'">'.$department->name.'</option>';
                              }else {
                                echo '<option value="'.$department->id.'">'.$department->name.'</option>';
                              }
                           }else {
                             echo '<option value="'.$department->id.'">'.$department->name.'</option>';
                           }
                          }
                           
                        @endphp
                      </select>
                    </div>
                    <div class="col-md-6">
                  <label>Position <span class="text-danger">*</span></label>
                  <select name="emPosition" id="emPosition" class="form-control" required >
                    <option value="" selected hidden></option>
                  @php
                    foreach ($data[0] as $position) {
                      if(isset($data[1])){
                        if($data[1]['position_id']===$position->id){
                          echo '<option selected value="'.$position->id.'">'.$position->name.'</option>';
                        }else {
                          echo '<option value="'.$position->id.'">'.$position->name.'</option>';
                        }
                      }else {
                        echo '<option value="'.$position->id.'">'.$position->name.'</option>';
                      }
                    }
                    @endphp
                    </select>
                </div>
                    
                    
                  </div>
              </div>
              <div class="col-md-4">
                <input type="hidden" value="@php if(isset($data[1])){ echo $data[1]['image']; } @endphp" name="imgdirectory">
                <div id="image-preview" style="margin-top: 30px" class=""> 
                  <label for="image-upload" id="image-label">Choose Image</label>
                  <input type="file" accept="image/*" onchange="preview_image(event)" name="emProfile">
                  <img id="output_image" name="emProfile" height="320px" width="100%" src="@php if(isset($data[1])){ echo $data[1]['image'];} @endphp"/>
                </div>
              </div>
              <div class="col-md-4">
                      <label>Telephone<span class="text-danger">*</span></label>
                      <input type="tel" class="form-control" id="emTelephone" name="emTelephone" value="@php if(isset($data[1])){echo $data[1]['contact'];} @endphp" required>
                </div>
                <div class="col-md-4">
                  <label>Office Phone</label>
                  <input type="tel" class="form-control" id="emOfficePhone" name="emOfficePhone" value="@php if(isset($data[1])){ echo $data[1]['office_phone']; } @endphp" >
              </div>
              <div class="col-md-4">
                  <label>Salary <span class="text-danger">*</span><span style="margin-left: 100px"><input type="checkbox" onclick="ShowPassword()">show</span></label>
                  <input type="@php if(isset($data[1])){ echo "password"; }else { echo "number"; } @endphp" id="inputsalary" class="form-control" name="inputsalary" @php if(!isset($data[0])){ echo 'required'; } @endphp value="@php if(isset($data[1])){ echo $data[1]['salary']; } @endphp" required>
                </div>
                <div class="col-md-6">
                  <label>Bank Account</label>
                  <input type="text" class="form-control" id="emBankAccount" name="emBankAccount" value="@php if(isset($data[1])){ echo $data[1]['bank_account']; } @endphp">
              </div>
              <div class="col-md-6">
                  <label>Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="emEmail" name="emEmail" value="@php if(isset($data[1])){ echo $data[1]['email']; } @endphp" required>
                  <label class="d-none text-danger" id='email_unique'>email is required or unique</label>
              </div>
              <div class="col-md-6">
                  <label>Spouse <span class="text-danger">*</span></label>
                  <select name="emSpous" id="emSpous" class="form-control">
                    @php
                      if(isset($data[1])){
                        if($data[1]['spouse']>0){
                          echo '<option value="t">Yes</option>
                                <option value="f">No</option>';
                        }else {
                          echo '<option value="f">No</option>
                                <option value="t">Yes</option>';
                        }
                      }else {
                        echo '<option value="f">No</option>
                              <option value="t">Yes</option>';
                      }
                    @endphp
                    
                  </select>
              </div>
              <div class="col-md-6">
                  <label>Children <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="emChildren" name="emChildren" value="@php if(isset($data[1])){echo $data[1]['children'];} @endphp" required>
              </div>
              <div class="col-md-3">
                  <label>Home Number<span class="text-danger"></span></label>
                  <input type="text" class="form-control" name="emhome_en" value="@php if(isset($data[1])){echo $data[1]['home_en'];} @endphp">
              </div>
              <div class="col-md-3">
                  <label>លេខផ្ទះ <span class="text-danger"></span></label>
                  <input type="text" class="form-control" name="emhome_kh" value="@php if(isset($data[1])){echo $data[1]['home_kh'];} @endphp">
              </div>
              <div class="col-md-3">
                  <label>Street <span class="text-danger"></span></label>
                  <input type="text" class="form-control" name="emstreet_en" value="@php if(isset($data[1])){echo $data[1]['street_en'];} @endphp">
              </div>
              <div class="col-md-3">
                  <label>លេខផ្លូវ <span class="text-danger"></span></label>
                  <input type="text" class="form-control" name="emstreet_kh" value="@php if(isset($data[1])){echo $data[1]['street_kh'];} @endphp">
              </div>
              <div class="col-md-6">
                  <label>City / Province <span class="text-danger">*</span></label>
                   <select class="form-control select2 city"  id="icity" name="icity" onchange="getbranch(this,'idistrict','s','/district')" required>
                     <option value="" hidden></option>
                     @php
                         foreach ($data[2] as $province) {
                           if(isset($data[1])){
                              if($province->code==$data[1]['province']){
                                echo '<option selected value="'.$province->code.'">'.$province->name_latin.'/'.$province->name_kh.'</option>';
                              }else {
                                echo '<option value="'.$province->code.'">'.$province->name_latin.'/'.$province->name_kh.'</option>';
                              }
                           }else {
                             echo '<option value="'.$province->code.'">'.$province->name_latin.'/'.$province->name_kh.'</option>';
                           }
                         }
                     @endphp
                  </select>  
              </div>
              <div class="col-md-6">
                <label>Khan/District<span class="text-danger">*</span></label>
                <select class="form-control dynamic" name="idistrict" id="idistrict" onchange="getbranch(this,'icommune','s','/commune')" required >
                  <option value="" hidden></option>
                  @php
                      if(isset($data[1])){
                        foreach ($data[1]['all_district'] as $district) {
                          if($data[1]['district']==$district->id){
                            echo '<option selected value="'.$district->id.'">'.$district->name.'</option>';
                          }else {
                            echo '<option value="'.$district->id.'">'.$district->name.'</option>';
                          }
                        }
                      }
                  @endphp
                </select>
              </div>
              <div class="col-md-6">
                <label>Sengkat/Commune<span class="text-danger">*</span></label>
                <select class="form-control dynamic" name="icommune" id="icommune" onchange="getbranch(this,'ivillage','s','/village')" required>
                  <option value="" hidden></option>
                  @php
                      if(isset($data[1])){
                        foreach ($data[1]['all_commune'] as $commune) {
                          if($commune->id==$data[1]['commune']){
                            echo '<option selected value="'.$commune->id.'">'.$commune->name.'</option>';
                          }else {
                            echo '<option value="'.$commune->id.'">'.$commune->name.'</option>';
                          }
                        }
                      }
                  @endphp
                </select> 
              </div>
              <div class="col-md-6">
                <label>Village<span class="text-danger">*</span></label>
                <select class="form-control " name="ivillage" id="ivillage" dats-dependent="village" required>
                  <option value="" hidden></option>
                  @php
                      if(isset($data[1])){
                        foreach ($data[1]['all_village'] as $village) {
                          if($village->id==$data[1]['village']){
                            echo '<option selected value="'.$village->id.'">'.$village->name.'</option>';
                          }else {
                            echo '<option value="'.$village->id.'">'.$village->name.'</option>';
                          }
                        }
                      }
                  @endphp                                                       
                </select> 
              </div>
              <div class="col-md-12">
                <label>Description</label>
                <textarea name="emDescription" id="" rows="5" class="form-control">@php if(isset($data[1])){echo $data[1]['description'];} @endphp</textarea>
              </div>
              <div class="col-md-12 text-right" style="margin-top: 20px">
                  <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  {{-- <button class="btn bg-turbo-color" onclick="submit_form ('hrm_insert_update_employee','fm-employee','hrm_allemployee','modal_employee')">Save</button> --}}
                  <button class="btn btn-info" onclick="hrms_insert_update_employee()">Save</button>
              </div>

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
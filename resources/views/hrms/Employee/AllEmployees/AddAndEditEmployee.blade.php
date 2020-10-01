
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
                    // print_r($data[1]);
                    $date=new DateTime($data[1]['joint_date']);
                    $dateBirth=new DateTime($data[1]['dateOfBirth']);
                    $dateofbirth=$dateBirth->format('Y-m-d');
                    $join_date=$date->format('Y-m-d');
                  }else {
                    $join_date="";
                    $dateofbirth="";
                  }
              @endphp
              <input type="hidden" class="d-none" value="@php echo $_GET['id']; @endphp" name="id">
              <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-6">
                      <label>First Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="emFirstName" value="@php if(isset($data[1])){ echo $data[1]['firstName']; } @endphp"  required>
                    </div>
                    <div class="col-md-6">
                      <label>Last Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="emLastName" value="@php if(isset($data[1])){ echo $data[1]['lastName']; } @endphp"  required>  
                    </div>
                    <div class="col-md-6">
                      <label>នាមត្រកូល <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="emFirstNameKh" value="@php if(isset($data[1])){ echo $data[1]['firstNameKh']; } @endphp"  required>
                    </div>
                    <div class="col-md-6">
                      <label>នាមខ្លួន <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="emLastNameKh" value="@php if(isset($data[1])){ echo $data[1]['lastNameKh']; } @endphp"  required>  
                    </div>
                    <div class="col-md-6">
                      <label>ID Number <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="emIdNumber" value="@php if(isset($data[1])){ echo $data[1]['id_number']; } @endphp" required>
                    </div>
                    <div class="col-md-6">  
                      <label>Sex <span class="text-danger">*</span></label>
                      <select id="" class="form-control" name="emGender">
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
                      <input type="date" class="form-control" name="emDateOfBirth" value="@php echo $dateofbirth; @endphp" required>
                    </div>
                    <div class="col-md-6">
                      <label>Joint Date <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="emJoinDate" value="@php echo $join_date; @endphp" required>
                    </div>
                    <div class="col-md-6">
                      <label>Department <span class="text-danger">*</span></label>
                      
                      <select name="emDepartment" id="" class="form-control select2" required>
                        @php
                            $f1="";
                            $f2="";
                            foreach ($data[3] as $department) {
                              if(isset($data[1])){
                                if($department->id==$data[1]['department_id']){
                                  $f1=$f1.'<option value="'.$department->id.'">'.$department->name.'</option>';
                                }else {
                                  $f2=$f2.'<option value="'.$department->id.'">'.$department->name.'</option>';
                                }
                              }else {
                                $f1=$f1.'<option value="'.$department->id.'">'.$department->name.'</option>';
                              }
                            }
                            echo $f1.$f2;
                        @endphp
                        @foreach ($data[3] as $department)
                          <option value="{{$department->id}}">{{$department->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-6">
                  <label>Position <span class="text-danger">*</span></label>
                  <select name="emPosition" id="" class="form-control" required>
                  @php
                    $f1='';
                    $f2='';
                    if(isset($data[1])){
                      $id=$data[1]['position_id'];
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
                <input type="hidden" value="@php if(isset($data[1])){ echo $data[1]['image']; } @endphp" name="imgdirectory">
                <div id="image-preview" style="margin-top: 30px" class=""> 
                  <label for="image-upload" id="image-label">Choose Image</label>
                  <input type="file" accept="image/*" onchange="preview_image(event)" name="emProfile" @php if(!isset($data[1])){ echo 'required'; } @endphp>
                  <img id="output_image" name="emProfile" height="320px" width="100%" src="@php if(isset($data[1])){ echo $data[1]['image'];} @endphp"/>
                </div>
              </div>
              <div class="col-md-4">
                      <label>Telephone<span class="text-danger">*</span></label>
                      <input type="tel" class="form-control" name="emTelephone" value="@php if(isset($data[1])){echo $data[1]['contact'];} @endphp" required>
                </div>
                <div class="col-md-4">
                  <label>Office Phone</label>
                  <input type="tel" class="form-control" name="emOfficePhone" value="@php if(isset($data[1])){ echo $data[1]['office_phone']; } @endphp" >
              </div>
              <div class="col-md-4">
                  <label>Salary <span class="text-danger">*</span><span style="margin-left: 100px"><input type="checkbox" onclick="ShowPassword()">show</span></label>
                  <input type="@php if(isset($data[1])){ echo "password"; }else { echo "number"; } @endphp" id="inputsalary" class="form-control" name="emSalary" @php if(!isset($data[0])){ echo 'required'; } @endphp value="@php if(isset($data[1])){ echo $data[1]['salary']; } @endphp">
                </div>
                <div class="col-md-6">
                  <label>Bank Account</label>
                  <input type="text" class="form-control" name="emBankAccount" value="@php if(isset($data[1])){ echo $data[1]['bank_account']; } @endphp">
              </div>
              <div class="col-md-6">
                  <label>Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" name="emEmail" value="@php if(isset($data[1])){ echo $data[1]['email']; } @endphp" >
              </div>
              <div class="col-md-6">
                  <label>Spouse <span class="text-danger">*</span></label>
                  <select name="emSpous" id="" class="form-control">
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
                  <input type="number" class="form-control" name="emChildren" value="@php if(isset($data[1])){echo $data[1]['children'];} @endphp">
              </div>
              <div class="col-md-3">
                  <label>Home Number<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="emhome_en" value="@php if(isset($data[1])){echo $data[1]['home_en'];} @endphp">
              </div>
              <div class="col-md-3">
                  <label>លេខផ្ទះ <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="emhome_kh" value="@php if(isset($data[1])){echo $data[1]['home_kh'];} @endphp">
              </div>
              <div class="col-md-3">
                  <label>Street <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="emstreet_en" value="@php if(isset($data[1])){echo $data[1]['street_en'];} @endphp">
              </div>
              <div class="col-md-3">
                  <label>លេខផ្លូវ <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="emstreet_kh" value="@php if(isset($data[1])){echo $data[1]['street_kh'];} @endphp">
              </div>
              <div class="col-md-6">
                  <label>City / Province <span class="text-danger">*</span></label>
                   <select class="form-control select2 city"  id="icity" name="emCity" onchange="getbranch(this,'idistrict','s','/district')" required>
                     @php
                         $f1="";
                         $f2="";
                         foreach ($data[2] as $province) {
                           if(isset($data[1])){
                              if($province->code==$data[1]['province']){
                                $f1=$f1.'<option value="'.$province->code.'">'.$province->name_latin.'/'.$province->name_kh.'</option>';
                              }else {
                                $f2=$f2.'<option value="'.$province->code.'">'.$province->name_latin.'/'.$province->name_kh.'</option>';
                              }
                           }else {
                             $f1=$f1.'<option value="'.$province->code.'">'.$province->name_latin.'/'.$province->name_kh.'</option>';
                           }
                         }
                         if(!isset($data[1])){
                           echo '<option disabled=true selected=true hidden=true></option>';
                         }
                         echo $f1.$f2;
                     @endphp
                  </select>  
              </div>
              <div class="col-md-6">
                <label>Khan/District<span class="text-danger">*</span></label>
                <select class="form-control dynamic" name="emDistrict" id="idistrict" onchange="getbranch(this,'icommune','s','/commune')" required >
                  @php
                  $f1="";
                  $f2="";
                      if(isset($data[1])){
                        foreach ($data[1]['all_district'] as $district) {
                          if($data[1]['district']==$district->id){
                            $f1='<option value="'.$district->id.'">'.$district->name.'</option>';
                          }else {
                            $f2=$f2.'<option value="'.$district->id.'">'.$district->name.'</option>';
                          }
                        }
                      }
                      echo $f1.$f2;
                  @endphp
                </select>
              </div>
              <div class="col-md-6">
                <label>Sengkat/Commune<span class="text-danger">*</span></label>
                <select class="form-control dynamic" name="emCommune" id="icommune" onchange="getbranch(this,'ivillage','s','/village')" required>
                  @php
                      $f1="";
                      $f2="";
                      if(isset($data[1])){
                        foreach ($data[1]['all_commune'] as $commune) {
                          if($commune->id==$data[1]['commune']){
                            $f1=$f1.'<option value="'.$commune->id.'">'.$commune->name.'</option>';
                          }else {
                            $f2=$f2.'<option value="'.$commune->id.'">'.$commune->name.'</option>';
                          }
                        }
                      }
                      echo $f1.$f2;
                  @endphp
                </select> 
              </div>
              <div class="col-md-6">
                <label>Village<span class="text-danger">*</span></label>
                <select class="form-control " name="emVillage" id="ivillage" dats-dependent="village" required>
                  @php
                      $f1="";
                      $f2="";
                      if(isset($data[1])){
                        foreach ($data[1]['all_village'] as $village) {
                          if($village->id==$data[1]['village']){
                            $f1=$f1.'<option value="'.$village->id.'">'.$village->name.'</option>';
                          }else {
                            $f2=$f2.'<option value="'.$village->id.'">'.$village->name.'</option>';
                          }
                        }
                      }
                      echo $f1.$f2;
                  @endphp                                                       
                </select> 
              </div>
              <div class="col-md-12">
                <label>Description</label>
                <textarea name="emDescription" id="" rows="5" class="form-control">@php if(isset($data[1])){echo $data[1]['description'];} @endphp</textarea>
              </div>
              <div class="col-md-12 text-right" style="margin-top: 20px">
                  <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  <button class="btn bg-turbo-color" onclick="submit_form ('hrm_insert_update_employee','fm-employee','hrm_allemployee','modal_employee')">Save</button>
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

<script>
  $('.select2').select2();
  
  $(document).ready(function{
    $('.select2').select2();
    
  });
</script>


<div class="modal fade show" id="modal_employee" style="display: block; padding-right: 17px;" aria-modal="true" data-backdrop="static">
    <div class="modal-dialog modal-xl">
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
              <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">First Name <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="emFirstName" id="emFirstName" value="@php if(isset($data[1])){ echo $data[1]['firstName']; } @endphp"  required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Last Name <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="emLastName" name="emLastName" value="@php if(isset($data[1])){ echo $data[1]['lastName']; } @endphp"  required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">នាមត្រកូល <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="emFirstNameKh" name="emFirstNameKh" value="@php if(isset($data[1])){ echo $data[1]['firstNameKh']; } @endphp"  required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">នាមខ្លួន <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="emLastNameKh" name="emLastNameKh" value="@php if(isset($data[1])){ echo $data[1]['lastNameKh']; } @endphp"  required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">ID Number <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="emIdNumber" name="emIdNumber" value="@php if(isset($data[1])){ echo $data[1]['id_number']; }@endphp" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Sex <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
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
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Date of Birth <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="emDateOfBirth" name="emDateOfBirth" value="@php if(isset($data[1])){echo date('m/d/Y', strtotime($data[1]['dateOfBirth']));} @endphp" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Join Date <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="emJoinDate" name="emJoinDate" value="@php if(isset($data[1])){echo date('m/d/Y', strtotime($data[1]['joint_date']));} @endphp" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Department <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
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
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Position <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
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
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Telephone <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" id="emTelephone" name="emTelephone" value="@php if(isset($data[1])){echo $data[1]['contact'];} @endphp" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Office Phone</label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" id="emOfficePhone" name="emOfficePhone" value="@php if(isset($data[1])){ echo $data[1]['office_phone']; } @endphp" >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Salary <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="@php if(isset($data[1])){ echo "password"; }else { echo "number"; } @endphp" id="inputsalary" class="form-control" name="inputsalary" @php if(!isset($data[0])){ echo 'required'; } @endphp value="@php if(isset($data[1])){ echo $data[1]['salary']; } @endphp" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Email <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="emEmail" name="emEmail" value="@php if(isset($data[1])){ echo $data[1]['email']; } @endphp" required>
                                <label class="d-none text-danger" id='email_unique'>email is required or unique</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Bank Account</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="emBankAccount" name="emBankAccount" value="@php if(isset($data[1])){ echo $data[1]['bank_account']; } @endphp">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="padding-left: 30px;padding-right: 30px">
                <input type="hidden" value="@php if(isset($data[1])){ echo $data[1]['image']; } @endphp" name="imgdirectory">
                <div id="image-preview" style="margin-top: 0px" class="">
                  <label for="image-upload" id="image-label">Choose Image</label>
                  <input type="file" accept="image/*" onchange="preview_image(event)" name="emProfile">
                  <img id="output_image" name="emProfile" height="320px" width="100%" src="@php if(isset($data[1])){ echo $data[1]['image'];} @endphp"/>
                </div>
            </div>

            
            
            <div><br></div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12 bg-turbo-color" style="padding-top: 5px;padding-left: 5px">
                            <label>Current Address</label>
                        </div>
                        <div><br></div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Home</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="emhome_en" value="@php if(isset($current_address)){echo $current_address['home'];} @endphp">
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Street</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="emstreet_en" value="@php if(isset($current_address)){echo $current_address['street'];} @endphp">
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Group</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="em_group" value="">
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">City/Province <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select class="form-control select2 city"  id="icity" name="icity" onchange="getbranch(this,'idistrict','s','/district')" required>
                                        <option value="" hidden></option>
                                        @php
                                            foreach ($data[2] as $province) {
                                            if(isset($current_address)){
                                                if($province->code==$current_address['province_code']){
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
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Khan/District <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select class="form-control dynamic" name="idistrict" id="idistrict" onchange="getbranch(this,'icommune','s','/commune')" required >
                                        <option value="" hidden></option>
                                        @php
                                            if(isset($current_address)){
                                                foreach ($data[1]['all_district'] as $district) {
                                                if($current_address['district_code']==$district->id){
                                                    echo '<option selected value="'.$district->id.'">'.$district->name.'</option>';
                                                }else {
                                                    echo '<option value="'.$district->id.'">'.$district->name.'</option>';
                                                }
                                                }
                                            }
                                        @endphp
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Sengkat/Commune <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select class="form-control dynamic" name="icommune" id="icommune" onchange="getbranch(this,'ivillage','s','/village')" required>
                                        <option value="" hidden></option>
                                        @php
                                            if(isset($current_address)){
                                                foreach ($data[1]['all_commune'] as $commune) {
                                                if($commune->id==$current_address['commune_code']){
                                                    echo '<option selected value="'.$commune->id.'">'.$commune->name.'</option>';
                                                }else {
                                                    echo '<option value="'.$commune->id.'">'.$commune->name.'</option>';
                                                }
                                                }
                                            }
                                        @endphp
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Village <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select class="form-control " name="ivillage" id="ivillage" dats-dependent="village" required>
                                        <option value="" hidden></option>
                                        @php
                                            if(isset($current_address)){
                                                foreach ($data[1]['all_village'] as $village) {
                                                if($village->id==$current_address['village_code']){
                                                    echo '<option selected value="'.$village->id.'">'.$village->name.'</option>';
                                                }else {
                                                    echo '<option value="'.$village->id.'">'.$village->name.'</option>';
                                                }
                                                }
                                            }
                                        @endphp
                                    </select>
                                </div>
                            </div>
                      </div>
                      <div class="col-md-6">
                        <div class="col-md-12 bg-turbo-color" style="padding-top: 5px;padding-left: 5px">
                            <label>Permanent Address</label>
                        </div>
                        <div><br></div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Home</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="em_permanent_home_en" value="@php if(isset($permanent_address)){echo $permanent_address['home'];} @endphp">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Street</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="em_permanent_street_en" value="@php if(isset($permanent_address)){echo $permanent_address['street'];} @endphp">
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Group</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="em_permanent_group" value="">
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">City/Province <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select name="permanent_province" id="permanent_province" class="form-control" onchange="getbranch(this,'permenent_idistrict','s','/district')" required>
                                    <option value="" hidden></option>
                                    @php
                                          foreach ($data[2] as $province) {
                                          if(isset($permanent_address)){
                                              if($province->code==$permanent_address['province_code']){
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
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Khan/District <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control dynamic" name="permenent_idistrict" id="permenent_idistrict" onchange="getbranch(this,'permenent_commune','s','/commune')" required>
                                    <option value="" hidden></option>
                                    @php
                                        if(isset($permanent_address)){
                                            foreach ($permanent_address['all_district'] as $district) {
                                            if($permanent_address['district_code']==$district->id){
                                                echo '<option selected value="'.$district->id.'">'.$district->name.'</option>';
                                            }else {
                                                echo '<option value="'.$district->id.'">'.$district->name.'</option>';
                                            }
                                            }
                                        }
                                 @endphp
                               </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Sengkat/Commune <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select name="permenent_commune" id="permenent_commune" class="form-control" onchange="getbranch(this,'permenent_village','s','/village')" required>
                                    <option value="" hidden></option>
                                    @php
                                        if(isset($permanent_address)){
                                            foreach ($permanent_address['all_commune'] as $commune) {
                                            if($commune->id==$permanent_address['commune_code']){
                                                echo '<option selected value="'.$commune->id.'">'.$commune->name.'</option>';
                                            }else {
                                                echo '<option value="'.$commune->id.'">'.$commune->name.'</option>';
                                            }
                                            }
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Village <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select name="permenent_village" id="permenent_village" class="form-control" required>
                                    <option value="" hidden></option>
                                     @php
                                        if(isset($permanent_address)){
                                            foreach ($permanent_address['all_village'] as $village) {
                                            if($village->id==$permanent_address['village_code']){
                                                echo '<option selected value="'.$village->id.'">'.$village->name.'</option>';
                                            }else {
                                                echo '<option value="'.$village->id.'">'.$village->name.'</option>';
                                            }
                                            }
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>





              <div><br></div>
              <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12 bg-turbo-color" style="padding-top: 5px;padding-left: 5px">
                            <label>Contact Information</label>
                        </div>
                        <div><br></div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Type of Identification <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select name="type_of_dentification" id="type_of_dentification" class="form-control" required>
                                    <option value="" hidden></option>
                                    @foreach ($data[5] as $identity_type)
                                        @if (isset($contact))
                                            @if ($contact['iden_type']==$identity_type->name_en)
                                                <option selected value="{{$identity_type->id}}">{{$identity_type->name_en}} / {{$identity_type->name_kh}}</option>
                                            @else
                                                <option value="{{$identity_type->id}}">{{$identity_type->name_en}} / {{$identity_type->name_kh}}</option>
                                            @endif
                                        @else
                                            <option value="{{$identity_type->id}}">{{$identity_type->name_en}} / {{$identity_type->name_kh}}</option>
                                        @endif
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label"># of Identification <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="number_of_dentification" id="number_of_dentification" value="@php if(isset($contact)){echo $contact['ma_identification_number'];} @endphp" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Issued Date</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="issued_date" id="issued_date" value="@php if(isset($contact)){echo $contact['issued_date'];} @endphp">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Issued Place</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="issued_place" value="@php if(isset($contact)){echo $contact['issued_place'];} @endphp">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Issued by</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="issued_by" value="@php if(isset($contact)){echo $contact['issued_by'];} @endphp">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Blood Group</label>
                                <div class="col-sm-7">
                                    <select name="blood_group" id="blood_group" class="form-control">
                                        <option value="" hidden></option>
                                        @foreach ($data[4] as $blood)
                                            @if (isset($contact))
                                                @if ($contact['blood_name']==$blood->name_en)
                                                    <option selected value="{{$blood->id}}">{{$blood->name_en}} / {{$blood->name_kh}}</option>
                                                @else
                                                    <option value="{{$blood->id}}">{{$blood->name_en}} / {{$blood->name_kh}}</option>
                                                @endif
                                            @else
                                                <option value="{{$blood->id}}">{{$blood->name_en}} / {{$blood->name_kh}}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Religion <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select name="religion" id="religion" class="form-control" required>
                                        <option value="" hidden></option>
                                        @foreach ($data[6] as $religion)
                                            @if (isset($contact))
                                                @if ($contact['religion']==$religion->name_en)
                                                    <option selected value="{{$religion->id}}">{{$religion->name_en}} / {{$religion->name_kh}}</option>
                                                @else
                                                    <option value="{{$religion->id}}">{{$religion->name_en}} / {{$religion->name_kh}}</option>
                                                @endif
                                            @else
                                                <option value="{{$religion->id}}">{{$religion->name_en}} / {{$religion->name_kh}}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Maritial Status <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select name="maritial_status" id="maritial_status" class="form-control">
                                        @if (isset($contact))
                                            @if ($contact['is_marriage']==false)
                                                <option value="f">No</option>
                                                <option value="t">Yes</option>
                                            @else
                                                <option value="t">Yes</option>
                                                <option value="f">No</option></option>
                                            @endif
                                        @else
                                            <option value="f">No</option>
                                            <option value="t">Yes</option>
                                        @endif
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Spouse Name</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="spouse_name" value="@php if(isset($relative)){echo $relative['wife_name'];} @endphp">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Children</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" id="emChildren" name="emChildren" value="@php if(isset($data[1])){echo $data[1]['children'];} @endphp">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Date of Birth</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="spoue_date_of_bith" value="@php if(isset($relative)){echo $relative['wife_date_of_birth'];} @endphp">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Spouse's Occupation</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="spouse_occupation" value="@php if(isset($relative)){echo $relative['wife_occupation'];} @endphp">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Education Level</label>
                                <div class="col-sm-7">
                                    <select name="spouse_education_level" id="spouse_education_level" class="form-control">
                                        <option value="" hidden></option>
                                        @foreach ($data[7] as $education_level)
                                            @if (isset($relative))
                                                @if ($relative['wife_education_level']==$education_level->name_en)
                                                    <option selected value="{{$education_level->id}}">{{$education_level->name_en}} / {{$education_level->name_kh}}</option>
                                                @else
                                                    <option value="{{$education_level->id}}">{{$education_level->name_en}} / {{$education_level->name_kh}}</option>
                                                @endif
                                            @else
                                                <option value="{{$education_level->id}}">{{$education_level->name_en}} / {{$education_level->name_kh}}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Mobile Phone</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="spouse_mobile_phone" value="@php if(isset($relative)){echo $relative['wife_mobile_phone'];} @endphp">
                                </div>
                            </div>
                      </div>
                      <div class="col-md-6">
                        <div class="col-md-12 bg-turbo-color" style="padding-top: 5px;padding-left: 5px">
                            <label>Relative/Emergency Contact</label>
                        </div>
                        <div><br></div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Father Name <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="parent_father_name" id="parent_father_name" value="@php if(isset($relative)){echo $relative['father_name'];} @endphp" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Mother Name <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="parent_mother_name" id="parent_mother_name" value="@php if(isset($relative)){echo $relative['mother_name'];} @endphp" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Father Occupation <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="parent_father_occupation" id="parent_father_occupation" value="@php if(isset($relative)){echo $relative['father_occupation'];} @endphp" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Mother Occupation <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="parent_mother_occupation" id="parent_mother_occupation" value="@php if(isset($relative)){echo $relative['mother_occupation'];} @endphp" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Home</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="parent_home" value="@php if(isset($relative)){echo $relative['parent_home'];} @endphp">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Street</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="parent_street" value="@php if(isset($relative)){echo $relative['parent_street'];} @endphp">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Group</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="parent_group" value="@php if(isset($relative)){echo $relative['parent_group'];} @endphp">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">City/Province <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select name="parent_province" id="parent_province" class="form-control" onchange="getbranch(this,'parent_idistrict','s','/district')" required>
                                    <option value="" hidden></option>
                                    @php
                                          foreach ($data[2] as $province) {
                                          if(isset($relative)){
                                              if($province->code==$relative['province_code']){
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
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Khan/District <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control dynamic" name="parent_idistrict" id="parent_idistrict" onchange="getbranch(this,'parent_commune','s','/commune')" required>
                                    <option value="" hidden></option>
                                    @php
                                        if(isset($relative)){
                                            foreach ($relative['all_district'] as $district) {
                                            if($relative['district_code']==$district->id){
                                                echo '<option selected value="'.$district->id.'">'.$district->name.'</option>';
                                            }else {
                                                echo '<option value="'.$district->id.'">'.$district->name.'</option>';
                                            }
                                            }
                                        }
                                 @endphp
                               </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Sengkat/Commune <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select name="parent_commune" id="parent_commune" class="form-control" onchange="getbranch(this,'parent_village','s','/village')" required>
                                    <option value="" hidden></option>
                                     @php
                                        if(isset($relative)){
                                            foreach ($relative['all_commune'] as $commune) {
                                            if($commune->id==$relative['commune_code']){
                                                echo '<option selected value="'.$commune->id.'">'.$commune->name.'</option>';
                                            }else {
                                                echo '<option value="'.$commune->id.'">'.$commune->name.'</option>';
                                            }
                                            }
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Village <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select name="parent_village" id="parent_village" class="form-control" required>
                                    <option value="" hidden></option>
                                    @php
                                        if(isset($relative)){
                                            foreach ($relative['all_village'] as $village) {
                                            if($village->id==$relative['village_code']){
                                                echo '<option selected value="'.$village->id.'">'.$village->name.'</option>';
                                            }else {
                                                echo '<option value="'.$village->id.'">'.$village->name.'</option>';
                                            }
                                            }
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Mobile Phone <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="parent_mobile_phone" id="parent_mobile_phone" value="@php if(isset($relative)){echo $relative['phone_number'];} @endphp" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Home Phone</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="parent_home_phone" value="@php if(isset($relative)){echo $relative['home_phone'];} @endphp">
                            </div>
                        </div>


                    </div>
                  </div>
              </div>




                <div><br><br></div>
                <div class="col-md-12 bg-turbo-color" style="padding-top: 5px;padding-left: 5px">
                    <label>Education Detail</label>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div><br></div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Education Level</label>
                                <div class="col-sm-7">
                                    <select name="em_education_level" id="" class="form-control">
                                        <option value="" hidden></option>
                                        @foreach ($data[7] as $em_education_level)
                                            @if (isset($education))
                                                @if ($education[0]['name_en']==$em_education_level->name_en)
                                                    <option selected value="{{$em_education_level->id}}">{{$em_education_level->name_en}} / {{$em_education_level->name_kh}}</option>
                                                @else
                                                    <option value="{{$em_education_level->id}}">{{$em_education_level->name_en}} / {{$em_education_level->name_kh}}</option>
                                                @endif
                                            @else
                                                <option value="{{$em_education_level->id}}">{{$em_education_level->name_en}} / {{$em_education_level->name_kh}}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-5 col-form-label">Major Subject</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="em_major_subject" value="@php if(isset($education)){echo $education[0]['major'];} @endphp">
                                    </div>
                                </div>

                                
                        </div>
                        <div class="col-md-6">
                            <div><br></div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Education Status</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="em_education_status" id="parent_father_name" value="@php if(isset($education)){echo $education[0]['education_status'];} @endphp">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">University/School</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="university_school" value="@php if(isset($education)){echo $education[0]['school'];} @endphp">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <div><br><br></div>
                <div class="col-md-12 bg-turbo-color" style="padding-top: 5px;padding-left: 5px">
                    <label>Experience Detail</label>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div><br></div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label"># of Experience</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" name="number_of_experience" value="@php if(isset($experience)){echo $experience[0]['experience_period'];} @endphp">
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-5 col-form-label">Sector</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="sector" value="@php if(isset($experience)){echo $experience[0]['sector'];} @endphp">
                                    </div>
                                </div>

                                
                        </div>
                        <div class="col-md-6">
                            <div><br></div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Company's Name</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="company_name" id="parent_father_name" value="@php if(isset($experience)){echo $experience[0]['company_name'];} @endphp">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">Last Position</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="last_position" value="@php if(isset($experience)){echo $experience[0]['last_position'];} @endphp">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>







              {{-- <div class="col-md-6">
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
              </div> --}}



              {{-- <div class="col-md-6">
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
              </div> --}}




              {{-- <div class="col-md-6">
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
              </div> --}}




              {{-- <div class="col-md-6">
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
              </div> --}}




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

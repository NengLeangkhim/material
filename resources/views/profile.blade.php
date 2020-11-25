




<section class="content">
    <style>
        .no-shadow {
            box-shadow: none!important;
            background-color:#f4f6f9;
        }
        .dt {
            border: none!important;
            text-align: right;
            padding: 5px;
        }
        .dd {
            border: 1px solid #ccc;
            padding: 5px;
        }
    </style>
    <div class="container-fluid " >
            <!-- ====>> This Part Title <<==== -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                            <div class="no-shadow card">
                                <div class=" card-header">
                                        <div class="text-center" > 
                                            <div class="pt-3 ">
                                                <h6 class="font-weight-bold"  style="font-size:3.5vw;">
                                                   
                                                        Profile
                                                </h6>
                                            </div>
                                        </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <!-- ====>> This Part Profile & Photo <<==== -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                            <div class="  card">
                                <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                    <div class="row">
                                                            <dt class="col-sm-5 col-xs-6 col-6 pt-2" >ID Number</dt>
                                                                <dd class="col-sm-7 col-xs-6  col-6  pt-2" >{{ $employee[0]->id_number }}</dd>
                                                    
                                                            <dt class="col-sm-5 col-xs-6  col-6 pt-2" >Name </dt>
                                                                <dd class="col-sm-7 col-xs-6  col-6  pt-2" > {{ $employee[0]->full_name}}</dd>
                                                   
                                                            <dt class="col-sm-5 col-xs-6  col-6  pt-2">Position</dt>
                                                                <dd class="col-sm-7 col-xs-6  col-6  pt-2">{{ $employee[0]->position }}</dd>
                                                    
                                                            <dt class="col-sm-5 col-xs-6  col-6  pt-2">Department</dt>
                                                                <dd class="col-sm-7 col-xs-6  col-6  pt-2">{{ $employee[0]->department }}</dd>

                                                            <dt class="col-sm-5 col-xs-6  col-6  pt-2">Office Phone</dt>
                                                                <dd class="col-sm-7 col-xs-6  col-6  pt-2">{{ $employee[0]->office_phone }}</dd>
                                                                
                                                            <dt class="col-sm-5 col-xs-6  col-6  pt-2">Email</dt>
                                                                <dd class="col-sm-7 col-xs-6  col-6  pt-2">{{ $employee[0]->email }}</dd>


                                                            <dt class="col-sm-5 col-xs-6  col-6  pt-2">Company</dt>
                                                                <dd class="col-sm-7 col-xs-6  col-6  pt-2">{{ $employee[0]->company }}</dd>
                                                    </div>
                                            </div>
                                                
                                            <div class="col-lg-3 col-md-3 col-sm-4 ">
                                                <form method="post"  enctype="multipart/form-data" id='form_img' >
                                                    @csrf
                                                        <div class="MyPfFrame">
                                                            {{-- <label for="img" class="upload-button"> --}}
                                                                <img class="profile_user" src="<?php   if(isset($pro) && !empty($pro)){echo ($pro[0]->image);}else echo "img/general_pic/user_profile3.jpg";?> " id='image_'>
                                                                {{-- <label for="img" class="pen-hover">
                                                                    <label for="img" class="fas fa-pencil-alt"></label>
                                                                </label><br> --}}
                                                            {{-- </label> --}}
                                                            {{-- <input class="file-upload" type="file" id='img' name="_img" accept="image/*"/> --}}
                                                        </div>
                                                </form>
                                            </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <!-- ====>> This Part Profile Personal Detail <<==== -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="  card" >
                            <div class="card-header">
                                <h1 class="card-title" style="font-weight: bold">
                                    I- PERSONAL DETAIL
                                </h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Name in Latin</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > {{ $employee[0]->full_name }} </dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Gander</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{ $employee[0]->sex }}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Date of Birth</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">{{ $employee[0]->birth_date }}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Age</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">{{date('Y')-date('Y',strtotime($employee[0]->birth_date))}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Height</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">null</dd>
                                            </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Name in Khmer</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{ $employee[0]->full_name_kh }}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Marital Status</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{ $employee[0]->martital_status }}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Has Child</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">{{$employee[0]->child_count}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Ranking of Age</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">null</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Weight </dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">null</dd>
                                            </div>
                                    </div>
                                </div>
     
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div> 
            </div>


            <!-- ====>> This Part Profile Address Detail <<==== -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="  card" >
                            <div class="card-header">
                                <h1 class="card-title" style="font-weight: bold">
                                    II- ADDRESS DETAIL
                                </h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- ====>> Row current address <<==== -->
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                        <dt class="col-sm-4 col-xs-4 col-6 dt" >Current Address</dt>
                                            <div class="row font-size-14">
                                                
                                                <dt class="col-sm-4 col-xs-4 col-6 dt" >Home</dt>
                                            <dd class="col-sm-8 col-xs-8 col-6 dd" >{{$current_address['home']}}</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt" >Street</dt>
                                            <dd class="col-sm-8 col-xs-8 col-6 dd" >{{$current_address['street']}}</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt" >Group</dt>
                                                    <dd class="col-sm-8 col-xs-8 col-6 dd" >null</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt" >Province</dt>
                                                    <dd class="col-sm-8 col-xs-8 col-6 dd" >{{$current_address['province']}}</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt" >District</dt>
                                                    <dd class="col-sm-8 col-xs-8 col-6 dd" >{{$current_address['district']}}</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt" >Commune</dt>
                                                    <dd class="col-sm-8 col-xs-8 col-6 dd" >{{$current_address['commune']}}</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt">Village</dt>
                                                    <dd class="col-sm-8 col-xs-8  col-6 dd" >{{$current_address['village']}} </dd>
                                            </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                        <dt class="col-sm-4 col-xs-4 col-6 dt" >Permanent Address</dt>
                                        <div class="row font-size-14">
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >Home</dt>
                                                <dd class="col-sm-8 col-xs-8 col-6 dd" >{{$permanent_address['home']}}</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >Street</dt>
                                                <dd class="col-sm-8 col-xs-8 col-6 dd" >{{$permanent_address['street']}}</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >Group</dt>
                                                <dd class="col-sm-8 col-xs-8 col-6 dd" >null</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >Province</dt>
                                        <dd class="col-sm-8 col-xs-8 col-6 dd" >{{$permanent_address['province']}}</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >District</dt>
                                        <dd class="col-sm-8 col-xs-8 col-6 dd" >{{$permanent_address['district']}}</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >Commune</dt>
                                        <dd class="col-sm-8 col-xs-8 col-6 dd" >{{$permanent_address['commune']}}</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt">Village</dt>
                                        <dd class="col-sm-8 col-xs-8  col-6 dd" >{{$permanent_address['village']}}</dd>
                                        </div>
                                </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div> 
            </div>


            <!-- ====>> This Part Profile Contact Information and Relative/Emergency Contact <<==== -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="  card" >
                            <div class="card-header">
                                <h1 class="card-title" style="font-weight: bold">
                                    III- Other Information
                                </h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- ====>> Row current address <<==== -->
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                        <dt class="col-sm-4 col-xs-4 col-6 dt" >Contact Information</dt>
                                            <div class="row font-size-14">
                                                
                                                <dt class="col-sm-4 col-xs-4 col-6 dt" >Type of Identification</dt>
                                            <dd class="col-sm-8 col-xs-8 col-6 dd" >{{$em_contect['iden_type']}}</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt" ># of Identification</dt>
                                            <dd class="col-sm-8 col-xs-8 col-6 dd" >{{$em_contect['ma_identification_number']}}</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt" >Issued Date</dt>
                                            <dd class="col-sm-8 col-xs-8 col-6 dd" >{{$em_contect['issued_date']}}</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt" >Issued Place</dt>
                                            <dd class="col-sm-8 col-xs-8 col-6 dd" >{{$em_contect['issued_place']}}</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt" >Issued By</dt>
                                            <dd class="col-sm-8 col-xs-8 col-6 dd" >{{$em_contect['issued_by']}}</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt" >Blood Group</dt>
                                            <dd class="col-sm-8 col-xs-8 col-6 dd" >{{$em_contect['blood_name']}}</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt">Religion</dt>
                                            <dd class="col-sm-8 col-xs-8  col-6 dd" > {{$em_contect['religion']}}</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt">Maritial Status</dt>
                                            <dd class="col-sm-8 col-xs-8  col-6 dd" >@php
                                                if($em_contect['is_marriage']==null){
                                                    echo 'False';
                                                } else {
                                                    echo 'True';
                                                }
                                            @endphp</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt">Spouse Name</dt>
                                                    <dd class="col-sm-8 col-xs-8  col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt">Date of Birth</dt>
                                                    <dd class="col-sm-8 col-xs-8  col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt">Spouse's Occupation</dt>
                                                    <dd class="col-sm-8 col-xs-8  col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt">Education Level</dt>
                                                    <dd class="col-sm-8 col-xs-8  col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt">Mobile Phone</dt>
                                                    <dd class="col-sm-8 col-xs-8  col-6 dd" > No</dd>
                                            </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                        <dt class="col-sm-12 col-xs-12 col-12 dt text-left">Relative/Emergency Contact</dt>
                                        <div class="row font-size-14">
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >Father Name in Latin</dt>
                                                <dd class="col-sm-8 col-xs-8 col-6 dd" >No</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt">Mather Name in Latin</dt>
                                                <dd class="col-sm-8 col-xs-8  col-6 dd">no</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >Father Occupation</dt>
                                                <dd class="col-sm-8 col-xs-8 col-6 dd" >No</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >Mother Occupation</dt>
                                                <dd class="col-sm-8 col-xs-8 col-6 dd" >No</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >Home #</dt>
                                                <dd class="col-sm-8 col-xs-8 col-6 dd" >No</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >Street</dt>
                                                <dd class="col-sm-8 col-xs-8 col-6 dd" >No</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >Group</dt>
                                                <dd class="col-sm-8 col-xs-8 col-6 dd" >No</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >Province</dt>
                                                <dd class="col-sm-8 col-xs-8 col-6 dd" >No</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >District</dt>
                                                <dd class="col-sm-8 col-xs-8 col-6 dd" >No</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >Commune</dt>
                                                <dd class="col-sm-8 col-xs-8 col-6 dd" >No</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt">Village</dt>
                                                <dd class="col-sm-8 col-xs-8  col-6 dd" >No</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >Mobile Phone</dt>
                                                <dd class="col-sm-8 col-xs-8 col-6 dd" >No</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >Home Phone</dt>
                                                <dd class="col-sm-8 col-xs-8 col-6 dd" >No</dd>
                                        </div>
                                </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div> 
            </div>


            <!-- ====>> This Part Profile Education Detail <<==== -->
             <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="  card" >
                            <div class="card-header">
                                <h1 class="card-title" style="font-weight: bold">
                                    IV- EDUCATION DETAIL
                                </h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($education as $edu)
                                        
                                        <div class="col-md-12 bg-turbo-color" style="margin-bottom: 10px">EducationLevel : {{$edu['name_en']}}</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 ">
                                                <div class="row font-size-14">
                                                    <dt class="col-sm-4 col-xs-6 col-6 dt" >Education Level</dt>
                                                        <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$edu['name_en']}}</dd>
                                                    <dt class="col-sm-4 col-xs-6 col-6 dt">Subject</dt>
                                                        <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$edu['major']}}</dd>
                                        
                                                </div>

                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 ">
                                                <div class="row font-size-14">
                                                    <dt class="col-sm-4 col-xs-6 col-6 dt" >Education Status</dt>
                                                        <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$edu['education_status']}}</dd>
                                                    <dt class="col-sm-4 col-xs-6 col-6 dt">University/School </dt>
                                                        <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$edu['school']}}</dd>
                                            
                                                </div>
                                        </div>
                                    @endforeach
                                    
                                </div>
        
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div> 
            </div> 

            <!-- ====>> This Part Profile Experincec Detail <<==== -->
             <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="  card" >
                            <div class="card-header">
                                <h1 class="card-title" style="font-weight: bold">
                                    V- EXPERIENCE DETAIL
                                </h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="">
                                    <div class="row">
                                        @foreach ($job_experience as $experience)
                                            <div class="col-md-12 bg-turbo-color" style="margin-bottom: 10px">
                                                Company : {{$experience['company_name']}}
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 ">
                                                    <div class="row font-size-14">
                                                        <dt class="col-sm-4 col-xs-6 col-6 dt" ># of Experience</dt>
                                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$experience['experience_period']}} Year</dd>
                                                        <dt class="col-sm-4 col-xs-6 col-6 dt">Sector</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$experience['sector']}}</dd>
                                            
                                                    </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 ">
                                                    <div class="row font-size-14">
                                                        <dt class="col-sm-4 col-xs-6 col-6 dt" >Compnay's Name</dt>
                                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$experience['company_name']}}</dd>
                                                        <dt class="col-sm-4 col-xs-6 col-6 dt">Last Position </dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$experience['last_position']}}</dd>
                                                
                                                    </div>
                                            </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div> 
            </div>


            <!-- ====>> This Part Profile Employee Detail <<==== -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="  card" >
                            <div class="card-header">
                                <h1 class="card-title" style="font-weight: bold">
                                    VI- EMPLOYEE DETAIL 
                                </h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Employee ID</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">{{$employee[0]->id_number}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Position </dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">{{$employee[0]->position}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Company</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > {{$employee[0]->company}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Start Date</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$employee[0]->join_date}}</dd>
                                            </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">HQ/Branch</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$employee[0]->branch}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Salary</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{ $employee[0]->salary }}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Bank Name </dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >ABA</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Account Number </dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$employee[0]->bank_account}}</dd>
                                            </div>
                                    </div>
                                </div>
        
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div> 
            </div>





            <!-- ====>> This Part Profile Warning and Punishment <<==== -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="  card" >
                            <div class="card-header">
                                <h1 class="card-title" style="font-weight: bold">
                                    VII- Warning and Punishment 
                                </h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @php
                                    $i=0;
                                @endphp
                                <table class="table" id="tbl_warning">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Type of Warning</th>
                                            <th>Verbal Warning Date</th>
                                            <th>Reason of Warning</th>
                                            <th>Staff</th>
                                            <th>Warning By</th>
                                            <th>Approved By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($warning as $warn)
                                            <tr>
                                                <th>{{++$i}}</th>
                                                <td>{{$warn->name_en}}</td>
                                            <td>{{$warn->verbal_warning_date}}</td>
                                            <td>{{$warn->warning_reason}}</td>
                                            <td>{{$warn->staff_last_name}} {{$warn->staff_first_name}}</td>
                                            <td>{{$warn->last_warning_by}} {{$warn->first_warning_by}}</td>
                                            <td>{{$warn->last_approve_by}} {{$warn->first_approve_by}}</td>
                                            </tr>
                                        @endforeach
                                        
                                        
                                    </tbody>
                                </table>
                                {{-- <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Type of Warning</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Reason of Warning </dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Edited By</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                            </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Verbal Warning Date</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$employee[0]->branch}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Warning By</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{ $employee[0]->salary }}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Approved By </dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >ABA</dd>
                                            </div>
                                    </div>
                                </div> --}}
        
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div> 
            </div>



            <!-- ====>> This Part Profile Exit Infomation <<==== -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="  card" >
                            <div class="card-header">
                                <h1 class="card-title" style="font-weight: bold">
                                    VIII- Exit Information
                                </h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Request Exit Date</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">{{$exit_information['request_exit_date']}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Type of Exit </dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd">{{$exit_information['name_en']}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >HR Recieved Date</dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$exit_information['hr_received_date']}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Effective Exit Date</dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$exit_information['effective_date']}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Training & Development</dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$exit_information['training_development']}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Opportunity to Promote</dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$exit_information['opportunity_to_promote']}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Work Presure</dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$exit_information['work_presure']}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Working on Holiday</dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$exit_information['working_on_holiday']}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Motivation</dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$exit_information['motivation']}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Overall Opion</dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$exit_information['overall_option']}}</dd>
                                            </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Submit Date</dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$exit_information['submit_date']}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Manager Approved Date</dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$exit_information['manager_approved_date']}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Reasion of Exit</dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$exit_information['exit_reason']}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Duties & Responsibility</dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$exit_information['duties_responsibility']}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Given Salary</dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$exit_information['given_salary']}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Work Environment</dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$exit_information['work_environment']}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Team Work</dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$exit_information['team_work']}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Management Issue</dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$exit_information['management_issue']}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Comment</dt>
                                            <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$exit_information['comment']}}</dd>
                                            </div>
                                    </div>
                                </div>
        
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div> 
            </div>
 


            <!-- ====>> This Part Profile Leave Information <<==== -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title" style="font-weight: bold">
                                    IX- Leave Information
                                </h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Employee ID</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">{{$employee[0]->id_number}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">HO/Branch Name </dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">{{$employee[0]->branch}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Request Date</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Period of Leave</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >No</dd>
                                            </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Staff Name</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$employee[0]->full_name}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Position</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{ $employee[0]->position }}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Type of Request Leave</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >ABA</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >From</dt>
                                                    <dd class="col-sm-4 col-xs-3 col-3 dd" ><input type="date" class="form-control border-0"></dd>
                                                    <dd class="col-sm-4 col-xs-3 col-3 dd" ><input type="date" class="form-control border-0"></dd>
                                            </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                                        <div class="row font-size-14">
                                            <dt class="col-sm-2 col-xs-4 col-2 dt">Reason of Leave</dt>
                                                <dd class="col-sm-10 col-xs-6 col-6 dd" ><textarea name="" class="form-control border-0" id="" rows="2"></textarea></dd>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                                        <div class="row font-size-14">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-right">Type of Leave</th>
                                                        <th># of Leave</th>
                                                        <th>Current # of Leave Request</th>
                                                        <th>Balance of Leave</th>
                                                        <th>Request Pending</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th class="text-right">Annual Leave</th>
                                                        <td class="text-center">{{$leave_type[0]}}</td>
                                                        <td class="text-center">{{($leave_type[0]-$all_leave['annual'])}}</td>
                                                        <td class="text-center">{{$all_leave['annual']}}</td>
                                                        <td class="text-center">0</td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-right">Sick Leave</th>
                                                        <td class="text-center">{{$leave_type[3]}}</td>
                                                        <td class="text-center">{{($leave_type[3]-$all_leave['sick'])}}</td>
                                                        <td class="text-center">{{$all_leave['sick']}}</td>
                                                        <td class="text-center">0</td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-right">Maternity Leave</th>
                                                        <td class="text-center">{{$leave_type[1]}}</td>
                                                        <td class="text-center">{{($leave_type[1]-$all_leave['maternity'])}}</td>
                                                        <td class="text-center">{{$all_leave['maternity']}}</td>
                                                        <td class="text-center">0</td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-right">Special Leave</th>
                                                        <td class="text-center">{{$leave_type[2]}}</td>
                                                        <td class="text-center">{{($leave_type[2]-$all_leave['special'])}}</td>
                                                        <td class="text-center">{{$all_leave['special']}}</td>
                                                        <td class="text-center">0</td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-right">Unpaid Leave</th>
                                                        <td class="text-center">{{$leave_type[4]}}</td>
                                                        <td class="text-center">{{$leave_type[4]-$all_leave['no_salary']}}</td>
                                                        <td class="text-center">{{$all_leave['no_salary']}}</td>
                                                        <td class="text-center">0</td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
        
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div> 
            </div>



            <!-- ====>> This Part Profile Training Information <<==== -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title" style="font-weight: bold">
                                    X- Training Detail
                                </h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                                        <div class="row font-size-14" style="width:100%;">
                                            <table class="table" id="tbl_profile_training" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Training Course</th>
                                                        <th>Trainer</th>
                                                        <th>Duration</th>
                                                        <th>Is Trained</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($training as $train)
                                                        <tr>
                                                            <th>{{$train->type}}</th>
                                                            <td>{{$train->trainer}}</td>
                                                            @if ($train->hrid>0)
                                                                <td class="text-center">{{$train->actual_f_date}}/{{$train->actual_t_date}}</td>
                                                                <td class="text-center"><input type="checkbox" checked disabled></td> 
                                                            @else
                                                                <td class="text-center">{{$train->schet_f_date}}/{{$train->schet_t_date}}</td>
                                                                <td class="text-center"><input type="checkbox" disabled></td>
                                                            @endif
                                                            
                                                            
                                                        </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
        
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div> 
            </div>



            <!-- ====>> This Part Profile Payroll <<==== -->
            {{-- <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="  card" >
                            <div class="card-header">
                                <h1 class="card-title" style="font-weight: bold">
                                    XI- Payroll Detail
                                </h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Payroll Date</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Working Period </dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Payroll Status</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Old Salary</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Probation Date</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Performance Apprasial</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >New Revised Salary</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Basic Salary</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >50% of Basic Salary</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Premium</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Benefit Allowance(Unleave)</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Incentives Type</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Incentive Amount</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Total Salary and Benifits</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" ># of Spouse & Children</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Special Mention</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Gross Salary for Six Month</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Term of Service</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                            </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">From Date</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >NO</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">To Date</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Exchange Rate</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >ABA</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Salary in Khmer</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Amount of Dependents</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Tax Base</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Tax Rate</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Salary Taxable KHR</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Salary Taxable USA</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Salary After Tax</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Staff Loan Amount</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >% of Staff Loan Amount</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Refund Benefits and Allowance</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Avg Daily Seniority</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Seniority Payment</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Amount to Be Paid</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > No</dd>
                                            </div>
                                    </div>
                                </div>
        
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div> 
            </div> --}}



            <!-- ====>> This Part Profile Change Password <<==== -->

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="no-shadow  card" >
                            {{-- <div class="card-header">
                                <h1 class="card-title" style="font-weight: bold">
                                    III- EMPLOYEE DETAIL 
                                </h1>
                            </div> --}}
                            <!-- /.card-header -->
                            <div class="card-body">
                                    <form method="post" id='form1' name='form1' onsubmit="return change_password(document.form1.old_pass,document.form1.new_pass,document.form1.con_pass)">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12" align="center">
                                                    <p class="during font-weight-bold font-size-18">You can change the password by entering the password below:</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p class="during">
                                                        <i class="fas fa-unlock"></i><strong> Old password :</strong>
                                                    </p>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="password" name="old_pass" id="" class="form-control" required style="font-family:Arial, Helvetica, sans-serif">
                                                    <small id="opasswordHelpBlock" class="form-text" style="color:red">
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p class="during">
                                                        <i class="fas fa-key"></i><strong> New password :</strong>
                                                    </p>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="password" name="new_pass" id="" class="form-control" aria-describedby="passwordHelpBlock" pattern="(?=.*[a-z]).{8,}" title="Use at least 8 characters" required style=" !important; font-size:17px;">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <small id="passwordHelpBlock" class="font-weight-bold font-size-14">Password must be at least 8 characters long, including letters and numbers!</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p class="during">
                                                        <i class="fas fa-lock"></i><strong> Confirm new password :</strong>
                                                    </p>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="password" name="con_pass" id="" class="form-control" required>
                                                    <small id="cpasswordHelpBlock" class="form-text" style="color:red">
                                                    </small>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="submit" id="btn-sub" name='change_pass' value="Change"​ class="btn btn-primary col-3 offset-4" style="" >
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                    </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div> 
            </div>






    <script>
        
        $(document).ready(function() {
            $("#img").on('change', function(){
                // readURL(this);
                readURL(this,'image_')
            });
            $('#tbl_profile_training').DataTable(
            );
            $("#tbl_profile_training_wrapper").css("width","100%");
            $('#tbl_warning').DataTable();
        });
        img_exist();
    </script>
    
</section>
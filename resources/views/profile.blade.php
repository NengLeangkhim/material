




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
                                                                <dd class="col-sm-7 col-xs-6  col-6  pt-2" >{{ $pro[0]->id_number }}</dd>
                                                    
                                                            <dt class="col-sm-5 col-xs-6  col-6 pt-2" >Name </dt>
                                                                <dd class="col-sm-7 col-xs-6  col-6  pt-2" > {{ $pro[0]->first_name_en." ".$pro[0]->last_name_en}}</dd>
                                                   
                                                            <dt class="col-sm-5 col-xs-6  col-6  pt-2">Position</dt>
                                                                <dd class="col-sm-7 col-xs-6  col-6  pt-2">{{ $pro[0]->positionName }}</dd>
                                                    
                                                            <dt class="col-sm-5 col-xs-6  col-6  pt-2">Department</dt>
                                                                <dd class="col-sm-7 col-xs-6  col-6  pt-2">{{ $pro[0]->deptName }}</dd>

                                                            <dt class="col-sm-5 col-xs-6  col-6  pt-2">Office Phone</dt>
                                                                <dd class="col-sm-7 col-xs-6  col-6  pt-2">{{ $pro[0]->office_phone }}</dd>
                                                                
                                                            <dt class="col-sm-5 col-xs-6  col-6  pt-2">Email</dt>
                                                                <dd class="col-sm-7 col-xs-6  col-6  pt-2">{{ $pro[0]->email }}</dd>


                                                            <dt class="col-sm-5 col-xs-6  col-6  pt-2">Company</dt>
                                                                <dd class="col-sm-7 col-xs-6  col-6  pt-2">{{ $pro[0]->company }}</dd>

                                                    </div>
                                            </div>
                                                
                                            <div class="col-lg-3 col-md-3 col-sm-4 ">
                                                <form method="post"  enctype="multipart/form-data" id='form_img' >
                                                    @csrf
                                                        <div class="MyPfFrame">
                                                            {{-- <label for="img" class="upload-button"> --}}
                                                                <img class="profile-pic" src="<?php   if(isset($pro) && !empty($pro)){echo ($pro[0]->image);}else echo "img/general_pic/user_profile3.jpg";?> " id='image_'>
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
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > {{ strtoupper($pro[0]->last_name_en." ".$pro[0]->first_name_en) }} </dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Gander</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{ $pro[0]->sex }}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Date of Birth</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">{{ $pro[0]->birth_date }}</dd>
                                                {{-- <dt class="col-sm-4 col-xs-6 col-6 dt">Age</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">40</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Height</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">1.70 cm</dd> --}}
                                            </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Name in Khmer</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{ $pro[0]->first_name_kh." ".$pro[0]->last_name_kh }}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Marital Status</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{ $pro[0]->martital_status }}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Has Child</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">
                                                        <?php
                                                            if($pro[0]->has_child == false){
                                                                echo 'No';
                                                            }else{
                                                                echo $pro[0]->has_child;
                                                            }
                                                        ?>
                                                    </dd>
                                                {{-- <dt class="col-sm-4 col-xs-6 col-6 dt">Ranking of Age</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">30s</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Weight </dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">1500.00 g</dd> --}}
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
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-4 col-6 dt" >Home</dt>
                                                    <dd class="col-sm-8 col-xs-8 col-6 dd" >{{ $pro[0]->hom_en }}</dd>
                                                <dt class="col-sm-4 col-xs-4 col-6 dt">Street</dt>
                                                    <dd class="col-sm-8 col-xs-8  col-6 dd" > {{$pro[0]->street_en}}</dd>
                                               
                                            </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                        <div class="row font-size-14">
                                            <dt class="col-sm-4 col-xs-4 col-6 dt" >Phone</dt>
                                                <dd class="col-sm-8 col-xs-8 col-6 dd" >{{$pro[0]->contact}}</dd>
                                            <dt class="col-sm-4 col-xs-4 col-6 dt">Address</dt>
                                                <dd class="col-sm-8 col-xs-8  col-6 dd">{{$addr_detail[0]->get_gazetteers_address}}</dd>
                                        </div>
                                </div>
                                </div>


                                <!-- ====>> Row current & permanent address <<==== -->
                                {{-- <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <div class="col-lg-12 col-md-12 col-ms-12 col-12 font-size-19 font-weight-bold p-3">Current Address</div>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt" >Home</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd" >PP-000001</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Street</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd" > Phnome pneh tmey22222</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Province</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">Kampong Cham2222</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">District</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">Cham Kamon222222</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Commune</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">PhnomPenh Tmey22222</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Village</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">Phum Danamk22222222</dd>
                                            </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <div class="col-lg-12 col-md-12 col-ms-12 col-12 font-size-19 font-weight-bold p-3">Permanent Address</div>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt" >Home</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd" >PP-000001</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Street</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd" > Phnome pneh tmey22222</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Province</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">Kampong Cham2222</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">District</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">Cham Kamon222222</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Commune</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">PhnomPenh Tmey22222</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Village</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">Phum Danamk22222222</dd>
                                            </div>
                                    </div>
                                </div>

                                <!-- ====>> Row Contact info & Agent Contact <<==== -->
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <div class="col-lg-12 col-md-12 col-ms-12 col-12 font-size-19 font-weight-bold p-3">Contact Information </div>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt" >Type of Identification</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd" >PP-000001</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Number of Identification</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd" > 111111112222</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Issued Date</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">2020-10-10 11:00:00 pm</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Issued Place </dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">Kampong Cham</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Issued by</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">Mr. DDDDDDDD</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt" >Religion </dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd" >Muslim</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Maritial status</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd" > No girls friend</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Spouse Name </dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">null</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Date of Birth</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">2020-10-10 11:00:00 pm</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Spouse's Occupation</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">PhnomPenh Tmey22222</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Education Level</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">Php, degreee</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Mobile Phone</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">12346678990</dd>
                                            </div>

                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                        <div class="row font-size-14">
                                                <div class="col-lg-12 col-md-12 col-ms-12 col-12 font-size-19 font-weight-bold p-3">Relative/Emergency Contact</div>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt" >Father Name in Latin</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd" >PP-000001</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Mother Name in Latin</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd" > 111111112222</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Father Occupation</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">2020-10-10 11:00:00 pm</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Mother Occupation  </dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">Kampong Cham</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Home #</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">Mr. DDDDDDDD</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt" >Street </dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd" >Muslim</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Province </dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd" > No girls friend</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">District </dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">null</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Commune</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">2020-10-10 11:00:00 pm</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Village</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">PhnomPenh Tmey22222</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Mobile Phone</dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">Php, degreee</dd>
                                                <dt class="col-sm-4 col-xs-6  col-6 dt">Home Phone </dt>
                                                    <dd class="col-sm-8 col-xs-6  col-6 dd">12346678990</dd>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div> 
            </div>


            <!-- ====>> This Part Profile Education Detail <<==== -->
            {{-- <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="  card" >
                            <div class="card-header">
                                <h1 class="card-title" style="font-weight: bold">
                                    III- EDUCATION DETAIL
                                </h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Education Level</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >MBA</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Major Subject</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >Human Resource Management</dd>
                                    
                                            </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Education Status</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >Degree</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">University/School </dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >Bo Entertainment</dd>
                                        
                                            </div>
                                    </div>
                                </div>
        
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div> 
            </div> --}}

            <!-- ====>> This Part Profile Experincec Detail <<==== -->
            {{-- <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="  card" >
                            <div class="card-header">
                                <h1 class="card-title" style="font-weight: bold">
                                    IV- EXPERIENCE DETAIL
                                </h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" ># of Experience</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >3 Year</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Sector</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >Human Resource Management</dd>
                                    
                                            </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Compnay's Name</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >Degree</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Last Position </dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >Bo Entertainment</dd>
                                        
                                            </div>
                                    </div>
                                </div>
        
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div> 
            </div> --}}


            <!-- ====>> This Part Profile Employee Detail <<==== -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="  card" >
                            <div class="card-header">
                                <h1 class="card-title" style="font-weight: bold">
                                    III- EMPLOYEE DETAIL 
                                </h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Employee ID</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">{{$pro[0]->id_number}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Position </dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd">{{$pro[0]->positionName}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Company</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" > {{$pro[0]->company}}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Start Date</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$pro[0]->join_date}}</dd>
                                                {{-- <dt class="col-sm-4 col-xs-6 col-6 dt" >Reason</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >3 Year</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Employee Classification</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >ABCDEFGHIJKKKK</dd> --}}
                                                {{-- <dt class="col-sm-4 col-xs-6 col-6 dt" >Salary after Probation</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >3 Year</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Payment Type</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >ABCDEFGHIJKKKK</dd> --}}
                                    
                                            </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                                            <div class="row font-size-14">
                                                {{-- <dt class="col-sm-4 col-xs-6 col-6 dt" >Position Name</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >3 Year</dd> --}}
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">HQ/Branch</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$pro[0]->branch}}</dd>
                                                {{-- <dt class="col-sm-4 col-xs-6 col-6 dt" >End Date</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >2030-10-10.</dd> --}}
                                                {{-- <dt class="col-sm-4 col-xs-6 col-6 dt">Status of Working </dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >ABCDEFGHIJKKKK</dd> --}}
                                                {{-- <dt class="col-sm-4 col-xs-6 col-6 dt" >Contract Type</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >3 Year</dd> --}}
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Salary</dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{ $pro[0]->rate_month }}</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt" >Bank Name </dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >ABA</dd>
                                                <dt class="col-sm-4 col-xs-6 col-6 dt">Account Number </dt>
                                                    <dd class="col-sm-8 col-xs-6 col-6 dd" >{{$pro[0]->bank_account}}</dd>
                                            </div>
                                    </div>
                                </div>
        
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div> 
            </div>



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
        });
    </script>
</section>
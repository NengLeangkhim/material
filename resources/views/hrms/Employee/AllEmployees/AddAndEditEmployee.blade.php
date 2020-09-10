<style>
/* body{
    font-size: 16px;
    color: #6f6f6f;
    font-weight: 400;
    line-height: 28px;
    letter-spacing: 0.8px;
    margin-top:20px;
} */
.font-size38 {
    font-size: 38px;
}
.team-single-text .section-heading h4,
.section-heading h5 {
    font-size: 36px
}

.team-single-text .section-heading.half {
    margin-bottom: 20px
}
@media screen and (min-width: 1199px) {
    .pen-hover{
        margin-top: -17% !important;
    }
}
@media screen and (max-width: 1199px) {
    .pen-hover{
        margin-top: -16% !important;
    }
    .team-single-text .section-heading h4,
    .section-heading h5 {
        font-size: 32px
    }
    .team-single-text .section-heading.half {
        margin-bottom: 15px
    }
}

@media screen and (max-width: 991px) {
    .team-single-text .section-heading h4,
    .section-heading h5 {
        font-size: 28px
    }
    .team-single-text .section-heading.half {
        margin-bottom: 10px
    }
    .pen-hover{
        margin-top: -10% !important;
    }
}

@media screen and (max-width: 767px) {
    .team-single-text .section-heading h4,
    .section-heading h5 {
        font-size: 24px
    }
    .pen-hover{
        margin-top: -10% !important;
    }
}


.team-single-icons ul li {
    display: inline-block;
    border: 1px solid #02c2c7;
    border-radius: 50%;
    color: #86bc42;
    margin-right: 8px;
    margin-bottom: 5px;
    -webkit-transition-duration: .3s;
    transition-duration: .3s
}

.team-single-icons ul li a {color: #02c2c7;display: block;font-size: 14px;height: 25px;line-height: 26px;text-align: center;width: 25px}
.team-single-icons ul li:hover {background: #02c2c7;border-color: #02c2c7}
.team-single-icons ul li:hover a {color: #fff}
.team-social-icon li {display: inline-block;margin-right: 5px}
.team-social-icon li:last-child {margin-right: 0}
.team-social-icon i {width: 30px;height: 30px;line-height: 30px;text-align: center;font-size: 15px;border-radius: 50px}
.padding-30px-all {padding: 30px;}
.bg-light-gray {background-color: #f7f7f7;}
.text-center {text-align: center!important;}
img {max-width: 100%;height: auto;}
.list-style9 {list-style: none;padding: 0}
.list-style9 li {position: relative;padding: 0 0 15px 0;margin: 0 0 15px 0;border-bottom: 1px dashed rgba(0, 0, 0, 0.1)}
.list-style9 li:last-child {border-bottom: none;padding-bottom: 0;margin-bottom: 0}
.text-sky {color: #02c2c7}
.text-orange {color: black;}
.text-green {color: #5bbd2a}
.text-yellow {color: #f0d001}
.text-pink {color: #ff48a4}
.text-purple {color: #9d60ff}
.text-lightred {color: #ff5722}
a.text-sky:hover {opacity: 0.8;color: #02c2c7}
a.text-orange:hover {opacity: 0.8;color: #e95601}
a.text-green:hover {opacity: 0.8;color: #5bbd2a}
a.text-yellow:hover {opacity: 0.8;color: #f0d001}
a.text-pink:hover {opacity: 0.8;color: #ff48a4}
a.text-purple:hover {opacity: 0.8;color: #9d60ff}
a.text-lightred:hover {opacity: 0.8;color: #ff5722}
.custom-progress {height: 10px;border-radius: 50px;box-shadow: none;margin-bottom: 25px;}
.progress {
    display: -ms-flexbox;
    display: flex;
    height: 1rem;
    overflow: hidden;
    font-size: .75rem;
    background-color: #e9ecef;
    border-radius: .25rem;
}


.bg-sky {
    background-color: #02c2c7
}

.bg-orange {
    background-color: #e95601
}

.bg-green {
    background-color: #5bbd2a
}

.bg-yellow {
    background-color: #f0d001
}

.bg-pink {
    background-color: #ff48a4
}

.bg-purple {
    background-color: #9d60ff
}

.bg-lightred {
    background-color: #ff5722
}
input{
    font-family: khmer OS Content,cursive !important;
}
body {
  background-color: #efefef;
}

.profile-pic {
    max-width: 300px;
    height: 300px;
    /* max-height: 200px; */
    /* display: block; */
}

.file-upload {
    display: none;
}
.MyPfFrame {
    margin: auto;
    width: 300px;
    height: 300px;
    /* border:1px solid #d42931;#f4f6f9; */
    margin-top: 2%;
    overflow: hidden;
}
.MyPfFrame:hover .upload-button .pen-hover{
    display: block;
    overflow: hidden;
}
.pen-hover{
    padding: 0 !important;
    width: 100%;
    margin-top:-20%;
    height: 50px;
    display: none;
    position: relative;
    transition: all .1s ;
    color: white;
    background-color: #000000b5;
    cursor: pointer;
    z-index: 2;
    overflow: hidden;
}
.upload-button {
  font-size: 1.2em;
  color: #00000000;
  background: #00000000;
}

.upload-button:hover {
    cursor: pointer;
}

</style>


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
              <div class="col-md-6">
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
              <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="MyPfFrame">
                            <label for="img" class="upload-button"><img class="profile-pic" src="<?php echo (isset($pro)&&!empty($pro['image']))?$pro['image']:"https://bootdey.com/img/Content/avatar/avatar7.png";?>" id='image_'>
                                <label for="img" class="pen-hover"><label for="img" class="fas fa-pencil-alt"></label></label><br>
                            </label>
                            <input class="file-upload" type="file" id='img' name="_img" accept="image/*"/>
                        </div>
                    </div>
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
                  <label>City / Province <span class="text-danger">*</span></label>
                   <select class="form-control select2 city"  id="icity" name="city" onchange="getbranch(this,'idistrict','s','/district')" >
                     <option>Kompong Speu</option>
                      
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

              <div class="row text-right">
                <div class="col-md-12 text-right">
                  <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  <button class="btn bg-turbo-color" data-dismiss="modal" onclick="submit_form ('hrm_insert_update_employee','fm-employee','hrm_allemployee')">Save</button>
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

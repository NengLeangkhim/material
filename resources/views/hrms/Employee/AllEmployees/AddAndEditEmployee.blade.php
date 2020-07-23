<div class="modal fade show" id="modal_employee" style="display: block; padding-right: 17px;" aria-modal="true">
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
                <div class="form-group">
                  <label>Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="emName" value="@php if(isset($data[1])){ echo $data[1][0]->name; } @endphp"  required>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Khmer Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="emKhmerName" value="@php if(isset($data[1])){ echo $data[1][0]->name_kh; } @endphp" required>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>ID Number <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="emIdNumber" value="@php if(isset($data[1])){ echo $data[1][0]->id_number; } @endphp" required>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
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
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" name="emEmail" value="@php if(isset($data[1])){ echo $data[1][0]->email; } @endphp" required>
                </div>
                <div class="form-group">
                  <label>Join Date <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" name="emJoinDate" value="@php echo $join_date; @endphp" required>
                </div>
                <div class="form-group">
                  <label>Office Phone</label>
                  <input type="tel" class="form-control" name="emOfficePhone" value="@php if(isset($data[1])){ echo $data[1][0]->office_phone; } @endphp" >
                </div>
                <div class="form-group">
                  <label>Address <span class="text-danger">*</span></label>
                  <textarea name="emAddress" id="" rows="5" class="form-control" required>@php if(isset($data[1])){ echo $data[1][0]->address; } @endphp</textarea>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="tel" class="form-control" name="emPhoneNumber" value="@php if(isset($data[1])){ echo $data[1][0]->contact; } @endphp" required>
                </div>
                <div class="form-group">
                  <label>Position <span class="text-danger">*</span></label>
                  <select name="emPosition" id="" class="form-control" required>
                    @php
                      $f1='';
                      $f2='';
                      if(isset($data[1])){
                        $id=$data[1][0]->position_id;
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
                <div class="form-group">
                  <label>Salary <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" name="emSalary" @php if(!isset($data[0])){ echo 'required'; } @endphp>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="emDescription" id="" rows="5" class="form-control">@php if(isset($data1)){echo $data[1][0]->description;} @endphp</textarea>
                </div>
                <div class="row text-right">
                  <div class="col-md-12 text-right">
                    <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button class="btn bg-turbo-color" data-dismiss="modal" onclick="submit_form ('hrm_insert_update_employee','fm-employee','hrm_allemployee')">Save</button>
                  </div>
                  
                </div>
                
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            </form>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          
        </div>
        </div>
    </div>
</div>
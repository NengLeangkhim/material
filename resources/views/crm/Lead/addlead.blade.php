
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><span><i class="fas fa-user-plus"></i></span> Create New Lead</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="" class="lead" ​value="lead">Lead</a></li>
                        <li class="breadcrumb-item active">New Leads</li>
                    </ol>
                </div>
            </div>
         </div><!-- /.container-fluid -->
    </section>  
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-list-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search Lead"  name='Search'>
                                    <div class="input-group-append">
                                        <span class="input-group-text btn btn-info" data-toggle="modal" data-target="#modal-info"><i class="fas fa-search"></i></span>
                                    </div>
                                </div>                           
                            </div>
                        </div>
                      </div>
                </div>
                <!-- left column -->
                <div class="col-md-12">
                    <form id="frm_lead" action="">
                        @csrf
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header" style="background:#1fa8e0">
                                <h3 class="card-title">Lead Detail</h3>
                            </div>                            
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Company Name English <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Customer Name English"  name='custEng'  required>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                             <label for="exampleInputEmail1">Company Name khmer <b style="color:red">*</b></label>
                                             <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="custkh" id="exampleInputEmail1" placeholder="Customer Name khmer" >
                                            </div>
                                         </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Primary Email<b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                </div>
                                                <input type="email" class="form-control"  name="email" id="exampleInputEmail1" placeholder="Primary Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Primary Phone <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="phone"id="exampleInputEmail1" placeholder="Primary Phone" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                         <div class="col-md-6">
                                            <label for="exampleInputEmail1">Website</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="website" id="exampleInputEmail1" placeholder="Website">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Facebook</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="facebook" id="exampleInputEmail1" placeholder="Facebook">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Current Speed ISP</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                                </div>
                                                <select class="form-control" name="custtype" >
                                                    <option></option>
                                                    <option>Exclusive</option>
                                                    <option>Inclusive</option>
                                                    <option>Oppa</option>
                                                    <option>Other</option>
                                                </select>   
                                            </div>                
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Vat Number</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="website" id="exampleInputEmail1" placeholder="Vat Number">
                                            </div>                           
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Company Branch <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <select class="form-control "  name="companybranch" id='branch' >
                                                    <option value='0'>-- Select Employee --</option>
                                                    {{-- <option value="2">Main</option> --}}
                                                    {{-- <option>Staff</option>
                                                    <option>MNK Staff</option>
                                                    <option>UPG Staff</option>
                                                    <option>Tela Staff</option>
                                                    <option>City Glod Staff</option>
                                                    <option>Amory Staff</option>
                                                    <option>Other</option> --}}
                                                </select>   
                                            </div>                
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Lead Source <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-tty"></i></span>
                                                </div>
                                                <select class="form-control" name="leadsource" id="ileadsource" >
                                                    <option></option>
                                                    @foreach($lead_source as $row)
                                                        <option value="{{$row->id}}">{{$row->lead_source}}</option>                                                  
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                    <span class="input-group-text btn btn-info" data-toggle="modal" data-target="#modal-info"><i class="fas fa-plus"></i></span>
                                                </div>
                                            </div>                           
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Lead Status</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                                                </div>
                                                <select class="form-control" name="leadstatus">
                                                    <option ></option> 
                                                    @foreach($lead_status['result'] as $row)  
                                                        <option value="{{$row['id']}}">{{$row['name']}}</option>   
                                                    @endforeach
                                                </select>
                                            </div>        
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Industry <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                                </div>
                                                <select class="form-control " name="industry" id="iindustry" >
                                                    <option> </option>
                                                    @foreach($lead_industry as $row )
                                                        <option value="{{$row->id}}">{{$row->name_en}}</option> 
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                    <span class="input-group-text btn btn-info" data-toggle="modal" data-target="#modal-info-industry"><i class="fas fa-plus"></i></span>
                                                </div>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Assigened To<b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                                </div>
                                                <select class="form-control" name="assigendTo">
                                                    <option></option>
                                                    @foreach($assig_to as $row )
                                                        <option value="{{$row->id}}">{{$row->first_name_en}} {{$row->last_name_en}}</option> 
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Service<b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-speakap"></i></span>
                                                </div>
                                                <select class="form-control" name="CrmService">
                                                    <option></option>
                                                    {{-- @foreach($assig_to as $row )
                                                        <option value="{{$row->id}}">{{$row->first_name_en}} {{$row->last_name_en}}</option> 
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                         <div class="col-md-6">
                                            <label for="exampleInputEmail1">Current Speed</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-tachometer-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="website" id="exampleInputEmail1" placeholder="Current Speed">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Current Price</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="facebook" id="exampleInputEmail1" placeholder="Current Price">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                         <div class="col-md-6">
                                            <label for="exampleInputEmail1">Employee Count</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="website" id="exampleInputEmail1" placeholder="Current Speed">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Comment</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-comments"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="facebook" id="exampleInputEmail1" placeholder="Current Price">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="card card-primary">
                            <div class="card-header" style="background:#1fa8e0">
                                <h3 class="card-title">Contact Detail</h3>
                            </div>                            
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Full Name Khmer<b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Frist Name"  name='fname'  >
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                             <label for="exampleInputEmail1">Full Name English <b style="color:red">*</b></label>
                                             <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="lname" id="exampleInputEmail1" placeholder="Last Name" >
                                            </div>
                                         </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1"> Email<b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                </div>
                                                <input type="email" class="form-control"  name="cemail" id="exampleInputEmail1" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1"> Phone <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="cphone"id="exampleInputEmail1" placeholder="Primary Phone" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                         <div class="col-md-6">
                                            <label for="exampleInputEmail1">Position</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="cposition" id="exampleInputEmail1" placeholder="Website">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">National ID Ceard / Passport ID</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="idcard" id="exampleInputEmail1" placeholder="National ID Ceard ">
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>  
                        </div>
                            <div class="card card-primary">
                                <div class="card-header" style="background:#1fa8e0">
                                    <h3 class="card-title">Address Detail</h3>
                                </div>                           
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="exampleInputEmail1"> Home(EN)<b style="color:red">*</b></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control"  name='homeEN' id="exampleInputEmail1" placeholder="Number of home"  >    
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="exampleInputEmail1"> Street(EN) <b style="color:red">*</b></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-road"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control"  name='streetEN' id="exampleInputEmail1" placeholder="Number of street"  >    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">City/Province <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                                                    </div>
                                                    <select class="form-control select2 city"  id="icity" name="city" onchange="getbranch(this,'idistrict','s','/district')" >
                                                        <option></option>
                                                     @foreach($province as $row )
                                                        <option value="{{$row->code}}">{{$row->name_latin}}/{{$row->name_kh}}</option> 
                                                        @endforeach
                                                    </select>     
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="exampleInputEmail1"> Home(KH)<b style="color:red">*</b></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control"  name='homeKH' id="exampleInputEmail1" placeholder="Number of home" >    
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="exampleInputEmail1"> Street(KH) <b style="color:red">*</b></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-road"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control"  name='streetKH' id="exampleInputEmail1" placeholder="Number of street"  >    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Khan/District <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                                    </div>
                                                    <select class="form-control dynamic" name="district" id="idistrict" onchange="getbranch(this,'icommune','s','/commune')" >
                                                        <option> </option> 
                                                    </select>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1"> Lead Map <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"  name='latlng' id="latlong" placeholder="11.123456, 104.123456 Example" >

                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Sengkat/Commune <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-street-view"></i></span>
                                                    </div>
                                                    <select class="form-control dynamic" name="commune" id="icommune" onchange="getbranch(this,'ivillage','s','/village')" >
                                                        <option> </option>
                                                    </select>        
                                                </div> 
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Address Type <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                                    </div>
                                                    <select class="form-control " name="LeadType" id="LeadType" >
                                                        <option value="billing">Billing</option>                                                        
                                                        <option value="install">Install</option>                                                        
                                                        <option value="main">Main</option>                                                        
                                                    </select>     
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Village <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                                    </div>
                                                    <select class="form-control " name="village" id="ivillage" dats-dependent="village" >
                                                        <option>select Village</option>                                                        
                                                    </select>     
                                                </div> 
                                                
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="map"></div>

                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary save" id="frm_btn_sub_addlead">Save</button>
                                        <button type="button" class="btn btn-danger" onclick="go_to('lead')">Cencel</button>
                                    </div> 
                                </div>              
                            </div>      
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- =================Modal lead source========================= --}}
    <div class="modal fade" id="modal-info">
        <form id="ifrm_source" action="/addleadsource" method="POST">
            @csrf
            <div class="modal-dialog">
            <div class="modal-content bg-info">
                <div class="modal-header">
                <h4 class="modal-title">Create Lead Source</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tty"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="lead_source" name="source" id="exampleInputEmail1" placeholder="Website" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-light save_source" onclick="SubForm('/addleadsource','ifrm_source','ileadsource')">Save </button>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
        </form>
        <!-- /.modal-dialog -->
      </div>
       {{-- =================Modal lead industry========================= --}}
    <div class="modal fade" id="modal-info-industry">
        <form id="ifrm_industry" >
            @csrf
            <div class="modal-dialog">
            <div class="modal-content bg-info">
                <div class="modal-header">
                <h4 class="modal-title">Create Lead industry</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-industry"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="lead_source" name="industry"  placeholder="Website" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-light save_source" onclick="SubForm('/addleadindustry','ifrm_industry','iindustry')">Save </button>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
        </form>
        <!-- /.modal-dialog -->
      </div>
      <script type="text/javascript" src="js/crm/crm.js"></script>   
  
    {{--Google Map--}}
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places,drawing&key=AIzaSyA4QECK3Tl4Sdl1zPIHiyZaME5mUaSk4WU&callback=initMap" async defer></script>    
    <script>
        var map;
        var markers = [];

        function initMap() {

            var haightAshbury = {
                lat: 11.620803,
                lng: 104.892215
            };


            var get_latlng = 0;
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12, // Set the zoom level manually
                center: haightAshbury,
                mapTypeId: 'roadmap'
            });
            
            
            //declear default value for latlong on map
            addMarker(haightAshbury);
            document.getElementById('latlong').value = '11.620803, 104.892215';
           
            // This event listener will call addMarker() when the map is clicked.
            map.addListener('click', function(event) {
                if (markers.length >= 1) {
                    deleteMarkers();
                }

                addMarker(event.latLng);
                get_latlng = event.latLng.lat().toFixed(6) +', '+ event.latLng.lng().toFixed(6);
                document.getElementById('latlong').value = get_latlng;
            });
        }

        // Adds a marker to the map and push to the array.
        function addMarker(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }

        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setMapOnAll(null);
        }

        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }
        
    </script>

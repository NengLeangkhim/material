
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create New Lead</h1>
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
                <!-- left column -->
                <div class="col-md-12">
                    <form role="form" action="">
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
                                            <label for="exampleInputEmail1">Customer Name English <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Customer Name English"  name='custEng' >
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                             <label for="exampleInputEmail1">Customer Name khmer <b style="color:red">*</b></label>
                                             <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="custkh" id="exampleInputEmail1" placeholder="Customer Name khmer">
                                            </div>
                                         </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Primary Email</label>
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
                                                <input type="text" class="form-control" name="phone"id="exampleInputEmail1" placeholder="Primary Phone">
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
                                            <label for="exampleInputEmail1">National ID Ceard / Passport ID</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="website" id="exampleInputEmail1" placeholder="Website">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Customer Type</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <select class="form-control" name="custtype">
                                                    <option>Select an Option</option>
                                                    <option>Publi</option>
                                                    <option>Staff</option>
                                                    <option>MNK Staff</option>
                                                    <option>UPG Staff</option>
                                                    <option>Tela Staff</option>
                                                    <option>City Glod Staff</option>
                                                    <option>Amory Staff</option>
                                                    <option>Other</option>
                                                </select>   
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Lead Source</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-tty"></i></span>
                                                </div>
                                                <select class="form-control" name="leadsource" id="ileadsource">
                                                    <option>Select Lead source</option>
                                                    @foreach($lead_source as $row)
                                                        <option value="{{$row->id}}">{{$row->name_en}}</option>                                                  
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                    <span class="input-group-text btn btn-info" data-toggle="modal" data-target="#modal-info"><i class="fas fa-plus"></i></span>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Lead Status</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                                                </div>
                                                <select class="form-control" name="leadstatus">
                                                    <option >Select Lead Status</option> 
                                                    @foreach($lead_status as $row)  
                                                        <option value="{{$row->id}}">{{$row->name_en}}</option>   
                                                    @endforeach
                                                </select>
                                            </div>                                              
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Industry <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                                </div>
                                                <select class="form-control " name="industry" id="iindustry">
                                                    <option> Select industry</option>
                                                    @foreach($lead_industry as $row )
                                                        <option value="{{$row->id}}">{{$row->name_en}}</option> 
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" data-toggle="modal" data-target="#modal-info-industry"><i class="fas fa-plus"></i></span>
                                                </div>
                                            </div>   
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Assigened To<b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="height:38px;width:40px">
                                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                                </div>
                                                <select class="form-control select2 to " name="assigendTo" >
                                                    <option>Select Staff</option>
                                                    @foreach($assig_to as $row )
                                                        <option value="{{$row->id}}">{{$row->name}}</option> 
                                                    @endforeach
                                                </select>
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
                                                                    <input type="text" class="form-control"  name='homeEN' id="exampleInputEmail1" placeholder="Number of home" >    
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="exampleInputEmail1"> Street(EN) <b style="color:red">*</b></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-road"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control"  name='streetEN' id="exampleInputEmail1" placeholder="Number of street" >    
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
                                                    <select class="form-control select2 city"  id="icity" name="city" onchange="getbranch(this,'idistrict','s','/district')">
                                                        <option>Select city/povince</option>
                                                     @foreach($province as $row )
                                                        <option value="{{$row->gzcode}}">{{$row->latinname}}/{{$row->khname}}</option> 
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
                                                                    <input type="text" class="form-control"  name='streetKH' id="exampleInputEmail1" placeholder="Number of street" >    
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
                                                    <select class="form-control dynamic" name="district" id="idistrict" onchange="getbranch(this,'icommune','s','/commune')">
                                                        <option>Select Khan/District </option> 
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
                                                    <input type="text" class="form-control"  name='latlng' id="exampleInputEmail1" placeholder="11.572532,104.898974" >
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Sengkat/Commune <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-street-view"></i></span>
                                                    </div>
                                                    <select class="form-control dynamic" name="commune" id="icommune" onchange="getbranch(this,'ivillage','s','/village')">
                                                        <option>Select Sengkat/Commune </option>
                                                    </select>        
                                                </div> 
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Village <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                                    </div>
                                                    <select class="form-control " name="village" id="ivillage" dats-dependent="village">
                                                        <option>select Village</option>                                                        
                                                    </select>     
                                                </div> 
                                                
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                            </div>
                                        </div>
                                    </div> 
                                </div>              
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Saves</button>
                            <button type="submit" class="btn btn-danger">Cencel</button>
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
                            <span class="input-group-text"><i class="fas fa-tty"></i></span>
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
    <script type="text/javascript">
            $('.lead').click(function(e)
            {
                var ld = $(this).attr("​value");
                e.preventDefault();  
                // alert(ld);
                    $.ajax({   
                        type: 'GET',   
                        url:ld,
                        success:function(data){

                            $(".content-wrapper").show();
                            $(".content-wrapper").html(data);
                    }
                });
            })
            $(function(){
                 //Initialize Select2 Elements
                     $('.select2').select2()
            })

            $('.to').change(function(e){
                var to = $(this). children("option:selected"). val();
                alert(to);
            })
        
            </script>
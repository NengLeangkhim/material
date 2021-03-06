
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><span><i class="fas fa-plus"></i></span> Create New Organization</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0);" class="CrmOrganization" onclick="go_to('/organizations')" ​value="organization">Organization</a></li>
                        <li class="breadcrumb-item active">New Organization</li>
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
                    <form id="frm_CrmOrganization">
                        @csrf
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header" style="background:#1fa8e0">
                                <h3 class="card-title">Organization Detail</h3>
                            </div>                            
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="contact">Select Contact <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <select class="form-control" name="contact" id="contact" >
                                                    <option></option>
                                                    @foreach($contact as $row)
                                                        <option value="{{$row->id}}">{{$row->name_en}}</option>                                                  
                                                    @endforeach
                                                </select>
                                                <span class="invalid-feedback" role="alert" id="contactError"> {{--span for alert--}}
                                                    <strong></strong>
                                                </span>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <label for="company_en">Company Name English <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Customer Name English"  name='company_en' id="company_en"  required>
                                                <span class="invalid-feedback" role="alert" id="company_enError"> {{--span for alert--}}
                                                    <strong></strong>
                                                </span>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                                <label for="company_kh">Company Name khmer <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                   <div class="input-group-prepend">
                                                       <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                   </div>
                                                   <input type="text" class="form-control" name="company_kh" id="company_kh" placeholder="Customer Name khmer" >
                                                   <span class="invalid-feedback" role="alert" id="company_khError"> {{--span for alert--}}
                                                       <strong></strong>
                                                   </span>
                                               </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <label for="primary_email">Primary Email<b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                </div>
                                                <input type="email" class="form-control"  name="primary_email" id="primary_email" placeholder="Primary Email">
                                                <span class="invalid-feedback" role="alert" id="primary_emailError"> {{--span for alert--}}
                                                    <strong></strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="primary_phone">Primary Phone <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="primary_phone"id="primary_phone" placeholder="Primary Phone" >
                                                <span class="invalid-feedback" role="alert" id="primary_phoneError"> {{--span for alert--}}
                                                    <strong></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="website">Website</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="website" id="website" placeholder="Website">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="company_facebook">Facebook</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="company_facebook" id="company_facebook" placeholder="Facebook">
                                            </div>   
                                        </div>
                                        <div class="col-md-6">
                                            <label for="customer_type">Customer Type <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <select class="form-control" name="customer_type" id="customer_type">
                                                    <option></option>
                                                    <option>Publi</option>
                                                    <option>Staff</option>
                                                    <option>MNK Staff</option>
                                                    <option>UPG Staff</option>
                                                    <option>Tela Staff</option>
                                                    <option>City Glod Staff</option>
                                                    <option>Amory Staff</option>
                                                    <option>Other</option>
                                                </select>   
                                                <span class="invalid-feedback" role="alert" id="customer_typeError"> {{--span for alert--}}
                                                    <strong></strong>
                                                </span>
                                            </div>                             
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="lead_source">Lead Source <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-tty"></i></span>
                                                </div>
                                                <select class="form-control" name="lead_source" id="lead_source" >
                                                    <option></option>
                                                    @foreach($lead_source as $row)
                                                        <option value="{{$row->id}}">{{$row->lead_source}}</option>                                                  
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                    <span class="input-group-text btn btn-info" data-toggle="modal" data-target="#modal-info"><i class="fas fa-plus"></i></span>
                                                </div>
                                                <span class="invalid-feedback" role="alert" id="lead_sourceError"> {{--span for alert--}}
                                                    <strong></strong>
                                                </span>
                                            </div>    
                                        </div>
                                        <div class="col-md-6">
                                            <label for="leadstatus">Lead Status</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                                                </div>
                                                <select class="form-control" name="leadstatus" id="leadstatus">
                                                    <option ></option> 
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
                                            <label for="lead_industry">Industry <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                                </div>
                                                <select class="form-control " name="lead_industry" id="lead_industry" >
                                                    <option> </option>
                                                    @foreach($lead_industry as $row )
                                                        <option value="{{$row->id}}">{{$row->name_en}}</option> 
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                    <span class="input-group-text btn btn-info" data-toggle="modal" data-target="#modal-info-industry"><i class="fas fa-plus"></i></span>
                                                </div>
                                                <span class="invalid-feedback" role="alert" id="lead_industryError"> {{--span for alert--}}
                                                    <strong></strong>
                                                </span>
                                            </div>       
                                        </div>
                                        <div class="col-md-6">
                                            <label for="assigendTo">Assigened To<b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                                </div>
                                                <select class="form-control" name="assigendTo" id="assigendTo">
                                                    <option></option>
                                                    @foreach($assig_to as $row )
                                                        <option value="{{$row->id}}">{{$row->first_name_en}} {{$row->last_name_en}}</option> 
                                                    @endforeach
                                                </select>
                                                <span class="invalid-feedback" role="alert" id="assigendToError"> {{--span for alert--}}
                                                    <strong></strong>
                                                </span>
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
                                                                <label for="home_en"> Home(EN)<b style="color:red">*</b></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control"  name='home_en' id="home_en" placeholder="Number of home"  >
                                                                    <span class="invalid-feedback" role="alert" id="home_enError"> {{--span for alert--}}
                                                                        <strong></strong>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="street_en"> Street(EN) <b style="color:red">*</b></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-road"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control"  name='street_en' id="street_en" placeholder="Number of street"  >
                                                                    <span class="invalid-feedback" role="alert" id="street_enError"> {{--span for alert--}}
                                                                        <strong></strong>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="city">City/Province <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                                                    </div>
                                                    <select class="form-control select2 city"  id="city" name="city" onchange="getbranch(this,'district','s','/district')" >
                                                        <option></option>
                                                     @foreach($province as $row )
                                                        <option value="{{$row->code}}">{{$row->name_latin}}/{{$row->name_kh}}</option> 
                                                        @endforeach
                                                    </select>     
                                                    <span class="invalid-feedback" role="alert" id="cityError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
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
                                                                <label for="home_kh"> Home(KH)<b style="color:red">*</b></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control"  name='home_kh' id="home_kh" placeholder="Number of home" >
                                                                    <span class="invalid-feedback" role="alert" id="home_khError"> {{--span for alert--}}
                                                                        <strong></strong>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="street_kh"> Street(KH) <b style="color:red">*</b></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-road"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control"  name='street_kh' id="street_kh" placeholder="Number of street"  >
                                                                    <span class="invalid-feedback" role="alert" id="street_khError"> {{--span for alert--}}
                                                                        <strong></strong>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="district">Khan/District <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                                    </div>
                                                    <select class="form-control dynamic" name="district" id="district" onchange="getbranch(this,'commune','s','/commune')" >
                                                        <option> </option> 
                                                    </select>
                                                    <span class="invalid-feedback" role="alert" id="districtError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="latlong"> Lead Map <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"  name='latlong' id="latlong" placeholder="11.123456, 104.123456 Example" >
                                                    <span class="invalid-feedback" role="alert" id="latlongError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <label for="commune">Sengkat/Commune <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-street-view"></i></span>
                                                    </div>
                                                    <select class="form-control dynamic" name="commune" id="commune" onchange="getbranch(this,'village','s','/village')" >
                                                        <option> </option>
                                                    </select>        
                                                    <span class="invalid-feedback" role="alert" id="communeError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div> 
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <label for="village">Village <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                                    </div>
                                                    <select class="form-control " name="village" id="village" dats-dependent="village" >
                                                        <option value="">select Village</option>                                                        
                                                    </select>     
                                                    <span class="invalid-feedback" role="alert" id="villageError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
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
                                        <button type="button" class="btn btn-primary" onclick="CrmSubmitFormFull('frm_CrmOrganization','/organizations/store','/organization','Insert Successfully')" id="frm_btn_sub_addlead">Save</button>
                                        <button type="button" class="btn btn-danger" onclick="go_to('organization')">Cencel</button>
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
            // $('.save').click(function(){
            //     submit_form ('/addlead','frm_lead','lead');
            // })
    </script>
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

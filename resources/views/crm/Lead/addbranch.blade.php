                            <input type="hidden" name="createLeadBranch" value="createLeadBranch" readonly>
                            <div class="card card-primary">
                                <div class="card-header" style="background:#1fa8e0">
                                    <h3 class="card-title">Lead Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
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
                                            <div class="col-md-6">
                                                <label for="company_kh">Company Name khmer </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="company_kh" id="company_kh" placeholder="Customer Name khmer" >
                                                    {{-- <span class="invalid-feedback" role="alert" id="company_khError"> span for alert
                                                        <strong></strong>
                                                    </span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="primary_email">Primary Email</label>
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

                                            <div class="col-md-6">
                                                <label for="primary_phone">Primary Phone<b style="color:red">*</b> </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="primary_phone"id="primary_phone" placeholder="Primary Phone" onkeypress="return onlyNumberKey(event)" >
                                                    <span class="invalid-feedback" role="alert" id="primary_phoneError">
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">

                                            {{-- <div class="col-md-6">
                                                <label for="lead_status">Lead Status</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                                                    </div>
                                                    <select class="form-control" name="lead_status" id="lead_status">
                                                        <option value=''>-- Select Lead Status --</option>
                                                        @foreach($lead_status as $row)
                                                            <option value="{{$row->id}}">{{$row->name_en}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="invalid-feedback" role="alert" id="lead_statusError">
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div> --}}

                                            <div class="col-md-6">
                                                <label for="assig_to">Assigened To<b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                                    </div>
                                                    <select class="form-control" name="assig_to" id="assig_to">
                                                        <option value=''>-- Select Lead Assigened To --</option>
                                                        @foreach($assig_to as $row )
                                                            <option value="{{$row->id}}">{{$row->first_name_en}} {{$row->last_name_en}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="invalid-feedback" role="alert" id="assig_toError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="service">Service</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-speakap"></i></span>
                                                    </div>
                                                    <select class="form-control"  multiple="multiple" name="service" id="service">
                                                        <option value=''>-- Select Lead Assigened To --</option>
                                                    </select>
                                                    <span class="invalid-feedback" role="alert" id="serviceError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="comment">Comment</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-comments"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="comment" id="comment" placeholder="comment">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <!-- Select contact -->
                             <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-6">
                                            <label for="contact">Search Contact </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                                </div>
                                                <input type="text" hidden value="{{$_SESSION['token']}}" id="getcontact">
                                                <select class="form-control" name="contact_id" id="contact_id">
                                                    {{-- <option value='{{$_SESSION['token']}}' >-- Select Contact  --</option>                                       --}}
                                                    <option value=''>-- Select Contact  --</option>
                                                </select>

                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add contact -->
                            <div class="card card-primary">
                                <div class="card-header" style="background:#1fa8e0">
                                    <h3 class="card-title">Contact Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">                                           
                                            <div class="col-md-6">
                                                <label for="name_en">Full Name English </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Last Name" >
                                                    {{-- <span class="invalid-feedback" role="alert" id="name_enError">
                                                        
                                                        <strong></strong>
                                                    </span> --}}
                                                     {{--span for alert--}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="name_kh">Full Name Khmer </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Frist Name"  name='name_kh' id="name_kh" >
                                                    {{-- <span class="invalid-feedback" role="alert" id="name_khError"> span for alert --}}
                                                        {{-- <strong></strong>
                                                    </span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1"> Email </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                    </div>
                                                    <input type="email" class="form-control"  name="email" id="email" placeholder="Email">
                                                    {{-- <span class="invalid-feedback" role="alert" id="emailError"> span for alert
                                                        <strong></strong>
                                                    </span> --}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone"> Phone </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="phone"id="phone" placeholder="Primary Phone" >
                                                    {{-- <span class="invalid-feedback" role="alert" id="phoneError"> span for alert
                                                        <strong></strong>
                                                    </span> --}}
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
                                                                <label for="honorifics">Honorifics</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                                                    </div>
                                                                    <select class="form-control " name="ma_honorifics_id" id="ma_honorifics_id" >
                                                                        <option value=''>-- Select Contact Honorifics --</option>
                                                                        <option value='1'>Mr</option>
                                                                        <option value='2'>Ms</option>

                                                                    </select>
                                                                    <span class="invalid-feedback" role="alert" id="ma_honorifics_idError">
                                                                        <strong></strong>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="position">Position </label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="position" id="position" placeholder="Position">
                                                                    {{-- <span class="invalid-feedback" role="alert" id="phoneError"> span for alert
                                                                        <strong></strong>
                                                                    </span> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="national_id">National ID Ceard / Passport ID </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="national_id" id="national_id" placeholder="National ID Ceard ">
                                                    {{-- <span class="invalid-feedback" role="alert" id="national_idError"> span for alert
                                                        <strong></strong>
                                                    </span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header" style="background:#1fa8e0">
                                    <h3 class="card-title"> Install Address </h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="home_en"> Home(EN)</label>
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
                                                                <label for="street_en"> Street(EN) </label>
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
                                                <label for="addresscode">City/Province <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                                                    </div>
                                                    <select class="form-control addresscode"  id="addresscode" name="addresscode" onchange="getbranch(this,'district','s','/district')" >
                                                        <option></option>
                                                        @foreach($province as $row )
                                                        <option value="{{$row->code}}">{{$row->name_latin}}/{{$row->name_kh}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="invalid-feedback" role="alert" id="addresscodeError"> {{--span for alert--}}
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
                                                                <label for="home_kh"> Home(KH)</label>
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
                                                                <label for="street_kh"> Street(KH) </label>
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
                                                <label for="district">Khan/District </label>
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
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            {{-- <div class="col-md-6">
                                                                <label for="address_type">Address Type <b style="color:red">*</b></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                                                    </div>
                                                                    <select class="form-control " name="address_type" id="address_type" >
                                                                        <option value="">Select Address Type</option>
                                                                        <option value="billing">Billing</option>
                                                                        <option value="install">Install</option>
                                                                        <option value="main">Main</option>
                                                                    </select>
                                                                    <span class="invalid-feedback" role="alert" id="address_typeError"> {{--span for alert--}}
                                                                        {{-- <strong></strong>
                                                                    </span>
                                                                </div> --}}
                                                            {{-- </div> --}} 
                                                            <div class="col-md-6">
                                                                <div class="input-group pt-4 pl-2">
                                                                    <div class="input-group-prepend pr-4">
                                                                        <span class="font-weight-bold">Survey</span>
                                                                    </div>
                                                                    <div class="custom-control custom-radio ml-2">
                                                                        <input type="radio" id="customRadio2" value="1" name="checksurvey" class="custom-control-input">
                                                                        <label class="custom-control-label" for="customRadio2">Yes</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio ml-4">
                                                                        <input type="radio" id="customRadio1" value="0" name="checksurvey" class="custom-control-input">
                                                                        <label class="custom-control-label" for="customRadio1">No</label>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="custom-control custom-checkbox">
                                                                    <input class="custom-control-input" type="checkbox" id="customCheckbox2" value="1" name="checksurvey" >
                                                                    <label for="customCheckbox2"  class="custom-control-label">Survey Or Don't Survey</label>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                                        <button type="button" class="btn btn-primary" id="frm_btn_sub_addlead" onclick="CrmSubmitFormFull('frm_Crmlead','/lead/store','/lead','Insert Successfully')">Save</button>
                                        <button type="button" class="btn btn-danger" onclick="go_to('lead')">Cencel</button>
                                    </div>
                                </div>
                            </div>
                            <script src="https://maps.googleapis.com/maps/api/js?libraries=places,drawing&key=AIzaSyA4QECK3Tl4Sdl1zPIHiyZaME5mUaSk4WU&callback=initMap" async defer></script>
                            <script>
                                var map;
                                var markers = [];
                        
                                function initMapBranch() {
                        
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
                                $(function(){
                                    //Initialize Select2 Elements
                                        $('#assig_to').select2();
                                        $('#addresscode').select2();
                                        $('#service').select2();
                                })
                                    // get data into combobox branch
                                $('#branch').ready(function(){
                                // $('#branch').find('option').not(':first').remove();
                                    $.ajax({
                                        // url:'http://127.0.0.1:8000/api/branch',
                                        url:'api/branch',
                                        type:'get',
                                        dataType:'json',
                                        headers: {
                                            'Authorization': `Bearer {{$_SESSION['token']}}`,
                                        },
                                        success:function(response){
                                                for(var i=0; i<response['data'].length ;i++){
                                                    var id = response['data'][i].ma_company_branch_id;
                                                    var name = response['data'][i].name;
                                                    var company = response['data'][i].company;
                                                    // alert(name);
                                                    var option = "<option value='"+id+"'>"+name+" / "+company+"</option>";
                        
                                                    $("#branch").append(option);
                                                }
                                        //     }
                                        }
                                    })
                        
                                })
                        
                                // get  current_speed_isp in  selection
                                $('#current_speed_isp').ready(function(){
                                  $('#current_speed_isp').find('option').not(':first').remove();
                                      $.ajax({
                                          url:'api/currentsppedisp',
                                          type:'get',
                                          dataType:'json',
                                          success:function(response){
                        
                                                  for(var i=0; i<response['data'].length ;i++){
                                                      var id = response['data'][i].id;
                                                      var name = response['data'][i].name_en;
                                                      // alert(name);
                                                      var option = "<option value='"+id+"'>"+name+"</option>";
                        
                                                      $("#current_speed_isp").append(option);
                                                  }
                                          //     }
                                          }
                                      })
                        
                                  })
                        
                              // get  service in  selection
                                $('#service').ready(function(){
                                  $('#service').find('option').not(':first').remove();
                                      $.ajax({
                                          url:'api/stock/service',
                                          type:'get',
                                          dataType:'json',
                                          success:function(response){
                                                  $.each(response['data'], function(i,item){
                                                    var id = response['data'][i].id;
                                                      var name = response['data'][i].name;
                                                      // alert(name);
                                                      var option = "<option value='"+id+"'>"+name+"</option>";
                        
                                                      $("#service").append(option);
                                                  })
                                          }
                                      })
                        
                                  })
                                $(document).ready(function(){
                                    // function search lead
                                    $('#lead_id').select2({
                                        ajax: {
                                            url: '/lead/search',
                                            dataType: 'json',
                                            type:'get',
                                            delay: 250,
                                            data: function (params) {
                                                return {  
                                                    search: params.term // search term
                                                };   
                                            },
                                            processResults: function (response) {
                                                return {
                                                    results: response.data
                                                };
                                            },
                                            cache: true
                                        }
                                    });
                                    // function search lead contacr
                                    $('#contact_id').select2({
                                        ajax: {
                                            url: '/contact/search',
                                            dataType: 'json',
                                            type:'get',
                                            delay: 250,
                                            data: function (params) {
                                                return {  
                                                    search: params.term // search term
                                                };   
                                            },
                                            processResults: function (response) {
                                                return {
                                                    results: response.data
                                                };
                                            },
                                            cache: true
                                        }
                                    });

                                });
                                    // number phone
                                    function onlyNumberKey(evt) {
                                  // Only ASCII charactar in that range allowed
                                        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                                        // alert(ASCIICode);
                                        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                                            return false;
                                        return true;
                                    }
        // get value in search contact from selection and show in each field
        $( "#contact_id" ).on('select2:select', function (e){
          $("#name_en").val(''); //set option null before change
          $("#name_kh").val('');
          $("#email").val('');
          $("#phone").val('');
          $("#national_id").val('');
          $("#position").val('');
          $("#ma_honorifics_id").val('');
          var to = $(this).children("option:selected"). val();
          var myvar= $( "#getcontact" ).val();
          if(to=='Not'){
            $("#name_en").val('');
            $("#name_kh").val('');
            $("#email").val('');
            $("#phone").val('');
            $("#national_id").val('');
            $("#position").val('');
            $("#ma_honorifics_id").val('');
            $('#name_en').prop('readonly', false);
            $('#name_kh').prop('readonly', false);
            $('#email').prop('readonly', false);
            $('#phone').prop('readonly', false);
            $('#national_id').prop('readonly', false);
            $('#position').prop('readonly', false);
            $('#ma_honorifics_id').attr('disabled', false);
          }else{
            $.ajax({
              url:'/api/contact/'+to,
              type:'get',
              dataType:'json',
              headers: {
                'Authorization': `Bearer ${myvar}`,
              },
              success:function(response){

                          var name_en = response.data.name_en;
                          var name_kh = response.data.name_kh;
                          var email = response.data.email;
                          var phone = response.data.phone;
                          var national_id = response.data.national_id;
                          var position = response.data.position;
                          if(response.data.honorifics == null){
                             var honorifics_id ='';
                          }else{
                            var honorifics_id = response['data'].honorifics.id;
                          }
                          $("#name_en").val(name_en);
                          $("#name_kh").val(name_kh);
                          $("#email").val(email);
                          $("#phone").val(phone);
                          $("#national_id").val(national_id);
                          $("#position").val(position);
                          $("#ma_honorifics_id").val(honorifics_id);
          
                          $('#name_en').prop('readonly', true);
                          $('#name_kh').prop('readonly', true);
                          $('#email').prop('readonly', true);
                          $('#phone').prop('readonly', true);
                          $('#national_id').prop('readonly', true);
                          $('#position').prop('readonly', true);
                          $('#ma_honorifics_id').attr('disabled', true);
  
  
              }
            })
          }
        });

                            </script>
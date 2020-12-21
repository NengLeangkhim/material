<!-- modal Insert-->
<form id="crm_branch_address_form">
    <div class="modal fade show" id="crm_branch_address_modal" tabindex="-1" role="dialog" aria-labelledby="crm_branch_address" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title hrm-title"><strong><i class="fas fa-edit"></i></strong></h3>
                    <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">Update Address</h2>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <button type="button" class="btn btn-tool" data-dismiss="modal" aria-label="Close">
                       <i class="fas fa-times"></i>
                     </button>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <input type="hidden" name="lead_address_id" value="{{$address[0]['id']}}">
                    <input type="hidden" name="lead_id" value="{{$address[0]['crm_lead_id']}}">
                     <div class="alert alert-danger print-error-msg" style="display:none"> {{-- div for show error --}}
                        <ul></ul>
                     </div>
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
                                                    <input type="text" class="form-control"  name='home_en' id="home_en" placeholder="Number of home"  value="{{$address[0]['hom_en']}}">
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
                                                    <input type="text" class="form-control"  name='street_en' id="street_en" placeholder="Number of street"  value="{{$address[0]['street_en']}}">
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
                                <label for="addresscode">City/Province <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                                    </div>
                                    <select class="form-control select2 addresscode"  id="addresscode" name="addresscode" onchange="getbranch(this,'district','s','/district')" >
                                        <option></option>
                                        @foreach($province as $row )
                                        <option value="{{$row->code}}" {{$row->name_latin==$address[0]['province'] ? 'selected="selected"':''}}>{{$row->name_latin}} / {{$row->name_kh}}</option>
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
                                                    <input type="text" class="form-control"  name='home_kh' id="home_kh" placeholder="Number of home" value="{{$address[0]['home_kh']}}">
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
                                                    <input type="text" class="form-control"  name='street_kh' id="street_kh" placeholder="Number of street" value="{{$address[0]['street_kh']}}"  >
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
                                <label for="district">Khan/District <span class="text-danger">*</span> </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                    </div>
                                    <select class="form-control select2 dynamic" name="district" id="district" onchange="getbranch(this,'commune','s','/commune')" >
                                        <option value="{{$address[0]['district']}}">{{$address[0]['district']}}</option>
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
                                    <input type="text" class="form-control"  name='latlong' id="latlong" placeholder="11.123456, 104.123456 Example" value="{{$address[0]['latlg']}}" >
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
                                    <select class="form-control select2 dynamic" name="commune" id="commune" onchange="getbranch(this,'village','s','/village')" >
                                        <option value="{{$address[0]['commune']}}">{{$address[0]['commune']}}</option>
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
                                <label for="latlong"> Address Type <b style="color:red"></b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                                    </div>
                                    <input type="hidden" name="address_type" value="{{$address[0]['address_type']}}">
                                    <input type="text" class="form-control"  value="{{$address[0]['address_type']}}" disabled >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="village">Village <b style="color:red">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                    </div>
                                    <select class="form-control select2" name="village" id="village" dats-dependent="village" >
                                        <option value="{{$address[0]['gazetteer_code']}}">{{$address[0]['village']}}</option>
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
                     <div class="row text-right">
                        <div class="col-md-12 text-right">
                          {{-- <input type="hidden" name="id" id="lead_source_id"/> --}}
                          <button type="button" onclick='CrmSubmitModalAction("crm_branch_address_form","ActionAddressBranch","/crm/leadbranch/addressupdate","POST","crm_branch_address_modal","Successfully","/crm/leadbranch/address/{{$branch_id}}")' name="ActionAddressBranch" id="ActionAddressBranch"  class="btn btn-primary">Update</button>
                        </div>
                     </div>
                </div><!-- /.END card-body -->
              </div><!-- /.END card-Default -->
            </div>
        </div>
    </div>
</form>
<!-- end modal -->
<script src="https://maps.googleapis.com/maps/api/js?libraries=places,drawing&key=AIzaSyA4QECK3Tl4Sdl1zPIHiyZaME5mUaSk4WU&callback=initMap" async defer></script>
<script>
    var map;
        var markers = [];

        function initMap() {
            var latlong =document.getElementById('latlong').value;
                    latlong.replace('/[\(\)]//g','');
                    var coords = latlong.split(',');
                    var lat = parseFloat(coords[0]);
                    var long = parseFloat(coords[1]);

                    var haightAshbury = {
                        lat:lat,
                        lng:long
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

    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2({
            width:'85%',
            placeholder:'Please Select '
        })

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>

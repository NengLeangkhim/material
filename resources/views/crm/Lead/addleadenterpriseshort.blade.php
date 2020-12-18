
<section class="content">
    <div class="p-2">
        {{-- <div class="p-2 pl-4" >
            <h5><span><i class="fas fa-user-plus"></i></span> Add Lead Enterprise</h5>
        </div> --}}
        <div class="card-body">
            <form id="frm_Crmlead" method="POST">
                @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="lead">Lead</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                            </div>
                            {{-- <input type="text" hidden value="{{$_SESSION['token']}}" id="getlead"> --}}
                            <select name="lead_id" id="lead_id" class="form-control">
                                <option value='0'>-- Select Lead To Add Branch --</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="company_en">Name <b style="color:red">*</b></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Customer Name English"  name='company_en' id="company_en" onkeypress="return validENName(event)" required>
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
                        <label for="primary_phone">Phone <b style="color:red">*</b></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control" name="primary_phone"id="primary_phone" placeholder="Primary Phone" onkeypress="return validENNumber(event)">
                            <span class="invalid-feedback" role="alert" id="primary_phoneError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="lead_source">Lead Source <b style="color:red">*</b></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-tty"></i></span>
                            </div>
                            <select class="form-control select2" name="lead_source" id="lead_source" >
                                <option value=''>-- Select Lead Source --</option>
                                @if(is_array($lead_source))
                                    @foreach($lead_source as $row)
                                        <option value="{{$row->id}} ??">{{$row->lead_source ??""}}</option>
                                    @endforeach
                                @endisset

                            </select>

                            <span class="invalid-feedback" role="alert" id="lead_sourceError"> {{--span for alert--}}
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                </div>
            </div>


            <div class="form-group">
                <div class="row">

                    <div class="col-md-6">
                        <label for="lead_industry">Lead Industry <b style="color:red">*</b></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-industry"></i></span>
                            </div>
                            <select class="form-control select2" name="lead_industry" id="lead_industry" >
                                <option value=''>-- Select Lead Indusry --</option>
                                @if(is_array($lead_industry))
                                    @foreach($lead_industry as $row )
                                        <option value="{{$row->id ??""}}">{{$row->name_en ??""}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span class="invalid-feedback" role="alert" id="lead_industryError"> {{--span for alert--}}
                                <strong></strong>
                            </span>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label for="latlong"> Lead Map <b style="color:red">*</b></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map"></i></span>
                            </div>
                            <input type="text" class="form-control"  name='latlong' id="latlong" placeholder="11.123456, 104.123456 Example"  >
                            <span class="invalid-feedback" role="alert" id="latlongError"> {{--span for alert--}}
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="form-group pt-2">
                <div class="row-12">
                    <div class="col-12">
                        <div id="map"></div>

                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" id="frm_btn_sub_addlead" onclick="CrmSubmitFormFull('frm_Crmlead','/lead/store','/lead','Insert Successfully')">Save</button>
                <button type="button" class="btn btn-danger" onclick="go_to('lead')">Cencel</button>
            </div>
            </form>
        </div>
    </div>
</section>
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



        $(document).ready(function(){
            $('.select2').select2({
                placeholder: 'Select an option'
            });
            $('#lead_id').select2({
                ajax: {
                    url: '/lead/search',
                    dataType: 'json',
                    type:'get',
                    delay: 1200,
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



    </script>



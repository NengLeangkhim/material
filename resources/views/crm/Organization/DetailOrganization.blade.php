<style>
    /* @media only screen and (max-width: 500px) {
    #CrmLeadButtonConvert {
        font-size: 9px;
    }
} */
</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Organization Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="" class="lead" ​value="/organizations">Organization</a></li>
                    <li class="breadcrumb-item active">Organization Detail</li>
                </ol>
            </div>
        </div>
     </div><!-- /.container-fluid -->
</section> 
<section class="content">
    <div class="container-fluid">
      <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box card-header">
            <div class="col-12" >
              <div class="row">
                <div class="col-9">
                    <div class="row">
                        {{-- <div class="> --}}
                            <h3 class="card-title"​>
                                <i class="fas fa-hotel" style="padding-right:15px; font-size:35px"></i>
                                    {{-- <h6 style="font-weight: bold; font-size: 20px">drgdS</h6>  --}}
                                    Bo Entertainment
                            </h3>
                        {{-- </div> --}}
                    </div>
                </div>
                <div class="col-3" >
                   <div class="row">
                        {{-- <div class="col-12 " align="left"><button type="button" ​value="editlead/1" class="btn btn-primary btn-block btn-md CrmLeadEdit">Edit</button></div> --}}
                        {{-- <div class="col-6 " align="left"><button type="button"  class="btn btn-success btn-md">Convert</button></div> --}}
                   </div>
                </div>
              </div>
            </div>
        </div>
    </div>
      <!-- /.card -->      
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                {{-- Lead detail --}}
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bold">
                            {{-- <i class="fas fa-text-width"></i> --}}
                            Organization Detail
                        </h1>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 dt" >CID</dt>
                            <dd class="col-sm-8 dd" >N00004</dd>
                            <dt class="col-sm-4 dt">Organization Name</dt>
                            <dd class="col-sm-8 dd" >Bo Entertainment</dd>
                            <dt class="col-sm-4 dt">Customer Name</dt>
                            <dd class="col-sm-8 dd">Oppa Bo </dd>
                            {{-- <dd class="col-sm-8 offset-sm-4">Primary Email</dd> --}}
                            <dt class="col-sm-4 dt">Primary Email</dt>
                            <dd class="col-sm-8 dd">OppaBO@gmail.com</dd>
                            <dt class="col-sm-4 dt">Primary Phone </dt>
                            <dd class="col-sm-8 dd">0999999999
                            </dd>
                            <dt class="col-sm-4 dt">Customer Type </dt>
                            <dd class="col-sm-8 dd">Public
                            </dd>
                            <dt class="col-sm-4 dt">Vat Type </dt>
                            <dd class="col-sm-8 dd">Include
                            </dd>
                            <dt class="col-sm-4 dt">Is Convert From Lead </dt>
                            <dd class="col-sm-8 dd">Yes 
                            <dt class="col-sm-4 dt">Assigened To </dt>
                            <dd class="col-sm-8 dd">XD
                            </dd>
                        </dl>
                    </div>
                    <!-- /.card-body -->
                </div>
                {{-- end lead detail --}}
                {{-- address detail --}}
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bold">
                            {{-- <i class="fas fa-text-width"></i> --}}
                            Address Detail
                        </h1>
                    </div>
                    <!-- /.card-header -->
                     <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 dt" >Street</dt>
                            <dd class="col-sm-8 dd" >St 1234</dd>
                            <dt class="col-sm-4 dt">Home number</dt>
                            <dd class="col-sm-8 dd" ># 12A</dd>
                            <dt class="col-sm-4 dt">City/Province</dt>
                            <dd class="col-sm-8 dd">Phnom penh</dd>
                            {{-- <dd class="col-sm-8 offset-sm-4">Primary Email</dd> --}}
                            <dt class="col-sm-4 dt">District/Khan</dt>
                            <dd class="col-sm-8 dd">Chamkar Mon</dd>
                            <dt class="col-sm-4 dt">Commune/Sangkat </dt>
                            <dd class="col-sm-8 dd">Tonle Basak </dd>
                            <dt class="col-sm-4 dt">Village</dt>
                            <dd class="col-sm-8 dd">Phum 12 </dd>
                            <dt class="col-sm-4">LatLg</dt>
                            <dd class="col-sm-8">
                                <input type="text" class="form-control"  name='latlng' id="latlong" placeholder="11.123456, 104.123456 Example" >
                            </dd>
                        </dl>
                    </div>  
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
                    {{-- end address detail --}}
            </div>
            <div class="col-md-4">
                <div class="card card-secondary">
                    <div class="card-header">
                      <h3 class="card-title">Update</h3>        
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fas fa-minus"></i></button>
                      </div>
                    </div>
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>            
                            <p class="text-muted">
                              B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>            
                            <hr>            
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
            
                            <p class="text-muted">Malibu, California</p>
            
                            <hr>            
                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>            
                            <p class="text-muted">
                              <span class="tag tag-danger">UI Design</span>
                              <span class="tag tag-success">Coding</span>
                              <span class="tag tag-info">Javascript</span>
                              <span class="tag tag-warning">PHP</span>
                              <span class="tag tag-primary">Node.js</span>
                            </p>            
                            <hr>
                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>            
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>            
                            <p class="text-muted">
                              B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>            
                            <hr>            
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
            
                            <p class="text-muted">Malibu, California</p>
            
                            <hr>            
                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>            
                            <p class="text-muted">
                              <span class="tag tag-danger">UI Design</span>
                              <span class="tag tag-success">Coding</span>
                              <span class="tag tag-info">Javascript</span>
                              <span class="tag tag-warning">PHP</span>
                              <span class="tag tag-primary">Node.js</span>
                            </p>            
                            <hr>
                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>            
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                          </div>
                          <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./col -->
</section>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places,drawing&key=AIzaSyA4QECK3Tl4Sdl1zPIHiyZaME5mUaSk4WU&callback=initMap" async defer></script>
    
    
    <script>
        // alert();
        var map;
        var markers = [];

        function initMap() {

            var haightAshbury = {
                lat: 11.609033,
                lng: 104.789047,
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
        $('.CrmLeadEdit').click(function(e)
            {
                var id = $(this).attr("​value");
                go_to(id);
            });
    </script>

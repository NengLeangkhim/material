


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create New Quote</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="" class="CrmOrganization" ​value="organization">Quote</a></li>
                        <li class="breadcrumb-item active">New Quote</li>
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
                    <form id="frm_lead" action="">
                        @csrf
                        <!-- general form elements -->
                        <div class="card card-primary">
                                <div class="card-header" style="background:#1fa8e0">
                                    <h3 class="card-title">Quote Detail</h3>
                                </div>                            
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Organization Name<b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="English Name"  name='organiz_name'  required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Status <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                    </div>
                                                    <select  class="form-control" name="qutStatus">
                                                        <option>Active</option>
                                                        <option>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Validation<b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control"  name="qutValidate" id="qutValidate" placeholder="Selete Date">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1">Comment <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="phone"id="exampleInputEmail1" placeholder="Comment" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
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
                                    </div>                                --}}
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
                                                <label for="exampleInputEmail1"> Home(EN)<b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"  name='homeEN' id="exampleInputEmail1" placeholder="Number of home"  >    
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
                                                <label for="exampleInputEmail1"> Home(KH)<b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"  name='homeKH' id="exampleInputEmail1" placeholder="Number of home" >    
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
                                                <label for="exampleInputEmail1"> Street(KH) <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-road"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"  name='streetKH' id="exampleInputEmail1" placeholder="Number of street"  >    
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
                                </div>              
                        </div>
                        <div class="card card-primary">
                            <div class="card-header" style="background:#1fa8e0">
                                <h3 class="card-title">Item Detail</h3>
                            </div>                            
                            <div class="card-body table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <?php
                                            $x = 0 ;
                                        ?> 
                                        <tr>
                                            <th>No.</th>
                                            <th>Item Name</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                            <th><input type="button" class="btn btn-info" onclick="myFun();" name="" id="" value="Add Row" ></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if(isset($x)){
                                                if($x == 10){
                                                    echo '
                                                        <tr>
                                                            <td> 01--'.$x.'</td>
                                                            <td> 
                                                                <select class="form-control" style="width: auto; min-width: 100px;">
                                                                    <option value="">Item1</option>
                                                                    <option value="">Item2</option>
                                                                    <option value="">Item3</option>
                                                                    <option value="">Item4</option>
                                                                </select>
                                                            </td>
                                                            <td> <input type="text" class="form-control"  name="" id="" placeholder="Quanlity name" > </td>
                                                            <td> <input type="text" class="form-control"  name="" id="" placeholder="Unit price" > </td>
                                                            <td> <input type="text" class="form-control"  name="" id="" placeholder="Total" > </td>
                                                            <td> <input type="button" class="btn btn-info"  name="" id="" value="Delete" > </td>
                                                        </tr>                                                
                                                    ';
                                                $x = 0;
                                                }
                                            }    
                                        ?>
                                            
                    

                                    </tbody>
                                </table>
                                                    
                            </div>  
                        </div>
                        
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary save" id="frm_btn_sub_addlead">Save</button>
                            <button type="button" class="btn btn-danger" onclick="go_to('/organization')">Cencel</button>
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

    <script  type="text/javascript" >
        $(window).on('load', function() {
        
            alert('hello');
                // var url = window.location.href;
                // var params = url.split('?ID=');
                // var id = (params[1])
                // $.ajax({
                //     type:"POST",
                //     url:"addQuote.blade.php",
                //     data:{id:id},
                //     success:function(result){
                //         // $("#content").html(result);
                //     }
                // })
        });
    </script>
    
    <?php
            // $random = $_GET["id"];
            // echo $random;
        
    ?>
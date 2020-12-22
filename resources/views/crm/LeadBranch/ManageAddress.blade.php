@php
    foreach($address as $item){
        $branch_id = $item['branch_id'];
        $lead_id = $item['crm_lead_id'];
    }
@endphp
<!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-map-marked-alt"></i> Manage Address</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a onclick="go_to('/crm/leadbranch/detail/{{$branch_id}}')" href="javascript:void(0);">Customer Detail</a></li>
                <li class="breadcrumb-item active">View address</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- section Main content -->
<section class="content">
    <style>
        th {
            font-size: 16px;
        }

        td {
            font-size: 14px;
        }
    </style>
    <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box card-header">
            <div class="row">
                <div class="col-md-12">
                    <h5><b><i class="far fa-user"></i> Customer :</b> {{$address[0]['customer_name']}}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card"> {{--Install--}}
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title" style="color:#1fa8e0;font-weight:bold">
                                    Install Address
                                </h3>
                            </div>
                            <div class="col-6 text-right">
                            @php
                                $searchFor='install';
                                $install_address =
                                array_filter($address, function($element) use($searchFor){
                                    return isset($element['address_type']) && $element['address_type'] == $searchFor && $element['id'];
                                });
                                if(count($install_address)>0){
                                    $install_address=array_shift($install_address);
                                }else {
                                    $install_address='';
                                }
                               // dump($install_address);
                            @endphp
                                @if ($install_address['address_type']??''=='install')
                                 <button type="button" class="btn btn-info" onclick="UpdateBranchAddress({{$install_address['id']??''}},{{$branch_id??''}})"><i class="fas fa-pen-square"></i> Update</button>
                                @else
                                 <button type="button" class="btn btn-info" onclick="CreateBranchAddress('install',{{$lead_id??''}},{{$branch_id??''}})"><i class="fas fa-plus"></i> Create</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="row">
                                    <?php
                                        for($i =0;$i<sizeof($address); $i++){
                                            if($address[$i]['address_type']=='install'){
                                            ?>
                                            {{-- <input type=" " hidden value="{{$address[$i]['lead_detail_id']}}" name="lead_detail_id" id="lead_detail_id">
                                            <input type="text" class="form-control" hidden  value="{{$address[$i]['branch_id']}}"  name='branch_id' id="branch_id"  required>
                                            <input type="text" class="form-control" hidden  value="{{$address[$i]['comment']}}"  name='comment' id="comment"  required> --}}
                                                <dt class="col-sm-4 dt" >Street EN</dt>
                                                <dd class="col-sm-8 dd" >St {{$address[$i]["street_en"]??''}}</dd>
                                                <dt class="col-sm-4 dt">Home number EN</dt>
                                                <dd class="col-sm-8 dd" ># {{$address[$i]["hom_en"]??''}}</dd>
                                                <dt class="col-sm-4 dt" >Street KH</dt>
                                                <dd class="col-sm-8 dd" >ផ្លូវ {{$address[$i]["street_kh"]??''}}</dd>
                                                <dt class="col-sm-4 dt">Home number KH</dt>
                                                <dd class="col-sm-8 dd" ># {{$address[$i]["home_kh"]??''}}</dd>
                                                <dt class="col-sm-4 dt">City/Province</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["province"]??''}}</dd>
                                                {{-- <dd class="col-sm-8 offset-sm-4">Primary Email</dd> --}}
                                                <dt class="col-sm-4 dt">District/Khan</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["district"]??''}}</dd>
                                                <dt class="col-sm-4 dt">Commune/Sangkat </dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["commune"]??''}}</dd>
                                                <dt class="col-sm-4 dt">Village</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["village"]??''}} </dd>
                                                <dt class="col-sm-4 dt">Address EN</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["address_en"]??''}} </dd>
                                                <dt class="col-sm-4 dt">Address KH</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["address_kh"]??''}} </dd>
                                                <dt class="col-sm-4 dt">LatLg</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["latlg"]??''}} </dd>
                                                <dt class="col-sm-4 dt">Address type</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["address_type"]??''}} </dd>
                                                {{-- <dd class="col-sm-8"> --}}
                                                    <input type="text" class="form-control"  hidden name='latlg_install' id="latlg_install" value="{{$address[$i]["latlg"]}}" >
                                                {{-- </dd> --}}
                                            <?php
                                            }
                                        }
                                    ?>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                @for ($i = 0; $i<sizeof($address); $i++)
                                    @if ($address[$i]['address_type']=='install')
                                    <div id="map_install" class="css_map"></div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card"> {{--Main--}}
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title" style="color:#1fa8e0;font-weight:bold">
                                    Main Address
                                </h3>
                            </div>
                            <div class="col-6 text-right">
                                @php
                                $searchFor='main';
                                $install_address =
                                array_filter($address, function($element) use($searchFor){
                                    return isset($element['address_type']) && $element['address_type'] == $searchFor && $element['id'];
                                });
                                if(count($install_address)>0){
                                    $install_address=array_shift($install_address);
                                }else {
                                    $install_address='';
                                }
                               // dump($install_address);
                            @endphp
                                @if ($install_address['address_type']??''=='main')
                                 <button type="button" class="btn btn-info" onclick="UpdateBranchAddress({{$install_address['id']??''}},{{$branch_id??''}})"><i class="fas fa-pen-square"></i> Update</button>
                                @else
                                     <button type="button" class="btn btn-info" onclick="CreateBranchAddress('main',{{$lead_id??''}},{{$branch_id??''}})"><i class="fas fa-plus"></i> Create</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                       <div class="row">
                            <div class="col-md-6">
                                <dl class="row">
                                    <?php
                                        for($i =0;$i<sizeof($address); $i++){
                                            if($address[$i]['address_type']=='main'){
                                            ?>
                                            {{-- <input type=" " hidden value="{{$address[$i]['lead_detail_id']}}" name="lead_detail_id" id="lead_detail_id">
                                            <input type="text" class="form-control" hidden  value="{{$address[$i]['branch_id']}}"  name='branch_id' id="branch_id"  required>
                                            <input type="text" class="form-control" hidden  value="{{$address[$i]['comment']}}"  name='comment' id="comment"  required> --}}
                                                <dt class="col-sm-4 dt" >Street EN</dt>
                                                <dd class="col-sm-8 dd" >St {{$address[$i]["street_en"]??''}}</dd>
                                                <dt class="col-sm-4 dt">Home number EN</dt>
                                                <dd class="col-sm-8 dd" ># {{$address[$i]["hom_en"]??''}}</dd>
                                                <dt class="col-sm-4 dt" >Street KH</dt>
                                                <dd class="col-sm-8 dd" >ផ្លូវ {{$address[$i]["street_kh"]??''}}</dd>
                                                <dt class="col-sm-4 dt">Home number KH</dt>
                                                <dd class="col-sm-8 dd" ># {{$address[$i]["home_kh"]??''}}</dd>
                                                <dt class="col-sm-4 dt">City/Province</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["province"]??''}}</dd>
                                                {{-- <dd class="col-sm-8 offset-sm-4">Primary Email</dd> --}}
                                                <dt class="col-sm-4 dt">District/Khan</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["district"]??''}}</dd>
                                                <dt class="col-sm-4 dt">Commune/Sangkat </dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["commune"]??''}}</dd>
                                                <dt class="col-sm-4 dt">Village</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["village"]??''}} </dd>
                                                <dt class="col-sm-4 dt">Address EN</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["address_en"]??''}} </dd>
                                                <dt class="col-sm-4 dt">Address KH</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["address_kh"]??''}} </dd>
                                                <dt class="col-sm-4 dt">LatLg</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["latlg"]??''}} </dd>
                                                <dt class="col-sm-4 dt">Address type</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["address_type"]??''}} </dd>
                                                {{-- <dd class="col-sm-8"> --}}
                                                    <input type="text" class="form-control"  hidden name='latlg_main' id="latlg_main" value="{{$address[$i]["latlg"]}}" >
                                                {{-- </dd> --}}
                                            <?php
                                            }
                                        }
                                    ?>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                @for ($i = 0; $i<sizeof($address); $i++)
                                    @if ($address[$i]['address_type']=='main')
                                        <div id="map_main" class="css_map"></div>
                                    @endif
                                @endfor
                            </div>
                       </div>
                    </div>
                </div>
                <div class="card"> {{--Billing--}}
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title" style="color:#1fa8e0;font-weight:bold">
                                    Billing Address
                                </h3>
                            </div>
                            <div class="col-6 text-right">
                                @php
                                    $searchFor='billing';
                                    $install_address =
                                    array_filter($address, function($element) use($searchFor){
                                        return isset($element['address_type']) && $element['address_type'] == $searchFor && $element['id'];
                                    });
                                    if(count($install_address)>0){
                                        $install_address=array_shift($install_address);
                                    }else {
                                        $install_address='';
                                    }
                                // dump($install_address);
                                @endphp
                                @if ($install_address['address_type']??''=='billing')
                                 <button type="button" class="btn btn-info" onclick="UpdateBranchAddress({{$install_address['id']??''}},{{$branch_id??''}})"><i class="fas fa-pen-square"></i> Update</button>
                                @else
                                     <button type="button" class="btn btn-info" onclick="CreateBranchAddress('billing',{{$lead_id??''}},{{$branch_id??''}})"><i class="fas fa-plus"></i> Create</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="row">
                                    <?php
                                        for($i =0;$i<sizeof($address); $i++){
                                            if($address[$i]['address_type']=='billing'){
                                            ?>
                                            {{-- <input type=" " hidden value="{{$address[$i]['lead_detail_id']}}" name="lead_detail_id" id="lead_detail_id">
                                            <input type="text" class="form-control" hidden  value="{{$address[$i]['branch_id']}}"  name='branch_id' id="branch_id"  required>
                                            <input type="text" class="form-control" hidden  value="{{$address[$i]['comment']}}"  name='comment' id="comment"  required> --}}
                                                <dt class="col-sm-4 dt" >Street EN</dt>
                                                <dd class="col-sm-8 dd" >St {{$address[$i]["street_en"]??''}}</dd>
                                                <dt class="col-sm-4 dt">Home number EN</dt>
                                                <dd class="col-sm-8 dd" ># {{$address[$i]["hom_en"]??''}}</dd>
                                                <dt class="col-sm-4 dt" >Street KH</dt>
                                                <dd class="col-sm-8 dd" >ផ្លូវ {{$address[$i]["street_kh"]??''}}</dd>
                                                <dt class="col-sm-4 dt">Home number KH</dt>
                                                <dd class="col-sm-8 dd" ># {{$address[$i]["home_kh"]??''}}</dd>
                                                <dt class="col-sm-4 dt">City/Province</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["province"]??''}}</dd>
                                                {{-- <dd class="col-sm-8 offset-sm-4">Primary Email</dd> --}}
                                                <dt class="col-sm-4 dt">District/Khan</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["district"]??''}}</dd>
                                                <dt class="col-sm-4 dt">Commune/Sangkat </dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["commune"]??''}}</dd>
                                                <dt class="col-sm-4 dt">Village</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["village"]??''}} </dd>
                                                <dt class="col-sm-4 dt">Address EN</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["address_en"]??''}} </dd>
                                                <dt class="col-sm-4 dt">Address KH</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["address_kh"]??''}} </dd>
                                                <dt class="col-sm-4 dt">LatLg</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["latlg"]??''}} </dd>
                                                <dt class="col-sm-4 dt">Address type</dt>
                                                <dd class="col-sm-8 dd">{{$address[$i]["address_type"]??''}} </dd>
                                                {{-- <dd class="col-sm-8"> --}}
                                                    <input type="text" class="form-control"  hidden name='latlg_billing' id="latlg_billing" value="{{$address[$i]["latlg"]}}" >
                                                {{-- </dd> --}}
                                            <?php
                                            }
                                        }
                                    ?>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                @for ($i = 0; $i<sizeof($address); $i++)
                                    @if ($address[$i]['address_type']=='billing')
                                        <div id="map_billing" class="css_map"></div>
                                    @endif
                                @endfor
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     {{-- view_address --}}
     <div id="view_address"></div>
</section><!-- end section Main content -->
<script src="https://maps.googleapis.com/maps/api/js?libraries=places,drawing&key=AIzaSyA4QECK3Tl4Sdl1zPIHiyZaME5mUaSk4WU&callback=initMapInstall" async defer></script>
<script type="text/javascript">
     var map;
    var markers = [];
function initMapInstall() {
    var latlong =$('#latlg_install').val();
        if (typeof(latlong) !== "undefined"){
            latlong.replace('/[\(\)]//g','');
            var coords = latlong.split(',');
            var lat = parseFloat(coords[0]);
            var long = parseFloat(coords[1]);

            var haightAshbury = {
                lat:lat,
                lng:long
            };
            var get_latlng = 0;
            map = new google.maps.Map(document.getElementById('map_install'), {
                zoom: 12, // Set the zoom level manually
                center: haightAshbury,
                mapTypeId: 'roadmap'
            });
            //declear default value for latlong on map
            addMarker_install(haightAshbury);
        }
    // Main address /////////////////////////////
    var latlong_main =$('#latlg_main').val();
        if (typeof(latlong_main) !== "undefined"){
            latlong_main.replace('/[\(\)]//g','');
            var coords_main = latlong_main.split(',');
            var lat_main = parseFloat(coords_main[0]);
            var long_main = parseFloat(coords_main[1]);

            var haightAshbury_main = {
                lat:lat_main,
                lng:long_main
            };
            var get_latlng_main = 0;
            map_main = new google.maps.Map(document.getElementById('map_main'), {
                zoom: 12, // Set the zoom level manually
                center: haightAshbury_main,
                mapTypeId: 'roadmap'
            });
            //declear default value for latlong on map
            addMarker(haightAshbury_main);
        }
    // Billing address ////////////////////////
    var latlong_billing =$('#latlg_billing').val();
        if (typeof(latlong_billing) !== "undefined"){
            latlong_billing.replace('/[\(\)]//g','');
            var coords_billing = latlong_billing.split(',');
            var lat_billing = parseFloat(coords_billing[0]);
            var long_billing = parseFloat(coords_billing[1]);

            var haightAshbury_billing = {
                lat:lat_billing,
                lng:long_billing
            };
            var get_latlng_billing = 0;
            map_billing = new google.maps.Map(document.getElementById('map_billing'), {
                zoom: 12, // Set the zoom level manually
                center: haightAshbury_billing,
                mapTypeId: 'roadmap'
            });
            //declear default value for latlong on map
            addMarker_billing(haightAshbury_billing);
        }

}
// Adds a marker to the map and push to the array.
function addMarker_install(location) {
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
    markers.push(marker);
}
// Adds a marker to the map and push to the array.
function addMarker(location) {
    var marker = new google.maps.Marker({
        position: location,
        map: map_main
    });
    markers.push(marker);
}
// Adds a marker to the map and push to the array.
function addMarker_billing(location) {
    var marker = new google.maps.Marker({
        position: location,
        map: map_billing
    });
    markers.push(marker);
}
</script>

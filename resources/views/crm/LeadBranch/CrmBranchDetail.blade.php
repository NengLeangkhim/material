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
                <h1><span><i class="fas fa-code-branch"></i></span>Branch Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('/leadbranch')">Lead Branch</a></li>
                    <li class="breadcrumb-item active">Branch Detail</li>
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
                <div class="col-6">
                    <div class="row">
                        {{-- <div class="> --}}
                            <h3 class="card-title"​>
                                {{-- <i class="far fa-id-card" style="padding-right:15px; font-size:35px"></i> --}}
                                    {{-- <h6 style="font-weight: bold; font-size: 20px">drgdS</h6>  --}}
                                  
                            </h3>
                        {{-- </div> --}}
                    </div>
                </div>
                <div class="col-md-6 ">
                   <div class="row">
                    <?php
                    for($i =0;$i<sizeof($detailbranch); $i++){
                        ?>
                            <?php
                                if($detailbranch[$i]['lead_status_id']==2){
                                    ?>
                                    <div class="col-md-12 " >
                                        <button type="button" ​value="/crm/leadbranch/edit/{{$detailbranch[$i]["branch_id"]}}" class="btn btn-primary btn-md CrmLeadEdit form-control" >Edit</button>
                                        <input type="text" hidden value="{{$detailbranch[$i]["lead_status"]}}"  id="lead_status" >                                    
                                    </div>
                                    <?php
                                }
                                elseif($detailbranch[$i]['lead_status_id']==7){
                                    ?>
                                        <div class="col-md-6 ">
                                            <form id="frm_Crmlbranchsurvey" method="POST">
                                                @csrf                                
                                                <input type="text" class="form-control" hidden  value="{{$detailbranch[$i]['comment']}}"  name='comment' id="comment"  >
                                                <input type="text" hidden value="{{$detailbranch[$i]['lead_detail_id']}}" name="lead_detail_id" id="lead_detail_id">
                                                <input type="text" hidden value="{{$detailbranch[$i]['branch_id']}}" name="branch_id" id="branch_id">
                                            <button type="button"  class="btn btn-success btn-md form-control"  id="btn_convert"  value="{{$detailbranch[$i]["branch_id"]}}" onclick="submit_form('api/convertbranch','frm_Crmlbranchsurvey','/branch/{{$detailbranch[$i]['lead_id']}}')" >Convert To Organization</button>
                                            </form>
                                        </div>
                                        <div class="col-md-6 " >
                                            <button type="button" ​value="/crm/leadbranch/edit/{{$detailbranch[$i]["branch_id"]}}" class="btn btn-primary btn-md CrmLeadEdit form-control" >Edit</button>
                                            <input type="text" hidden value="{{$detailbranch[$i]["lead_status"]}}"  id="lead_status" >                                    
                                        </div>
                                    <?php
                                }
                                else {
                                    ?>
                                        <div class="col-md-6 ">
                                            <form id="frm_Crmlbranchsurvey" method="POST">
                                                @csrf                                
                                                <input type="text" class="form-control" hidden  value="{{$detailbranch[$i]['comment']}}"  name='comment' id="comment"  >
                                                <input type="text" hidden value="{{$detailbranch[$i]['lead_detail_id']}}" name="lead_detail_id" id="lead_detail_id">
                                                <input type="text" hidden value="{{$detailbranch[$i]['branch_id']}}" name="branch_id" id="branch_id">
                                            <button type="button"  class="btn btn-success btn-md form-control"  id="btn_convert"  value="{{$detailbranch[$i]["branch_id"]}}" onclick="submit_form('api/convertbranch','frm_Crmlbranchsurvey','/branch/{{$detailbranch[$i]['lead_id']}}')" >Convert To Organization</button>
                                            </form>
                                        </div>
                                        <div class="col-md-3 ">
                                            <form id="frm_Crmlbranchsurvey" method="POST">
                                                @csrf                                
                                                <input type="text" class="form-control" hidden  value="{{$detailbranch[$i]['comment']}}"  name='comment' id="comment"  >
                                                <input type="text" hidden value="{{$detailbranch[$i]['lead_detail_id']}}" name="lead_detail_id" id="lead_detail_id">
                                                <input type="text" hidden value="{{$detailbranch[$i]['branch_id']}}" name="branch_id" id="branch_id">
                                                <button type="button"  class="btn btn-danger btn-md form-control"  id="btn_convert"  value="{{$detailbranch[$i]["branch_id"]}}" onclick="submit_form('api/updatetojunk','frm_Crmlbranchsurvey','/branch/{{$detailbranch[$i]['lead_id']}}')" >Junk</button>
                                            </form>
                                        </div>
                                        <div class="col-md-3 " >
                                            <button type="button" ​value="/crm/leadbranch/edit/{{$detailbranch[$i]["branch_id"]}}" class="btn btn-primary btn-md CrmLeadEdit form-control" >Edit</button>
                                            <input type="text" hidden value="{{$detailbranch[$i]["lead_status"]}}"  id="lead_status" >                                    
                                        </div> 
                                    <?php
                                }
                            ?>
                                                               
                                
                        <?php
                    }
                    ?>
                   </div>
                </div>
              </div>
            </div>
        </div>
    </div>
      <!-- /.card -->      
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                {{-- Lead detail --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color:#1fa8e0;font-weight:bold">
                            {{-- <i class="fas fa-text-width"></i> --}}
                            Detail Branch
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <dl class="row">
                            {{-- <dt class="col-sm-4 dt" >Lead Number</dt> --}}
                            {{-- <dd class="col-sm-8 dd" >TT-LAD00000678</dd> --}}
                           <?php
                                for($i =0;$i<sizeof($detailbranch); $i++){
                                    ?>
                                        <dt class="col-sm-4 dt">Lead Number</dt>
                                        <dd class="col-sm-8 dd" >{{$detailbranch[$i]["lead_number"]}}</dd>
                                        <dt class="col-sm-4 dt">Company Name English</dt>
                                        <dd class="col-sm-8 dd" >{{$detailbranch[$i]["company_en"]}}</dd>
                                        <dt class="col-sm-4 dt">Company Name Khmer</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["company_kh"]}}</dd>
                                        <dt class="col-sm-4 dt">Primary Email</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["primary_email"]}}</dd>
                                        <dt class="col-sm-4 dt">Primary Phone</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["primary_phone"]}}</dd>
                                        <dt class="col-sm-4 dt">Company Branch </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["company_detail"]}} </dd> 
                                        <dt class="col-sm-4 dt">Vat Number </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["vat_number"]}}</dd>
                                        <dt class="col-sm-4 dt">Lead source </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["lead_source"]}} </dd>
                                        <dt class="col-sm-4 dt">Industry </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["lead_industry"]}} </dd>
                                        <dt class="col-sm-4 dt">Lead Status </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["lead_status"]}} </dd>
                                        <dt class="col-sm-4 dt">Assigened To </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]['assig']}}  </dd>
                                        <dt class="col-sm-4 dt">Service </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["service"]}} </dd>
                                        <dt class="col-sm-4 dt">Current ISP </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["current_isp"]}}  </dd>
                                        <dt class="col-sm-4 dt">Current Speed </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["current_isp_speed"]}}  </dd>
                                        <dt class="col-sm-4 dt">Current Price </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["current_isp_price"]}} </dd>
                                        <dt class="col-sm-4 dt">Employee Count</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["employee_count"]}} </dd>
                                        {{-- <dt class="col-sm-4 dt">Priority</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["priority"]}} </dd> --}}
                                        <dt class="col-sm-4 dt">Comment</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["comment"] ?? ''}} </dd>
                                        <dt class="col-sm-4 dt">Survey</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["survey_id"]!=null? 'YES':'NO'}}</dd>
                                        <dt class="col-sm-4 dt">Survey Result</dt>
                                        <dd class="col-sm-8 dd">
                                            <?php
                                                if($detailbranch[$i]["survey_id"]==null){
                                                    ?>
                                                    NO
                                                    <?php
                                                }
                                                else {
                                                    if($detailbranch[$i]["survey_comment"]==null){
                                                    ?>
                                                        Surveying
                                                    <?php
                                                    }
                                                    else {
                                                        ?>
                                                        {{$detailbranch[$i]["possible"]=='true' ? 'YES':'NO'}}
                                                        <?php
                                                    }
                                                }
                                               
                                            ?>
                                           
                                        </dd>
                                        <dt class="col-sm-4 dt">Survey Result Comment</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["survey_comment"]==null? '':$detailbranch[$i]["survey_comment"]}}</dd>
                                       
                                       
                                    <?php
                                }
                           ?>                           
                            {{-- <dd class="col-sm-8 offset-sm-4">Primary Email</dd> --}}
                            
                        </dl>
                    </div>
                    <!-- /.card-body -->
                </div>
                {{-- end lead detail --}}
                {{-- contact detail --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color:#1fa8e0;font-weight:bold">
                            {{-- <i class="fas fa-text-width"></i> --}}
                            Contact Detail
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <dl class="row">
                            <?php
                                for($i =0;$i<sizeof($detailbranch); $i++){
                                    ?>
                                        <dt class="col-sm-4 dt" >Gender</dt>
                                        <dd class="col-sm-8 dd" >{{$detailbranch[$i]["gender"]}}</dd>
                                        <dt class="col-sm-4 dt" >Name English</dt>
                                        <dd class="col-sm-8 dd" >{{$detailbranch[$i]["name_en_contact"]}}</dd>
                                        <dt class="col-sm-4 dt">Name Khmer</dt>
                                        <dd class="col-sm-8 dd" >{{$detailbranch[$i]["name_kh_contact"]}}</dd>
                                        <dt class="col-sm-4 dt">Email</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["email_contact"]}}</dd>
                                        {{-- <dd class="col-sm-8 offset-sm-4">Primary Email</dd> --}}
                                        <dt class="col-sm-4 dt">Facebook</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["facebook_contact"]}}</dd>
                                        <dt class="col-sm-4 dt">Phone</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["phone"]}}</dd>
                                        <dt class="col-sm-4 dt">Position </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["position"]}}</dd>
                                    <?php
                                }
                            ?>  
                            
                        </dl>
                    </div>
                </div>
                    {{-- end contact detail --}}
                    {{-- address detail --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color:#1fa8e0;font-weight:bold">
                            {{-- <i class="fas fa-text-width"></i> --}}
                            Address Detail
                        </h3>
                        
                    </div>
                    <!-- /.card-header -->
                     <div class="card-body">
                        <dl class="row">
                            <?php
                                for($i =0;$i<sizeof($detailbranch); $i++){
                                    ?>
                                    <input type=" " hidden value="{{$detailbranch[$i]['lead_detail_id']}}" name="lead_detail_id" id="lead_detail_id">
                                    <input type="text" class="form-control" hidden  value="{{$detailbranch[$i]['branch_id']}}"  name='branch_id' id="branch_id"  required>
                                    <input type="text" class="form-control" hidden  value="{{$detailbranch[$i]['comment']}}"  name='comment' id="comment"  required>
                                        <dt class="col-sm-4 dt" >Street EN</dt>
                                        <dd class="col-sm-8 dd" >St {{$detailbranch[$i]["street_en"]}}</dd>
                                        <dt class="col-sm-4 dt">Home number EN</dt>
                                        <dd class="col-sm-8 dd" ># {{$detailbranch[$i]["home_en"]}}</dd>
                                        <dt class="col-sm-4 dt" >Street KH</dt>
                                        <dd class="col-sm-8 dd" >ផ្លូវ {{$detailbranch[$i]["street_kh"]}}</dd>
                                        <dt class="col-sm-4 dt">Home number KH</dt>
                                        <dd class="col-sm-8 dd" ># {{$detailbranch[$i]["home_kh"]}}</dd>
                                        <dt class="col-sm-4 dt">City/Province</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["province"]}}</dd>
                                        {{-- <dd class="col-sm-8 offset-sm-4">Primary Email</dd> --}}
                                        <dt class="col-sm-4 dt">District/Khan</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["district"]}}</dd>
                                        <dt class="col-sm-4 dt">Commune/Sangkat </dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["commune"]}}</dd>
                                        <dt class="col-sm-4 dt">Village</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["village"]}} </dd>
                                        <dt class="col-sm-4 dt">Address EN</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["address_en"]}} </dd>
                                        <dt class="col-sm-4 dt">Address KH</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["address_kh"]}} </dd>
                                        <dt class="col-sm-4 dt">LatLg</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["latlong"]}} </dd>
                                        <dt class="col-sm-4 dt">Address type</dt>
                                        <dd class="col-sm-8 dd">{{$detailbranch[$i]["address_type"]}} </dd>
                                        {{-- <dd class="col-sm-8"> --}}
                                            <input type="text" class="form-control"  hidden name='latlng' id="latlong" value="{{$detailbranch[$i]["latlong"]}}" >
                                        {{-- </dd> --}}
                                    <?php
                                }
                            ?>  
                        </dl>
                    </div>  
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
                    {{-- end address detail --}}
            </div>
            {{-- <div class="col-md-4">
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
            </div> --}}
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
            // document.getElementById('latlong').value = '11.620803, 104.892215';
           
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
        $('#lead_status').ready(function(){
            // var id = $(this).attr("​value");
            var val=document.getElementById("lead_status").value;
            // alert(val);
            if(val!="qualified"){
                // alert("yes");
                document.getElementById("btn_convert").hidden = false;

            }
            else
            {
                //  alert("no");
                document.getElementById("btn_convert").hidden = true;
            }
        })
        //click to convert branch
        // $('#btn_convert').click(function(){
            
            // var val=document.getElementById("btn_convert").value;
            // var lead_detail_id=document.getElementById("lead_detail_id").value;
            // var comment=document.getElementById("comment").value;            
            // alert("Are you sure to convert branch");
            // $.ajax({
            //         // url:'api/convertbranch/'+val,
            //         url:'api/convertbranch',
            //         type:'POST',
            //         data:{id:val,detailid:lead_detail_id,com:comment},
            //         success:function(date){
              
            //             go_to("/lead");
                  
            //         }
            //     })

        // });
    </script>


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><span><i class="fas fa-pen-square"></i></span> Update Organization</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0);" class="CrmOrganization" onclick="go_to('organizations')">Organization</a></li>
                        <li class="breadcrumb-item active">Update Organization</li>
                        
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
                    <form id="frm_CrmOrganizationEdit">
                        @csrf
                        <input type="text" hidden value="{{$_SESSION['token']}}" id="gettoken">
                        <input name="address_id" value="{{$organize["crm_lead_address_id"]}}" type="hidden"/>
                        <input name="branch_id" value="{{$organize["branch_id"]}}" type="hidden"/>
                        <input name="lead_id" value="{{$organize["lead_id"]}}" type="hidden"/>
                        <input name="lead_con_bran_id" value="{{$organize["lead_con_bran_id"]}}" type="hidden"/>
                        <input name="assig_to" value="{{$organize["assig_id"]}}" hidden />
                        <input name="prioroty" value="{{$organize["priority"]}}" type="hidden"/>
                        <input name="address_type" value="{{$organize["address_type"]}}" type="hidden"/>
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
                                                <select class="form-control" name="contact_id" id="contact_id" >
                                                    <option></option>
                                                    @foreach($contact as $row)
                                                        @if($row->id === $organize["contact_id"])
                                                            <option selected value="{{$row->id}}">{{$row->name_en}}</option>
                                                        @else
                                                            <option value="{{$row->id}}">{{$row->name_en}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <span class="invalid-feedback" role="alert" id="contact_idError"> {{--span for alert--}}
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
                                                <input type="text" value="{{$organize["name_en_branch"]}}" class="form-control" placeholder="Customer Name English"  name='company_en' id="company_en"  required>
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
                                                   <input value="{{$organize["name_kh_branch"]}}" type="text" class="form-control" name="company_kh" id="company_kh" placeholder="Customer Name khmer" >
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
                                                <input value="{{$organize["email_branch"]}}" type="email" class="form-control"  name="primary_email" id="primary_email" placeholder="Primary Email">
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
                                                <input value="{{$organize["branch_phone"]}}" type="text" class="form-control" name="primary_phone"id="primary_phone" placeholder="Primary Phone" >
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
                                                <input value="{{$organize["website"]}}" type="text" class="form-control" name="website" id="website" placeholder="Website">
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
                                                <input value="{{$organize["facebook"]}}" type="text" class="form-control" name="company_facebook" id="company_facebook" placeholder="Facebook">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lead_source">Lead Source <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-tty"></i></span>
                                                </div>
                                                <select class="form-control" name="lead_source" id="lead_source" >
                                                    <option></option>
                                                    @foreach($lead_source as $row)
                                                        @if($row->lead_source === $organize["lead_source"])
                                                            <option selected value="{{$row->id}}">{{$row->lead_source}}</option>
                                                        @else
                                                            <option value="{{$row->id}}">{{$row->lead_source}}</option>
                                                        @endif
                                                    @endforeach
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
                                            <label for="lead_status">Lead Status</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                                                </div>
                                                <select class="form-control" name="lead_status" id="leadstatus">
                                                    <option ></option>
                                                    @foreach($lead_status as $row)
                                                        @if($row->name_en === $organize["status_name"])
                                                            <option selected value="{{$row->id}}">{{$row->name_en}}</option>
                                                        @else
                                                            <option value="{{$row->id}}">{{$row->name_en}}</option>
                                                        @endif


                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lead_industry">Industry <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                                </div>
                                                <select class="form-control " name="lead_industry" id="lead_industry" >
                                                    <option> </option>
                                                    @foreach($lead_industry as $row )
                                                        @if($row->id === $organize["lead_industry_id"])
                                                            <option selected value="{{$row->id}}">{{$row->name_en}}</option>
                                                        @else
                                                            <option value="{{$row->id}}">{{$row->name_en}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <span class="invalid-feedback" role="alert" id="lead_industryError"> {{--span for alert--}}
                                                    <strong></strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <div class="row">                                        
                                        <div class="col-md-6">
                                            <label for="assig_to_id">Assigened To<b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                                </div>
                                                <select class="form-control select2" name="assig_to_id" id="assig_to_id">
                                                    <option></option>
                                                    @foreach($assig_to as $row )
                                                        {{-- @if($row->id === $organize["ma_user_id"])
                                                            <option selected value="{{$row->id}}">{{$row->first_name_en}} {{$row->last_name_en}}</option>
                                                        @else
                                                            <option value="{{$row->id}}">{{$row->first_name_en}} {{$row->last_name_en}}</option>
                                                        @endif --}}
                                                        <option value="{{$row->id}}" {{$row->id==$organize["ma_user_id"] ? 'selected="selected"':''}}> {{$row->first_name_en}} {{$row->last_name_en}}</option>        
                                                    @endforeach
                                                </select>
                                                <span class="invalid-feedback" role="alert" id="assig_to_idError"> {{--span for alert--}}
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
                                                                    <input value="{{$organize["hom_en"]}}" type="text" class="form-control"  name='home_en' id="home_en" placeholder="Number of home"  >
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
                                                                    <input value="{{$organize["street_en"]}}" type="text" class="form-control"  name='street_en' id="street_en" placeholder="Number of street"  >
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
                                                        {{-- @foreach($province as $row )
                                                            @if($row->name_latin === $organize["province"])
                                                                <option selected value="{{$row->code}}">{{$row->name_latin}}/{{$row->name_kh}}</option>
                                                            @else
                                                                <option value="{{$row->code}}">{{$row->name_latin}}/{{$row->name_kh}}</option>
                                                            @endif
                                                        @endforeach --}}
                                                        @foreach($province as $row )
                                                                        {{-- <option value="{{$row->code}}">{{$row->name_latin}}/{{$row->name_kh}}</option> --}}
                                                            <option value="{{$row->code}}" {{$row->name_latin==$organize["province"] ? 'selected="selected"':''}}>{{$row->name_latin}}</option>
                                                           
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
                                                                    <input  value="{{$organize["home_kh"]}}" type="text" class="form-control"  name='home_kh' id="home_kh" placeholder="Number of home" >
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
                                                                    <input value="{{$organize["street_kh"]}}"  type="text" class="form-control"  name='street_kh' id="street_kh" placeholder="Number of street"  >
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
                                                        <option value="{{$organize['district']}}">{{$organize['district']}}</option>
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
                                                    <input type="text" class="form-control"  name='latlong' id="latlong" value="{{$organize['latlg']}}" placeholder="11.123456, 104.123456 Example" >
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
                                                        <option value="{{$organize['commune']}}">{{$organize['commune']}}</option>
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
                                                        <option value="{{$organize['gazetteer_code']}}">{{$organize['village']}}</option>
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
                                        <button type="button" class="btn btn-primary" onclick="CrmSubmitFormFull('frm_CrmOrganizationEdit','/organizations/update','/organizations','Update Successfully')" id="frm_btn_sub_addlead">Save</button>
                                        <button type="button" class="btn btn-danger" onclick="go_to('/organizations')">Cencel</button>
                                    </div>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- =================Modal lead source========================= --}}
   
     
       {{-- =================Modal lead industry========================= --}}

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


        // Get old gazetteer to input
        var code = {!! json_encode($organize["gazetteer_code"]) !!};
        code = code.length < 8 ? '0'+code : code
        var p = code.substring(0,2)
        var d = code.substring(0,4)
        var c = code.substring(0,6)
        var v = code.substring(0,8)
        function customGetBranch(id,target,selectId,route) {
            $.ajax({
                type:'GET',
                url:route,
                async:false,
                data:{
                    _token : '<?php echo csrf_token() ?>',
                    _id : Number(id)
                },
                success:function(data) {
                    var tar=document.getElementById(target);
                    tar.options.length=0;
                    var re =data.response;
                    var option = document.createElement("option");
                    option.text = "";
                    option.value = "";
                    option.setAttribute("selected", "true");
                    option.setAttribute("disabled", "true");
                    option.setAttribute("hidden", "true");
                    tar.add(option);
                        for (var i = 0; i < re.length; i++) {
                            option = document.createElement("option");
                            option.text=""+re[i]['name'];
                            option.value=re[i]['id'];
                            if(re[i]['id']==Number(selectId)){
                                option.setAttribute("selected","true");
                            }
                            tar.add(option);
                    }
                }
            });
        }

        // //edit Form
        // function CrmSubmitFormEditFull(form,url,goto,alert){
        //     // var myvar= document.getElementById('gettoken').val();
        //     var myvar= $( "#gettoken" ).val();
        //     //   console.log(myvar);
           
        //     $("#"+form+" input").removeClass("is-invalid");//remove all error message
        //     $("#"+form+" select").removeClass("is-invalid");//remove all error message
        //     $("#"+form+" textarea").removeClass("is-invalid");//remove all error message
        //     $("#"+form+" radio").removeClass("is-invalid");//remove all error message
        //     $.ajax({
        //     url: url,//get link route
        //     type:'PUT',//type post or put
        //     headers: {
        //               'Authorization': `Bearer ${myvar}`,
        //           },
        //     data: //_token: $('#token').val(),
        //     $('#'+form+'').serialize(),

        //     success:function(data)
        //     {
        //         console.log(data);
        //         // if(typeof(data.success) != "undefined" && data.success !== null) { //condition for check success
        //         // // console.log(data);
        //         // sweetalert('success',alert);
        //         // go_to(goto);// refresh content
        //     }else{
        //         $.each( data.errors, function( key, value ) {//foreach show error
        //             $("#" + key).addClass("is-invalid"); //give read border to input field
        //             // $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        //             $("#" + key + "Error").children("strong").text("").text(data.errors[key][0]);
        //             // sweetalert('warning',value);
        //         });
        //     }
        //     }
        //     });
        //     }
        // $(document).ready(function(){
        //     customGetBranch(p, 'district', d, '/district')
        //     customGetBranch(d,'commune',c,'/commune')
        //     customGetBranch(c,'village',v,'/village')
        // })
    </script>

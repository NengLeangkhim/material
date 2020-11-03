    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><span><i class="fas fa-edit"></i></span> Update Lead</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php
                            for($i =0;$i<sizeof($editlead); $i++){
                                ?>                                    
                                    <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('detaillead/{{$editlead[$i]['lead_id']}}')">Detail Lead</a></li>
                                <?php 
                            }
                        ?>
                        <li class="breadcrumb-item active">Update Lead</li>
                    </ol>
                </div>
            </div>
         </div><!-- /.container-fluid -->
    </section>  
    <section class="content">
        <div class="container-fluid">
            <form id="frm_CrmleadEdit">
                @csrf
            <div class="row">
                
                <!-- left column -->
                <div class="col-md-12">                    
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header" style="background:#1fa8e0">
                                <h3 class="card-title">Detail Lead</h3>
                            </div>                            
                            <div class="card-body">
                                <?php
                                     for($i =0;$i<sizeof($editlead); $i++){
                                    ?> 
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="company_en">Company Name English <b style="color:red">*</b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" hidden placeholder="Customer Name English" value="{{$editlead[$i]['lead_id']}}"  name='lead_id' id="lead_id"  required>
                                                        <input type="text" class="form-control" placeholder="Customer Name English" value="{{$editlead[$i]['customer_name_en']}}"  name='company_en' id="company_en"  required>
                                                        <span class="invalid-feedback" role="alert" id="company_enError"> {{--span for alert--}}
                                                            <strong></strong>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="company_kh">Company Name khmer <b style="color:red">*</b></label>
                                                    <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="company_kh" id="company_kh"  value="{{$editlead[$i]['customer_name_kh']}}"  placeholder="Customer Name khmer" >
                                                    <span class="invalid-feedback" role="alert" id="company_khError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="primary_email">Primary Email<b style="color:red">*</b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                        </div>
                                                        <input type="email" class="form-control"  name="primary_email" id="primary_email" value="{{$editlead[$i]['email']}}" placeholder="Primary Email">
                                                        <span class="invalid-feedback" role="alert" id="primary_emailError"> {{--span for alert--}}
                                                            <strong></strong>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="primary_phone">Primary Phone <b style="color:red">*</b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="primary_phone"id="primary_phone" value="010453535" placeholder="Primary Phone" >
                                                        <span class="invalid-feedback" role="alert" id="primary_phoneError"> {{--span for alert--}}
                                                            <strong></strong>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="website">Website</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fab fa-chrome"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="website"  value="{{$editlead[$i]['website']}}" id="website" placeholder="Website">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="company_facebook">Facebook</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="company_facebook" value="{{$editlead[$i]['facebook']}}"  id="company_facebook" placeholder="Facebook">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="current_speed_isp">Current Speed ISP</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                                        </div>
                                                        <select class="form-control" name="current_speed_isp" id="current_speed_isp">  
                                                                                                                
                                                            @foreach($currentisp as $key)
                                                                <option value="{{$key->id}}" {{$key->id==$editlead[$i]['crm_lead_current_isp_id'] ? 'selected="selected"':''}}> {{$key->name_en}}</option>                                                               
                                                            @endforeach
                                                                                                                       
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="vat_number">Vat Number</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="vat_number" value="{{$editlead[$i]['vat_number']}}" id="vat_number" placeholder="Vat Number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="branch">Company Branch <b style="color:red">*</b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                        </div>
                                                        <select class="form-control "  name="branch" id='branch' > 
                                                            @foreach($companybranch as $key)
                                                                <option value="{{$key->id}}" {{$key->id==$editlead[$i]['ma_company_detail_id'] ? 'selected="selected"':''}}> {{$key->name}} / {{$key->company}}</option>                                                               
                                                            @endforeach                                                     
                                                        </select>
                                                        <span class="invalid-feedback" role="alert" id="branchError"> {{--span for alert--}}
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
                                                        <select class="form-control" name="lead_source" id="lead_source" >
                                                            <option></option>
                                                            @foreach($lead_source as $row)
                                                                <option value="{{$row->id}}" {{$row->id==$editlead[$i]['crm_lead_source_id'] ? 'selected="selected"':''}}> {{$row->lead_source}}</option>                                                               
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
                                                    <label for="lead_industry">Industry <b style="color:red">*</b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                                        </div>
                                                        <select class="form-control " name="lead_industry" id="lead_industry" >
                                                            <option> </option>
                                                            @foreach($lead_industry as $row )
                                                                <option value="{{$row->id}}" {{$row->id==$editlead[$i]['crm_lead_industry_id'] ? 'selected="selected"':''}}> {{$row->name_en}}</option>                                                               
                                                            @endforeach
                                                        </select>
                                                        <span class="invalid-feedback" role="alert" id="lead_industryError"> {{--span for alert--}}
                                                            <strong></strong>
                                                        </span>
                                                    </div>
                                                </div>
                                                    <div class="col-md-6">
                                                        <label for="employee_count">Employee Count</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" name="employee_count" id="employee_count"  value="{{$editlead[$i]['employee_count']}}" placeholder="Current Speed">
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                        </div>                                       
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="current_speed">Current Speed</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-tachometer-alt"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="current_speed" value="{{$editlead[$i]['current_isp_speed']}}" id="current_speed" placeholder="Current Speed">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="current_price">Current Price</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="current_price" id="current_price" value="{{$editlead[$i]['current_isp_price']}}" placeholder="Current Price">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary" id="frm_btn_sub_addlead" onclick="CrmSubmitFormFull('frm_CrmleadEdit','/lead/update','/lead','Update Successfully')">Update</button>
                                            <button type="button" class="btn btn-danger" onclick="go_to('lead')">Cencel</button>
                                        </div>                                      
                            </div>  
                            
                        </div> 
                        <?php
                    }
                ?>
            </div>
        </form>
        </div>
    </section>

    <script type="text/javascript">
    
    $( "#contact_id" ).change(function() {
          var to = $(this). children("option:selected"). val();
          var myvar= $( "#getcontact" ).val();
        //   alert(to);
          $.ajax({
            url:'/api/contact/'+to,
            type:'get',
            dataType:'json',
            headers: {
              'Authorization': `Bearer ${myvar}`,
          },
            success:function(response){
      
                        var name_en = response['data'].name_en;
                        var name_kh = response['data'].name_kh;             
                        var email = response['data'].email;             
                        var phone = response['data'].phone;             
                        var national_id = response['data'].national_id;             
                        var position = response['data'].position;             
                        var honorifics = response['data'].honorifics.name_en;  
                        var honorifics_id = response['data'].honorifics.id;  
                        // alert(honorifics);           
                        $("#name_en").val(name_en); 
                        $("#name_kh").val(name_kh); 
                        $("#email").val(email); 
                        $("#phone").val(phone); 
                        $("#national_id").val(national_id); 
                        $("#position").val(position); 
                        // $("#ma_honorifics_id").val(honorifics); 
                        var option = "<option value='"+honorifics_id+" 'selected>"+honorifics+"</option>"; 
  
                       $("#ma_honorifics_id").append(option); 

                        // $('#name_en').prop('readonly', true);
                        // $('#name_kh').prop('readonly', true);
                        // $('#email').prop('readonly', true);
                        // $('#phone').prop('readonly', true);
                        // $('#national_id').prop('readonly', true);
                        // $('#position').prop('readonly', true);
                        // $('#ma_honorifics_id').attr('disabled', true);
               
          
            }
        })
        });
            $('.lead ').click(function(e)
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
            $('.save').click(function(){
                submit_form ('/addlead','frm_lead','lead');
            })
            </script>
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
                    // document.getElementById('latlong').value = '-14.774883,24.877663';
                   
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
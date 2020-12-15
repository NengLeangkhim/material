<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1><i class="fas fa-code-branch"></i> Form Step by Step</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
{{-- Content --}}
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header"> </div> --}}
                    <div class="card-body">
                        <div id="smartwizard" style="border: none !important;">
                            <ul class="nav" style="background-color: #FFFFFF; border: none !important;">
                                <li><a class="nav-link" href="#step-1">Lead Detail</a></li>
                                <li><a class="nav-link" href="#step-2">Contact Detail</a></li>
                                <li><a class="nav-link" href="#step-3">Address</a></li>
                            </ul>
                            <div class="mt-4">
                                {{-- Form-1 --}}
                                <div id="step-1">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
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
                                        <div class="row">
                                            <div class="col-md-6">                                          
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

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                                    </div>
                                                    <select class="form-control" name="current_speed_isp" id="current_speed_isp">
                                                        <option value=''>-- Select Current Speed Isp --</option>
                                                    </select>
                                                    <span class="invalid-feedback" role="alert" id="current_speed_ispError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">                                                
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <select class="form-control "  name="branch" id='branch' >
                                                        <option value=''>-- Select Branch --</option>
                                                    </select>
                                                    <span class="invalid-feedback" role="alert" id="branchError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">                                            
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-tty"></i></span>
                                                    </div>
                                                    <select class="form-control" name="lead_source" id="lead_source" >
                                                        <option value=''>-- Select Lead Source --</option>
                                                        @foreach($lead_source as $row)
                                                            <option value="{{$row->id}}">{{$row->lead_source}}</option>
                                                        @endforeach
                                                    </select>

                                                    <span class="invalid-feedback" role="alert" id="lead_sourceError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">                               
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                                    </div>
                                                    <select class="form-control " name="lead_industry" id="lead_industry" >
                                                        <option value=''>-- Select Lead Indusry --</option>
                                                        @foreach($lead_industry as $row )
                                                            <option value="{{$row->id}}">{{$row->name_en}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="invalid-feedback" role="alert" id="lead_industryError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">                                               
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="vat_number" id="vat_number" placeholder="Vat Number">
                                                    <span class="invalid-feedback" role="alert" id="vat_numberError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">                                              
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-speakap"></i></span>
                                                    </div>
                                                    <select class="form-control"  multiple="multiple" name="service" id="service" placeholder='Choose service'>
                                                        <option value=''>-- Select Service --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                                    </div>
                                                    <select class="form-control select2" name="assig_to" id="assig_to">
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
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-tachometer-alt"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="current_speed" id="current_speed" placeholder="Current Speed">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">                                 
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="current_price" id="current_price" placeholder="Current Price">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                                    </div>
                                                    <select class="form-control " name="prioroty" id="prioroty" >
                                                        <option value=''>-- Select  Prioroty --</option>
                                                        <option value='urgent'>Urgent</option>
                                                        <option value='high'>Hight</option>
                                                        <option value='medium'>Medium</option>
                                                        <option value='low'>Low</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">                                            
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="employee_count" id="employee_count" placeholder="employee count">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
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

                                {{-- Form-2 --}}
                                <div id="step-2">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Last Name" >
                                                    <span class="invalid-feedback" role="alert" id="name_enError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Frist Name"  name='name_kh' id="name_kh" >
                                                    <span class="invalid-feedback" role="alert" id="name_khError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1"> Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                    </div>
                                                    <input type="email" class="form-control"  name="email" id="email" placeholder="Email">
                                                    <span class="invalid-feedback" role="alert" id="emailError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone"> Phone </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="phone"id="phone" placeholder="Primary Phone" >
                                                    <span class="invalid-feedback" role="alert" id="phoneError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">                               
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                                                    </div>
                                                                    <select class="form-control " name="ma_honorifics_id" id="ma_honorifics_id" >
                                                                        <option value=''>-- Select Contact Honorifics --</option>
                                                                        <option value='1'>Mr</option>
                                                                        <option value='2'>Ms</option>
                                                                        <option value='3'>Mrs.</option>
                                                                        <option value='4'>Dr.</option>
                                                                        <option value='5'>Prof.</option>

                                                                    </select>
                                                                    <span class="invalid-feedback" role="alert" id="ma_honorifics_idError">
                                                                        <strong></strong>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="position" id="position" placeholder="Position">
                                                                    <span class="invalid-feedback" role="alert" id="phoneError"> {{--span for alert--}}
                                                                        <strong></strong>
                                                                    </span>
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
                                                    <input type="text" class="form-control" name="national_id" id="national_id" placeholder="National ID Card ">
                                                    <span class="invalid-feedback" role="alert" id="national_idError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                  
                                </div>
                                {{-- Form-3 --}}
                                <div id="step-3">
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
                                                <label for="addresscode">City/Province </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                                                    </div>
                                                    <select class="form-control select2 addresscode"  id="addresscode" name="addresscode" onchange="getbranch(this,'district','s','/district')" >
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

                                        <div class="row">
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
                                            <div class="col-md-6">
                                                <label for="commune">Sengkat/Commune </label>
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

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="input-group pt-4 pl-2">
                                                                    <div class="input-group-prepend pr-4">
                                                                        <span class="font-weight-bold">Survey</span>
                                                                    </div>
                                                                    <div class="custom-control custom-radio ml-2">
                                                                        <input type="radio" id="customRadio2" value="yes" name="checksurvey" class="custom-control-input">
                                                                        <label class="custom-control-label" for="customRadio2">Yes</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio ml-4">
                                                                        <input type="radio" id="customRadio1" value="no" name="checksurvey" class="custom-control-input">
                                                                        <label class="custom-control-label" for="customRadio1">No</label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="village">Village </label>
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

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="map"></div>

                                            </div>
                                        </div>
                                    </div>                      
                                </div>
                                {{-- Form-4 --}}
                                <div id="step-4">
                                    <div class="row">
                                        <div class="col-md-12"> <span>Thanks For submitting your details with BBBootstrap.com. we will send you a confirmation email. We will review your details and revert back.</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Script --}}
<script type="text/javascript">
    // Form step
    $(document).ready(function(){
        $('#smartwizard').smartWizard({
            'selected': 0,
            'theme': 'arrows',
            'justified': true,
            'autoAdjustHeight': true,
            'enableURLhash': false,
            'transition': {
                'animation': 'slide-horizontal',
                'speed': '400',
                'easing':''
            },
        });
    });
</script>

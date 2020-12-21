
<section class="content">
    <style>
        .input-group {
            
            flex-wrap: nowrap !important;    

        }
        .select2-container .select2-search--inline .select2-search__field{
            margin-top: 0 !important;
        }
    </style>
    <div class="col-md-12">
        <div class="">
            {{-- <div class="p-2 pl-4">
                <h5><span><i class="fas fa-user-plus"></i></span> Add Lead Enterprise</h5>
            </div> --}}
            <div class="card-body">
                <form id="frm_Crmlead" method="POST">
                    @csrf
                    <div id="smartwizard" style="border: none !important;">
                        <ul class="nav" style="background-color: #FFFFFF; border: none !important;">
                            
                            <li><a class="nav-link" href="#enterprise-register">Register</a></li>
                            <li><a class="nav-link" href="#enterprise-address">Address</a></li>
                            <li><a class="nav-link" href="#file-attachment">File Attachment</a></li>
                            <li><a class="nav-link" href="#enterprise-representative">Representative</a></li>
                        </ul>
                        <div class="mt-4">

                            {{-- Form-1 Detail --}}
                            <div id="enterprise-register">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="lead">Select Lead</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                            </div>
                                            <select name="lead_id" id="lead_id" class="form-control select2">
                                                <option value='0'>-- Select Lead To Add Branch --</option>
                                            </select>
                                            <!-- <div class="input-group-append">
                                                <span class="input-group-text" style="background-color: white; border: white;"></span>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="company_en">Company Name English <b style="color:red">*</b></label>
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

                                    <div class="col-md-6">
                                        <label for="company_kh">Company Name khmer </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="company_kh" id="company_kh" placeholder="Customer Name khmer" onkeypress="return validKHName(event)">
                                            {{-- <span class="invalid-feedback" role="alert" id="company_khError"> span for alert
                                                <strong></strong>
                                            </span> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="primary_email">Primary Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <input type="email" class="form-control"  name="primary_email" id="primary_email" placeholder="Primary Email" onkeypress="return validENTxt(event)">
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
                                            <input type="text" class="form-control" name="primary_phone"id="primary_phone" placeholder="Primary Phone" onkeypress="return validENNumber(event)">
                                            <span class="invalid-feedback" role="alert" id="primary_phoneError">
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="company_facebook">Facebook</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="company_facebook" id="company_facebook" placeholder="Facebook" onkeypress="return validENName(event)">
                                            <span class="invalid-feedback" role="alert" id="company_facebookError"> {{--span for alert--}}
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
                                            <input type="text" class="form-control" name="website" id="website" placeholder="Website" onkeypress="return validENTxt(event)">
                                            <span class="invalid-feedback" role="alert" id="websiteError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="current_speed_isp">Current ISP </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-tumblr"></i></span>
                                            </div>
                                            <select class="form-control select2" name="current_speed_isp" id="current_speed_isp">
                                                <option value=''>-- Select Current ISP --</option>
                                            </select>
                                            <!-- <div class="input-group-append">
                                                <span class="input-group-text" style="background-color: white; border: white;"></span>
                                            </div> -->
                                            <span class="invalid-feedback" role="alert" id="current_speed_ispError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="branch">Company Branch <b style="color:red">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <select class="form-control select2"  name="branch" id='branch' >
                                                <option value='0'>-- Select Branch --</option>
                                            </select>
                                            <!-- <div class="input-group-append">
                                                <span class="input-group-text" style="background-color: white; border: white;"></span>
                                            </div> -->
                                            <span class="invalid-feedback" role="alert" id="branchError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="lead_source">Lead Source <b style="color:red">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-tty"></i></span>
                                            </div>
                                            <select class="form-control select2" name="lead_source" id="lead_source" >
                                                <option value=''>-- Select Lead Source --</option>
                                                @foreach($lead_source as $row)
                                                    <option value="{{$row->id}}">{{$row->lead_source}}</option>
                                                @endforeach
                                            </select>
                                            <!-- <div class="input-group-append">
                                                <span class="input-group-text" style="background-color: white; border: white;"></span>
                                            </div> -->
                                            <span class="invalid-feedback" role="alert" id="lead_sourceError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="lead_industry">Industry <b style="color:red">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                            </div>
                                            <select class="form-control select2" name="lead_industry" id="lead_industry" >
                                                <option value=''>-- Select Lead Indusry --</option>
                                                @foreach($lead_industry as $row )
                                                    <option value="{{$row->id}}">{{$row->name_en}}</option>
                                                @endforeach
                                            </select>
                                            <!-- <div class="input-group-append">
                                                <span class="input-group-text" style="background-color: white; border: white;"></span>
                                            </div> -->
                                            <span class="invalid-feedback" role="alert" id="lead_industryError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="vat_number">Vat Number</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="vat_number" id="vat_number" placeholder="Vat Number" onkeypress="return validENNumber(event)">
                                            <span class="invalid-feedback" role="alert" id="vat_numberError"> {{--span for alert--}}
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
                                            <select class="form-control select2" multiple="multiple" name="service" id="service" placeholder='Choose service'>
                                                <option value=''>-- Select Service --</option>
                                            </select>
                                            <!-- <div class="input-group-append">
                                                <span class="input-group-text" style="background-color: white; border: white;"></span>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="assig_to">Assigened To<b style="color:red">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                            </div>
                                            <select class="form-control select2" name="assig_to" id="assig_to">
                                                <option value=''>-- Select Lead Assigened To --</option>
                                                @if(count($emInfo) >= 1)
                                                    @foreach($emInfo as $row)
                                                        @if($row->id == $userid)
                                                            <option value="{{$row->id ?? ""}}" selected>{{$row->first_name_en." ".$row->last_name_en ?? ""}}</option>
                                                        @endif
                                                        <option value="{{$row->id ?? ""}}">{{$row->first_name_en." ".$row->last_name_en ?? ""}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <!-- <div class="input-group-append">
                                                <span class="input-group-text" style="background-color: white; border: white;"></span>
                                            </div> -->
                                            <span class="invalid-feedback" role="alert" id="assig_toError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="current_speed">Current Speed ISP</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-tachometer-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="current_speed" id="current_speed" placeholder="Current Speed ISP" onkeypress="return validENNumber(event)">
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="current_price">Current Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="current_price" id="current_price" placeholder="Current Price" onkeypress="return validENNumber(event)">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <label for="honorifics">Prioroty</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                            </div>
                                            <select class="form-control select2" name="prioroty" id="prioroty" >
                                                <option value=''>-- Select  Prioroty --</option>
                                                <option value='urgent'>Urgent</option>
                                                <option value='high'>Hight</option>
                                                <option value='medium'>Medium</option>
                                                <option value='low'>Low</option>
                                            </select>
                                            <!-- <div class="input-group-append">
                                                <span class="input-group-text" style="background-color: white; border: white;"></span>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="employee_count">Employee Count</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="employee_count" id="employee_count" placeholder="employee count" onkeypress="return validENNumber(event)">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="comment">Comment</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-comments"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="comment" id="comment" placeholder="comment" onkeypress="return validENTxt(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">

                                </div>

                            </div>

                            {{-- Form-2 Contact --}}
                            <div id="enterprise-representative">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="contact">Select Contact</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                            </div>
                                            <select class="form-control select2" name="contact_id" id="contact_id">                                     --}}
                                                <option value=''>-- Select Contact  --</option>
                                            </select>
                                            <!-- <div class="input-group-append">
                                                <span class="input-group-text" style="background-color: white; border: white;"></span>
                                            </div> -->

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="name_en">Full Name English</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="name_en" id="name_en" placeholder="English Name" onkeypress="return validENName(event)">
                                            <span class="invalid-feedback" role="alert" id="name_enError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="name_kh">Full Name Khmer</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Khmer Name"  name='name_kh' id="name_kh" onkeypress="return validKHName(event)">
                                            <span class="invalid-feedback" role="alert" id="name_khError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1"> Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <input type="email" class="form-control"  name="email" id="email" placeholder="Email" onkeypress="return validENTxt(event)">
                                            <span class="invalid-feedback" role="alert" id="emailError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="phone"> Phone </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="phone"id="phone" placeholder="Primary Phone" onkeypress="return validENNumber(event)">
                                            <span class="invalid-feedback" role="alert" id="phoneError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="honorifics">Honorifics</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                            </div>
                                            <select class="form-control select2" name="ma_honorifics_id" id="ma_honorifics_id" >
                                                <option value=''>-- Select Contact Honorifics --</option>
                                                <option value='1'>Mr</option>
                                                <option value='2'>Ms</option>
                                                <option value='3'>Mrs.</option>
                                                <option value='4'>Dr.</option>
                                                <option value='5'>Prof.</option>
                                            </select>
                                            <!-- <div class="input-group-append">
                                                <span class="input-group-text" style="background-color: white; border: white;"></span>
                                            </div> -->
                                            <span class="invalid-feedback" role="alert" id="ma_honorifics_idError">
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="position">Position </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="position" id="position" placeholder="Position" onkeypress="return validENTxt(event)">
                                            <span class="invalid-feedback" role="alert" id="phoneError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="national_id">National ID Card / Passport ID </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="national_id" id="national_id" placeholder="National ID Card " onkeypress="return validENNumber(event)">
                                            <span class="invalid-feedback" role="alert" id="national_idError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary" id="frm_btn_sub_addlead" onclick="CrmSubmitFormFull('frm_Crmlead','/lead/store','/lead','Insert Successfully')">Save</button>
                                        <button type="button" class="btn btn-danger" onclick="go_to('lead')">Cencel</button>
                                    </div>
                                </div>
                            </div>

                            {{-- Form-3 Address --}}
                            <div id="enterprise-address">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="home_en"> Home(EN)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-home"></i></span>
                                            </div>
                                            <input type="text" class="form-control"  name='home_en' id="home_en" placeholder="Number of home english" onkeypress="return validENTxt(event)">
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
                                            <input type="text" class="form-control"  name='street_en' id="street_en" placeholder="Number of street english" onkeypress="return validENTxt(event)">
                                            <span class="invalid-feedback" role="alert" id="street_enError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>



                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="addresscode">City/Province </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                            </div>
                                            <select class="form-control select2 addresscode"  id="addresscode" name="addresscode" onchange="getbranch(this,'district','s','/district')" >
                                                <option></option>
                                                @if(is_array($province))
                                                    @foreach($province as $row )
                                                    <option value="{{$row->code ?? ""}}">{{$row->name_latin ??""}}/{{$row->name_kh??""}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <!-- <div class="input-group-append">
                                                <span class="input-group-text" style="background-color: white; border: white;"></span>
                                            </div> -->
                                            <span class="invalid-feedback" role="alert" id="addresscodeError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="district">Khan/District </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                            </div>
                                            <select class="form-control select2 dynamic" name="district" id="district" onchange="getbranch(this,'commune','s','/commune')" >
                                                <option> </option>
                                            </select>
                                            <!-- <div class="input-group-append">
                                                <span class="input-group-text" style="background-color: white; border: white;"></span>
                                            </div> -->
                                            <span class="invalid-feedback" role="alert" id="districtError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="commune">Sengkat/Commune </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-street-view"></i></span>
                                            </div>
                                            <select class="form-control select2 dynamic" name="commune" id="commune" onchange="getbranch(this,'village','s','/village')" >
                                                <option> </option>
                                            </select>
                                            <!-- <div class="input-group-append">
                                                <span class="input-group-text" style="background-color: white; border: white;"></span>
                                            </div> -->
                                            <span class="invalid-feedback" role="alert" id="communeError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="village">Village </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                            </div>
                                            <select class="form-control select2" name="village" id="village" dats-dependent="village" >
                                                <option value="">select Village</option>
                                            </select>
                                            <!-- <div class="input-group-append">
                                                <span class="input-group-text" style="background-color: white; border: white;"></span>
                                            </div> -->
                                            <span class="invalid-feedback" role="alert" id="villageError"> {{--span for alert--}}
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">

                                    <div class="col-md-12">
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

                                <div class="row mt-3 p-2">
                                    <div id="map"></div>
                                </div>

                                
                            </div>
                            {{-- Form-4 file-attachment--}}
                            <div id="file-attachment">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputFile">File </label>
                                        <div class="input-group">                                                
                                            <div class="input-group-append">
                                                <span class="input-group-text" id=""><i class="far fa-folder-open"></i></span>
                                            </div>
                                                <input  type="file" name="file[]" multiple class="form-control" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- Script --}}


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


<script type="text/javascript">

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

    $('#branch').ready(function(){
            $.ajax({
                // url:'http://127.0.0.1:8000/api/branch',
                url:'companybranch',
                type:'get',
                dataType:'json',
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
        $('.select2').select2({
            placeholder: 'Select an option'
        });


        $('#contact_id').select2({
                ajax: {
                    url: '/contact/search',
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
            url:'/contact/'+to,
            type:'get',
            dataType:'json',
            success:function(response){
              console.log(response);

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


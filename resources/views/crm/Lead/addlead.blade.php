
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><span><i class="fas fa-user-plus"></i></span> Create New Lead</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="" class="lead" ​value="lead">Lead</a></li>
                        <li class="breadcrumb-item active">New Leads</li>
                    </ol>
                </div>
            </div>
         </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <form id="frm_Crmlead" method="POST">
            @csrf
        <div class="container-fluid">
            {{-- <div class="row"> --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-6">
                                <label for="lead">Search Lead</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                    </div>
                                    <input type="text" hidden value="{{$_SESSION['token']}}" id="getlead">
                                    <select class="form-control select2 " name="lead_id" id="lead_id" data-code="<?php if(isset($leadSeleted)){echo $leadSeleted;}else{echo '';} ?>">
                                            <option value=''>-- Select Lead  --</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left column -->
                <div class="col-md-12" >


                        <!-- lead add detail -->
                        @if(!isset($leadSeleted) || empty($leadSeleted))
                            <div class="card card-primary">
                                <div class="card-header" style="background:#1fa8e0">
                                    <h3 class="card-title">Lead Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="company_en">Company Name English <b style="color:red">*</b></label>
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
                                                <label for="company_kh">Company Name khmer <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="company_kh" id="company_kh" placeholder="Customer Name khmer" >
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
                                                <label for="primary_email">Primary Email</label>
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
                                                <label for="primary_phone">Primary Phone <b style="color:red">*</b></label>
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
                                    </div>
                                    <div class="form-group">
                                        <div class="row">


                                            <div class="col-md-6">
                                                <label for="company_facebook">Facebook</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="company_facebook" id="company_facebook" placeholder="Facebook">
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
                                                    <input type="text" class="form-control" name="website" id="website" placeholder="Website">
                                                    <span class="invalid-feedback" role="alert" id="websiteError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label for="current_speed_isp">Current Speed ISP </label>
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
                                                <label for="branch">Company Branch <b style="color:red">*</b></label>
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
                                    </div>
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label for="lead_source">Lead Source <b style="color:red">*</b></label>
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

                                            {{-- <div class="col-md-6">
                                                <label for="lead_status">Lead Status</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                                                    </div>
                                                    <select class="form-control" name="lead_status" id="lead_status">
                                                        <option value=''>-- Select Lead Status --</option>
                                                        @foreach($lead_status as $row)
                                                            <option value="{{$row->id}}">{{$row->name_en}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="invalid-feedback" role="alert" id="lead_statusError">
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div> --}}

                                            <div class="col-md-6">
                                                <label for="lead_industry">Industry <b style="color:red">*</b></label>
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
                                    </div>
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label for="vat_number">Vat Number</label>
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
                                                <label for="service">Service</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-speakap"></i></span>
                                                    </div>
                                                    <select class="form-control select2"  multiple="multiple" name="service" id="service" placeholder='Choose service'>
                                                        <option value=''>-- Select Lead Assigened To --</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label for="assig_to">Assigened To<b style="color:red">*</b></label>
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
                                                <label for="current_speed">Current Speed</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-tachometer-alt"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="current_speed" id="current_speed" placeholder="Current Speed">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label for="current_price">Current Price</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="current_price" id="current_price" placeholder="Current Price">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="honorifics">Prioroty</label>
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
                                    </div>
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label for="employee_count">Employee Count</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="employee_count" id="employee_count" placeholder="employee count">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="comment">Comment</label>
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
                            </div>
                        @else
                            <input type="hidden" name="createLeadBranch" value="createLeadBranch" readonly>
                            <div class="card card-primary">
                                <div class="card-header" style="background:#1fa8e0">
                                    <h3 class="card-title">Lead Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="company_en">Company Name English <b style="color:red">*</b></label>
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
                                                <label for="company_kh">Company Name khmer <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="company_kh" id="company_kh" placeholder="Customer Name khmer" >
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
                                                    <input type="email" class="form-control"  name="primary_email" id="primary_email" placeholder="Primary Email">
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
                                                    <input type="text" class="form-control" name="primary_phone"id="primary_phone" placeholder="Primary Phone" onkeypress="return onlyNumberKey(event)" >
                                                    <span class="invalid-feedback" role="alert" id="primary_phoneError">
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">

                                            {{-- <div class="col-md-6">
                                                <label for="lead_status">Lead Status</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                                                    </div>
                                                    <select class="form-control" name="lead_status" id="lead_status">
                                                        <option value=''>-- Select Lead Status --</option>
                                                        @foreach($lead_status as $row)
                                                            <option value="{{$row->id}}">{{$row->name_en}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="invalid-feedback" role="alert" id="lead_statusError">
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div> --}}

                                            <div class="col-md-6">
                                                <label for="assig_to">Assigened To<b style="color:red">*</b></label>
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
                                                <label for="service">Service</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-speakap"></i></span>
                                                    </div>
                                                    <select class="form-control select2"  multiple="multiple" name="service" id="service">
                                                        <option value=''>-- Select Lead Assigened To --</option>
                                                    </select>
                                                    <span class="invalid-feedback" role="alert" id="serviceError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="comment">Comment</label>
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
                            </div>
                        @endif


                        <!--Add Contact -->
                        @if(!isset($leadSeleted) || empty($leadSeleted))
                            <!-- Select contact -->
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-6">
                                            <label for="contact">Search Contact</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                                </div>
                                                <input type="text" hidden value="{{$_SESSION['token']}}" id="getcontact">
                                                <select class="form-control select2" name="contact_id" id="contact_id">
                                                    {{-- <option value='{{$_SESSION['token']}}' >-- Select Contact  --</option>                                       --}}
                                                    <option value=''>-- Select Contact  --</option>
                                                </select>

                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add contact -->
                            <div class="card card-primary">
                                <div class="card-header" style="background:#1fa8e0">
                                    <h3 class="card-title">Contact Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="name_kh">Full Name Khmer</label>
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
                                            <div class="col-md-6">
                                                <label for="name_en">Full Name English </label>
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
                                        </div>
                                    </div>
                                    <div class="form-group">
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
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="honorifics">Honorifics</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                                                    </div>
                                                                    <select class="form-control " name="ma_honorifics_id" id="ma_honorifics_id" >
                                                                        <option value=''>-- Select Contact Honorifics --</option>
                                                                        <option value='1'>Mr</option>
                                                                        <option value='2'>Ms</option>

                                                                    </select>
                                                                    <span class="invalid-feedback" role="alert" id="ma_honorifics_idError">
                                                                        <strong></strong>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="position">Position </label>
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
                                                    <input type="text" class="form-control" name="national_id" id="national_id" placeholder="National ID Ceard ">
                                                    <span class="invalid-feedback" role="alert" id="national_idError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Select contact -->
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-6">
                                            <label for="contact">Search Contact <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                                </div>
                                                <input type="text" hidden value="{{$_SESSION['token']}}" id="getcontact">
                                                <select class="form-control select2" name="contact_id" id="contact_id">
                                                    {{-- <option value='{{$_SESSION['token']}}' >-- Select Contact  --</option>                                       --}}
                                                    <option value=''>-- Select Contact  --</option>
                                                </select>

                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add contact -->
                            <div class="card card-primary">
                                <div class="card-header" style="background:#1fa8e0">
                                    <h3 class="card-title">Contact Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="name_kh">Full Name Khmer <b style="color:red">*</b></label>
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
                                            <div class="col-md-6">
                                                <label for="name_en">Full Name English <b style="color:red">*</b></label>
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
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1"> Email <b style="color:red">*</b></label>
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
                                                <label for="phone"> Phone <b style="color:red">*</b></label>
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
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="honorifics">Honorifics</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                                                    </div>
                                                                    <select class="form-control " name="ma_honorifics_id" id="ma_honorifics_id" >
                                                                        <option value=''>-- Select Contact Honorifics --</option>
                                                                        <option value='1'>Mr</option>
                                                                        <option value='2'>Ms</option>

                                                                    </select>
                                                                    <span class="invalid-feedback" role="alert" id="ma_honorifics_idError">
                                                                        <strong></strong>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="position">Position <b style="color:red">*</b></label>
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
                                                <label for="national_id">National ID Ceard / Passport ID <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="national_id" id="national_id" placeholder="National ID Ceard ">
                                                    <span class="invalid-feedback" role="alert" id="national_idError"> {{--span for alert--}}
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Add address -->
                        <div class="card card-primary">
                            <div class="card-header" style="background:#1fa8e0">
                                <h3 class="card-title"> Install Address </h3>
                            </div>

                            @if(!isset($leadSeleted) || empty($leadSeleted))
                                <div class="card-body">
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
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="latlong"> Lead Map <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"  name='latlong' id="latlong" placeholder="11.123456, 104.123456 Example" >
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
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="address_type">Address Type <b style="color:red">*</b></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                                                    </div>
                                                                    <select class="form-control " name="address_type" id="address_type" >
                                                                        <option value="">Select Address Type</option>
                                                                        <option value="billing">Billing</option>
                                                                        <option value="install">Install</option>
                                                                        <option value="main">Main</option>
                                                                    </select>
                                                                    <span class="invalid-feedback" role="alert" id="address_typeError"> {{--span for alert--}}
                                                                        <strong></strong>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group pt-4 pl-2">
                                                                    <div class="input-group-prepend pr-4">
                                                                        <span class="font-weight-bold">Survey</span>
                                                                    </div>
                                                                    <div class="custom-control custom-radio ml-2">
                                                                        <input type="radio" id="customRadio2" value="1" name="checksurvey" class="custom-control-input">
                                                                        <label class="custom-control-label" for="customRadio2">Yes</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio ml-4">
                                                                        <input type="radio" id="customRadio1" value="0" name="checksurvey" class="custom-control-input">
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
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="map"></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary" id="frm_btn_sub_addlead" onclick="CrmSubmitFormFull('frm_Crmlead','/lead/store','/lead','Insert Successfully')">Save</button>
                                        <button type="button" class="btn btn-danger" onclick="go_to('lead')">Cencel</button>
                                    </div>
                                </div>
                            @else
                                <div class="card-body">
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
                                                <label for="addresscode">City/Province <b style="color:red">*</b></label>
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
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="latlong"> Lead Map <b style="color:red">*</b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"  name='latlong' id="latlong" placeholder="11.123456, 104.123456 Example" >
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
                                                        <option> </option>
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
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="address_type">Address Type <b style="color:red">*</b></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                                                    </div>
                                                                    <select class="form-control " name="address_type" id="address_type" >
                                                                        <option value="">Select Address Type</option>
                                                                        <option value="billing">Billing</option>
                                                                        <option value="install">Install</option>
                                                                        <option value="main">Main</option>
                                                                    </select>
                                                                    <span class="invalid-feedback" role="alert" id="address_typeError"> {{--span for alert--}}
                                                                        <strong></strong>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group pt-4 pl-2">
                                                                    <div class="input-group-prepend pr-4">
                                                                        <span class="font-weight-bold">Survey</span>
                                                                    </div>
                                                                    <div class="custom-control custom-radio ml-2">
                                                                        <input type="radio" id="customRadio2" value="1" name="checksurvey" class="custom-control-input">
                                                                        <label class="custom-control-label" for="customRadio2">Yes</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio ml-4">
                                                                        <input type="radio" id="customRadio1" value="0" name="checksurvey" class="custom-control-input">
                                                                        <label class="custom-control-label" for="customRadio1">No</label>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="custom-control custom-checkbox">
                                                                    <input class="custom-control-input" type="checkbox" id="customCheckbox2" value="1" name="checksurvey" >
                                                                    <label for="customCheckbox2"  class="custom-control-label">Survey Or Don't Survey</label>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="village">Village <b style="color:red">*</b></label>
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
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="map"></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary" id="frm_btn_sub_addlead" onclick="CrmSubmitFormFull('frm_Crmlead','/lead/store','/lead','Insert Successfully')">Save</button>
                                        <button type="button" class="btn btn-danger" onclick="go_to('lead')">Cencel</button>
                                    </div>
                                </div>
                            @endif

                        </div>
                 </div>
             </div>
            </div>
        </form>
    </section>

      </div>
      <script type="text/javascript" src="js/crm/crm.js"></script>

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
            // get data into combobox branch
        $('#branch').ready(function(){
        // $('#branch').find('option').not(':first').remove();
            $.ajax({
                // url:'http://127.0.0.1:8000/api/branch',
                url:'api/branch',
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

        // get  current_speed_isp in  selection
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

      // get  service in  selection
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
                  // get  lead in  selection
        $('#lead_id').ready(function(){
            var getLeadId = $('#lead_id').attr('data-code');  // get value daat-id atfer selete option lead
            // console.log('getleadid='+getLeadId);
            var myvar= $("#getlead").val();
              $.ajax({
                  url:'api/getaddlead',
                  type:'get',
                  dataType:'json',
                  headers: {
                    'Authorization': `Bearer ${myvar}`,
                },
                  success:function(response){
                          // for(var i=0; i<response['data'].length; i++){
                          //     var id = response['data'][i].lead_id;
                          //     var name = response['data'][i].customer_name_en;
                          //     // alert(name);
                          //     var option = "<option value='"+id+"'>"+name+"</option>";

                          //     $("#lead_id").append(option);
                          // }
                        $.each(response['data'], function(i,item){
                            var id = response['data'][i].lead_id;
                                var name = response['data'][i].customer_name_en;
                                // alert(name);
                                var option = "<option value='"+id+"'>"+name+"</option>";
                                $("#lead_id").append(option)
                                if(getLeadId != ''){
                                    $('#lead_id option[value="'+getLeadId+'"]').prop('selected', true);
                                }
                        })



                  }
              })
          })
          // get contact in add lead
          $('#contact_id  #getcontact').ready(function(){
            // $('#lead_id').find('option').not(':first').remove();
            var myvar= $( "#getcontact" ).val();
                $.ajax({
                    url:'api/contacts',
                    type:'get',
                    dataType:'json',
                    headers: {
                      'Authorization': `Bearer ${myvar}`,
                  },
                    success:function(response){
                            $.each(response['data'], function(i,item){
                              var id = response['data'][i].id;
                              var name = response['data'][i].name_en;
                              // alert(name);
                              var option = "<option value='"+id+"'>"+name+"</option>";

                              $("#contact_id").append(option);
                            })

                    }
                })
            })

            // number phone
            function onlyNumberKey(evt) {
          // Only ASCII charactar in that range allowed
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                // alert(ASCIICode);
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }
    </script>

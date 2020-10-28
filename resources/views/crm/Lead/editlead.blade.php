    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><span><i class="fas fa-edit"></i></span> Update Lead</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php
                            for($i =0;$i<sizeof($updatelead); $i++){
                                ?>                                    
                                    <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('detailbranch/{{$updatelead[$i]['branch_id']}}')">Detail Branch</a></li>
                                <?php 
                            }
                        ?>
                        <li class="breadcrumb-item active">Update Leads</li>
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
                <div class="col-md-12">
                   
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-6">
                                <label for="lead">Sreach Lead<b style="color:red">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                    </div>
                                    <?php
                                        for($i =0;$i<sizeof($updatelead); $i++){
                                        ?> 
                                            <select class="form-control select2" name="lead_id" id="lead_id">
                                                <option value=''>-- Select Lead  --</option>   
                                                @foreach($lead as $key)
                                                    <option value="{{$key->id}}" {{$key->id==$updatelead[$i]['lead_id'] ? 'selected="selected"':''}}> {{$key->customer_name_en}}</option>                                                               
                                                @endforeach                                   
                                            </select>
                                            <?php
                                        }
                                        
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left column -->
                <div class="col-md-12">                    
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header" style="background:#1fa8e0">
                                <h3 class="card-title">Branch Detail</h3>
                            </div>                            
                            <div class="card-body">
                                <?php
                                     for($i =0;$i<sizeof($updatelead); $i++){
                                    ?> 
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="company_en">Company Name English <b style="color:red">*</b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" hidden placeholder="Customer Name English" value="{{$updatelead[$i]['branch_id']}}"  name='branch_id' id="branch_id"  required>
                                                        <input type="text" class="form-control" placeholder="Customer Name English" value="{{$updatelead[$i]['company_en']}}"  name='company_en' id="company_en"  required>
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
                                                    <input type="text" class="form-control" name="company_kh" id="company_kh"  value="{{$updatelead[$i]['company_kh']}}"  placeholder="Customer Name khmer" >
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
                                                        <input type="email" class="form-control"  name="primary_email" id="primary_email" value="{{$updatelead[$i]['primary_email']}}" placeholder="Primary Email">
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
                                                        <input type="text" class="form-control" name="website"  value="{{$updatelead[$i]['primary_website']}}" id="website" placeholder="Website">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="company_facebook">Facebook</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="company_facebook" value="{{$updatelead[$i]['primary_website']}}"  id="company_facebook" placeholder="Facebook">
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
                                                                <option value="{{$key->id}}" {{$key->name_en==$updatelead[$i]['current_isp'] ? 'selected="selected"':''}}> {{$key->name_en}}</option>                                                               
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
                                                        <input type="text" class="form-control" name="vat_number" value="{{$updatelead[$i]['vat_number']}}" id="vat_number" placeholder="Vat Number">
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
                                                                <option value="{{$key->id}}" {{$key->company==$updatelead[$i]['company_detail'] ? 'selected="selected"':''}}> {{$key->name}} / {{$key->company}}</option>                                                               
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
                                                                <option value="{{$row->id}}" {{$row->lead_source==$updatelead[$i]['lead_source'] ? 'selected="selected"':''}}> {{$row->lead_source}}</option>                                                               
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
                                                    <input type=" " hidden value="{{$updatelead[$i]['lead_detail_id']}}" name="lead_detail_id">
                                                        <select class="form-control" name="lead_status" id="lead_status">
                                                            <option ></option>
                                                            @foreach($lead_status as $row)
                                                                <option value="{{$row->id}}" {{$row->name_en==$updatelead[$i]['lead_status'] ? 'selected="selected"':''}}> {{$row->name_en}}</option>                                                               
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
                                                                <option value="{{$row->id}}" {{$row->name_en==$updatelead[$i]['lead_industry'] ? 'selected="selected"':''}}> {{$row->name_en}}</option>                                                               
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
                                                    <label for="assig_to">Assigened To<b style="color:red">*</b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                                        </div>
                                                        <input type="text" hidden value="{{$updatelead[$i]['lead_assig_id']}}" name="assig_to_id" id="assig_to_id">
                                                        <select class="form-control select2" name="assig_to" id="assig_to">
                                                            <option></option>
                                                            @foreach($assig_to as $row )
                                                                <option value="{{$row->id}}" {{$row->id==$updatelead[$i]['assig_id'] ? 'selected="selected"':''}}> {{$row->first_name_en}} {{$row->last_name_en}}</option>                                                               
                                                            @endforeach
                                                        </select>
                                                        <span class="invalid-feedback" role="alert" id="assig_toError"> {{--span for alert--}}
                                                            <strong></strong>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="service">Service<b style="color:red">*</b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fab fa-speakap"></i></span>
                                                        </div>
                                                    <input type="text" hidden value="{{$updatelead[$i]['lead_item_id'] }}" name="lead_item_id">
                                                        <select class="form-control select2bs4" name="service" id="service">
                                                            {{-- <option></option> --}}
                                                            <?php 
                                                                for($j=0; $j<sizeof($service); $j++){
                                                                    ?>
                                                                        <option value="{{$service[$j]["id"]}}"  {{$service[$j]['name']==$updatelead[$i]['service'] ? 'selected="selected"':''}}>{{$service[$j]['name']}}</option>
                                                           
                                                                    <?php
                                                                }
                                                            ?>
                                                            
                                                                
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
                                                <div class="col-md-6">
                                                    <label for="current_speed">Current Speed</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-tachometer-alt"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="current_speed" value="{{$updatelead[$i]['current_isp_speed']}}" id="current_speed" placeholder="Current Speed">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="current_price">Current Price</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="current_price" id="current_price" value="{{$updatelead[$i]['current_isp_price']}}" placeholder="Current Price">
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
                                                                    <label for="honorifics">Prioroty</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                                                        </div>
                                                                        <select class="form-control " name="prioroty" id="prioroty" >
                                                                            <option value=''>-- Select  Prioroty --</option>                                                                 
                                                                            {{-- <option value='urgent'>Urgent</option>
                                                                            <option value='high'>Hight</option>
                                                                            <option value='medium'>Medium</option>
                                                                            <option value='low'>Low</option> --}}
                                                                            <option value="{{$updatelead[$i]['priority']}}"  {{$updatelead[$i]['priority']=='urgent' ? 'selected="selected"':''}}>Urgent</option>
                                                                            <option value="{{$updatelead[$i]['priority']}}"  {{$updatelead[$i]['priority']=='high' ? 'selected="selected"':''}}>Hight</option>
                                                                            <option value="{{$updatelead[$i]['priority']}}"  {{$updatelead[$i]['priority']=='medium' ? 'selected="selected"':''}}>Medium</option>
                                                                            <option value="{{$updatelead[$i]['priority']}}"  {{$updatelead[$i]['priority']=='low' ? 'selected="selected"':''}}>Low</option>
                                                                          
                                                                        </select>
                                                                        {{-- <span class="invalid-feedback" role="alert" id="ma_honorifics_idError"> {{--span for alert--}}
                                                                            {{-- <strong></strong> --}}
                                                                        {{-- </span> --}}
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="employee_count">Employee Count</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="employee_count" id="employee_count"  value="{{$updatelead[$i]['employee_count']}}" placeholder="Current Speed">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="col-md-6">
                                                    <label for="comment">Comment</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-comments"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="comment" id="comment" value="{{$updatelead[$i]['comment']}}" placeholder="Current Price">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>  
                        </div>
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                       <div class="col-md-6">
                                        <label for="contact">Search Contact<b style="color:red">*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                            </div>
                                            <input type="text" hidden value="{{$_SESSION['token']}}" id="getcontact">
                                            <?php
                                                for($i =0;$i<sizeof($updatelead); $i++){
                                                ?> 
                                                    <select class="form-control select2" name="contact_id" id="contact_id">
                                                        <option value=''>-- Select Contact  --</option> 
                                                        <?php 
                                                            for($j=0; $j<sizeof($contact); $j++){
                                                                ?>
                                                                    <option value="{{$contact[$j]['id']}}" {{$contact[$j]['id']==$updatelead[$i]['contact_id'] ? 'selected="selected"':''}}> {{$contact[$j]['name_en']}}</option>                                                               
                                                       
                                                                <?php
                                                            }
                                                        ?>                                     
                                                    </select>
                                                    <?php
                                                }
                                                
                                            ?>                                           
                                        </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary">
                            <div class="card-header" style="background:#1fa8e0">
                                <h3 class="card-title">Contact Detail</h3>
                            </div>                            
                            <div class="card-body">
                                <?php
                                     for($i =0;$i<sizeof($updatelead); $i++){
                                    ?> 
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="name_kh">Full Name Khmer<b style="color:red">*</b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" hidden value="{{$updatelead[$i]['lead_con_bran_id']}}"  name='lead_con_bran_id' id="lead_con_bran_id" >
                                                        <input type="text" class="form-control" placeholder="Frist Name"  value="{{$updatelead[$i]['name_kh_contact']}}"  name='name_kh' id="name_kh" >
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
                                                        <input type="text" class="form-control" name="name_en" id="name_en" value="{{$updatelead[$i]['name_en_contact']}}" placeholder="Last Name" >
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
                                                    <label for="exampleInputEmail1"> Email<b style="color:red">*</b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                        </div>
                                                        <input type="email" class="form-control"  name="email" id="email" value="{{$updatelead[$i]['email_contact']}}" placeholder="Email">
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
                                                        <input type="text" class="form-control" name="phone"id="phone"   value="{{$updatelead[$i]['phone']}}" placeholder="Primary Phone" >
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
                                                                    <label for="honorifics">Honorifics<b style="color:red">*</b></label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                                                        </div>
                                                                        <select class="form-control " name="ma_honorifics_id" id="ma_honorifics_id" >
                                                                            <option value=''>-- Select Contact Honorifics --</option>      
                                                                               
                                                                             @foreach($honorifics as $row )
                                                                                <option value="{{$row->id}}" {{$row->lead_name==$updatelead[$i]['gender'] ? 'selected="selected"':''}}> {{$row->lead_name}}</option>                                                               
                                                                            @endforeach                                      
                                                                            {{-- <option value='1'>Mr</option>
                                                                            <option value='2'>Ms</option> --}}
                                                                          
                                                                        </select>
                                                                        {{-- <span class="invalid-feedback" role="alert" id="ma_honorifics_idError"> {{--span for alert--}}
                                                                            {{-- <strong></strong> --}}
                                                                        {{-- </span> --}}
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="position">Position</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="position" id="position" value="{{$updatelead[$i]['position']}}" placeholder="Website">
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                                <div class="col-md-6">
                                                    <label for="national_id">National ID Ceard / Passport ID</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="national_id" id="national_id"  value="{{$updatelead[$i]['national_id']}}" placeholder="National ID Ceard ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php 
                                    }
                                ?>
                            </div>  
                        </div>                         
                                <div class="card card-primary">
                                    <div class="card-header" style="background:#1fa8e0">
                                        <h3 class="card-title">Address Detail</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                            for($i =0;$i<sizeof($updatelead); $i++){
                                                ?> 
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
                                                                                     <input type="text" hidden value="{{$updatelead[$i]['lead_address_id']}}" id='address_id' name='address_id'>
                                                                                    <input type="text" class="form-control"  name='home_en' value="{{$updatelead[$i]['home_en']}}" id="home_en" placeholder="Number of home"  >
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
                                                                                    <input type="text" class="form-control"  name='street_en' value="{{$updatelead[$i]['street_en']}}" id="street_en" placeholder="Number of street"  >
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
                                                                    <select class="form-control select2 city"  id="addresscode" name="addresscode" onchange="getbranch(this,'district','s','/district')" >
                                                                        <option></option>
                                                                    @foreach($province as $row )
                                                                        {{-- <option value="{{$row->code}}">{{$row->name_latin}}/{{$row->name_kh}}</option> --}}
                                                                        <option value="{{$row->code}}" {{$row->name_latin==$updatelead[$i]['province'] ? 'selected="selected"':''}}>{{$row->name_latin}}</option>
                                                           
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
                                                                                <label for="home_kh"> Home(KH)<b style="color:red">*</b></label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control"  name='home_kh' id="home_kh"value="{{$updatelead[$i]['home_kh']}}"  placeholder="Number of home" >
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
                                                                                    <input type="text" class="form-control"  name='street_kh' id="street_kh" value="{{$updatelead[$i]['street_kh']}}" placeholder="Number of street"  >
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
                                                                        <option value="{{$updatelead[$i]['district']}}">{{$updatelead[$i]['district']}}</option>
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
                                                                    <input type="text" class="form-control"  name='latlong' id="latlong" value="{{$updatelead[$i]['latlong']}}" placeholder="11.123456, 104.123456 Example" >
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
                                                                        <option value="{{$updatelead[$i]['commune']}}">{{$updatelead[$i]['commune']}} </option>
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
                                                                                        <option value="{{$updatelead[$i]['address_type']}}" {{$updatelead[$i]['latlong']=='billing' ? 'selected="selected"':''}} >Billing</option>
                                                                                        <option value="{{$updatelead[$i]['address_type']}}" {{$updatelead[$i]['latlong']=='install' ? 'selected="selected"':''}} >Install</option>
                                                                                        <option value="{{$updatelead[$i]['address_type']}}" {{$updatelead[$i]['latlong']=='main' ? 'selected="selected"':''}} >Main</option>
                                                                                    </select>
                                                                                    <span class="invalid-feedback" role="alert" id="address_typeError"> {{--span for alert--}}
                                                                                        <strong></strong>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="address_type"></label>
                                                                                <div class="input-group">
                                                                                </div>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input class="custom-control-input" type="checkbox" id="customCheckbox2" value="1" name="checksurvey" {{$updatelead[$i]['survey_id']!=''? 'checked':''}} >
                                                                                    <label for="customCheckbox2"  class="custom-control-label">Survey Or Not</label>
                                                                                </div>                                                                
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
                                                                        <option value="{{$updatelead[$i]['gazetteer_code']}}">{{$updatelead[$i]['village']}}</option>
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
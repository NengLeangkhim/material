
   @php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
   @endphp
   <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><span><i class="fas fa-id-card-alt"></i></span> Create New Contact</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="" class="CrmContact" ​value="/contact">Contact</a></li>
                        <li class="breadcrumb-item active">New Contact</li>
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
                    <form id="frm_CrmContact">
                        @csrf
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header" style="background:#1fa8e0">
                                <h3 class="card-title">Contact Detail</h3>
                            </div>                            
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="create_by" value="{{$_SESSION['userid']}}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="ma_honorifics_id">Honorifics <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                </div>
                                                <select class="form-control" name="ma_honorifics_id" id="ma_honorifics_id" required>
                                                    <option value="">None</option>
                                                    @foreach ($honorifics->data as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option> 
                                                    @endforeach
                                                </select>
                                                <span class="invalid-feedback" role="alert" id="ma_honorifics_idError"> {{--span for alert--}}
                                                    <strong></strong>
                                                </span>
                                            </div> 
                                        </div>
                                         <div class="col-md-6">
                                            <label for="name_en">Contact Name English <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Customer Name English"  name='name_en' id="name_en"  required>
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
                                            <label for="name_kh">Contact Name khmer </label>
                                             <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="name_kh" id="name_kh" placeholder="Customer Name khmer" >
                                                {{-- <span class="invalid-feedback" role="alert" id="name_khError"> span for alert
                                                    <strong></strong>
                                                </span> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email">Primary Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                </div>
                                                <input type="email" class="form-control"  name="email" id="email" placeholder="Primary Email">
                                                {{-- <span class="invalid-feedback" role="alert" id="emailError"> span for alert
                                                    <strong></strong>
                                                </span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                         <div class="col-md-6">
                                            <label for="phone">Primary Phone <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="phone"id="phone" placeholder="Primary Phone"   onkeypress="return onlyNumberKey(event)">
                                                <span class="invalid-feedback" role="alert" id="phoneError"> {{--span for alert--}}
                                                    <strong></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="position">Position</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrows-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="position" id="position" placeholder="Position">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                         <div class="col-md-6">
                                            <label for="facebook">Facebook</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="national_id">National ID</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="national_id" id="national_id" placeholder="National ID">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" onclick="CrmSubmitFormFull('frm_CrmContact','/contact/store','/contact','Insert Successfully')" id="frm_btn_sub_addcontact">Save</button>
                                    <button type="button" class="btn btn-danger" onclick="go_to('/contact')">Cencel</button>
                                </div>
                            </div>  {{--End Card Body--}}
                        </div>
                               
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
            $('.CrmContact').click(function(e)
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

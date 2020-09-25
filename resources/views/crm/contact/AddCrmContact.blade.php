
   
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
                    <form id="frm_CrmContact" action="">
                        @csrf
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header" style="background:#1fa8e0">
                                <h3 class="card-title">Contact Detail</h3>
                            </div>                            
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Contact Name English <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Customer Name English"  name='custEng'  required>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                             <label for="exampleInputEmail1">Contact Name khmer <b style="color:red">*</b></label>
                                             <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="custkh" id="exampleInputEmail1" placeholder="Customer Name khmer" >
                                            </div>
                                         </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Primary Email<b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                </div>
                                                <input type="email" class="form-control"  name="email" id="exampleInputEmail1" placeholder="Primary Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Primary Phone <b style="color:red">*</b></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="phone"id="exampleInputEmail1" placeholder="Primary Phone" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                         <div class="col-md-6">
                                            <label for="exampleInputEmail1">Position</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrows-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="website" id="exampleInputEmail1" placeholder="Position">
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
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                         <div class="col-md-6">
                                            <label for="exampleInputEmail1">National ID</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="website" id="exampleInputEmail1" placeholder="National ID">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary save" id="frm_btn_sub_addlead">Save</button>
                                    <button type="button" class="btn btn-danger" onclick="go_to('lead')">Cencel</button>
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
            $('.save').click(function(){
                submit_form ('/addlead','frm_lead','lead');
            })
    </script>

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
                <h1><span><i class="fas fa-book-reader"></i></span> Detail Lead</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('/lead')">Lead</a></li>
                    <li class="breadcrumb-item active">Detail Lead</li>
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
                <div class="col-9">
                    <div class="row">
                        {{-- <div class="> --}}
                            <h3 class="card-title"​>
                                {{-- <i class="far fa-id-card" style="padding-right:15px; font-size:35px"></i> --}}
                                    {{-- <h6 style="font-weight: bold; font-size: 20px">drgdS</h6>  --}}
                                  
                            </h3>
                        {{-- </div> --}}
                    </div>
                </div>
                <div class="col-md-3 ">
                   <div class="row">
                    <?php
                    for($i =0;$i<sizeof($detaillead); $i++){
                        ?>
                         <div class="col-md-6 " >
                            {{-- <button type="button" ​value="editlead/{{$detaillead[$i]["lead_id"]}}" class="btn btn-primary btn-md LeadEdit form-control" >Edit</button>                                                         --}}
                        </div>                         
                        <div class="col-md-6 " >
                            <div class="row">
                                <button type="button" ​value="editlead/{{$detaillead[$i]["lead_id"]}}" class="btn btn-primary btn-md LeadEdit form-control" >Edit</button> 
                            </div>
                        </div>  
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
                            Detail Lead
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <dl class="row">
                            {{-- <dt class="col-sm-4 dt" >Lead Number</dt> --}}
                            {{-- <dd class="col-sm-8 dd" >TT-LAD00000678</dd> --}}
                            <?php
                            for($i =0;$i<sizeof($detaillead); $i++){
                                ?>
                                    <dt class="col-sm-4 dt">Lead Number</dt>
                                    <dd class="col-sm-8 dd" >{{$detaillead[$i]["lead_number"]}}</dd>
                                    <dt class="col-sm-4 dt">Company Name English</dt>
                                    <dd class="col-sm-8 dd" >{{$detaillead[$i]["customer_name_en"]}}</dd>
                                    <dt class="col-sm-4 dt">Company Name Khmer</dt>
                                    <dd class="col-sm-8 dd">{{$detaillead[$i]["customer_name_kh"]}}</dd>
                                    <dt class="col-sm-4 dt">Primary Email</dt>
                                    <dd class="col-sm-8 dd">{{$detaillead[$i]["email"]}}</dd>
                                    <dt class="col-sm-4 dt">Primary Facebook</dt>
                                    <dd class="col-sm-8 dd">{{$detaillead[$i]["facebook"]}}</dd>
                                    <dt class="col-sm-4 dt">Primary Website </dt>
                                    <dd class="col-sm-8 dd">{{$detaillead[$i]["website"]}} </dd>
                                    <dt class="col-sm-4 dt">Company Branch </dt>
                                    <dd class="col-sm-8 dd">{{$detaillead[$i]["company"]}} </dd> 
                                    <dt class="col-sm-4 dt">Vat Number </dt>
                                    <dd class="col-sm-8 dd">{{$detaillead[$i]["vat_number"]}}</dd>
                                    <dt class="col-sm-4 dt">Lead source </dt>
                                    <dd class="col-sm-8 dd">{{$detaillead[$i]["lead_source"]}} </dd>
                                    <dt class="col-sm-4 dt">Industry </dt>
                                    <dd class="col-sm-8 dd">{{$detaillead[$i]["lead_industry"]}} </dd>
                                    <dt class="col-sm-4 dt">Current ISP </dt>
                                    <dd class="col-sm-8 dd">{{$detaillead[$i]["current_isp_name"]}}  </dd>
                                    <dt class="col-sm-4 dt">Current Speed </dt>
                                    <dd class="col-sm-8 dd">{{$detaillead[$i]["current_isp_speed"]}}  </dd>
                                    <dt class="col-sm-4 dt">Current Price </dt>
                                    <dd class="col-sm-8 dd">{{$detaillead[$i]["current_isp_price"]}} </dd>
                                    <dt class="col-sm-4 dt">Employee Count</dt>
                                    <dd class="col-sm-8 dd">{{$detaillead[$i]["employee_count"]}} </dd>
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
<script>
    $('.LeadEdit').click(function(e)
    {
                var id = $(this).attr("​value");
                go_to(id);
                // alert(id);
    });
</script>

       


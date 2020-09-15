<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Contact</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);" class="contact" onclick="go_to('/contact')">contact</a></li>
                    <li class="breadcrumb-item active">Detail Contact</li>
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
                                <i class="far fa-id-card" style="padding-right:15px; font-size:35px"></i>
                                    {{-- <h6 style="font-weight: bold; font-size: 20px">drgdS</h6>  --}}
                                    Test okayy
                            </h3>
                        {{-- </div> --}}
                    </div>
                </div>
                <div class="col-6 " >
                   <div class="row">
                        <div class="col-6 " align="right"><button type="button" ​value="/contact/edit/1" class="btn btn-primary btn-md CrmContactEdit">Edit</button></div>
                        <div class="col-6 " align="left"><button type="button"  class="btn btn-success btn-md">Convert</button></div>
                   </div>
                </div>
              </div>
            </div>
        </div>
    </div>
      <!-- /.card -->      
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                {{-- contact detail --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{-- <i class="fas fa-text-width"></i> --}}
                            Contact Detail
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 dt" >Name English</dt>
                            <dd class="col-sm-8 dd" > Sok kita</dd>
                            <dt class="col-sm-4 dt">Name Khmer</dt>
                            <dd class="col-sm-8 dd" >A description list is perfect for defining terms.</dd>
                            <dt class="col-sm-4 dt">Email</dt>
                            <dd class="col-sm-8 dd">Vestibulum id ligula porta felis euismod semper eget </dd>
                            {{-- <dd class="col-sm-8 offset-sm-4">Primary Email</dd> --}}
                            <dt class="col-sm-4 dt">Facebook</dt>
                            <dd class="col-sm-8 dd">Etiam porta sem malesuada magna mollis euismod.</dd>
                            <dt class="col-sm-4 dt">Position </dt>
                            <dd class="col-sm-8 dd">Fusce dapibus, tellus ac cursus commodo, tortor mauris 
                            </dd>
                        </dl>
                    </div>
                </div>
                    {{-- end contact detail --}}
            </div>
            <div class="col-md-4">
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
            </div>
        </div>
    </div>
    <!-- ./col -->
</section>
    <script>
    $('.CrmContactEdit').click(function(e)
                {
                    var id = $(this).attr("​value");
                    go_to(id);
                });
    </script>

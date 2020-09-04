
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Contact</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">View Contact</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- section Main content -->
            <section class="content"> 
                <div class="card card-solid">
                  <div class="card-header">
                    <div class="col-2">
                        <div class="row  ">
                            <!-- <a  href="#" class="btn btn-block btn-success lead" value="addlead" onclick="addlead()"><i class="fas fa-wrench"></i> Add Lead</a>  -->
                            <a  href="#" class="btn btn-block btn-success lead" ​value="addlead" id="lead"><i class="fas fa-search"></i> Serch Contacts</a> 
                        </div>
                    </div>                               
                </div>  
                    <div class="card-body pb-0">
                      <div class="row d-flex align-items-stretch">
                        @foreach ($contact as $row )
                        <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch" >
                          <div class="card bg-light" style="width:1000px">
                            <div class="card-header text-muted border-bottom-0">
                              
                            </div>
                            <div class="card-body pt-0">
                              <div class="row">
                                <div class="col-7">
                                <h2 class="lead"><b>{{($row->name_en)=='Null'? "N/A":$row->name_en}}</b></h2>
                                <h2 class="lead"><b>{{($row->name_kh)=='Null'? "N/A":$row->name_kh}}</b></h2>
                                  <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-at"></i></span> Email : {{($row->email)=='NUll'? "turbotech@gmail.com":$row->email}}                                  </li>
                                    <li class="small"><span class="fa-li"><i class="fab fa-facebook-f"></i></span> Facbook : {{($row->facebook)=='Null'? "N/A":$row->facebook}}                                  </li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-phone-alt"></i></span> Phone : {{($row->phone)=='Null'? "N/A":$row->phone}}</li>
                                  </ul>
                                </div>
                                <div class="col-5 text-center">
                                  <img src="../../dist/img/user8-128x128.jpg" alt="" class="img-circle img-fluid">
                                </div>
                              </div>
                            </div>
                            <div class="card-footer">
                              <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                  <i class="fas fa-comments"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                  <i class="fas fa-user"></i> View Profile
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach                      
                        
                      </div> 
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <nav aria-label="Contacts Page Navigation">
                        <ul class="pagination justify-content-center m-0">
                          <li class="page-item active"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item"><a class="page-link" href="#">4</a></li>
                          <li class="page-item"><a class="page-link" href="#">5</a></li>
                          <li class="page-item"><a class="page-link" href="#">6</a></li>
                          <li class="page-item"><a class="page-link" href="#">7</a></li>
                          <li class="page-item"><a class="page-link" href="#">8</a></li>
                        </ul>
                      </nav>
                    </div>
                    <!-- /.card-footer -->
                  </div>
            </section><!-- end section Main content -->

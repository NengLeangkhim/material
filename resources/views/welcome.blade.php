    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"><br>
                    <div class="card card-primary">
                        <div class="card-header" style="background-color: #d42931;">
                          <h3 class="card-title">{{ $dept[0]->name??'' }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="row" style="padding: 1%;">
                            <div class="col-md-3">
                                <div class="card" style="padding: 3%;">
                                    <img class="profile-pic" src="<?php echo $uself[0]->image??"/storage/avatar7.png";?>" style="width:100%" id='image_'>
                                    <p>{{ $uself[0]->name??'' }}</p>
                                    <p>{{ $uself[0]->position??'' }}</p>
                                    <p>{{ $uself[0]->name??'' }}</p>
                                    <p>{{ $uself[0]->phone??'' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6 welcome-bg">

                            </div>
                            <div class="col-md-3 ">
                                <div class="card" style="padding: 3%;">
                                    <img class="profile-pic" src="<?php echo $head[0]->image??"/storage/avatar7.png";?>" style="width:100%" id='image_'>
                                    <p>{{ $head[0]->name??'' }}</p>
                                    <p>{{ $head[0]->position??'' }}</p>
                                    <p>{{ $head[0]->name??'' }}</p>
                                    <p>{{ $head[0]->phone??'' }}</p>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // alert();
        img_exist();
    </script>
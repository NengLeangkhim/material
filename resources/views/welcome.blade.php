    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"><br>
                    <div class="card card-primary">
                        {{-- <div class="card-header" style="background-color: #d42931;">
                          <h3 class="card-title">{{ $dept[0]->name??'' }}</h3>
                        </div> --}}
                        <!-- /.card-header -->
                        <div class="row" style="padding: 1%;">
                            {{-- <div class="col-md-12" id="row_welcome"></div> --}}
                            <div class="col-md-12" style="height: auto;text-align: center;">
                                <img id="img_profile_company" src="../images/turbotech-text.png">
                            </div>
                            <div class="col-md-3" style="position: relative">
                                <div class="card" style="padding: 3%;">
                                    <img class="profile-pic" src="<?php echo $head[0]->image??"/storage/avatar7.png";?>" style="width:100%" id='image_'>
                                    {{-- <p>{{ $head[0]->phone??'' }}</p> --}}
                                    <table style="width:100%">
                                        <tr>
                                          <td width="30%">Name</td>
                                          <td>: {{ $head[0]->name??'' }}</td>
                                        </tr>
                                        <tr>
                                          <td width="30%">Position</td>
                                          <td>: {{ $head[0]->ma_position??'' }}</td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Contact</td>
                                            <td>: {{ $head[0]->contact??'' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-3">
                                <div class="card" style="padding: 3%;">
                                    <img class="profile-pic" src="<?php echo $uself[0]->image??"/storage/avatar7.png";?>" style="width:100%" id='image_'>
                                    {{-- <p>{{ $uself[0]->contact??'' }}</p> --}}
                                    <table style="width:100%">
                                        <tr>
                                          <td width="30%">Name</td>
                                          <td>: {{ $uself[0]->name??'' }}</td>
                                        </tr>
                                        <tr>
                                          <td width="30%">Position</td>
                                          <td>: {{ $uself[0]->ma_position??'' }}</td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Contact</td>
                                            <td>: {{ $uself[0]->contact??'' }}</td>
                                        </tr>
                                    </table>
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
    


<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background: #1fa8e0">
    <!-- Left navbar links -->
    <ul class="navbar-nav" id='nav_bar_sub_r'>
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link" onclick="mydemo()">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" style="width: 15%;">
      <!-- Messages Dropdown Menu -->
      {{-- <li class="nav-item">
        <a href="" class="nav-link"><i class="fas fa-power-off "></i></a>
      </li> --}}


      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> --}}


      <!-- Notifications Dropdown Menu -->

      @php
          if (session_status() == PHP_SESSION_NONE) {
              session_start();
          }
          $r = $_SESSION['user_id'];
          // print_r($r);
      @endphp
      
      <li class="nav-item dropdown">
       
        
              <a style="margin-right: 20px;" class="dropdown-toggle" data-toggle="dropdown" href="#">
                <img src="img/icons/user_icon2.png" style="position: relative;  width: 40px; height: 40px;" class="user-image" alt="User Image" />
                <span style="font-weight: bold; color: black;" class="d-none d-lg-inline-block kh-font-batt"><?php echo $r['0']->name_kh; ?></span>
              </a>
         
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div style="background-color: skyblue" class="dropdown-item">
                          <h6 style="font-size: 18px;"><?php echo $r['0']->fname." ".$r['0']->lname; ?></h6>
                          <p><?php echo $r['0']->email; ?></p>
                    </div>
                    
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item" onclick="go_to('hrm_recruitment_user_profile');">
                      <i class="fas fa-user-check mr-2"></i>
                       View Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                      
                      <i class="fas fa-user-cog mr-2"></i> Setting Account
                      
                    </a>
                    
                    <div class="dropdown-divider"></div>
                    <a href="/hrm_index_user_register" class="dropdown-item dropdown-footer"><i class="fa fa-sign-out mr-2"></i> Logout</a>
              </div>

      </li>




      {{-- <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
          </a>

           
      </li> --}}













    </ul>
  </nav>
  <!-- /.navbar -->
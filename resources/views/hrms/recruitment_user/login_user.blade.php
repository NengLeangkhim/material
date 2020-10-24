
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="img/icon.png">
    
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <link rel="stylesheet" type="text/css" href="css/overWriteMain.css">
    <!-- font-icon CSS-->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="css/animate.css">
    
    <title>User Login</title>
    <style>
        .material-half-bg{
            background-image: url("images/company_logo.png");OBBPNP0
            background-color: black;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            opacity: 70%;
        }
        .form-control{
            font-family: khmer OS Content, cursive​​​;
        }

        .no-shadow {
            box-shadow: none!important;
        }

    </style>
</head>
<body>
        <div>
        <section class="material-half-bg" >
            <div class="cover"></div>
        </section>
    </div>
    <section class="login-content">
        {{-- <div class="login-box"> --}}
        <div class="login-box">
            
            <form class="login-form" action="/hrm_recruitment_login" method="post" >
                @csrf
                <h3 class="login-head"><img src="images/turbotech.png" width="85%" height="85%" alt=""></h3>

                <h4 style="text-align: center; color: blue;">User Login</h4>
                <div class="form-group" style="width: 100%;" >
                    <label class="control-label"><b>User Email</b></label>
                    <div class="inputWithIcon">
                        <input class="form-control " name="user_email" type="text" placeholder="User Email:" autofocus required>
                        <i class="fa fa-lg fa-fw fa-envelope-square"></i>
                    </div>
                </div>
                <div class="form-group" style="width: 100%;">
                    <label class="control-label"><b>Password</b></label>
                    <div class="inputWithIcon">
                        <input class="form-control " name="password" type="password" placeholder="Password:" required>
                        <i class="fa fa-lg fa-fw fa-key"></i>
                    </div>
                     <div class="text-danger">
                    
                </div>
                </div>

                <div class="form-group btn-container" style="width: 100%;">
                    <button type="submit" class="btn btn-danger btn-block" name="btn_userLogin" >SIGN IN</button>
                </div>

                <div class="form-group btn-container pt-2" style="text-align: center	;">
                    <a href="hrm_index_user_register"><h5>Create Account <i style="font-size:18px; "class="fas fa-long-arrow-alt-right"></i></h5></a>
                </div>


            </form>

        </div>
    </section>

    <script src="plugins/jquery/jquery.min.js" ></script>
    <script src="plugins/popper/popper.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>

    <!--  -->

</body>
</html>

@php

    $xx = -1;
    if(isset($login_faile)){
        $xx = $login_faile;
    }
    
@endphp

<script type="text/javascript">
    var p = {!! json_encode($xx) !!};
    if(p == 1){
        // $.notify("Please input the correct email or password !", "error");
        Swal.fire('Please input the correct email or password !')
    }
</script>





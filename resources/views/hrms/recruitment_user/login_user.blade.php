
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
            /* background-image: url("images/company_logo.png");OBBPNP0 */
            background-image: url("images/company_logo.png");
            background-color: black;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            opacity: 70%;
        }
        .form-control{
            font-family: khmer OS Content, cursive​​​;
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
        <div class="login-box">    
            <form class="login-form" action="/hrm_recruitment_login" method="post" style="">
                @csrf

                <h3 class="login-head"><img src="images/turbotech.png" width="70%" height="70%" alt=""></h3>
                <h2 style="color:rgb(7, 168, 243); text-align: center; font-family:Bahnschrift SemiBold Condensed">User Login</h2>
                <div class="form-group"  >

                    <label class="control-label"><b>Email</b></label>
                    <div class="inputWithIcon">
                        <input class="form-control " name="user_email" type="text" placeholder="User Email:" autofocus required>
                        <i class="fa fa-lg fa-fw fa-envelope-square"></i>
                        <p id='msgError' style='color:#cc0000'>Incorrect email or password</p>
                    </div>
                </div>
                <div class="form-group" >
                    <label class="control-label"><b>Password</b></label>
                    <div class="inputWithIcon">
                        <input class="form-control " name="password" type="password" placeholder="Password:" required>
                        <i class="fa fa-lg fa-fw fa-key"></i>
                    </div>
                    <div class="text-danger">
                        
                    </div>
                </div>

                <div class="form-group btn-container" >
                    <button type="submit" class="btn btn-danger btn-block" name="btn_userLogin" >SIGN IN</button>
                </div>

                <div class="form-group btn-container" style="text-align: center; padding-top: 15px;">
                    <a href="hrm_index_user_register"><h5>Create Account <i style="font-size:18px; "class="fas fa-long-arrow-alt-right"></i></h5></a>
                </div>
            </form>

        </div>
    </section>

    <script src="plugins/jquery/jquery.min.js" ></script>
    <script src="plugins/popper/popper.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="plugins/sweetalert2/sweetalert2.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>

    <!--  -->

</body>
</html>

@php
    $faile = '';
    if(isset($login_faile)){
        $faile = $login_faile;
    }
@endphp

<script type="text/javascript">
    //show incorrect email & password when user input wrong
    $('#msgError').hide();
    var p = {!! json_encode($faile) !!};
    if(p == 1){
        $('#msgError').show();
        setTimeout(function(){ 
            $('#msgError').hide();
         }, 5000);
    }
</script>


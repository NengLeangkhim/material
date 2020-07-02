
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
    <title>Turbotech System</title>
    <style>
        .material-half-bg{
            background-image: url("images/company_logo.png");/*OBBPNP0*/
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
            <form class="login-form " action="/" method="post">
                @csrf
                <h3 class="login-head"><img src="images/turbotech.png" width="100%" height="100%" alt=""></h3>
                <div class="form-group" >
                    <label class="control-label">User ID</label>
                    <div class="inputWithIcon">
                        <input class="form-control " name="username" type="text" placeholder="User ID:" value="{{ $old??'' }}" autofocus required>
                        <i class="fa fa-lg fa-fw fa-envelope-square"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <div class="inputWithIcon">
                        <input class="form-control " name="password" type="password" placeholder="Password:" required>
                        <i class="fa fa-lg fa-fw fa-key"></i>
                    </div>
                     <div class="text-danger">
                    @php
                        if(isset($message)){
                            echo $message;
                        }
                    @endphp
                </div>
                </div>
                {{-- <div class="form-group">
                    <div class="utility">
                        <label>
                            <input type="checkbox"><span class="label-text" id="stay-sign-in"> Stay Signed in </span>
                        </label>
                        <div class="animated-checkbox"> --}}
                            <!-- <label>
                                <input type="checkbox"><span class="label-text" id="stay-sign-in"> Stay Signed in </span>--}}
                            </label> -->
                        {{-- </div>
                        <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
                    </div>
                </div> --}}
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block">SIGN IN</button>
                </div>
            </form>
            <form class="forget-form" action="index.html">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
                <div class="form-group">
                    <label class="control-label">E-mail</label>
                    <input class="form-control" type="text" placeholder="E-mail">
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
                </div>
                <div class="form-group mt-3">
                    <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
                </div>
            </form>
        </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="plugins/jquery/jquery.min.js" ></script>
    {{-- <script src="js/admin/jquery-3.2.1.min.js"></script> --}}
    <script src="plugins/popper/popper.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="js/main.js"></script> --}}
    <!-- The javascript plugin to display page loading on top-->
    {{-- <script src="js/admin/plugins/pace.min.js"></script> --}}

    <!--  -->
</body>
</html>


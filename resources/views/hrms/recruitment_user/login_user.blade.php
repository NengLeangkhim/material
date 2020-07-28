
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
            <form class="login-form" action="" method="post">
                @csrf
                <h3 class="login-head"><img src="images/turbotech.png" width="100%" height="100%" alt=""></h3>
                <h4 style="text-align: center; color: blue;">User Login</h4>
                <div class="form-group" >
                    <label class="control-label">User Email</label>
                    <div class="inputWithIcon">
                        <input class="form-control " name="username" type="text" placeholder="User ID:" value="" autofocus required>
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
                    
                </div>
                </div>

                <div class="form-group btn-container">
                    <button type="btnUserLogin" class="btn btn-danger btn-block">SIGN IN</button>
                </div>
            </form>

        </div>
    </section>

    <script src="plugins/jquery/jquery.min.js" ></script>
    <script src="plugins/popper/popper.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!--  -->

</body>
</html>


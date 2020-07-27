<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidate Register Account</title>
    {{-- CSS file --}}
    <link rel="stylesheet" href="recruitment_user_style/css/bootstrap.css">
    <link rel="stylesheet" href="recruitment_user_style/css/bootstrap.min.css">
    <link rel="stylesheet" href="recruitment_user_style/css/fontawesome.css">
    <link rel="stylesheet" href="recruitment_user_style/css/fontawesome.min.css">
    <link rel="stylesheet" href="recruitment_user_style/css/form_designer_style.css">
    <link rel="stylesheet" href="recruitment_user_style/css/formCss.css">
    <link rel="stylesheet" href="recruitment_user_style/css/main.css">
    <link rel="stylesheet" href="recruitment_user_style/css/mystyle_owner.css">
    <link rel="stylesheet" href="recruitment_user_style/css/nova.css">
    <link rel="stylesheet" href="recruitment_user_style/css/printForm.css">
    <link rel="stylesheet" href="recruitment_user_style/css/styles1.css">
    {{-- JS file --}}


    <style>
        h6 {
            color: blue;
          }
        body {   
                background-image: url("{{ asset('recruitment_user_style/img/interview10.png') }}");
                height: 100%; 
                background-position: center; 
                background-repeat: no-repeat;
                background-size: cover;
        }

        
    </style>

</head>
<body>

    <div class="container-fluid" style="" >
        <font face="Khmer OS Battambang"​>
        <!-- -----------------Start header-------------- -->
            <div class="row "  style="">
                <div class="col-lg-3 col-md-3 col-sm-3 ">  
                </div>            
            </div>
        <!-- --------------End Header-------------- -->
        <!-- -----------------Start Input Body------------- -->
            <div class="row " style="padding: 10px;">
                <div class="col-xl-1 col-md-1 col ">
                    <Input type="hidden" name=""> 
                </div>
                <div class=" col-xl-10 col-md-10 col-sm-12 col-12  register-main">  

                        @include('hrms.recruitment_user.register_form')
                       
                </div>
                <div class="col-xl-1 col-md-1 col " >
                    <Input type="hidden" name="">
                </div>
            </div>
            <!-- ------------------End Input Body-------------- -->
        </font>
    </div>



</body>
</html>

<script>$('input[type=file]').change(function(e) {
    $in = $(this);
    $in.next().html($in.val());  
}); 
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <link rel="icon" href="favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin : Physician Staffing Solutions</title>
    <!-- Bootstrap -->
    <link href="resources/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="resources/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="resources/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="resources/vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="resources/build/css/custom.min.css" rel="stylesheet">
    <style>
    .toggle-password {
        float: right;
        top: -47px;
        right: 2px;
        font-size: 20px;
        position: relative;
        cursor: pointer;
    }
    </style>
</head>

<body class="login" style="background:#EDEDED;">
    <div>
        <a href="../index.php">
            <center><img src="../images/DGB.png" alt="" style="padding-top: 50px; width:250px" /></center>
        </a>
        <div class="login_wrapper" style="margin-top:10px">
        
        <div class="animate form login_form">
            <section class="login_content">
                <div class="alert alert-dismissible fade in" role="alert" id="MsgBox" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span> </button>
                    <strong> <label class="lcMessage"></label></strong>
                </div>
                <form>
                    <h1 style="letter-spacing:2px;">Admin Login</h1>
                    <div>
                        <input type="text" class="form-control email" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control password" placeholder="Password" required="" />
                        <i toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></i>
                    </div>
                    <div>
                        <!-- <a class="btn btn-default submit">Log in</a> -->
                        <button type="button" class="btn btn-info submit">Log in</button>
                        <button class="btn btn-primary" onclick="fnRedirecttoHome()">HOME</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <a href="../index.php">
                                <h1 style="letter-spacing:2px;"> physicianstaffingsolution.com </h1>
                            </a>
                            <p>©2022 All Rights Reserved. physicianstaffingsolution.com</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>


    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>


    <script type="text/javascript">
    $(document).ready(function() {

        $('input[type=text]').focus(function(event) {
            $(event.target).removeClass('parsley-error');
            $('.alert').hide();
        });
        $('.password').focus(function(event) {
            $(event.target).removeClass('parsley-error');
            $('.alert').hide();
        });
        $('.password').focus(function(event) {
            $('.alert').hide();
        });
        $('#IsSucess').hide();
        $('#IsFailed').hide();
        $('.password').keypress(function(e) {
            if (e.keyCode == 13)
                $('.submit').click();
        });
        $(document).on('click', '.toggle-password', function() {
          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $(".password");
          input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password');
        });

    });
    </script>



    <script>
    function fnRedirecttoHome() {
        window.location.href = "../index.php";
    }

    $('.submit').click(function(event) {
        //alert('ok');
        // let password = '';
        // var email = '' ;

        if ($('.email').val() == '') {
            $('.lcMessage').text("UserId required ");
            $('#MsgBox').addClass('alert-danger');
            $('#MsgBox').show();
            //alert("Email And Password required ") 
        } else if ($('.password').val() == '') {
            $('.lcMessage').text("Password required");
            $('#MsgBox').addClass('alert-danger');
            $('#MsgBox').show();
        } else {
            var email = $('.email').val()
            var Userpassword = $('.password').val()
            $.ajax({
                type: "POST",
                dataType: "json",
                url: 'api/apiadmin.php',
                data: {
                    action: 'loginUsers',
                    password: Userpassword,
                    loginid: email
                },
                success: SuccessHandler
            });

            function SuccessHandler(data) {
                console.log(data);
                if (data.success === false) {
                    $('.lcMessage').text(data.msg);
                    $('#MsgBox').addClass('alert-danger');
                    $('#MsgBox').show();
                } else {
                    window.location.href = 'dashboard.php';
                }
            };
        }

    });
    </script>
</body>

</html>
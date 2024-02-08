<?php

include('config.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!--contry code-->
  <!-- <link rel="stylesheet" href="../plugins/countrycode/build/css/intlTelInput.css"> -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="loginForm" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" id="email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <!-- <a href="#" class="btn btn-block btn-danger"> -->
        <?php
if (!isset($_SESSION['access_token'])) {
    $login_button = '<a href="' . $google_client->createAuthUrl() . '" class="btn btn-block btn-danger">
          Login With Google+
        </a>';
}
?>

<?php echo $login_button; ?>

  
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="./forgot_password.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- <script src="../plugins/countrycode/build/js/intlTelInput-jquery.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>


  <script src="../plugins/toastr/toastr.min.js"></script>

<script>
  $("#loginForm").validate({
    rules:{
      email:{
        required: true,
        // pattern: /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
      },
      password:{
        required: true,
        pattern: /^[a-zA-Z0-9]*[!@#$%^&*()_+={}\[\]:;<>,.?\/~\\|-][a-zA-Z0-9]*$/,
      }
    },
    messages:{
      email:{
        required: "email is required",
        // pattern: "Please enter a valid email address"

        
      },
      password:{
        required: "password is required",
        pattern: "invalid password"
      }
    }
  })

 
</script>

<script>
  $(document).ready(function () {
      $("#submit").click(function () {
        
        event.preventDefault();
        let isValid = $("#loginForm").valid();
        if(isValid){
          // submitHandler: function(form) {
          var frm = $("#loginForm").serializeArray();
          console.log(frm);
  
          $.ajax({
            type: "POST",
            url: "../backend/authcontroller.php",
            data:JSON.stringify({
              action:'loginnew',
              data:frm,
            }),
            dataType:"json",
            success: function (response) {
              console.log(response);
              if (response["status"] == 200) {
                // alert("register");

                // toastr.success(response["message"]);
                               window.location.href = "../userData.php";
            }else if(response["status"] == 202){
              // console.log("userlogin");
              // window.location.href = "../wokiee_templete/html/index.php";
            }else {
                toastr.error(response["message"]);
            }
            
            // },
            // error: function (xhr, status, error) {
            //   console.error(error);
            }
          })
        } 
      })
    })

  </script>
</body>
</html>

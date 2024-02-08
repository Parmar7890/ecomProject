<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Please Enter Your valid Email</p>

                <form action="" method="post" id="forgot_form">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email" name="email" id="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div id="emailErr" style="color:red;"></div>
                    <div class="row">


                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
                        </div>
                        <div id="bootstrap-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true"
                            data-delay="3000">
                            <div class="toast-body">
                                <!-- Toast message will be inserted here -->
                            </div>
                        </div>

                        <!-- /.col -->
                    </div>
                </form>





            </div>
            <!-- /.login-card-body -->
        </div>
    </div>


    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <!-- <script src="../dist/js/adminlte.min.js"></script> -->
    <script src="../plugins/toastr/toastr.min.js"></script>
    <script>

        $(document).ready(function () {
            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            $("#forgot_form").submit(function (e) {

                e.preventDefault();
                var isValid = true;

                var email = $("#email").val();
                //  alert(email);
                $("#emailErr").text("");

                if (email == "") {
                    $("#emailErr").text("email name is required");
                    isValid = false;
                }
                else if (!emailRegex.test(email)) {
                    $("#emailErr").text("invaild email!!");
                    isValid = false;
                }

                if (isValid) {

                    var fm = new FormData(this);
                    fm.append("action", "forgot_password");
                    $.ajax({
                        type: "post",
                        url: "../backend/authcontroller.php",
                        data: fm,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (response) {
                            console.log(response)
                            if (response["status"] == 200) {
                                toastr.success(response["message"])
                                window.location.href = "../otp.php";
                            }
                            else {
                                toastr.error(response["message"])
                            }

                        },
                        error: function (xhr, status, error) {
                            console.log(error)
                        }
                    })
                }
                else {
                    return isValid;
                }


            })
        })
    </script>

</body>

</html>
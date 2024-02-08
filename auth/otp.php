<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otp</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
    <link rel="stylesheet" href="./plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="./index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Otp</p>

                <form action="./controller/User.php" method="post" id="otp_form">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="otp" name="otp" id="otp">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <!-- <span class="fas fa-envelope"></span> -->
                            </div>
                        </div>
                    </div>
                    <div id="otpErr" style="color:red;"></div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>





            </div>
            <!-- /.login-card-body -->
        </div>
    </div>



    <script src="./plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <!-- <script src="./dist/js/adminlte.min.js"></script> -->
    <script src="./plugins/toastr/toastr.min.js"></script>
    <script>
        $(document).ready(function () {
            var otpCheck = /^[0-9]+$/;

            $("#otp_form").submit(function (e) {
                e.preventDefault();
                var isValid = true;

                var otp = $("#otp").val();
                $("#otpErr").text("");

                if (otp == "") {
                    $("#otpErr").text("otp is reuired!");
                    isValid = false;
                } else if (!otpCheck.test(otp)) {
                    $("#otpErr").text("invaild otp!!");
                    isValid = false;
                }

                if (isValid) {

                    var fm = new FormData(this);
                    fm.append("action", "otp");
                    $.ajax({
                        type: "post",
                        url: "./controller/User.php",
                        data: fm,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (response) {
                            console.log(response)
                            if (response["status"] == 200) {
                                toastr.success(response["message"])
                                window.location.href = "./reset_password.php";
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
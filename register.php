<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link -->
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>| Sign up</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand fw-bolder fs-2" href="#"><span class="text-primary">BE</span>am</a>
            <button class="shadow-none navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa-solid fa-bars fs-3"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav  ms-auto">
                    <a class="nav-link m-2 p-1" href="register.php"><i class="fa-solid fa-user-plus p-2"></i>สมัครสมาชิก</a>
                    <a class="nav-link m-2 p-1" href="login.php"><i class="fa-solid fa-right-to-bracket p-2"></i>เข้าสู่ระบบ</a>
                </div>
            </div>
        </div>
    </nav>
        <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <h1>สมัครสมาชิก<i class="fa-solid fa-user-plus p-2"></i></h1>
                    <hr>
                    <form method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label ">Username</label>
                            <input type="username" class="form-control test" id="register_username" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label ">Email</label>
                            <input type="email" class="form-control" id="register_email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label ">Password</label>
                            <input type="password" class="form-control" id="register_password" placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <label for="confirm password" class="form-label ">Confirm Password</label>
                            <input type="password" class="form-control" id="register_confirmpassword" placeholder="Confirm Password">
                        </div>
                        <a id="signup" class="mb-3 w-100 btn btn-primary">Sign Up</a>
                        <p>มีบัญชีแล้ว?<a href="login.php"> เข้าสู่ระบบ</a></p>
                    </form>
                    <hr>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- script:src -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">
        $('#signup').on('click', function() {
            let username = $("#register_username").val()
            let email = $("#register_email").val()
            let password = $("#register_password").val()
            let confirm_password = $("#register_confirmpassword").val()
            if (username == "" || email == "" || password == "" || confirm_password == "") {
                sweet_error("สมัครสมาชิก","โปรดกรอกข้อมูลให้ครบถ้วน!!!")
            }else if (password != confirm_password) {
                sweet_error("สมัครสมาชิก","รหัสผ่านยืนยันไม่ถูกต้อง!!!")
            }else if (!validateEmail(email)) {
                sweet_error("สมัครสมาชิก","อีเมลไม่ถูกต้อง!!!")
            }else {
                $.ajax({
                    type: 'POST',
                    url: 'api/auth/register.php',
                    dataType: 'json',
                    data: {
                        username: username,
                        email: email,
                        password: password
                    },
                    beforeSend: function() {
                        sweet_loading()
                    },
                    success: function(res) {
                        if (res.status == "success") {
                            sweet_success_href("สมัครสมาชิก",res.message,"login.php")
                        }else {
                            sweet_error("สมัครสมาชิก",res.message)
                        }
                    }
                })
            }
        })
    </script>
</body>
</html>
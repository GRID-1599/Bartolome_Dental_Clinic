<?php
session_start();
unset($_SESSION['userAdmin']);
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login Admin | Bartolome Dental Clinic</title>
    <!-- <link rel="icon" href="../resources/icons/logov2.png"> -->
    <base href="/Dental Clinic/admin/">
    <link rel="icon" href="../resources/icons/icon.jpg">

    <script src="https://kit.fontawesome.com/4bb5a1c9ed.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="styles/bootstap_css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles/style.css">
</head>

<body class="bg-pink">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-white border">
                                    <p class="text-center font-weight-light my-4">
                                        <strong class="display-5">Bartolome Dental</strong> <br>
                                        <strong class="h4"> Admin Login </strong>
                                    </p>
                                </div>
                                <div class="card-body">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="adminUserName" type="text" placeholder="name@example.com" />
                                        <label for="adminUserName">Username</label>
                                        <div class="invalid-feedback" id="username_invalid"></div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="adminPassword" type="password" placeholder="Password" />
                                        <label for="adminPassword">Password</label>
                                        <div class="invalid-feedback" id="password_invalid"></div>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                        <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="password.php">Forgot Password?</a>

                                        <button class="btn w-50 text-white bg-pink" id="btnLogin">Login</button>

                                    </div>
                                    <div class="">
                                        <p class="font-sm visually-hidden" id="trial_wrapper">
                                            <small>Remaining trials: <small><span id="trial">3</span>
                                        </p>
                                        <div class="float-end visually-hidden" id="loader">
                                            Checking...
                                            <span class="spinner-border-sm spinner-border" role="status" aria-hidden="true" id="loader"></span>
                                        </div>
                                    </div>

                                    <div class="waiting mt-4 visually-hidden" id="waitTimer">
                                        <div class="text-center">
                                            <p>Login Form is temporarily disable. Please wait... <br><span id="timer">60</span> secs</p>
                                            <div class="spinner-grow text-danger" role="status">
                                                <br>
                                                <br>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4  mt-auto bg-pink">
                <div class="container-fluid px-4 ">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-white ">Copyright &copy; Bartolome E-Dental Clinic</div>
                        <div>
                            <!-- <a href="#">Privacy Policy</a> &middot;
                            <a href="#">Terms &amp; Conditions</a> -->
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script> -->
    <?php include 'scripts.php' ?>
    <script src="js/adminLogin.js"></script>
</body>

</html>
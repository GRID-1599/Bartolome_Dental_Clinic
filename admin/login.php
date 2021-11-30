<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'html-head.php' ?>
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
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="adminPassword" type="password" placeholder="Password" />
                                            <label for="adminPassword">Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.php">Forgot Password?</a>
                                            
                                            <button class="btn w-50 text-white bg-pink" id="btnLogin">Login</button>
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
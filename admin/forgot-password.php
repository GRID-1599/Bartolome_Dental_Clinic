<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Forgot Password | Bartolome Dental Clinic</title>
    <!-- <link rel="icon" href="../resources/icons/logov2.png"> -->
    <base href="/Dental Clinic/admin/">
    <link rel="icon" href="../resources/icons/icon.jpg">

    <script src="https://kit.fontawesome.com/4bb5a1c9ed.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="styles/bootstap_css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles/style.css">
</head>

<body >
    <div id="layoutAuthentication" class="bg_image">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center align-items-center " style="height: 100vh;">
                        <div class="col-lg-5 ">
                            <div class="card shadow-lg border-0 rounded-lg " id="forgot">
                                <div class="card-header bg-white">
                                    <h3 class="text-center font-weight-light my-4">Password Recovery</h3>
                                </div>
                                <div class="card-body">
                                    <div class="small mb-3 text-muted">Enter your email address and we will send you a code to reset your password.</div>
                                    <form>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" required />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="login">Return to login</a>
                                            <div class="loader unShow">
                                                Checking Please wait...
                                                <div class="spinner-border spinner-border-sm text-danger" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </div>
                                            <div>
                                                <p id="warningTxt" style="color: red;"></p>
                                            </div>
                                            <button type="button" class="btn bg-pink text-white" id="btnSubmit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card shadow-lg border-0 rounded-lg  unShow" id="enter">
                                <div class="card-header bg-white">
                                    <h3 class="text-center font-weight-light my-4">Enter 6 Digits Code </h3>
                                </div>
                                <dl class="row px-5 mt-3">
                                    <dt class="col-sm-4">Admin</dt>
                                    <dd class="col-sm-8" id="adminName"></dd>

                                    <dt class="col-sm-4">Username</dt>
                                    <dd class="col-sm-8" id="adminUsername"></dd>

                                    <dt class="col-sm-4">Email</dt>
                                    <dd class="col-sm-8" id="adminEmail"></dd>
                                </dl>
                                <p class="card-text px-5 text-muted text-center">Enter the 6 digits code that you recieved on your email</p>
                                <div class="input-group input-group-lg mb-5 px-5 ">
                                    <input type="text" class="form-control mx-3 text-center " style="border: 1px solid black;" placeholder="* * * * * *" aria-label="6 digit code" maxlength="6" onkeypress="return onlyNumberKey(event)" id="digitCode">
                                </div>
                                <button class="btn bg-pink  text-white mb-4 mx-4 rounded-pill" id="btnSubmitCode">Submit</button>

                            </div>

                            <div class="card shadow-lg border-0 rounded-lg  unShow" id="reset">
                                <div class="card-header bg-white">
                                    <h3 class="text-center font-weight-light my-4">Reset Password </h3>
                                </div>
                                <p class="card-text px-3 text-muted text-center mt-3">
                                    Set the new password for your admin account so you can login and access the admin page.
                                </p>
                                <div class="container mb-4">
                                    <div class="form-floating mb-3 ">
                                        <input class="form-control " id="inputAdminPassword" type="password" placeholder="Create password" />
                                        <label for="inputAdminPassword">Password</label>
                                    </div>
                                    <div class="form-floating ">
                                        <input class="form-control " id="inputAdminPasswordConfirm" type="password" placeholder="Confirm password" />
                                        <label for="inputAdminPasswordConfirm">Confirm password</label>
                                        <div class="invalid-feedback" id="pwsd2-invalid">
                                            
                                        </div>
                                    </div>
                                </div>
                                <button class="btn bg-pink  text-white mb-4 mx-4 rounded-pill" id="btnReset">Reset Password</button>

                            </div>

                        </div>
                    </div>
                </div>
            </main>
        </div>
        <!-- <div id="layoutAuthentication_footer">
            <footer class="py-4  mt-auto bg-pink">
                <div class="container-fluid px-4 ">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-white ">Copyright &copy; Bartolome E-Dental Clinic</div>
                        <div>
                        </div>
                    </div>
                </div>
            </footer>
        </div> -->
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script> -->
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <?php include 'scripts.php' ?>
    <script src="js/forgotPassword.js"></script>
</body>

</html>
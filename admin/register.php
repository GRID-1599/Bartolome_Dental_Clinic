<?php session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'html-head.php' ?>
</head>

<body class="sb-nav-fixed">
    <?php include 'nav_top.php' ?>
    <div id="layoutSidenav">
        <?php include 'nav_side.php' ?>

        <!-- pages main body -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Admin</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <a href="admin">List of Admin</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Admin Register</li>
                    </ol>

                    <h1>Admin Register</h1>

                    <div class="container-sm ">
                        <div class="row ">
                            <div class="col-lg-5 justify-content-start px-3 mb-5">
                                <p>Account information</p>
                                <!-- first name  -->
                                <div class="col mb-3">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputAdminFirstName" type="text" placeholder="Enter your first name" />
                                        <label for="inputAdminFirstName">First name</label>
                                    </div>
                                </div>
                                <!-- last name  -->
                                <div class="col mb-3">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputAdminLastName" type="text" placeholder="Enter your last name" />
                                        <label for="inputAdminLastName">Last name</label>
                                    </div>
                                </div>
                                <!-- email  -->
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputAdminEmail" type="email" placeholder="name@example.com" />
                                        <label for="inputAdminEmail">Email address</label>
                                        <div class="invalid-feedback" id="email-msg"></div>
                                    </div>
                                </div>
                                <!-- contact  -->
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputAdminContact" onkeypress="return onlyNumberKey(event)" required maxlength="11" placeholder="+63**********" />
                                        <label for="inputAdminContact">Contact Number</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <p>Account login</p>
                                <div class="row  mb-5 ">
                                    <div class="mb-3 ">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputAdminUserName" type="text" placeholder="Account User" />
                                            <label for="inputAdminUserName">Account Username</label>
                                            <div class="invalid-feedback" id="username_errormsg">
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputAdminPassword" type="password" placeholder="Create password" />
                                            <label for="inputAdminPassword">Password</label>
                                        </div>
                                        <div class="form-floating ">
                                            <input class="form-control " id="inputAdminPasswordConfirm" type="password" placeholder="Confirm password" />
                                            <label for="inputAdminPasswordConfirm">Confirm password</label>
                                            <div class="invalid-feedback" id="pwsd2-invalid">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row-lg-4  mb-5 ">
                            <button class="btn bg-pink text-white  w-75" id="btnAdminRegister">
                                Register
                                <span class="spinner-border-sm" role="status" aria-hidden="true" id="loader" ></span>
                                <span class="visually-hidden"></span>
                            </button>
                        </div>
                    </div>

            </main>
            <?php include 'html-footer.php' ?>
        </div>
    </div>
    <?php include 'scripts.php' ?>
    <!-- <script src="js/helper.js"></script> -->
    <script src="js/register.js"></script>
</body>

</html>
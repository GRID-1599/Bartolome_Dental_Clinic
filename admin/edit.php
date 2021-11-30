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
                        <li class="breadcrumb-item active" aria-current="page">Admin Edit Account</li>
                    </ol>

                    <h1>Admin Edit Account</h1>

                    <div class="container">
                        <div class="row">
                            <p>Account information</p>
                            <div class="col-lg-6 justify-content-start px-3 mb-5">
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
                                    </div>
                                </div>
                                <!-- contact  -->
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputAdminContact" type="text" placeholder="+63**********" />
                                        <label for="inputAdminContact">Contact Number</label>
                                    </div>
                                </div>



                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><button class="btn bg-pink text-white btn-block" id="btnAdminCreate">Save Changes</button></div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="container ">
                                    <div class="row shadow mb-5 rounded">
                                        <p class="my-3 h5">For Changing Admin Username</p>
                                        <div class="mb-3">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputAdminFirstName" type="text" placeholder="Enter your first name" />
                                                <label for="inputAdminFirstName">New User Name</label>
                                            </div>

                                            <div class="form-floating ">
                                                <input class="form-control is-invalid" id="inputAdminPasswordConfirm" type="password" placeholder="Confirm password" />
                                                <label for="inputAdminPasswordConfirm">Input Password</label>

                                                <div class="invalid-feedback">
                                                    Incorrect Password
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mt-4 mb-5">
                                            <button class="btn bg-pink text-white w-auto float-end" id="btnAdminCreate">Save Username Changes</button>

                                        </div>
                                    </div>

                                    <div class="row shadow mb-5 rounded">
                                        <p class="my-3 h5">Changing Password</p>
                                        <div class="mb-3 ">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputAdminPassword" type="password" placeholder="Current password" />
                                                <label for="inputAdminPassword">Current Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputAdminPassword" type="password" placeholder="Create a new password" />
                                                <label for="inputAdminPassword">New Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control is-invalid" id="inputAdminPasswordConfirm" type="password" placeholder="Confirm password" />
                                                <label for="inputAdminPasswordConfirm">Confirm New Password</label>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Password not match
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mt-4 mb-5">
                                            <button class="btn bg-pink text-white w-auto float-end" id="btnAdminCreate">Save Username</button>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
            <?php include 'html-footer.php' ?>
        </div>
    </div>
    <?php include 'scripts.php' ?>
</body>

</html>
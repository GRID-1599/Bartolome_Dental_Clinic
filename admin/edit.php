<?php session_start();
include '../classes/admin.class.php';
$admin_obj = new Admin();
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
                    <?php
                    $admin = $admin_obj->getAdminByUsername($_SESSION["userAdmin"]);

                    $admin_username = $admin["Username"];
                    $admin_firstname = $admin["First_Name"];
                    $admin_lastname = $admin["Last_Name"];
                    $admin_contact = $admin["Contact"];
                    $admin_email = $admin["Email"];
                    // $admin_ = $admin["First_Name"];
                    // $admin_ = $admin["First_Name"];

                    ?>

                    <div class="container">
                        <div class="row">
                            <p>Account information</p>
                            <div class="col-xl-4  col-md-6 justify-content-start px-3 mb-5">
                                <!-- first name  -->
                                <div class="col mb-3">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputAdminFirstName" type="text" placeholder="Enter your first name" value="<?php echo $admin_firstname ?>" />
                                        <label for="inputAdminFirstName">First name</label>
                                    </div>
                                </div>
                                <!-- last name  -->
                                <div class="col mb-3">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputAdminLastName" type="text" placeholder="Enter your last name" value="<?php echo $admin_lastname ?>" />
                                        <label for="inputAdminLastName">Last name</label>
                                    </div>
                                </div>
                                <!-- email  -->
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputAdminEmail" type="email" placeholder="name@example.com" value="<?php echo $admin_email ?>" />
                                        <label for="inputAdminEmail">Email address</label>
                                    </div>
                                </div>
                                <!-- contact  -->
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputAdminContact" type="text" onkeypress="return onlyNumberKey(event)" required maxlength="11" placeholder="+63**********" value="<?php echo $admin_contact ?>" />
                                        <label for="inputAdminContact">Contact Number</label>
                                    </div>
                                </div>

                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><button class="btn bg-pink text-white btn-block" id="btnAdminSaveChanges" value="<?php echo $admin_username ?>">Save Changes</button></div>
                                </div>
                            </div>
                            <!-- login changes  -->
                            <div class="col-lg-8">
                                <div class="container ">
                                    <div class="row shadow mb-5 rounded">
                                        <!-- admin username  -->
                                        <div class="col-md-6">
                                            <p class="my-3 h5">For Username</p>
                                            <div class="mb-3">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputNewAdminUserName" type="text" placeholder="Enter your first name" />
                                                    <label for="inputNewAdminUserName">New User Name</label>
                                                </div>

                                                <div class="form-floating ">
                                                    <input class="form-control " id="inputAdminPassword" type="password" placeholder="Confirm password" />
                                                    <label for="inputAdminPassword">Input Password</label>

                                                    <div class="invalid-feedback">
                                                        Incorrect Password
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="mt-4 mb-5">
                                                <button class="btn bg-pink text-white w-auto float-end" id="btnSaveNewUsername" value="<?php echo $admin_username ?>">Save Username Changes</button>

                                            </div>
                                        </div>

                                        <!-- admin password  -->

                                        <div class="col-md-6 mb-5">
                                            <p class="my-3 h5">Changing Password</p>
                                            <div class="mb-3 ">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputCurrentAdminPassword" type="password" placeholder="Current password" />
                                                    <label for="inputCurrentAdminPassword">Current Password</label>
                                                    <div class="invalid-feedback">
                                                        Incorrect Password
                                                    </div>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputNewAdminPassword" type="password" placeholder="Create a new password" />
                                                    <label for="inputNewAdminPassword">New Password</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control " id="inputNewAdminPasswordConfirm" type="password" placeholder="Confirm password" />
                                                    <label for="inputNewAdminPasswordConfirm">Confirm New Password</label>
                                                    <div class="invalid-feedback">
                                                        Password not match
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="mt-4 mb-5">
                                                <button class="btn bg-pink text-white w-auto float-end" id="btnSavenewPassword" value="<?php echo $admin_username ?>">Save New Password
                                                </button>
                                                <div class="visually-hidden" id="loader">
                                                    Checking...
                                                    <span class="spinner-border-sm spinner-border" role="status" aria-hidden="true" id="loader"></span>
                                                </div>
                                            </div>
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
    <script src="js/adminEdit.js"></script>
</body>

</html>
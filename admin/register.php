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
                        <div class="col-xxl-8 justify-content-start">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputAdminFirstName" type="text" placeholder="Enter your first name" />
                                        <label for="inputAdminFirstName">First name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputAdminLastName" type="text" placeholder="Enter your last name" />
                                        <label for="inputAdminLastName">Last name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputAdminEmail" type="email" placeholder="name@example.com" />
                                        <label for="inputAdminEmail">Email address</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputAdminContact" type="text" placeholder="+63**********" />
                                        <label for="inputAdminContact">Contact Number</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputAdminPassword" type="password" placeholder="Create a password" />
                                        <label for="inputAdminPassword">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputAdminPasswordConfirm" type="password" placeholder="Confirm password" />
                                        <label for="inputAdminPasswordConfirm">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button class="btn bg-pink text-white btn-block" id="btnAdminCreate">Create Admin Account</button></div>
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
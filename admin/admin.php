<?php session_start(); ?>

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
                    <h1 class="mt-4">Admins</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">List of Admin</li>
                    </ol>

                    <div class="container-fluid border">
                        <div class="row mb-3  ">
                            <a href="service/add">
                                <button type="button" class="btn btn-info float-end"> <i class="fas fa-plus " id="btnAddNewService"></i> Register New Admin</button>
                            </a>
                        </div>
                        <div class="row g-3 border">
                                <div class="card me-3" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">jude</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Admin</h6>
                                        <p class="card-text">
                                            Christian jude catudior
                                        <p class="text-end">
                                            asdadad<br>
                                            asdsadasd@asdasd
                                        </p>
                                    </div>
                                </div>
                                <div class="card me-3" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">jude</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Admin</h6>
                                        <p class="card-text">
                                            Christian jude catudior
                                        <p class="text-end">
                                            asdadad<br>
                                            asdsadasd@asdasd
                                        </p>
                                    </div>
                                </div>
                                <div class="card me-3" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">jude</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Admin</h6>
                                        <p class="card-text">
                                            Christian jude catudior
                                        <p class="text-end">
                                            asdadad<br>
                                            asdsadasd@asdasd
                                        </p>
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
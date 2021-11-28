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
                    <h1 class="mt-4">Services</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">List of Service</li>
                    </ol>
                    
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <i class="fas fa-table me-1"></i> Service Table
                                    </div>
                                    <div class="col">
                                        <a href="service/add"> 
                                        <button type="button" class="btn btn-info w-100"> <i class="fas fa-plus " id="btnAddNewService" ></i> Add New Service</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php include 'serviceTable.php' ?>
                        </div>
                    </div>
                </div>
            </main>
            <?php include 'html-footer.php' ?>
        </div>
    </div>
    <?php include'scripts.php'?>
    <script src="js/service.js"></script>

</body>

</html>
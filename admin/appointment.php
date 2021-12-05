<?php
session_start();


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
                    <h1 class="mt-4">Appoinment</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active" aria-current="page">List of Appoinment</li>
                    </ol>




                    <div class="row mb-3 py-3 border">
                        <div class="col-5 border">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="dropdown dropend">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="ddFilter" data-bs-toggle="dropdown" aria-expanded="false">
                                            Filter by :
                                        </button>
                                        <ul class="dropdown-menu " aria-labelledby="ddFilter">
                                            <li class=" ps-3" id="filterID">Patient Id</li>
                                            <li class=" ps-3" id="filterAppDate">Appointment Date</li>
                                            <li class=" ps-3" id="filterDateCreate">Date Created</li>
                                            <li class=" ps-3" id="filterAmount">Amount</li>
                                            <li class=" ps-3" id="filterPaid">Paid</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <span id="filteredBy"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-7 border">
                            <div class="row filterInputs unShow" id="inptPatientID">
                                <label for="appPatientId" class="col-sm-3 col-form-label">Patient Id </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="appPatientId">
                                </div>
                            </div>
                            <div class="row filterInputs unShow " id="inptAppDate">
                                <div class="col">
                                    <div class="row">
                                        <label for="appDateStart" class="col-sm-1 col-form-label ">Start</label>
                                        <div class="col-sm-5">
                                            <input type="date" class="form-control" id="appDateStart">
                                        </div>
                                        <label for="appDateEnd" class="col-sm-1 col-form-label">End</label>
                                        <div class="col-sm-5">
                                            <input type="date" class="form-control" id="appDateEnd">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row filterInputs " id="inptDateCreated">
                                <label for="appDateCreated" class="col-sm-3 col-form-label ">Date Created </label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" id="appDateCreated">
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i> Appoinments
                        </div>
                        <div class="card-body">
                            <?php
                            include 'appointmentTable.php'
                            ?>
                        </div>
                    </div>
                </div>
            </main>
            <?php include 'html-footer.php' ?>
        </div>
    </div>
    <?php include 'scripts.php' ?>
    <script src="js/appointment.js"></script>

</body>

</html>
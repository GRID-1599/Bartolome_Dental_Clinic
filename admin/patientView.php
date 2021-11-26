<?php session_start();

// if (!isset($_GET["appoinmentId"])) {
//     exit();
// }

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
                        <li class="breadcrumb-item active"> <a href="patients"> List of Patient </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Patient View</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i> Patient View
                        </div>
                        <div class="card-body">
                            <?php
                            $patientId = $_GET["patientId"];
                            include_once '../classes/patient.class.php';
                            $patient_obj = new Patient();
                            $patient = $patient_obj->getPatientById($patientId);

                            // echo $patient[0]["Patient_ID"] . "<br>";
                            // echo $patient[0]["Contact"] . "<br>";
                            // echo $patient[0]["Appoinment_Date"] . "<br>";
                            // echo $patient[0]["Appoinment_Time"] . "<br>";
                            // echo $patient[0]["Date_Created"] . "<br>";
                            // echo $patient[0]["Payment_Method"] . "<br>";
                            // echo $patient[0]["IsPaid"] . "<br>";
                            // echo $patient[0]["Amount"] . "<br><br>";

                            // foreach ($patient[1] as $service) {
                            //      echo $service["Service_Id"] . "<br>";
                            //      echo $service["Service_Name"] . "<br>";
                            //      echo $service["Service_Prc"] . "<br>";
                            // }
                            ?>

                            <div class="container">
                                <dl class="row">
                                    <dt class="col-sm-3">Patient ID:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        echo $patientId;
                                        ?></dd>

                                    <dt class="col-sm-3">Name:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        echo $patient["Name"];
                                        ?></dd>

                                    <dt class="col-sm-3">Nickname:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        echo $patient["Nickname"];
                                        ?></dd>

                                    <dt class="col-sm-3">Birthday:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        $bday = date_create($patient["Birthday"]);
                                        echo date_format($bday, "M d, Y");
                                        ?></dd>

                                    <dt class="col-sm-3">Age:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        echo $patient["Age"];
                                        ?></dd>

                                    <dt class="col-sm-3">Gender:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        echo $patient["Gender"];
                                        ?></dd>

                                    <dt class="col-sm-3">Civil_Status:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        echo $patient["Civil_Status"];
                                        ?></dd>

                                    <dt class="col-sm-3">Address:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        echo $patient["Address"];
                                        ?></dd>

                                    <dt class="col-sm-3">Email:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        echo $patient["Email"];
                                        ?></dd>

                                    <dt class="col-sm-3">Contact:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        echo $patient["Contact"];
                                        ?></dd>



                                    <dt class="col-sm-3">Date_Created:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        $dateCreated = date_create($patient["Date_Created"]);
                                        echo date_format($dateCreated, "M d, Y ");
                                        ?></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include 'html-footer.php' ?>
        </div>
    </div>
    <?php include 'scripts.php' ?>
    <script src="js/patient.js"></script>

</body>

</html>
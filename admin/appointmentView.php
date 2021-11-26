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
                        <li class="breadcrumb-item active"> <a href="appointment"> List of Appoinment </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Appoinment View</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i> Appoinment View
                        </div>
                        <div class="card-body">
                            <?php
                            $appointmentId = $_GET["appoinmentId"];
                            include_once '../classes/appoinment.class.php';
                            $appointment_obj = new Appointment();
                            $appointment = $appointment_obj->getAppointmentById($appointmentId);

                            // echo $appointmentId . "<br>";
                            // echo $appointment[0]["Patient_ID"] . "<br>";
                            // echo $appointment[0]["Contact"] . "<br>";
                            // echo $appointment[0]["Appoinment_Date"] . "<br>";
                            // echo $appointment[0]["Appoinment_Time"] . "<br>";
                            // echo $appointment[0]["Date_Created"] . "<br>";
                            // echo $appointment[0]["Payment_Method"] . "<br>";
                            // echo $appointment[0]["IsPaid"] . "<br>";
                            // echo $appointment[0]["Amount"] . "<br><br>";

                            // foreach ($appointment[1] as $service) {
                            //      echo $service["Service_Id"] . "<br>";
                            //      echo $service["Service_Name"] . "<br>";
                            //      echo $service["Service_Prc"] . "<br>";
                            // }
                            ?>

                            <div class="container">
                                <dl class="row">
                                    <dt class="col-sm-3">Appointment ID:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        echo $appointmentId;
                                        ?></dd>

                                    <dt class="col-sm-3">Patient ID:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        echo $appointment[0]["Patient_ID"];
                                        ?></dd>

                                    <dt class="col-sm-3">Contact:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        echo $appointment[0]["Contact"]
                                        ?></dd>

                                    <dt class="col-sm-3">Amount:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        echo $appointment[0]["Amount"]
                                        ?></dd>

                                    <dt class="col-sm-3">Appoinment_Date:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        $appDate = date_create($appointment[0]["Appoinment_Date"]);
                                        echo date_format($appDate, "M d, Y");
                                        ?></dd>

                                    <dt class="col-sm-3">Appoinment_Time:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        $appTime = date_create($appointment[0]["Appoinment_Time"]);
                                        echo date_format($appTime, " h:i a");
                                        ?></dd>

                                    <dt class="col-sm-3">Date_Created:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        $dateCreated = date_create($appointment[0]["Date_Created"]);
                                        echo date_format($dateCreated, "M d, Y h:i a");
                                        ?></dd>

                                    <dt class="col-sm-3">Payment_Method:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        echo $appointment[0]["Payment_Method"]
                                        ?></dd>

                                    <dt class="col-sm-3">IsPaid:</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        $isPaid = ($appointment[0]["IsPaid"]) ? "Paid" : "Not Paid";
                                        echo $isPaid
                                        ?></dd>
                                </dl>
                                <dl class="row">
                                    <h5>Appointment Service/s</h5>
                                    <ul class="list-unstyled">
                                        <?php
                                        foreach ($appointment[1] as $service) {
                                                 $svId =   $service["Service_Id"]  ;
                                                 $svName =   $service["Service_Name"] ;
                                                 $svPrc =   $service["Service_Prc"];
                                            echo<<< service
                                                <li>
                                                    $svId\t$svName\t$svPrc 
                                                </li>
                                            service;
                                        }
                                        ?>
                                        <li>Total: <?php
                                        echo $appointment[0]["Amount"]
                                        ?></li>
                                    </ul>


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
    <script src="js/appointment.js"></script>
</body>

</html>
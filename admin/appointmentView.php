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
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <i class="fas fa-table me-1"></i> Service Table
                                    </div>
                                    <div class="col  ">
                                        <a class="float-end">
                                            <button type="button" class="btn btn-dark w-auto px-4"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
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
                                <div class="row">
                                    <div class="col">
                                        <dl class="row">
                                            <div class="row">
                                                <dt class="col-sm-5">Appointment ID:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    echo $appointmentId;
                                                    ?>
                                                </dd>

                                                <dt class="col-sm-5">Patient ID:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    echo $appointment[0]["Patient_ID"];
                                                    ?>
                                                </dd>

                                                <dt class="col-sm-5">Contact:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    echo $appointment[0]["Contact"]
                                                    ?>
                                                </dd>
                                            </div>




                                            <div class="col mt-5">
                                                <dt class="col-sm-5">Appoinment Date:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    $appDate = date_create($appointment[0]["Appoinment_Date"]);
                                                    echo date_format($appDate, "M d, Y");
                                                    ?>
                                                </dd>

                                                <dt class="col-sm-5">Appoinment Time:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    $appTime = date_create($appointment[0]["Appoinment_Time"]);
                                                    echo date_format($appTime, " h:i a");
                                                    ?>
                                                </dd>

                                                <dt class="col-sm-5">Date Created:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    $dateCreated = date_create($appointment[0]["Date_Created"]);
                                                    echo date_format($dateCreated, "M d, Y h:i a");
                                                    ?>
                                                </dd>
                                            </div>

                                            <div class="row">
                                                <dt class="col-sm-5">Payment Method:</dt>
                                            <dd class="col-sm-7">
                                                <?php
                                                echo $appointment[0]["Payment_Method"]
                                                ?>
                                            </dd>

                                            <dt class="col-sm-5">IsPaid:</dt>
                                            <dd class="col-sm-7">

                                                <?php
                                                $isPaid = ($appointment[0]["IsPaid"]) ? "Paid" : "Not Paid";
                                                $color = ($appointment[0]["IsPaid"]) ? "info" : "warning";
                                                echo '<span class="bg-' . $color . ' px-2 py-1">' . $isPaid . '</span>';
                                                ?>

                                            </dd>
                                            </div>

                                        </dl>
                                    </div>
                                    <div class="col-xl-6 ">
                                        <p class="h5">Appointment Service/s</p>
                                        <div class="row">
                                            <?php
                                            foreach ($appointment[1] as $service) {
                                                $svId =   $service["Service_Id"];
                                                $svName =   $service["Service_Name"];
                                                $svPrc =   $service["Service_Prc"];
                                                echo <<<SERVICE
                                                    <div class="card mx-3 shadow bg-body rounded mb-3" style="width: 15rem;">
                                                        <div class="card-body">
                                                            <p class="card-title">
                                                                $svName <br>
                                                                <small class="text-muted">$svId</small>
                                                            </p>
                                                    
                                                            <p class="text-end">$svPrc php</p>
                                                        </div>
                                                    </div>
                                                SERVICE;
                                            }
                                            ?>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-8">
                                                Estimated Minimum Amount:
                                            </div>
                                            <div class="col-4 text-end pe-4">
                                                <strong><?php echo $appointment[0]["Amount"] ?> php</strong>
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
    <script src="js/appointment.js"></script>
</body>

</html>
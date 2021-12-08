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
                                        <i class="fas fa-calendar-check me-1"></i> Appointment
                                    </div>
                                    <div class="col align-self-end">
                                        <form action="appointmentFile" method="post" target="_blank">
                                            <input type="hidden" name="app_ID" value="<?php echo $_GET["appoinmentId"] ?>">
                                            <button type="submit" class="btn btn-dark btn-sm w-auto float-end">
                                                <i class="fa fa-print"></i>
                                                Print
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            $appointmentId = $_GET["appoinmentId"];
                            include_once '../classes/appoinment.class.php';
                            include_once '../classes/patient.class.php';
                            $appointment_obj = new Appointment();
                            $patient_obj = new Patient();
                            $appointment = $appointment_obj->getAppointmentById($appointmentId);
                            $patient = $patient_obj->getPatientById($appointment[0]["Patient_ID"]);

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

                            function convertToHoursMins($time, $format = '%02d:%02d')
                            {
                                if ($time < 1) {
                                    return;
                                }
                                $hours = floor($time / 60);
                                $minutes = ($time % 60);
                                return sprintf($format, $hours, $minutes);
                            }
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
                                                    <a href="patients/<?php echo  $appointment[0]["Patient_ID"] ?>">
                                                        <?php
                                                        echo $appointment[0]["Patient_ID"];
                                                        ?>
                                                    </a>
                                                </dd>

                                                <dt class="col-sm-5">Patient Name:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    echo $patient["Name"];
                                                    ?>
                                                </dd>

                                                <dt class="col-sm-5">Contact:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    echo $appointment[0]["Contact"]
                                                    ?>
                                                </dd>
                                            </div>

                                            <div class="row mt-5 ">
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
                                                    $appTime_Start = date_create($appointment[0]["Appointment_StartTime"]);
                                                    $appTime_End = date_create($appointment[0]["Appointment_EndTime"]);
                                                    echo date_format($appTime_Start, " h:i a") . " - " . date_format($appTime_End, " h:i a");
                                                    ?>
                                                </dd>

                                                <dt class="col-sm-5">Duration:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    $appTime_Duration = $appointment[0]["Duration_Minutes"];
                                                    echo $appTime_Duration . " mins / " .  convertToHoursMins($appTime_Duration, '%02d hours %02d minutes');;
                                                    // echo "<br>" . date('H:i', mktime(0,$appTime_Duration ));

                                                    ?>
                                                </dd>

                                                <dt class="col-sm-5">Alloted Hours:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    $appTime_Allotted = $appointment[0]["Allotted_Hours"];
                                                    echo $appTime_Allotted . " hour/s";
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

                                            <div class="row  mt-5 ">
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

                                                <dt class="col-sm-5">IsDone:</dt>
                                                <dd class="col-sm-7">

                                                    <?php
                                                    $isDone = ($appointment[0]["IsDone"]) ? "Done" : "Not Done";
                                                    $colorDone = ($appointment[0]["IsDone"]) ? "info" : "secondary";
                                                    echo "<span class='bg-$colorDone text-white  px-2 py-1'>" . $isDone . '</span>';
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
    <!-- <script src="js/appointment.js"></script> -->
</body>

</html>
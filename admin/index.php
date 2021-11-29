<?php
session_start();



if (isset($_GET['adminUser'])) {
    $_SESSION['userAdmin'] = $_GET['adminUser'];
}

if (!isset($_SESSION['userAdmin'])) {
    echo header("Location: login");
    exit();
}

include_once '../classes/appoinment.class.php';
$appointment_obj = new Appointment();
$currentDate = new DateTime();
$todayDate =  $currentDate->format('Y-m-d');
$appToday_stmt = $appointment_obj->getAppointmentByDate($todayDate);
$appAddedToday_stmt = $appointment_obj->getAppointmentAddedToday($todayDate);

$todayAppoinmentNum = 0;
$appoinmentAddedTodayNum = 0;

foreach ($appToday_stmt as $data) {
    $todayAppoinmentNum += 1;
};

foreach ($appAddedToday_stmt as $data) {
    $appoinmentAddedTodayNum = $appoinmentAddedTodayNum + 1;
};


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'html-head.php' ?>
    <link href="styles/app.css" rel="stylesheet">
</head>

<body class="sb-nav-fixed">
    <?php include 'nav_top.php' ?>
    <div id="layoutSidenav">
        <?php include 'nav_side.php' ?>

        <!-- pages main body -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="container">
                        Today date
                        <div class="row">
                            <p class=""><strong class="display-6"><?php echo $currentDate->format('l'); ?></strong> <?php echo $currentDate->format('F, d Y'); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 ">
                            <!-- todays appointment  -->
                            <div class="col">
                                <div class="card  mb-4">
                                    <div class="card-header bg-primary text-white">
                                        Todays Appointment
                                    </div>
                                    <button class="btn   py-3 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#todaysAppointment" aria-expanded="false" aria-controls="todaysAppointment">
                                        Totals of Appointments Today : <?php echo $todayAppoinmentNum; ?>
                                        <i class="fas fa-chevron-down r"></i>
                                    </button>
                                    <div class="card-body  align-items-center justify-content-between ">
                                        <div class="collapse" id="todaysAppointment">
                                            <div class="container">
                                                <div class="row">

                                                    <?php
                                                    foreach ($appToday_stmt as $data) {
                                                        $time = $data["Appoinment_Time"];
                                                        $appTime = new DateTime($time);
                                                        echo "<a href='appointment/" . $data["Appointment_Id"] . "'>" . "Appointment" .
                                                            " at " . $appTime->format('h:i a') .
                                                            "</a>";
                                                    };

                                                    if ($todayAppoinmentNum == 0) {

                                                        echo "<p>No appoinments for today</p>";
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- appointments added today -->
                            <div class="col">
                                <div class="card  mb-4">
                                    <div class="card-header bg-info text-white">
                                        Appointments Added Today
                                    </div>
                                    <button class="btn   py-3 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#appAddedToday" aria-expanded="false" aria-controls="appAddedToday">
                                        Totals of Appointments Added Today : <?php echo $appoinmentAddedTodayNum; ?>
                                        <i class="fas fa-chevron-down r"></i>
                                    </button>
                                    <div class="card-body  align-items-center justify-content-between ">
                                        <div class="collapse" id="appAddedToday">
                                            <div class="container">
                                                <div class="row">

                                                    <?php

                                                    foreach ($appAddedToday_stmt as $data) {
                                                        $time = $data["Date_Created"];
                                                        $appTime = new DateTime($time);
                                                        echo "<a href='appointment/" . $data["Appointment_Id"] . "'>" . "New Appointment".
                                                            " added at " . $appTime->format('h:i a') .
                                                            "</a>";
                                                    };

                                                    if ($appoinmentAddedTodayNum == 0) {

                                                        echo "<p>No appoinments added today</p>";
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- appointment done / not done  -->
                            <div class="col">
                                <div class="card  mb-4">
                                    <div class="card-header bg-warning text-white">
                                        Appointment Done Today
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <button class="btn   py-3 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#appDone" aria-expanded="false" aria-controls="appDone">
                                                    Done :
                                                    <?php
                                                    $done = 0;
                                                    foreach ($appToday_stmt as $data) {
                                                        if ($data["IsDone"]) {
                                                            $done += 1;
                                                        }
                                                    };
                                                    echo $done
                                                    ?>
                                                    <i class="fas fa-chevron-down r"></i>
                                                </button>
                                            </div>
                                            <div class="col">
                                                <button class="btn   py-3 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#appNotDone" aria-expanded="false" aria-controls="appNotDone">
                                                    Not Done :
                                                    <?php
                                                    $notdone = 0;
                                                    foreach ($appToday_stmt as $data) {
                                                        if (!$data["IsDone"]) {
                                                            $notdone += 1;
                                                        }
                                                    };
                                                    echo $notdone
                                                    ?>
                                                    <i class="fas fa-chevron-down r"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body  align-items-center justify-content-between ">
                                        <div class="collapse" id="appDone">
                                            <div class="container">
                                                <div class="row">
                                                    <span>Appointment Done</span>
                                                    <div class="ms-3">
                                                    <?php
                                                    foreach ($appToday_stmt as $data) {
                                                        if ($data["IsDone"]) {
                                                            $time = $data["Appoinment_Time"];
                                                            $appTime = new DateTime($time);
                                                            echo "<a href='appointment/" . $data["Appointment_Id"] . "'>" . "Appointment at " .
                                                                " " . $appTime->format('h:i a') .
                                                                "</a><br>";
                                                        }
                                                    };
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapse" id="appNotDone">
                                            <div class="container">
                                                <div class="row">
                                                    <span>Appointment Not Done</span>
                                                    <div class="ms-3">
                                                    <?php
                                                    foreach ($appToday_stmt as $data) {
                                                        if (!$data["IsDone"]) {
                                                            $time = $data["Appoinment_Time"];
                                                            $appTime = new DateTime($time);
                                                            echo "<a href='appointment/" . $data["Appointment_Id"] . "'>" . "Appointment at" .
                                                                " " . $appTime->format('h:i a') .
                                                                "</a><br>";
                                                        }
                                                    };
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col ">
                            <div class="row">
                                <div class="col ">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-chart-area me-1"></i> Area
                                        </div>
                                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i> DataTable Example
                        </div>
                        <div class="card-body">
                            <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
                                <div class="card flex-fill">
                                    <div class="card-header">

                                        <h5 class="card-title mb-0">Calendar</h5>
                                    </div>
                                    <div class="card-body d-flex">
                                        <div class="align-self-center w-100">
                                            <div class="chart">
                                                <div id="datetimepicker-dashboard"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            // include 'patientTable.php' 

                            ?>
                        </div>
                    </div>
                </div>
            </main>
            <?php include 'html-footer.php' ?>
        </div>
    </div>
    <?php include 'scripts.php' ?>
    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
            var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
            document.getElementById("datetimepicker-dashboard").flatpickr({
                inline: true,
                prevArrow: "<span title=\"Previous month\">&laquo;</span>",
                nextArrow: "<span title=\"Next month\">&raquo;</span>",
                defaultDate: defaultDate
            });
        });
    </script> -->
</body>

</html>
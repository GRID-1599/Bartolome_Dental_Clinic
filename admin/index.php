<?php
session_start();

if (isset($_GET['adminUser'])) {
    $_SESSION['userAdmin'] = $_GET['adminUser'];
}

include_once '../classes/appoinment.class.php';
$appointment_obj = new Appointment();
$currentDate = new DateTime();
$currentDate->setTimezone(new DateTimeZone('Asia/Manila'));

// $currentDate = new DateTime('2021-12-13');
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

include_once '../classes/Message.class.php';
$objMessage = new Message();
$unreadMessages = $objMessage->getUnreadMessage();
$unreadMessageNum = 0;
foreach ($unreadMessages as $unread) {
    $unreadMessageNum += 1;
}


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
                    <ol class="breadcrumb ">
                    </ol>
                    <div class="container">
                        Today date
                        <div class="row">
                            <p class=""><strong class="display-6"><?php echo $currentDate->format('l'); ?></strong> <?php echo $currentDate->format('F, d Y'); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 ">
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
                                                        $time = $data["Appointment_StartTime"];
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
                                                        echo "<a href='appointment/" . $data["Appointment_Id"] . "'>" . "New Appointment" .
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
                                                                $time = $data["Appointment_StartTime"];
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
                                                                $time = $data["Appointment_StartTime"];
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
                            <div class="card mb-4" id="todaySched">
                                <div class="card-header ">
                                    <p class="h2">Today Schedule</p>
                                    <p style="display: none;" id="theDate"><?php echo $todayDate ?></p>
                                </div>
                                <div class="card-body p-0">
                                    <div class="row pe-5">
                                        <div class="col-2">
                                            <div class="row py-3 text-end timeRow">
                                                <p class="text-end">9 AM</p>
                                            </div>
                                            <div class="row py-3 text-end timeRow">
                                                <p class="text-end">10 AM</p>
                                            </div>
                                            <div class="row py-3 text-end timeRow">
                                                <p class="text-end">11 AM</p>
                                            </div>
                                            <div class="row py-3 text-end timeRow">
                                                <p class="text-end">12 PM</p>
                                            </div>
                                            <div class="row py-3 text-end timeRow">
                                                <p class="text-end">1 PM</p>
                                            </div>
                                            <div class="row py-3 text-end timeRow">
                                                <p class="text-end">2 PM</p>
                                            </div>
                                            <div class="row py-3 text-end timeRow">
                                                <p class="text-end">3 PM</p>
                                            </div>
                                            <div class="row py-3 text-end timeRow">
                                                <p class="text-end">4 PM</p>
                                            </div>
                                            <div class="row py-3 text-end timeRow">
                                                <p class="text-end">5 PM</p>
                                            </div>
                                        </div>
                                        <div class="col mt-4 ">
                                            <?php
                                            $timesID = array(9, 10, 11, 12, 13, 14, 15, 16, 17);


                                            foreach ($timesID as $id) {
                                                if ($id == 12) {
                                                    echo '<div class="row py-3 border-top border-dark  timeRow unAvailable"><span>Lunch Break</span></div> ';
                                                } else {
                                                    printf('<div class="row py-3 border-top border-dark  timeRow" id="%u"><span></span></div> ', $id);
                                                }
                                            }
                                            ?>
                                            <?php


                                            // $isHave = false;
                                            // foreach ($date_apps as $data) {
                                            //     $isHave = true;
                                            //     $time = $data["Appointment_StartTime"];
                                            //     $appTime = new DateTime($time);
                                            //     echo "<a href='appointment/" . $data["Appointment_Id"] . "'>" . "Appointment" .
                                            //         " at " . $appTime->format('h:i a') .
                                            //         "</a><br>";
                                            // };

                                            // if (!$isHave) {
                                            //     echo '<p class="display-6"> Nothing to show</p>';
                                            // }

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="card mb-4 " id="weekSched">
                            <div class="card-header">
                                <p class="h2">Today's Week Schedule</p>

                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <div class=" m-0 w-100 ">
                                        <div class="row">
                                            <div class="col-3">
                                                <button type="button" class="btn btn-outline-secondary float-end w-50"><i class="fas fa-caret-left"></i> Previous</button>
                                            </div>
                                            <div class="col-6">
                                                <p class=""><?php echo $currentDate->format('Y-m-d'); ?></p>
                                            </div>
                                            <div class="col-3">
                                                <button type="button" class="btn btn-outline-secondary w-50">Next <i class="fas fa-caret-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table  table-borderless" id="calendar">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <small class="h3">01</small>
                                                    <br>Sun
                                                </th>
                                                <th>
                                                    <small class="h3">02</small>
                                                    <br>Mon
                                                </th>
                                                <th>
                                                    <small class="h3">03</small>
                                                    <br>Tue
                                                </th>
                                                <th>
                                                    <small class="h3">04</small>
                                                    <br>Wed
                                                </th>
                                                <th>
                                                    <small class="h3">05</small>
                                                    <br>Thu
                                                </th>
                                                <th>
                                                    <small class="h3">06</small>
                                                    <br>Fri
                                                </th>
                                                <th>
                                                    <small class="h3">07</small>
                                                    <br>Sat
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="weekBody">
                                        </tbody>
                                    </table>

                                    <br />
                                    <!-- <form class="form-inline">
                                    <button class="btn-outline-primary lead" id="pre" type="button" onclick="preMonth()"><i class="fas fa-caret-left"></i> Previous</button>
                                    <button class="btn-outline-primary lead " id="nex" type="button" onclick="nexMonth()">Next <i class="fas fa-caret-right"></i></button>
                                </form> -->
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
    <script src="js/dateView.js"></script>
    <script src="js/weekDay.js"></script>
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
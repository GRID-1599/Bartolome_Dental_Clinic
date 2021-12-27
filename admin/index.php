<?php
session_start();

include_once '../classes/appoinment.class.php';
$appointment_obj = new Appointment();
$currentDate = new DateTime();
$currentDate->setTimezone(new DateTimeZone('Asia/Manila'));

// $currentDate = new DateTime('2021-12-13');
$todayDate =  $currentDate->format('Y-m-d');
$appToday_stmt = $appointment_obj->getAppointmentByDate($todayDate);
$appAddedToday_stmt = $appointment_obj->getAppointmentAddedToday($todayDate);
$appToApproved_stmt = $appointment_obj->getAppointmentToApproved();
$appToDoneByPastDate_stmt = $appointment_obj->getAppointmentToDoneByPastDate(date_format($currentDate, "Y-m-d"));
$appToDoneByTodayDate_stmt = $appointment_obj->getAppointmentToDoneByTodayDate(date_format($currentDate, "Y-m-d"), date_format($currentDate, "H:i:s"));
$appToPay_stmt = $appointment_obj->getAppointmentNotPaid();

$todayAppoinmentNum = 0;
$appoinmentAddedTodayNum = 0;
$appoinmentToApprovedNum = 0;
$appoinmentToDone = 0;
$appoinmentToPay = 0;

foreach ($appToday_stmt as $data) {
    $todayAppoinmentNum += 1;
};

foreach ($appAddedToday_stmt as $data) {
    $appoinmentAddedTodayNum = $appoinmentAddedTodayNum + 1;
};

foreach ($appToApproved_stmt as $data) {
    $appoinmentToApprovedNum += 1;
};

foreach ($appToDoneByPastDate_stmt as $data) {
    $appoinmentToDone += 1;
};

foreach ($appToDoneByTodayDate_stmt as $data) {
    $appoinmentToDone += 1;
};

foreach ($appToPay_stmt as $data) {
    $appoinmentToPay += 1;
};

include_once '../classes/message.class.php';
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
                    <div class="container-xxl">
                        Today date
                        <div class="row">
                            <p class=""><strong class="display-6"><?php echo $currentDate->format('l'); ?></strong> <?php echo $currentDate->format('F, d Y'); ?></p>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 ">
                                <!-- todays appointment  -->
                                <div class="col">
                                    <div class="card  mb-4">
                                        <div class="card-header bg-primary text-white">
                                            <button class="btn text-start text-white  w-100" type="button" data-bs-toggle="collapse" data-bs-target="#todaysAppointment" aria-expanded="false" aria-controls="todaysAppointment">
                                                <span>Today Appointments</span>
                                                <span class="float-end "><strong><?php echo $todayAppoinmentNum; ?></strong><i class="fas fa-chevron-down ms-2"></i></span>
                                            </button>
                                        </div>

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
                                            <button class="btn text-start text-white w-100" type="button" data-bs-toggle="collapse" data-bs-target="#appAddedToday" aria-expanded="false" aria-controls="appAddedToday" style="box-shadow: none;">
                                                <span>Totals of Appointments Added Today </span>
                                                <span class="float-end"><strong><?php echo $appoinmentAddedTodayNum; ?></strong><i class="fas fa-chevron-down ms-2"></i></span>
                                            </button>
                                        </div>

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

                                <!-- appointment to be approved -->
                                <div class="col">
                                    <div class="card  mb-4">
                                        <div class="card-header " style="background-color: #F05F79;">
                                            <button class="btn text-start  text-white w-100" type="button" data-bs-toggle="collapse" data-bs-target="#appToApprove" aria-expanded="false" aria-controls="appToApprove" style="box-shadow: none;">
                                                <span>Totals of Appointment to approve </span>
                                                <span class="float-end"><strong><?php echo $appoinmentToApprovedNum; ?></strong>
                                                    <i class="fas fa-chevron-down ms-2"></i></span>
                                            </button>
                                        </div>

                                        <div class="card-body  align-items-center justify-content-between ">
                                            <div class="collapse" id="appToApprove">
                                                <div class="container">
                                                    <div class="row">

                                                        <?php

                                                        foreach ($appToApproved_stmt as $data) {
                                                            $appDate = new DateTime($data["Date_Created"]);
                                                            echo "<a href='appointment/" . $data["Appointment_Id"] . "'>" . "Appointment" .
                                                                " added at " . date_format($appDate, "M d, Y") .
                                                                "</a>";
                                                        };

                                                        if ($appoinmentToApprovedNum == 0) {

                                                            echo "<p>No appoinments to be Approved</p>";
                                                        }

                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- appointment done / not done  -->
                                <!-- <div class="col">
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
                                                    // $done = 0;
                                                    // foreach ($appToday_stmt as $data) {
                                                    //     if ($data["IsDone"]) {
                                                    //         $done += 1;
                                                    //     }
                                                    // };
                                                    // echo $done
                                                    ?>
                                                    <i class="fas fa-chevron-down r"></i>
                                                </button>
                                            </div>
                                            <div class="col">
                                                <button class="btn   py-3 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#appNotDone" aria-expanded="false" aria-controls="appNotDone">
                                                    Not Done :
                                                    <?php
                                                    // $notdone = 0;
                                                    // foreach ($appToday_stmt as $data) {
                                                    //     if (!$data["IsDone"]) {
                                                    //         $notdone += 1;
                                                    //     }
                                                    // };
                                                    // echo $notdone
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
                                                        // foreach ($appToday_stmt as $data) {
                                                        //     if ($data["IsDone"]) {
                                                        //         $time = $data["Appointment_StartTime"];
                                                        //         $appTime = new DateTime($time);
                                                        //         echo "<a href='appointment/" . $data["Appointment_Id"] . "'>" . "Appointment at " .
                                                        //             " " . $appTime->format('h:i a') .
                                                        //             "</a><br>";
                                                        //     }
                                                        // };
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
                                                        // foreach ($appToday_stmt as $data) {
                                                        //     if (!$data["IsDone"]) {
                                                        //         $time = $data["Appointment_StartTime"];
                                                        //         $appTime = new DateTime($time);
                                                        //         echo "<a href='appointment/" . $data["Appointment_Id"] . "'>" . "Appointment at" .
                                                        //             " " . $appTime->format('h:i a') .
                                                        //             "</a><br>";
                                                        //     }
                                                        // };
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                                <!-- appointment that must be changed by now  -->
                                <div class="col">
                                    <div class="card  mb-4">
                                        <div class="card-header bg-success ">
                                            <button class="btn text-start  text-white w-100" type="button" data-bs-toggle="collapse" data-bs-target="#appToDone" aria-expanded="false" aria-controls="appToApprove" style="box-shadow: none;">
                                                <span>Appointment to change to done </span>
                                                <span class="float-end"><strong><?php echo $appoinmentToDone; ?></strong>
                                                    <i class="fas fa-chevron-down ms-2"></i></span>
                                            </button>
                                        </div>

                                        <div class="card-body  align-items-center justify-content-between ">
                                            <div class="collapse" id="appToDone">
                                                <div class="container">
                                                    <div class="row">

                                                        <?php



                                                        foreach ($appToDoneByPastDate_stmt as $data) {
                                                            $appDate = new DateTime($data["Appoinment_Date"]);
                                                            $appTimeEnd = new DateTime($data["Appointment_EndTime"]);
                                                            echo "<a href='appointment/" . $data["Appointment_Id"] . "'>" . "Appointment" .
                                                                " done at " . date_format($appDate, "M d, Y") . " " . date_format($appTimeEnd, "h:i a") .
                                                                "</a>";
                                                        };
                                                        foreach ($appToDoneByTodayDate_stmt as $data) {
                                                            $appDate = new DateTime($data["Appoinment_Date"]);
                                                            $appTimeEnd = new DateTime($data["Appointment_EndTime"]);
                                                            echo "<a href='appointment/" . $data["Appointment_Id"] . "'>" . "Appointment" .
                                                                " done at " . date_format($appDate, "M d, Y") . " " . date_format($appTimeEnd, "h:i a") .
                                                                "</a>";
                                                        };



                                                        if ($appoinmentToDone == 0) {

                                                            echo "<p>No appoinments to be changed</p>";
                                                        }

                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card  mb-4">
                                        <div class="card-header bg-warning ">
                                            <button class="btn text-start  text-white w-100" type="button" data-bs-toggle="collapse" data-bs-target="#appToPay" aria-expanded="false" aria-controls="appToApprove" style="box-shadow: none;">
                                                <span>Appointments Not Paid </span>
                                                <span class="float-end"><strong><?php echo $appoinmentToPay; ?></strong>
                                                    <i class="fas fa-chevron-down ms-2"></i></span>
                                            </button>
                                        </div>

                                        <div class="card-body  align-items-center justify-content-between ">
                                            <div class="collapse" id="appToPay">
                                                <div class="container">
                                                    <div class="row">

                                                        <?php



                                                        foreach ($appToPay_stmt as $data) {
                                                            $appDate = new DateTime($data["Appoinment_Date"]);
                                                            $appTimeEnd = new DateTime($data["Appointment_EndTime"]);
                                                            echo "<a href='appointment/" . $data["Appointment_Id"] . "'>" . "Appointment" .
                                                                "  at " . date_format($appDate, "M d, Y") . " " . date_format($appTimeEnd, "h:i a") .
                                                                "</a>";
                                                        };



                                                        if ($appoinmentToPay == 0) {

                                                            echo "<p>No appoinments to be paid</p>";
                                                        }

                                                        ?>
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
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <i class="fas fa-chart-bar me-1"></i>
                                                Appointments per Month
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-transparent" id="basic-addon1">Year</span>
                                                    <input type="number" class="form-control" id="yearToSet" maxlength="4" min="2010" max="<?php echo date_format($currentDate, "Y") + 10 ?>" value="<?php echo date_format($currentDate, "Y") ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body"><canvas id="appMonthChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <i class="fas fa-chart-bar me-1"></i>
                                                Appointments per Month
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-transparent" id="basic-addon1">Year</span>
                                                    <input type="number" class="form-control" id="yearToSet" maxlength="4" min="2010" max="<?php echo date_format($currentDate, "Y") + 10 ?>" value="<?php echo date_format($currentDate, "Y") ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
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
    <script src="js/dateView.js"></script>
    <script src="js/weekDay.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="js/chartBar.js"></script>

</body>

</html>
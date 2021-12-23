<?php session_start();

$dateToShow = $_GET["dateToView"];
$currentDate = new DateTime($dateToShow);


include_once '../classes/appoinment.class.php';
$appointment_obj = new Appointment();
$theDate =  $currentDate->format('Y-m-d');
$date_apps = $appointment_obj->getAppointmentByDate($theDate);

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
                <div class="container-sm px-4 float-start">
                    <h1 class="mt-4">Calendar</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <a href="calendar">Month View</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Date View</li>
                    </ol>

                    <div class="row  " style="max-width: 35rem;">
                        <div class="container-sm ">
                            Date Showing
                            <div class="row">
                                <div class="col">
                                    <p class=""><strong class="display-6"><?php echo $currentDate->format('l'); ?></strong> <?php echo $currentDate->format('F, d Y'); ?></p>
                                    <p style="display: none;" id="theDate"><?php echo $theDate ?></p>
                                </div>
                                <div class="col">
                                    <button type="button " class="btn btn-dark btn-sm w-75 float-end" data-bs-toggle="modal" data-bs-target="#modalCancel">Cancel all appointment on this day</button>
                                </div>
                            </div>
                        </div>
                        <div class="container-sm ">
                            <div class="row me-3">
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
                                <div class="col-10 mt-4 pt-1">
                                    <!-- <div class="row py-3 border-top border-dark timeRow" id="t9" ><span></span></div>
                                    <div class="row py-3 border-top border-dark timeRow" id="t10"><span></span></div>
                                    <div class="row py-3 border-top border-dark timeRow" id="t11"><span></span></div>
                                    <div class="row py-3 border-top border-dark  timeRow bg-secondary text-white" ><span>Lunch Break</span></div>
                                    <div class="row py-3 border-top border-dark  timeRow" id="t1"><span></span></div>
                                    <div class="row py-3 border-top border-dark  timeRow" id="t2"><span></span></div>
                                    <div class="row py-3 border-top border-dark  timeRow" id="t3"><span></span></div>
                                    <div class="row py-3 border-top border-dark  timeRow" id="t4"><span></span></div>
                                    <div class="row py-3 border-top border-dark  timeRow" ><span></span></div> -->
                                    <?php
                                    // $schedTime = array();
                                    // $scheds = array();
                                    // foreach ($date_apps as $data) {
                                    //     $time = $data["Appointment_StartTime"];
                                    //     $alloted = $data["Allotted_Hours"];
                                    //     $appTime = new DateTime($time);

                                    //     $startT = $appTime->format('H');
                                    //     for ($i = $startT; $i < $startT + $alloted; $i++) {
                                    //         array_push($schedTime, $i);
                                    //     }
                                    //     $appId = $data["Appointment_Id"];
                                    //     $scheds[$startT] = $appId ;
                                    // };

                                    $timesID = array(9, 10, 11, 12, 13, 14, 15, 16, 17);


                                    foreach ($timesID as $id) {
                                        if ($id == 12) {
                                            echo '<div class="row py-3 border-top border-dark  timeRow unAvailable"><span>Lunch Break</span></div> ';
                                        } else {
                                            printf('<div class="row py-3 border-top border-dark  timeRow" id="%u"><span></span></div> ', $id);
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
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

                <!-- Modal -->
                <div class="modal fade" id="modalCancel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Canceling all Appointment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Date : </strong> <?php echo $currentDate->format('F, d Y'); ?></p>
                                <p>Please state the reason that will be emailed to the patient</p>
                                <div class="input-group">
                                    <textarea class="form-control" aria-label="With textarea" rows="8"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger">Go</button>
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
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="js/evo-calendar.js"></script>
    <script>
        $(document).ready(function() {
            $('#calendar').evoCalendar({
                settingName: settingValue
            })
        }) -->
    </script>
</body>

</html>
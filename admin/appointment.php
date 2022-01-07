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

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <i class="fas fa-table me-1"></i> Appointments Table
                                            </div>
                                            <div class="col-auto align-self-end">
                                                <div class="row gx-0">
                                                    <div class="col-auto">
                                                        <button type="button" class="btn btn-secondary btn-sm w-auto float-end mx-2" data-bs-toggle="modal" data-bs-target="#filteringModal">
                                                            <i class="fa fa-filter"></i>
                                                            Filter table
                                                        </button>
                                                    </div>
                                                    <div class="col-auto">
                                                        <form action="appointmentFile" method="post" target="_blank">
                                                            <button type="submit" class="btn btn-dark btn-sm w-auto float-end">
                                                                <i class="fa fa-print"></i>
                                                                Print all
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="col-auto">
                                                <div class="dropdown float-end">
                                                    <a class="btn btn-light" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>

                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li class=" mb-1 ">
                                                            <a href="archiveAppointments" type="button" class="btn btn-light w-100 text-start" id="btnArchiveApp"><i class="fa fa-archive me-3" aria-hidden="true"> </i>Archives</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php
                                    include_once '../classes/appoinment.class.php';
                                    $appointment_obj = new Appointment();
                                    $stmt_appointments = $appointment_obj->getAllAppointment();
                                    // echo json_encode($patients);
                                    ?>
                                    <table class="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Appointment ID</th>
                                                <th>Patient ID</th>
                                                <th>Appointment Date</th>
                                                <th>Appointment Time</th>
                                                <th>Date Created</th>
                                                <th>Amount</th>
                                                <th>IsPaid</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Appointment ID</th>
                                                <th>Patient ID</th>
                                                <th>Appointment Date</th>
                                                <th>Appointment Time</th>
                                                <th>Date Created</th>
                                                <th>Amount</th>
                                                <th>IsPaid</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            while ($row = $stmt_appointments->fetch()) {
                                                if ($row['IsApproved'] == 1) {
                                                    $isPaid = ($row["IsPaid"]) ? "Paid" : "Not Paid";
                                                    $appDate = date_create($row["Appoinment_Date"]);
                                                    $appTime_Start = date_create($row["Appointment_StartTime"]);
                                                    $appTime_End = date_create($row["Appointment_EndTime"]);
                                                    $dateCreated = date_create($row["Date_Created"]);
                                                    $row = "<tr class='appointmentRow' data-bs-toggle='tooltip' data-bs-placement='bottom' " .
                                                        "title='Click to view'>" .
                                                        "<td class='appid'>" . $row["Appointment_Id"] . "</td>" .
                                                        "<td>" . $row["Patient_ID"] . "</td>" .
                                                        "<td>" . date_format($appDate, "M d, Y") . "</td>" .
                                                        "<td>" . date_format($appTime_Start, " h:ia") . " - " . date_format($appTime_End, " h:ia") . "</td>" .
                                                        "<td>" . date_format($dateCreated, "M d, Y h:ia") . "</td>" .
                                                        "<td>" . $row["Amount"] . "</td>" .
                                                        "<td>" . $isPaid . "</td>" .
                                                        "</tr>";
                                                    echo $row;
                                                }
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header bg-pink text-white">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">To be approved Appointments
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $stmt_appointments2 = $appointment_obj->getAllAppointment();
                                    // echo json_encode($patients);
                                    ?>
                                    <table class="datatablesSimple2">
                                        <thead>
                                            <tr>
                                                <th>Appointment ID</th>
                                                <th>Patient ID</th>
                                                <th>Appointment Date</th>
                                                <th>Appointment Time</th>
                                                <th>Date Created</th>
                                                <th>Amount</th>
                                                <th>IsPaid</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Appointment ID</th>
                                                <th>Patient ID</th>
                                                <th>Appointment Date</th>
                                                <th>Appointment Time</th>
                                                <th>Date Created</th>
                                                <th>Amount</th>
                                                <th>IsPaid</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            while ($row = $stmt_appointments2->fetch()) {
                                                if ($row['IsApproved'] == 0) {
                                                    $isPaid = ($row["IsPaid"]) ? "Paid" : "Not Paid";
                                                    $appDate = date_create($row["Appoinment_Date"]);
                                                    $appTime_Start = date_create($row["Appointment_StartTime"]);
                                                    $appTime_End = date_create($row["Appointment_EndTime"]);
                                                    $dateCreated = date_create($row["Date_Created"]);
                                                    $row = "<tr class='appointmentRow' data-bs-toggle='tooltip' data-bs-placement='bottom' " .
                                                        "title='Click to view'>" .
                                                        "<td class='appid'>" . $row["Appointment_Id"] . "</td>" .
                                                        "<td>" . $row["Patient_ID"] . "</td>" .
                                                        "<td>" . date_format($appDate, "M d, Y") . "</td>" .
                                                        "<td>" . date_format($appTime_Start, " h:ia") . " - " . date_format($appTime_End, " h:ia") . "</td>" .
                                                        "<td>" . date_format($dateCreated, "M d, Y h:ia") . "</td>" .
                                                        "<td>" . $row["Amount"] . "</td>" .
                                                        "<td>" . $isPaid . "</td>" .
                                                        "</tr>";
                                                    echo $row;
                                                }
                                            }
                                            ?>
                                        </tbody>

                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- MODAL  -->
                    <div class="modal fade" id="filteringModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Filter Appointments By :</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="appointment/filtered" method="post" class="container ">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="input-group mb-3 ">
                                                    <span class="input-group-text border-0 bg-transparent"> <strong>Patient Id : </strong> </span>
                                                    <input type="number" class="form-control border-bottom" placeholder="####" id="appPatientId" name="appPatientId" onKeyPress="if(this.value.length==4) return false;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="container ">
                                                <div class="row ">
                                                    <div class="col-sm-4 ">
                                                        <label for="" class="me-5"><strong>Appointment Date</strong></label>
                                                    </div>
                                                    <div class="col-sm-auto ">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="appDateRadio" id="appDateSpecific" checked value="1">
                                                            <label class="form-check-label  radio-label" for="appDateSpecific">
                                                                Specific Date
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="appDateRadio" id="appDateRange" value="2">
                                                            <label class="form-check-label  radio-label" for="appDateRange">
                                                                Range
                                                            </label>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row ps-3 ">
                                                    <div class="row " id="appDateSpecificWrapper">
                                                        <label for="appDate" class="col-auto col-form-label ">Date</label>
                                                        <div class="col-sm-5">
                                                            <input type="date" class="form-control" name="appDate" id="appDate">
                                                        </div>
                                                    </div>
                                                    <div class="row unShow " id="appDateRangeWrapper">
                                                        <label for="appDateStart" class="col-sm-auto col-form-label ">Start with</label>
                                                        <div class="col-sm-4">
                                                            <input type="date" class="form-control" name="appDateStart" id="appDateStart">
                                                        </div>
                                                        <label for="appDateEnd" class="col-sm-auto col-form-label">End with</label>
                                                        <div class="col-sm-4">
                                                            <input type="date" class="form-control" name="appDateEnd" id="appDateEnd">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-3 px-2 ">
                                            <div class="container ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="" class="me-5"><strong>Date Created</strong></label>
                                                    </div>
                                                    <div class="col-sm-auto">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="crtDateRadio" id="crtDateSpecific" checked value="1">
                                                            <label class="form-check-label  radio-label" for="crtDateSpecific">
                                                                Specific Date
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="crtDateRadio" id="crtDateRange" value="2">
                                                            <label class="form-check-label  radio-label" for="crtDateRange">
                                                                Range
                                                            </label>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row ps-3">
                                                    <div class="row " id="crtDateSpecificWrapper">
                                                        <label for="crtDate" class="col-auto col-form-label ">Date</label>
                                                        <div class="col-sm-5">
                                                            <input type="date" class="form-control" name="crtDate" id="crtDate">
                                                        </div>
                                                    </div>
                                                    <div class="row unShow " id="crtDateRangeWrapper">
                                                        <label for="crtDateStart" class="col-sm-auto col-form-label ">Start with</label>
                                                        <div class="col-sm-4">
                                                            <input type="date" class="form-control" name="crtDateStart" id="crtDateStart">
                                                        </div>
                                                        <label for="crtDateEnd" class="col-sm-auto col-form-label">End with</label>
                                                        <div class="col-sm-4">
                                                            <input type="date" class="form-control" name="crtDateEnd" id="crtDateEnd">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3 px-2">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="" class="me-5"><strong>Amount</strong></label>

                                                    </div>
                                                    <div class="col-sm-auto">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="amtRadio" id="amtSpecific" checked value="1">
                                                            <label class="form-check-label  radio-label" for="amtSpecific">
                                                                Specific
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="amtRadio" id="amtRange" value="2">
                                                            <label class="form-check-label  radio-label" for="amtRange">
                                                                Range
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row ps-3">
                                                    <div class="row " id="amtSpecificWrapper">
                                                        <label for="appAmount" class="col-auto col-form-label ">Amount </label>
                                                        <div class="col-sm-5">
                                                            <input type="number" class="form-control" name="appAmount" id="appAmount" maxlength="4" size="4">
                                                        </div>
                                                    </div>
                                                    <div class="row unShow " id="amtRangeWrapper">
                                                        <label for="amStart" class="col-sm-auto col-form-label ">Start with</label>
                                                        <div class="col-sm-4">
                                                            <input type="number" class="form-control" name="amStart" id="amStart" maxlength="4" size="4">
                                                        </div>
                                                        <label for="amtEnd" class="col-sm-auto col-form-label">End with</label>
                                                        <div class="col-sm-4">
                                                            <input type="number" class="form-control" name="amtEnd" id="amtEnd" maxlength="4" size="4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-8">
                                                <div class="input-group mb-3 ">
                                                    <span class="input-group-text border-0 bg-transparent"><strong>Payment Method </strong></span>
                                                    <select class="form-select w-50" aria-label="" id="appPayment" name="appPayment">
                                                        <option value="" selected>Nothing selected</option>
                                                        <option value="GCash">GCash</option>
                                                        <option value="PayLater">Pay later</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-sm-8">
                                                <div class="input-group mb-3 ">
                                                    <span class="input-group-text border-0 bg-transparent"><strong>Is Paid </strong></span>
                                                    <select class="form-select w-50" aria-label="" id="appIspaid" name="appIspaid">
                                                        <option value="" selected>Nothing selected</option>
                                                        <option value="1">Paid</option>
                                                        <option value="0">Not Paid</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-sm-8">
                                                <div class="input-group mb-3 ">
                                                    <span class="input-group-text border-0 bg-transparent"><strong>Is Done </strong></span>
                                                    <select class="form-select w-50" aria-label="" id="appIsdone" name="appIsdone">
                                                        <option value="" selected>Nothing selected</option>
                                                        <option value="1">Done</option>
                                                        <option value="0">Not Done</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-sm-8">
                                                <div class="input-group mb-3 ">
                                                    <span class="input-group-text border-0 bg-transparent"><strong>Sort by </strong></span>
                                                    <select class="form-select w-50" aria-label="" id="sortBy" name="sortBy">
                                                        <option value="" selected>Nothing selected</option>
                                                        <option value="`Appoinment_Date` ASC">Appointment Date (ASC)</option>
                                                        <option value="`Appoinment_Date` DESC">Appointment Date (DESC)</option>
                                                        <option value="`Date_Created` ASC">Date Created (ASC)</option>
                                                        <option value="`Date_Created` DESC">Date Created (DESC)</option>
                                                        <option value="`Amount` ASC">Amount (ASC)</option>
                                                        <option value="`Amount` DESC">Amount (DESC)</option>
                                                        <option value="`Appointment_StartTime` ASC">Appointment Time (ASC)</option>
                                                        <option value="`Appointment_StartTime` DESC">Appointment Time (DESC)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-5">
                                            <div class="col align-self-end">
                                                <button type="submit" class="btn btn-primary  w-auto float-end" data-bs-toggle="modal" data-bs-target="#filteringModal">
                                                    <!-- <i class="fa fa-filter"></i> -->
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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

    <script>
        // for the second table   unapproved table
        window.addEventListener('DOMContentLoaded', event => {
            // Simple-DataTables
            // https://github.com/fiduswriter/Simple-DataTables/wiki

            const datatablesSimple = document.getElementsByClassName('datatablesSimple2')[0];
            if (datatablesSimple) {
                new simpleDatatables.DataTable(datatablesSimple);
            }
        });
    </script>

</body>

</html>
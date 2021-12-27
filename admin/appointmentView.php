<?php session_start();

// if (!isset($_GET["appoinmentId"])) {
//     exit();
// }

$appointmentId = $_GET["appoinmentId"];
include_once '../classes/appoinment.class.php';
include_once '../classes/patient.class.php';
$appointment_obj = new Appointment();
$patient_obj = new Patient();
$appointment = $appointment_obj->getAppointmentById($appointmentId);
$patient = $patient_obj->getPatientById($appointment[0]["Patient_ID"]);

$isApproved = $appointment[0]["IsApproved"];



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
                    <p id="appId" class="unShow"><?php echo $_GET["appoinmentId"] ?></p>
                    <p id="appEmail" class="unShow"><?php echo $patient['Email'] ?></p>

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"> <a href="appointment"> List of Appoinment </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Appoinment View</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="container">
                                <div class="row p-0">
                                    <div class="col">
                                        <i class="fas fa-calendar-check me-1"></i>
                                        Appointment <?php echo (!$isApproved) ? " to be Approved":"";?>

                                    </div>
                                    <div class="col-auto me-0">
                                        <div class="dropdown float-end">
                                            <a class="btn btn-light" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li class=" mb-1 ">
                                                    <form action="appointmentFile" method="post" target="_blank">
                                                        <input type="hidden" name="app_ID" value="<?php echo $_GET["appoinmentId"] ?>">
                                                        <button type="submit" class="btn btn-light w-100 text-start ">
                                                            <i class="fa fa-print me-3"></i>
                                                            Print
                                                        </button>
                                                    </form>
                                                </li>
                                                <li class=" mb-1 "><button class="btn btn-light w-100 text-start" id="btnDeleteApp"><i class="fa fa-trash-o me-3" aria-hidden="true"></i> Delete</button></li>
                                                <?php
                                                if ($isApproved) {
                                                ?>
                                                    
                                                    <li class=" mb-1 "><button class="btn btn-light w-100 text-start" id="btnArchiveApp"><i class="fa fa-archive me-3" aria-hidden="true"> </i>Archive</button></li>
                                                <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
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
                                                <dd class="col-sm-7" id="appPtName"><?php echo $patient["Name"]; ?>
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
                                                <dd class="col-sm-7" id="appDate"><?php
                                                                        $appDate = date_create($appointment[0]["Appoinment_Date"]);
                                                                        echo date_format($appDate, "M d, Y");
                                                                        ?>
                                                </dd>

                                                <dt class="col-sm-5">Appoinment Time:</dt>
                                                <dd class="col-sm-7" id="appTime" ><?php
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

                                            <div class="row py-3 mx-2 mt-5 border border-3 border-success rounded">
                                                <dt class="col-sm-5">Payment Method:</dt>
                                                <dd class="col-sm-7" id="appPayment"><?php
                                                    echo $appointment[0]["Payment_Method"]
                                                    ?>
                                                </dd>

                                                <dt class="col-sm-5 ">IsPaid:</dt>
                                                <dd class="col-sm-7">

                                                    <?php
                                                    $isPaid = ($appointment[0]["IsPaid"]) ? "Paid" : "Not Paid";
                                                    $color = ($appointment[0]["IsPaid"]) ? "info" : "warning";
                                                    echo "<span class='bg-$color px-2 py-1'>" . $isPaid . "</span>";
                                                    ?>

                                                </dd>

                                                <dt class="col-sm-5 mt-2">IsDone:</dt>
                                                <dd class="col-sm-7 mt-2">

                                                    <?php
                                                    $isDone = ($appointment[0]["IsDone"]) ? "Done" : "Not Done";
                                                    $colorDone = ($appointment[0]["IsDone"]) ? "info" : "warning";
                                                    echo "<span class='bg-$colorDone  px-2 py-1'>" . $isDone . '</span>';
                                                    ?>

                                                </dd>
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#modalSetChanges">Change</button>
                                                </div>
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
                                                <strong id="appAmount"><?php echo $appointment[0]["Amount"] ?> php</strong>
                                            </div>
                                        </div>
                                        <?php
                                        if ($appointment[0]["Payment_Method"] != "PayLater") {

                                        ?>
                                            <p class="h5 mt-5">Proof of Payment</p>
                                            <div class="row ">
                                                <dl class="row ">
                                                    <dt class="col-sm-5">Payment Method:</dt>
                                                    <dd class="col-sm-7">
                                                        <?php
                                                        echo $appointment[0]["Payment_Method"]
                                                        ?>
                                                    </dd>

                                                </dl>
                                                <div class="row justify-content-center">
                                                    <div class="col-sm-7 mb-3">
                                                        <?php
                                                        $pop = $appointment_obj->getPOP($appointmentId);
                                                        $imgSrc = '../resources/images/Proof_of_Payment.png';
                                                        if ($pop != null) {
                                                            $imgSrc = '../resources/Proof_of_Payments/' . $pop['ImgFileName'] . '.jpg';
                                                        } else {
                                                            echo '<span style="color:red;" >No Proof of Payment found</span>';
                                                        }
                                                        ?>

                                                        <img src="<?php echo $imgSrc ?>" alt="Image for Proof of Payment " class="img-thumbnail mb-3 " id="imgPOP">

                                                    </div>

                                                </div>

                                            </div>

                                        <?php
                                        }
                                        ?>



                                    </div>
                                </div>
                                <?php
                                if (!$isApproved) {
                                ?>
                                    <div class="row justify-content-center mt-3">
                                        <div class="col-12">
                                            <button class="btn btn-primary bg-pink w-100" data-bs-toggle="modal" data-bs-target="#modalSetApproved"> Approve Appointment</button>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <i class="fas fa-file"></i> Form File
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

                            include_once '../classes/dentalHistory.class.php';
                            $dentalHistory_obj = new DentalHistory();

                            include_once '../classes/medicalHistory.class.php';
                            $medicalHistory_obj = new MedicalHistory();

                            include_once '../classes/femalePatient.class.php';
                            $femalePatient_obj = new FemalePatient();

                            include_once '../classes//socialHistory.class.php';
                            $socialHistory_obj = new SocialHistory();

                            include_once '../classes/patientCondition.class.php';
                            $patientCondition_obj = new PatientCondition();

                            // $appointmentId

                            $dentalHistory = $dentalHistory_obj->getDentalHistoryByAppId($appointmentId);
                            $MedicalHistory = $medicalHistory_obj->getMedicalHistoryByAppId($appointmentId);
                            $SocialHistory = $socialHistory_obj->getSocialHistoryByAppId($appointmentId);
                            $FemalePatient = $femalePatient_obj->getFemalePatientByAppId($appointmentId);
                            $PatientCondition = $patientCondition_obj->getPatientConditionByAppId($appointmentId);

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
                                                <p class="h4">Dental History</p>
                                                <dt class="col-sm-5">Last Dental Visit :</dt>
                                                <dd class="col-sm-7">

                                                    <?php
                                                    echo (isset($dentalHistory["Last_Dental_Visit"])) ? $dentalHistory["Last_Dental_Visit"] : " ";
                                                    ?>
                                                </dd>

                                                <dt class="col-sm-5">Purpose :</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    echo (isset($dentalHistory["Purpose"])) ? $dentalHistory["Purpose"] : " ";
                                                    ?>
                                                </dd>

                                                <p class="h4 mt-4">Medical History</p>
                                                <dt class="col-sm-5">Last_Medical_Checkup:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    echo (isset($MedicalHistory["Last_Medical_Checkup"])) ? $MedicalHistory["Last_Medical_Checkup"] : " ";
                                                    ?>
                                                </dd>

                                                <dt class="col-sm-5">Medical_Treatment:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    echo (isset($MedicalHistory["Medical_Treatment"])) ? $MedicalHistory["Medical_Treatment"] : " ";
                                                    ?>
                                                </dd>

                                                <dt class="col-sm-5">Medication:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    echo (isset($MedicalHistory["Medication"])) ? $MedicalHistory["Medication"] : " ";
                                                    ?>
                                                </dd>

                                                <dt class="col-sm-5">Hospitalized:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    echo (isset($MedicalHistory["Hospitalized"])) ? $MedicalHistory["Hospitalized"] : " ";
                                                    ?>
                                                </dd>

                                                <dt class="col-sm-5">Allergies:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    echo (isset($MedicalHistory["Allergies"])) ? $MedicalHistory["Allergies"] : " ";
                                                    ?>
                                                </dd>

                                                <?php
                                                if (!empty($FemalePatient)) {
                                                ?>

                                                    <dt class="col-sm-5">IsPregnant:</dt>
                                                    <dd class="col-sm-7">
                                                        <?php
                                                        echo ($FemalePatient["IsPregnant"]) ? "Pregnant" : "Not Pregnant";
                                                        ?>
                                                    </dd>

                                                    <dt class="col-sm-5">Months_Pregnant:</dt>
                                                    <dd class="col-sm-7">
                                                        <?php
                                                        echo ($FemalePatient["Months_Pregnant"] != 0) ? $FemalePatient["Months_Pregnant"] . " month/s" : "";
                                                        ?>
                                                    </dd>

                                                    <dt class="col-sm-5">IsTakingBirthPills:</dt>
                                                    <dd class="col-sm-7">
                                                        <?php
                                                        echo ($FemalePatient["IsTakingBirthPills"]) ? "Yes" : "No";
                                                        ?>
                                                    </dd>

                                                    <dt class="col-sm-5">Date_Answered:</dt>
                                                    <dd class="col-sm-7">
                                                        <?php
                                                        echo $FemalePatient["Date_Answered"];
                                                        ?>
                                                    </dd>

                                                <?php
                                                }
                                                ?>

                                                <p class="h4 mt-4">Social History</p>
                                                <dt class="col-sm-5">IsSmoking:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    echo (isset($SocialHistory["IsSmoking"])) ? (($SocialHistory["IsSmoking"]) ? "Yes" : "No") : " ";
                                                    ?>
                                                </dd>
                                                <dt class="col-sm-5">IsDrinkingAlcohol:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    echo (isset($SocialHistory["IsDrinkingAlcohol"])) ? (($SocialHistory["IsDrinkingAlcohol"]) ? "Yes" : "No") : " ";
                                                    ?>
                                                </dd>

                                                <p class="h4 mt-4">Patient Condition</p>
                                                <dt class="col-sm-5">Patient:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    echo (isset($PatientCondition["Patient_ID"])) ? $PatientCondition["Patient_ID"] : " ";
                                                    ?>
                                                </dd>
                                                <dt class="col-sm-5">Condition/s:</dt>
                                                <dd class="col-sm-7">
                                                    <?php
                                                    echo (isset($PatientCondition["Patient_Condition"])) ? $PatientCondition["Patient_Condition"] : " ";

                                                    ?>
                                                </dd>

                                            </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal filter -->
                    <div class="modal fade" id="modalLoader" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body bg-transparent">
                                    <div class="row">
                                        <div class="col-9">
                                            <span>
                                                <div id="msgLoader"></div>Please wait.
                                            </span>

                                        </div>
                                        <div class="col-2">
                                            <div class="d-flex justify-content-end">

                                                <div class="spinner-border text-danger" style="width: 3rem; height: 3rem;" role="status" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal approval -->
                    <div class="modal fade" id="modalSetApproved" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Approve Appointment</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <span><strong>Appointment ID</strong> : <?php echo $appointmentId ?></span><br>
                                    <span><strong>Patient </strong> : <?php echo  $appointment[0]["Patient_ID"] ?> | <?php echo $patient["Name"]; ?></span><br>
                                    <span><strong>Appointment Date Time </strong> : <?php echo date_format($appDate, "M d, Y") . " " . date_format($appTime_Start, " h:i a") . " - " . date_format($appTime_End, " h:i a") ?></span><br> <br>
                                    <span><strong>Date Created </strong> : <?php echo date_format($dateCreated, "M d, Y h:i a") ?></span><br>
                                </div>
                                <div class="modal-footer">
                                    <div id="approvedBtns">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="btnConfirmApprove">Confirm</button>
                                    </div>
                                    <div class="spinner-border text-danger unShow" role="status" id="approveLoader">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal approval -->
                    <div class="modal fade" id="modalSetChanges" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Set Changes</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">
                                    <div class="row px-3 unShow" id="changes-wrapper">
                                        <div class="col">
                                            <span><strong>Set Paid</strong></span><br>
                                            <div class="row gx-0">
                                                <div class="col-sm-6">
                                                    <input type="radio" class="btn-check" name="options-IsPaid" id="paid" value="0" autocomplete="off" <?php echo ($appointment[0]["IsPaid"]) ? "" : "checked" ?>>
                                                    <label class="btn btn-outline-warning mb-2" for="paid">Not Paid</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="radio" class="btn-check" name="options-IsPaid" id="notPaid" value="1" autocomplete="off" <?php echo ($appointment[0]["IsPaid"]) ? "checked" : "" ?>>
                                                    <label class="btn btn-outline-primary mb-2" for="notPaid">Paid</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col">
                                            <span><strong>Set Done</strong></span><br>
                                            <div class="row gx-0">
                                                <div class="col-sm-6">
                                                    <input type="radio" class="btn-check " name="options-IsDone" id="done" value="0" autocomplete="off" <?php echo ($appointment[0]["IsDone"]) ? "" : "checked" ?>>
                                                    <label class="btn btn-outline-warning mb-2" for="done">Not Done</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="radio" class="btn-check" name="options-IsDone" id="notDone" value="1" autocomplete="off" <?php echo ($appointment[0]["IsDone"]) ? "checked" : "" ?>>
                                                    <label class="btn btn-outline-primary mb-2" for="notDone">Done</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row px-3 mt-4 unShow" id="paid-wrapper">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-white border-0" id="inpt-AmountPaid">Amount Paid</span>
                                            <span class="input-group-text w-auto">₱</span>
                                            <input type="number" id="inpt-amountPaid" class="form-control" placeholder="Amount" aria-label="AmountPaid" aria-describedby="AmountPaid" value="<?php echo $appointment[0]["Amount"] ?>">
                                        </div>
                                    </div>
                                    <div class="row px-3 mt-3 " id="adminPassword-wrapper">
                                        <div class="border border-2 border-danger shadow-lg p-3 mb-5 bg-body rounded ">
                                            <p class="text-muted text-center" style="font-size: 1.25rem;">Input your admin account password</p>
                                            <div class="px-4">
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control text-center" placeholder="* * * * * *" aria-label="adminPassword" aria-describedby="adminPassword" id="inputAdminPassword">
                                                    <div class="invalid-feedback">
                                                        <span>Admin : <?php echo $_SESSION['userAdmin'] ?> </span><br>
                                                        <span class="text-end" style="color: red;"> Wrong admin password</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-success float-end" id="btnCheckAdminPassword">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div id="changesBtns">
                                        <button type="button" class="btn btn-primary unShow" id="btnConfirmChanges">Confirm</button>
                                    </div>
                                    <div class="spinner-border text-danger unShow" role="status" id="changeLoader">
                                        <span class="visually-hidden">Loading...</span>
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
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="js/appointmentView.js"></script>
</body>

</html>
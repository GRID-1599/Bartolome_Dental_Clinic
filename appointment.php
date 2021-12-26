<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment | Bartolome Dental Clinic</title>

    <?php include_once('font_links.php') ?>
    <link href="styles/bootstap_css/styles.css" rel="stylesheet" />
    <link href="styles/style.css" rel="stylesheet" />
</head>

<body>
    <?php
    include('header.php') ?>
    <main>
        <?php
        include "classes/appoinment.class.php";
        $app_obj = new Appointment();
        include_once 'classes/patient.class.php';
        $patient_obj = new Patient();

        if (isset($_GET["appointmentId"])) {
            $appointment = $app_obj->getAppointmentById($_GET["appointmentId"]);
            if (isset($appointment[0]["Patient_ID"])) {
                $patient = $patient_obj->getPatientById($appointment[0]["Patient_ID"]);
        ?>
                <div class="container-xxl mt-3 px-4">
                    <div class="container">
                        <div class="row">
                            <p class="h5">Appointment Details</p>

                            <div class="col ps-5">
                                <dl class="row">
                                    <div class="row">
                                        <dt class="col-sm-5">Appointment ID:</dt>
                                        <dd class="col-sm-7">

                                            <?php
                                            echo $_GET["appointmentId"];
                                            ?>
                                        </dd>

                                        <dt class="col-sm-5">Patient ID:</dt>
                                        <dd class="col-sm-7">
                                            <?php
                                            echo $appointment[0]["Patient_ID"];
                                            ?>
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
                                <?php
                                if ($appointment[0]["Payment_Method"] != "PayLater") {

                                ?>
                                    <p class="h5 my-3">Proof of Payment</p>
                                    <div class="row ">
                                        <dl class="row ">
                                            <dt class="col-sm-5">Payment Method:</dt>
                                            <dd class="col-sm-7">
                                                <?php
                                                echo $appointment[0]["Payment_Method"]
                                                ?>
                                            </dd>

                                        </dl>
                                        <div class="row">
                                            <div class="col-sm-6 ">
                                                <div class="row ">
                                                    <span>Clinic GCash Number</span><br>
                                                    <span style="font-size: 1rem; color:#bf2441;">09223964642</span>
                                                </div>
                                                <img src="resources/images/clinic_gcash.jpg" alt="Default Service Image" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <?php
                                                $pop = $app_obj->getPOP($_GET["appointmentId"]);
                                                $imgSrc = 'resources/images/Proof_of_Payment.png';
                                                if ($pop != null) {
                                                    $imgSrc = 'resources/Proof_of_Payments/' . $pop['ImgFileName'] . '.jpg';
                                                }
                                                ?>
                                                <span>Proof of Payment</span>
                                                <img src="<?php echo $imgSrc ?>" alt="Image for Proof of Payment " class="img-thumbnail mb-3" id="imgPOP">

                                                <form id="formImage" onsubmit="return false">
                                                    <input type="file" id="pop_image" class="" aria-describedby="inputGroupFileAddon01" accept="image/jpeg" style="display: none;">
                                                    <label class="btn btn-primary w-100" for="pop_image">Upload File</label>
                                                </form>
                                                <p class="text-muted">Please submit an image of the proof of payment to be verified</p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <?php
                                               if ($pop == null) {
                                                   echo ' <button class="btn btn-primary w-100" id="btnPOPAdd"> Submit Add </button>';
                                               }else{
                                                   echo '<button class="btn btn-primary w-100" id="btnPOPEdit"> Submit Edit </button>';
                                               }
                                            ?>
                                            
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <p id="app_Id" class="unShow" ><?php echo $_GET['appointmentId'] ?></p>
                        <div class="row mt-5">
                            <?php

                            include_once 'classes/dentalHistory.class.php';
                            $dentalHistory_obj = new DentalHistory();

                            include_once 'classes/medicalHistory.class.php';
                            $medicalHistory_obj = new MedicalHistory();

                            include_once 'classes/femalePatient.class.php';
                            $femalePatient_obj = new FemalePatient();

                            include_once 'classes//socialHistory.class.php';
                            $socialHistory_obj = new SocialHistory();

                            include_once 'classes/patientCondition.class.php';
                            $patientCondition_obj = new PatientCondition();

                            $appointmentId = $_GET["appointmentId"];

                            $dentalHistory = $dentalHistory_obj->getDentalHistoryByAppId($appointmentId);
                            $MedicalHistory = $medicalHistory_obj->getMedicalHistoryByAppId($appointmentId);
                            $SocialHistory = $socialHistory_obj->getSocialHistoryByAppId($appointmentId);
                            $FemalePatient = $femalePatient_obj->getFemalePatientByAppId($appointmentId);
                            $PatientCondition = $patientCondition_obj->getPatientConditionByAppId($appointmentId);



                            ?>
                            <p class="h5">Form</p>
                            <div class="col-md-6">

                                <div class="row ps-3 mb-3">
                                    <p class="h5">Medical History</p>
                                    <div class="row ps-5">
                                        <dt class="col-sm-5">Last Medical Checkup:</dt>
                                        <dd class="col-sm-7">
                                            <?php
                                            echo (isset($MedicalHistory["Last_Medical_Checkup"])) ? $MedicalHistory["Last_Medical_Checkup"] : " ";
                                            ?>
                                        </dd>

                                        <dt class="col-sm-5">Medical Treatment:</dt>
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

                                            <dt class="col-sm-5">Pregnant:</dt>
                                            <dd class="col-sm-7">
                                                <?php
                                                echo ($FemalePatient["IsPregnant"]) ? "Pregnant" : "Not Pregnant";
                                                ?>
                                            </dd>

                                            <dt class="col-sm-5">Months Pregnant:</dt>
                                            <dd class="col-sm-7">
                                                <?php
                                                echo ($FemalePatient["Months_Pregnant"] != 0) ? $FemalePatient["Months_Pregnant"] . " month/s" : "";
                                                ?>
                                            </dd>

                                            <dt class="col-sm-5">Taking Birth Pills:</dt>
                                            <dd class="col-sm-7">
                                                <?php
                                                echo ($FemalePatient["IsTakingBirthPills"]) ? "Yes" : "No";
                                                ?>
                                            </dd>

                                            <dt class="col-sm-5">Date Answered:</dt>
                                            <dd class="col-sm-7">
                                                <?php
                                                echo $FemalePatient["Date_Answered"];
                                                ?>
                                            </dd>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row ps-3 mb-3">
                                    <p class="h5">Dental History</p>
                                    <div class="row ps-5">
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
                                    </div>
                                </div>
                                <div class="row ps-3 mb-3">
                                    <p class="h5">Social History History</p>
                                    <div class="row ps-5">
                                        <dt class="col-sm-5">Smoking:</dt>
                                        <dd class="col-sm-7">
                                            <?php
                                            echo (isset($SocialHistory["IsSmoking"])) ? (($SocialHistory["IsSmoking"]) ? "Yes" : "No") : " ";
                                            ?>
                                        </dd>
                                        <dt class="col-sm-5">DrinkingAlcohol:</dt>
                                        <dd class="col-sm-7">
                                            <?php
                                            echo (isset($SocialHistory["IsDrinkingAlcohol"])) ? (($SocialHistory["IsDrinkingAlcohol"]) ? "Yes" : "No") : " ";
                                            ?>
                                        </dd>
                                    </div>
                                </div>

                                <div class="row ps-3 mb-3">
                                    <p class="h5">Patient Condition</p>
                                    <div class="row ps-5">
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

            <?php
            } else {
            ?>
                <div class="container-xxl mt-3 px-4 ">
                    <p class="display-6 text-center">Appointment Not Found</p>
                    <p class="text-center">To back to main page</p>
                    <div class=" d-flex justify-content-center">
                        <a href="" class="d-flex">Click here</a>
                    </div>
                </div>
        <?php
            }
        }
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




    </main>
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
    <script src="javascript/appointment.js"></script>
</body>

</html>
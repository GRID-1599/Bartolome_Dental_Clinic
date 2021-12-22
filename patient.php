<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient | Bartolome Dental Clinic</title>

    <?php include_once('font_links.php') ?>
    <link href="styles/bootstap_css/styles.css" rel="stylesheet" />
    <link href="styles/style.css" rel="stylesheet" />
</head>

<body>
    <?php
    include('header.php') ?>
    <main>
        <?php
        include_once 'classes/patient.class.php';
        $patient_obj = new Patient();
        if (isset($_POST["patientId"])) {
            $patient = $patient_obj->getPatientById($_POST["patientId"]);
            if (isset($patient["Name"])) {
        ?>
                <div class="container-xxl mt-3 px-4">
                    <div class="row">
                        <div class="col-md-7 mb-3">
                            <p class="h5 mb-3">Patient Details</p>
                            <div class="row">
                                <!-- patient info  -->
                                <div class="col  ">
                                    <div class="container">
                                        <dl class="row">
                                            <dt class="col-sm-3">Patient ID:</dt>
                                            <dd class="col-sm-9" id="ptID"><?php echo $_POST["patientId"]; ?></dd>

                                            <dt class="col-sm-3">Name:</dt>
                                            <dd class="col-sm-9">
                                                <input class="form-control-plaintext detail " type="text" value="<?php echo $patient["Name"]; ?>" id="ptName" disabled>
                                            </dd>

                                            <dt class="col-sm-3">Nickname:</dt>
                                            <dd class="col-sm-9">
                                                <input class="form-control-plaintext detail" type="text" value="<?php echo $patient["Nickname"]; ?>" id="ptNickname" disabled>
                                            </dd>

                                            <dt class="col-sm-3">Birthday:</dt>
                                            <dd class="col-sm-9">
                                                <input class="form-control-plaintext detail" type="date" value="<?php echo $patient["Birthday"] ?>" id="ptBday" disabled>
                                            </dd>

                                            <dt class="col-sm-3">Age:</dt>
                                            <dd class="col-sm-9">
                                                <input class="form-control-plaintext detail" type="number" value="<?php echo $patient["Age"]; ?>" max="150" min="1" id="ptAge" disabled>
                                            </dd>

                                            <dt class="col-sm-3">Gender:</dt>
                                            <dd class="col-sm-9">
                                                <select class="form-select detail select-style" id="ptGender" disabled>
                                                    <?php
                                                    $genderArray = ['Male', 'Female', 'Bigender', 'Transgender', 'Prefer not to say'];
                                                    foreach ($genderArray as $value) {
                                                        $selected = "";
                                                        if ($value ==  $patient["Gender"]) {
                                                            $selected = "selected";
                                                        }
                                                        echo "<option value='" . $value . "' " . $selected . ">" . $value . "</option>";
                                                    }

                                                    ?>
                                                </select>
                                            </dd>

                                            <dt class="col-sm-3">Civil Status:</dt>
                                            <dd class="col-sm-9">
                                                <select class="form-select detail select-style" id="ptStatus" disabled>
                                                    <?php
                                                    $civilArray = ['Single', 'Married', 'In a relationship', 'Engaged', 'Widowed', 'Seperated', 'Divorced', "In a open relationship", "It's complicated"];
                                                    foreach ($civilArray as $value) {
                                                        $selected = "";
                                                        if ($value ==  $patient["Civil_Status"]) {
                                                            $selected = "selected";
                                                        }
                                                        echo "<option value='" . $value . "' " . $selected . ">" . $value . "</option>";
                                                    }

                                                    ?>
                                                </select>
                                            </dd>

                                            <dt class="col-sm-3">Address:</dt>
                                            <dd class="col-sm-9">
                                                <input class="form-control-plaintext detail" type="text" value="<?php echo $patient["Address"]; ?>" id="ptAddress" disabled>
                                            </dd>

                                            <dt class="col-sm-3">Email:</dt>
                                            <dd class="col-sm-9">
                                                <input class="form-control-plaintext detail" type="text" value="<?php echo $patient["Email"]; ?>" id="ptEmail" disabled>

                                            </dd>

                                            <dt class="col-sm-3">Contact:</dt>
                                            <dd class="col-sm-9">
                                                <input class="form-control-plaintext detail" type="text" value="<?php echo $patient["Contact"]; ?>" id="ptContact" disabled>
                                            </dd>



                                            <dt class="col-sm-3">Date Created:</dt>
                                            <dd class="col-sm-9">
                                                <?php
                                                $dateCreated = date_create($patient["Date_Created"]);
                                                echo date_format($dateCreated, "M d, Y ");
                                                ?></dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="row rowEdit">
                                <button class="btn btn-success" id="btnPatientEdit">Edit</button>
                            </div>
                            <div class="row rowSave unShow">
                                <div class="col-sm-6 mb-3">
                                    <button class="btn btn-success w-100" id="btnPatientSave">Save changes</button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-danger w-100" id="btnPatientCancel">Cancel</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <p class="h5 mb-3">Appointments</p>
                            <div class="row overflow-auto gy-3" style="max-height: 80vh;">
                                <?php
                                include_once 'classes/appoinment.class.php';
                                $app_obj = new Appointment();
                                $appointment_arr = $app_obj->getAppointmentByPatientID($_POST["patientId"]);
                                foreach ($appointment_arr as $appointment) {
                                    $appId = $appointment["Appointment_Id"];
                                    $thedate = date_create($appointment["Appoinment_Date"]);
                                    $appDate = date_format($thedate, "M d, Y");
                                    $appTime_Start = date_create($appointment["Appointment_StartTime"]);
                                    $appTime_End = date_create($appointment["Appointment_EndTime"]);
                                    $apptime = date_format($appTime_Start, ' h:i a') . " - " . date_format($appTime_End, " h:i a");

                                    $payment = $appointment["Payment_Method"];
                                    $isPaid = ($appointment["IsPaid"]) ? "Paid" : "Not Paid";
                                    $isDone = ($appointment["IsDone"]) ? "Done" : "Not Done";
                                    $amount =  $appointment["Amount"] ;

                                    echo <<<APP
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Appointment</h5>
                                                    <a href="appointment/$appId" class="card-text">$appId</a>
                                                    <p class="card-text m-0">$appDate</p>
                                                    <p class="card-text m-0">$apptime</p>
                                                    <p class="card-text m-0">$amount php</p>
                                                    <p class="card-text m-0">$payment</p>
                                                    <p class="card-text m-0">$isPaid</p>
                                                    <p class="card-text m-0">$isDone</p>
                                                    <a type="button" class="btn btn-primary btn-sm w-50 mt-3" href="appointment/$appId">View</a>
                                                

                                                </div>
                                            </div>
                                        </div>
                                    APP;
                                }
                                ?>



                            </div>
                        </div>
                    </div>
                </div>

            <?php
            } else {
            ?>
                <div class="container-xxl mt-3 px-4 ">
                    <p class="display-6 text-center">Patient Not Found</p>
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

        <div class="modal fade" id="loaderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body ">
                        <p class="text-center m-0 h5">Saving changes</p>
                        <p class="text-center m-0">Please wait</p>
                        <div class="d-flex justify-content-center">

                            <div class="spinner-border text-danger" role="status">

                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
    <script src="javascript/patient.js"></script>
</body>

</html>
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
                <?php
                $patientId = $_GET["patientId"];
                include_once '../classes/patient.class.php';
                $patient_obj = new Patient();
                $patient = $patient_obj->getPatientById($patientId);
                ?>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Appoinment</h1>

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"> <a href="patients"> List of Patient </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Patient View</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <i class="fas fa-users"></i> Patient
                                    </div>
                                    <div class="col  ">
                                        <a href="patientFile/<?php echo $patientId?>" class="float-end" target="_blank">
                                            <button type="button" class="btn btn-dark btn-sm w-auto px-4"><i class="fa fa-print" aria-hidden="true"></i> View File</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <!-- patient info  -->
                                    <div class="col  ">
                                        <div class="container">
                                            <dl class="row">
                                                <dt class="col-sm-3">Patient ID:</dt>
                                                <dd class="col-sm-9">
                                                    <?php
                                                    echo $patientId;
                                                    ?></dd>

                                                <dt class="col-sm-3">Name:</dt>
                                                <dd class="col-sm-9">
                                                    <?php
                                                    echo $patient["Name"];
                                                    ?></dd>

                                                <dt class="col-sm-3">Nickname:</dt>
                                                <dd class="col-sm-9">
                                                    <?php
                                                    echo $patient["Nickname"];
                                                    ?></dd>

                                                <dt class="col-sm-3">Birthday:</dt>
                                                <dd class="col-sm-9">
                                                    <?php
                                                    $bday = date_create($patient["Birthday"]);
                                                    echo date_format($bday, "M d, Y");
                                                    ?></dd>

                                                <dt class="col-sm-3">Age:</dt>
                                                <dd class="col-sm-9">
                                                    <?php
                                                    echo $patient["Age"];
                                                    ?></dd>

                                                <dt class="col-sm-3">Gender:</dt>
                                                <dd class="col-sm-9">
                                                    <?php
                                                    echo $patient["Gender"];
                                                    ?></dd>

                                                <dt class="col-sm-3">Civil Status:</dt>
                                                <dd class="col-sm-9">
                                                    <?php
                                                    echo $patient["Civil_Status"];
                                                    ?></dd>

                                                <dt class="col-sm-3">Address:</dt>
                                                <dd class="col-sm-9">
                                                    <?php
                                                    echo $patient["Address"];
                                                    ?></dd>

                                                <dt class="col-sm-3">Email:</dt>
                                                <dd class="col-sm-9">
                                                    <?php
                                                    echo $patient["Email"];
                                                    ?></dd>

                                                <dt class="col-sm-3">Contact:</dt>
                                                <dd class="col-sm-9">
                                                    <?php
                                                    echo $patient["Contact"];
                                                    ?></dd>



                                                <dt class="col-sm-3">Date Created:</dt>
                                                <dd class="col-sm-9">
                                                    <?php
                                                    $dateCreated = date_create($patient["Date_Created"]);
                                                    echo date_format($dateCreated, "M d, Y ");
                                                    ?></dd>
                                            </dl>
                                        </div>
                                    </div>
                                    <!-- patient notes  -->
                                    <div class="col-md-5">
                                        <p class="h5">Patient Note</p>
                                        <?php

                                        $patient_notes = $patient_obj->getPatientNote($_GET["patientId"]);

                                        foreach ($patient_notes as $note) {
                                            $note_body = $note["Note"];
                                            $note_id = $note["Note_Id"];

                                            echo <<<NOTE
                                                    <div class="row border border-warning mb-2 position-relative ">
                                                        <button class="btn btn-danger btn-sm rounded-pill position-absolute top-0 end-0 w-auto btnDeleteNote"  type="button" value="$note_id">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>
                                                        <textarea class="form-control border border-light thisNote" rows="4" >$note_body</textarea>
                                                        <div class="d-grid gap-2 d-md-flex d-sm-flex justify-content-sm-end my-2">
                                                            <button class="btn btn-info  btn-sm rounded-pill btnSaveNote" type="button" value="$note_id">Save Changes</button>
                                                        </div>
                                                    </div>
                                                NOTE;
                                        }

                                        ?>

                                        <div class="row border border-warning position-relative">
                                            <textarea class="form-control border border-light areaNewNote" rows="4" id="service_description" placeholder="Insert new notes here"></textarea>
                                            <div class="d-grid gap-2 d-md-flex d-sm-flex justify-content-sm-end mt-2">
                                                <button class="btn btn-warning btn-sm rounded-pill btnNewNote" type="button" value="<?php echo $_GET["patientId"]; ?>">Add this note</button>
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
    <script src="js/patientView.js"></script>

</body>

</html>
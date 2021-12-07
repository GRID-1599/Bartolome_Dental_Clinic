<?php session_start();
include '../classes/Patient.class.php';
$patient = new Patient();
if (isset($_POST["ptName"])) {
    $ptName = $_POST["ptName"];
    if (!empty($ptName)) {
        $ptNickname = $_POST["ptNickname"];
        $ptBday = $_POST["ptBday"];
        $ptAge = $_POST["ptAge"];
        $ptGender = $_POST["ptGender"];
        $ptCivilStatus = $_POST["ptCivilStatus"];
        $ptAddress = $_POST["ptAddress"];
        $ptEmail = $_POST["ptEmail"];
        $ptContact = $_POST["ptContact"];
        $currentDate = new DateTime();
        $Date_Created = $currentDate->format('Y-m-d');

        $patient->addNewPatient(
            $ptName,
            $ptNickname,
            $ptBday,
            $ptAge,
            $ptGender,
            $ptCivilStatus,
            $ptAddress,
            $ptEmail,
            $ptContact,
            $Date_Created
        );
        unset($_POST);
        // header("Location: ".$_SERVER['PHP_SELF']);
        // echo header("Location : patients");
    }
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
                    <h1 class="mt-4">Clinic Patients</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">List of Patients</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <i class="fas fa-table me-1"></i> Patients Table
                                    </div>
                                    <div class="col align-self-end">
                                        <button type="button" class="btn btn-primary btn-sm w-auto float-end mx-2" data-bs-toggle="modal" data-bs-target="#addPatientModal">
                                            <i class="fa fa-plus"></i>
                                            Add Patient
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php include 'patientTable.php' ?>
                        </div>
                    </div>

                    <!-- MODAL  -->
                    <div class="modal fade" id="addPatientModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Adding Patient </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row g-3 needs-validation" action="patients" method="post" novalidate>
                                        <div class="col-md-7">
                                            <label for="ptName" class="form-label">Patient Name</label>
                                            <input type="text" class="form-control" id="ptName" name="ptName" required>

                                        </div>
                                        <div class="col-md-5">
                                            <label for="ptNickname" class="form-label">Nickname</label>
                                            <input type="text" class="form-control" id="ptNickname" name="ptNickname" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustomUsername" class="form-label">Birthday</label>
                                            <div class="input-group has-validation">
                                                <input type="date" class="form-control" id="ptBday" name="ptBday" aria-describedby="ptBday" required>
                                                <div class="invalid-feedback">
                                                    No date selected
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="ptAge" class="form-label">Age</label>
                                            <input type="number" class="form-control" id="ptAge" name="ptAge" max="99" min='1' required>

                                        </div>
                                        <div class="col-md-3">
                                            <label for="ptGender" class="form-label">Gender</label>
                                            <select class="form-select" id="ptGender" name="ptGender" required>
                                                <option selected disabled value=""></option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Bigender">Bigender</option>
                                                <option value="Prefer not to say">Prefer not to say</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="ptCivilStatus" class="form-label">Civil Status</label>
                                            <select class="form-select" id="ptCivilStatus" name="ptCivilStatus" required>
                                                <option selected disabled value=""></option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="In a relationship">In a relationship</option>
                                                <option value="Engaged">Engaged</option>
                                                <option value="Widowed">Widowed</option>
                                                <option value="Seperated">Seperated</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="In a open relationship">In a open relationship</option>
                                                <option value="It's complicated">It's complicated</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="ptAddress" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="ptAddress" name="ptAddress" required>

                                        </div>
                                        <div class="col-md-7">
                                            <label for="ptEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="ptEmail" name="ptEmail" required>
                                            <div class="invalid-feedback">
                                                Invalid email
                                            </div>

                                        </div>
                                        <div class="col-md-5">
                                            <label for="ptContact" class="form-label">Contact</label>
                                            <input type="tel" class="form-control" id="ptContact" name="ptContact" placeholder="09*********" pattern="[0-9]{11}" value="09" required>
                                            <small>Format: 09*********</small>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary float-end" type="submit">Submit</button>
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
    <script src="js/patient.js"></script>
</body>

</html>
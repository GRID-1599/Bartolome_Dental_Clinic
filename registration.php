<?php

if (isset($_POST['registration'])) {
    include 'classes/patient.class.php';
    $testObj = new Patient();

    $Name = $_POST['regPatientName'];
    $Nickname = $_POST['regPatientNickname'];
    $Birthdate = new DateTime($_POST['regPatientBday']);
    $Birthday = $Birthdate->format('Y-m-d');
    $Age = $_POST['regPatientAge'];
    $Gender = $_POST['regPatientGender'];
    $Civil_Status =  $_POST['regPatientCivil'];
    $Address =  $_POST['regPatientAddress'];
    $Email  = $_POST['regPatientEmail'];
    $Contact = $_POST['regPatientContact'];
    //date Today
    $currentDate = new DateTime();
    $Date_Created = $currentDate->format('Y-m-d');

    $testObj->addNewPatient($Name, $Nickname, $Birthday, $Age, $Gender, $Civil_Status, $Address, $Email, $Contact, $Date_Created);

    $patient_id  = $testObj->getPatientIdByName($Name, $Birthday);
    $responseData[] = array("name" => $Name, "patient_id" => $patient_id, "email" => $Email);
    exit(json_encode($responseData));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration | Bartolome Dental Clinic</title>

    <?php include_once('font_links.php') ?>
    <link rel="stylesheet" href="sweetalert2/sweetalert2.min.css">
    <link href="styles/bootstap_css/styles.css" rel="stylesheet" />
    <link href="styles/style.css" rel="stylesheet" />
</head>

<body class="bg_image">
    
    <?php include('header.php') ?> 


    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <div class="content col-lg-7 bg-white border ">
                <div class="text-2 display-6 pb-4">New Patient Registration</div>
                <div class='form-box '>
                    <div class=" user-details ">
                        <div class="input-box">
                            <input type="text" name="regPatientName" id="regPatientName" required>
                            <div class="underline"></div>
                            <span class="details">Full Name</span>
                        </div>
                        <div class="input-box">
                            <input type="text" name="regPatientNickname" id="regPatientNickname" required>
                            <div class="underline"></div>
                            <span class="details">Nickname</span>
                        </div>
                        <div class="input-box">
                            <input type="date" name="regPatientBday" id="regPatientBday" required>
                            <div class="underline"></div>
                            <span class="details">Birthday</span>
                        </div>
                        <div class="input-box">
                            <input type="text" name="regPatientAge" id="regPatientAge" onkeypress="return onlyNumberKey(event)" required='required' maxlength="3">
                            <div class="underline"></div>
                            <span class="details">Age</span>
                        </div>
                        <div class="input-box">
                            <input type="text" name="regPatientGender" id="regPatientGender" required>
                            <div class="underline"></div>
                            <span class="details">Gender</span>
                            <div class="genderBox__container">
                                <div class="genderBox__options ">
                                    <input type="radio" class="radio" id="01" name="gender" />
                                    <label for="01">Male</label>
                                </div>
                                <div class="genderBox__options ">
                                    <input type="radio" class="radio" id="02" name="gender" />
                                    <label for="02">Female</label>
                                </div>
                                <div class="genderBox__options">
                                    <input type="radio" class="radio" id="03" name="gender" />
                                    <label for="03">Bigender</label>
                                </div>
                                <div class="genderBox__options">
                                    <input type="radio" class="radio" id="04" name="gender" />
                                    <label for="04">Transgender</label>
                                </div>
                                <div class="genderBox__options">
                                    <input type="radio" class="radio" id="05" name="gender" />
                                    <label for="05">Prefer not to say</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <input type="text" name="regPatientCivil" id="regPatientCivil" required>
                            <div class="underline"></div>
                            <span class="details">Civil Status</span>
                            <div class="civilBox__container">
                                <div class="civilBox__options ">
                                    <input type="radio" class="radio" id="c01" name="civil" />
                                    <label for="c01">Single</label>
                                </div>
                                <div class="civilBox__options ">
                                    <input type="radio" class="radio" id="c02" name="civil" />
                                    <label for="c02">Married</label>
                                </div>
                                <div class="civilBox__options">
                                    <input type="radio" class="radio" id="c03" name="civil" />
                                    <label for="c03">In a relationship</label>
                                </div>
                                <div class="civilBox__options">
                                    <input type="radio" class="radio" id="c04" name="civil" />
                                    <label for="c04">Engaged</label>
                                </div>
                                <div class="civilBox__options">
                                    <input type="radio" class="radio" id="c05" name="civil" />
                                    <label for="c05">Widowed</label>
                                </div>
                                <div class="civilBox__options">
                                    <input type="radio" class="radio" id="c06" name="civil" />
                                    <label for="c06">Seperated</label>
                                </div>
                                <div class="civilBox__options">
                                    <input type="radio" class="radio" id="c07" name="civil" />
                                    <label for="c07">Divorced</label>
                                </div>
                                <div class="civilBox__options">
                                    <input type="radio" class="radio" id="c08" name="civil" />
                                    <label for="c08">In a open relationship</label>
                                </div>
                                <div class="civilBox__options">
                                    <input type="radio" class="radio" id="c09" name="civil" />
                                    <label for="c09">It's complicated</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <input type="text" name="regPatientAddress" id="regPatientAddress" required>
                            <div class="underline"></div>
                            <span class="details">Address</span>
                        </div>
                        <div class="input-box">
                            <input type="text" name="regPatientEmail" id="regPatientEmail" required>
                            <div class="underline"></div>
                            <span class="details">Email</span>
                        </div>
                        <div class="input-box">
                            <input type="text" name="regPatientContact" id="regPatientContact" onkeypress="return onlyNumberKey(event)" required maxlength="10">
                            <div class="underline"></div>
                            <div class="addons">(+63)</div>
                            <span class="details">Contact Number</span>
                        </div>
                        <div class="input-box">
                            <input type="submit" name='regPatientSubmit' id="regPatientSubmit" value='Submit'>
                            <!-- <span class="details">Submit</span> -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Modal loader -->
            <div class="modal fade" id="modalLoader" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="clearfix">
                                Please wait...
                                <div class="spinner-border text-danger float-end" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="sweetalert2/sweetalert2.min.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
    <script src="./javascript/registration.js"></script>

</body>

</html>
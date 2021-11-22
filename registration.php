<?php

if (isset($_POST['registration'])) {
    // $console = "submitted";
    // $name = $_POST['regPatientName'];
    // $nickname = $_POST['regPatientNickname'];
    // $bday = $_POST['regPatientBday'];
    // $age = $_POST['regPatientAge'];
    // $gender = $_POST['regPatientGender'];
    // $civil = $_POST['regPatientCivil'];
    // $address = $_POST['regPatientAddress'];
    // $email = $_POST['regPatientEmail'];
    // $contact = $_POST['regPatientContact'];


    // include 'test.class.php';
    // include '../includes/classesFolder_autoIncludes.inc.php';
    include 'includes/autoIncludes.inc.php';
    $testObj = new Patient();
    // $testObj->getUser();

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
    // echo <<<_ALERT
    //     <script>
    //     swal({
    //                     title: "",
    //                     text: "Thank you for ordering\nto our fictional bookstore\n\nPlease wait for your order within 7-9 days",
    //                     icon: "success",
    //                 });
    //     </script>
    // _ALERT;
    //echo header("Location: index.php");
    // exec("")
    $patient_id  = $testObj->getPatientIdByName($Name, $Birthday); 
    $responseData[] = array("name"=>$Name, "patient_id"=>$patient_id ,"email"=>$Email); 
    exit(json_encode($responseData));
    // exit($patient_id);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('font_links.php') ?>

    <link rel="stylesheet" href="./styles/style.css">

    <script src="sweetalert/sweetalert.min.js"></script>
    <script src="sweetalert2/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2/sweetalert2.min.css">
    <title>Register | Bartolome Dental Clinic</title>
</head>

<body>
    <?php include('header.php') ?>

    <section class="registration">
        <div class="registration__cont">
            <div class="background">
                <div class="background__gradient"></div>
                <div class="background__txt">
                    <!-- <h1>Keep in Touch</h1>
                    <p>Feel free to contact us any time.<br>We will get back to you as soon as we can!</p> -->
                </div>

            </div>
            

            <div class="registrationForm">
                <div class="registration-txt"></div>
                <div class="registration-form">
                    <div class="container">
                        <div class="title">New Patient Registration</div>
                        <div class="content">
                            <div class='form-box'>
                                <div class="user-details">
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
                                                <label for="04">Neutrois</label>
                                            </div>
                                            <div class="genderBox__options">
                                                <input type="radio" class="radio" id="05" name="gender" />
                                                <label for="05">Intergender</label>
                                            </div>
                                            <div class="genderBox__options">
                                                <input type="radio" class="radio" id="06" name="gender" />
                                                <label for="06">Demiboy</label>
                                            </div>
                                            <div class="genderBox__options">
                                                <input type="radio" class="radio" id="07" name="gender" />
                                                <label for="07">Demigirl</label>
                                            </div>
                                            <div class="genderBox__options">
                                                <input type="radio" class="radio" id="08" name="gender" />
                                                <label for="08">Genderfluid</label>
                                            </div>
                                            <div class="genderBox__options">
                                                <input type="radio" class="radio" id="09" name="gender" />
                                                <label for="09">Transgender</label>
                                            </div>
                                            <div class="genderBox__options">
                                                <input type="radio" class="radio" id="10" name="gender" />
                                                <label for="10">Prefer not to say</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-box">
                                        <input type="text" name="regPatientCivil" id="regPatientCivil" required>
                                        <div class="underline"></div>
                                        <span class="details">Civil Status</span>
                                        <div class="civilBox__container">
                                            <div class="civilBox__options ">
                                                <input type="radio" class="radio" id="01" name="civil" />
                                                <label for="01">Single</label>
                                            </div>
                                            <div class="civilBox__options ">
                                                <input type="radio" class="radio" id="02" name="civil" />
                                                <label for="02">Married</label>
                                            </div>
                                            <div class="civilBox__options">
                                                <input type="radio" class="radio" id="03" name="civil" />
                                                <label for="03">In a relationship</label>
                                            </div>
                                            <div class="civilBox__options">
                                                <input type="radio" class="radio" id="03" name="civil" />
                                                <label for="03">Engaged</label>
                                            </div>
                                            <div class="civilBox__options">
                                                <input type="radio" class="radio" id="04" name="civil" />
                                                <label for="04">Widowed</label>
                                            </div>
                                            <div class="civilBox__options">
                                                <input type="radio" class="radio" id="05" name="civil" />
                                                <label for="05">Seperated</label>
                                            </div>
                                            <div class="civilBox__options">
                                                <input type="radio" class="radio" id="06" name="civil" />
                                                <label for="06">Divorced</label>
                                            </div>
                                            <div class="civilBox__options">
                                                <input type="radio" class="radio" id="07" name="civil" />
                                                <label for="07">In a open relationship</label>
                                            </div>
                                            <div class="civilBox__options">
                                                <input type="radio" class="radio" id="08" name="civil" />
                                                <label for="08">It's complicated</label>
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
                                        <input type="text" name="regPatientContact" id="regPatientContact" onkeypress="return onlyNumberKey(event)" required maxlength="11">
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
                    </div>
                </div>
            </div>
    </section>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./javascript/registration.js"></script>
    <?php include('footer.php') ?> 
</body>

</html>
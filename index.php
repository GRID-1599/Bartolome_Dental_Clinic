<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bartolome Dental Clinic</title>

    <?php include_once('font_links.php') ?>
    <link href="styles/bootstap_css/styles.css" rel="stylesheet" />
    <link href="styles/style.css" rel="stylesheet" />
</head>

<body>
    <?php $page = "home";
    include('header.php') ?>
    <main>
        <div class="card text-white p-0 banner">
            <div class="card-img-overlay container-xxl px-md-5   ">
                <div class="row row align-items-end h-100 ">
                    <div class="container">
                        <h1 class="m-0 banner-text pt-2">Healthy Teeth</h1>
                        <h1 class="m-0 banner-text text-2">Healthy Smile</h1>
                    </div>

                    <div class="col mb-2">
                        <p class="h5 m-0">New Patient?</p>
                        <a class="text-white" href="registration">Register Now</a>
                    </div>
                    <div class="col-md-7  ">
                        <div class="row  ">
                            <div class="col-auto ">
                                <p class="m-0"><small>Already have an appointment?</small></p>
                                <button class="btn btn-primary btn-sm" id="btnViewApp" data-bs-toggle="modal" data-bs-target="#modalInputs">View appointment</button>
                            </div>
                            <div class="col ">
                                <a type="button" class="btn btn-primary w-100 h-100 btn-lg  text-center p-2 " id="btnBookAppointment"> <strong>Book Appointment </strong></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xxl dentalInfo mt-3 px-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <p class="text-header">Welcome to Bartolome Dental!</p>
                    <p class="line-1">
                        Bartolome Dental Clinic offers a wide range of specialized dental care services, all conveniently located at one location in a new, state-of-the-art facility with additional treatment options to suit your smile. Our top objective is to provide the greatestlevel of evidence-based dental care, as well as healthy teeth and a happy smile.<br><br>Bartolome Dental Clinic has a comprehensive solution for all of your dental needs, and we assure you that we will strive to provide you and all of our patients with a happy, comfortable experience during their treatment.
                    </p>
                </div>
                <div class="col-md-5">
                    <div class="container">
                        <img src="resources/images/dental-5.png" class="img-fluid" style="min-height: 20rem; height:auto;" alt="">
                    </div>

                </div>
            </div>
        </div>

        <div class="container-xxl mt-3 px-4">
            <div class="row justify-content-center">
                <div class="col-md-5 pt-5">
                    <img src="resources/images/clinic_station.jpg" class="img-fluid rounded" style="max-height: 25rem ;" alt="...">
                </div>
                <div class="col-md-6">
                    <p class="text-header">Why choose Us?</p>
                    <p class="line-1">
                        From the minute you walk into our clinic, you can be assured that you made that right choice in choosing us. Not only do we have the expertise and affordability in the dental services we offer, our patients frequently comment on our pleasant service that gives them a refreshingly easy experience.
                        <br><br>
                        When you meet our friendly, highly experienced dentist, she can put you at ease and any fear you have of dentists will be gone. We’ll make sure you are properly diagnosed and well informed so you can be assured that your needs and expectations are being met. This is just one of the many reasons patients put their trust in us.
                        <br><br>
                        Here at Bartolome Dental Clinic, we have combined old-fashioned care with advanced dental technology and techniques to provide you and your family with the best dental treatment available at Malolos, Bulacan. Our dental services will leave you with a smile on your face.
                    </p>
                </div>

            </div>
        </div>

        <div class="container-xxl mt-3 mb-5 px-4">
            <div class="row justify-content-center g-3">
                <div class="col-lg-6">
                    <div class="card px-3 border-0">
                        <div class="card-body text-center ">
                            <p class="card-title h4">Commitment and Care</p>
                            <p class="card-text ps-2">From the front desk to the exam room, our practice is staffed by dentists who are dedicated to your oral health. We are able to provide top-notch care by utilizing the equipment. As you enter our dental clinic, you will notice how clean, comfy, and sanitized everything is. Our top goal is to keep you safe and comfortable.</p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card px-3 border-0">
                        <div class="card-body text-center ">
                            <p class="card-title h4">Honesty and Affordability</p>
                            <p class="card-text ps-2">We understand how confusing healthcare costs can be. We provide you with up-front cost information on your treatment in addition to a wide range of payment choices to match your budget. We would gladly assist you in navigating your dental insurance and other payment options.</p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card px-3 border-0">
                        <div class="card-body text-center ">
                            <p class="card-title h4">Dental care and information are easily accessible.</p>
                            <p class="card-text ps-2">We understand how essential your time is, which is why we provide dental appointment reminders and a quick response time to calls and appointment requests. Any queries or concerns can be addressed in person, over the phone, or via email.</p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card px-3 border-0">
                        <div class="card-body text-center ">
                            <p class="card-title h4">Comfort</p>
                            <p class="card-text ps-2">We respect and understand that many patients experience dental fear/anxiety. At our dental clinic, we do everything we can to ensure that your visit is as pleasant as possible. We are often able to lessen dental fear by describing clearly what to expect during your treatment. During your treatment, we have a television and a music player to help you relax.</p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card px-3 border-0">
                        <div class="card-body text-center ">
                            <p class="card-title h4">Personalized Service</p>
                            <p class="card-text ps-2">You aren't just a patient at our dental clinic. We care about you and your dental health needs. During your visit, we think you'll find a friend in your dental professional!</p>

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="container-xxl mt-5 px-4 ">
            <p class="text-header text-center">Services Offered</p>
            <div class="row justify-content-center service ">

                <?php
                include 'classes/serviceCategory.class.php';
                $serviceCategory = new serviceCategory();
                $serviceCategories = $serviceCategory->getAllServicesCategory();

                foreach ($serviceCategories as $entry) {
                    $serviceCategory_Name = $entry["Name"];
                    $serviceCategory_FileName = (strcmp($entry["ImgFileName"], "") != 0) ? $entry["ImgFileName"] : "dentistBG";;
                    // $imagePath = "resources/Dental_Pics/ALL_CATEGORIES/". $serviceCategory_FileName.".jpeg";

                    echo <<<SERVICES_BOX
                            <a href="service/$serviceCategory_Name" class="service__box mb-2 col-lg-4">
                                <div class="service__img">
                                    <img src="resources/Dental_Pics/ALL_CATEGORIES/$serviceCategory_FileName.jpg" alt="$serviceCategory_FileName">
                                </div>
                                <div class="service__title">
                                    <p class="text-truncate">$serviceCategory_Name</p>
                                </div>
                             </a>    
                    SERVICES_BOX;
                }
                ?>


            </div>

        </div>

        <div class="container-xxl mt-5 px-4">
            <div class="row">
                <div class="col-md-8 pb-3" style="min-height: 25rem;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3856.6956766118165!2d120.84433771484316!3d14.84232828964889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339653fafe0843b5%3A0x6a774ff99d0d60ba!2sBartolome%20Dental%20Clinic!5e0!3m2!1sen!2sph!4v1632594667618!5m2!1sen!2sph" width="100%" height="100%" style="border:0; " allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-md-4">
                    <h1>Office Hours</h1>
                    <div class="row">
                        <div class="col-6">
                            <p>Monday</p>
                            <p>Tuesday</p>
                            <p>Wednesday</p>
                            <p>Thursday</p>
                            <p>Friday</p>
                            <p>Saturday</p>
                        </div>

                        <div class="col-6">
                            <p>9:00am to 5:00pm </p>
                            <p>9:00am to 5:00pm </p>
                            <p>9:00am to 5:00pm </p>
                            <p>9:00am to 5:00pm </p>
                            <p>9:00am to 5:00pm </p>
                            <p>9:00am to 5:00pm </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>


        <!-- Modal app inputs-->
        <div class="modal fade" id="modalInputs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="staticBackdropLabel">View Appointment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col px-5 position-relative">
                                <div class="form-floating mb-3 text-center">
                                    <input type="text" class="form-control" id="viewAppId" placeholder="Enter appointment id" maxlength="15">
                                    <label for="viewAppId">Please enter the Appoinment Id</label>
                                    <div class="invalid-feedback">
                                        Appointment Id not found
                                    </div>
                                    <p class="text-xsm text-start mt-3">Note : If you dont remember the appointment id. Please check your emails theres a copy of appointment details that has been sent by bartolome.dentalclinic@gmail.com</p>
                                    <div class="text-center mt-2 unShow position-absolute top-50 start-50" id="loaderApp">
                                        <div class="spinner-border text-danger" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="displa-6 text-center">Or</p>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col d-flex justify-content-center">
                                <button class="btn btn-primary btn-sm" id="btnViewPatient">View my patient details</button>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary unShow" id="btnAppProceed">Proceed</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal pateint inputs-->
        <div class="modal fade" id="modalPatientInputs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="staticBackdropLabel">View Patient Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col px-5 position-relative">
                                <div class="form-floating mb-3 text-center">
                                    <input type="text" class="form-control" id="viewPatientId" placeholder="Enter patient id" maxlength="4">
                                    <label for="viewPatientId">Please enter the Patient Id</label>
                                    <div class="invalid-feedback">
                                        Patient Id not found
                                    </div>
                                    <div class="valid-feedback" id="patientIdName"></div>
                                    <div class="text-center mt-2 unShow position-absolute top-50 start-50" id="loaderPatient">
                                        <div class="spinner-border text-danger" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary unShow" id="btnIdSubmit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- hiddden form para sa patient ID POST Submit -->
        <form style="display: none" action="patient" method="POST" id="formPatientID">
            <input type="hidden" id="formInputPatientId" name="patientId" value="" />
        </form>


    </main>
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
    <script src="javascript/index.js"></script>
</body>

</html>
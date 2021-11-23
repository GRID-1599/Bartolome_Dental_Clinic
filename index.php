<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include_once('font_links.php') ?>
    <link rel="stylesheet" href="./styles/style.css">
    <title>Bartolome Dental Clinic</title>

</head>

<body>

    <!-- <header class="header ">
        <nav class="flex flex-jc-sb flex-ai-c">
            <a href="./index.php" class="header__logo">
                <img src="resources/icons/icon1.png" alt="Bartolome Dental Clinic">
            </a>

            <div class="header__links">
                <a href="" class="active">Home</a>
                <a href="./service.php">Service</a>
                <a href="./about.php">About Us</a>
            </div>
        </nav>


    </header> -->

    <?php $page = "home";
    include('header.php') ?>


    <div class="banner">

        <div class="banner__cont">
            <div class="header__slogan">
                <h1 class="slogan--1">Healthy Teeth,</h1>
                <h1 class="slogan--2">Healthy Smiles</h1>
            </div>
        </div>
        <div class="register_cont">
            <h3>New Patient?</h3>
            <a href="registration">Register Now</a>
        </div>
        <div class="bookAppointment">
            <a href="bookNow" class="bookAppointmentNow">Book Appointment</a>
            <a href="">View my appointment</a>
        </div>

    </div>




    <section class="hpClinicInfo">
        <div class="hpClinicInfo__cont">
            <div class="hpClinicInfo__txt">
                <h1>Welcome to Bartolome Dental!</h1>
                <p>
                    Bartolome Dental Clinic offers a wide range of specialized dental care services, all conveniently located at one location in a new, state-of-the-art facility with additional treatment options to suit your smile. Our top objective is to provide the greatest
                    level of evidence-based dental care, as well as healthy teeth and a happy smile.
                    <br>Bartolome Dental Clinic has a comprehensive solution for all of your dental needs, and we assure you that we will strive to provide you and all of our patients with a happy, comfortable experience during their treatment.
                </p>
            </div>


            <div class="hpClinicInfo__img">
                <div class="img3">
                    <img src="resources/icons/block_box.png" alt="">
                </div>
                <div class="img1">
                    <img src="resources/images/120423691_2215125041964899_2238336428774706707_n.jpg" alt="">
                </div>
                <div class="img2">
                    <img src="resources/icons/tooth_icon.png" alt="">
                </div>


            </div>
        </div>
    </section>

    <section class="hpChooseUs">
        <div class="hpChooseUs__cont">
            <div class="hpChooseUs__top">
                <div class="imgCont">
                    <img src="resources/images/clinic_station.jpg" alt="">
                </div>
                <div class="txtCont">
                    <h1>Why choose Us?</h1>
                    <p>
                        From the minute you walk into our dentist, you’ll realize why you choose us-not only do we have the expertise and affordable services to meet your dental needs, our patients frequently comment on how pleasant our dental clinic is, offering a refreshingly easy experience. <br><br>
                        When you meet our friendly, highly experienced dentist, any fear of dentists will be gone. We'll make sure you're properly diagnosed and informed so you can be assured that your needs are being met, and this is just one of the many reasons our patients put their trust in us. <br><br>
                        Here at Bartolome Dental Clinic, have combined old-fashioned care with advanced dental technology and techniques to provide you and your family with the best dental treatment available at Malolos, Bulacan. Our dental services will leave you with a smile on your face.
                    </p>
                </div>
            </div>

            <div class="hpChooseUs__bottom">
                <div class="othertxtBox">
                    <h3>Commitment and Care</h3>
                    <p>
                        From the front desk to the exam room, our practice is staffed by dentists who are dedicated to your oral health. We are able to provide top-notch care by utilizing the equipment. As you enter our dental clinic, you will notice how clean, comfy, and sanitized everything is. Our top goal is to keep you safe and comfortable.
                    </p>
                </div>
                <div class="othertxtBox">
                    <h3>Honesty and Affordability </h3>
                    <p>
                        We understand how confusing healthcare costs can be. We provide you with up-front cost information on your treatment in addition to a wide range of payment choices to match your budget. We would gladly assist you in navigating your dental insurance and other payment options.
                    </p>
                </div>
                <div class="othertxtBox">
                    <h3>Dental care and information are easily accessible.</h3>
                    <p>
                        We understand how essential your time is, which is why we provide dental appointment reminders and a quick response time to calls and appointment requests. Any queries or concerns can be addressed in person, over the phone, or via email.
                    </p>
                </div>
                <div class="othertxtBox">
                    <h3>Comfort</h3>
                    <p>
                        We respect and understand that many patients experience dental fear/anxiety. At our dental clinic, we do everything we can to ensure that your visit is as pleasant as possible. We are often able to lessen dental fear by describing clearly what to expect during your treatment. During your treatment, we have a television and a music player to help you relax.
                    </p>
                </div>
                <div class="othertxtBox">
                    <h3>Personalized Service</h3>
                    <p>
                        You aren't just a patient at our dental clinic. We care about you and your dental health needs. During your visit, we think you'll find a friend in your dental professional!
                    </p>
                </div>
            </div>
        </div>


    </section>

    <section class="hpServices">

        <div class="hpServices__cont">
            <h1>Services Offered</h1>
            <div class="service">

                <?php
                include 'classes/serviceCategory.class.php';
                $serviceCategory = new serviceCategory();
                $serviceCategories = $serviceCategory->getAllServicesCategory();

                foreach ($serviceCategories as $entry) {
                    $serviceCategory_Name = $entry["Name"];
                    $serviceCategory_FileName = (strcmp($entry["ImgFileName"], "") != 0) ? $entry["ImgFileName"] : "dentistBG";;
                    // $imagePath = "resources/Dental_Pics/ALL_CATEGORIES/". $serviceCategory_FileName.".jpeg";

                    echo <<<SERVICES_BOX
                            <a href="service/$serviceCategory_Name" class="service__box">
                                <div class="service__img">
                                    <img src="resources/Dental_Pics/ALL_CATEGORIES/$serviceCategory_FileName.jpg" alt="$serviceCategory_FileName">
                                </div>
                                <div class="service__imgBg"></div>
                                <div class="service__title">
                                    <p>$serviceCategory_Name</p>
                                </div>
                             </a>    
                    SERVICES_BOX;
                }
                ?>

            </div>
        </div>
    </section>

    <section class="hpAbouts">
        <div class="hpAbouts__cont">
            <div class="info">
                <div class="info__map">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3856.6956766118165!2d120.84433771484316!3d14.84232828964889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339653fafe0843b5%3A0x6a774ff99d0d60ba!2sBartolome%20Dental%20Clinic!5e0!3m2!1sen!2sph!4v1632594667618!5m2!1sen!2sph" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe></iframe>
                    </div>
                </div>

            </div>
            <!-- <div class="address">
                <h3>Calle Gipit, Brgy San Pablo 3000 Malolos, Bulacan</h3>
            </div> -->
            
            <div class="officeHours">
                <h1>Office Hours</h1>
                <div class="officeWeek">
                    <div class="day">
                        <p>Monday</p>
                        <p>Tuesday</p>
                        <p>Wednesday</p>
                        <p>Thursday</p>
                        <p>Friday</p>
                        <p>Saturday</p>
                    </div>

                    <div class="hour">
                        <p>9:00am to 5:00pm </p>
                        <p>9:00am to 5:00pm </p>
                        <p>9:00am to 5:00pm </p>
                        <p>9:00am to 5:00pm </p>
                        <p>9:00am to 5:00pm </p>
                        <p>9:00am to 6:00pm </p>
                    </div>
                </div>

            </div>


        </div>
    </section>

    <?php include('footer.php') ?>

</body>

</html>
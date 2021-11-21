<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include_once('font_links.php') ?>

    <link rel="stylesheet" href="./styles/style.css">
    <title>About Us | Bartolome Dental Clinic</title>

</head>

<body>
<?php $page = "about";  include('header.php') ?>


    <section class="clinicInfo">
        <div class="clinicInfo__cont">


            <div class="clinicInfo__text">
                <h1>Dental Clinic</h1>
                <p>Since our inception in 2017, we have created over 2000 smiles and we are looking forward to bringing even more to everyone. Check out our dental clinic in Malolos Bulacan.</p>

                <div class="clinic-images">
                    <img src="resources/clinicImages/202140983_283934543417545_3006279947607334212_n.jpg" alt="">
                    <img src="resources/clinicImages/202606369_593120961673214_1558933043336077717_n.jpg" alt="">
                    <img src="resources/clinicImages/205281520_1466156740384383_2726338061719612470_n.jpg" alt="">
                    <img src="resources/clinicImages/207352204_334240251525326_7475638748695024717_n.jpg" alt="">
                    <div class="imgBg1"></div>
                </div>
            </div>
            <div class="clinicInfo__image">
                <div class="background"></div>
                <div id="slider">
                    
                    <figure>
                        <img src="resources/images/120423691_2215125041964899_2238336428774706707_n.jpg" alt="">
                        <img src="resources/images/120589084_2215125081964895_2536350470340704381_n.jpg" alt="">
                        <img src="resources/images/120770599_2215124871964916_6534420109982184615_n.jpg" alt="">
                        <img src="resources/images/120820190_2215124955298241_3255555329355204296_n.jpg" alt="">
                    </figure>
                </div>
                
            </div>
        </div>
    </section>

    <section class="dentistInfo">
        <div class="dentistInfo__cont">
            <span class="dentistInfo__image">
                <div class="img1">
                    <img src="resources/icons/block_box.png" alt="">
                </div>
                <div class="img2">
                    <img src="resources/images/hannaah.png" alt="Dr. Mirzi Leigh Hannah DC. Bartolome">
                </div>

            </span>

            <div class="dentistInfo__text">

                <h1 class="dentistInfo__text__name">Dr. Mirzi Leigh Hannah DC. Bartolome</h1>
                <h3>General Dentist</h3>
                <h3>Specialized in Orthodontist</h3>
                <p>Our Founder, Dr. Bartolome, has spent the last five years educating her patients about the importance of dental health. And how the health of your mouth, teeth, and gums can affect your general health. Also, there's a connection between
                    the condition of your teeth and gums.</p>
            </div>
        </div>
    </section>

    <section class="otherInfo">
        <div class="otherInfo__cont">

            <div class="otherInfo__cont otherInfo__cont--1">

                <div class="box">

                    <div class="otherInfo__address">
                        <h3 class="otherInfo__title">Where to Find Us</h3>
                        <img src="resources/icons/address_icon.png" alt=""><br><br>
                        <h3>Visit Us</h3>
                        <a href="https://goo.gl/maps/u1NMVXMtfFro9HHg9" target="_blank">Calle Gipit, San Pablo 3000 Malolos</a>
                    </div>
                    <div class="otherInfo__map">
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3856.6956766118165!2d120.84433771484316!3d14.84232828964889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339653fafe0843b5%3A0x6a774ff99d0d60ba!2sBartolome%20Dental%20Clinic!5e0!3m2!1sen!2sph!4v1632594667618!5m2!1sen!2sph" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe></iframe>
                        </div>
                    </div>
                </div>


            </div>

            <div class="otherInfo__cont otherInfo__cont--2">
                <!-- <h3 class="otherInfo__title">Contact Us</h3> -->
                <div class="box">
                    <div class="otherInfo__contact">
                        <img src="resources/icons/contact_icon.png" alt="">
                        <h3>Call or Text Us</h3>
                        <p>Mobile #: 0922-396-4642</p>
                    </div>
                    <div class="otherInfo__email">
                        <img src="resources/icons/email_icon.png" alt="">
                        <h3>Email Us</h3>
                        <p>thepinkdmd@gmail.com</p>
                    </div>
                    <div class="otherInfo__media">
                        <img src="resources/icons/fb_icon.png" alt=""> <br>
                        <h3>Go to our FB page</h3>
                        <a href="http://www.facebook.com/BartolomeDental" target="_blank"> Bartolome Dental Clinic </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php include('footer.php') ?>
</body>

</html>
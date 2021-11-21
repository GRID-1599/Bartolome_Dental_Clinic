<footer class="footer">
    <div class="footer__cont">
        <!-- <img src="resources/icons/icon1.png" alt="Bartolome Dental Clinic">
            <p>Copyright 2021 Bartolome Dental Clinic</p> -->

        <div class="footer__quickLinks">
            <h3>Quick Links</h3>
            <div class="links">
                <a href="index">Home</a>
            </div>
            <div class=" links">
                <a href="service">Services</a>
            </div>
            <div class=" links">
                <a href="about">About Us</a>
            </div>
            <div class="links">
                <a href="contactUs">Contact Us</a>
            </div>
            <div class="links">
                <a href="bookNow">Book Now</a>
            </div>

        </div>
        <div class="footer__services">
            <h3>Services</h3>
            <?php
                include_once 'classes/serviceCategory.class.php';
                $serviceCategory = new serviceCategory();
                $serviceCategories = $serviceCategory->getAllServicesCategory();

                foreach ($serviceCategories as $entry) {
                    $serviceCategory_Name = $entry["Name"];
                    echo '<a href="service/'.$serviceCategory_Name.'"> '.$serviceCategory_Name.'</a><br>';
                }
               
            ?>
        </div>
        <div class="footer__image">
            <a href="admin"><img src="resources/icons/icon1.png" alt="Bartolome Dental Clinic"></a>
            <h3>Bartolome Dental Clinic, Copyright 2021 </h3>
        </div>

        <div class="footer__contact">
            <h3>Contact Us:</h3>
            <div class="contactCont contactCont-link">
                <a href="http://www.facebook.com/BartolomeDental" target="_blank">http://www.facebook.com/BartolomeDental</a>

            </div>
            <div class="contactCont">
                <p>(+63) 922 396 4642</p>
            </div>
            <div class="contactCont">
                <p>thepinkdmd@gmail.com</p>
            </div>
            <br>
            <h3>Locate Us:</h3>
            <div class="contactCont contactCont-link">
                <a href="https://goo.gl/maps/u1NMVXMtfFro9HHg9" target="_blank">Calle Gipit, Brgy San Pablo 3000 Malolos, Bulacan</a>

            </div>
        </div>
    </div>
</footer>
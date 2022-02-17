<footer class="bd-footer pb-5 pt-5 mt-5 px-3 bg-pink">
    <div class="container-xxl  text-white">
        <div class="row">
            <div class="col-md-2  mt-3">
                <h3>Quick Links</h3>
                <ul class="list-unstyled " style="font-size: 1rem;">
                    <li><a href="">Home</a></li>
                    <li><a href="service">Services</a>
                    <li>
                    <li><a href="about">About Us</a></li>
                    <li><a href="contactUs">Contact Us</a></li>
                    <li><a href="bookNow">Book Now</a></li>
                </ul>
            </div>
            <div class="col-md-2  mt-3 mb-2">
                <h3>Services</h3>
                <?php
                include_once 'classes/serviceCategory.class.php';
                $serviceCategory = new serviceCategory();
                $serviceCategories = $serviceCategory->getAllServicesCategory();

                foreach ($serviceCategories as $entry) {
                    $serviceCategory_Name = $entry["Name"];
                    echo '<a href="service/' . $serviceCategory_Name . '" style="font-size: 1rem;"> ' . $serviceCategory_Name . '  </a><br>';
                }

                ?>
            </div>

            <div class="col-md-4 mt-3 order-md-5">
                <div class="row" >
                    <h3>Contact Us:</h3>
                    <dt class="col-1">
                        <i class="fa fa-facebook-official fa-lg" aria-hidden="true"></i>
                    </dt>
                    <dd class="col-11">
                        <a href="http://www.facebook.com/BartolomeDental" target="_blank" class="text-truncate" style="font-size: .90rem;"> http://www.facebook.com/BartolomeDental</a>
                    </dd>



                </div>

                <div class="row mt-3">
                    <dt class="col-1">
                        <i class="fa fa-phone fa-lg" aria-hidden="true"></i>
                    </dt>
                    <dd class="col-11">
                        <span class="mt-3 " style="font-size: .90rem;">(+63) 922 396 4642</span>
                    </dd>
                    <dt class="col-1">
                        <i class="fa fa-envelope fa-lg" aria-hidden="true"></i>
                    </dt>
                    <dd class="col-11">
                        <span style="font-size: .90rem;">thepinkdmd@gmail.com</span>
                    </dd>
                </div>

                <div class="row mt-3">
                    <h3>Locate Us:</h3>
                    <dt class="col-1 ">
                        <i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
                    </dt>
                    <dd class="col-11">
                        <a href="https://goo.gl/maps/u1NMVXMtfFro9HHg9" target="_blank" style="font-size: .90rem;">Calle Gipit, Brgy San Pablo 3000 Malolos, Bulacan</a>
                    </dd>

                </div>

            </div>

            <div class="col-md-4 mt-3 ">
                <div class="row justify-content-center">
                    <img src="resources/icons/LOGOV2.6.png" alt="Bartolome Dental Clinic" style="width: 350px; height: 150px;" class="mb-3" id="footerImage">
                    <p class="text-center h4">Bartolome Dental Clinic, Copyright 2021 </p>
                </div>
                <script>
                    $('#footerImage').click(function() {
                        window.location.href = "admin"
                    });
                </script>
            </div>
        </div>
</footer>
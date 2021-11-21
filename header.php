<!-- <section class="header-section"> -->

<?php
if (!isset($page)) {
    $page = "";
}
?>
<header class="<?php echo ($page == "home" ? "homepage" : "") ?>">

    <a class="logo" href="index" class="header__logo">
        <img src="resources/icons/LOGOV2.6.png" alt="Bartolome Dental Clinic">
    </a>
    <nav>
        <a href="index" class="<?php echo ($page == "home" ? "active" : "") ?>">
            Home
        </a>
        <a href="service" class="<?php echo ($page == "service" ? "active" : "") ?>">
            Service
        </a>
        <a href="about" class="<?php echo ($page == "about" ? "active" : "") ?>">
            About
        </a>
        <a href="contactUs" class="<?php echo ($page == "contactUs" ? "active" : "") ?>">
            Contact Us
        </a>
        <a href="bookNow" class="<?php echo ($page == "bookNow" ? "active" : "") ?>">
            Book Now
        </a>
    </nav>
</header>
<!-- </section> -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $(window).on('scroll', function() {
            if ($(window).scrollTop()) {
                $("header").addClass('bgc');
            } else {
                $("header").removeClass('bgc');
            }
        });

    });
</script>
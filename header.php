<!-- <section class="header-section"> -->

<?php
if (!isset($page)) {
    $page = "";
}
?>
<header>
    <nav class="navbar navbar-expand-md navbar-light bg-light rounded fixed-top bg-white  h6 " id="header">
        <div class="container-xxl">
            <a class="navbar-brand ps-3" href="" id="headerIcon"><img src="resources/icons/LOGOV2.6.png" class="img-fluid  borderless me-3" alt="Bartolome Dental Logo " style="width: 220px; height: auto; transition: 500ms;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-sm-end pe-3 " id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page == "home" ? "active" : "") ?>"  href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page == "service" ? "active" : "") ?>" href="service">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page == "about" ? "active" : "") ?>" href="about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page == "contactUs" ? "active" : "") ?>" href="contactUs">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page == "bookNow" ? "active" : "") ?>" href="bookNow">Book Now</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://www.facebook.com/BartolomeDental" target="_blank"  class="ps-2"><i class="fa fa-facebook-official fa-2x icon-pink" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- </section> -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js " integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin=" anonymous "></script>

<script>
    $(document).ready(function() {
        $(window).on('scroll', function() {
            if ($(window).scrollTop()) {
                $("#header ").addClass('shadow-sm');
                // $("#header ").removeClass('h6');
                
    
                var markup = '<img src="resources/icons/logov2.3.png" class="img-fluid borderless me-3 " alt="Bartolome Dental Logo " style="width: 250px; height: auto; transition: all 500ms ease-in-out; ">'
                $('#headerIcon').empty()
                $('#headerIcon').append(markup)

            } else {

                $("#header ").removeClass('shadow-sm');
                var markup = '<img src="resources/icons/LOGOV2.6.png" class="img-fluid borderless me-3 " alt="Bartolome Dental Logo " style="width: 220px; height: auto; transition: all 500ms ease-in-out; ">'

                // $("#header ").addClass('h6');
                $('#headerIcon').empty()
                $('#headerIcon').append(markup)



            }
        });

    });
</script>
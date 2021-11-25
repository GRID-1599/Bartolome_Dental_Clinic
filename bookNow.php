<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('font_links.php') ?>
    <script src="https://kit.fontawesome.com/4bb5a1c9ed.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./styles/bootstap_css/styles.css">
    <link rel="stylesheet" href="./styles/style.css">   
    <link rel="stylesheet" href="sweetalert2/sweetalert2.min.css">


    <title>Book Appointment | Bartolome Dental</title>
</head>

<body>
    <?php $page = "bookNow";
    include('header.php') ?>
    <section class="bookNow">

        <div class="bookNow__cont">
            <?php
            include 'bookAppointment.php';
            ?>
        </div>
    </section>
    <?php include('footer.php') ?>
    <script src="sweetalert2/sweetalert2.min.js"></script>

    <script src="javascript/bookingAppointment.js"></script>
</body>

</html>
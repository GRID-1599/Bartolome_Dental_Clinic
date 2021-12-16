<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('font_links.php') ?>
    
    <?php include_once('font_links.php') ?>
    <link rel="stylesheet" href="sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="styles/bootstap_css/styles.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Book Appointment | Bartolome Dental</title>

    <script src="https://kit.fontawesome.com/4bb5a1c9ed.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php $page = "bookNow";
    include('header.php') ?>
    <main>
        <div class="container-xxl mt-4 ">
            <?php
            include 'bookAppointment.php';
            ?>
        </div>
    </main>
    <?php include('footer.php') ?>
    <script src="sweetalert2/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="javascript/bookingAppointment.js"></script>
</body>

</html>
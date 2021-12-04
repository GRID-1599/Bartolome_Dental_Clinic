<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'html-head.php' ?>
    <link rel="stylesheet" href="styles/evo_calendar/evo-calendar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
</head>

<body class="sb-nav-fixed">
    <?php include 'nav_top.php' ?>
    <div id="layoutSidenav">
        <?php include 'nav_side.php' ?>

        <!-- pages main body -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Calendar</h1>
                    <!-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">List of Patients</li>
                    </ol> -->

                    <div class="row">
                        
                    </div>
                </div>
            </main>
            <?php include 'html-footer.php' ?>
        </div>
    </div>
    <?php include 'scripts.php' ?>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="js/evo-calendar.js"></script>
    <script>
        $(document).ready(function() {
            $('#calendar').evoCalendar({
                settingName: settingValue
            })
        }) -->
    </script>
</body>

</html>
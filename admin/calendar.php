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
                        <div class="container-fluid ">
                            <div class="calendar-select inputs form-inline">
                                <label class="lead mr-2 ml-3" for="year">Select year: </label><select class="form-control col-sm-4" name="year" id="year" onchange="jumpp()">
                                    <option value=2010>2010</option>
                                    <option value=2011>2011</option>
                                    <option value=2012>2012</option>
                                    <option value=2013>2013</option>
                                    <option value=2014>2014</option>
                                    <option value=2015>2015</option>
                                    <option value=2016>2016</option>
                                    <option value=2017>2017</option>
                                    <option value=2018>2018</option>
                                    <option value=2019>2019</option>
                                    <option value=2020>2020</option>
                                    <option value=2021>2021</option>
                                    <option value=2022>2022</option>
                                    <option value=2023>2023</option>
                                    <option value=2024>2024</option>
                                    <option value=2025>2025</option>
                                    <option value=2026>2026</option>
                                    <option value=2027>2027</option>
                                    <option value=2028>2028</option>
                                    <option value=2029>2029</option>
                                    <option value=2030>2030</option>
                                </select>
                                <label class="lead mr-2 ml-2" for="month">Jump To: </label>
                                <select class="form-control col-sm-3 " name="month" id="month" onchange="jumpp()">
                                    <option value=0>January</option>
                                    <option value=1>Febuary</option>
                                    <option value=2>March</option>
                                    <option value=3>April</option>
                                    <option value=4>May</option>
                                    <option value=5>June</option>
                                    <option value=6>July</option>
                                    <option value=7>August</option>
                                    <option value=8>September</option>
                                    <option value=9>October</option>
                                    <option value=10>November</option>
                                    <option value=11>December</option>
                                </select>
                            </div>
                            <div class="card">
                                <div class="tableHeader">
                                    <button class="btn-light lead " id="pre" type="button" onclick="preMonth()"><i class="fas fa-caret-left"></i> Previous</button>

                                    <h3 class="card-header display-6" id="todayMonthDate"></h3>

                                    <button class="btn-light lead " id="nex" type="button" onclick="nexMonth()">Next <i class="fas fa-caret-right"></i></button>
                                </div>
                                <table class="table  table-borderless" id="calendar">
                                    <thead>
                                        <tr >
                                            <th>Sun</th>
                                            <th>Mon</th>
                                            <th>Tue</th>
                                            <th>Wed</th>
                                            <th>Thu</th>
                                            <th>Fri</th>
                                            <th>Sat</th>
                                        </tr>
                                    </thead>
                                    <tbody id="calendarBody">
                                    </tbody>
                                </table>

                                <br />
                                <!-- <form class="form-inline">
                                    <button class="btn-outline-primary lead" id="pre" type="button" onclick="preMonth()"><i class="fas fa-caret-left"></i> Previous</button>
                                    <button class="btn-outline-primary lead " id="nex" type="button" onclick="nexMonth()">Next <i class="fas fa-caret-right"></i></button>
                                </form> -->
                            </div>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                        <script src="js/calendar.js"></script>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                        </script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js">
                        </script>
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                        </script>
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
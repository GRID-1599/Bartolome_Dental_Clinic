<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'html-head.php' ?>
</head>

<body class="sb-nav-fixed">
    <?php include 'nav_top.php' ?>
    <div id="layoutSidenav">
        <?php include 'nav_side.php' ?>

        <!-- pages main body -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Activity Log</h1>
                    <ol class="breadcrumb mb-4">
                        <!-- <li class="breadcrumb-item active" aria-current="page">List of Archived Appoinment</li> -->
                    </ol>
                    <div class="container mb-3">
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-warning btn-sm float-end" id="btnCleanLog">
                                    <i class="fa fa-trash me-2 " aria-hidden="true"></i>
                                    Clean Activity Log
                                </button>
                            </div>
                        </div>
                    </div>



                    <div class="card mb-4">
                        <div class="card-body">
                            <?php
                            include_once '../classes/activityLog.class.php';
                            $log_obj = new ActivityLog();
                            $stmt_log = $log_obj->getAllActivityLog();
                            // echo json_encode($patients);
                            ?>


                            <table class="datatablesSimple " id="tblActivityLog">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Datetime</th>
                                        <th>Admin</th>
                                        <th>Action</th>
                                        <th style="min-width: 25rem;">Activity</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Datetime</th>
                                        <th>Admin</th>
                                        <th>Action</th>
                                        <th style="min-width: 25rem;">Activity</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    while ($row = $stmt_log->fetch()) {
                                        $dateTimeHappen = date_create($row["DateTime_Happen"]);
                                        $row = "<tr class='appointmentRow' data-bs-toggle='tooltip' data-bs-placement='bottom' " .
                                            "title='Click to view'>" .
                                            "<td>" . $row["ActLog_Id"] . "</td>" .
                                            "<td>" . date_format($dateTimeHappen, "M d, Y h:ia ") . "</td>" .
                                            "<td>" . $row["Admin"] . "</td>" .
                                            "<td>" . $row["Action"] . "</td>" .
                                            "<td>" . $row["Activity"] . "</td>" .
                                            "</tr>";
                                        echo $row;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </main>
            <?php include 'html-footer.php' ?>
        </div>
    </div>
    <?php include 'scripts.php' ?>
    <script>
        $(document).ready(function() {
            $('#btnCleanLog').click(function() {
                if (confirm("Clean Activity Log? ")) {
                    cleanLog()
                }
            });
        });

        function cleanLog() {
            var theURL = '../ajaxRequest/activityLog.ajax.php';

            $.ajax({
                url: theURL,
                type: 'post',
                data: {
                    cleanLog: 1
                },
                success: function(response) {
                    // response = JSON.stringify(response);
                    // $("#serviceDelete").modal("hide");
                    // alert(response);
                    // window.location.href = "appointment";
                    location.reload()
                    console.log(response);
                },
                error: function(jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    console.log(msg);
                },

            });
        }
    </script>

</body>

</html>
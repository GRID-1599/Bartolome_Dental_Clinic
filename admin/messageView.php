<?php session_start();
include_once '../classes/message.class.php';
$message_obj = new Message();
$message_data = $message_obj->getMessageById($_GET["messageId"]);

$from_name = (strcmp($message_data["From_Name"], "") != 0) ? $message_data["From_Name"] : "Anonymous";
$from_body = $message_data["Body"];
$Message_ID = $message_data["Message_ID"];
$from_phone = (strcmp($message_data["Phone"], "") != 0) ? $message_data["Phone"] : "";
$from_email =  (strcmp($message_data["Email"], "") != 0) ? $message_data["Email"] . "<br>" : "";

$send_TimeStamp = new DateTime($message_data["Date_Send"]);
$date_send = $send_TimeStamp->format('l, M d Y');
$time_send = $send_TimeStamp->format('g:ia');

$isReadClass = $message_data["IsRead"] ? "Read" : "Unread";

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
                    <h1 class="mt-4">Messages</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <a href="message">Messages List</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Message View</li>
                    </ol>

                    <div class="card">
                        <div class="card-header bg-white">
                            Message
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <p class="card-text"> From : <span class="fs-5"><?php echo $from_name; ?></span></p>
                            </h5>
                            <p class="text-sm-start"><?php echo $date_send . " " . $time_send; ?></p>
                            <br>
                            <p class="card-text"><?php echo $from_body ?></p>
                            <br><br>
                            <p class="fw-lighter" id="messageBodyEmail"><?php echo $from_email;  ?></p>
                            <p class="fw-lighter" id="messageBodyPhone"><?php echo $from_phone; ?></p>
                        </div>
                    </div>


                </div>
            </main>
            <?php include 'html-footer.php';

            $setMessageRead = $message_obj->setMessageRead($_GET["messageId"], 1);
            ?>
        </div>
    </div>
    <?php include 'scripts.php' ?>
    <script src="js/message.js"></script>
</body>

</html>
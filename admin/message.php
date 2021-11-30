<?php session_start();
include '../classes/Message.class.php';
$objMessage = new Message();
$unreadMessages = $objMessage->getUnreadMessage();
$unreadMessageNum = 0;
foreach ($unreadMessages as $unread) {
    $unreadMessageNum += 1;
}
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
                        <li class="breadcrumb-item active">Messages List</li>
                    </ol>
                    <a href="message/unread">
                        <button type="button" class="btn btn-info position-relative">
                            Unread Message
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php echo $unreadMessageNum; ?>
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>
                    </a>
                    <br>
                    <br>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-6">
                                <?php
                                $messages = $objMessage->getAllMessage();
                                foreach ($messages as $entry) {
                                    $from_name = (strcmp($entry["From_Name"], "") != 0) ? $entry["From_Name"] : "Anonymous";
                                    $from_body = $entry["Body"];
                                    $Message_ID = $entry["Message_ID"];
                                    $from_phone = (strcmp($entry["Phone"], "") != 0) ? $entry["Phone"] : "";
                                    $from_email =  (strcmp($entry["Email"], "") != 0) ? $entry["Email"] . "<br>" : "";

                                    // echo $from_email . "  " . $from_phone;

                                    $send_TimeStamp = new DateTime($entry["Date_Send"]);
                                    $date_send = $send_TimeStamp->format('D, M d Y');
                                    $time_send = $send_TimeStamp->format('g:ia');

                                    $isReadClass = $entry["IsRead"] ? "Read" : "Unread";
                                    echo <<<MESSAGE
                                                <div class="row p-3 mb-3 border rounded-3 $isReadClass message-wrapper" id="$Message_ID">
                                                <div class="col ">
                                                    <p class="card-text">From : <span class="fs-5"> $from_name </span></p>
                                                    <p class="card-text"><small class="text-muted">$date_send $time_send</small></p>
                                                </div>
                                                <div class="col-3 align-self-end text-end ">
                                                    <span class="badge p-2  text-secondary">$isReadClass</span>
                                                </div>
                                                </div>
                                        MESSAGE;
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include 'html-footer.php' ?>
        </div>
    </div>
    <?php include 'scripts.php' ?>
    <script src="js/message.js"></script>
</body>

</html>
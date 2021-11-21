<div class="row  message_cont">
    <?php
    include '../classes/Message.class.php';
    $objMessage = new Message();
    $messages = $objMessage->getAllMessage();
    foreach ($messages as $entry) {
        $from_name = $entry["From_Name"];
        $from_body = $entry["Body"];
        $from_phone = (strcmp($entry["Phone"],"") != 0) ? $entry["Phone"] : "";
        $from_email =  (strcmp($entry["Email"],"") != 0) ? $entry["Email"]."<br>" : "";

        // echo $from_email . "  " . $from_phone;

        $send_TimeStamp = new DateTime($entry["Date_Send"]);
        $date_send = $send_TimeStamp->format('D, M d Y');
        $time_send = $send_TimeStamp->format('g:ia');

        $isReadClass = $entry["IsRead"] ? "read" : "";
        echo <<<MESSAGE
                    <div class="col-sm-4">
                        <div class="card message-body $isReadClass">
                            <div class="card-body">
                                <h5 class="card-title"> From: $from_name</h5>
                                <p class="text-sm-start">$date_send<br>$time_send<br></p>
                                <p class="text-sm-start">Message:<br></p>
                                <p class="card-text">$from_body</p>
                                <p class="fw-lighter">$from_email  $from_phone</p>
                                <button class="btn btn-info"> Mark as Read </button>
                                <button class="btn btn-danger float-end"> Reply </button>
                            </div>
                        </div>
                    </div>
            MESSAGE;
    }
    ?>
</div>
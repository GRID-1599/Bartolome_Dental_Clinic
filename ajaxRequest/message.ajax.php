<?php
include '../classes/message.class.php';
$message_obj = new Message();
if (isset($_POST['message'])) {

    // $testObj->getUser();

    $Name = $_POST['msgName'];
    $Contact  = $_POST['msgContact'];
    $Email = $_POST['msgEmail'];
    $Body = $_POST['msgMessage'];
    //date Today
    $currentDate = new DateTime();
    $currentDate->setTimezone(new DateTimeZone('Asia/Manila'));
    $Date_Send = $currentDate->format('Y-m-d H:i:s');

    $message_obj->addMessage($Body, $Name, $Contact, $Email, $Date_Send);
    exit();
    // exit($patient_id);
}

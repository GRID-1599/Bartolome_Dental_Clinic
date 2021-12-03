<?php

if (isset($_POST["addNewAppointment"])) {
    include_once '../classes/appoinment.class.php';
    $currentDate = new DateTime();
    $currentDate->setTimezone(new DateTimeZone('Asia/Manila'));
    $DateCreated = $currentDate->format('Y-m-d H:i:s');
    $appoinment_obj = new Appointment();
    $appoinment_obj->addNewAppointment( 
        $_POST["appointmentId"],
        $_POST["patientID"],
        $_POST["patientContact"],
        $_POST["appointmentDate"],
        $_POST["appointmentStartTime"],
        $_POST["appointmentEndTime"],
        $_POST["appointmentTotalDuration"],
        $_POST["appointmentAllottedHours"],
        $DateCreated,
        $_POST["appointmentPaymentMethod"],
        $_POST["IsPaid"],
        $_POST["appointmentAmount"],
        $_POST["appointmentServices"]
    );

    // $appointmentServices = $_POST["appointmentServices"];
    // // echo "xxxx" .  $appointmentServices ;
    // // $foundjquery = "Not Found";
    // // if(in_array('jQuery', $appointmentServices)){
    // //     $foundjquery = "Found";
    // // }

    // $json = json_encode($appointmentServices);
    // echo $json . "<br>";
    // // echo count($appointmentServices) . "<br>";
    // foreach ($appointmentServices as $service) {
    //     $service = array_values($service);
    //     echo $service[0] . "<id>";
    //     echo $service[1] . "<name>";
    //     echo $service[2] . "<id>";
    // }

    echo "added";
}

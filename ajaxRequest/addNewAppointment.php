<?php

if (isset($_POST["addNewAppointment"])) {
    include_once '../classes/appoinment.class.php';
    $currentDate = new DateTime();
    $currentDate->setTimezone(new DateTimeZone('Asia/Manila'));
    $DateCreated = $currentDate->format('Y-m-d H:i:s');
    $appoinment_obj = new Appointment();
    // $appoinment_obj->addNewAppointment( 
    //     $_POST["appointmentId"],
    //     $_POST["patientID"],
    //     $_POST["patientContact"],
    //     $_POST["appointmentDate"],
    //     $_POST["appointmentTime"],
    //     $DateCreated,
    //     $_POST["appointmentPaymentMethod"],
    //     $_POST["IsPaid"],
    //     $_POST["appointmentAmount"],
    //     $_POST["appointmentServices"]
    // );

    $appointmentServices = $_POST["appointmentServices"];
    echo "xxxx" .  $appointmentServices ;
    echo count($appointmentServices) . "<br>";
    for ($x = 0; $x < count($appointmentServices); $x += 3) {
        // $stmt2->execute([$appointmentServices[$x],$appointmentServices[$x+1],$appointmentServices[$x+2]]);
        $id = $appointmentServices[$x];
        $name = $appointmentServices[$x + 1];
        $price = $appointmentServices[$x + 2];

        echo <<<tt
                 $id >>  $name >>  $price <br>
            tt;
    }

    echo "added";
}

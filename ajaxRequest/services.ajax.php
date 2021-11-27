<?php
include_once '../classes/service.class.php';
$service_obj = new Service();
if (isset($_POST["editService"])) {


    $serviceDataToEdit = $_POST["serviceToEdit"];
    // $serviceDataToEdit = '{"Name":"Gl Base1","Starting_Price":"2001","Availability":"0","Duration_Minutes":"1"}';
    // echo $serviceDataToEdit;
    $serviceDataToEdit  = json_decode("$serviceDataToEdit", true);

    $service_obj->editService($_POST["service_id"], $serviceDataToEdit);
    // $serviceDataToEdit    = json_decode("$serviceDataToEdit", true);
    // foreach ($serviceDataToEdit  as $key => $val) {
    //     echo "Key-value pair is: " . "(" . $key . ", " . $val . ")";
    //     echo "<br>";
    // }
}

// $serviceDataToEdit = '{"Availability":"0" , "Starting_Price":"670"}';
// echo $serviceDataToEdit . "<br>";

// $serviceDataToEdit  = json_decode("$serviceDataToEdit", true);
// // foreach ($serviceDataToEdit  as $key => $val) {
// //     echo "Key-value pair is: " . "(" . $key . ", " . $val . ")";
// //     echo "<br>";
// // }

// $service_obj->editService("S101", $serviceDataToEdit);

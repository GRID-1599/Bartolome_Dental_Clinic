<?php
include_once '../classes/service.class.php';
$service_obj = new Service();

// $serviceID = "";

if (isset($_POST["editService"])) {
    // $serviceID = $_POST["service_id"];
    $serviceDataToEdit = $_POST["serviceToEdit"];
    $serviceDataToEdit  = json_decode("$serviceDataToEdit", true);
    $service_obj->editService($_POST["service_id"], $serviceDataToEdit);
}

if (isset($_POST["editServiceImage"])) {
    echo $_POST["service_id"];
}

if (isset($_FILES['file']['name'])) {
    $filename = $_FILES['file']['name'];

    /* Location */
    $location = "../resources/Dental_Pics/SERVICE_IMAGES/" . $filename;
    $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);

    /* Valid extensions */
    $valid_extensions = array("jpg");

    /* Check file extension */
    if (in_array(strtolower($imageFileType), $valid_extensions)) {
        /* Upload file */
        if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
            $response = $location;
            $filename = substr($filename, 0, -4);
            $service_obj->changeServiceImage($_GET["serviceId"], $filename);
        }
    }else{
        echo "Error : Invalid File";
    }
}

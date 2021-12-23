<?php
include_once '../classes/service.class.php';
$service_obj = new Service();

include_once "../classes/activityLog.class.php";
$actLog_obj = new ActivityLog();

// $serviceID = "";

if (isset($_POST["editService"])) {
    // $serviceID = $_POST["service_id"];
    $serviceDataToEdit = $_POST["serviceToEdit"];
    $serviceDataToEdit  = json_decode("$serviceDataToEdit", true);
    $service_obj->editService($_POST["service_id"], $serviceDataToEdit);
    $actLog_obj->addNewLog('Edit', 'Service ' . $_POST["service_id"] . ' edited');
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
            $actLog_obj->addNewLog('Edit', 'Service ' . $_POST["service_id"] . ' image changed');
        }
    } else {
        echo "Error : Invalid File";
    }
}


if (isset($_POST["addNewService"])) {
    $service_obj->addNewService(
        $_POST["service_id"],
        $_POST["service_category"],
        $_POST["service_name"],
        $_POST["service_description"],
        $_POST["service_duration"],
        $_POST["service_price"],
        $_POST["service_image"],
        $_POST["service_availability"],
    );
    $actLog_obj->addNewLog('New', 'New Service ' . $_POST["service_id"] . ' added');

}

if (isset($_POST["deleteService"])) {
    $service_obj->deleteService($_POST["service_id"]);
    $actLog_obj->addNewLog('Delete', 'Service ' . $_POST["service_id"] . ' deleted');

}

if (isset($_POST["getServiceCategory"])) {

    $serviceByCategory = $service_obj->getAllServices_ByCategoryID($_POST['serviceCategory']);
    $serviceArray = array();
    while ($row = $serviceByCategory->fetch()) {
        $serviceID = $row["Service_ID"];
        array_push($serviceArray, $serviceID);
        // $serviceDescription = $row["Description"];

    }
    echo json_encode($serviceArray);
    // echo "serv";

}

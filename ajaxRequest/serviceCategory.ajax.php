<?php
include_once "../classes/activityLog.class.php";
$actLog_obj = new ActivityLog();
include_once '../classes/serviceCategory.class.php';
$serviceCategory_obj = new ServiceCategory();


if (isset($_POST["editServiceCAtegory"])) {
    $serviceCatDataToEdit = $_POST["serviceCatToEdit"];
    echo $serviceCatDataToEdit;
    $serviceCatDataToEdit  = json_decode("$serviceCatDataToEdit", true);
    $serviceCategory_obj->editServiceCAtegory($_POST["serviceCat_id"], $serviceCatDataToEdit);

    $actLog_obj->addNewLog('Edit', 'Service category ' . $_POST["serviceCat_id"] . ' edited');
}


if (isset($_FILES['file']['name'])) {
    $filename = $_FILES['file']['name'];

    /* Location */
    $location = "../resources/Dental_Pics/ALL_CATEGORIES/" . $filename;
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
            $serviceCategory_obj->changeServiceCategoryImage($_GET["serviceCategoryId"], $filename);
            $actLog_obj->addNewLog('Edit', 'Service category ' . $_GET["serviceCategoryId"] . ' image changed');
        }
    } else {
        echo "Error : Invalid File";
    }
}

if (isset($_POST["addNewServiceCategory"])) {
    $serviceCategory_obj->addNewServiceCategory(
        $_POST["serviceCat_id"],
        $_POST["serviceCat_name"],
        $_POST["serviceCat_description"],
        $_POST["serviceCat_image"]
    );
    $actLog_obj->addNewLog('New', 'New Service Category ' . $_POST["serviceCat_id"] . ' added');
}

<?php

if (isset($_POST["getServiceCategory"])) {
    include_once "../classes/service.class.php";
    $appService_obj = new Service();
    $serviceByCategory = $appService_obj->getAllServices_ByCategoryID($_POST['serviceCategory']);
    $serviceArray = array();
    while ($row = $serviceByCategory->fetch()) {
        $serviceID = $row["Service_ID"];
        array_push($serviceArray,$serviceID );
        // $serviceDescription = $row["Description"];

    }
    echo json_encode($serviceArray);
    // echo "serv";

}


// include_once "../classes/serviceCategory.class.php";
// include_once "../classes/service.class.php";

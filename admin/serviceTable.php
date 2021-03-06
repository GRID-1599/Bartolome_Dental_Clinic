<?php
include_once '../classes/serviceCategory.class.php';
include_once '../classes/service.class.php';

$serviceCategory_obj = new ServiceCategory();
$serviceCategoryIdAndName_Array = $serviceCategory_obj->getServicesCategory_Name();


$service_obj = new Service();
$stmt_GetAllServices = $service_obj->getAllServices();


$sampleTxt = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga tempora architecto minima esse? Recusandae dolorem, eius totam magnam non eum!";
$imageType = ".jpg";
?>


<table class="datatablesSimple"  id="servicesTable">
    <thead>
        <tr>
            <th>Service ID</th>
            <th>Name</th>
            <th>Starting Price</th>
            <th>Service Category</th>
            <th>Availability</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Service ID</th>
            <th>Name</th>
            <th>Starting Price</th>
            <th>Service Category</th>
            <th>Availability</th>
        </tr>
    </tfoot>
    <tbody >
        <?php
        while ($row = $stmt_GetAllServices->fetch()) {
            $serviceName = $row["Name"];
            // $serviceDescription = $row["Description"];
            $serviceStarting_Price = $row["Starting_Price"];
            // $ImgFilename = $row["ImgFilename"];
            $serviceService_ID = $row["Service_ID"];
            $serviceServiceCategory_ID = $serviceCategoryIdAndName_Array[$row["ServiceCategory_ID"]];
            $serviceDescription = (strcmp($row["Description"], "") != 0) ? $row["Description"] : $sampleTxt;
            $serviceImgFilename = (strcmp($row["ImgFilename"], "") != 0) ? $row["ServiceCategory_ID"] . "/" . $row["ImgFilename"] . $imageType : "logov2.png";
            $imagePath = "resources/Dental_Pics/" . $serviceImgFilename;
            // $imagePath = "resources/Dental_Pics/logov2.png";
            $serviceAvailability = ($row["Availability"])? "Available" : "Not Available" ;

            $row = '<tr class="servicerow" data-bs-toggle="tooltip" data-bs-placement="bttom" title="Click to view" >' .
                "<td>" . $serviceService_ID . "</td>" .
                "<td>" . $serviceName. "</td>" .
                "<td>" . $serviceStarting_Price . "</td>" .
                "<td>" . $serviceServiceCategory_ID. "</td>" .
                "<td>" . $serviceAvailability. "</td>" .
                "</tr>";
            echo $row;
        }

        ?>
        </body>
</table>
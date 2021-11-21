<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles/bootstap_css/styles.css" rel="stylesheet" />
</head>

<body>

    <?php
            include_once 'classes/serviceCategory.class.php';
            $serviceCategory_obj = new ServiceCategory();

            $serviceCategoryIdAndName_Array = $serviceCategory_obj->getServicesCategory_Name();
    ?>

    <div class="container-fluid container">
        <div class="row " >




            <?php

            include_once  'classes/service.class.php';

            $service_obj = new Service();
            $stmt_GetAllServices = $service_obj->getAllServices();
            $sampleTxt = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga tempora architecto minima esse? Recusandae dolorem, eius totam magnam non eum!";
                $imageType = ".jpg";
            while ($row = $stmt_GetAllServices->fetch()) {
                $serviceName = $row["Name"];
                // $serviceDescription = $row["Description"];
                $serviceStarting_Price = $row["Starting_Price"];
                // $ImgFilename = $row["ImgFilename"];
                $serviceService_ID = $row["Service_ID"];
                $serviceServiceCategory_ID = $serviceCategoryIdAndName_Array[$row["ServiceCategory_ID"]];
                $serviceDescription = (strcmp($row["Description"], "") != 0) ? $row["Description"] : $sampleTxt;
                $serviceImgFilename = (strcmp($row["ImgFilename"], "") != 0) ? $row["ServiceCategory_ID"]."/".$row["ImgFilename"].$imageType : "logov2.png";
                $imagePath = "resources/Dental_Pics/". $serviceImgFilename ;
                // $imagePath = "resources/Dental_Pics/logov2.png";


                echo <<<SERVICECARD
                    <div class="col-sm-4">
                        <div class="card">
                            <img src="$imagePath" class="card-img-top" alt="$serviceName | $serviceImgFilename">
                            <div class="card-body">
                                <h5 class="card-title">$serviceName</h5>
                                <p class="card-text">$serviceServiceCategory_ID</p>
                                <p class="card-text">$serviceDescription</p>
                                <p class="card-text">Price: $serviceStarting_Price</p>
                                <a href="bookNow.php?serviceID=$serviceService_ID&serviceName=$serviceName&servicePrice=$serviceStarting_Price" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                SERVICECARD;
            }

            ?>
        </div>
    </div>
</body>

</html>
<?php

include_once "classes/serviceCategory.class.php";

$serviceCategory_Obj = new ServiceCategory();

$serviceCategory_Id = $serviceCategory_Obj->getServicesCategory_ID($_GET['serviceCategory']);
if (!$serviceCategory_Id) {
    echo $serviceCategory_Id;
    echo " Service Category Not Found";
    exit();
}



$serviceCategory_Array = $serviceCategory_Obj->getServicesCategory_ById($serviceCategory_Id);


$fileName = $serviceCategory_Array["ImgFileName"];
$sampleTxt = "";

$serviceCategory_Name = $_GET['serviceCategory'];
$serviceCategory_Description = (strcmp($serviceCategory_Array["Description"], "") != 0) ? $serviceCategory_Array["Description"] : $sampleTxt;;
$serviceCategory_ImgFileName = (strcmp($fileName, "") != 0) ? $fileName . ".jpg" : "dentistBG.jpg";

$imagePath = "resources/Dental_Pics/ALL_CATEGORIES/" . $serviceCategory_ImgFileName;


// if (isset($_GET['serviceCategory'])) {

// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <base href="/Dental Clinic/">  -->

    <?php include_once('font_links.php') ?>

    <link rel="stylesheet" href="styles/bootstap_css/styles.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Services | Bartolome Dental Clinic</title>

</head>

<body>
    <?php
    $page = "service";
    include('header.php')
    ?>
    <main>
        <div class="container-xxl">
            <div class="card mb-4 border-0 ">
                <img src="<?php echo $imagePath ?>" alt="<?php echo $serviceCategory_Name . " ServiceCategory Image" ?>" class="card-img-top" style="max-height: 25rem;">
                <div class="card-body">
                    <h5 class="card-title  h3"><?php echo $serviceCategory_Name; ?></h5>
                    <p class="card-text"> <?php echo $serviceCategory_Description; ?></p>
                    <br>
                    <br>
                    <span>
                        <h3>
                            Service under <small class="h3 text-2 "><?php echo $serviceCategory_Name; ?></small>
                        </h3>

                    </span>
                    <br>
                    <div class="row gy-3 ">
                        <?php

                        include_once  'classes/service.class.php';
                        include_once 'classes/serviceCategory.class.php';
                        $serviceCategory_obj = new ServiceCategory();

                        $serviceCategoryIdAndName_Array = $serviceCategory_obj->getServicesCategory_Name();

                        $service_obj = new Service();
                        $stmt_GetAllServices = $service_obj->getAllServicesData_ByCategoryID($serviceCategory_Id);
                        $sampleTxt = "";
                        $imageType = ".jpg";
                        while ($row = $stmt_GetAllServices->fetch()) {
                            if ($row["Availability"]) {


                                $serviceName = $row["Name"];
                                // $serviceDescription = $row["Description"];
                                $serviceStarting_Price = $row["Starting_Price"];
                                $serviceDuration = $row["Duration_Minutes"];

                                // $ImgFilename = $row["ImgFilename"];
                                $serviceService_ID = $row["Service_ID"];
                                $serviceServiceCategory_ID = $serviceCategoryIdAndName_Array[$row["ServiceCategory_ID"]];
                                $serviceDescription = (strcmp($row["Description"], "") != 0) ? $row["Description"] : $sampleTxt;
                                $serviceImgFilename = (strcmp($row["ImgFilename"], "") != 0) ? $row["ImgFilename"] . $imageType : "logov2.png";
                                $imagePath = "resources/Dental_Pics/SERVICE_IMAGES/" . $serviceImgFilename;
                                // $imagePath = "resources/Dental_Pics/logov2.png";


                                echo <<<SERVICECARD
                                    <div class='col-md-4 '>
                                    <div class="card border-0 serviceUnder">
                                        <img src="$imagePath" class="card-img-top" alt="$serviceName | $serviceImgFilename" style="max-height: 15rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">$serviceName</h5>
                                            <p class="card-text">$serviceServiceCategory_ID</p>
                                            <p class="card-text">Price: <span class="servicePrice">$serviceStarting_Price Php </span> </p>
                                            <p class="card-text">$serviceDescription</p>
                                            
                                            <form action="bookNow" method="post">
                                                <input type="hidden" name="serviceID" value="$serviceService_ID">
                                                <input type="hidden" name="serviceName" value="$serviceName">
                                                <input type="hidden" name="servicePrice" value="$serviceStarting_Price">
                                                <input type="hidden" name="serviceDuration" value="$serviceDuration">
                                                <button type="submit" class="btn btn-primary">BOOK THIS</button>
                                            </form>
                                        </div>
                                        </div>
                                        </div>
                                    SERVICECARD;
                            }
                        }

                        // <a href="bookNow.php?serviceID=$serviceService_ID&serviceName=$serviceName&servicePrice=$serviceStarting_Price" class="btn btn-primary">Book Now</a>

                        ?>


                    </div>
                </div>
            </div>
        </div>
    </main>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
    <?php include('footer.php') ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include_once('font_links.php') ?>
    <link href="styles/bootstap_css/styles.css" rel="stylesheet" />

    <link rel="stylesheet" href="./styles/style.css">
    <title>Services | Bartolome Dental Clinic
    </title>

</head>

<body>
    <?php $page = "service";
    include('header.php') ?>

    <section class="svServices">
        <div class="svServices__cont ">
            <div class="container servicePageHeader">
                <div class="row">
                    <div class="col-auto">
                        <button type="button" id="btnDisplayByCategory" class="btn btnSv selected">Service categories</button>
                    </div>
                    <div class="col">
                        <button type="button" id="btnDisplayAllService" class="btn btnSv ">Display all services</button>
                    </div>
                    <div class="col align-self-end">
                        <input type="search" name="" id="servicePageSearch" placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="serviceCategoryDisplay ">

                <?php
                include 'classes/serviceCategory.class.php';
                $serviceCategory = new serviceCategory();
                $serviceCategories = $serviceCategory->getAllServicesCategory();

                foreach ($serviceCategories as $entry) {
                    $serviceCategory_Name = $entry["Name"];
                    $sampleTxt = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga tempora architecto minima esse? Recusandae dolorem, eius totam magnam non eum!";
                    $serviceCategory_Description = (strcmp($entry["Description"], "") != 0) ? $entry["Description"] : $sampleTxt;
                    $serviceCategory_FileName = (strcmp($entry["ImgFileName"], "") != 0) ? $entry["ImgFileName"] : "dentistBG";
                    $imagePath = "resources/Dental_Pics/ALL_CATEGORIES/" . $serviceCategory_FileName . ".jpg";

                    echo <<<SERVICES_BOX
                                <div class="svService">
                                    <div class="svService__img">
                                        <img src="$imagePath" alt="$serviceCategory_FileName">
                                    </div>
                                    <div class="svService__txt">
                                        <h1>$serviceCategory_Name</h1>
                                        <p>$serviceCategory_Description</p>
                                        <a href="service/$serviceCategory_Name" class="btn-grad">See more </a>
                                    </div>

                                </div>
                    SERVICES_BOX;
                }

                ?>
            </div>




            <div class="allServiceDisplay svUnshow">

                <?php

                include_once  'classes/service.class.php';
                include_once 'classes/serviceCategory.class.php';
                $serviceCategory_obj = new ServiceCategory();

                $serviceCategoryIdAndName_Array = $serviceCategory_obj->getServicesCategory_Name();

                $service_obj = new Service();
                $stmt_GetAllServices = $service_obj->getAllServices();
                $sampleTxt = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga tempora architecto minima esse? Recusandae dolorem, eius totam magnam non eum!";
                $imageType = ".jpg";
                while ($row = $stmt_GetAllServices->fetch()) {
                    if ($row["Availability"]) {
                        $serviceName = $row["Name"];
                        // $serviceDescription = $row["Description"];
                        $serviceStarting_Price = $row["Starting_Price"];
                        // $ImgFilename = $row["ImgFilename"];
                        $serviceService_ID = $row["Service_ID"];
                        $serviceServiceCategory_ID = $serviceCategoryIdAndName_Array[$row["ServiceCategory_ID"]];
                        $serviceDescription = (strcmp($row["Description"], "") != 0) ? $row["Description"] : $sampleTxt;
                        $serviceImgFilename = (strcmp($row["ImgFilename"], "") != 0) ? $row["ImgFilename"] . $imageType : "logov2.png";
                        $imagePath = "resources/Dental_Pics/SERVICE_IMAGES/" . $serviceImgFilename;
                        // $imagePath = "resources/Dental_Pics/logov2.png";


                        echo <<<SERVICECARD
                                    <div class="card serviceCard">
                                        <img src="$imagePath" class="card-img-top" alt="$serviceName | $serviceImgFilename">
                                        <div class="card-body">
                                        
                                            <h5 class="card-title">$serviceName</h5>
                                            <p class="card-text">$serviceServiceCategory_ID</p>
                                            <p class="card-text"><span class="servicePrice">Price: $serviceStarting_Price Php</span></p>
                                            <p class="card-text">$serviceDescription</p>
                                            
                                            <form action="bookNow" method="post">
                                                <input type="hidden" name="serviceID" value="$serviceService_ID">
                                                <input type="hidden" name="serviceName" value="$serviceName">
                                                <input type="hidden" name="servicePrice" value="$serviceStarting_Price">
                                                <button type="submit" class="btn btn-primary">Book this</button>
                                            </form>
                                        </div>
                                    </div>
                            SERVICECARD;
                    }
                }
                ?>

            </div>
        </div>

    </section>
    <?php include('footer.php') ?>

    <script src="./javascript/servicePage.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service | Bartolome Dental Clinic</title>

    <?php include_once('font_links.php') ?>
    <link href="styles/bootstap_css/styles.css" rel="stylesheet" />
    <link href="styles/style.css" rel="stylesheet" />
</head>

<body>
    <?php $page = "service";
    include('header.php') ?>
    <main>
        <div class="container-fluid">
            <?php
            // include_once 'classes/serviceCategory.class.php';
            // $serviceCategory_obj = new ServiceCategory();

            // $serviceCategoryIdAndName_Array = $serviceCategory_obj->getServicesCategory_Name();
            // include_once  'classes/service.class.php';

            include 'classes/serviceCategory.class.php';
            $serviceCategory = new serviceCategory();
            $serviceCategories = $serviceCategory->getAllServicesCategory();
            $tryNum = 0;
            foreach ($serviceCategories as $entry) {
                $serviceCategory_Name = $entry["Name"];
                $sampleTxt = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga tempora architecto minima esse? Recusandae dolorem, eius totam magnam non eum!";
                $serviceCategory_Description = (strcmp($entry["Description"], "") != 0) ? $entry["Description"] : $sampleTxt;
                $serviceCategory_FileName = (strcmp($entry["ImgFileName"], "") != 0) ? $entry["ImgFileName"] : "dentistBG";
                $imagePath = "resources/Dental_Pics/ALL_CATEGORIES/" . $serviceCategory_FileName . ".jpg";
                $bg = ($tryNum%3 == 0)? 'pink-2' : '';
                $order = ($tryNum%3 == 0)? '' : '';
            ?>
                <div class="row justify-content-center bg-<?php echo $bg ?>">
                    <div class="container py-5" style="max-width: 60rem;">
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center bg-boxDot <?php echo $order  ?>">
                                <img src="<?php echo $imagePath ?>" class="img-fluid rounded-pill" style="width: 15rem; height: 14rem;" alt="<?php echo $serviceCategory_FileName ?>">

                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-title text-3 h3 letter-spacing-1 "><?php echo $serviceCategory_Name ?></p>
                                    <p class="card-text text-gray line-1"><?php echo $serviceCategory_Description?></p>
                                    <a type="button" href="<?php echo 'service/'.$serviceCategory_Name?>" class="btn btn-primary">See more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                // while end
                $tryNum++;
            }

            ?>
        </div>
    </main>


    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
</body>

</html>
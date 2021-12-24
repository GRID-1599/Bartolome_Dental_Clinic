<?php session_start();
include_once '../classes/serviceCategory.class.php';
$serviceCategory_obj = new ServiceCategory();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'html-head.php' ?>
</head>

<body class="sb-nav-fixed">
    <?php include 'nav_top.php' ?>
    <div id="layoutSidenav">
        <?php include 'nav_side.php' ?>

        <!-- pages main body -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Services</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <a href="service">List of Service</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="service/categories">Service Categories</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Category View
                        </li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-tooth me-1"></i> Service Category View
                        </div>
                        <div class="card-body">
                            <?php

                            $svCatId = $_GET["svCategoryId"];

                            $svCategory = $serviceCategory_obj->getServicesCategory_ById($svCatId);

                            // if ($service_obj->getServiceByID($serviceId) == false) {
                            //     echo "*** Service Not Found ***" . "<br>";
                            //     echo "Incorrect Service ID or Service not Exist";
                            // }



                            ?>
                            <div class="container">
                                <dl class="row">
                                    <dt class="col-sm-3">Service ID</dt>
                                    <dd class="col-sm-9">
                                        <p id="serviceCat_id"><?php echo $_GET["svCategoryId"] ?></p>
                                    </dd>

                                    <dt class="col-sm-3">Name</dt>
                                    <dd class="col-sm-9">
                                        <input type="text" value="<?php echo $svCategory['Name'] ?>" class="w-100 form-control" id="serviceCat_name">
                                    </dd>



                                    <dt class="col-sm-3">Description</dt>
                                    <dd class="col-sm-9">
                                        <textarea class="form-control" rows="8" id="serviceCat_description"><?php echo $svCategory["Description"] ?></textarea>
                                    </dd>

                                    <dt class="col-sm-3">Service Category Image</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        $serviceImgFilename = (strcmp($svCategory["ImgFileName"], "") != 0) ? $svCategory["ImgFileName"] . ".jpg" : "logov2.png";
                                        $imagePath = "../resources/Dental_Pics/ALL_CATEGORIES/" . $serviceImgFilename;
                                        ?>

                                        <img src="<?php echo $imagePath; ?>" alt=" <?php echo $imagePath; ?>" class="img-thumbnail" id="serviceCatImage">
                                        <form id="formImage" onsubmit="return false">
                                            <input type="file" id="serviceCat_image" class="" aria-describedby="inputGroupFileAddon01" accept="image/jpeg">
                                            <label class="" for="serviceCat_image">Choose file <i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                                        </form>
                                        <button type="button" id="btnImage" class="btn btn-secondary "> <i class="fa fa-trash" aria-hidden="true"></i>
                                            Delete Picture</button>
                                    </dd>
                                </dl>
                            </div>
                             <div class="row">
                                <div class="col">
                                    <button type="button" id="btnEditService" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#serviceChanges"> <i class="fa fa-pencil" aria-hidden="true"></i>
                                        Save Changes</button>
                                </div>

                                <!-- edit Modal -->
                                <div class="modal fade" id="serviceChanges" tabindex="-1" aria-labelledby="serviceViewModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="serviceViewModalLabel">Here's the changes</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <dl class="row" id="changesList">

                                                </dl>
                                            </div>
                                            <div class="modal-footer">
                                                <!-- <p>Press confirm to save the changes</p> -->
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" id="bntConfirmChanges">Confirm Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </main>
            <?php include 'html-footer.php' ?>
        </div>
    </div>
    <?php include 'scripts.php' ?>
    <script src="js/svCategoryView.js"></script>
</body>

</html>
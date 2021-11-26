<?php session_start();
include_once '../classes/serviceCategory.class.php';

$serviceCategory_obj = new ServiceCategory();
$serviceCategoryIdAndName_Array = $serviceCategory_obj->getServicesCategory_Name();

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
                        <li class="breadcrumb-item active" aria-current="page">Service View</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-tooth me-1"></i> Service View
                        </div>
                        <div class="card-body">
                            <?php
                            $serviceId = $_GET["serviceId"];
                            include_once '../classes/service.class.php';
                            $service_obj = new Service();
                            $service = $service_obj->getServiceByID($serviceId);


                            ?>
                            <div class="container">
                                <dl class="row">
                                    <dt class="col-sm-3">Service ID</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        echo $serviceId;
                                        ?>

                                    </dd>

                                    <dt class="col-sm-3">Name</dt>
                                    <dd class="col-sm-9">
                                        <input type="text" name="svName" id="" value="<?php echo $service["Name"]; ?>" readonly class="w-100">
                                    </dd>

                                    <dt class="col-sm-3">Category</dt>
                                    <dd class="col-sm-9">
                                        <select class="form-select w-75">
                                            <?php
                                            foreach ($serviceCategoryIdAndName_Array as $key => $value) {
                                                $selected = "";
                                                if ($key == $service["ServiceCategory_ID"]) {
                                                    $selected = "selected";
                                                }
                                                echo "<option value='" . $key . "' " . $selected . ">" . $value . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </dd>

                                    <dt class="col-sm-3">Starting Price</dt>
                                    <dd class="col-sm-9">
                                        <input type="text" name="svName" id="" value="<?php echo $service["Starting_Price"]; ?>" readonly class="">
                                    </dd>

                                    <dt class="col-sm-3">Description</dt>
                                    <dd class="col-sm-9">
                                        <textarea class="form-control" rows="8">
                                            <?php
                                            echo $service["Description"];
                                            ?>
                                        </textarea>
                                    </dd>

                                    <dt class="col-sm-3">Service Image</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        $serviceImgFilename = (strcmp($service["ImgFilename"], "") != 0) ? $service["ServiceCategory_ID"] . "/" . $service["ImgFilename"] . ".jpg" : "logov2.png";
                                        $imagePath = "../resources/Dental_Pics/" . $serviceImgFilename;
                                        ?>
                                        <img src="<?php echo $imagePath; ?>" alt="" class="img-thumbnail">
                                        <input type="file" id="inputGroupFile01" class="imgInp custom-file-input" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        <input type="image" src="" alt="">
                                    </dd>



                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include 'html-footer.php' ?>
        </div>
    </div>
    <?php include 'scripts.php' ?>
    <script src="js/service.js"></script>
</body>

</html>
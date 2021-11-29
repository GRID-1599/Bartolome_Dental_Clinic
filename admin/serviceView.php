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

                            if ($service_obj->getServiceByID($serviceId) == false) {
                                echo "*** Service Not Found ***" . "<br>";
                                echo "Incorrect Service ID or Service not Exist";
                            }



                            $service = $service_obj->getServiceByID($serviceId);


                            ?>
                            <div class="container">
                                <dl class="row">
                                    <dt class="col-sm-3">Service ID</dt>
                                    <dd class="col-sm-9">
                                        <p id="service_id"><?php echo $serviceId ?></p>
                                    </dd>

                                    <dt class="col-sm-3">Name</dt>
                                    <dd class="col-sm-9">
                                        <input type="text" name="svName" value="<?php echo $service["Name"]; ?>" class="w-100" id="service_name">
                                    </dd>

                                    <dt class="col-sm-3">Category</dt>
                                    <dd class="col-sm-9">
                                        <select class="form-select w-75" id="service_category">
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
                                        <input type="text" name="svName" id="service_price" value="<?php echo $service["Starting_Price"]; ?>" class="">
                                    </dd>



                                    <dt class="col-sm-3">Description</dt>
                                    <dd class="col-sm-9">
                                        <textarea class="form-control" rows="8" id="service_description"><?php echo $service["Description"]?></textarea>
                                    </dd>

                                    <dt class="col-sm-3">Service Image</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                        $serviceImgFilename = (strcmp($service["ImgFilename"], "") != 0) ? $service["ImgFilename"] . ".jpg" : "logov2.png";
                                        $imagePath = "../resources/Dental_Pics/SERVICE_IMAGES/" . $serviceImgFilename;
                                        ?>
                                        <img src="<?php echo $imagePath; ?>" alt="" class="img-thumbnail" id="serviceImage">
                                        <form id="formImage" onsubmit="return false">
                                        <input type="file" id="service_image" class="" aria-describedby="inputGroupFileAddon01" accept="image/jpeg">
                                        <label class="" for="service_image">Choose file</label>
                                        </form>
                                        <button type="button" id="btnImage" class="btn btn-secondary "> <i class="fa fa-trash" aria-hidden="true"></i>
                                            Delete Picture</button>
                                    </dd>

                                    <dt class="col-sm-3">Availability</dt>
                                    <dd class="col-sm-9">
                                        <select class="form-select w-50" id="service_availability">
                                            <?php
                                            $avail = "";
                                            $notAvail = "";
                                            if ($service["Availability"]) {
                                                $avail = "selected";
                                            } else {
                                                $notAvail = "selected";
                                            }
                                            echo "<option value='1' " . $avail . ">Available</option>";
                                            echo "<option value='0' " . $notAvail . ">Not Available</option>";

                                            ?>
                                        </select>
                                    </dd>

                                    <dt class="col-sm-3">Service Duration</dt>
                                    <dd class="col-sm-9">
                                        <input type="text" name="svName" id="service_duration" value="<?php echo $service["Duration"]; ?>" maxlength="3">Minutes
                                    </dd>

                                </dl>
                                <div class="row">
                                    <div class="col">
                                        <button type="button" id="btnEditService" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#serviceChanges"> <i class="fa fa-pencil" aria-hidden="true"></i>
                                            Save Changes</button>
                                    </div>

                                    <div class="col">
                                        <button type="button" id="btnDeleteService" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#serviceDelete"><i class="fa fa-trash" aria-hidden="true"></i>
                                            Delete</button>
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
                                    <!-- delete Modal -->

                                    <div class="modal fade" id="serviceDelete" tabindex="-1" aria-labelledby="serviceDeleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="serviceDeleteModalLabel">Delete Services</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <dl class="row" id="deleteList">
                                                        <dt class="col-sm-3">Service ID</dt>
                                                        <dd class="col-sm-9">
                                                            <p><?php echo $serviceId ?></p>
                                                        </dd>

                                                        <dt class="col-sm-3">Name</dt>
                                                        <dd class="col-sm-9">
                                                            <p><?php echo $service["Name"]; ?></p>
                                                        </dd>

                                                        <dt class="col-sm-3">Category</dt>
                                                        <dd class="col-sm-9">
                                                            <p>
                                                                <?php
                                                                foreach ($serviceCategoryIdAndName_Array as $key => $value) {
                                                                    if ($key == $service["ServiceCategory_ID"]) {
                                                                        echo $value;
                                                                    }
                                                                }
                                                                ?>
                                                            </p>
                                                        </dd>
                                                    </dl>
                                                </div>
                                                <div class="modal-footer">
                                                    <!-- <p>Press confirm to save the changes</p> -->
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-danger" id="btnConfirmDelete">Confirm Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Button trigger modal -->
                                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#serviceChanges">
                                        Launch demo modal
                                    </button> -->


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
    <script src="js/serviceView.js"></script>
</body>

</html>
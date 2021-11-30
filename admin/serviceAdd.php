<?php session_start();
include_once '../classes/serviceCategory.class.php';

$serviceCategory_obj = new ServiceCategory();
$serviceCategoryIdAndName_Array = $serviceCategory_obj->getServicesCategory_Name();

include_once '../classes/service.class.php';
$service_obj = new Service();

$lastService_Id = substr($service_obj->getLastServiceID(), 1);
$newService_Id = "S" . ($lastService_Id + 1) ;

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
                        <li class="breadcrumb-item active" aria-current="page">Adding New Service</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-tooth me-1"></i> New Service
                        </div>
                        <div class="card-body">

                            <div class="container">
                                <dl class="row">
                                    <dt class="col-sm-3">Service ID</dt>
                                    <dd class="col-sm-9">
                                        <p id="service_id"><?php echo $newService_Id ?></p>
                                    </dd>

                                    <dt class="col-sm-3">Name</dt>
                                    <dd class="col-sm-9">
                                        <input type="text"  value="" class="w-100 form-control" id="service_name">
                                    </dd>

                                    <dt class="col-sm-3">Category</dt>
                                    <dd class="col-sm-9">
                                        <select class="form-select w-75" id="service_category">
                                            <?php
                                            foreach ($serviceCategoryIdAndName_Array as $key => $value) {
                                                echo "<option value='" . $key . "' >" . $value . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </dd>

                                    <dt class="col-sm-3">Starting Price</dt>
                                    <dd class="col-sm-9">
                                        <input type="text"  id="service_price" value="" class="form-control">
                                    </dd>



                                    <dt class="col-sm-3">Description</dt>
                                    <dd class="col-sm-9">
                                        <textarea class="form-control" rows="8" id="service_description"></textarea>
                                    </dd>

                                    <dt class="col-sm-3">Service Image</dt>
                                    <dd class="col-sm-9">

                                        <img src="../resources/Dental_Pics/SERVICE_IMAGES/logov2.png" alt="Default Service Image" class="img-thumbnail" id="serviceImage">
                                        <form id="formImage" onsubmit="return false">
                                            <!-- <label class="" for="service_image">Click to add service image</label><br> -->
                                            <input type="file" id="service_image" class="" aria-describedby="inputGroupFileAddon01" accept="image/jpeg">

                                        </form>
                                        <button type="button" id="btnImage" class="btn btn-secondary "> <i class="fa fa-trash" aria-hidden="true"></i>
                                            Delete Picture</button>
                                    </dd>

                                    <dt class="col-sm-3">Availability</dt>
                                    <dd class="col-sm-9">
                                        <select class="form-select w-50" id="service_availability">
                                            <option value=1 selected>Available</option>
                                            <option value=0>Not Available</option>
                                        </select>
                                    </dd>

                                    <dt class="col-sm-3">Service Duration</dt>
                                    <dd class="col-sm-9">
                                        <input type="range" class="form-range w-50" id="service_duration" value="0" min="0" step="15" max="240">
                                        <span id="duration_value">0 mins</span>
                                    </dd>

                                </dl>
                                <div class="row">
                                    <div class="col">
                                        <button type="button" id="btnAddService" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#serviceAdd"> <i class="fa fa-save" aria-hidden="true"></i>
                                            Save Service</button>
                                    </div>
                                    <!-- edit Modal -->
                                    <div class="modal fade" id="serviceAdd" tabindex="-1" aria-labelledby="serviceAddModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="serviceAddModalLabel"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <dl class="row" id="messageList">

                                                    </dl>
                                                </div>
                                                <div class="modal-footer">
                                                    <!-- <p>Press confirm to save the changes</p> -->
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" id="bntConfirmChanges">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <!-- Button trigger modal -->
                                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#serviceAdd">
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
    <script src="js/serviceAdd.js"></script>
</body>

</html>
<?php session_start(); ?>

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
                        <li class="breadcrumb-item active" aria-current="page">Service Categories</li>
                    </ol>

                    <br>
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <i class="fas fa-table me-1"></i> Service Categories Table
                                    </div>
                                    <div class="col">
                                        <a href="service/categories/add">
                                            <button type="button" class="btn btn-info w-100"> <i class="fas fa-plus " id="btnAddNewService"></i> Add New Service Category</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            include_once '../classes/serviceCategory.class.php';
                            include_once '../classes/service.class.php';

                            $serviceCategory_obj = new ServiceCategory();
                            $serviceCategory_Array = $serviceCategory_obj->getAllServicesCategory();

                            ?>


                            <table class="datatablesSimple" id="servicesCategoriesTable">
                                <thead>
                                    <tr>
                                        <th>Category ID</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Category ID</th>
                                        <th>Name</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    foreach ($serviceCategory_Array as $row) {
                                        $categoryName = $row["Name"];
                                        $ServiceCategory_Id = $row["ServiceCategory_Id"];


                                        $row = '<tr class="serviceCategoryrow" >' .
                                            "<td>" . $ServiceCategory_Id . "</td>" .
                                            "<td>" . $categoryName . "</td>" .
                                            "</tr>";
                                        echo $row;
                                    }

                                    ?>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </main>
            <?php include 'html-footer.php' ?>
        </div>
    </div>
    <?php include 'scripts.php' ?>
    <!-- <script src="js/service.js"></script> -->
    <script>
        function serviceEventUpdate() {
            $('.serviceCategoryrow').each(function() {
                $(this).click(function() {
                    var ID = $(this).find("td:eq(0)").text();
                    window.location.href = "service/categories/" + ID;
                });
            });
        }

        $(document).ready(function() {
            $('.serviceCategoryrow').each(function() {
                $(this).click(function() {
                    var ID = $(this).find("td:eq(0)").text();
                    window.location.href = "service/categories/" + ID;
                });
            });


            setInterval(function() {
                serviceEventUpdate();

            }, 1000);


        });
    </script>

</body>

</html>
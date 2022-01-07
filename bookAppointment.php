<?php
include_once "classes/serviceCategory.class.php";
include_once "classes/service.class.php";
include_once "classes/clinicDate.class.php";
$appServiceCat_obj = new ServiceCategory();
$appService_obj = new Service();
$clinic_no_date_obj = new ClinicDate();
$serviceCategoryIdAndName_Array = $appServiceCat_obj->getServicesCategory_Name();
?>
<div class="row ">
    <div class="col-md-8 appointmentInputs">
        <div class="container serviceInputs ">
            <div class="row top">
                <div class="container  mb-3 ">
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>Please choose atleast one service: </h4>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" placeholder="Search a service" class="form-control" id="searchService">
                        </div>
                    </div>
                </div>
                <div class="container-fluid ">
                    <div class="row  services-box">
                        <div class="col-md-4 serviceCat-wrapper mb-4 ">
                            <h5>Service Categories</h5>
                            <div class="row appServiceCat-box">
                                <button id="C999" class="appSrvCatgy catSelected">ALL</button>
                                <?php
                                $serviceCategories = $appServiceCat_obj->getAllServicesCategory();

                                foreach ($serviceCategories as $entry) {
                                    $serviceCategory_Name = $entry["Name"];
                                    $serviceCategory_ID = $entry["ServiceCategory_Id"];

                                    echo "<button id=" . $serviceCategory_ID . " class='appSrvCatgy '>" . $serviceCategory_Name . "</button>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-8 service-wrapper mb-4 ">
                            <h5>Service</h5>
                            <div class="row  appService-box">
                                <table class="table-appService " id="serviceTables">
                                    <tbody>
                                        <?php
                                        $services = $appService_obj->getAllServices();

                                        while ($row = $services->fetch()) {
                                            if ($row["Availability"]) {

                                                $serviceName = $row["Name"];
                                                // $serviceDescription = $row["Description"];
                                                $serviceStarting_Price = $row["Starting_Price"];
                                                $serviceDuration = $row["Duration_Minutes"];
                                                // $ImgFilename = $row["ImgFilename"];
                                                $serviceService_ID = $row["Service_ID"];

                                                $serviceServiceCategory_ID = $serviceCategoryIdAndName_Array[$row["ServiceCategory_ID"]];

                                                $isSelected = "";
                                                if (isset($_POST["serviceID"]) && $_POST["serviceID"] == $serviceService_ID) {
                                                    $isSelected = "serviceSelected";
                                                }
                                                // $imagePath = "resources/Dental_Pics/logov2.png";

                                                echo <<<SERVICEROW
                                            <tr id="$serviceService_ID" class="serviceRow $isSelected">
                                                <td colspan="2" class="serviceName">$serviceName</td>
                                                <td class="servicePrice">$serviceStarting_Price</td>
                                                <td class="serviceDuration unShow">$serviceDuration</td>
                                            </tr>
                                        SERVICEROW;
                                            }
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row bottom mt-3 pb-3 appDatetime-wrapper">
                <h4>Select apppointment date & time: </h4>
                <div class="container m-0">
                    <div class="row justify-content-center">
                        <!-- calendar wrapper  -->
                        <div class="col-md-7  appCalendar ">
                            <div class="container mb-3">
                                <div class="row  calendar-select">
                                    <div class="col-4">
                                        <label class="lead text-sm" for="year">Select year: </label><select class="form-control text-sm jumpDate" name="year" id="year">
                                            <?php
                                            $todayYear = date("Y");
                                            for ($yr = $todayYear; $yr <= ($todayYear + 5); $yr++) {
                                                echo "<option value=" . $yr . ">" . $yr . "</option>";
                                            }
                                            ?>
                                            <!-- <option value=2010>2010</option> -->
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <label class="lead text-sm" for="month">Jump To: </label>
                                        <select class="form-control col-sm-3 text-sm jumpDate" name="month" id="month">
                                            <option value=0>January</option>
                                            <option value=1>Febuary</option>
                                            <option value=2>March</option>
                                            <option value=3>April</option>
                                            <option value=4>May</option>
                                            <option value=5>June</option>
                                            <option value=6>July</option>
                                            <option value=7>August</option>
                                            <option value=8>September</option>
                                            <option value=9>October</option>
                                            <option value=10>November</option>
                                            <option value=11>December</option>
                                        </select>
                                    </div>
                                    <div class="col-3 p-0">
                                        <br>
                                        <button type="button" id="btnTodayDate">Go Today</button>
                                    </div>
                                </div>


                            </div>

                            <div class="card">
                                <div class="tableHeader">
                                    <button class="btn-light lead " id="preMonth" type="button"><i class="fas fa-caret-left"></i></button>

                                    <h3 class="card-header" id="todayMonthDate"></h3>

                                    <button class="btn-light lead " id="nextMonth" type="button"><i class="fas fa-caret-right"></i></button>
                                </div>
                                <table class="table  table-borderless" id="calendar">
                                    <thead>
                                        <tr class="text-truncate">
                                            <th>Sun</th>
                                            <th>Mon</th>
                                            <th>Tue</th>
                                            <th>Wed</th>
                                            <th>Thu</th>
                                            <th>Fri</th>
                                            <th>Sat</th>
                                        </tr>
                                    </thead>
                                    <tbody id="calendarBody">
                                    </tbody>
                                </table>

                                <br />
                                <!-- <form class="form-inline">
                                    <button class="btn-outline-primary lead" id="pre" type="button" onclick="preMonth()"><i class="fas fa-caret-left"></i> Previous</button>
                                    <button class="btn-outline-primary lead " id="nex" type="button" onclick="nexMonth()">Next <i class="fas fa-caret-right"></i></button>
                                </form> -->
                            </div>
                        </div>
                        <div class="col-md-5 appTimePicker unShow mt-4  ">
                            <p class="selectedDAte h6"></p>
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="timeRange " id="t9" value="9">
                                        <th scope="row">9 AM</th>
                                        <td colspan="3" class="w-75"></td>
                                    </tr>
                                    <tr class="timeRange" id="t10" value="10">
                                        <th scope="row">10 AM</th>
                                        <td colspan="3" class="w-75"></td>
                                    </tr>
                                    <tr class="timeRange" id="t11" value="11">
                                        <th scope="row">11 AM</th>
                                        <td colspan="3" class="w-75"></td>
                                    </tr>
                                    <tr class="disable">
                                        <th scope="row">12 PM</th>
                                        <td colspan="3" class="w-75">Lunch Break</td>
                                    </tr>
                                    <tr class="timeRange " id="t1" value="13">
                                        <th scope="row">1 PM</th>
                                        <td colspan="3" class="w-75"></td>
                                    </tr>
                                    <tr class="timeRange " id="t2" value="14">
                                        <th scope="row">2 PM</th>
                                        <td colspan="3" class="w-75"></td>
                                    </tr>
                                    <tr class="timeRange" id="t3" value="15">
                                        <th scope="row">3 PM</th>
                                        <td colspan="3" class="w-75"></td>
                                    </tr>
                                    <tr class="timeRange" id="t4" value="16">
                                        <th scope="row">4 PM</th>
                                        <td colspan="3" class="w-75 "></td>
                                    </tr>
                                    <tr class="disable">
                                        <th scope="row">5 PM</th>
                                        <td colspan="3" class="w-75">End of Clinic Hours</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p id="time_msg"></p>

                        </div>
                        <p id="no_clinic_dates" class="unShow"><?php echo $clinic_no_date_obj->getAllNoClinicDate() ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="contaier patientForm mb-5 unShow ">
            <br>
            <h3 class="text-center display-6 text-2">Please answer this form</h3>
            <!-- Dental History -->
            <div class="row serviceFormCategory  ">
                <br><br>
                <p class="h3 mb-0 ">Dental History</p>
                <div class="container questionCategoryWrapper ">
                    <div class="row ms-3 question">
                        <div class="col-sm-4 p-0  ">
                            <span class="input-group-text ps-0 ">Last Dental Visit: </span>
                        </div>
                        <div class=" col-sm-7 align-items-center ">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <input type="date" class="form-control" id="inpt_LastDentalVisit">
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-sm btn-outline-secondary " id="clear_LastDentalVisit">Clear</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ms-3 question">
                        <div class="col-sm-4 p-0">
                            <span class="input-group-text ps-0">Purpose of last Dental Visit</span>
                        </div>
                        <div class="col-sm-6 pe-5 align-items-center ">
                            <input type="text" class="form-control " id="inpt_PurposeLastDentalVisit">
                        </div>
                    </div>
                </div>
                <!-- Dental History end -->
            </div>
            <!-- Medical History -->
            <div class="row serviceFormCategory  ">
                <h3>Medical History</h3>
                <div class="container questionCategoryWrapper">
                    <!-- last medical check up -->
                    <div class="row ms-3 question">
                        <div class="col-sm-5 p-0">
                            <span class="input-group-text ps-0">When was your last medical check up ? </span>
                        </div>
                        <div class="col-sm-7 ">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <input type="date" class="form-control" id="inpt_LastMedicalCheckUp">
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" id="clear_LastMedicalCheckUp">Clear</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- treatment -->
                    <div class="row ms-3 question medical-treatment">
                        <div class="col-sm-7 p-0">
                            <span class="input-group-text ps-0 text-truncate">Are you under any medical treatment right now ?</span>
                        </div>
                        <div class="col-sm-3  ">
                            <div class="row align-items-center ">
                                <div class="form-control no-border">
                                    <input type="radio" id="rdTreatmentYes" name="treatment" value="yes">
                                    <label for="rdTreatmentYes">Yes</label>
                                    <input type="radio" id="rdTreatmentNo" name="treatment" value="None">
                                    <label for="rdTreatmentNo">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container ifYes unShow" id="treatment">
                        <div class="row ">
                            <div class="col-sm-6 p-0">
                                <span class="input-group-text ps-0">If yes, what is the condition being treated?</span>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control " id="inpt_hasTreatment">
                            </div>
                        </div>
                    </div>
                    <!-- Medications -->
                    <div class=" row ms-3 question">
                        <div class="col-sm-7 p-0">
                            <span class="input-group-text ps-0">Are you taking any medications ?</span>
                        </div>
                        <div class="col-sm-3">
                            <div class="row align-items-center">
                                <div class="form-control no-border">
                                    <input type="radio" id="rdMedicationsYes" name="medications" value="yes">
                                    <label for="rdMedicationsYes">Yes</label>
                                    <input type="radio" id="rdMedicationsNo" name="medications" value="None">
                                    <label for="rdMedicationsNo">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container ifYes unShow" id="medications">
                        <div class="row">
                            <div class="col-sm-6">
                                <span class="input-group-text ps-0">If yes, please specify.</span>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control " id="inpt_hasMedication">
                            </div>
                        </div>
                    </div>

                    <!-- Hospitalized -->
                    <div class="row ms-3 question">
                        <div class="col-sm-7 p-0">
                            <span class="input-group-text ps-0">Have you been ever hospitalized ?</span>
                        </div>
                        <div class="col-sm-3">
                            <div class="row align-items-center">
                                <div class="form-control no-border">
                                    <input type="radio" id="rdHospitalizedYes" name="hospitalized" value="yes">
                                    <label for="rdHospitalizedYes">Yes</label>
                                    <input type="radio" id="rdHospitalizedNo" name="hospitalized" value="None">
                                    <label for="rdHospitalizedNo">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container ifYes unShow" id="hospitalized">
                        <div class="row">
                            <div class="col-sm-6 p-0">
                                <span class="input-group-text ps-0">If so when and why?</span>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control " id="inpt_hasHopitalized">
                            </div>
                        </div>
                    </div>

                    <!-- allergies -->
                    <div class="row ms-3 question">
                        <div class="col-sm-3 p-0">
                            <span class="input-group-text ps-0">Any allergies</span>
                        </div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="Put n/a if none" id="inpt_Allergies">
                        </div>

                    </div>

                    <!-- pregnant -->
                    <div class="container forFemales">
                        <h6>For Females</h6>
                        <div class="row ms-3 question">
                            <div class="col-sm-5 p-0">
                                <span class="input-group-text ps-0">Are you pregnant ? </span>
                            </div>
                            <div class="col-sm-3">
                                <div class="row align-items-center">
                                    <div class="form-control no-border">
                                        <input type="radio" id="rdPregnantYes" name="pregnant" value="yes">
                                        <label for="rdPregnantYes">Yes</label>
                                        <input type="radio" id="rdPregnantNo" name="pregnant" value="no">
                                        <label for="rdPregnantNo">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container ifYes w-75 unShow isPregnant">
                            <div class="row ">
                                <div class="col-sm-6 p-0">
                                    <span class="input-group-text ps-0">Ilan months?</span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" onkeypress="return onlyNumberKey(event)" required maxlength="2" id="inpt_monthsPregnant">
                                </div>
                            </div>
                        </div>
                        <div class="row ms-3 question">
                            <div class="col-sm-5 p-0">
                                <span class="input-group-text ps-0">Are you taking birth control pills ? </span>
                            </div>
                            <div class="col-sm-3">
                                <div class="row align-items-center">
                                    <div class="form-control no-border">
                                        <input type="radio" id="rdPillsYes" name="pills" value="yes">
                                        <label for="rdPillsYes">Yes</label>
                                        <input type="radio" id="rdPillsNo" name="pills" value="no">
                                        <label for="rdPillsNo">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Medical History end -->
                </div>
            </div>

            <!-- Social History  -->
            <div class="row serviceFormCategory  ">
                <h3>Social History</h3>
                <div class="container questionCategoryWrapper">

                    <!-- medical smoke -->
                    <div class="row ms-3 ">
                        <div class="col-sm-5 p-0">
                            <span class="input-group-text ps-0">Do you smoke?</span>
                        </div>
                        <div class="col-sm-3">
                            <div class="row align-items-center">
                                <div class="form-control no-border">
                                    <input type="radio" id="rdSmokeYes" name="smoke" value="yes">
                                    <label for="rdSmokeYes">Yes</label>
                                    <input type="radio" id="rdSmokeNo" name="smoke" value="no">
                                    <label for="rdSmokeNo">No</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- medical alcohol -->
                    <div class="row ms-3 ">
                        <div class="col-sm-5 p-0">
                            <span class="input-group-text ps-0">Do you drink alcoholic beverages</span>
                        </div>
                        <div class="col-sm-3">
                            <div class="row align-items-center">
                                <div class="form-control no-border">
                                    <input type="radio" id="rdAlcoholicYes" name="alcoholic" value="yes">
                                    <label for="rdAlcoholicYes">Yes</label>
                                    <input type="radio" id="rdAlcoholicNo" name="alcoholic" value="no">
                                    <label for="rdAlcoholicNo">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Social History end  -->
            </div>

            <!-- Conditions  -->
            <div class="row serviceFormCategory my-5  ">
                <h5>Please mark if you have or you had any of the following conditions:</h5>
                <div class="container questionCategoryWrapper">
                    <div class="condtionsCheckBox">
                        <?php
                        $conditions = array(
                            "High Blood Pressure",
                            "Low Blood Pressure",
                            "Diabetes",
                            "Heart Disease / Heart Attack",
                            "Seizures / Epilepsy / Stroke",
                            "Thyroid Problem",
                            "Asthma",
                            "Bleeding Problem",
                            "Arthritis / Rheumatism",
                            "Liver Disease",
                            "Cancer"
                        );
                        $i = 0;
                        $arrayLength = count($conditions);
                        while ($i < $arrayLength) {
                            $num = $i + 1;
                            echo <<<CONDITIONS
                        <div>
                        <input type="checkbox" id="conditions$num" name="conditions" value="$conditions[$i]">
                        <label for="conditions$num"> $conditions[$i]</label></div>

                    CONDITIONS;

                            $i++;
                        }
                        ?>

                    </div>
                    <div class="addConditionWrapper">
                        <label for="conditionsOther" class="fs-6">Other condition : </label>
                        <input type="text" id="conditionsOther" class="inputNewConditions" autocapitalize="words">
                        <button type="button" id="addNewCondition"> Add this condition</button>
                    </div>
                </div>
                <!-- Conditions History end  -->
            </div>

            <!-- NOte  -->
            <div class="row serviceFormCategory pb-5">
                <div class="container questionCategoryWrapper">
                    <p>
                        I understand that <strong>DENTISTRY</strong> is not an exact Science & that no dentist can properly guarantee results. It is my responsibility to
                        inform the dentist of any medical condition/any medication I am taking. I hereby authorize the dentist to proceed & perform
                        the treatment's as explained to me. I understand that I am responsible for the payment of all dental fees. I agree to pay any
                        attorney's fee, or court costs that may be incurred to satisfy any obligation to this office. Any untoward circumstances that may
                        arise during the procedure, the dentist will not be held liable since it is my free will, with full trust and confidence in her, to
                        undergo dental treatment under her care.
                    </p>
                    <div>
                        <div class="row align-items-center ">
                            <div class="col-1 align-items-center justify-items-end ">
                                <input type="checkbox" id="agree" name="agree" value="agree" class="">

                            </div>
                            <div class="col-11">
                                <label for="agree" class="agreeLabel"> I confirm that I have read, understand and agree to the statement above.</label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- notey end  -->
            </div>
        </div>
    </div>

    <div class="col-md-4 appoinmentDetails ">
        <div class="row ">
            <div class="container patient-details ">
                <h5 class="w-auto">Fill-up your details</h5>
                <div class="row ">
                    <div class="col patientId-form jusify-content-flex">
                        <div class="form-floating  patient-inputs">
                            <input type="text" class="form-control " id="patientId" placeholder="Your Patient ID" onkeypress="return onlyNumberKey(event)" required maxlength="4">
                            <label for="patientId">Patient ID</label>
                        </div>

                        <a href="registration" class="patientID-input text-center unShow">New Patient?</a>
                        <a href="forgot-patient-id" class=" patientID-input text-center  unShow">Forgot Patient Id?</a>
                        <div id="patientIdError" class="text-sm text-center unShow">asdad</div>
                        <div id="patientName" class="text-sm "></div>
                        <div><input type="text" id="patientGender" class="unShow" readonly></div>

                        <div class="form-floating  patient-inputs">
                            <input type="text" class="form-control " id="patientContact" placeholder="Your Contact number" onkeypress="return onlyNumberKey(event)" required maxlength="11">
                            <label for="patientId">Contact Number</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container patient-bookDetails ">
                <h5 class="w-auto">Booking Details:</h5>
                <br>
                <div class="row">
                    <h6>Choosed Service/s</h6>
                    <div class="servicesChoosed ">
                        <table class="table  table-borderless choosedServiceTable" id="choosedServicesTable">
                            <thead>
                                <tr>
                                    <th>Service</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST["serviceName"])) {
                                    $svName = $_POST["serviceName"];
                                    $svId = $_POST["serviceID"];
                                    $svPrice = $_POST["servicePrice"];
                                    $svDuration = $_POST["serviceDuration"];
                                    echo <<<SERVICEROW
                                        <tr class="choosedServiceRow">
                                            <td class="svName">$svName</td>
                                            <td class="serviceId">$svId</td>
                                            <td class="servicePrice">$svPrice </td>
                                            <td class="serviceDuration ">$svDuration</td>
                                            <td><button type="button" class="btn-close removeService"></button></td>
                                        </tr>
                                    SERVICEROW;
                                }
                                ?>
                                <!-- <tr class="choosedServiceRow">
                                <td>Surture</th>
                                <td class="serviceId">500</td>
                                <td>500</td>
                                <td><button type="button" class="btn-close"></button></td>
                            </tr> -->

                            <tfoot>
                                <tr class="totalAmountRow">
                                    <th>Estimated Cost:</th>
                                    <th class="" id="totalAmountofAppoinment"></th>
                                </tr>
                                <tr class="totalDurationRow">
                                    <th>Estimated Duration:</th>
                                    <th class="w-auto" id="totalDurationofAppoinment"></th>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <h6>Date and Time: </h6>
                    <div class="container">
                        <div class="container">
                            <div class="row w-75">
                                <span id="appointmentDate_WeekDay" class="choosedAppointmentDate"></span>
                                <span id="appointmentDate_YearMonthDay" class="choosedAppointmentDate"></span>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row ">
                                <span>Allotted time : <span id="appointmentTime"></span></span>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row ">
                                <p><span id="startTime"></span> - <span id="endTime"></span></p>
                            </div>
                        </div>
                    </div>
                    <p></p>
                </div>

                <div class="row ">
                    <h6>Patient Details: </h6>
                    <div class="container ">
                        <div class="input-group ">
                            <span class="input-group-text">Patient ID: </span>
                            <input type="text" class="form-control bg-white" id="appointmentPatientId" readonly>
                        </div>
                        <div class="input-group ">
                            <span class="input-group-text">Contact No.: </span>
                            <input type="text" class="form-control bg-white" id="appointmentPatientContact" readonly>
                        </div>

                    </div>

                </div>

                <div class="row ">
                    <button type="button" id="btnBackAppointment" class="buttonAppointment unShow">Back to edit Appointment</button>
                    <button type="button" id="btnProceedAppointment" class="buttonAppointment">Proceed</button>
                </div>

            </div>

            <div class="container patient-TransactionWay unShow ">
                <div class="row">
                    <div class="input-group ">
                        <span class="input-group-text">Patient ID: </span>
                        <input type="text" class="form-control bg-white" id="patientIdSubmitted" readonly>
                    </div>
                    <div class="input-group ">
                        <span class="input-group-text">Appointment # </span>
                        <input type="text" class="form-control bg-white" id="appointmentCode" readonly>
                    </div>
                    <div class="input-group ">
                        <span class="input-group-text">SubTotal Amount: </span>
                        <input type="text" class="form-control bg-white" id="appointmentSubTotalAmount" readonly>
                    </div>
                    <div class="container">
                        <br>
                        <span>How do you want to pay?</span>

                        <div class="container payment">
                            <input type="radio" id="gcash" class="paymentMethod" name="payment" value="GCash" checked>
                            <label for="gcash">GCash</label><br>
                            <input type="radio" id="rdPayLayer" class="paymentMethod" name="payment" value="PayLater">
                            <label for="rdPayLayer">I want to pay later</label><br>

                            <br>
                            <p> Note: This is just an initial payment. Total amount may
                                still change after the appointment is done.</p>

                        </div>
                    </div>
                    <div class="container">
                        <div class="row ">
                            <button type="button" id="btnSubmitAppointment" class="buttonAppointment">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal -->

<!-- Modal loading -->
<div class="modal fade" id="loadingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <p class="display-6" id="modalLoadingHeader">Processing</p>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body" id="modalLoadingBody">
                <p class=" text-center">Please wait</p>
                <div class="d-flex justify-content-center">
                    <div class="spinner-grow text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-danger" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-success" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-warning" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-info" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>

<!-- Modal enter gcash -->
<div class="modal fade" id="modalGcashPayment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">For Online Payment</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <div class="row gy-4">
                    <div class="col-sm-4 ">
                        <div class="row mt-3 shadow p-3 bg-body rounded">
                            <span style="font-size: 1.25rem;">Payment Method </span><br>
                            <span style="font-size: 2rem; color:#bf2441;">GCash</span><br>
                        </div>
                        <div class="row mt-3 shadow p-3 bg-body rounded" style="font-size: 1.25rem;">
                            <span>Clinic GCash Number</span><br>
                            <span style="font-size: 2rem; color:#bf2441;">09223964642</span>
                        </div>
                        <div class="row mt-3 shadow p-3 bg-body rounded" style="font-size: 1.25rem;">
                            <span>Amount to pay</span><br>
                            <span style="font-size: 2rem; color:#bf2441;"><span id="paymentAmount">6000</span> <span> PHP</span></span>
                        </div>
                    </div>

                    <div class="col-sm-4 order-md-first">
                        <img src="resources/images/clinic_gcash.jpg" alt="Default Service Image" class="img-thumbnail">
                    </div>

                    <div class="col-sm-4 mb-3">
                        <img src="resources/images/Proof_of_Payment.png" alt="Image for Proof of Payment " class="img-thumbnail mb-3" id="imgPOP">
                        
                        <form id="formImage" onsubmit="return false">
                            <input type="file" id="pop_image" class="" aria-describedby="inputGroupFileAddon01" accept="image/jpeg" style="display: none;">
                            <label class="btn btn-primary w-100" for="pop_image">Upload File</label>
                        </form>
                        <p class="text-muted">Please submit an image of the proof of payment to be verified</p>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnClosePOP" >Maybe later</button>
                    <button type="button" class="btn btn-primary" id="btnSumbitPOP" >Submit</button>
                </div>

            </div>
        </div>
    </div>
</div>
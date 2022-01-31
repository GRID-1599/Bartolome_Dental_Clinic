const appSrvCatgy = document.querySelectorAll('.appSrvCatgy');
var categoryToShow_Id = ""

var patientsJSON;

var no_clinic_dates_array = [];

const timeRanges = ["t9", "t10", "t11", "t1", "t2", "t3", "t4"];

// ------helper methods----------
function valueExist(value, array) {

    var result = false;
    for (var i = 0; i < array.length; i++) {
        var name = array[i];
        if (name == value) {
            result = true;
            break;
        }
    }

    return result;
}

function string_to_int(str) {
    str = strRemoveDashChar(str);
    strNum = '';
    for (var i = 0; i < str.length; i++) {
        strChar = str.charAt(i);
        if ($.isNumeric(strChar)) {
            strNum += strChar;
        }
    }
    return Number.parseInt(strNum);

}

function strRemoveDashChar(str) {
    if (str.includes("-")) {
        strNum = '';
        for (var i = 0; i < str.indexOf('-'); i++) {
            strChar = str.charAt(i);
            if ($.isNumeric(strChar)) {
                strNum += strChar;
            }
        }
        return strNum;
    } else {
        return str;
    }
}


function onlyNumberKey(evt) {

    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}

function oneDigit_to_twoDigit(digit) {
    if (digit.toString().length == 1) {
        digit = "0" + digit;
    }
    return digit;
}

function generateRandomCharacters() {
    var size = 15;
    var generatedOutput = '';
    var storedCharacters =
        '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var totalCharacterSize = storedCharacters.length;
    for (var index = 0; index < size; index++) {
        generatedOutput += storedCharacters.charAt(Math.floor(Math.random() *
            totalCharacterSize));
    }
    return generatedOutput;
}

function hoursConvert(hours) {
    hours = Number.parseInt(hours)
    if (hours === 12) {
        return "12 PM"
    } else if (hours > 12) {
        return (hours - 12) + " PM"
    } else {
        return hours + " AM"
    }


}

// ------service functions----------

function resetServiceCategories() {
    $(".appSrvCatgy").each(function() {
        $(this).removeClass("catSelected");
    });
}

function resetServices() {
    $(".serviceRow").each(function() {
        $(this).removeClass("unShow");
    });
}

function showSerached(stringSearched) {
    resetServiceCategories();
    $(".serviceRow .serviceName").each(function() {
        $(this).parent().removeClass("unShow");
        strToBeSearched = $(this).text().toLowerCase();
        // console.log(stringSearched);
        if (!strToBeSearched.includes(stringSearched.toLowerCase())) {
            $(this).parent().toggleClass("unShow");
        }
    });

}

function selectServiceById(serviceId) {
    $('.serviceRow').each(function() {
        if ($(this).attr("id") == serviceId) {
            return $(this);
        }
    });
}

function thisServiceAddToChoosedService(service) {
    var serviceName = service.find(" .serviceName ").text();
    var serviceId = service.attr('id');
    var servicePrice = service.find(" .servicePrice ").text();
    var serviceDuration = service.find(" .serviceDuration ").text();

    addChoosedServiceInTable(serviceName, serviceId, servicePrice, serviceDuration);
}

function addChoosedServiceInTable(serviceName, serviceId, servicePrice, serviceDuration) {
    var markup = `
        <tr class="choosedServiceRow">
            <td class="svName">` + serviceName + `</td>
            <td class="serviceId">` + serviceId + `</td>
            <td class="servicePrice">` + servicePrice + `</td>
            <td class="serviceDuration">` + serviceDuration + `</td>
            <td><button type="button" class="btn-close removeService"></button></td>
        </tr>
    `;
    $(".choosedServiceTable tbody").append(markup);
}

function removeServiceFromChoosedService(serviceChoosed) {
    $(".choosedServiceRow .serviceId").each(function() {
        if (serviceChoosed == $(this).text()) {
            $(this).parent().remove();
        }
    });
}

function setChoosedServiceButtonRemove() {
    $(".choosedServiceRow button").each(function() {
        $(this).click(function() {
            var serviceIdToRemove = $(this).parent().parent().find(".serviceId").text();
            $('.serviceRow').each(function() {
                if ($(this).attr("id") == serviceIdToRemove) {
                    $(this).removeClass("serviceSelected");
                }
            });
            $(this).parent().parent().remove();
            calculateTotalServiceAmount();
        });
    });
}

function calculateTotalServiceAmount() {
    var subTotal = 0;
    var subTotalDuration = 0;
    var hasPlus = false;
    $('.choosedServiceRow .servicePrice').each(function() {
        if ($(this).text().includes("-")) { hasPlus = true };
        if ($(this).text().includes("+")) { hasPlus = true };
        subTotal += string_to_int($(this).text());
    });

    $('.choosedServiceRow .serviceDuration').each(function() {
        subTotalDuration += Number.parseInt($(this).text())
    });

    var output = subTotal;
    if (hasPlus) { output = subTotal + " +" };
    $('#totalAmountofAppoinment').text(output);
    $('#appointmentSubTotalAmount').val(subTotal);

    appointmentTotalDuration = subTotalDuration;
    // console.log(appointmentTotalDuration);
    duration_output = duration_to_hours(subTotalDuration)
    $('#totalDurationofAppoinment').text(duration_output);
}

function duration_to_hours(mins) {
    // min = Number.parseInt(mins)
    var d_mins = (mins / 60) % 1;
    d_mins = d_mins * 60
    var d_hours = Math.floor(mins / 60);

    if (d_hours === 0 & d_mins === 0) {
        return "0 mins "
    } else if (d_hours === 0 & d_mins !== 0) {
        return d_mins + " mins";
    } else if (d_hours !== 0 & d_mins === 0) {
        if (d_hours === 1) {
            return "1 hr"
        } else {
            return d_hours + " hrs"
        }
    } else {
        if (d_hours === 1) {
            return "1 hr" + " " + d_mins + " mins";
        } else {
            return d_hours + " hr" + " " + d_mins + " mins";
        }
    }


}

function checkPatientId(patientID) {

}

function patientIdErrorMessage(errorMessage) {
    $('#patientIdError').removeClass("unShow");
    $('#patientIdError').text(errorMessage);
}

function resetDatePicked() {
    $('#appointmentDate_WeekDay').text("");
    $('#appointmentDate_YearMonthDay').text("");
    $('#appointmentTime').text("");

}

function messagePromt(message) {
    Swal.fire({
        icon: 'info',
        text: message,
        confirmButtonText: "Ok, Got it!",
        confirmButtonColor: "#F05F79"
    })
}

function goToFormCondition() {
    if ($("#appointmentPatientId").val() === "") {
        $("#patientId").focus();
        messagePromt("Please input your Patient ID");
        // $("#patientId").focus();
        return false;
    } else if ($("#appointmentPatientContact").val() === "") {
        $("#patientId").focus();
        messagePromt("Please input your contact number");
        // $("#patientId").focus();
        return false;
    } else if ($(".choosedServiceTable > tbody > tr").length == 0) {
        // $("#choosedServicesTable").focus();
        $('#serviceTables tr:first').focus();
        messagePromt("Please choose a service");
        // $('html, body').animate({ scrollTop: $(document).height() - $(window).height() }, 100, function() {
        //     $(this).animate({ scrollTop: 20 }, 100);
        // });
        return false;

    } else if ($("#appointmentDate_WeekDay").text() == "") {
        messagePromt("Please choose for yout appointment date and time ");
        return false;
    } else if ($("#appointmentTime").text() == "") {
        messagePromt("Please choose for your appointment time ");
        return false;
    } else if ($('#startTime').text() == '' || $('#endTime').text() == '') {
        messagePromt("Please select a valid appointment time ");
        return false;
    }
    return true;
}

function testFormIsAnswered() {
    // dental forms 
    var dentalFlag = false;
    if ($('#inpt_LastDentalVisit').val()) {
        dentalFlag = true
    }
    if ($('#inpt_PurposeLastDentalVisit').val()) {
        dentalFlag = true
    }

    // medical forms 
    var medicalFlag = false;
    if ($('#inpt_LastMedicalCheckUp').val()) {
        medicalFlag = true
    }

    $("input[type=radio][name=treatment]").each(function() {
        var name = $(this).attr("name");
        if ($("input:radio[name=" + name + "]:checked").length != 0) {
            medicalFlag = true
        }
    });

    $("input[type=radio][name=medications]").each(function() {
        var name = $(this).attr("name");
        if ($("input:radio[name=" + name + "]:checked").length != 0) {
            medicalFlag = true
        }
    });

    $("input[type=radio][name=hospitalized]").each(function() {
        var name = $(this).attr("name");
        if ($("input:radio[name=" + name + "]:checked").length != 0) {
            medicalFlag = true
        }
    });

    if ($('#inpt_Allergies').val()) {
        medicalFlag = true
    }


    // female forms 
    var femaleFlag = false
    $("input[type=radio][name=pregnant]").each(function() {
        var name = $(this).attr("name");
        if ($("input:radio[name=" + name + "]:checked").length != 0) {
            femaleFlag = true
        }
    });

    $("input[type=radio][name=pills]").each(function() {
        var name = $(this).attr("name");
        if ($("input:radio[name=" + name + "]:checked").length != 0) {
            femaleFlag = true
        }
    });


    // social forms 
    var socialFlag = false
    $("input[type=radio][name=smoke]").each(function() {
        var name = $(this).attr("name");
        if ($("input:radio[name=" + name + "]:checked").length != 0) {
            socialFlag = true
        }
    });

    $("input[type=radio][name=alcoholic]").each(function() {
        var name = $(this).attr("name");
        if ($("input:radio[name=" + name + "]:checked").length != 0) {
            socialFlag = true
        }
    });

    // medication form 
    var conditionsFlag = false
    $("input[type=checkbox][name=conditions]").each(function() {
        var name = $(this).attr("name");
        if ($("input:checkbox[name=" + name + "]:checked").length != 0) {
            conditionsFlag = true
        }
    });


    var flags = {};
    flags['dentalFlag'] = dentalFlag;
    flags['medicalFlag'] = medicalFlag;
    flags['femaleFlag'] = femaleFlag;
    flags['socialFlag'] = socialFlag;
    flags['conditionsFlag'] = conditionsFlag;

    return flags;
}

function submitCondition() {
    if ($('#inpt_LastDentalVisit').val() == "") {
        messagePromt("");
        return false;
    }
    return true;
}


//  document ready
// ________________________________________________________________________
// ------------------------------------------------------------------------
$(document).ready(function() {
    // var initDates = $('#no_clinic_dates').text();
    // var dates = initDates.substring(1, initDates.length - 1);
    // no_clinic_dates_array = dates.split(',')
    no_clinic_dates_array = $.parseJSON($('#no_clinic_dates').text())
        // console.log(no_clinic_dates_array);
        // $('#loadingModal').modal('show')

    $('#btnProceedAppointment').click(function() {
        if (goToFormCondition()) {

            $('.serviceInputs').addClass("unShow");
            $('.patient-details ').addClass("unShow");
            $('.removeService').addClass("unShow");
            $('#btnBackAppointment ').removeClass("unShow");
            $('.patient-TransactionWay').removeClass("unShow");
            $('.patientForm').removeClass("unShow");


            $(this).addClass("unShow");


            $('#appointmentCode').val(generateRandomCharacters());

            if ($('#patientGender').val() == "Male") {
                $('.forFemales').addClass("unShow");
            } else {
                $('.forFemales').removeClass("unShow");

            }


            $('html, body').animate({ scrollTop: $(document).height() - $(window).height() }, 100, function() {
                $(this).animate({ scrollTop: 10 }, 100);
            });

            console.log(patientEmail);

        }


    });

    $('#btnBackAppointment').click(function() {
        $('.serviceInputs').removeClass("unShow");
        $('.patient-details ').removeClass("unShow");
        $('.removeService').removeClass("unShow");

        $('#btnProceedAppointment').removeClass("unShow");
        $('.patient-TransactionWay').addClass("unShow");
        $('.patientForm').addClass("unShow");



        $(this).addClass("unShow");


        $('html, body').animate({ scrollTop: $(document).height() - $(window).height() }, 100, function() {
            $(this).animate({ scrollTop: 10 }, 100);
        });
    });

    $("#searchService").keyup(function() {
        if ($(this).val() == "") {
            $("#C999").toggleClass("catSelected");
            resetServices();
        } else {
            showSerached($(this).val());

        }
    });

    $(".appSrvCatgy").each(function() {
        $(this).click(function() {
            resetServiceCategories();
            $(this).toggleClass("catSelected");

            if ($(this).attr("id") == "C999") {
                resetServices();
            } else {
                if (categoryToShow_Id !== $(this).attr("id")) {
                    categoryToShow_Id = $(this).attr("id");
                    getServiceByCategory(categoryToShow_Id);
                }
            }



        });
    });

    $(".serviceRow").each(function() {
        $(this).click(function() {
            if (!$(this).hasClass("serviceSelected")) {
                $(this).toggleClass("serviceSelected");
                thisServiceAddToChoosedService($(this));
            } else if ($(this).hasClass("serviceSelected")) {
                $(this).removeClass("serviceSelected");
                removeServiceFromChoosedService($(this).attr("id"));
            }
            setChoosedServiceButtonRemove();
            calculateTotalServiceAmount();
        });
    });


    setChoosedServiceButtonRemove();
    calculateTotalServiceAmount();


    $('#patientId').keyup(function() {
        if ($(this).val().length >= 4) {
            getPatients($(this).val());
            $('#patientIdSubmitted').val($(this).val());
        } else {
            $('#appointmentPatientId').val(null);
            $('#patientIdSubmitted').val(null);
            $('#patientName').text("");


            // console.log("Not Found");

        }
    });

    $('#patientId').keyup(function() {
        if ($(this).val().length == 4) {
            getPatients($(this).val());

            $('.patientID-input ').each(function() {
                $(this).addClass("unShow")
            });
        } else {
            $('#patientIdError').addClass("unShow");
            $('.patientID-input ').each(function() {
                $(this).removeClass("unShow")
            });
        }
    });

    $('#patientId').focus(function() {
        $('#patientIdError').addClass("unShow");
        $('.patientID-input ').each(function() {
            $(this).removeClass("unShow")
        });
    });

    $('#patientContact').keyup(function() {
        if ($(this).val().length == 11) {
            $('#appointmentPatientContact').val($(this).val());
        }
    });

    // console.log(patientsJSON);

    var todayDate = new Date();
    var todayMonth = todayDate.getMonth();
    var todayYear = todayDate.getFullYear();

    var inputYear = document.getElementById("year");
    var inputMonth = document.getElementById("month");
    var todayMonthDate = document.getElementById("todayMonthDate");

    showCalendar(todayMonth, todayYear);

    $('#nextMonth').click(function() {
        todayYear = (todayMonth === 11) ? todayYear + 1 : todayYear;
        todayMonth = (todayMonth + 1) % 12;
        showCalendar(todayMonth, todayYear);
        resetDatePicked()
    });

    $('#preMonth').click(function() {
        todayYear = (todayMonth === 0) ? todayYear - 1 : todayYear;
        todayMonth = (todayMonth === 0) ? 11 : todayMonth - 1;
        showCalendar(todayMonth, todayYear);
        resetDatePicked()
    });

    $('.jumpDate').change(function() {
        todayYear = parseInt(inputYear.value);
        todayMonth = parseInt(inputMonth.value);
        showCalendar(todayMonth, todayYear);
        resetDatePicked()
    });

    $('#btnTodayDate').click(function() {
        todayMonth = todayDate.getMonth();
        todayYear = todayDate.getFullYear();
        showCalendar(todayDate.getMonth(), todayDate.getFullYear());
        resetDatePicked()

    });

    $('.timeRange').each(function() {
        $(this).click(function() {

            $('#time_msg').text(null)
            $('#startTime').text(null);
            $('#endTime').text(null);

            if (!$(this).hasClass("setted")) {
                $('.timeRange').each(function() {
                    $(this).removeClass("choosed");
                    $(this).find("td").text(null);
                });
                var timeAlloted;
                var quotient = (appointmentTotalDuration / 60);
                var str = quotient.toString();
                if (str.length === 1) {
                    timeAlloted = quotient;
                } else {
                    timeAlloted = Math.floor(quotient) + 1;
                }

                appointmentAllottedHours = timeAlloted;
                var indexOfSelected = timeRanges.indexOf($(this).attr("id"));
                var lastrange = (indexOfSelected + (timeAlloted - 1));
                $('#appointmentTime').text(timeAlloted + " hour/s")
                    // console.log("Time allotted : " + timeAlloted);
                    // console.log("time range : " + indexOfSelected + "to " + lastrange);
                var startId = "#" + timeRanges[indexOfSelected];
                var endtId = "#" + timeRanges[lastrange];
                var startTime = Number.parseInt($(startId).attr('value'));
                var endTime = Number.parseInt($(endtId).attr('value')) + 1

                appointmentStartTime = startTime + ":00";
                appointmentEndTime = endTime + ":00";


                if (timeRanges.length > lastrange) {
                    var flag = true;
                    for (let i = indexOfSelected; i <= lastrange; i++) {
                        var id = "#" + timeRanges[i]
                        if ($(id).hasClass("setted")) {
                            flag = false;
                        }
                    }
                    if (flag) {
                        $(this).find("td").text();
                        for (let i = indexOfSelected; i <= lastrange; i++) {
                            var id = "#" + timeRanges[i]
                            $(id).addClass("choosed");
                        }
                        $('#startTime').text(hoursConvert(startTime));
                        $('#endTime').text(hoursConvert(endTime));
                    } else {
                        // $('#time_msg').text("Have an appointment")
                        $(this).find("td").text("Cant chooosed this time");
                    }

                } else {
                    $(this).find("td").text("Appoinment Allotted time out range");
                }
            }
        });
    });

    // for forms 

    $('input[type=radio][name=treatment]').change(function() {
        if (this.value == "yes") {
            $('#treatment').removeClass("unShow")
        } else if (this.value == 'None') {
            $('#treatment').addClass("unShow")

        }
    });

    $('input[type=radio][name=medications]').change(function() {
        if (this.value == "yes") {
            $('#medications').removeClass("unShow")
        } else if (this.value == 'None') {
            $('#medications').addClass("unShow")

        }
    });

    $('input[type=radio][name=hospitalized]').change(function() {
        if (this.value == "yes") {
            $('#hospitalized').removeClass("unShow")
        } else if (this.value == 'None') {
            $('#hospitalized').addClass("unShow")

        }
    });

    // $('input[type=radio][name=hospitalized]').change(function() {
    //     if (this.value == "yes") {
    //         $('#hospitalized').removeClass("unShow")
    //     } else if (this.value == 'no') {
    //         $('#hospitalized').addClass("unShow")

    //     }
    // });

    $('input[type=radio][name=pregnant]').change(function() {
        if (this.value == "yes") {
            $('.isPregnant').removeClass("unShow")
        } else if (this.value == 'no') {
            $('.isPregnant').addClass("unShow")

        }
    });
    var newConditionId = 1;

    $('#addNewCondition').click(function() {

        // console.log($("#conditionsOther").val());
        if ($("#conditionsOther").val() !== "") {
            var condition = $("#conditionsOther").val();
            const output = condition.charAt(0).toUpperCase() + condition.slice(1);
            var markup = `
            <div>
            <input type="checkbox" id="newCondtion` + newConditionId + `" name="conditions" value="` + output + `" checked>
            <label for="newCondtion` + newConditionId + `"> ` + output + `</label>
            </div>
            `;
            newConditionId += 1;
            $(".condtionsCheckBox").append(markup);
            $("#conditionsOther").val(null);
        }


    });

    $('#btnSubmitAppointment').click(function() {
        var agree = $('#agree').prop('checked');
        if (!agree) {
            $('#agree').addClass("is-invalid")
            $('#agree').focus()
            Swal.fire({
                    icon: 'info',
                    text: "You must agree before submitting.",
                    confirmButtonText: "OK",
                    confirmButtonColor: "#F05F79"
                })
                // return false
        } else {
            $('#agree').removeClass("is-invalid")
            getDatas()
            console.log(testFormIsAnswered())
            if (appFormValidation()) {
                getDatas()
                    // dental 
                if (testFormIsAnswered()["dentalFlag"]) {
                    var inpt_LastDentalVisit = $('#inpt_LastDentalVisit').val();
                    var inpt_PurposeLastDentalVisit = $('#inpt_PurposeLastDentalVisit').val();

                    var detalForm = {
                        Last_Dental_Visit: inpt_LastDentalVisit,
                        Purpose: inpt_PurposeLastDentalVisit
                    }
                    appoinment_obj.Dental_Form = detalForm;
                }
                // medical 
                if (testFormIsAnswered()["medicalFlag"]) {
                    var inpt_LastMedicalCheckUp = $('#inpt_LastMedicalCheckUp').val();
                    var treatment;
                    if ($("#rdTreatmentYes").is(":checked")) {
                        treatment = $("#inpt_hasTreatment").val()
                    } else {
                        treatment = "None"
                    }

                    var medication;
                    if ($("#rdMedicationsYes").is(":checked")) {
                        medication = $("#inpt_hasMedication").val()
                    } else {
                        medication = "None"
                    }

                    var hospitalized;
                    if ($("#rdHospitalizedYes").is(":checked")) {
                        hospitalized = $("#inpt_hasHopitalized").val()
                    } else {
                        hospitalized = "No"
                    }

                    var inpt_Allergies = $('#inpt_Allergies').val();

                    var medicalForm = {
                        Last_Medical_CheckUp: inpt_LastMedicalCheckUp,
                        Treatment: treatment,
                        Medication: medication,
                        Hospitalized: hospitalized,
                        Allergies: inpt_Allergies,
                    }
                    appoinment_obj.Medical_Form = medicalForm;

                }
                // female 
                if (testFormIsAnswered()["femaleFlag"]) {
                    var pregnant;
                    var months = 0;
                    if ($("#rdPregnantYes").is(":checked")) {
                        pregnant = 1
                        months = $('#inpt_monthsPregnant').val()
                    } else {
                        pregnant = 0
                    }

                    var isTakingPills;
                    if ($("#rdPillsYes").is(":checked")) {
                        isTakingPills = 1
                    } else {
                        isTakingPills = 0
                    }

                    var femaleForm = {
                        IsPregnant: pregnant,
                        Months_Pregnant: months,
                        IsTakingPills: isTakingPills
                    }

                    appoinment_obj.Female_Form = femaleForm;
                }
                // social 
                if (testFormIsAnswered()["socialFlag"]) {
                    var smoking;
                    if ($("#rdSmokeYes").is(":checked")) {
                        smoking = 1
                    } else {
                        smoking = 0
                    }

                    var drinkAlcohol;
                    if ($("#rdAlcoholicYes").is(":checked")) {
                        drinkAlcohol = 1
                    } else {
                        drinkAlcohol = 0
                    }

                    var SocialForm = {
                        IsSmoking: smoking,
                        IsDringkingAlcohol: drinkAlcohol
                    }

                    appoinment_obj.Social_Form = SocialForm;
                }
                // condition 
                if (testFormIsAnswered()["conditionsFlag"]) {
                    var conditions = [];
                    $.each($("input[name='conditions']:checked"), function() {
                        conditions.push($(this).val());
                    });
                    var conditiondTxt = conditions.join(", ");

                    appoinment_obj.Condtions = conditiondTxt;
                }

                console.log(JSON.stringify(appoinment_obj));
                console.log("-------------------------");
                console.log(appoinment_obj);

                var paymentMethod = $('input[name="payment"]:checked').val()
                    // console.log(paymentMethod);

                $('#loadingModal').modal('show')

                addTheNewAppointment();


            } else {
                $('html, body').animate({ scrollTop: $(document).height() - $(window).height() }, 100, function() {
                    $(this).animate({ scrollTop: 10 }, 100);
                });
            }

        }



    });

    `
    {"ID":"AFFBO0ZJEGWCC37","Patient_ID":"1001","Contact":"09973356901","Date":"2022-01-11","Start_Time":"11:00","End_Time":"14:00","Duration":120,"Allotted_Hours":2,"Services":[["S101","Extraction","600"]],"Amount":"600","Payment_Method":"GCash","IsPaid":false}

    `
    // $('#modalGcashPayment').modal('show')

    $('#clear_LastDentalVisit').click(function() {
        $('#inpt_LastDentalVisit').val(null)
    });
    $('#clear_LastMedicalCheckUp').click(function() {
        $('#inpt_LastMedicalCheckUp').val(null)
    });

    $('#btnSumbitPOP').click(function() {
        if ($('#pop_image').val()) {
            submitImagePOP();
        } else {
            alert("Empty Image File\nNothing to submit")
        }
    });

    $('#btnClosePOP').click(function() {
        window.location.href = 'index'
    });

    imgPOP_Edit();


});

// edit POP image
function imgPOP_Edit() {
    btnImageInput = document.getElementById("pop_image");
    previewImage = document.getElementById("imgPOP");

    // previewImage.setAttribute("src", document.getElementById("userProfile").getAttribute('src'));

    btnImageInput.addEventListener("change", function() {
        const file = this.files[0];
        thisFile = file;
        if (file) {
            reader = new FileReader();
            reader.addEventListener("load", function() {
                previewImage.setAttribute("src", this.result);
                isImageDeleted = false;
                isImageEdited = true;
            });
            reader.readAsDataURL(file);
        }
    });

    return
}

function submitImagePOP() {
    var fd = new FormData();
    var files = $('#pop_image')[0].files;
    fd.append('file', files[0]);
    var theURL = './ajaxRequest/appointment.ajax.php?appID=' + appoinment_obj["ID"];
    console.log(fd);
    console.log("url -" + theURL);
    $.ajax({
        url: theURL,
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response) {
            // response = JSON.stringify(response);
            console.log("response txt : " + response);
            window.location.href = 'index';
        },
        error: function(jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            console.log(msg);
        },

    });
}

function checkingRadioIfHasChecked(radioName) {
    $("input[type=radio][name=" + radioName + "]").each(function() {
        var name = $(this).attr("name");
        if ($("input:radio[name=" + name + "]:checked").length != 0) {
            return true;
        }
    });
    return false;
}

function checkAnwerHasValue(radio_id, input_id) {
    if ($(radio_id).is(":checked")) {
        if (!$(input_id).val()) {
            $(input_id).addClass("is-invalid")
            return false;
        } else {
            $(input_id).removeClass("is-invalid")
            return true;
        }
    } else {
        return true;

    }
}

function appFormValidation() {
    var flag = true;
    // Dental History
    if (testFormIsAnswered()["dentalFlag"]) {

        if (!$('#inpt_PurposeLastDentalVisit').val()) {
            $('#inpt_PurposeLastDentalVisit').addClass("is-invalid")
            flag = false;
        } else {
            $('#inpt_PurposeLastDentalVisit').removeClass("is-invalid")

        }
        if (!$('#inpt_LastDentalVisit').val()) {
            $('#inpt_LastDentalVisit').addClass("is-invalid")
            flag = false;
        } else {
            $('#inpt_LastDentalVisit').removeClass("is-invalid")
        }
    } else {
        $('#inpt_PurposeLastDentalVisit').removeClass("is-invalid")
        $('#inpt_LastDentalVisit').removeClass("is-invalid")
    }
    // medical 
    if (testFormIsAnswered()["medicalFlag"]) {
        if (!checkAnwerHasValue("#rdTreatmentYes", "#inpt_hasTreatment")) {
            flag = false;
        }
        if (!checkAnwerHasValue("#rdMedicationsYes", "#inpt_hasMedication")) {
            flag = false;
        }
        if (!checkAnwerHasValue("#rdHospitalizedYes", "#inpt_hasHopitalized")) {
            flag = false;
        }

    }

    if (testFormIsAnswered()["femaleFlag"]) {
        if (!checkAnwerHasValue("#rdPregnantYes", "#inpt_monthsPregnant")) {
            flag = false;
        }

    }

    return flag
}

function messageSendEmail() {
    var theDate = new Date(appoinment_obj["Date"]);
    var options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    var date = theDate.toLocaleDateString("en-US", options)

    var startTime = convertTimeTo12(appoinment_obj["Start_Time"])
    var endTime = convertTimeTo12(appoinment_obj["End_Time"])

    var strService = "";
    appoinment_obj["Services"].forEach(service => {
        strService += '<em style="margin-left: 25px">' + service[1] + '</em><br>'
    });

    var applnk = 'http://bartolomedental.epizy.com/appointment/' + appoinment_obj["ID"]
    var message = `
        <p><strong style='color:#bf2441; padding:2px; '>Hi! ${patientName} </strong><br>
                Your appointment has been successfully added
                <br><br>
                <strong>Details</strong> <br>
                Patient ID : ` + appoinment_obj["Patient_ID"] + ` <br>
                Appointment ID : ` + appoinment_obj["ID"] + ` <br>
                Appointment Date : ` + date + ` <br>
                Appointment Time : ` + startTime + ` to ` + endTime + `<br>
                Appointment Service/s<br>
                ` + strService + `
                Amount : ` + appoinment_obj["Amount"] + ` php<br>
                Payment Method : ` + appoinment_obj["Payment_Method"] + ` <br>
            <p>See more Appointment details <a href="${applnk}" target="_blank">Click here</a></p>
            <br><br>
            <strong>Bartolome Dental Clinic</strong><br>
            0975-123-8396
    `


    sendEmail(patientEmail, message);

}


// AJAX CALLs

function getServiceByCategory(categoryID) {
    $.ajax({
        url: './ajaxRequest/services.ajax.php',
        method: 'POST',
        data: {
            getServiceCategory: 1,
            serviceCategory: categoryID
        },
        success: function(response) {
            var servicesByCategory = JSON.parse(response);
            resetServices();

            $(".serviceRow").each(function() {
                if (!valueExist($(this).attr("id"), servicesByCategory)) {

                    $(this).toggleClass("unShow");
                }
            });

        },
        error: function(jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            console.log(msg);
        },

    });
}

function getPatients(patientID) {
    $.ajax({
        url: './ajaxRequest/patient.ajax.php',
        method: 'POST',
        data: {
            getAllPatients: 1,
            patientID: patientID
        },
        success: function(response) {
            // console.log(response);
            // if (!response) {
            //     console.log("Not Found");
            // } else {
            //     var patients = JSON.parse(response);
            //     console.log(patients['Email']);
            // }
            try {
                var patients = JSON.parse(response);
                // console.log(patients['Email']);
                $('#appointmentPatientId').val(patients['Patient_ID']);
                getPatientByID(patients['Patient_ID'])
            } catch (e) {
                patientIdErrorMessage("Patient ID Number Not Found")
            }
        },
        error: function(jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            console.log(msg);
        },

    });
}

function getPatientByID(patientID) {
    $.ajax({
        url: './ajaxRequest/patient.ajax.php',
        method: 'POST',
        data: {
            getPatientByID: 1,
            patientID: patientID
        },
        success: function(response) {
            // console.log(response);
            // if (!response) {
            //     console.log("Not Found");
            // } else {
            var patients = JSON.parse(response);
            $('#patientContact').val(patients['Contact']);
            $('#appointmentPatientContact').val(patients['Contact']);
            $('#patientName').text("Patient Name: " + patients['Name']);
            $('#patientGender').val(patients['Gender']);
            patientEmail = patients['Email']
            patientName = patients['Name']
            console.log(patientEmail);
            // }
            // console.log(response);
        },
        error: function(jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            console.log(msg);
        },

    });
}


// clendar script 

function showCalendar(month, year) {

    var todayDate = new Date();

    var inputYear = document.getElementById("year");
    var inputMonth = document.getElementById("month");
    var todayMonthDate = document.getElementById("todayMonthDate");
    var firstday = (new Date(year, month)).getDay();
    var daysInTodayMonth = 32 - new Date(year, month, 32).getDate();
    var yearMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    // console.log(firstday + " || " + daysInTodayMonth);
    var table = document.getElementById("calendarBody");
    table.innerHTML = "";
    todayMonthDate.innerHTML = yearMonths[month] + " " + year;
    inputYear.value = year;
    inputMonth.value = month;

    var tableCalendarRow = 1;
    // i = 6 -num of max week per month
    for (var i = 0; i < 6; i++) {
        var calendarRow_Week = document.createElement("tr");
        for (var j = 0; j < 7; j++) {
            if (i === 0 && j < firstday) {
                var calendarCell_Day = document.createElement("td");
                var calendarCell_DayText = document.createTextNode("");
                calendarCell_Day.appendChild(calendarCell_DayText);
                calendarRow_Week.appendChild(calendarCell_Day);
            } else if (tableCalendarRow > daysInTodayMonth) {
                break;
            } else {
                var calendarCell_Day = document.createElement("td");
                calendarCell_Day.classList.add("date");
                var calendarCell_DayText = document.createTextNode(tableCalendarRow);

                if (checkIfDateIsHindiNakalipas(year, month, tableCalendarRow)) {
                    calendarCell_Day.classList.remove("date");
                    calendarCell_Day.classList.add("pwedeDate");
                    calendarCell_Day.setAttribute("id", year + "-" + oneDigit_to_twoDigit(month + 1) + "-" + oneDigit_to_twoDigit(tableCalendarRow));
                    if (tableCalendarRow === todayDate.getDate() && year === todayDate.getFullYear() && month === todayDate.getMonth()) {
                        // console.log("Today Y-" + todayDate.getFullYear() + " D-" + todayDate.getDate() + " M-" + todayDate.getMonth());
                        calendarCell_Day.classList.add("todayDate");
                        // calendarCell_Day.classList.toggle("bg-primary");
                        // calendarCell_Day.setAttribute("style", "background-color: #faa2b2;");

                    }
                    if (setSelectedDate(year, month, tableCalendarRow)) {
                        calendarCell_Day.classList.add("selected");
                    }
                    if (j === 0) {
                        calendarCell_Day.classList.add("date");
                        calendarCell_Day.classList.remove("pwedeDate");
                    }

                    settingCalendarDateSched(year, month, tableCalendarRow, calendarCell_Day);
                }

                calendarCell_Day.appendChild(calendarCell_DayText);
                calendarRow_Week.appendChild(calendarCell_Day);
                tableCalendarRow++;
            }
        }
        table.appendChild(calendarRow_Week);
    }

    $('.pwedeDate').each(function() {
        $(this).click(function() {
            $('.pwedeDate').each(function() {
                $(this).removeClass("selected");
            });
            $('.appTimePicker').removeClass("unShow");

            $(this).addClass("selected");
            var dateChoosed = new Date($(this).attr("id"));
            var longDate = dateChoosed.toLocaleDateString('en-us', { weekday: "long", year: "numeric", month: "short", day: "numeric" });
            var indx = longDate.indexOf(",");
            // longDate.replace(longDate.indexOf(","), "|")
            $('.selectedDAte').text(longDate);
            var toShow = longDate.substring(0, indx) + "\n\n" + longDate.substring(indx + 1, longDate.length);
            $('#appointmentDate_WeekDay').text(longDate.substring(0, indx));
            $('#appointmentDate_YearMonthDay').text(longDate.substring(indx + 1, longDate.length));

            appointmentDate = $(this).attr("id");

            getAppointmentByDate(appointmentDate);


            $('.timeRange').each(function() {
                $(this).removeClass("choosed");
                $(this).removeClass("setted");
                $(this).find("td").text(null);
            });
            $('#appointmentTime').text(null);
            $('#time_msg').text(null)
            $('#startTime').text(null);
            $('#endTime').text(null);

            dateInitialSelected = $(this).attr("id");

        });
    });

    // console.log(dateInitialSelected);
}

function checkIfDateIsHindiNakalipas(year, month, date) {
    // var flag = false;
    var todayDate = new Date();
    if (year > todayDate.getFullYear()) {
        return true;
    } else if (year === todayDate.getFullYear()) {
        if (month > todayDate.getMonth()) {
            return true;
        } else if (month === todayDate.getMonth()) {
            if (date >= todayDate.getDate()) {
                return true;
            }
        }
    }
    return false;
}
var dateInitialSelected;

function setSelectedDate(year, month, date) {
    dateSelected = new Date(dateInitialSelected);
    if (date === dateSelected.getDate() && year === dateSelected.getFullYear() && month === dateSelected.getMonth()) {
        return true;
    }
    return false;
}


function settingCalendarDateSched(year, month, day, objElement) {
    var thisYear = year;
    var thisMonth = oneDigit_to_twoDigit(month + 1);
    var thisDay = oneDigit_to_twoDigit(day);

    theDate = new Date(thisYear + "-" + thisMonth + "-" + thisDay)
    nov30 = new Date("2021-12-30");
    dec24 = new Date("2021-12-31");



    if (compareDates(theDate, nov30)) {
        objElement.classList.add("date");
        objElement.classList.add("noClinic");
        objElement.classList.remove("pwedeDate");
    }
    if (compareDates(theDate, dec24)) {
        objElement.classList.add("date");
        objElement.classList.add("noClinic");
        objElement.classList.remove("pwedeDate");
    }

    no_clinic_dates_array.forEach(function(date) {
        noClinic = new Date(date);

        if (compareDates(theDate, noClinic)) {
            objElement.classList.add("date");
            objElement.classList.add("noClinic");
            objElement.classList.remove("pwedeDate");
        }
    });
    // console.log(theDate);
}

function compareDates(date1, date2) {
    if (date1.getFullYear() === date2.getFullYear()) {
        if (date1.getMonth() === date2.getMonth())
            if (date1.getDate() === date2.getDate()) {
                return true;
            }
    }
    return false;
}

const convertTime = timeStr => {
    const [time, modifier] = timeStr.split(' ');
    let [hours, minutes] = time.split(':');
    if (hours === '12') {
        hours = '00';
    }
    if (modifier === 'PM' || modifier === 'pm') {
        hours = parseInt(hours, 10) + 12;
    }
    return `${hours}:${minutes}`;
};

const convertTimeTo12 = timeStr => {
    const [time, modifier] = timeStr.split(' ');
    let [hours, minutes] = time.split(':');
    var aft = 'AM'
    if (hours === 12) {
        aft = 'PM'
    } else if (hours > 12) {
        hours = hours - 12;
        aft = 'PM'
    }
    // if (modifier === 'PM' || modifier === 'pm') {
    //     hours = parseInt(hours, 10) + 12;
    // }
    return `${hours}:${minutes} ${aft}`;
};

var patientEmail;
var patientName;

// APPOINTMENT DATAS  
var appointmentId;
var appointmentDate;
var patientID;
var patientContact;
var appointmentServices = [];
var appointmentAmount;
var appointmentPaymentMethod;
var IsPaid = false;
var appointmentTotalDuration;
var appointmentAllottedHours;
var appointmentStartTime;
var appointmentEndTime;


var appoinment_obj;


function getDatas() {
    var serviceChoosedList = [];
    $('.choosedServiceRow ').each(function() {
        var serviceArrData = [
            $(this).find(".serviceId").text(),
            $(this).find(".svName").text(),
            $(this).find(".servicePrice").text(),
        ]
        serviceChoosedList.push(serviceArrData);
    });

    patientID = $("#appointmentPatientId").val();
    patientContact = $("#appointmentPatientContact").val();
    appointmentServices = serviceChoosedList;
    appointmentAmount = $('#totalAmountofAppoinment').text();
    appointmentPaymentMethod = $(".paymentMethod:checked").val();
    appointmentId = $('#appointmentCode').val();

    appoinment_obj = {
        ID: appointmentId,
        Patient_ID: patientID,
        Contact: patientContact,
        Date: appointmentDate,
        Start_Time: appointmentStartTime,
        End_Time: appointmentEndTime,
        Duration: appointmentTotalDuration,
        Allotted_Hours: appointmentAllottedHours,
        Services: appointmentServices,
        Amount: appointmentAmount,
        Payment_Method: appointmentPaymentMethod,
        IsPaid: IsPaid,
    }

}

function showData() {
    console.log("appointmentId : " + appointmentId);
    console.log("patientID : " + patientID);
    console.log("patientContact : " + patientContact);
    console.log("appointmentDate : " + appointmentDate);
    console.log("appointmentTime : " + appointmentTime);
    console.log("appointmentServices : " + appointmentServices);
    console.log("appointmentAmount : " + appointmentAmount);
    console.log("appointmentPaymentMethod : " + appointmentPaymentMethod);
    console.log("IsPaid : " + IsPaid);
}

function addNewAppointment() {
    $.ajax({
        url: './ajaxRequest/appointment.ajax.php',
        method: 'POST',
        data: {
            addNewAppointment: 1,
            appointmentId: appointmentId,
            patientID: patientID,
            patientContact: patientContact,
            appointmentDate: appointmentDate,
            appointmentStartTime: appointmentStartTime,
            appointmentEndTime: appointmentEndTime,
            appointmentTotalDuration: appointmentTotalDuration,
            appointmentAllottedHours: appointmentAllottedHours,
            appointmentServices: appointmentServices,
            appointmentAmount: appointmentAmount,
            appointmentPaymentMethod: appointmentPaymentMethod,
            IsPaid: IsPaid,
        },
        success: function(response) {
            if (response == 0) {
                console.log(response);
                alert("Please try again");
                $('#appointmentCode').val(generateRandomCharacters());
            } else {
                console.log(response);

                alert("Successfully added");
                location.reload();
                window.location.href = "index.php";

            }
        },
        error: function(jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            console.log(msg);
        },

    });
}

function addTheNewAppointment() {
    $.ajax({
        url: './ajaxRequest/appointment.ajax.php',
        method: 'POST',
        data: {
            addTheNewAppointment: 1,
            appointmentData: JSON.stringify(appoinment_obj)
        },
        success: function(response) {
            // $('#loadingModal').modal('hide')
            $("#modalLoadingBody").empty()
            $("#modalLoadingHeader").text(null)
            var markup;
            var txt;
            if (response == "1") {
                console.log("the response : " + response);
                // $('#loadingModal').modal('hide')
                var paymentMethod = $('input[name="payment"]:checked').val()

                var forPayment = ""

                if (paymentMethod !== 'PayLater') {
                    forPayment = `
                        <button type="button" class="btn btn-primary float-end mx-2" id="btnModalPaymentProceed">Proceed to Payment</button>
                    `
                }
                markup = `
                    <p class="">Your appointment is successfully added. Please wait for the approval. Thank You</p>
                <button type="button" class="btn btn-secondary float-end" id="btnModalLoadingCloseProceed">Close</button>
                ` + forPayment;
                messageSendEmail();

            } else {
                console.log("error: " + response);
                // $('#loadingModal').modal('hide')
                markup = `
                    <p class="">Encounter some problem. Please try again</p>
                <button type="button" class="btn btn-primary float-end" id="btnModalLoadingClose">Close</button>
                `;
            }
            // $("#modalLoadingHeader").text(null)
            $('#modalLoadingBody').append(markup);

            $('#btnModalLoadingCloseProceed').click(function() {
                $('#loadingModal').modal('hide')
                window.location.href = 'index'
            });

            $('#btnModalPaymentProceed').click(function() {
                $('#modalGcashPayment').modal('show')
            });

            $('#btnModalLoadingClose').click(function() {
                $('#loadingModal').modal('hide')
            });

        },
        error: function(jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            console.log(msg);
        },

    });
}

const timeRangesWithKey = {
    "09": "t9",
    "10": "t10",
    "11": "t11",
    "13": "t1",
    "14": "t2",
    "15": "t3",
    "16": "t4"
};

function getAppointmentByDate(date) {
    $.ajax({
        url: './ajaxRequest/appointment.ajax.php',
        method: 'POST',
        data: {
            getAppointment: 1,
            appointmentDate: date
        },
        success: function(response) {
            var appoinment_data = JSON.parse(response);
            // console.log(appoinment_data);
            appoinment_data.forEach(element => {
                var app_time = element.start_time
                var app_allotted = element.allotted_time

                var ID = "#" + timeRangesWithKey[app_time];

                // $(ID).find("td").text("Have an appoinment");

                var indexOfSelected1 = timeRanges.indexOf(timeRangesWithKey[app_time]);
                var lastrange1 = (indexOfSelected1 + (app_allotted - 1));


                for (let i = indexOfSelected1; i <= lastrange1; i++) {
                    var id = "#" + timeRanges[i]
                    $(id).addClass("setted");
                }
            });
        },
        error: function(jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            console.log(msg);
        },

    });
}


function sendEmail(email, message) {
    Email.send({
        Host: "smtp.gmail.com",
        Username: "bartolome.dentalclinic001@gmail.com",
        Password: "jehsdwbvqkarndck",
        To: email,
        From: "bartolome.dentalclinic001@gmail.com",
        Subject: 'Appointment Details | Bartolome Dental Clinic',
        Body: message,
    });
}
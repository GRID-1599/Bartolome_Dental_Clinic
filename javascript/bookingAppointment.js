const appSrvCatgy = document.querySelectorAll('.appSrvCatgy');
var categoryToShow_Id = ""

var patientsJSON;



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
        messagePromt("Please choose for yout appointment time ");
        return false;
    }
    return true;
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
        } else if (this.value == 'no') {
            $('#treatment').addClass("unShow")

        }
    });

    $('input[type=radio][name=medications]').change(function() {
        if (this.value == "yes") {
            $('#medications').removeClass("unShow")
        } else if (this.value == 'no') {
            $('#medications').addClass("unShow")

        }
    });

    $('input[type=radio][name=hospitalized]').change(function() {
        if (this.value == "yes") {
            $('#hospitalized').removeClass("unShow")
        } else if (this.value == 'no') {
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
        // alert(agree)
        getDatas()
            // showData();
        addNewAppointment();


    });



});


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
    nov30 = new Date("2021-11-30");
    dec24 = new Date("2021-12-24");
    if (compareDates(theDate, nov30)) {
        objElement.classList.add("date");
        objElement.classList.add("holiday");
        objElement.classList.remove("pwedeDate");
    }
    if (compareDates(theDate, dec24)) {
        objElement.classList.add("date");
        objElement.classList.add("holiday");
        objElement.classList.remove("pwedeDate");
    }
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
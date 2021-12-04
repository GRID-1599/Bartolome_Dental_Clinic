var todayDate = new Date();
var todayMonth = todayDate.getMonth();
var todayYear = todayDate.getFullYear();
var inputYear = document.getElementById("year");
var inputMonth = document.getElementById("month");
var yearMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var todayMonthDate = document.getElementById("todayMonthDate");
showCalendar(todayMonth, todayYear);

function preMonth() {
    todayYear = (todayMonth === 0) ? todayYear - 1 : todayYear;
    todayMonth = (todayMonth === 0) ? 11 : todayMonth - 1;
    showCalendar(todayMonth, todayYear);
}

function nexMonth() {
    todayYear = (todayMonth === 11) ? todayYear + 1 : todayYear;
    todayMonth = (todayMonth + 1) % 12;
    showCalendar(todayMonth, todayYear);
}

function jumpp() {
    todayYear = parseInt(inputYear.value);
    todayMonth = parseInt(inputMonth.value);
    showCalendar(todayMonth, todayYear);
}

function showCalendar(month, year) {
    var dates_Arr = JSON.parse(datesArray(month + 1, year));


    var firstday = (new Date(year, month)).getDay();
    var daysInTodayMonth = 32 - new Date(year, month, 32).getDate();
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
                calendarCell_Day.setAttribute("id", year + "-" + oneDigit_to_twoDigit(month + 1) + "-" + oneDigit_to_twoDigit(tableCalendarRow));
                var calendarCell_DayText = document.createTextNode(tableCalendarRow);
                calendarCell_Day.appendChild(calendarCell_DayText);
                if (tableCalendarRow === todayDate.getDate() && year === todayDate.getFullYear() && month === todayDate.getMonth()) {
                    console.log("Today Y-" + todayDate.getFullYear() + " D-" + todayDate.getDate() + " M-" + todayDate.getMonth());
                    calendarCell_Day.classList.add("todayDate");

                }

                var thisDate = year + "-" + oneDigit_to_twoDigit(month + 1) + "-" + oneDigit_to_twoDigit(tableCalendarRow);

                dates_Arr.forEach(appointment => {
                    if (appointment["Appoinment_Date"] === thisDate) {
                        var time = appointment["Appoinment_Time"]
                        let appointment_wrapper = document.createElement('div');
                        appointment_wrapper.textContent = "APP " + time;
                        appointment_wrapper.classList.add("appoinment");
                        // appointment_wrapper.classList.append(markup);

                        // calendarCell_Day.classList.add("hasAppoinment");
                        calendarCell_Day.appendChild(appointment_wrapper);
                    }
                });




                calendarRow_Week.appendChild(calendarCell_Day);
                tableCalendarRow++;
            }
        }
        table.appendChild(calendarRow_Week);
    }


    $('.date').each(function() {
        $(this).click(function() {
            window.location.href = "calendar/" + $(this).attr("id");
            console.log($(this).attr("id"));
        });

    });
}


function datesArray(month, year) {
    var dates_array = null;
    $.ajax({
        async: false,
        global: false,
        url: '../ajaxRequest/date.ajax.php',
        method: 'POST',
        data: {
            getAdminCalendarDates: 1,
            getMonth: month,
            getYear: year,
        },
        success: function(response) {
            // response = JSON.stringify(response);
            dates_array = response;
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
    return dates_array;
};



// function 

function oneDigit_to_twoDigit(digit) {
    if (digit.toString().length == 1) {
        digit = "0" + digit;
    }
    return digit;
}
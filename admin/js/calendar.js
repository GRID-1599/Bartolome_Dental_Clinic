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
                var calendarCell_DayText = document.createTextNode(tableCalendarRow);
                if (tableCalendarRow === todayDate.getDate() && year === todayDate.getFullYear() && month === todayDate.getMonth()) {
                    console.log("Today Y-" + todayDate.getFullYear() + " D-" + todayDate.getDate() + " M-" + todayDate.getMonth());
                    calendarCell_Day.classList.add("todayDate");
                    // calendarCell_Day.classList.toggle("bg-primary");
                    calendarCell_Day.setAttribute("style", "background-color: lightseagreen;");

                }
                calendarCell_Day.appendChild(calendarCell_DayText);
                calendarRow_Week.appendChild(calendarCell_Day);
                tableCalendarRow++;
            }
        }
        table.appendChild(calendarRow_Week);
    }
}
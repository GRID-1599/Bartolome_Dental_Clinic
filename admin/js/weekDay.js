$(document).ready(function() {
    console.log(getMonday("2021-12-17"));
});

function showWeekDay() {

}

function getMonday(d) {
    d = new Date(d);
    var day = d.getDay(),
        diff = d.getDate() - day + (day == 0 ? -6 : 1); // adjust when day is sunday
    return new Date(d.setDate(diff));
}

getMonday(new Date()); // Mon Nov 08 2010

function calculateWeek(date) {
    var days = new Array();
    for (var i = 0; i < 7; i++) {
        days[i] = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 1 + i);
    }
    return days;
}

function getDays() {
    var date = document.getElementById('date');
    if (date.value == "") {
        alert("Please enter a date first!");
    } else {
        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        var newDate = new Date(date.value);
        var dates = new Array();
        dates = calculateWeek(newDate);
        var data = "<h2 class='alert-info'>Weeks of " + date.value + "</h2>";
        for (var i = 0; i < dates.length; i++) {
            data += "<label>" + days[dates[i].getDay()] + ": <span class='text-info'>" + months[dates[i].getMonth()] + " " + dates[i].getDate() + ", " + dates[i].getFullYear() + "</span></label><br />";
        }

        document.getElementById('result').innerHTML = data;
    }
}
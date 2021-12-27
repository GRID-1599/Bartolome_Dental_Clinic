$(document).ready(function() {
    initScheds();
    // $('#modalCancel').modal('show')
    $('#btnSetNotAvailable').click(function() {
        var dateToCancel = $('#dateToCancel').text();
        var reason = $('#reason').text();
        console.log(dateToCancel);
        setNotAvailable(dateToCancel, reason)
    });

    $('#toAvailable').click(function() {
        if (confirm("Set Available?")) {
            var dateToCancel = $('#dateToCancel').text();
            console.log(dateToCancel);
            setNAvailable(dateToCancel)
        }
    });


});

const timeIds = ["9", "10", "11", "13", "14", "15", "16"];

function initScheds() {
    var theDate = $('#theDate').text();
    $.ajax({
        url: '../ajaxRequest/appointment.ajax.php',
        method: 'POST',
        data: {
            getToInitScheds: 1,
            theDate: theDate
        },
        success: function(response) {
            var appoinment_data = JSON.parse(response);
            // console.log(appoinment_data);
            var j = 1;
            appoinment_data.forEach(element => {
                var app_time = Number.parseInt(element.start_time);
                var app_allotted = element.allotted_time
                var app_id = element.app_id
                var app_start = element.time_start
                var app_end = element.end_time

                var ID = "#" + app_time;
                $(ID).addClass("hasSched" + j);
                // $(ID).addClass("text-white");
                $(ID).addClass("shedTime");
                $(ID).addClass("shedTime");
                $(ID).attr("value", app_id);

                var txt = "Appointment " + app_start + " to " + app_end;
                $(ID).find('span').text(txt)



                // $(ID).find("td").text("Have an appoinment");

                var indexOfSelected1 = timeIds.indexOf(String(app_time));
                var lastrange1 = (indexOfSelected1 + (app_allotted - 1));

                for (let i = indexOfSelected1 + 1; i <= lastrange1; i++) {
                    var id = "#" + timeIds[i]
                    $(id).addClass("hasSched" + j);
                    $(id).addClass("shedTime");
                    $(id).removeClass("border-top");
                    $(id).attr("value", app_id);

                }
                j++;

                // console.log(app_time);
                // console.log(indexOfSelected1);
                // console.log(timeIds[lastrange1]);
            });

            $('.shedTime').each(function() {
                $(this).click(function() {
                    window.location.href = "appointment/" + $(this).attr('value')
                });
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

function setNotAvailable(date, reason) {
    $.ajax({
        url: '../ajaxRequest/date.ajax.php',
        method: 'POST',
        data: {
            setNotAvailable: 1,
            theDate: date,
            theReason: reason
        },
        success: function(response) {
            console.log(response);
            window.location.reload();
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

function setNAvailable(date) {
    $.ajax({
        url: '../ajaxRequest/date.ajax.php',
        method: 'POST',
        data: {
            setNAvailable: 1,
            theDate: date
        },
        success: function(response) {
            console.log(response);
            window.location.reload();
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
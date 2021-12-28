months = {
    '01': "January",
    '02': "Febuary",
    '03': "March",
    '04': "April",
    '05': "May",
    '06': "June",
    '07': "July",
    '08': "August",
    '09': "September",
    '10': "October",
    '11': "November",
    '12': "December",
}


$(document).ready(function() {
    $('input[type=radio][name=forAppTo]').change(function() {

        if (this.value == 1) {
            $('#yearToApp').attr('disabled', false);
            $('#yearToApp2').attr('disabled', true);
            $('#monthToApp').attr('disabled', true);
            $('#forYear').toggleClass("bg-transparent")
            $('#forYearMonth').toggleClass("bg-transparent")
            var yearToShow = $('#yearToApp').val().substring(0, 4)
                // console.log(" by year " + yearToShow);
            $('#toShowSpan').text("Year " + yearToShow)

        } else if (this.value == 2) {
            $('#yearToApp').attr('disabled', true);
            $('#yearToApp2').attr('disabled', false);
            $('#monthToApp').attr('disabled', false);
            $('#forYear').toggleClass("bg-transparent")
            $('#forYearMonth').toggleClass("bg-transparent")
            var yearToShow2 = $('#yearToApp2').val().substring(0, 4)
            var monthToShow = $('#monthToApp').val()
            $('#toShowSpan').text(months[monthToShow] + ", " + yearToShow2)
        }
        toShowApp()

    });

    onChangeInput("yearToApp")
    onChangeInput("yearToApp2")

    $("#monthToApp").change(function() {
        toShowApp()
    });



    toShowApp()

});


function toShowApp() {
    var toShow = $('input[type=radio][name=forAppTo]:checked').val()
    if (toShow == 1) {
        var yearToShow = $('#yearToApp').val().substring(0, 4)
            // console.log(" by year " + yearToShow);
        $('#toShowSpan').text("Year " + yearToShow)
        ajax_getYearToShow(yearToShow)
    } else if (toShow == 2) {
        var yearToShow2 = $('#yearToApp2').val().substring(0, 4)
        var monthToShow = $('#monthToApp').val()
        $('#toShowSpan').text(months[monthToShow] + ", " + yearToShow2)
        ajax_getYearMonthToShow(yearToShow2, monthToShow)

    }
}

function onChangeInput(theID) {
    theID = "#" + theID

    $(theID).keyup(function() {
        if ($(theID).val().length >= 4) {
            toShowApp()
        }
    });

    $(theID).change(function() {
        if ($(theID).val().length >= 4) {
            toShowApp()
        }
    });
}


// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example



function ajax_getYearToShow(theyear) {
    var theURL = '../ajaxRequest/appointment.ajax.php';
    console.log(theyear);

    $.ajax({
        url: theURL,
        type: 'post',
        data: {
            getYearVal: 1,
            yearApp: theyear
        },
        success: function(responseData) {
            var allAppData = JSON.parse(responseData);
            console.log(allAppData);
            $('#allAppointmentsToShow').text(allAppData["allAppTotal"]);

            var ctx = document.getElementById("approvedPie");
            const context = ctx.getContext('2d');
            context.clearRect(0, 0, ctx.width, ctx.height);

            var config = {
                type: 'doughnut',
                data: {
                    labels: ["To be Approved", "Approved"],
                    datasets: [{
                        data: [allAppData["allAppNotAprroveTotal"], allAppData["allAppAprroveTotal"]],
                        backgroundColor: ['#FDB9FC', '#FF00E4'],
                        hoverOffset: 4
                    }],
                },
            }
            var approvedPie = new Chart(ctx, config);
            approvedPie.reset();
            approvedPie.data.datasets[0].data[0] = allAppData["allAppNotAprroveTotal"];
            // approvedPie.data.datasets[0].data[0] = 0;
            approvedPie.data.datasets[0].data[1] = allAppData["allAppAprroveTotal"];
            // approvedPie.data.datasets[0].data[1] = 0;
            // approvedPie.update('active');
            approvedPie.update();



            // approvedPie.destroy() 

            var ctx1 = document.getElementById("paiddonePie");
            var paiddonePie = new Chart(ctx1, {
                type: 'doughnut',
                data: {
                    labels: ["Not Paid and Not Done", "Paid but Not Done", "Not Paid but Done", "Paid and Done"],
                    datasets: [{
                        data: [allAppData["allAppTotal_NP_ND"], allAppData["allAppTotal_P_ND"], allAppData["allAppTotal_NP_D"], allAppData["allAppTotal_P_D"]],
                        backgroundColor: ['#D47AE8', '#F4BEEE', "#A8ECE7", "#FDFF8F"],
                    }],
                },
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

function ajax_getYearMonthToShow(theyear, theMonth) {
    var theURL = '../ajaxRequest/appointment.ajax.php';
    // console.log(theyear + theMonth);

    $.ajax({
        url: theURL,
        type: 'post',
        data: {
            getYearMonthVal: 1,
            year2App: theyear,
            monthApp: theMonth
        },
        success: function(responseData) {
            // console.log(responseData);
            var allAppData = JSON.parse(responseData);
            console.log(allAppData);
            $('#allAppointmentsToShow').text(allAppData["allAppTotal"]);

            var ctx = document.getElementById("approvedPie");
            var approvedPie = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["To be Approved", "Approved"],
                    datasets: [{
                        data: [allAppData["allAppNotAprroveTotal"], allAppData["allAppAprroveTotal"]],
                        backgroundColor: ['#FDB9FC', '#FF00E4'],
                    }],
                }
            });


            var ctx1 = document.getElementById("paiddonePie");
            var paiddonePie = new Chart(ctx1, {
                type: 'doughnut',
                data: {
                    labels: ["Not Paid and Not Done", "Paid but Not Done", "Not Paid but Done", "Paid and Done"],
                    datasets: [{
                        data: [allAppData["allAppTotal_NP_ND"], allAppData["allAppTotal_P_ND"], allAppData["allAppTotal_NP_D"], allAppData["allAppTotal_P_D"]],
                        backgroundColor: ['#D47AE8', '#F4BEEE', "#A8ECE7", "#FDFF8F"],
                    }],
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
$(document).ready(function() {

    setChart($('#yearToSet').val())

    $('#yearToSet').keyup(function() {
        if ($('#yearToSet').val().length >= 4) {
            var theYear = $('#yearToSet').val().substring(0, 4)
            console.log(theYear);
            setChart(theYear)
        }
    });

    $('#yearToSet').change(function() {
        if ($('#yearToSet').val().length >= 4) {
            var theYear = $('#yearToSet').val().substring(0, 4)
            console.log(theYear);
            setChart(theYear)
        }
    });

    // $("[type='number']").keypress(function(evt) {
    //     evt.preventDefault();
    // });
});


function setChart(year) {
    var theURL = '../ajaxRequest/appointment.ajax.php';

    $.ajax({
        url: theURL,
        type: 'post',
        data: {
            getMonthsVal: 1,
            yearApp: year
        },
        success: function(response) {
            var monthsVal = response.substring(1, response.length - 1);
            monthsVal = monthsVal.split(',');

            var ctx = document.getElementById("appMonthChart");
            var myLineChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Appointments ",
                        backgroundColor: "#ee2185",
                        borderColor: "rgba(2,117,216,1)",
                        data: monthsVal,
                        // data: [35, 2, 9, 10, 05, 75, 56, 1, 2, 10, 65, 8],
                    }],
                },
                options: {
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'month'
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 12
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: 50,
                                maxTicksLimit: 10
                            },
                            gridLines: {
                                display: true
                            }
                        }],
                    },
                    legend: {
                        display: false
                    }
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


// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';


// Bar Chart Example